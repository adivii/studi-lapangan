<?php

include '../../script/connection.php';

$result = "";
$key = $_GET["key"];

$query = "DELETE FROM `rundown` WHERE `id`='$key';;";

$queryResult = mysqli_query($conn, $query);

if($queryResult){
    echo "<script>window.alert(\"Hapus Sukses\")</script>";
}else{
    echo "<script>window.alert(\"Hapus Gagal\")</script>";
}

header("location: ../page/show-rundown.php");
?>