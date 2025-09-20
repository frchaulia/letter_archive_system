-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for arsipsurat
CREATE DATABASE IF NOT EXISTS `arsipsurat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `arsipsurat`;

-- Dumping data for table arsipsurat.letters: ~1 rows (approximately)
INSERT INTO `letters` (`id`, `category_id`, `title`, `number`, `date`, `description`, `file_path`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Hasil Seleksi Administrasi PMO KMENKOP', '1/PUM/D.4.KOP/PK.02.00/2025', '2025-09-15', 'HASIL SELEKSI ADMINISTRASI  CALON PROJECT MANAGEMENT OFFICER (PMO) KOPERASI DESA/KELURAHAN MERAH PUTIH (KDKMP) DI PROVINSI DAN KABUPATEN/KOTA \r\nTAHUN ANGGARAN 2025', 'letters/sIj838O1evT22kbNEvkFUNmZYqahvYKBfcgEP7Wp.pdf', '2025-09-19 17:44:00', '2025-09-19 17:44:00');

-- Dumping data for table arsipsurat.letter_categories: ~8 rows (approximately)
INSERT INTO `letter_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Undangan', NULL, NULL, NULL),
	(2, 'Pengumuman', NULL, NULL, NULL),
	(3, 'Nota Dinas', NULL, NULL, NULL),
	(4, 'Pemberitahuan', NULL, NULL, NULL),
	(5, 'Surat Keputusan', NULL, NULL, NULL),
	(6, 'Surat Edaran', NULL, NULL, NULL),
	(7, 'Surat Perintah', NULL, NULL, NULL),
	(8, 'Lainnya', NULL, NULL, NULL);

-- Dumping data for table arsipsurat.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2024_09_11_133748_create_letter_categories_table', 1),
	(4, '2025_09_11_133513_create_letters_table', 1);

-- Dumping data for table arsipsurat.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table arsipsurat.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar_url`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin@gmail.com', '$2y$12$6U4/fAUBjQQuZLEHTzrBdetiaeJi6TG0f7d1V1WofdgXH2c3eCgz2', NULL, 'PWmIVGv85owVutNFM4oqX7HsWyTG63E4kjRn2KZh3NSxUSnMx9y1OqVAn75V', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
