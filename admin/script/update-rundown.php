<?php

include '../../script/connection.php';

if(isset($_GET["submit"])){
    $id = $_GET['event-id'];
    $date = $_GET['event-date'];
    $time = $_GET['event-time'];
    $title = $_GET['event-title'];
    $place = $_GET['event-place'];
    $detail = $_GET['event-detail'];

    $status = true;

    if($date === "" || $time === "" || $title === "" || $place === "" || $detail === ""){
        $status = false;
    }

    if($status){
        $result = mysqli_query($conn, "UPDATE `rundown` SET `event_date`='$date',`event_time`='$time',`event_title`='$title',`event_place`='$place',`event_detail`='$detail' WHERE `id`='$id';");

        if($result){
            echo "<script>window.alert(\"Update Sukses\")</script>";
        }else{
            echo "<script>window.alert(\"Update Gagal\")</script>";
        }
    }else{
        echo "<script>window.alert(\"Update Gagal\")</script>";
    }

    header("refresh:0;url=../page/show-rundown.php");
}

?>