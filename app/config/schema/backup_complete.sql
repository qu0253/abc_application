/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.33-31.1 : Database - quadzero_abc_app
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Data for the table `auditor_types` */

insert  into `auditor_types`(`id`,`auditor_type_name`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Bureau Auditor',1,NULL,NULL,NULL,NULL),(2,'Publisher Auditor',1,NULL,NULL,NULL,NULL),(3,'Empannelled Auditor',1,NULL,NULL,NULL,NULL);

/*Data for the table `center_types` */

insert  into `center_types`(`id`,`center_type_name`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Single Edition',1,'2014-01-03 11:35:08',1,'2014-01-03 11:35:08',1),(2,'Multi Edition',1,'2014-01-03 11:35:19',1,'2014-01-03 11:35:19',1),(3,'Multi Printing Centre',1,'2014-01-03 11:35:33',1,'2014-01-03 11:35:33',1),(4,'Multi Edition & Multi Printing Centre',1,'2014-01-03 11:35:48',1,'2014-01-03 11:35:48',1);

/*Data for the table `company_types` */

insert  into `company_types`(`id`,`company_type_name`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Partnership',1,'2014-01-03 09:50:14',1,'2014-01-07 11:48:35',1),(2,'Limited Company',0,'2014-01-03 09:50:24',1,'2014-01-08 12:04:15',1),(3,'Proprietorship',0,'2014-01-06 17:03:49',1,'2014-01-06 17:03:49',1),(4,'Private Limited Company',0,'2014-01-06 17:04:27',1,'2014-01-06 17:04:27',1),(5,'Govt. Organization',0,'2014-01-08 10:39:51',1,'2014-01-08 10:49:38',1),(6,'Trusts',0,'2014-01-08 10:41:49',1,'2014-01-08 10:41:49',1),(7,'Public Limited Company',0,'2014-01-08 10:45:00',1,'2014-01-08 10:45:00',1),(8,'Community Interest Company',0,'2014-01-08 10:47:02',1,'2014-01-08 10:47:02',1),(9,'Charitable incorporated organization',0,'2014-01-08 10:48:33',1,'2014-01-08 10:48:33',1),(13,'Non Govt. Organisation',1,NULL,NULL,NULL,NULL);

/*Data for the table `countries` */

insert  into `countries`(`id`,`country_name`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'India',1,'2014-01-03 09:44:19',1,'2014-01-08 04:45:40',1),(2,'Outside India',1,'2014-01-03 09:44:43',1,'2014-01-03 09:44:43',1);

/*Data for the table `frequencies` */

insert  into `frequencies`(`id`,`frequency_name`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Daily',1,'2014-01-03 11:27:31',1,'2014-01-03 11:27:31',1),(2,'Weekly',1,'2014-01-03 11:27:46',1,'2014-01-03 11:27:46',1),(3,'Fortnightly',1,'2014-01-03 11:28:14',1,'2014-01-03 11:28:14',1),(4,'Monthly',1,'2014-01-03 11:28:29',1,'2014-01-03 11:28:29',1),(5,'Quarterly',1,NULL,NULL,NULL,NULL),(6,'Annual',1,NULL,NULL,NULL,NULL),(7,'Magazines',1,NULL,NULL,NULL,NULL),(8,'Daily - Sunday',0,'2014-01-08 23:53:20',1,'2014-01-08 23:55:08',1),(9,'Daily - Saturday',0,'2014-01-08 23:53:49',1,'2014-01-08 23:53:49',1),(10,'Daily Except Saturday  & Sunday',0,'2014-01-08 23:54:23',1,'2014-01-08 23:55:49',1),(11,'Daily Except Saturday',0,'2014-01-08 23:57:35',1,'2014-01-08 23:57:35',1),(12,'Daily Except Sunday',0,'2014-01-08 23:57:57',1,'2014-01-08 23:57:57',1);

/*Data for the table `languages` */

insert  into `languages`(`id`,`language_name`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'English',1,'2014-01-03 11:30:59',1,'2014-01-03 11:30:59',1),(2,'Hindi',1,'2014-01-03 11:31:07',1,'2014-01-03 11:31:07',1),(3,'Bilingual - Hindi/English\r\n',1,'2014-01-03 11:31:20',1,'2014-01-03 11:31:20',1),(4,'Assamese',1,'2014-01-03 11:31:32',1,'2014-01-03 11:31:32',1),(5,'Bengali',1,'2014-01-03 11:31:51',1,'2014-01-03 11:31:51',1),(6,'Gujarati',1,NULL,NULL,NULL,NULL),(7,'Kannada\r\n',1,NULL,NULL,NULL,NULL),(8,'Khasi\r\n',1,NULL,NULL,NULL,NULL),(9,'Malayalam\r\n',1,NULL,NULL,NULL,NULL),(10,'Manipuri',1,NULL,NULL,NULL,NULL),(11,'Marathi',1,NULL,NULL,NULL,NULL),(12,'Nepali',1,NULL,NULL,NULL,NULL),(13,'Oriya\r\n',1,NULL,NULL,NULL,NULL),(14,'Punjabi',1,NULL,NULL,NULL,NULL),(15,'Tamil',1,NULL,NULL,NULL,NULL),(16,'Telugu',1,NULL,NULL,NULL,NULL),(17,'Urdu',1,NULL,NULL,NULL,NULL);

/*Data for the table `membership_types` */

insert  into `membership_types`(`id`,`membership_type_code`,`membership_type_name`,`description`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'AD','Advertiser','',1,'2014-01-03 09:51:24',1,'2014-01-09 05:11:16',1),(2,'AA','Advertising Agencies','',1,'2014-01-03 09:52:17',1,'2014-01-09 05:11:30',1),(3,'GO','Govt. Organization','',1,'2014-01-03 09:52:58',1,'2014-01-03 09:52:58',1),(4,'NGO','Non Govt. Organaization','',1,'2014-01-03 09:53:40',1,'2014-01-03 09:53:40',1),(5,'PUB','Publisher','',1,'2014-01-03 09:54:00',1,'2014-01-06 17:21:21',1);

/*Data for the table `publication_types` */

insert  into `publication_types`(`id`,`publication_type_name`,`description`,`minimum_circulation`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Newspapers','Daily, Weekly all Newspapers',250,0,'2014-01-03 11:25:20',1,'2014-01-03 11:25:20',1),(2,'Magazines','All types of Magazines. Weekly, Bi-Weekly, Fortnightly, Monthly, Quarterly, Half Yearly & Annual Magazines',100,0,'2014-01-03 11:26:19',1,'2014-01-03 11:34:32',1);

/*Data for the table `reasons` */

insert  into `reasons`(`id`,`reason_name`,`description`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Not A Member','Publisher not in membership during the period stated',1,1388729631,'0000-00-00 00:00:00',1388730423,'0000-00-00 00:00:00'),(2,'Not Accepted','Circulation figures Not Accepted for certification',1,1388729658,'0000-00-00 00:00:00',1388730451,'0000-00-00 00:00:00'),(3,'Late Received - Not Certified','Incoming Certificate received after the due date',1,1388730481,'0000-00-00 00:00:00',1388730481,'0000-00-00 00:00:00'),(4,'Under Recheck Audit','Incoming Certificate sent for Recheck Audit',1,NULL,NULL,NULL,NULL),(5,'Not Received\r\n','Circulation figures not submitted',1,NULL,NULL,NULL,NULL),(6,'Publication Not Started','Publication not started in during the period stated',1,NULL,NULL,NULL,NULL),(7,'Under Consideration\r\n','Incoming Certificate under examination or subject to correspondence.',1,NULL,NULL,NULL,NULL),(8,'Received - to be taken up for Certification\r\n','Incoming Certificate under examination',1,NULL,NULL,NULL,NULL),(9,'Figures due on Annual Basis\r\n','Publication published once in a year',1,NULL,NULL,NULL,NULL),(10,'Not Certified\r\n','Circulation figures not qualifying for Certification',1,NULL,NULL,NULL,NULL),(11,'Not Filed\r\n','Incoming Certificate received after the due date - Not Certified',1,NULL,NULL,NULL,NULL),(12,'Certificate Cancelled\r\n','ABC Certificate earlier issued now cancelled',1,NULL,NULL,NULL,NULL);

/*Data for the table `regular_periods` */

insert  into `regular_periods`(`id`,`regular_period_name`,`volume_number`,`from_date`,`to_date`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Jul - Dec 2012',128,'2013-01-01','2013-03-31',1,'2014-01-03 10:19:04',1,'2014-01-08 23:14:26',1),(2,'Jan - Jun 2013',129,'2013-07-01','2013-09-30',1,'2014-01-03 10:21:37',1,'2014-01-08 23:14:37',1),(3,'Jul - Dec 2013',130,'2014-01-01','2014-03-31',1,NULL,NULL,'2014-01-08 23:14:48',1);

/*Data for the table `special_periods` */

insert  into `special_periods`(`id`,`special_period_name`,`regular_period_id`,`from_date`,`to_date`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'JAN - DEC 2013',3,'2013-01-01','2013-12-31',0,'2014-01-03 10:22:32',1,'2014-01-03 10:22:32',1);

/*Data for the table `states` */

insert  into `states`(`id`,`state_name`,`zone_id`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Jammu & Kashmir',3,1,'2014-01-03 09:58:36',1,'2014-01-09 03:01:29',1),(2,'Himachal Pradesh\r\n',3,1,'2014-01-03 09:58:55',1,'2014-01-03 09:58:55',1),(3,'Punjab\r\n',3,1,'2014-01-03 09:59:19',1,'2014-01-03 09:59:19',1),(4,'Chandigarh\r\n',3,1,'2014-01-03 10:30:42',1,'2014-01-06 17:35:53',1),(5,'Uttarakhand\r\n',3,1,'2014-01-06 17:40:15',1,'2014-01-06 17:40:15',1),(6,'Haryana\r\n',3,1,'2014-01-06 17:40:37',1,'2014-01-06 17:40:37',1),(7,'New Delhi\r\n',3,1,'2014-01-06 17:42:31',1,'2014-01-06 17:42:31',1),(8,'Rajasthan\r\n',3,1,'2014-01-08 04:47:02',1,'2014-01-08 04:47:29',1),(9,'Uttar Pradesh',3,1,'2014-01-08 04:48:06',1,'2014-01-09 22:39:28',1),(10,'Bihar\r\n',4,1,NULL,NULL,NULL,NULL),(11,'Sikkim\r\n',4,1,NULL,NULL,NULL,NULL),(12,'Arunachal Pradesh\r\n',4,1,NULL,NULL,NULL,NULL),(13,'Nagaland\r\n',4,1,NULL,NULL,NULL,NULL),(14,'Manipur\r\n',4,1,NULL,NULL,NULL,NULL),(15,'Mizoram\r\n',4,1,NULL,NULL,NULL,NULL),(16,'Tripura\r\n',4,1,NULL,NULL,NULL,NULL),(17,'Meghalaya\r\n',4,1,NULL,NULL,NULL,NULL),(18,'Assam\r\n',4,1,NULL,NULL,NULL,NULL),(19,'West Bengal\r\n',4,1,NULL,NULL,NULL,NULL),(20,'Jharkhand\r\n',4,1,NULL,NULL,NULL,NULL),(21,'Odisha\r\n',4,1,NULL,NULL,NULL,NULL),(22,'Chhattisgarh\r\n',2,1,NULL,NULL,NULL,NULL),(23,'Madhya Pradesh\r\n',2,1,NULL,NULL,NULL,NULL),(24,'Gujarat\r\n',2,1,NULL,NULL,NULL,NULL),(25,'Daman & Diu\r\n',2,1,NULL,NULL,NULL,NULL),(26,'Dadara Nagar Haveli\r\n',2,1,NULL,NULL,NULL,NULL),(27,'Maharashtra\r\n',2,1,NULL,NULL,NULL,NULL),(28,'Andhra Pradesh\r\n',1,1,NULL,NULL,NULL,NULL),(29,'Karnataka\r\n',1,1,NULL,NULL,NULL,NULL),(30,'Goa\r\n',1,1,NULL,NULL,NULL,NULL),(31,'Lakshdweep\r\n',1,1,NULL,NULL,NULL,NULL),(32,'Kerala\r\n',1,1,NULL,NULL,NULL,NULL),(33,'Tamil Nadu\r\n',1,1,NULL,NULL,NULL,NULL),(34,'Pudducherry\r\n',1,1,NULL,NULL,NULL,NULL),(35,'Andaman Nikobar Island\r\n',4,1,NULL,NULL,NULL,NULL);

/*Data for the table `taxes` */

insert  into `taxes`(`id`,`tax_name`,`tax_percentage`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Service tax',12.00,1,'2014-01-03 11:05:10',1,'2014-01-03 11:06:37',1),(2,'Education cess',2.00,1,'2014-01-03 11:07:02',1,'2014-01-03 11:07:02',1),(3,'Secondary & Higher Secodary Cess',1.00,1,'2014-01-03 11:07:36',1,'2014-01-03 11:07:36',1);

/*Data for the table `zones` */

insert  into `zones`(`id`,`zone_name`,`country_id`,`active`,`created`,`created_by`,`modified`,`modified_by`) values (1,'Southern',1,1,'2014-01-03 09:46:56',1,'2014-01-06 17:32:25',1),(2,'Western',1,1,'2014-01-03 09:47:07',1,'2014-01-03 09:47:07',1),(3,'Northern',1,1,'2014-01-03 09:47:19',1,'2014-01-03 09:47:19',1),(4,'Eastern',1,1,'2014-01-03 09:47:29',1,'2014-01-06 17:41:57',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
