<?php

include './connection.php';

$id = $_GET["id"];
$result = "";

mysqli_select_db($conn, "studi-lapangan");

if($id === "all"){
    $query = "SELECT * FROM rundown ORDER BY `event_date`, `event_time`;";
}else{
    $query = "SELECT * FROM rundown WHERE `event_date`='$id' ORDER BY `event_date`, `event_time`;";
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
                <td class=\"rundown-text-font\">
                    <button type=\"button\" class=\"btn btn-primary rundown-text-font w-100\" onClick=\"edit_data(".$row["id"].")\">Edit</button>
                    <button type=\"button\" class=\"btn btn-danger rundown-text-font w-100 mt-1\" onClick=\"hapus_data(".$row["id"].")\">Hapus</button>
                </td>
            </tr>
        ";
    }
}

echo $result;
?>