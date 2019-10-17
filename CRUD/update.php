<?php
include_once '../class/Student.php';
include_once '../class/StudentManager.php';
include_once '../class/DBConnect.php';

$manager = new StudentManager();

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];

$images = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];

$upload_dir = "upload/".basename($images);
$imgExt = strtolower(pathinfo($images,PATHINFO_EXTENSION));
$picProfile = rand(1000, 1000000).".".$imgExt;
move_uploaded_file($tmp_dir, $upload_dir);

$student = new Student($name,$phone,$upload_dir);
$manager->update($id,$student);

header("Location:../index.php");