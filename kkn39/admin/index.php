<?php
require("../inc/inc_koneksi.php");
?>

<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>39 | Admin</title>
    <link rel="icon" href="../img/kaltim.png" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/alert.css">
    <script src="js/js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
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
                    <h1 class="mt-4">Kegiatan</h1>
                    <hr class="mb-4">
                    <br>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-xl-12 col-md-6">
                                <a href="buat_kegiatan.php" role="button" class="btn btn-success tombol"><i class="fas fa-plus"></i> Buat Kegiatan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no           = 1;
                                $sql1         = "select * from tb_kegiatan order by kegiatan_id desc";
                                $q1           = mysqli_query($koneksi, $sql1);
                                if (mysqli_num_rows($q1) > 0) {
                                    while ($row   = mysqli_fetch_array($q1)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['nama_kegiatan'] ?></td>
                                            <td> <a href="../gambar/<?php echo $row['kegiatan_image'] ?>" target="_blank"> <img src="../gambar/<?php echo $row['kegiatan_image'] ?>" alt="" width="50px"></a></td>
                                            <td><?php echo ($row['status'] == 0) ? 'Tidak Tampil' : 'Tampil' ?></td>
                                            <td>
                                                <div>
                                                    <a href="edit_kegiatan.php?id=<?php echo $row['kegiatan_id'] ?>" class="btn btn-success"> <i class="fas fa-edit"></i> </a> |
                                                    <a href="hapus_kegiatan.php?idd=<?php echo $row['kegiatan_id'] ?>" class="btn btn-danger" onclick="return sweet()"><i class="fas fa-trash-alt"></i> </a>
                                                </div>
                                            </td>
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
    <script>
        function sweet() {
            swal("Data Berhasil Di Hapus")
        }
    </script>
</body>

</html>