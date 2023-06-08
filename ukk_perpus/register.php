<?php
session_start();
include 'conn.php';

if (isset($_POST['regist'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    // menambahkan username dan password di database

    // Periksa apakah password dan konfirmasi password sama
    if ($password != $confirmPassword) {
        echo "Password tidak sama!";
        exit();
    }
    
    $query = "INSERT INTO admin (`username`, `password`) VALUES ('$username', '$password')";
    $result = mysqli_query($koneksi, $query);


    if($result){
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-4">
<h3 class="mt-5 mb-4">Buat Akun</h3>

<?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
<?php } ?>

<form method="POST" action="">
    <div class="mb-4">
        <label for="username" class="form-label">Masukan Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
    </div>
        <div class="mb-4">
            <label for="password" class="form-label">Buat Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
                <label for="password" class="form-label">Ketik Ulang Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="btn btn-dark mt-4" id="regist" name="regist">Registrasi Akun</button>
        </form>
</div>
</body>
</html>

