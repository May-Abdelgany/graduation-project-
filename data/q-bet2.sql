-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 11:01 PM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, '2022-02-02 17:57:50', '2022-02-02 17:57:50'),
(3, 3, '2022-02-02 17:58:29', '2022-02-02 17:58:29');

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
(1, 'What does HTML stand for?', ' Hyper Text Markup Language', 1, 2, 'easy', 1, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(2, 'Which element that renders links?', '<a>', 2, 2, 'medium', 1, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(3, 'Which element that renders unordered list?', '<ul>', 2, 2, 'medium', 1, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(4, 'What does CSS stand for?', 'Cascading Style Sheets', 1, 1, 'easy', 2, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(5, 'Which HTML tag is used to define an internal style sheet?', '<style>', 2, 2, 'medium', 2, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(6, 'Which property is used to change the left margin of an element?', 'margin-left', 1, 1, 'easy', 2, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(7, 'How do you declare a JavaScript variable named x?', 'var x', 3, 3, 'difficult', 3, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(8, 'Which operator is used to assign a value to a variable named x?', 'x=', 1, 1, 'easy', 3, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(9, 'To add two variables x,y and put result in z we write', 'z=x+y', 1, 1, 'easy', 3, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(10, 'x-2=5, x = ', '7', 2, 2, 'medium', 4, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(11, 'y+20=40, y=', '20', 3, 3, 'difficult', 4, '2022-02-02 18:47:06', '2022-02-02 18:47:06'),
(12, 'z+30=10, z=', '-20', 1, 1, 'easy', 4, '2022-02-02 18:47:06', '2022-02-02 18:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `complete_exams`
--

CREATE TABLE `complete_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complete_exams`
--

INSERT INTO `complete_exams` (`id`, `question_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49'),
(2, 12, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49');

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
(1, 'HTML', 'HTML, in full hypertext markup language, a formatting system for displaying material retrieved over the Internet. Each retrieval unit is known as a Web page (from World Wide Web), and such pages frequently contain hypertext links that allow related pages to be retrieved.', '2022-02-02 18:19:58', '2022-02-02 18:19:58'),
(2, 'CSS', 'Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML.CSS is a cornerstone technology of the World Wide Web.', '2022-02-02 18:21:30', '2022-02-02 18:21:30'),
(3, 'javascript', 'JavaScript is a scripting language that enables you to create dynamically updating content, control multimedia, animate images, and pretty much everything else. (Okay, not everything, but it is amazing what you can achieve with a few lines of JavaScript code.)', '2022-02-02 18:22:43', '2022-02-02 18:22:43'),
(4, 'mathematics', 'Mathematics is the science and study of quality, structure, space, and change. Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.', '2022-02-02 18:23:53', '2022-02-02 18:23:53');

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

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `exam_id`, `student_id`, `degree`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 30, NULL, NULL),
(2, 1, 2, 40, NULL, NULL),
(3, 1, 3, 50, NULL, NULL);

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
(1, 12, 'if 10x-21=29, find x value?', 'x=3', 'x=5', 'x=6', 'x=5', '2022-02-02 19:39:10', '2022-02-02 19:39:10'),
(2, 12, 'if x-2=1, find x value?', 'x=1', 'x=2', 'x=3', 'x=3', '2022-02-02 19:39:53', '2022-02-02 19:39:53'),
(101, 12, 'if 11x-2=97, find x value?', 'x=9', 'x=10', 'x=11', 'x=9', '2022-02-02 19:40:32', '2022-02-02 19:40:32');

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

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `course_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-02 18:35:28', '2022-02-02 18:35:28'),
(2, 2, 1, '2022-02-02 18:35:36', '2022-02-02 18:35:36'),
(3, 3, 1, '2022-02-02 18:35:42', '2022-02-02 18:35:42'),
(4, 3, 2, '2022-02-02 18:35:47', '2022-02-02 18:35:47'),
(5, 1, 2, '2022-02-02 18:35:52', '2022-02-02 18:35:52'),
(6, 2, 3, '2022-02-02 18:35:59', '2022-02-02 18:35:59'),
(7, 1, 3, '2022-02-02 18:36:04', '2022-02-02 18:36:04');

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

--
-- Dumping data for table `enroll_teachers`
--

INSERT INTO `enroll_teachers` (`id`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-02 18:24:35', '2022-02-02 18:24:35'),
(2, 2, 2, '2022-02-02 18:25:52', '2022-02-02 18:25:52'),
(3, 3, 3, '2022-02-02 18:25:59', '2022-02-02 18:25:59');

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
(1, 'exam1', 1234568, 2, 2, 2, 1, 4, '2022-02-02 19:41:36', '2022-02-02 19:41:36'),
(4, 'exam2', 123456, 2, 2, 2, 0, 1, '2022-02-02 19:46:01', '2022-02-02 19:46:01');

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
(1, 'Which HTML element is used to specify a footer for a document or section?', '<section>', '<footer>', '<bottom>', '<footer>', 3, 3, 'difficult', 'static', 1, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(2, 'In HTML, which attribute is used to specify that an input field must be filled out?', 'validate', 'formvalidate', 'required', 'required', 2, 2, 'medium', 'static', 1, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(3, 'Which input type defines a slider control?', 'range', 'controller', 'slider', 'range', 1, 1, 'easy', 'static', 1, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(4, 'How do you select all p elements inside a div element?', 'div.p', 'div+p', 'div p', 'div p', 1, 1, 'easy', 'static', 2, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(5, 'Which property is used to change the font of an element?', 'font-family', 'font-weight', 'font-style', 'font-family', 2, 2, 'medium', 'static', 2, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(6, 'Which CSS property controls the text size?', 'font-size', ' text-font', 'font-text', 'font-size', 2, 2, 'medium', 'static', 2, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(7, 'Inside which HTML element do we put the JavaScript?', '<scripting>', '<javascript>', '<script>', 'script', 3, 3, 'difficult', 'static', 3, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(8, 'How do you create a function in JavaScript?', 'function:fx()', 'function=fx()', 'function fx()', 'function fx()', 1, 1, 'easy', 'static', 3, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(9, 'How can you detect the client\'s browser name?', 'navigator.appName', 'client.navName', 'browser.name', 'navigator.appName', 3, 3, 'difficult', 'static', 3, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(10, 'x²-3x+2=0, x value can be 1 or y, find y ?', '1', '4', '2', '2', 2, 2, 'medium', 'static', 4, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(11, '2,4,8,x,32. find x?', '10', '16', '20', '16', 1, 1, 'easy', 'static', 4, '2022-02-02 18:52:27', '2022-02-02 18:52:27'),
(12, '2x-25=75, find x value?', '40', '45', '50', '50', 2, 2, 'medium', 'dynamic', 4, '2022-02-02 18:52:27', '2022-02-02 18:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_exams`
--

CREATE TABLE `mcq_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcq_exams`
--

INSERT INTO `mcq_exams` (`id`, `question_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49'),
(2, 10, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49'),
(3, 12, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_10_13_114220_create_courses_table', 1),
(11, '2021_10_13_1900357_create_students_table', 1),
(12, '2021_10_13_191744_create_admins_table', 1),
(13, '2021_10_13_192026_create_teachers_table', 1),
(14, '2021_10_27_205056_create_exams_table', 1),
(15, '2021_10_28_184423_create_mcqs_table', 1),
(16, '2021_10_28_185832_create_t__f_s_table', 1),
(17, '2021_10_28_190025_create_completes_table', 1),
(18, '2021_10_29_121650_create_degrees_table', 1),
(19, '2021_11_18_072808_enroll_table', 1),
(20, '2021_11_19_160441_create_enroll_teachers_table', 1),
(21, '2021_11_21_102955_create_mcq_exams_table', 1),
(22, '2021_11_21_104248_create_t_f_exams_table', 1),
(23, '2021_11_21_104415_create_complete_exams_table', 1),
(24, '2021_11_22_111807_create_dynamic_mcqs_table', 1);

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
('5dc146553264172be67a8350699c550a405373aeff97586e74e84ba90ce373a80f1aa272859a7eed', 1, 1, 'Q-BET', '[]', 0, '2022-02-02 17:45:49', '2022-02-02 17:45:49', '2023-02-02 19:45:49'),
('9a8d433a012160a95ff047ef641d7b38a0e19eebf6a7e8b756346f34d3eb45064e8bef9b69eb8728', 5, 1, 'Q-BET', '[]', 0, '2022-02-02 19:38:57', '2022-02-02 19:38:57', '2023-02-02 21:38:57');

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
(1, NULL, 'Laravel Personal Access Client', 'XY59xLiLSQgOGc0yUAk9MK1KIeLZvwg35ap78WHT', NULL, 'http://localhost', 1, 0, 0, '2022-02-02 17:45:03', '2022-02-02 17:45:03'),
(2, NULL, 'Laravel Password Grant Client', 'bYwYy1Y85GAonoiLIDahCvW6mMpK5Q1I0BK92OvF', 'users', 'http://localhost', 0, 1, 0, '2022-02-02 17:45:05', '2022-02-02 17:45:05');

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
(1, 1, '2022-02-02 17:45:05', '2022-02-02 17:45:05');

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
(1, 8, '2022-02-02 18:17:40', '2022-02-02 18:17:40'),
(2, 9, '2022-02-02 18:17:49', '2022-02-02 18:17:49'),
(3, 10, '2022-02-02 18:18:04', '2022-02-02 18:18:04');

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
(1, 5, '2022-02-02 18:16:16', '2022-02-02 18:16:16'),
(2, 6, '2022-02-02 18:16:30', '2022-02-02 18:16:30'),
(3, 7, '2022-02-02 18:16:39', '2022-02-02 18:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `t_f_exams`
--

CREATE TABLE `t_f_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_f_exams`
--

INSERT INTO `t_f_exams` (`id`, `question_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49'),
(2, 3, 1, '2022-02-02 19:47:49', '2022-02-02 19:47:49');

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
(1, 'To render ordered list we use <ol> element?', '1', '0', '1', 1, 1, 'easy', 1, '2022-02-02 18:49:38', '2022-02-02 18:49:38'),
(2, 'To render check box we use <checkbox> element?', '1', '0', '0', 2, 2, 'medium', 1, '2022-02-02 18:49:38', '2022-02-02 18:49:38'),
(3, 'An <iframe> is used to display a web page within a web page.', '1', '0', '1', 1, 1, 'easy', 1, '2022-02-02 18:49:38', '2022-02-02 18:49:38'),
(4, 'When using the padding property; are you allowed to use negative values?\n\nYesNo\n\nNext ❯\n\n\n', '1', '0', '1', 1, 1, 'easy', 2, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(5, 'The way you select an element with id \'demo\' is \'.demo\'?', '1', '0', '0', 1, 1, 'easy', 2, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(6, 'The way you select a class with name \'test\' is \'#test\'?', '1', '0', '0', 1, 1, 'easy', 2, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(7, 'Is javascript case sensitive?', '1', '0', '1', 2, 2, 'medium', 3, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(8, 'Will the following code returns true? (10 > 9)', '1', '0', '1', 2, 2, 'medium', 3, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(9, 'Is Javascript different from Java?', '1', '0', '1', 3, 3, '', 3, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(10, 'x+20=12, x=8?', '1', '0', '0', 1, 1, 'easy', 4, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(11, '3,9,x,81. x=30?', '1', '0', '0', 2, 2, 'medium', 4, '2022-02-02 18:49:39', '2022-02-02 18:49:39'),
(12, 'x+y=1, x-y=2, then x=1,y=2?', '1', '0', '0', 3, 3, '', 4, '2022-02-02 18:49:39', '2022-02-02 18:49:39');

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
(1, 'first', 'admin', 'admin1@gmail.com', NULL, '$2y$10$rit1ukxF4CKJWqErmKpMJOvwVaQCVJ8gkoQLBx2vcUV3OwhomUOwi', '', 'admin', NULL, '2022-02-02 17:45:17', '2022-02-02 18:01:51'),
(2, 'second', 'admin', 'admin2@gmail.com', NULL, '$2y$10$D24YJrJza/YhHIN/q0TEB.6EEQn6/vEPArDJeHZXOlT/ZuvWZmxve', '', 'admin', NULL, '2022-02-02 17:57:50', '2022-02-02 17:57:50'),
(3, 'third', 'admin', 'admin3@gmail.com', NULL, '$2y$10$AqFEFz3ZfKgabveLn41grOHm.FXSX2XEF1ep7KYD4vByXF4O0iZUe', '', 'admin', NULL, '2022-02-02 17:58:29', '2022-02-02 17:58:29'),
(5, 'first', 'teacher', 'teacher1@gmail.com', NULL, '$2y$10$JOo4bs4ADB9tDKfIiAICEOs2p6RuAY/XeQtEDy2RdTWeE72DU1wzO', '', 'teacher', NULL, '2022-02-02 18:16:16', '2022-02-02 18:16:16'),
(6, 'second', 'teacher', 'teacher2@gmail.com', NULL, '$2y$10$rANm7.UXSy0GNcDmJQNduuJCwC2ERTk3.3rmuyIM5VaACul7SLela', '', 'teacher', NULL, '2022-02-02 18:16:29', '2022-02-02 18:16:29'),
(7, 'third', 'teacher', 'teacher3@gmail.com', NULL, '$2y$10$lRfW2OICA5NQJLoC9Q1tw.Vz3qsYTfynbnQJUfsH/iIeW9eBxRwhG', '', 'teacher', NULL, '2022-02-02 18:16:39', '2022-02-02 18:16:39'),
(8, 'first', 'student', 'student1@gmail.com', NULL, '$2y$10$cwYGk7YsOVEPrXIlPEH.g.R0Uk5yOwwm3RCwWQQxKJJC/UDnEoYfW', '', 'student', NULL, '2022-02-02 18:17:40', '2022-02-02 18:17:40'),
(9, 'second', 'student', 'student2@gmail.com', NULL, '$2y$10$RYO.HO6qq4XuTqlEK8vxGuDReJp8sOuHJck12c6Sp6cpKY1FFb.vy', '', 'student', NULL, '2022-02-02 18:17:49', '2022-02-02 18:17:49'),
(10, 'third', 'student', 'student3@gmail.com', NULL, '$2y$10$EVyig2iFBdBHhLe5lzWmKeGQ758BpbB5gM3Hd5vWG105itnKXpnuK', '', 'student', NULL, '2022-02-02 18:18:04', '2022-02-02 18:18:04');

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
-- Indexes for table `complete_exams`
--
ALTER TABLE `complete_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complete_exams_question_id_foreign` (`question_id`),
  ADD KEY `complete_exams_exam_id_foreign` (`exam_id`);

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
-- Indexes for table `mcq_exams`
--
ALTER TABLE `mcq_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mcq_exams_question_id_foreign` (`question_id`),
  ADD KEY `mcq_exams_exam_id_foreign` (`exam_id`);

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
-- Indexes for table `t_f_exams`
--
ALTER TABLE `t_f_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_f_exams_question_id_foreign` (`question_id`),
  ADD KEY `t_f_exams_exam_id_foreign` (`exam_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `completes`
--
ALTER TABLE `completes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complete_exams`
--
ALTER TABLE `complete_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dynamic_mcqs`
--
ALTER TABLE `dynamic_mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enroll_teachers`
--
ALTER TABLE `enroll_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mcq_exams`
--
ALTER TABLE `mcq_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_f_exams`
--
ALTER TABLE `t_f_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t__f_s`
--
ALTER TABLE `t__f_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `complete_exams`
--
ALTER TABLE `complete_exams`
  ADD CONSTRAINT `complete_exams_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complete_exams_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `completes` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD CONSTRAINT `mcqs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mcq_exams`
--
ALTER TABLE `mcq_exams`
  ADD CONSTRAINT `mcq_exams_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mcq_exams_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `mcqs` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `t_f_exams`
--
ALTER TABLE `t_f_exams`
  ADD CONSTRAINT `t_f_exams_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_f_exams_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `t__f_s` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `t__f_s`
--
ALTER TABLE `t__f_s`
  ADD CONSTRAINT `t__f_s_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
