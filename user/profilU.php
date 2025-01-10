<?php
require "../koneksi.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil data user berdasarkan ID
$user_id = $_SESSION['user_id'];
$sql = "SELECT username, email, profile_picture, role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Ambil data transaksi
$sql = "
SELECT 
    o.order_number AS no_pesanan,
    o.product_name AS nama_produk,
    o.total_price AS total_pembayaran,
    pm.name AS metode_pembayaran,
    sm.name AS metode_pengiriman,
    o.order_date AS tanggal_transaksi,
    os.status_name AS status_pesanan,
    c.name AS nama_customer,
    c.phone_number AS no_telp,
    u.email AS email_customer,
    c.address AS alamat_customer
FROM orders o
LEFT JOIN customers c ON o.customer_id = c.id
LEFT JOIN users u ON c.user_id = u.id
LEFT JOIN payment_methods pm ON o.payment_method_id = pm.id
LEFT JOIN shipping_methods sm ON o.shipping_method_id = sm.id
LEFT JOIN order_statuses os ON o.order_status_id = os.id
WHERE u.id = ?
";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Ambil data pesanan
$orders = $result->fetch_all(MYSQLI_ASSOC);

?>

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
            <img src="../gambar/<?php echo htmlspecialchars($userData['profile_picture']); ?>" alt="Foto Profil">
            <div class="username"><?php echo htmlspecialchars($userData['username']); ?></div>
        </div>
            <ul>
                <li><a href="#dashboard"><i class="bx bx-home"></i>Dashboard</a></li>
                <li><a href="#profil"><i class="bx bx-user"></i>Profil Saya</a></li>
                <li><a href="#dataTransaksi"><i class="bx bx-box"></i>Riwayat Pesanan</a></li>
                <li><a href="../login/logout.php"><i class="bx bx-minus-circle"></i>Keluar</a></li>
            </ul>
    </div>

    <!-- Content -->
    <div class="main-content">

        <!-- Dashboard -->
        <h2>Dashboard</h2>
        <div class="welcome-card" id="dashboard">
            <div>
                <h3>Selamat datang, <?php echo htmlspecialchars($userData['username']); ?></h3>
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
                <img src="../gambar/<?php echo htmlspecialchars($userData['profile_picture']); ?>" alt="Foto Profil" class="profile-photo">
            </div>
            <div class="profile-item">
                <div>
                    <strong>Nama</strong>
                    <p id="view-nama"><?php echo htmlspecialchars($userData['username']); ?></p>
                </div>
            </div>
            <div class="profile-item">
                <div>
                    <strong>E-Mail</strong>
                    <p id="view-email"><?php echo htmlspecialchars($userData['email']); ?></p>
                </div>
            </div>
            
        </div>

        <!-- data transaksi -->
        <div class="judul-content">
            <h3 id="dataTransaksi">Data Transaksi</h3>
            <p>Lihat informasi lengkap mengenai status dan rincian pesanan Anda</p>
        </div>

        <!-- loop untuk tiap transaksi -->
        <?php if (!empty($orders)) : ?>
        <div class="container">
            <div class="transactions_container">
                <?php foreach ($orders as $order) : ?>
                <div class="order-number">
                    <h4>Pesanan no <?php echo htmlspecialchars($order['no_pesanan']); ?></h4>
                </div>

                <div class="section">
                    <h2>Ringkasan Pemesanan</h2>
                    <div class="flex-container">
                        <div>
                            <p><span>Nama Produk</span> : <?php echo htmlspecialchars($order['nama_produk']); ?></p>
                            <p><span>Total Pembayaran</span> : Rp. <?php echo number_format($order['total_pembayaran'], 0, ',', '.'); ?></p>
                            <p><span>Metode Pembayaran</span> : <?php echo htmlspecialchars($order['metode_pembayaran']); ?></p>
                        </div>
                        <div>
                            <p><span>Metode Pengiriman</span> : <?php echo htmlspecialchars($order['metode_pengiriman']); ?></p>
                            <p><span>Tanggal Transaksi</span> : <?php echo htmlspecialchars(date('d F Y', strtotime($order['tanggal_transaksi']))); ?></p>
                            <p><span>Status Pemesanan</span> : <?php echo htmlspecialchars($order['status_pesanan']); ?></p>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="section">
                <h2>Info Pembeli</h2>
                <div class="flex-container">
                    <div>
                        <p><span>Nama</span> : <?php echo htmlspecialchars($order['nama_customer']); ?></p>
                        <p><span>No hp</span> : <?php echo htmlspecialchars($order['no_telp']); ?></p>
                    </div>
                    <div>
                        <p><span>E-mail</span> : <?php echo htmlspecialchars($order['email_customer']); ?></p>
                        <p><span>Alamat</span> : <?php echo htmlspecialchars($order['alamat_customer']); ?></p>
                    </div>
                </div> 
            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
                    <p>Tidak ada data transaksi yang ditemukan.</p>
        <?php endif; ?>
    </div>
</body>
</html>