-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2016 at 08:21 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `euai_18570373_somiti`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cash` int(11) NOT NULL,
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--



--
-- Table structure for table `bank_login`
--

CREATE TABLE `bank_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_login`
--

INSERT INTO `bank_login` (`id`, `username`, `password`) VALUES
(1, 'morshedbk', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `account` varchar(7) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT '',
  `blood` varchar(10) NOT NULL,
  `bio` text NOT NULL,
  `image_location` varchar(125) NOT NULL DEFAULT 'avatars/default_avatar.png',
  `password` varchar(512) NOT NULL,
  `email` varchar(200) NOT NULL,
  `email_code` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  `generated_string` varchar(35) NOT NULL DEFAULT '0',
  `ip` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `account`, `address`, `gender`, `blood`, `bio`, `image_location`, `password`, `email`, `email_code`, `time`, `confirmed`, `generated_string`, `ip`) VALUES
(21, 'morshed', 'Morshed Alam', '', '', '100003', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$4112671485578e3d967edOcsJZt6/OPWlsw1PxI1ahNL9pGfSKuGq', 'morshed@gmail.com', 'code_578e3d967edb18.42504820', 1468939670, 1, '0', 0),
(22, 'jahangir', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$1011577977578e3ec0c1aOTj07lYXpMNsSmEbV3XGCTKuCkmwLnba', 'jalamb@gmail.com', 'code_578e3ec0c1a9c8.92567887', 1468939968, 1, '0', 0),
(24, 'sobuj', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$029391009578e3f4a01acOQBgdyk75U2e/kGLB.ppHRMkteFD3nlO', 'smobuj_du@yahoo.com', 'code_578e3f4a01abc1.21143362', 1468940106, 1, '0', 0),
(25, 'raju', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$1215101883578e3f68c75uwnGB/o5CeQV07.OLCSEMnWHj9CnibMq', 'mtira10@gmail.com', 'code_578e3f68c753d1.56953073', 1468940136, 1, '0', 0),
(26, 'tajul', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$2067800062578e3f877b9usfoEAvpW99cBgHievIdj4pY9kCpFSgq', 'tajuliam.nu@gmail.com', 'code_578e3f877b8f92.40938700', 1468940167, 1, '0', 0),
(27, 'kamrul', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$422435831578e3fadea0fuEchUTzdBAj5tFl/.RjgBYi1KVV3OFWm', 'hasan_mrul57@yahoo.com', 'code_578e3fadea0e29.14833134', 1468940205, 1, '0', 0),
(28, 'biplob', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$2409853070578e3fd567fuKhYVPD/cjZWX.hKus2ODCX0.n11AMYO', 'bipobno@hotmail.com', 'code_578e3fd567f3b4.31154303', 1468940245, 1, '0', 0),
(29, 'foyaj', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$0477721000578e400aea0uk9s4/dSczOQIku1JdrO2BVdThd0ASIe', 'ffam88@gmail.com', 'code_578e400aea04e9.76724970', 1468940298, 1, '0', 0),
(30, 'masum', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$652155815457904015046ukx5TbtzNcveTK2QyjfRmVz/F.e9dqU.', 'masu@gmail.com', 'code_579040150465f0.98002036', 1469071381, 1, '0', 0),
(31, 'towhid', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$00922944985790402e8b3uMeL1ifUFogJ9hlA3SR9jy7AEqly5Z0y', 'tohid@gmail.com', 'code_5790402e8b3408.74408526', 1469071406, 1, '0', 0),
(32, 'reki', '', '', '', '', '', '', '', '', 'avatars/default_avatar.png', '$2y$12$05362721295790405c6b0emziQfCFOcAP4a1WWLExSny50j.IUp.W', 'reki@gmail.com', 'code_5790405c6b0da2.56697742', 1469071452, 1, '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_login`
--
ALTER TABLE `bank_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT for table `bank_login`
--
ALTER TABLE `bank_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
