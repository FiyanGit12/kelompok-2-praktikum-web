-- ============================================================
-- Petshop CRUD — Praktikum Web Programming Bab 5
-- Database  : db_petshop
-- Tabel     : tb_produk
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Buat database
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `db_petshop`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `db_petshop`;

-- --------------------------------------------------------
-- Struktur tabel tb_produk
-- --------------------------------------------------------
CREATE TABLE `tb_produk` (
  `id_produk`    INT(11)      NOT NULL AUTO_INCREMENT,
  `nama_produk`  VARCHAR(100) NOT NULL,
  `kategori`     VARCHAR(50)  NOT NULL,
  `harga`        INT(11)      NOT NULL DEFAULT 0,
  `stok`         INT(11)      NOT NULL DEFAULT 0,
  `deskripsi`    TEXT         DEFAULT NULL,
  `gambar`       VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Data contoh (sample data)
-- --------------------------------------------------------
INSERT INTO `tb_produk` (`nama_produk`, `kategori`, `harga`, `stok`, `deskripsi`, `gambar`) VALUES
('Royal Canin Adult Cat',  'Makanan',   185000, 50,  'Makanan kering premium untuk kucing dewasa, kaya protein dan vitamin.', NULL),
('Whiskas Kitten Sachet',  'Makanan',    12000, 120, 'Makanan basah sachet untuk anak kucing, rasa ayam dan susu.', NULL),
('Kalung Kucing Anti Kutu','Aksesoris',  45000, 30,  'Kalung berbahan silikon dengan aroma sereh, efektif mengusir kutu.', NULL),
('Kandang Kucing Lipat',   'Kandang',   320000, 10,  'Kandang lipat berbahan besi kokoh, mudah dibawa travelling.', NULL),
('Obat Cacing Drontal Cat','Obat',       75000, 60,  'Tablet obat cacing untuk kucing, satu tablet untuk berat badan ≤4 kg.', NULL),
('Pedigree Adult Beef',    'Makanan',   130000, 45,  'Makanan kering anjing dewasa rasa daging sapi, menjaga kesehatan tulang.', NULL);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
