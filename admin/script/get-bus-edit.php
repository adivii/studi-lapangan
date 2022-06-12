<?php

include '../../script/connection.php';

$result = "";
$key = $_GET["key"];

$query = "SELECT * FROM bus ORDER BY nama_bus;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        if($row["id_bus"] === $key){
            $result = $result."
                <option value=\"".$row["id_bus"]."\" selected>Bus ".$row["nama_bus"]."</option>
            ";
        }else{
            $result = $result."
                <option value=\"".$row["id_bus"]."\">Bus ".$row["nama_bus"]."</option>
            ";
        }
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>