<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Bekas.id</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link href="produk.css" rel="stylesheet"/> <!-- Pastikan ini mengarah ke file CSS yang benar -->
</head>
<body>

    <!-- navbar -->
    <?php include('navbar.php'); ?>

    <div class="banner">
        <img src="https://storage.googleapis.com/a1aa/image/jJZSq7NiEAqRPNjLgNO0YtESOIvWyFe0gNEZB2Gv1lM27ffnA.jpg" alt="Banner with discount offers and product images" width="1200" height="300"/>
    </div>
    <div class="container">
        <aside class="filter">
            <h3>Filter</h3>
            <h4>Kategori</h4>
            <ul>
                <li><input type="checkbox"/> Pakaian</li>
                <li><input type="checkbox"/> Tas</li>
                <li><input type="checkbox"/> Sepatu</li>
                <li><input type="checkbox"/> Aksesoris</li>
                <li><input type="checkbox"/> Elektronik</li>
            </ul>
            <h4>Lokasi</h4>
            <ul>
                <li><input type="checkbox"/> Jakarta</li>
                <li><input type="checkbox"/> Surabaya</li>
                <li><input type="checkbox"/> Bandung</li>
                <li><input type="checkbox"/> Bekasi</li>
                <li><input type="checkbox"/> Depok</li>
            </ul>
        </aside>
        <main class="products">
            <h2>Home/Produk</h2>
            <div class="product-grid">
                <div class="product-item">
                    <img src="https://storage.googleapis.com/a1aa/image/MBMn4NYfKc3tU65EqaMefWkIgfpGQ0FZEnQGoUfyLvzu9effTA.jpg" alt="Product image" width="200" height="200"/>
                    <h3>Product Name</h3>
                    <p>Short description of the product.</p>
                    <div class="price">$20.00</div>
                    <a href="detail.php" class="btn">Lihat Produk</a>
                </div>
                <!-- Repeat the product-item div for each product -->
        </main>
    </div>
    
    <!-- footer -->
    <?php include('footer.php'); ?>

</body>
</html>