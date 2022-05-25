<?php

include './connection.php';

$success = true;

if(isset($_GET["submit"])){
    $npm = $_GET['mhs-npm'];
    $name = $_GET['mhs-name'];
    $kelas = $_GET['mhs-kelas'];
    $bus = $_GET['bus-id'];
    $seat = $_GET['seat-number'];
    $kamar = $_GET['kamar-id'];
    $kelompok = $_GET['kelompok-id'];

    // Input Kelas Jika Belum Ada
    if($kelas == "other"){
        $kelas_other = $_GET["kelas-other"];

        if($kelas_other == ""){
            $success = false;
        }else{
            $result = mysqli_query($conn, "INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES (NULL, '$kelas_other');");
            
            if(!$result){
                $success = false;
            }else{
                $kelas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id_kelas` FROM `kelas` WHERE `nama_kelas`='$kelas_other';"))["id_kelas"];
            }
        }
    }

    // Input Bus Jika Belum Ada
    if($bus === "other"){
        $bus_other = $_GET["bus-other"];

        if($bus_other == ""){
            $success = false;
        }else{
            $result = mysqli_query($conn, "INSERT INTO `bus` (`id_bus`, `nama_bus`) VALUES (NULL, '$bus_other');");    
            
            if(!$result){
                $success = false;
            }else{
                $bus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id_bus` FROM `bus` WHERE `nama_bus`='$bus_other';"))["id_bus"];
            }
        }
    }

    // Input Kamar Jika Belum Ada
    if($kamar === "other"){
        $kamar_other = $_GET["kamar-other"];

        if($kamar_other == ""){
            $success = false;
        }else{
            $result = mysqli_query($conn, "INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`) VALUES (NULL, '$kamar_other');");
        
            if(!$result){
                $success = false;
            }else{
                $kamar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id_kamar` FROM `kamar` WHERE `nomor_kamar`='$kamar_other';"))["id_kamar"];
            }
        }
    }

    // Input Kelompok Jika Belum Ada
    if($kelompok === "other"){
        $kelompok_other = $_GET["kelompok-other"];

        if($bus_other == ""){
            $success = false;
        }else{
            $result = mysqli_query($conn, "INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`) VALUES (NULL, '$kelompok_other');");
            
            if(!$result){
                $success = false;
            }else{
                $kelompok = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id_kelompok` FROM `kelompok` WHERE `nama_kelompok`='$kelompok_other';"))["id_kelompok"];
            }
        }
    }

    if($npm === "" || $nama === "" || $kelas === "Pilih Kelas" || $bus === "Pilih Bus" || $kamar === "Pilih Kamar" || $kelompok === "Pilih Kelompok"){
        $success = false;
    }

    if($success){
        $result = mysqli_query($conn, "UPDATE `mahasiswa` SET `nama_mhs`='$name',`kelas_mhs`='$kelas',`id_bus`='$bus',`no_seat`='$seat',`id_kamar`='$kamar',`id_kelompok`='$kelompok' WHERE `npm_mhs`='$npm';");

        if($result){
            echo "<script>window.alert(\"Update Sukses\")</script>";
        }else{
            echo "<script>window.alert(\"Update Gagal\")</script>";
        }
    }else{
        echo "<script>window.alert(\"Update Gagal\")</script>";
    }

    header("refresh:0;url=../page/show-mahasiswa.php");
}

?>