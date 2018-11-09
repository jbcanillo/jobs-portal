-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 05:24 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jobs_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_public` tinyint(1) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `picture`, `firstname`, `middlename`, `lastname`, `nickname`, `gender`, `birthdate`, `contact_number`, `resume_filepath`, `resume_public`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/applicant_pictures/jRLDFUIIR8o8ge1CmSUeYN6jDTbD1MAjwqGlHNyP.png', 'Julius Brian', 'Brian', 'Canillo', 'JB', 'Male', '1989-04-14', '09566027354', 'public/resumes/pqQkJv5jrvgvP7i7DZr5gpAVGVU25HrlTdr6seH3.jpeg', 0, 'Active', '2018-09-28 05:09:56', '2018-11-09 02:11:50'),
(2, 5, 'public/applicant_pictures/XKCbSfY4ohg3J5gTl4WHZQlm2OesKlEMQRygSVhW.jpeg', 'Angie', 'Ceniza', 'Canillo', NULL, 'Female', '1989-04-16', '09566027354', 'resumes/c3B7czoSrNGDiTFt3AtCWkpoXQBFzs8vzzNbsizl.jpeg', 1, 'Active', '2018-09-29 18:09:20', '2018-11-05 18:11:59'),
(3, 20, NULL, 'Angie', 'Ceniza', 'Canillo', 'Ange', '', '0000-00-00', '9566027354', NULL, NULL, 'Inactive', '2018-11-09 02:11:43', '2018-11-09 02:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_awards`
--

CREATE TABLE IF NOT EXISTS `applicant_awards` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_awarded` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_awards`
--

