-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 oct. 2023 à 15:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mairisn`
--

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `name`, `state`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Département 1 de Dakar', 1, 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(2, 'Département 1 de Thiès', 1, 2, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(3, 'Département 1 de Saint-Louis', 1, 3, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(4, 'Département 1 de Diourbel', 1, 4, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(5, 'Département 1 de Louga', 1, 5, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(6, 'Département 1 de Fatick', 1, 6, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(8, 'Département 1 de Kaffrine', 1, 8, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(9, 'Département 1 de Kédougou', 1, 9, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(10, 'Département 1 de Tambacounda', 1, 10, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(11, 'Département 1 de Ziguinchor', 1, 11, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(12, 'Département 1 de Kolda', 1, 12, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(13, 'Département 1 de Matam', 1, 13, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(14, 'Département 1 de Sédhiou', 1, 14, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(16, 'Département de Kaolack', 1, 7, '2023-10-24 20:13:56', '2023-10-24 20:13:56'),
(18, 'Département de Matam', 1, 13, '2023-10-24 23:49:01', '2023-10-24 23:49:01'),
(19, 'Département de Renerou Ferlo', 1, 13, '2023-10-24 23:49:26', '2023-10-24 23:49:26'),
(20, 'Département de Kanel', 1, 13, '2023-10-24 23:56:34', '2023-10-24 23:56:34'),
(21, 'Département de Mbour', 1, 2, '2023-10-24 23:58:57', '2023-10-24 23:58:57'),
(22, 'Département de Thiés', 1, 2, '2023-10-24 23:59:14', '2023-10-24 23:59:14'),
(23, 'Département de Tivaoune', 1, 2, '2023-10-24 23:59:54', '2023-10-24 23:59:54'),
(24, 'Département de Dagana', 1, 3, '2023-10-25 00:01:24', '2023-10-25 00:01:24'),
(25, 'Département de Podor', 1, 3, '2023-10-25 00:01:49', '2023-10-25 00:01:49'),
(26, 'Département de Saint-Louis', 1, 3, '2023-10-25 00:03:40', '2023-10-25 00:03:40'),
(27, 'Département de Mbacké', 1, 4, '2023-10-25 00:04:11', '2023-10-25 00:04:11'),
(28, 'Département de Diourbel', 1, 4, '2023-10-25 00:04:38', '2023-10-25 00:04:38'),
(29, 'Département de Bambey', 1, 4, '2023-10-25 00:04:55', '2023-10-25 00:04:55'),
(30, 'Département de Kébémer', 1, 5, '2023-10-25 00:05:31', '2023-10-25 00:05:31'),
(31, 'Département de Linguère', 1, 5, '2023-10-25 00:05:56', '2023-10-25 00:05:56'),
(32, 'Département de Louga', 1, 5, '2023-10-25 00:06:12', '2023-10-25 00:06:12'),
(33, 'Département de Fatick', 1, 6, '2023-10-25 00:07:16', '2023-10-25 00:07:16'),
(34, 'Département de Foundiougne', 1, 6, '2023-10-25 00:07:50', '2023-10-25 00:07:50'),
(35, 'Département de Gossas', 1, 6, '2023-10-25 00:08:05', '2023-10-25 00:08:05'),
(37, 'Département de Guinguinéo', 1, 7, '2023-10-25 00:10:31', '2023-10-25 00:10:31'),
(38, 'Département de Nioro du Rip', 1, 7, '2023-10-25 00:10:55', '2023-10-25 00:10:55'),
(39, 'Département de Birkelane', 1, 8, '2023-10-25 00:11:35', '2023-10-25 00:11:35'),
(40, 'Département de Kaffrine', 1, 8, '2023-10-25 00:11:59', '2023-10-25 00:11:59'),
(41, 'Département de Koungheul', 1, 8, '2023-10-25 00:12:13', '2023-10-25 00:12:13'),
(42, 'Département de Malem-Hodar', 1, 8, '2023-10-25 00:12:33', '2023-10-25 00:12:33'),
(43, 'Département de Kédougou', 1, 9, '2023-10-25 00:13:12', '2023-10-25 00:13:12'),
(44, 'Département de Salémata', 1, 9, '2023-10-25 00:13:29', '2023-10-25 00:13:29'),
(45, 'Département de Saraya', 1, 9, '2023-10-25 00:13:48', '2023-10-25 00:13:48'),
(46, 'Département de Bakel', 1, 10, '2023-10-25 00:14:20', '2023-10-25 00:14:20'),
(47, 'Département de Goudiry', 1, 10, '2023-10-25 00:14:38', '2023-10-25 00:14:38'),
(48, 'Département de Koumpentoum', 1, 10, '2023-10-25 00:14:51', '2023-10-25 00:14:51'),
(49, 'Département de Tambacounda', 1, 10, '2023-10-25 00:15:09', '2023-10-25 00:15:09'),
(50, 'Département de Bignona', 1, 11, '2023-10-25 00:16:06', '2023-10-25 00:16:06'),
(51, 'Département de Oussouye', 1, 11, '2023-10-25 00:16:20', '2023-10-25 00:16:20'),
(52, 'Département de Ziguinchor', 1, 11, '2023-10-25 00:16:36', '2023-10-25 00:16:36'),
(53, 'Département de Médina Yoro Foulah', 1, 12, '2023-10-25 00:17:47', '2023-10-25 00:17:47'),
(54, 'Département de Vélingara', 1, 12, '2023-10-25 00:18:06', '2023-10-25 00:18:06'),
(55, 'Département de Kolda', 1, 12, '2023-10-25 00:18:33', '2023-10-25 00:18:33'),
(56, 'Département de Bounkiling', 1, 14, '2023-10-25 00:20:53', '2023-10-25 00:20:53'),
(57, 'Département de Goudomp', 1, 14, '2023-10-25 00:21:05', '2023-10-25 00:21:05'),
(58, 'Département de Sédhiou', 1, 14, '2023-10-25 00:21:29', '2023-10-25 00:21:29'),
(59, 'Département de Dakar', 1, 1, '2023-10-25 00:22:15', '2023-10-25 00:22:15'),
(60, 'Département de Pikine', 1, 1, '2023-10-25 00:22:30', '2023-10-25 00:22:30'),
(61, 'Département de Rufisque', 1, 1, '2023-10-25 00:22:44', '2023-10-25 00:22:44'),
(62, 'Département de Guédiawaye', 1, 1, '2023-10-25 00:23:04', '2023-10-25 00:23:04'),
(63, 'Département de Keur Massar', 1, 1, '2023-10-25 00:23:21', '2023-10-25 00:23:21'),
(64, 'DENIS', 1, 1, '2023-10-25 08:33:14', '2023-10-25 08:33:14'),
(65, 'DENIS', 1, 2, '2023-10-25 08:38:22', '2023-10-25 08:38:22'),
(66, 'DENIS', 1, 3, '2023-10-25 08:38:38', '2023-10-25 08:38:38'),
(67, 'DENIS', 1, 4, '2023-10-25 08:38:51', '2023-10-25 08:38:51'),
(68, 'DENIS', 1, 5, '2023-10-25 08:39:00', '2023-10-25 08:39:00'),
(69, 'DENIS', 1, 6, '2023-10-25 08:39:13', '2023-10-25 08:39:13'),
(70, 'DENIS', 1, 8, '2023-10-25 08:39:26', '2023-10-25 08:39:26'),
(71, 'DENIS', 1, 9, '2023-10-25 08:39:40', '2023-10-25 08:39:40'),
(72, 'DENIS', 1, 10, '2023-10-25 08:39:52', '2023-10-25 08:39:52'),
(73, 'DENIS', 1, 11, '2023-10-25 08:40:02', '2023-10-25 08:40:02'),
(74, 'DENIS', 1, 12, '2023-10-25 08:40:13', '2023-10-25 08:40:13'),
(75, 'DENIS', 1, 13, '2023-10-25 08:40:25', '2023-10-25 08:40:25'),
(76, 'DENIS', 1, 14, '2023-10-25 08:40:39', '2023-10-25 08:40:39'),
(77, 'DENIS', 1, 4, '2023-10-25 08:45:56', '2023-10-25 08:45:56'),
(78, 'DENIS', 1, 3, '2023-10-25 08:46:22', '2023-10-25 08:46:22');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `guichet_certificats`
--

CREATE TABLE `guichet_certificats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `mairie_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `nombre_copies` int(11) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `state` enum('en_traitement','rejeté','terminé') NOT NULL DEFAULT 'en_traitement',
  `code` varchar(255) DEFAULT NULL,
  `infos_demande` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`infos_demande`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_validation_rejet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guichet_deces`
