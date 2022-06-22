<?php
session_start();
if ($_SESSION['status_login'] != true) {
  header("location:../login.php");
}
?>

<?php
require("../inc/inc_koneksi.php");
error_reporting(0);
$sql3         = "select username, email , alamat from tb_admin where id =  '$id'";
$q3           = mysqli_query($koneksi, $sql3);
$r3           = mysqli_fetch_object($q3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>39 | Data Kegiatan</title>
  <link rel="icon" href="../img/kaltim.png" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../admin/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/button.css">
  <!-- ===== FontAwesome ===== -->
  <link rel="stylesheet" href="fw/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<style>
  .tombol {
    float: right;
  }

  .container {
    margin-top: 10px;
    margin-bottom: 5px;
  }
</style>

<body class="sb-nav-fixed">
  <main>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="../index.php">Warga</a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../index.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <?php
        require("inc_header.php")
        ?>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kegiatan</h1>
            <hr class="mb-4">
            <br>
            <div class="card mb-4">
              <div class="card-body">
                <div class="col-xl-12 col-md-6">
                </div>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Kegiatan RT 39 Lempake
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-3 mb-4">
                    <?php
                    $sql2         = "select * from tb_kegiatan where status = 1 $where order by kegiatan_id desc LIMIT 20";
                    $q2           = mysqli_query($koneksi, $sql2);
                    if (mysqli_num_rows($q2) > 0) {
                      while ($r2 = mysqli_fetch_array($q2)) {
                    ?>
                        <div class="card" style="width: 15rem; height: 50vh">
                          <img src="../gambar/<?php echo $r2['kegiatan_image'] ?>" class="card-img-top">
                          <div class="card-body">
                            <p class="card-title"><?php echo $r2['nama_kegiatan'] ?></p>
                          </div>
                        </div>
                      <?php }
                    } else { ?> <p style="text-align: center;"> Data Tidak Ada</ps>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </main>
  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; KKN 68 Lempake</div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>