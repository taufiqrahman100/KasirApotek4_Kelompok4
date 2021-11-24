-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 03:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumberrejeki`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IdPengguna` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pasword` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NoHp` varchar(16) NOT NULL,
  `Posisi` varchar(25) NOT NULL,
  `Status` int(11) NOT NULL,
  `Alamat` text NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdPengguna`, `Username`, `Pasword`, `Email`, `NoHp`, `Posisi`, `Status`, `Alamat`, `foto`) VALUES
(2, 'Rivaldi', '$2y$12$2ucO4TIbo7XLAOZrjMK.P.YFT0jujCzGVYmRxs6r37jvcyh.ZCbM2', 'riv74@gmail.com', '085801979435', 'Admin', 1, 'Banjarjo Kragilan Gantiwarno Klaten', 'Valdi.png'),
(21, 'Valda', '$2y$10$j4NAZx/0kJbhsPJPsyK2p.k3eRLZ/5OgDgHXL0g/zsv/eslb9Xdv6', 'rivaldamuhamad96@gmail.com', '08979792421', 'Kasir', 0, 'Dadaha Tasikmalaya', 'baseline_person_black_36dp.png'),
(22, 'Erti', '$2y$10$yvW8dnv03beDAvWUoAbzt.EBOQ485Cn8QiyB9w9GSdk/HKtath3qG', 'ertiarora@gmail.com', '087811940766', 'Kasir', 1, 'Jl Empang Sari', 'baseline_person_black_36dp.png'),
(23, 'Valda', '$2y$10$uT4UYi.duSXvMz9B1Wegv.BbVlD6lYZhB9EgGqC2C.ZMDoUQn6q9K', 'rivaldamuhamad@gmail.com', '025222863', 'Kasir', 1, 'Dadaga', 'baseline_person_black_36dp.png');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `idMerek` int(11) NOT NULL,
  `NamaBarang` varchar(100) NOT NULL,
  `Stock` float NOT NULL,
  `Harga` float NOT NULL,
  `Gambar` text NOT NULL,
  `IdFarian` int(11) NOT NULL,
  `IdSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `idMerek`, `NamaBarang`, `Stock`, `Harga`, `Gambar`, `IdFarian`, `IdSatuan`) VALUES
(1, 1, 'Semen', 30, 55000, 'download.jpg', 1, 1),
(2, 4, 'Pintu Kamar Mandi', 5, 45000, 'p2.jpg', 3, 2),
(4, 3, 'Lem', 19, 5000, '435534_053c1681-e03c-4c59-96d8-bc9a354ae79b_380_380.jpg', 1, 2),
(5, 2, 'Cat Tembok', 20, 75000, 'ambiance-product-1.jpg', 2, 2),
(7, 14, 'Lem', 18, 7000, '1567236473.png', 1, 6),
(21, 12, 'Cat Tembok', 11, 75000, 'download2.jpg', 2, 2),
(22, 15, 'Paku Beton', 50, 8500, '', 1, 11),
(26, 0, 'Paku Beton', 50, 9000, 'paku1.jpeg', 1, 11),
(27, 25, 'Paku Beton', 49, 8500, 'paku2.jpeg', 1, 11);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dtbrg`
-- (See below for the actual view)
--
CREATE TABLE `dtbrg` (
`idBarang` int(11)
,`Merek` varchar(100)
,`NamaBarang` varchar(100)
,`Stock` float
,`Harga` float
,`Gambar` text
,`Satuan` varchar(100)
,`farian` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dtbrng`
-- (See below for the actual view)
--
CREATE TABLE `dtbrng` (
`idBarang` int(11)
,`Merek` varchar(100)
,`NamaBarang` varchar(100)
,`Harga` float
,`Satuan` varchar(100)
,`farian` varchar(80)
);

-- --------------------------------------------------------

--
-- Table structure for table `farian`
--

CREATE TABLE `farian` (
  `IdFarian` int(11) NOT NULL,
  `Farian` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farian`
--

INSERT INTO `farian` (`IdFarian`, `Farian`) VALUES
(1, '-'),
(2, 'Merah'),
(3, 'Pintu Geser'),
(7, 'Biru'),
(8, 'Hijau'),
(11, 'LED');

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`NamaBarang` varchar(100)
,`Merek` varchar(100)
,`Farian` varchar(80)
,`TglTransaksi` date
,`JumlahBeli` float
,`Satuan` varchar(100)
,`Harga` float
,`Username` varchar(50)
,`Subtotal` float
);

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `idMerek` int(11) NOT NULL,
  `Merek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`idMerek`, `Merek`) VALUES
