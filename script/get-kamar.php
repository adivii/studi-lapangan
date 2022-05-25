<?php

include './connection.php';

$key = $_GET["key"];
$result = "";

if($key === ""){
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kamar`.`nomor_kamar`
                FROM `mahasiswa`, `kamar`
                WHERE `mahasiswa`.`id_kamar`=`kamar`.`id_kamar`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}else{
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kamar`.`nomor_kamar`
                FROM `mahasiswa`, `kamar`
                WHERE ((`mahasiswa`.`npm_mhs` LIKE '%$key%') OR (`mahasiswa`.`nama_mhs` LIKE '%$key%') OR (CONCAT('Kamar ', `kamar`.`nomor_kamar`) LIKE '%$key%')) AND `mahasiswa`.`id_kamar`=`kamar`.`id_kamar`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"card-text-font\">".$row["npm_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_mhs"]."</td>
                <td class=\"card-text-font\">Kamar ".$row["nomor_kamar"]."</td>
            </tr>
        ";
    }
}

echo $result;

?>