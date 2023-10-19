<?php

$serverName = "localhost";
$userName   = "root";
$password   = "";
$db         = "php_crud";

//Create Connection
$conn = mysqli_connect($serverName, $userName, $password, $db);

//Check Connection
if (!$conn) {

    die("Connection Failed : " . mysqli_connect_error());
}
