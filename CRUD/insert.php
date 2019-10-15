<?php
include_once "../class/Student.php";
include_once "../class/DBConnect.php";
include_once "../class/StudentManager.php";
$name = $_GET['name'];
$phone = $_GET['phone'];
$studentObj = new Student($name,$phone);
var_dump($studentObj);
$manager = new StudentManager();
$manager->insert($studentObj);
header("Location:../index.php");