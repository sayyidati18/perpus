<?php
require "conn.php";
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Proses Tambah data 
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $no_isbn = $_POST['no_isbn'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    $query = "INSERT INTO buku (judul, no_isbn, pengarang, penerbit, tahun_terbit, kategori) VALUES ('$judul', '$no_isbn', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container mt-3">
<h3>Tambah Data</h3>
<form method="POST" action="tambah.php">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="no_isbn" class="form-label">Nomor ISBN</label>
                <input type="text" class="form-control" id="no_isbn" name="no_isbn" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang Buku</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit Buku</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Buku</label>
                <input type="text" class="form-control" id="kategori" name="kategori" required>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </form>
</div>
</body>
</html>