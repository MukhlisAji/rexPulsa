-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 04:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rexapulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `total_depo` int(100) NOT NULL,
  `total_pay` int(100) NOT NULL,
  `method` enum('mandiri','bca','balance','') NOT NULL,
  `dated` varchar(50) NOT NULL,
  `status` enum('success','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `user_id`, `total_depo`, `total_pay`, `method`, `dated`, `status`) VALUES
(1, 1, 100000, 100232, 'mandiri', '13/12/2017', 'success'),
(2, 34, 100000, 101001, 'bca', '11/01/2018', 'pending'),
(3, 34, 1000, 2002, 'mandiri', '11/01/2018', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `phone_numb` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `paymentby` enum('mandiri','bca','balance') NOT NULL,
  `orderdate` varchar(50) NOT NULL,
  `payment_status` enum('pending','success') NOT NULL,
  `order_status` enum('success','pending','suspend') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `invoice_id`, `provider`, `type`, `phone_numb`, `price`, `paymentby`, `orderdate`, `payment_status`, `order_status`) VALUES
(1, 1, 24071997, 'Telkomsel', 'Pulsa Rp.10.000', '082172242661', 12000, 'mandiri', '08/11/2017 22:43 ', 'success', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `log_attack`
--

CREATE TABLE `log_attack` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `url` varchar(500) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_attack`
--

INSERT INTO `log_attack` (`id`, `username`, `url`, `ip`, `user_agent`, `date`) VALUES
(1, '', 'http://127.0.0.1/kuliah/pulsa/starters/zone.php?page=history%27', '127.0.0.1', '0', '26-11-2017 19:11:31'),
(2, '', 'http://127.0.0.1/kuliah/pulsa/starters/zone.php?page=history%27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '26-11-2017 19:11:59'),
(3, '', 'http://127.0.0.1/kuliah/pulsa/starters/zone.php?page', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '26-11-2017 20:11:56'),
(4, '', 'http://127.0.0.1/kuliah/pulsa/starters/zone.php?page', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '26-11-2017 20:11:14'),
(5, '', 'http://127.0.0.1/kuliah/pulsa/rexaPulsa/zone.php?page=depo%27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '10-12-2017 03:12:31'),
(6, 'riptosudi', 'http://127.0.0.1/kuliah/pulsa/rexaPulsa/zone.php?page=depo%27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '10-12-2017 03:12:22'),
(7, 'riptosudi', 'http://127.0.0.1/kuliah/pulsa/rexaPulsa/zone.php?page=depo%27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '10-12-2017 03:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id` int(10) NOT NULL,
  `dated` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `credit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id`, `dated`, `keterangan`, `credit`) VALUES
(2, '13/12/2017', 'ATMB CR Transfer S1AW13GA /5171651853/ATB-0000200000000 4290004241 ', '100232'),
(3, '12/12/2017', 'ATMB CR Transfer S1AW13GA /5171651853/ATB-0000200000000 4290004241 ', '100232');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `paymentby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `testi` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`id`, `name`, `testi`, `date`) VALUES
(1, 'Fegi', 'Hallo', '11-01-2018 10:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `unique_code`
--

CREATE TABLE `unique_code` (
  `id` int(11) NOT NULL,
  `dated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unique_code`
--

INSERT INTO `unique_code` (`id`, `dated`) VALUES
(1003, '11-01-2018');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` int(50) NOT NULL,
  `active` enum('no','yes') NOT NULL,
  `activation_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `username`, `name`, `password`, `salt`, `email`, `balance`, `active`, `activation_code`) VALUES
(34, 'fegifran', 'Fegi', '7c1a9f4af9c5ff64ebdeb97ae500be714129741c0bc90c5e5c4617cb4a30515f', 'á„­¸cf·ö3\ráüS†û¢ðHðŽ4Jž›U÷1í»ê', 'asdasdas@asdsa.com', 0, 'yes', 'aa98469f-2012-4fc4-a026-226615835273');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `log_attack`
--
ALTER TABLE `log_attack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unique_code`
--
ALTER TABLE `unique_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log_attack`
--
ALTER TABLE `log_attack`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
