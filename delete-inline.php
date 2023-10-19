<?php
include 'db.php';

$id  = $_GET['id'];

$sql = "DELETE FROM `student` WHERE sid = $id";
$res = mysqli_query($conn, $sql) or die("Query Unsuccessful! : " . mysqli_connect_error());

if ($res) {
    header('location:index.php');
}
