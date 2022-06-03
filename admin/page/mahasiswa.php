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
    <script src="../script/mahasiswa.js"></script>
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
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="./checklist.php">Checklist</a></li>
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
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="./show-checklist.php">Checklist</a></li>
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
    <form action="../script/input-mahasiswa.php" method="get">
      <div class="mb-3">
        <label for="mhs-npm" class="form-label text-light">NPM Mahasiswa</label>
        <input type="text" class="form-control" id="mhs-npm" name="mhs-npm">
      </div>
      <div class="mb-3">
        <label for="mhs-name" class="form-label text-light">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="mhs-name" name="mhs-name">
      </div>
      <div class="mb-3">
        <label for="mhs-kelas" class="form-label text-light">Kelas Mahasiswa</label>
        <select name="mhs-kelas" id="mhs-kelas" class="form-select" placeholder="Pilih Kelas" onchange="kelas_changed()"></select>
        <input class="form-control mt-2" type="text" name="kelas-other" id="kelas-other" placeholder="Kelas" style="display: none">
      </div>
      <div class="mb-3">
        <label for="bus-id" class="form-label text-light">Bus</label>
        <select name="bus-id" id="bus-id" class="form-select" onchange="bus_changed()"></select>
        <input class="form-control mt-2" type="number" name="bus-other" id="bus-other" placeholder="Bus" style="display: none">
        <input class="form-control mt-2" type="number" name="seat-number" id="seat-number" placeholder="Nomor Seat">
      </div>
      <div class="mb-3">
        <label for="kamar-id" class="form-label text-light">Kamar</label>
        <select name="kamar-id" id="kamar-id" class="form-select" onchange="kamar_changed()"></select>
        <input class="form-control mt-2" type="number" name="kamar-other" id="kamar-other" placeholder="Nomor Kamar" style="display: none">
      </div>
      <div class="mb-3">
        <label for="kelompok-id" class="form-label text-light">Kelompok</label>
        <select name="kelompok-id" id="kelompok-id" class="form-select" onchange="kelompok_changed()"></select>
        <input class="form-control mt-2" type="number" name="kelompok-other" id="kelompok-other" placeholder="Nomor Kelompok" style="display: none">
      </div>
      <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
    </form>
  </div>
</body>
</html>