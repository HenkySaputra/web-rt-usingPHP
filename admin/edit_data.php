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
//session_start();
//if ($_SESSION['status_login'] != true) {
// header("location:login.php");
//}

$sql1     = "select * from kart_keluarga WHERE kk_id = '" . $_GET['id'] . "' ";
$q1       = mysqli_query($koneksi, $sql1);
if (mysqli_num_rows($q1) == 0) {
  header("location:tables.php");
}
$k1       = mysqli_fetch_object($q1);

if (isset($_POST['simpan'])) {
  $kategori           = $_POST['kategori'];
  $nama               = $_POST['nama'];
  $no_kk              = $_POST['no_kk'];
  $jenis_kelamin      = $_POST['jenis_kelamin'];
  $tempat_lahir       = $_POST['tempat_lahir'];
  $tanggal_lahir      = $_POST['tanggal_lahir'];
  $agama              = $_POST['agama'];
  $pendidikan         = $_POST['pendidikan'];
  $jenis_pekerjaan    = $_POST['jenis_pekerjaan'];
  $golongan_darah     = $_POST['golongan_darah'];
  $alamat             = $_POST['alamat'];
  $no_rumah           = $_POST['no_rumah'];
  $keterangan         = $_POST['keterangan'];
  $status             = $_POST['status'];
  $foto               = $_POST['foto'];

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
  $sql2     = "update kart_keluarga set category_id = '" . $kategori . "', nama = '" . $nama . "', no_kk ='" . $no_kk . "',
  jenis_kelamin ='" . $jenis_kelamin . "',tempat_lahir ='" . $tempat_lahir . "',tanggal_lahir ='" . $tanggal_lahir . "',agama ='" . $agama . "',pendidikan ='" . $pendidikan . "',
  jenis_pekerjaan ='" . $jenis_pekerjaan . "',golongan_darah ='" . $golongan_darah . "',alamat ='" . $alamat . "',no_rumah ='" . $no_rumah . "',gambar ='" . $namagambar . "',
  status = '" . $status . "' where kk_id = '" . $k1->kk_id . "'";
  $q2       = mysqli_query($koneksi, $sql2);
  if ($q2) {
    echo '<script>window.location="tables.php"</script>';
  } else {
    echo "gagal", mysqli_error($koneksi);
  }
}
?>
<?php
error_reporting(0);
?>
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
          <li><a class="dropdown-item" href="#!">Logout</a></li>
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
          <h1 class="mt-4"><a href="tables.php"><i class="fas fa-arrow-left icon" style="font-size: 25px; color : black"></i></a> Buat Data</h1>
          <hr class="mb-4">
          <div class="row">
            <div class="section">
              <div class="box" mb-3>
                <form action="" method="post" enctype="multipart/form-data">
                  <form>
                    <div class="mb-3">
                      <select name="kategori" class="form-control">
                        <option value="">--Pilihan--</option>
                        <?php
                        $sql1     = "select * from tb_kategori order by category_id desc";
                        $q1       = mysqli_query($koneksi, $sql1);
                        while ($r1 = mysqli_fetch_array($q1)) {
                        ?>
                          <option value="<?php echo $r1['category_id'] ?>" <?php echo ($r1['category_id'] == $k1->category_id) ? 'selected' : ""; ?>><?php echo $r1['category_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?php echo $k1->nama ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">No KK</label>
                      <input type="text" class="form-control" name="no_kk" value="<?php echo $k1->no_kk ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $k1->jenis_kelamin ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $k1->tempat_lahir ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Tanggal Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $k1->tanggal_lahir ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Agama</label>
                      <input type="text" class="form-control" name="agama" value="<?php echo $k1->agama ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Pendidikan</label>
                      <input type="text" class="form-control" name="pendidikan" value="<?php echo $k1->pendidikan ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Jenis Pekerjaan</label>
                      <input type="text" class="form-control" name="jenis_pekerjaan" value="<?php echo $k1->jenis_pekerjaan ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Golongan Darah</label>
                      <input type="text" class="form-control" name="golongan_darah" value="<?php echo $k1->golongan_darah ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">Alamat</label>
                      <input type="text" class="form-control" name="alamat" value="<?php echo $k1->alamat ?> ">
                    </div>
                    <div class=" mb-3">
                      <label class="form-label">No Rumah</label>
                      <input type="text" class="form-control" name="no_rumah" value="<?php echo $k1->no_rumah ?> ">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar : </label>
                      <img src="../gambar/<?php echo $k1->gambar ?>" alt="" width="200px" height="100px">
                      <input type="file" class="form-control" name="gambar">
                      <input type="hidden" name="foto" value="<?php echo $k1->gambar ?>"></td>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Keterangan</label>
                      <textarea class="form-control" name="keterangan" rows="5"><?php echo $k1->keterangan ?></textarea>
                    </div>
                    <div class="mb-3">
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