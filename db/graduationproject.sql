-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 04:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduationproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_data`
--

CREATE TABLE `application_data` (
  `app_id` tinyint(4) NOT NULL,
  `app_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Uni_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Faculty_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Program_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Faculty-Uni_logo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Program_logo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Faculty_Dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_grad_vice_dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_affairs_vice_dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Program_coordinator` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_data`
--

INSERT INTO `application_data` (`app_id`, `app_name`, `Uni_name`, `Faculty_name`, `Program_name`, `Faculty-Uni_logo`, `Program_logo`, `Faculty_Dean`, `Post_grad_vice_dean`, `st_affairs_vice_dean`, `Program_coordinator`) VALUES
(1, 'النظام الإلكتروني لإدارة العهد', 'جامعة حلوان', 'كلية التجارة وإدارة الأعمال', 'BIS برنامج نظم معلومات الأعمال', 'Facultylogo.jpg', 'program.png', 'أ.د. حسام الرفاعي', 'أ.د. هند عودة', 'أ.د. أماني فاخر', 'أ.م.د. رشا فرغلى');

-- --------------------------------------------------------

--
-- Table structure for table `p42_assets`
--

CREATE TABLE `p42_assets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'تعمل',
  `type` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `member_id` int(20) NOT NULL DEFAULT 1,
  `price` int(10) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `added_by` tinyint(10) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_assets`
--

