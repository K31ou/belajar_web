<?php
// FILE: register.php — Form pendaftaran akun baru
?>
<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8">
<title>Daftar Akun Baru</title>
<style>
  * { margin:0; padding:0; box-sizing:border-box; }
  body { font-family:Arial; background:#1a1a2e;
         display:flex; justify-content:center;
         align-items:center; min-height:100vh; }
  .box { background:white; padding:40px;
         border-radius:12px; width:430px;
         box-shadow:0 8px 32px rgba(0,0,0,0.3); }
  h2 { text-align:center; color:#1a1a2e; margin-bottom:24px; }
  label { display:block; font-size:13px; font-weight:bold;
          color:#333; margin-bottom:5px; }
  input { width:100%; padding:11px 14px;
          border:1.5px solid #ddd; border-radius:7px;
          font-size:14px; margin-bottom:14px; }
  input:focus { outline:none; border-color:#e94560; }
  .btn { width:100%; padding:12px; background:#e94560;
         color:white; border:none; border-radius:7px;
         font-size:15px; font-weight:bold; cursor:pointer; }
  .btn:hover { background:#c73652; }
  .nav-link { text-align:center; margin-top:18px; font-size:13px; }
  .nav-link a { color:#e94560; font-weight:bold; text-decoration:none; }
  .error  { background:#ffebee; color:#c62828;
            border:1px solid #ef9a9a; border-radius:6px;
            padding:10px 14px; font-size:13px; margin-bottom:14px; }
  .sukses { background:#e8f5e9; color:#2e7d32;
            border:1px solid #a5d6a7; border-radius:6px;
            padding:10px 14px; font-size:13px; margin-bottom:14px; }
</style>

</head><body>

  <div class="box">
    <h2>Daftar Akun Baru</h2>
    <?php
if (isset($_GET["error"])) {
  if ($_GET["error"]==1)
    echo '<div class="error">Username sudah digunakan.</div>';
  elseif ($_GET["error"]==2)
    echo '<div class="error">Email sudah terdaftar.</div>';
  elseif ($_GET["error"]==3)
    echo '<div class="error">Password dan konfirmasi tidak cocok.</div>';
}
if (isset($_GET["sukses"]))
  echo '<div class="sukses">Registrasi berhasil! Silakan login.</div>';
?>
    <!-- form akan ditambahkan di Langkah 3 -->
  <form action="proses_register.php" method="POST">
  <label>Nama Lengkap</label>
  <input type="text" name="nama" placeholder="Nama lengkap" required>
  <label>Username</label>
  <input type="text" name="username" placeholder="Username" required>
  <label>Email</label>
  <input type="email" name="email" placeholder="Email" required>
  <label>No. Telepon</label>
  <input type="text" name="no_telepon" placeholder="08xxxxxxxxxx">
  <label>Alamat</label>
  <input type="text" name="alamat" placeholder="Alamat lengkap">
  <label>Password</label>
  <input type="password" name="password" placeholder="Password" required>
  <label>Konfirmasi Password</label>
  <input type="password" name="konfirmasi" placeholder="Ulangi password" required>
  <button class="btn" type="submit">Daftar Sekarang</button>
</form>
<div class="nav-link">
  Sudah punya akun?
  <a href="login.php">Login di sini</a>
</div>

    </div>

</body></html>
