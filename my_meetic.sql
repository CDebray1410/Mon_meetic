-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2021 at 08:03 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_meetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `id_message` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `chatroom_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`id_message`, `full_name`, `chatroom_message`, `message_date`) VALUES
(2, 'Christopher Debray', 'Bonjour, bonjour !', '2021-02-05 19:44:43'),
(3, 'Christopher Debray', 'Allo ?', '2021-02-05 19:46:30'),
(4, 'Soutenance Captain', 'Me voilà !', '2021-02-05 20:00:08'),
(5, 'Guy Random', 'Moi aussi...', '2021-02-05 20:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_member` int NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `member_age` int NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `inscription_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_member`, `last_name`, `first_name`, `birth_date`, `member_age`, `gender`, `city`, `e_mail`, `pass`, `hobbies`, `inscription_date`) VALUES
(3, 'Debray', 'Christopher', '1998-10-14', 22, 'homme', 'Suresnes', 'christopherdebray@outlook.fr', '$2y$10$2G0WvEL1t8aebxJud0qzHuOEge9p7RH9i3E8BNPzIozy4xDyVcmzO', 'jeux video, lecture, sport', '2021-01-28'),
(4, 'Aran', 'Samus', '1980-10-10', 41, 'femme', 'Inconnu', 'samusaran@outlook.fr', '$2y$10$tftYbkQ2Dhn7sRXM/ZaaCOzMQnsgMP5AZevZUInLcRcZxuGkaQrKe', 'sport', '2021-02-02'),
(5, 'Plus', 'De 45 ans', '1945-10-10', 76, 'autre', 'Inconnu', 'old@outlook.fr', '$2y$10$uYohjfUOZ9vJ1vpDCIFS3ONuNbomQc/mPJmI5QkPiktj9noQ71AIe', 'cinema, lecture, cuisiner', '2021-02-02'),
(6, 'Random', 'Guy', '1992-10-01', 29, 'homme', 'Ville', 'random@outlook.fr', '$2y$10$4tDVQkeOhUMTuyiNn0CBLeqlsK3YN.mwhLZUPvzPho4Jn491jEdNe', 'jeux video, dance, skateboard, manga', '2021-02-02'),
(7, 'personnage', 'truc', '1997-10-10', 24, 'autre', 'Ville', 'personnage@outlook.fr', '$2y$10$0y5fsjNUOe5auDzInw2eQ.ZOd1bzRTl6LNc.aU0aiI3c/M2Obtkq6', 'jeux video, cinema, lecture, sport, dance, skateboard, manga, cuisiner', '2021-02-02'),
(8, 'Traore', 'JF', '1998-10-10', 23, 'homme', 'Paris', 'traore@outlook.fr', '$2y$10$oIepfy4XWcUS7cydnh3xHuU3yluFo2XYkOY491byha0G/uWqBGLHm', 'sport, dance', '2021-02-02'),
(9, 'dame', 'dom', '2000-10-10', 21, 'femme', 'Paris', 'dame@outlook.fr', '$2y$10$3TjI1csYPtYdqXPEojf/eeWqzX/XEBEwpuRN.79cfk2xT9hf1nLoK', 'jeux video, lecture, skateboard, manga', '2021-02-02'),
(10, 'ancien', 'Hans', '1950-10-10', 71, 'homme', 'Melun', 'ancien@outlook.fr', '$2y$10$rcRnXd.dFFeLjZB691Hjd.k3SWmdtH.F0cp9c1QyHBVHSl69wHJ0m', 'jeux video, lecture, cuisiner', '2021-02-02'),
(20, 'Captain', 'Soutenance', '1980-10-10', 40, 'autre', 'Lille', 'Soutenance@outlook.fr', '$2y$10$NjaZ.kCUD3ve6XPckVlnieqIC9RmWxgbMu5cRFmnqbMFPm0pp1l92', 'jeux video, cinema, manga', '2021-02-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
