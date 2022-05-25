<?php

include './connection.php';

$result = "";

mysqli_select_db($conn, "studi-lapangan");

$key = $_GET["key"];

if($key === "all"){
    $query = "SELECT 
                `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kelas`.`nama_kelas`, `bus`.`nama_bus`, `mahasiswa`.`no_seat`, `kamar`.`nomor_kamar`, `kelompok`.`nama_kelompok`
              FROM
                `mahasiswa`, `kelompok`, `kelas`, `kamar`, `bus`
              WHERE
                `mahasiswa`.`kelas_mhs`=`kelas`.`id_kelas` AND `mahasiswa`.`id_bus`=`bus`.`id_bus` AND `mahasiswa`.`id_kamar`=`kamar`.`id_kamar` AND `mahasiswa`.`id_kelompok`=`kelompok`.`id_kelompok`
              ORDER BY
                `mahasiswa`.`npm_mhs`;";
}else{
    $query = "SELECT
                `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kelas`.`nama_kelas`, `bus`.`nama_bus`, `mahasiswa`.`no_seat`, `kamar`.`nomor_kamar`, `kelompok`.`nama_kelompok`
              FROM
                `mahasiswa`, `kelompok`, `kelas`, `kamar`, `bus`
              WHERE
                `mahasiswa`.`kelas_mhs`=`kelas`.`id_kelas` AND `mahasiswa`.`id_bus`=`bus`.`id_bus` AND `mahasiswa`.`id_kamar`=`kamar`.`id_kamar` AND `mahasiswa`.`id_kelompok`=`kelompok`.`id_kelompok` AND (`mahasiswa`.`npm_mhs` LIKE '%$key%' OR `mahasiswa`.`nama_mhs` LIKE '%$key%' OR `kelas`.`nama_kelas` LIKE '%$key%' OR CONCAT('Bus ', `bus`.`nama_bus`) LIKE '%$key%' OR `mahasiswa`.`no_seat` LIKE '%$key%' OR CONCAT('Kamar ', `kamar`.`nomor_kamar`) LIKE '%$key%' OR CONCAT('Kelompok ', `kelompok`.`nama_kelompok`) LIKE '%$key%')
              ORDER BY
                `mahasiswa`.`npm_mhs`;";
}


$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"card-text-font\">".$row["npm_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_kelas"]."</td>
                <td class=\"card-text-font\">Bus ".$row["nama_bus"]."</td>
                <td class=\"card-text-font\">".$row["no_seat"]."</td>
                <td class=\"card-text-font\">Kamar ".$row["nomor_kamar"]."</td>
                <td class=\"card-text-font\">Kelompok ".$row["nama_kelompok"]."</td>
                <td class=\"card-text-font\">
                    <button type=\"button\" class=\"btn btn-primary card-text-font w-100\" onClick=\"edit_data('".$row["npm_mhs"]."')\">Edit</button>
                    <button type=\"button\" class=\"btn btn-danger card-text-font w-100 mt-1\" onClick=\"hapus_data(".$row["npm_mhs"].")\">Hapus</button>
                </td>
            </tr>
        ";
    }
}

echo $result;
?>