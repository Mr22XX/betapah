<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = "betapah";

$conn = mysqli_connect($host, $username, $password, $dbName);
if(!$conn){
    die("error : ". mysqli_connect_error());
}


?>