

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

INSERT INTO articulos VALUES("1","Sandwich Grill","10","20.jpg","1","Mediano","Alimentos procesados","Sandwiches","1");
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



CREATE TABLE `carrito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `precio` varchar(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `cantidad` varchar(250) NOT NULL,
  `precio_total` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




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
  `telefono` varchar(250) NOT NULL,
  `monto` varchar(250) NOT NULL,
  `numerotransferencia` varchar(250) NOT NULL,
  `cedulatitular` varchar(250) NOT NULL,
  `nombretitular` varchar(250) NOT NULL,
  `fechatransferencia` date NOT NULL,
  `banco` varchar(250) NOT NULL,
  `productos` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO ordenes VALUES("1","daniel","27349806","casa","11111111","23","12","27349806","Javier García","2022-11-28","BANESCO","Mr pollo(1), mixta con maíz(1)");
INSERT INTO ordenes VALUES("2","pedro","27349806","casa","11111111","23","12","27349806","Javier García","2022-11-27","MERCANTIL"," Mr pollo(1), mixta con maíz(1)");
INSERT INTO ordenes VALUES("3","pablo","3538844","casa","04263531266","8","212","11111111","agustin","2022-11-28","MERCANTIL","Mr pollo(1), FOOD doble carne(1)");
INSERT INTO ordenes VALUES("4","diego","765892","casa","11111111111","23","1111","12122222","aa","2022-11-29"," MERCANTIL","Mr de pollo(1), mixta con maíz(1)");
INSERT INTO ordenes VALUES("5","javier","27349806","casa","11111111","2","212","27349806","Javier García","2022-12-05","BANESCO","clasico(1)");
INSERT INTO ordenes VALUES("6","donregalon","22222222","sucasa","04263531266","5","190400","27349806","donregalon","2022-12-12","BANESCO","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("8","1111111111","87666666","casa","88888888888","5","122","11111122","as","2022-12-12","PROVINCIAL","Sandwich Grill(1)");
INSERT INTO ordenes VALUES("9","g","55555555","g","66657777777","2","555555","33333333","g","2022-12-22","VENEZUELA","clasico(1)");
INSERT INTO ordenes VALUES("10","javier","11111111","casa","77777777777","9","66666","77777777","javier","2023-05-11","VENEZUELA","Sandwich doble(1), Sandwich doble(2)");



CREATE TABLE `roles` (
  `id` int NOT NULL,
  `rol` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

INSERT INTO roles VALUES("1","admi");
INSERT INTO roles VALUES("2","usuario");

