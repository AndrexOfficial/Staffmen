-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2018 at 12:50 PM
-- Server version: 10.0.35-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andreami_staffapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `num_members` int(11) NOT NULL,
  `num_members_confirmed` int(11) NOT NULL,
  `local` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `job_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `cost` double NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `num_members`, `num_members_confirmed`, `local`, `job_id`, `date`, `time_start`, `time_end`, `cost`, `title`, `description`, `status`, `created_at`, `updated_at`, `event_photo`) VALUES
(14, 1, 40, 1, 'The Gintoneria of DavidVia Napo Torriani, 15, 20124 Milano MI, Italy', NULL, '2018-06-22', '21:36:00', '04:36:00', 38, 'Ginto di Davide', '<p>Ciao</p>', NULL, '2018-06-20 21:37:22', '2018-06-21 20:59:01', 'public/images/event_covers/1529596741.jpg'),
(15, 1, 400, 1, 'Autoarona Spa - Concessionaria VolkswagenVia Borgomanero, 46b, 28040 Paruzzaro NO, Italy', 1, '2018-06-27', '14:45:00', '22:45:00', 45, 'Evento Michelin', 'Prova', 1, '2018-06-20 21:46:42', '2018-06-20 21:46:42', NULL),
(17, 6, 100, 10, 'Pogue Mahone\'s, Via Vittorio Salmini, Milano, MI, Italia', NULL, '2018-06-20', '12:30:00', '20:30:00', 300, 'Irish party', '<p>Solo oggi&nbsp;tutte&nbsp;le birre&nbsp;a 7 euro!!!</p>', NULL, '2018-06-21 18:38:28', '2018-06-21 19:03:01', 'public/images/event_covers/1529589781.jpg'),
(21, 10, 10, 2, 'IED Istituto Europeo di Design | Milano, Via Amatore Sciesa, Milano, MI, Italia', NULL, '2019-10-10', '20:00:00', '23:00:00', 10, 'Garden Party by Campari in NYX Milan Hotel', '<p>SABATO 16 SETTEMBRE 2017&nbsp;YOUparti&nbsp;Ha il Piacere di Invitarti<br />&nbsp;</p>', NULL, '2018-06-24 19:20:00', '2018-06-24 19:20:00', 'public/images/event_covers/1529850000.jpg'),
(23, 1, 200, 1, 'Sagam, Viale Fulvio Testi, Milan, Metropolitan City of Milan, Italy', NULL, '2018-06-25', '10:00:00', '19:00:00', 34, 'Evento Sagam', '<p>maestosa, espressiva, elegante, Nuova Touareg ha uno sguardo libero verso l&rsquo;avventura. La massiccia calandra cromata appare scolpita per racchiudere i gruppi ottici senza soluzione di continuit&agrave; e i nuovi fari a LED Matrix IQ Light con regolazione dinamica degli abbaglianti &ldquo;Dynamic Light Assist&rdquo; illuminano la carreggiata in modo fluido e intelligente, generando un fascio luminoso dall&rsquo;intensit&agrave; ottimale in qualsiasi situazione.<br />Le nuove proporzioni diventano dinamiche grazie all&rsquo;utilizzo del pianale modulare longitudinale (MLB) mentre le linee sono tese, partendo dal tetto si sviluppano fluide lateralmente per terminare in modo dinamico nel montante posteriore nettamente inclinato in avanti.</p><p>l&rsquo;abitacolo di Nuova Touareg &egrave; stato progettato per accogliere i suoi occupanti in un ambiente raffinato e funzionale a livello d&rsquo;eccellenza mentre la plancia, orientata verso il posto di guida, diventa pi&ugrave; ergonomica. A regalare una sensazione di libert&agrave; senza confini, ci pensa il tetto panoramico che, sollevabile con un semplice click, offre una sensazione di maggiore spaziosit&agrave; e una piacevole luminosit&agrave; all&rsquo;interno dell&rsquo;abitacolo.</p><p>progresso &egrave; parola d&rsquo;ordine nel lancio di Nuova Touareg, ammiraglia equipaggiata con soluzioni di connettivit&agrave; della nuova era e una futuristica integrazione di sistemi di assistenza, comfort, illuminazione infotainment, per regalarti una nuova e indimenticabile esperienza di guida. Grazie al sistema &ldquo;Head-up dispaley&rdquo; avrai la possibilit&agrave; di vedere la proiezione del tachimetro, direttamente sul parabrezza per garantire la massima concentrazione al volante e lo sguardo rivolto sempre verso la strada. La tecnologia si conferma anche nei sistemi di navigazione, sicurezza e illuminazione premium, guida assistita e parcheggio automatizzato.</p>', NULL, '2018-06-24 22:00:01', '2018-06-24 22:00:01', 'public/images/event_covers/1529859601.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_members`
--

CREATE TABLE `event_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  `feedback` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_members`
--

