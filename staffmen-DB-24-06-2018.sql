-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2018 at 04:18 PM
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
(14, 1, 40, 1, 'The Gintoneria of DavidVia Napo Torriani, 15, 20124 Milano MI, Italy', NULL, '2018-06-22', '21:36:00', '04:36:00', 38, 'Ginto di Davide', '<p>Ciao</p>', NULL, '2018-06-21 02:37:22', '2018-06-22 01:59:01', 'public/images/event_covers/1529596741.jpg'),
(15, 1, 200, 1, 'Autoarona Spa - Concessionaria VolkswagenVia Borgomanero, 46b, 28040 Paruzzaro NO, Italy', NULL, '2018-06-28', '14:45:00', '22:45:00', 45, 'Evento Michelin', '<p>EVENTO GOMME MICHELIN</p>', NULL, '2018-06-21 02:46:42', '2018-06-25 02:10:45', 'public/images/event_covers/1529874645.jpg'),
(17, 6, 100, 10, 'Pogue Mahone\'s, Via Vittorio Salmini, Milano, MI, Italia', NULL, '2018-06-20', '12:30:00', '20:30:00', 300, 'Irish party', '<p>Solo oggi&nbsp;tutte&nbsp;le birre&nbsp;a 7 euro!!!</p>', NULL, '2018-06-21 23:38:28', '2018-06-22 00:03:01', 'public/images/event_covers/1529589781.jpg'),
(23, 1, 200, 1, 'Sagam, Viale Fulvio Testi, Milan, Metropolitan City of Milan, Italy', NULL, '2018-06-30', '09:00:00', '19:00:00', 34, 'Evento Nuova VW Touareg', '<p>maestosa, espressiva, elegante, Nuova Touareg ha uno sguardo libero verso l&rsquo;avventura. La massiccia calandra cromata appare scolpita per racchiudere i gruppi ottici senza soluzione di continuit&agrave; e i nuovi fari a LED Matrix IQ Light con regolazione dinamica degli abbaglianti &ldquo;Dynamic Light Assist&rdquo; illuminano la carreggiata in modo fluido e intelligente, generando un fascio luminoso dall&rsquo;intensit&agrave; ottimale in qualsiasi situazione.<br />Le nuove proporzioni diventano dinamiche grazie all&rsquo;utilizzo del pianale modulare longitudinale (MLB) mentre le linee sono tese, partendo dal tetto si sviluppano fluide lateralmente per terminare in modo dinamico nel montante posteriore nettamente inclinato in avanti.</p><p>l&rsquo;abitacolo di Nuova Touareg &egrave; stato progettato per accogliere i suoi occupanti in un ambiente raffinato e funzionale a livello d&rsquo;eccellenza mentre la plancia, orientata verso il posto di guida, diventa pi&ugrave; ergonomica. A regalare una sensazione di libert&agrave; senza confini, ci pensa il tetto panoramico che, sollevabile con un semplice click, offre una sensazione di maggiore spaziosit&agrave; e una piacevole luminosit&agrave; all&rsquo;interno dell&rsquo;abitacolo.</p><p>progresso &egrave; parola d&rsquo;ordine nel lancio di Nuova Touareg, ammiraglia equipaggiata con soluzioni di connettivit&agrave; della nuova era e una futuristica integrazione di sistemi di assistenza, comfort, illuminazione infotainment, per regalarti una nuova e indimenticabile esperienza di guida. Grazie al sistema &ldquo;Head-up dispaley&rdquo; avrai la possibilit&agrave; di vedere la proiezione del tachimetro, direttamente sul parabrezza per garantire la massima concentrazione al volante e lo sguardo rivolto sempre verso la strada. La tecnologia si conferma anche nei sistemi di navigazione, sicurezza e illuminazione premium, guida assistita e parcheggio automatizzato.</p>', NULL, '2018-06-25 03:00:01', '2018-06-25 02:07:55', 'public/images/event_covers/1529874475.jpg'),
(24, 14, 100, 10, 'IED, Via Pompeo Leoni, Milano, MI, Italia', NULL, '2018-09-14', '10:10:00', '13:13:00', 100, 'Ape al parco', '<p>&gt;Aperitivo con Open Wine dalle 19:30 alle 22:30 -&gt; 15&euro;&nbsp;<br />*Buffet fino alle 21.30<br /><br />Con il nostro braccialetto, inoltre, sar&agrave; possibile accedere gratuitamente all&#39; Old Fashion Milano* (entro 00:00 per gli uomini / 00:30 per le donne). *NB la selezione &egrave; a cura del locale.<br /><br />&gt; Ricordiamo che per confermare la propria partecipazione &egrave; necessario inserire in bacheca il proprio nome e quello dei propri amici.<br /><br />&gt; Festeggia il tuo compleanno o la tua festa di laurea con noi! Per qualsiasi informazione non esitare a contattarci.</p>', NULL, '2018-06-25 01:26:38', '2018-06-25 02:15:22', 'public/images/event_covers/1529874922.jpeg'),
(25, 13, 30, 5, 'Rho-Fiera, Rho, MI, Italia', NULL, '2018-10-10', '08:00:00', '23:00:00', 15, 'Esposizione ciclo e motociclo Eventi a Milano„Rho Fiera torna EICMA', '<p><strong>Dal 10 al 13 novembre Esposizione ciclo e motociclo Eventi a Milano</strong><br />&bdquo;<strong>Tra i partecipanti tutti i marchi pi&ugrave; prestigiosi delle due ruote</strong>, che saranno presenti con le tradizionali aree speciali EICMA Custom e Area Sicurezza, l&#39;arena esterna MotoLive e il Temporary Bikers Shop. Tra le novit&agrave; le zone Eicma E-Bike, con area test ride di biciclette elettriche, e Eicma Start up e Innovazione, dedicata a imprese giovani e innovative.&ldquo;</p>', NULL, '2018-06-25 01:35:59', '2018-06-25 01:41:31', 'public/images/event_covers/1529872891.jpg');

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
(1, 1, 3, 1, 1, NULL, '2018-06-19 22:26:11', '2018-06-20 01:12:39'),
(2, 17, 1, 1, 2, NULL, '2018-06-21 23:41:41', '2018-06-21 23:42:46'),
(3, 14, 6, 1, 2, NULL, '2018-06-22 00:16:31', '2018-06-22 00:16:46'),
(4, 24, 4, 0, 2, NULL, '2018-06-25 01:27:05', '2018-06-25 01:27:05'),
(5, 23, 13, 1, 2, NULL, '2018-06-25 02:08:12', '2018-06-25 02:08:38'),
(6, 23, 6, 1, 2, NULL, '2018-06-25 02:08:19', '2018-06-25 02:08:47');

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
(3, 6, 14, 'Maaaaa serve registrarsi all\'ingresso o l\'entrata è free??', '2018-06-22 00:17:39', '2018-06-22 00:17:39');

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
('47450109-dd5b-4e78-91e6-fd3b2ad08351', 'App\\Notifications\\Accepted', 3, 'App\\User', '{\"event_id\":1}', NULL, '2018-06-20 01:12:39', '2018-06-20 01:12:39'),
('7f15ba23-8433-4c46-8f57-85627472fb87', 'App\\Notifications\\Accepted', 1, 'App\\User', '{\"event_id\":17}', NULL, '2018-06-21 23:42:46', '2018-06-21 23:42:46'),
('97bd6886-b692-4209-92bc-2e2a45dffcf2', 'App\\Notifications\\Invite', 1, 'App\\User', '{\"event_id\":17,\"user_id\":6}', NULL, '2018-06-21 23:41:41', '2018-06-21 23:41:41'),
('a81d4f09-380b-491f-8349-e219a6ebb3b2', 'App\\Notifications\\Join', 1, 'App\\User', '{\"event_id\":1,\"user_id\":3}', '2018-06-20 09:16:24', '2018-06-19 22:26:11', '2018-06-20 09:16:24'),
('b5636265-1ae8-487e-9f8e-cb3416d5e608', 'App\\Notifications\\Invite', 13, 'App\\User', '{\"event_id\":23,\"user_id\":1}', NULL, '2018-06-25 02:08:12', '2018-06-25 02:08:12'),
('b986101e-fdb1-4ada-b05d-afbdcdf49540', 'App\\Notifications\\Accepted', 13, 'App\\User', '{\"event_id\":23}', NULL, '2018-06-25 02:08:38', '2018-06-25 02:08:38'),
('d08d82e2-7a2f-488c-af53-d0d6ce688e91', 'App\\Notifications\\Accepted', 6, 'App\\User', '{\"event_id\":23}', NULL, '2018-06-25 02:08:47', '2018-06-25 02:08:47'),
('d0f41b57-eb79-4408-aac0-5dca4caf0abf', 'App\\Notifications\\Invite', 6, 'App\\User', '{\"event_id\":14,\"user_id\":1}', NULL, '2018-06-22 00:16:31', '2018-06-22 00:16:31'),
('df0a4bd0-5f8e-4aab-99d4-c4341f077cea', 'App\\Notifications\\Invite', 6, 'App\\User', '{\"event_id\":23,\"user_id\":1}', NULL, '2018-06-25 02:08:19', '2018-06-25 02:08:19'),
('df61ca80-7dce-4f91-84f2-c587789d0b06', 'App\\Notifications\\Accepted', 6, 'App\\User', '{\"event_id\":14}', NULL, '2018-06-22 00:16:46', '2018-06-22 00:16:46'),
('e67fd1cb-7f74-4b8f-a981-b7d684498579', 'App\\Notifications\\Invite', 4, 'App\\User', '{\"event_id\":24,\"user_id\":14}', NULL, '2018-06-25 01:27:05', '2018-06-25 01:27:05');

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
  `descr` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_birthday` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `location`, `photo`, `role`, `age`, `phone_number`, `sex`, `descr`, `prev_job`, `cover_photo`, `tshirt_size`, `height`, `hair`, `shoes_size`, `eyes`, `password`, `resume`, `remember_token`, `created_at`, `updated_at`, `date_birthday`) VALUES
(1, 'Andrea Mapelli', 'info@ns7records.com', 'IED Istituto Europeo di Design | Milano, Via Amatore Sciesa, Milan, Metropolitan City of Milan, Italy', 'public/images/1529771967.jpg', '2', 23, '3402000000', 1, '<p>Sono uno studente IED a Milano</p>', 'IKEA', NULL, 'S', '1,72 cm', 'Marroni', '42', 'Marroni', '$2y$10$y6bCbIcwXxeJmCFYZi7y8OjRd9q.0faoZ.XR8VF8pNK/QdeTDOdKG', 'public/images/curriculum/1529873933.pdf', 'Bztte0LCAMaQ7v6fBxlTdNbjg4MxnDCdsd9IqW2OEaIetdmmcbbwH016Irf7', '2018-06-15 14:43:29', '2018-06-25 01:58:53', '25/05/1995'),
(4, 'apiApp', 'prova@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YLsjq6xMYqTKTSFV.Q4nYe3hMI.7RYAJpGQbLzm/x6xO85h5Q8J16', NULL, '3VD84Xubbeo8gIGPgvKmKBIC5puMY0IOwbfnoFcHnI4oHIbGnXBjqlskLeoX', '2018-06-19 05:09:58', '2018-06-19 05:09:58', NULL),
(6, 'Giovanni Brocca', 'giovanni@gmail.com', 'IED Istituto Europeo di Design | Milano, Via Amatore Sciesa, Milano, MI, Italia', 'public/images/1529768784.jpg', '2', 21, '3339899122', 1, NULL, 'Menager', NULL, 'M', '1,80 cm', 'blu', '45', 'blu', '$2y$10$jZj67ESczjWv99B7S5GFheaR/wZxqkuLRAbGHLhK8/ZXgREZ60lvC', NULL, 'TTfm1b4lNeIb5l9GwaGZC1fNoskvciSRnV7EUX6yKIr74Xq1zT8H4wxqbpuc', '2018-06-21 23:36:01', '2018-06-24 01:46:24', NULL),
(8, 'Joelle', 'joelle15@hotmail.it', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tUN2HC6gsV/0i.O.dD/hz.eZ./jGPD05QTUVQJJSKxf7f8/JivvvW', NULL, NULL, '2018-06-22 16:18:17', '2018-06-22 16:18:17', NULL),
(10, 'francescoAdmin', 'fraadmin@gmail.com', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$7VQTopNDXpqQ9eWpHNd4neSJYPkEYXJV/hUGDYgdwNQjBlPCaveyK', NULL, '4C8uGsNbzRa0ifT8hQL1thv8MN7ofol0EAZOJ5t1UPDGwwx0sMBvyO22dKXO', '2018-06-25 00:02:21', '2018-06-25 00:02:21', NULL),
(13, 'Francesco La Rosa', 'fra@gmail.com', 'City Life, Milano, MI, Italia', 'public/images/1529873005.png', '2', 21, '333 6678999', 1, '<p>sono uno studente universitario IED Milano .</p>', 'driver', NULL, 'm', '180', 'neri', '43', 'verdi', '$2y$10$XnEfIf/cgMsEuyQoKGMbMeaiX73NFv0.It6xzrDFO48iRBZ1AFjsm', 'public/images/curriculum/1529874085.pdf', 'zk47KrRBfLy2K2ro0nq7SSNt6tag9IN9nVcAHCpcmF1sEbygFrbAI5BPGvSL', '2018-06-25 01:03:58', '2018-06-25 02:01:25', '8/10/1996'),
(14, 'Giovanni Brocca', 'gio@gmail.com', 'Via toscana 15', 'public/images/1529871300.jpg', '2', 21, '3331111121', 1, '<p>Sono uno studente IED</p>', 'Menager', NULL, 'm', '1,80 cm', 'blu', '45', 'blu', '$2y$10$eUisQaT8T0vZUEmJ8OmySOZx5Mcr.2El/HOJqtGBucax6t0zkac1a', 'public/images/curriculum/1529874167.pdf', NULL, '2018-06-25 01:04:38', '2018-06-25 02:02:47', '1990-10-10');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `event_members`
--
ALTER TABLE `event_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_jobs`
--
ALTER TABLE `user_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
