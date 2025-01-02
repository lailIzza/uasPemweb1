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
            <img src="gambar/hp1.jpg" alt="">
        </div>
        <div class="produk-detail">
            <h1>Samsung Galaxy A80</h1>
            <div class="produk-meta">
                <span><i class='bx bx-check-shield'></i> Dijamin dengan baik</span>
                <span><i class='bx bx-map'></i> Jakarta</span>
                <span><i class='bx bx-time'></i> Diupload 3 Bulan lalu</span>
            </div>
            <h3>Keterangan</h3>
            <p class="produk-keterangan">
                Kami menyarankan para pengguna yang membeli item berharga mahal untuk
                bertemu langsung dan melakukan pembelian di tempat yang aman (COD). - Admin Bekas.Id
            </p>
            <div class="order-section">
                <h3>Harga</h3>
                <p class="harga">Rp. 1.500.000</p>
                <p class="stock">Status : Tersedia</p>
                <a href="checkout.php" style="text-decoration: none;"><button>Pesan Sekarang</button></a>
            </div>
        </div>
    </div>

    <!-- Deskripsi Produk -->
    <div class="description-section">
        <h3>Deskripsi Produk</h3>
        <h3>Samsung Galaxy A80</h3>
        <p>
            Nikmati pengalaman smartphone premium dengan Samsung Galaxy A80, yang menghadirkan
            inovasi desain dan performa terbaik. Smartphone ini cocok untuk Anda yang mencari
            keseimbangan antara gaya dan fungsi.
        </p>
        <h3>Kondisi Produk :</h3>
        <ul>
            <li>Kondisi: 90% seperti baru, layar mulus tanpa goresan.</li>
            <li>Tidak ada cacat atau kerusakan pada fungsi.</li>
            <li>Baterai masih sangat awet untuk penggunaan sehari-hari.</li>
            <li>Hanya digunakan oleh pemilik pertama.</li>
        </ul>
        <h3>Bonus :</h3>
        <ul>
            <li>Kotak original Samsung Galaxy A80</li>
            <li>Charger dan kabel data original</li>
            <li>Earphone original Samsung</li>
            <li>Case pelindung transparan</li>
        </ul>
    </div>

    <!-- Rekomendasi Produk -->
    <div class="produk-serupa">
        <h3>Produk Serupa</h3>
        <div class="produk-list">

            <!-- Card Produk -->
            <div class="produk-card">
                <img src="gambar/realmec11.jpg" alt="HP 2">
                <div class="produk-info">
                    <p class="produk-judul">Realme C11</p>
                    <p class="produk-harga">Rp 2.500.000</p>
                    <p class="produk-rating"><i class='bx bxs-star'></i> 4.8 | Stok 5</p>
                    <button>Detail Barang</button>
                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php include('footer.php'); ?>


</body>

</html>