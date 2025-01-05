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
