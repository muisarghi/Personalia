-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2013 at 03:46 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `personalia`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE IF NOT EXISTS `ahli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `ahli` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`id`, `id_unit`, `ahli`, `ket`) VALUES
(1, 1, 'admin', 'administrasi'),
(2, 1, 'surveyor', 'survey'),
(3, 2, 'Penyiar', 'broadcast');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `jns_award` varchar(255) NOT NULL,
  `award` varchar(255) NOT NULL,
  `ket_award` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `id_unit`, `jns_award`, `award`, `ket_award`) VALUES
(1, 2, 'internal', 'anggota terbuuuuaek', 'juara 2'),
(2, 1, 'Kinerja', 'Paling cepat', 'kompeten');

-- --------------------------------------------------------

--
-- Table structure for table `award_kary`
--

CREATE TABLE IF NOT EXISTS `award_kary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_award` int(11) NOT NULL,
  `ket_awd` varchar(255) NOT NULL,
  `tgl_awd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `award_kary`
--

INSERT INTO `award_kary` (`id`, `id_kary`, `id_award`, `ket_awd`, `tgl_awd`) VALUES
(1, 5, 2, 'Bagus', '01-03-2013');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `ayah` varchar(255) NOT NULL,
  `ibu` varchar(255) NOT NULL,
  `alm_ortu` varchar(255) NOT NULL,
  `istri` varchar(255) NOT NULL,
  `alm_istri` varchar(255) NOT NULL,
  `anak1` varchar(255) NOT NULL,
  `anak2` varchar(255) NOT NULL,
  `anak3` varchar(255) NOT NULL,
  `anak4` varchar(255) NOT NULL,
  `anak5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `id_kary`, `ayah`, `ibu`, `alm_ortu`, `istri`, `alm_istri`, `anak1`, `anak2`, `anak3`, `anak4`, `anak5`) VALUES
(1, 4, 'Rere', 'Rara', 'jl malang sby', 'roro', 'jl sby mlg', 'joko', 'joni', 'joki', 'jono', 'jino');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gol` varchar(255) NOT NULL,
  `ket_gol` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `gol`, `ket_gol`) VALUES
(1, 'Honorerrr', 'honooorrrrrrr'),
(2, 'Tetap', 'pegawai tetap');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_kary` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_bag` int(11) NOT NULL,
  `nama_kary` varchar(255) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto_kary` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `no_kary`, `id_unit`, `id_bag`, `nama_kary`, `jk`, `status`, `foto_kary`) VALUES
(2, '0203198700002', 2, 3, 'treew', '', 'Honorer', '2.jpg'),
(3, '0201198500003', 2, 3, '2324f', '', 'Tetap', '3.jpg'),
(4, '0201199500004', 2, 5, 'TYUR', '', 'Percobaan', '4.jpg'),
(5, '0101198200005', 1, 1, 'Petrov S.Kom', 'Perempuan', 'Belum Menikah', '5.jpg'),
(6, '0201197900006', 2, 3, 'Mr Lent', '', 'Belum Menikah', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_ahli`
--

CREATE TABLE IF NOT EXISTS `karyawan_ahli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_ahli` int(11) NOT NULL,
  `ket_kary_ahli` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `karyawan_ahli`
--

