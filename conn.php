<?php

$host = "sql204.infinityfree.com";
$username = "if0_37040903";
$password = "Ozk1Sx5Tt03E";
$dbName = "if0_37040903_betapah";

$conn = mysqli_connect($host, $username, $password, $dbName);
if(!$conn){
    die("error : ". mysqli_connect_error());
}


?>