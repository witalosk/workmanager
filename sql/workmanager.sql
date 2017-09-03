-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 9 朁E03 日 17:28
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workmanager`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `zipcode`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, '', '', NULL, '2017-09-03 15:26:31', '管理者', 'アカウント', NULL, NULL, NULL, '2017-09-03 14:39:53', '2017-09-03 14:39:53'),
(6, 'shun_september@live.jp', '$2y$10$Ndw237PRclDSD7v0GHuCEuDwtne4iFYDY96AxFPSjcVrESLTx4Bua', NULL, '2017-09-03 15:15:03', '舜', '長津', '305-0821', '茨城県つくば市春日3丁目 7-29 ザ・ドリーム 3-103号', '080-4632-7486', '2017-07-31 15:41:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `work`
--

INSERT INTO `work` (`id`, `user_id`, `start`, `end`, `comment`, `created_at`) VALUES
(8, 6, '2017-09-03 13:00:00', '2017-09-03 15:15:00', 'WorkManagerの仕上げ', '2017-09-03 15:15:47'),
(9, 6, '2017-07-02 15:10:00', '2017-07-02 15:55:00', 'ログインページから元のページにリダイレクトする機能、およびコミュニケーションページの実装', '2017-09-03 15:18:16'),
(10, 6, '2017-07-03 15:20:00', '2017-07-03 17:25:00', 'コミュニケーションページの実装', '2017-09-03 15:19:11'),
(11, 6, '2017-07-04 04:45:00', '2017-07-04 06:10:00', '', '2017-09-03 15:19:56'),
(12, 6, '2017-07-04 06:35:00', '2017-07-04 07:00:00', '', '2017-09-03 15:20:35'),
(13, 6, '2017-07-08 14:30:00', '2017-07-08 15:45:00', 'レンズ仮完成', '2017-09-03 15:21:30'),
(14, 6, '2017-07-30 03:00:00', '2017-07-30 05:00:00', 'ミーティング', '2017-09-03 15:22:05'),
(15, 6, '2017-07-30 05:00:00', '2017-07-30 07:30:00', '交通費(往復)', '2017-09-03 15:23:02'),
(16, 6, '2017-08-01 04:15:00', '2017-08-01 06:25:00', 'WorkManagerの設計(クラス等)', '2017-09-03 15:25:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
