-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 02:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staff_india`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_11_27_090938_service_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_des` varchar(255) NOT NULL,
  `task_file` varchar(255) NOT NULL,
  `task_deadline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `task_title`, `task_des`, `task_file`, `task_deadline`) VALUES
(10, '3. Staff Bangladesh', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(13, '1. Staff India ', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(18, '2. Staff Asia', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:- National Insurance Contributions- Pension contributions- Employ', '27/11/2024'),
(21, '1. Staff India ', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(22, '2. Staff Asia', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:- National Insurance Contributions- Pension contributions- Employ', '27/11/2024'),
(23, '3. Staff Bangladesh', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(24, '1. Staff India ', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(25, '1. Staff India ', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(26, '2. Staff Asia', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:- National Insurance Contributions- Pension contributions- Employ', '27/11/2024'),
(27, '2. Staff Asia', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:- National Insurance Contributions- Pension contributions- Employ', '27/11/2024'),
(28, '3. Staff Bangladesh', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023'),
(29, '3. Staff Bangladesh', 'We are a growing company and we are always looking for new talent. We have devised intelligent strategic methods to recruit sharp, diligent and motivated individuals who serve our own company needs as well as our clients who choose to outsource work with ', 'There is a reason why smart companies prefer to outsource work or hire contractors. Hiring employees comes with some hidden costs, as well as the salary that needs to be paid, such as:\r\n- National Insurance Contributions\r\n- Pension contributions\r\n- Employ', '27/11/2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
