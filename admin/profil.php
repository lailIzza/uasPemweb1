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

    // Query data transaksi
    $sqlOrders = "
        SELECT 
            id AS order_id,
            order_number,
            payment_method_id,
            product_name, -- Nama produk langsung dari tabel orders
            (SELECT status_name FROM order_statuses WHERE id = orders.order_status_id) AS order_status
        FROM orders
        ORDER BY order_date DESC
    ";

    $resultOrders = $conn->query($sqlOrders);

    if (!$resultOrders) {
        die("Error pada query data transaksi: " . $conn->error);
    }

    // Query untuk mengambil data produk
    $sql = "SELECT id, nama, stock, deskripsi FROM produk";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Admin Profile</title>
</head>
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
                <li><a href="#dataProduk"><i class="bx bx-box"></i>Data Produk</a></li>
                <li><a href="tambah_produk.php"><i class="bx bx-plus-circle"></i>Tambah Produk</a></li>
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
            <p>Lihat dan kelola transaksi pengguna</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Pesananan</th>
                    <th>Metode Pembayaran</th>
                    <th>Produk</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     if ($resultOrders->num_rows > 0) {
                        $no = 1;
                        while ($order = $resultOrders->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($order['order_number']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['payment_method_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['product_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['order_status']) . "</td>";
                            echo '<td><a href="update_status.php?id=' . $order['order_id'] . '">Ubah Status</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data transaksi</td></tr>";
                    }
                ?>
            </tbody>
        </table>

        <!-- data produk -->
        <div class="judul-content">
            <h3 id="dataProduk">Data Produk</h3>
            <p>Lihat dan kelola produk yang diunggah pengguna di platform. 
                Pastikan produk sesuai dengan kebijakan dan kualitas yang diinginkan.
            </p>
        </div>
           <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Deskripsi Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['stock']) . " pcs</td>";
                            echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                            echo "<td>";
                            // Tambahkan URL ke edit_produk.php dengan parameter id
                            echo '<a href="edit_produk.php?id=' . $row['id'] . '" class="btn-edit">Edit</a>';
                            echo '<button class="btn-hapus" onclick="hapusProduk(' . $row['id'] . ')">Hapus</button>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data produk</td></tr>";
                    }
                    ?>
                </tbody>
            </table> 
            <a href="tambah_produk.php" style="text-decoration:none"><button class="btn-tambah">Tambah Produk</button></a>
    </div>
    
    <!-- js -->
    <script>
        // script hapus produk
        function hapusProduk(id) {
            if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                // Redirect ke halaman hapus dengan ID produk
                window.location.href = "hapus_produk.php?id=" + id;
            }
        }

        </script>
</body>
</html>