<?php
include_once '../class/Student.php';
include_once '../class/StudentManager.php';
include_once '../class/DBConnect.php';

$manager = new StudentManager();
$index = $_GET['id'];
$manager->delete($index);

header("Location:../index.php");