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

-- Copiando estrutura para tabela sigma.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sigma.categories: ~4 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`, `is_active`) VALUES
	(1, 'Gakko Monkez', 1),
	(2, 'Chemistry Club', 1),
	(3, 'Nyan Cat', 1),
	(4, 'Super Influencers', 1);

-- Copiando estrutura para tabela sigma.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `price` float NOT NULL DEFAULT 500,
  `description` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tags` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '[]',
  `category_id` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_bin DEFAULT NULL,
  `is_trending` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_products_categories` (`category_id`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela sigma.products: ~24 rows (aproximadamente)
INSERT INTO `products` (`id`, `name`, `price`, `description`, `tags`, `category_id`, `image`, `is_trending`, `is_active`, `created_at`) VALUES
	(1, 'Gakko Monkez', 0.35, 'Lorem Ipsum', '[ "new" ]', 1, 'https://lh3.googleusercontent.com/WUowdVjCfEAbjkhf0Ck-DYID3gAC-4HUK0ulam45TuAzgUaDujn5FMcNwlAZK0YyrBZEZ89LmHVGeuI2w7X807rLLzSbZFTdk0-bog=w417', 0, 1, '2022-06-23 21:24:39'),
	(2, 'Gakko Monkez', 0.36, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/qDQCKNrn6C7zNhWemn534XKuyyYqFMnOwPhCpBqojplOHpyf0_EhvQIk7Efn_J5nhQYw_LhjtKupzy2rg8q7_7diMR5uTlXKz2xReAA=w417', 1, 1, '2022-06-23 21:24:39'),
	(3, 'Gakko Monkez', 0.9, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/hDvjK43pQ8WaV-ZHNPo-Yu2vX5cThH374iCfrm2H5CATVONIViZj_SzQ873eZawzjklqhX2OYz0GwEX389JTDaz_zfMmoBajZ3gL1g=w417', 0, 1, '2022-06-23 21:24:39'),
	(4, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/hDvjK43pQ8WaV-ZHNPo-Yu2vX5cThH374iCfrm2H5CATVONIViZj_SzQ873eZawzjklqhX2OYz0GwEX389JTDaz_zfMmoBajZ3gL1g=w417', 1, 1, '2022-07-07 19:11:38'),
	(5, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/HWEc1iauJHWvdgMABSfilTolhyOSjZBBsRJKzNN74fswlbD-eSbB4G3OyfF5s3U_RRdTQhrOkIFMFiGP7owBTv5KC462TYudzI1F=w417', 0, 1, '2022-07-07 19:11:56'),
	(6, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/OSM59kNseJTwWu-yZKGdQ1Q2mu8T26zrbXb7BgyEW6hw9Nqiu21h2yvzGimNjYzdzi_I70V_AAOm5vKeDG2Lq8UsHYDWTda7M4T5=w417', 0, 1, '2022-07-07 19:12:03'),
	(7, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/2kJzmHNGr_yJygw1ACfqX-SgTephkZfxuwc0uXuFpISc6SBSaNIqrUZ2agrJWcZm7269xmQUPzU5Dwy-p8NT_t4wboWuJitX8s4x1l0=w417', 0, 1, '2022-07-07 19:12:08'),
	(8, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/zU8FjEl_U0DNpGN_VdlCelqkzJCU54E_BLzAjtfL0f5I9uIih55ELNWuxy47HUH--KoaIw5rOKKct21xoySPev3i8_9qDUWauG-S=w417', 0, 1, '2022-07-07 19:12:11'),
	(9, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/5fLxeTjYlTN5XN5dYlWmjTh3thzVeNAzchR4th18CE0a4Q8KmvlRQmfQU0faVPpVOfvRFlsEgCESsPLI8eCZ5C2sAWPnYAETbjKBYQ=w417', 0, 1, '2022-07-07 19:12:17'),
	(10, 'Gakko Monkez', 500, 'Lorem Ipsum', '[]', 1, 'https://lh3.googleusercontent.com/u1ogHUhmOn9TfwWTLuUoOk4b0sKrVP7c05P4T1CSpfoGF0fxnYz9-YEX7U6FTc9Z4zxXSKshjDD3KvzQ1FudZ2umeh8lj0QgUt77=w417', 0, 1, '2022-07-07 19:12:21'),
	(11, 'Bored Ape Chemistry Club', 500, 'Lorem Ipsum', '[]', 2, 'https://img.seadn.io/files/44fbec17e6b2b84ff93397984e6618e9.png?auto=format&fit=max&w=512', 0, 1, '2022-07-07 19:14:16'),
	(12, 'Bored Ape Chemistry Club', 500, 'Lorem Ipsum', '[]', 2, 'https://img.seadn.io/files/55dfa81fa4d520d3fd1b281b17eda70e.png?auto=format&fit=max&w=512', 0, 1, '2022-07-07 19:14:23'),
	(13, 'Bored Ape Chemistry Club', 500, 'Lorem Ipsum', '[]', 2, 'https://img.seadn.io/files/5538d20ef5131b9407ed94057d186fb9.png?auto=format&fit=max&w=512', 0, 1, '2022-07-07 19:14:29'),
	(14, 'Nyan Cat', 500, 'Lorem Ipsum', '[]', 3, 'https://lh3.googleusercontent.com/3r98pjfIF2o2oTbNRx8wKmWmaZkW4yDHOPTFxlcYDGR-lGKm153aNTbjrPpIMUR0Qplu24e2cKeVruZaWYW869L5f7V2svJFKwvqye4=w417', 0, 1, '2022-07-07 19:15:30'),
	(15, 'Nyan Cat', 500, 'Lorem Ipsum', '[]', 3, 'https://lh3.googleusercontent.com/T0Lh8bOtfdZVqfKw7ahH5lwuy606TLN91qC4PfEKEDf3uBT2jtyF5ZcUFIMaEmEBaFu-7jeoUhBNtYDxYWuEndqWSe0aniXMEO0SCw=w417', 0, 1, '2022-07-07 19:15:30'),
	(16, 'Nyan Cat', 500, 'Lorem Ipsum', '[]', 3, 'https://lh3.googleusercontent.com/97v7uBu0TGycl_CT73Wds8T22sqLZISSszf4f4mCrPEv5yOLn840HZU4cIyEc9WNpxXhjcyKSKdTuqH7svb3zBfl1ixVtX5Jtc3VzA=w417', 0, 1, '2022-07-07 19:16:19'),
	(17, 'Nyan Cat', 500, 'Lorem Ipsum', '[]', 3, 'https://lh3.googleusercontent.com/g_mBo8zb9lruhki3sCHUzGsYfAMNSH1l16t2clIr9yvXSfHF2f5i13lze0OGN33jlm7ysN_ig6Bs_j8WKelqYWmrXMV4r6__fu4VGg=w417', 0, 1, '2022-07-07 19:16:25'),
	(18, 'Nyan Cat', 500, 'Lorem Ipsum', '[]', 3, 'https://lh3.googleusercontent.com/6T_Y4BJCO5-Dh4-srX62o89Kj794R5rkhChXCR7Fq7mCsWATM1SqA0jPx5kHCYXT1UaSPQotpo0MEcTbVsLcmvsDqG-oEblcgWZgSw=w417', 0, 1, '2022-07-07 19:16:34'),
	(19, 'Super Influencers', 500, 'Lorem Ipsum', '[]', 4, 'https://lh3.googleusercontent.com/frNJf26OhFCv92hoG9NtanjH8r5k7vqoA_Jj6HMnWksL1oAAysSOjDVzehp822_hmk4Ry54FZW5F8VPCLqsDXBy8io9ey9WYEBSD=w417', 0, 1, '2022-07-07 19:17:43'),
	(20, 'Super Influencers', 500, 'Lorem Ipsum', '[]', 4, 'https://lh3.googleusercontent.com/NeDjKasAZ3EL8GQ_Xy0-T17yyZeQpY_n6hGJDmLX5otJppY-6ZozIXUDGogxHbfeN83ZXS3RksK-UPaYYDvOkQUz-GLF9XhE-HXz=w417', 0, 1, '2022-07-07 19:18:02'),
	(21, 'Super Influencers', 500, 'Lorem Ipsum', '[]', 4, 'https://lh3.googleusercontent.com/Cc49ZazMtLaZHRBeVX4O9ucMgAXH05cHkk8xX9eeO3Owxe6JETAV3QRst2zvWcvo_53nF_MOqEiAQTkDNmQw8MXehOuVTB7xEgUO_w=w417', 0, 1, '2022-07-07 19:18:06'),
	(22, 'Super Influencers', 500, 'Lorem Ipsum', '[]', 4, 'https://lh3.googleusercontent.com/rYF12LzHLaj76Dq6k4AjBGOHszx9cLk6Y8qHeeUi0nEjTjKlqx0T-jgN7OrYeBwApRrFs76Cl9qJEADXPt2PQ5gOA8wlkfJLUJFy-fg=w417', 0, 1, '2022-07-07 19:18:11'),
	(23, 'Super Influencers', 500, 'Lorem Ipsum', '[]', 4, 'https://lh3.googleusercontent.com/HvYE195ddilNPNLsrhhis-JGspJwbieRC3q7GwtN8bljvs3ch7UR6NUUJ9CfmGTCA1H7YYApddfIqBl2w9LAlaT0OoN7NxI9afEnNKk=w417', 0, 1, '2022-07-07 19:18:16'),
	(24, 'Super Influencers', 500, 'Lorem Ipsum', '[]', 4, 'https://lh3.googleusercontent.com/Je0wp4XtfvEKnW3bk2ksVmDXuD_ffRnxkVa7n_KkmIi6cq-_QGOhWOpkKiXCTaM2Nn5kTWtMp2bszZPLIYj0y7OqWjj3QCh7_uSgeKs=w417', 0, 1, '2022-07-07 19:18:21');

-- Copiando estrutura para tabela sigma.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sigma.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `is_active`, `created_at`) VALUES
	(1, 'admin', '$2y$10$/95q.QJ6RYiWMhft8uQRB.nboBRno6XVM.jhwhqtPY/uXEtiZEsm6', 1, 1, '2022-07-07 20:41:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
