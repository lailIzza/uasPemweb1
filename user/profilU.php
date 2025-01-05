<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="profilU.css">
    <title>Profil user</title>
</head>
<body>
    <!-- navbar -->
    <?php include('../navbar.php'); ?>

    <!-- sidebar -->
    <div class="sidebar">
        <div class="profile-section">
            <img alt="User profile picture" src="https://via.placeholder.com/50" />
            <div class="username">Laila</div>
        </div>
            <ul>
                <li><a href="dashboard.php"><i class="bx bx-home"></i>Dashboard</a></li>
                <li><a href="#profil"><i class="bx bx-user"></i>Profil Saya</a></li>
                <li><a href="#dataTransaksi"><i class="bx bx-box"></i>Data Transaksi</a></li>
                <li><a href="tambah_produk.php"><i class="bx bx-minus-circle"></i>Keluar</a></li>
            </ul>
    </div>

    <!-- Content -->
    <div class="main-content">

        <!-- Dashboard -->
        <h2>Dashboard</h2>
        <div class="welcome-card">
            <img src="gambar/woman.png" alt="">
            <div>
                <h3>Selamat datang, Laila</h3>
                <p>Kelola informasi akun admin Anda untuk memastikan pengelolaan sistem tetap aman dan efisien.</p>
                <p>Perbarui data Anda agar tetap relevan dan sesuai kebutuhan operasional.</p>
            </div>
        </div>

        <!-- Profile -->
        <div class="judul-content">
            <h3 id="profil">Profil Anda</h3>
            <p>Perbarui informasi pribadi Anda untuk pengalaman yang lebih baik di Bekas.Id.</p>
        </div>
        <div class="profile-card">
            <div class="profile-item">
                <div><strong>Foto Profil</strong></div>
                <img src="https://via.placeholder.com/100" alt="Foto Profil" class="profile-photo">
            </div>
            <div class="profile-item">
                <div>
                    <strong>Nama</strong>
                    <p id="view-nama">Laila</p>
                    <input type="text" id="input-nama" name="nama" value="Laila" class="profile-input" style="display: none;">
                </div>
            </div>
            <div class="profile-item">
                <div>
                    <strong>E-Mail</strong>
                    <p id="view-email">laila.yyy@gmail.com</p>
                    <input type="email" id="input-email" name="email" value="laila.yyy@gmail.com" class="profile-input" style="display: none;">
                </div>
            </div>
            <div class="profile-item">
                <div>
                    <strong>No Hp</strong>
                    <p id="view-hp">081234567899001</p>
                    <input type="text" id="input-hp" name="hp" value="081234567899001" class="profile-input" style="display: none;">
                </div>
            </div>
            <button class="edit-btn" id="edit-button" onclick="toggleEditMode()">Edit Profil</button>
            <button class="save-btn" id="save-button" style="display: none;" onclick="saveChanges()">Simpan</button>
        </div>

        <!-- data transaksi -->
        <div class="judul-content">
            <h3 id="dataTransaksi">Data Transaksi</h3>
            <p>Lihat informasi lengkap mengenai status dan rincian pesanan Anda</p>
        </div>
        <div class="container">
            <div class="order-number">
                <h4>Pesanan no 0RD056788</h4>
            </div>

            <div class="section">
                <h2>Ringkasan Pemesanan</h2>
                <div class="flex-container">
                    <div>
                        <p><span>Nama Produk</span> : Samsung A20</p>
                        <p><span>Total Pembayaran</span> : Rp. 150.000</p>
                        <p><span>Metode Pembayaran</span> : COD</p>
                    </div>
                    <div>
                        <p><span>Metode Pengiriman</span> : SPX instant</p>
                        <p><span>Tanggal Transaksi</span> : 15 Desember 2025</p>
                        <p><span>Status Pemesanan</span> : Dalam Perjalanan</p>
                    </div>
                </div>
            </div>

            <hr>
            <div class="section">
            <h2>Info Pembeli</h2>
            <div class="flex-container">
                <div>
                    <p><span>Nama</span> : Zeyyo</p>
                    <p><span>No hp</span> : 0836676444555</p>
                </div>
                <div>
                    <p><span>E-mail</span> : Zeyyo@gmail.com</p>
                    <p><span>Alamat</span> : Jln. mawar 45737, Jakarta</p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>