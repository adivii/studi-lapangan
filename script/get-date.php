<?php

include './connection.php';

$result = "<option id=\"default-hari\" value=\"all\" selected>Semua Jadwal</option>";

$query = "SELECT DISTINCT `event_date` FROM rundown;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <option value=\"".$row["event_date"]."\">".date_format(date_create($row["event_date"]), "d F Y")."</option>
        ";
    }
}

echo $result;
?>