<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <title>Tentang Kami</title>
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif;
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

    .content {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    .content img {
        width: 100%;
        border-radius: 10px;
    }

    .content h2 {
        font-size: 22px;
        margin-bottom: 2px;
    }

    .content p {
        font-size: 18px;
        line-height: 1.6;
        margin-top: 2px;
    }

    .content-section {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .content-section .box {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .content-section div {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }

    .content-section div img {
        width: 200px;
        height: 200px;
        border-radius: 10px;
        margin: auto;
    }

    .content-section div .text {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .content-section div .text h2 {
        margin-bottom: 10px;
    }

    .container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 1170px;
        width: 100%;
        margin: 5px auto;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    p {
        font-size: 16px;
        margin: 5px 0;
    }

    ul {
        padding-left: 20px;
    }

    li {
        margin-bottom: 10px;
    }

    .footer {
        background-color: #1A2230;
        color: white;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        max-width: 800px;
        margin: 40px auto;
        width: 90%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .footer h1 {
        font-size: 2em;
        margin-bottom: 20px;
    }

    .footer h1 span {
        color: #FCBF49;
    }

    .footer p {
        font-size: 1em;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .content-section div {
            flex-direction: column;
        }

        .content-section div img,
        .content-section div .text {
            width: 50%;
        }
    }
</style>

<!-- navbar -->
<?php include('navbar.php'); ?>

<body>
    <div class="header-container">
        <div class="header">
            <h1>
                Selamat Datang di Bekas.id!
            </h1>
            <p>
                Kami adalah platform terpercaya untuk jual beli barang bekas berkualitas.
                Di Bekas.id, kami percaya bahwa setiap barang memiliki cerita, dan cerita itu layak untuk diteruskan.
            </p>
        </div>
    </div>
    <div class="content">
        <div class="content-section">
            <div class="box">
                <div>
                    <img height="150" src="gambar/home/tk1.jpg" width="150" alt />
                    <div class="text">
                        <h2>
                            Kisah Kami
                        </h2>
                        <p>
                            Bekas.id lahir dari sebuah kebutuhan sederhana: memberikan kesempatan kedua bagi
                            barang-barang yang masih layak digunakan. Semua bermula ketika kami menyadari betapa
                            banyaknya barang-barang berkualitas yang hanya teronggok di sudut rumah, padahal masih bisa
                            dimanfaatkan oleh orang lain. Kami ingin mengubah cara pandang masyarakat tentang barang
                            bekas, bahwa barang bekas bukanlah barang yang tidak berharga. Barang bekas adalah barang
                            yang masih memiliki potensi untuk memberikan manfaat baru.
                        </p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div>
                    <div class="text">
                        <h2>
                            Awal Perjalanan Kami
                        </h2>
                        <p>
                            Kami memulai perjalanan ini dengan satu tujuan utama: memberikan kehidupan kedua bagi
                            barang-barang yang masih layak digunakan. Kami percaya bahwa setiap barang memiliki cerita
                            dan nilai yang tidak boleh diabaikan. Dengan semangat ini, kami mulai mengumpulkan
                            barang-barang bekas dari berbagai sumber, memeriksa kualitasnya, dan memastikan bahwa setiap
                            barang yang kami tawarkan adalah barang yang layak diteruskan.
                        </p>
                    </div>
                    <img height="150" src="gambar/home/tk2.jpg" width="150" alt />
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Mengapa Kami Ada?</h1>
        <p>Kami percaya bahwa:</p>
        <ul>
            <li>Setiap barang punya nilai. Barang bekas bukan berarti tidak berguna, melainkan kesempatan baru untuk
                orang lain.</li>
            <li>Lingkungan adalah prioritas. Dengan membeli dan menjual barang bekas, kita mengurangi limbah dan
                memperpanjang umur barang.</li>
            <li>Masyarakat saling mendukung. Kami ingin membangun komunitas di mana semua orang dapat saling membantu
                melalui ekonomi berbagi.</li>
        </ul>
    </div>

    <div class="footer">
        <h1>Apa yang Kami <span>Impikan?</span></h1>
        <p>Kami membayangkan dunia di mana membeli barang bekas bukan lagi sekadar alternatif, melainkan pilihan utama.
            Sebuah dunia di mana keberlanjutan menjadi bagian dari gaya hidup kita sehari-hari.</p>
        <p>Bekas.id bukan hanya platform jual beli; ini adalah langkah kecil menuju perubahan besar.</p>
    </div>

    <!-- footer -->
    <?php include('footer.php'); ?>

</body>

</html>