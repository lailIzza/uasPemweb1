<?php
require "koneksi.php";

// Query untuk mengambil data produk (hanya produk yang tersedia)
$sql = "SELECT id, nama, deskripsi, gambar, harga, kondisi_produk FROM produk WHERE ketersedian = 1 LIMIT 10";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BekasId</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

    <!-- navbar -->
    <?php include('navbar.php'); ?>

    <!-- slide -->
    <?php include('slide.php'); ?>

    <!-- Kategori Pilihan -->
    <div class="container">
        <div class="category-section">
            <h2>Kategori Pilihan</h2>
            <div class="categories">
                <div class="category">
                    <img src="gambar/home/sneakers.png" alt="">
                    <p>Sepatu</p>
                </div>
                <div class="category">
                    <img src="gambar/home/polo.png" alt="">
                    <p>Fashion Pria</p>
                </div>
                <div class="category">
                    <img src="gambar/home/dress.png" alt="">
                    <p>Fashion Wanita</p>
                </div>
                <div class="category">
                    <img src="gambar/home/handbag.png" alt="">
                    <p>Tas</p>
                </div>
                <div class="category">
                    <img src="gambar/home/laptop.png" alt="">
                    <p>Elektronik</p>
                </div>
                <div class="category">
                    <img src="gambar/home/jewelry.png" alt="">
                    <p>Aksesoris</p>
                </div>
            </div>
        </div>
    </div>

        <!-- Rekomendasi -->
        <div class="recommendation-section">
            <h2>Rekomendasi untukmu</h2>
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="detail.php?id=' . $row['id'] . '" style="text-decoration: none; color: inherit;">';
                        echo '<div class="product-card">';
                        echo '<div class="image-wrapper">';
                        echo '<img src="' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['nama']) . '">';
                        echo '</div>';
                        echo '<div class="product-info">';
                        echo '<h3>' . htmlspecialchars($row['nama']) . '</h3>';
                        echo '<h5>' .htmlspecialchars($row['kondisi_produk']) . '</h5>';
                        echo '<p class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                } else {
                    echo '<p>Tidak ada produk tersedia.</p>';
                }
                ?>
            </div>
            
            <div class="see-more">
                <a href="produk.php" class="btn-see-more">Lihat Lebih Banyak</a>
            </div>
        </div>
    <!-- END Rekomendasi -->

    <!-- Opsi -->
    <div class="container-opsi">
        <div class="header">
            <img src="gambar/woman.png" alt="A woman smiling and pointing to the text">
            <div class="text">
                <h2>Mengapa kita Harus Berbelanja di Bekas.id</h2>
            </div>
        </div>
        <div class="features">
            <div class="feature">
                <i class='bx bxs-dollar-circle' style="font-size: 4rem;"></i>
                <p>Harga yang Terjangkau</p>
            </div>
            <div class="feature">
                <i class='bx bxs-truck' style="font-size: 4rem;"></i>
                <p>Pengiriman ke Seluruh Indonesia</p>
            </div>
            <div class="feature">
                <i class='bx bxs-store' style="font-size: 4rem;"></i>
                <p>Telah bekerja dengan Mitra terpercaya</p>
            </div>
        </div>
        <div class="section">
            <h3>Tentang Bekas.id</h3>
            <p>Bekas.id adalah platform inovatif yang memungkinkan pengguna untuk membeli dan menjual barang preloved
                (barang bekas berkualitas). Dengan fokus pada keberlanjutan dan gaya hidup hemat, Bekas.id memberikan
                solusi praktis bagi mereka yang ingin mendapatkan barang berkualitas dengan harga lebih terjangkau
                sekaligus mendukung upaya pengurangan limbah. Platform ini dirancang agar mudah digunakan, menghubungkan
                penjual dan pembeli secara langsung, serta menawarkan berbagai kategori produk mulai dari fashion,
                elektronik, hingga perlengkapan rumah tangga. Bekas.id hadir sebagai bagian dari tren ekonomi sirkular,
                membantu masyarakat mengubah barang tak terpakai menjadi peluang baru.</p>
        </div>
        <div class="section">
            <h3>Mitra Kami</h3>
            <p>Bekas.id berkomitmen untuk memberikan pengalaman terbaik bagi pengguna dengan menjalin kerja sama
                strategis bersama mitra terpercaya. Melalui kolaborasi ini, kami memastikan bahwa setiap transaksi yang
                terjadi di platform kami aman, nyaman, dan memenuhi standar kualitas yang tinggi. Mitra-mitra terpercaya
                kami mencakup berbagai sektor, mulai dari penyedia layanan logistik untuk pengiriman cepat dan aman,
                hingga mitra pembayaran yang memastikan transaksi berjalan lancar. Bersama mitra kami, Bekas.id terus
                mendukung gaya hidup yang lebih berkelanjutan, sekaligus menciptakan ekosistem preloved yang lebih
                profesional dan terpercaya. Mari bersama-sama mengubah barang bekas menjadi nilai baru!</p>
        </div>
    </div>
    <!-- END Opsi -->

    <!-- Footer -->
    <?php include('footer.php'); ?>

</body>
</html>

<?php
$conn->close();
?>