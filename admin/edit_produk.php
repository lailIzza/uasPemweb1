<?php
require "../koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah angka
    // Lakukan query ke database untuk mengambil data produk berdasarkan ID
    $sql = "SELECT * FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produk = $result->fetch_assoc();
        // Data produk siap digunakan dalam form edit
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak diberikan.";
    exit;
}

// Proses penyimpanan data setelah form di-submit
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kategori_id = $_POST['kategori_id'];
    $kondisi_produk = $_POST['kondisi_produk'];
    $bonus_produk = $_POST['bonus_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $satuan_produk = $_POST['satuan_produk'];
    $ketersedian = $_POST['ketersedian'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $produk['gambar']; // Gambar sebelumnya

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

    // Update data produk di database
    $sql = "UPDATE produk SET nama = ?, kategori_id = ?, kondisi_produk = ?, bonus_produk = ?, harga = ?, stock = ?, satuan_produk = ?, ketersedian = ?, deskripsi = ?, gambar = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissdiisssi", $nama, $kategori_id, $kondisi_produk, $bonus_produk, $harga, $stock, $satuan_produk, $ketersedian, $deskripsi, $gambar, $id);
    if ($stmt->execute()) {
        echo "Produk berhasil diperbarui.";
        header("Location: profil.php"); // Redirect ke halaman daftar produk
        exit;
    } else {
        echo "Gagal memperbarui produk.";
    }
}

// Query untuk mendapatkan daftar kategori dari database
$sql_kategori = "SELECT * FROM kategori";
$result_kategori = $conn->query($sql_kategori);

if ($result_kategori === false) {
    die("Error pada query kategori: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_produk.css">
    <title>Edit Produk</title>
</head>
<body>
    <!-- navbar -->
    <?php include('../navbar.php'); ?>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="profil.php">Profil</a> / <strong>Edit Produk</strong>
    </div>

    <!-- data produk -->
    <div class="container">
        <h1>Selamat datang, Admin</h1>

        <!-- form untuk user -->
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama-produk">Nama Produk</label>
                <input type="text" id="nama-produk" name="nama" value="<?= htmlspecialchars($produk['nama']) ?>" placeholder="Masukkan nama produk" required>
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
                <input type="text" id="kondisi-produk" name="kondisi_produk" value="<?= htmlspecialchars($produk['kondisi_produk']) ?>" placeholder="Masukkan kondisi produk">
            </div>

            <div class="form-group">
                <label for="bonus-produk">Bonus Produk</label>
                <input type="text" id="bonus-produk" name="bonus_produk" value="<?= htmlspecialchars($produk['bonus_produk']) ?>" placeholder="Masukkan bonus produk (jika ada)">
            </div>

            <div class="form-group">
                <label for="harga-produk">Harga Produk</label>
                <input type="number" id="harga-produk" name="harga" value="<?= htmlspecialchars($produk['harga']) ?>" step="0.01" placeholder="Masukkan harga produk" required>
            </div>

            <div class="form-group">
                <label for="stok-produk">Stok Produk</label>
                <input type="number" id="stok-produk" name="stock" value="<?= htmlspecialchars($produk['stock']) ?>" min="1" required>
            </div>

            <div class="form-group">
                <label for="satuan-produk">Satuan Produk</label>
                <input type="text" id="satuan-produk" name="satuan_produk" value="<?= htmlspecialchars($produk['satuan_produk']) ?>" placeholder="Masukkan satuan produk (misal: pcs, kg)">
            </div>

            <div class="form-group">
                <label for="ketersedian">Ketersediaan Produk</label>
                <select id="ketersedian" name="ketersedian">
                    <option value="1" <?= $produk['ketersedian'] == 1 ? "selected" : "" ?>>Tersedia</option>
                    <option value="0" <?= $produk['ketersedian'] == 0 ? "selected" : "" ?>>Tidak Tersedia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi-produk">Deskripsi Produk</label>
                <textarea id="deskripsi-produk" name="deskripsi" placeholder="Masukkan deskripsi produk"><?= htmlspecialchars($produk['deskripsi']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="gambar-produk">Gambar Produk</label>
                <div class="file-input">
                    <!-- Menampilkan gambar -->
                    <img id="preview-gambar" src="<?= htmlspecialchars($produk['gambar'] ?? 'default-image.jpg') ?>" alt="Preview Gambar" style="width: 150px; height: auto; border: 1px solid #ddd; margin-bottom: 10px;">
                    <!-- Input untuk memilih gambar baru -->
                    <input type="file" id="gambar-produk" name="gambar" accept="image/*" onchange="previewImage(event)" style="display: block; margin-top: 5px;">
                </div>
            </div>
            <button type="submit" class="submit-button" name="simpan">Simpan Perubahan</button>
        </form>

    </div>

    <!-- js untuk preview gambar yang diupload -->
    <script>
     function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-gambar');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result; // Mengganti gambar dengan hasil pratinjau
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
</html>
