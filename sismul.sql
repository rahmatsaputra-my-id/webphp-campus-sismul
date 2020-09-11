-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 04:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sismul`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `desc_foto` varchar(255) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `judul`, `asal`, `description`, `desc_foto`, `file_name`, `post_date`) VALUES
(14, 'admin', 'Mie Ayam', 'asdsad', 'Mi ayam atau bakmi ayam adalah masakan Indonesia yang terbuat dari mi kuning direbus mendidih kemudian ditaburi saos kecap khusus beserta daging ayam dan sayuran. Mi Ayam terkadang ditambahi dengan bakso, pangsit dan jamur. Mi berasal dari Tiongkok tetapi mi ayam yang serupa di Indonesia tidak ditemukan di Tiongkok.[butuh rujukan] Mi ayam aslinya dari Tiongkok Selatan terutama dari daerah-daerah pelabuhan seperti Fujian dan Guandong.[butuh rujukan] Meskipun mi bukan asli Indonesia tapi nyatanya kini mi ayam seakan sudah menjadi makanan tradisional Indonesia. Makanan ini sudah tersebar di seluruh Indonesia, terutama di daerah Jawa makanan ini sangat mudah di temukan. Penjual mi ayam di Indonesia yang populer berasal dari Wonogiri', 'foto bakwan', 'Mie_Ayam-5d241b9166c010_22047013.jpg', '2020-04-14 14:06:39'),
(16, 'matteo', 'Pecel Ayam', '', 'Pecak ayam di Indonesia adalah nama sebuah makanan khas Jawa yang terdiri dari ikan lele dan sambal (bumbu) pecak. Biasanya yang dimaksud adalah ikan lele yang digoreng kering dengan minyak lalu disajikan dengan sambal tomat dan lalapan. Lalapan biasa terdiri dari kemangi, kubis, mentimun, dan kacang panjang.', '', 'Pecel_Lele-5d241c550ea962_68471449.jpg', '2019-07-09 08:15:29'),
(21, 'matteo', 'Soto aasd', 'jakarta', 'asddsa', '', 'Soto_aasd-5d244d6cdfeae0_88077654.jpg', '2019-07-09 08:16:44'),
(23, 'admin', 'judul ikan', 'bali', 'hayo test', 'desc foto', 'judul_ikan-5e95c3b7168ea8_25781089.jpg', '2020-04-14 14:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'matteo', 'matteo'),
(0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
