<?php
require 'functions.php';
if (isset($_POST["registrasi"])) {
  if(registrasi($_POST) > 0) {
    echo "<script>
          alert('user baru berhasil ditambahkan');
          </script>";
  } else {
    echo mysqli_error($conn);
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
  <title>Halaman Registrasi</title>
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
  <form action="" method="post">
    <h1>Halaman Registrasi</h1>
    <ul>
      <li class="mb-3">
        <label for="username" class="form-label">Username :</label>
        <input type="text" class="form-control" name="username" id="username">
      </li>
      <li class="mb-3">
        <label for="password" class="form-label">Password :</label>
        <input type="password" class="form-control" name="password" id="password">
      </li>
      <li class="mb-3">
        <label for="password2" class="form-label">Konfirmasi Password :</label>
        <input type="password" class="form-control" name="password2" id="password2">
      </li>
      <br><br>
      <li class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" name="registrasi">Register</button>
      </li>
    </ul>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>