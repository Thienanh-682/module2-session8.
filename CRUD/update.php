<?php
include_once '../class/Student.php';
include_once '../class/StudentManager.php';
include_once '../class/DBConnect.php';

$manager = new StudentManager();

$id = $_GET['id'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$student = new Student($name,$phone);
$manager->update($id,$student);

header("Location:../index.php");