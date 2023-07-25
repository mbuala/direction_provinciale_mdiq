-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2022 at 10:38 AM
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
-- Database: `management_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` bigint UNSIGNED NOT NULL,
  `Numero` int NOT NULL,
  `objet` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `Numero`, `objet`) VALUES
(1, 900, 'GOUVERNANCE DU SYSTÈME ET MOBILISATION DES ACTEURS'),
(2, 901, 'EQUITÉ, ÉGALITÉ DES CHANCES ET OBLIGATION DE SCOLARITÉ'),
(3, 902, 'ENSEIGNEMENT QUALIFIANT ET POST-SECONDAIRE POUR  LA PROMOTION DE L\'INDIVIDU ET DE LA SOCIETE'),
(4, 912, 'RENOVATION DES MATIERS D\'ENSEIGNEMENT ET DE FORMATION ET PROMOTION DE LA GESTION DES PARCOURS PROFESSIONNELS');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` bigint UNSIGNED NOT NULL,
  `num_avis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_avis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ouverture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `offe_num` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id`, `num_avis`, `date_avis`, `date_ouverture`, `heure`, `offe_num`) VALUES
(42, '14/ll/2022', '07/11/2022', '07/01/2023', '14 h 00', '34'),
(43, '8555', '1/1/2023', '1/2/2023', '12 h 00', '35'),
(44, '27/INV/2022', '1/1/2023', '1/2/2023', '12 h 00', '36');

-- --------------------------------------------------------

--
-- Table structure for table `concurrents`
--

CREATE TABLE `concurrents` (
  `id` bigint UNSIGNED NOT NULL,
  `id_offer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_avis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Postuler` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dossier_complet` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `existe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eliminer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Motif` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserver` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet_reserve` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mantant_dactes` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concurrents`
--