INSERT INTO `applicant_awards` (`id`, `applicant_id`, `title`, `date_awarded`, `description`, `status`, `created_at`, `updated_at`) VALUES
(282, 2, 'dad', '2018-09-04', 'adada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(283, 2, 'dad', '2018-09-20', 'dada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(286, 1, 'afsf', '2018-09-04', 'sfsfs', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52'),
(287, 1, 'fsfs', '2018-09-27', 'fsfs', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_certifications`
--

CREATE TABLE IF NOT EXISTS `applicant_certifications` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_certifications`
--

INSERT INTO `applicant_certifications` (`id`, `applicant_id`, `title`, `start`, `end`, `description`, `status`, `created_at`, `updated_at`) VALUES
(315, 2, 'dada', '2018-09-01', '2018-09-30', 'dadada', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(316, 2, 'dasd', '2018-09-12', '2018-09-05', 'adada', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(319, 1, 'zcczcasda', '2018-09-05', '2018-09-22', 'dsadadaadsa', 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51'),
(320, 1, 'dsada', '2018-09-03', '2018-09-26', 'ssssss', 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_desired_jobs`
--

CREATE TABLE IF NOT EXISTS `applicant_desired_jobs` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relocation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_desired_jobs`
--

INSERT INTO `applicant_desired_jobs` (`id`, `applicant_id`, `title`, `type`, `salary`, `relocation`, `status`, `created_at`, `updated_at`) VALUES
(3, 19, 'x1', 'full-time', 'daily', 'yes', 'active', '2018-09-26 07:09:23', '2018-09-26 07:59:23'),
(4, 19, 'x2', 'contractual', 'weekly', 'no', 'inactive', '2018-09-26 07:09:23', '2018-09-26 07:59:24'),
(22, 22, 'x1', 'Full-time', 'Daily', 'no', 'inactive', '2018-09-27 08:09:42', '2018-09-27 08:42:42'),
(23, 22, 'x2', 'Part-time', 'Weekly', 'yes', 'active', '2018-09-27 08:09:42', '2018-09-27 08:42:42'),
(347, 2, 'CEO', 'Full-time', 'Daily', 'No', 'Active', '2018-11-05 18:11:59', '2018-11-05 18:41:59'),
(348, 2, 'Businesswoman', 'Part-time', 'Monthly', 'Yes', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(349, 2, 'House Maid', 'Part-time', 'Hourly', 'No', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(353, 1, 'x1', 'Full-time', 'Daily', 'Yes', 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51'),
(354, 1, 'x2', 'Part-time', 'Weekly', 'No', 'Inactive', '2018-11-09 02:11:51', '2018-11-09 02:11:51'),
(355, 1, 'House Maid', 'Temporary', 'Daily', 'No', 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_education_background`
--

CREATE TABLE IF NOT EXISTS `applicant_education_background` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_of_study` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_education_background`
--

INSERT INTO `applicant_education_background` (`id`, `applicant_id`, `degree`, `school`, `field_of_study`, `country`, `city`, `start`, `end`, `status`, `created_at`, `updated_at`) VALUES
(3, 22, 'bachelor degree', 'STI', 'Computer Engineering', 'Philippines', 'Cebu', '2018-09-01', '2018-09-30', 'active', '2018-09-27 08:09:42', '2018-09-27 08:42:42'),
(4, 22, 'Highshoool', 'SPC', 'na', 'Philippines', 'Ormoc', '2018-07-31', '2018-08-16', 'inactive', '2018-09-27 08:09:42', '2018-09-27 08:42:42'),
(170, 2, 'Highshoool', '231', 'na', 'adad', 'ada', '2018-09-07', '2018-09-29', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(171, 2, 'adada', 'dada', 'nad', 'asd', 'adada', '2018-09-06', '2018-09-22', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(173, 1, 'Highshoool', 'SPC', 'na', 'Philippines', 'Cebu', '2018-08-07', '2018-09-21', 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_government_documents`
--

CREATE TABLE IF NOT EXISTS `applicant_government_documents` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `document_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_government_documents`
--

INSERT INTO `applicant_government_documents` (`id`, `applicant_id`, `document_type`, `document_file`, `status`, `created_at`, `updated_at`) VALUES
(242, 2, 'dada', 'public/government_documents/BWOK30ML0WxLjeaX6uSKePaSylp7kFSWauFqsvit.jpeg', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(243, 2, 'dada', 'government_documents/pePpiZpXO4fhJGj8FEKyCklekArcwM2OGbMV8fVB.jpeg', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(247, 1, 'dadad', 'government_documents/mG32ZUm4Op08icXNXyHb6V8gMuSzS1dyIGVv6sCj.jpeg', 'Active', '2018-11-09 02:11:53', '2018-11-09 02:11:53'),
(248, 1, 'sss', 'government_documents/PcCfW9e5LCPLZ8qu7ff5LhHcLXNqoOCueT7RhR0z.jpeg', 'Active', '2018-11-09 02:11:53', '2018-11-09 02:11:53'),
(249, 1, 'dsadadadada', 'government_documents/WzGBlsHHYftyN0bNxomuKgTDwjFWnrVJ6dJ8oQ0S.jpeg', 'Active', '2018-11-09 02:11:53', '2018-11-09 02:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_language_spoken`
--

CREATE TABLE IF NOT EXISTS `applicant_language_spoken` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fluency` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_language_spoken`
--

INSERT INTO `applicant_language_spoken` (`id`, `applicant_id`, `language`, `fluency`, `status`, `created_at`, `updated_at`) VALUES
(269, 2, 'adada', 2, 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(270, 2, 'ada', 3, 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(273, 1, 'fdsfds', 2, 'Active', '2018-11-09 02:11:53', '2018-11-09 02:11:53'),
(274, 1, 'fafa', 3, 'Active', '2018-11-09 02:11:53', '2018-11-09 02:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_military_service`
--

CREATE TABLE IF NOT EXISTS `applicant_military_service` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_military_service`
--

INSERT INTO `applicant_military_service` (`id`, `applicant_id`, `country`, `branch`, `rank`, `start`, `end`, `description`, `status`, `created_at`, `updated_at`) VALUES
(163, 2, 'dadssa', 'dada', 'dada', '2018-09-01', '2018-10-05', 'dsadadada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(164, 2, 'ad', 'adad', 'ada', '2018-09-04', '2018-09-25', 'dadada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(166, 1, 'da', 'dad', 'adad', '2018-09-04', '2018-09-27', 'dada', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_organizations`
--

CREATE TABLE IF NOT EXISTS `applicant_organizations` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_organizations`
--

INSERT INTO `applicant_organizations` (`id`, `applicant_id`, `title`, `start`, `end`, `description`, `status`, `created_at`, `updated_at`) VALUES
(294, 2, 'dada', '2018-09-01', '2018-09-27', 'dada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(295, 2, 'dada', '2018-08-28', '2018-09-27', 'dada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(298, 1, 'Avega Bros. Integrated Shipping Inc.', '2018-09-28', '2018-09-12', 'Avega Bros. Integrated Shipping Inc.', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52'),
(299, 1, 'daaaaaaaa', '2018-09-06', '2018-09-28', 'dad', 'Inactive', '2018-11-09 02:11:52', '2018-11-09 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_patents`
--

CREATE TABLE IF NOT EXISTS `applicant_patents` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `patent_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_published` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_patents`
--

INSERT INTO `applicant_patents` (`id`, `applicant_id`, `patent_number`, `title`, `url`, `date_published`, `description`, `status`, `created_at`, `updated_at`) VALUES
(273, 2, '232', 'dadad', 'adad', '2018-09-12', 'dada', 'Active', '2018-11-05 18:11:01', '2018-11-05 18:42:01'),
(274, 2, '232', 'dada', 'dada', '2018-09-28', 'dadada', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(277, 1, '2313', 'ada', 'dada', '2018-09-28', 'dada', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52'),
(278, 1, '4242', 'aaf', 'fafa', '2018-09-21', 'fafa', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_publications`
--

CREATE TABLE IF NOT EXISTS `applicant_publications` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_published` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_publications`
--

INSERT INTO `applicant_publications` (`id`, `applicant_id`, `title`, `url`, `date_published`, `description`, `status`, `created_at`, `updated_at`) VALUES
(144, 2, 'dada', 'dad', '2018-09-11', 'adada', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(145, 2, 'daaaaaaaaa', 'aaa', '2018-09-04', 'aaaa', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(147, 1, 'fsfs', 'fsfs', '2018-09-27', 'fsfs', 'Inactive', '2018-11-09 02:11:52', '2018-11-09 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_skills`
--

CREATE TABLE IF NOT EXISTS `applicant_skills` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_skills`
--

INSERT INTO `applicant_skills` (`id`, `applicant_id`, `skill`, `years`, `status`, `created_at`, `updated_at`) VALUES
(149, 2, 'dadadada', 2, 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(150, 2, 'daaaaaaa', 3, 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(152, 1, 'fsfs', 2342, 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_social_media`
--

CREATE TABLE IF NOT EXISTS `applicant_social_media` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_social_media`
--

INSERT INTO `applicant_social_media` (`id`, `applicant_id`, `media`, `link`, `status`, `created_at`, `updated_at`) VALUES
(315, 2, 'facebook', 'dadada', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(316, 2, 'instagram', 'dadaa', 'Inactive', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(319, 1, 'instagram', 'dsadada', 'Active', '2018-11-09 02:11:52', '2018-11-09 02:11:52'),
(320, 1, 'facebook', 'dsadada', 'Inactive', '2018-11-09 02:11:52', '2018-11-09 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_video_intro`
--

CREATE TABLE IF NOT EXISTS `applicant_video_intro` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `video_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_video_intro`
--

INSERT INTO `applicant_video_intro` (`id`, `applicant_id`, `video_file`, `status`, `created_at`, `updated_at`) VALUES
(100, 2, 'video_intro/ze8zgqpASDmG5Z8gUDSLb6VKSDfsHTybuWX3kxef.mp4', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(101, 2, 'video_intro/PxrJtKFrEX3ofrnMWNJU0gnt5Sb4kAnexfi6mjRd.mp4', 'Active', '2018-11-05 18:11:02', '2018-11-05 18:42:02'),
(104, 1, 'video_intro/ofwtlY2BMv86iAtPjtkuWhLZnXdk0OOCoxkdwMie.mp4', 'Active', '2018-11-09 02:11:53', '2018-11-09 02:11:53'),
(105, 1, 'video_intro/1Ey9rCqdYR00WLdABPLmEQq3CG2aD0zutXo5ioCy.mp4', 'Inactive', '2018-11-09 02:11:53', '2018-11-09 02:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_work_experience`
--

CREATE TABLE IF NOT EXISTS `applicant_work_experience` (
  `id` int(10) unsigned NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_work_experience`
--

INSERT INTO `applicant_work_experience` (`id`, `applicant_id`, `job_title`, `company`, `country`, `city`, `start`, `end`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 22, 'test2', 'Avega Bros. Integrated Shipping Inc.', 'Philippines', 'Cebu', '2018-09-01', '2018-09-30', 'gagagagaga', 'Active', '2018-09-27 08:09:42', '2018-09-27 08:42:42'),
(8, 22, 'test1', 'ddddddddddd', 'fdfdf', 'dfdfds', '2018-09-11', '2018-09-14', 'sdfsfsfsfs', 'Inactive', '2018-09-27 08:09:42', '2018-09-27 08:42:42'),
(323, 2, 'test2', 'Avega Bros. Integrated Shipping Inc.', 'Philippines', 'Cebu', '2018-09-01', '2018-09-08', 'gagagagaga', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(324, 2, 'test1', 'dada', 'dad', 'dasda', '2018-09-11', '2018-09-27', 'gagagagaga', 'Active', '2018-11-05 18:11:00', '2018-11-05 18:42:00'),
(327, 1, 'test1', 'Avega Bros. Integrated Shipping Inc.', 'Philippines', 'Cebu', '2018-09-17', '2020-09-28', 'gagagagaga', 'Active', '2018-11-09 02:11:51', '2018-11-09 02:11:51'),
(328, 1, 'test2', 'sdsada', 'dsada', 'dada', '2018-09-11', '2018-09-21', 'saaaaaaa', 'Inactive', '2018-11-09 02:11:51', '2018-11-09 02:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE IF NOT EXISTS `customer_reviews` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` int(11) DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `how` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`, `picture`, `firstname`, `middlename`, `lastname`, `nickname`, `company_name`, `company_size`, `company_address`, `about_me`, `contact_person`, `contact_number`, `how`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, 'Angie', 'Ceniza', 'Canillo', 'Angie', 'dsf', NULL, NULL, NULL, NULL, '1242131123', NULL, 'Inactive', '2018-08-30 02:08:37', '2018-08-30 02:44:37'),
(2, 6, 'public/employer_pictures/p9pFJvF60vGhu347tvuewo8ktCLVGa6Rf6j8bVUU.jpeg', 'Julius Brian', 'Diza', 'Canillo', 'JB', 'Jubric Industries', 9000, 'Ormoc City', 'Techno Industrial Company', 'Angie Canillo', '9566027354', 'Facebook', 'Active', '2018-09-03 02:09:49', '2018-11-09 03:11:58'),
(4, 7, NULL, 'Julius Brian', 'Brian', 'Canillo', 'Xxxxxxxxx', 'Avega Bros. Integrated Shipping Inc.', 1200, NULL, NULL, 'Julius Brian Canillo', '9566027354', 'Out Of Nowhere', 'Active', '2018-09-25 06:09:17', '2018-09-25 06:56:17'),
(5, 9, NULL, 'Julius Brian', 'Diaz', 'Canillo', 'JB2', 'ccc', NULL, NULL, NULL, NULL, '9566027354', NULL, 'Inactive', '2018-09-13 23:09:08', '2018-09-13 23:37:08'),
(6, 10, 'public/employer_pictures/coVEPwSGOTQf9FYL2L0Hh4o1FwH5eSREqfOOSbCi.jpeg', 'Julius Brian', 'Diaz', 'Canillo', 'JB4', 'Dddddd', 22222222, '111111', '4444444', '33333333', '9566027354', '3131555555555', 'Active', '2018-09-13 23:09:51', '2018-11-09 03:11:11'),
(7, 11, NULL, 'Julius Brian', 'Diaz', 'Canillo', 'JB4', 'dfdfd', NULL, NULL, NULL, NULL, '9566027354', NULL, 'Inactive', '2018-09-14 00:09:48', '2018-09-14 00:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_04_040316_CreateTables', 1),
(2, '2018_11_07_081605_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL,
  `employer_id` int(11) NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_of_experience` int(11) DEFAULT NULL,
  `education_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_salary` double DEFAULT NULL,
  `maximum_salary` double DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_applicants` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `employer_id`, `company`, `job_title`, `location`, `years_of_experience`, `education_level`, `age`, `gender`, `type`, `minimum_salary`, `maximum_salary`, `language`, `license`, `number_of_applicants`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'Avega Bros. Integrated Shipping Inc.', 'Test', 'Fsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3 Gang Outlet Surface Type', 'Active', '2018-09-24 02:09:36', '2018-09-25 07:09:08'),
(3, 4, 'Avega Bros. Integrated Shipping Inc.', 'Software Engineer', 'Tayud Consolacion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHP Programmer', 'Active', '2018-09-25 07:09:19', '2018-09-25 07:09:16'),
(4, 4, 'Avega Bros. Integrated Shipping Inc.', 'TEST JOB 2', 'Tayud Consolacion', 3, 'College', 21, 'Any', NULL, 13000, 16000, 'English', NULL, NULL, 'THIS IS A TEST JOB222', 'Inactive', '2018-11-04 21:11:04', '2018-11-04 21:11:48'),
(5, 4, 'Avega Bros. Integrated Shipping Inc.', 'TEST JOB 3', 'Cebu', 5, 'College', 30, 'Female', 'Full-time', 25000, 30000, 'Tagalog', NULL, NULL, 'TEST JOB 3TEST JOB 3TEST JOB 3TEST JOB 3TEST JOB 3', 'Active', '2018-11-04 23:11:04', '2018-11-04 23:11:35'),
(6, 4, 'Avega Bros. Integrated Shipping Inc.', 'House Maid', 'Metro Manila', 5, 'Elementary', 14, 'Female', 'Contractual', 3000, 4000, 'Philippines', 'None', 3, 'Aaaaaaasfdfas\r\nFdas\r\nFsa\r\nDfa\r\nFa\r\nF\r\nAf\r\nAfafdafaf\r\nXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'Closed', '2018-11-05 00:11:26', '2018-11-08 23:11:42'),
(7, 2, 'Jubric Industries', 'KIller', 'United States', 25, 'College', 27, 'Male', 'Contractual', 1000000, 2000000, 'All', 'License To Kill', 10, 'Kill The President Donad Trump', 'Processing', '2018-11-09 06:11:51', '2018-11-09 06:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `request_assignments`
--

CREATE TABLE IF NOT EXISTS `request_assignments` (
  `id` int(10) unsigned NOT NULL,
  `request_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_assignments`
--

INSERT INTO `request_assignments` (`id`, `request_id`, `applicant_id`, `employer_id`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 4, 'sssssssssssssssssssssrffff', 'Active', '2018-11-05 00:11:11', '2018-11-05 00:48:11'),
(35, 6, 2, 4, 'dadadad', 'For Interview', '2018-11-07 03:11:56', '2018-11-07 03:56:56'),
(36, 6, 1, 4, 'czcz', 'Hired', '2018-11-07 03:11:56', '2018-11-07 03:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1H0ExyZf15J01nGSp7RhPV3NJqQC9ans4brg9laW', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ1ZtcHgzYW1ZTGhpcUFTY2dWa2U5cEJ6Wk8xSDhOdVNEblhqZ0NPOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llci9yZXF1ZXN0cy9zaG93LzciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1541780285);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `last_login`, `remember_token`, `activation_code`, `provider`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 'jubric', 'jubric@gmail.com', '$2y$10$ecUpdkMkYaofOSI2KbZbmuGUPFdx1MMr8WpTvHaCfcL.DhM5c6o2K', 'Administrator', 'Active', '2018-11-09 05:11:16', '0SauuUb8E056Sjg3dQSrE3OrMsBWK8ZqN33ueCHMPmkn40N6aYzo1Vy2iH4S', NULL, '', '', '2018-08-22 02:08:47', '2018-11-09 05:50:16'),
(5, 'aceniza', 'angieceniza9@gmail.com', '$2y$10$Yn/vnOyrtnoSIk3y4QS/i.fZNWPKD4HIGQxVhUd85gI.HU/tyJE.m', 'Employer', 'Active', '2018-10-15 02:10:29', 'dj6AqFpWmsY7VIre1AmZFBat7xJLOCCJ5NyVp3VtCC5FNFMSZg6qj6WFfbHc', '9c6d6289614b57c3986abdb4353d74a1', '', '', '2018-08-30 02:08:37', '2018-10-15 02:14:29'),
(6, 'jbcanillo', 'jbcanillo@gmail.com', '$2y$10$.qBhuQ.vY5lsSeIDgSuitOpupgwiYYJegG3Oi5EmWZl1ekBi8a/C.', 'Employer', 'Active', '2018-11-09 05:11:06', 'p4VCnKUgYD3ZE1LLPsqeagYGJEd4MHxf6Tl8Hs6R3OrgT7XWPzOvUii1al5F', NULL, '', '', '2018-09-05 04:09:32', '2018-11-09 05:54:06'),
(7, 'xxxxxxxxx', 'demo@getcraftable.com', '$2y$10$UYRjKMbH5hP5QpTfi.1NsO4zo06QWYOjyE.QpjqBAypYz5oJ6Et/6', 'Employer', 'Inactive', NULL, NULL, NULL, '', '', '2018-09-07 08:09:39', '2018-09-07 08:06:39'),
(8, 'jubric2', 'jbcanillo2@gmail.com', '$2y$10$NDACupdZ4J1oG8iM9KOpb.CIH5IW10cJl.Rlpnrt4z6fs0G5xGLQO', 'Applicant', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2018-09-13 23:09:41', '2018-09-13 23:33:41'),
(9, 'jubric3', 'jubric2@gmail.com', '$2y$10$u09vYZU5fKd3bwshy.KKWubsDAdaeAL76neubNKZmf6qycvjOgW.q', 'Employer', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2018-09-13 23:09:08', '2018-09-13 23:37:08'),
(10, 'jubric4', 'Jubric44@gmail.com', '$2y$10$yxtyhWjs.POkd6260/73FOFN.tmBXOkoYIOvS5Mka72nBu1J2XtUG', 'Employer', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2018-09-13 23:09:50', '2018-11-09 03:22:11'),
(11, 'jubric5', 'jubric5@gmail.com', '$2y$10$g.oKGnytg0XPD6e/6KWfKuum2z3U1hAbk/obgwEHtVMVinx2McTHe', 'Employer', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2018-09-14 00:09:48', '2018-09-14 00:01:48'),
(12, 'jubric6', 'jubric6@gmail.com', '$2y$10$NHjA0b.aU5in8h527Y1fDuK.p9Jf4qSk0hgP8O3TSblLtoAW05vb2', 'Applicant', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2018-09-14 00:09:24', '2018-09-14 00:32:24'),
(13, 'jubric7', 'jubric7@gmail.com', '$2y$10$5BtglzwOvxqJ5s0KNC3QBO40LmqlEPw2xXBIJza/Nr6rQKJ4hkm2q', 'Applicant', 'Inactive', NULL, NULL, NULL, NULL, NULL, '2018-09-14 00:09:32', '2018-09-14 00:34:32'),
(14, 'jubric8', 'jubric8@gmail.com', '$2y$10$qRhOTDM3DaRnyK4d7e3KQOIG12sbSDw1xCto39XVMGwvdjwIG/KBe', 'Applicant', 'Inactive', NULL, NULL, '9c6c37429f05b2da2ed03fa8d7c8ef63', NULL, NULL, '2018-09-14 01:09:26', '2018-09-14 01:06:26'),
(15, 'jubric9', 'jubric9@gmail.com', '$2y$10$hLHSKmCyDWJAoJ8zsOh0EuA/Y9ZbPf2799B6bQhlXy8bbd54yQu1e', 'Applicant', 'Inactive', NULL, NULL, 'b7b4c4f07eab21eda099faed597f0559', NULL, NULL, '2018-09-14 01:09:45', '2018-09-14 01:11:45'),
(16, 'jubric99', 'jbcanillo99@gmail.com', '$2y$10$YxhuJRP16WxEkyXPr2xTqOu6CsDtI/rGw.IbxAwtjohNeN/6.YzyK', 'Administrator', 'Active', '2018-09-17 19:09:22', 'Idfx3WrsvnEzOsN1wy6GQNltSF8BHKvpItrHbW0CPK1x0rTvzvpPAAiGaubd', '40a4610e847126adf6213a3aa15162a6', NULL, NULL, '2018-09-14 01:09:11', '2018-09-17 19:47:22'),
(17, 'acanillo', 'angieceniza99@gmail.com', '$2y$10$y/lxetivxT9KTZmd0pwxkuhd7V6jVDVecRNDPjhHJqhyyLXDLfmbK', 'Applicant', 'Inactive', NULL, NULL, '6a177741aba5e97632ac1179fdd83724', NULL, NULL, '2018-09-14 06:09:21', '2018-09-14 06:16:21'),
(18, 'jbcanillo10', 'jbcanillo10@gmail.com', '$2y$10$NT0ojKOSRF1xv1uVMEnDvuOOYBLnxHqh/ronreJ7Tbx9AdWrLUbHW', 'Applicant', 'Inactive', NULL, NULL, 'a563eac434aeafe24a3e536dd23b58c5', NULL, NULL, '2018-09-14 23:09:33', '2018-09-14 23:27:33'),
(19, 'jubricx1', 'jubricx1@gmail.com', '$2y$10$KRmXk92KJABl7t866Jgv3.AaM51muYnWdCgCyqnEL923WbvFc9dm.', 'Administrator', 'Active', NULL, NULL, NULL, NULL, NULL, '2018-09-26 06:09:47', '2018-09-26 06:18:47'),
(20, 'acanillo2', 'angieceniza999@gmail.com', '$2y$10$WTuukLzRx0.n7Q1C78IbJ.AdG.q2D2m4PVlxqigq3N97qDvpWQkOm', 'Applicant', 'Inactive', NULL, NULL, 'b74ddc9ef790b19ea787da74f40d21f7', NULL, NULL, '2018-11-09 02:11:43', '2018-11-09 02:07:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_awards`
--
ALTER TABLE `applicant_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_certifications`
--
ALTER TABLE `applicant_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_desired_jobs`
--
ALTER TABLE `applicant_desired_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_education_background`
--
ALTER TABLE `applicant_education_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_government_documents`
--
ALTER TABLE `applicant_government_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_language_spoken`
--
ALTER TABLE `applicant_language_spoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_military_service`
--
ALTER TABLE `applicant_military_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_organizations`
--
ALTER TABLE `applicant_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_patents`
--
ALTER TABLE `applicant_patents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_publications`
--
ALTER TABLE `applicant_publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_social_media`
--
ALTER TABLE `applicant_social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_video_intro`
--
ALTER TABLE `applicant_video_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_work_experience`
--
ALTER TABLE `applicant_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_assignments`
--
ALTER TABLE `request_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applicant_awards`
--
ALTER TABLE `applicant_awards`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=288;
--
-- AUTO_INCREMENT for table `applicant_certifications`
--
ALTER TABLE `applicant_certifications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `applicant_desired_jobs`
--
ALTER TABLE `applicant_desired_jobs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `applicant_education_background`
--
ALTER TABLE `applicant_education_background`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `applicant_government_documents`
--
ALTER TABLE `applicant_government_documents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `applicant_language_spoken`
--
ALTER TABLE `applicant_language_spoken`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT for table `applicant_military_service`
--
ALTER TABLE `applicant_military_service`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `applicant_organizations`
--
ALTER TABLE `applicant_organizations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT for table `applicant_patents`
--
ALTER TABLE `applicant_patents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT for table `applicant_publications`
--
ALTER TABLE `applicant_publications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `applicant_social_media`
--
ALTER TABLE `applicant_social_media`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `applicant_video_intro`
--
ALTER TABLE `applicant_video_intro`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `applicant_work_experience`
--
ALTER TABLE `applicant_work_experience`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `request_assignments`
--
ALTER TABLE `request_assignments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
