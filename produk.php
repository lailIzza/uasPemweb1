<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Bekas.id</title>
    <link href="css/produk.css" rel="stylesheet"/>
</head>
<body>
    <!-- navbar -->
    <?php include('navbar.php'); ?>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="home.php">Home</a>/ <strong>Produk</strong>
    </div>

    <div class="container">
        <!-- sidebar -->
        <aside class="filter">
            <h4>Kategori</h4>
            <ul>
                <!-- pilihan kategori semua produk -->
                <li>
                    <input type="checkbox" class="filter-kategori" value="" id="semua-produk" />
                    <label for="semua-produk">Semua Produk</label>
                </li>

                <?php
                    require "koneksi.php";
                    
                    // Ambil kategori dari tabel `kategori`
                    $sql_kategori = "SELECT id, nama FROM kategori";
                    $result_kategori = $conn->query($sql_kategori);

                    if ($result_kategori->num_rows > 0) {
                        while ($kategori = $result_kategori->fetch_assoc()) {
                            echo '
                            <li>
                                <input type="checkbox" class="filter-kategori" value="' . htmlspecialchars($kategori["id"]) . '" />
                                ' . htmlspecialchars($kategori["nama"]) . '
                            </li>
                            ';
                        }
                    } else {
                    echo "<li>Tidak ada kategori tersedia.</li>";
                    }
                ?>
            </ul>
        </aside>

        <!-- main content -->
        <main class="products"> 
            <?php
                // Ambil filter kategori (jika ada)
                $selected_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : null;

                // Ambil filter pencarian (jika ada)
                $search_query = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : null;

                // Default nama kategori
                $nama_kategori = "Semua Produk";

                // Jika ada kategori, dapatkan nama kategorinya
                if ($selected_kategori) {
                    $kategori_ids = array_map('intval', explode(',', $selected_kategori));
                    $placeholders = implode(',', array_fill(0, count($kategori_ids), '?'));

                    $stmt = $conn->prepare("SELECT nama FROM kategori WHERE id IN ($placeholders)");
                    $stmt->bind_param(str_repeat('i', count($kategori_ids)), ...$kategori_ids);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $kategori_nama_array = [];
                    while ($row = $result->fetch_assoc()) {
                        $kategori_nama_array[] = $row['nama'];
                    }
                    $nama_kategori = implode(", ", $kategori_nama_array);
                }

                // Tampilkan header pencarian
                if ($search_query) {
                    echo '<h2>Hasil Pencarian untuk "<strong>' . htmlspecialchars($search_query) . '</strong>"</h2>';
                } else {
                    echo '<h2>Hasil Pencarian "' . htmlspecialchars($nama_kategori) . '"</h2>';
                }

                // Query untuk mendapatkan data produk
                $sql_produk = "SELECT p.id, p.nama, p.deskripsi, p.kondisi_produk, p.gambar, p.harga, p.ketersedian 
                            FROM produk p 
                            WHERE p.ketersedian = 1";

                // Tambahkan filter kategori jika ada
                if ($selected_kategori) {
                    $kategori_ids = implode(",", array_map('intval', explode(',', $selected_kategori)));
                    $sql_produk .= " AND p.kategori_id IN ($kategori_ids)";
                }

                // Tambahkan filter pencarian jika ada
                if ($search_query) {
                    $sql_produk .= " AND (p.nama LIKE '%$search_query%' OR p.deskripsi LIKE '%$search_query%')";
                }

                $result_produk = $conn->query($sql_produk);
            ?>

            <div class="product-grid">
                <?php
                if ($result_produk->num_rows > 0) {
                    while ($produk = $result_produk->fetch_assoc()) {
                        $url_tujuan = 'detail.php?id=' . urlencode($produk["id"]); // URL ke halaman detail produk
                        echo '<a href="' . $url_tujuan . '" style="text-decoration: none; color: inherit;">';
                        echo '<div class="product-item">';
                        echo '<div class="image-wrapper">';
                        echo '<img src="gambar/' . htmlspecialchars($produk["gambar"]) . '" alt="' . htmlspecialchars($produk["nama"]) . '" width="200" height="200">';
                        echo '</div>';
                        echo '<div class="product-info">';
                        echo '<h3>' . htmlspecialchars(mb_strimwidth($produk["nama"], 0, 20, "...")) . '</h3>';
                        echo '<p>Kondisi: ' . htmlspecialchars(mb_strimwidth($produk["kondisi_produk"], 0,15,"...")) . '</p>';
                        echo '<div class="price">Rp ' . number_format($produk["harga"], 0, ',', '.') . '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                } else {
                    echo "<p>Tidak ada produk yang ditemukan.</p>";
                }
                ?>
            </div>

        </main>
    </div>

    <!-- footer -->
    <?php include('footer.php'); ?>

    <script>
        const kategoriCheckboxes = document.querySelectorAll('.filter-kategori');
        const semuaProdukCheckbox = document.getElementById('semua-produk');

        // Ketika "Semua Produk" dipilih
        semuaProdukCheckbox.addEventListener('change', () => {
            if (semuaProdukCheckbox.checked) {
                // Nonaktifkan semua checkbox kategori lain
                kategoriCheckboxes.forEach(cb => {
                    if (cb !== semuaProdukCheckbox) cb.checked = false;
                });

                // Redirect untuk menampilkan semua produk
                window.location.href = `?kategori=`;
            }
        });

        // Ketika kategori lain dipilih
        kategoriCheckboxes.forEach(checkbox => {
            if (checkbox !== semuaProdukCheckbox) {
                checkbox.addEventListener('change', () => {
                    // Jika kategori lain dipilih, nonaktifkan "Semua Produk"
                    if (checkbox.checked) {
                        semuaProdukCheckbox.checked = false;
                    }

                    // Kirim kategori yang dipilih
                    const selectedKategori = Array.from(kategoriCheckboxes)
                        .filter(cb => cb.checked && cb !== semuaProdukCheckbox)
                        .map(cb => cb.value)
                        .join(',');

                    // Redirect dengan filter kategori
                    window.location.href = `?kategori=${selectedKategori}`;
                });
            }
        });
    </script>

</body>
</html>