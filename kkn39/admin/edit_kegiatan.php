<?php
require("../inc/inc_koneksi.php");
?>
<?php
session_start();
if ($_SESSION['status_login'] != true) {
  header("location:../login.php");
}
?>

<?php

$sql1     = "select * from tb_kegiatan WHERE kegiatan_id = '" . $_GET['id'] . "' ";
$q1       = mysqli_query($koneksi, $sql1);
if (mysqli_num_rows($q1) == 0) {
  header("location:index.php");
}
$k1       = mysqli_fetch_object($q1);

if (isset($_POST['simpan'])) {
  $nama_kegiatan       = $_POST['nama_kegiatan'];
  $status              = $_POST['status'];
  $foto                = $_POST['foto'];

  $filename = $_FILES['gambar']['name'];
  $tmp_name = $_FILES['gambar']['tmp_name'];

  if ($filename != '') {
    $type1    = explode('.', $filename);
    $type2    = $type1[1];
    $newname  = 'berkas' . time() . '.' . $type2;

    $tipe_diizinkan   = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'PNG', 'JPEG', 'JPG');
    if (!in_array($type2, $tipe_diizinkan)) {
      echo '<script>alert("Format Tidak Sesuai")</script>';
    } else {
      unlink('../gambar/' . $foto);
      move_uploaded_file($tmp_name, '../gambar/' . $newname);
      $namagambar = $newname;
    }
  } else {
    $namagambar = $foto;
  }
  $sql2     = "update tb_kegiatan set nama_kegiatan = '" . $nama_kegiatan . "', kegiatan_image ='" . $namagambar . "',
  status = '" . $status . "' where kegiatan_id = '" . $k1->kegiatan_id . "'";
  $q2       = mysqli_query($koneksi, $sql2);
  if ($q2) {
    echo '<script>window.location="index.php"</script>';
  } else {
    echo "gagal", mysqli_error($koneksi);
  }
}
?>
<?php
error_reporting(0);
?>
<style>
  .tombol {
    float: right;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>39 | Table</title>
  <link rel="icon" href="../img/kaltim.png" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="css/alert.css">
  <script src="js/js.js"></script>
</head>
<style>
  .tombol {
    float: right;
  }
</style>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Admin</a>
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
          <h1 class="mt-4"><a href="index.php"><i class="fas fa-arrow-left icon" style="font-size: 25px; color : black"></i></a> Buat Kegiatan</h1>
          <hr class="mb-4">
          <div class="row">
            <div class="section">
              <div class="box" mb-3>
                <form action="" method="post" enctype="multipart/form-data">
                  <form>
                    <div class="mb-3">
                      <label class="form-label">Nama Kegiatan</label>
                      <input type="text" class="form-control" name="nama_kegiatan" value="<?php echo $k1->nama_kegiatan ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar : </label>
                      <img src="../gambar/<?php echo $k1->kegiatan_image ?>" alt="" width="200px" height="100px">
                      <input type="file" class="form-control" name="gambar">
                      <input type="hidden" name="foto" value="<?php echo $k1->kegiatan_image ?>"></td>
                    </div>
                    <div class=" mb-3">
                      <select name="status" class="form-control">
                        <option selected disabled>Pilihan</option>
                        <option value="1" <?php echo ($k1->status == 1)  ? 'selected' : ""; ?>>Tampil</option>
                        <option value="0" <?php echo ($k1->status == 0)  ? 'selected' : ""; ?>>Tidak Tampil</option>
                      </select>
                    </div>
                    <div class="col-xl-12 col-md-6">
                      <a href="" role="button"><input type="submit" name="simpan" class="btn btn-success tombol" onclick="sweet()" value="Simpan"></a>
                    </div>
                  </form>
                </form>
              </div>
            </div>
          </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; KKN 39 Lempake</div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
  <script>
    function sweet() {
      swal("Ubah Data Berhasil")
    }
  </script>
</body>

</html>