<?php
// $koneksi = mysqli_connect('localhost', 'root','');
// mysqli_select_db($koneksi, 'sekolah_rb');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "sekolah_rb";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed" . mysqli_connect_error());
}
// echo "Connected successfully";
?>