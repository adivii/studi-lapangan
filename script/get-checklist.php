<?php

include './connection.php';

$result = "";


$query = "SELECT * FROM checklist;";


$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
        <tr>
            <td class=\"position-relative\"><input type=\"checkbox\" class=\"position-absolute top-50 start-50 translate-middle\"></td>
            <td class=\"card-text-font\">".$row['nama_barang']."</td>
            <td class=\"card-text-font\">".$row['keterangan_barang']."</td>
        </tr>
        ";
    }
}

echo $result;
?>