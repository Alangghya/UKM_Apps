-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2011 at 01:25 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prak_ukm`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_siswa`
--

CREATE TABLE IF NOT EXISTS `detail_siswa` (
  `ID_UKM` int(11) NOT NULL,
  `ID_Siswa_Ikut` int(11) NOT NULL,
  `Tanggal_Registrasi` datetime NOT NULL,
  `Tanggal_Selesai` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_siswa`
--

INSERT INTO `detail_siswa` (`ID_UKM`, `ID_Siswa_Ikut`, `Tanggal_Registrasi`, `Tanggal_Selesai`) VALUES
(2, 2, '2011-10-20 00:00:00', '0000-00-00 00:00:00'),
(2, 5, '2011-10-20 00:00:00', '0000-00-00 00:00:00'),
(0, 0, '2011-12-09 00:25:41', '0000-00-00 00:00:00'),
(3, 2, '2011-10-21 11:13:18', '0000-00-00 00:00:00'),
(5, 5, '2011-12-09 00:26:53', '0000-00-00 00:00:00'),
(1, 5, '2011-12-09 00:36:44', '0000-00-00 00:00:00'),
(4, 5, '2011-12-09 00:47:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `ID_Siswa_Pembuat` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Siswa_Pembuat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID_Siswa_Pembuat`, `Nama`, `Password`) VALUES
(5, 'aruna', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'pek', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'yoga', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `ID_UKM` int(11) NOT NULL AUTO_INCREMENT,
  `NamaUKM` varchar(50) NOT NULL,
  `ID_Siswa_Pembuat` int(11) NOT NULL,
  PRIMARY KEY (`ID_UKM`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`ID_UKM`, `NamaUKM`, `ID_Siswa_Pembuat`) VALUES
(1, 'Chapel Worship', 2),
(2, 'Sok-Sokan Bareng Pek, ', 2),
(3, 'Coding Mania Wenak', 5),
(4, 'Coding PHP Iki', 5),
(5, 'Prak Java', 5),
(6, 'Menimbang Makanan Angin', 2),
(7, 'Ngedrum Sok', 2),
(8, 'COba aja deh', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
