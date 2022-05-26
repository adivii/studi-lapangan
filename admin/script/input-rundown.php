<?php

include '../../script/connection.php';

if(isset($_GET["submit"])){
    $date = $_GET['event-date'];
    $time = $_GET['event-time'];
    $title = $_GET['event-title'];
    $place = $_GET['event-place'];
    $detail = $_GET['event-detail'];

    $status = true;

    if($date === "" || $time === "" || $title === "" || $place === "" || $detail === ""){
        $status = false;
    }

    $dataCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `rundown` WHERE `event_date`='$date' AND `event_time`='$time';"));

    if($dataCount > 0){
        $status = false;
    }

    if($status){
        $result = mysqli_query($conn, "INSERT INTO `rundown` (`id`, `event_date`, `event_time`, `event_title`, `event_place`, `event_detail`) VALUES (NULL, '$date', '$time', '$title', '$place', '$detail');");

        if($result){
            echo "<script>window.alert(\"Input Sukses\")</script>";
        }else{
            echo "<script>window.alert(\"Input Gagal\")</script>";
        }
    }else{
        echo "<script>window.alert(\"Input Gagal\")</script>";
    }

    // var_dump("LOW");

    header("refresh:0;url=../page/rundown.php");
}

?>