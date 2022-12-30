/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - tcc
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
  `arm_usu_id` varchar(255) DEFAULT NULL,
  `arm_numero` varchar(255) DEFAULT NULL,
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

/*Table structure for table `detalhe_lista` */

DROP TABLE IF EXISTS `detalhe_lista`;

CREATE TABLE `detalhe_lista` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_lis_id` varchar(255) DEFAULT NULL,
  `det_equ_id` varchar(255) DEFAULT NULL,
  `det_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`det_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalhe_lista` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `equipamentos` */

/*Table structure for table `evento_status` */

DROP TABLE IF EXISTS `evento_status`;

CREATE TABLE `evento_status` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evento_status` */

insert  into `evento_status`(`sta_id`,`sta_descricao`) values 
(1,'Programados'),
(2,'Realizados'),
(3,'Cancelados');

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `eve_id` int(255) NOT NULL AUTO_INCREMENT,
  `eve_descricao` varchar(255) DEFAULT NULL,
  `eve_contratante` varchar(255) DEFAULT NULL,
  `eve_valor` varchar(255) DEFAULT NULL,
  `eve_data` varchar(255) DEFAULT NULL,
  `eve_hora_ini` varchar(255) DEFAULT NULL,
  `eve_hora_fim` varchar(255) DEFAULT NULL,
  `eve_endereco` varchar(255) DEFAULT NULL,
  `eve_publico` varchar(255) DEFAULT NULL,
  `eve_sta_id` varchar(255) DEFAULT NULL,
  `eve_usu_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `eventos` */

/*Table structure for table `lista` */

DROP TABLE IF EXISTS `lista`;

CREATE TABLE `lista` (
  `lis_id` int(11) NOT NULL AUTO_INCREMENT,
  `lis_descricao` varchar(255) DEFAULT NULL,
  `lis_usu_id` varchar(255) DEFAULT NULL,
  `lis_eve_id` varchar(255) DEFAULT NULL,
  `lis_data` varchar(255) DEFAULT NULL,
  `lis_hora` varchar(255) DEFAULT NULL,
  `lis_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lista` */

/*Table structure for table `uf` */

DROP TABLE IF EXISTS `uf`;

CREATE TABLE `uf` (
  `uf_id` int(11) NOT NULL AUTO_INCREMENT,
  `uf_nome` varchar(255) DEFAULT NULL,
  `uf_sigla` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `uf` */

insert  into `uf`(`uf_id`,`uf_nome`,`uf_sigla`) values 
(1,'	Acre	','	AC	'),
(2,'	Alagoas	','	AL	'),
(3,'	Amapá	','	AP	'),
(4,'	Amazonas	','	AM	'),
(5,'	Bahia	','	BA	'),
(6,'	Ceará	','	CE	'),
(7,'	Distrito Federal	','	DF	'),
(8,'	Espírito Santo	','	ES	'),
(9,'	Goiás	','	GO	'),
(10,'	Maranhão	','	MA	'),
(11,'	Mato Grosso	','	MT	'),
(12,'	Mato Grosso do Sul	','	MS	'),
(13,'	Minas Gerais	','	MG	'),
(14,'	Pará	','	PA	'),
(15,'	Paraíba	','	PB	'),
(16,'	Paraná	','	PR	'),
(17,'	Pernambuco	','	PE	'),
(18,'	Piauí	','	PI	'),
(19,'	Rio de Janeiro	','	RJ	'),
(20,'	Rio Grande do Norte	','	RN	'),
(21,'	Rio Grande do Sul	','	RS	'),
(22,'	Rondônia	','	RO	'),
(23,'	Roraima	','	RR	'),
(24,'	Santa Catarina	','	SC	'),
(25,'	São Paulo	','	SP	'),
(26,'	Sergipe	','	SE	'),
(27,'	Tocantis	','	TO	');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(255) DEFAULT NULL,
  `usu_email` varchar(255) DEFAULT NULL,
  `usu_senha` varchar(255) DEFAULT NULL,
  `usu_cidade` varchar(255) DEFAULT NULL,
  `usu_uf_id` varchar(11) DEFAULT NULL,
  `usu_img` varchar(255) DEFAULT NULL,
  `usu_telefone` char(11) DEFAULT NULL,
  `usu_organizacao` varchar(255) DEFAULT NULL,
  `usu_img_organizacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
