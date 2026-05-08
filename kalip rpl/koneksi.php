<?php 
    $host     = "localhost";
    $username = "root";
    $password = "";
    $database = "db_weapp";

    $koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("KONEKSI GAGAL: " . mysqli_connect_error());
}
?>
