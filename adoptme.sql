-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 06:12 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptme`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `IDArticle` int(5) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`IDArticle`, `Title`, `Description`, `Photo`, `created_at`, `updated_at`) VALUES
(1, 'Klasifikasi Ragam Hewan Adopsi', 'Ini merupakan contoh klasifikasi hewan adopsi.\r\n\r\nTerdapat hewan anjing dan kucing.', '/storage/uploads/1625624726.jpg', '2021-07-07 02:22:24', '2021-07-07 02:22:24'),
(2, 'Welcome to ADOPT ME!', 'Adopt me merupakan sebuah platform yang memberi fasilitas bagi mereka pecinta hewan!', '/storage/uploads/1625624687.jpg', '2021-07-07 02:24:47', '2021-07-07 02:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `IDCart` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `no_invoice` varchar(10) NOT NULL,
  `status_cart` varchar(10) NOT NULL,
  `status_pembayaran` varchar(10) NOT NULL,
  `status_pengiriman` varchar(10) NOT NULL,
  `no_resi` int(10) DEFAULT NULL,
  `ekspedisi` varchar(20) DEFAULT NULL,
  `subtotal` double NOT NULL DEFAULT 0,
  `ongkir` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `bukti_pembayaran` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`IDCart`, `user_id`, `no_invoice`, `status_cart`, `status_pembayaran`, `status_pengiriman`, `no_resi`, `ekspedisi`, `subtotal`, `ongkir`, `total`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(4, 9, 'INV 001', 'checkout', 'sudah', 'belum', NULL, 'JnT', 30000, 0, 30000, '/storage/uploads/1625590851.jpg', '2021-07-06 09:58:48', '2021-07-06 10:00:51'),
(7, 9, 'INV 002', 'checkout', 'sudah', 'belum', NULL, 'JnT', 91900, 0, 91900, '/storage/uploads/1625641573.jpg', '2021-07-06 18:38:49', '2021-07-07 00:06:13'),
(9, 9, 'INV 003', 'checkout', 'belum', 'belum', NULL, 'SiCepat REG', 61900, 0, 61900, NULL, '2021-07-07 00:07:23', '2021-07-07 00:08:44'),
(10, 12, 'INV 001', 'checkout', 'sudah', 'belum', NULL, 'SiCepat BEST', 30000, 0, 30000, '/storage/uploads/1625641885.jpg', '2021-07-07 00:10:29', '2021-07-07 00:11:25'),
(11, 12, 'INV 002', 'cart', 'belum', 'belum', NULL, NULL, 11900, 0, 11900, NULL, '2021-07-07 00:11:35', '2021-07-07 00:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `IDCartDetail` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga` double NOT NULL DEFAULT 0,
  `subtotal` double NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`IDCartDetail`, `cart_id`, `product_id`, `qty`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 30000, 30000, '2021-07-06', '2021-07-06'),
(3, 1, 2, 2, 50000, 100000, '2021-07-06', '2021-07-06'),
(4, 1, 3, 1, 11900, 11900, '2021-07-06', '2021-07-06'),
(5, 2, 1, 1, 30000, 30000, '2021-07-06', '2021-07-06'),
(7, 3, 1, 1, 30000, 30000, '2021-07-06', '2021-07-06'),
(8, 4, 1, 1, 30000, 30000, '2021-07-06', '2021-07-06'),
(9, 5, 2, 1, 50000, 50000, '2021-07-06', '2021-07-06'),
(10, 6, 1, 1, 30000, 30000, '2021-07-07', '2021-07-07'),
(12, 7, 1, 1, 30000, 30000, '2021-07-07', '2021-07-07'),
(13, 7, 2, 1, 50000, 50000, '2021-07-07', '2021-07-07'),
(14, 7, 3, 1, 11900, 11900, '2021-07-07', '2021-07-07'),
(17, 9, 3, 1, 11900, 11900, '2021-07-07', '2021-07-07'),
(18, 9, 2, 1, 50000, 50000, '2021-07-07', '2021-07-07'),
(19, 10, 1, 1, 30000, 30000, '2021-07-07', '2021-07-07'),
(20, 11, 3, 1, 11900, 11900, '2021-07-07', '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PetID` int(10) NOT NULL,
  `Pet_Name` varchar(25) NOT NULL,
  `Pet_Street` varchar(50) NOT NULL,
  `Pet_Districts` varchar(30) NOT NULL,
  `Pet_Postcode` int(10) NOT NULL,
  `Pet_City` varchar(30) NOT NULL,
  `Pet_Country` varchar(30) NOT NULL,
  `Pet_Fee` float NOT NULL,
  `Pet_Category` char(1) NOT NULL,
  `Pet_Type` varchar(30) NOT NULL,
  `Pet_Age` int(2) NOT NULL,
  `Pet_Photo` varchar(100) DEFAULT NULL,
  `Pet_Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PetID`, `Pet_Name`, `Pet_Street`, `Pet_Districts`, `Pet_Postcode`, `Pet_City`, `Pet_Country`, `Pet_Fee`, `Pet_Category`, `Pet_Type`, `Pet_Age`, `Pet_Photo`, `Pet_Description`) VALUES
