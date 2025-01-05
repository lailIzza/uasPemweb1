-- tabel kategori
CREATE TABLE `kategori` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(191) NOT NULL,
    `deskripsi` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori` (`nama`, `deskripsi`) 
VALUES 
('Sepatu', 'Beragam sepatu untuk pria, wanita, dan anak-anak.'),
('Fashion Pria', 'Pakaian dan aksesoris khusus untuk pria.'),
('Fashion Wanita', 'Pakaian dan aksesoris eksklusif untuk wanita.'),
('Tas', 'Berbagai jenis tas seperti ransel, selempang, dan tote bag.'),
('Elektronik', 'Produk-produk elektronik seperti laptop, TV, dan gadget lainnya.'),
('Aksesoris', 'Aksesoris pelengkap seperti jam tangan, gelang, dan lainnya.');

-- tabel produk

CREATE TABLE `produk` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `kategori_id` int(10) DEFAULT NULL,
    `nama` varchar(191) NOT NULL,
    `deskripsi` varchar(255) DEFAULT NULL,
    `kondisi_produk` varchar(255) DEFAULT NULL,
    `bonus_produk` varchar(255) DEFAULT NULL,
    `gambar` varchar(200) DEFAULT NULL,
    `harga` decimal(10,2) NOT NULL,
    `stock` int(10) NOT NULL,
    `satuan_produk` varchar(32) DEFAULT NULL,
    `ketersedian` tinyint(1) DEFAULT 1,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- tabel user / akun
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` ENUM('admin', 'customer') COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- tabel customer yang berisi informasi pengguna
CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- tabel checkout barang
CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_number` varchar(16) NOT NULL UNIQUE,
  `order_status` enum('1','2','3','4','5') DEFAULT '1',
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_items` int(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT 1,
  `delivery_data` text DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabel metode pengiriman 
CREATE TABLE `shipping_methods` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `method_name` VARCHAR(50) NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `description` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabel pembayaran
CREATE TABLE `payment_methods` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `method_name` VARCHAR(50) NOT NULL,
  `description` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;