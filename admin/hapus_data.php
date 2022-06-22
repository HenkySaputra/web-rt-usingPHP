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

if (isset($_GET['idd'])) {
  $sql2     = "select gambar from kart_keluarga where kk_id = '" . $_GET['idd'] . "' ";
  $q2       = mysqli_query($koneksi, $sql1);
  $r1       = mysqli_fetch_object($q1);
  unlink('.../gambar/' . $r1->gambar);

  $sql1     = "delete from kart_keluarga WHERE kk_id = '" . $_GET['idd'] . "' ";
  $q1       = mysqli_query($koneksi, $sql1);
  header("location:tables.php");
}
?>