INSERT INTO `concurrents` (`id`, `id_offer`, `id_avis`, `Nom`, `Postuler`, `Dossier_complet`, `existe`, `eliminer`, `Motif`, `reserver`, `objet_reserve`, `Mantant_dactes`, `created_at`, `updated_at`) VALUES
(1143, '34', '42', 'tester', '[\"Physique\"]', '[\"oui\"]', '[\"existe\"]', 'null', 'null', 'null', 'null', '5000', NULL, NULL),
(1140, '35', '43', 'ana', '[\"Physique\"]', '[\"oui\"]', 'null', 'null', 'null', 'null', 'null', '4000', NULL, NULL),
(1144, '34', '42', 'companyA', '[\"Electronique\"]', '[\"non\"]', 'null', 'null', 'null', 'null', 'null', '6000', NULL, NULL),
(1145, '34', '42', 'companyB', '[\"Physique\"]', '[\"oui\"]', 'null', 'null', 'null', 'null', 'null', '5550', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `convocations`
--

CREATE TABLE `convocations` (
  `id` int NOT NULL,
  `id_decision` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `convocations`
--

INSERT INTO `convocations` (`id`, `id_decision`) VALUES
(46, '14/ll/2022'),
(47, '8555'),
(48, '27/INV/2022');

-- --------------------------------------------------------

--
-- Table structure for table `cps`
--

CREATE TABLE `cps` (
  `id` varchar(60) NOT NULL,
  `off_name` varchar(60) NOT NULL,
  `num_avis` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cps`
--

INSERT INTO `cps` (`id`, `off_name`, `num_avis`) VALUES
('34', 'not_important', '14/ll/2022'),
('35', 'not_important', '8555'),
('36', 'not_important', '27/INV/2022');

-- --------------------------------------------------------

--
-- Table structure for table `decisions`
--

CREATE TABLE `decisions` (
  `id` int NOT NULL,
  `num_decision` varchar(191) NOT NULL,
  `nom_juries` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decisions`
--

INSERT INTO `decisions` (`id`, `num_decision`, `nom_juries`) VALUES
(50, '14/ll/2022', '15.10.12.17'),
(51, '8555', '12'),
(52, '27/INV/2022', '15.10.12');

-- --------------------------------------------------------

--
-- Table structure for table `etat_engagements`
--

CREATE TABLE `etat_engagements` (
  `id` int NOT NULL,
  `code` varchar(191) NOT NULL,
  `objet` text NOT NULL,
  `cp` decimal(65,2) NOT NULL,
  `ce` decimal(65,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etat_engagements`
--

INSERT INTO `etat_engagements` (`id`, `code`, `objet`, `cp`, `ce`) VALUES
(1, '900.10.33', 'Achat de matériel informatique et de logiciels', '80000.00', '50000.00'),
(2, '901.10.31', 'Achat de matériel d\'enseignement', '120000.00', '0.00'),
(7, '901.21.11', 'Etudes et contrôles liés à la construction', '614000.00', '1046000.00'),
(8, '901.21.13', 'Frais d\'autorisation de construire', '120000.00', '0.00'),
(9, '901.21.21', 'Achat de matériel d\'enseignement', '210000.00', '0.00'),
(10, '901.21.22', 'Matériel de bureau', '15000.00', '0.00'),
(11, '901.21.23', 'Achat et installation de matériel informatique et logiciels', '15000.00', '0.00'),
(12, '901.21.25', 'Mobilier d’enseignement', '220000.00', '0.00'),
(13, '901.21.26', 'Achat de mobilier de bureau', '20000.00', '0.00'),
(14, '901.22.11', 'Etudes et contrôles liés à la construction', '75600.00', '176400.00'),
(15, '901.22.12', 'Travaux de construction', '968240.00', '1579760.00'),
(16, '901.22.24', 'Mobilier d’enseignement', '210000.00', '0.00'),
(17, '901.30.11', 'Matériel d\'internats et de cantines scolaires', '263500.00', '0.00'),
(18, '901.30.13', 'Mobilier d’internats et de cantines scolaires', '185000.00', '0.00'),
(19, '901.40.21', 'Etudes et contrôles afférant aux Agencements et aux aménagements', '20000.00', '0.00'),
(20, '901.40.22', 'Agencement, aménagement et installation', '775000.00', '0.00'),
(21, '901.40.31', 'Achat de matériel d\'enseignement', '220000.00', '0.00'),
(22, '901.40.32', 'Achat et installation de matériel informatique et logiciels', '84000.00', '0.00'),
(23, '901.50.21', 'Etudes et contrôles afférant aux Agencements et aux aménagements', '17000.00', '0.00'),
(24, '901.50.22', 'Agencement, aménagement et installation', '313000.00', '0.00'),
(25, '901.50.31', 'Achat de matériel d\'enseignement', '100000.00', '0.00'),
(26, '901.50.34', 'Mobilier d’enseignement', '84000.00', '0.00'),
(27, '901.50.37', 'Achat et installation de matériel informatique et logiciels', '16000.00', '0.00'),
(28, '901.50.41', 'Subvention aux associations pour l\'éducation non formelle', '389845.40', '94436.60'),
(29, '901.61.11', 'Etudes et contrôles liés à la construction', '79800.00', '79800.00'),
(30, '901.61.12', 'Travaux de construction', '649000.00', '1811000.00'),
(31, '901.61.21', 'Etudes et contrôles afférant aux Agencements et aux aménagements', '4500.00', '0.00'),
(32, '901.61.22', 'Agencement, aménagement et installation', '845900.00', '1361100.00'),
(33, '901.61.23', 'Entretien et maintenance des infrastructures et des équipements scolaires ', '1065000.00', '0.00'),
(34, '901.61.31', 'Achat en renouvellement du matériel d\'enseignement', '450000.00', '0.00'),
(35, '901.61.34', 'Mobilier d’enseignement', '511000.00', '0.00'),
(36, '901.61.36', 'Achat de mobilier de bureau', '95000.00', '0.00'),
(37, '901.61.38', 'Achat et installation de matériel informatique et logiciels', '441400.00', '0.00'),
(38, '901.61.41', 'Subventions accordées aux associations du soutien de l\'école de la réussite', '969000.00', '323000.00'),
(39, '902.21.11', 'Etudes et contrôles liés à la construction', '328000.00', '492000.00'),
(40, '902.21.12', 'Travaux de construction', '2025000.00', '6075000.00'),
(41, '902.21.13', 'Frais d\'autorisation de construire', '80000.00', '0.00'),
(42, '902.21.21', 'Achat de matériel d\'enseignement', '1269000.00', '0.00'),
(43, '902.21.22', 'Matériel de bureau', '30000.00', '0.00'),
(44, '902.21.23', 'Achat et installation de matériel informatique et logiciels', '72000.00', '0.00'),
(45, '902.21.25', 'Achat de mobilier de bureau', '40000.00', '0.00'),
(46, '902.22.11', 'Etudes et contrôles liés à la construction', '50000.00', '50000.00'),
(47, '902.22.12', 'Travaux de construction', '362400.00', '633600.00'),
(48, '902.30.11', 'Matériel d\'internats et de cantines scolaires', '135800.00', '0.00'),
(49, '902.30.13', 'Mobilier d’internats et de cantines scolaires', '85000.00', '0.00'),
(50, '902.60.11', 'Etudes et contrôles liés à la construction', '40000.00', '0.00'),
(51, '902.60.12', 'Travaux de construction', '125000.00', '375000.00'),
(52, '902.60.21', 'Etudes et contrôles afférant aux Agencements et aux aménagements', '100000.00', '0.00'),
(53, '902.60.22', 'Agencement, aménagement et installation', '38000.00', '1862000.00'),
(54, '902.60.23', 'Entretien et maintenance des infrastructures et des équipements scolaires ', '250000.00', '0.00'),
(55, '902.60.33', 'Mobilier d’enseignement', '166000.00', '0.00'),
(56, '902.60.34', 'Achat de mobilier de bureau', '20000.00', '0.00'),
(57, '902.60.36', 'Achat et installation de matériel informatique et logiciels', '296200.00', '0.00'),
(58, '902.60.41', 'Subventions accordées aux associations du soutien de l\'école de la réussite', '248800.00', '0.00'),
(59, '912.41.21', 'Etudes et contrôles afférant aux Agencements et aux aménagements', '31889.60', '52030.40'),
(60, '912.41.22', 'Aménagement des terrains de sport', '168000.00', '532000.00'),
(61, '912.41.31', 'Achat de matériel de sports', '149000.00', '0.00'),
(62, '912.51.21', 'Matériel de bureau', '273420.00', '20580.00'),
(63, '912.61.11', 'Etudes et contrôles afférant aux Agencements et aux aménagements', '8000.00', '0.00'),
(64, '912.61.12', 'Agencement, aménagement et installation', '36000.00', '108000.00'),
(65, '912.61.22', 'Achat de mobilier de bureau', '56000.00', '56000.00'),
(66, '912.61.23', 'Achat et installation de matériel informatique et logiciels', '128000.00', '0.00'),
(67, '912.71.11', 'Achat et installation de matériel informatique et logiciels', '357504.71', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `first_pvs`
--

CREATE TABLE `first_pvs` (
  `id` bigint UNSIGNED NOT NULL,
  `id_avis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_offer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_concurrents` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_pvs`
--

INSERT INTO `first_pvs` (`id`, `id_avis`, `id_offer`, `num_concurrents`, `created_at`, `updated_at`) VALUES
(9, '1', '1', 1, NULL, NULL),
(28, '42', '34', 3, NULL, NULL),
(26, '43', '35', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jounal_matins`
--

CREATE TABLE `jounal_matins` (
  `id` bigint UNSIGNED NOT NULL,
  `id_offer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_avis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_journal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Page_num` int NOT NULL,
  `etat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jounal_matins`
--

INSERT INTO `jounal_matins` (`id`, `id_offer`, `id_avis`, `numero_journal`, `Date`, `Page_num`, `etat`) VALUES
(8, '24', '27', '17334', '18/10/2021', 24, 'normal'),
(18, '28', '31', '17509', '24/06/2022', 20, 'normal'),
(17, '27', '31', '17509', '24/06/2022', 20, 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `jounal_saharas`
--

CREATE TABLE `jounal_saharas` (
  `id` bigint UNSIGNED NOT NULL,
  `id_offer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_avis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_journal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Page_num` int NOT NULL,
  `etat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jounal_saharas`
--

INSERT INTO `jounal_saharas` (`id`, `id_offer`, `id_avis`, `numero_journal`, `Date`, `Page_num`, `etat`, `created_at`, `updated_at`) VALUES
(8, '24', '27', '11035', '18/10/2021', 19, 'normal', NULL, NULL),
(18, '28', '31', '11245', '24/06/2022', 22, 'normal', NULL, NULL),
(17, '27', '31', '11245', '24/06/2022', 22, 'normal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `juries`
--

CREATE TABLE `juries` (
  `id` bigint UNSIGNED NOT NULL,
  `Nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualiter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juries`
--

INSERT INTO `juries` (`id`, `Nom`, `prenom`, `profession`, `qualiter`) VALUES
(15, 'ELGHAYOUBI', 'Ahmed', 'Chef du service des A.A.F.C.E.P représentant du service financier DP MDIQ-FNIDEQ', 'Président'),
(10, 'CHAHID', 'Nadia', 'Chargée de l\'unité des engagements des dépenses - Budget d\'exploitation S.A.A.F.C.E.P DP MDIQ-FNIDEQ', 'Membre'),
(12, 'OCHAN', 'Faouzi', 'Chargé des bureau des marchés publics S.A.A.F.C.E.P DP MDIQ-FNIDEQ', 'Membre'),
(17, 'REDDAL', 'Mohamed', 'Fonde de pouvoirs représentant du controleur d\'Etat relevant du ministère chargé des Finances Auprés de l\'AREFTTH ou son Suppléant', 'Membre');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Nom` text,
  `prenom` text,
  `cn` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `Nom`, `prenom`, `cn`) VALUES
(1, 'aaahmedg@gmail.com', '123326', 'El Ghayoubi', 'Ahmed', 'G3625451'),
(2, 'nadchahid1@gmail.com', '654321', 'chahid', 'nadia', 'j36215');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_06_06_091315_create_offers_table', 1),
(3, '2022_06_06_094123_create_juries_table', 1),
(4, '2022_06_06_095541_create_etat_engagements_table', 1),
(5, '2022_06_06_100217_create_avis_table', 1),
(6, '2022_06_06_100606_create_decisions_table', 1),
(7, '2022_06_06_102614_create_cps_table', 1),
(8, '2022_06_06_102751_create_reglements_table', 1),
(9, '2022_06_06_102835_create_convocations_table', 1),
(10, '2022_06_08_103727_create_art_table', 1),
(11, '2022_06_08_103927_create_pargs_table', 1),
(12, '2022_06_08_113609_create_jounal_matins_table', 1),
(13, '2022_06_08_113726_create_jounal_saharas_table', 1),
(14, '2022_06_08_114228_create_first_pvs_table', 1),
(15, '2022_06_08_114454_create_concurrents_table', 1),
(16, '2022_06_08_114729_create_pv_deuxes_table', 1),
(17, '2022_06_08_114943_create_pv_trois_table', 1),
(18, '2022_06_09_203650_create_order_services_table', 1),
(19, '2022_06_09_203941_create_notifications_table', 1),
(20, '2022_06_09_204400_create_rapport_presentations_table', 1),
(21, '2014_10_12_000000_create_users_table', 2),
(22, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(23, '2022_10_27_111027_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `id_offer` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `Num` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `caution` float NOT NULL,
  `estimation` float NOT NULL,
  `objet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `Num`, `caution`, `estimation`, `objet`, `objet_ar`, `path_file`) VALUES
(34, '16/2252/2002', 55, 24445, 'Premier Objet', 'أول مشروع', 'none'),
(35, '20', 1600, 1500, 'DEUXIEME OBJET', 'DEUXIEME OBJET', 'none'),
(36, '74/MF/INV/2022', 7000, 7500, 'blabla', 'blabla', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `order_services`
--

CREATE TABLE `order_services` (
  `id` bigint UNSIGNED NOT NULL,
  `id_offer` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pargs`
--

CREATE TABLE `pargs` (
  `id` bigint UNSIGNED NOT NULL,
  `Numero` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pargs`
--

INSERT INTO `pargs` (`id`, `Numero`, `objet`) VALUES
(1, '900.10', 'AMÉLIORATION DE LA GOUVERNANCE ET INSTITUTIONNALISATION DU CADRE CONTRACTUEL'),
(2, '901.10', 'GÉNÉRALISATION DU PRÉSCOLAIRE'),
(3, '901.21', 'CONSTRUCTIONS SCOLAIRES'),
(4, '901.22', 'EXTENSION DES ÉTABLISSEMENTS SCOLAIRES'),
(5, '901.30', 'DÉVELOPPEMENT D\'UN SYSTÈME D\'APPUI SOCIAL ÉQUITABLE ET EFFICIENT '),
(6, '901.40', 'GARANTIR LE DROIT DE SCOLARISATION DES ENFANTS EN SITUATION DE HANDICAP OU À BESOINS SPÉCIFIQUES'),
(7, '901.50', 'SCOLARISATION DE RATTRAPAGE ET AMÉLIORATION DE L’EFFICACITÉ DE L’ÉDUCATION NON FORMELLE'),
(8, '901.61', 'RÉHABILITATION ET AMÉNAGEMENT DES ÉTABLISSEMENTS D’ÉDUCATION ET DE FORMATION'),
(9, '902.21', 'CONSTRUCTIONS SCOLAIRES'),
(10, '902.22', 'EXTENSION DES ÉTABLISSEMENTS SCOLAIRES'),
(11, '902.30', 'DÉVELOPPEMENT D\'UN SYSTÈME D\'APPUI SOCIAL ÉQUITABLE ET EFFICIENT '),
(12, '902.60', 'RÉHABILITATION INTÉGRÉE DES ÉTABLISSEMENTS D\'ÉDUCATION ET DE FORMATION'),
(13, '912.41', 'SPORT SCOLAIRE '),
(14, '912.51', 'CENTRE DES EXAMENS'),
(15, '912.61', 'CENTRES D’ORIENTATION '),
(16, '912.71', 'PROGRAMME GÉNIE');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_deuxes`
--

CREATE TABLE `pv_deuxes` (
  `id` bigint UNSIGNED NOT NULL,
  `num_offer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pv_one` int NOT NULL,
  `id_avis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_concurrent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mantant_dactes_apres_verification` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Taux` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `observe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pv_deuxes`
--

INSERT INTO `pv_deuxes` (`id`, `num_offer`, `id_pv_one`, `id_avis`, `id_concurrent`, `Mantant_dactes_apres_verification`, `Taux`, `observe`, `created_at`, `updated_at`) VALUES
(37, '35', 26, '43', '1140', '5000', '233.33', 'Ok', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pv_trois`
--

CREATE TABLE `pv_trois` (
  `id` bigint UNSIGNED NOT NULL,
  `num_offer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_avis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gagnant` int NOT NULL,
  `id_pv_deux` int NOT NULL,
  `Nom_gerant` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualiter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Num_cnss` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital_social` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `RIB` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banque` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pv_trois`
--

INSERT INTO `pv_trois` (`id`, `num_offer`, `id_avis`, `id_gagnant`, `id_pv_deux`, `Nom_gerant`, `qualiter`, `Num_cnss`, `capital_social`, `adresse`, `registre`, `RIB`, `banque`, `created_at`, `updated_at`) VALUES
(8, '35', '43', 1140, 37, 'Boudouft', 'gerant', '45k78m', '5260000', 'maroc', '02sdq5f', '000170011102', 'bmce', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rapport_presentations`
--

CREATE TABLE `rapport_presentations` (
  `id` bigint UNSIGNED NOT NULL,
  `id_offer` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reglements`
--

CREATE TABLE `reglements` (
  `id` varchar(60) NOT NULL,
  `off_name` varchar(60) NOT NULL,
  `num_avis` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reglements`
--

INSERT INTO `reglements` (`id`, `off_name`, `num_avis`) VALUES
('34', 'not_important', '14/ll/2022'),
('35', 'not_important', '8555'),
('36', 'not_important', '27/INV/2022');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4mEn6WykoVvGlxYxKKXaesbbN8njAT3HIIbKYUmP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidlhvcElNVGM1VmZ0dVd2SGtSTHlVTGN1cWFJTlRMd21sVHlOanNPUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1667309264),
('L5v6cqTNCU02kotg0up8P5dWXjeKGfLs92Jw8bYq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3ljdTIyRzlRRnRiNnFwa0prcEJEQjZueFlKMm9NTURBV0I3TWJRZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1666781571),
('lyuUHxdmGMEfkABWBkN15unRuGvXXhRDzHxvGRe7', 54, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMFB5TmpxWjlxNDhINElRYVJJS3NXSWZVOTJlcExoQVdiUnZCQVloRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVhbXMvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU0O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHB5a25IZEQyQ1dsQVZIalpCQkNPQk9IbFhzNC81bmtJSWZpN0h5NVZSWHlvMi9acHNkaGNpIjt9', 1666280004),
('pWWFBMiGefXUCMISahPlleJo7Pl5onkNoR2PyitY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMW9yYW5uTnU3cGpmVXp5eGtPcnhPTjduWEhRc21TOUNPU1FUUndObyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1667152443);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Ahmed', 'aaahmedg@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, '2022-11-07 11:02:03', '2022-11-07 11:02:03'),
(5, 'kaoutar', 'Kaoutar@gmail.com', NULL, '$2y$10$35L73Ftp80uB/3cuv8ZYhu42UwnVDBRBA3Z1z7HRXfHGMrE28nqGq', 'user', NULL, NULL, NULL),
(6, 'tester', 'ester@gmail.com', NULL, '$2y$10$MUQAz816OGN9KV0xwiUWo.qOQWMSLEnjRP6HVnAJHtdjdMY.zfLyC', 'admin', NULL, NULL, NULL),
(7, 'tester1', 'tester@gmail.com', NULL, '$2y$10$EgBjOp2XhEBzgcP2YvaW0.sz2jlymcZMYXYw5wrmUTBwFU0jGlQUG', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concurrents`
--
ALTER TABLE `concurrents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convocations`
--
ALTER TABLE `convocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decisions`
--
ALTER TABLE `decisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etat_engagements`
--
ALTER TABLE `etat_engagements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_pvs`
--
ALTER TABLE `first_pvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jounal_matins`
--
ALTER TABLE `jounal_matins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jounal_saharas`
--
ALTER TABLE `jounal_saharas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juries`
--
ALTER TABLE `juries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
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
  ADD KEY `notifications_id_offer_foreign` (`id_offer`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_services`
--
ALTER TABLE `order_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_services_id_offer_foreign` (`id_offer`);

--
-- Indexes for table `pargs`
--
ALTER TABLE `pargs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pv_deuxes`
--
ALTER TABLE `pv_deuxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_trois`
--
ALTER TABLE `pv_trois`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rapport_presentations`
--
ALTER TABLE `rapport_presentations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rapport_presentations_id_offer_foreign` (`id_offer`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `concurrents`
--
ALTER TABLE `concurrents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1146;

--
-- AUTO_INCREMENT for table `convocations`
--
ALTER TABLE `convocations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `decisions`
--
ALTER TABLE `decisions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `etat_engagements`
--
ALTER TABLE `etat_engagements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `first_pvs`
--
ALTER TABLE `first_pvs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jounal_matins`
--
ALTER TABLE `jounal_matins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jounal_saharas`
--
ALTER TABLE `jounal_saharas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `juries`
--
ALTER TABLE `juries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_services`
--
ALTER TABLE `order_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pargs`
--
ALTER TABLE `pargs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_deuxes`
--
ALTER TABLE `pv_deuxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pv_trois`
--
ALTER TABLE `pv_trois`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rapport_presentations`
--
ALTER TABLE `rapport_presentations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
