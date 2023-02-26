<?php
session_start();
require 'functions.php';
if(isset($_COOKIE['number']) && isset($_COOKIE['key'])){
  $number = $_COOKIE['number'];
  $key = $_COOKIE['key'];
  $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $number");
  $row = mysqli_fetch_assoc($result);
  if($key===hash('sha256', $row["username"])){
    $_SESSION['login'] = true;
  }
}
if(isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
if(isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      if(isset($_POST["remember"])){
        setcookie('number', $row['id'], time()+60);
        setcookie('key', hash('sha256', $row['username']), time()+60);
      }
      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Halaman Login</title>
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
    <h1>Halaman Login</h1>
    <?php if(isset($error)): ?>
    <p style="color:red; font-style:italic;">username/password salah</p>
    <?php endif; ?>
    <ul>
      <li class="mb-3">
        <label for="username" class="form-label">Username :</label>
        <input type="text" class="form-control" name="username" id="username">
      </li>
      <li class="mb-3">
        <label for="password" class="form-label">Password :</label>
        <input type="password" class="form-control" name="password" id="password">
      </li>
      <li class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </li>
      <br><br>
      <li class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" name="login">Login</button>
      </li>
    </ul>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>