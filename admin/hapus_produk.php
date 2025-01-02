<?php
require "../koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query untuk mendapatkan data gambar produk
    $query_gambar = $conn->prepare("SELECT gambar FROM produk WHERE id = ?");
    $query_gambar->bind_param("i", $id);
    $query_gambar->execute();
    $query_gambar->bind_result($gambar);
    $query_gambar->fetch();
    $query_gambar->close();

    // Hapus file gambar dari server (jika ada)
    if ($gambar && file_exists("../gambar/" . $gambar)) {
        unlink("../gambar/" . $gambar);
    }

    // Query untuk menghapus data produk dari database
    $query_hapus = $conn->prepare("DELETE FROM produk WHERE id = ?");
    $query_hapus->bind_param("i", $id);

    if ($query_hapus->execute()) {
        // Redirect kembali ke halaman produk setelah berhasil
        header("Location: profil.php?pesan=Produk berhasil dihapus");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $query_hapus->error;
    }

    $query_hapus->close();
    $conn->close();
} else {
    // Jika tidak ada ID di URL
    header("Location: profil.php?pesan=ID produk tidak valid");
    exit();
}
