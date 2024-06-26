-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Jun 26, 2024 at 02:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdm_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `part_id` bigint UNSIGNED DEFAULT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Inactive',
  `code` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_card_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint NOT NULL,
  `religion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_contract` date DEFAULT NULL,
  `end_of_contract` date DEFAULT NULL,
  `basic_salary` double DEFAULT NULL,
  `marital_status` enum('Lajang','Menikah','Duda/Janda') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Lajang',
  `dependents_count` tinyint DEFAULT '0',
  `signature_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_card_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `part_id`, `position_id`, `user_id`, `status`, `code`, `name`, `place_of_birth`, `date_of_birth`, `id_card_number`, `tax_number`, `email`, `address`, `phone`, `religion`, `education`, `bank`, `account_number`, `start_contract`, `end_of_contract`, `basic_salary`, `marital_status`, `dependents_count`, `signature_file`, `id_card_file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Active', 'SDS-001', 'Krisostomus Nova Rahmanto', 'Yogyakarta', '1994-11-17', '3404121711940002', '90.369.443.8-542.000', 'majus386@gmail.com', 'Karangjati, RT 004/RW 000, Tamantirto, Kasihan, Bantul, DIY', 6285643877967, 'Kristen Katolik', 'S1', 'BCA', '4451820227', '2019-02-14', '2024-02-14', 7000000, 'Lajang', 0, NULL, NULL, '2022-12-22 08:16:14', '2024-06-26 13:41:34'),
