<?php // FILE: login.php — Form masuk ?>
<!DOCTYPE html>
<html lang="id"><head>
<meta charset="UTF-8">
<title>Login</title>
<style>
  /* Salin semua CSS dari register.php — tampilannya sama */
  * { margin:0; padding:0; box-sizing:border-box; }
  body { font-family:Arial; background:#1a1a2e;
         display:flex; justify-content:center;
         align-items:center; min-height:100vh; }
  .box { background:white; padding:40px;
         border-radius:12px; width:400px;
         box-shadow:0 8px 32px rgba(0,0,0,0.3); }
  h2 { text-align:center; color:#1a1a2e; margin-bottom:24px; }
  label { display:block; font-size:13px; font-weight:bold;
          color:#333; margin-bottom:5px; }
  input { width:100%; padding:11px 14px;
          border:1.5px solid #ddd; border-radius:7px;
          font-size:14px; margin-bottom:14px; }
  .btn { width:100%; padding:12px; background:#e94560;
         color:white; border:none; border-radius:7px;
         font-size:15px; font-weight:bold; cursor:pointer; }
  .nav-link { text-align:center; margin-top:18px; font-size:13px; }
  .nav-link a { color:#e94560; font-weight:bold; text-decoration:none; }
  .error { background:#ffebee; color:#c62828;
           border:1px solid #ef9a9a; border-radius:6px;
           padding:10px 14px; font-size:13px; margin-bottom:14px; }
</style>
</head><body>

<div class="box">
  <h2>Login</h2>
  <?php
  // Tampilkan pesan error jika ada
  if (isset($_GET["error"]))
    echo '<div class="error">Username atau password salah.</div>';
  ?>
  <form action="proses_login.php" method="POST">
    <label>Username</label>
    <input type="text" name="username"
           placeholder="Masukkan username" required>
    <label>Password</label>
    <input type="password" name="password"
           placeholder="Masukkan password" required>
    <button class="btn" type="submit">Masuk</button>
  </form>

    <!-- Tautan navigasi: arahkan ke halaman register -->
  <div class="nav-link">
    Belum punya akun?
    <a href="register.php">Daftar di sini</a>
  </div>
</div>
</body></html>
