/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.13-MariaDB : Database - tcc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tcc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tcc`;

/*Table structure for table `armazenamento` */

DROP TABLE IF EXISTS `armazenamento`;

CREATE TABLE `armazenamento` (
  `arm_id` int(11) NOT NULL AUTO_INCREMENT,
  `arm_descricao` varchar(255) DEFAULT NULL,
  `arm_endereco` varchar(255) DEFAULT NULL,
  `arm_cidade` varchar(255) DEFAULT NULL,
  `arm_uf_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`arm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `armazenamento` */

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_descricao` varchar(255) DEFAULT NULL,
  `cat_sub` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

insert  into `categoria`(`cat_id`,`cat_descricao`,`cat_sub`) values 
(1,'	Caixas P.A	','	Ativa	'),
(2,'	Caixas P.A	','	Passiva	'),
(3,'	Monitor	','	Ativo	'),
(4,'	Monitor	','	Passivo	'),
(5,'	Cabo	','	PP	'),
(6,'	Cabo	','	XLR	'),
(7,'	Cabo	','	P10 TS	'),
(8,'	Cabo	','	P10 TRS	'),
(9,'	Cabo	','	SPEAKON 2V	'),
(10,'	Cabo	','	SPEAKON 4V	'),
(11,'	Cabo	','	RCA	'),
(12,'	Cabo	','	P2	'),
(13,'	Mixer	','	Analógico	'),
(14,'	Mixer	','	Digital	'),
(15,'	Amplificador	','	1,3 Ohms	'),
(16,'	Amplificador	','	2 Ohms	'),
(17,'	Amplificador	','	4 Ohms	'),
(18,'	Microfone	','	S/Fio Mão	'),
(19,'	Microfone	','	S/Fio headset	'),
(20,'	Microfone	','	S/Fio Instrumento	'),
(21,'	Microfone	','	Condensador	'),
(22,'	Microfone	','	Dinâmico	'),
(23,'	Processador P.A	','		'),
(24,'	Dinâmicos	','	Compressor	'),
(25,'	Dinâmicos	','	Expander/Gate	'),
(26,'	Dinâmicos	','	Delay	'),
(27,'	Efeitos	','		'),
(28,'	Equalizador	','		'),
(29,'	Periféricos	','	Adaptadores	'),
(30,'	Periféricos	','	Rack	'),
(31,'	Periféricos	','	Interface USB	');

/*Table structure for table `equipamentos` */

DROP TABLE IF EXISTS `equipamentos`;

