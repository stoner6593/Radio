/*
Navicat MySQL Data Transfer

Source Server         : ERWIN
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : database_radio

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2018-08-13 17:52:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tab_actividad_importante
-- ----------------------------
DROP TABLE IF EXISTS `tab_actividad_importante`;
CREATE TABLE `tab_actividad_importante` (
  `idactividad` int(11) NOT NULL AUTO_INCREMENT,
  `des_corta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_larga` longtext COLLATE utf8_spanish_ci,
  `url_foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `destacado` bit(1) DEFAULT b'0' COMMENT 'Si es detacado aparece como principal video',
  `publicado` bit(1) DEFAULT b'0',
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1',
  `codUsu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idactividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tab_actividad_importante
-- ----------------------------

-- ----------------------------
-- Table structure for tab_campanias
-- ----------------------------
DROP TABLE IF EXISTS `tab_campanias`;
CREATE TABLE `tab_campanias` (
  `idcampania` int(11) NOT NULL AUTO_INCREMENT,
  `des_corta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_larga` longtext COLLATE utf8_spanish_ci,
  `destacado` bit(1) DEFAULT b'0' COMMENT 'Si es detacado aparece como principal video',
  `publicado` bit(1) DEFAULT b'0',
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1',
  `codUsu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcampania`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tab_campanias
-- ----------------------------

-- ----------------------------
-- Table structure for tab_fotografias
-- ----------------------------
DROP TABLE IF EXISTS `tab_fotografias`;
CREATE TABLE `tab_fotografias` (
  `codFotografia` int(11) NOT NULL,
  `codPacientes` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT '0 Fotos\n1 Radiografias',
  `nomarchivo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codFotografia`),
  KEY `fk_codPaciente3_idx` (`codPacientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tab_fotografias
-- ----------------------------

-- ----------------------------
-- Table structure for tab_fotos_campanias
-- ----------------------------
DROP TABLE IF EXISTS `tab_fotos_campanias`;
CREATE TABLE `tab_fotos_campanias` (
  `idfotos_campanias` int(11) NOT NULL AUTO_INCREMENT,
  `idcampania` int(11) DEFAULT NULL,
  `archivo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1',
  `codUsu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotos_campanias`),
  KEY `fk_idcampanias` (`idcampania`),
  CONSTRAINT `fk_idcampanias` FOREIGN KEY (`idcampania`) REFERENCES `tab_campanias` (`idcampania`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tab_fotos_campanias
-- ----------------------------

-- ----------------------------
-- Table structure for tab_locutores
-- ----------------------------
DROP TABLE IF EXISTS `tab_locutores`;
CREATE TABLE `tab_locutores` (
  `idlocutor` int(11) NOT NULL AUTO_INCREMENT,
  `locutor` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `horario` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `publicado` bit(1) DEFAULT b'0',
  `estado` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idlocutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tab_locutores
-- ----------------------------

-- ----------------------------
-- Table structure for tab_menu
-- ----------------------------
DROP TABLE IF EXISTS `tab_menu`;
CREATE TABLE `tab_menu` (
  `codMenu` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `codUsuario` int(11) DEFAULT NULL,
  `codUsuRegistra` int(11) DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  PRIMARY KEY (`codMenu`),
  KEY `fk_tab_menu_tab_usuarios4` (`codUsuario`),
  CONSTRAINT `tab_menu_ibfk_2` FOREIGN KEY (`codUsuario`) REFERENCES `tab_usuarios` (`codUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tab_menu
-- ----------------------------
INSERT INTO `tab_menu` VALUES ('1', 'Slider', null, 'Slider', 'Slider', '', '1', '1', '2018-08-06');
INSERT INTO `tab_menu` VALUES ('2', 'Videos Destacados', null, 'Videos', 'Videos', '', '1', '1', '2018-08-07');

-- ----------------------------
-- Table structure for tab_slider
-- ----------------------------
DROP TABLE IF EXISTS `tab_slider`;
CREATE TABLE `tab_slider` (
  `idslider` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_grande` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `despequenia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1',
  `codUser` int(11) DEFAULT NULL,
  `publicado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idslider`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tab_slider
-- ----------------------------
INSERT INTO `tab_slider` VALUES ('1', null, null, '', '1dbc4508b22b7eb16b6a0dd7295671b58d16c872.jpg', '2018-08-13', '', '1', '1');
INSERT INTO `tab_slider` VALUES ('2', null, null, '', '9a0220ec38da1b70a49d7e8737bace49fac2e2df.jpg', '2018-08-13', '', '1', '1');
INSERT INTO `tab_slider` VALUES ('3', null, null, '', 'a26c45fbddbfac23f61eef7cf2bac1b90018ce0b.jpg', '2018-08-13', '', '1', '1');
INSERT INTO `tab_slider` VALUES ('4', null, null, '', 'd24a28f14b95bedcbfb61acd46d9b22634d4eb73.jpg', '2018-08-13', '', '1', '1');
INSERT INTO `tab_slider` VALUES ('5', null, null, '', '8a3f2df5af2e28f01956b362c61363903180fd2d.jpg', '2018-08-13', '', '1', '1');
INSERT INTO `tab_slider` VALUES ('6', null, null, '', '9f846ad7d2f382eaf045075dc415c7662c6bf019.jpg', '2018-08-13', '', '1', '1');
INSERT INTO `tab_slider` VALUES ('7', null, null, '', '06334a36dfc21fb3a682504f903fdf372c6437a9.jpg', '2018-08-13', '', '1', '0');

-- ----------------------------
-- Table structure for tab_submenu
-- ----------------------------
DROP TABLE IF EXISTS `tab_submenu`;
CREATE TABLE `tab_submenu` (
  `codSubmenu` int(11) NOT NULL AUTO_INCREMENT,
  `codMenu` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`codSubmenu`),
  KEY `fk_tab_submenu_tab_menu1` (`codMenu`),
  CONSTRAINT `tab_submenu_ibfk_1` FOREIGN KEY (`codMenu`) REFERENCES `tab_menu` (`codMenu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tab_submenu
-- ----------------------------

-- ----------------------------
-- Table structure for tab_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tab_usuarios`;
CREATE TABLE `tab_usuarios` (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codUsu` int(11) DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tab_usuarios
-- ----------------------------
INSERT INTO `tab_usuarios` VALUES ('1', '00000000', 'ADMINISTRADOR', 'ADMINISTRADOR', '2018-08-06', '-', null, null, null, 'ADMINISTRADOR', '9f7044bab8e08887b2152e3af51d7dfe94fa3e4e4b32531592ad2a2420e03ad5', 'HOZv2wrGavOAGYZmh29VHs38', '1', '2018-08-06', '', '1', '2018-08-06 20:55:43', null);

-- ----------------------------
-- Table structure for videos_destacados
-- ----------------------------
DROP TABLE IF EXISTS `videos_destacados`;
CREATE TABLE `videos_destacados` (
  `idvideos` int(11) NOT NULL AUTO_INCREMENT,
  `des_corta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_larga` text COLLATE utf8_spanish_ci,
  `url_video` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `destacado` int(11) DEFAULT NULL COMMENT 'Si es detacado aparece como principal video',
  `publicado` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1',
  `codUsu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvideos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of videos_destacados
-- ----------------------------
INSERT INTO `videos_destacados` VALUES ('1', 'OLI MOLI', '&lt;p&gt;Dexcripcion del video&lt;/p&gt;&lt;p&gt;&lt;b&gt;Mas informacion...&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Mas informacion...&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Mas informacion...&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;Mas informacion...&lt;/span&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;span style=&quot;font-weight: 700;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 'GT8_5p4_3rI', '1', '1', '2018-08-09 00:00:00', '', '1');
INSERT INTO `videos_destacados` VALUES ('2', 'PRUEBA DE DESCRIPCION CORTA', '&lt;p&gt;DESCIPCION LARGA&lt;/p&gt;', 'R6_nkXKfVD0', '1', '1', '2018-08-07 00:00:00', '', '1');
INSERT INTO `videos_destacados` VALUES ('3', 'PRUEBA DE VIDEO', '&lt;p&gt;&lt;b&gt;PRUEBA&lt;/b&gt; &lt;u&gt;DE &lt;/u&gt;&lt;font face=&quot;Arial Black&quot;&gt;VIDEO &lt;/font&gt;2&lt;/p&gt;&lt;ul&gt;&lt;li&gt;ASASASA&lt;/li&gt;&lt;/ul&gt;', '1V_xRb0x9aw', '0', '1', '2018-08-08 00:00:00', '', '1');
INSERT INTO `videos_destacados` VALUES ('4', 'rtrtrtr', '&lt;p&gt;Esto es una &lt;b&gt;prueba&lt;/b&gt; en la que no se que carajos van a poner&lt;/p&gt;&lt;p&gt;pero necesitan que esta cosa&lt;/p&gt;&lt;p&gt;se pueda modificar&lt;/p&gt;&lt;p&gt;a gusto del cliente :)&lt;/p&gt;&lt;p&gt;aparte de esto&lt;/p&gt;&lt;p&gt;hay que agregarle&amp;nbsp;&lt;/p&gt;&lt;p&gt;mas informacion&lt;/p&gt;&lt;p&gt;para probar el recuadro&lt;/p&gt;&lt;p&gt;del tex&lt;/p&gt;&lt;p&gt;to :)&lt;/p&gt;', 'GT8_5p4_3rI', '0', '1', '2018-08-10 00:00:00', '', '1');
SET FOREIGN_KEY_CHECKS=1;
