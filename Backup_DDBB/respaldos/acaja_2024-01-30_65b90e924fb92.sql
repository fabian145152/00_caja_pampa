SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `acaja`
--




CREATE TABLE `abonos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abono` varchar(30) CHARACTER SET utf16 NOT NULL,
  `importe` decimal(7,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;


INSERT INTO abonos VALUES
("1","semana_porteño","4100"),
("2","semana_pampa","3200"),
("4","semana_Bs_As","2500"),
("7","semana_radio_comun","1350"),
("8","viaje_2","150"),
("9","semana_paseo_cartel","1000"),
("12","semana_barata","2000"),
("14","viaje_1","75"),
("16","viaje_3","250"),
("17","add_radio_1","90"),
("18","add_radio_2","120"),
("19","add_radio_3","190");




CREATE TABLE `caja_cont` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `movil` varchar(5) NOT NULL,
  `viaje_no` int(8) NOT NULL,
  `reloj` decimal(7,2) NOT NULL,
  `adi` decimal(7,2) NOT NULL,
  `espera` decimal(7,2) NOT NULL,
  `peaje` decimal(7,2) NOT NULL,
  `pago_ft` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


INSERT INTO caja_cont VALUES
("1","2023-08-04","235","114785","10000.00","210.00","10.00","300.00","0.00"),
("2","2023-08-04","235","1147846","4500.00","0.00","0.00","0.00","0.00"),
("3","2023-08-05","235","1148787","1000.00","0.00","0.00","100.00","0.00"),
("4","2023-08-07","235","0","0.00","0.00","0.00","0.00","1500.00"),
("6","2023-09-07","235","0","0.00","0.00","0.00","0.00","1000.00");




CREATE TABLE `completa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `movil` int(11) NOT NULL,
  `nombre_titu` varchar(25) NOT NULL,
  `apellido_titu` varchar(25) NOT NULL,
  `dni_titu` int(9) NOT NULL,
  `direccion_titu` varchar(25) NOT NULL,
  `cp_titu` int(4) NOT NULL,
  `cel_titu` int(8) NOT NULL,
  `licencia_titu` int(8) NOT NULL,
  `nombre_chof_1` varchar(25) NOT NULL,
  `apellido_chof_1` varchar(25) NOT NULL,
  `dni_chof_1` int(9) NOT NULL,
  `direccion_chof_1` varchar(25) NOT NULL,
  `cp_chof_1` int(4) NOT NULL,
  `cel_chof_1` int(8) NOT NULL,
  `nombre_chof_2` varchar(25) NOT NULL,
  `apellido_chof_2` varchar(25) NOT NULL,
  `dni_chof_2` int(8) NOT NULL,
  `direccion_chof_2` varchar(25) NOT NULL,
  `cp_chof_2` int(4) NOT NULL,
  `cel_chof_2` int(8) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `dominio` varchar(7) NOT NULL,
  `año` int(4) NOT NULL,
  `abono` decimal(7,2) NOT NULL,
  `x_viaje` decimal(7,2) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_facturacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;


INSERT INTO completa VALUES
("1","2","FABIAN ALEJANDRO","Nogueroles","14952694","CARLOS GARDEL 3296","1650","1145784512","9901348","Fabian ","Nogueroles","0","Charly Gardel 3296","1652","1135879745","Marcelo","Medaglia","0","Rivolsi 4025","1245","1145781245","CHEVROLET","SPIN","AB456GH","2023","1.00","0.00","2023-10-10","2023-06-18"),
("2","5","FRANCO","Rolo","0","Fefix 45","1425","0","1234","Marrcelo ","Carafioca","0","French 200","1603","1154872154","Arturo","Nelson","0","Franklin","521","1147852365","FIAT","CRONOS","AF258FF","2023","1.00","0.00","2022-10-22","2023-08-05"),
("6","33","Juan","Perez","112548369","Laprida 1548","5000","0","13","ROGELIO","ROLDAN","18457586","FUNES 454","0","1145781245","","","0","","0","0","Toyota","Corolla","AF458GB","2022","8.00","0.00","0000-00-00","0000-00-00"),
("7","459","MARCELO JOSE","Lopez","14952694","Bolivia 1245","1236","0","25584","Laura","Caceres","19568563","Bolivia 576","0","1147092598","","","0","","0","0","Fiat","Siena","MOP450","2019","1.00","0.00","0000-00-00","2023-05-17"),
("9","4","Jessy","Nogue","25874586","Curupaiti 831","0","1544444444","25896","Augusto","Florencio","10547854","Gascon 25","0","1154212452","","","0","","0","0","Pugeot","306","OOO450","2018","1.00","0.00","0000-00-00","2023-02-03"),
("10","235","DANIEL","MONTENEGRO","127430338","EVITA 951 CASA","0","46223984","5144","DANIEL","MONTENEGRO","127430338","EVITA 951 CASA	","0","46223984","","","0","","0","0","CHEVROLET","SPIN","AC802FV","2022","2.00","0.00","0000-00-00","0004-07-22"),
("11","6","Silvina","Mendez","16325623","Pola 2020","0","11589568","58963","Silvina","Mendez","16589569","Pola 2020","0","11589568","","","0","","0","0","Toyota","Corolla","AD587GH","2023","12.00","0.00","0000-00-00","0023-10-10"),
("12","139","Carlos","Piragine","11111111","Avellaneda 2172","0","46333214","295","Carlos","Piragine","0","Avellaneda 2172","0","46333214","","","0","","0","0","CHEVROLET","SPIN","ae597ks","2020","2500.00","75.00","2021-01-22","2022-05-10"),
("14","1","Alejandro","Fernandez","114578457","laprida 4490","1650","1169356236","1234","Juan","Felix","11222333","French 15","1650","1145784578","Juan","Caca","22222222","Cacasu 2020","1212","2147483647","CHEVROLET","SPIN","AB068QJ","2022","2500.00","75.00","2023-10-30","2023-10-30");




CREATE TABLE `voucher_nuevos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vou` int(4) NOT NULL,
  `viaje_no` int(10) DEFAULT NULL,
  `origen` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nom_pasaj` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tel_pasaj` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `movil` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `chof` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dni` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `patente` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `c_costo` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cc` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `c_corr` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `c_cont` int(8) NOT NULL,
  `traslado` int(10) NOT NULL,
  `siniestro` int(10) NOT NULL,
  `solicitado` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `completado` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `destino` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `reloj` decimal(7,2) NOT NULL,
  `peaje` decimal(7,2) NOT NULL,
  `equipaje` decimal(7,2) NOT NULL,
  `adicional` decimal(7,2) NOT NULL,
  `plus` decimal(7,2) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `operador` varchar(30) CHARACTER SET utf8 NOT NULL,
  `autorizante` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `obs_chof` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `obs_pas` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vou` (`id_vou`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `voucher_validado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movil` varchar(6) NOT NULL,
  `fecha` text NOT NULL,
  `viaje_no` int(7) NOT NULL,
  `cc` int(4) NOT NULL,
  `reloj` decimal(10,2) NOT NULL,
  `peaje` decimal(7,2) NOT NULL,
  `equipaje` decimal(7,2) NOT NULL,
  `adicional` decimal(7,2) NOT NULL,
  `plus` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `viaje_no` (`viaje_no`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


INSERT INTO voucher_validado VALUES
("17","A139","16/10/2023 06:03:15","1199278","101","1000.00","0.00","0.00","0.00","0.00"),
("18","A139","17/10/2023 07:18:17","1199494","101","1000.00","0.00","0.00","0.00","0.00"),
("19","A139","18/10/2023 08:31:35","1199713","21","1000.00","400.00","0.00","0.00","0.00"),
("20","A139","18/10/2023 05:49:02","1199728","101","3673.00","0.00","0.00","0.00","0.00"),
("21","A139","18/10/2023 06:35:10","1199851","200","4479.00","0.00","0.00","0.00","0.00"),
("22","A139","19/10/2023 05:52:42","1200027","101","3725.00","0.00","0.00","0.00","0.00"),
("23","A139","20/10/2023 06:06:17","1200313","101","1888.00","0.00","0.00","0.00","0.00"),
("24","A139","20/10/2023 06:49:50","1200395","200","3219.00","0.00","0.00","0.00","0.00");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;