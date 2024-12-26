-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2024 pada 16.13
-- Versi server: 8.0.30
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user_tamu` bigint UNSIGNED NOT NULL,
  `id_people` bigint UNSIGNED NOT NULL,
  `tanggal_book` datetime NOT NULL,
  `tanggal_checkin` datetime NOT NULL,
  `tanggal_checkout` datetime NOT NULL,
  `id_kamar` bigint UNSIGNED NOT NULL,
  `pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_accept` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_user_tamu`, `id_people`, `tanggal_book`, `tanggal_checkin`, `tanggal_checkout`, `id_kamar`, `pembayaran`, `total_harga`, `status`, `id_user_accept`, `created_at`, `updated_at`) VALUES
(45, 2, 11, '2024-12-26 12:29:00', '2024-12-26 16:31:01', '2024-12-26 17:11:18', 7, 'transfer', 1000000.00, 'checkout', 2, '2024-12-26 05:29:00', '2024-12-26 10:11:18'),
(46, 2, 9, '2024-12-26 16:36:51', '2024-12-26 17:12:40', '2024-12-26 17:12:44', 7, 'cash', 1000000.00, 'checkout', 2, '2024-12-26 09:36:51', '2024-12-26 10:12:44'),
(47, 2, 6, '2024-12-26 17:15:38', '2024-12-27 12:00:00', '2024-12-28 12:00:00', 7, 'cash', 1000000.00, 'booking', NULL, '2024-12-26 10:15:38', '2024-12-26 10:15:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id`, `nama_fasilitas`, `deskripsi_fasilitas`, `foto1`, `foto2`, `foto3`, `created_at`, `updated_at`) VALUES
(6, 'Tempat Santai Pantai', 'Nyaman dan saksikan sunrise yang memukau', 'images/fasilitas/jkK10lSo6dXP7HWpiNA9QVhd6JAhANoq4doI2cXK.jpg', 'images/fasilitas/KUyoq4YcVMII0rpdvEpSPLSYHor4xxo2WXEgnVRZ.jpg', 'images/fasilitas/GDvWwkl6PhrlKSAGm7X7ll1GxeRX23H0nkMwpVZ7.jpg', '2024-12-25 17:43:24', '2024-12-25 17:43:24'),
(7, 'Kolam Renang', 'Kolam air tawar yang mewah sampai kedalaman 5 meter', 'images/fasilitas/dSVphOKlqqzVU1A8eiw5f6f6vEAnnnsaurwYfYaL.jpg', 'images/fasilitas/3kKCC4ACBtrQopdcoRUp6ZXP56c2iW4Mru3ze1xb.jpg', 'images/fasilitas/PxZyXcs0KwzAkAIw7K3j0sfDB5pFa0PpJWxxToTB.jpg', '2024-12-25 17:47:13', '2024-12-25 17:47:13'),
(8, 'Restaurant Indoor', 'Nyaman dan hangat dengan menu yang menjakan lidahmu', 'images/fasilitas/ZkXpN2bk4Aebg6d7iZVcKcWSj7w3lPpmkWYFDXDH.jpg', 'images/fasilitas/lnz2QZwztfM9LBqCHjr9SbG7kpeI8rG7Z7ZkgAMp.jpg', 'images/fasilitas/bj8zkrlwRY18xr7SIQwedWClAyBuAtjWWu06dTZt.jpg', '2024-12-25 17:48:10', '2024-12-25 17:48:10'),
(9, 'Restaurant Outdoor', 'Berbagai menu istimewa hadir untuk anda', 'images/fasilitas/qbccxpR4y59MyQyh1C89ONkySInJa1cBz9VdSQQa.jpg', 'images/fasilitas/t03TdSjdITQQZb9X4Ay1vWPPTe3JxZUwOniXu48l.jpg', 'images/fasilitas/0PF4i4DtHMLZEvG2FQhmQk4iV8MpsXClMYIljjqS.jpg', '2024-12-25 17:49:09', '2024-12-25 17:49:09'),
(10, 'Sarapan Gratis', 'Dengan menu yang dibawa oleh chef handal kami', 'images/fasilitas/Rpk3XlKe4U1DzTxVL18wn5RnAjG7NLvs73yQ3Kyl.jpg', 'images/fasilitas/v7ehH97gRcWpm31E0mVxK2KmN2adRKp3MzS5YDST.jpg', 'images/fasilitas/5gPBp7bzF8SH0J0Boraa88FPLI4beFz75arfDszn.jpg', '2024-12-25 17:49:52', '2024-12-25 17:49:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_kamar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kamar` tinyint NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kamar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_kamar` decimal(10,2) NOT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `jenis_kamar`, `jumlah_kamar`, `fasilitas`, `deskripsi_kamar`, `harga_kamar`, `foto1`, `foto2`, `foto3`, `created_at`, `updated_at`) VALUES
(7, 'Delux Room', 14, '1 Kasur Besar | 1 AC | Toilet Pribadi | 1 Lemari Besar |  1 TV  |  1 Meja | 2 Kursi', 'Kamar mewah yang memanjakan tidur anda', 250000.00, 'images/kamar/1pKvMzjdRnBR2U6RzOF4WEcNibGeg5EAZqkjFuOm.jpg', 'images/kamar/HTAIkctT4VuNyqKbvbYkHe3TtVtcc1KWo40ccT0y.jpg', 'images/kamar/h8p9nCM1DmVYL5E8iGbGGjhdN3RFAGy1mCWgrExc.jpg', '2024-12-25 18:16:53', '2024-12-26 15:04:07'),
(9, 'Single Room', 25, '1 Kasur | 1 Lemari | 1 AC | TV | Meja Kursi | Toilet Pribadi', 'Kamar murah dengan fasilitas mewah, cocok untuk anda yang singgah sementara', 150000.00, 'images/kamar/8Imu1laex95dqvL6v85hZ6geGlX9g5eE8rzGtqXj.jpg', 'images/kamar/LVunYao0nrF4wT9OpKveysoxNUIJaAvspx0l17gh.jpg', 'images/kamar/TEDwFlvbKzEfyyTRyFzsukm0B1NsxmzMSjEViitu.jpg', '2024-12-26 15:03:17', '2024-12-26 15:10:34'),
(10, 'Twin Bed Room', 15, '2 Kasur | 1 Lemari | 1 AC | TV | Meja Kursi | Toilet Pribadi', 'Solusi murah dengan 2 kamar dan fasilitas mewah', 200000.00, 'images/kamar/FlEVl3VmhF54aW8MvUoQheo5Oz950qge9IIA7tkZ.jpg', 'images/kamar/BMMfRPvSl3utwvXTHfiDKfHAqaM63tGaPryrbZZ2.jpg', 'images/kamar/bO5VoyUXTWEGErcmOQcklUrlkPdz6LTWXmmzjfrA.jpg', '2024-12-26 15:06:40', '2024-12-26 15:10:44'),
(11, 'Family Room', 15, '1 Kasur Besar | 1 AC | Toilet Pribadi | 1 Lemari Besar |  1 TV  |  1 Meja | 2 Kursi', 'Kamar beruangan lebar yang dikususkan untuk anda yang berkeluarga', 200000.00, 'images/kamar/dHpLlPgX3fOWYnvHdLg3lFt4md5AjixoDGvm3Ehg.jpg', 'images/kamar/1rylhUeky04Cx5ihyIujCi8p88fq2OfTNJhTQhdO.jpg', 'images/kamar/EJEagFktwqzAVRo4111gMrvRWJUMJ6BZHMOudm7n.jpg', '2024-12-26 15:09:38', '2024-12-26 15:09:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_11_14_054000_create_sessions_table', 1),
(4, '2024_11_14_055520_create_people_table', 1),
(5, '2024_11_14_055536_create_users_table', 1),
(6, '2024_11_17_134604_create_fasilitas_hotel_table', 1),
(10, '2024_11_17_134614_create_kamar_table', 2),
(12, '2024_11_17_134623_create_booking_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `people`
--

CREATE TABLE `people` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint UNSIGNED NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `people`
--

INSERT INTO `people` (`id`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `nik`, `alamat_lengkap`, `foto_ktp`, `created_at`, `updated_at`) VALUES
(6, 'rafael', 'dika', 'L', 3517066009100001, 'asdasdsadas', 'images/ktp/HZC6FDQ3uTn2qoshpoFwZzScAZaCFbVrivDl24ie.jpg', '2024-12-01 22:02:31', '2024-12-08 07:50:25'),
(9, 'yoga', 'dika', 'L', 3517066009100002, 'qewqweqwewq', 'images/ktp/ps2queKDZc84hRTeRLUKVG9QsvvdSFu17KaSC3gC.png', '2024-12-02 00:35:08', '2024-12-08 07:49:56'),
(11, 'wahyu adam anandika', 'dika', 'L', 3517066009100004, 'asdasdad', 'images/ktp/VcQzt7NwezSESUSkU8gIvTdPPW9u3AgQPG4X80XS.jpg', '2024-12-08 07:51:21', '2024-12-08 07:51:21'),
(13, 'Wahyu Adam Anandika', 'dika', 'L', 3517066009100006, 'asdas', 'images/ktp/9tvxVQ3w12Mh82bhPhvIPj80CCw4qU7Rxq9pjx74.png', '2024-12-21 08:26:21', '2024-12-21 08:26:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nOroDKNekNrd0eOuKG7AK37EwtO3cvmAi3XGgZ75', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHBNSzNLM3pNSUFZWktxNUJZOHp2S1dnMjJhUk53cnJzQ1VjYnJpaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9ib29rLWhvdGVsLnRlc3QvYWRtaW4va2FtYXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1735225872);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('tamu','resepsionis','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_people1` bigint UNSIGNED DEFAULT NULL,
  `add_people2` bigint UNSIGNED DEFAULT NULL,
  `add_people3` bigint UNSIGNED DEFAULT NULL,
  `add_people4` bigint UNSIGNED DEFAULT NULL,
  `add_people5` bigint UNSIGNED DEFAULT NULL,
  `add_people6` bigint UNSIGNED DEFAULT NULL,
  `add_people7` bigint UNSIGNED DEFAULT NULL,
  `add_people8` bigint UNSIGNED DEFAULT NULL,
  `add_people9` bigint UNSIGNED DEFAULT NULL,
  `add_people10` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `email`, `no_telepon`, `add_people1`, `add_people2`, `add_people3`, `add_people4`, `add_people5`, `add_people6`, `add_people7`, `add_people8`, `add_people9`, `add_people10`, `created_at`, `updated_at`) VALUES
(1, 'wahyuu', '$2y$12$3KIWyUEaZkydKw3k6YTRk.hymFsE6VB6jBIfFwPxRu2QbQyNw5dPu', 'tamu', 'Wahyu Adam Anandika', 'Dika', 'L', 'wahyuadamanandika01@gmail.com', '087761811187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-17 07:01:08', '2024-12-21 11:14:22'),
(2, 'admin', '$2y$12$U/MmK2PIj11Rx.bolXJbeuozdyEmRnQaMrC3JVpEUdjJWo.1bPFDC', 'admin', 'Wahyu Adam', 'Dikaa', 'L', 'wahyuadamanandika1@gmail.com', '087761811187', 6, 9, 11, NULL, 13, NULL, NULL, NULL, NULL, NULL, '2024-11-17 21:55:31', '2024-12-26 09:17:10'),
(3, 'rafael', '$2y$12$Td2TPMhbIhz98ZWuWdldGOIudoEvxCVIQHBLYdgM/Pj1WTWqrltPi', 'resepsionis', 'rafael', 'raf', 'L', 'wahyuadam@student.telkomuniversity.ac.id', '087761811187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-08 08:48:27', '2024-12-21 11:14:46'),
(8, 'admin3', '$2y$12$yJIvuOwY6UDAZOww9OmYQOUAOZ8dFJ96x/uYwW4CBkFR5G0zPrgFi', 'tamu', 'Wahyu Adam', 'dika', 'L', 'wahyuadamanandika01@gmail.comsas', '087761811187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-25 01:10:09', '2024-12-25 01:10:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id_user_tamu_foreign` (`id_user_tamu`),
  ADD KEY `booking_id_people_foreign` (`id_people`),
  ADD KEY `booking_id_kamar_foreign` (`id_kamar`),
  ADD KEY `booking_id_user_accept_foreign` (`id_user_accept`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_add_people1_foreign` (`add_people1`),
  ADD KEY `users_add_people2_foreign` (`add_people2`),
  ADD KEY `users_add_people3_foreign` (`add_people3`),
  ADD KEY `users_add_people4_foreign` (`add_people4`),
  ADD KEY `users_add_people5_foreign` (`add_people5`),
  ADD KEY `users_add_people6_foreign` (`add_people6`),
  ADD KEY `users_add_people7_foreign` (`add_people7`),
  ADD KEY `users_add_people8_foreign` (`add_people8`),
  ADD KEY `users_add_people9_foreign` (`add_people9`),
  ADD KEY `users_add_people10_foreign` (`add_people10`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_id_people_foreign` FOREIGN KEY (`id_people`) REFERENCES `people` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_id_user_accept_foreign` FOREIGN KEY (`id_user_accept`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `booking_id_user_tamu_foreign` FOREIGN KEY (`id_user_tamu`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_add_people10_foreign` FOREIGN KEY (`add_people10`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people1_foreign` FOREIGN KEY (`add_people1`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people2_foreign` FOREIGN KEY (`add_people2`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people3_foreign` FOREIGN KEY (`add_people3`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people4_foreign` FOREIGN KEY (`add_people4`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people5_foreign` FOREIGN KEY (`add_people5`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people6_foreign` FOREIGN KEY (`add_people6`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people7_foreign` FOREIGN KEY (`add_people7`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people8_foreign` FOREIGN KEY (`add_people8`) REFERENCES `people` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_add_people9_foreign` FOREIGN KEY (`add_people9`) REFERENCES `people` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
