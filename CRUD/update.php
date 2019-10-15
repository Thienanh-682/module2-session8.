<?php
include_once '../class/Student.php';
include_once '../class/StudentManager.php';
include_once '../class/DBConnect.php';
$manager = new StudentManager();
$index = $_GET['id'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$manager->update($index,$name,$phone);
header("Location:../index.php");
