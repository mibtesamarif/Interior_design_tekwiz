-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 09:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interiordesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_type` varchar(100) DEFAULT NULL,
  `activity_data` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_type`, `activity_data`, `created_at`) VALUES
(2, 4, 'xyz', 'abc', '2024-09-20 03:16:51'),
(3, 2, 'xyz', 'abc', '2024-09-20 06:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_log`
--

CREATE TABLE `admin_activity_log` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `des`, `image`) VALUES
(2, 'daniyal', 'abc', 'istockphoto-1439425791-612x612.jpg'),
(7, 'ali', 'abc', 'ecommerce.png'),
(9, 'watches', 'abc', 'ecommerce.png');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `consultation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `designs_id` int(11) DEFAULT NULL,
  `consultation_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultationsinterior`
--

CREATE TABLE `consultationsinterior` (
  `consultation_id` int(11) NOT NULL,
  `designer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `consultation_date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultation_slots`
--

CREATE TABLE `consultation_slots` (
  `slot_id` int(11) NOT NULL,
  `designer_id` int(11) DEFAULT NULL,
  `available_from` datetime DEFAULT NULL,
  `available_until` datetime DEFAULT NULL,
  `is_booked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `designer_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `design_name` varchar(255) DEFAULT NULL,
  `design_data` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `user_id`, `design_name`, `design_data`, `created_at`) VALUES
(10, 2, 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaabbbbbbbbbbbbbbbbb', '2024-09-19 12:57:05'),
(15, 4, 'xyz', 'abc', '2024-09-20 03:16:33'),
(16, 2, 'bed', 'abc vnn', '2024-09-20 05:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `inspiration_gallery`
--

CREATE TABLE `inspiration_gallery` (
  `inspiration_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `notification_type` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `read_status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `pr_barcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `des`, `image`, `price`, `qty`, `c_id`, `pr_barcode`) VALUES
(4, 'fashion bags', 'good', 'gardenworld.png', 5000, 12, 2, '39455595'),
(6, 'infinix', 'good', 'gardenworld.png', 8000, 12, 2, '46688988'),
(8, 'fashion bags', 'abc', 'ecommerce.png', 2000, 16, 2, '46688988');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `generate_pr_barcode` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
    IF NEW.pr_barcode IS NULL OR NEW.pr_barcode = '' THEN
        SET NEW.pr_barcode = CONCAT('barcode-', UUID());
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `consultation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `designer_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'designer'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `uDetailId` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `contactNumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role_id`) VALUES
(2, 'ali', 'ali@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-09-18 12:16:27', 3),
(3, 'ali', 'ali12@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-09-18 13:40:03', 3),
(4, 'ali', 'ali23@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-09-19 06:23:06', 3),
(6, 'usman', 'usman@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-09-19 09:22:49', 3),
(7, 'daniyal', 'daniyal@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-09-19 09:24:31', 2),
(8, 'admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-09-19 12:40:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `users_activity_log_ibfk_1` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`consultation_id`),
  ADD KEY `designs_id` (`designs_id`),
  ADD KEY `users_id` (`user_id`);

--
-- Indexes for table `consultationsinterior`
--
ALTER TABLE `consultationsinterior`
  ADD PRIMARY KEY (`consultation_id`);

--
-- Indexes for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `designer_id` (`designer_id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`designer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inspiration_gallery`
--
ALTER TABLE `inspiration_gallery`
  ADD PRIMARY KEY (`inspiration_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`c_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `consultaataion_fk` (`consultation_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `designers_fk` (`designer_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`uDetailId`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultationsinterior`
--
ALTER TABLE `consultationsinterior`
  MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `designer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inspiration_gallery`
--
ALTER TABLE `inspiration_gallery`
  MODIFY `inspiration_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `uDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD CONSTRAINT `users_activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  ADD CONSTRAINT `consultation_slots_ibfk_1` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`designer_id`);

--
-- Constraints for table `designs`
--
ALTER TABLE `designs`
  ADD CONSTRAINT `designs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `designers_fk` FOREIGN KEY (`designer_id`) REFERENCES `designs` (`id`);

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
