-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 09:27 PM
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
-- Database: `be22_exam4_mahran_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be22_exam4_mahran_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be22_exam4_mahran_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `libraryrecords`
--

CREATE TABLE `libraryrecords` (
  `ISBN` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `type` enum('BOOK','CD','DVD') DEFAULT 'BOOK',
  `author_first_name` varchar(100) NOT NULL,
  `author_last_name` varchar(100) NOT NULL,
  `publisher_name` varchar(150) NOT NULL,
  `publisher_address` varchar(200) NOT NULL,
  `publish_date` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('available','reserved') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libraryrecords`
--

INSERT INTO `libraryrecords` (`ISBN`, `title`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `photo`, `status`) VALUES
(13, 'The Great Gatsby', 'A novel set in the 1920s about the mysterious Jay Gatsby and his obsession with the beautiful Daisy Buchanan.', 'BOOK', 'F. Scott', 'Fitzgerald', 'Scribner', 'New York, NY', '2024-07-01', '669a926155941.jpg', 'available'),
(14, 'To Kill a Mockingbird', 'A novel about racial injustice in the Deep South, told through the eyes of a young girl.', 'DVD', 'Harper', 'Lee', 'J.B. Lippincott Co.', 'Philadelphia, PA', '2024-07-02', '669a93d11370b.jpg', 'reserved'),
(15, '1984', 'A dystopian novel about a totalitarian regime that uses surveillance and propaganda to control its citizens.', 'CD', 'George', 'Orwell', 'Secker and Warburg', 'London, UK', '2016-06-14', '669a9554411a5.jpg', 'reserved'),
(16, 'The Catcher in the Rye', 'A novel about teenage angst and alienation, following the life of Holden Caulfield in New York City.', 'BOOK', 'Hassan', 'Moamen', 'Brown and Company', 'New York, NY', '2006-07-27', '669a98ae3f587.jpg', 'available'),
(17, 'Moby Dick', 'A novel about the obsessive quest of Captain Ahab to seek revenge on the giant white whale, Moby Dick.', 'BOOK', 'Herman', 'Melville', 'Harper and Brothers', 'New York, NY', '2024-07-16', '669a99521b386.jpg', 'available'),
(18, 'The Lord of the Rings', 'The first part of the epic fantasy trilogy about the journey to destroy the One Ring.', 'CD', 'J.R.R.', 'Tolkien', 'Allen and Unwin', 'London, UK', '2024-07-31', '669a9cb459e9d.jpg', 'available'),
(19, 'Pride and Prejudice', 'A classic novel that explores themes of love and social standing in early 19th century England.', 'DVD', 'Jane', 'Austen', 'T. Egerton', 'London, UK', '2024-07-13', '669a9d10230dd.jpg', 'reserved'),
(20, 'The Catcher in the Rye', 'A novel set in the 1920s about the mysterious Jay Gatsby and his obsession with the beautiful Daisy Buchanan.', 'CD', 'Mohamed', 'Mahran', 'Mahran', 'Am Krautgarten 30/2/1', '2024-07-03', 'book.jpg', 'reserved'),
(21, 'Programming Stuff', 'Good programming stuff', 'DVD', 'Giath', 'Serri', 'Code Factory', 'U4 Kettenbruekengasse', '2024-05-13', '669a9e9331576.png', 'available'),
(22, 'Angels & Demons', 'A thriller about a Harvard symbologist investigating a murder that involves a secret society.', 'BOOK', 'Dan', 'Brown', 'Doubleday', 'Am Krautgarten 30/2/1', '2024-07-02', '669a9f2118963.jpg', 'reserved'),
(23, 'Harry Potter', 'The first book in the Harry Potter series about a young wizard’s adventures at Hogwarts.', 'CD', 'Dan', 'Brown', 'J.B. Lippincott Co.', 'London, UK', '1997-06-16', '669a9f9b827c7.jpg', 'available'),
(24, 'A Brief History of Time', 'A novel set in the mid-1950s, two decades after the events of To Kill a Mockingbird.', 'BOOK', 'Dusan', 'Dusan', 'Code Factory', 'U4 Kettenbruekengasse', '2024-07-12', '669aa0254e2f0.jpg', 'reserved'),
(25, 'Designing Book', 'good book', 'DVD', 'Moataz', 'Alazam', 'Code Factory', 'U4 Kettenbruekengasse', '2024-07-23', '669aa096ba3fc.jpeg', 'available'),
(26, 'Javascript FrontEnd', 'good game', 'BOOK', 'Gaith', 'Hamdan', 'Code Factory', 'U4 Kettenbruekengasse', '2024-07-01', '669aa107d79bd.jpg', 'available'),
(27, 'MySQL', 'good job', 'CD', 'Riola', 'Riola', 'Code Factory', 'U4 Kettenbruekengasse', '2024-07-02', '669aa1e2ca1aa.jpg', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libraryrecords`
--
ALTER TABLE `libraryrecords`
  ADD PRIMARY KEY (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libraryrecords`
--
ALTER TABLE `libraryrecords`
  MODIFY `ISBN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
