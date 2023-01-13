<?php
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="w-50  mx-auto border p-3 mt-5">
    <a class="btn btn-primary" href="index.php">Back to Home</a>
    <form action="add.php" method="post">

    <label for="nis">NIS</label>
    <input type="text" id="nis" name="nis"  class="form-control" required>

    <label for="nama_siswa">Nama</label>  
    <input type="text" id="nama_siswa"name="nama_siswa" class="form-control" required>
    
    <label for="jurusan">Jurusan</label>
    <select name="jurusan" id="jurusan" class="form-select form-control" required>
        <option>Pilih Jurusan</option>
        <option value="TEKNIK RPL">TEKNIK RPL</option>
        <option value="TEKNIK MESIN">TEKNIK MESIN</option>
        <option value="TEKNIK TEKSTIL">TEKNIK TEKSTIL</option>
        <option value="TEKNIK OTOTRONIK">TEKNIK OTOTRONIK</option>
    </select>

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" class="form-control" required>

    <label for="no_hp">Telepon</label>
    <input type="text" id="no_hp" name="no_hp" class="form-control" required>

    <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-control" required>
        <option>Pilih Gender</option>
        <option value="LAKI LAKI">LAKI LAKI</option>
        <option value="PEREMPUAN">PEREMPUAN</option>
        <option value="LAINNYA">LAINNYA</option>
      </select>

    <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
    </form>
    </div>
   
   <?php
    if(isset($_POST['tambah'])){
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $jurusanSelect= $_POST['jurusan'];
    if ($jurusanSelect == 'RPL'){
        $jurusan = 'TEKNIK RPL';
    }    
    if ($jurusanSelect == 'MESIN'){
        $jurusan = 'TEKNIK MESIN';
    }    
    if ($jurusanSelect == 'TEKSTIL'){
        $jurusan = 'TEKNIK TEKSTIL';
    }    
    if ($jurusanSelect == 'OTOTRONIK'){
        $jurusan = 'OTOTRONIK';
    }    

    $jenis_kelaminSelect= $_POST['jenis_kelamin'];
    if ($jenis_kelaminSelect == 'LAKI LAKI'){
        $jenis_kelamin = 'LAKI LAKI';
    }    
    if ($jenis_kelaminSelect == 'PEREMPUAN'){
      $jenis_kelamin = 'PEREMPUAN';
    }
    if ($jenis_kelaminSelect == 'LAINNYA'){
      $jenis_kelamin = 'LAINNYA';
    }


    $sqlGet = "SELECT * FROM siswa_rb";
    $queryGet = mysqli_query($koneksi, $sqlGet);
    $cek = mysqli_num_rows($queryGet);

    $sqlInsert = "INSERT INTO siswa_rb(nis,nama_siswa,jurusan,alamat,no_hp,jenis_kelamin)
                  VALUES ('$nis','$nama_siswa','$jurusan','$alamat','$no_hp','$jenis_kelamin')";

    $queryInsert = mysqli_query($koneksi, $sqlInsert);

    // if($cek < 0 && $queryInsert) {
    //     echo "
    //     <div class='alert alert-success'>DATA BERHASIL DITAMBAHKAN <a href='index.php'>Lihat Data</a></div>";
    //   }
    // elseif ($cek > 1) {
    //     echo "
    //     <div class='alert alert-dangger'>DATA GAGAL DITAMBAHKAN <a href='index.php'>Lihat Data</a></div>";
    //   }
    // try {
    //     $queryInsert = mysqli_query($koneksi, $sqlInsert);
    //     echo ("<div class='alert alert-success'>Data Berhasil Ditambahkan<a href='index.php'>Lihat Data</a></div>");
    // } catch (\Throwable $th) {
    //     echo ("<div class='alert alert-danger'>Data Gagal Ditambahkan <a href='index.php'>Lihat Data</a></div>");
    // }
    header('location:index.php');
    }
   ?> 
</body>
</html>