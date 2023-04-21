/*
SQLyog Ultimate v13.1.1 (32 bit)
MySQL - 10.4.22-MariaDB : Database - tms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tms` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tms`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_plane` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Admin','Sub Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `status` int(11) NOT NULL,
  `superadmin` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`password_plane`,`type`,`status`,`superadmin`,`admin`,`branch`,`created_at`,`updated_at`) values 
(2,'admin','e10adc3949ba59abbe56e057f20f883e','','Admin',1,0,0,'Admin','2022-09-06 10:24:10','2022-09-06 10:24:10');

/*Table structure for table `attend` */

DROP TABLE IF EXISTS `attend`;

CREATE TABLE `attend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `attend_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `attend` */

/*Table structure for table `attendences` */

DROP TABLE IF EXISTS `attendences`;

CREATE TABLE `attendences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attendences` */

insert  into `attendences`(`id`,`student_id`,`class`,`teacher`,`subject`,`result`,`date`,`added_by`,`created_at`,`updated_at`) values 
(1,'1254','1','3','11 Science','1','2023-04-20','admin','2023-04-20 15:30:51','2023-04-20 15:30:51'),
(16,'15540','1','3','11 Science','1','2023-04-21','admin','2023-04-21 10:41:16','2023-04-21 10:41:16');

/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `classes` */

/*Table structure for table `elocutioncategories` */

DROP TABLE IF EXISTS `elocutioncategories`;

CREATE TABLE `elocutioncategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `elocutioncategories` */

/*Table structure for table `elocutionpayments` */

DROP TABLE IF EXISTS `elocutionpayments`;

CREATE TABLE `elocutionpayments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `elocution_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `elocutionpayments` */

/*Table structure for table `expensecategories` */

DROP TABLE IF EXISTS `expensecategories`;

CREATE TABLE `expensecategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ex_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `expensecategories` */

insert  into `expensecategories`(`id`,`ex_title`,`amount`,`description`,`IsDeleted`,`created_at`,`updated_at`) values 
(1,'Electricity Bill',0.00,NULL,0,'2023-04-19 05:56:36','2023-04-19 06:00:07'),
(2,'Water Bill',0.00,NULL,0,'2023-04-19 05:57:44','2023-04-19 05:57:44'),
(3,'Building Rent',0.00,NULL,0,'2023-04-19 05:58:54','2023-04-19 05:58:54'),
(4,'Uniform Charges',0.00,NULL,0,'2023-04-19 05:59:21','2023-04-19 05:59:21');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `expense_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `expenses` */

/*Table structure for table `feescats` */

DROP TABLE IF EXISTS `feescats`;

CREATE TABLE `feescats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fe_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feescats` */

/*Table structure for table `feestemps` */

DROP TABLE IF EXISTS `feestemps`;

CREATE TABLE `feestemps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feestemps` */

/*Table structure for table `logins` */

DROP TABLE IF EXISTS `logins`;

CREATE TABLE `logins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `logins` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2022_08_29_073043_create_classes_table',2),
(4,'2022_08_29_073147_create_tutions_table',2),
(5,'2022_08_29_132756_create_attendences_table',3),
(6,'2022_08_29_133155_create_payments_table',3),
(7,'2022_08_29_133331_create_studentincls_table',3),
(8,'2022_08_29_133500_create_logins_table',3),
(9,'2022_08_31_124434_create_students_table',4),
(10,'2022_08_31_125351_create_feestemps_table',5),
(11,'2022_09_03_124946_create_tutiondays_table',6),
(12,'2022_09_03_134929_create_studentsfees_table',7),
(13,'2022_09_06_092200_create_admins_table',8),
(14,'2022_09_07_101204_create_teachers_table',9),
(15,'2022_11_26_201407_create_expenses_table',10),
(16,'2022_11_26_201708_create_expensecategories_table',10),
(17,'2022_11_26_201918_create_paymentcategories_table',10),
(18,'2022_11_26_202106_create_elocutioncategories_table',10),
(19,'2022_11_26_202325_create_elocutionpayments_table',10),
(20,'2022_11_27_154817_create_feescats_table',11),
(21,'2022_12_07_122838_create_teacherattends_table',12);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `paymentcategories` */

DROP TABLE IF EXISTS `paymentcategories`;

