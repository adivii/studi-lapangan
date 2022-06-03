<?php

include '../../script/connection.php';

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
            <td class=\"card-text-font\">
                <button type=\"button\" class=\"btn btn-primary card-text-font w-100\" onClick=\"edit_data('".$row["id_barang"]."')\">Edit</button>
                <button type=\"button\" class=\"btn btn-danger card-text-font w-100 mt-1\" onClick=\"hapus_data(".$row["id_barang"].")\">Hapus</button>
            </td>
        </tr>
        ";
    }
}

echo $result;
?>