
<?php
$db = mysqli_connect('localhost', 'admin', 'admin', 'todophp');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    mysqli_query($db, "INSERT INTO todophp (title, description)
                VALUES ('$title', '$description')");
    header('location: index.php');
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($db, "DELETE FROM todophp WHERE id=$id");
    header('location: index.php');
}

$result = mysqli_query($db, "SELECT * FROM todophp");
?> 



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="style.css"/>
        <title>ToDoList PHP and MySQL</title>
    </head>
    <body>
        <br>
        <div class="head">
            <h3 style="text-align: center">ToDoList - PHP - MySQL</h3>
        </div>
        <br>
        <div class="formadd" style="text-align: center">

            <form class="form-inline" action="index.php" method="POST" >
                <input type="hidden" />

                <div class="form-group">
                    <label class="sr-only">Task Title</label>
                    <input type="text" name="title"  class="form-control" placeholder="Task Title" >

                </div>
                <div class="form-group">
                    <label class="sr-only">Task Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Task Description" >
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Add New Task</button>
            </form> 

        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td class="glyphicon glyphicon-trash" >
                            <a href="index.php?delete=<?php echo $row['id']; ?>"/>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>   

    </body>
</html>
