<?php
session_start();
require("inc/inc_koneksi.php");
?>

<?php

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql1 = "select * from tb_user where email = '" . $email . "' and password = '" . $password . "' ";
  $q1   = mysqli_query($koneksi, $sql1);
  $sql2 = "select * from tb_admin where email = '" . $email . "' and password = '" . $password . "' ";
  $q2       = mysqli_query($koneksi, $sql2);
  if (mysqli_num_rows($q1) > 0) {
    $r1 = mysqli_fetch_object($q1);
    $_SESSION['status_login'] = true;
    $_SESSION['a_global'] = $r1;
    $_SESSION['id'] = $r1->id;
    echo '<script>window.location="./user/data_kategori.php"</script>';
  } elseif (mysqli_num_rows($q2) > 0) {
    $r2 = mysqli_fetch_object($q2);
    $_SESSION['status_login'] = true;
    $_SESSION['a_global'] = $r2;
    $_SESSION['id'] = $r2->id;
    echo '<script>window.location="./admin/data_kategori.php"</script>';
  } else {
    echo '<script>alert("username dan password anda salah")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/Favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/Favicon/site.webmanifest">

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <!-- ===== FontAwesome ===== -->
  <link rel="stylesheet" href="fw/css/all.min.css">

  <!-- ===== Bootstrap ===== -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <title>39 | Login</title>
  <link rel="icon" href="img/kaltim.png" />
</head>

<body>
  <div class="login-page">
    <div class="login">
      <a href="index.php"><i class="fas fa-arrow-left icon"></i></a>
      <h2 class="login-title">Login</h2>
      <form action="" method="post">
        <ul>
          <li class="form">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required />
          </li>
          <li class="form">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
            <i class="fas fa-eye pass-icon" onclick="visible()" id="pass-icon"></i>
          </li>
          <li class="remember">
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember">Remember me</label>
          </li>
          <li>
            <input type="submit" name="login" class="button-light button-login" value="Login">
          </li>
          <li class="login-signup">
            <p>Don't have an account? <a href="registrasi.php">Sign Up</a></p>
          </li>
        </ul>
      </form>
    </div>
  </div>

  <script src="js/password.js"></script>
</body>

</html>