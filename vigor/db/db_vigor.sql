/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 5.5.16 : Database - db_vigor
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_vigor` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_vigor`;

/*Table structure for table `tbarang` */

DROP TABLE IF EXISTS `tbarang`;

CREATE TABLE `tbarang` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `namaBrg` varchar(250) DEFAULT NULL,
  `hargaBrg` int(200) DEFAULT NULL,
  `stockBrg` int(200) DEFAULT NULL,
  `sisaBrg` int(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbarang` */

insert  into `tbarang`(`id`,`namaBrg`,`hargaBrg`,`stockBrg`,`sisaBrg`) values 
(1,'sepatu',20000,50,50),
(2,'baju',30000,50,50);

/*Table structure for table `tboking` */

DROP TABLE IF EXISTS `tboking`;

CREATE TABLE `tboking` (
  `kdBoking` bigint(20) NOT NULL AUTO_INCREMENT,
  `noInvoice` varchar(20) NOT NULL,
  `tglInvoice` date NOT NULL,
  `usernameBoking` varchar(100) NOT NULL,
  `an` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `totalBayar` double NOT NULL,
  `statusBayar` char(1) NOT NULL,
  `kdLapangan` varchar(20) NOT NULL,
  `kdJam` varchar(20) NOT NULL,
  `updatetime` datetime NOT NULL,
  `transfer` tinytext,
  `kd_item` varchar(20) DEFAULT NULL,
  `qty_item` int(20) DEFAULT NULL,
  `kdLapangan2` varchar(20) DEFAULT NULL,
  `kdJam2` varchar(20) DEFAULT NULL,
  `kd_item2` varchar(20) DEFAULT NULL,
  `qty_item2` varchar(20) DEFAULT NULL,
  `totalBayar2` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kdBoking`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `tboking` */

insert  into `tboking`(`kdBoking`,`noInvoice`,`tglInvoice`,`usernameBoking`,`an`,`alamat`,`email`,`kontak`,`totalBayar`,`statusBayar`,`kdLapangan`,`kdJam`,`updatetime`,`transfer`,`kd_item`,`qty_item`,`kdLapangan2`,`kdJam2`,`kd_item2`,`qty_item2`,`totalBayar2`,`action`) values 
(55,'INV-000001','2019-08-22','','Rajif','','rajif@gmail.com','0893473743',120000,'L','1','1','2019-08-10 08:57:28','20190810042748.jpg','1',1,'2','1','2','1','180000','update'),
(56,'INV-000002','2019-08-12','silvia','Silvia Pajriati','Batuceper','silviapajriati@gmail.com','089651955916',110000,'B','1','1','2019-08-10 09:23:46',NULL,'1',1,'2','3','0','1','140000','update'),
(57,'INV-000003','2019-08-10','silvia','Silvia Pajriati','Batuceper','silviapajriati@gmail.com','089651955916',110000,'B','1','1','2019-08-09 19:59:32',NULL,'1',1,NULL,NULL,NULL,NULL,NULL,NULL),
(58,'INV-000004','2019-08-11','silvia','Silvia Pajriati','Batuceper','silviapajriati@gmail.com','089651955916',120000,'L','2','1','2019-08-09 20:07:31','20190809151907.JPG','2',1,NULL,NULL,NULL,NULL,NULL,NULL),
(59,'INV-000005','2019-08-13','silvia','Silvia Pajriati','Batuceper','silviapajriati@gmail.com','089651955916',110000,'L','2','1','2019-08-09 20:08:45','20190809151746.jpg','1',1,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tboking_temp` */

DROP TABLE IF EXISTS `tboking_temp`;

CREATE TABLE `tboking_temp` (
  `kdBokingTemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `kdJadwal` int(5) NOT NULL,
  `nomorLapangan` int(5) NOT NULL,
  `tglBokingTemp` date NOT NULL,
  `jamBokingTemp` varchar(20) NOT NULL,
  `hargaTemp` double NOT NULL,
  `subTotalTemp` double NOT NULL,
  `idSession` varchar(100) NOT NULL,
  PRIMARY KEY (`kdBokingTemp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tboking_temp` */

/*Table structure for table `tdiskon` */

DROP TABLE IF EXISTS `tdiskon`;

CREATE TABLE `tdiskon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tdiskon` */

insert  into `tdiskon`(`id`,`nama`,`jumlah`,`status`) values 
(1,'promo',10000,1);

/*Table structure for table `thalamanstatis` */

DROP TABLE IF EXISTS `thalamanstatis`;

CREATE TABLE `thalamanstatis` (
  `kdHalaman` int(1) NOT NULL AUTO_INCREMENT,
  `profil` longtext NOT NULL,
  `caraBoking` longtext NOT NULL,
  PRIMARY KEY (`kdHalaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `thalamanstatis` */

/*Table structure for table `tjadwal` */

DROP TABLE IF EXISTS `tjadwal`;

CREATE TABLE `tjadwal` (
  `kdJadwal` bigint(20) NOT NULL AUTO_INCREMENT,
  `tglJadwal` date NOT NULL,
  `kdLapangan` int(5) NOT NULL,
  `kdJam` int(5) NOT NULL,
  `harga` double NOT NULL,
  `statusBoking` char(1) NOT NULL,
  `noInvoice` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdJadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `tjadwal` */

insert  into `tjadwal`(`kdJadwal`,`tglJadwal`,`kdLapangan`,`kdJam`,`harga`,`statusBoking`,`noInvoice`) values 
(44,'2019-08-22',2,1,180000,'L','INV-000001'),
(45,'2019-08-12',2,1,140000,'B','INV-000002'),
(46,'2019-08-07',2,1,90000,'B','INV-000003'),
(47,'2019-08-10',1,1,110000,'B','INV-000003'),
(48,'2019-08-11',2,1,120000,'B','INV-000004'),
(49,'2019-08-13',2,1,110000,'B','INV-000005');

/*Table structure for table `tjam` */

DROP TABLE IF EXISTS `tjam`;

CREATE TABLE `tjam` (
  `kdJam` int(5) NOT NULL AUTO_INCREMENT,
  `jam` varchar(20) NOT NULL,
  PRIMARY KEY (`kdJam`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tjam` */

insert  into `tjam`(`kdJam`,`jam`) values 
(1,'08:00'),
(2,'09:00'),
(3,'10:00'),
(4,'11:00'),
(5,'12:00'),
(6,'13:00'),
(7,'14:00'),
(8,'15:00'),
(9,'16:00'),
(10,'17:00'),
(11,'18:00'),
(12,'19:00'),
(13,'20:00'),
(14,'21:00'),
(15,'22:00'),
(16,'23:00'),
(17,'24:00');

/*Table structure for table `tlapangan` */

DROP TABLE IF EXISTS `tlapangan`;

CREATE TABLE `tlapangan` (
  `kdLapangan` int(5) NOT NULL AUTO_INCREMENT,
  `noLapangan` int(5) NOT NULL,
  `gambarLapangan` varchar(1000) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` int(20) DEFAULT NULL,
  PRIMARY KEY (`kdLapangan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tlapangan` */

insert  into `tlapangan`(`kdLapangan`,`noLapangan`,`gambarLapangan`,`deskripsi`,`harga`) values 
(1,1,'757a91448d779d6a42052f8235338fa4lapangan futsal.jpg','Lapangan Footsal Sintesis\r\nTes Konten Tes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes KontenTes Konten',100000),
(5,2,'26cdd80c12698df1e14fd18d19101709BEM FE.jpg','Lapangan nomer 2',150000);

/*Table structure for table `tmember` */

DROP TABLE IF EXISTS `tmember`;

CREATE TABLE `tmember` (
  `kdMember` bigint(20) NOT NULL AUTO_INCREMENT,
  `usermember` varchar(100) NOT NULL,
  `passmember` varchar(100) NOT NULL,
  `nmLengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `emailMember` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `fotoMember` varchar(1000) NOT NULL,
  `aktif` char(1) NOT NULL,
  PRIMARY KEY (`kdMember`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tmember` */

insert  into `tmember`(`kdMember`,`usermember`,`passmember`,`nmLengkap`,`alamat`,`emailMember`,`kontak`,`fotoMember`,`aktif`) values 
(2,'Boogye32','bab4323aa802419218e4f7ff43cc4ba9','Budi Hermawan','Jl.kebakir','mail.budihermawan@gmail.com','0821008911','e2cea35294e2c56ea8ebfa2aaad4acb7profile_user.jpg','Y'),
(3,'rajifmahendra','827ccb0eea8a706c4c34a16891f84e7b','Rajif','cipondoh','rajif@gmail.com','0892138123','','Y'),
(4,'silvia','e5cb7c411f1d9a67f68deff4a954cfbc','Silvia Pajriati','Batuceper','silviapajriati@gmail.com','089651955916','','Y');

/*Table structure for table `tpayment` */

DROP TABLE IF EXISTS `tpayment`;

CREATE TABLE `tpayment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `noInvoice` varchar(50) DEFAULT NULL,
  `totalBayar` varchar(200) DEFAULT NULL,
  `type_rek` varchar(200) DEFAULT NULL,
  `an_rek` varchar(200) DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tpayment` */

insert  into `tpayment`(`id`,`noInvoice`,`totalBayar`,`type_rek`,`an_rek`,`updatetime`) values 
(1,'INV-000005','110000','bca','silvia','2019-08-09 20:17:46'),
(2,'INV-000004','120000','BCA','silvia paj','2019-08-09 20:19:07'),
(3,'INV-000001','120000','MANDIRI','Silvia Pajriati','2019-08-10 09:27:48');

/*Table structure for table `tpengguna` */

DROP TABLE IF EXISTS `tpengguna`;

CREATE TABLE `tpengguna` (
  `kdPengguna` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nmPengguna` varchar(100) NOT NULL,
  `emailPengguna` varchar(100) NOT NULL,
  `alamatPengguna` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `aktif` char(1) NOT NULL,
  PRIMARY KEY (`kdPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tpengguna` */

insert  into `tpengguna`(`kdPengguna`,`username`,`password`,`nmPengguna`,`emailPengguna`,`alamatPengguna`,`kontak`,`aktif`) values 
(1,'admin','d41d8cd98f00b204e9800998ecf8427e','administrator','mail.administaror@gmail.com','Jl.M.Yamin Gg.Usaha Baru','082188991010','Y');

/*Table structure for table `transaksi_brg` */

DROP TABLE IF EXISTS `transaksi_brg`;

CREATE TABLE `transaksi_brg` (
  `id_brg` int(20) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `qty_sewa` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_brg` */

insert  into `transaksi_brg`(`id_brg`,`tgl_sewa`,`qty_sewa`) values 
(1,'2019-08-06',1),
(1,'2019-08-07',1),
(1,'2019-08-06',2),
(1,'2019-08-10',1),
(2,'2019-08-11',1),
(1,'2019-08-13',1),
(1,'2019-08-14',1),
(1,'2019-08-14',1),
(1,'2019-08-16',1),
(1,'2019-08-16',1),
(1,'2019-08-09',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(1,'2019-08-22',1),
(2,'2019-08-22',1);

/*Table structure for table `trincian_boking` */

DROP TABLE IF EXISTS `trincian_boking`;

CREATE TABLE `trincian_boking` (
  `kdRincianBoking` bigint(20) NOT NULL AUTO_INCREMENT,
  `kdBoking` int(5) NOT NULL,
  `noLapangan` int(5) NOT NULL,
  `kdJadwal` int(5) NOT NULL,
  `hargaBoking` double NOT NULL,
  `jamBoking` varchar(15) NOT NULL,
  `tglBoking` varchar(15) NOT NULL,
  `subTotal` double NOT NULL,
  PRIMARY KEY (`kdRincianBoking`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `trincian_boking` */

insert  into `trincian_boking`(`kdRincianBoking`,`kdBoking`,`noLapangan`,`kdJadwal`,`hargaBoking`,`jamBoking`,`tglBoking`,`subTotal`) values 
(10,10,1,11,100000,'08:00','2017-03-15',100000),
(11,11,1,12,100000,'08:00','2017-03-16',100000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
