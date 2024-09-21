-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 02:25 PM
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
-- Database: `decore_vista`
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
(3, 2, 'xyz', 'abc', '2024-09-20 06:25:06'),
(4, 2, 'daniyal', 'abc', '2024-09-21 03:23:22'),
(5, 3, 'daniyal', 'abc', '2024-09-21 08:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `intro_1` mediumtext NOT NULL,
  `intro_2` mediumtext NOT NULL,
  `intro_3` mediumtext NOT NULL,
  `main_1` mediumtext NOT NULL,
  `conclusion` mediumtext NOT NULL,
  `meta_des` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `date` varchar(50) NOT NULL,
  `blogs_page_img` varchar(255) NOT NULL,
  `blog_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `heading`, `intro_1`, `intro_2`, `intro_3`, `main_1`, `conclusion`, `meta_des`, `meta_keywords`, `date`, `blogs_page_img`, `blog_img`) VALUES
(23, 'The 5 Secrets to Pulling Off Simple, Minimal Design', 'Creating a minimalist design may seem easy, but achieving the perfect balance requires skill and careful thought.', 'While it’s tempting to add more elements, true simplicity focuses on delivering function without distraction.', 'In today\'s fast-paced world, minimalism offers a breath of fresh air, allowing designs to speak for themselves with clarity and elegance. Here are the five secrets to pulling off a simple, minimal design that looks effortless yet captivating.', '<h3>1. <strong>Prioritize Content Over Decoration</strong></h3><p>The heart of minimalist design is content. The primary goal is to strip away unnecessary elements and let the content shine. When designing, always ask yourself: \"What is the main message, and how can I make it clearer?\" Avoid overwhelming your users with flashy elements or overly complex layouts that can distract from the content.</p><p><br></p><h3>2. <strong>Focus on Functionality First</strong></h3><p>Before aesthetics, prioritize functionality. A minimal design doesn’t mean cutting down on features; it means ensuring that every feature serves a purpose. The functionality should be intuitive and not buried under visual complexity. Start with wireframes and ensure the navigation and user experience are seamless before adding any visual styling.</p><p><br></p><h3>3. <strong>Use a Limited Color Palette</strong></h3><p>Colors can make or break a minimal design. A limited color palette reinforces simplicity and avoids the chaos that comes with too many competing shades. Opt for neutral tones with one or two accent colors. This not only maintains a clean look but also highlights essential elements and calls to action.</p><p><br></p><h3>4. <strong>Leverage Whitespace Effectively</strong></h3><p>Whitespace is one of the most powerful tools in minimal design. It allows elements to breathe and helps users focus on the most critical parts of the design. Proper use of whitespace can also give a design a premium feel, creating a sense of balance and harmony.</p><p><br></p><h3>5. <strong>Choose Simple, Elegant Typography</strong></h3><p>Typography plays a crucial role in minimal design. A clean, well-chosen font can elevate your design by adding a touch of sophistication without overcrowding the layout. Choose fonts that are easy to read, and avoid decorative typefaces. Ensure that the typography aligns with your brand while maintaining the clarity and simplicity of your design.</p><p><br></p><h3><strong>Conclusion</strong></h3><p><br></p>', 'Minimalism is about more than just reducing clutter. It’s about distilling design down to its essentials and creating an intuitive, engaging user experience. By focusing on content, functionality, color, whitespace, and typography, you can craft a simple design that is both elegant and effective.\r\n\r\nEmbrace simplicity, and let your designs speak volumes with minimal effort.', 'dummy', 'dummy', 'FEB 16, 2024', 'Make Better User Interface 1.jpg', 'Make Better User Interface.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_status`
--

CREATE TABLE `blogs_status` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `b_status` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs_status`
--

INSERT INTO `blogs_status` (`id`, `b_id`, `post_date`, `b_status`) VALUES
(11, 23, '2024-09-21 11:55:22', 'post');

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
(2, 'Wall Art', 'Wall art is a type of decoration ranging from canvases to framed prints to other artistic embellishments that hang on a wall. The wall art that best suits your home depends on your room\'s theme, color', 'art.jpg'),
(10, 'Furniture', 'Furniture consists of large objects such as tables, chairs, or beds that are used in a room for sitting or lying on or for putting things on or in. Each piece of furniture in their home suited the sty', 'furniture.jpeg'),
(11, 'Lighting', 'Lighting includes the use of both artificial light sources like lamps and light fixtures, as well as natural illumination by capturing daylight. Daylighting (using windows, skylights, or light shelves', 'lighting.jpeg'),
(12, 'Decor', 'Definitions of decor. noun. decoration consisting of the layout and furnishings of a livable interior. synonyms: interior decoration. decoration, ornament, ornamentation.', 'decor.jpeg'),
(13, 'Rugs and Carpets', 'Carpets are usually made of wool or synthetic fibres, and they\'re used to cover the floor. On the other hand, rugs tend to be smaller than carpets and woven from wool or cotton fibres—but nowadays, it', 'rugs.jpeg'),
(14, 'Curtains and Blinds', 'With blinds, you will be able to manage and regulate the amount of light that is coming into your room. However, even if your blinds are fully closed, you will still see some light entering, whereas c', 'blinds.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `designs_id` int(11) DEFAULT NULL,
  `consultation_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'scheduled',
  `consultation_id` int(11) NOT NULL
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
(15, 4, 'xyz', 'abc', '2024-09-20 03:16:33'),
(17, 2, 'daniyal', 'heloo', '2024-09-21 02:42:42'),
(18, 3, 'bedroom', 'Abedroom design featuring minimalistic furniture ', '2024-09-21 08:14:03'),
(19, 3, 'kitchen', 'a kitchen is a sweet', '2024-09-21 08:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `design_category`
--

CREATE TABLE `design_category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `design_category`
--

INSERT INTO `design_category` (`c_id`, `category_name`) VALUES
(1, 'Living Room');

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
(9, 'DSH CRAFTING', 'DSH Wall Art Material : Metal,Color : Multi. Metal Wall Decor For Hangings on wall decoration perfect for Living room,restaurant hotel wall. This Metal Mural Can Be Place in your dining room or on your living room to add a unique touch to your home decor.', '1.webp', 2284, 300, 2, '001'),
(10, 'Azem Sofa Set  Premium Sofa Set', 'Introducing the perfect addition to any living room, our sofa set from our online furniture store. With its sleek design and high-quality construction, this sofa set is sure to impress.  The sofa set design in Pakistan is a perfect blend of style and comf', '2.webp', 30000, 60, 10, '002'),
(11, 'Fancy Curtain FCP', 'We take the greatest of care to make sure your gorgeous made-to-measure curtains look and fit exactly as they should. And because we want you to be completely satisfied with your window dressings, Our promise to you is that you’re investing in a quality p', '3.jpeg', 15000, 110, 14, '003'),
(13, 'Artisan Collection Timeless Traditions Multicolor Rug', 'Each Rug is a expression of unique craftsmanship. Traditional rug artistry is displayed in the Artisan Collection in vibrant colours with an antique touch. Artisan rugs combine Old World charm with trendsetting interior design because they are made with a', '4.webp', 20000, 30, 13, '004'),
(14, 'Toro', 'nspired by the shape of traditional East Asian lanterns, Toro adds a uniquely decorative allure to any modern guest room or living space. In addition to its crisp double-glass shade and durable steel wall bracket, Toro features a lever-style terminal bloc', '05.jpeg', 2000, 500, 11, '005'),
(15, 'Decorative Globe Ornament', 'Globe ornaments: living room, wine cabinet, porch, office desktop home decoration, creative globe technology sense. Light luxury globe clock ornaments, marble horoscope series ornaments, the stars revolve, revolving the universe. Single-dimensional and va', '06.webp', 4000, 1000, 12, '006');

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
  `id` int(11) NOT NULL,
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
-- Table structure for table `saveddesigns`
--

CREATE TABLE `saveddesigns` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `design_name` varchar(255) DEFAULT NULL,
  `design_description` mediumtext DEFAULT NULL,
  `design_card_image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `design_detailed_images` mediumtext NOT NULL,
  `status` varchar(65) NOT NULL DEFAULT 'unpost',
  `c_id` int(11) NOT NULL
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
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_status`
--
ALTER TABLE `blogs_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designs_id` (`designs_id`),
  ADD KEY `users_id` (`user_id`),
  ADD KEY `consultation_id` (`consultation_id`);

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
-- Indexes for table `design_category`
--
ALTER TABLE `design_category`
  ADD PRIMARY KEY (`c_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultaataion_fk` (`consultation_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `designers_fk` (`designer_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saveddesigns`
--
ALTER TABLE `saveddesigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogs_status`
--
ALTER TABLE `blogs_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `designer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `design_category`
--
ALTER TABLE `design_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saveddesigns`
--
ALTER TABLE `saveddesigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `blogs_status`
--
ALTER TABLE `blogs_status`
  ADD CONSTRAINT `blogs_status_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultations_ibfk_2` FOREIGN KEY (`consultation_id`) REFERENCES `designers` (`designer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `designs`
--
ALTER TABLE `designs`
  ADD CONSTRAINT `designs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`designer_id`) REFERENCES `designs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saveddesigns`
--
ALTER TABLE `saveddesigns`
  ADD CONSTRAINT `saveddesigns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saveddesigns_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `design_category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
