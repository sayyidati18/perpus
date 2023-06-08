<?php
    session_start();
    require 'conn.php';

    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
        exit();
    }
    
// Proses Hapus Siswa
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($koneksi, $query);
}

// Ambil Data Siswa
$query = "SELECT * FROM buku";
$result = mysqli_query($koneksi, $query);
    

// Ambil username admin dari session
$admin = $_SESSION['admin'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container mt-5">
      <h1>Managemen Database</h1>
      <a href="tambah.php" class="btn  btn-primary">Tambah Data</a>
       <a href="logout.php" class="btn btn-danger">Logout</a>
      <table class="table">
        <thead>
          <th>
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Nomor ISBN</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
            </tr>
          </th>
        </thead>
        <tbody>
        <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $row['no_isbn']; ?></td>
                        <td><?php echo $row['pengarang']; ?></td>
                        <td><?php echo $row['penerbit']; ?></td>
                        <td><?php echo $row['tahun_terbit']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?hapus=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                 }
                 ?>
        </tbody>
      </table>
    </div>  
  </body>
</html>