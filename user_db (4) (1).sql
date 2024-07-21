-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 09:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `writer` varchar(30) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `dtls` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 19, 'pravin rajak', 'rupesh@exp.com', '12', 'dcdfcfv'),
(2, 19, 'pravin rajak', 'rupesh@exp.com', '10', 'dd'),
(3, 19, 'pravin rajak', 'rupesh@exp.com', '9718527156', 'qcdwcwv');

-- --------------------------------------------------------

--
-- Table structure for table `message2`
--

CREATE TABLE `message2` (
  `id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message2`
--

INSERT INTO `message2` (`id`, `message`, `user_id`) VALUES
(2, 'k kj k', 15),
(3, 'lknlknlnlk', 19),
(4, 'jjdgf', 0),
(5, 'jkbkljkl', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(15, 19, 'pravin rajak', '12345678955', 'exp1@exp.com', 'cash on delivery', 'flat no. 09, kandivali, mumbai, india - 400101', ', your name (2) ', 16, '22-May-2023', 'completed'),
(16, 19, 'rupesh', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 7, hvjh, hgfh, bnvjh - 9878', ', your name (1) ', 8, '22-May-2023', 'pending'),
(17, 15, 'rupesh', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 09, sv vidyalya street, mumbai, india - 400102', ', your name (1) ', 8, '22-May-2023', 'pending'),
(18, 15, 'rupesh', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 99, sv vidyalya street, mumbai, india - 400103', ', example (1) ', 8, '22-May-2023', 'pending'),
(19, 15, 'rupesh', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 09, sv vidyalya street, mumbai, india - 400064', ', manga7 (1) ', 2, '22-May-2023', 'pending'),
(20, 15, 'rupesh', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 1, sv vidyalya street, mumbai, india - 400101', ', children of time (1) ', 9, '22-May-2023', 'pending'),
(21, 19, 'pravin rajak', '12345678955', 'rupesh@exp.com', 'credit card', 'flat no. 12, sv vidyalya street, hgfh, india - 123', ', children of time (1) ', 9, '31-May-2023', 'pending'),
(22, 19, 'pravin rajak', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 2, sv vidyalya street, hgfh, India - 123', ', Unkown space (1) ', 2, '31-May-2023', 'pending'),
(23, 19, 'pravin rajak', '12345678955', 'rupesh@exp.com', 'cash on delivery', 'flat no. 12, sv vidyalya street, hgfh, India - 123', ', the space (1) ', 11, '31-May-2023', 'pending'),
(24, 15, 'pravin rajak', '12345678955', 'rupesh@exp.com', 'credit card', 'flat no. 65, sv vidyalya street, hgfh, India - 123', ', Unkown space (2) ', 4, '03-Jun-2023', 'pending'),
(25, 15, 'pravin rajak', '12345678955', 'rupesh@exp.com', 'credit card', 'flat no. 6, sv vidyalya street, hgfh, India - 123', ', Unkown space (1) ', 2, '03-Jun-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `writer` varchar(30) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `dtls` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `writer`, `category`, `type`, `dtls`) VALUES
(32, 'your name', 8, 'yor-name(second).png', 'Makoto Shinkai', 'manga', 'second-hand', 'Two teenagers share a profound, magical connection upon discovering they are swapping bodies. Things manage to become even more complicated when the boy and girl decide to meet in person.'),
(34, 'Unkown space', 2, 'sci-fi1.jpg', 'Jimmy li sujun', 'sci-fi', 'first-hand', 'we are not alon in the universe ,a time travel book'),
(35, 'A man called ove', 5, 'fiction.jpg', 'Fredrik Backman', 'fiction', 'first-hand', 'A Man Called Ove is a novel by Swedish writer Fredrik Backman published in Swedish by Forum in 2012. The novel was published in English in 2013 and reached the New York Times Best Seller list 18 month'),
(37, 'Chainsnaw', 9, 'manga4.jpg', 'Tatsuki Fujimoto', 'manga', 'first-hand', 'Chainsaw Man is a Japanese manga series written and illustrated by Tatsuki Fujimoto. Its first arc was serialized in Shueisha\'s shōnen manga magazine Weekly Shōnen Jump from December 2018 to December '),
(38, 'I am watching you', 8, 'thrill5.jpg', 'Teresa driscoll', 'thriller', 'first-hand', 'An Amazon Charts bestseller. What would it take to make you intervene? When Ella Longfield overhears two attractive young men flirting with teenage girls on a train, she thinks nothing of it--until sh'),
(39, 'The silent patient', 6, 'trill4.jpg', 'Alex michaelidis', 'thriller', 'first-hand', 'The Silent Patient is a 2019 psychological thriller novel written by British–Cypriot author Alex Michaelides. The successful debut novel was published by Celadon Books, a division of Macmillan Publish'),
(40, 'example', 8, 'sci-fi3.jpg', 'Tatsuki Fujimoto', 'manga', 'second-hand', 'JKDHKJwsdjkgbol'),
(41, 'manga7', 2, 'chainsaw(second)manga.png', 'Tatsuki Fujimoto', 'manga', 'second-hand', 'wdsssssswdwdewdeqmne fkjwbfklwbrklfjw\r\newfknwrlkgb;lrk\r\neglkrwg;k;;nflwk\r\nwklnlwkr'),
(42, 'the space', 11, 'sci-fi2.png', 'Tatsuki Fujimoto', 'sci-fi', 'first-hand', 'gdytduytdututfutfytfytdyutrfuyfuiyf'),
(43, 'children of time', 9, 'sci-fi3.jpeg', 'Makoto Shinkai', 'sci-fi', 'second-hand', 'mvjcjhcjgcjgcjg'),
(44, 'Chainsnaw', 7, 'manga3.jpg', 'Tatsuki Fujimoto', 'sci-fi', 'second-hand', 'mhjj'),
(45, 'rupesh', 1, 'WIN_20230508_12_40_06_Pro.jpg', 'saa', 'aa', 'first-hand', 'aa'),
(46, 'your name', 8, 'romance.jpg', 'Tatsuki Fujimoto', 'romance', 'first-hand', 'romantic book all time');

-- --------------------------------------------------------

--
-- Table structure for table `secpro`
--

CREATE TABLE `secpro` (
  `id` int(11) NOT NULL,
  `video` varchar(1000) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secpro`
--

INSERT INTO `secpro` (`id`, `video`, `email`, `message`, `image`, `user_id`) VALUES
(64, 'WIN_20230508_12_39_21_Pro.mp4', 'rupesh@exp.com', 'lllllllllll', 'WIN_20230508_12_40_06_Pro.jpg', 15),
(65, 'WIN_20230508_12_39_21_Pro.mp4', 'ankit@exp.com', 'lkhvusrstsytsy', 'WIN_20230508_12_40_06_Pro.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(15, 'rupesh', 'rupesh@exp.com', '3d1b1a1c9de4c10a5b63845e4342f73b', 'user'),
(16, 'ankit', 'ankit@exp.com', '9e160436f029090db028499ec502c733', 'admin'),
(18, 'rupesh', 'rupesh@ex.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(19, 'example', 'exp1@exp.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user'),
(20, 'sonu', 'sonu@ecp.com', '25f9e794323b453885f5181f1b624d0b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message2`
--
ALTER TABLE `message2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secpro`
--
ALTER TABLE `secpro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message2`
--
ALTER TABLE `message2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `secpro`
--
ALTER TABLE `secpro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