(1, 'Holsim'),
(2, 'Dulax'),
(3, 'Alteco'),
(4, 'Wingking'),
(8, 'Tiga Roda'),
(9, 'Philips'),
(12, 'Nipon Paint'),
(13, 'Gersik'),
(14, 'G'),
(24, 'Rop'),
(25, 'Double Thunders');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `IdBarang` int(11) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `JumlahBeli` float NOT NULL,
  `IdPengguna` int(11) NOT NULL,
  `Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `IdBarang`, `TglTransaksi`, `JumlahBeli`, `IdPengguna`, `Subtotal`) VALUES
(14, 2, '2019-08-22', 1, 4, 45000),
(15, 2, '2019-08-22', 1, 4, 45000),
(16, 5, '2019-08-22', 2, 4, 150000),
(17, 5, '2019-08-22', 2, 4, 150000),
(18, 4, '2019-08-22', 3, 4, 15000),
(19, 2, '2019-08-22', 2, 4, 90000),
(20, 2, '2019-08-22', 2, 4, 90000),
(21, 2, '2019-08-22', 2, 4, 90000),
(22, 5, '2019-08-22', 1, 4, 75000),
(23, 2, '2019-08-26', 10, 4, 450000),
(24, 1, '2019-08-26', 8, 4, 440000),
(25, 1, '2019-08-26', 1, 4, 55000),
(26, 4, '2019-08-26', 3, 4, 15000),
(27, 5, '2019-08-26', 1, 4, 75000),
(28, 4, '2019-08-26', 3, 4, 15000),
(29, 4, '2019-08-26', 2, 4, 10000),
(30, 2, '2019-08-26', 1, 4, 45000),
(31, 1, '2019-08-26', 1, 4, 55000),
(32, 2, '2019-08-26', 2, 4, 90000),
(33, 1, '2019-08-26', 4, 4, 220000),
(34, 5, '2019-08-26', 4, 4, 300000),
(35, 1, '2019-07-17', 1, 6, 55000),
(36, 1, '2019-09-01', 3, 4, 165000),
(37, 21, '2019-09-08', 10, 2, 750000),
(38, 4, '2019-09-08', 10, 2, 50000),
(39, 2, '2019-09-08', 10, 2, 450000),
(40, 1, '2019-09-21', 4, 4, 220000),
(41, 1, '2020-03-21', 1, 12, 55000),
(42, 4, '2020-03-21', 1, 12, 5000),
(43, 7, '2020-03-21', 2, 12, 14000),
(44, 1, '2020-11-21', 2, 12, 110000),
(45, 4, '2020-11-21', 1, 12, 5000),
(46, 1, '2020-11-21', 1, 22, 55000),
(47, 1, '2020-11-21', 1, 23, 55000),
(48, 1, '2020-11-22', 2, 22, 110000),
(49, 5, '2020-11-22', 1, 22, 75000),
(50, 4, '2020-11-22', 1, 22, 5000),
(51, 1, '2020-11-22', 1, 23, 55000),
(52, 27, '2020-11-22', 1, 23, 8500),
(53, 21, '2020-11-22', 1, 23, 75000);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `IdSatuan` int(11) NOT NULL,
  `Satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`IdSatuan`, `Satuan`) VALUES
(1, 'Sak'),
(2, 'Buah'),
(3, 'gram'),
(4, 'Box'),
(5, 'Karung'),
(6, 'Botol'),
(7, 'Centimeter'),
(9, 'Ton'),
(10, 'Kaleng'),
(11, 'Sachet');

-- --------------------------------------------------------

--
-- Table structure for table `simpansementara`
--

