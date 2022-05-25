<?php

include './connection.php';

$key = $_GET["key"];
$result = "";

mysqli_select_db($conn, "studi-lapangan");

// Retrieve id_bus
// $id_bus = mysqli_fetch_assoc(mysqli_query("SELECT id_bus FROM mahasiswa WHERE (`npm` LIKE '%$key%') OR (`nama` LIKE '%$key%') ORDER BY `npm`;"))

if($key === ""){
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `bus`.`nama_bus`
                FROM `mahasiswa`, `bus`
                WHERE `mahasiswa`.`id_bus`=`bus`.`id_bus`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}else{
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `bus`.`nama_bus`
                FROM `mahasiswa`, `bus`
                WHERE ((`mahasiswa`.`npm_mhs` LIKE '%$key%') OR (`mahasiswa`.`nama_mhs` LIKE '%$key%') OR (`bus`.`nama_bus` LIKE '%$key%')) AND `mahasiswa`.`id_bus`=`bus`.`id_bus`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"card-text-font\">".$row["npm_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_bus"]."</td>
            </tr>
        ";
    }
}

echo $result;

?>