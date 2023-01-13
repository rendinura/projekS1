<?php
  include 'koneksi.php';
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="#" alt="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <title>Aplikasi CRUD</title>
    <style>
      body{
        background-image: url(jpg);
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger me-2" href="logout.php">Logout</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="<?php if (isset($_GET['cari'])) {
        echo $_GET['cari'];
        } ?>" arialabel="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <div class="container mt-3" style="border-radius-40px">
    <a href="add.php" class="btn btn-primary btn-medium mb-3"><i class='fa fa-plus'></i>Tambah Data</a>
    <!-- <a href="logout.php" class="btn btn-danger btn-medium mb-3 "></i>Logout</a> -->
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </thead>

        <?php
          include("koneksi.php");
          // tombol percarian
          if (isset($_GET['cari'])) {
              global $koneksi;
              $pencarian = mysqli_real_escape_string($koneksi, $_GET['cari']);
              $query = "SELECT * FROM siswa_rb WHERE nis like '%" . $pencarian . "%' or nama_siswa like '%" . $pencarian . "%' or jurusan like '%"
               . $pencarian . "%' or alamat like '%" . $pencarian . "%' or no_hp like '%" . $pencarian . "%' or jenis_kelamin like '%" . $pencarian . "%'";
          } else {
            $query = "SELECT * FROM siswa_rb";
          }
          
          $ambildata = mysqli_query($koneksi, $query);

          while($tampil = mysqli_fetch_array($ambildata)) {
            echo "
            <tbody>
                <tr>
                  <td>$tampil[nis]</td>
                  <td>$tampil[nama_siswa]</td>
                  <td>$tampil[jurusan]</td>
                  <td>$tampil[alamat]</td>
                  <td>$tampil[no_hp]</td>
                  <td>$tampil[jenis_kelamin]</td>
                  <td>
                    <div class='row'>
                        <div class='col d-flex justify-content-center'>
                        <a href= 'update.php?nis=$tampil[nis]' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i>Update</a>
                        </div>
                        <div class='col d-flex justify-content-center'>
                        <a onclick return cofirm ('Kamu Yakin Menghapus Data?') href= 'delete.php?nis=$tampil[nis]' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>Delete</a>
                        </div>
                  </td>
                </tr>
            </tbody>
            ";
          }
        ?>
        </table>
    </div>
</body>
</html>