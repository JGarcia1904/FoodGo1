

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO articulos VALUES("1","Sandwich Grill","10","20.jpg","1","Pequeño","Alimentos-Procesados","Pizza","1");
INSERT INTO articulos VALUES("2","Sandwich doble","3","19.jpg","1","Pequeño","Alimentos-Procesados","Pizza","1");
INSERT INTO articulos VALUES("3","clasico","2","12.jpg","1","Pequeño","Bebidas","Hamburguesas","1");
INSERT INTO articulos VALUES("4","Sandwich","2","17.jpg","1","Pequeño","Bebidas","Pepitos","1");
INSERT INTO articulos VALUES("5","Combo Pepitos","15","15.jpg","1","Pequeño","Alimentos","Hamburguesas","1");
INSERT INTO articulos VALUES("7","Llanera ","8","9.jpg","1","","","","1");
INSERT INTO articulos VALUES("8","Food doble tocino","5","7.jpg","1","","","","1");
INSERT INTO articulos VALUES("10","Food Doble Pollo","6","6.jpg","1","","","","1");
INSERT INTO articulos VALUES("11","Food doble carne","5","3.jpg","1","","","","1");
INSERT INTO articulos VALUES("12","Mr pollo","3","1.jpg","1","","","","1");
INSERT INTO articulos VALUES("13","Dr mixta con maiz","5","2.jpg","1","","","","1");
INSERT INTO articulos VALUES("14","Nestea","3","14.jpg","1","","","","1");
INSERT INTO articulos VALUES("15","Coca-Cola","4","22.jpg","1","","","","1");
INSERT INTO articulos VALUES("20","prueba","1","100.jpg","1","Pequeño","Bebidas","Perros-Calientes","0");
INSERT INTO articulos VALUES("21","a","1","100.jpg","1","Pequeño","Alimentos","Perros","0");
INSERT INTO articulos VALUES("22","javier","4","100.jpg","1","Mediano","Alimentos","Perros","0");
INSERT INTO articulos VALUES("23","a","1","100.jpg","1","Extragrande","Alimentos-Procesados","Pizza","0");
INSERT INTO articulos VALUES("24","a","11","100.jpg","1","Pequeño","Alimentos-Procesados","Pepitos","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status8` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO categoria VALUES("1","Alimentos-Procesados","1");
INSERT INTO categoria VALUES("2","Bebidas","1");
INSERT INTO categoria VALUES("3","Algo","0");
INSERT INTO categoria VALUES("4","Alguita","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

INSERT INTO datos VALUES("1","agustin","12345","agustin","gonzalez","case","04125106352","1","1");
INSERT INTO datos VALUES("2","annelys","12345","annelys","chavez","sabanita","0412","1","1");
INSERT INTO datos VALUES("3","javier","1234","javier","garcia","casa","04263531266","2","1");
INSERT INTO datos VALUES("8","papa","1234","javier","garcia","casa","22222222222","2","1");
INSERT INTO datos VALUES("26","loki","2121","lokito","alexander","sucase","12121211112","2","1");
INSERT INTO datos VALUES("27","don","12232323","z","z","hola","1212121212","1","1");
INSERT INTO datos VALUES("29","a","aaaaaaaa","z","z","z","11111111111","2","1");
INSERT INTO datos VALUES("31","b","javier19","javier","garcia","casita","11111111111","2","1");
INSERT INTO datos VALUES("32","mmmmm","pruebita","a","b","c","11111111112","1","1");



CREATE TABLE `impuesto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `impuesto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status9` int DEFAULT NULL,
  `valor` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO impuesto VALUES("1","iva","1","0.160000");
INSERT INTO impuesto VALUES("2","a","0","0.600000");
INSERT INTO impuesto VALUES("3","e","1","0.150000");



CREATE TABLE `metodo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_metodo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status6` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO metodo VALUES("1","Transferencita","1");
INSERT INTO metodo VALUES("2","Pago móvil","1");
INSERT INTO metodo VALUES("3","Paguito","1");



CREATE TABLE `moneda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `moneda` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status7` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO moneda VALUES("1","Bolívares (Bs)","1");
INSERT INTO moneda VALUES("2","Dolares ($)","1");
INSERT INTO moneda VALUES("3","Yuanes","1");



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
  `nom_metodo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `moneda` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO ordenes VALUES("1","daniel","27349806","casa","","11111111","23","12","27349806","Javier García","2022-11-28","BANESCO","Mr pollo(1), mixta con maíz(1)","","");
INSERT INTO ordenes VALUES("2","pedro","27349806","casa","","11111111","23","12","27349806","Javier García","2022-11-27","MERCANTIL"," Mr pollo(1), mixta con maíz(1)","","");
INSERT INTO ordenes VALUES("3","pablo","3538844","casa","","04263531266","8","212","11111111","agustin","2022-11-28","MERCANTIL","Mr pollo(1), FOOD doble carne(1)","","");
INSERT INTO ordenes VALUES("4","diego","765892","casa","","11111111111","23","1111","12122222","aa","2022-11-29"," MERCANTIL","Mr de pollo(1), mixta con maíz(1)","","");
INSERT INTO ordenes VALUES("5","javier","27349806","casa","","11111111","2","212","27349806","Javier García","2022-12-05","BANESCO","clasico(1)","","");
INSERT INTO ordenes VALUES("6","donregalon","22222222","sucasa","","04263531266","5","190400","27349806","donregalon","2022-12-12","BANESCO","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("8","1111111111","87666666","casa","","88888888888","5","122","11111122","as","2022-12-12","PROVINCIAL","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("9","g","55555555","g","","66657777777","2","555555","33333333","g","2022-12-22","VENEZUELA","clasico(1)","","");
INSERT INTO ordenes VALUES("10","javier","11111111","casa","","77777777777","9","66666","77777777","javier","2023-05-11","VENEZUELA","Sandwich doble(1), Sandwich doble(2)","","");
INSERT INTO ordenes VALUES("11","gag","88888888","casa","","11111111111","10","88888","77777777","ja","2023-04-13","MERCANTIL","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("12","a","55555555","a","","11111111111","10","22","11111111","as","2023-04-12","1","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("13","javier","11111111","casa","","77777777777","10","6","12121212","g","2022-12-12","PROVINCIAL","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("14","javier","44444444","a","Barquisimeto-Oeste","12346555555","10","1212","11111111","a","2023-05-14","PROVINCIAL","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("15","a","11111111","a","Cabudare-Parroquia","11111111111","3","12","11111111","a","2020-12-12","PROVINCIAL","Sandwich doble(1)","","");
INSERT INTO ordenes VALUES("16","a","11111111","a","Barquisimeto-Centro","11111111111","10","11","11111111","a","2022-12-12","PROVINCIAL","Sandwich Grill(1)","","");
INSERT INTO ordenes VALUES("17","aaa","11111111","a","Barquisimeto-Oeste","11111111111","2","1","11111111","a","2023-05-18","PROVINCIAL","clasico(1)","","");
INSERT INTO ordenes VALUES("18","javier","11111111","casa","Barquisimeto-Oeste","11111111111","3","11","11111111","javier","2023-05-18","PROVINCIAL","Sandwich doble(1)","","");
INSERT INTO ordenes VALUES("19","karla","11111111","casa","Barquisimeto-Centro","11111111111","8","4598","11111112","carlos","2023-05-18","PROVINCIAL","Llanera (1)","","");
INSERT INTO ordenes VALUES("20","a","11111111","a","Barquisimeto-Oeste","11111111111","3","1","11111111","a","2023-05-18","PROVINCIAL","Sandwich doble(1)","Transferencita","");
INSERT INTO ordenes VALUES("21","a","11111111","a","Barquisimeto-Oeste","11111111111","3","1","11111111","a","2023-05-10","PROVINCIAL","Sandwich doble(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("22","a","11111111","a","Barquisimeto-Centro","11111111111","3","1","11111111","a","2023-05-12","MERCANTIL","Sandwich doble(1)","Transferencita","Dolares");
INSERT INTO ordenes VALUES("23","a","44444444","a","Barquisimeto-Oeste","11111111111","10","1","11111111","a","2023-05-20","BANESCO","Sandwich Grill(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("24","a","11111111","a","Barquisimeto-Oeste","11111111111","3","1","11111111","a","2023-05-20","PROVINCIAL","Sandwich doble(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("25","a","33333333","a","Barquisimeto-Este","11111111111","10","11","11111111","a","2023-05-20","PROVINCIAL","Sandwich Grill(1)","Pago","Bolívares");
INSERT INTO ordenes VALUES("26","ee","11111111","h","Barquisimeto-Oeste","77777777777","2","7","88888888","a","2023-05-20","BNC","clasico(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("27","a","22222222","a","Barquisimeto-Oeste","11111111111","3","1111111111","11111111","a","2023-05-20","PROVINCIAL","Sandwich doble(1)","Transferencita","Dolares");
INSERT INTO ordenes VALUES("28","a","33333333","a","Barquisimeto-Oeste","11111111111","2","1","11111111","a","2023-02-12","PROVINCIAL","clasico(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("29","z","22222222","a","Barquisimeto-Oeste","11111111111","2","1","22222222","a","2023-05-20","BANESCO","clasico(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("30","Javier","27349806","Casa","Cabudare-Parroquia","11111111111","3","19","27349806","Javier","2023-05-20","PROVINCIAL","Sandwich doble(1)","Pago","Bolívares");
INSERT INTO ordenes VALUES("31","Sonia","10777936","Casa","Cabudare-Parroquia","11111111111","2","1","10777936","Sonia","2023-05-20","PROVINCIAL","clasico(1)","Transferencita","Bolívares");
INSERT INTO ordenes VALUES("32","a","11111111","a","Barquisimeto-Oeste","11111111111","2","1","11111111","a","2023-05-20","MERCANTIL","clasico(1)","Transferencita","Bolívares");



CREATE TABLE `roles` (
  `id` int NOT NULL,
  `rol` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

INSERT INTO roles VALUES("1","admi");
INSERT INTO roles VALUES("2","usuario");



CREATE TABLE `subcategoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subcategoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status5` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO subcategoria VALUES("1","Perros-Calientes","1");
INSERT INTO subcategoria VALUES("2","Pepitos","1");
INSERT INTO subcategoria VALUES("3","Hamburguesas","1");
INSERT INTO subcategoria VALUES("4","Sandwiches","1");
INSERT INTO subcategoria VALUES("5","Refrescos","1");
INSERT INTO subcategoria VALUES("6","Casita","1");
INSERT INTO subcategoria VALUES("7","Pizza","1");
INSERT INTO subcategoria VALUES("8","Prueba","0");



CREATE TABLE `tamaños` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tamaño` varchar(50) NOT NULL,
  `status4` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tamaños VALUES("1","Pequeño","1");
INSERT INTO tamaños VALUES("2","Mediano","1");
INSERT INTO tamaños VALUES("3","Grande","1");
INSERT INTO tamaños VALUES("4","Extragrande","0");
INSERT INTO tamaños VALUES("5","Supergrande","0");
INSERT INTO tamaños VALUES("6","Megagrande","0");



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

