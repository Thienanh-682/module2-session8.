<?php
include_once "../class/Student.php";
include_once "../class/DBConnect.php";
include_once "../class/StudentManager.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $images = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];

    $upload_dir = "../upload/".basename($images);
    $imgExt = strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $picProfile = rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir);

    $studentObj = new Student($name,$phone,$upload_dir);
    $manager = new StudentManager();
    $manager->insert($studentObj);

}
header("Location:../index.php");
