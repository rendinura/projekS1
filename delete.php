<?php
include'koneksi.php';

$nis = $_GET['nis'];
$sqlDelete = "DELETE FROM siswa_rb WHERE nis='$nis'";
mysqli_query($koneksi, $sqlDelete);

header("location: index.php");
?>