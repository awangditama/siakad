-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2014 at 08:24 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_nim` varchar(12) NOT NULL,
  `hadir` int(1) NOT NULL,
  `id_pertemuan_absensi` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kd_admin` varchar(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama`) VALUES
('admin', 'Yusuf'),
('adm_2', 'Rian');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kuisoner_total_nilai`
--

CREATE TABLE IF NOT EXISTS `detail_kuisoner_total_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kuisoner_total_nilai` int(255) NOT NULL,
  `nilai` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kusioner`
--

CREATE TABLE IF NOT EXISTS `detail_kusioner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kuisoner` int(255) NOT NULL,
  `pilihan` smallint(6) NOT NULL,
  `nilai` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `detail_kusioner`
--

INSERT INTO `detail_kusioner` (`id`, `id_kuisoner`, `pilihan`, `nilai`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` bigint(18) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` smallint(1) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `jabatan`, `no_telp`, `nama`) VALUES
(112410101068, 'Jember', '1992-02-12', 2, 'JL. Doho 12 nomor 43 Kaliwates Jember', 'Dosen Tetap', 888821212, 'iwan'),
(12345, 'Jember', '1987-11-10', 1, 'JL. Bedadung nomor 42 Sumbersari Jember', 'Dosen tetap', 888821212, 'Bayu Taruna W.'),
(12345678910, 'Bondowoso', '2014-01-17', 1, 'Perum Gading blok a 28', 'Dosen tetap', 2147483647, 'Andi Rohman S.TP,M.TP');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `kd_jadwal` varchar(5) NOT NULL,
  `kd_matkul` varchar(5) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `kd_ruang` varchar(5) NOT NULL,
  `hari` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`kd_jadwal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `kd_matkul`, `kd_kelas`, `kd_ruang`, `hari`, `jam`) VALUES
('JW01', 'CSI15', 'KLS02', 'KR01', '2013-10-10', '07:00:08'),
('JW02', 'CSI15', 'KLS01', 'KR01', '2013-10-09', '08:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kat` int(1) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_kat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kat`, `keterangan`) VALUES
(0, 'Pilih Kategori'),
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang'),
(5, 'Jelek');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kd_kls` varchar(5) NOT NULL,
  `nm_kls` varchar(2) NOT NULL,
  PRIMARY KEY (`kd_kls`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kls`, `nm_kls`) VALUES
