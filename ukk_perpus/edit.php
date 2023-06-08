<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM buku WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $no_isbn = $_POST['no_isbn'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    $query = "UPDATE buku SET judul = '$judul', no_isbn = '$no_isbn', pengarang = '$pengarang', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit' , kategori = '$kategori' WHERE id = $id";

    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Siswa</h1>

        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?=$row['judul']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_isbn" class="form-label">Nomor ISBN</label>
                <input type="text" class="form-control" id="no_isbn" name="no_isbn" value="<?php echo $row['no_isbn']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang Buku</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $row['pengarang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit Buku</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Deskripsi Buku</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>
