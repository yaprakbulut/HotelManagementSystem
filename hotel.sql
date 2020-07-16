-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 09:51 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `room_id` int(20) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `payment` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `room_id`, `check_in`, `check_out`, `payment`, `user_id`) VALUES
(2, 1, '2018-10-01', '2018-10-03', 300, 3),
(3, 4, '2017-11-04', '2017-11-07', 600, 4),
(35, 10, '2016-11-05', '2016-11-08', 500, 5),
(36, 2, '2019-09-11', '2019-09-14', 1000, 5),
(38, 5, '2019-12-03', '2019-12-06', 300, 5),
(39, 5, '2019-12-02', '2019-12-04', 200, 5),
(43, 3, '2019-12-03', '2019-12-07', 1200, 5);

-- --------------------------------------------------------

--
-- Table structure for table `booking_guest`
--

CREATE TABLE `booking_guest` (
  `guest_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_guest`
--

INSERT INTO `booking_guest` (`guest_id`, `booking_id`) VALUES
(4, 2),
(5, 3),
(6, 3),
(43, 35),
(44, 36),
(46, 43);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(20) NOT NULL,
  `personal_id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `personal_id`, `fname`, `lname`, `dob`, `city`, `country`, `phone`, `email`) VALUES
(4, 1686122760, 'Vivi', 'Burns', '1993-02-09', 'Frankfurt', 'Germany', '(257) 563-7401', 'vivien@ornare.net'),
(5, 1610032824, 'Matthew', 'Gross', '1995-12-01', 'Rome', 'Italy', '(660) 663-4518', 'matthew.gross@mail.r'),
(6, 1671101348, 'Josephine', 'Keller', '1980-06-15', 'Moskow', 'Russia', '(422) 517-6053', 'jokeller@malesuadafa'),
(43, 1238912398, 'Hilal', 'Senturk', '1997-10-03', 'Ordu', 'Turkey', '05468792134', 'hilal@gmail.com'),
(44, 421321, 'Hasan', 'Sur', '1995-02-05', 'Antalya', 'Turkey', '0212456879', 'hasan@gmail.com'),
(45, 2147483647, 'Mary', 'Stuart', '1984-05-12', 'Minsk', 'Belarus', '0212456879', 'mary@gmail.com'),
(46, 548756699, 'Ece', 'Şık', '1990-12-02', 'Ankara', 'Turkey', '05469871236', 'ece@gmail.com'),
(48, 123123123, 'Zack', 'Weasley', '1991-01-01', 'Frankfurt', 'Germany', '4215658794', 'zack@gmail.com'),
(49, 159951, 'Sude', 'BULUT', '2003-07-07', 'Ankara', 'Turkey', '5469871233', 'sude@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(20) NOT NULL,
  `roomNo` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `capacity` int(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `roomNo`, `type`, `capacity`, `image`) VALUES
(1, 1, 'single', 1, '../image/1kişi.jpg'),
(2, 2, 'single', 1, '../image/1kişi.jpg'),
(3, 3, 'single', 1, '../image/1kişi.jpg'),
(4, 4, 'double', 2, '../image/2kişi.jpg'),
(5, 5, 'double', 2, '../image/2kişi.jpg'),
(6, 6, 'triple', 3, '../image/3room.jpg'),
(7, 7, 'triple', 3, '../image/3room.jpg'),
(8, 8, 'triple', 3, '../image/3room.jpg'),
(9, 9, 'quad', 4, '../image/4room.jpg'),
(10, 10, 'quad', 4, '../image/4room.jpg'),
(11, 11, 'king', 2, '../image/king.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `img_path`) VALUES
(2, 'yaprakbulut', '123', 'yaprakbulut00@gmail.com', ''),
(3, 'Raja Deleon', '2140', 'lectus@tempor.ca', ''),
(4, 'Jonah Anthony', '7746', 'at@rutrumeu.net', ''),
(5, 'admin', '1234', 'yaprakbulut00@gmail.com', '../uploads/özge.jpg'),
(6, 'cerenbulbul', 'ceren1', 'cerenbulbul27@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `booking_guest`
--
ALTER TABLE `booking_guest`
  ADD KEY `booking_guest_ibfk_1` (`guest_id`),
  ADD KEY `booking_guest_ibfk_2` (`booking_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`),
  ADD UNIQUE KEY `ID` (`personal_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `booking_guest`
--
ALTER TABLE `booking_guest`
  ADD CONSTRAINT `booking_guest_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_guest_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
