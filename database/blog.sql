-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 07:37 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article_title` varchar(150) NOT NULL,
  `article_body` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `created_at` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_title`, `article_body`, `user_id`, `image_path`, `created_at`) VALUES
(29, 'Golgumbaz', 'Gol Gumbaz at Bijapur is the mausoleum of king Muhammad Adil Shah, Adil Shah Dynasty. Construction of the tomb, located in Vijayapura (formerly Bijapur), Karnataka, India, was started in 1626 and completed in 1656. The name is based on Gola gummata derived from Gol Gombadh meaning \"circular dome\".[1] It follows the style of Indo-islamic architecture.[2] Even a slight whisper by someone standing in this gallery can be heard everywhere in the gallery, and if somebody claps, the echo can be heard several times.', 1, 'http://localhost/blog/upload/golgumbaz.jpg', '2020-01-03 16:25:09'),
(30, 'Shivagiri', 'Lord Shiva Statue is an 85 feet tall statue of Lord Shiva that has been installed by the T.K. Patil Banakatti Charitable Trust in Vijayapura (Bijapur) on Sindagi Road. It is slowly making as a pilgrimage location. 1,500 tonnes statue of Lord Shiva is considered as the second largest statue of Lord Shiva in India and was prepared by sculptors from Shimoga for above 13 months plus the civilian design was supplied by Bangalore-situated architects', 1, 'http://localhost/blog/upload/shivagiri.jpg', '2020-01-03 16:26:01'),
(31, 'Ibrahim Roza', 'Ibrahim Roza is in Bijapur and was built by Ibrahim Adil Shah II in the early 1600s. Ibrahim Adil Shah has similarities with the Mughals in 2 interesting areas. He had the religious tolerance of Akbar and the passion to build a tomb with minarets for his wife like Shah Jahan!\r\nThe monument is dedicated to his Queen Taj Sultana.\r\n', 1, 'http://localhost/blog/upload/roza.jpg', '2020-01-03 16:27:37'),
(32, 'adad', 'adada', 1, 'http://localhost/blog/upload/Screenshot_2018-10-07_CV.jpg', '2020-01-04 14:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
(1, 'pushpak', '123456', 'pushpak', 'bhosale', ''),
(6, 'pushpak', 'pushpak', 'Pushpak', 'Bhosale', 'pushpak.bhosl3@gmail.com'),
(7, 'rakesh', 'rakesh', 'rakesh', 'bhosale', 'rakesh@gmail.com'),
(8, 'rak', 'rak', 'rak', 'rak', 'rak@gmail.com'),
(9, 'p', 'p', 'p', 'p', 'p@gmail.com'),
(10, 'r', 'r', 'a', 'a', 'a@g.com'),
(11, 'rakesh', 'rakesh', 'rakesh', 'bhosale', 'r@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
