<?php

include './connection.php';

$result = "";
$key = $_GET["key"];

mysqli_select_db($conn, "studi-lapangan");

$query = "DELETE FROM `mahasiswa` WHERE `npm_mhs`='$key';;";

$queryResult = mysqli_query($conn, $query);

if($queryResult){
    echo "<script>window.alert(\"Hapus Sukses\")</script>";
}else{
    echo "<script>window.alert(\"Hapus Gagal\")</script>";
}

header("location: ../page/show-mahasiswa.php");
?>