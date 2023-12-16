

CREATE TABLE `articulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `cantidad` int DEFAULT NULL,
  `tamaño` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `subcategoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status1` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO articulos VALUES("1","Sandwich Grill","10","20.jpg","1","Pequeño","Bebidas","Pepitos","1");
INSERT INTO articulos VALUES("2","Sandwich doble","3","19.jpg","1","","","","1");
INSERT INTO articulos VALUES("3","clasico","2","12.jpg","1","","","","1");
INSERT INTO articulos VALUES("4","Sandwich","2","17.jpg","1","","","","1");
INSERT INTO articulos VALUES("5","Combo Pepitos","15","15.jpg","1","","","","1");
INSERT INTO articulos VALUES("7","Llanera ","8","9.jpg","1","","","","1");
INSERT INTO articulos VALUES("8","Food doble tocino","5","7.jpg","1","","","","1");
INSERT INTO articulos VALUES("10","Food Doble Pollo","6","6.jpg","1","","","","1");
INSERT INTO articulos VALUES("11","Food doble carne","5","3.jpg","1","","","","1");
INSERT INTO articulos VALUES("12","Mr pollo","3","1.jpg","1","","","","1");
INSERT INTO articulos VALUES("13","Dr mixta con maiz","5","2.jpg","1","","","","1");
INSERT INTO articulos VALUES("14","Nestea","3","14.jpg","1","","","","1");
INSERT INTO articulos VALUES("15","Coca-Cola","4","22.jpg","1","","","","1");



CREATE TABLE `bancos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_banco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status2` int DEFAULT NULL,
  `num_cuenta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rif` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tlf` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO bancos VALUES("1","PROVINCIAL","1","1111111111111111","xxxxxxxxxxx","Corriente","0426-3531266","pr.jpg");
INSERT INTO bancos VALUES("2","MERCANTIL","1","xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","Corriente","0426-3531266","merca.jpg");
INSERT INTO bancos VALUES("3","BNC","1","xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","Corriente","0426-3531266","bnc.jpg");
INSERT INTO bancos VALUES("4","BANESCO","1","xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","Corriente","0426-3531266","banesco.jpg");
INSERT INTO bancos VALUES("5","VENEZUELA","1","xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","Corriente","0426-3531266","vz.jpg");
INSERT INTO bancos VALUES("6","ZELLE","0","","","","","");



CREATE TABLE `carrito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `precio` varchar(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `cantidad` varchar(250) NOT NULL,
  `tamaño` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bg_0900_ai_ci NOT NULL,
  `precio_total` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO carrito VALUES("63","2","clasico","1","Pequeño","2");



CREATE TABLE `datos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `clave` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `apellido` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `telefono` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `rol` int NOT NULL,
  `status1` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

INSERT INTO datos VALUES("1","agustin","12345","agustin","gonzalez","casa","04125106351","1","1");
INSERT INTO datos VALUES("2","annelys","12345","annelys","chavez","sabanita","0412","1","1");
INSERT INTO datos VALUES("3","javier","1234","javier","garcia","casa","04263531266","2","1");
INSERT INTO datos VALUES("8","papa","1234","javier","garcia","casa","22222222222","2","1");
INSERT INTO datos VALUES("26","loki","2121","lokito","alexander","sucasa","12121211111","2","1");
INSERT INTO datos VALUES("27","don","12232323","z","z","hola","1212121212","1","1");



CREATE TABLE `ordenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `cedula` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `zona` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `monto` varchar(250) NOT NULL,
  `numerotransferencia` varchar(250) NOT NULL,
  `cedulatitular` varchar(250) NOT NULL,
  `nombretitular` varchar(250) NOT NULL,
  `fechatransferencia` date NOT NULL,
  `banco` varchar(250) NOT NULL,
  `productos` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO ordenes VALUES("1","daniel","27349806","casa","","11111111","23","12","27349806","Javier García","2022-11-28","BANESCO","Mr pollo(1), mixta con maíz(1)");
INSERT INTO ordenes VALUES("2","pedro","27349806","casa","","11111111","23","12","27349806","Javier García","2022-11-27","MERCANTIL"," Mr pollo(1), mixta con maíz(1)");
INSERT INTO ordenes VALUES("3","pablo","3538844","casa","","04263531266","8","212","11111111","agustin","2022-11-28","MERCANTIL","Mr pollo(1), FOOD doble carne(1)");
INSERT INTO ordenes VALUES("4","diego","765892","casa","","11111111111","23","1111","12122222","aa","2022-11-29"," MERCANTIL","Mr de pollo(1), mixta con maíz(1)");
INSERT INTO ordenes VALUES("5","javier","27349806","casa","","11111111","2","212","27349806","Javier García","2022-12-05","BANESCO","clasico(1)");
INSERT INTO ordenes VALUES("6","donregalon","22222222","sucasa","","04263531266","5","190400","27349806","donregalon","2022-12-12","BANESCO","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("8","1111111111","87666666","casa","","88888888888","5","122","11111122","as","2022-12-12","PROVINCIAL","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("9","g","55555555","g","","66657777777","2","555555","33333333","g","2022-12-22","VENEZUELA","clasico(1)");
INSERT INTO ordenes VALUES("10","javier","11111111","casa","","77777777777","9","66666","77777777","javier","2023-05-11","VENEZUELA","Sandwich doble(1), Sandwich doble(2)");
INSERT INTO ordenes VALUES("11","gag","88888888","casa","","11111111111","10","88888","77777777","ja","2023-04-13","MERCANTIL","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("12","a","55555555","a","","11111111111","10","22","11111111","as","2023-04-12","1","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("13","javier","11111111","casa","","77777777777","10","6","12121212","g","2022-12-12","PROVINCIAL","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("14","javier","44444444","a","Barquisimeto-Oeste","12346555555","10","1212","11111111","a","2023-05-14","PROVINCIAL","Sandwich Grill(1)");



CREATE TABLE `roles` (
  `id` int NOT NULL,
  `rol` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

INSERT INTO roles VALUES("1","admi");
INSERT INTO roles VALUES("2","usuario");



CREATE TABLE `zonas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_zona` varchar(100) NOT NULL,
  `status3` int NOT NULL,
  `info_zona` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO zonas VALUES("1","Barquisimeto-Oeste","1","Empezando desde la calle 42 con carrera 18, siguiendo la ruta según la dirección: Carrera 19, Pedro León Torres, Florencio Jiménez y Metrópolis","oeste.jpg");
INSERT INTO zonas VALUES("2","Barquisimeto-Centro","1","Iniciando desde la Av. Vargas hasta la Calle 42, cumpliendo toda la ruta céntrica","centro.jpg");
INSERT INTO zonas VALUES("3","Barquisimeto-Este","1","Iniciando desde Indio Manaure solo por la calle principal, Trinitarias, Av. Libertador, Av. Venezuela, Sambil, y Av. Lara, llegando hasta la Av. Vargas","este.jpg");
INSERT INTO zonas VALUES("4","Cabudare-Parroquia José Gregorio Bastidas","1","Desde la Urb. Santos Borgel, pasando por las Mercedes, hasta llegar hasta la Urb. Almariera.","images.jpg");
INSERT INTO zonas VALUES("5","Cabudare-Parroquia Cabudare","1","Desde el Farmatodo ubicado en Cabudare Centro hasta Avenida La Mata","cbdcentro.jpg");
INSERT INTO zonas VALUES("6","Cabudare-Parroquia Agua Viva","1","Desde Urbanización Agua Viva hasta la Urb Caminos de Tarabana","agua.jpg");

