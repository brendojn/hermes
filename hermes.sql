-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.27-0ubuntu0.18.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para hermes
CREATE DATABASE IF NOT EXISTS `hermes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hermes`;

-- Copiando estrutura para tabela hermes.challenge
CREATE TABLE IF NOT EXISTS `challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `dt_create` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.group
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(80) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `fk_trail_id` int(11) DEFAULT NULL,
  `fk_teacher_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_id` (`fk_teacher_id`),
  KEY `fk_trail_id` (`fk_trail_id`),
  CONSTRAINT `fk_teacher_id` FOREIGN KEY (`fk_teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trail_id` FOREIGN KEY (`fk_trail_id`) REFERENCES `trail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.pronouncement
CREATE TABLE IF NOT EXISTS `pronouncement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `dt_create` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `norm_text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(1) DEFAULT '0',
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_student` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `period` varchar(11) DEFAULT NULL,
  `registration` varchar(11) DEFAULT NULL,
  `fk_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_group_id` (`fk_group_id`),
  CONSTRAINT `fk_group_id` FOREIGN KEY (`fk_group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_teacher` varchar(80) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `registration` int(11) DEFAULT NULL,
  `admin` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.trail
CREATE TABLE IF NOT EXISTS `trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_trail` varchar(80) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela hermes.trails_pronouncements
CREATE TABLE IF NOT EXISTS `trails_pronouncements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_pronouncement_id` int(11) DEFAULT NULL,
  `fk_trail_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pronouncement_id` (`fk_pronouncement_id`),
  KEY `fk1_trail_id` (`fk_trail_id`),
  CONSTRAINT `fk1_trail_id` FOREIGN KEY (`fk_trail_id`) REFERENCES `trail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pronouncement_id` FOREIGN KEY (`fk_pronouncement_id`) REFERENCES `pronouncement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
