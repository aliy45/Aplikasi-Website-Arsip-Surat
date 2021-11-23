/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.19-MariaDB : Database - db_arsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_arsip`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`kategori`) values 
(1,'Undangan'),
(2,'Pengumuman'),
(3,'Nota Dinas'),
(4,'Pemberitahuan');

/*Table structure for table `surat` */

DROP TABLE IF EXISTS `surat`;

CREATE TABLE `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomer_surat` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `surat` */

insert  into `surat`(`id`,`nomer_surat`,`id_kategori`,`judul`,`file`,`updated_at`,`created_at`) values 
(4,'2021/PD3/TU/002',4,'Pemberitahuan Penilaian','1637683158_surat pemberitahuan.pdf','2021-11-23 15:59:18','2021-11-23 15:59:18'),
(5,'2021/PD3/TU/003',1,'Surat Undagan Acara','1637683204_surat undangan.pdf','2021-11-23 16:00:04','2021-11-23 16:00:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
