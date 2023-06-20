-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 03:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotless-laundry_dba`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `berat` float DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `berat`, `tanggal_masuk`, `tanggal_selesai`) VALUES
('TR-001', 'id64902dc8', 2.9, '2023-06-16', '2023-06-19'),
('TR-002', 'id64902dc8', 3.8, '2023-06-17', '2023-06-20'),
('TR-003', 'id64902dc8', 4.2, '2023-06-19', '2023-06-22'),
('TR-004', 'id6490ff81', 2.3, '2023-06-20', '2023-06-23'),
('TR-005', 'id6490ff81', 2.5, '2023-06-20', '2023-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone_number` text NOT NULL,
  `address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email_address`, `password`, `phone_number`, `address`) VALUES
('id64902dc8', 'Garett', 'Pfannerstill', 'temp@mail.com', '123', '1-801-973-8579', '5624 Willms Courts, Barrington, RI 02806.'),
('id6490ff81', 'Ericka', 'Crooks', 'temp2@mail.com', '123', '(624) 268-6415', '99895 Lowe Landing Suite 869, Olney, MT 59927 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
