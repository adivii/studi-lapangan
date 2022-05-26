<?php

include '../../script/connection.php';

$result = "<option id=\"placeholder-bus\" selected>Pilih Bus</option>";

$query = "SELECT * FROM `bus` ORDER BY nama_bus;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <option value=\"".$row["id_bus"]."\">Bus ".$row["nama_bus"]."</option>
        ";
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>