<?php
// FILE: proses_register.php — Logika penyimpanan data

include "koneksi.php";

// Langkah 1: Ambil semua data yang dikirim dari form
$nama      = $_POST["nama"];
$username  = $_POST["username"];
$email     = $_POST["email"];
$no_telp   = $_POST["no_telepon"];
$alamat    = $_POST["alamat"];
$password  = $_POST["password"];
$konfirmasi = $_POST["konfirmasi"];

// Langkah 2: Validasi — cek konfirmasi password
if ($password !== $konfirmasi) {
    header("Location: register.php?error=3");
    exit();
}

// Cek apakah username sudah ada di tabel users
$cek_user = mysqli_query($koneksi,
  "SELECT id FROM users WHERE username='$username'");
if (mysqli_num_rows($cek_user) > 0) {
    header("Location: register.php?error=1");
    exit();
}

// Cek apakah email sudah ada di tabel user_detail
$cek_email = mysqli_query($koneksi,
  "SELECT id FROM user_detail WHERE email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    header("Location: register.php?error=2");
    exit();
}

// Langkah 3: Simpan akun ke tabel users
// MD5() mengenkripsi password menjadi 32 karakter
$sql_user = "INSERT INTO users (username, password)
            VALUES ('$username', MD5('$password'))";

mysqli_query($koneksi, $sql_user);

// Ambil ID yang baru saja di-INSERT
$user_id = mysqli_insert_id($koneksi);

// Langkah 4: Simpan detail profil ke tabel user_detail
// user_id diisi dari ID yang didapat di Langkah 3
$sql_detail = "INSERT INTO user_detail
              (user_id, nama, email, no_telepon, alamat)
              VALUES ('$user_id','$nama','$email',
                      '$no_telp','$alamat')";

mysqli_query($koneksi, $sql_detail);
mysqli_close($koneksi);

// Redirect ke register.php dengan pesan sukses
header("Location: register.php?sukses=1");
exit();
?>
