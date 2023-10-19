<?php
session_start();
include 'db.php';

$sname    = $_POST['sname'];
$saddress = $_POST['saddress'];
$class    = $_POST['class'];
$sphone   = $_POST['sphone'];

$error = [];

if (empty($sname)) {

    $error['sname'] = 'Required';
    header('location:add.php');
}

if (empty($saddress)) {
    $error['saddress'] = 'Required';
    header('location:add.php');
}

if (empty($class)) {
    $error['class'] = 'Required';
    header('location:add.php');
}

if (empty($sphone)) {
    $error['sphone'] = 'Required';
    header('location:add.php');
}

if (empty($error)) {
    $sql = "INSERT INTO `student`(`sname`, `saddress`, `sclass`, `sphone`) VALUES ('{$sname}', '{$saddress}', {$class}, '{$sphone}')";
    $res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());
    header('location:index.php');
} else {

    $_SESSION['val'] = $error;
    header('location:add.php');
}
