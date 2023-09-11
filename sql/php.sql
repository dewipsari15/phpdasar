/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_sekolah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sekolah` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_sekolah`;

/*Table structure for table `alokasi_mapel` */

DROP TABLE IF EXISTS `alokasi_mapel`;

CREATE TABLE `alokasi_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mapel` (`id_mapel`),
  KEY `fk_kelas` (`id_kelas`),
  CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alokasi_mapel` */

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mapel` (`id_mapel`),
  CONSTRAINT `id_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `guru` */

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat_kelas` varchar(255) NOT NULL,
  `jurusan_kelas` varchar(255) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_walikelas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sekolah` (`id_sekolah`),
  KEY `fk_walikelas` (`id_walikelas`),
  CONSTRAINT `fk_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`),
  CONSTRAINT `fk_walikelas` FOREIGN KEY (`id_walikelas`) REFERENCES `walikelas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kelas` */

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mapel` */

/*Table structure for table `sekolah` */

DROP TABLE IF EXISTS `sekolah`;

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sekolah` */

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

/*Table structure for table `walikelas` */

DROP TABLE IF EXISTS `walikelas`;

CREATE TABLE `walikelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_guru` (`id_guru`),
  CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `walikelas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
