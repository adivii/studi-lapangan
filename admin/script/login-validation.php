<?php

include './connection.php';

if(isset($_POST["submit"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $query_result = mysqli_query($conn, "SELECT `password` FROM `admin` WHERE `username`='$user';");

    if(mysqli_num_rows($query_result) > 0){
        $pass_verif = mysqli_fetch_assoc($query_result);

        if(password_verify($pass, $pass_verif["password"])){
            session_id('admin');
            session_start();
            header("refresh:0;url=../page/home.php");
        }else{
            echo "<script>window.alert(\"Login Gagal\")</script>";
            header("refresh:0;url=../index.html");
        }
    }
}

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/color.css">
    <link rel="stylesheet" href="../style/font.css">
    <link rel="stylesheet" href="../style/effect.css">
    <link rel="stylesheet" href="../style/layouts.css">
    <title>Studi Lapangan</title>
</head>
<body class="bg-dark">
    
</body>
</html> -->