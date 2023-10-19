<?php
session_start();
include 'db.php';

$id       = $_POST['sid'];
$sname    = $_POST['sname'];
$saddress = $_POST['saddress'];
$class    = $_POST['class'];
$sphone   = $_POST['sphone'];


$sql = "UPDATE `student` SET `sname`='$sname',`saddress`='$saddress',`sclass`=$class,`sphone`='$sphone' WHERE sid = $id";
$res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());

if ($res) {
    header('location:index.php');
}
