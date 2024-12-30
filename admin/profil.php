<?php
    require "../koneksi.php";

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
            <img alt="User profile picture" src="https://via.placeholder.com/50" />
            <div class="username">Laila</div>
        </div>
            <ul>
                <li><a href="dashboard.php"><i class="bx bx-home"></i>Dashboard</a></li>
                <li><a href="#profil"><i class="bx bx-user"></i>Profil Saya</a></li>
                <li><a href="data_user.php"><i class="bx bx-group"></i>Data User</a></li>
                <li><a href="#dataProduk"><i class="bx bx-box"></i>Data Produk</a></li>
                <li><a href="tambah_produk.php"><i class="bx bx-plus-circle"></i>Tambah Produk</a></li>
            </ul>
    </div>

    <!-- Content -->
    <div class="main-content">
        <!-- Dashboard -->
        <h2>Dashboard</h2>
        <div class="welcome-card">
            <img src="gambar/welcomeMan.jpg" alt="">
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
                <div><strong>Nama</strong><p>Laila</p></div>
            </div>
            <div class="profile-item">
                <div><strong>E-Mail</strong><p>laila.yyy@gmail.com</p></div>
            </div>
            <div class="profile-item">
                <div><strong>No Hp</strong><p>081234567899001</p></div>
                
            </div>
            <button class="edit-btn" onclick="toggleEditMode()">Edit Profil</button>
        </div>

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
    
    <!-- script untuk edit bagain profil -->
    <script>
        function toggleEditMode() {
            const profileCard = document.getElementById('profileCard');

            profileCard.innerHTML = `
                <form>
                    <div class="profile-item">
                        <div><strong>Foto Profil</strong></div>
                        <input type="file" accept="image/*">
                    </div>
                    <div class="profile-item">
                        <div><strong>Nama</strong></div>
                        <input type="text" name="name" value="Laila" required>
                    </div>
                    <div class="profile-item">
                        <div><strong>E-Mail</strong></div>
                        <input type="email" name="email" value="laila.yyy@gmail.com" required>
                    </div>
                    <div class="profile-item">
                        <div><strong>No Hp</strong></div>
                        <input type="tel" name="phone" value="081234567899001" required>
                    </div>
                    <button type="submit" class="edit-btn">Simpan</button>
                    <button type="button" class="edit-btn" onclick="cancelEditMode()">Batal</button>
                </form>
            `;
        }

        function cancelEditMode() {
            location.reload(); // Reload the page to restore the original card
        }
        </script>
</body>
</html>