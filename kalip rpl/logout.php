<?php
// FILE: logout.php — Hancurkan Session & redirect ke login
session_start();      // Buka Session yang sedang aktif
session_destroy();    // Hapus semua data Session
header("Location: login.php");
exit();
?>