INSERT INTO `karyawan_ahli` (`id`, `id_kary`, `id_ahli`, `ket_kary_ahli`) VALUES
(3, 5, 1, 'BFI X'),
(4, 5, 2, 'opo'),
(5, 6, 3, 'radio makubu'),
(6, 4, 3, 'radio MFM');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_detail`
--

CREATE TABLE IF NOT EXISTS `karyawan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kota_lhr` varchar(255) NOT NULL,
  `tgl_lhr` varchar(50) NOT NULL,
  `alm_kary` varchar(255) NOT NULL,
  `kota_kary` varchar(255) NOT NULL,
  `kec_kary` varchar(255) NOT NULL,
  `telp_kary` varchar(50) NOT NULL,
  `email_kary` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `karyawan_detail`
--

INSERT INTO `karyawan_detail` (`id`, `id_kary`, `ktp`, `kota_lhr`, `tgl_lhr`, `alm_kary`, `kota_kary`, `kec_kary`, `telp_kary`, `email_kary`) VALUES
(1, 1, '', 'Malang', '121991', 'Jl Sby 1', 'Malang', '', '454634', 'vallet@yah.co'),
(2, 2, '', 'Surabaya', '581987', 'Malang1 ', 'Surabaya', '', '76768', 'hghg@iut.co'),
(3, 3, '', 'Malang', '2661985', 'KidulPasar', 'Malang', '', '868674', 'ann@lyo.p'),
(4, 4, '', 'Malang', '1-1-1995', 'Malang', 'Mlanag', '', '343', 'asdas'),
(5, 5, '123123129', 'Malangg', '5-2-1982', 'JL gegeg', 'Malangg', 'Klojeng', '454634g', 'vasd@fsd.kg'),
(6, 6, '0011111', 'Salatiga', '4-3-1979', 'tujuh', 'sepuluh', 'minus', '23213', 'vasd@fsd.kg');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_golongan`
--

CREATE TABLE IF NOT EXISTS `karyawan_golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `ket_kary_gol` varchar(255) NOT NULL,
  `tgl_ttp_gol` varchar(50) NOT NULL,
  `tgl_akh_gol` varchar(50) NOT NULL,
  `jamsostek` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `karyawan_golongan`
--

INSERT INTO `karyawan_golongan` (`id`, `id_kary`, `id_golongan`, `ket_kary_gol`, `tgl_ttp_gol`, `tgl_akh_gol`, `jamsostek`) VALUES
(1, 6, 2, 'weres', '01-03-2013', '28-08-2013', '3433');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_pendd`
--

CREATE TABLE IF NOT EXISTS `karyawan_pendd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_pendd` int(11) NOT NULL,
  `tmp_kary_pendd` varchar(255) NOT NULL,
  `thn_kary_pendd` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `karyawan_pendd`
--

INSERT INTO `karyawan_pendd` (`id`, `id_kary`, `id_pendd`, `tmp_kary_pendd`, `thn_kary_pendd`) VALUES
(1, 6, 2, 'SD Muhammadiyah 1', '1991');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_sertifikat`
--

CREATE TABLE IF NOT EXISTS `karyawan_sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_sertifikat` int(11) NOT NULL,
  `thn_kary_stfkt` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `karyawan_sertifikat`
--

INSERT INTO `karyawan_sertifikat` (`id`, `id_kary`, `id_sertifikat`, `thn_kary_stfkt`) VALUES
(2, 6, 2, ''),
(3, 6, 2, '1990'),
(5, 4, 2, ''),
(6, 6, 1, ''),
(7, 6, 1, '2001');

-- --------------------------------------------------------

--
-- Table structure for table `langgar`
--

CREATE TABLE IF NOT EXISTS `langgar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `jns_langgar` varchar(255) NOT NULL,
  `langgar` varchar(255) NOT NULL,
  `ket_langgar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `langgar`
--

INSERT INTO `langgar` (`id`, `id_unit`, `jns_langgar`, `langgar`, `ket_langgar`) VALUES
(1, 1, 'bolosan', '3hari', 'kurangi 100rb');

-- --------------------------------------------------------

--
-- Table structure for table `langgar_kary`
--

CREATE TABLE IF NOT EXISTS `langgar_kary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_langgar` int(11) NOT NULL,
  `sanksi_lgr` varchar(255) NOT NULL,
  `ket_lgr` varchar(255) NOT NULL,
  `tgl_lgr` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `langgar_kary`
--

INSERT INTO `langgar_kary` (`id`, `id_kary`, `id_langgar`, `sanksi_lgr`, `ket_lgr`, `tgl_lgr`) VALUES
(1, 4, 1, 'maem rumputs', 'serems', '12-02-2013'),
(4, 4, 1, 'asdas', 'dasdsa', '26-03-2013');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE IF NOT EXISTS `mutasi` (
  `id_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_bag` int(11) NOT NULL,
  `id_unit1` int(11) NOT NULL,
  `id_bag1` int(11) NOT NULL,
  `tgl_mutasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_kary`, `id_unit`, `id_bag`, `id_unit1`, `id_bag1`, `tgl_mutasi`) VALUES
(3, 6, 1, 4, 2, 3, '04-03-2013'),
(4, 6, 2, 3, 1, 1, '26-03-2013'),
(5, 6, 1, 4, 1, 1, '04-03-2013'),
(6, 6, 1, 1, 2, 3, '03-03-2013'),
(7, 4, 1, 1, 2, 3, '13-03-2013');

-- --------------------------------------------------------

--
-- Table structure for table `pendd`
--

CREATE TABLE IF NOT EXISTS `pendd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(50) NOT NULL,
  `ket` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pendd`
--

INSERT INTO `pendd` (`id`, `tingkat`, `ket`) VALUES
(1, 'SMAI', 'sekolah menengah atas islam'),
(2, 'SD', 'Sekolah Dasar');

-- --------------------------------------------------------

--
-- Table structure for table `penddno`
--

CREATE TABLE IF NOT EXISTS `penddno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `jns_non` varchar(255) NOT NULL,
  `nama_non` varchar(255) NOT NULL,
  `thn_non` varchar(5) NOT NULL,
  `ket_non` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `penddno`
