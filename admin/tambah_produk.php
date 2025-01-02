<?php
require "../koneksi.php";

// Query untuk mendapatkan daftar kategori dari database
$sql_kategori = "SELECT * FROM kategori";
$result_kategori = $conn->query($sql_kategori);

if ($result_kategori === false) {
    die("Error pada query kategori: " . $conn->error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $kategori_id = isset($_POST['kategori_id']) ? intval($_POST['kategori_id']) : null;
    $nama = htmlspecialchars($_POST['nama']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $kondisi_produk = htmlspecialchars($_POST['kondisi_produk']);
    $bonus_produk = htmlspecialchars($_POST['bonus_produk']);
    $harga = isset($_POST['harga']) ? floatval($_POST['harga']) : 0;
    $stock = isset($_POST['stock']) ? intval($_POST['stock']) : 1;
    $satuan_produk = htmlspecialchars($_POST['satuan_produk']);
    $ketersediaan = isset($_POST['ketersediaan']) ? intval($_POST['ketersediaan']) : 1;


    // Validasi kategori_id
    $check_kategori = $conn->prepare("SELECT COUNT(*) FROM kategori WHERE id = ?");
    $check_kategori->bind_param("i", $kategori_id);
    $check_kategori->execute();
    $check_kategori->bind_result($is_valid);
    $check_kategori->fetch();
    $check_kategori->close();

    if (!$is_valid) {
        die("Kategori tidak valid.");
    }
    
    // Proses upload gambar jika ada file yang diupload
    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "../gambar/";
        $target_file = $target_dir . basename($_FILES['gambar']['name']);
        // Validasi file gambar (opsional, untuk memastikan hanya file gambar yang diterima)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($imageFileType, $allowed_types)) {
            echo "Hanya file gambar dengan format JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        } else {
            // Pindahkan file ke folder target
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                $gambar = $target_file; // Simpan path file gambar baru
            } else {
                echo "Gagal mengupload gambar.";
            }
        }
    }

    
    // Insert data ke tabel produk
    $query = "INSERT INTO produk (kategori_id, nama, deskripsi, kondisi_produk, bonus_produk, gambar, harga, stock, satuan_produk, ketersedian) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssssdiss", $kategori_id, $nama, $deskripsi, $kondisi_produk, $bonus_produk, $gambar, $harga, $stock, $satuan_produk, $ketersediaan);

    if ($stmt->execute()) {
        // Redirect setelah berhasil
        header("Location: profil.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah_produk.css">
    <title>Tambah Produk</title>
</head>
<body>
    <!-- navbar -->
    <?php include('../navbar.php'); ?>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="profil.php">Profil</a> / <strong>Tambah Produk</strong>
    </div>

    <!-- data produk -->
    <div class="container">
        <h1>Selamat datang, Admin</h1>

        <!-- form untuk user -->
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama-produk">Nama Produk</label>
                <input type="text" id="nama-produk" name="nama" placeholder="Masukkan nama produk" required>
            </div>

            <div class="form-group">
                <label for="kategori-produk">Kategori Produk</label>
                <select id="kategori-produk" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                    <?php
                        while ($kategori = $result_kategori->fetch_assoc()) {
                            $kode_kategori = "KTG" . str_pad($kategori['id'], 3, "0", STR_PAD_LEFT); // Menghasilkan kode seperti "KTG001"
                            $selected = $kategori['id'] == $produk['kategori_id'] ? "selected" : "";
                            echo "<option value='{$kategori['id']}' $selected>[$kode_kategori] {$kategori['nama']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="kondisi-produk">Kondisi Produk</label>
                <input type="text" id="kondisi-produk" name="kondisi_produk" placeholder="Masukkan kondisi produk">
            </div>

            <div class="form-group">
                <label for="bonus-produk">Bonus Produk</label>
                <input type="text" id="bonus-produk" name="bonus_produk" placeholder="Masukkan bonus produk (jika ada)">
            </div>

            <div class="form-group">
                <label for="harga-produk">Harga Produk</label>
                <input type="number" id="harga-produk" name="harga" step="0.01" placeholder="Masukkan harga produk" required>
            </div>

            <div class="form-group">
                <label for="stok-produk">Stok Produk</label>
                <input type="number" id="stok-produk" name="stock" value="1" min="1" required>
            </div>

            <div class="form-group">
                <label for="satuan-produk">Satuan Produk</label>
                <input type="text" id="satuan-produk" name="satuan_produk" placeholder="Masukkan satuan produk (misal: pcs, kg)">
            </div>

            <div class="form-group">
                <label for="ketersediaan">Ketersediaan Produk</label>
                <select id="ketersediaan" name="ketersediaan">
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi-produk">Deskripsi Produk</label>
                <textarea id="deskripsi-produk" name="deskripsi" placeholder="Masukkan deskripsi produk"></textarea>
            </div>

            <div class="form-group">
                <label for="gambar-produk">Gambar Produk</label>
                <div class="file-input">
                    <img id="preview-gambar" src="https://via.placeholder.com/80" alt="Preview Gambar">
                    <label for="gambar-produk">Masukkan / Pilih Gambar</label>
                    <input type="file" id="gambar-produk" name="gambar" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>
            <button type="submit" class="submit-button" name="simpan">Tambah Produk</button>
        </form>
    </div>

    <!-- js untuk preview gambar yang diupload -->
    <script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('preview-gambar');
        reader.onload = () => preview.src = reader.result;
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</body>
</html>
