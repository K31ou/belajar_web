<?php
// FILE: dashboard.php — Halaman setelah login

// PENTING: session_start() wajib di baris paling atas
session_start();

// Langkah 1: PROTEKSI — cek apakah user sudah login
// Jika belum ada Session, paksa kembali ke login
if (!isset($_SESSION["login"]) ||
     $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

// Langkah 2: Query INNER JOIN
// Gabungkan data dari tabel users dan user_detail
// berdasarkan relasi: users.id = user_detail.user_id
$query = "SELECT
    u.id, u.username, u.tgl_daftar,
    d.nama, d.email, d.no_telepon, d.alamat
  FROM users u
  INNER JOIN user_detail d ON u.id = d.user_id
  ORDER BY u.tgl_daftar DESC";

$hasil = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
  body { font-family:Arial; background:#f0f4f8; margin:0; }
  .topbar { background:#1a1a2e; padding:14px 30px;
            display:flex; justify-content:space-between;
            align-items:center; }
  .topbar h1 { color:white; font-size:18px; }
  .topbar span { color:#aaa; font-size:13px; }
  .logout { color:#e94560; text-decoration:none;
            font-weight:bold; font-size:13px; }
  .container { max-width:980px; margin:30px auto; padding:0 20px; }
  .welcome { background:white; padding:20px 24px;
             border-radius:10px; margin-bottom:20px;
             border-left:5px solid #e94560; }
  .welcome h2 { color:#1a1a2e; margin-bottom:4px; }
  .welcome p  { color:#666; font-size:14px; }
  .badge { background:#e94560; color:white; padding:4px 12px;
           border-radius:20px; font-size:12px;
           margin-bottom:14px; display:inline-block; }

  table { width:100%; border-collapse:collapse; background:white;
          border-radius:10px; overflow:hidden;
          box-shadow:0 2px 12px rgba(0,0,0,0.08); }
  thead { background:#1a1a2e; }
  th { color:white; padding:12px 14px; text-align:left;
       font-size:13px; letter-spacing:0.4px; }
  td { padding:11px 14px; font-size:14px; color:#444; }
  tbody tr:nth-child(even) { background:#f9f9f9; }
  tbody tr:hover { background:#fff3e0; }
  .id-badge { background:#1a1a2e; color:white;
              padding:2px 8px; border-radius:10px; font-size:12px; }

</style>
</head><body>
<!-- TOP BAR -->
<div class="topbar">
  <h1>Dashboard</h1>
  <div>
    <span>Halo, <?= $_SESSION["username"] ?></span>&nbsp;&nbsp;
    <a class="logout" href="logout.php">Keluar</a>
  </div>
</div>

<div class="container">
  <div class="welcome">
    <h2>Selamat Datang, <?= $_SESSION["username"] ?>!</h2>
    <p>Berikut adalah data seluruh pengguna yang terdaftar.</p>
  </div>
  <div class="badge">
    Total: <?= mysqli_num_rows($hasil) ?> pengguna
  </div>

  <table>
    <thead><tr>
      <th>ID</th><th>Nama</th><th>Username</th>
      <th>Email</th><th>No. Telepon</th>
      <th>Alamat</th><th>Tgl. Daftar</th>
    </tr></thead>
    <tbody>
    <?php while ($r = mysqli_fetch_assoc($hasil)): ?>
      <tr>
        <td><span class="id-badge"><?= $r["id"] ?></span></td>
        <td><?= $r["nama"] ?></td>
        <td><?= $r["username"] ?></td>
        <td><?= $r["email"] ?></td>
        <td><?= $r["no_telepon"] ?: "-" ?></td>
        <td><?= $r["alamat"] ?: "-" ?></td>
        <td><?= $r["tgl_daftar"] ?></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body></html>
<?php mysqli_close($koneksi); ?>
