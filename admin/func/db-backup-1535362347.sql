
/*---------------------------------------------------------------
  SQL Database BACKUP 27.08.2018 10:32
  HOST: localhost
  DATABASE: admin_wishlist
  TABLES: *
  ---------------------------------------------------------------*/

/*---------------------------------------------------------------
  TABLE: `admins`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(150) CHARACTER SET utf8 NOT NULL,
  `user` varchar(70) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(250) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(255) NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
INSERT INTO `admins` VALUES   ('18','irakli','shalamberidze','ADMIN','52fdc8cc3738e4b41bed502a5b08ebe81c839bd8af501f9914b7238c8560b1db','513f633463f0e072','');
INSERT INTO `admins` VALUES ('19','lasha','lasha','lasha','082607dc9f00f4f4fd09021471af1e34e3b2a640a0f0689fd89ea1feba6a1908','5c9733ff28767c19','');

/*---------------------------------------------------------------
  TABLE: `brands`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `brands` VALUES   ('1','asdad');
INSERT INTO `brands` VALUES ('4','sdfsdf');

/*---------------------------------------------------------------
  TABLE: `categories`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `tree` text NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
INSERT INTO `categories` VALUES   ('14','Children','','0');
INSERT INTO `categories` VALUES ('15','Family','','0');
INSERT INTO `categories` VALUES ('16','Lookbook','','0');
INSERT INTO `categories` VALUES ('17','Corporate','','0');
INSERT INTO `categories` VALUES ('18','Commercial','','0');
INSERT INTO `categories` VALUES ('19','Product','','0');
INSERT INTO `categories` VALUES ('20','Bottles','','0');
INSERT INTO `categories` VALUES ('21','Food photography','','0');
INSERT INTO `categories` VALUES ('22','reportage','','0');
INSERT INTO `categories` VALUES ('23','clothes, shoes, accessories','','0');
INSERT INTO `categories` VALUES ('24','interior','','0');
INSERT INTO `categories` VALUES ('25','exterior','','0');

/*---------------------------------------------------------------
  TABLE: `excel`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `excel`;
CREATE TABLE `excel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `excel` VALUES   ('1','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('2','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('3','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('4','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('5','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('6','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('7','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('8','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('9','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('10','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('11','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('12','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('13','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('14','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('15','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('16','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('17','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('18','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('19','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('20','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('21','http://webdoors.ge/admin/uploads/excel/Online%20mall%20INVOICE.xlsx');
INSERT INTO `excel` VALUES ('22','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('23','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('24','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('25','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('26','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('27','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('28','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('29','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('30','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('31','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('32','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('33','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('34','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('35','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('36','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('37','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('38','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('39','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('40','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('41','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('42','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('43','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('44','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('45','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('46','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('47','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('48','http://webdoors.ge/admin/uploads/excel/oni.xlsx');
INSERT INTO `excel` VALUES ('49','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('50','http://webdoors.ge/admin/uploads/excel/on.xlsx');
INSERT INTO `excel` VALUES ('51','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('52','http://webdoors.ge/admin/uploads/excel/vio.xlsx');
INSERT INTO `excel` VALUES ('53','http://webdoors.ge/admin/uploads/excel/x.xlsx');

/*---------------------------------------------------------------
  TABLE: `gallery`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
INSERT INTO `gallery` VALUES   ('1','4','http://kikalastudio.com/admin/uploads/IMG_20180118_152611.jpg');
INSERT INTO `gallery` VALUES ('2','4','http://kikalastudio.com/admin/uploads/s1.png');
INSERT INTO `gallery` VALUES ('3','5','http://kikalastudio.com/admin/uploads/s1.png');
INSERT INTO `gallery` VALUES ('4','5','http://kikalastudio.com/admin/uploads/IMG_20180118_152611.jpg');

/*---------------------------------------------------------------
  TABLE: `journal`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `journal`;
CREATE TABLE `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `opertype` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `com` text CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `journal` VALUES   ('1','19','1','1535031955','3','ghfhfh','0','1');
INSERT INTO `journal` VALUES ('2','19','3','1535032028','2','rrr','3','1');
INSERT INTO `journal` VALUES ('3','19','1','1535033181','3','dfsds','2','1');
INSERT INTO `journal` VALUES ('4','19','1','1535033217','3','sdf','3','1');
INSERT INTO `journal` VALUES ('5','19','1','1535033351','3','fggdg','2','1');
INSERT INTO `journal` VALUES ('6','19','2','1535033365','3','fggdg','1','1');
INSERT INTO `journal` VALUES ('7','19','3','1535033548','3','გფდგდფგ','2','1');
INSERT INTO `journal` VALUES ('8','19','2','1535034004','3','fdf','2','1');
INSERT INTO `journal` VALUES ('9','19','3','1535034016','3','dsfsfsd','3','1');
INSERT INTO `journal` VALUES ('10','19','3','1535034054','3','dsfdsf','3','1');
INSERT INTO `journal` VALUES ('11','19','2','1535034106','2','df','3','1');
INSERT INTO `journal` VALUES ('12','19','1','1535034177','3','dsfdfs','1','1');
INSERT INTO `journal` VALUES ('13','19','1','1535034235','3','fgd','1','1');
INSERT INTO `journal` VALUES ('14','19','1','1535034255','2','svbdsb','6','1');
INSERT INTO `journal` VALUES ('15','19','5','1535034311','3','sadasd','2','1');

/*---------------------------------------------------------------
  TABLE: `opertypes`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `opertypes`;
CREATE TABLE `opertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `opertypes` VALUES   ('1','რაოდენობის დამატება');
INSERT INTO `opertypes` VALUES ('2','რაოდენობის ჩამოწერა');
INSERT INTO `opertypes` VALUES ('3','რეზერვის დამატება');
INSERT INTO `opertypes` VALUES ('4','რეზერვის ჩამოწერა');
INSERT INTO `opertypes` VALUES ('5','PREORDER-ის დამატება');
INSERT INTO `opertypes` VALUES ('6','PREORDER-ის ჩამოწერა');

/*---------------------------------------------------------------
  TABLE: `pages`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlegeo` text NOT NULL,
  `titleeng` text NOT NULL,
  `titlerus` text NOT NULL,
  `showhide` int(1) NOT NULL,
  `menu` int(1) NOT NULL,
  `textgeo` text NOT NULL,
  `texteng` text NOT NULL,
  `textrus` text NOT NULL,
  `thumbnail` text NOT NULL,
  `category` int(11) NOT NULL,
  `ptype` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `pages` VALUES   ('1','iko','eng','rus','1','0','<p>geo</p>','<p>eng</p>','<p>rus</p>','fff','6','0');
INSERT INTO `pages` VALUES ('2','geo','eng','rus','1','0','<p>geo</p>','<p>eng</p>','<p>rus</p>','fff','2','0');
INSERT INTO `pages` VALUES ('3','geo','eng','rus','1','0','<p>geo</p>','<p>eng</p>','<p>rus</p>','fff','2','0');
INSERT INTO `pages` VALUES ('4','gdsgsg','','','0','0','<p>dfsfds fs dfds fsd f</p>','','','','14','2');
INSERT INTO `pages` VALUES ('5','Photo session for advertisment','','','1','0','<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/admin/uploads/s1.png\" alt=\"\" width=\"200\" height=\"88\" />&nbsp;</p>','','','','18','3');
INSERT INTO `pages` VALUES ('6','About Studio','','','1','1','','','','','0','3');

/*---------------------------------------------------------------
  TABLE: `permissions`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) NOT NULL,
  `permissions` tinyint(1) NOT NULL,
  `dashboard` tinyint(1) NOT NULL,
  `journal` tinyint(1) NOT NULL,
  `users` int(1) NOT NULL,
  `brands` int(1) NOT NULL,
  `stores` int(1) NOT NULL,
  `excel` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
INSERT INTO `permissions` VALUES   ('1','18','1','1','1','1','1','1','1');
INSERT INTO `permissions` VALUES ('2','19','1','1','1','1','1','1','1');

/*---------------------------------------------------------------
  TABLE: `posts`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `pageid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
INSERT INTO `posts` VALUES   ('4','egfdg','http://kikalastudio.com/admin/uploads/IMG_20180118_152611.jpg','<p>fdgfdg</p>','5');
INSERT INTO `posts` VALUES ('5','dfdsfsdfsdf fdssdfsdf','http://kikalastudio.com/admin/uploads/s1.png','<p>sdfsdfdsfsd</p>','5');
INSERT INTO `posts` VALUES ('6','sadsa dsad asd ','http://kikalastudio.com/admin/uploads/3.jpg','<p>sad asdas&nbsp;</p>','5');
INSERT INTO `posts` VALUES ('7','dfsf','http://kikalastudio.com/admin/uploads/2.jpg','<p>sdfdsf</p>','5');
INSERT INTO `posts` VALUES ('8','News','http://kikalastudio.com/admin/uploads/news.jpg','<p>Test Post</p>','6');

/*---------------------------------------------------------------
  TABLE: `qbystore`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `qbystore`;
CREATE TABLE `qbystore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reserve` int(11) NOT NULL,
  `preorder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `qbystore` VALUES   ('3','1','3','1','8','2');
INSERT INTO `qbystore` VALUES ('4','1','2','3','0','0');

/*---------------------------------------------------------------
  TABLE: `slider`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(300) NOT NULL,
  `position` int(10) NOT NULL,
  `bigtext` text NOT NULL,
  `smalltext` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
INSERT INTO `slider` VALUES   ('7','http://kikalastudio.com/admin/uploads/Violence_WorkFile_6x3%20(1).jpg','0','','');
INSERT INTO `slider` VALUES ('9','http://kikalastudio.com/admin/uploads/Bottles%20%20copy%20copy.jpg','0','','');

/*---------------------------------------------------------------
  TABLE: `special`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CODE` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `BARCODE` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `COUNTRY` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TARIC` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `QUANTITY` double NOT NULL,
  `RESERVE` int(11) NOT NULL DEFAULT '0',
  `PREORDER` int(11) NOT NULL DEFAULT '0',
  `UNIT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRICE` double NOT NULL,
  `TOTAL` double NOT NULL,
  `TPRICE` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `special` VALUES   ('1','1','31001010004','3807000110107','Baby stroller 3 in 1 Madrid Beige Melange','CHINA','87150010','1','0','0','pcs','168.48','336.96','974.15');
INSERT INTO `special` VALUES ('2','2','31001010005','3807000110114','Baby stroller 3 in 1 Madrid Gray Melange','CHINA','87150010','2','0','0','pcs','168.48','505.44','1461.23');
INSERT INTO `special` VALUES ('3','3','31001010045','3801001010459','Baby stroller 3 in 1 Madrid Green Melange','CHINA','87150010','3','0','0','pcs','168.48','505.44','1461.23');
INSERT INTO `special` VALUES ('4','4','31001010046','3801001010466','Baby stroller 3 in 1 Madrid Pink Melange','CHINA','87150010','1','0','0','pcs','168.48','168.48','487.08');
INSERT INTO `special` VALUES ('5','5','31001030030','3801001030303','Pushchair Libro Beige','CHINA','87150010','7','0','0','pcs','51.84','362.88','1049.09');
INSERT INTO `special` VALUES ('6','6','31001030031','3801001030310','Pushchair Libro Blue','CHINA','87150010','10','0','0','pcs','51.84','518.4','1498.69');
INSERT INTO `special` VALUES ('7','7','31001030032','3801001030327','Pushchair Libro Grey','CHINA','87150010','10','0','0','pcs','51.84','518.4','1498.69');
INSERT INTO `special` VALUES ('8','8','31002020026','3801002020266','Car seat 0+ (0-13 кг) Beloved Beige','CHINA','94018000','18','0','0','pcs','21.58888','388.6','1123.44');
INSERT INTO `special` VALUES ('9','9','31002020027','3801002020273','Car seat 0+ (0-13 кг) Beloved Pink','CHINA','94018000','18','0','0','pcs','21.58888','388.6','1123.44');
INSERT INTO `special` VALUES ('10','10','31002020028','3801002020280','Car seat 0+ (0-13 кг) Beloved Blue','CHINA','94018000','18','0','0','pcs','21.58888','388.6','1123.44');
INSERT INTO `special` VALUES ('11','11','31002060015','3801002060156','Car seat 0-1-2 (0-25kg) Hood Dark Blue','CHINA','94018000','20','0','0','pcs','45.144','902.88','2610.23');
INSERT INTO `special` VALUES ('12','12','31002080008','3807000160157','Car Seat Groove Blue Stars','CHINA','94018000','8','0','0','pcs','35.78','286.24','827.52');
INSERT INTO `special` VALUES ('13','13','31003010004','3807000170064','Travel Cot Fairytale Brown Bear','CHINA','94032020','6','0','0','pcs','51.18166','307.09','887.8');
INSERT INTO `special` VALUES ('14','14','31003010005','3807000170071','Travel Cot Fairytale Dark blue Fox','CHINA','94032020','6','0','0','pcs','51.18166','307.09','887.8');
INSERT INTO `special` VALUES ('15','15','31003010006','3807000170088','Travel Cot Fairytale Gray Rabbit & Swan','CHINA','94032020','6','0','0','pcs','51.18166','307.09','887.8');
INSERT INTO `special` VALUES ('16','16','31005020001','3807000230034','Baby Rocker Foliage - Bear','CHINA','94017100','10','0','0','pcs','19.364','193.64','559.81');
INSERT INTO `special` VALUES ('17','17','31005020002','3807000230041','Baby Rocker Foliage - Beige Deer','CHINA','94017100','10','0','0','pcs','19.364','193.64','559.81');
INSERT INTO `special` VALUES ('18','18','31005020003','3807000230065','Baby Rocker Foliage - Navy Deer','CHINA','94017100','10','0','0','pcs','19.364','193.64','559.81');
INSERT INTO `special` VALUES ('19','19','31005020004','3807000230058','Baby Rocker Foliage - Rabbit','CHINA','94017100','10','0','0','pcs','19.364','193.64','559.81');
INSERT INTO `special` VALUES ('20','20','31106010012','3807000242167','Memory foam stroller liner-Magic Rainbow','CHINA','94049090','30','0','0','pcs','9.59033','287.71','831.77');

/*---------------------------------------------------------------
  TABLE: `stores`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `stores` VALUES   ('2','fdfsf');
INSERT INTO `stores` VALUES ('3','sf');

/*---------------------------------------------------------------
  TABLE: `treecat`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `treecat`;
CREATE TABLE `treecat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `treecat` VALUES   ('1','[]');
