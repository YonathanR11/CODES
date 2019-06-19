-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         8.0.16 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para codes
CREATE DATABASE IF NOT EXISTS `codes` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `codes`;

-- Volcando estructura para tabla codes.codigos
CREATE TABLE IF NOT EXISTS `codigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `codigo` longtext NOT NULL,
  `lenguaje` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `creacion` date NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigos_usuarios_idx` (`usuarios_id`),
  CONSTRAINT `fk_codigos_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla codes.codigos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `codigos` DISABLE KEYS */;
INSERT INTO `codigos` (`id`, `titulo`, `descripcion`, `codigo`, `lenguaje`, `estado`, `creacion`, `usuarios_id`) VALUES
	(1, 'Hola mundo', 'Hola mundo en javascript', 'console.log(\'Hola mundo con JS\');', 'javascript', 1, '2019-06-19', 2),
	(2, 'hola texto', 'txt', 'holaaaaaaaaaaaaa', 'text', 1, '2019-06-19', 1);
/*!40000 ALTER TABLE `codigos` ENABLE KEYS */;

-- Volcando estructura para tabla codes.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla codes.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `nombre`, `estado`) VALUES
	(1, 'Yonathan', 'roman', 'Yonathan Román Salgado', 1),
	(2, 'user', 'user', 'Usuario Prueba', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
