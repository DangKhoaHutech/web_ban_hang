-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 06:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CateID` int(20) NOT NULL,
  `CategoryName` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'Laptop', 'Mặt hàng laptop'),
(3, 'Điện thoại', 'Các sản phẩm điện thoại');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `ShipDate` datetime NOT NULL,
  `ShipName` varchar(150) NOT NULL,
  `ShipAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(20) NOT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `CateID` int(20) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(20) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
(18, 'Samsung Galaxy A51\r\n(8GB/128GB)', 3, 7790000, 100, '             Phiếu mua hàng Samsung 250.000đ (áp dụng đặt và nhận hàng từ 16 - 30/6) và 2 K.mãi khác', 'uploads/20200622043007samsung-galaxy-a51-8g-1.jpg'),
(19, 'iPhone 11 64GB', 3, 19490000, 100, '             Màn hình: 6.1\", Liquid Retina\r\nCPU: Apple A13 Bionic 6 nhân\r\nRAM: 4 GB, ROM: 64 GB\r\nCamera: Chính 12 MP & Phụ 12 MP\r\nSelfie: 12 MP\r\nPIN: 3110 mAh, có sạc nhanh', 'uploads/2020062204331220200609050101ip 11.jpg'),
(20, 'MacBook Air 2017 128GB', 1, 1990000, 100, '             Màn hình: 13.3 inch, WXGA+(1440 x 900)\r\nCPU: Intel Core i5 Broadwell, 1.80 GHz\r\nRAM: 8 GB, SSD: 128 GB\r\nĐồ họa: Intel HD Graphics 6000\r\nHĐH: Mac OS\r\nNặng: 1.35 Kg, Pin: Khoảng 12 giờ', 'uploads/20200622043506apple-macbook-air-mqd32sa-a-i5-5350u-4.jpg'),
(21, 'Apple MacBook Pro Touch 2020 i5 512GB (MWP42SA/A)', 1, 47990000, 100, '             \r\nMàn hình: 13.3 inch, Retina (2560 x 1600)\r\nCPU: Intel Core i5 Thế hệ 10, 2.00 GHz\r\nRAM: 16 GB, SSD 512GB\r\nĐồ họa: Intel Iris Plus Graphics\r\nHĐH: Mac OS\r\nNặng: 1.4 kg, Pin: Khoảng 10 giờ\r\n', 'uploads/20200622043910macbook-pro-touch-2020-i5-mwp42sa-a-180620-1056350.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CateID` (`CateID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CateID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orderproduct` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
