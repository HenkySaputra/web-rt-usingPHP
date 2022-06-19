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
  .tombol1 {
    justify-content: space-between;
  }

  .tombol {
    float: right;
  }
</style>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="">Admin</a>
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
                <a href="buat_kategori.php" role="button" class="btn btn-success tombol"><i class="fas fa-plus"></i> Buat Kategori</a>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Data Kategori Warga RT 39
            </div>
            <div class="card-body">
              <div class="row">
                <?php
                $sql1         = "select * from tb_kategori order by category_id desc";
                $q1           = mysqli_query($koneksi, $sql1);
                if (mysqli_num_rows($q1) > 0) {
                  while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                    <div class="col-xl-3 col-md-6 mb-3">
                      <a href="detail_data.php?kat=<?php echo $r1['category_id'] ?>">
                        <div class="card bg-primary text-white mb-4">
                          <div class="card-body">
                            <?php echo $r1['category_name'] ?>
                          </div>
                        </div>
                        <a href="edit_kategori.php?id=<?php echo $r1['category_id'] ?>" class="btn btn-success tombol1"> <i class="fas fa-edit"></i> </a> |
                        <a href="hapus_kategori.php?idk=<?php echo $r1['category_id'] ?>" class="btn btn-danger tombol1" onclick="return sweet()"><i class="fas fa-trash-alt"></i> </a></i>
                      </a>
                    </div>
                  <?php }
                } else { ?>
                  <p colspan="8">Tidak Ada Data Kategori</p>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12">

            <div class="calendar"></div>
            <div class="box"></div>
            <br>
          </div>

          <br>
        </div>

        <script type="text/javascript">
          $(function() {
            function onClickHandler(date, obj) {
              /**
               * @date is an array which be included dates(clicked date at first index)
               * @obj is an object which stored calendar interal data.
               * @obj.calendar is an element reference.
               * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
               * @obj.storage.events is all events associated to this date
               */

              var $calendar = obj.calendar;
              var $box = $calendar.parent().siblings('.box').show();
              var text = 'Anda memilih tanggal ';

              if (date[0] !== null) {
                text += date[0].format('DD MMMM YYYY');
              }

              if (date[0] !== null && date[1] !== null) {
                text += ' ~ ';
              } else if (date[0] === null && date[1] == null) {
                text += 'tidak ada';
              }

              if (date[1] !== null) {
                text += date[1].format('DD MMMM YYYY');
              }

              $box.text(text);
            }

            $('.calendar').pignoseCalendar({
              lang: 'ind',
              select: onClickHandler,
              theme: 'blue' // light, dark, blue
            });
          });
        </script>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; KKN 68 Lempake</div>

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