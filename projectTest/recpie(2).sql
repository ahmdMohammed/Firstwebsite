-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2024 at 08:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recpie`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Cooking Book', 'This cooking book contains delicious recipes.', 20.00);



-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `preparation_time` int(11) DEFAULT NULL,
  `cooking_time` int(11) DEFAULT NULL,
  `servings` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `description`, `preparation_time`, `cooking_time`, `servings`, `created_at`, `is_featured`) VALUES
(1, 'Spaghetti Carbonara', 'Classic Italian pasta dish made with eggs, cheese, pancetta, and black pepper.', 10, 20, 4, '2024-01-31 19:33:07', 1),
(2, 'Chicken Tikka Masala', 'Creamy and flavorful Indian dish with tender chicken pieces in a spiced tomato-based sauce.', 15, 30, 6, '2024-01-31 19:33:07', 0),
(3, 'Vegetable Stir-Fry', 'Healthy and colorful stir-fry made with an assortment of fresh vegetables and a savory sauce.', 10, 15, 4, '2024-01-31 19:33:07', 0),
(4, 'Beef Chili', 'Hearty and comforting chili made with ground beef, beans, tomatoes, and spices.', 20, 40, 8, '2024-01-31 19:33:07', 0),
(5, 'Mushroom Risotto', 'Creamy and delicious Italian rice dish cooked with mushrooms, onions, garlic, and white wine.', 25, 35, 4, '2024-01-31 19:33:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `username`, `password`) VALUES
(1, 'ahmed', '$2y$10$DwQ44mlaGo15O/3Mwfxij.Ma49vz6k6fjNVZr5ZhW9DMGSTjHpuMO'),
(2, 'mohammed', '$2y$10$DkXHqYnjYL2zLEboEvfVV.BGwCLrApQ5V.Ud.N2eaY5sPxyNAresa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

UPDATE products SET price = 25.00 WHERE id = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
