<?php

$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>