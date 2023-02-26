<?php
session_start();
if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php'; // atau include
$mahasiswa = query("SELECT * FROM mahasiswa");
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
if(isset($_POST["cari"])){
  $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Halaman Admin</title>
  <style>
  nav {
    height: 60px;
    padding: 0 50px;
  }

  h1 {
    text-align: center;
  }

  a {
    font-weight: 600;
    text-decoration: none;
  }

  #container {
    padding: 0 10%;
  }

  .loader {
    width: 100px;
    position: absolute;
    top: 119px;
    left: 295px;
    display: none;
  }
  </style>
  <script src="js/jquery-3.6.3.min.js"></script>
  <script src="js/script.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg d-flex justify-content-between bg-primary">
    <div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="logout.php" class="nav-link active text-light fw-bolder">LOGOUT</a>
        </li>
        <li class="nav-item">
          <a href="add.php" class="nav-link active text-light fw-bolder">ADD</a>
        </li>
      </ul>
    </div>
    <form class="d-flex" action="" method="post">
      <input class="form-control me-2" type="text" name="keyword" size="40" autofocus
        placeholder="Masukkan keyword pencarian.." autocomplete="off" id="keyword">
      <button type="submit" name="cari" id="tombol-cari">Cari</button>
      <img src="img/loader.gif" class="loader">
    </form>
  </nav>
  <br>
  <h1>Daftar Mahasiswa</h1>
  <br><br>
  <div id="container">
    <table class="table table-striped table-hover" border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>
      <?php $i = 1; ?>
      <?php foreach($mahasiswa as $row): ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="edit.php?id=<?= $row["id"]; ?>" class="text-primary">EDIT</a> |
          <a href="delete.php?id=<?= $row["id"]; ?>" onclick="
          return confirm('yakin?');" class="text-danger">DELETE</a>
        </td>
        <td>
          <img src="img/<?= $row["gambar"]; ?>" width="50">
        </td>
        <td><?= $row["nim"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>