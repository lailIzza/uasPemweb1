<?php
    require '../koneksi.php';
    // Ambil ID produk dari URL
    $id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Query untuk mendapatkan data produk
    $sql_produk = "SELECT * FROM produk WHERE id = ?";
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="checkout.css">
    <title>Checkout Produk</title>
</head>
<body>
    <!-- navbar -->
    <div class="navbar-container">
        <nav class="navbar">
        <div class="navbar-back">
            <a href="../detail.php?id=<?= $produk['id'] ?>"><i class="bx bx-arrow-back"></i></a>
        </div>
        <div class="navbar-title">
            <h1>Ringkasan Pesanan</h1>
            <p>Informasi Anda Aman dan Terenskripsi</p>
        </div>
        </nav>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
    <a href="../home.php">Home</a> / <a href="../produk.php?id=<?= $produk['id'] ?>">Produk</a> / <a href="../detail.php?id=<?= $produk['id'] ?>">Detail Produk</a> / <strong>Checkout Produk</strong>
    </div>

    <div class="container">
        <!-- Informasi Penerima -->
        <div class="section">
            <h3><i class='bx bx-user'></i> Informasi Penerima</h3>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <label for="nomor-hp">Nomor HP</label>
                <input type="text" id="nomor-hp" placeholder="Masukkan nomor HP">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Masukkan email">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
            </div>
        </div>

        <!-- Ringkasan Order -->
        <div class="section order-summary">
            <div class="gambar-produk">
                <img src="../gambar/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
            </div>
            <h3><?= htmlspecialchars($produk['nama']) ?></h3>
            <div class="details">
                <hr>
                <p>Harga Produk: Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                <p>Ongkir: Rp. 35.000</p>
                <hr>
                <p class="total">Total: Rp. <?= number_format($produk['harga'] + 35000, 0, ',', '.') ?></p>
            </div>
            <div class="button-group">
                <button class="button primary"><i class='bx bx-check-circle'></i> Pesan Sekarang</button>
            </div>
        </div>

        <!-- Metode Pengiriman -->
        <div class="section">
            <h3><i class='bx bx-truck'></i> Metode Pengiriman</h3>
            <div class="shipping-method">
                <div class="method">
                    <i class='bx bx-package'></i> SPX Santard <span>Rp. 15.000</span>
                </div>
                <div class="method">
                    <i class='bx bx-package'></i> SPX Instant <span>Rp. 30.000</span>
                </div>
                <div class="method">
                    <i class='bx bx-package'></i> SPX SameDay <span>Rp. 50.000</span>
                </div>
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="section">
            <h3><i class='bx bx-credit-card'></i> Metode Pembayaran</h3>
            <div class="payment-method">
                <div class="method"><i class='bx bx-money'></i> COD</div>
                <div class="method"><i class='bx bx-transfer-alt'></i> Transfer Akun Virtual</div>
                <div class="method"><i class='bx bx-wallet'></i> E-Money</div>
            </div>
        </div>

    </div>
</body>
</html>