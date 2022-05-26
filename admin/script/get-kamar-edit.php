<?php

include '../../script/connection.php';

$result = "";
$key = $_GET["key"];

$query = "SELECT * FROM kamar ORDER BY nomor_kamar;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        if($row["id_kamar"] === $key){
            $result = $result."
                <option value=\"".$row["id_kamar"]."\" selected>Kamar ".$row["nomor_kamar"]."</option>
            ";
        }else{
            $result = $result."
                <option value=\"".$row["id_kamar"]."\">Kamar ".$row["nomor_kamar"]."</option>
            ";
        }
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>