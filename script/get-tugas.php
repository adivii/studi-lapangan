<?php

include './connection.php';

$key = $_GET["key"];
$result = "";

mysqli_select_db($conn, "studi-lapangan");

// Retrieve id_bus
// $id_bus = mysqli_fetch_assoc(mysqli_query("SELECT id_bus FROM mahasiswa WHERE (`npm` LIKE '%$key%') OR (`nama` LIKE '%$key%') ORDER BY `npm`;"))

if($key === ""){
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kelompok`.`nama_kelompok`
                FROM `mahasiswa`, `kelompok`
                WHERE `mahasiswa`.`id_kelompok`=`kelompok`.`id_kelompok`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}else{
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kelompok`.`nama_kelompok`
                FROM `mahasiswa`, `kelompok`
                WHERE ((`mahasiswa`.`npm_mhs` LIKE '%$key%') OR (`mahasiswa`.`nama_mhs` LIKE '%$key%') OR (`kelompok`.`nama_kelompok` LIKE '%$key%')) AND `mahasiswa`.`id_kelompok`=`kelompok`.`id_kelompok`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"card-text-font\">".$row["npm_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_kelompok"]."</td>
            </tr>
        ";
    }
}

echo $result;

?>