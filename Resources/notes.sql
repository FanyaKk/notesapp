-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 01:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `userID`, `title`, `content`) VALUES
(1, 0, '0', ''),
(2, 0, '0', ''),
(3, 0, '0', ''),
(4, 0, '0', ''),
(5, 0, '0', 'add note to database\r\n'),
(6, 0, '0', 'svsvsvs'),
(7, 0, '0', 'agagefsvsvgsgsg\r\nsg\r\ns\r\n\r\nsg\r\ns\r\ngsgsgsgsgga'),
(8, 0, '0', 'egaaf'),
(9, 0, '0', 'vvvavavav\r\n\r\nb\r\ndt\r\njyryjjhdhd'),
(10, 0, '0', 'efsgsgs'),
(11, 0, '0', 'sbxbxbxv'),
(30, 3, '0', 'fsegsgs\r\nh\r\ndhthhgxgsxbhd\r\nhdhdjdjdj'),
(39, 3, '0', 'dfb'),
(40, 3, '0', 'dfb'),
(41, 3, '0', ''),
(49, 39, '0', 'Bread\r\nMilk\r\nCheese\r\nWater\r\nTomatoes\r\nPotatoes\r\n'),
(50, 43, '0', 'hello'),
(51, 43, '0', 'dopaksodpads'),
(55, 39, '3r4set5ry', '2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju2qe3war4st5dyujhygtfsedsawefgrthyjukigytr\r\nasfegrdthyju\r\n'),
(98, 44, 'appa e chuk', 'chuk'),
(114, 2, 'testnote', 'Note edit note');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email_address` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_address`, `username`, `password`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, 'test@test.bg', 'testuser', '123456'),
(4, 'info@tanchev.net', 'ludiqMaks', '450405'),
(5, 'azorak@gmail.com', 'azorac', '450405'),
(6, 'golden@abv.bg', 'golden', '123456'),
(7, 'email@test.com', 'emailtest', '654321'),
(8, 'affsff', 'emailtestafafaffa', 'emailtestafafaffa'),
(35, 'mymail@gmail.com', 'testuser1', '123456testuser1'),
(36, 'mymail2@gmail.com', 'testuser2', '123456testuser2'),
(37, 'mymail3@gmail.com', 'testuser3', '123456testuser3'),
(38, 'qefahj', 'rmjh', '123456'),
(39, 'test1@test.bg', 'testuser1', 'testuser1'),
(40, 'test5@test.bg', 'testuser5', 'testuser5'),
(41, 'test6@test.bg', 'testuser6', 'testuser6'),
(42, 'asdads', 'saopdkaopsdk', '1234'),
(43, 'info@tanchev.net', 'tanchev', '1234'),
(44, 'azsamqk@ddd.com', 'azsamqk', 'azsamqk'),
(45, 'test7@test.bg', 'testuser7', 'testuser7'),
(46, 'er', 'er', 'er'),
(47, 'test1', 'testuser1', '12345678'),
(48, 'test@test.bg', 'testuser1', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
