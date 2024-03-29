<?php
include_once "class/Student.php";
include_once "class/DBConnect.php";
include_once "class/StudentManager.php";
$manager = new StudentManager();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="CRUD/insert.php" method="post" enctype="multipart/form-data">
    <center>
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" placeholder="Input Name" name="name"></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type="text" placeholder="Input Phone Number" name="phone"></td>
        </tr>
        <tr>
            <td>Image:</td>
            <td>
                <input type="file" name="image"><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="insert">
            </td>
        </tr>
    </table>

    <table border="1" width="100%" >
        <tr>
            <td style="width: 200px">ID</td>
            <td style="width: 200px">Name</td>
            <td style="width: 200px">Phone Number</td>
            <td style="width: 200px">Image</td>
        </tr>

        <?php
        $staffs = $manager->getAll();
        foreach ($staffs as $key => $student): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $student->name; ?></td>
                <td><?php echo $student->phone; ?></td>
                <td><img src="upload/<?php echo $student->image ?>" width="50" height="50"></td>
                <td><a href="CRUD/delete.php?id=<?php echo $student->id ?>">Del</a></td>
                <td><a href="CRUD/edit.php?id=<?php echo $student->id ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </center>
</form>
</body>
</html>