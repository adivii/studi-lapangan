<?php

include '../../script/connection.php';

$success = true;

if(isset($_GET["submit"])){
    $id = $_GET['id-barang'];
    $nama = $_GET['nama-barang'];
    $keterangan = $_GET['keterangan'];

    if($nama == ""){
        $success = false;
    }

    if($success){
        $result = mysqli_query($conn, "UPDATE `checklist` SET `nama_barang`='$nama',`keterangan_barang`='$keterangan' WHERE `id_barang`='$id'");

        if($result){
            echo "<script>window.alert(\"Input Sukses\")</script>";
        }else{
            echo "<script>window.alert(\"Input Gagal\")</script>";
        }
    }else{
        echo "<script>window.alert(\"Input Gagal\")</script>";
    }

    // var_dump("LOW");

    header("refresh:0;url=../page/show-checklist.php");
}

?>