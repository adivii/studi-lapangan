<?php

session_start();

if(!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")){
    header("location: ../index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../res/Logo_UnivLampung.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../script/edit-mahasiswa.js"></script>
    <link rel="stylesheet" href="../../style/color.css">
    <link rel="stylesheet" href="../../style/font.css">
    <link rel="stylesheet" href="../../style/effect.css">
    <link rel="stylesheet" href="../../style/layouts.css">
    <title>Studi Lapangan</title>
</head>
<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container p-0 px-2">
      <a class="navbar-brand text-light" href="#">
        <img src="../../res/Logo_UnivLampung.png" alt="" width="40px" class="d-inline-block align-text-center me-2">
        <!-- Studi Lapangan -->
      </a>
      <button class="navbar-toggler me-1 ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-1 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="./home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Input
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="./rundown.php" class="dropdown-item">Rundown</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="./mahasiswa.php">Data Mahasiswa</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lihat
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="./show-rundown.php" class="dropdown-item">Rundown</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="./show-mahasiswa.php">Data Mahasiswa</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../script/end-session.php" class="nav-link text-light">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container w-75 mx-auto mt-2">
    <input type="text" class="form-control card-text-font" id="search" placeholder="Cari" onkeyup="load_data(this.value)">

    <table class="table table-responsive table-dark table-bordered mt-2">
        <thead>
            <tr>
                <!-- <th scope="col" class="card-text-font">No</th> -->
                <th scope="col" class="card-text-font">NPM</th>
                <th scope="col" class="card-text-font">Nama</th>
                <th scope="col" class="card-text-font">Kelas</th>
                <th scope="col" class="card-text-font">Bus</th>
                <th scope="col" class="card-text-font">Seat</th>
                <th scope="col" class="card-text-font">Kamar</th>
                <th scope="col" class="card-text-font">Kelompok</th>
                <th scope="col" class="card-text-font">Operasi</th>
            </tr>
        </thead>
        <tbody id="mahasiswa-data">

        </tbody>
    </table>
  </div>
</body>
</html>