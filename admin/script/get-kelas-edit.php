<?php

include './connection.php';

$key = $_GET["key"];
$result = "";

mysqli_select_db($conn, "studi-lapangan");

$query = "SELECT * FROM kelas ORDER BY nama_kelas;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        if($row["id_kelas"] === $key){
            $result = $result."
                <option value=\"".$row["id_kelas"]."\" selected>".$row["nama_kelas"]."</option>
            ";
        }else{
            $result = $result."
                <option value=\"".$row["id_kelas"]."\">".$row["nama_kelas"]."</option>
            ";
        }
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>