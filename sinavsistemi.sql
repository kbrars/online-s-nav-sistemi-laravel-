-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Ağu 2022, 17:03:45
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinavsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_28_060016_create_todos_table', 2),
(6, '2022_07_28_062811_create_seceneks_table', 3),
(7, '2022_07_28_063302_create_seceneks_table', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seceneks`
--

CREATE TABLE `seceneks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `secenek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `soru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `durum` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `seceneks`
--

INSERT INTO `seceneks` (`id`, `secenek`, `soru_id`, `created_at`, `updated_at`, `durum`) VALUES
(1, 'denem1', 410, NULL, NULL, 'false'),
(2, 'deneme3', 410, NULL, NULL, 'false'),
(3, 'deneme4', 410, NULL, NULL, 'false'),
(123, 'deneme2', 410, NULL, NULL, 'false'),
(129, 'cddcecefef', 411, NULL, NULL, 'false'),
(142, 'fbv', 411, NULL, NULL, 'false'),
(143, 'b', 411, NULL, NULL, 'true');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinavlar`
--

CREATE TABLE `sinavlar` (
  `sinav_id` int(20) NOT NULL,
  `sinav_süresi` time NOT NULL,
  `sinav_adi` varchar(250) NOT NULL,
  `sinav_aciklama` varchar(225) NOT NULL,
  `sinav_tarihi` timestamp NULL DEFAULT NULL,
  `ogretmen` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sinavlar`
--

INSERT INTO `sinavlar` (`sinav_id`, `sinav_süresi`, `sinav_adi`, `sinav_aciklama`, `sinav_tarihi`, `ogretmen`, `created_at`, `updated_at`) VALUES
(203, '00:30:00', 'Bilgisayarss', 'Bellek Birimleri', '2022-08-24 14:00:00', 'Kübra Arslan', NULL, NULL),
(204, '08:04:00', 'SDF', 'DFH', '2022-09-04 09:58:00', 'Kübra Arslan', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `soru_id` bigint(20) UNSIGNED NOT NULL,
  `soru_metni` text NOT NULL,
  `sinav_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`soru_id`, `soru_metni`, `sinav_id`) VALUES
(410, 'aşağıdakilerden hangisi blaa', 203),
(411, 'soru111', 203);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `studentanswer`
--

CREATE TABLE `studentanswer` (
  `id` int(11) NOT NULL,
  `students_id` bigint(20) UNSIGNED NOT NULL,
  `secenek_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `ogrenci_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `todos`
--

INSERT INTO `todos` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'deneme', '2022-07-28 03:09:10', '2022-07-28 03:09:10'),
(2, 'demem2', '2022-07-28 03:09:10', '2022-07-28 03:09:10'),
(3, 'deneme3', '2022-07-28 03:09:10', '2022-07-28 03:09:10'),
(4, 'deneme4', '2022-07-28 03:09:10', '2022-07-28 03:09:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soyad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tckn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dogumTarihi` date NOT NULL DEFAULT current_timestamp(),
  `okul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `sifre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sys_role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `isim`, `soyad`, `email`, `tckn`, `telefon`, `dogumTarihi`, `okul`, `email_verified_at`, `sifre`, `remember_token`, `created_at`, `updated_at`, `sys_role`) VALUES
(23, 'kübra', 'arslan', 'kubrarslan509@gmail.com', '1', '05060589743', '2022-08-10', 'kırşehir ahi evran üniversitesi', NULL, '$2y$10$WKBLEWPFvbZ9GI5/hs2S4eyO9Mkex4AQzwzwgXHgTJgSC8okZH64G', NULL, '2022-08-03 02:59:17', '2022-08-03 02:59:17', 'öğretmen');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `seceneks`
--
ALTER TABLE `seceneks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soru` (`soru_id`),
  ADD KEY `soru_id_2` (`soru_id`);

--
-- Tablo için indeksler `sinavlar`
--
ALTER TABLE `sinavlar`
  ADD PRIMARY KEY (`sinav_id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`soru_id`),
  ADD KEY `sinav_id` (`sinav_id`);

--
-- Tablo için indeksler `studentanswer`
--
ALTER TABLE `studentanswer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `secenek_id` (`secenek_id`),
  ADD KEY `students_id` (`students_id`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ogrenci_id`);

--
-- Tablo için indeksler `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `seceneks`
--
ALTER TABLE `seceneks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Tablo için AUTO_INCREMENT değeri `sinavlar`
--
ALTER TABLE `sinavlar`
  MODIFY `sinav_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `soru_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- Tablo için AUTO_INCREMENT değeri `studentanswer`
--
ALTER TABLE `studentanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `ogrenci_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `seceneks`
--
ALTER TABLE `seceneks`
  ADD CONSTRAINT `seceneks_ibfk_1` FOREIGN KEY (`soru_id`) REFERENCES `sorular` (`soru_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sorular`
--
ALTER TABLE `sorular`
  ADD CONSTRAINT `sorular_ibfk_1` FOREIGN KEY (`sinav_id`) REFERENCES `sinavlar` (`sinav_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `studentanswer`
--
ALTER TABLE `studentanswer`
  ADD CONSTRAINT `studentanswer_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`ogrenci_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentanswer_ibfk_2` FOREIGN KEY (`secenek_id`) REFERENCES `seceneks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