(1, 'Conan', 'Jalan Kerta Dalem Sari IV No 11', 'Panjer', 50144, 'Densel', 'Indo', 30000, '2', 'Persia', 16, '/storage/uploads/1625565589.jpg', 'imutt'),
(2, 'Aii', 'Jalan Kerta Dalem Sari IV No 11', 'Panjer', 1231, 'Densel', 'Indonesia', 2131420, '2', 'Chihuahua', 5, '/storage/uploads/1625565599.jpg', 'Gooo adopt him'),
(3, 'shinichi', 'tokyo revengers', 'tokyo districts', 9999, 'tokyo', 'japan', 5000000, '2', 'herder', 3, '/storage/uploads/1625641500.jpg', 'this is my precious pet, please adopt him.');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `IDProduct` int(10) NOT NULL,
  `Product_Name` varchar(20) NOT NULL,
  `Product_Price` int(10) NOT NULL,
  `Product_Category` char(1) NOT NULL,
  `Product_Stock` int(3) NOT NULL,
  `Product_Weight` float NOT NULL,
  `Product_Expired` date NOT NULL,
  `Product_Image` varchar(50) DEFAULT NULL,
  `Product_Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`IDProduct`, `Product_Name`, `Product_Price`, `Product_Category`, `Product_Stock`, `Product_Weight`, `Product_Expired`, `Product_Image`, `Product_Description`) VALUES
(1, 'Perskaii', 30000, '1', 15, 0.2, '2022-04-18', '/storage/uploads/1625549376.png', 'Makanan ini cocok banget untuk kucing!'),
(2, 'Whiskas', 50000, '1', 14, 0.5, '2023-03-29', '/storage/uploads/1625549647.jpg', 'Makanan mahal'),
(3, 'Mashy', 11900, '3', 2, 0.2, '2022-08-13', '/storage/uploads/1625549579.jpg', 'adadadaddaa');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `IDReview` int(5) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `Rating` char(1) NOT NULL,
  `Comments` varchar(200) NOT NULL,
  `Image_Review` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`IDReview`, `user_id`, `product_id`, `Rating`, `Comments`, `Image_Review`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '4', 'Jelek sekali produknya tidak sesuai bzzz', '/storage/uploads/1625290373.png', '2021-07-07 06:57:22', '2021-07-07 06:57:22'),
(2, 9, 1, '4', 'bagus bgttt', '/storage/uploads/1625628126.png', '2021-07-07 06:57:22', '2021-07-07 06:57:22'),
(3, 9, 2, '3', 'barang cukup bagus dan cocok dengan kucing saya', '/storage/uploads/1625628962.png', '2021-07-07 06:57:22', '2021-07-07 06:57:22'),
(4, 9, 3, '5', 'manteppppp', '/storage/uploads/1625629007.jpg', '2021-07-07 06:57:22', '2021-07-07 06:57:22'),
(5, 9, 1, '3', 'ini coba tulis panjang panjang direview supaya bisa tau gimana hasilnya waktu mau ditampilin heheheheheh makasi', '/storage/uploads/1625641077.jpg', '2021-07-06 23:57:57', '2021-07-06 23:57:57'),
(6, 12, 1, '5', 'bagus banget produknya, cocok untuk dipake sama anjing mahal', '/storage/uploads/1625642168.jpg', '2021-07-07 00:16:08', '2021-07-07 00:16:08'),
(7, 12, 1, '5', 'keren bangett, perfect deh pokoknya!', '/storage/uploads/1625642201.jpg', '2021-07-07 00:16:41', '2021-07-07 00:16:41'),
(8, 12, 1, '3', 'pokoknya ini keren bgt sihhh', '/storage/uploads/1625642242.png', '2021-07-07 00:17:22', '2021-07-07 00:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IDUser` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Loc_Street` varchar(30) DEFAULT NULL,
  `Loc_Districts` varchar(20) DEFAULT NULL,
  `Loc_Postcode` int(5) DEFAULT NULL,
  `Loc_City` varchar(20) DEFAULT NULL,
  `Loc_Country` varchar(20) DEFAULT NULL,
  `User_Photo` varchar(50) DEFAULT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDUser`, `username`, `fname`, `lname`, `email`, `password`, `Phone_Number`, `Loc_Street`, `Loc_Districts`, `Loc_Postcode`, `Loc_City`, `Loc_Country`, `User_Photo`, `role`) VALUES
(8, 'asri123', 'Asri', 'Cahyani', 'admindummy@gmail.com', '$2y$10$HpflqwMdKWUusJSb.Y7HIO4/WmwODmvkzFYmhVI/qLXymA/umYxF2', '087911809111', 'Jalan Thamrin IV', 'Jakarta Selatan', 58783, 'Jakarta', 'Indonesia', NULL, 'a'),
(9, 'dummyacc', 'Dummy', 'Account', 'dummyaccount@gmail.com', '$2y$10$AE66/sUo3BtXE7UPfibeM.Ip6YdfCCIaETXEcb4jwO2DZ9BLgu79q', '081911633018', 'Jalan Kerta Dalem Sari IV', 'Sidakarya', 59155, 'Denpasar', 'Indonesia', '/storage/uploads/1625559859.png', 'u'),
(12, 'dimsum123', 'Dimas', 'Renggana', 'dimasrenggana06@gmail.com', '$2y$10$tSbYNBu.l7wQNt4XyczxzekmDcJZu3dWly/RaMHTFKS7uN/RAMLEO', '087911809111', 'Jalan Tukad Sangiang No. 4', NULL, NULL, NULL, NULL, NULL, 'u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`IDArticle`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`IDCart`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`IDCartDetail`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDProduct`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`IDReview`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `IDArticle` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `IDCart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `IDCartDetail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `PetID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `IDProduct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `IDReview` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IDUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