CREATE TABLE `equipamentos` (
  `equ_id` int(11) NOT NULL AUTO_INCREMENT,
  `equ_nome` varchar(255) DEFAULT NULL,
  `equ_obs` varchar(255) DEFAULT NULL,
  `equ_quantidade` varchar(255) DEFAULT NULL,
  `equ_cat_id` varchar(255) DEFAULT NULL,
  `equ_usu_id` varchar(255) DEFAULT NULL,
  `equ_arm_id` varchar(255) DEFAULT NULL,
  `equ_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`equ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `equipamentos` */

insert  into `equipamentos`(`equ_id`,`equ_nome`,`equ_obs`,`equ_quantidade`,`equ_cat_id`,`equ_usu_id`,`equ_arm_id`,`equ_img`) values 
(1,'Behringuer Wing','mesa Nova, veio da China','1','1','1',NULL,'x32-large20200713150802.jpg'),
(2,'SI Expression','C/ placa USB','1','14','1',NULL,'1193512193231820200713151245.jpg'),
(3,'UI24R','Use roteador externo','1','14','1',NULL,'pro_20272_g20200713151536.jpg'),
(4,'Yamaha MG32x','','1','13','2',NULL,'download.20200713191211jfif'),
(5,'Ciclotron 24.4','','1','13','2',NULL,'mesa-de-som-ciclotron-cmc-244-s-d_nq_np_649591-mlb31240352217_062019-f20200713191234.jpg'),
(6,'Yamaha 1224CX','','1','13','2',NULL,'download (1).20200713191255jfif'),
(7,'Attack VSF12A','','1','13','2',NULL,'vsh206_120200713191320.jpg'),
(8,'Attack Line Array','','1','2','2',NULL,'vsl208 branco_120200713191349.jpg'),
(9,'Mackie PFX32FX','','1','13','2',NULL,'profx30v3_front_slant_low_web20200713193219.png'),
(10,'WATTSOM CMBW 24','Phones queimados','1','13','1',NULL,'img_20200713_16214116520200713212303.jpg'),
(11,'Xxxxxx','','1','1','1',NULL,'img_20200718_11141847720200718161616.jpg'),
(12,'Antera M12','','1','4','1',NULL,'monitor-antare-m-12.1-passivo-120200718215613.jpg');

/*Table structure for table `tipo_usuario` */

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `tip_id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_usuario` */

insert  into `tipo_usuario`(`tip_id`,`tip_descricao`) values 
(1,'Administrador'),
(2,'Padrão');

/*Table structure for table `uf` */

DROP TABLE IF EXISTS `uf`;

CREATE TABLE `uf` (
  `uf_id` int(11) NOT NULL AUTO_INCREMENT,
  `uf_nome` varchar(255) DEFAULT NULL,
  `uf_sigla` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

/*Data for the table `uf` */

insert  into `uf`(`uf_id`,`uf_nome`,`uf_sigla`) values 
(1,'	Acre	','	A'),
(2,'	Alagoas	','	A'),
(3,'	Amapá	','	A'),
(4,'	Amazonas	','	A'),
(5,'	Bahia	','	B'),
(6,'	Ceará	','	C'),
(7,'	Distrito Federal	','	D'),
(8,'	Espírito Santo	','	E'),
(9,'	Goiás	','	G'),
(10,'	Maranhão	','	M'),
(11,'	Mato Grosso	','	M'),
(12,'	Mato Grosso do Sul	','	M'),
(13,'	Minas Gerais	','	M'),
(14,'	Pará	','	P'),
(15,'	Paraíba	','	P'),
(16,'	Paraná	','	P'),
(17,'	Pernambuco	','	P'),
(18,'	Piauí	','	P'),
(19,'	Rio de Janeiro	','	R'),
(20,'	Rio Grande do Norte	','	R'),
(21,'	Rio Grande do Sul	','	R'),
(22,'	Rondônia	','	R'),
(23,'	Roraima	','	R'),
(24,'	Santa Catarina	','	S'),
(25,'	São Paulo	','	S'),
(26,'	Sergipe	','	S'),
(27,'	Tocantis	','	T'),
(28,'	Acre	','	AC	'),
(29,'	Alagoas	','	AL	'),
(30,'	Amapá	','	AP	'),
(31,'	Amazonas	','	AM	'),
(32,'	Bahia	','	BA	'),
(33,'	Ceará	','	CE	'),
(34,'	Distrito Federal	','	DF	'),
(35,'	Espírito Santo	','	ES	'),
(36,'	Goiás	','	GO	'),
(37,'	Maranhão	','	MA	'),
(38,'	Mato Grosso	','	MT	'),
(39,'	Mato Grosso do Sul	','	MS	'),
(40,'	Minas Gerais	','	MG	'),
(41,'	Pará	','	PA	'),
(42,'	Paraíba	','	PB	'),
(43,'	Paraná	','	PR	'),
(44,'	Pernambuco	','	PE	'),
(45,'	Piauí	','	PI	'),
(46,'	Rio de Janeiro	','	RJ	'),
(47,'	Rio Grande do Norte	','	RN	'),
(48,'	Rio Grande do Sul	','	RS	'),
(49,'	Rondônia	','	RO	'),
(50,'	Roraima	','	RR	'),
(51,'	Santa Catarina	','	SC	'),
(52,'	São Paulo	','	SP	'),
(53,'	Sergipe	','	SE	'),
(54,'	Tocantis	','	TO	');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(255) DEFAULT NULL,
  `usu_email` varchar(255) DEFAULT NULL,
  `usu_senha` varchar(255) DEFAULT NULL,
  `usu_cidade` varchar(255) DEFAULT NULL,
  `usu_uf_id` varchar(11) DEFAULT NULL,
  `usu_tip_id` varchar(11) DEFAULT NULL,
  `usu_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`usu_id`,`usu_nome`,`usu_email`,`usu_senha`,`usu_cidade`,`usu_uf_id`,`usu_tip_id`,`usu_img`) values 
(1,'Angelo Oliveira','angelo@gmail.com','202cb962ac59075b964b07152d234b70','Guaratinguetá','25','2',NULL),
(2,'Teste','teste@gmail.com','698dc19d489c4e4db73e28a713eab07b','teste','1','2',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
