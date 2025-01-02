<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Belanja</title>
</head>

<body>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .header-container {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .header {
        background-color: #222d3c;
        color: white;
        text-align: center;
        padding: 40px;
        width: 100%;
        max-width: 1400px;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        font-size: 34px;
        margin: 0;
    }

    .header p {
        font-size: 22px;
        margin: 10px 0 0;
    }

    .main-container {
        max-width: 1000px;
        margin: 5px auto;
        padding: 50px;
    }

    .step-container {
        background-color: white;
        padding: 40px;
        margin-bottom: 60px;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
    }

    .step {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .step img {
        width: 200px;
        height: auto;
        margin-right: 20px;
    }

    .step-number {
        background-color: #f5a623;
        color: white;
        font-size: 24px;
        font-weight: bold;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 20px;
    }

    .step-content {
        flex: 1;
        margin-left: 10px;
    }

    .step-content h3 {
        font-weight: bold;
        display: flex;
        align-items: center;
        margin: 0;
        font-size: 24px;
        color: #3D3D3D;
    }

    .step-content p {
        font-weight: bold;
        margin: 10px 0 0;
        color: #A6A6A6;
        padding-left: 60px;
    }

    @media (max-width: 600px) {
        .step {
            flex-direction: column;
            align-items: flex-start;
        }

        .step img {
            margin-bottom: 10px;
        }

        .step-number {
            margin-right: 10px;
        }

        .step-content h3 {
            margin-bottom: 10px;
        }

        .step-content p {
            padding-left: 0;
        }
    }
    </style>
    </head>

    <body>


        <!-- navbar -->
        <?php include('navbar.php'); ?>


        <div class="header-container">
            <div class="header">
                <h1>
                    Panduan Belanja
                </h1>
                <p>
                    Selamat datang di Bekas.id! Kami di sini untuk memastikan pengalaman belanja Anda berjalan lancar,
                    aman, dan menyenangkan. Ikuti panduan sederhana berikut untuk memulai:
                </p>
            </div>
        </div>
        <div class="main-container">
            <div class="step-container">
                <div class="step">
                    <img alt="" height="100" src="gambar/home/panduan1.jpeg" width="100" />
                    <div class="step-content">
                        <h3>
                            <div class="step-number">
                                1
                            </div>
                            Temukan barang yang anda inginkan
                        </h3>
                        <p>
                            Gunakan fitur pencarian atau jelajahi kategori barang di halaman utama. Filter pencarian
                            berdasarkan lokasi, harga, atau kondisi barang untuk menemukan yang paling sesuai dengan
                            kebutuhan Anda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="step-container">
                <div class="step">
                    <img alt="" height="100" src="gambar/home/panduan2.jpeg" width="100" />
                    <div class="step-content">
                        <h3>
                            <div class="step-number">
                                2
                            </div>
                            Yakinkan diri untuk belanja
                        </h3>
                        <p>
                            Pilih tombol Beli Sekarang. Mau belanja banyak barang sekaligus? Masukkan ke Keranjang.
                            Belum yakin? Simpan dulu di Favorit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="step-container">
                <div class="step">
                    <img alt="" height="100" src="gambar/home/panduan3.jpeg" width="100" />
                    <div class="step-content">
                        <h3>
                            <div class="step-number">
                                3
                            </div>
                            Pastikan lagi detail barang
                        </h3>
                        <p>
                            Cek semua info tenang pengiriman, detail barang, dan harga. Pastikan semua sudah benar
                            sebelum pilih metode bayar.
                        </p>
                    </div>
                </div>
            </div>
            <div class="step-container">
                <div class="step">
                    <img alt="" height="100" src="gambar/home/panduan4.jpeg" width="100" />
                    <div class="step-content">
                        <h3>
                            <div class="step-number">
                                4
                            </div>
                            Pantau pengirimannya
                        </h3>
                        <p>
                            Pantau transaksi di halaman profil, agar tidak merasakan sakitnya rasanya kehilangan :(
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include('footer.php'); ?>

    </body>

</html>