--

CREATE TABLE `guichet_deces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `mairie_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_defunt` varchar(255) NOT NULL,
  `prenom_defunt` varchar(255) NOT NULL,
  `nombre_copies` int(11) NOT NULL,
  `numero_acte_deces` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `annee_deces` year(4) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `infos_demande` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`infos_demande`)),
  `code` varchar(255) DEFAULT NULL,
  `state` enum('en_traitement','rejeté','terminé') NOT NULL DEFAULT 'en_traitement',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_validation_rejet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guichet_divorces`
--

CREATE TABLE `guichet_divorces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `mairie_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `numero_acte_divorce` varchar(255) NOT NULL,
  `annee_divorce` year(4) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `nombre_copies` int(11) NOT NULL,
  `state` enum('en_traitement','rejeté','terminé') NOT NULL DEFAULT 'en_traitement',
  `code` varchar(255) DEFAULT NULL,
  `infos_demande` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`infos_demande`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_validation_rejet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guichet_mariages`
--

CREATE TABLE `guichet_mariages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `mairie_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_epoux` varchar(255) NOT NULL,
  `prenom_epoux` varchar(255) NOT NULL,
  `nom_epouse` varchar(255) NOT NULL,
  `prenom_epouse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `nombre_copies` int(11) NOT NULL,
  `annee_registre` year(4) NOT NULL,
  `numero_registre_bulletin` varchar(255) NOT NULL,
  `state` enum('en_traitement','rejeté','terminé') NOT NULL DEFAULT 'en_traitement',
  `code` varchar(255) DEFAULT NULL,
  `infos_demande` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`infos_demande`)),
  `fichier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_validation_rejet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guichet_naissances`
--

CREATE TABLE `guichet_naissances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `mairie_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `nombre_copies` int(11) NOT NULL,
  `prenom_pere` varchar(255) NOT NULL,
  `nom_prenom_mere` varchar(255) NOT NULL,
  `annee_registre` year(4) NOT NULL,
  `numero_acte_naissance` varchar(255) NOT NULL,
  `state` enum('en_traitement','rejeté','terminé') NOT NULL DEFAULT 'en_traitement',
  `code` varchar(255) DEFAULT NULL,
  `infos_demande` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`infos_demande`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_validation_rejet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `guichet_naissances`
--

INSERT INTO `guichet_naissances` (`id`, `region_id`, `mairie_id`, `departement_id`, `agent_id`, `nom`, `prenom`, `lieu_naissance`, `date_naissance`, `telephone`, `nombre_copies`, `prenom_pere`, `nom_prenom_mere`, `annee_registre`, `numero_acte_naissance`, `state`, `code`, `infos_demande`, `created_at`, `updated_at`, `date_validation_rejet`) VALUES
(1, 1, 1, 1, NULL, 'Denis', 'Coly', 'ndocka sérère', '2023-10-20', '0784250489', 1, 'Coly', 'Denis', '1990', '360', 'en_traitement', 'SN-3185409', '[\"Copie litt\\u00e9rale d\'acte de naissance\"]', '2023-10-25 08:04:58', '2023-10-25 08:04:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mairies`
--

