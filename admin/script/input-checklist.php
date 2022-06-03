<?php

include '../../script/connection.php';

$success = true;

if(isset($_GET["submit"])){
    $nama = $_GET['nama-barang'];
    $keterangan = $_GET['keterangan'];

    if($nama == ""){
        $success = false;
    }

    if($success){
        $result = mysqli_query($conn, "INSERT INTO `checklist`(`id_barang`, `nama_barang`, `keterangan_barang`) VALUES (NULL,'$nama','$keterangan')");

        if($result){
            echo "<script>window.alert(\"Input Sukses\")</script>";
        }else{
            echo "<script>window.alert(\"Input Gagal\")</script>";
        }
    }else{
        echo "<script>window.alert(\"Input Gagal\")</script>";
    }

    // var_dump("LOW");

    header("refresh:0;url=../page/checklist.php");
}

?>