<?php

include './connection.php';

$result = "<option id=\"placeholder-kelompok\" selected>Pilih Kelompok</option>";

mysqli_select_db($conn, "studi-lapangan");

$query = "SELECT * FROM kelompok ORDER BY nama_kelompok;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <option value=\"".$row["id_kelompok"]."\">".$row["nama_kelompok"]."</option>
        ";
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>