(2, 3, 20, 3, 'Active', 'SDS-002', 'Elisabeth Cesaria Dwi N', 'Yogyakarta', '1996-07-01', '3402154107960003', '1', 'elisabethcesaria@gmail.com', 'Jalan Yudistira C.27 Prm. Kasper RT 075 Desa Pendowoharjo, Kecamatan Sewon, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta', 6281266326016, 'Kristen Katolik', 'D3', 'BCA', '0374389072', '2020-01-08', '2024-07-25', 3200000, 'Lajang', 0, '863fb48e-88b2-414a-a46d-ecc3beb85ba8.png', NULL, '2022-12-22 08:42:40', '2024-04-17 10:37:39'),
(3, 3, 15, 4, 'Inactive', 'SDS-003', 'Radhitya Yoga Wiranto', 'Magelang', '1998-03-19', '3371021903980002', NULL, 'radhityayoga9@gmail.com', 'Jalan Ambon Kebonpolo RT 01/RW 02, Kelurahan Potrobangsan, Kecamatan Magelang Utara, Kota Magelang, Provinsi Jawa Tengah', 6289656009010, 'Islam', 'SMA', 'BCA', '0374301540', '2022-12-01', '2023-07-01', 2551020, 'Lajang', 0, NULL, NULL, '2022-12-22 08:46:37', '2023-08-18 10:39:56'),
(4, 2, 21, 5, 'Active', 'SDS-004', 'Muhammad Gus Khamim', 'Magelang', '2000-08-22', '3308182208000001', '213', 'webdev.khamim@gmail.com', 'Kalitejo, RT 002/ RW 007, Desa Banyusari, Kecamatan Grabag, Kabupaten Magelang, Provinsi Jawa Tengah', 6285713583425, 'Islam', 'SMK', 'BCA', '1221453064', '2020-01-18', '2024-01-25', 3000000, 'Lajang', 0, NULL, NULL, '2022-12-22 09:01:14', '2024-06-26 12:42:13'),
(5, 2, 7, 6, 'Active', 'SDS-005', 'Meimunah', 'Banyumas', '1996-05-02', '3302064205960001', NULL, 'meymunah21@gmail.com', 'Grujugan, RT 001/ RW 002, Kelurahan Grujugan, Kecamatan Kemranjen, Kabupaten Banyumas, Provinsi Jawa Tengah', 6282220089905, 'Islam', 'S1', 'BCA', '0374408034', '2021-01-25', '2024-01-25', 2500000, NULL, NULL, NULL, NULL, '2022-12-22 09:06:46', '2024-02-22 08:28:11'),
(6, 3, 14, 7, 'Inactive', 'SDS-006', 'Gilar Surya Pandita', 'Magelang', '1990-05-19', '3371021905900003', NULL, 'gilarsuryapandita@gmail.com', 'Tuguran 199 A, RT 002 / RW 006, Kelurahan Potrobangsan, Kecamatan Magelang Utara, Kota Magelang, Provinsi Jawa Tengah', 6285290905878, 'Kristen Protestan', 'S1', 'BCA', '0374046833', '2022-01-25', '2023-01-25', 3061224, 'Lajang', 0, NULL, NULL, '2022-12-22 09:11:52', '2023-01-26 09:45:48'),
(7, 2, 8, 8, 'Inactive', 'SDS-007', 'David Christanto', 'Kab. Semarang', '1993-12-11', '3322091112930001', NULL, 'davidchristanto93@gmail.com', 'Dusun Sawahgondang, RT 002 / RW 006, Kel. Sumowono, Kec. Sumowono, Kabupaten Semarang, Provinsi Jawa Tengah', 6282337662681, 'Kristen Protestan', 'S1', 'BCA', '0374438928', '2022-01-25', '2023-01-25', 2500000, 'Lajang', 0, NULL, NULL, '2022-12-22 09:17:51', '2023-01-26 09:45:56'),
(8, 4, 18, 9, 'Inactive', 'SDS-008', 'Vicencius Dimas Panca P', 'Yogyakarta', '1994-01-22', '3402162201940005', NULL, 'vincdpanca221@gmail.com', 'Jalan Setyaki No. 34, RT 015/RW 004, Kel. Wirobrajan, Kec. Wirobrajan, Kota Yogyakarta, Provinsi Daerah Istimewa Yogyakarta', 6282235641010, 'Kristen Katolik', 'SMA', 'BCA', '4452090086', '2021-01-25', '2024-01-25', 1224490, 'Lajang', 0, NULL, NULL, '2022-12-22 09:21:42', '2023-04-18 08:01:23'),
(9, 3, 12, 10, 'Inactive', 'SDS-009', 'Ayuthia Putri Maharani', 'Terbanggi Besar', '1996-05-02', '1805114205960003', NULL, 'ayuthia.putrimaharani14@gmail.com', 'di Housing 2 Blok E 357 SIL, RT 001 / RW 005, Kelurahan Gedung Meneng, Kecamatan Gedung Meneng, Kabupaten Tulang Bawang, Provinsi Lampung', 6282226346622, 'Kristen Protestan', 'S1', 'BCA', '0373907283', '2022-02-25', '2023-02-25', 2040816, 'Lajang', 0, NULL, NULL, '2022-12-22 09:29:37', '2023-01-26 09:51:50'),
(10, 3, 13, 11, 'Inactive', 'SDS-010', 'Rofingatun Nikmah', 'Cilacap', '1999-05-17', '3301085702990002', NULL, 'rof.nikmah@gmail.com', 'Dusun Lengkong, RT 005/RW 005, Jeruklegi Kulon, Jeruk Legi, Cilacap, Jawa Tengah', 6282138150162, 'Islam', 'S1', 'BCA', '8020708680', '2022-08-29', '2023-08-29', 2551020, 'Lajang', 0, NULL, NULL, '2022-12-22 09:37:55', '2023-10-13 06:35:22'),
(11, 2, 5, 12, 'Inactive', 'SDS-011', 'Laura Liokelly Toron', 'Malaysia', '1996-12-11', '5306065102960001', NULL, 'lauraliokelly@gmail.com', 'Tanahlein, RT 001/RW 001, Tanah Lein, Solor Barat, Flores Timur, Nusa Tenggara Timur', 6281334774745, 'Kristen Katolik', 'S1', 'BCA', '0374607916', '2022-07-25', '2023-07-25', 2551020, 'Lajang', 0, NULL, NULL, '2022-12-22 09:43:35', '2023-08-30 09:03:52'),
(12, 2, 6, 13, 'Active', 'SDS-012', 'Anis Zaitunah', 'Cilacap', '1999-10-25', '3301126510990003', NULL, 'aniszaitunah93@gmail.com', 'Dusung Lunggasari, RT 004/RW 007, Gunungtelu, Karangpucung, Cilacap, Jawa Tengah', 6283862591803, 'Islam', 'S1', 'BCA', '8465632034', '2022-08-04', '2024-07-04', 2500000, NULL, NULL, NULL, NULL, '2022-12-22 09:48:36', '2024-02-22 08:30:00'),
(13, 3, 11, 14, 'Inactive', 'SDS-013', 'Malecita Nur Atala Singgih', 'Yogyakarta', '1999-10-01', '3402124110990001', NULL, 'malecitanur@gmail.com', 'Tegal Pasar 284 Kanoman, RT 008/RW 020, Banguntapan, Banguntapan, Bantul, DIY', 6289517685500, 'Islam', 'S1', 'BCA', '0374789496', '2022-12-01', '2023-06-01', 2551020, 'Lajang', 0, NULL, NULL, '2022-12-22 09:53:02', '2023-07-21 00:05:52'),
(14, 3, 10, 15, 'Active', 'SDS-014', 'Prananto Widi Hapsoro', 'Kebumen', '1990-11-19', '3305121911900006', NULL, 'pwhnandi@gmail.com', 'Jalan Mawar No. 22, RT 003/RW 002, Panjer, Kebumen, Kebumen, Jawa Tengah', 6285643226226, 'Islam', 'S2', 'BCA', '8020490552', '2022-12-01', '2024-12-01', 3500000, NULL, NULL, NULL, NULL, '2022-12-22 09:57:04', '2024-03-27 07:29:25'),
(15, 3, 11, 16, 'Inactive', 'SDS-015', 'Taufaldisatya Wijatama Diwangkara', 'Jepara', '2000-08-14', '3512071408000003', NULL, 'wijatama.sadasa@gmail.com', 'Wonorejo RT 001/RW 001, Wonorejo, Jepara, Jepara, Jawa Tengah', 6282331110549, 'Islam', 'S1', 'BCA', '0374821811', '2022-12-09', '2023-06-02', 2551020, 'Lajang', 0, NULL, NULL, '2022-12-22 10:08:19', '2023-07-21 00:06:11'),
(16, 2, 4, 17, 'Active', 'SDS-016', 'Fatrah Ahmad Putra', 'Lamongan', '2001-04-18', '3273011804010004', NULL, 'work.faputra@gmail.com', 'Jeruk RT 014/RW 004, Jeruk, Kartoharjo, Magetan, Jawa Timur', 6285733287835, 'Islam', 'SMA', 'BCA', '0374838543', '2022-12-09', '2024-06-09', 2500000, NULL, NULL, NULL, NULL, '2022-12-22 10:12:03', '2024-02-22 11:49:53'),
(17, 2, 3, 18, 'Inactive', 'SDS-017', 'Eka Adi Nugraha', 'Yogyakarta', '1980-10-03', '3471130310800003', NULL, 'penyamae@gmail.com', 'Glagah UH 4/335, RT 010/RW 002, Warungboto, Umbulharjo, Yogyakarta, Daerah Istimewa Yogyakarta', 6281246009227, 'Islam', 'S1', 'BCA', '0374840173', '2022-12-13', '2023-12-13', 3571429, 'Lajang', 0, NULL, NULL, '2022-12-22 10:15:29', '2023-08-28 00:05:57'),
(18, 4, 22, 19, 'Inactive', 'SDS-018', 'Theodora Cherly Berlian Prayudya', 'Klaten', '2002-04-26', '3314116604020002', NULL, 'cherlyberlian26@gmail.com', 'Perum Bangunjiwo Sejahtera blok B5, Bangunjiwo, Kasihan, Bantul', 83113685697, 'Kristen Katolik', 'D3', 'BCA', '4452412024', '2023-02-22', '2023-05-22', 1000000, 'Lajang', 0, NULL, NULL, '2023-02-27 10:37:44', '2023-07-21 00:06:29'),
(19, 3, 11, 20, 'Inactive', 'SDS-019', 'Eko Nur Cahyo', 'Banyumas', '2000-10-30', '3302073010000002', NULL, 'ekonurcahyop29@gmail.com', 'Lebeng RT 003/RW 002, Kel./Desa Lebeng, Kec. Sumpiuh, Kab. Banyumas, Prov.Jawa Tengah', 6281228193217, 'Islam', 'S1', 'BCA', '0374900401', '2023-05-10', '2024-02-10', 2551020, 'Lajang', 0, NULL, NULL, '2023-05-15 03:28:39', '2023-11-24 04:42:29'),
(20, 4, 22, 21, 'Inactive', 'SDS-020', 'Shifa Sholiana', 'Magelang', '2004-09-07', '3308184709040006', NULL, 'shiffana94@gmail.com', 'Gejaban RT002/RW 006, Kel./Desa Banyusari, Kec. Grabag,Kab. Magelang, Provinsi Jawa Tengah', 6281476669627, 'Islam', 'SMK', 'BCA', '1221943037', '2023-05-16', '2023-11-16', 1500000, 'Lajang', 0, NULL, NULL, '2023-05-16 07:01:51', '2023-11-24 04:42:47'),
(21, 3, 24, 22, 'Inactive', 'SDS-021', 'Khaila Kurnia Dewi', 'Temanggung', '2005-06-30', '3323137006050001', NULL, 'khailakurniade@gmail.com', 'Gentan RT 001/RW 001, Kel.Desa Gentan, Kec. Kranggan, Kab. Temanggung, Provinsi Jawa Tengah', 6281328187116, 'Islam', 'SMK', 'BCA', '0374927341', '2023-05-16', '2023-11-16', 1800000, 'Lajang', 0, NULL, NULL, '2023-05-16 07:05:06', '2023-11-24 04:42:59'),
(22, 2, 25, 23, 'Inactive', 'SDS-022', 'Gerrit Ezra Yudi Kairupan', 'Jayapura', '2001-09-21', '9103012109010002', NULL, 'gerritkairupan.bonvid2@gmail.com', 'Jl. YPKP No. 1 Sentani, Jayapura', 82393688920, 'Kristen Protestan', 'S1', 'BCA', '0601207141', '2023-08-14', '2024-02-14', 2500000, NULL, NULL, NULL, NULL, '2023-08-16 04:13:54', '2024-03-19 09:05:17'),
(23, 3, 15, 24, 'Active', 'SDS-023', 'Wahyu Eka SatyaPutra', 'Magelang', '2004-05-05', '3308010505040004', NULL, 'iwhyeka@gmail.com', 'Dusun Blondo, RT 001/RW 009, Kalisalak, Salaman, Magelang, Jawa Tengah', 6285742482906, 'Islam', 'SMK', 'BCA', '1221896586', '2023-11-13', '2024-08-13', 2200000, NULL, NULL, NULL, NULL, '2023-11-15 02:42:54', '2024-03-21 09:24:40'),
(24, 3, 11, 25, 'Active', 'SDS-024', 'Yosia Triamanda Kurnia', 'Semarang', '2001-05-06', '1371040605010004', NULL, 'yosiatriamanda05@gmail.com', 'Jl. Kalpataru I/93, RT 003/RW 005, Kel./Desa Purwosari, Kec. Baturraden, Kab. Banyumas, Provinsi Jawa Tengah', 895337320101, 'Kristen Protestan', 'S1', 'BCA', '4452012841', '2023-11-23', '2024-02-23', 2400000, NULL, NULL, NULL, NULL, '2023-11-23 02:53:01', '2024-03-24 15:16:47'),
(25, 6, 26, 26, 'Active', 'SDS-025', 'Yustinus Sahala Samosir', 'Yogyakarta', '1988-12-09', '3404060912880001', NULL, 'sahala.samosir@gmail.com', 'Demakan TR/III 670B RT/RW 027/007 Tegalrejo, Tegalrejo, Yogyakarta', 6281804363272, 'Kristen Katolik', 'S1', 'BCA', '0601140071', '2024-01-02', '2025-01-02', 5000000, 'Lajang', 0, NULL, NULL, '2024-01-11 09:33:45', '2024-01-11 09:39:38'),
(26, 6, 27, 27, 'Active', 'SDS-026', 'Yulita Maria Dwiatri', 'Wangko', '2000-05-18', '5310145805000001', NULL, 'atik180520@gmail.com', 'Jl. Sagan GK V N0.90 Terban, Gondokusuman, Yogyakarta', 6281246284002, 'Kristen Katolik', 'S1', 'BCA', '0375085408', '2024-01-11', '2025-01-11', 2000000, 'Lajang', 0, NULL, NULL, '2024-01-11 09:39:33', '2024-01-11 09:44:39'),
(27, 6, 28, 28, 'Active', 'SDS-027', 'Hafifi Putra Arafat', 'Temanggung', '1994-01-02', '3323130201940002', NULL, 'hafifiputra94@gmail.com', 'Bengkal Rt4 Rw5 Kec. Kranggan, Kab. Temanggung', 6289616657101, 'Islam', 'S1', 'BCA', '1540792964', '2024-01-25', '2025-01-25', 2500000, 'Lajang', 0, NULL, NULL, '2024-01-25 03:06:37', '2024-01-26 08:49:15'),
(28, 2, 29, 29, 'Active', 'SDS-028', 'Ignasio De Loyola Dwi Praptista Yossa', 'Dili', '1997-07-31', '3404163107970001', NULL, 'yossa46@gmail.com', 'Jalan Rajawali III/39 Manukan Condong Catur Depok Sleman', 6282236388620, 'Kristen Katolik', 'S1', 'BCA', '8610948759', '2024-01-25', '2025-01-25', 2500000, 'Lajang', 0, NULL, NULL, '2024-01-25 06:29:21', '2024-01-26 08:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_01_061711_create_positions_table', 1),
(6, '2022_09_07_060252_create_employees_table', 1),
(7, '2022_09_30_032503_add_user_id_to_employees_table', 1),
(8, '2022_10_12_071655_add_part_of_to_employees_table', 1),
(9, '2022_10_12_080722_create_transactions_table', 1),
(10, '2022_10_28_072306_remove_part_of_in_employees_table', 1),
(11, '2022_10_28_083029_create_parts_table', 1),
(12, '2022_10_28_083625_add_part_id_to_employees_table', 1),
(13, '2022_11_02_091533_add_part_id_to_positions_table', 1),
(14, '2022_11_16_032315_create_wfh_transactions_table', 1),
(15, '2022_11_24_151615_add_for_to_transactions_table', 1),
(16, '2022_12_02_030509_remove_status_in_users_table', 1),
(17, '2022_12_04_140221_add_status_to_employees_table', 1),
(18, '2022_12_05_024019_create_notifications_table', 1),
(19, '2022_12_07_030710_remove_clickup_id_in_wfh_transactions_table', 1),
(20, '2022_12_07_031639_create_clickups_table', 1),
(21, '2022_12_12_133910_add_id_card_number_to_employees_table', 1),
(22, '2022_12_21_140517_add_sub-permission_to_transactions_table', 2),
(23, '2023_01_06_150648_create_attendances_table', 3),
(24, '2023_01_13_113216_create_holidays_table', 4),
(25, '2023_01_16_102133_create_business_trips_table', 5),
(26, '2023_01_18_095521_create_leave_quotas_table', 6),
(27, '2023_01_26_104445_remove_return_date_in_business_trips', 7),
(28, '2023_02_09_114228_create_salaries_table', 8),
(29, '2023_02_09_114939_create_earnings_table', 8),
(30, '2023_02_09_115029_create_deductions_table', 8),
(31, '2023_02_17_093517_create_jobs_table', 8),
(32, '2023_03_09_160848_add_total_day_to_wfh_transactions_table', 9),
(33, '2023_03_13_105032_add_total_day_to_transactions_table', 10),
(34, '2023_03_14_194018_add_total_to_salaries_table', 11),
(35, '2023_03_20_145919_add_unpaid_leave_to_deductions_table', 11),
(36, '2023_03_30_120632_add_type_to_holidays_table', 12),
(37, '2023_04_13_104603_add_type_to_salaries_table', 13),
(38, '2024_02_12_163150_add_tax_number_to_employees_table', 14),
(39, '2024_02_19_123304_add_fixed_allowance_to_earnings_table', 14),
(40, '2024_03_27_132832_create_email_logs_table', 15),
(41, '2024_04_01_092338_add_pph21_evidence_to_salaries_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Direktur', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(2, 'Product Development', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(3, 'Marketing and Partnerships', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(4, 'General Affair', '2022-12-22 08:05:07', '2024-01-11 04:01:06'),
(5, 'Web Developer', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(6, 'Finance Accounting Tax', '2024-01-11 04:01:53', '2024-01-11 04:01:53'),
(9, 'IT', '2024-06-26 12:24:25', '2024-06-26 12:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `part_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `part_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chief Executive Officer', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(2, 1, 'Chief Operating Officer', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(3, 2, 'Product Development Manager', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(4, 2, 'Product Owner Training', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(5, 2, 'Product Owner VLOD', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(6, 2, 'Product Owner Consulting', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(7, 2, 'Product Owner DTB', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(8, 2, 'Video Editor', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(9, 2, 'Script Writer', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(10, 3, 'Marketing and Partnerships Manager', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(11, 3, 'Business Development', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(12, 3, 'Partnership Staff', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(13, 3, 'Creative Development', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(14, 3, 'Video Content Creator', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(15, 3, 'Visual Communication Specialist', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(16, 4, 'General Affair Manager', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(17, 4, 'Business Admin and General Affair', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(18, 4, 'Office Caretaker', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(19, 5, 'Web Developer', '2022-12-22 08:05:07', '2022-12-22 08:05:07'),
(20, 3, 'Business Admin and General Affair', '2023-03-03 09:40:43', '2023-03-03 09:40:43'),
(21, 2, 'Web Developer', '2023-03-03 09:40:55', '2023-03-03 09:40:55'),
(22, 4, 'Internship Business Admin and General Affair', '2023-03-03 09:59:05', '2023-03-03 09:59:05'),
(23, 4, 'Business Admin Internship', '2023-05-16 04:21:55', '2023-05-16 04:21:55'),
(24, 3, 'MP Internship', '2023-05-16 04:22:12', '2023-05-16 04:22:12'),
(25, 2, 'Associate Product Owner', '2023-08-16 02:48:04', '2023-08-16 02:48:04'),
(26, 6, 'Finance Accounting Tax Manager', '2024-01-11 04:13:44', '2024-01-11 04:13:44'),
(27, 6, 'Finance Accounting Tax Staff', '2024-01-11 04:14:01', '2024-01-11 04:14:01'),
(28, 6, 'Office Administrator', '2024-01-25 06:43:00', '2024-01-25 06:43:00'),
(29, 2, 'Associate Product Development', '2024-01-26 08:56:50', '2024-01-26 08:56:50'),
(30, 9, 'Front End Engineer', '2024-06-26 12:25:09', '2024-06-26 12:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `leave_date` date NOT NULL,
  `return_date` date NOT NULL,
  `for` enum('Izin','Sakit','Cuti') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_permission` enum('Perkawinan Pekerja Sendiri','Pembaptisan/khitanan anak sah Pekerja','Perkawinan anak sah Pekerja','Istri sah Pekerja melahirkan/gugur kandungan','Kematian suami/istri/anak/menantu/orang tua/mertua','Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah','Lainnya') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('Mengajukan','Sedang Proses','Disetujui','Tidak Disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Mengajukan',
  `ba_signature` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_signature` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_signature` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_day` int DEFAULT NULL,
  `attachment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `employee_id`, `leave_date`, `return_date`, `for`, `sub_permission`, `description`, `reason`, `status`, `ba_signature`, `manager_signature`, `applicant_signature`, `total_day`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-12-26', '2023-01-02', 'Cuti', NULL, 'Istirahat', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-6b710d87-9f05-47a5-814f-1172151fb5a7.png', NULL, NULL, '2022-12-22 12:56:27', '2022-12-23 04:36:44'),
(3, 2, '2022-12-26', '2023-01-02', 'Cuti', NULL, 'Istirahat', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-e6a6454f-09b6-47b6-8cb9-236749b00bea.png', NULL, NULL, '2022-12-23 02:48:47', '2022-12-23 04:36:54'),
(4, 5, '2022-12-26', '2023-01-02', 'Cuti', NULL, 'istirahat', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-d99238ce-3299-437b-8391-12a4cce92221.png', NULL, NULL, '2022-12-23 03:15:37', '2022-12-23 09:51:56'),
(5, 7, '2022-12-26', '2022-12-28', 'Cuti', NULL, 'Cuti', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-a43b1598-d1ed-4ced-95c3-7acf8704f0db.png', NULL, NULL, '2022-12-23 08:32:58', '2022-12-23 09:52:14'),
(8, 6, '2023-01-13', '2023-01-16', 'Cuti', NULL, 'Acara Keluarga', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-88965e39-8ae0-4de2-8c03-b3d8b5c5f48b.png', NULL, NULL, '2023-01-05 01:39:44', '2023-01-09 02:41:19'),
(9, 7, '2023-01-12', '2023-01-16', 'Cuti', NULL, 'Mengurus event', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-fbf2f0f6-bde1-499c-85ab-ae60773157c5.png', NULL, NULL, '2023-01-09 04:23:04', '2023-01-10 09:41:51'),
(10, 6, '2023-01-18', '2023-01-23', 'Cuti', NULL, 'Istirahat', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-48f4e892-d08c-4df0-b3f2-0da57ec938e1.png', NULL, NULL, '2023-01-16 01:52:38', '2023-01-17 02:46:48'),
(11, 6, '2023-01-17', '2023-01-18', 'Izin', 'Lainnya', 'Kondisi nenek drop.', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-677ba01d-1bbf-4c03-a0d7-2ab8a385de71.png', NULL, '45a8c389-677ba01d-1bbf-4c03-a0d7-2ab8a385de71.png', '2023-01-17 02:12:57', '2023-01-17 02:46:36'),
(12, 7, '2023-01-19', '2023-01-23', 'Cuti', NULL, 'Kondangan', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-b6911e80-e9a3-46d9-8c76-0fc2943ca06b.png', NULL, NULL, '2023-01-18 02:53:24', '2023-01-18 10:37:55'),
(13, 17, '2023-01-24', '2023-01-26', 'Sakit', NULL, 'Atit, nggregesi. Izin istirahat dulu kakanda. Surat sakit nanti disusulkeun kak.', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-bbbd4647-2c16-4821-beca-9df4292e211e.png', 2, NULL, '2023-01-24 03:54:45', '2023-01-24 14:14:09'),
(14, 16, '2023-01-27', '2023-01-30', 'Izin', 'Lainnya', 'Mengisi kegiatan di SMK', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-5bf9482d-fffd-4c4b-9ede-95f942e79d83.png', 1, NULL, '2023-01-25 09:25:42', '2023-01-25 11:44:06'),
(15, 3, '2023-01-26', '2023-01-30', 'Sakit', NULL, 'Disuruh dokter istirahat', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-958ba149-ca1e-4257-b0a4-baad41e5f212.png', 2, '45a8c389-958ba149-ca1e-4257-b0a4-baad41e5f212.jpg', '2023-01-25 12:55:40', '2023-01-25 13:17:13'),
(16, 17, '2023-02-17', '2023-02-20', 'Izin', 'Lainnya', 'Mengurus perbaikan kendaraan rusak.', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-698439c6-bc66-404c-9c57-13dd08d431e0.png', 1, NULL, '2023-02-15 03:49:16', '2023-02-16 02:25:09'),
(17, 13, '2023-03-13', '2023-03-14', 'Sakit', NULL, 'Demam', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-5345559d-b085-440c-bc39-02c7860aece5.png', 1, NULL, '2023-03-13 00:56:02', '2023-03-13 02:08:52'),
(18, 16, '2023-03-28', '2023-03-29', 'Sakit', NULL, 'Diminta istirahat oleh dokter', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-00b12315-1845-4bc6-8000-ee4322117e33.png', 1, '45a8c389-00b12315-1845-4bc6-8000-ee4322117e33.jpg', '2023-03-27 02:40:43', '2023-03-27 12:08:55'),
(19, 13, '2023-03-30', '2023-03-31', 'Sakit', NULL, 'Flu dan demam', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-a9694cfb-fbcd-4d82-80f4-7e6c7fd63ed2.png', 1, '45a8c389-a9694cfb-fbcd-4d82-80f4-7e6c7fd63ed2.jpg', '2023-03-29 23:58:42', '2023-03-30 01:09:24'),
(20, 18, '2023-04-10', '2023-04-11', 'Sakit', NULL, 'Asam lambung', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-a54b9eba-5331-427d-a0bf-a31523cf3b4f.png', 1, '45a8c389-a54b9eba-5331-427d-a0bf-a31523cf3b4f.jpg', '2023-04-10 00:44:41', '2023-04-10 02:41:59'),
(21, 4, '2023-04-26', '2023-04-27', 'Cuti', NULL, 'kehabisan tiket pulang ke magelang', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-96551122-27a7-4d39-9bb7-145dcfe7611b.png', 1, NULL, '2023-04-24 14:23:47', '2023-04-25 03:29:06'),
(22, 20, '2023-05-17', '2023-05-19', 'Izin', 'Lainnya', 'Pelepasan siswa di sekolah', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-9cab0484-c8e1-442d-9ae1-52dd3fff47f3.png', 1, NULL, '2023-05-16 09:12:25', '2023-05-16 09:35:44'),
(23, 21, '2023-05-17', '2023-05-19', 'Izin', 'Lainnya', 'Pelepasan siswa kelas 12 di sekolah', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-eaba74fa-e1c7-4dce-b45c-ac3ece5d15d3.png', 1, NULL, '2023-05-16 09:14:52', '2023-05-16 09:17:16'),
(24, 16, '2023-07-03', '2023-07-05', 'Sakit', NULL, 'Habis mak gubrakk!!! Trus sekarang nyeri sekujur tubuh, izin ambil istirahat njih', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-5400acf8-1830-4474-8ce1-0c8339b0d6f2.png', 2, '45a8c389-5400acf8-1830-4474-8ce1-0c8339b0d6f2.jpg', '2023-07-03 03:15:04', '2023-07-03 04:50:47'),
(25, 2, '2023-07-06', '2023-07-10', 'Cuti', NULL, 'Acara keluarga', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-06fbc29a-3434-4915-8a11-1ebd222e15f2.png', 2, NULL, '2023-07-03 04:34:56', '2023-07-03 09:07:30'),
(26, 20, '2023-07-13', '2023-07-17', 'Izin', 'Lainnya', 'Acara keluarga', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-b41a5955-cc66-40b8-b8e5-9bf4ed103f50.png', 2, NULL, '2023-07-12 06:38:22', '2023-07-13 00:32:08'),
(27, 2, '2023-08-21', '2023-08-23', 'Cuti', NULL, 'Acara keluarga', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-d84c92f9-7d73-438f-b87b-98366f9b0bf4.png', 2, NULL, '2023-08-18 07:12:49', '2023-08-18 08:08:54'),
(28, 4, '2023-09-01', '2023-09-04', 'Sakit', NULL, 'Demam', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-6b689894-e054-48d6-ae25-e142ceff70e9.png', 1, NULL, '2023-09-01 04:56:08', '2023-09-01 07:01:27'),
(29, 16, '2023-11-13', '2023-11-15', 'Sakit', NULL, 'Meriang parah', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-8f2ab3f3-f8e7-4333-9d1a-f4de3909c9e3.png', 2, '45a8c389-8f2ab3f3-f8e7-4333-9d1a-f4de3909c9e3.jpg', '2023-11-13 09:58:58', '2023-11-14 02:11:13'),
(30, 16, '2023-12-11', '2023-12-12', 'Cuti', NULL, 'Masih di acara nikahan rekan di Batang', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-214eb741-c23a-4e06-8418-3e501eb7f57a.png', 1, NULL, '2023-12-11 04:15:12', '2023-12-11 04:52:41'),
(31, 2, '2023-12-15', '2023-12-20', 'Cuti', NULL, 'Acara keluarga', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-1b1282e3-5cea-4cf7-bd78-4081167641fa.png', 3, NULL, '2023-12-13 02:46:49', '2023-12-15 00:20:45'),
(33, 16, '2023-12-27', '2024-01-02', 'Cuti', NULL, 'Persiapan final presentation Bangkit dan ada acara di rumah', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-e2ed1cbd-9a58-4a46-9424-952fd868f49a.png', 4, NULL, '2023-12-25 02:18:03', '2023-12-26 02:39:06'),
(34, 12, '2023-12-29', '2024-01-02', 'Cuti', NULL, 'Ada acara di Rumah Cilacap', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-9f27b7e2-05c0-4a52-b7bd-5920723c94d8.png', 2, NULL, '2023-12-28 10:04:22', '2023-12-29 02:07:53'),
(35, 2, '2023-12-29', '2024-01-02', 'Cuti', NULL, 'Acara keluarga', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-f69e6954-b858-4478-92fb-87d8f3d3b38b.png', 2, NULL, '2023-12-28 12:36:00', '2023-12-28 19:15:49'),
(36, 16, '2024-01-16', '2024-01-17', 'Cuti', NULL, 'Ujian TAS', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-d70ea3e0-f359-4609-9323-9583b885b6e5.png', 1, NULL, '2024-01-14 13:55:56', '2024-01-15 00:41:31'),
(37, 5, '2024-01-22', '2024-01-23', 'Cuti', NULL, 'Menjenguk orang tua', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-e7e83863-be5a-41d8-80d4-2b244fc60976.png', 1, NULL, '2024-01-21 23:11:16', '2024-01-22 01:42:04'),
(38, 12, '2024-01-24', '2024-01-25', 'Cuti', NULL, 'Sakit perut + kepala, need bed rest', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-45780ff7-41c4-490a-83a4-1d7c72bf82b3.png', 1, NULL, '2024-01-24 01:02:52', '2024-01-24 03:54:39'),
(39, 4, '2024-01-29', '2024-02-01', 'Cuti', NULL, 'Menjenguk Orang Tua', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-a1ad6060-82c4-41af-b5a4-3f4d5034c658.png', 3, NULL, '2024-01-26 09:06:06', '2024-01-29 01:44:21'),
(40, 2, '2024-02-12', '2024-02-13', 'Cuti', NULL, 'Urusan keluarga', NULL, 'Tidak Disetujui', NULL, NULL, 'a4f212c8-e107af63-ab6e-4f94-9362-b21444cd6568.png', 1, NULL, '2024-02-07 02:43:13', '2024-02-07 04:43:06'),
(41, 12, '2024-02-13', '2024-02-15', 'Cuti', NULL, 'Mau jenguk orangtua ke cilacap sekaligus coblosan', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-ff8d6ab6-c17d-45e9-981e-803eba102451.png', 1, NULL, '2024-02-12 14:28:55', '2024-02-13 02:00:29'),
(42, 12, '2024-02-27', '2024-03-01', 'Sakit', NULL, 'Tipes Kambuh diharuskan istirahat total sama dokter', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-c70dbe25-d91b-4e6f-9e49-a54b6f1c5cbb.png', 3, '45a8c389-c70dbe25-d91b-4e6f-9e49-a54b6f1c5cbb.jpg', '2024-02-27 00:02:39', '2024-02-27 00:07:50'),
(43, 12, '2024-03-01', '2024-03-06', 'Cuti', NULL, 'Masih pemulihan, belum sembuh 100% 🙏🏻', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-d4e7c763-8c9f-4c94-b801-dd9d6ca7d2b0.png', 3, NULL, '2024-02-29 17:38:51', '2024-03-01 02:58:53'),
(44, 27, '2024-03-14', '2024-03-14', 'Sakit', NULL, 'Aslam lambung naik dari semalem', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-a9a8716a-9dce-42f8-8d13-c747af95d369.png', 0, '45a8c389-a9a8716a-9dce-42f8-8d13-c747af95d369.jpg', '2024-03-14 02:39:32', '2024-03-19 05:48:17'),
(45, 5, '2024-04-16', '2024-04-17', 'Cuti', NULL, 'belum kuat buat aktivitas karena sudah 10 hari badan sakit, lemas, mual, asam lambung naik, tidak kuat untuk duduk lama dan saat ini masih proses pemulihan. \r\nUntuk laporan monthly VLOD akan dikirimkan ke mas Hafifi.', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-0f4cc05d-c79d-4824-9187-a1166d0552b2.png', 1, NULL, '2024-04-15 11:44:21', '2024-04-16 02:22:17'),
(46, 5, '2024-04-17', '2024-04-22', 'Sakit', NULL, 'Sakit asam lambung, badan lemas, mual, tidak kuat duduk lama.', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-22e9360c-5892-4692-847a-e001c4436e75.png', 3, '45a8c389-22e9360c-5892-4692-847a-e001c4436e75.jpg', '2024-04-17 04:01:26', '2024-04-17 09:26:26'),
(47, 16, '2024-04-19', '2024-04-22', 'Sakit', NULL, 'Badan drop', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-e73f3f4c-bc1b-400a-9ee7-8859fec853e5.png', 1, '45a8c389-e73f3f4c-bc1b-400a-9ee7-8859fec853e5.jpg', '2024-04-19 01:35:03', '2024-04-19 01:36:03'),
(48, 27, '2024-04-23', '2024-04-24', 'Sakit', NULL, 'Sedang demam', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-c68fe046-ac2b-4004-8084-19b8a5f7446a.png', 1, '45a8c389-c68fe046-ac2b-4004-8084-19b8a5f7446a.jpg', '2024-04-23 04:00:52', '2024-04-23 04:07:29'),
(49, 4, '2024-06-26', '2024-06-29', 'Cuti', NULL, 'Test Cuti Skripsi', NULL, 'Disetujui', NULL, NULL, 'a4f212c8-598a7344-54b8-4f2f-99c5-c480c1d9920e.png', 2, NULL, '2024-06-26 14:04:43', '2024-06-26 14:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'WebDev Administrator', 'webdev1@mail.com', '2022-12-22 08:05:07', '$2y$10$cWFXf9HhfbXcUYHsYV7L3uhLaTTISc75/gONMCZofeBLDrdm1fokm', 'user', NULL, '2022-12-22 08:05:08', '2023-01-02 02:28:21'),
(2, 'Krisostomus Nova Rahmanto', 'majus386@gmail.com', '2022-12-22 09:40:37', '$2y$10$.cl4VLvIol.0CdYM9ZkRhOQzYOz9lskUWiA.jpMFhbSFFLfHf7Spu', 'administrator', NULL, '2022-12-22 09:20:01', '2024-06-26 13:41:42'),
(3, 'Elisabeth Cesaria Dwi N', 'elisabethcesaria@gmail.com', '2022-12-23 02:45:35', '$2y$10$CqLCkoHcFIiv7EeYqlrL3uInBVlkJwlUEKoVWiZvItHStBp5p4tn.', 'admin', NULL, '2022-12-22 09:20:09', '2023-03-13 02:04:19'),
(4, 'Radhitya Yoga Wiranto', 'radhityayoga9@gmail.com', '2022-12-23 09:59:11', '$2y$10$OkmTAdh/bgY0qB2pn3ko2OkyfQfNiE.yri9kRIqfTKBSRp4s5a2vu', 'karyawan', 'ipGRIheJHXkiTFKbZQIQwBSckv9DsCePo3geAted6LUWOmtQpfQZqWN4ehyI', '2022-12-22 09:20:16', '2023-06-15 06:15:41'),
(5, 'Muhammad Gus Khamim', 'webdev.khamim@gmail.com', '2022-12-22 09:22:21', '$2y$10$.cl4VLvIol.0CdYM9ZkRhOQzYOz9lskUWiA.jpMFhbSFFLfHf7Spu', 'administrator', '1WzggOjdDA7TgSIoyhBMoHuvGE2wbhiBNJlnWJSbboNl32PGYdrYIUurblkk', '2022-12-22 09:20:20', '2024-06-26 13:12:52'),
(6, 'Meimunah', 'meymunah21@gmail.com', '2022-12-22 13:11:01', '$2y$10$MiMpPQKzPa7zxOMB4EgdCem8jqNY9waHYFAxUucH6XrbMsVIWj19i', 'karyawan', 'B1allpkbdgQ9GLvqjevFkyk37jrEg8Li8ML0xHURrLEHg4p77j9ktOUnwnB0', '2022-12-22 09:22:54', '2022-12-22 13:11:01'),
(7, 'Gilar Surya Pandita', 'gilarsuryapandita@gmail.com', '2022-12-23 01:32:21', '$2y$10$3cnfZJ8/MjBbzx794sL.nOdtRnmwBHF0pu64rYU4HwUmO.yMhfsNu', 'karyawan', NULL, '2022-12-22 09:23:01', '2022-12-23 01:32:47'),
(8, 'David Christanto', 'davidchristanto93@gmail.com', '2022-12-22 10:04:08', '$2y$10$UcJyhA84hN9uohn46dsPUOvGrnaPFPDmIwILjibBRs8t4dgfvghGa', 'karyawan', 'aDHFfgc7yJhelf15z1BklFtpwofMc7aYDPqzLGeW3f1WWzd6ZnhEi64u4qbx', '2022-12-22 09:23:08', '2023-01-08 12:58:18'),
(9, 'Vicencius Dimas Panca P', 'vincdpanca221@gmail.com', '2022-12-22 11:06:27', '$2y$10$wwntsgEYUag/i2LUTHo0U.o7ge8uyXimOfxkyYpxlvQlOVXrj2OMS', 'karyawan', NULL, '2022-12-22 09:23:13', '2022-12-22 11:07:30'),
(10, 'Ayuthia Putri Maharani', 'ayuthia.putrimaharani14@gmail.com', NULL, '$2y$10$Pcl0CskY4CU1.EYczD7ITe7hRbVNq9WS4cb3/p/p6vrT6AB.B6/H.', 'karyawan', NULL, '2022-12-22 09:45:55', '2022-12-22 09:45:55'),
(11, 'Rofingatun Nikmah', 'rof.nikmah@gmail.com', '2022-12-23 02:49:29', '$2y$10$JfDuUQPL16NH6jejbqPtr.GGaX1uldJ2iykRvLQypqKGhUT2mtJSG', 'karyawan', NULL, '2022-12-22 09:46:02', '2022-12-23 02:49:29'),
(12, 'Laura Liokelly Toron', 'lauraliokelly@gmail.com', '2022-12-23 02:45:35', '$2y$10$/VD.4WwY2FJvv4pHJhzygeu9qszKmyhNuhG2wyOjy4HLc.wasEuSS', 'karyawan', NULL, '2022-12-22 09:46:19', '2022-12-23 02:47:48'),
(13, 'Anis Zaitunah', 'aniszaitunah93@gmail.com', '2022-12-23 03:56:34', '$2y$10$oD502oJ2WmoN81Gb5DFJFOP.y5cwndgSpycbbFry7N.8D.H.ZyzXe', 'karyawan', 'JdCBZpDP88mwtDg1Id6LBEThfZA4pWqHwmofnvWm0u5EoX8Rd7gAitdAxd8q', '2022-12-22 09:50:36', '2023-02-03 04:14:53'),
(14, 'Malecita Nur Atala Singgih', 'malecitanur@gmail.com', '2022-12-23 09:44:53', '$2y$10$WYj3BsK10uC2zro9R4P/.eiR5qW0ViLVpgLmGEwWkQGg5UaaIchD2', 'karyawan', NULL, '2022-12-22 09:53:36', '2022-12-23 09:44:53'),
(15, 'Prananto Widi Hapsoro', 'pwhnandi@gmail.com', '2022-12-22 10:03:23', '$2y$10$ZpOT0.fGkXGreHL5vkuBf.ZvFAyE3u5IYAIfA.pZcHBBRD0km7wx6', 'manajer', NULL, '2022-12-22 09:59:29', '2023-11-05 23:43:33'),
(16, 'Taufaldisatya Wijatama Diwangkara', 'wijatama.sadasa@gmail.com', '2022-12-23 02:48:48', '$2y$10$5yC2XsJEAMFqlrZ3v2D9WubYw3y7P48hzmQeqIcyB19/qI4kdtRAC', 'karyawan', NULL, '2022-12-22 10:08:51', '2022-12-23 02:49:43'),
(17, 'Fatrah Ahmad Putra', 'work.faputra@gmail.com', '2022-12-23 03:06:32', '$2y$10$ZNrThXx9gJu9mbrHTssgFu05UFwpJGgdzWBT/eR30QlrkibLqtkJO', 'karyawan', NULL, '2022-12-22 10:12:49', '2022-12-23 03:06:59'),
(18, 'Eka Adi Nugraha', 'penyamae@gmail.com', '2022-12-23 09:51:06', '$2y$10$ORD4mr.Wajr6SF0KrCx8ruS6.Y2GKTyFJ83PmSRvIQUAakF7uQff2', 'manajer', NULL, '2022-12-22 10:18:37', '2022-12-23 09:51:06'),
(19, 'Theodora Cherly Berlian Prayudya', 'cherlyberlian26@gmail.com', '2023-02-27 11:28:03', '$2y$10$C.j9Gl8vBhCaMCXK86dt/uHIp2sfzb6SG.9FyLhhx3babtIiKo2/e', 'admin', NULL, '2023-02-27 10:48:36', '2023-04-18 02:52:25'),
(20, 'Eko Nur Cahyo', 'ekonurcahyop29@gmail.com', '2023-05-16 04:25:16', '$2y$10$u0ITLj3wiG6NlLNbaQ/qpOkoFzl8J2YTnbtK4iD.Tf.mj//5UzqhG', 'karyawan', NULL, '2023-05-16 04:20:28', '2023-05-16 04:25:16'),
(21, 'Shifa Sholiana', 'shiffana94@gmail.com', '2023-05-16 09:04:27', '$2y$10$maAVNfyjXFtxx01CF8ER3u76BGBRksatxbSYz0fvLXOAgAvlqFJ4O', 'karyawan', NULL, '2023-05-16 08:56:12', '2023-05-16 09:04:27'),
(22, 'Khaila Kurnia Dewi', 'khailakurniade@gmail.com', '2023-05-16 09:10:49', '$2y$10$VaVq9wwsmiH8yqRKnILF1OG5zk2XyMORAhNFaPsv8.ALxVHcGVclu', 'karyawan', NULL, '2023-05-16 08:56:21', '2023-05-16 09:10:49'),
(23, 'Gerrit Ezra Yudi Kairupan', 'gerritkairupan.bonvid2@gmail.com', '2023-08-16 04:17:28', '$2y$10$yIwTFYtI3.EMVb.9S5vBEeERfqBbnERY7pmyeVeCs/LF9Yoxg8zHW', 'karyawan', NULL, '2023-08-16 04:14:05', '2023-08-16 08:27:23'),
(24, 'Wahyu Eka SatyaPutra', 'iwhyeka@gmail.com', '2023-11-15 02:47:10', '$2y$10$C82l7ZS/oFCaYgJ7XJs8nOBDZFRGDsmzE/UIsJ93tXEl7txcyu5Ci', 'karyawan', NULL, '2023-11-15 02:43:53', '2023-11-15 02:55:28'),
(25, 'Yosia Triamanda Kurnia', 'yosiatriamanda05@gmail.com', '2023-11-23 02:58:21', '$2y$10$OIGfURfTdCI6mFwQkKhtz.9uMIhDXKJPy/GiSiwe.lYsRo/ha4qda', 'karyawan', NULL, '2023-11-23 02:53:09', '2023-11-23 03:06:31'),
(26, 'Yustinus Sahala Samosir', 'sahala.samosir@gmail.com', '2024-01-11 09:37:01', '$2y$10$6Tyyrwo.T/kplu5F4FHUaO38SFvzhoAUrleHGScUmtQrFElO6hjam', 'manajer', NULL, '2024-01-11 09:35:54', '2024-01-11 09:39:56'),
(27, 'Yulita Maria Dwiatri', 'atik180520@gmail.com', '2024-01-11 09:44:55', '$2y$10$vtrUJqUwC.7O704fvQFbhOAvsI2OymhEKLvNCc5pQKlymqAbE4.2u', 'admin', NULL, '2024-01-11 09:44:39', '2024-02-23 03:10:47'),
(28, 'Hafifi Putra Arafat', 'hafifiputra94@gmail.com', '2024-01-26 08:52:09', '$2y$10$x1KLWJUxwEEN0lrrVKy3LOjvIOKTGNWsbbaEcrmiOKEWK2vuOLV8a', 'admin', 'ICXo2pIE0T4ykvkAz0WHqwmxalGKgwjICuqmAPHQ5MLkNe7qwCWc0Owld5qk', '2024-01-26 08:49:15', '2024-03-19 02:51:01'),
(29, 'Ignasio De Loyola Dwi Praptista Yossa', 'yossa46@gmail.com', '2024-01-29 04:47:23', '$2y$10$/o9vKIuFDWvivZR9Wp9zqubQiJIaDWnU8pLVgeqnQ7qEyGXJRUWC6', 'karyawan', NULL, '2024-01-26 08:58:23', '2024-01-29 04:47:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_position_id_foreign` (`position_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`),
  ADD KEY `employees_part_id_foreign` (`part_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_part_id_foreign` (`part_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
