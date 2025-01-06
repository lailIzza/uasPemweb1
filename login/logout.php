<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Arahkan kembali ke halaman login (atau halaman utama)
header("Location:../home.php?message=logout_success");
exit;
?>