CREATE TABLE `simpansementara` (
  `IdPenjualan` int(11) NOT NULL,
  `IdBarang` int(11) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `JumlahBeli` float NOT NULL,
  `IdKasir` int(11) NOT NULL,
  `Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpansementara`
--

INSERT INTO `simpansementara` (`IdPenjualan`, `IdBarang`, `TglTransaksi`, `JumlahBeli`, `IdKasir`, `Subtotal`) VALUES
(30, 1, '2019-07-28', 1, 2, 0),
(31, 1, '2019-07-28', 0, 2, 0),
(32, 1, '2019-07-28', 0, 2, 0),
(33, 4, '2019-07-28', 0, 2, 0),
(34, 5, '2019-07-28', 0, 2, 0),
(35, 2, '2019-07-28', 0, 2, 0),
(36, 4, '2019-07-28', 0, 2, 0),
(37, 2, '2019-07-28', 0, 2, 0),
(38, 2, '2019-07-28', 0, 2, 0),
(39, 1, '2019-07-28', 0, 2, 0),
(40, 2, '2019-07-28', 0, 2, 0),
(41, 1, '2019-07-28', 1, 2, 0),
(42, 4, '2019-07-28', 0, 2, 0),
(43, 1, '2019-07-28', 2, 2, 0),
(44, 4, '2019-07-28', 0, 2, 0),
(45, 1, '2019-07-28', 0, 2, 0),
(46, 2, '2019-07-28', 0, 2, 0),
(47, 2, '2019-07-28', 0, 2, 0),
(48, 2, '2019-07-28', 0, 2, 0),
(49, 2, '2019-07-28', 0, 2, 0),
(50, 2, '2019-07-28', 0, 2, 0),
(51, 1, '2019-07-28', 1, 2, 0),
(52, 2, '2019-07-28', 1, 2, 0),
(53, 1, '2019-07-28', 4, 2, 0),
(54, 4, '2019-07-28', 4, 2, 0),
(55, 4, '2019-07-28', 4, 2, 0),
(56, 1, '2019-07-28', 5, 2, 0),
(57, 2, '2019-07-28', 0, 2, 0),
(58, 4, '2019-07-28', 0, 2, 0),
(59, 2, '2019-07-28', 0, 2, 0),
(60, 2, '2019-07-28', 0, 2, 0),
(61, 2, '2019-07-28', 0, 2, 0),
(62, 1, '2019-07-28', 0, 2, 0),
(63, 2, '2019-07-28', 0, 2, 0),
(64, 1, '2019-07-28', 2, 2, 0),
(65, 2, '2019-07-28', 2, 2, 0),
(66, 2, '2019-07-28', 2, 2, 0),
(67, 1, '2019-07-28', 0, 2, 0),
(68, 2, '2019-07-28', 0, 2, 0),
(69, 4, '2019-07-29', 0, 2, 0),
(70, 4, '2019-07-29', 0, 2, 0);

-- --------------------------------------------------------

--
-- Structure for view `dtbrg`
--
DROP TABLE IF EXISTS `dtbrg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dtbrg`  AS  select `barang`.`idBarang` AS `idBarang`,`merek`.`Merek` AS `Merek`,`barang`.`NamaBarang` AS `NamaBarang`,`barang`.`Stock` AS `Stock`,`barang`.`Harga` AS `Harga`,`barang`.`Gambar` AS `Gambar`,`satuan`.`Satuan` AS `Satuan`,`farian`.`Farian` AS `farian` from (((`barang` join `merek`) join `satuan`) join `farian`) where `merek`.`idMerek` = `barang`.`idMerek` and `satuan`.`IdSatuan` = `barang`.`IdSatuan` and `farian`.`IdFarian` = `barang`.`IdFarian` ;

-- --------------------------------------------------------

--
-- Structure for view `dtbrng`
--
DROP TABLE IF EXISTS `dtbrng`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dtbrng`  AS  select `barang`.`idBarang` AS `idBarang`,`merek`.`Merek` AS `Merek`,`barang`.`NamaBarang` AS `NamaBarang`,`barang`.`Harga` AS `Harga`,`satuan`.`Satuan` AS `Satuan`,`farian`.`Farian` AS `farian` from (((`barang` join `merek`) join `satuan`) join `farian`) where `merek`.`idMerek` = `barang`.`idMerek` and `satuan`.`IdSatuan` = `barang`.`IdSatuan` and `farian`.`IdFarian` = `barang`.`IdFarian` ;

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS  select `barang`.`NamaBarang` AS `NamaBarang`,`merek`.`Merek` AS `Merek`,`farian`.`Farian` AS `Farian`,`penjualan`.`TglTransaksi` AS `TglTransaksi`,`penjualan`.`JumlahBeli` AS `JumlahBeli`,`satuan`.`Satuan` AS `Satuan`,`barang`.`Harga` AS `Harga`,`admin`.`Username` AS `Username`,`penjualan`.`Subtotal` AS `Subtotal` from (((((`penjualan` join `barang`) join `admin`) join `merek`) join `farian`) join `satuan`) where `barang`.`idBarang` = `penjualan`.`IdBarang` and `admin`.`IdPengguna` = `penjualan`.`IdPengguna` and `barang`.`idMerek` = `merek`.`idMerek` and `farian`.`IdFarian` = `barang`.`IdFarian` and `satuan`.`IdSatuan` = `barang`.`IdSatuan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdPengguna`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `farian`
--
ALTER TABLE `farian`
  ADD PRIMARY KEY (`IdFarian`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`idMerek`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`IdSatuan`);

--
-- Indexes for table `simpansementara`
--
ALTER TABLE `simpansementara`
  ADD PRIMARY KEY (`IdPenjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `farian`
--
ALTER TABLE `farian`
  MODIFY `IdFarian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `idMerek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `IdSatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `simpansementara`
--
ALTER TABLE `simpansementara`
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
