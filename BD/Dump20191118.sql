-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: dh_pruebas
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name_UNIQUE` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (5,'Andes'),(3,'Antares'),(2,'Brahma'),(12,'Corona'),(9,'Grolsch'),(15,'Guinness'),(4,'Heineken'),(16,'Imperial'),(6,'Leffe'),(7,'Miller Genuine Draft'),(11,'Modelo'),(13,'Oranjeboom'),(10,'Patagonia'),(1,'Quilmes'),(14,'Spaten-Franziskaner-BrÃ¤u'),(17,'Weidmann ');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat` (
  `cat_id` int(10) unsigned NOT NULL,
  `cat_name` varchar(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_UNIQUE` (`cat_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat`
--

LOCK TABLES `cat` WRITE;
/*!40000 ALTER TABLE `cat` DISABLE KEYS */;
INSERT INTO `cat` VALUES (3,'Barril'),(4,'Growler'),(2,'Lata'),(1,'Porron');
/*!40000 ALTER TABLE `cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origin`
--

DROP TABLE IF EXISTS `origin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origin` (
  `country_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_origin` varchar(20) NOT NULL,
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `country_origin_UNIQUE` (`country_origin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origin`
--

LOCK TABLES `origin` WRITE;
/*!40000 ALTER TABLE `origin` DISABLE KEYS */;
INSERT INTO `origin` VALUES (2,'Alemania'),(1,'Argentina'),(3,'Belgica'),(4,'EEUU'),(10,'Inglaterra'),(9,'Irlanda'),(7,'Mexico'),(8,'Paises Bajos');
/*!40000 ALTER TABLE `origin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay`
--

DROP TABLE IF EXISTS `pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay` (
  `id` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `num` int(16) NOT NULL,
  `bank` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay`
--

LOCK TABLES `pay` WRITE;
/*!40000 ALTER TABLE `pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prods`
--

DROP TABLE IF EXISTS `prods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prods` (
  `prod_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_cat` int(3) unsigned NOT NULL,
  `style` int(10) unsigned NOT NULL,
  `segment` int(9) unsigned NOT NULL,
  `prods_name` varchar(50) DEFAULT NULL,
  `stock` int(5) NOT NULL,
  `ibu` int(3) NOT NULL,
  `alc` int(3) NOT NULL,
  `capacity_cm3` int(10) NOT NULL,
  `fk_brand` int(11) unsigned NOT NULL,
  `fk_origin` int(3) unsigned NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `ishigh` int(1) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `fk_origin` (`fk_origin`),
  KEY `fk_brand` (`fk_brand`),
  KEY `fk_cat` (`fk_cat`),
  KEY `fk_style` (`style`),
  KEY `fk_segment` (`segment`),
  CONSTRAINT `segment` FOREIGN KEY (`segment`) REFERENCES `segment` (`segment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `style` FOREIGN KEY (`style`) REFERENCES `style` (`style_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prods`
--

LOCK TABLES `prods` WRITE;
/*!40000 ALTER TABLE `prods` DISABLE KEYS */;
INSERT INTO `prods` VALUES (2,1,2,1,'Quilmes',49,4,5,320,1,1,'El inmigrante alemÃ¡n, Otto Bemberg fundÃ³ la CervecerÃ­a Quilmes en Argentina en 1888. Para la dÃ©cada de 1920, la cerveza Quilmes era la cerveza mÃ¡s popular en la zona de Buenos Aires; hoy en dÃ­a, es un tesoro nacional que se lleva el 75% del mercado de consumo de cerveza. Quilmes es una cerveza estilo lager, refrescante, clara, no muy amarga, y fÃ¡cil de beberse.','5dd16d0c8cf0d.png',0,50),(3,1,2,1,'Modelo Especial',49,4,5,355,11,7,'Modelo especial, una cerveza pilsen americana, fue la primera cerveza creada y producida por Grupo Modelo en 1925. Relanzada utilizando la misma receta en 2010, Especial tiene un color dorado brillante, y un sabor dulce y bien equilibrado con lÃºpulos ligeros y un final fresco.','5dd16e82d51ae.png',0,90),(4,1,2,1,'Corona Extra',49,4,5,355,12,7,'Corona Extra, mÃ¡s conocida como Corona (o Coronita en EspaÃ±a, hasta junio de 2016) es una marca de cerveza mexicana muy popular en todo el mundo,1â€‹elaborada por el Grupo Modelo, que a su vez forma parte de la multinacional belga AB Inbev.','5dd19181048c0.png',1,62),(5,1,2,1,'Grolsch ',49,4,5,355,9,8,'Grolsch Brewery (Koninklijke Grolsch N.V. - \"Royal Grolsch\"), conocida simplemente como Grolsch (PronunciaciÃ³n en neerlandÃ©s: /É£rÉ”ls/), es una cervecerÃ­a holandesa fundada en 1615 por Willem Neerfeldt en Groenlo. En 1895 la Familia de Groen comprÃ³ la cervecerÃ­a. HabÃ­an comenzado su propia cervecerÃ­a en Cuijk, PaÃ­ses Bajos, a principios del siglo XIX. Tuvo una participaciÃ³n significativa hasta noviembre de 2007. La cervecerÃ­a principal se encuentra hoy en Enschede.','5dd1926239e47.png',0,53),(6,1,2,1,'Heineken',49,4,4,335,4,8,'Heineken International es una empresa cervecera neerlandesaâ€‹ fundada en 1864 por Gerard Adriaan Heineken en Ãmsterdam. Desde 2015, Heineken es propietaria de mÃ¡s de 165 fÃ¡bricas de cerveza en mÃ¡s de 70 paÃ­ses y tiene unos 76.000 empleados.','5dd1932747398.png',0,47),(7,1,3,1,'Leffe Blonde',49,20,7,330,6,3,'La cerveza Leffe fue originalmente elaborada por monjes en la AbadÃ­a Leffe cerca de Dinant, BÃ©lgica, utilizando ingredientes que crecÃ­an en el Ã¡rea cercana. La Leffe de hoy es una descendiente de la primera cerveza producida en siglo 13. Leffe Blond es una cerveza ale blanca afrutada y ligeramente especiada, es perfecta como aperitivo y suficientemente versÃ¡til para disfrutarse con carne roja, platillos agridulces, o quesos suaves como el Camembert y el Brie.','5dd19ccf63093.png',1,112),(8,1,6,1,'Leffe Brune',49,20,7,330,6,3,'Leffe Brune es una cerveza de abadÃ­a. La malta tostada oscura le otorga a la cerveza su color oscuro y cafÃ©, y su sabor ligeramente dulce. Su receta data de los aÃ±os 1200, cuando los monjes en Dinant, BÃ©lgica (en la AbadÃ­a Leffe), comenzaron a purificar el agua convirtiÃ©ndola en cerveza, en un intento por evitar las epidemias de enfermedades transmitidas por el agua. El resultado fue una cerveza oscura, de gran cuerpo; y los aldeanos de Dinant y los peregrinos que pasaban por ahÃ­ fueron muy felices al compartirla.','5dd1aa2ceb4a7.png',1,125),(9,1,2,1,'Leffe Royale',49,20,7,330,6,3,'De alta fermentaciÃ³n y elaborada a partir de tres variedades distintas de lÃºpulos, Leffe Royale consiste en el equilibrio entre lo amargo y lo dulce. El sabor de esta cerveza ale clara y de gran cuerpo incluye toques de limÃ³n y toronja, asÃ­ como de naranja y clavo, populares en la cerveza ale belga. Los monjes de la AbadÃ­a Leffe han elaborado cerveza desde el siglo 13, ofreciendo a los aldeanos y a los viajeros una bebida pura y saludable. Hoy en dÃ­a, Leffe alivia la sed de viajeros en todo el mundo','5dd1adf061c25.png',1,126),(10,1,2,2,'Miller Genuine Draft',49,4,5,330,7,4,'MILLER GENUINE DRAFT. Cerveza de estilo lager, de baja fermentaciÃ³n,tiene patentado un sistema de filtraciÃ³n en frÃ­o sin necesidad de pasteurizaciÃ³n, que le permite conservar todo el sabor en la propia botella.','5dd1aefb25215.png',1,67),(11,1,7,6,'Modelo Ambar',49,12,5,355,11,7,'La Modelo Ambar es una cerveza cobriza radiante elaborada para cumplir con los lineamientos austriacos. El gran cuerpo de esta cerveza Ã¡mbar complementa perfectamente la cocina tradicional mexicana, y fue creada para resaltar los mejores sabores de la comida. Modelo Ãmbar tiene aromas de lÃºpulos y granos de cebada, con un ligero sabor caramelizado y tostado. Grupo Modelo ha elaborado cerveza de calidad superior en MÃ©xico desde 1925, y Modelo Ãmbar es parte de una nueva familia de cervezas innovadoras y de calidad superior.','5dd1aff0d8e4a.png',1,102),(12,1,6,6,'Modelo Negra',49,16,5,355,11,7,'Negra Modelo es a menudo llamada \"la crema de la cerveza\". Es la cerveza oscura nÃºmero uno en MÃ©xico, y ha sido elaborada con la misma receta desde que la cervecerÃ­a Grupo Modelo la introdujo al mercado en 1925. Puede que ahora tenga una imagen nueva y mÃ¡s sofisticada, pero el sabor balanceado y el delicado aroma a malta, caramelo y lÃºpulos, no ha cambiado en lo mÃ¡s mÃ­nimo','5dd1b05f41f18.png',1,89),(13,1,3,6,'Modelo Noche Especial',49,16,5,355,11,7,'.','5dd1b0d110de8.png',0,80),(14,2,2,1,'Grolsch',49,5,5,47,9,8,'Grolsch Brewery (Koninklijke Grolsch N.V. - \"Royal Grolsch\"), conocida simplemente como Grolsch (PronunciaciÃ³n en neerlandÃ©s: /É£rÉ”ls/), es una cervecerÃ­a holandesa fundada en 1615 por Willem Neerfeldt en Groenlo. En 1895 la Familia de Groen comprÃ³ la cervecerÃ­a. HabÃ­an comenzado su propia cervecerÃ­a en Cuijk, PaÃ­ses Bajos, a principios del siglo XIX. Tuvo una participaciÃ³n significativa hasta noviembre de 2007. La cervecerÃ­a principal se encuentra hoy en Enschede.','5dd1f167d22a9.png',1,55),(15,2,5,3,'Andes Ipa Andina',49,20,6,473,5,1,'Cerveza Andes. Andes es una marca de cerveza de origen argentino,â€‹ fundada en 1921 por el inmigrante Otto Bemberg, oriundo de Alemania. Lleva dicho nombre en honor a la cordillera de los Andes.','5dd1f200f2f69.png',1,70),(16,2,7,6,'Andes Negra',49,10,5,473,5,1,'Cerveza Andes. Andes es una marca de cerveza de origen argentino,â€‹ fundada en 1921 por el inmigrante Otto Bemberg, oriundo de Alemania. Lleva dicho nombre en honor a la cordillera de los Andes.','5dd1f24706e0c.png',1,70),(17,2,7,4,'Andes Roja',49,12,5,473,5,1,'Cerveza Andes. Andes es una marca de cerveza de origen argentino,â€‹ fundada en 1921 por el inmigrante Otto Bemberg, oriundo de Alemania. Lleva dicho nombre en honor a la cordillera de los Andes.','5dd1f2709e2a3.png',1,70),(18,2,5,3,'Patagonia 24-7',49,20,6,473,10,1,'Patagonia es una marca argentina de cerveza perteneciente a Patagonia Brewing Company. La misma apunta al sector de cervezas â€œpremiumâ€, produciendo variedades poco comunes como la Bohemian Pilsener y la Weisse. Forma parte del grupo Anheuser-Busch InBev (uno de los oligopolios cerveceros a nivel mundial). EmpezÃ³ como parte del portafolio de Quilmes que tambiÃ©n es parte del mismo grupo.','5dd1f2d64487f.png',1,100),(19,2,6,1,'Oranjeboom 12 Super Strong',49,15,12,500,13,8,'La Super Strong de Oranjeboom es una cerveza de alto contenido alcohÃ³lico (12%). De color dorado, deja entrever su estilo con aromas licorosos ademÃ¡s de malta. De sabor consistente que, junto con el alcohol, otorga sabores de frutas secas, esta cerveza es perfecta para quienes gustan de lagers intensas.','5dd2d07f7d6b3.png',0,120),(20,2,9,1,'Guinness Draught',49,45,4,440,15,9,'Â¡GUINNESS LLEGA A BWEBREW! <br>  AdiÃ³s, espera. Al fin ha llegado Guinness Draught. La cerveza negra, cremosa y aterciopelada, renombrada por su armonioso sabor estÃ¡ aquÃ­. ','5dd2db08a743c.png',1,110),(21,2,10,1,'Franziskaner Weissbier',49,40,5,500,14,2,'La cerveza frutal brumosa de color Ã¡mbar, Franziskaner Hefe-Weissbier Hell, es de cuerpo medio, refrescante y fresca, con sabor a plÃ¡tanos, maracuyÃ¡, especias, y malta. Esta cerveza de trigo es de fermentaciÃ³n alta es elaborada en Bavaria, donde se sigue la receta producida desde 1363.','5dd2dbe32982f.png',1,112),(22,2,2,1,'Grolsch',49,12,5,340,9,8,'Grolsch Brewery (Koninklijke Grolsch N.V. - \"Royal Grolsch\"), conocida simplemente como Grolsch (PronunciaciÃ³n en neerlandÃ©s: /É£rÉ”ls/), es una cervecerÃ­a holandesa fundada en 1615 por Willem Neerfeldt en Groenlo. En 1895 la Familia de Groen comprÃ³ la cervecerÃ­a. HabÃ­an comenzado su propia cervecerÃ­a en Cuijk, PaÃ­ses Bajos, a principios del siglo XIX. Tuvo una participaciÃ³n significativa hasta noviembre de 2007. La cervecerÃ­a principal se encuentra hoy en Enschede.','5dd2dc63e2c73.png',0,80),(23,2,5,3,'Imperial IPA',49,20,5,473,16,1,'La historia de esta cerveza se remonta al aÃ±o 1953, cuando la empresa Quilmes lanzÃ³ al mercado la Quilmes Imperial.â€‹ Originalmente, fue pensada como una cerveza lager (rubia) de categorÃ­a mayor que la Quilmes Cristal comÃºn.','5dd2dde50525d.png',1,80),(24,2,2,6,'Imperial Rubia',49,10,5,473,16,1,'La historia de esta cerveza se remonta al aÃ±o 1953, cuando la empresa Quilmes lanzÃ³ al mercado la Quilmes Imperial.â€‹ Originalmente, fue pensada como una cerveza lager (rubia) de categorÃ­a mayor que la Quilmes Cristal comÃºn.','5dd2de13cbeed.png',0,60),(25,2,2,1,'Quilmes Rubia',49,7,4,473,1,1,'Quilmes es una cerveza argentina de ingredientes argentinos. Otto Bemberg fundÃ³ la cervecerÃ­a en Quilmes, en el aÃ±o 1888 y el 31 de mayo de 1890 se lanzÃ³ al pÃºblico. Hoy en dÃ­a es parte de la empresa Anheuser-Busch InBev.','5dd2de6b75c5b.png',0,50),(26,2,2,1,'Miller Genuine Draft',49,4,5,473,7,4,'MILLER GENUINE DRAFT. Cerveza de estilo lager, de baja fermentaciÃ³n,tiene patentado un sistema de filtraciÃ³n en frÃ­o sin necesidad de pasteurizaciÃ³n, que le permite conservar todo el sabor en la propia botella.','5dd2de9b6e95b.png',1,65),(27,2,9,1,'Imperial Negra',49,21,5,473,16,1,'La historia de esta cerveza se remonta al aÃ±o 1953, cuando la empresa Quilmes lanzÃ³ al mercado la Quilmes Imperial.â€‹ Originalmente, fue pensada como una cerveza lager (rubia) de categorÃ­a mayor que la Quilmes Cristal comÃºn.','5dd2def855488.png',1,57),(28,2,11,6,'Weidmann Weissbier',49,10,5,473,17,2,'La industria cervecera en Alemania estÃ¡ regida por la llamada â€œLey de Pureza BÃ¡varaâ€. Esta norma fue creada en 1516 con el objetivo de conservar a la cerveza alemana como un producto puro, natural y libre de ingredientes no saludables.  Todas las cervezas Weidmann en sus diferentes estilos se elaboran respetando esta ley, conservando su identidad natural asÃ­ como sus vitaminas y minerales. Las cervezas Weidmann tienen un carÃ¡cter Ãºnico que podrÃ¡s reconocer en ellas tanto como sus delicados sabores y aroma.','5dd2e0305952a.png',1,120);
/*!40000 ALTER TABLE `prods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincia` (
  `provincia_id` int(10) unsigned NOT NULL,
  `provincia_name` varchar(30) NOT NULL,
  PRIMARY KEY (`provincia_id`),
  UNIQUE KEY `cat_name_UNIQUE` (`provincia_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'Buenos Aires'),(2,'CABA'),(3,'Catamarca'),(4,'Chaco'),(5,'Chubut'),(6,'Cordoba'),(7,'Corrientes'),(8,'Entre Rios'),(9,'Formosa'),(10,'Jujuy'),(11,'La Pampa'),(12,'La Rioja'),(13,'Mendoza'),(14,'Misiones'),(15,'Neuquen'),(16,'Rio Negro'),(17,'San Juan'),(18,'San Luis'),(19,'Santa Cruz'),(20,'Santa Fe'),(21,'Santiago del Estero'),(22,'Tierra del Fuego'),(23,'Tucuman');
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segment`
--

DROP TABLE IF EXISTS `segment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segment` (
  `segment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `segment_name` varchar(30) NOT NULL,
  PRIMARY KEY (`segment_id`),
  UNIQUE KEY `segment_name_UNIQUE` (`segment_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segment`
--

LOCK TABLES `segment` WRITE;
/*!40000 ALTER TABLE `segment` DISABLE KEYS */;
INSERT INTO `segment` VALUES (1,'ALE'),(2,'American Lager'),(5,'APA'),(3,'IPA'),(6,'Lager'),(4,'Scotish');
/*!40000 ALTER TABLE `segment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sex`
--

DROP TABLE IF EXISTS `sex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sex` (
  `sex_id` int(10) unsigned NOT NULL,
  `sex_name` varchar(11) NOT NULL,
  PRIMARY KEY (`sex_id`),
  UNIQUE KEY `cat_name_UNIQUE` (`sex_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sex`
--

LOCK TABLES `sex` WRITE;
/*!40000 ALTER TABLE `sex` DISABLE KEYS */;
/*!40000 ALTER TABLE `sex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style` (
  `style_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `style_name` varchar(30) NOT NULL,
  PRIMARY KEY (`style_id`),
  UNIQUE KEY `style_name_UNIQUE` (`style_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style`
--

LOCK TABLES `style` WRITE;
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
INSERT INTO `style` VALUES (2,'ale'),(6,'Dark Ale'),(7,'Dark Lager'),(8,'Dunkel'),(5,'IPA'),(3,'pale'),(9,'Stout'),(11,'Weissbier'),(10,'Wheat Beer');
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_card`
--

DROP TABLE IF EXISTS `user_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_card` (
  `fk_user` int(11) NOT NULL,
  `fk_card` int(10) NOT NULL,
  KEY `fk_card` (`fk_card`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `fk_card` FOREIGN KEY (`fk_card`) REFERENCES `pay` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`fk_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_card`
--

LOCK TABLES `user_card` WRITE;
/*!40000 ALTER TABLE `user_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `born_date` date NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `sex` varchar(20) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numdireccion` varchar(10) NOT NULL,
  `pisodireccion` varchar(10) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `provincia` int(10) unsigned NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `codigopostal` varchar(45) NOT NULL,
  `avatar` varchar(45) NOT NULL,
  `fk_pago` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `provincia` (`provincia`),
  CONSTRAINT `provincia` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`provincia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (30,'giusti.patricio@gmail.com','$2y$10$LbX.1CF2remdikp/ZSh1lO7G3jeM6j3KJcJ23NI4YMbtA2YbWsJVa','1987-01-14','Patricio','Giusti','hombre','Gral Guido','1015','PB','Argentina',1,'Lanus','1824','5dd0abd2e5ae7.jpg','default');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dh_pruebas'
--

--
-- Dumping routines for database 'dh_pruebas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-18 15:55:25
