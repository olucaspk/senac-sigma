-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.6.7-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sigma
CREATE DATABASE IF NOT EXISTS `sigma` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sigma`;

-- Copiando estrutura para tabela sigma.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 500,
  `description` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `categories` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '[]',
  `image` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `is_trending` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela sigma.products: ~8 rows (aproximadamente)
INSERT INTO `products` (`id`, `name`, `price`, `description`, `categories`, `image`, `is_trending`, `created_at`) VALUES
	(1, 'Lacostada', 500, 'Queima de Estoque', '[ "novos", "humanos" ]', 'lacoste.png', 0, '2022-06-23 21:24:39'),
	(2, 'Lontra Martinha', 500, 'Martinha a Lontra', '[ "petras" ]', 'lontra.png', 1, '2022-06-23 21:24:39'),
	(3, 'Monkey', 500, 'Makakinho lecau', '[ "novos", "animais" ]', 'macaco.png', 0, '2022-06-23 21:24:39'),
	(4, 'Claudinho', 500, 'Claudinho Lover', '[ "novos", "animais" ]', 'claudinho.jpg', 0, '2022-06-23 21:24:39'),
	(5, 'Rubio', 500, 'Rubios Pevepas', '[ "novos", "animais" ]', 'rubio.jpg', 0, '2022-06-23 21:24:39'),
	(6, 'Euclides', 500, 'Euclides Adamastor', '[ "novos", "animais" ]', 'euclides.jpg', 1, '2022-06-23 21:24:39'),
	(7, 'Cicero', 500, 'Cicero Jonas', '[ "novos", "animais" ]', 'cicero.png', 0, '2022-06-23 21:24:39'),
	(8, 'Eugenio', 500, 'Eugenio Astralopitecus', '[ "novos", "animais" ]', 'eugenio.jpg', 0, '2022-06-23 21:24:39'),
	(9, 'Celso RussouGato', 500, 'Patrulha do CAOsumidor', '[ "novos", "animais" ]', 'celso_russougato.jpg', 0, '2022-06-23 21:24:39');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
