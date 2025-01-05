<?php
require 'koneksi.php';

// Ambil ID produk dari query string
$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mendapatkan detail produk
$sql_produk = "SELECT p.*, k.nama AS kategori_nama 
               FROM produk p
               LEFT JOIN kategori k ON p.kategori_id = k.id
               WHERE p.id = ?";
$stmt = $conn->prepare($sql_produk);
$stmt->bind_param('i', $id_produk);
$stmt->execute();
$result_produk = $stmt->get_result();

// Jika produk ditemukan
if ($result_produk->num_rows > 0) {
    $produk = $result_produk->fetch_assoc();
} else {
    die("Produk tidak ditemukan.");
}

// produk serupa
$sql_serupa = "SELECT id, nama, gambar, harga 
               FROM produk 
               WHERE kategori_id = ? AND id != ? 
               LIMIT 4"; // Maksimal 4 produk
$stmt_serupa = $conn->prepare($sql_serupa);
$stmt_serupa->bind_param('ii', $produk['kategori_id'], $id_produk);
$stmt_serupa->execute();
$result_serupa = $stmt_serupa->get_result();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/detail.css">
    <title>Detail Produk</title>
</head>
<body>
    <!-- navbar -->
    <?php include('navbar.php'); ?>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="home.php">Home</a> / <a href="produk.php">Product</a> / <strong>Detail Produk</strong>
    </div>

    <!-- Produk Detail -->
    <div class="container">
        <div class="produk-gambar">
            <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
        </div>
        <div class="produk-detail">
            <h1><?= htmlspecialchars($produk['nama']) ?></h1>
            <div class="produk-meta">
                <span><i class='bx bx-check-shield'></i> Dijamin dengan baik</span>
                <span><i class='bx bx-map'></i> Lokasi: Surabaya</span>
                <span><i class='bx bx-time'></i> Diupload 3 bulan lalu</span> <!-- Waktu statis, sesuaikan jika ada di database -->
            </div>
            <h3>Keterangan</h3>
            <p class="produk-keterangan">
                Kami menyarankan para pengguna yang membeli item berharga mahal untuk bertemu langsung 
                dan melakukan pembelian di tempat yang aman (COD). - Admin Bekas.Id
            </p>
            <div class="order-section">
                <h3>Harga</h3>
                <p class="harga">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                <p class="stock">Status: <?= $produk['ketersedian'] ? 'Tersedia' : 'Tidak Tersedia' ?></p>
                <a href="user/checkout.php?id=<?= $produk['id'] ?>" style="text-decoration: none;">
                    <button>Pesan Sekarang</button>
                </a>
            </div>
        </div>
    </div>


    <!-- Deskripsi Produk -->
    <div class="description-section">
        <h3>Deskripsi Produk</h3>
        <p><?= htmlspecialchars($produk['deskripsi']) ?></p>
        <h3>Kondisi Produk:</h3>
        <p><?= htmlspecialchars($produk['kondisi_produk']) ?></p>
        <h3>Bonus:</h3>
        <p><?= htmlspecialchars($produk['bonus_produk'] ?: 'Tidak ada bonus.') ?></p>
    </div>


    <!-- Rekomendasi Produk -->
    <div class="produk-serupa">
        <h3>Produk Serupa</h3>
        <div class="produk-list">
            <?php while ($produk_serupa = $result_serupa->fetch_assoc()): ?>
                <div class="produk-card">
                    <img src="gambar/<?= htmlspecialchars($produk_serupa['gambar']) ?>" alt="<?= htmlspecialchars($produk_serupa['nama']) ?>">
                    <div class="produk-info">
                        <p class="produk-judul"><?= htmlspecialchars($produk_serupa['nama']) ?></p>
                        <p class="produk-harga">Rp <?= number_format($produk_serupa['harga'], 0, ',', '.') ?></p>
                        <a href="detail.php?id=<?= $produk_serupa['id'] ?>"><button>Detail Barang</button></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>


    <!-- footer -->
    <?php include('footer.php'); ?>


</body>

</html>