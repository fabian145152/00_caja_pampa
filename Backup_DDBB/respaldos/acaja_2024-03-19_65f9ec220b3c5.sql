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
  PRIMARY KEY (`id`),
  KEY `abono` (`abono`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;


INSERT INTO abonos VALUES
("1","ABONO PORTEÑO PAMPA","4100"),
("2","ABONO BASICO","3200"),
("4","ABONO PASEA CARTEL","2200"),
("7","ABONO TROPAS","3000"),
("8","ABONO ESPECIAL","2000"),
("9","ABONO SUPER ESPECIAL","900"),
("12","ABONO","0"),
("14","ABONO TALLER","1950"),
("16","ABONO CON BONIFICACION","1675"),
("17","ABONO TALLER ESPECIAL","1250"),
("18","ABONO TROPA ESPECIAL","3600"),
("19","ABONO NO TE VAS","650"),
("20","ABONO ESPECIAL","2250"),
("21","ABONO TALLER PAMPA","1600"),
("22","ABONO SIN AUMENTO","780"),
("23","ABONO BONIFICADO PAMPA","1400"),
("24","ABONO TROPA DIAZ","1125"),
("25","ABONO BONIFICADO","1800"),
("26","ABONO PORTE","2600"),
("27","Viaje 1","94"),
("28","viaje 2","260");




CREATE TABLE `caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ult_dep` date NOT NULL,
  `fecha_actual` date NOT NULL,
  `movil` int(4) NOT NULL,
  `semana_ult_dep` int(3) NOT NULL,
  `semana_actual` int(11) NOT NULL,
  `debe_cant_de_semanas` int(7) NOT NULL,
  `paga_de_viajes` decimal(7,2) NOT NULL,
  `trajo_en_voucher` decimal(7,2) NOT NULL,
  `deuda_movil` decimal(7,2) NOT NULL,
  `diez` decimal(7,2) NOT NULL,
  `noventa` decimal(7,2) NOT NULL,
  `dep_en_ft` decimal(7,2) NOT NULL,
  `dep_MP` decimal(7,2) NOT NULL,
  `extraccion` decimal(7,2) NOT NULL,
  `deposito` decimal(7,2) NOT NULL,
  `dep_al_movil` decimal(7,2) NOT NULL,
  `queda_ft_en_caja` decimal(7,2) NOT NULL,
  `queda_voucher_en_caja` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4;


INSERT INTO caja VALUES
("70","2024-03-08","2024-03-08","2073","10","9","0","16085.60","1860.40","16086.60","0.00","18604.00","10.00","0.00","0.00","0.00","0.00","0.00","0.00"),
("71","2024-01-19","2024-03-13","150","3","10","17500","36188.00","4330.00","18689.00","0.00","43300.00","10.00","0.00","0.00","0.00","0.00","0.00","0.00"),
("72","2024-01-19","2024-03-13","160","3","10","17500","36188.00","4330.00","18689.00","0.00","43300.00","10.00","0.00","0.00","0.00","0.00","0.00","0.00"),
("73","2024-01-19","2024-03-13","230","3","10","17500","36188.00","4330.00","18689.00","0.00","43300.00","10.00","0.00","0.00","0.00","0.00","0.00","0.00"),
("74","2024-01-19","2024-03-13","250","3","10","17500","36188.00","4330.00","18689.00","0.00","43300.00","10.00","0.00","0.00","0.00","0.00","0.00","0.00"),
("75","2024-01-19","2024-03-13","315","3","10","17500","36188.00","4330.00","18689.00","0.00","43300.00","10.00","0.00","0.00","0.00","0.00","0.00","0.00"),
("106","2024-01-19","2024-03-19","139","3","12","9","282.00","43300.00","0.00","4330.00","38970.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");




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
  `obs` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `movil` (`movil`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;


INSERT INTO completa VALUES
("1","2","FABIAN ALEJANDRO","Nogueroles","14952694","CARLOS GARDEL 3296","1650","1145784512","9901348","Fabian ","Nogueroles","0","Charly Gardel 3296","1652","1135879745","Marcelo","Medaglia","0","Rivolsi 4025","1245","1145781245","CHEVROLET","SPIN","AB456GH","2023","2600.00","94.00","2023-10-10","2023-06-18",""),
("12","139","CARLOS ALBERTO","PIRAGINE","10385642","AVELLANEDA 2172","0","46333214","295","CARLOS ALBERTO","PIRAGINE","10385642","AVELLANEDA 2172","0","46333214","","","0","","0","0","CHEVROLET","SPIN","AE597KS","2020","2500.00","94.00","2021-01-22","2022-05-10","Deja pagas 3 samenas que se va  de vacaciones"),
("15","102","ALBERTO JORGE","SPELLAZONI","17686600","GRAL PAZ2544","0","1138720363","3776","ALBERTO JORGE","SPELLAZONI","16975244","General Paz 2544","0","1161633086","","","0","","0","0","VOLKSWAGEN","SURAN","AB068QJ","2017","2600.00","94.00","2022-05-16","2022-05-16",""),
("16","103","Alejandro Cesar","Pereira","16975244","Pareja 2437 PB 3","0","1161633086","3776","ALEJANDRO","PEREURA","16975244","PAREJA 2437","0","1161633086","","","0","","0","0","RENAULT","LOGAN","NHF922","2013","2600.00","94.00","2023-01-02","2023-01-02",""),
("24","110","CESAR","REGONAT","18353855","","0","1164883827","38413","CESAR","REGONAT","18353855","","0","46056675","","","0","","0","0","TOYOTA","ETIOS","AD606GX","2018","2600.00","94.00","2021-02-22","2021-02-22",""),
("25","114","DANIEL","DONELEC","21964793","SANABRIA 1321 CASA","0","1164355932","35270","DANIEL","DONELEC","21964793","SANABRIA 1321 CASA","0","1164355932","","","0","","0","0","VOLKSWAGEN","SURAN","LFR779","2013","2600.00","94.00","0000-00-00","0000-00-00",""),
("26","116","FRANCO NAHUEL","NALLAR","41713137","RECONQUISTA 310 PB A","0","1125254413","4716","FRANCO NAHUEL","NALLAR","41713137","RECONQUISTA 310 PB A","0","1125254413","","","0","","0","0","TOYOTA","ETIOS","ONF180","2016","2600.00","94.00","0000-00-00","2021-05-24",""),
("27","117","CRISTIAN ARIEL","DE FAVERI","22042860","JOAQUIN V. GONZALEZ 2791","0","1161812555","12962","JORGE EDUARDO","LANZILLOTTA","14140629","VENANCIO FLORES 868","0","1149499248","","","0","","0","0","CHEVROLET","SPIN","AC284AJ","2018","2600.00","94.00","0000-00-00","2021-02-22",""),
("28","118","JOSE MANUEL","LEPES DE AREDES","13137121","TANDIL 4723 CABA","0","1154740211","20609","JOSE MANUEL","LEPES DE AREDES","13137121","TANDIL 4723 CABA","0","1154740211","","","0","","0","0","VOLKSWAGEN","SURAN","OWW827","2015","2600.00","94.00","0000-00-00","0000-00-00",""),
("29","119","CARLOS HERNAN","PEREZ","16071898","SANTO TOME 5240 CABA","0","1136183351","24312","CARLOS HERNAN","PEREZ","16071898","SANTO TOME 5240 CABA","0","1136183351","","","0","","0","0","TOYOTA","ETIOS","NUR045","2014","2600.00","94.00","0000-00-00","2022-06-06",""),
("30","123","CLAUDIO ALBERTO","DIAZ","21964793","YERBAL 2984 4 58","0","1146321257","33248","FERNANDO ","RAMOS CARRASCO","92182354","EVA PERON 1343 PB D AVELL","0","1158516383","","","0","","0","0","CHEVROLET","SPIN","AC327SZ","2019","4100.00","0.00","0000-00-00","2020-11-30",""),
("31","125","JUAN CARLOS","PALAVECINO ","22421209","ALVEAR 3748","0","1130024456","23541","JUAN CARLOS","PALAVECINO ","22421209","ALVEAR 3748","0","1130024456","","","0","","0","0","VOLKSWAGEN","VOYAGE","MOJ664","2013","2600.00","94.00","0000-00-00","2021-02-22",""),
("32","126","ANDRES","FERNANDEZ","13137255","TRES ARROYOS 3643 CABA","0","1130294687","6902","ANDRES","FERNANDEZ","13137255","TRES ARROYOS 3643 CABA","0","1130294687","","","0","","0","0","CHEVROLET","CORSA CLASSIC","OBV700","2014","2600.00","94.00","0000-00-00","2021-02-22",""),
("33","128","GUSTAVO ANIBAL","SENDRA","20611831","MATHEU 1017 CABA","0","1158154946","11289","GUSTAVO ANIBAL","SENDRA","20611831","MATHEU 1017 CABA","0","1158154946","","","0","","0","0","VOLKSWAGEN","SURAN","PHG910","2015","2600.00","94.00","0000-00-00","2022-04-26",""),
("34","133","CARLOS DANIEL","ENRRIQUE","11847596","GUARDIA NACIONAL 1770","0","1150414642","1990","CARLOS DANIEL","ENRRIQUE","11847596","GUARDIA NACIONAL 1770","0","1150414642","","","0","","0","0","VOLKSWAGEN","SURAN","OTX853","2022","2500.00","75.00","0000-00-00","2023-01-02",""),
("35","144","ALEJANDRO HORACIO","AHUMADA","16491995","Mosconi 2457 D 1","0","1145732034","30822","LUIS CESAR","NIÑO","11385532","","0","1163249674","","","0","","0","0","CHEVROLET","Corsa 2","JFK516","2010","2600.00","94.00","0000-00-00","2022-07-25",""),
("36","414","ALEJANDRO HORACIO","AHUMADA","16491995","Mosconi 2457 D 1","0","1150632572","10767","ALEJANDRO HORACIO","AHUMADA","16491995","Mosconi 2457 D 1","0","1150632572","","","0","","0","0","VOLKSWAGEN","SURAN","NCZ814","2013","4100.00","0.00","0000-00-00","2022-07-25",""),
("37","148","ALBERTO EUGENIO","CAÑETE","14436668","PILCOMAYO 3862 PB B ","0","1162244240","10472","ALBERTO EUGENIO","CAÑETE","14436668","PILCOMAYO 3862 PB B ","0","1162244240","","","0","","0","0","FIAT","PALIO","KUF834","2012","2600.00","94.00","0000-00-00","2021-02-15",""),
("38","152","LUCIANO","BENITEZ","18717231","RUTA 21 LAVALLE 1700 CASA","0","1138640883","17665","LUCIANO","BENITEZ","18717231","RUTA 21 LAVALLE 1700 CASA","0","1138640883","","","0","","0","0","FIAT","SIENA","MIS402","2013","2600.00","94.00","0000-00-00","2023-01-02",""),
("39","161","EDGARDO ROBERTO","ZABALA","12027878","COSQUIN 4564","0","1140376253","31065","EDGARDO ROBERTO","ZABALA","0","COSQUIN 4564","0","1140376253","","","0","","0","0","CHEVROLET","SPIN","PAA112","2015","2600.00","94.00","0000-00-00","2022-09-12",""),
("40","165","LUIS DOMINGO","GRANATELLI","8245697","ITALIA 451","0","1138062157","10220","LUIS CESAR","GRANATELLI","22393539","RIVADAVIA 1090","0","1141763820","LUIS DOMINGO","GRANATELLI","8245697","ITALIA 451","1138062157","1138062157","NISSAN","VERSA","AE929IC","2021","2600.00","94.00","0000-00-00","2021-02-22",""),
("41","170","GENARO DANIEL","AULISA","20056874","VILLATE 3180 D 1 OLIVOS","0","1140970788","27915","GENARO DANIEL","AULISA","20056874","VILLATE 3180 D 1 OLIVOS","0","1140970788","","","0","","0","0","CHEVROLET","SPIN","AD702MV","2019","2600.00","94.00","0000-00-00","2021-02-22",""),
("42","171","CLAUDIO OSCAR","LEVINT","13465101","NAZCA 1450","0","1133167434","31965","CLAUDIO OSCAR","LEVINT","13465101","NAZCA 1450","0","1133167434","","","0","","0","0","CHEVROLET","CORSA CLASSIC","NHK300","2013","2600.00","94.00","0000-00-00","2021-02-22",""),
("43","172","JORGE MARIANO","MARTINEZ","1336861","AV SAN MARTIN 2945 P 12 C","0","1145835108","20666","JUAN ANDRES","MAIDANA","26283329","CEFERINO RAMIREZ 3168","0","1150449480","LEONARDO CRISTIAN","PALMIERI","25310666","BETHOVEN 2963","0","1168040301","CHEVROLET","PRISMA","AC856MT","2016","2600.00","94.00","0000-00-00","2021-02-22",""),
("44","192","OSVALDO MARCELO","HUERTA","18127693","PAYSANDU 6016 CASA","0","1165445068","30036","OSVALDO MARCELO","HUERTA","18127693","PAYSANDU 6016 CASA","0","1165445068","","","0","","0","0","CHEVROLET","PRISMA","PFM070","2015","2600.00","94.00","0000-00-00","2021-02-15",""),
("45","193","CHRISTIAN ARIEL","DE FAVERI","22042860","VENANCIO FLORES 868 CASA","0","1161812555","37033","DANTE MARCELO","VELAZQUES","16510748","","0","1166541300","","","0","","0","0","CHEVROLET","SPIN","AA590TF","2018","2600.00","94.00","0000-00-00","2021-02-22",""),
("46","196","RAMON HUGO","LEMOS","21458201","CALLE 893 6042","0","1154988082","26019","RAMON HUGO","LEMOS","21458201","CALLE 893 6042","0","1154988082","","","0","","0","0","FIAT","SIENA","NPE264","0","2600.00","94.00","0000-00-00","2022-06-30",""),
("47","199","DANIEL ALBERTO","RODRIGUEZ ","14957674","CONSTITUCION 3196 1°C","0","1161981420","0","DANIEL ALBERTO","RODRIGUEZ ","14957674","CONSTITUCION 3196 1°C","0","1161981420","","","0","","0","0","FIAT","SIENA","AA058TP","2016","2600.00","94.00","0000-00-00","2022-10-10",""),
("49","201","CARLOS ALBERTO","VIGNATTI","17708279","OHIGGINS 2860 1C","0","1149605049","25285","CARLOS ALBERTO","VIGNATTI","17708279","OHIGGINS 2860 1C","0","1149605049","","","0","","0","0","TOYOTA","COROLLA","AF650MR","2022","2600.00","94.00","0000-00-00","0021-02-22",""),
("50","202","JOSE LUIS","MENA","16895270","ZEQUEIRA 7121","0","20611326","27067","JOSE LUIS","MENA","16895270","ZEQUEIRA 7121","0","20611326","","","0","","0","0","FIAT","SIENA","LPC727","2012","2600.00","94.00","0000-00-00","2022-03-07",""),
("51","204","MARIO JAVIER","CARETTI","27054525","TAMBORINI 3160 CASA","0","1146299553","37271","MARIO JAVIER","CARETTI","27054525","TAMBORINI 3160 CABA","0","1146299553","","","0","","0","0","FIAT","SIENA","MYL459","2013","2600.00","94.00","0000-00-00","2021-02-22",""),
("52","207","FIDEL","CARREÑO PEÑARANDA","94067837","","0","1160238420","32135","FIDEL","CARREÑO PEÑARANDA","94067837","","0","1160238420","","","0","","0","0","CHEVROLET","SPIN","NFH591","2013","2600.00","94.00","0000-00-00","2021-02-22",""),
("53","208"," SONIA MARIA","LLANOS POZZI","20946372","CARLOS GARDEL 2628 PB FON","0","0","4504","","","0","","0","0","","","0","","0","0","CHEVROLET","SPIN","MFS504","2013","2600.00","94.00","0000-00-00","2022-07-25",""),
("55","220","CLAUDIO ALBERTO","DIAZ","12975968","ASAMBLEA 1912","0","1146321257","12628","JORGE ALBERTO","FORLENZA","10305714","YERBAL 2984 4b","0","1167894574","","","0","","0","0","CITROEN","BERLINGO","NTE163","2008","2600.00","94.00","0000-00-00","2021-02-22",""),
("56","217","FERNANDO","BIONDI","11780381","GAONA 4121","0","1127335776","4716","RODOLFO ALBERTO","NALLAR","11780381","SANBLAS 3891","0","1127335776","","","0","","0","0","CHEVROLET","PRISMA","AD803JZ","2019","2600.00","94.00","0000-00-00","2021-02-22",""),
("58","223","ADOLFO JOSE","SCHMIDT","17499593","TAMBORINI  3160","0","1149476141","17700","ADOLFO JOSE","SCHMIDT","17499593","TAMBORINI  3160","0","1149476141","","","0","","0","0","CHEVROLET","CORSA","OGI457","2014","2600.00","94.00","0000-00-00","2021-02-22",""),
("59","225","RAUL ANIBAL ","ARIAS","14100813","QUILMES 168 CABA","0","0","1627","RENE ALBERTO","RODRIGUEZ","14675248","PUERTO MADRIN 1574 LOMAS ","0","1136488230","","","0","","0","0","VOLKSWAGEN","SURAN","LRH653","2012","2600.00","94.00","0000-00-00","2021-02-22",""),
("61","227","CHRISTIAN ARIEL","DE FAVERI","22042860","JOAQUIN V. GONZALEZ 2791 ","0","1161812555","21605","PABLO ARIEL RAMON","AGUILAR","29053936","MURGUIONDO 687 CABA","0","1138187323","GUSTAVO MARIO","CAPPELLINI","16286046","1131723201","0","0","CHEVROLET","SPIN","AC284AE","2018","2600.00","94.00","0000-00-00","2021-02-22",""),
("62","231","ALBERTO RAMON","MONZON ","10338582","JUAN BAUTISTA ALBERDI CAB","0","1135865101","29302","ALBERTO RAMON","MONZON ","10338582","JUAN BAUTISTA ALBERDI CAB","0","1135865101","","","0","","0","0","CHEVROLET","SPIN","AA173LK","2016","2600.00","94.00","0000-00-00","2021-02-15",""),
("63","235","DANIEL ALFREDO","MONTENEGRO ","12743004","EVITA 951 CABA","0","1151540390","5144","DANIEL ALFREDO","MONTENEGRO ","12743004","EVITA 951 CABA","0","1151540390","","","0","","0","0","CHEVROLET","SPIN","AC802FW","2018","2600.00","94.00","2022-07-04","2022-07-04",""),
("64","237","","","0","","0","0","0","","","0","","0","0","","","0","","0","0","","","","0","2600.00","94.00","0000-00-00","0000-00-00",""),
("65","241","","","0","","0","0","0","","","0","","0","0","","","0","","0","0","","","","0","0.00","0.00","0000-00-00","0000-00-00",""),
("66","250","","","0","","0","0","0","","","0","","0","0","","","0","","0","0","","","","0","0.00","0.00","0000-00-00","0000-00-00",""),
("68","253","","","0","","0","0","0","","","0","","0","0","","","0","","0","0","","","","0","0.00","0.00","0000-00-00","0000-00-00",""),
("69","1009","juan jose","fratantoni","0","","0","0","0","","","0","","0","0","","","0","","0","0","","","","0","0.00","0.00","0000-00-00","0000-00-00",""),
("70","2011","","","0","","0","0","0","","","0","","0","0","","","0","","0","0","","","","0","0.00","0.00","0000-00-00","0000-00-00","");




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
  `solicitado` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `completado` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
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
  `fecha` date NOT NULL,
  `viaje_no` int(7) NOT NULL,
  `cc` int(4) NOT NULL,
  `reloj` decimal(10,2) NOT NULL,
  `peaje` decimal(7,2) NOT NULL,
  `equipaje` decimal(7,2) NOT NULL,
  `adicional` decimal(7,2) NOT NULL,
  `plus` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `viaje_no` (`viaje_no`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;


INSERT INTO voucher_validado VALUES
("16","A139","2024-01-16","1219071","33","10000.00","0.00","0.00","0.00","0.00"),
("17","A139","2024-01-17","1219524","0","0.00","0.00","0.00","0.00","0.00"),
("18","A139","2024-01-19","1219634","200","33000.00","0.00","0.00","300.00","0.00"),
("30","A2073","2024-03-08","1227437","17","9120.00","0.00","0.00","0.00","0.00"),
("31","A2073","2024-03-08","1227444","0","5000.00","0.00","0.00","0.00","0.00"),
("32","A2073","2024-03-08","1227458","0","4680.00","0.00","0.00","0.00","0.00"),
("33","A2073","2024-03-08","1227465","0","5200.00","0.00","0.00","0.00","0.00"),
("34","A2073","2024-03-08","1227468","200","4804.00","0.00","0.00","0.00","0.00"),
("35","A2073","2024-03-08","1227474","0","2480.00","0.00","0.00","0.00","0.00"),
("36","A2073","2024-03-08","1227478","191","4680.00","0.00","0.00","0.00","0.00");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;