INSERT INTO `event_members` (`id`, `event_id`, `user_id`, `state`, `type`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, NULL, '2018-06-19 17:26:11', '2018-06-19 20:12:39'),
(2, 17, 1, 1, 2, NULL, '2018-06-21 18:41:41', '2018-06-21 18:42:46'),
(3, 14, 6, 1, 2, NULL, '2018-06-21 19:16:31', '2018-06-21 19:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `event_message`
--

CREATE TABLE `event_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_message`
--

INSERT INTO `event_message` (`id`, `user_id`, `event_id`, `message`, `created_at`, `updated_at`) VALUES
(3, 6, 14, 'Maaaaa serve registrarsi all\'ingresso o l\'entrata è free??', '2018-06-21 19:17:39', '2018-06-21 19:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_03_12_182343_create_events_table', 1),
(9, '2018_03_12_184808_create_jobs_table', 1),
(10, '2018_04_12_144020_create_user_jobs_table', 1),
(11, '2018_04_12_165749_create_notifications_table', 1),
(12, '2018_04_12_171742_create_event_members_table', 1),
(13, '2018_04_17_174041_create_event_message_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('47450109-dd5b-4e78-91e6-fd3b2ad08351', 'App\\Notifications\\Accepted', 3, 'App\\User', '{\"event_id\":1}', NULL, '2018-06-19 20:12:39', '2018-06-19 20:12:39'),
('7f15ba23-8433-4c46-8f57-85627472fb87', 'App\\Notifications\\Accepted', 1, 'App\\User', '{\"event_id\":17}', NULL, '2018-06-21 18:42:46', '2018-06-21 18:42:46'),
('97bd6886-b692-4209-92bc-2e2a45dffcf2', 'App\\Notifications\\Invite', 1, 'App\\User', '{\"event_id\":17,\"user_id\":6}', NULL, '2018-06-21 18:41:41', '2018-06-21 18:41:41'),
('a81d4f09-380b-491f-8349-e219a6ebb3b2', 'App\\Notifications\\Join', 1, 'App\\User', '{\"event_id\":1,\"user_id\":3}', '2018-06-20 04:16:24', '2018-06-19 17:26:11', '2018-06-20 04:16:24'),
('d0f41b57-eb79-4408-aac0-5dca4caf0abf', 'App\\Notifications\\Invite', 6, 'App\\User', '{\"event_id\":14,\"user_id\":1}', NULL, '2018-06-21 19:16:31', '2018-06-21 19:16:31'),
('df61ca80-7dce-4f91-84f2-c587789d0b06', 'App\\Notifications\\Accepted', 6, 'App\\User', '{\"event_id\":14}', NULL, '2018-06-21 19:16:46', '2018-06-21 19:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `descr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tshirt_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hair` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shoes_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eyes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `location`, `photo`, `role`, `age`, `phone_number`, `sex`, `descr`, `prev_job`, `cover_photo`, `tshirt_size`, `height`, `hair`, `shoes_size`, `eyes`, `password`, `resume`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrea Mapelli', 'info@ns7records.com', 'IED Istituto Europeo di Design | Milano, Via Amatore Sciesa, Milan, Metropolitan City of Milan, Italy', 'public/images/1529771967.jpg', '2', 23, '3402000000', 1, 'Sono simpatico :)', 'Ikea', NULL, 'S', '1,72 cm', 'marroni', '42', 'marroni', '$2y$10$y6bCbIcwXxeJmCFYZi7y8OjRd9q.0faoZ.XR8VF8pNK/QdeTDOdKG', NULL, 'xghsZG6garvZt91Jd8FW5hj6QtfWV4xulMczPwxo7wpPOoaOQNIPBpx2Voiz', '2018-06-15 09:43:29', '2018-06-23 21:39:27'),
(4, 'francesco', 'prova@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YLsjq6xMYqTKTSFV.Q4nYe3hMI.7RYAJpGQbLzm/x6xO85h5Q8J16', NULL, '3VD84Xubbeo8gIGPgvKmKBIC5puMY0IOwbfnoFcHnI4oHIbGnXBjqlskLeoX', '2018-06-19 00:09:58', '2018-06-19 00:09:58'),
(6, 'Giovanni Brocca', 'giovanni@gmail.com', 'IED Istituto Europeo di Design | Milano, Via Amatore Sciesa, Milano, MI, Italia', 'public/images/1529768784.jpg', '2', 21, '3339899122', 1, NULL, 'Menager', NULL, 'M', '1,80 cm', 'blu', '45', 'blu', '$2y$10$jZj67ESczjWv99B7S5GFheaR/wZxqkuLRAbGHLhK8/ZXgREZ60lvC', NULL, NULL, '2018-06-21 18:36:01', '2018-06-23 20:46:24'),
(8, 'Joelle', 'joelle15@hotmail.it', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tUN2HC6gsV/0i.O.dD/hz.eZ./jGPD05QTUVQJJSKxf7f8/JivvvW', NULL, NULL, '2018-06-22 11:18:17', '2018-06-22 11:18:17'),
(9, 'francesco', 'francesco@gmail.com', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$xb2moBblfR//un3n6qRRWelq77/6fcKFlnLSMOFAjuZTi6ALdDl/W', NULL, 'yTyZjcNV2SfdvsjRPi7x77LwESH26G5jTZ36qncYBZACFmZAuEBG6hHfG3rm', '2018-06-23 21:50:15', '2018-06-23 21:50:15'),
(10, 'francescoAdmin', 'fraadmin@gmail.com', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$7VQTopNDXpqQ9eWpHNd4neSJYPkEYXJV/hUGDYgdwNQjBlPCaveyK', NULL, NULL, '2018-06-24 19:02:21', '2018-06-24 19:02:21'),
(11, 'fra', 'fra@gmail.com', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yAsJvHF3cBb8fvNAI50rt..EFA2TTbS8tExkA30dsU6tbRtkHqLeC', NULL, NULL, '2018-06-24 22:49:40', '2018-06-24 22:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_jobs`
--

CREATE TABLE `user_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_members`
--
ALTER TABLE `event_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_message`
--
ALTER TABLE `event_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_jobs`
--
ALTER TABLE `user_jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `event_members`
--
ALTER TABLE `event_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_message`
--
ALTER TABLE `event_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_jobs`
--
ALTER TABLE `user_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
