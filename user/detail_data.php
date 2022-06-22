<?php
session_start();
if ($_SESSION['status_login'] != true) {
  header("location:../login.php");
}
?>

<?php
require("../inc/inc_koneksi.php");

//$sql3         = "select email , alamat from tb_admin where id =  '$id'";
//$q3           = mysqli_query($koneksi, $sql3);
//$r3           = mysqli_fetch_object($q3);

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
  <title>39 | Data Kartu Keluarga</title>
  <link rel="icon" href="../img/kaltim.png" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../admin/css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/button.css">
</head>

<style>
  .tombol {
    float: right;
  }
</style>

<body class="sb-nav-fixed">
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
          <h1 class="mt-4">Dashboard</h1>
          <hr class="mb-4">
          <br>
          <div class="card mb-4">
            <div class="card-body">
              <div class="col-xl-12 col-md-6">
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Agama</th>
                  <th>Pendidikan</th>
                  <th>Golongan Darah</th>
                  <th>Alamat</th>
                  <th>No Rumah</th>
                  <th>Gambar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($_GET['search'] != "" || $_GET['kat'] != "") {
                  $where         = "and nama like '%" . $_GET['search'] . "%' and category_id like  '%" . $_GET['kat'] . "%'";
                }
                $no           = 1;
                $sql2         = "select * from kart_keluarga where status = 1 $where order by kk_id desc LIMIT 300";
                $q2           = mysqli_query($koneksi, $sql2);
                if (mysqli_num_rows($q2) > 0) {
                  while ($r2 = mysqli_fetch_array($q2)) {
                ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $r2['nama'] ?></td>
                      <td><?php echo $r2['jenis_kelamin'] ?></td>
                      <td><?php echo $r2['tempat_lahir'] ?></td>
                      <td><?php echo $r2['tanggal_lahir'] ?></td>
                      <td><?php echo $r2['agama'] ?></td>
                      <td><?php echo $r2['pendidikan'] ?></td>
                      <td><?php echo $r2['golongan_darah'] ?></td>
                      <td><?php echo ($r2['alamat']) ?></td>
                      <td><?php echo ($r2['no_rumah']) ?></td>
                      <td> <a href="../gambar/<?php echo $r2['gambar'] ?>" target="_blank"> <img src="../gambar/<?php echo $r2['gambar'] ?>" alt="" width="50px"></a></td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan="8">Tidak Ada Data</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
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
</body>

</html>