INSERT INTO `p42_assets` (`id`, `name`, `state`, `type`, `category_id`, `descr`, `member_id`, `price`, `image`, `notes`, `added_by`, `added_date`) VALUES
(1, 'طباعة', 'كهنه', 'مستدامة', 1, 'طباعة ليزر', 2, 3000, '', '', 1, '2023-06-23 03:58:37'),
(2, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة ليزر', 3, 3000, '', '', 1, '2023-06-23 03:58:36'),
(3, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة ليزر', 4, 3000, '', '', 1, '2023-06-23 03:58:36'),
(4, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة ليزر', 1, 3000, '', '', 1, '2023-06-23 03:58:36'),
(7, 'hp laptop', 'تعمل', 'مستدامة', 2, 'core i5', 4, 15000, '', '', 1, '2023-06-23 04:25:05'),
(8, 'hp laptop', 'تعمل', 'مستدامة', 2, 'core i5', 1, 15000, '', '', 1, '2023-06-23 04:25:05'),
(9, 'hp laptop', 'تعمل', 'مستدامة', 2, 'core i5', 1, 15000, '', '', 1, '2023-06-23 04:25:05'),
(10, 'hp laptop', 'تعمل', 'مستدامة', 2, 'core i5', 1, 15000, '', '', 1, '2023-06-23 04:25:05'),
(11, 'hp laptop', 'تعمل', 'مستدامة', 2, 'core i5', 2, 15000, '', '', 1, '2023-06-23 04:25:05'),
(12, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة حبر', 1, 5000, '', '', 1, '2023-06-23 04:34:49'),
(13, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة حبر', 1, 5000, '', '', 1, '2023-06-23 04:36:47'),
(14, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة حبر', 1, 5000, '', '', 1, '2023-06-23 04:36:47'),
(15, 'طباعة', 'تعمل', 'مستدامة', 1, 'طباعة حبر', 1, 5000, '', '', 1, '2023-06-23 04:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `p42_assign_assets`
--

CREATE TABLE `p42_assign_assets` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `added_by` tinyint(10) NOT NULL,
  `added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_assign_assets`
--

INSERT INTO `p42_assign_assets` (`id`, `asset_id`, `asset_name`, `member_id`, `notes`, `added_by`, `added_time`) VALUES
(1, 1, 'طباعة', 2, '', 1, '2023-06-23 04:16:34'),
(2, 2, 'طباعة', 3, '', 1, '2023-06-23 04:16:43'),
(3, 3, 'طباعة', 4, '', 1, '2023-06-23 04:16:55'),
(4, 7, 'hp laptop', 3, '', 1, '2023-06-23 04:29:36'),
(5, 11, 'hp laptop', 2, '', 1, '2023-06-23 04:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `p42_category`
--

CREATE TABLE `p42_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_category`
--

INSERT INTO `p42_category` (`id`, `category`) VALUES
(1, 'طباعة'),
(2, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `p42_delete`
--

CREATE TABLE `p42_delete` (
  `id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL,
  `delete_by` tinyint(4) NOT NULL,
  `delete_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_delete`
--

INSERT INTO `p42_delete` (`id`, `asset_id`, `delete_by`, `delete_date`) VALUES
(1, 5, 1, '2023-06-23 04:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `p42_end`
--

CREATE TABLE `p42_end` (
  `id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `added_by` tinyint(10) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_end`
--

INSERT INTO `p42_end` (`id`, `asset_id`, `reason`, `added_by`, `added_date`) VALUES
(1, 1, 'لا تعمل', 1, '2023-06-23 04:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `p42_members`
--

CREATE TABLE `p42_members` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `national_id` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_members`
--

INSERT INTO `p42_members` (`id`, `name`, `phone`, `type`, `national_id`) VALUES
(1, 'الادارة', NULL, 'الادارة', ''),
(2, 'mark', '01001001001', 'دكتور', '30015010022020'),
(3, 'youssef', '01001120202', 'موظف', '30006100102202'),
(4, 'omar', '01001120303', 'عامل', '30051003033033');

-- --------------------------------------------------------

--
-- Table structure for table `p42_transfer`
--

CREATE TABLE `p42_transfer` (
  `id` int(11) NOT NULL,
  `member1` int(14) NOT NULL,
  `asset` int(11) NOT NULL,
  `member2` int(14) DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `added_by` tinyint(10) NOT NULL,
  `added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p42_transfer`
--

INSERT INTO `p42_transfer` (`id`, `member1`, `asset`, `member2`, `reason`, `added_by`, `added_time`) VALUES
(1, 3, 7, 2, 'نقل عهدة', 1, '2023-06-23 04:30:10'),
(2, 2, 7, 4, 'نقل', 1, '2023-06-23 04:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(4) NOT NULL,
  `user_ar_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type_id` tinyint(4) NOT NULL,
  `added_date` datetime NOT NULL,
  `added_by` tinyint(4) NOT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `is_enable` varchar(3) NOT NULL DEFAULT 'Yes' COMMENT 'yes or no',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_ar_name`, `username`, `password`, `user_type_id`, `added_date`, `added_by`, `Notes`, `is_enable`, `image`) VALUES
(1, 'محمد عبد السلام', 'mohamed', '123', 1, '2023-03-09 15:28:23', 1, NULL, 'Yes', '1.jpg'),
(2, 'مارك', 'mark', '333', 1, '2023-06-23 03:54:34', 1, NULL, 'Yes', 'img4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users_types`
--

CREATE TABLE `users_types` (
  `user_type_id` tinyint(4) NOT NULL,
  `user_type_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_types`
--

INSERT INTO `users_types` (`user_type_id`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_data`
--
ALTER TABLE `application_data`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `p42_assets`
--
ALTER TABLE `p42_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoryid` (`category_id`),
  ADD KEY `fk_member_id` (`member_id`),
  ADD KEY `fk_add_admin_id` (`added_by`);

--
-- Indexes for table `p42_assign_assets`
--
ALTER TABLE `p42_assign_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_id` (`asset_id`),
  ADD KEY `fk_member_id_asset` (`member_id`),
  ADD KEY `fk_assign_admin_id` (`added_by`);

--
-- Indexes for table `p42_category`
--
ALTER TABLE `p42_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p42_delete`
--
ALTER TABLE `p42_delete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_del_admin_id` (`delete_by`);

--
-- Indexes for table `p42_end`
--
ALTER TABLE `p42_end`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_assets_id` (`asset_id`),
  ADD KEY `fk_end_admin_id` (`added_by`);

--
-- Indexes for table `p42_members`
--
ALTER TABLE `p42_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `national_id` (`national_id`);

--
-- Indexes for table `p42_transfer`
--
ALTER TABLE `p42_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transfer_asset` (`asset`),
  ADD KEY `member1` (`member1`),
  ADD KEY `member2` (`member2`),
  ADD KEY `fk_admin_id` (`added_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_type` (`user_type_id`);

--
-- Indexes for table `users_types`
--
ALTER TABLE `users_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_data`
--
ALTER TABLE `application_data`
  MODIFY `app_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p42_assets`
--
ALTER TABLE `p42_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p42_assign_assets`
--
ALTER TABLE `p42_assign_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p42_category`
--
ALTER TABLE `p42_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p42_delete`
--
ALTER TABLE `p42_delete`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p42_end`
--
ALTER TABLE `p42_end`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p42_members`
--
ALTER TABLE `p42_members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p42_transfer`
--
ALTER TABLE `p42_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_types`
--
ALTER TABLE `users_types`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p42_assets`
--
ALTER TABLE `p42_assets`
  ADD CONSTRAINT `fk_add_admin_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_categoryid` FOREIGN KEY (`category_id`) REFERENCES `p42_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `p42_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p42_assign_assets`
--
ALTER TABLE `p42_assign_assets`
  ADD CONSTRAINT `fk_assign_admin_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_id_asset` FOREIGN KEY (`member_id`) REFERENCES `p42_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p42_assign_assets_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `p42_assets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p42_delete`
--
ALTER TABLE `p42_delete`
  ADD CONSTRAINT `fk_del_admin_id` FOREIGN KEY (`delete_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p42_end`
--
ALTER TABLE `p42_end`
  ADD CONSTRAINT `fk_assets_id` FOREIGN KEY (`asset_id`) REFERENCES `p42_assets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_end_admin_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p42_transfer`
--
ALTER TABLE `p42_transfer`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asset_id` FOREIGN KEY (`asset`) REFERENCES `p42_assets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member1` FOREIGN KEY (`member1`) REFERENCES `p42_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member2` FOREIGN KEY (`member2`) REFERENCES `p42_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `users_types` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
