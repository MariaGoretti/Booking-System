-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2018 at 08:19 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingcalendar`
--

CREATE TABLE `bookingcalendar` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `start_day` int(11) DEFAULT NULL,
  `end_day` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `canceled` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingcalendar`
--

INSERT INTO `bookingcalendar` (`id`, `name`, `phone`, `item`, `start_day`, `end_day`, `start_time`, `end_time`, `canceled`) VALUES
(5, 'lennon', '0706019415', 'Pete', 1529532000, 1529532000, 46800, 84600, 0),
(11, 'milly', '0987654321', 'Mary', 1529532000, 1529532000, 28800, 30600, 0),
(12, 'milly', '0987654321', 'Joe', 1529445600, 1529532000, 28800, 30600, 0),
(14, 'maria', '09876543', 'Mary', 1528840800, 1528840800, 7200, 84600, 0),
(15, 'maria', '09876543', 'Joe', 1528668000, 1528668000, 46800, 48600, 0),
(17, 'maria', '0756984332', 'Joe', 1529013600, 1529013600, 21600, 23400, 0),
(18, 'sloane', '0756984332', 'Andy', 1528408800, 1528408800, 32400, 37800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `question`) VALUES
(1, 'sloane', 'sloane03@hotmail.com', 'jhgfrew'),
(2, 'hue', 'hue44@yahoo.com', 'gfdeswdfghjk'),
(3, 'lennon', 'lennonlenny@gmail.com', 'kjhgtresdxfghjk'),
(4, 'lennon', 'lennonlenny@gmail.com', 'kjhgtresdxfghjk'),
(5, '', '', ''),
(6, 'sloane', 'sloane03@hotmail.com', 'oiuytresxcfvgbhjnmk,.'),
(7, '', '', ''),
(8, '', '', ''),
(9, 'milly', 'millyanne@gmail.com', 'uuuuuuuiiii!'),
(10, 'milly', 'millyanne@gmail.com', 'uuuuuuuiiii!'),
(11, 'hue', 'hue44@yahoo.com', 'oiuyhgfdxz'),
(12, 'samira', 'samira@gmail.com', 'ASDFGHJKL,'),
(13, 'sloane', 'sloane03@hotmail.com', 'lkuytresa'),
(14, 'smiley', 'smileyray@gmail.com', 'kjhygtfreds'),
(15, 'smiley', 'smileyray@gmail.com', 'kjhygtfreds'),
(16, 'smiley', 'smileyray@gmail.com', 'is this automatic? supersonic? hypnotic? funky fresh?');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'smileyray@gmail.com'),
(2, 'sloane03@hotmail.com'),
(3, 'smileyray@gmail.com'),
(4, 'smileyray@gmail.com'),
(5, 'smileyray@gmail.com'),
(6, 'samira@gmail.com'),
(7, 'millyanne@gmail.com'),
(8, 'samira@gmail.com'),
(9, 'millyanne@gmail.com'),
(10, 'millyanne@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Client',
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_email`, `user_type`, `user_password`) VALUES
(2, 'Robert', 'Mathari', 'mathari@gmail.com', 'Admin', '$2y$10$CnDPr1IA0qnKiYsHRjc5PeafM52YsIPX47.Mw7iYoyv'),
(3, 'Andy', 'Kamau', 'andy@gmail.com', 'Consultant', '$2y$10$3JPlrNpzy1ENSVjzX9IsDeVYy0KzglUT.oc95tBXtmi'),
(4, 'Rodney', 'kariuki', 'markrodney@gmail.com', 'Client', '$2y$10$0zwq2kWR9z4zeSA.BzWBIenLV8xl/KbF6fDcUJAtr8a'),
(5, 'Jane', 'Doe', 'jane@yahoo.com', 'Client', '$2y$10$ov6cjQNNTqCqUbn29S..gOr5lbZmXE9tlZENfN8XHWj'),
(6, 'John', 'Doe', 'john@yahoo.com', 'Client', '$2y$10$yHEEmefS5ZwZ/2Lq9UvU1.mksq5ChnK0xV76zPs8F24'),
(7, 'Mary', 'Okoye', 'mary@yahoo.com', 'Consultant', '$2y$10$9dvYJ8h8Fu4byp4NMOuRTelcMdokqt3xykEmptKGew5'),
(8, 'maria', 'kisenga', 'maria@gmail.com', 'Client', '$2y$10$GU85/lNW9fCa1aX8jvudBOvkWLDv4kF7/mYSRaAg6vT'),
(9, 'Andy', 'Alego', 'andyalego@gmail.com', 'Consultant', '1234'),
(10, 'sloane', 'wenti', 'sloane@gmail.com', 'Client', '$2y$10$gyoi/TqNDKy1wl4Pm5tTmOCAdLtDzpzEDn0o69oOKHz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingcalendar`
--
ALTER TABLE `bookingcalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
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
-- AUTO_INCREMENT for table `bookingcalendar`
--
ALTER TABLE `bookingcalendar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