CREATE TABLE `mairies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mairies`
--

INSERT INTO `mairies` (`id`, `name`, `state`, `departement_id`, `created_at`, `updated_at`) VALUES
(1, 'Mairie 1 de Département 1 de Dakar', 1, 1, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(2, 'Mairie 1 de Département 1 de Thiès', 1, 2, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(3, 'Mairie 1 de Département 1 de Saint-Louis', 1, 3, '2023-10-25 12:03:29', '2023-10-25 12:03:29'),
(4, 'Mairie 1 de Département 1 de Diourbel', 1, 4, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(5, 'Mairie 1 de Département 1 de Louga', 1, 5, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(6, 'Mairie 1 de Département 1 de Fatick', 1, 6, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(7, 'Mairie 1 de Département 1 de Kaolack', 1, NULL, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(8, 'Mairie 1 de Département 1 de Kaffrine', 1, 8, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(9, 'Mairie 1 de Département 1 de Kédougou', 1, 9, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(10, 'Mairie 1 de Département 1 de Tambacounda', 1, 10, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(11, 'Mairie 1 de Département 1 de Ziguinchor', 1, 11, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(12, 'Mairie 1 de Département 1 de Kolda', 1, 12, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(13, 'Mairie 1 de Département 1 de Matam', 1, 13, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(14, 'Mairie 1 de Département 1 de Sédhiou', 1, 14, '2023-10-25 12:03:30', '2023-10-25 12:03:30'),
(15, 'Mairie de Kaolack', 1, 16, '2023-10-24 20:16:00', '2023-10-25 12:16:32'),
(16, 'Mairie de Matam', 1, 1, '2023-10-24 23:51:23', '2023-10-24 23:51:23');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_11_004838_create_regions_table', 1),
(6, '2023_10_11_004839_create_departements_table', 1),
(7, '2023_10_11_004846_create_mairies_table', 1),
(8, '2023_10_11_004847_create_users_table', 1),
(9, '2023_10_11_063448_create_guichet_deces_table', 1),
(10, '2023_10_11_125733_create_guichet_naissances_table', 1),
(11, '2023_10_11_125753_create_guichet_mariages_table', 1),
(12, '2023_10_18_210350_create_guichet_divorces_table', 1),
(13, '2023_10_20_084649_create_guichet_certificats_table', 1),
(14, '2023_10_22_214408_create_reset_agents_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Dakar', 1, '2023-10-25 12:03:27', '2023-10-25 12:03:27'),
(2, 'Thiès', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(3, 'Saint-Louis', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(4, 'Diourbel', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(5, 'Louga', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(6, 'Fatick', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(7, 'Kaolack', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(8, 'Kaffrine', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(9, 'Kédougou', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(10, 'Tambacounda', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(11, 'Ziguinchor', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(12, 'Kolda', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(13, 'Matam', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28'),
(14, 'Sédhiou', 1, '2023-10-25 12:03:28', '2023-10-25 12:03:28');

-- --------------------------------------------------------

--
-- Structure de la table `reset_agents`
--

CREATE TABLE `reset_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `mairie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `role` enum('admin','agent') NOT NULL,
  `mairie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `state`, `role`, `mairie_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dénis Coly', '+221 78 473 76 71', 1, 'admin', 1, 'deniscoly19@gmail.com', NULL, '$2y$10$T..FNGVvTwLKKilH6wSAzOB0HZB7Q6ClUrXGMhKCxx2pjCopwf9ea', NULL, NULL, '2023-10-24 17:35:11'),
(2, 'MAIRIE SN', '784737671', 1, 'admin', 15, 'mairisn2@gmail.com', NULL, '$2y$10$ubRkxxm/by3VDZq8agnAlufu0u2yYQCyPp44CEmtrSQTXApneJUKG', NULL, '2023-10-23 22:02:10', '2023-10-25 12:16:51'),
(6, 'AGENT DENIS', '0784250489', 1, 'agent', 15, 'deniscoly27@gmail.com', NULL, '$2y$10$ZbmBjP2T3PJe1nO0NnptmeF4mYpJPQdJF6d8OP7zUCf1PIY/0yqZu', NULL, '2023-10-25 08:00:25', '2023-10-25 12:17:05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_region_id_foreign` (`region_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `guichet_certificats`
--
ALTER TABLE `guichet_certificats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guichet_certificats_region_id_foreign` (`region_id`),
  ADD KEY `guichet_certificats_mairie_id_foreign` (`mairie_id`),
  ADD KEY `guichet_certificats_departement_id_foreign` (`departement_id`),
  ADD KEY `guichet_certificats_agent_id_foreign` (`agent_id`);

--
-- Index pour la table `guichet_deces`
--
ALTER TABLE `guichet_deces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guichet_deces_region_id_foreign` (`region_id`),
  ADD KEY `guichet_deces_mairie_id_foreign` (`mairie_id`),
  ADD KEY `guichet_deces_departement_id_foreign` (`departement_id`),
  ADD KEY `guichet_deces_agent_id_foreign` (`agent_id`);

--
-- Index pour la table `guichet_divorces`
--
ALTER TABLE `guichet_divorces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guichet_divorces_region_id_foreign` (`region_id`),
  ADD KEY `guichet_divorces_mairie_id_foreign` (`mairie_id`),
  ADD KEY `guichet_divorces_departement_id_foreign` (`departement_id`),
  ADD KEY `guichet_divorces_agent_id_foreign` (`agent_id`);

--
-- Index pour la table `guichet_mariages`
--
ALTER TABLE `guichet_mariages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guichet_mariages_region_id_foreign` (`region_id`),
  ADD KEY `guichet_mariages_mairie_id_foreign` (`mairie_id`),
  ADD KEY `guichet_mariages_departement_id_foreign` (`departement_id`),
  ADD KEY `guichet_mariages_agent_id_foreign` (`agent_id`);

--
-- Index pour la table `guichet_naissances`
--
ALTER TABLE `guichet_naissances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guichet_naissances_region_id_foreign` (`region_id`),
  ADD KEY `guichet_naissances_mairie_id_foreign` (`mairie_id`),
  ADD KEY `guichet_naissances_departement_id_foreign` (`departement_id`),
  ADD KEY `guichet_naissances_agent_id_foreign` (`agent_id`);

--
-- Index pour la table `mairies`
--
ALTER TABLE `mairies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mairies_departement_id_foreign` (`departement_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reset_agents`
--
ALTER TABLE `reset_agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_agents_email_unique` (`email`),
  ADD KEY `reset_agents_region_id_foreign` (`region_id`),
  ADD KEY `reset_agents_departement_id_foreign` (`departement_id`),
  ADD KEY `reset_agents_mairie_id_foreign` (`mairie_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_mairie_id_foreign` (`mairie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `guichet_certificats`
--
ALTER TABLE `guichet_certificats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `guichet_deces`
--
ALTER TABLE `guichet_deces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `guichet_divorces`
--
ALTER TABLE `guichet_divorces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `guichet_mariages`
--
ALTER TABLE `guichet_mariages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `guichet_naissances`
--
ALTER TABLE `guichet_naissances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mairies`
--
ALTER TABLE `mairies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reset_agents`
--
ALTER TABLE `reset_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `guichet_certificats`
--
ALTER TABLE `guichet_certificats`
  ADD CONSTRAINT `guichet_certificats_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guichet_certificats_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `guichet_certificats_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`),
  ADD CONSTRAINT `guichet_certificats_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `guichet_deces`
--
ALTER TABLE `guichet_deces`
  ADD CONSTRAINT `guichet_deces_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guichet_deces_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `guichet_deces_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`),
  ADD CONSTRAINT `guichet_deces_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `guichet_divorces`
--
ALTER TABLE `guichet_divorces`
  ADD CONSTRAINT `guichet_divorces_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guichet_divorces_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `guichet_divorces_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`),
  ADD CONSTRAINT `guichet_divorces_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `guichet_mariages`
--
ALTER TABLE `guichet_mariages`
  ADD CONSTRAINT `guichet_mariages_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guichet_mariages_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `guichet_mariages_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`),
  ADD CONSTRAINT `guichet_mariages_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `guichet_naissances`
--
ALTER TABLE `guichet_naissances`
  ADD CONSTRAINT `guichet_naissances_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guichet_naissances_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `guichet_naissances_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`),
  ADD CONSTRAINT `guichet_naissances_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `mairies`
--
ALTER TABLE `mairies`
  ADD CONSTRAINT `mairies_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `reset_agents`
--
ALTER TABLE `reset_agents`
  ADD CONSTRAINT `reset_agents_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `reset_agents_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`),
  ADD CONSTRAINT `reset_agents_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_mairie_id_foreign` FOREIGN KEY (`mairie_id`) REFERENCES `mairies` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
