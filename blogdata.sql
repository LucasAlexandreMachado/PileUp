-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:28 AM
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
-- Database: `blogdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Favorite` tinyint(1) DEFAULT NULL,
  `Status` enum('assistindo','plan to watch','completed','rewatching','paused','dropped') DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `EpisodeProgress` int(11) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `Name`, `Favorite`, `Status`, `Score`, `EpisodeProgress`, `Notes`, `userId`) VALUES
(50, 'livro com pedro (id1)', 0, 'assistindo', 1, 1, '1', 1),
(51, 'livro com lucas ( id2)', 0, 'plan to watch', 1, 1, '00000', 2),
(53, 'livro com pedro 2', 0, 'assistindo', 1, 1, '1', 1),
(54, 'robertinho', 0, 'assistindo', 1, 1, '1', 3),
(57, 'livro do paulo', 0, 'assistindo', 6, 400, 'mais ou menos, faltou algo', 5),
(58, 'Harry Potter', 0, 'assistindo', 10, 5, 'Livro muito bom, recomendo.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `title`, `content`) VALUES
(26, 'asdsdsadsad', 'sadsdadsada'),
(27, 'asdsasa', 'dasdsada'),
(28, '123221', '32312');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Pedrim do pneu', '202cb962ac59075b964b07152d234b70', 'pedro@gmail.com'),
(2, 'luquinhas', '202cb962ac59075b964b07152d234b70', 'lucas@gmail.com'),
(3, 'robertinho', '202cb962ac59075b964b07152d234b70', 'robertinho@gmail.com'),
(4, 'Arthur Bauer', 'ffc151a8f93aa9e57aab8eef62bd0985', 'abcg0z@gmail.com'),
(5, 'paula', '202cb962ac59075b964b07152d234b70', 'paulo@gmail.com'),
(6, 'Usuário Teste', '202cb962ac59075b964b07152d234b70', 'usuarioteste@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
