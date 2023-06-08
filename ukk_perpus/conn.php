<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_perpustakaan';

$koneksi = mysqli_connect($host,$username,$password,$database);


//membuat function query 
function query($query) {
  global $conn;       //fungsi global untuk mengambil varibel diluar dari function
  $result = mysqli_query($conn,$query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


?>