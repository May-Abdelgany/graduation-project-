-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 01:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q-bet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `completes`
--

CREATE TABLE `completes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` enum('easy','medium','difficult') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'easy',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `completes`
--

INSERT INTO `completes` (`id`, `question`, `answer`, `degree`, `time`, `status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'What does HTML stand for?', ' Hyper Text Markup Language', 2, 2, 'medium', 2, '2022-03-02 11:34:58', '2022-03-02 11:34:58'),
(2, 'What does HTML stand for?', ' Hyper Text Markup Language', 2, 2, 'medium', 2, '2022-03-02 11:34:58', '2022-03-02 11:34:58'),
(3, 'What does HTML stand for?', ' Hyper Text Markup Language', 2, 2, 'medium', 2, '2022-03-02 11:34:58', '2022-03-02 11:34:58'),
(4, 'What does HTML stand for?', ' Hyper Text Markup Language', 2, 2, 'medium', 2, '2022-03-02 11:34:58', '2022-03-02 11:34:58'),
(5, 'What does HTML stand for?', ' Hyper Text Markup Language', 2, 2, 'medium', 2, '2022-03-02 11:34:58', '2022-03-02 11:34:58'),
(6, 'What does HTML stand for?', ' Hyper Text Markup Language', 2, 2, 'medium', 2, '2022-03-02 11:34:58', '2022-03-02 11:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mathematics1', 'Mathematics is the science and study of quality, structure, space, and change. Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.', '2022-03-02 11:31:46', '2022-03-02 11:31:46'),
(2, 'mathematics2', 'Mathematics is the science and study of quality, structure, space, and change. Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.', '2022-03-02 11:31:53', '2022-03-02 11:31:53'),
(3, 'mathematics3', 'Mathematics is the science and study of quality, structure, space, and change. Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.', '2022-03-02 11:31:57', '2022-03-02 11:31:57'),
(4, 'mathematics4', 'Mathematics is the science and study of quality, structure, space, and change. Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.', '2022-03-02 11:32:01', '2022-03-02 11:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `degree` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_mcqs`
--

CREATE TABLE `dynamic_mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamic_mcqs`
--

INSERT INTO `dynamic_mcqs` (`id`, `question_id`, `question`, `answer1`, `answer2`, `answer3`, `correct_answer`, `created_at`, `updated_at`) VALUES
(2, 1, 'if 11x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:05', '2022-03-02 11:36:05'),
(3, 1, 'if x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:26', '2022-03-02 11:36:26'),
(4, 3, 'if x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:31', '2022-03-02 11:36:31'),
(5, 5, 'if x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:36', '2022-03-02 11:36:36'),
(6, 7, 'if x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:41', '2022-03-02 11:36:41'),
(7, 3, 'if 11x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:49', '2022-03-02 11:36:49'),
(8, 5, 'if 11x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:53', '2022-03-02 11:36:53'),
(9, 7, 'if 11x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-03-02 11:36:57', '2022-03-02 11:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enroll_teachers`
--

CREATE TABLE `enroll_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `number_of_question_tf` int(11) NOT NULL,
  `number_of_question_complete` int(11) NOT NULL,
  `number_of_question_static_mcq` int(11) NOT NULL,
  `number_of_question_dynamic_mcq` int(11) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `code`, `number_of_question_tf`, `number_of_question_complete`, `number_of_question_static_mcq`, `number_of_question_dynamic_mcq`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'exam1', 123456, 2, 2, 2, 1, 1, '2022-03-02 11:38:03', '2022-03-02 11:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `smcq_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dmcq_id` bigint(20) UNSIGNED DEFAULT NULL,
  `t_f_id` bigint(20) UNSIGNED DEFAULT NULL,
  `complete_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `smcq_id`, `dmcq_id`, `t_f_id`, `complete_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 2, NULL, 1, '2022-03-02 12:46:58', '2022-03-02 12:46:58'),
(2, NULL, NULL, 5, NULL, 1, '2022-03-02 12:46:58', '2022-03-02 12:46:58'),
(3, NULL, NULL, NULL, 2, 1, '2022-03-02 12:46:59', '2022-03-02 12:46:59'),
(4, NULL, NULL, NULL, 3, 1, '2022-03-02 12:46:59', '2022-03-02 12:46:59'),
(5, 4, NULL, NULL, NULL, 1, '2022-03-02 12:46:59', '2022-03-02 12:46:59'),
(6, 6, NULL, NULL, NULL, 1, '2022-03-02 12:46:59', '2022-03-02 12:46:59'),
(7, NULL, 5, NULL, NULL, 1, '2022-03-02 12:46:59', '2022-03-02 12:46:59');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` enum('easy','medium','difficult') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'easy',
  `display` enum('static','dynamic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `question`, `answer1`, `answer2`, `answer3`, `correct_answer`, `degree`, `time`, `status`, `display`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 3, 3, 'difficult', 'dynamic', 2, '2022-03-02 11:34:40', '2022-03-02 11:34:40'),
(2, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 2, 2, 'medium', 'static', 3, '2022-03-02 11:34:40', '2022-03-02 11:34:40'),
(3, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 1, 1, 'easy', 'dynamic', 2, '2022-03-02 11:34:40', '2022-03-02 11:34:40'),
(4, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 1, 1, 'easy', 'static', 3, '2022-03-02 11:34:40', '2022-03-02 11:34:40'),
(5, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 2, 2, 'medium', 'dynamic', 2, '2022-03-02 11:34:40', '2022-03-02 11:34:40'),
(6, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 2, 2, 'medium', 'static', 3, '2022-03-02 11:34:40', '2022-03-02 11:34:40'),
(7, 'What does HTML stand for?', ' Hyper Text Markup Language', ' Home Tool Markup Language', ' Hyperlinks and Text Markup Language', ' Hyper Text Markup Language', 3, 3, 'difficult', 'dynamic', 2, '2022-03-02 11:34:40', '2022-03-02 11:34:40');

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
(21, '2021_11_21_102955_create_mcq_exams_table', 1),
(22, '2021_11_21_104248_create_t_f_exams_table', 1),
(23, '2021_11_21_104415_create_complete_exams_table', 1),
(51, '2022_03_02_122906_create__exam__questions_table', 2),
(160, '2014_10_12_000000_create_users_table', 3),
(161, '2014_10_12_100000_create_password_resets_table', 3),
(162, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(163, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(164, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(165, '2016_06_01_000004_create_oauth_clients_table', 3),
(166, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(167, '2019_08_19_000000_create_failed_jobs_table', 3),
(168, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(169, '2021_10_13_114220_create_courses_table', 3),
(170, '2021_10_13_1900357_create_students_table', 3),
(171, '2021_10_13_191744_create_admins_table', 3),
(172, '2021_10_13_192026_create_teachers_table', 3),
(173, '2021_10_27_205056_create_exams_table', 3),
(174, '2021_10_28_184423_create_mcqs_table', 3),
(175, '2021_10_28_185832_create_t__f_s_table', 3),
(176, '2021_10_28_190025_create_completes_table', 3),
(177, '2021_10_29_121650_create_degrees_table', 3),
(178, '2021_11_18_072808_enroll_table', 3),
(179, '2021_11_19_160441_create_enroll_teachers_table', 3),
(180, '2021_11_22_111807_create_dynamic_mcqs_table', 3),
(181, '2022_03_02_124259_create_exam_questions_table', 3),
(182, '2022_03_02_135649_create_exam_questions_table', 4),
(183, '2022_03_02_135820_create_exam_questions_table', 5),
(184, '2022_03_02_141455_create_exam_questions_table', 6),
(185, '2022_03_02_141652_create_exam_questions_table', 7),
(186, '2022_03_02_143612_create_exam_questions_table', 8),
(187, '2022_03_02_144011_create_exam_questions_table', 9),
(188, '2022_03_02_144322_create_exam_questions_table', 10),
(189, '2022_03_02_144634_create_exam_questions_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('36b6e54b10b783491e98191d95789fded376794291b7cddf4c99bca1648d79955bd6b3c0c3531af6', 3, 1, 'Q-BET', '[]', 0, '2022-03-02 11:32:34', '2022-03-02 11:32:34', '2023-03-02 13:32:34'),
('6f27742422550beeb67c8397c875a8f78d789a5559d47dec6fcda505cc940265cfdfb6c747825e0b', 2, 1, 'Q-BET', '[]', 0, '2022-03-02 13:29:42', '2022-03-02 13:29:42', '2023-03-02 15:29:42'),
('9233556831f53d1410d9cbf35bbedc8e5b3a8f3f684f698c566b65686ce66acf6d4b5a322eafa742', 1, 1, 'Q-BET', '[]', 0, '2022-03-02 11:30:27', '2022-03-02 11:30:27', '2023-03-02 13:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'PJRAlf2GOODHcbwFJEMPyAXeiNpVhAfJNoCsK7sT', NULL, 'http://localhost', 1, 0, 0, '2022-03-02 11:30:24', '2022-03-02 11:30:24'),
(2, NULL, 'Laravel Password Grant Client', 'OjordPLJE7SvO3GcVwwrNqDSu2IMYXBXGz5MWSXp', 'users', 'http://localhost', 0, 1, 0, '2022-03-02 11:30:25', '2022-03-02 11:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-02 11:30:24', '2022-03-02 11:30:24');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-03-02 11:31:12', '2022-03-02 11:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2022-03-02 11:31:23', '2022-03-02 11:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `t__f_s`
--

CREATE TABLE `t__f_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` enum('easy','medium','difficult') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'easy',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t__f_s`
--

INSERT INTO `t__f_s` (`id`, `question`, `answer1`, `answer2`, `correct_answer`, `degree`, `time`, `status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'The Big Apple is a nickname given to Washington D.C in 1971.', '1', '0', '0', 1, 1, 'easy', 2, '2022-03-02 11:34:16', '2022-03-02 11:34:16'),
(2, 'The Big Apple is a nickname given to Washington D.C in 1971.', '1', '0', '0', 1, 1, 'easy', 2, '2022-03-02 11:34:16', '2022-03-02 11:34:16'),
(3, 'The Big Apple is a nickname given to Washington D.C in 1971.', '1', '0', '0', 1, 1, 'easy', 2, '2022-03-02 11:34:16', '2022-03-02 11:34:16'),
(4, 'The Big Apple is a nickname given to Washington D.C in 1971.', '1', '0', '0', 1, 1, 'easy', 2, '2022-03-02 11:34:16', '2022-03-02 11:34:16'),
(5, 'The Big Apple is a nickname given to Washington D.C in 1971.', '1', '0', '0', 1, 1, 'easy', 2, '2022-03-02 11:34:16', '2022-03-02 11:34:16'),
(6, 'The Big Apple is a nickname given to Washington D.C in 1971.', '1', '0', '0', 1, 1, 'easy', 2, '2022-03-02 11:34:16', '2022-03-02 11:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `changed_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `changed_password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'first', 'admin', 'admin1@gmail.com', NULL, '$2y$10$wy5mZZXON1jqfODkmghnSu8aM68Y9E04TfqSlP1ChLYJQMhbl2qvi', '', 'admin', NULL, '2022-03-02 11:30:03', '2022-03-02 11:30:03'),
(2, 'first', 'student', 'student1@gmail.com', NULL, '$2y$10$KQX8X4KRpQ5tgfbXrJxxM.y8fMWgJMaRskrlmMQmFykei3W66QY9u', '', 'student', NULL, '2022-03-02 11:31:11', '2022-03-02 11:31:11'),
(3, 'first', 'teacher', 'teacher1@gmail.com', NULL, '$2y$10$cK7HhtRcH/RY/6/u7fRdk.Qxz3CwOas/D4gHFF2wHtp1eFCI3zedq', '', 'teacher', NULL, '2022-03-02 11:31:22', '2022-03-02 11:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_id_unique` (`user_id`);

--
-- Indexes for table `completes`
--
ALTER TABLE `completes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `completes_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `degrees_student_id_exam_id_unique` (`student_id`,`exam_id`),
  ADD KEY `degrees_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `dynamic_mcqs`
--
ALTER TABLE `dynamic_mcqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dynamic_mcqs_question_id_foreign` (`question_id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrolls_student_id_course_id_unique` (`student_id`,`course_id`),
  ADD KEY `enrolls_course_id_foreign` (`course_id`);

--
-- Indexes for table `enroll_teachers`
--
ALTER TABLE `enroll_teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enroll_teachers_teacher_id_course_id_unique` (`teacher_id`,`course_id`),
  ADD KEY `enroll_teachers_course_id_foreign` (`course_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_code_unique` (`code`),
  ADD KEY `exams_course_id_foreign` (`course_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_questions_smcq_id_foreign` (`smcq_id`),
  ADD KEY `exam_questions_dmcq_id_foreign` (`dmcq_id`),
  ADD KEY `exam_questions_t_f_id_foreign` (`t_f_id`),
  ADD KEY `exam_questions_complete_id_foreign` (`complete_id`),
  ADD KEY `exam_questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mcqs_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_user_id_unique` (`user_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_user_id_unique` (`user_id`);

--
-- Indexes for table `t__f_s`
--
ALTER TABLE `t__f_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t__f_s_course_id_foreign` (`course_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `completes`
--
ALTER TABLE `completes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dynamic_mcqs`
--
ALTER TABLE `dynamic_mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enroll_teachers`
--
ALTER TABLE `enroll_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t__f_s`
--
ALTER TABLE `t__f_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `completes`
--
ALTER TABLE `completes`
  ADD CONSTRAINT `completes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `degrees_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `degrees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dynamic_mcqs`
--
ALTER TABLE `dynamic_mcqs`
  ADD CONSTRAINT `dynamic_mcqs_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `mcqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrolls_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enroll_teachers`
--
ALTER TABLE `enroll_teachers`
  ADD CONSTRAINT `enroll_teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enroll_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_complete_id_foreign` FOREIGN KEY (`complete_id`) REFERENCES `completes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `exam_questions_dmcq_id_foreign` FOREIGN KEY (`dmcq_id`) REFERENCES `dynamic_mcqs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `exam_questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `exam_questions_smcq_id_foreign` FOREIGN KEY (`smcq_id`) REFERENCES `mcqs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `exam_questions_t_f_id_foreign` FOREIGN KEY (`t_f_id`) REFERENCES `t__f_s` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD CONSTRAINT `mcqs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `t__f_s`
--
ALTER TABLE `t__f_s`
  ADD CONSTRAINT `t__f_s_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
