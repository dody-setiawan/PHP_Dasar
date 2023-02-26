<?php
session_start();
if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

if(isset($_POST["submit"])) {

  if(post($_POST) > 0) {
    echo "
      <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
      </script>
    ";
    // echo "data gagal ditambahkan";
    // echo "<br>";
    // echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Add data mahasiswa</title>
  <style>
  h1 {
    text-align: center;
    margin-bottom: 40px;
  }

  li {
    list-style: none;
  }

  form {
    width: 50%;
    margin: 100px auto;
    padding: 2rem;
    padding-right: 3.5rem;
    border: 1px solid gray;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  button {
    width: 100px;
    height: 45px;
  }
  </style>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <h1>Add Data Mahasiswa</h1>
    <ul>
      <li class="mb-3">
        <label for="nim" class="form-label">NIM : </label>
        <input type="text" class="form-control" name="nim" id="nim" required>
      </li>
      <li class="mb-3">
        <label for="nama" class="form-label">Nama : </label>
        <input type="text" class="form-control" name="nama" id="nama" required>
      </li>
      <li class="mb-3">
        <label for="email" class="form-label">Email : </label>
        <input type="email" class="form-control" name="email" id="email" required>
      </li>
      <li class="mb-3">
        <label for="jurusan" class="form-label">Jurusan : </label>
        <input type="text" class="form-control" name="jurusan" id="jurusan" required>
      </li>
      <li class="mb-3">
        <label for="gambar" class="form-label">Gambar : </label>
        <input type="file" class="form-control" name="gambar" id="gambar">
      </li>
      <br><br>
      <li class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" name="submit">Add</button>
      </li>
    </ul>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>