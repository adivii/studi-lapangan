<?php

include '../../script/connection.php';

$result = "<option id=\"placeholder-kamar\" selected>Pilih Kamar</option>";

$query = "SELECT * FROM kamar ORDER BY nomor_kamar;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <option value=\"".$row["id_kamar"]."\">Kamar ".$row["nomor_kamar"]."</option>
        ";
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>