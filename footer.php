<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Footer</title>
    <style>
        /* Footer */
        body{
            margin: 0;
            font-family: Arial,  sans-serif;
        }
        footer {
            background-color: #1d2939;
            color: #ffffff;
            padding: 20px 0 10px;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer-left, .footer-center, .footer-right {
            flex: 1;
            min-width: 200px;
        }

        .footer-left h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .footer-left p {
            font-size: 14px;
            line-height: 1.5;
            margin: 5px 0;
        }

        .footer-center h4, .footer-right h4 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #fbb03b;
        }

        .footer-center ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-center ul li {
            margin: 5px 0;
        }

        .footer-center ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-center ul li a:hover {
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons a {
            font-size: 20px;
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #fbb03b;
        }

        /* Divider line between content and copyright */
        .footer-divider {
            height: 1px;
            background-color: #444;
            margin: 20px 0;
        }

        /* Footer bottom copyright */
        .footer-bottom {
            text-align: center;
            font-size: 14px;
            color: #ccc;
        }

    </style>
</head>
<body>
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <h3>Bekas.<span style="color: #fcbf49;">Id</span></h3>
                <p>Menyediakan barang-barang bekas berkualitas dengan harga terbaik.
                    Temukan pilihan produk sesuai kebutuhan Anda.
                </p>
            </div>
            <div class="footer-center">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="#">Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-right">
                <h4>Ikuti Kami</h4>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-bottom">
            <p>&copy; 2024 Bekas.Id. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>