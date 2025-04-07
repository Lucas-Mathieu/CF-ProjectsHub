-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 02:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp(),
  `like_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_user`, `title`, `text`, `date_created`, `date_modified`, `like_count`) VALUES
(1, 1, 'Test de post de projet', 'ZVNVUBUEUJSBVDDDJbdsvkhbvhkdsBVKHJBDshvbhjdsbvhdsbvhbdshvbshvbdschbvhsdbvhkbdsvdbcsvbkusfdbvhkbfhjvbhfdbvhjqsd bvhjbqfhvbqfdhvbqhkdfvhkqdfvhkbdcvhkbdkqhbvkhf\r\n                                                                      \r\n                                                                      fbqdbqfdbqfdbqfdbqdfnbfqdbqfdbqdfnbqdfnfqdnbqdfnqfdndqnqfdnqdnqnqfdnq', '2025-04-07 14:34:02', '2025-04-07 14:34:02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`id`, `id_user`, `id_post`, `parent_id`, `text`, `like_count`, `date`) VALUES
(1, 1, 1, NULL, '1er commentaire', 4, '2025-04-07 14:35:52'),
(2, 1, 1, 1, '1ere réponse', 4, '2025-04-07 14:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`id`, `id_user`, `id_post`, `date`) VALUES
(2, 1, 1, '2025-04-07 14:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `id_tag`, `id_post`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(2, 'Projets en cours'),
(1, 'Projets terminés');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `is_verified`, `is_admin`) VALUES
(1, 'Lucas', 'lucas.mathieu@edu.esiee-it.fr', '$2y$10$gtwWTvlA8ydb8Qq01J/QtOFERuTbjOD3s6J6vi7LB6rU1AGNBWDBK', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_FK` (`id_user`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_FK1` (`id_user`) USING BTREE,
  ADD KEY `comment_FK2` (`id_post`) USING BTREE,
  ADD KEY `comment_FK3` (`parent_id`) USING BTREE;

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`id_user`,`id_post`),
  ADD KEY `like_FK2` (`id_post`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_FK1` (`id_tag`),
  ADD KEY `tag_FK2` (`id_post`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_tag_name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_FK1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_FK2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `post_FK3` FOREIGN KEY (`parent_id`) REFERENCES `post_comment` (`id`);

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `like_FK1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `like_FK2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `tag_FK1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`),
  ADD CONSTRAINT `tag_FK2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