CREATE TABLE `paymentcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `paymentcategories` */

insert  into `paymentcategories`(`id`,`title`,`amount`,`description`,`IsDeleted`,`created_at`,`updated_at`) values 
(1,'Registration',800.00,NULL,0,'2023-04-20 09:49:49','2023-04-20 09:49:49');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `payment_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `payment_res` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payments` */

insert  into `payments`(`id`,`receipt_no`,`student_id`,`payment_date`,`payment_details`,`total`,`payment_res`,`added_by`,`IsDeleted`,`created_at`,`updated_at`) values 
(1,'1681964417','1254','2023-04-20','[{\"id\":1,\"student_id\":\"1254\",\"amount\":\"800.00\",\"class\":\"1\",\"month_for\":\"\",\"created_at\":\"2023-04-20 09:50:01\",\"updated_at\":\"2023-04-20 09:50:01\"}]',800,'Register','1',0,'2023-04-20 09:50:17','2023-04-20 09:50:17'),
(2,'1681989750','1254','2023-04-20','[{\"id\":2,\"student_id\":\"1254\",\"amount\":\"1000.00\",\"class\":\"1\",\"month_for\":\"2023-04\",\"created_at\":\"2023-04-20 16:51:50\",\"updated_at\":\"2023-04-20 16:51:50\"}]',1000,'Register','1',0,'2023-04-20 16:52:30','2023-04-20 16:52:30'),
(3,'1682045375','1254','2023-04-21','[{\"id\":3,\"student_id\":\"1254\",\"amount\":\"1000.00\",\"class\":\"1\",\"month_for\":\"2023-04\",\"created_at\":\"2023-04-21 08:18:19\",\"updated_at\":\"2023-04-21 08:18:19\"}]',1000,'Monthly','1',0,'2023-04-21 08:19:36','2023-04-21 08:19:36'),
(4,'1682047320','15540','2023-04-21','[{\"id\":4,\"student_id\":\"15540\",\"amount\":\"800.00\",\"class\":\"1\",\"month_for\":\"\",\"created_at\":\"2023-04-21 08:50:55\",\"updated_at\":\"2023-04-21 08:50:55\"}]',800,'Register','1',0,'2023-04-21 08:52:00','2023-04-21 08:52:00'),
(5,'1682055381','15540','2023-04-21','[{\"id\":5,\"student_id\":\"15540\",\"amount\":\"1000.00\",\"class\":\"1\",\"month_for\":\"2023-04\",\"created_at\":\"2023-04-21 11:05:47\",\"updated_at\":\"2023-04-21 11:05:47\"}]',1000,'Monthly','1',0,'2023-04-21 11:06:21','2023-04-21 11:06:21'),
(9,'1682055748','15540','2023-04-21','[{\"id\":6,\"student_id\":\"15540\",\"amount\":\"1000.00\",\"class\":\"1\",\"month_for\":\"2023-04\",\"created_at\":\"2023-04-21 11:09:21\",\"updated_at\":\"2023-04-21 11:09:21\"}]',1200,'Monthly','1',0,'2023-04-21 11:12:28','2023-04-21 11:12:28'),
(10,'1682055966','15540','2023-04-21','[{\"id\":7,\"student_id\":\"15540\",\"amount\":\"1000.00\",\"class\":\"1\",\"month_for\":\"2023-03\",\"created_at\":\"2023-04-21 11:15:56\",\"updated_at\":\"2023-04-21 11:15:56\"}]',1000,'Monthly','1',0,'2023-04-21 11:16:06','2023-04-21 11:16:06');

/*Table structure for table `studentincls` */

DROP TABLE IF EXISTS `studentincls`;

CREATE TABLE `studentincls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees_type` enum('FREE_CARD','HALF_CARD','CHARGE') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `studentincls` */

insert  into `studentincls`(`id`,`student`,`class`,`fees_type`,`join_date`,`created_at`,`updated_at`) values 
(1,'PL001','1',NULL,'2023-04-19','2023-04-19 19:10:40','2023-04-19 19:10:40'),
(2,'1254','1','FREE_CARD','2023-04-20','2023-04-20 09:49:03','2023-04-20 14:03:26'),
(4,'15540','1','CHARGE','2023-04-21','2023-04-21 08:40:56','2023-04-21 08:40:56');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admission_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `grade` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` int(20) NOT NULL,
  `whatsapp` int(11) NOT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_mobile` int(20) DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(8,2) NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `barcode` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`admission_num`,`first_name`,`last_name`,`birth`,`grade`,`address`,`email`,`contact`,`whatsapp`,`parent_name`,`parent_mobile`,`branch`,`Image`,`fee`,`IsDeleted`,`added_by`,`created_at`,`updated_at`,`barcode`) values 
(18,'12432','tst','test','2023-04-05',0,'rtrtrt',NULL,6677445,2147483647,'tst',NULL,'0','12432.png',0.00,0,'Admin','2023-04-20 09:42:36','2023-04-20 12:40:40','12432.png'),
(19,'1254','sadun','sudaraka','1999-02-12',0,'tst road tester',NULL,757874544,757455845,'test parent',784451555,'','1254.png',0.00,0,'Admin','2023-04-20 09:48:50','2023-04-20 12:32:29','1254.png'),
(20,'15540','shalik','lakruwan','2002-05-01',0,'rdrdrdg  gdfgdg , hhhgfhgfh',NULL,774514251,742444545,'test parent',784451555,'','15540.png',0.00,0,'Admin','2023-04-21 08:25:53','2023-04-21 09:10:27','15540.png');

/*Table structure for table `studentsfees` */

DROP TABLE IF EXISTS `studentsfees`;

CREATE TABLE `studentsfees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tution_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_for_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `fees` int(11) NOT NULL,
  `status` enum('Paid','NotPaid') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `studentsfees` */

