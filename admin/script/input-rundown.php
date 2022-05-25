<?php

include './connection.php';
mysqli_select_db($conn, "studi-lapangan");

if(isset($_GET["submit"])){
    $date = $_GET['event-date'];
    $time = $_GET['event-time'];
    $title = $_GET['event-title'];
    $place = $_GET['event-place'];
    $detail = $_GET['event-detail'];

    $result = mysqli_query($conn, "INSERT INTO `rundown` (`id`, `event_date`, `event_time`, `event_title`, `event_place`, `event_detail`) VALUES (NULL, '$date', '$time', '$title', '$place', '$detail');");

    if($result){
        echo "<script>window.alert(\"Input Sukses\")</script>";
    }else{
        echo "<script>window.alert(\"Input Gagal\")</script>";
    }

    header("refresh:0;url=../page/rundown.php");
}

?>