('KLS01', 'A'),
('KLS02', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `krsdosen`
--

CREATE TABLE IF NOT EXISTS `krsdosen` (
  `kd_krs` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(12) NOT NULL,
  `kd_kls` varchar(5) NOT NULL,
  `kd_matkul` varchar(5) NOT NULL,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`kd_krs`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `krsdosen`
--

INSERT INTO `krsdosen` (`kd_krs`, `nip`, `kd_kls`, `kd_matkul`, `status`) VALUES
(1, '12345678910', 'KLS02', 'MK011', 69);

-- --------------------------------------------------------

--
-- Table structure for table `krsmahasiswa`
--

CREATE TABLE IF NOT EXISTS `krsmahasiswa` (
  `kd_krs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `kd_kls` varchar(5) NOT NULL,
  `kd_matkul` varchar(5) NOT NULL,
  `id_status` int(100) NOT NULL,
  PRIMARY KEY (`kd_krs`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `krsmahasiswa`
--

INSERT INTO `krsmahasiswa` (`kd_krs`, `nim`, `kd_kls`, `kd_matkul`, `id_status`) VALUES
(15, '111710201011', 'KLS02', 'MK011', 69),
(13, '111710201005', 'KLS02', 'MK011', 69),
(14, '111710201009', 'KLS02', 'MK011', 69);

-- --------------------------------------------------------

--
-- Table structure for table `kuisoner`
--

CREATE TABLE IF NOT EXISTS `kuisoner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertemuan` int(255) NOT NULL,
  `nim` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kuisoner`
--

INSERT INTO `kuisoner` (`id`, `id_pertemuan`, `nim`) VALUES
(1, 15, '111710201005');

-- --------------------------------------------------------

--
-- Table structure for table `kuisoner_total_nilai`
--

CREATE TABLE IF NOT EXISTS `kuisoner_total_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `matkul` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `status` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` smallint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('111710201009', '45c48cce2e2d7fbdea1afc51c7c6ad26', 3),
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('12345', 'c4ca4238a0b923820dcc509a6f75849b', 2),
('111710201007', '8f14e45fceea167a5a36dedd4bea2543', 3),
('111710201005', 'e4da3b7fbbce2345d7772b0674a318d5', 3),
('111710201003', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 3),
('111710201001', 'c4ca4238a0b923820dcc509a6f75849b', 3),
('111710201011', '6512bd43d9caa6e02c990b0a82652dca', 3),
('111710201013', 'c51ce410c124a10e0db5e4b97fc2af39', 3),
('111710201015', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 3),
('111710201017', '70efdf2ec9b086079795c442636b55fb', 3),
('111710201019', '1f0e3dad99908345f7439f8ffabdffc4', 3),
('12345678910', '3354045a397621cd92406f1f98cde292', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`) VALUES
('111710201001', 'IRMA TRI WAHYUNI'),
('111710201003', 'TEGUH FITRA W'),
('111710201005', 'ABDUL AFIF'),
('111710201007', 'INA KURNIWANTI'),
('111710201009', 'WENDY DREIFYANA MARSUT'),
('111710201011', 'RISKIANA NURJANNAH'),
('111710201013', 'KUKUH IMAN TRISTIANTO'),
('111710201015', 'HARIYADI'),
('111710201017', 'DIDIK SUGIYANTO'),
('111710201019', 'KHAIRUN NISA'),
('111710201021', 'AHMAD HARIS HASANUDDIN SLAMET'),
('111710201023', 'JUNAIDI ADITYA'),
('111710201025', 'DEWI SOFIAH'),
('111710201027', 'JUDHIK GHAZAN M.'),
('111710201029', 'ANANG SUGIARTO'),
('111710201031', 'DONA DONI SEPTA J.N.'),
('111710201033', 'SAMSUL ARIFIN'),
('111710201035', 'RUSDANI ASHIDIQI'),
('111710201037', 'ADE IMRON ROZIDI'),
('111710201039', 'RACHMAT AGUNG ARYANATA'),
('111710201041', 'NURANI WITYASARI'),
('111710201043', 'MAGRIBY CLARA PUTRI ARIEAN'),
('111710201045', 'MOH.ABDURROHMAN A'),
('111710201047', 'DWI SURYA SETIAHADI'),
('111710201051', 'Fauqi Bilhaq Filahmi'),
('111710201057', 'mohammad ubaydillah'),
('111710201059', 'mika sanjaya'),
('111710201061', 'MIFTAKHUR RONI FADILLAH'),
('111710201063', 'Tanjung Asih Dwi Ariestanti'),
('111710201065', 'Riska Fifi Wulandari');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `kd_matkul` varchar(5) NOT NULL,
  `nm_matkul` varchar(50) NOT NULL,
  `jml_sks` smallint(1) NOT NULL,
  `kd_semester` int(1) NOT NULL,
  PRIMARY KEY (`kd_matkul`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kd_matkul`, `nm_matkul`, `jml_sks`, `kd_semester`) VALUES
('TP13', 'Pengantar Agroindustri', 3, 1),
('TP11', 'Komputasi', 2, 1),
('TP14', 'Teknik Informasi', 1, 2),
('MK011', 'Otomasisasi Agro', 3, 3),
('TP10 ', 'Pengantar Bioteknologi', 3, 2),
('TP03', 'Metodologi Penelitian', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE IF NOT EXISTS `opsi` (
  `id_opsi` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_opsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id_opsi`, `keterangan`) VALUES
(1, 'Disiplin'),
(2, 'Kerjasama'),
(3, 'Tulis'),
(4, 'Lisan'),
(5, 'praktikum');

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE IF NOT EXISTS `pertemuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_status` int(1) NOT NULL,
  `kd_matkul` varchar(5) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `kd_dosen` varchar(12) NOT NULL,
  `minggu_ke` int(3) NOT NULL,
  `nilai_bobot` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id`, `kd_status`, `kd_matkul`, `kd_kelas`, `kd_dosen`, `minggu_ke`, `nilai_bobot`) VALUES
(15, 69, 'MK011', 'KLS02', '12345678910', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan_absensi`
--

CREATE TABLE IF NOT EXISTS `pertemuan_absensi` (
  `id_pertemuan_absensi` int(255) NOT NULL AUTO_INCREMENT,
  `kd_dosen` varchar(12) NOT NULL,
  `kd_matkul` varchar(5) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `kd_status` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pertemuan` int(255) NOT NULL,
  PRIMARY KEY (`id_pertemuan_absensi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan_opsi`
--

CREATE TABLE IF NOT EXISTS `pertemuan_opsi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_pertemuan` int(255) NOT NULL,
  `id_opsi` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pertemuan_opsi`
--

INSERT INTO `pertemuan_opsi` (`id`, `id_pertemuan`, `id_opsi`) VALUES
(5, 15, 3),
(6, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan_opsi_nilai`
--

CREATE TABLE IF NOT EXISTS `pertemuan_opsi_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertemuan_opsi` int(255) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pertemuan_opsi_nilai`
--

INSERT INTO `pertemuan_opsi_nilai` (`id`, `id_pertemuan_opsi`, `nim`, `nilai`) VALUES
(13, 5, '111710201011', '85.00'),
(14, 5, '111710201005', '100.00'),
(15, 5, '111710201009', '100.00'),
(16, 6, '111710201011', '100.00'),
(17, 6, '111710201005', '90.00'),
(18, 6, '111710201009', '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `kd_ruang` varchar(5) NOT NULL,
  `nm_ruang` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_ruang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kd_ruang`, `nm_ruang`) VALUES
('KR01', 'Ruang 1 Mas Soerahman'),
('KR02', 'Ruang 2 Lab Self Accsess');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `kd_semester` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_semester`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`kd_semester`, `nama`) VALUES
(1, 'Genap'),
(2, 'Ganjil'),
(3, 'Pendek');

-- --------------------------------------------------------

--
-- Table structure for table `status_kuliah`
--

CREATE TABLE IF NOT EXISTS `status_kuliah` (
  `kd` int(5) NOT NULL AUTO_INCREMENT,
  `tahun_ajar1` int(4) NOT NULL,
  `tahun_ajar2` int(4) NOT NULL,
  `kd_semester` smallint(2) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`kd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `status_kuliah`
--

INSERT INTO `status_kuliah` (`kd`, `tahun_ajar1`, `tahun_ajar2`, `kd_semester`, `status`) VALUES
(69, 2013, 2014, 2, 1),
(83, 2009, 2010, 3, 0),
(82, 2010, 2011, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_login`
--

CREATE TABLE IF NOT EXISTS `type_login` (
  `kd_type` smallint(1) NOT NULL,
  `nama` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_login`
--

INSERT INTO `type_login` (`kd_type`, `nama`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