insert  into `studentsfees`(`id`,`student_code`,`tution_code`,`month_for_pay`,`payment_date`,`fees`,`status`,`added_by`,`created_at`,`updated_at`) values 
(1,'12432','NotPaid','2023-04','0000-00-00',0,NULL,'','2023-04-20 16:12:25','2023-04-20 16:12:25'),
(2,'1254','Paid','2023-04','2023-04-21',1000,NULL,'Admin','2023-04-20 16:12:25','2023-04-21 08:19:36'),
(3,'15540','1','2023-03','2023-04-21',1000,NULL,'','2023-04-21 11:16:06','2023-04-21 11:16:06');

/*Table structure for table `teacherattends` */

DROP TABLE IF EXISTS `teacherattends`;

CREATE TABLE `teacherattends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teacherattends` */

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`id`,`first_name`,`last_name`,`dob`,`address`,`email`,`contact`,`branch`,`added_by`,`IsDeleted`,`created_at`,`updated_at`) values 
(1,'Test','Test','2023-03-07','Teatwyway','test@gmail.com',776043337,'PL','Admin',1,'2023-03-08 07:53:30','2023-04-19 19:14:05'),
(2,'test teacher','pilimathalawa','2000-02-10','D.S.Senanayake street','nmdskandy@gmail.com',755698240,'PL','Admin',1,'2023-04-19 05:05:42','2023-04-19 19:14:10'),
(3,'Test','Test','2023-04-19','Test teset','test@gmail.com',776043337,'PL','Admin',0,'2023-04-19 20:20:08','2023-04-19 20:20:08'),
(4,'asd','zx','2023-04-05','ax',NULL,755698240,'PL','Admin',0,'2023-04-19 21:01:35','2023-04-20 14:15:20');

/*Table structure for table `tutiondays` */

DROP TABLE IF EXISTS `tutiondays`;

CREATE TABLE `tutiondays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tution_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tution_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tutiondays` */

insert  into `tutiondays`(`id`,`tution_code`,`tution_date`,`status`,`created_at`,`updated_at`) values 
(1,'1','2023-04-20',1,'2023-04-20 19:00:02','2023-04-20 15:22:02'),
(2,'1','2023-04-21',1,'2023-04-21 09:11:35','2023-04-21 09:11:35'),
(3,'2','2023-04-21',1,'2023-04-21 09:11:35','2023-04-21 09:11:35');

/*Table structure for table `tutions` */

DROP TABLE IF EXISTS `tutions`;

CREATE TABLE `tutions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` int(11) NOT NULL,
  `days` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `monday` tinyint(4) NOT NULL DEFAULT 0,
  `tuesday` tinyint(4) NOT NULL DEFAULT 0,
  `wednesday` tinyint(4) NOT NULL DEFAULT 0,
  `thursday` tinyint(4) NOT NULL DEFAULT 0,
  `friday` tinyint(4) NOT NULL DEFAULT 0,
  `saturday` tinyint(4) NOT NULL DEFAULT 0,
  `sunday` tinyint(4) NOT NULL DEFAULT 0,
  `IsDeleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tutions` */

insert  into `tutions`(`id`,`grade`,`teacher`,`time`,`subject`,`fees`,`days`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`sunday`,`IsDeleted`,`created_at`,`updated_at`) values 
(1,'11','3','8.00-10.00','11 Science',1000,'monday,tuesday,wednesday,thursday,friday,saturday,sunday',0,0,0,0,0,0,0,0,'2023-04-19 19:09:52','2023-04-20 15:27:05'),
(2,'10','4','8.00-10.00','10 Maths',1500,'monday',0,0,0,0,0,0,0,0,'2023-04-20 16:39:49','2023-04-20 16:39:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
