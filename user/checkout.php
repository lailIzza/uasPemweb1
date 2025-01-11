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

    // Query untuk mendapatkan metode pengiriman
    $sql_shipping_methods = "SELECT * FROM shipping_methods";
    $result_shipping_methods = $conn->query($sql_shipping_methods);
    if ($result_shipping_methods->num_rows === 0) {
        die("Tidak ada metode pengiriman yang tersedia.");
    }

    // Query untuk mendapatkan metode pembayaran
    $sql_payment_methods = "SELECT * FROM payment_methods";
    $result_payment_methods = $conn->query($sql_payment_methods);
    if ($result_payment_methods->num_rows === 0) {
        die("Tidak ada metode pembayaran yang tersedia.");
    }

    // Proses pesanan saat form dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $nomor_hp = $_POST['nomor_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $payment_method = intval($_POST['payment_method']);
        $shipping_method = intval($_POST['shipping_method']);
        $user_id = null;

        // Validasi input
        if (empty($nama) || empty($nomor_hp) || empty($email) || empty($alamat)) {
            die("Semua field harus diisi.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Format email tidak valid.");
        }

        // Cek apakah customer sudah ada berdasarkan nama dan nomor HP
        $sql_check_customer = "SELECT id FROM customers WHERE name = ? AND phone_number = ?";
        $stmt = $conn->prepare($sql_check_customer);
        $stmt->bind_param('ss', $nama, $nomor_hp);
        $stmt->execute();
        $result_customer = $stmt->get_result();

        if ($result_customer->num_rows > 0) {
            $customer = $result_customer->fetch_assoc();
            $customer_id = $customer['id'];
        } else {
            // Jika belum ada, tambahkan customer baru
            $sql_customer = "INSERT INTO customers (name, phone_number, address) 
                            VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql_customer);
            $stmt->bind_param('sss', $nama, $nomor_hp, $alamat);
            $stmt->execute();

            $customer_id = $conn->insert_id;
        }

        // Validasi metode pengiriman
        $sql_check_shipping = "SELECT price FROM shipping_methods WHERE id = ?";
        $stmt = $conn->prepare($sql_check_shipping);
        $stmt->bind_param('i', $shipping_method);
        $stmt->execute();
        $result_shipping = $stmt->get_result();
        if ($result_shipping->num_rows === 0) {
            die("Metode pengiriman tidak valid.");
        }
        $shipping = $result_shipping->fetch_assoc();
        $ongkir = $shipping['price'];

        // Hitung total harga
        $total_price = $produk['harga'] + $ongkir;

        // Data JSON untuk penerima
        $delivery_data = json_encode([
            'nama' => htmlspecialchars($nama),
            'nomor_hp' => htmlspecialchars($nomor_hp),
            'email' => htmlspecialchars($email),
            'alamat' => htmlspecialchars($alamat),
        ]);

        // Nomor pesanan unik
        $order_number = strtoupper(uniqid('ORD'));

        // Simpan pesanan ke database
        $sql_order = "INSERT INTO orders (
            customer_id, order_number, total_price, 
            payment_method_id, shipping_method_id, delivery_data, product_name
        ) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql_order);
        $stmt->bind_param(
            'isdisss',
            $customer_id,
            $order_number,      
            $total_price,        
            $payment_method,     
            $shipping_method,    
            $delivery_data,
            $produk['nama']       
        );
        

        if ($stmt->execute()) {
            header("Location: notif-chekout.php?order_number=$order_number");
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
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

    <form action="" method="POST">
        <div class="container">
            <!-- Informasi Penerima -->
            <div class="section">
                <h3><i class='bx bx-user'></i> Informasi Penerima</h3>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label for="nomor-hp">Nomor HP</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" placeholder="Masukkan nomor HP">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" rows="3" name="alamat" placeholder="Masukkan alamat"></textarea>
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
                    <p>Ongkir: Rp. <span id="ongkir">0</span></p>
                    <p>Metode pembayaran: <span id="payment_method_display">-</span></p>
                    <hr>
                    <p class="total">Total Pesanan: Rp. <span id="total_price"><?= number_format($produk['harga'], 0, ',', '.') ?></span></p>
                </div>
                <div class="button-group">
                    <button class="button primary"><i class='bx bx-check-circle'></i> Pesan Sekarang</button>
                </div>
            </div>

            <!-- Metode Pengiriman -->
            <div class="section">
                <h3><i class='bx bx-truck'></i> Metode Pengiriman</h3>
                <select name="shipping_method" id="shipping_method" required>
                    <?php while ($shipping = $result_shipping_methods->fetch_assoc()): ?>
                        <option value="<?= $shipping['id'] ?>" data-cost="<?= $shipping['price'] ?>">
                            <?= htmlspecialchars($shipping['name']) ?> - Rp. <?= number_format($shipping['price'], 0, ',', '.') ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Metode Pembayaran -->
            <div class="section">
                <h3><i class='bx bx-credit-card'></i> Metode Pembayaran</h3>
                <select name="payment_method" id="payment_method" required>
                    <?php while ($method = $result_payment_methods->fetch_assoc()): ?>
                        <option value="<?= $method['id'] ?>" data-name="<?= htmlspecialchars($method['name']) ?>">
                            <?= htmlspecialchars($method['name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

        </div>
    </form>

    <!-- js -->
    <script>
        const shippingSelect = document.getElementById('shipping_method');
        const paymentSelect = document.getElementById('payment_method');
        const ongkirElem = document.getElementById('ongkir');
        const totalElem = document.getElementById('total_price');
        const paymentDisplay = document.getElementById('payment_method_display');
        const hargaProduk = Number(<?= json_encode($produk['harga']) ?>); 

        // Update ongkir dan total harga berdasarkan metode pengiriman
        shippingSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const ongkir = parseInt(selectedOption.dataset.cost || 0, 10);
            ongkirElem.textContent = ongkir.toLocaleString('id-ID');
            totalElem.textContent = (hargaProduk + ongkir).toLocaleString('id-ID');
        });

        // Update metode pembayaran yang dipilih
        paymentSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            paymentDisplay.textContent = selectedOption.dataset.name || '-';
        });
    </script>
</body>
</html>