--

INSERT INTO `penddno` (`id`, `id_kary`, `jns_non`, `nama_non`, `thn_non`, `ket_non`) VALUES
(1, 4, 'Kursus', 'Natuna', '2010', 'latihan mobil'),
(6, 4, 'Diklat', 'sasd', 'sdas', 'dsa');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kary` int(11) NOT NULL,
  `tk` varchar(255) NOT NULL,
  `tk_thn` varchar(5) NOT NULL,
  `sd` varchar(255) NOT NULL,
  `sd_thn` varchar(5) NOT NULL,
  `smp` varchar(255) NOT NULL,
  `smp_thn` varchar(5) NOT NULL,
  `sma` varchar(255) NOT NULL,
  `sma_thn` varchar(5) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `pt_thn` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `id_kary`, `tk`, `tk_thn`, `sd`, `sd_thn`, `smp`, `smp_thn`, `sma`, `sma_thn`, `pt`, `pt_thn`) VALUES
(1, 6, 'Handayanii', '1991', 'Banyuajuh 3i', '1998', 'SMP 4i', '2003', 'SMA 9i', '2006', 'Unigai', '2012'),
(2, 6, 'Handayanii', '1991', 'Banyuajuh 3i', '1998', 'SMP 4i', '2003', 'SMA 9i', '2006', 'Unigai', '2012');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE IF NOT EXISTS `sertifikat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `ket_sertifikat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `id_unit`, `no_sertifikat`, `sertifikat`, `ket_sertifikat`) VALUES
(1, 2, '546455', 'lomba makan krupuk', 'makan krupuk besar'),
(2, 2, '1212', 'Karya Tulis', 'KIR Jaawa Bali');

-- --------------------------------------------------------

--
-- Table structure for table `unit_bagian`
--

CREATE TABLE IF NOT EXISTS `unit_bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `nama_bag` varchar(255) NOT NULL,
  `kode_bag` varchar(5) NOT NULL,
  `ket_bag` varchar(255) NOT NULL,
  `tunjangan` int(10) NOT NULL,
  `gaji` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `unit_bagian`
--

INSERT INTO `unit_bagian` (`id`, `id_unit`, `nama_bag`, `kode_bag`, `ket_bag`, `tunjangan`, `gaji`) VALUES
(1, 1, 'Premium', '01', 'premium', 100000, 1000000),
(3, 2, 'Penyiar', '01', 'ya gitu deh', 500000, 900000),
(4, 1, 'Pertamax', '02', 'pertamaz', 500000, 6000000),
(5, 2, 'On Air', '02', 'teknisi', 800000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama`, `kode`, `keterangan`) VALUES
(1, 'SPBU', '01', 'premium, solar,  pertamax, dll'),
(2, 'Radio', '02', 'on air'),
(4, 'Gas', '03', 'LPG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
