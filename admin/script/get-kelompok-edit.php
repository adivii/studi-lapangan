<?php

include './connection.php';

$result = "";
$key = $_GET["key"];

$query = "SELECT * FROM kelompok ORDER BY nama_kelompok;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        if($row["id_kelompok"] === $key){
            $result = $result."
                <option value=\"".$row["id_kelompok"]."\" selected>Kelompok ".$row["nama_kelompok"]."</option>
            ";
        }else{
            $result = $result."
                <option value=\"".$row["id_kelompok"]."\">Kelompok ".$row["nama_kelompok"]."</option>
            ";
        }
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>