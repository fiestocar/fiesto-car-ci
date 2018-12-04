/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - rental_mobil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rental_mobil` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rental_mobil`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_sim` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `sandi` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id_anggota`),
  KEY `id_wilayah` (`id_wilayah`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_anggota` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`nama_anggota`,`alamat`,`no_ktp`,`no_sim`,`email`,`no_telepon`,`id_wilayah`,`sandi`,`id_kategori`) values 
(1,'Ali Oncom','Jl.Tekukur No.19','1234567890','0987654321','ali@oncom.com','02199996666',2,'poskota',3),
(2,'Ubed Turangga Asmara','Gg.Buntu 88','5678904321','Tidak Punya','silver_kn1ght@yahoo.com','08134567890',3,'ubed',3),
(3,'Francisca Saodah','Jl.Sempit Gg.Guan 41','1111111111','9999999999','sisca98@docomo.jpn','02519990000',1,'francisca',3);

/*Table structure for table `denda` */

DROP TABLE IF EXISTS `denda`;

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_denda` varchar(50) NOT NULL,
  `biaya_denda` int(11) NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `denda` */

insert  into `denda`(`id_denda`,`jenis_denda`,`biaya_denda`) values 
(1,'Tidak Ada',0),
(2,'Lecet',250000),
(3,'Telat',1250000),
(4,'Barang Hilang',5000000),
(5,'Kerusakan',2000000);

/*Table structure for table `detail_transaksi` */

DROP TABLE IF EXISTS `detail_transaksi`;

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_kendaraan` (`id_mobil`),
  CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `penyewaan` (`id_transaksi`),
  CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_transaksi` */

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `id_jenis` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jenis` */

insert  into `jenis`(`id_jenis`,`nama_jenis`) values 
(1,'Minibus'),
(2,'Sedan'),
(3,'Bis');

/*Table structure for table `kategori_anggota` */

DROP TABLE IF EXISTS `kategori_anggota`;

CREATE TABLE `kategori_anggota` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_anggota` */

insert  into `kategori_anggota`(`id_kategori`,`kategori`) values 
(1,'Administrator'),
(2,'Employer'),
(3,'User');

/*Table structure for table `kondisi` */

DROP TABLE IF EXISTS `kondisi`;

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kondisi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kondisi` */

insert  into `kondisi`(`id_kondisi`,`kondisi`) values 
(1,'Siap'),
(2,'Reparasi'),
(3,'Disewa');

/*Table structure for table `mobil` */

DROP TABLE IF EXISTS `mobil`;

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `no_plat` varchar(10) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mobil`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_wilayah` (`id_wilayah`),
  KEY `id_kondisi` (`id_kondisi`),
  CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  CONSTRAINT `mobil_ibfk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id_kondisi`),
  CONSTRAINT `mobil_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `mobil` */

insert  into `mobil`(`id_mobil`,`no_plat`,`merk`,`warna`,`tahun`,`id_jenis`,`id_wilayah`,`harga_sewa`,`id_kondisi`) values 
(1,'D 1060 UA','Nissan Skyline GT-R','Putih','2002',2,3,750000,3),
(2,'D 1234 FF','Toyota Avanza','Metalik','2015',1,3,150000,1),
(3,'B 1515 ZX','Mercedes Benz','Putih','1998',3,2,200000,1),
(4,'F 1451 EN','Daihatsu Xenia','Hitam','2014',1,1,150000,1),
(5,'B 1010 DL','Mazda RX-7','Merah','2005',2,2,550000,1),
(6,'F 1934 EU','Toyota AE86','Putih','1986',2,1,850000,1);

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_denda` int(11) NOT NULL,
  PRIMARY KEY (`id_pengembalian`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_denda` (`id_denda`),
  CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `penyewaan` (`id_transaksi`),
  CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_denda`) REFERENCES `denda` (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengembalian` */

/*Table structure for table `penyewaan` */

DROP TABLE IF EXISTS `penyewaan`;

CREATE TABLE `penyewaan` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_member` (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `penyewaan` */

insert  into `penyewaan`(`id_transaksi`,`id_anggota`,`tanggal`) values 
(1,2,'2018-11-01');

/*Table structure for table `wilayah` */

DROP TABLE IF EXISTS `wilayah`;

CREATE TABLE `wilayah` (
  `id_wilayah` int(10) NOT NULL AUTO_INCREMENT,
  `kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wilayah` */

insert  into `wilayah`(`id_wilayah`,`kota`) values 
(1,'Bogor'),
(2,'Jakarta'),
(3,'Bandung');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
