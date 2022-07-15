-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2022 pada 08.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indonesia_bahagia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `foto`, `alamat`, `telepon`) VALUES
(1, 'admin', 'admin@hb.id', NULL, '$2y$10$W7wrbkC5rNsG4Krg4frfFu3pj7rv7rHtpk99nmBGGDh4laFS.OpIW', NULL, NULL, NULL, '2022-07-05 00:01:53', NULL, 'Magelang', NULL),
(2, 'Admin 2', 'admin@hb2.id', NULL, '$2y$10$k1f9SAjggMbDhMLDp31n0eil65yBNAb1NN7Qhazq6ZWRudw.ROut2', NULL, NULL, '2022-07-04 23:42:05', '2022-07-05 00:10:29', 'storage/admin/1657004620_ice.jpg', 'Magelang 2', '089619119692');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengunjung` int(11) DEFAULT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `judul`, `id_kategori`, `kategori`, `link`, `penulis`, `isi`, `pengunjung`, `komentar`, `tag`, `meta_title`, `meta_description`, `meta_keyword`, `gambar`, `publish`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Blog pertama', 1, 'biasa', 'link', 'admin', '<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>', 24, NULL, 'tag', 'meta', 'Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis,', 'meta', NULL, '1', NULL, NULL, NULL, '2022-07-14 20:47:32'),
(2, 'Blog kedua lewat form', 1, 'biasa', 'link 2', 'Admin', '<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>', 4, NULL, 'tag', 'meta', 'Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.', 'Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.', 'storage/blog/1655870054_konsul.jpg', NULL, '2022-07-11 21:52:55', NULL, '2022-06-21 20:41:19', '2022-07-11 21:52:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_kategoris`
--

CREATE TABLE `blog_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog_kategoris`
--

