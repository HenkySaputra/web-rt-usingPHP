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

if (isset($_GET['idk'])) {
  $sql1     = "delete from tb_kategori where category_id = '" . $_GET['idk'] . "' ";
  $q1       = mysqli_query($koneksi, $sql1);
  header("location:data_kategori.php");
}
?>