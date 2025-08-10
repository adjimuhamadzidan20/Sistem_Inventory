-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2025 pada 03.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_inventori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluars`
--

CREATE TABLE `barangkeluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_barangkeluar` varchar(40) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangkeluars`
--

INSERT INTO `barangkeluars` (`id`, `kd_barangkeluar`, `tanggal_keluar`, `barang_id`, `jumlah`, `tujuan`, `created_at`, `updated_at`) VALUES
(1, 'BK-252025-001', '2025-07-06', 1, 3, 'Cikarang Barat', '2025-07-05 22:07:45', '2025-07-05 22:07:45'),
(2, 'BK-252025-002', '2025-07-07', 4, 5, 'Kota Bekasi', '2025-07-07 00:32:03', '2025-07-07 00:32:03'),
(3, 'BK-252025-003', '2025-07-28', 5, 5, 'Cikarang Barat', '2025-07-28 06:09:02', '2025-07-28 06:09:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuks`
--

CREATE TABLE `barangmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_barangmasuk` varchar(40) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangmasuks`
--

INSERT INTO `barangmasuks` (`id`, `kd_barangmasuk`, `tanggal_masuk`, `barang_id`, `jumlah`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'BM-202025-001', '2025-07-06', 1, 30, 3, '2025-07-05 22:03:12', '2025-07-05 22:03:12'),
(2, 'BM-202025-002', '2025-07-06', 4, 15, 3, '2025-07-05 22:03:38', '2025-07-05 22:03:38'),
(3, 'BM-202025-003', '2025-07-06', 2, 5, 1, '2025-07-05 22:05:07', '2025-07-05 22:05:07'),
(4, 'BM-202025-004', '2025-07-06', 2, 40, 5, '2025-07-05 22:06:39', '2025-07-05 22:06:39'),
(5, 'BM-202025-005', '2025-07-28', 5, 15, 6, '2025-07-28 06:08:25', '2025-07-28 06:08:25'),
(6, 'BM-202025-006', '2025-07-28', 1, 12, 2, '2025-07-28 06:47:10', '2025-07-28 06:47:10'),
(7, 'BM-202025-007', '2025-08-03', 5, 20, 4, '2025-08-03 06:26:58', '2025-08-03 06:26:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_barang` varchar(40) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `satuan_id` bigint(20) UNSIGNED NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kd_barang`, `nama_barang`, `kategori_id`, `satuan_id`, `stok_barang`, `created_at`, `updated_at`) VALUES
(1, 'BRG-152025-001', 'Mesin Cuci Samsung', 1, 4, 69, '2025-07-05 22:00:26', '2025-07-05 22:00:26'),
(2, 'BRG-152025-002', 'Kipas Angin Kecil', 1, 4, 57, '2025-07-05 22:00:47', '2025-07-05 22:00:47'),
(3, 'BRG-152025-003', 'Kulkas Sharp 2 Pintu', 1, 4, 15, '2025-07-05 22:01:06', '2025-07-05 22:01:06'),
(4, 'BRG-152025-004', 'Buku Tulis SIDU', 3, 4, 40, '2025-07-05 22:02:07', '2025-07-05 22:02:07'),
(5, 'BRG-152025-005', 'Kertas Binder', 3, 7, 60, '2025-07-28 06:06:57', '2025-07-28 06:06:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', '2025-07-04 18:45:37', '2025-07-04 18:45:37'),
(2, 'Sparepart Motor', '2025-07-04 18:48:01', '2025-08-02 01:24:11'),
(3, 'Alat Tulis Kantor (ATK)', '2025-07-04 18:48:21', '2025-07-28 06:05:14'),
(6, 'Bahan Tekstil', '2025-07-08 07:44:02', '2025-08-02 01:23:58'),
(7, 'Alat Berat', '2025-07-28 06:04:56', '2025-07-28 06:04:56'),
(8, 'Industrial', '2025-08-02 01:23:36', '2025-08-02 01:23:36'),
(9, 'Sparepart Mobil', '2025-08-02 18:35:27', '2025-08-02 18:35:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_04_041058_create_kategoris_table', 1),
(6, '2025_07_04_041119_create_satuans_table', 1),
(7, '2025_07_04_041130_create_suppliers_table', 1),
(8, '2025_07_04_135042_create_barangs_table', 1),
(9, '2025_07_04_142811_create_barangmasuks_table', 1),
(10, '2025_07_04_142823_create_barangkeluars_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satuans`
--

INSERT INTO `satuans` (`id`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'Kilogram', '2025-07-04 19:35:31', '2025-07-05 06:51:34'),
(2, 'Lusin', '2025-07-04 19:35:54', '2025-07-04 19:35:54'),
(4, 'Unit', '2025-07-04 19:36:15', '2025-07-04 19:36:15'),
(5, 'Kodi', '2025-07-05 06:50:36', '2025-07-05 06:50:36'),
(6, 'Rim', '2025-07-08 07:44:45', '2025-07-08 07:44:45'),
(7, 'Dus', '2025-07-28 06:05:40', '2025-07-28 06:05:40'),
(8, 'Ton', '2025-08-02 01:24:41', '2025-08-02 01:24:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_supplier` varchar(40) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `kd_supplier`, `nama_supplier`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'SP-102025-001', 'PT Jasamarga', 'Jakarta Timur', '089999004353', '2025-07-05 21:56:45', '2025-07-05 21:56:45'),
(2, 'SP-102025-002', 'PT Alam Segar TBK', 'Kota Bekasi', '089999004353', '2025-07-05 21:57:08', '2025-07-05 21:58:28'),
(3, 'SP-102025-003', 'PT SSD', 'Kota Bekasi', '089999004390', '2025-07-05 21:57:30', '2025-07-05 21:57:30'),
(4, 'SP-102025-004', 'PT Ajinomoto TBK', 'KIIC Karawang', '087766643537', '2025-07-05 21:57:53', '2025-07-05 21:58:51'),
(5, 'SP-102025-005', 'PT Indofood', 'Kawasan Pulogadung', '089999004999', '2025-07-05 21:59:26', '2025-07-05 21:59:26'),
(6, 'SP-102025-006', 'PT Angin Ribut', 'Kawasan MM2100 Cikarang', '089999004390', '2025-07-28 06:06:13', '2025-07-28 06:06:13'),
(7, 'SP-102025-007', 'PT Untung Terus', 'Kota Bekasi', '08776663434', '2025-08-02 01:25:21', '2025-08-02 01:25:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `jenis_kelamin`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Beyourselfit', 'beyourselfit@email.com', NULL, 'Laki-laki', 'beyourself123', '$2y$12$nD.3wz8Q1Sxw4pEuyRY8IOaPoMBy.mVtkS8ZG.xYWjXpiMneH83ZG', NULL, NULL, '2025-08-09 17:35:49'),
(2, 'Revolution', 'revolution24@email.com', NULL, 'Laki-laki', 'admin123', '$2y$12$aIics3P9F/YohnKed75MJOmWYMVmGZrUmjNu8oiu.NP5vZwsOnF4O', NULL, '2025-07-07 00:14:29', '2025-07-10 08:09:04'),
(3, 'Education', 'education@email.com', NULL, 'Laki-laki', 'pengguna123', '$2y$12$ZasHZoGj5B8UFBWoCeTwsOPmzkKa6SGR0kifsfUuQeXcaagDUOEGO', NULL, '2025-07-08 07:45:58', '2025-07-08 07:45:58'),
(4, 'Test123', 'test123@email.com', NULL, 'Laki-laki', 'test123', '$2y$12$2WQ5uGi0zdHEOIlb6uEeQuYguJPlFvKCgFQ.W2HqyokntNLl/HJra', NULL, '2025-07-08 07:47:32', '2025-08-09 17:33:51'),
(5, 'Culture Local', 'culturlocal@email.com', NULL, 'Laki-laki', 'culture123', '$2y$12$oLD4U7tMLIWbYdMcxdRZLe9rLB0ltJ97nQtAOiTGufeJlUqamj2UC', NULL, '2025-08-09 06:53:07', '2025-08-09 06:53:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangkeluars`
--
ALTER TABLE `barangkeluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangkeluars_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `barangmasuks`
--
ALTER TABLE `barangmasuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangmasuks_barang_id_foreign` (`barang_id`),
  ADD KEY `barangmasuks_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`),
  ADD KEY `barangs_satuan_id_foreign` (`satuan_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangkeluars`
--
ALTER TABLE `barangkeluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barangmasuks`
--
ALTER TABLE `barangmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangkeluars`
--
ALTER TABLE `barangkeluars`
  ADD CONSTRAINT `barangkeluars_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barangmasuks`
--
ALTER TABLE `barangmasuks`
  ADD CONSTRAINT `barangmasuks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barangmasuks_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barangs_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