INSERT INTO `blog_kategoris` (`id`, `nama`, `desc`, `gambar`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'biasa', 'desc', NULL, NULL, NULL, NULL, '2022-06-23 01:07:10'),
(2, 'kesehatan', NULL, NULL, '2022-06-23 00:35:02', NULL, '2022-06-23 00:34:04', '2022-06-23 00:35:02'),
(5, 'kesehatan mental', NULL, NULL, NULL, NULL, '2022-06-23 00:36:52', '2022-06-23 00:36:52'),
(6, 'terbaru dan bagus', NULL, NULL, '2022-06-28 21:02:36', NULL, '2022-06-28 21:02:24', '2022-06-28 21:02:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_komentars`
--

CREATE TABLE `blog_komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog_komentars`
--

INSERT INTO `blog_komentars` (`id`, `id_user`, `id_blog`, `tanggal`, `waktu`, `isi`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10, 2, '2022-06-23', '06:41:25', 'That’s because a brand, at it’s core, is immaterial. It’s about abstract attributes and values which present themselves in concrete ways', NULL, NULL, '2022-06-22 23:41:25', '2022-06-22 23:41:25'),
(2, 10, 2, '2022-06-23', '06:41:34', 'That’s because a brand, at it’s core, is immaterial. It’s about abstract attributes and values which present themselves in concrete ways', NULL, NULL, '2022-06-22 23:41:34', '2022-06-23 00:06:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `enroll_events`
--

CREATE TABLE `enroll_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_konsultan` int(11) DEFAULT NULL,
  `id_event` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `enroll_events`
--

INSERT INTO `enroll_events` (`id`, `id_user`, `id_konsultan`, `id_event`, `id_transaksi`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 2, NULL, NULL, NULL, '2022-06-28 19:20:50', '2022-06-28 19:20:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `enroll_kelas`
--

CREATE TABLE `enroll_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_konsultan` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `enroll_kelas`
--

INSERT INTO `enroll_kelas` (`id`, `id_user`, `id_konsultan`, `id_kelas`, `id_transaksi`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 1, 6, NULL, NULL, '2022-07-05 23:56:24', '2022-07-05 23:56:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `forum_jawabans`
--

CREATE TABLE `forum_jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_konsultan` int(11) DEFAULT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forum_jawabans`
--

INSERT INTO `forum_jawabans` (`id`, `id_pertanyaan`, `id_user`, `id_admin`, `id_konsultan`, `jawaban`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL, '<p>Bagaimana ?</p>', NULL, NULL, '2022-06-26 21:25:52', '2022-06-26 21:31:08'),
(2, 1, 10, NULL, NULL, '<p>Komentar kedua</p>', NULL, NULL, '2022-06-26 21:32:13', '2022-06-26 21:40:41'),
(3, 1, 10, NULL, NULL, '<p>Komentar kedua</p>\r\n<p>kalinya</p>', NULL, NULL, '2022-06-26 21:46:54', '2022-06-26 21:47:22'),
(4, 3, 10, NULL, NULL, '<p>Bagus banget</p>', NULL, NULL, '2022-07-14 01:56:56', '2022-07-14 01:56:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_kategoris`
--

CREATE TABLE `forum_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forum_kategoris`
--

INSERT INTO `forum_kategoris` (`id`, `nama`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mental', NULL, NULL, NULL, NULL),
(2, 'kesehatan', NULL, NULL, '2022-06-28 21:24:53', '2022-06-28 21:24:53'),
(3, 'life crisiss', NULL, NULL, '2022-06-28 21:25:59', '2022-06-28 21:25:59'),
(4, 'nama', NULL, NULL, '2022-06-28 21:27:17', '2022-06-28 21:27:17'),
(5, 'test', NULL, NULL, '2022-06-28 21:28:29', '2022-06-28 21:28:29'),
(6, 'Test 3', NULL, NULL, '2022-07-14 20:16:04', '2022-07-14 20:16:04'),
(7, 'Test 4', NULL, NULL, '2022-07-14 20:20:38', '2022-07-14 20:20:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_pertanyaans`
--

CREATE TABLE `forum_pertanyaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `is_answered` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `lihat` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forum_pertanyaans`
--

INSERT INTO `forum_pertanyaans` (`id`, `id_user`, `is_answered`, `judul`, `gambar`, `id_kategori`, `lihat`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `isi`) VALUES
(1, 10, 0, 'Mental Healths', 'storage/forum/1657787257_muslimlife (2).png', 1, 44, NULL, NULL, NULL, '2022-07-14 01:27:37', '<div>\r\n<div>forumStore</div>\r\n</div>'),
(3, 10, 0, 'Apakah manusia itu harus bahagia ?', NULL, 1, 15, NULL, NULL, '2022-07-05 00:41:42', '2022-07-14 20:25:08', '<p><strong>Manusia</strong>&nbsp;tidak berkembang untuk&nbsp;<strong>bahagia</strong>, atau bahkan merasa puas. Sebaliknya, kita mengasah kemampuan terutama untuk bertahan hidup dan berkembang biak, seperti setiap makhluk lainnya di dunia</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultans`
--

CREATE TABLE `konsultans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SIPP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ahli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultans`
--

INSERT INTO `konsultans` (`id`, `nama`, `SIPP`, `STR`, `telepon`, `email`, `email_verified_at`, `foto`, `tgl_lahir`, `alamat`, `pendidikan`, `password`, `ig`, `linkedin`, `twitter`, `facebook`, `last_login`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `ahli`, `tentang`, `status`) VALUES
(1, 'Feri Alfajri S.Kom', '12345678', '12121231', '089619119692', 'feri@gmail.com', NULL, 'storage/konsultan/1656562401_cute_cat.jpg', NULL, NULL, NULL, '$2y$10$813fqoc3dEL4AtU4Uk38veHkC4lzm6whWvKOb2eKdK0cbre00fK9C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-29 21:13:21', '2022-07-05 02:02:51', NULL, '<p>Feri seoarang psikolog handal</p>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultan_jadwals`
--

CREATE TABLE `konsultan_jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_konsultan` int(11) NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultan_jadwals`
--

INSERT INTO `konsultan_jadwals` (`id`, `id_konsultan`, `hari`, `jam`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'senin', '09.30-10.30', NULL, NULL, '2022-06-30 19:37:34', '2022-06-30 19:37:34'),
(9, 1, 'senin', '10:00-11:00', NULL, NULL, '2022-06-30 20:09:16', '2022-06-30 20:09:16'),
(11, 1, 'sabtu', '05:00-06:00', NULL, NULL, '2022-06-30 20:13:02', '2022-06-30 20:13:02'),
(12, 1, 'rabu', '09.30-10.30', NULL, NULL, '2022-06-30 20:13:13', '2022-06-30 20:13:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultan_jadwal_janjis`
--

CREATE TABLE `konsultan_jadwal_janjis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_konsultan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masalah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lanjutan` int(11) NOT NULL DEFAULT 0,
  `id_transaksi` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultan_jadwal_janjis`
--

INSERT INTO `konsultan_jadwal_janjis` (`id`, `id_konsultan`, `id_layanan`, `id_user`, `tanggal`, `hari`, `jam`, `masalah`, `lanjutan`, `id_transaksi`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `status`, `catatan`) VALUES
(3, 1, 1, 10, '2022-07-06', 'Rabu', '09.30-10.30', 'Saya bermasalah', 0, 5, NULL, NULL, '2022-07-03 19:35:39', '2022-07-11 21:27:58', 'menunggu_konsultasi', NULL),
(4, 1, 1, 10, '2022-07-18', 'Senin', '10:00-11:00', NULL, 1, NULL, NULL, NULL, '2022-07-06 23:52:51', '2022-07-14 19:47:39', 'menunggu_bayar', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultan_layanans`
--

CREATE TABLE `konsultan_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_konsultan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultan_layanans`
--

INSERT INTO `konsultan_layanans` (`id`, `id_konsultan`, `id_layanan`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 1, 2, NULL, NULL, '2022-06-30 18:29:40', '2022-06-30 18:29:40'),
(5, 1, 1, NULL, NULL, '2022-07-11 20:03:03', '2022-07-11 20:03:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultan_pendidikans`
--

CREATE TABLE `konsultan_pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `universitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tambahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_konsultan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultan_pendidikans`
--

INSERT INTO `konsultan_pendidikans` (`id`, `universitas`, `jurusan`, `tambahan`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `id_konsultan`, `tahun`) VALUES
(2, 'UPN', 'Informatika', NULL, NULL, NULL, '2022-06-29 23:54:22', '2022-06-30 00:07:22', 1, 2022),
(3, 'SMA 2 Magelang', 'IPA', NULL, NULL, NULL, '2022-06-30 00:07:49', '2022-06-30 00:07:49', 1, 2020),
(4, 'UGM', 'Psikolog', NULL, NULL, NULL, '2022-07-06 01:18:21', '2022-07-06 01:18:21', 1, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi_layanans`
--

CREATE TABLE `konsultasi_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultasi_layanans`
--

INSERT INTO `konsultasi_layanans` (`id`, `nama`, `desc`, `harga`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Konsultasi Privates', '<ul>\r\n<li><strong>Ditujukan untuk pengguna dengan masalah KLINIS</strong>&nbsp;(contoh: trauma, depresi, anxiety, bipolar, masalah seksualitas)</li>\r\n<li><strong>Diberikan asesmen yang</strong>&nbsp;lebih mendalam dan terapi tertentu jika dibutuhkan</li>\r\n<li><strong>Ditanggani oleh Psikolog</strong>&nbsp;yang merupakan lulusan S2 profesi psikolog klinis dewasa.</li>\r\n<li><strong>Memberikan diagnosa.</strong></li>\r\n</ul>', '200000', NULL, NULL, '2022-06-30 01:01:22', '2022-07-01 21:56:49'),
(2, 'Konsultasi Couple', '<ul>\r\n<li><strong>Mengurusi masalah NON-KLINIS</strong>&nbsp;(contoh: pertemanan, pekerjaan, percintaan, minat, masalah keluarga, pengenalan diri, masa depan)</li>\r\n<li><strong>Memberikan arahan teknis</strong>&nbsp;dan direktif (contoh: refleksi diri atau pembuatan action plan)</li>\r\n<li><strong>Ditangani oleh Mentor terlatih</strong>&nbsp;yang merupakan lulusan S1 Psikologi</li>\r\n<li><strong>Tidak memberikan diagnosa</strong></li>\r\n</ul>', '250000', NULL, NULL, '2022-06-30 01:39:30', '2022-06-30 01:39:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_informasis`
--

CREATE TABLE `master_informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_informasis`
--

INSERT INTO `master_informasis` (`id`, `nama`, `isi`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', '<h2 data-v-381e8ba6=\"\">Kami Memulai Semuanya dari ...</h2>\r\n<div class=\"history-section\" data-v-381e8ba6=\"\">\r\n<div class=\"history-text\" data-v-381e8ba6=\"\">\r\n<p data-v-381e8ba6=\"\">YouTube pribadi milik Founder Satu Persen, yaitu Ifandi Khainur Rahim pada akhir Desember 2018. Barulah pada pertengahan tahun 2019, Satu Persen diseriuskan menjadi startup oleh Evan dan Rizky. Keduanya memiliki keresahan sama, yaitu permasalahan mental health dan self-development di Indonesia.</p>\r\n<p data-v-381e8ba6=\"\">Tujuan besar kami adalah ingin semua orang berdaya dengan memiliki identity-aware, active problem solver dan growth mindset. Untuk mencapai tujuan itu, Satu Persen memiliki kurikulumnya sendiri yang diturunkan menjadi produk &amp; layanan utama seperti mentoring, konseling, kelas online, webinar, dan tes online gratis. Selain itu, kami juga memiliki layanan Satu Creative Agency dan training skill dasar psikologis. Pada bulan November 2019, Satu Persen menjadi channel YouTube dengan growth tertinggi di dunia.</p>\r\n<p data-v-381e8ba6=\"\">Ini barulah awal, kami akan terus berkembang,</p>\r\n<p data-v-381e8ba6=\"\"><strong data-v-381e8ba6=\"\">setidaknya 1% setiap hari.</strong></p>\r\n</div>\r\n</div>', NULL, NULL, '2022-06-23 23:32:13', '2022-06-24 22:42:43'),
(2, 'Syarat dan Ketentuan', '<h2 id=\"syarat-dan-ketentuan\"><strong>Syarat dan Ketentuan</strong></h2>\n<p>Dengan mengakses atau menggunakan layanan dari Satu Persen, Anda setuju untuk terikat dengan Syarat dan Ketentuan ini. Syarat dan Ketentuan ini akan memengaruhi hak dan kewajiban hukum Anda sebagai pengguna aplikasi. Jika Anda tidak setuju untuk terikat dengan Syarat dan Ketentuan, Anda tidak berhak untuk mengakses atau menggunakan Layanan Satu Persen. Apabila ada pertanyaan, silakan hubungi&nbsp;<em><a href=\"https://wa.me/6287771630283?text=Halo%20Satu%20Persen!\">Customer Service</a>&nbsp;</em>Satu Persen<em>.</em></p>\n<p><strong>Syarat dan Ketentuan Umum</strong></p>\n<ul>\n<li>Berikut adalah Syarat dan Ketentuan (&ldquo;Persetujuan&rdquo;) untuk Anda yang mengakses dan mempergunakan layanan dari Satu Persen. Layanan ini dapat diakses dan disediakan melalui bermacam-macam situs, perangkat, platform, dan teknologi lainnya yang dimiliki atau/dan dioperasikan oleh kami (PT. Satu Persen Edukasi) atau dari pihak ketiga, termasuk, dan tidak terbatas kepada, website https://satupersen.net/</li>\n<li>Dengan mengakses atau menggunakan layanan ini, atau dengan menekan tombol atau kotak yang tersedia, maka hal tersebut mengindikasikan bahwa Anda sudah membaca dan menyetujui syarat dan ketentuan berikut. Mohon untuk membaca Persetujuan ini dengan saksama sebelum mulai menggunakan layanan ini. Apabila Anda tidak setuju untuk terikat dengan syarat- syarat dari Persetujuan ini, Anda dianjurkan untuk tidak melakukan pendaftaran dan menggunakan layanan ini.</li>\n</ul>\n<p><strong>Penggunaan Umum</strong></p>\n<ul>\n<li>Layanan ini memiliki cakupan sebagai layanan konten digital yang dimaksudkan untuk mengajari pengguna hal-hal penting dalam kehidupan yang belum diajarkan di sekolah konvensional.</li>\n<li>Layanan ini juga merupakan layanan konsultasi untuk menghubungkan pengguna dengan para Pakar yang tergabung dalam Satu Persen. Pengguna dapat mengkonsultasikan masalah pribadi pengguna dan juga belajar dari para Pakar terkait hal-hal penting dalam kehidupan.</li>\n<li>Anda sebagai pengguna tidak diperkenankan untuk menggunakan layanan Satu Persen untuk tindakan lain yang tidak memiliki kaitan apapun dengan layanan konten atau konsultasi Satu Persen. Satu Persen memiliki otoritas untuk tidak merespon pengguna dan memberikan penalti yang sesuai.</li>\n<li>Anda sebagai pengguna setuju, yakin, dan mengakui bahwa layanan konten dan konsultasi Satu Persen ini tidak dapat secara keseluruhan menggantikan pemeriksaan dan/atau sesi secara tatap muka dengan profesional yang berkualifikasi.</li>\n<li>Anda tidak dianjurkan untuk mengandalkan atau memilih informasi kesehatan dan kesejahteraan Anda hanya dari informasi yang diberikan dari satu bagian dari Layanan Konsultasi. Lebih lanjut, Kami sangat merekomendasikan untuk Anda tetap mempertimbangkan melakukan pertemuan pribadi bersama profesional yang berkualifikasi. Sangat ditegaskan untuk tidak mengabaikan, menghindari, atau menunda mendapatkan pertolongan/saran medis dari dokter Anda atau Konselor kesehatan lainnya yang memiliki kualifikasi, dengan janji tatap muka, karena informasi atau saran yang Anda terima melalui layanan ini.</li>\n<li>Anda setuju, yakin, dan mengakui bahwa walaupun para Konselor, Mentor, atau Psikolog memberikan Layanan Konsultasi, Kami tidak dapat menilai apabila Layanan Konsultasi yang diberikan sesuai dengan kebutuhan dan keinginan Anda. Anda memiliki hak untuk mengkonsiderasi dan memilih apabila layanan ini sesuai atau tidak untuk Anda.</li>\n<li>Layanan ini tidak diperuntukan untuk digunakan dalam kasus diagnosis kondisi kejiwaan yang akut</li>\n<li>Layanan ini tidak ditujukan untuk mendiagnosis gangguan mental, termasuk memberikan informasi perihal perawatan medis atau obat-obatan yang sesuai untuk Anda sebagai pengguna.</li>\n<li>Layanan ini tidak diperuntukan sebagai hotline centre yang berkaitan dengan perilaku atau tindakan yang dapat menyakiti atau membahayakan diri sendiri maupun orang lain. Jika Anda mengalami situasi tersebut, segera hubungi layanan darurat terdekat di sekitar Anda.</li>\n<li>Satu Persen dapat memiliki beberapa konten, produk atau layanan lain yang telah diajukan atau disediakan oleh pihak ketiga (&ldquo;Konten milik Pihak Ketiga&rdquo;), tautan menuju Konten dari Pihak Ketiga (termasuk tetapi tidak dibatasi pada tautan menuju website lain), atau iklan yang berhubungan dengan Konten Pihak Ketiga. Anda memastikan dan mengakui bahwa Kami tidak bertanggung jawab atas Konten dari Pihak Ketiga, termasuk (tetapi tidak dibatasi pada) produk apapun yang berhubungan, praktek, syarat dan kebijakan, dan Kami tidak bertanggung jawab atas kerusakan atau kerugian yang disebabkan oleh Konten Pihak Ketiga.</li>\n</ul>', NULL, NULL, '2022-06-24 22:23:20', '2022-06-24 22:23:20'),
(3, 'Kebijakan Privasi', '<p><strong>Penyedia Layanan</strong></p>\n<ul>\n<li>Kami memiliki hak untuk mengubah atau menghentikan akses Anda ke Layanan apabila Anda melakukan aktivitas atau menggunakan layanan ini yang ilegal dan melanggar syarat dan ketentuan kami</li>\n<li>Akun Anda yang dinonaktifkan akan secara otomatis menghentikan akses Anda ke Layanan dan semua data Anda akan tidak lagi dapat diakses melalui akun Anda</li>\n<li>Kami berhak untuk menolak akses &nbsp;dan memaksa penyitaan ke layanan kepada siapapun untuk alasan apapun setiap saat.</li>\n<li>Pihak Satu Persen tidak memiliki kewajiban untuk menghapus, mengedit, blok atau memonitor Konten dalam Layanan kami</li>\n<li>Satu Persen memiliki hak untuk merekam dan menggunakan data Pengguna untuk kepentingan riset Satu Persen.</li>\n<li>Satu Persen memiliki hak kekayaan intelektual serta hak lainnya berkaitan dengan konten yang dapat digunakan Pengguna. Konten diluar tujuan penggunaan layanan (menyalin, transmisi, reproduksi atau memodifikasi) tidak diperbolehkan oleh Pengguna.</li>\n<li>Pengguna bertanggung jawab penuh atas konten yang dibuat, apabila Kami mengetahui bahwa Pengguna telah melanggar undang-undang atau Perjanjian ini Kami berhak untuk menghalangi layanan penggunaan (menghapus konten) tanpa memberikan pemberitahuan sebelumnya.</li>\n</ul>\n<p><strong>Batasan dan kewajiban</strong></p>\n<ul>\n<li>ANDA SETUJU, YAKIN, DAN MENGETAHUI KEWAJIBAN YANG DISAMPAIKAN DALAM MENGGUNAKAN LAYANAN INI</li>\n<li>Pengguna tidak diperbolehkan untuk mengungkapkan informasi pribadi atau rahasia melalui Layanan, termasuk informasi akun bank, nomor identitas nasional, nomor telpon orang lain</li>\n<li>Pengguna dilarang melakukan tindakan yang bisa menyakiti atau merugikan diri sendiri ataupun orang lain termasuk didalamnya Para Pakar diluar kepentingan konsultasi</li>\n<li>Pengguna tidak dapat memodifikasi, mengadaptasi, atau mengubah Layanan atau situs web palsu yang mengaitkan dengan Satu Persen (layanan ini)</li>\n<li>Pengguna dilarang mengakses API pribadi dengan cara selain yang diizinkan oleh Satu Persen. Pengguna tidak dapat mengganggu atau mengacaukan Layanan atau server yang terhubung dengan layanan ini seperti mengirimkan worm, virus, spyware, malware atau kode lainnya yang bersifat merusak atau mengganggu.</li>\n<li>KAMI TIDAK AKAN BERTANGGUNG JAWAB ATAS DIRI ANDA ATAU PIHAK KETIGA UNTUK KERUSAKAN YANG TIDAK LANGSUNG, TIDAK SENGAJA, AKIBAT DARI SUATU KONSEKUENSI, KERUSAKAN KHUSUS, HUKUMAN DARI SUATU PERINGATAN.</li>\n<li>SECARA TEGAS KAMI MENOLAK TANGGUNG JAWAB APAPUN YANG BERUHUBUNGAN KEPADA GUGATAN ATAU TINDAKAN PIDANA YANG DIBUAT OLEH PROVIDER, YANG BERHUBUNGAN DENGAN LAYANAN PROVIDER MAUPUN TIDAK, YANG BERHUBUNGAN DENGAN PEMBAYARAN ANDA DENGAN LAYANAN PROVIDER TERSEBUT ATAU SEBALIKNYA. ANDA SETUJU, YAKIN, DAN MENGETAHUI UNTUK MENGHARGAI, MENJAGA DAN MENJAUHKAN KAMI DARI BAHAYA APAPUN YANG BERHUBUNGAN DENGAN GUGATAN DIATAS DAN SERUPA.</li>\n<li>Apabila hukum yang diterapkan tidak mengizinkan pembatasan tanggung jawab sebagaimana dimaksud di atas, maka pembatasan tersebut akan dianggap telah dimodifikasi semata-mata sejauh yang diperlukan untuk mematuhi undang-undang yang berlaku.</li>\n<li>Bagian ini (limitasi dan kewajiban) akan bertahan sampai kadaluarsa atau penghentian Persetujuan ini.</li>\n</ul>\n<p><strong>Penolakan Jaminan Lebih Lanjut</strong></p>\n<ul>\n<li>DENGAN INI ANDA MELEPASKAN KAMI DAN SETUJU UNTUK TIDAK MEMBAHAYAKAN KAMI DARI APAPUN, DAN TINDAKAN APAPUN, &nbsp;DAN TUDUHAN APAPUN YANG DIHASILKAN DARI LAYANAN INI, TERMASUK (TANPA DIBATASI) PERILAKU, KELALAIAN, SARAN, TANGGAPAN, NASEHAT, MASUKAN, INFORMASI DAN/ATAU LAYANAN KESEHATAN MENTAL PROFESIONAL APAPUN DAN LAYANAN LAINNYA YANG MEMBUTUHKAN LISENSI DAN/ATAU SERTIFIKAT, YANG DAPAT MEMILIKI AKSES DALAM LAYANAN INI.</li>\n<li>ANDA SETUJU, YAKIN, DAN MENGETAHUI BAHWA KAMI TIDAK MENINJAU, MEREKOMENDASI, MENGENDALIKAN, MENGEVALUASI ATAU MEMBERIKAN JAMINAN, PERWAKILAN ATAU GARANSI, DAN DENGAN TEGAS TIDAK MENGIKUTSERTAKAN SEMUA PERWAKILAN DAN GARANSI, SEHUBUNG DENGAN (A) PROVIDER APAPUN; (B) INFORMASI MENGENAI PROVIDER APAPUN TERMASUK TANPA PENGECUALIAN KUALIFIKASI, KEAHLIAN, PENGAKUAN ATAU LATAR BELAKANG DARI PENYEDIA LAYANAN APAPUN; (C) LAYANAN DARI PROVIDER APAPUN (PROVIDER DARI LAYANAN INI ATAUPUN TIDAK) TERMASUK DAN TANPA DIBATASI DENGAN PENDAPAT, &nbsp;SARAN, NASEHAT, REKOMENDASI, INFORMASI ATAU ARTIKEL KONTEN LAINNYA YANG DITULIS ATAU DIUTARAKAN OLEH PROVIDER TERSEBUT; (D) KONTEN DAN BAGIAN DARI LAYANAN PROVIDER TERSEBUT; (E) KONTEN DAN INFORMASI LAINNYA YANG DIUMUMKAN DALAM LAYANAN INI ATAU MELALUI LAYANAN INI; (F) VALIDITAS, KEAKURATAN, KETERSEDIAAN, KELENGKAPAN, KESELAMATAN, LEGALITAS, KEAMANAN, KERAHASIAAN, KUALITAS ATAU KETERLIBATAN PLATFORM DAN LAYANAN PROVIDER.</li>\n<li>ANDA SETUJU, YAKIN, DAN MENGETAHUI BAHWA LAYANAN INI DISEDIAKAN SEBAGAIMANA ADANYA DAN DENGAN ITU ANDA TIDAK AKAN MEMILIKI HAK ATAU TUNTUTAN TERHADAP KAMI. PEMAKAIAN LAYANAN INI ADALAH RESIKO DAN TANGGUNG JAWAB ANDA SENDIRI. &nbsp;DALAM BATASAN HUKUM YANG ADA SEMAKSIMAL MUNGKIN, KAMI DENGAN TEGAS MENOLAK SEMUA BENTUK JAMINAN APAPUN, BAIK TERSURAT MAUPUN TERSIRAT, TERMASUK TANPA DIBATASI PADA KELAYAKAN BERDAGANG, KEBEBASAN DARI PELANGGARAN, KEAMANAN, KESESUAIAN UNTUK TUJUAN ATAU KETELITIAN TERTENTU.</li>\n<li>KONSULTASI APAPUN DENGAN PROVIDER MELALUI LAYANAN INI TIDAK BISA DAN TIDAK DIANJURKAN MENGGANTIKAN PERTEMUAN DENGAN PROFESIONAL. ANDA DIANJURKAN UNTUK MELAKUKAN VERIFIKASI INFORMASI ATAS APAPUN YANG DIBERIKAN DARI PROVIDER APAPUN. KEPERCAYAAN APAPUN TERHADAP INFORMASI APAPUN MERUPAKAN TANGGUNG JAWAB DAN RESIKO DIRI ANDA SENDIRI.</li>\n<li>KAMI TIDAK MENANGGAPI, DAN TIDAK AKAN BERTANGGUNG JAWAB ATAS: (A) KEAKURATAN DAN KETERSEDIAAN DARI LAYANAN INI ATAU BAGIAN APAPUN DARI LAYANAN INI; ATAU (B) KERUSAKAN, KERUGIAN DAN LUKA APAPUN YANG DISEBABKAN ATAU BERHUBUNGAN DENGAN LAYANAN INI, PROVIDER ATAU LAYANAN PROVIDER APAPUN.</li>\n<li>Jika terjadi perselisihan mengenai transaksi yang dilakukan melalui layanan ini, dengan ini Anda membebaskan Kami dari berbagai tindakan, gugatan atau tuntutan dan dari setiap dan semua kerugian (secara langsung, tidak langsung, tanpa disengaja atau sebagai konsekuensi), kerusakan, kerugian atau biaya, termasuk, tanpa dibatasi, biaya pengadilan dan biaya pengacara, terhadap satu hal di atas atau lebih yang bertentangan dengan Anda.</li>\n</ul>', NULL, NULL, '2022-06-24 22:46:15', '2022-06-24 22:46:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kontaks`
--

CREATE TABLE `master_kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_kontaks`
--

INSERT INTO `master_kontaks` (`id`, `nama`, `desc`, `alamat`, `email`, `telepon_1`, `telepon_2`, `telepon_3`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hallo Bahagia', 'Kita bergerak terus menerus', 'Yogyakarta', 'feri.alfajri@gmail.com', '089619119692', '092309227381', '+6289619119692', NULL, NULL, '2022-06-23 01:45:40', '2022-07-06 21:35:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_setting_programs`
--

CREATE TABLE `master_setting_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipe` enum('foto','text','foto-text') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_setting_programs`
--

INSERT INTO `master_setting_programs` (`id`, `nama`, `deskripsi`, `isi`, `foto`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `tipe`) VALUES
(1, 'Logo', NULL, NULL, 'storage/master/setting/1657178220_3D_Cartoon_Text_Effect-min.jpg', NULL, NULL, NULL, '2022-07-07 00:17:00', 'foto'),
(2, 'Logo favicon', NULL, NULL, 'storage/master/setting/1657174796_emoji-laughing.png', NULL, NULL, NULL, '2022-07-06 23:19:56', 'foto'),
(3, 'Transaksi', 'Pembayaran', '<p>BCA : No. Rek. 8030112343 A. N. Tri Astuti</p>\r\n<p>BRI : No. Rek. 144701001148505 A. N. Tri Astuti</p>\r\n<p>BNI : No. Rek. 0850844796 A. N. Tri Astuti</p>\r\n<p>Mandiri : No. Rek. 1360010201660 A. N. Tri Astuti</p>\r\n<p>EWALLET= GOPAY, OVO, DANA : 08579993240 A.N. Tri Astuti</p>', NULL, NULL, NULL, NULL, '2022-07-06 23:42:12', 'foto-text');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_20_035041_create_produks_table', 1),
(6, '2022_06_20_035223_create_konsultans_table', 1),
(7, '2022_06_20_041011_create_forum_pertanyaans_table', 1),
(8, '2022_06_20_041638_create_forum_kategoris_table', 1),
(9, '2022_06_20_041725_create_forum_jawabans_table', 1),
(10, '2022_06_20_042347_create_blogs_table', 1),
(11, '2022_06_20_042654_create_blog_kategoris_table', 1),
(12, '2022_06_20_042911_create_notifikasis_table', 1),
(13, '2022_06_20_043503_create_transaksis_table', 1),
(14, '2022_06_20_065953_create_admins_table', 2),
(15, '2022_06_23_062148_create_blog_komentars_table', 3),
(17, '2022_06_23_081302_create_master_kontaks_table', 4),
(18, '2022_06_24_014636_create_master_informasis_table', 5),
(19, '2022_06_28_034018_create_produk_events_table', 6),
(20, '2022_06_28_035104_create_produk_kategoris_table', 6),
(21, '2022_06_28_043325_change_id_expert_konsultan_produk_table', 7),
(22, '2022_06_28_061653_add_sertifikat_event_table', 8),
(23, '2022_06_29_015617_create_enroll_events_table', 9),
(24, '2022_06_30_030154_create_konsultan_pendidikans_table', 10),
(25, '2022_06_30_030551_change_konsultan_table', 10),
(26, '2022_06_30_030947_add_id_konsultan_konsultan_pendidikan', 11),
(27, '2022_06_30_031142_change_konsultan_pendidikan', 12),
(28, '2022_06_30_031458_create_konsultan_jadwals_table', 13),
(29, '2022_06_30_032317_create_konsultasi_layanans_table', 14),
(30, '2022_06_30_032606_change_string_to_text_konsultan_desc', 15),
(31, '2022_06_30_033113_add_tentang_konsultan_tables', 16),
(32, '2022_06_30_060405_add_id_konsultan_konsutan_pendidikans_table', 17),
(33, '2022_06_30_064903_change_tipe_tahun_pendidikan', 18),
(34, '2022_06_30_081617_create_konsultan_layanans_table', 19),
(35, '2022_07_01_072040_create_konsultan_jadwal_janjis_table', 20),
(36, '2022_07_01_072709_add_status_janji_konsultasi', 21),
(37, '2022_07_02_043800_change_id_transaksi_to_nullable', 22),
(38, '2022_07_05_014230_create_testimonis_table', 23),
(40, '2022_07_05_030522_add_status_in_konsultans_tables', 24),
(41, '2022_07_05_043047_add_status_in_testimonis', 25),
(42, '2022_07_05_064733_add_data_to_admins_table', 26),
(43, '2022_07_05_073430_drop_isi_forum_pertanyaans', 27),
(44, '2022_07_05_073546_add_isi_forum_pertanyaans_table', 27),
(45, '2022_07_06_024659_add_catatan_konsultasi_konsultan_jadwal_janjis', 28),
(46, '2022_07_06_034626_create_produk_kelas_table', 29),
(47, '2022_07_06_034934_create_produk_kelas_kategoris_table', 29),
(48, '2022_07_06_035035_create_produk_kelas_babs_table', 29),
(49, '2022_07_06_035210_create_produk_kelas_materis_table', 29),
(50, '2022_07_06_035541_create_enroll_kelas_table', 30),
(51, '2022_07_07_042951_create_master_setting_programs_table', 31),
(52, '2022_07_07_062952_add_tipe_setting_master_setting_program', 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_konsultan` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('123190088@student.upnyk.ac.id', '$2y$10$.BZ2PsppQtHAXggvDbVZDO817RYqtJaqYd9ZHpayQwOgT573aRlAq', '2022-06-20 20:06:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_konsultan` int(11) DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama`, `desc`, `id_kategori`, `id_produk`, `id_konsultan`, `harga`, `poster`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mental Health Problem', NULL, 1, 2, NULL, '20000', 'storage/event/poster/1657161869_turning-red.jpg', NULL, NULL, '2022-06-27 21:35:37', '2022-07-06 20:57:41'),
(2, 'Criciss Life', NULL, 1, 3, NULL, '20000', 'storage/event/poster/1657161855_soul.jpg', NULL, NULL, '2022-06-28 00:21:25', '2022-07-06 20:57:10'),
(3, 'Konsultasi Privates', '<ul>\r\n<li><strong>Ditujukan untuk pengguna dengan masalah KLINIS</strong>&nbsp;(contoh: trauma, depresi, anxiety, bipolar, masalah seksualitas)</li>\r\n<li><strong>Diberikan asesmen yang</strong>&nbsp;lebih mendalam dan terapi tertentu jika dibutuhkan</li>\r\n<li><strong>Ditanggani oleh Psikolog</strong>&nbsp;yang merupakan lulusan S2 profesi psikolog klinis dewasa.</li>\r\n<li><strong>Memberikan diagnosa.</strong></li>\r\n</ul>', 2, 1, NULL, '200000', NULL, NULL, NULL, NULL, '2022-07-01 21:56:49'),
(4, 'Konsultasi Couple', NULL, 2, 2, NULL, '250000', NULL, NULL, NULL, NULL, NULL),
(6, 'Mental Health', NULL, 3, 1, NULL, '200000', 'storage/kelas/poster/1657082174_bootcamp.png', NULL, NULL, NULL, '2022-07-06 21:24:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_events`
--

CREATE TABLE `produk_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_konsultan` int(11) DEFAULT NULL,
  `pemateri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_bias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grup_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_events`
--

INSERT INTO `produk_events` (`id`, `tipe`, `judul`, `tanggal`, `waktu`, `desc`, `id_konsultan`, `pemateri`, `harga`, `harga_bias`, `poster`, `link`, `grup_wa`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `sertifikat`) VALUES
(2, 'Webinar', 'Mental Health Problem', '2022-06-29', '12.00 - 13.00', '<ul>\r\n<li>Kamu bisa cerita sama Mentor terlatih.</li>\r\n<li>Bareng-bareng cari solusi dari masalah yang sedang dihadapi.</li>\r\n<li>Mencari solusi lewat worksheet yang dibuatkan sesuai dengan masalahmu.</li>\r\n<li>Lebih mengenal diri sendiri melalui berbagai psikotes.</li>\r\n</ul>', NULL, '<p>Profesional</p>', '20000', '', 'storage/event/poster/1657161869_turning-red.jpg', '<p>youtube.com</p>', NULL, 1, NULL, NULL, '2022-06-27 21:35:37', '2022-07-12 01:20:27', NULL),
(3, 'Webinar', 'Criciss Life', '2022-06-29', '13.00 WIB', '<p>Deskripsi</p>\r\n<ul>\r\n<li>Kamu bisa cerita sama Mentor terlatih.</li>\r\n<li>Bareng-bareng cari solusi dari masalah yang sedang dihadapi.</li>\r\n<li>Mencari solusi lewat worksheet yang dibuatkan sesuai dengan masalahmu.</li>\r\n<li>Lebih mengenal diri sendiri melalui berbagai psikotes.</li>\r\n</ul>', NULL, '<p>Pemateri</p>', '20000', '30000', 'storage/event/poster/1657161855_soul.jpg', NULL, NULL, 1, NULL, NULL, '2022-06-28 00:21:25', '2022-07-12 01:20:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategoris`
--

CREATE TABLE `produk_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kategoris`
--

INSERT INTO `produk_kategoris` (`id`, `nama`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Webinar', NULL, NULL, NULL, NULL),
(2, 'Konsultasi', NULL, NULL, NULL, NULL),
(3, 'Kelas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kelas`
--

CREATE TABLE `produk_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `bahasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poin_produk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kelas`
--

INSERT INTO `produk_kelas` (`id`, `judul`, `id_status`, `id_kategori`, `bahasa`, `lama_kelas`, `tentang`, `desc`, `poin_produk`, `poster`, `harga`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mental Health', NULL, 2, NULL, NULL, 'Membahas isu kesehatan', 'Bagus sekali', '<ul>\r\n<li>Kesehatan</li>\r\n<li>Kebahagiaan</li>\r\n<li>Kesuksesan</li>\r\n</ul>', 'storage/kelas/poster/1657082174_bootcamp.png', 200000, 1, NULL, NULL, '2022-07-05 21:13:19', '2022-07-05 21:36:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kelas_babs`
--

CREATE TABLE `produk_kelas_babs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kelas_babs`
--

INSERT INTO `produk_kelas_babs` (`id`, `id_kelas`, `nama`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pendahuluan', NULL, NULL, '2022-07-05 21:36:30', '2022-07-05 21:37:14'),
(2, 1, 'Isi', NULL, NULL, '2022-07-06 00:30:17', '2022-07-06 00:30:17'),
(3, 1, 'Penutup', '2022-07-06 20:32:30', NULL, '2022-07-06 20:19:01', '2022-07-06 20:32:30'),
(4, 1, 'Tes', '2022-07-06 20:32:25', NULL, '2022-07-06 20:30:39', '2022-07-06 20:32:25'),
(5, 1, 'Penutup', NULL, NULL, '2022-07-06 20:32:39', '2022-07-06 20:32:39'),
(6, 1, 'Bab', NULL, NULL, '2022-07-06 20:34:26', '2022-07-06 20:34:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kelas_kategoris`
--

CREATE TABLE `produk_kelas_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kelas_kategoris`
--

INSERT INTO `produk_kelas_kategoris` (`id`, `nama`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'biasa', '2022-07-05 21:34:59', NULL, '2022-07-05 21:33:52', '2022-07-05 21:34:59'),
(2, 'kebahagiaan', NULL, NULL, '2022-07-05 21:34:46', '2022-07-05 21:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kelas_materis`
--

CREATE TABLE `produk_kelas_materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_bab` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kelas_materis`
--

INSERT INTO `produk_kelas_materis` (`id`, `judul`, `id_bab`, `id_kelas`, `isi`, `poster`, `link_video`, `file`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Video balajar', 1, 1, '<p>Deskripsi video yang bagus</p>', NULL, 'https://www.youtube.com/embed/UQdmNHRqXsw', 'storage/kelas/materi/1657087747_riasec-resut.pdf', NULL, NULL, '2022-07-05 21:48:34', '2022-07-05 23:09:07'),
(2, 'Isi', 2, 1, '<p>\"SATU JAM EPISODE TERBAIK SpongeBob Squarepants SERI 9 Bagian 1!</p>', NULL, 'https://www.youtube.com/embed/LovKrqTwA8c', NULL, NULL, NULL, '2022-07-06 00:32:09', '2022-07-06 00:32:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_konsultan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonis`
--

INSERT INTO `testimonis` (`id`, `id_user`, `id_konsultan`, `id_produk`, `pesan`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 10, 1, NULL, 'Bagus banget', NULL, NULL, '2022-07-04 19:23:07', '2022-07-06 21:25:32', 1),
(2, 10, 1, NULL, 'Bagus banget pengen konsultasi lagi ah', NULL, NULL, NULL, '2022-07-06 21:26:51', 1),
(3, 10, 1, NULL, 'menyedihkan sekali, mengecewakan', NULL, NULL, NULL, '2022-07-06 21:26:55', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_produk`, `id_user`, `nama`, `harga`, `status`, `bukti`, `tanggal_bayar`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 3, 10, 'Konsultasi Privates', '200000', 'lunas', 'storage/transaksi/1656903152_bukti_bayar.jpg', '2022-07-04', NULL, NULL, '2022-07-03 19:52:32', '2022-07-03 21:48:25'),
(6, 6, 10, 'Mental Health', '200000', 'lunas', 'storage/transaksi/1657090103_bukti_bayar.jpg', '2022-07-06', NULL, NULL, '2022-07-05 23:48:23', '2022-07-05 23:56:24'),
(12, 2, 10, 'Criciss Life', '20000', 'pending', 'storage/transaksi/1657167596_muslimlife (2).png', '2022-07-07', NULL, NULL, '2022-07-06 21:19:56', '2022-07-06 21:19:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `telepon`, `desc`, `foto`, `tgl_lahir`, `alamat`, `pekerjaan`, `pendidikan`, `email`, `email_verified_at`, `password`, `ig`, `linkedin`, `twitter`, `facebook`, `last_login`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'feri alfajri', '089619119692', 'Saya seorang pemberani yang baik', 'storage/user/profile/1656475011_ice.jpg', '2022-06-21', 'Magelang', 'Mahasiswa', 'SMA', '123190088@student.upnyk.ac.id', '2022-06-02 02:38:20', '$2y$10$fGpK0GttMqxiIkiZz2z3XObh/cNVETXLhuPaImhr4AMNHlz0AYAvy', NULL, NULL, NULL, NULL, NULL, NULL, 'kXamKPILkWGP5T7zaS4JrWfUCiv7LH01fYuPEi9zSyhrAccdFoJ7qYFmiQtg', '2022-06-20 19:23:09', '2022-07-14 18:43:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_kategoris`
--
ALTER TABLE `blog_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_komentars`
--
ALTER TABLE `blog_komentars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `enroll_events`
--
ALTER TABLE `enroll_events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `enroll_kelas`
--
ALTER TABLE `enroll_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `forum_jawabans`
--
ALTER TABLE `forum_jawabans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_kategoris`
--
ALTER TABLE `forum_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_pertanyaans`
--
ALTER TABLE `forum_pertanyaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultans`
--
ALTER TABLE `konsultans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konsultans_email_unique` (`email`);

--
-- Indeks untuk tabel `konsultan_jadwals`
--
ALTER TABLE `konsultan_jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultan_jadwal_janjis`
--
ALTER TABLE `konsultan_jadwal_janjis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultan_layanans`
--
ALTER TABLE `konsultan_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultan_pendidikans`
--
ALTER TABLE `konsultan_pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultasi_layanans`
--
ALTER TABLE `konsultasi_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_informasis`
--
ALTER TABLE `master_informasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_kontaks`
--
ALTER TABLE `master_kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_setting_programs`
--
ALTER TABLE `master_setting_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_events`
--
ALTER TABLE `produk_events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kategoris`
--
ALTER TABLE `produk_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kelas`
--
ALTER TABLE `produk_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kelas_babs`
--
ALTER TABLE `produk_kelas_babs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kelas_kategoris`
--
ALTER TABLE `produk_kelas_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kelas_materis`
--
ALTER TABLE `produk_kelas_materis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `blog_kategoris`
--
ALTER TABLE `blog_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `blog_komentars`
--
ALTER TABLE `blog_komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `enroll_events`
--
ALTER TABLE `enroll_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `enroll_kelas`
--
ALTER TABLE `enroll_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forum_jawabans`
--
ALTER TABLE `forum_jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `forum_kategoris`
--
ALTER TABLE `forum_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `forum_pertanyaans`
--
ALTER TABLE `forum_pertanyaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konsultans`
--
ALTER TABLE `konsultans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konsultan_jadwals`
--
ALTER TABLE `konsultan_jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `konsultan_jadwal_janjis`
--
ALTER TABLE `konsultan_jadwal_janjis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konsultan_layanans`
--
ALTER TABLE `konsultan_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konsultan_pendidikans`
--
ALTER TABLE `konsultan_pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konsultasi_layanans`
--
ALTER TABLE `konsultasi_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_informasis`
--
ALTER TABLE `master_informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_kontaks`
--
ALTER TABLE `master_kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_setting_programs`
--
ALTER TABLE `master_setting_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk_events`
--
ALTER TABLE `produk_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_kategoris`
--
ALTER TABLE `produk_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk_kelas`
--
ALTER TABLE `produk_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk_kelas_babs`
--
ALTER TABLE `produk_kelas_babs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk_kelas_kategoris`
--
ALTER TABLE `produk_kelas_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk_kelas_materis`
--
ALTER TABLE `produk_kelas_materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
