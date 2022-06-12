<?php

include './connection.php';

$id = $_GET["id"];
$result = "";

if($id === "all"){
    $query = "SELECT DISTINCT * FROM rundown ORDER BY `event_date`, `event_time`;";
}else{
    $query = "SELECT DISTINCT * FROM rundown WHERE `event_date`='$id' ORDER BY `event_date`, `event_time`;";
}

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"rundown-text-font\">".date_format(date_create($row["event_date"]), "d F Y")."</td>
                <td class=\"rundown-text-font\">".date_format(date_create($row["event_time"]), "H:i")."</td>
                <td class=\"rundown-text-font\">".$row["event_title"]."</td>
                <td class=\"rundown-text-font\">".$row["event_place"]."</td>
                <td class=\"rundown-text-font\">".$row["event_detail"]."</td>
            </tr>
        ";
    }
}

echo $result;
?>