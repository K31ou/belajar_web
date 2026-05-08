<?php
// FILE: proses_login.php — Validasi login & redirect

// PENTING: session_start() wajib di baris paling atas
session_start();

include "koneksi.php";

// Langkah 1: Ambil username dan password dari form
$username = $_POST["username"];
$password = MD5($_POST["password"]);
// MD5() mengubah password ke hash 32 karakter
// agar cocok dengan yang tersimpan di database


// Langkah 2: Cari akun yang cocok di tabel users
$query = "SELECT * FROM users
          WHERE username='$username'
          AND password='$password'";

$hasil = mysqli_query($koneksi, $query);

// Langkah 3: Evaluasi hasil pencarian
if (mysqli_num_rows($hasil) == 1) {
    $data = mysqli_fetch_assoc($hasil);

    // Simpan data ke Session agar bisa diakses
    // di halaman lain selama browser masih terbuka
    $_SESSION["user_id"]  = $data["id"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["login"]    = true;

    // LOGIN BERHASIL: arahkan ke dashboard
    header("Location: dashboard.php");
    exit();
} else {
    // LOGIN GAGAL: kembali ke login dengan pesan error
    header("Location: login.php?error=1");
    exit();
}
mysqli_close($koneksi);
?>
