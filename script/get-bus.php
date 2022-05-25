<?php

include './connection.php';

$key = $_GET["key"];
$result = "";

if($key === ""){
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `bus`.`nama_bus`
                FROM `mahasiswa`, `bus`
                WHERE `mahasiswa`.`id_bus`=`bus`.`id_bus`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}else{
    $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `bus`.`nama_bus`
                FROM `mahasiswa`, `bus`
                WHERE ((`mahasiswa`.`npm_mhs` LIKE '%$key%') OR (`mahasiswa`.`nama_mhs` LIKE '%$key%') OR (CONCAT('Bus ', `bus`.`nama_bus`) LIKE '%$key%')) AND `mahasiswa`.`id_bus`=`bus`.`id_bus`
                ORDER BY `mahasiswa`.`npm_mhs`;";
}

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"card-text-font\">".$row["npm_mhs"]."</td>
                <td class=\"card-text-font\">".$row["nama_mhs"]."</td>
                <td class=\"card-text-font\">Bus ".$row["nama_bus"]."</td>
            </tr>
        ";
    }
}

echo $result;

?>