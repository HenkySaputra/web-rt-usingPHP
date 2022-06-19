<?php
require("inc/inc_koneksi.php");
?>

<?php
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email    = $_POST['email'];
  $alamat   = $_POST['alamat'];
  $password = $_POST['password'];
  $verify   = $_POST['verify'];

  $hasil = mysqli_query($koneksi, "SELECT * FROM tb_user");
  $baris = mysqli_num_rows($hasil);

  if ($baris < 100) {
    if ($password == $verify) {
      $password = md5($password);

      $sql1 = "insert into tb_user (username,email,alamat,password) values ('$username','$email','$alamat','$password')";
      $q1   = mysqli_query($koneksi, $sql1);
      if ($q1) {
        echo '<script>alert("Berhasil Daftar")</script>';
        echo '<script>window.location="login.php"</script>';
      } else {
        echo ' <script>alert("Gagal Mengirim")</script>';
      }
    } else {
      echo '<script>alert("Konfirmasi Password Salah")</script>';
    }
  } else {
    echo '<script>alert("Username telah digunakan")</script>';
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

  <title>39 | Register</title>
  <link rel="icon" href="img/kaltim.png" />
</head>

<body>
  <div class="login-page">
    <div class="register">
      <a href="login.php"><i class="fas fa-arrow-left icon"></i></a>
      <h2 class="login-title">Register</h2>
      <form action="" method="post">
        <ul>
          <li class="form">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required />
          </li>
          <li class="form">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required />
          </li>
          <li class="form">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" required />
          </li>
          <li class="form">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
            <i class="fas fa-eye pass-icon" onclick="visible()" id="pass-icon"></i>
          </li>
          <li class="form">
            <label for="verify">Konfirmasi Password</label>
            <input type="password" name="verify" id="verify" required />
            <i class="fas fa-eye pass-icon" onclick="visible2()" id="verify-icon"></i>
          </li>
          <br>
          <input type="submit" name="register" class="button-light button-login" value="Register">
        </ul>
      </form>
    </div>
  </div>

  <script src="js/password.js"></script>
</body>

</html>