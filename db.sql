/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - bill_create
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bill_create` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `bill_create`;

/*Table structure for table `bill` */

DROP TABLE IF EXISTS `bill`;

CREATE TABLE `bill` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `all_data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_quantity` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `bill` */

insert  into `bill`(`id`,`customer_name`,`all_data`,`total`,`date_created`,`total_quantity`) values 
('1585435448','chi ly','[{\"name\":\"ao co tron\",\"quantity\":\"10\",\"price\":\"100\"},{\"name\":\"ao co tim\",\"quantity\":\"10\",\"price\":\"70\"}]','1.700','2020-03-28 23:44:08',NULL),
('1585435972','','[{\"name\":\"quan jean\",\"quantity\":\"10\",\"price\":\"190\"}]','1.900','2020-03-28 23:52:52',NULL),
('1585437951','','[{\"name\":\"Áo cổ tròn\",\"quantity\":\"10\",\"price\":\"80\"}]','800','2020-03-29 00:25:51','10'),
('1585691474','chi ly','[{\"name\":\"hang 1\",\"quantity\":\"10\",\"price\":\"10\"},{\"name\":\"bill cu\",\"quantity\":\"\",\"price\":\"\"}]','200','2020-03-31 23:51:14','NaN'),
('1585691656','chi ly','[{\"name\":\"Hang 1\",\"quantity\":\"10\",\"price\":\"100\"},{\"name\":\"Bill cu\",\"quantity\":\"\",\"price\":\"\"}]','1.500','2020-03-31 23:54:16','10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
