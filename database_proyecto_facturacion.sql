/*
 Navicat Premium Data Transfer

 Source Server         : ERWIN
 Source Server Type    : MySQL
 Source Server Version : 50711
 Source Host           : 127.0.0.1:3306
 Source Schema         : database_proyecto_facturacion

 Target Server Type    : MySQL
 Target Server Version : 50711
 File Encoding         : 65001

 Date: 05/03/2018 18:01:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tab_almacen
-- ----------------------------
DROP TABLE IF EXISTS `tab_almacen`;
CREATE TABLE `tab_almacen`  (
  `codAlmacen` int(11) NOT NULL AUTO_INCREMENT,
  `codSucursal` int(11) NULL DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ubicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  `codUsuario` int(11) NULL DEFAULT NULL,
  `fecharegistro` date NULL DEFAULT NULL,
  `estado_principal` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`codAlmacen`) USING BTREE,
  INDEX `fk_tab_almacen_tab_sucursal1`(`codSucursal`) USING BTREE,
  CONSTRAINT `fk_tab_almacen_tab_sucursal1` FOREIGN KEY (`codSucursal`) REFERENCES `tab_sucursal` (`codSucursal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_almacen
-- ----------------------------
INSERT INTO `tab_almacen` VALUES (1, 1, 'ALMACEN PRUEBA', 'PIURA', NULL, 'ALMACEN PRUEBA', b'1', 1, '2018-01-17', b'1');
INSERT INTO `tab_almacen` VALUES (3, 1, 'ALMACEN PRUEBA 2', 'CASTILLA', NULL, 'ALMACEN PRUEBA 2', b'1', 1, '2018-01-17', NULL);

-- ----------------------------
-- Table structure for tab_anticipo
-- ----------------------------
DROP TABLE IF EXISTS `tab_anticipo`;
CREATE TABLE `tab_anticipo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_anticipo` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion_anticipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_anticipo
-- ----------------------------
INSERT INTO `tab_anticipo` VALUES (1, '01', 'Factura – emitida para corregir error en el RUC');
INSERT INTO `tab_anticipo` VALUES (2, '02', 'Factura – emitida por anticipos');
INSERT INTO `tab_anticipo` VALUES (3, '03', 'Boleta de Venta – emitida por anticipos');
INSERT INTO `tab_anticipo` VALUES (4, '04', 'Ticket de Salida - ENAPU');
INSERT INTO `tab_anticipo` VALUES (5, '05', 'Código SCOP');
INSERT INTO `tab_anticipo` VALUES (6, '99', 'Otros');

-- ----------------------------
-- Table structure for tab_clientes
-- ----------------------------
DROP TABLE IF EXISTS `tab_clientes`;
CREATE TABLE `tab_clientes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_numdoc` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_razonsocial` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_telefono` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT '0',
  `cli_correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_contacto` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_contactotelef` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_contactocorreo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cli_estado` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_clientes
-- ----------------------------
INSERT INTO `tab_clientes` VALUES (4, '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '', 'stoner6593@gmail.com', '', '', '', 'AC');
INSERT INTO `tab_clientes` VALUES (5, '20601075246', 'SGE SYSTEMS S.A.C.', 'CAL.LIBERTAD NRO. 218 INT. 3 CENT PIURA (ALTURA DEL TEATRO MUNICIPAL) PIURA - PIURA - PIURA', '', 'sge@gmail.com', '', '', '', 'AC');
INSERT INTO `tab_clientes` VALUES (6, '43136570', 'JOSUE SOSA ESCOBAR', 'Castilla', '11111', 'josue@hotmail.com', 'contacto prueba', '3222222', 'contacto@gmail.com', 'AC');
INSERT INTO `tab_clientes` VALUES (8, '10417740231', 'BAZAN DE LA CRUZ JOSE MANUEL', 'MZA. 2 LOTE. 04 A.H. RAMON CASTILLA (SC L.SANCHEZ - PARADERO 12 DE BAYOVAR) LIMA - LIMA - SAN JUAN DE LURIGANCHO', '960813167', 'jbazand@electronperu.com.pe', '', '', '', 'AC');
INSERT INTO `tab_clientes` VALUES (9, '03338905', 'AUGUSTO TORRES ZAPATA', '', '', 'augusto@gmail.com', '', '', '', 'AC');

-- ----------------------------
-- Table structure for tab_cotizacion
-- ----------------------------
DROP TABLE IF EXISTS `tab_cotizacion`;
CREATE TABLE `tab_cotizacion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_id` int(11) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `sub_total` decimal(10, 5) NULL DEFAULT NULL,
  `igv` decimal(10, 5) NULL DEFAULT NULL,
  `total` decimal(10, 5) NULL DEFAULT NULL,
  `nota` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_cli_id`(`cli_id`) USING BTREE,
  CONSTRAINT `fk_cli_id` FOREIGN KEY (`cli_id`) REFERENCES `tab_clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_cotizacion
-- ----------------------------
INSERT INTO `tab_cotizacion` VALUES (1, 5, '0000-00-00', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (2, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (3, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (4, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (5, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (6, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (7, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (8, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (9, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (10, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (11, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (12, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);
INSERT INTO `tab_cotizacion` VALUES (13, 4, '2017-07-27', 120.00000, 150.00000, 200.00000, '', 0);

-- ----------------------------
-- Table structure for tab_detalle_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tab_detalle_invoice`;
CREATE TABLE `tab_detalle_invoice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_doc` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cod_prod` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cantidad` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uni_medida` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pre_unitario` decimal(10, 2) NULL DEFAULT NULL,
  `pre_referencial` decimal(10, 2) NULL DEFAULT NULL,
  `tipo_precio` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `impuesto` decimal(10, 2) NULL DEFAULT NULL,
  `tipo_inpuesto` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isc` decimal(10, 2) NULL DEFAULT NULL,
  `otro_impuesto` decimal(10, 2) NULL DEFAULT NULL,
  `sub_total` decimal(10, 2) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_detalle_invoice
-- ----------------------------
INSERT INTO `tab_detalle_invoice` VALUES (1, 'FF11-00000444', NULL, 's', '1', 'NIU', 160.00, 0.00, '01', 24.41, '10', 0.00, 0.00, 135.59, 160.00);
INSERT INTO `tab_detalle_invoice` VALUES (2, 'FF11-00000446', '1', 'producto prueba', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (3, 'FF11-00000447', '1', 'producto prueba', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (4, 'FF11-00000449', '1', 'producto prueba', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (5, 'FF11-00000450', '1', 'producto prueba', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (6, 'FF11-00000452', '1', 'producto prueba', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (7, 'FF11-00000453', '1', 'producto prueba', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (8, 'FF11-00000033', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (9, 'FF11-00000034', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (10, 'FF11-00000035', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (11, 'FF11-00000036', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (12, 'FF11-00000037', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (13, 'FF11-00000038', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (14, 'FF11-00000039', '1', 'sss', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (15, 'FF11-00000456', '1', '150\n1', '2', 'NIU', 150.00, 0.00, '01', 45.76, '10', 0.00, 0.00, 254.24, 300.00);
INSERT INTO `tab_detalle_invoice` VALUES (16, 'FF11-00000457', '1', '150\n1', '2', 'NIU', 150.00, 0.00, '01', 45.76, '10', 0.00, 0.00, 254.24, 300.00);
INSERT INTO `tab_detalle_invoice` VALUES (17, 'FF11-00000458', '1', '150\n1', '2', 'NIU', 150.00, 0.00, '01', 45.76, '10', 0.00, 0.00, 254.24, 300.00);
INSERT INTO `tab_detalle_invoice` VALUES (18, 'FF11-00000459', '1', '150\n1', '2', 'NIU', 150.00, 0.00, '01', 45.76, '10', 0.00, 0.00, 254.24, 300.00);
INSERT INTO `tab_detalle_invoice` VALUES (19, 'FF11-00000460', '1', '150\n1', '2', 'NIU', 150.00, 0.00, '01', 45.76, '10', 0.00, 0.00, 254.24, 300.00);
INSERT INTO `tab_detalle_invoice` VALUES (20, 'FF11-00000461', '1', 'prueba', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (21, 'FF11-00000462', 'a', 'a', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (22, 'FF11-00000463', 'a', 'a', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (23, 'FF11-00000464', 'a', 'a', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (24, 'FF11-00000465', 'd', '1', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (25, 'FF11-00000466', 'd', '1', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (26, 'FF11-00000468', '1', 'asas\n', '2', 'NIU', 100.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);
INSERT INTO `tab_detalle_invoice` VALUES (27, 'FF11-00000469', '1', 'sss', '150', 'NIU', 150.00, 0.00, '01', 3432.20, '10', 0.00, 0.00, 19067.80, 22500.00);
INSERT INTO `tab_detalle_invoice` VALUES (28, 'FF11-00000470', '1', 'ssss\n', '1', 'NIU', 20.00, 0.00, '01', 3.05, '10', 0.00, 0.00, 16.95, 20.00);
INSERT INTO `tab_detalle_invoice` VALUES (29, 'FF11-00000471', '1', 'PRODUCTO 1', '1', 'NIU', 150.00, 0.00, '01', 22.88, '10', 0.00, 0.00, 127.12, 150.00);
INSERT INTO `tab_detalle_invoice` VALUES (30, 'FF11-00000471', '2', 'PRODUCTO 2', '1', 'NIU', 200.00, 0.00, '01', 30.51, '10', 0.00, 0.00, 169.49, 200.00);

-- ----------------------------
-- Table structure for tab_detcotizacion
-- ----------------------------
DROP TABLE IF EXISTS `tab_detcotizacion`;
CREATE TABLE `tab_detcotizacion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coti_id` int(11) NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cantidad` double(10, 0) NULL DEFAULT NULL,
  `precio` decimal(10, 5) NULL DEFAULT NULL,
  `igv` decimal(10, 5) NULL DEFAULT NULL,
  `subtotal` decimal(10, 5) NULL DEFAULT NULL,
  `total` decimal(10, 5) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_coti_id`(`coti_id`) USING BTREE,
  CONSTRAINT `fk_coti_id` FOREIGN KEY (`coti_id`) REFERENCES `tab_cotizacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tab_documentoidentidad
-- ----------------------------
DROP TABLE IF EXISTS `tab_documentoidentidad`;
CREATE TABLE `tab_documentoidentidad`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_docuident` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion_docuident` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_documentoidentidad
-- ----------------------------
INSERT INTO `tab_documentoidentidad` VALUES (1, '0', 'DOC.TRIB.NO.DOM.SIN.RUC');
INSERT INTO `tab_documentoidentidad` VALUES (2, '1', 'DOC. NACIONAL DE IDENTIDAD');
INSERT INTO `tab_documentoidentidad` VALUES (3, '4', 'CARNET DE EXTRANJERIA');
INSERT INTO `tab_documentoidentidad` VALUES (4, '6', 'REG. UNICO DE CONTRIBUYENTES');
INSERT INTO `tab_documentoidentidad` VALUES (5, '7', 'PASAPORTE');
INSERT INTO `tab_documentoidentidad` VALUES (6, 'A', 'CED. DIPLOMATICA DE IDENTIDAD');

-- ----------------------------
-- Table structure for tab_documentorelacionado
-- ----------------------------
DROP TABLE IF EXISTS `tab_documentorelacionado`;
CREATE TABLE `tab_documentorelacionado`  (
  `id_relacionado` int(11) NOT NULL AUTO_INCREMENT,
  `cod_relacionado` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `des_relacionado` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_relacionado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_documentorelacionado
-- ----------------------------
INSERT INTO `tab_documentorelacionado` VALUES (1, '01', 'FACTURA');
INSERT INTO `tab_documentorelacionado` VALUES (2, '03', 'BOLETA DE VENTA');
INSERT INTO `tab_documentorelacionado` VALUES (3, '07', 'NOTA DE CREDITO');
INSERT INTO `tab_documentorelacionado` VALUES (4, '08', 'NOTA DE DEBITO');
INSERT INTO `tab_documentorelacionado` VALUES (5, '09', 'GUIA DE REMISIÓN REMITENTE');
INSERT INTO `tab_documentorelacionado` VALUES (6, '13', 'DOCUMENTO EMITIDO POR BANCOS II.FF. CREDITICIAS Y DE SEGUROS');
INSERT INTO `tab_documentorelacionado` VALUES (7, '18', 'DOCUMENTOS EMITIDOS POR LAS AFP');
INSERT INTO `tab_documentorelacionado` VALUES (8, '31', 'GUIA DE REMISIÓN TRANSPORTISTA');
INSERT INTO `tab_documentorelacionado` VALUES (9, '56', 'COMPROBANTE DE PAGO SEAE');

-- ----------------------------
-- Table structure for tab_empresa
-- ----------------------------
DROP TABLE IF EXISTS `tab_empresa`;
CREATE TABLE `tab_empresa`  (
  `codEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `razonsocial` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `representante` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  `codUsuario` int(11) NULL DEFAULT NULL,
  `fecharegistro` date NULL DEFAULT NULL,
  `certificado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `usuariosunat` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `clavesunat` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`codEmpresa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_empresa
-- ----------------------------
INSERT INTO `tab_empresa` VALUES (1, '20601075246', 'SGESYSTEMS SAC', 'PIURA', NULL, NULL, b'1', NULL, '2017-10-31', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tab_familia
-- ----------------------------
DROP TABLE IF EXISTS `tab_familia`;
CREATE TABLE `tab_familia`  (
  `codFamilia` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `codUsuario` int(11) NOT NULL,
  `fecharegistro` datetime(0) NOT NULL,
  PRIMARY KEY (`codFamilia`) USING BTREE,
  UNIQUE INDEX `referencia`(`referencia`) USING BTREE,
  INDEX `codUsuario`(`codUsuario`) USING BTREE,
  CONSTRAINT `familia_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tab_usuarios` (`codUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tab_familia
-- ----------------------------
INSERT INTO `tab_familia` VALUES (33, 'FAMILA CERDOS', 'PUTO :v', b'1', 1, '0000-00-00 00:00:00');
INSERT INTO `tab_familia` VALUES (34, 'familia2', 'familia2', b'1', 1, '2018-03-01 00:00:00');

-- ----------------------------
-- Table structure for tab_grupo
-- ----------------------------
DROP TABLE IF EXISTS `tab_grupo`;
CREATE TABLE `tab_grupo`  (
  `codGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `codLinea` int(11) NOT NULL,
  `referencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `codUsuario` int(11) NOT NULL,
  `fecharegistro` datetime(0) NOT NULL,
  PRIMARY KEY (`codGrupo`) USING BTREE,
  UNIQUE INDEX `referencia`(`referencia`) USING BTREE,
  INDEX `codLinea`(`codLinea`) USING BTREE,
  CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`codLinea`) REFERENCES `linea` (`codLinea`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tab_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tab_invoice`;
CREATE TABLE `tab_invoice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `num_doc` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `num_doc_cli` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nom_cli` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dir_cli` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_emision` date NULL DEFAULT NULL,
  `gravadas` decimal(10, 2) NULL DEFAULT NULL,
  `exoneradas` decimal(10, 2) NULL DEFAULT NULL,
  `inafectas` decimal(10, 2) NULL DEFAULT NULL,
  `gratuitas` decimal(10, 2) NULL DEFAULT NULL,
  `subtotal` decimal(10, 2) NULL DEFAULT NULL,
  `igv` decimal(10, 2) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `respuesta` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nomarchivo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nompdf` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_invoice
-- ----------------------------
INSERT INTO `tab_invoice` VALUES (1, '01', NULL, '10479617967', 'ERWIN', '', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, '', '', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (2, '01', 'FF11-00000436', '10479617967', 'ERWIN', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, '', '', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (3, '01', 'FF11-00000437', '10479617967', 'ERWIN', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, '0', 'La Factura numero FF11-00000437, ha sido aceptada', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (4, '01', 'FF11-00000439', '10479617967', 'sa', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, NULL, NULL, NULL, NULL);
INSERT INTO `tab_invoice` VALUES (5, '01', 'FF11-00000440', '10479617967', 'sa', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, NULL, NULL, NULL, NULL);
INSERT INTO `tab_invoice` VALUES (6, '01', 'FF11-00000441', '10479617967', 'sa', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, NULL, NULL, NULL, NULL);
INSERT INTO `tab_invoice` VALUES (7, '01', 'FF11-00000442', '10479617967', 'sa', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, 'soap-env:C', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489517716975 error: Error', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (8, '01', 'FF11-00000443', '10479617967', 'sa', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, 'soap-env:Client.2022', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489517741740 error: Error', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (9, '01', 'FF11-00000444', '10479617967', 'sa', '', '2017-03-14', 135.59, 0.00, 0.00, 0.00, 135.59, 24.41, 160.00, 'soap-env:Client.2022', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489524724883 error: Error', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (10, '01', 'FF11-00000446', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-14', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, '0', 'La Factura numero FF11-00000446, ha sido aceptada', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (11, '01', 'FF11-00000447', '10479617967', 'h', '', '2017-03-14', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, 'soap-env:Client.2022', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489525133389 error: Error', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (12, '01', 'FF11-00000449', '10479617967', 'h', '', '2017-03-14', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, ' 2022', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489525349054 error: Error', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (13, '01', 'FF11-00000450', '12365478965', 'v', '', '2017-03-14', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, ' 2022', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489525377971 error: Error', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (14, '01', 'FF11-00000452', '10479617967', 'ERWIN', '', '2017-03-14', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, '0', 'La Factura numero FF11-00000452, ha sido aceptada', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (15, '01', 'FF11-00000453', '10479617967', 'ERWIN', '', '2017-03-14', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, '0', 'La Factura numero FF11-00000453, ha sido aceptada', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (16, '07', 'FF11-00000033', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2414', 'No se ha consignado en la nota el tag cac:DiscrepancyResponse\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489528937396 error: Error E', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (17, '07', 'FF11-00000034', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2414', 'No se ha consignado en la nota el tag cac:DiscrepancyResponse\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489528952479 error: Error E', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (18, '07', 'FF11-00000035', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2016', 'AdditionalAccountID -  El dato ingresado  en el tipo de documento de identidad del receptor no cumple con el estandar o no esta permitido.\n           ', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (19, '07', 'FF11-00000036', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2365', 'El comprobante contiene un tipo y número de Documento Relacionado repetido\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489528988344 e', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (20, '07', 'FF11-00000037', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2136', 'El XML no contiene el tag o no existe informacion de cac:DiscrepancyResponse/cbc:Description\n            Detalle:\n            xxx.xxx.xxx value=\'ticke', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (21, '07', 'FF11-00000038', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2365', 'El comprobante contiene un tipo y número de Documento Relacionado repetido\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489529031889 e', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (22, '07', 'FF11-00000039', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-03-14', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, '0', 'La Nota de Credito numero FF11-00000039, ha sido aceptada', NULL, NULL);
INSERT INTO `tab_invoice` VALUES (23, '01', 'FF11-00000456', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 254.24, 0.00, 0.00, 0.00, 254.24, 45.76, 300.00, '0', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000456.zip', '20102501293-2017-03-16-FF11-00000456');
INSERT INTO `tab_invoice` VALUES (24, '01', 'FF11-00000457', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 254.24, 0.00, 0.00, 0.00, 254.24, 45.76, 300.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000457.zip', '20102501293-2017-03-16-FF11-00000457');
INSERT INTO `tab_invoice` VALUES (25, '01', 'FF11-00000458', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 254.24, 0.00, 0.00, 0.00, 254.24, 45.76, 300.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000458.zip', '20102501293-2017-03-16-FF11-00000458');
INSERT INTO `tab_invoice` VALUES (26, '01', 'FF11-00000459', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 254.24, 0.00, 0.00, 0.00, 254.24, 45.76, 300.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000459', '20102501293-2017-03-16-FF11-00000459');
INSERT INTO `tab_invoice` VALUES (27, '01', 'FF11-00000460', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 254.24, 0.00, 0.00, 0.00, 254.24, 45.76, 300.00, NULL, NULL, '20102501293-01-FF11-00000460', '20102501293-2017-03-16-FF11-00000460');
INSERT INTO `tab_invoice` VALUES (28, '01', 'FF11-00000461', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000461', '20102501293-2017-03-16-FF11-00000461');
INSERT INTO `tab_invoice` VALUES (29, '01', 'FF11-00000462', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000462', '20102501293-2017-03-16-FF11-00000462');
INSERT INTO `tab_invoice` VALUES (30, '01', 'FF11-00000463', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000463', '20102501293-2017-03-16-FF11-00000463');
INSERT INTO `tab_invoice` VALUES (31, '01', 'FF11-00000464', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-16', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000464', '20102501293-2017-03-16-FF11-00000464');
INSERT INTO `tab_invoice` VALUES (32, '01', 'FF11-00000465', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-03-17', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, 'WSDL', 'SOAP-ERROR: Parsing WSDL: Couldn\'t load from \'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService?wsdl\' : failed to load external entity \"htt', '20102501293-01-FF11-00000465', '20102501293-2017-03-17-FF11-00000465');
INSERT INTO `tab_invoice` VALUES (33, '01', 'FF11-00000466', '10479617967', 's', '', '2017-03-17', 127.12, 0.00, 0.00, 0.00, 127.12, 22.88, 150.00, ' 2022', 'RegistrationName -  El dato ingresado no cumple con el estandar\n            Detalle:\n            xxx.xxx.xxx value=\'ticket: 1489775655002 error: Error', '20102501293-01-FF11-00000466', '20102501293-2017-03-17-FF11-00000466');
INSERT INTO `tab_invoice` VALUES (34, '01', 'FF11-00000468', '20601075246', 'SGE SYSTEMS S.A.C.', 'CAL.LIBERTAD NRO. 218 INT. 3 CENT PIURA (ALTURA DEL TEATRO MUNICIPAL) PIURA - PIURA - PIURA', '2017-07-10', 169.49, 0.00, 0.00, 0.00, 169.49, 30.51, 200.00, '0', 'La Factura numero FF11-00000468, ha sido aceptada', '20484171671-01-FF11-00000468', '20484171671-2017-07-10-FF11-00000468');
INSERT INTO `tab_invoice` VALUES (35, '01', 'FF11-00000469', '10479617967', 'TORRES LEON ERWIN STALIN', 'MZA. J3 LOTE. 10 URB. COSSIO DEL POMAR (AL FRENTE DE FERRETERIA HENRY) PIURA - PIURA - CASTILLA', '2017-07-10', 19067.80, 0.00, 0.00, 0.00, 19067.80, 3432.20, 22500.00, '0', 'La Factura numero FF11-00000469, ha sido aceptada', '20484171671-01-FF11-00000469', '20484171671-2017-07-10-FF11-00000469');
INSERT INTO `tab_invoice` VALUES (36, '01', 'FF11-00000470', '20601072246', 'ERWIN TORRES ', '', '2017-07-15', 16.95, 0.00, 0.00, 0.00, 16.95, 3.05, 20.00, '0', 'La Factura numero FF11-00000470, ha sido aceptada', '20484171671-01-FF11-00000470', '20484171671-2017-07-15-FF11-00000470');
INSERT INTO `tab_invoice` VALUES (37, '01', 'FF11-00000471', '10479617967', 'TORRES LEON ERWIN STALIN', '', '2017-08-04', 296.61, 0.00, 0.00, 0.00, 296.61, 53.39, 350.00, '0', 'La Factura numero FF11-00000471, ha sido aceptada', '20484171671-01-FF11-00000471', '20484171671-2017-08-04-FF11-00000471');

-- ----------------------------
-- Table structure for tab_linea
-- ----------------------------
DROP TABLE IF EXISTS `tab_linea`;
CREATE TABLE `tab_linea`  (
  `codLinea` int(11) NOT NULL AUTO_INCREMENT,
  `codFamilia` int(11) NOT NULL,
  `referencia` varchar(13) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `codUser` int(11) NOT NULL,
  `fecharegistro` datetime(0) NOT NULL,
  PRIMARY KEY (`codLinea`) USING BTREE,
  UNIQUE INDEX `referencia`(`referencia`) USING BTREE,
  INDEX `codFamilia`(`codFamilia`) USING BTREE,
  CONSTRAINT `linea_ibfk_1` FOREIGN KEY (`codFamilia`) REFERENCES `tab_familia` (`codFamilia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tab_linea
-- ----------------------------
INSERT INTO `tab_linea` VALUES (1, 33, 'linea1', 'lnea1', b'1', 1, '0000-00-00 00:00:00');
INSERT INTO `tab_linea` VALUES (2, 34, 'linea2', 'linea2', b'1', 1, '0000-00-00 00:00:00');
INSERT INTO `tab_linea` VALUES (3, 33, 'linea3', 'linea3', b'1', 1, '0000-00-00 00:00:00');
INSERT INTO `tab_linea` VALUES (4, 34, 'linea4', 'linea4', b'1', 1, '0000-00-00 00:00:00');
INSERT INTO `tab_linea` VALUES (5, 34, 'linea 5', 'linea 4', b'1', 1, '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tab_marca
-- ----------------------------
DROP TABLE IF EXISTS `tab_marca`;
CREATE TABLE `tab_marca`  (
  `codMarca` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `codUser` int(11) NOT NULL,
  `fecharegistro` datetime(0) NOT NULL,
  PRIMARY KEY (`codMarca`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tab_menu
-- ----------------------------
DROP TABLE IF EXISTS `tab_menu`;
CREATE TABLE `tab_menu`  (
  `codMenu` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `titulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  `codUsuario` int(11) NULL DEFAULT NULL,
  `codAlmacen` int(11) NULL DEFAULT NULL,
  `codUsuRegistra` int(11) NULL DEFAULT NULL,
  `fecharegistro` date NULL DEFAULT NULL,
  PRIMARY KEY (`codMenu`) USING BTREE,
  INDEX `fk_tab_menu_tab_almacen3`(`codAlmacen`) USING BTREE,
  INDEX `fk_tab_menu_tab_usuarios4`(`codUsuario`) USING BTREE,
  CONSTRAINT `fk_tab_menu_tab_almacen3` FOREIGN KEY (`codAlmacen`) REFERENCES `tab_almacen` (`codAlmacen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tab_menu_tab_usuarios4` FOREIGN KEY (`codUsuario`) REFERENCES `tab_usuarios` (`codUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_menu
-- ----------------------------
INSERT INTO `tab_menu` VALUES (1, 'VENTAS', 'ion-ios-cart bg-gradient-aqua', NULL, 'VENTAS', b'1', 1, 1, 1, '2018-01-18');
INSERT INTO `tab_menu` VALUES (2, 'COMPRAS', 'ion-ios-list bg-gradient-purple', NULL, 'COMPRAS', b'1', 1, 1, 1, '2018-01-18');
INSERT INTO `tab_menu` VALUES (3, 'ALMACEN', 'ion-ios-home bg-gradient-orange', NULL, 'ALMACEN', b'1', 1, 1, 1, '2018-01-18');
INSERT INTO `tab_menu` VALUES (4, 'ENTIDADES', 'ion-ios-list bg-pink', NULL, 'ENTIDADES', b'1', 1, 1, 1, '2018-01-18');
INSERT INTO `tab_menu` VALUES (5, 'CAJA', 'ion-social-usd-outline bg-green', NULL, 'CAJA', b'1', 1, 1, 1, '2018-01-18');
INSERT INTO `tab_menu` VALUES (6, 'ADMINISTRADOR', 'ion-ios-toggle bg-gradient-aqua', NULL, 'ADMINISTRADOR', b'1', 1, 1, 1, '2018-01-18');
INSERT INTO `tab_menu` VALUES (7, 'REPORTES', 'ion-stats-bars bg-gradient-orange', NULL, 'REPORTES', b'1', 1, 1, 1, '2018-01-18');

-- ----------------------------
-- Table structure for tab_nivel
-- ----------------------------
DROP TABLE IF EXISTS `tab_nivel`;
CREATE TABLE `tab_nivel`  (
  `codNivel` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`codNivel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_nivel
-- ----------------------------
INSERT INTO `tab_nivel` VALUES (1, 'ADMINISTRADOR', b'1');
INSERT INTO `tab_nivel` VALUES (2, 'VENDEDOR', b'1');

-- ----------------------------
-- Table structure for tab_numeracion
-- ----------------------------
DROP TABLE IF EXISTS `tab_numeracion`;
CREATE TABLE `tab_numeracion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `nom_documento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `serie` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `numeracion` int(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_numeracion
-- ----------------------------
INSERT INTO `tab_numeracion` VALUES (1, '01', 'Factura', 'FF11', 472);
INSERT INTO `tab_numeracion` VALUES (2, '03', 'Boleta', 'BB11', 7);
INSERT INTO `tab_numeracion` VALUES (3, '07', 'Nota de Crédito', 'FF11', 40);
INSERT INTO `tab_numeracion` VALUES (4, '08', 'Nota de Débito', 'FF11', 9);
INSERT INTO `tab_numeracion` VALUES (5, 'RA', 'Comunicación de Baja', 'R001', 1);

-- ----------------------------
-- Table structure for tab_parametros
-- ----------------------------
DROP TABLE IF EXISTS `tab_parametros`;
CREATE TABLE `tab_parametros`  (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `param_codparam` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `param_descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `param_valor` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `param_estado` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipparam_id` int(11) NOT NULL,
  PRIMARY KEY (`param_id`) USING BTREE,
  INDEX `tipparam_id`(`tipparam_id`) USING BTREE,
  CONSTRAINT `tab_parametros_ibfk_1` FOREIGN KEY (`tipparam_id`) REFERENCES `tab_tipparam` (`tipparam_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_parametros
-- ----------------------------
INSERT INTO `tab_parametros` VALUES (1, '01', 'Precio unitario (incluye el IGV)', NULL, 'AC', 1);
INSERT INTO `tab_parametros` VALUES (2, '02', 'Valor refencial unitario en operaciones no onerosas', NULL, 'AC', 1);
INSERT INTO `tab_parametros` VALUES (3, '10', 'Gravado - Operación Onerosa', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (4, '11', 'Gravado – Retiro por premio', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (5, '12', 'Gravado – Retiro por donación', '', 'AC', 2);
INSERT INTO `tab_parametros` VALUES (6, '13', 'Gravado – Retiro', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (7, '14', 'Gravado – Retiro por publicidad', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (8, '15', 'Gravado – Bonificaciones', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (9, '16', 'Gravado – Retiro por entrega a trabajadores', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (10, '17', 'Gravado – IVAP', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (11, '20', 'Exonerado - Operación Onerosa', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (12, '21', 'Exonerado – Transferencia Gratuita', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (13, '30', 'Inafecto - Operación Onerosa', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (14, '31', 'Inafecto – Retiro por Bonificación', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (15, '32', 'Inafecto – Retiro', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (16, '33', 'Inafecto – Retiro por Muestras Médicas', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (17, '34', 'Inafecto - Retiro por Convenio Colectivo', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (18, '35', 'Inafecto – Retiro por premio', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (19, '36', 'Inafecto - Retiro por publicidad', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (20, '40', 'Exportación', NULL, 'AC', 2);
INSERT INTO `tab_parametros` VALUES (21, 'NIU', 'Unidad', NULL, 'AC', 3);
INSERT INTO `tab_parametros` VALUES (22, 'KG', 'Kilogramos', NULL, 'AC', 3);
INSERT INTO `tab_parametros` VALUES (23, 'LRB', 'Libras', NULL, 'AC', 3);
INSERT INTO `tab_parametros` VALUES (24, 'ONZ', 'Onza', NULL, 'AC', 3);
INSERT INTO `tab_parametros` VALUES (25, 'LTR', 'Litro', NULL, 'AC', 3);

-- ----------------------------
-- Table structure for tab_submenu
-- ----------------------------
DROP TABLE IF EXISTS `tab_submenu`;
CREATE TABLE `tab_submenu`  (
  `codSubmenu` int(11) NOT NULL AUTO_INCREMENT,
  `codMenu` int(11) NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `titulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`codSubmenu`) USING BTREE,
  INDEX `fk_tab_submenu_tab_menu1`(`codMenu`) USING BTREE,
  CONSTRAINT `fk_tab_submenu_tab_menu1` FOREIGN KEY (`codMenu`) REFERENCES `tab_menu` (`codMenu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_submenu
-- ----------------------------
INSERT INTO `tab_submenu` VALUES (1, 1, 'VENTA', NULL, NULL, 'GENERAR VENTAS', b'1');
INSERT INTO `tab_submenu` VALUES (2, 1, 'LISTADO VENTAS', NULL, NULL, 'LISTAR VENTAS', b'1');
INSERT INTO `tab_submenu` VALUES (3, 1, 'GUIAS', NULL, NULL, 'GENERAR GUIAS', b'1');
INSERT INTO `tab_submenu` VALUES (4, 1, 'LISTADO GUIAS', NULL, NULL, 'LISTAR GUIAS', b'1');
INSERT INTO `tab_submenu` VALUES (5, 1, 'NOTAS DE CREDITO', NULL, NULL, 'GENERAR NOTAS DE CREDITO', b'1');
INSERT INTO `tab_submenu` VALUES (6, 1, 'LISTADO NOTAS DE CREDITO', NULL, NULL, 'LISTAR NOTAS DE CREDITO', b'1');
INSERT INTO `tab_submenu` VALUES (7, 1, 'NOTAS DE DEBITO', NULL, NULL, 'GENERAR NOTAS DE DEBITO', b'1');
INSERT INTO `tab_submenu` VALUES (8, 1, 'LISTADO NOTAS DE DEBITO', NULL, NULL, 'LISTAR NOTAS DE DEBITO', b'1');
INSERT INTO `tab_submenu` VALUES (9, 1, 'COBROS', NULL, NULL, 'VENTAS PENDIENTES POR PAGAR', b'1');
INSERT INTO `tab_submenu` VALUES (10, 2, 'COMPRAS', NULL, NULL, 'GENERAR COMPRAS DIRECTAS', b'1');
INSERT INTO `tab_submenu` VALUES (11, 2, 'LISTADO COMPRAS', NULL, NULL, 'LISTAR COMPRAS', b'1');
INSERT INTO `tab_submenu` VALUES (12, 2, 'ORDEN COMPRAS', NULL, NULL, 'GENERAR ORDEN DE COMPRAS', b'1');
INSERT INTO `tab_submenu` VALUES (13, 2, 'LISTADO ORDEN COMPRA', NULL, NULL, 'LISTAR ORDEN DE COMPRAS', b'1');
INSERT INTO `tab_submenu` VALUES (14, 2, 'PAGOS', NULL, NULL, 'GENERAR PAGOS DE COMPRAS', b'1');
INSERT INTO `tab_submenu` VALUES (15, 3, 'NOTAS DE INGRESO', NULL, NULL, 'GENERAR NOTAS DE INGRESO', b'1');
INSERT INTO `tab_submenu` VALUES (16, 3, 'NOTAS DE SALIDA', NULL, NULL, 'GENERAR NOTAS DE SALIDAS', b'1');
INSERT INTO `tab_submenu` VALUES (17, 3, 'TRANSFERENCIAS', NULL, NULL, 'GENERAR TRANSFERENCIAS', b'1');
INSERT INTO `tab_submenu` VALUES (18, 3, 'LISTADO DE TRANSFERENCIAS', NULL, NULL, 'LISTAR TRANSFERENCIAS', b'1');
INSERT INTO `tab_submenu` VALUES (19, 3, 'CONSULTAR I/S', NULL, NULL, 'COSULTAR MOVIMIENTOS', b'1');
INSERT INTO `tab_submenu` VALUES (20, 3, 'STOCK DE ALMACEN', NULL, NULL, 'LISTAR STOCK DE PRODUCTOS POR ALMACEN', b'1');
INSERT INTO `tab_submenu` VALUES (21, 4, 'PRODUCTOS', NULL, NULL, 'CREAR PRODUCTOS', b'1');
INSERT INTO `tab_submenu` VALUES (22, 4, 'FAMILIAS', NULL, 'Familias', 'CREAR FAMILIAS - PRODUCTOS', b'1');
INSERT INTO `tab_submenu` VALUES (23, 4, 'LINEAS', NULL, 'Lineas', 'CREAR LINEAS', b'1');
INSERT INTO `tab_submenu` VALUES (24, 4, 'GRUPOS', NULL, 'Grupos', 'CREAR GRUPOS', b'1');
INSERT INTO `tab_submenu` VALUES (25, 4, 'MARCAS', NULL, 'Marcas', 'CREAR MARCAS', b'1');
INSERT INTO `tab_submenu` VALUES (26, 4, 'CLIENTES', NULL, 'Clientes', 'CREAR CLIENTES', b'1');
INSERT INTO `tab_submenu` VALUES (27, 4, 'PROVEEDORES', NULL, 'Proveedores', 'CREAR PROVEEDORES', b'1');
INSERT INTO `tab_submenu` VALUES (28, 4, 'USUARIOS', NULL, 'Usuarios', 'CREAR USUARIOS', b'1');

-- ----------------------------
-- Table structure for tab_sucursal
-- ----------------------------
DROP TABLE IF EXISTS `tab_sucursal`;
CREATE TABLE `tab_sucursal`  (
  `codSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `codEmpresa` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ubicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  `codUsuario` int(11) NULL DEFAULT NULL,
  `fecharegistro` date NULL DEFAULT NULL,
  PRIMARY KEY (`codSucursal`) USING BTREE,
  INDEX `fk_tab_sucursal_tab_empresa1`(`codEmpresa`) USING BTREE,
  CONSTRAINT `fk_tab_sucursal_tab_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `tab_empresa` (`codEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_sucursal
-- ----------------------------
INSERT INTO `tab_sucursal` VALUES (1, 1, 'SUCURSAL DE PRUEBA', 'PIURA', NULL, 'SUCURSAL DE PRUEBA', b'1', 1, '2018-01-17');
INSERT INTO `tab_sucursal` VALUES (2, 1, 'SUCURSAL DE PRUEBA 2', 'CASTILLA', NULL, 'SUCURSAL DE PRUEBA 2', b'1', 1, '2018-01-17');

-- ----------------------------
-- Table structure for tab_tipoarticulo
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipoarticulo`;
CREATE TABLE `tab_tipoarticulo`  (
  `codTipoArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `codUsuario` int(11) NOT NULL,
  `fecharegistro` datetime(0) NOT NULL,
  `codsunat` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT '00',
  PRIMARY KEY (`codTipoArticulo`) USING BTREE,
  UNIQUE INDEX `codTipoArticulo`(`codTipoArticulo`) USING BTREE,
  INDEX `referencia`(`referencia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tab_tipodatoadicional
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipodatoadicional`;
CREATE TABLE `tab_tipodatoadicional`  (
  `id_adicional` int(11) NOT NULL AUTO_INCREMENT,
  `cod_adicional` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion_adicional` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_adicional`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_tipodatoadicional
-- ----------------------------
INSERT INTO `tab_tipodatoadicional` VALUES (1, '3000', 'Detracciones: CODIGO DE BB Y SS SUJETOS A DETRACCION');
INSERT INTO `tab_tipodatoadicional` VALUES (2, '3001', 'Detracciones: NUMERO DE CTA EN EL BN');
INSERT INTO `tab_tipodatoadicional` VALUES (3, '3002', 'Detracciones: Recursos Hidrobiológicos - Nombre y matrícula de la embarcación');
INSERT INTO `tab_tipodatoadicional` VALUES (4, '3003', 'Detracciones: Recursos Hidrobiológicos - Tipo y cantidad de especie vendida');
INSERT INTO `tab_tipodatoadicional` VALUES (5, '3004', 'Detracciones: Recursos Hidrobiológicos - Lugar de descarga');
INSERT INTO `tab_tipodatoadicional` VALUES (6, '3005', 'Detracciones: Recursos Hidrobiológicos - Fecha de descarga');
INSERT INTO `tab_tipodatoadicional` VALUES (7, '3006', 'Detracciones: Transporte Bienes vía terrestre – Numero Registro MTC');
INSERT INTO `tab_tipodatoadicional` VALUES (8, '3007', 'Detracciones: Transporte Bienes vía terrestre – configuración vehicular');
INSERT INTO `tab_tipodatoadicional` VALUES (9, '3008', 'Detracciones: Transporte Bienes vía terrestre – punto de origen');
INSERT INTO `tab_tipodatoadicional` VALUES (10, '3009', 'Detracciones: Transporte Bienes vía terrestre – punto destino');
INSERT INTO `tab_tipodatoadicional` VALUES (11, '3010', 'Detracciones: Transporte Bienes vía terrestre – valor referencial preliminar');
INSERT INTO `tab_tipodatoadicional` VALUES (12, '4000', 'Beneficio hospedajes: Código País de emisión del pasaporte');
INSERT INTO `tab_tipodatoadicional` VALUES (13, '4001', 'Beneficio hospedajes: Código País de residencia del sujeto no domiciliado');
INSERT INTO `tab_tipodatoadicional` VALUES (14, '4002', 'Beneficio Hospedajes: Fecha de ingreso al país');
INSERT INTO `tab_tipodatoadicional` VALUES (15, '4003', 'Beneficio Hospedajes: Fecha de ingreso al establecimiento');
INSERT INTO `tab_tipodatoadicional` VALUES (16, '4004', 'Beneficio Hospedajes: Fecha de salida del establecimiento');
INSERT INTO `tab_tipodatoadicional` VALUES (17, '4005', 'Beneficio Hospedajes: Número de días de permanencia');
INSERT INTO `tab_tipodatoadicional` VALUES (18, '4006', 'Beneficio Hospedajes: Fecha de consumo');
INSERT INTO `tab_tipodatoadicional` VALUES (19, '4007', 'Beneficio Hospedajes: Paquete turístico - Nombres y Apellidos del Huésped');
INSERT INTO `tab_tipodatoadicional` VALUES (20, '4008', 'Beneficio Hospedajes: Paquete turístico – Tipo documento identidad del huésped');
INSERT INTO `tab_tipodatoadicional` VALUES (21, '4009', 'Beneficio Hospedajes: Paquete turístico – Numero de documento identidad de huésped');
INSERT INTO `tab_tipodatoadicional` VALUES (22, '5000', 'Proveedores Estado: Número de Expediente');
INSERT INTO `tab_tipodatoadicional` VALUES (23, '5001', 'Proveedores Estado: Código de unidad ejecutora');
INSERT INTO `tab_tipodatoadicional` VALUES (24, '5002', 'Proveedores Estado: N° de proceso de selección');
INSERT INTO `tab_tipodatoadicional` VALUES (25, '5003', 'Proveedores Estado: N° de contrato');
INSERT INTO `tab_tipodatoadicional` VALUES (26, '6000', 'Comercialización de Oro: Código Único Concesión Minera');
INSERT INTO `tab_tipodatoadicional` VALUES (27, '6001', 'Comercialización de Oro: N° declaración compromiso');
INSERT INTO `tab_tipodatoadicional` VALUES (28, '6002', 'Comercialización de Oro: N° Reg. Especial .Comerci. Oro');
INSERT INTO `tab_tipodatoadicional` VALUES (29, '6003', 'Comercialización de Oro: N° Resolución que autoriza Planta de Beneficio');
INSERT INTO `tab_tipodatoadicional` VALUES (30, '6004', 'Comercialización de Oro: Ley Mineral (% concent. oro)');

-- ----------------------------
-- Table structure for tab_tipodiscrepancias
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipodiscrepancias`;
CREATE TABLE `tab_tipodiscrepancias`  (
  `id_discre` int(11) NOT NULL AUTO_INCREMENT,
  `docaplica_discre` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `codigo_discre` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descripcion_discre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_discre`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_tipodiscrepancias
-- ----------------------------
INSERT INTO `tab_tipodiscrepancias` VALUES (1, '07', '01', 'Anulación de la operación');
INSERT INTO `tab_tipodiscrepancias` VALUES (2, '07', '02', 'Anulación por error en el RUC');
INSERT INTO `tab_tipodiscrepancias` VALUES (3, '07', '03', 'Corrección por error en la descripción');
INSERT INTO `tab_tipodiscrepancias` VALUES (4, '07', '04', 'Descuento global');
INSERT INTO `tab_tipodiscrepancias` VALUES (5, '07', '05', 'Descuento por ítem');
INSERT INTO `tab_tipodiscrepancias` VALUES (6, '07', '06', 'Devolución total');
INSERT INTO `tab_tipodiscrepancias` VALUES (7, '07', '07', 'Devolución por ítem');
INSERT INTO `tab_tipodiscrepancias` VALUES (8, '07', '08', 'Bonificación');
INSERT INTO `tab_tipodiscrepancias` VALUES (9, '07', '09', 'Disminución en el valor');
INSERT INTO `tab_tipodiscrepancias` VALUES (10, '07', '10', 'Otros Conceptos');
INSERT INTO `tab_tipodiscrepancias` VALUES (11, '08', '01', 'Intereses por mora');
INSERT INTO `tab_tipodiscrepancias` VALUES (12, '08', '02', 'Aumento en el valor');
INSERT INTO `tab_tipodiscrepancias` VALUES (13, '08', '03', 'Penalidades/otros conceptos');

-- ----------------------------
-- Table structure for tab_tipodocumento
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipodocumento`;
CREATE TABLE `tab_tipodocumento`  (
  `id_docu` int(11) NOT NULL AUTO_INCREMENT,
  `num_docu` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre_docu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_docu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_tipodocumento
-- ----------------------------
INSERT INTO `tab_tipodocumento` VALUES (1, '01', 'Factura');
INSERT INTO `tab_tipodocumento` VALUES (2, '03', 'Boleta');
INSERT INTO `tab_tipodocumento` VALUES (3, '07', 'Nota de Crédito');
INSERT INTO `tab_tipodocumento` VALUES (4, '08', 'Nota de Débito');

-- ----------------------------
-- Table structure for tab_tipoperacion
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipoperacion`;
CREATE TABLE `tab_tipoperacion`  (
  `id_tipope` int(11) NOT NULL AUTO_INCREMENT,
  `num_tipope` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre_tipope` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipope`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_tipoperacion
-- ----------------------------
INSERT INTO `tab_tipoperacion` VALUES (1, '01', 'Venta lnterna');
INSERT INTO `tab_tipoperacion` VALUES (2, '02', 'Exportación');
INSERT INTO `tab_tipoperacion` VALUES (3, '03', 'No Domiciliados');
INSERT INTO `tab_tipoperacion` VALUES (4, '04', 'Venta Interna – Anticipos');
INSERT INTO `tab_tipoperacion` VALUES (5, '05', 'Venta Itinerante');
INSERT INTO `tab_tipoperacion` VALUES (6, '06', 'Factura Guía');
INSERT INTO `tab_tipoperacion` VALUES (7, '07', 'Venta Arroz Pilado');
INSERT INTO `tab_tipoperacion` VALUES (8, '08', 'Factura - Comprobante de Percepción');

-- ----------------------------
-- Table structure for tab_tipparam
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipparam`;
CREATE TABLE `tab_tipparam`  (
  `tipparam_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipparam_tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipparam_des` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipparam_estado` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tipparam_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_tipparam
-- ----------------------------
INSERT INTO `tab_tipparam` VALUES (1, 'TipPrecio', 'Tipo Precio', 'AC');
INSERT INTO `tab_tipparam` VALUES (2, 'TipImpuesto', 'Tipo Impuesto', 'AC');
INSERT INTO `tab_tipparam` VALUES (3, 'UniMed', 'Unidad de Medida', 'AC');

-- ----------------------------
-- Table structure for tab_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tab_usuarios`;
CREATE TABLE `tab_usuarios`  (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fechanac` date NULL DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `celular` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `codUsu` int(11) NULL DEFAULT NULL,
  `fecharegistro` date NULL DEFAULT NULL,
  `estado` bit(1) NULL DEFAULT NULL,
  `codNivel` int(11) NULL DEFAULT NULL,
  `intentos` int(11) NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `su` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`codUsuario`) USING BTREE,
  INDEX `fk_tab_usuarios_tab_nivel1`(`codNivel`) USING BTREE,
  CONSTRAINT `fk_tab_usuarios_tab_nivel1` FOREIGN KEY (`codNivel`) REFERENCES `tab_nivel` (`codNivel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tab_usuarios
-- ----------------------------
INSERT INTO `tab_usuarios` VALUES (1, '47961796', 'ERWIN', 'TORRES LEON', '1993-05-06', 'PIURA', NULL, '', 'torres6593@outlook.com', 'administrador', '9f7044bab8e08887b2152e3af51d7dfe94fa3e4e4b32531592ad2a2420e03ad5', 'HOZv2wrGavOAGYZmh29VHs38', 1, '0000-00-00', b'1', 1, 0, '2018-02-05 16:06:05', 'd36a58abc5373640f3eed7b8fdf05926e7190e46.jpg', b'1');
INSERT INTO `tab_usuarios` VALUES (5, '12345678', 'Ssssssss', 'Ssssssss', '2018-02-05', '', NULL, '', '', '12345678', 'ae3e721b0a3fed61ed6de85344fb545fcd54ccdac57ca363a4f8f9b4ed614f2e', '95b428e98d2b66a8ab324313', 1, '0000-00-00', b'1', 1, NULL, NULL, NULL, b'0');
INSERT INTO `tab_usuarios` VALUES (6, '12345678', 'Ssssssss', 'Ssssssss', NULL, '', NULL, '', '', '12345678', '12345678', '271f17707d8bfd2cd45f7e51', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (7, '43136570', 'JOSUE', 'SOSA ESCOBAR', NULL, '', NULL, '', '', '12345678', '59133a8dafb8631fcfca8267419b15fe261df9c4377ab239677ac60c138687ae', '6565bedc3b88da2412ea122c', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (8, '12547896', 'SSSSSSS', 'SSSSSSSSS', NULL, '', NULL, '', '', '12345678', '36f29d082690067623042d679de703e00721424bc664f3bb17e12c73a39f5dcd', '68af3564fb6024e891d093f8', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (9, '12547896', 'SSSSSSS', 'SSSSSSSSS', NULL, '', NULL, '', '', '12345678', '4d83a052afc49ff0260dc978eccfaba85d7616848136f36314c010ced9e8a016', '4e6934f77e86b8c41a52f986', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (10, '12365478', 'SSSSSSSS', 'ASASASAS', NULL, '', NULL, '', '', '12345678', 'b049e481c798e97e0c2fc176b587806d1830880085bdcbb412895bdc64d2930d', 'eaa8c9c3ac9ad5a1d863d20d', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (11, '54875485', 'SSSSSSSSSSS', 'SSSSSSSSS', NULL, '', NULL, '', '', '12365478', '6e23d885ec26b724355317e004345675a21366673bb5be327f6099cd4ed4a3e7', 'b877c34c37d3ab54dcabe110', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (12, '32569825', 'SSGFG', 'FGHFGHF', NULL, 'SSSSS', NULL, '', '', 'GFHHFHGFGH', '738b839ba87750eb457d36ada0f5b4039fd87561bdc7189028ca556a522199a7', 'bf6fa64a2e79b2800523f3a0', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (13, '23654784', 'Dddd', 'Ddd', NULL, '', NULL, '', '', '12365478', '52e3d899e5d354fd2467331702ad57f684406accac0def3c041e6410a36fcaa8', 'e60e81c4cbe5171cd654662d', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (14, '47856953', 'Aaaa', 'Aaaaa', NULL, '', NULL, '', '', '12365478', '4a19f3ef9fc8038d45d9cad0614fd1aa078d574ff60ef954abe6a68d53051d05', 'c59bb6bab3096620efe78bde', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (15, '12547857', 'Sssssssss', 'Ssssss', NULL, '', NULL, '', '', '11111111111', 'c7945077f567d8980b47c83fea3f2bc531b9814d9278013c17565c57d09fb830', 'cc360b61d7eb072c77a4bedd', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (16, '12365485', 'Sssssssssss', 'Ssssss', NULL, '', NULL, '', '', '12345678', '512811e377c1dd11624d436a84eb53217944da5ff60bd4a18708c475c25ccd4e', 'bf96708cdf085ba206fc100e', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (17, '12365471', 'Sssss', 'Ssss', NULL, '', NULL, '', '', '12345678', '8baa2886e80317d1910596b828e2548b69a906fd5d80bfa0d3950f0d522565bc', '9df29dfc87cdbdecd4150b24', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (18, '36876456', 'Dddddddddd', 'Dddddddddd', NULL, '', NULL, '', '', 'dddddddddddd', 'b79c4464a3f25d6b811dc32a08f9e6744de2d5e5adaafc6f112dc1b86f90a93c', 'a226e450e214f350856e2980', 1, '2018-01-24', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (19, '36587454', 'Ghhghghfg', 'Klkljkljklkl', NULL, '', NULL, '', '', '454234324', '68303c7f57a762fb528a3301005d9b585025894f9105dc1da16ad5c5da6cd326', '1b79b52d1bf6f71b2b1eb7ca', 1, '2018-01-24', b'1', 1, NULL, NULL, 'ce182f06ced315c0fa3fd05533b9f5949899c6c6.jpg', b'0');
INSERT INTO `tab_usuarios` VALUES (20, '12521584', 'Pepito', 'Dos cañones', NULL, '', NULL, '', '', 'pepito123', '796e80bdbb3bfdb577717e063d0c50247519ca2e1035aadc365e279e640858bb', '5898d8095428ee310bf7fa3d', 1, '2018-01-26', b'1', 1, NULL, NULL, 'd18b8b387babddd9ee138be387bed102137d2c0b.jpg', b'0');
INSERT INTO `tab_usuarios` VALUES (21, '36524856', 'Prueba', 'Ddd', NULL, '', NULL, '', '', '656656565', '7cae1a952efc89027f06f882ddd9424a29762fcd23f9dce6322329b1e26503ea', '712a67567ec10c52c2b96622', 1, '2018-01-26', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (22, '14545615', 'Pepin', 'Dsdsd', '0000-00-00', '', NULL, '', '', '123456789', '8b9f48232d6d7ef51de904d85e37bfd4aad5730724a367f95dd562cdc609856f', 'f0b76267fbe12b936bd65e20', 1, '0000-00-00', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (23, '35454564', 'Dsdsd', 'Sdsd', '2018-01-01', '', NULL, '', '', '12548745', '1942f23997b94f3ead95677d58ad46b9773ba35150e4e10a3695e2f6f87d8079', '662a2e96162905620397b19c', 1, '0000-00-00', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (24, '54545454', 'Dddd', 'Aasa', '2018-01-27', '', NULL, '', '', '45456456', '75f4f7c64719f3baffeaff6255a71d190c8b2ff42ee84e3e0b9a931ee7f2371b', '4f7b884f2445ef08da9bbc77', 1, '0000-00-00', b'0', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (25, '24565644', 'Ssdsds', 'Sdsdsd', '2018-01-27', '', NULL, '', '', 'sdsdsdsd', '5bd9418b5e8fb4a62d816b8aaafa3ad9b9bd90226f7de6648a7cdc848f1c6fe7', 'abbb92ad6196c20ae4e1f79a', 1, '0000-00-00', b'0', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (26, '54454545', 'Asasa', 'Asasas', '2018-01-27', '', NULL, '', '', 'asasasasas', '9378199f793dfec8cf90911abc5c4667586355ec105894955e2882acf4cede45', '024da127a13f0f5fd374ee98', 1, '0000-00-00', b'0', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (27, '87565657', 'Sdsdsds', 'Sdsds', '2018-01-27', '', NULL, '', '', 'sdsdsdss', '08e8fa4f8bfea3011d5f58586c30899036053f0714e676b44e7bfc07d49063ab', 'f2669241f7cca3f1306082b7', 1, '0000-00-00', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (28, '54564565', 'Sdsdsd', 'Sdsdsd', '2018-01-27', '', NULL, '', '', 'aaaaaaaaaaaaaaaaa', '593eb75060bc7db525c065186c9a1073f3072597b32632958871134d91dbbdef', 'c112115f1c81e4f4b74a738a', 1, '0000-00-00', b'1', 1, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (29, '45455445', 'Sdswerere', 'Ssdsdsd', '2018-01-27', '', NULL, '', '', '124454456', '7e73f6725eaea3e07d466cf1e34296d50aa0aef5de0ee30515e8c289b5ae0388', 'ac10ff1941c540cd87c10733', 1, '0000-00-00', b'1', 2, NULL, NULL, '', b'0');
INSERT INTO `tab_usuarios` VALUES (30, '12345679', '\' \'', '\' \'', '2018-02-05', '', NULL, '', '', '\'aaaaaaaaaaaa\'', '28431d4bb57f8481dbd61d66e30c4c305be186154ef8eef00782845fec3c482e', '37d454532975b012c01edbd3', 1, '0000-00-00', b'1', 1, NULL, NULL, '', b'0');

SET FOREIGN_KEY_CHECKS = 1;
