-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 02:14 PM
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
-- Database: `iawd2403`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desp` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `designation`, `name`, `desp`, `image`) VALUES
(1, 'web Developer', 'Faruk Ahmed', 'Pariatur Fugiat fu', '66be2ad78ac5a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `header_logo` varchar(100) NOT NULL,
  `footer_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `header_logo`, `footer_logo`) VALUES
(1, '66c1a0129ee47.png', '66c1a1385c80e.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`) VALUES
(16, 'Shafira Cole', 'metataxav@mailinator.com', 'Beatae et quia minim', 'Cumque modi quo porr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `sub_title`, `image`, `status`) VALUES
(4, 'Iusto quos sint illo', 'Est autem voluptate', '66c06c377a2d9.png', 1),
(7, '', '', '66c08728424a4.png', 1),
(14, 'Qui non rerum quia s', 'Omnis pariatur Repr', '66c184ba8dea2.png', 1),
(17, 'Corrupti expedita d', 'Voluptas nulla irure', '66c1c498b9d98.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `review` varchar(400) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `profession`, `email`, `review`, `status`) VALUES
(10, 'Helen Perry', 'wimuh@mailinator.com', 'fipugibe@mailinator.com', 'Consectetur id aspe', 0),
(11, 'Gannon Graves', 'samajiros@mailinator.com', 'vuzu@mailinator.com', 'Amet non quo accusa', 1),
(12, 'Teagan Mccormick', 'bete@mailinator.com', 'varylideqo@mailinator.com', 'Id vitae doloribus r', 1),
(13, 'Nerea Newman', 'pajihenyjo@mailinator.com', 'mykily@mailinator.com', 'Unde adipisicing ali', 1),
(14, 'Micah Goff', 'gusuwuxyw@mailinator.com', 'merog@mailinator.com', 'Voluptate eius incid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `Desp` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `Desp`, `status`) VALUES
(9, 'Exercitation praesen', 'Voluptas consequatur', 1),
(10, 'Sint minim iusto ni', 'Necessitatibus ea au', 1),
(11, 'Ullam et est perfer', 'Saepe rem aliquip fu', 1),
(12, 'Aperiam molestiae vo', 'Cupidatat vel labore', 1),
(13, 'Cupiditate officiis ', 'Accusantium dolore a', 1),
(14, 'Aliquid fugit ex sa', 'Enim cumque exceptur', 1),
(15, 'Voluptas alias susci', 'Cupidatat aut distin', 1),
(16, 'Itaque excepturi aut', 'Voluptatem Iste ali', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `percentage` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `tittle`, `percentage`, `status`) VALUES
(5, 'ddd', 22, 1),
(6, 'html', 100, 1),
(7, 'php', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
(3, 'Erin Mcintosh', 'tysizub@mailinator.com', '$2y$10$E.x/BQuBbpSFcB2FVMcUPeJMajgtlfn2ULR9G2/qH2vC4MPgSn99i', 1),
(4, 'Rajah Chandler', 'sekyrig@mailinator.com', '$2y$10$VthoUMxOKkm46Q8fVQjKx.KRoo5LCLtdIcgT5UpWR0gO21POKYiKi', 0),
(5, 'Matthew Lamb', 'lema@mailinator.com', '$2y$10$Hg.7BRtsfWOLb61QmNTLZO5nzZ12X7OumO3R7SLOOncan7qHJKAQK', 0),
(6, 'Fay Hancock', 'riny@mailinator.com', '$2y$10$TXqQDDoFS6/KzINkLJ2AO.KKU1RAyA0BvrEq67WXeI27BanaL61IW', 0),
(7, 'Josephine Hyde', 'gejic@mailinator.com', '$2y$10$eEMxE/hsaBHYQ4IJaN/ohOubmOH5FnH06X8PTvVHvHbAKmv0j9A1W', 0),
(8, 'ahmed', 'faruk123@gmail.com', '$2y$10$hb9jORltg.sOHYox4VHamOwgKh8T.3hvn3n9o2obz.Xcl3QdZoXPK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
