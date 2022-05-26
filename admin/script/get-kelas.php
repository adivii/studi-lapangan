<?php

include '../../script/connection.php';

$result = "<option id=\"placeholder-kelas\" selected>Pilih Kelas</option>";

$query = "SELECT * FROM kelas ORDER BY nama_kelas;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <option value=\"".$row["id_kelas"]."\">".$row["nama_kelas"]."</option>
        ";
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>