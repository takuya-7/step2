-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 07, 2022 at 11:32 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `step`
--
CREATE DATABASE IF NOT EXISTS `step` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `step`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `delete_flg`, `created_at`, `updated_at`) VALUES
(1, 'IT', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(2, '学習', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(3, '語学', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(4, 'ビジネス', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(5, 'スポーツ', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(6, 'ライフスタイル', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(7, 'その他', 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `step_id` bigint(20) UNSIGNED NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_step` int(11) NOT NULL DEFAULT '1',
  `clear_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `user_id`, `step_id`, `delete_flg`, `created_at`, `updated_at`, `current_step`, `clear_flg`) VALUES
(10, 1, 4, 0, '2022-04-11 12:16:07', '2022-04-11 12:18:34', 4, 1),
(11, 1, 5, 0, '2022-04-11 12:39:24', '2022-04-11 12:46:15', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `child_steps`
--

CREATE TABLE `child_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_achievement_day` int(11) DEFAULT NULL,
  `estimated_achievement_hour` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_id` bigint(20) UNSIGNED NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_steps`
--

INSERT INTO `child_steps` (`id`, `order`, `title`, `estimated_achievement_day`, `estimated_achievement_hour`, `description`, `step_id`, `delete_flg`, `created_at`, `updated_at`) VALUES
(1, 1, 'HTML', 7, NULL, 'まずはWebサイトの骨格を作るHTMLからです。Progateやドットインストールでさらっと勉強しましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(2, 2, 'CSS', 7, NULL, '次は装飾を施すCSSです。Progateやドットインストールでさらっと勉強しましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(3, 3, 'JavaScript', 7, NULL, '次はWebサイトに動きをつけるJavaScriptです。Progateやドットインストールでさらっと勉強しましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(4, 4, 'PHP', 21, NULL, 'バックエンド言語の一つ、PHPを勉強しましょう。Progateやドットインストールでさらっと勉強しましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(5, 5, 'Laravel', 30, NULL, 'PHPのフレームワーク、Laravelを勉強しましょう。Udemyで分かりやすそうな動画を見て一通り学びましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(6, 6, 'アプリを作って公開', 90, NULL, 'Laravelを一通り勉強したら、自分でアプリを作ってみましょう。誰かの悩みを解決できるアプリがポイントです。既存のサービスを真似て、方向性を変えるのも良いです。アプリを作ったら、AWSで公開してみましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(7, 7, 'アプリを元に転職活動', 90, NULL, 'アプリの完成度を上げて公開できたら、Wantedlyに登録して転職活動を始めましょう。採用者の視点に立って、資料を作成してアピールするようにしましょう。', 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(8, 1, '単語を抑える', 14, NULL, 'TOEICで出る単語はある程度限られているため、まずは参考書で一通り単語を抑えましょう。', 2, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(9, 2, '過去問を3回以上解く', 30, NULL, 'TOEICの勉強で1番大事なのが、過去問での勉強です。最低3回は解きましょう。', 2, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(10, 3, '時間を意識して過去問を解く', 14, NULL, 'TOEICは多くの問題を時間内に解かなければならないため、時間を計って時間内に全て回答できるようにしましょう。', 2, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(11, 1, 'ボードに片足固定した状態で移動できるようにする', NULL, 1, 'まずはボードに片足固定した状態で移動できるようにしましょう。', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(12, 2, '斜面で立つ', NULL, 1, '斜面を見下ろす形で、まずは立ってバランスを取れるようにしましょう。', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(13, 3, '起き上がり方を身に着ける', NULL, 1, '腹這いにこけた時は、一回転してから起き上がるようにしましょう。', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(14, 4, '体を真っ直ぐにして滑れるようにする', NULL, 1, '怖がって後ろに重心がいくと滑れないので、斜面に対して真っ直ぐに立って滑るコツを掴みましょう。', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(15, 5, '緩い斜面でターンを習得する', NULL, 1, '行く方向を見ながら、全身を使ってターンできるようにしましょう。', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(16, 6, '緩い斜面滑れるようにする', NULL, 1, '緩い斜面で何度も練習し、ターンを繰り返して下まで滑れるようにしましょう。', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(17, 7, 'リフトで長めのコースに行く', NULL, 1, '慣れてきたらリフトで斜面が緩い長めのコースへいきましょう。あとは練習あるのみです！', 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(18, 1, 'a', 1, 1, 'a', 4, 0, '2022-04-10 15:18:57', '2022-04-10 15:18:57'),
(19, 2, '2', 2, 2, '2', 4, 0, '2022-04-10 15:18:57', '2022-04-10 15:18:57'),
(20, 3, '3', 3, 3, '3', 4, 0, '2022-04-10 15:18:57', '2022-04-10 15:18:57'),
(21, 1, '1', 1, 1, '1', 5, 0, '2022-04-11 12:39:18', '2022-04-11 12:39:18'),
(22, 2, '2', 2, 2, '2', 5, 0, '2022-04-11 12:39:18', '2022-04-11 12:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_31_153153_create_categories_table', 1),
(6, '2022_01_31_153249_create_steps_table', 1),
(7, '2022_01_31_153615_change_name_not_null_to_null_on_users_table', 1),
(8, '2022_01_31_153756_create_child_steps_table', 1),
(9, '2022_02_07_175442_create_challenges_table', 1),
(10, '2022_02_11_175603_add_current_step_and_clear_flg_to_challenges', 1),
(11, '2022_02_15_194931_add_profile_and_profile_img_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_achievement_day` int(11) DEFAULT NULL,
  `estimated_achievement_hour` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `title`, `estimated_achievement_day`, `estimated_achievement_hour`, `description`, `user_id`, `category_id`, `delete_flg`, `created_at`, `updated_at`) VALUES
(1, '1年で未経験から自社開発系エンジニアに転職するためのSTEP', 252, 0, '結論から言うと、しっかりとやることをやれば１年で未経験から自社開発系企業へエンジニアとして転職できます。このSTEPでは、具体的に手順をまとめているため何をやれば良いのか一目瞭然です。このSTEPで、今後の人生をより良くしましょう！', 1, 1, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(2, '3ヶ月でTOEIC600点→900点にした手順を解説！', 58, 0, 'TOEIC900点は難しいと思っていませんか？実際はそんなことはありません。実際に私が３ヶ月で点数を300点上げて900点取った方法を解説しますので、ご安心下さい。TOEICの点数を上げたい方は、このSTEPをご覧下さい！', 1, 3, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(3, '１日でスノーボードをそれなりに滑られるようになるSTEP', 0, 7, 'スノボ初心者の方は、１日だと全く滑れるようにならないと思っているかもしれませんが、そんなことはありません！ここで解説する手順で段階的に練習すれば、１日である程度滑れるようになります。それではいきましょう！', 1, 5, 0, '2022-04-10 14:23:04', '2022-04-10 14:23:04'),
(4, 'aa', 6, 6, 'a', 2, 4, 0, '2022-04-10 15:18:57', '2022-04-10 15:18:57'),
(5, 'b', 3, 3, 'b', 1, 2, 0, '2022-04-11 12:39:18', '2022-04-11 12:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `profile_img` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile`, `profile_img`) VALUES
(1, NULL, 'a@a.a', NULL, '$2y$10$ZT5t9nDAuLdx46l2XRjs7eQA8w2eAUHaoLtZ/Ko56mDmBdUlfHpPe', NULL, '2022-04-10 14:23:04', '2022-04-10 14:23:04', NULL, NULL),
(2, 'b', 'b@b.b', NULL, '$2y$10$AEUL382SJxyC.i6/Dnee2OH8qKzPzy7nFhF.XhbG3mXEyeWgtpct6', NULL, '2022-04-10 14:23:41', '2022-04-10 14:23:41', 'b', '1649607227a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_user_id_foreign` (`user_id`),
  ADD KEY `challenges_step_id_foreign` (`step_id`);

--
-- Indexes for table `child_steps`
--
ALTER TABLE `child_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_steps_step_id_foreign` (`step_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `steps_user_id_foreign` (`user_id`),
  ADD KEY `steps_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `child_steps`
--
ALTER TABLE `child_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `child_steps`
--
ALTER TABLE `child_steps`
  ADD CONSTRAINT `child_steps_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `steps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
