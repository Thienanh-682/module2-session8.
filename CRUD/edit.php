<?php
include_once '../class/Student.php';
include_once '../class/StudentManager.php';
include_once '../class/DBConnect.php';
$manager = new StudentManager();
$index = $_GET['id'];
$stmt = $manager->showEdit($index);
$name = $stmt['name'];
$phone = $stmt['phone'];
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
<form action="update.php" method="get">
    <table>
        <tr style="display: none">
            <td><input type="text" name="id" value="<?php echo $index ?>"></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $name ?>"></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type="text" name="phone" value="<?php echo $phone ?>"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="update">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 200px">ID</td>
            <td style="width: 200px">Name</td>
            <td style="width: 200px">Phone Number</td>
        </tr>

        <?php
        $students = $manager->getAll();
        foreach ($students as $key => $student): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $student->name; ?></td>
                <td><?php echo $student->phone; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>

</body>
</html>
