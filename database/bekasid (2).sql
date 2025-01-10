-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2025 pada 20.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bekasid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `address` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `phone_number`, `address`) VALUES
(8, 6, 'Bang Yedam', '01234577', 'Kebun Melati'),
(9, 6, 'Willy Aini', '0111556788', 'Desa Mawar, Jln. Singasari no 159'),
(10, 8, 'Aini', '0831245677', 'Desa Kebun Melatai, No 124'),
(11, 8, 'Zeyyo', '09876553', 'Jalan Jakarta, No 145'),
(12, NULL, 'Zeyya', '09876553', 'Kebun melati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama`, `deskripsi`) VALUES
(1, 'KTG001', 'Sepatu', 'Beragam sepatu untuk pria, wanita, dan anak-anak.'),
(2, 'KTG002', 'Fashion Pria', 'Pakaian dan aksesoris khusus untuk pria.'),
(3, 'KTG003', 'Fashion Wanita', 'Pakaian dan aksesoris eksklusif untuk wanita.'),
(4, 'KTG004', 'Tas', 'Berbagai jenis tas seperti ransel, selempang, dan tote bag.'),
(5, 'KTG005', 'Elektronik', 'Produk-produk elektronik seperti laptop, TV, dan gadget lainnya.'),
(6, 'KTG006', 'Aksesoris', 'Aksesoris pelengkap seperti jam tangan, gelang, dan lainnya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(16) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_method_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Data seperti nama, alamat, nomor HP' CHECK (json_valid(`delivery_data`)),
  `order_status_id` tinyint(3) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_number`, `product_name`, `order_date`, `total_price`, `payment_method_id`, `shipping_method_id`, `delivery_data`, `order_status_id`) VALUES
(1, 9, 'ORD6781487CCD728', 'Sepatu Nike Kyrie 5 Squidward', '2025-01-10 23:19:08', 230000.00, 1, 2, '{\"nama\":\"Willy Aini\",\"nomor_hp\":\"0111556788\",\"email\":\"willy@gmail.com\",\"alamat\":\"Desa Mawar, Jln. Singasari no 159\"}', 1),
(2, 10, 'ORD678148EDD117D', 'Samsung Galaxy Tab A (8.0 inch)', '2025-01-10 23:21:01', 1015000.00, 1, 1, '{\"nama\":\"Aini\",\"nomor_hp\":\"0831245677\",\"email\":\"tiara@gmail.com\",\"alamat\":\"Desa Kebun Melatai, No 124\"}', 2),
(3, 11, 'ORD67814A8188692', 'Adidas Climate Adizero Training Short Pants', '2025-01-10 23:27:45', 219000.00, 1, 3, '{\"nama\":\"Zeyyo\",\"nomor_hp\":\"09876553\",\"email\":\"zae@gmail.com\",\"alamat\":\"Jalan Jakarta, No 145\"}', 3),
(4, 11, 'ORD67814AE6552A2', 'Hoodie Sweater Abu', '2025-01-10 23:29:26', 120000.00, 3, 3, '{\"nama\":\"Zeyyo\",\"nomor_hp\":\"09876553\",\"email\":\"zae@gmail.com\",\"alamat\":\"Jalan Jakarta, No 145\"}', 3),
(5, 11, 'ORD67814B438A475', 'Elle Paris Sling Bag Tas Selempang', '2025-01-10 23:30:59', 175000.00, 2, 3, '{\"nama\":\"Zeyyo\",\"nomor_hp\":\"09876553\",\"email\":\"zae@gmail.com\",\"alamat\":\"Jalan Jakarta, No 145\"}', 1),
(6, 12, 'ORD67816B224CC29', 'Elle Paris Sling Bag Tas Selempang', '2025-01-11 01:46:58', 175000.00, 2, 3, '{\"nama\":\"Zeyya\",\"nomor_hp\":\"09876553\",\"email\":\"zae@gmail.com\",\"alamat\":\"Kebun melati\"}', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `status_name`) VALUES
(1, 'Menunggu Pembayaran'),
(2, 'Sedang Diproses'),
(3, 'Dalam Pengiriman'),
(4, 'Selesai'),
(5, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Nama metode pembayaran, misalnya COD, Transfer Bank, E-Money',
  `description` text DEFAULT NULL COMMENT 'Detail metode pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`) VALUES
(1, 'COD', 'Cash on Delivery'),
(2, 'Transfer Akun Virtual', 'Pembayaran melalui akun virtual bank'),
(3, 'Dompet Digital', 'Pembayaran menggunakan e-wallet seperti OVO, GoPay, atau Dana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) NOT NULL,
  `kategori_id` int(10) DEFAULT NULL,
  `nama` varchar(191) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `kondisi_produk` varchar(255) DEFAULT NULL,
  `bonus_produk` varchar(255) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `satuan_produk` varchar(32) DEFAULT NULL,
  `ketersedian` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `deskripsi`, `kondisi_produk`, `bonus_produk`, `gambar`, `harga`, `stock`, `satuan_produk`, `ketersedian`) VALUES
(4, 2, 'Hoodie Sweater Abu', 'Hoodie kasual berwarna abu-abu dengan desain minimalis yang cocok untuk aktivitas sehari-hari. Dibuat dari bahan fleece berkualitas tinggi yang hangat namun ringan. Dilengkapi dengan saku depan untuk kenyamanan tambahan', 'New', 'Kantung belanja', '../gambar/hoddie-abu.jpg', 80000.00, 1, 'pcs', 1),
(5, 2, 'Hoddie Eland Junior hijau ', 'Like new\r\nSize : L\r\nPanjang : 63cm\r\nLebar : 58cm\r\nLingkar Dada : 116cm\r\nNo Minus\r\nFoto real pic\r\nNett 60K', 'Seperti baru', 'Kantung belanja', '../gambar/hoddie-hijau.jpg', 60000.00, 2, '0', 1),
(6, 2, 'Adidas Climate Adizero Training Short Pants', 'Colors : Black\r\nSize : 105 Fit 31-34\r\nLength : 45cm\r\nWaist : 80-88cm\r\nOpen Leg : 30cm\r\nFabric : Polyster\r\nCondition : Well Used, Good 9/10', 'Jarang digunakan', '', '../gambar/celana-pendek.jpg', 179000.00, 1, '0', 1),
(7, 2, 'Kemeja Panjang Uniqlo Hijau Sage', 'Size M\r\nKondisi 90% ( Ada Noda Ketiak )', 'Jarang digunakan', '', '../gambar/kemeja-sage.jpg', 80000.00, 1, 'pcs', 1),
(8, 4, 'EIGER Wandered Travel Pouch', '- Preloved like new, baru dipakai 2 kali\r\n- kompartemen utama & belakang beresleting\r\n- di dalam kompartemen utama banyak slot juga, termasuk slot alat tulis\r\n- material kuat, ga usah ditanya kalo merk Eiger\r\n- ukuran: 18 x 5 x 24,5 cm\r\n- berat: 240 gram', 'Jarang digunakan', '', '../gambar/tas1.jpg', 200000.00, 1, 'pcs', 1),
(9, 1, 'Sepatu Nike Kyrie 5 Squidward', 'Merk : nike \r\nSize :  40 /  25cm\r\nKondisi : 8,5 /10 (lecet pemakaian , cek pict :)', 'Digunakan dengan baik', 'Kotak sepatu ori', '../gambar/sepatu1.jpg', 200000.00, 1, 'pcs', 1),
(10, 6, 'Kacamata Oakley old school Flate made in USA', '# Kondisi frame &amp; lensa masih mulus like new\r\n# Engsel normal &amp; kencang, tidak goyang.\r\n# Lensa mulus tidak ada baret2.\r\n# Kelengkapan hanya unit saja tanpa box bawaan, tapi tetap diberi box random supaya aman dlm pengiriman.', 'Jarang digunakan', '', '../gambar/kacamata.jpg', 175000.00, 2, 'pcs', 1),
(11, 3, 'Rok Wanita - Motif Kotak', 'Bahan Tebal &amp; Halus\r\nSize : M-L\r\nWarna : Hitam \r\nMotif : Kotak-Kotak\r\nAdd : Ada kantong (kanan &amp; kiri)\r\nPemakaian : 3 kali', 'Jarang digunakan', '', '../gambar/rok.jpg', 50000.00, 1, 'pcs', 1),
(12, 3, 'With love the brand x monica top milkmaid corset white', 'Kondisi masih bagus\r\nTidak ada noda \r\nWarna : Putih krem', 'Jarang digunakan', '', '../gambar/korset.jpg', 150000.00, 1, 'pcs', 1),
(13, 4, 'Elle Paris Sling Bag Tas Selempang', 'Kondisi Sangat Bagus\r\n100% Ori dulu beli di SOGO\r\nJarang banget dipakai\r\nAda Tali Panjang\r\nMulus tidak ada yang sobek', 'Seperti baru', '', '../gambar/tas2.jpg', 135000.00, 1, 'pcs', 1),
(14, 1, 'Staccato Golden Brown High Heels Preloved', 'Original Staccato. \r\nsize : 38\r\ninsole : 24\r\nkondisi masih bagus hanya dipakai pesta saja.', 'Jarang digunakan', 'Kotak sepatu ori', '../gambar/heels.jpg', 185000.00, 1, 'pcs', 1),
(15, 6, 'Topi Converse Cons 6 Six Panel Cap', 'Berbahan poliester tahan lama untuk penggunaan sepanjang hari\r\nPre-curved brim yang modis\r\nTali belakang yang dapat diatur\r\nLogo Converse bordir\r\n', 'New', '', '../gambar/topi.jpg', 275000.00, 1, 'pcs', 1),
(16, 5, 'Iphone 11 pro 256 inter all operator', 'Warna :Space Grey\r\nall operator\r\nno minus\r\nmulus\r\nfulshet no hf\r\nlok jaksel', 'Seperti baru', '', '../gambar/HP1.jpg', 5055000.00, 1, 'unit', 1),
(17, 5, 'Samsung Galaxy Tab A (8.0 inch)', 'Samsung Galaxy Tab A (8.0 inch) \r\n2GB (RAM) + 32 GB(ROM) Memory\r\n5,100 mAh\r\n8MP Camera\r\nWarna putih\r\nKondisi mulus.', 'Jarang digunakan', 'Box charger komplit', '../gambar/TAB1.jpg', 1000000.00, 1, 'unit', 1),
(18, 5, 'Earphone Earbuds Wireless Nakamichi TWS018ENC', '- Kondisi: 95%, ORI, pemakaian 5-6 bulan, berfungsi normal, + boks tanpa charger\r\n- H. beli: ±250K\r\n- Lokasi: Jogja COD / kirim reguler', 'Seperti baru', '', '../gambar/tws.jpg', 95000.00, 1, 'unit', 1),
(19, 2, 'Hp2', 'bagus', 'Seperti baru', '', '../gambar/HP1.jpg', 125000.00, 1, '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Nama layanan pengiriman, misalnya SPX Standard',
  `price` decimal(10,2) NOT NULL COMMENT 'Biaya pengiriman',
  `estimated_time` varchar(50) DEFAULT NULL COMMENT 'Estimasi waktu pengiriman'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `name`, `price`, `estimated_time`) VALUES
(1, 'SPX Standard', 15000.00, '6-7 hari kerja'),
(2, 'SPX Instant', 30000.00, '2-3 hari kerja'),
(3, 'SPX Sameday', 40000.00, 'Selesai di hari yang sama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(191) NOT NULL,
  `profile_picture` varchar(128) DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `profile_picture`, `role`) VALUES
(5, 'adminL@gmail.com', 'admin L', '$2y$10$2R9mycYqZuIoXIKpGdnwXuIuW4fpTFd4CaAfoSrmkwgLxxRQVMoWe', 'profile_677b19211c9682.28458283.jpeg', 'admin'),
(6, 'willy@gmail.com', 'Welloy31', '$2y$10$peQF0LlPFJqjqoJTXALvGOpl3Q.zXoFm1XtU/vuFHb4cJostQ2Fz2', 'profile_677b1f6ca67b44.85395069.jpg', 'customer'),
(7, 'farhan@gmail.com', 'farhan', '$2y$10$.ZtYVevwM9EQlAbaTENwI.1aPcASbzqptc6otK1nqadsII/yD3uc.', 'profile_677b594fb72475.94930857.png', 'customer'),
(8, 'zae@gmail.com', 'Zaey0', '$2y$10$L/z6pRfibmwt5r8/fiZlW.Sh4qAii1M4aIRaFkF7/mf0QZ79JXfzm', 'profile_678149908bb720.35792916.jpeg', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `fk_payment_method` (`payment_method_id`),
  ADD KEY `fk_shipping_method` (`shipping_method_id`),
  ADD KEY `order_status_id` (`order_status_id`);

--
-- Indeks untuk tabel `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_status` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_payment_method` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `fk_shipping_method` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_methods` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
