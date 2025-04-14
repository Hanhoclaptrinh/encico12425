-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 11:56 AM
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
-- Database: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `mada` varchar(255) NOT NULL,
  `tenda` varchar(100) NOT NULL,
  `ddiem_da` text DEFAULT NULL,
  `phg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`mada`, `tenda`, `ddiem_da`, `phg`) VALUES
('DA001', 'Dự án Nhân sự', 'Hà Nội', 1),
('DA002', 'Dự án Kế hoạch', 'Quy Nhơn', 2),
('DA003', 'Dự án Tài chính', 'Cần Thơ', 3),
('DA004', 'Dự án Kinh doanh', 'Bình Dương', 4),
('DA005', 'Dự án Marketing', 'Nha Trang', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` varchar(255) NOT NULL,
  `honv` varchar(100) NOT NULL,
  `tenlot` varchar(100) NOT NULL,
  `tennv` varchar(100) NOT NULL,
  `gtinh` tinyint(1) DEFAULT NULL,
  `luong` decimal(10,2) DEFAULT NULL,
  `ngsinh` date DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `phg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `honv`, `tenlot`, `tennv`, `gtinh`, `luong`, `ngsinh`, `diachi`, `phg`) VALUES
('NV001', 'Nguyen', 'Thi', 'Anh', 1, 10000.00, '1990-05-15', 'Hà Nội', 1),
('NV002', 'Tran', 'Thi', 'Bich', 1, 12000.00, '1985-03-22', 'Hồ Chí Minh', 2),
('NV003', 'Le', 'Minh', 'Kien', 0, 15000.00, '1988-10-10', 'Đà Nẵng', 3),
('NV004', 'Pham', 'Quoc', 'Toan', 0, 13000.00, '1992-07-08', 'Hà Nội', 4),
('NV005', 'Ngo', 'Thanh', 'Tam', 1, 11000.00, '1995-01-30', 'Hải Phòng', 5),
('NV006', 'Le', 'Vinh', 'Han', 0, 30000.00, '2004-12-07', 'Phú Yên', 6),
('NV007', 'Nguyen Hoang', 'Phuong', 'Anh', 1, 50000.00, '2002-10-15', 'Hà Nội', 10);

-- --------------------------------------------------------

--
-- Table structure for table `phancong`
--

CREATE TABLE `phancong` (
  `manv` varchar(255) DEFAULT NULL,
  `mada` varchar(255) DEFAULT NULL,
  `sogio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phancong`
--

INSERT INTO `phancong` (`manv`, `mada`, `sogio`) VALUES
('NV001', 'DA001', 40),
('NV002', 'DA002', 35),
('NV003', 'DA003', 45),
('NV004', 'DA004', 30),
('NV005', 'DA005', 25);

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `phg` int(11) NOT NULL,
  `tenphg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`phg`, `tenphg`) VALUES
(1, 'Nhan su'),
(2, 'Ke hoach'),
(3, 'Tai chinh'),
(4, 'Kinh doanh'),
(5, 'Marketing'),
(6, 'Cong nghe thong tin'),
(7, 'Ky thuat'),
(8, 'IT Helpdesk'),
(9, 'Quan ly'),
(10, 'Truyen thong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`mada`),
  ADD KEY `phg` (`phg`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `phg` (`phg`);

--
-- Indexes for table `phancong`
--
ALTER TABLE `phancong`
  ADD KEY `manv` (`manv`),
  ADD KEY `mada` (`mada`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`phg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `phg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dean`
--
ALTER TABLE `dean`
  ADD CONSTRAINT `dean_ibfk_1` FOREIGN KEY (`phg`) REFERENCES `phongban` (`phg`) ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`phg`) REFERENCES `phongban` (`phg`) ON UPDATE CASCADE;

--
-- Constraints for table `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `phancong_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_ibfk_2` FOREIGN KEY (`mada`) REFERENCES `dean` (`mada`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
