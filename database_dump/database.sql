-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para lojaweb
DROP DATABASE IF EXISTS `lojaweb`;
CREATE DATABASE IF NOT EXISTS `lojaweb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lojaweb`;

-- Copiando estrutura para tabela lojaweb.categorias
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `id_categoriapai` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `metalink` varchar(100) DEFAULT NULL,
  `ultima_atualizacao` varchar(50) DEFAULT NULL,
  `meta_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.categorias: ~3 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`, `id_categoriapai`, `ativo`, `metalink`, `ultima_atualizacao`, `meta_link`) VALUES
	(29, 'Informática', NULL, 1, NULL, 'Wed, 17 Mar 21 16:45:35 +0000', 'informatica'),
	(30, 'HD', 29, 1, NULL, 'Wed, 17 Mar 21 16:45:37 +0000', 'hd'),
	(31, 'Memoria', 29, 1, NULL, 'Wed, 17 Mar 21 16:45:38 +0000', 'memoria');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `data_nascimento` varchar(50) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `ultima_atualizacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.clientes: ~0 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nome`, `cpf`, `data_nascimento`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `email`, `senha`, `ativo`, `telefone`, `data_cadastro`, `ultima_atualizacao`) VALUES
	(4, 'abcv', '222.222.222-22', '11/11/1111', '00000-000', '111111', '111', '11111', '1111', '111', '1111', '1111@AA.COM', '', 1, NULL, '0000-00-00', NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.config
DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  `empresa` varchar(150) DEFAULT NULL,
  `cep` varchar(150) DEFAULT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `estado` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(150) DEFAULT NULL,
  `p_destaque` tinyint(4) DEFAULT NULL,
  `data_atualizacao` varchar(50) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.config: ~0 rows (aproximadamente)
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `titulo`, `empresa`, `cep`, `bairro`, `complemento`, `cidade`, `estado`, `email`, `telefone`, `p_destaque`, `data_atualizacao`, `endereco`) VALUES
	(1, 'LojaWEB', 'ERRE Software', '08000000', 'Sé', 'comple', 'São Paulo', 'SP', 'admin@admin.com', '11-20205578', 30, 'Wed, 10 Mar 21 01:19:51 +0100', 'Agora foi ;)');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.config_correios
DROP TABLE IF EXISTS `config_correios`;
CREATE TABLE IF NOT EXISTS `config_correios` (
  `id` int(11) NOT NULL,
  `cep_origem` varchar(12) DEFAULT NULL,
  `somar_frete` decimal(10,2) DEFAULT NULL,
  `data_atualizacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.config_correios: ~0 rows (aproximadamente)
DELETE FROM `config_correios`;
/*!40000 ALTER TABLE `config_correios` DISABLE KEYS */;
INSERT INTO `config_correios` (`id`, `cep_origem`, `somar_frete`, `data_atualizacao`) VALUES
	(1, '08051-000', 15.92, 'Tue, 02 Mar 21 22:46:06 +0100');
/*!40000 ALTER TABLE `config_correios` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.config_pagseguro
DROP TABLE IF EXISTS `config_pagseguro`;
CREATE TABLE IF NOT EXISTS `config_pagseguro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `cartao` tinyint(1) DEFAULT NULL,
  `boleto` tinyint(1) DEFAULT NULL,
  `transferencia` tinyint(1) DEFAULT NULL,
  `data_atualizacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.config_pagseguro: ~0 rows (aproximadamente)
DELETE FROM `config_pagseguro`;
/*!40000 ALTER TABLE `config_pagseguro` DISABLE KEYS */;
INSERT INTO `config_pagseguro` (`id`, `email`, `token`, `cartao`, `boleto`, `transferencia`, `data_atualizacao`) VALUES
	(1, 'aa@aa.com.br', 'ABCDEFGHI0123456789', 1, 0, 0, 'Thu, 18 Feb 21 01:39:08 +0100');
/*!40000 ALTER TABLE `config_pagseguro` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.groups: ~2 rows (aproximadamente)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.login_attempts
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.login_attempts: ~0 rows (aproximadamente)
DELETE FROM `login_attempts`;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.marcas
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `ultima_atualizacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.marcas: ~4 rows (aproximadamente)
DELETE FROM `marcas`;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `nome`, `ativo`, `ultima_atualizacao`) VALUES
	(1, 'Philco', 1, 'Tue, 02 Feb 21 01:01:11 +0100'),
	(2, 'Positivo', 0, 'Tue, 02 Feb 21 01:01:15 +0100'),
	(3, 'Intel', 1, 'Tue, 02 Feb 21 01:00:21 +0100'),
	(4, 'AMD', 0, 'Tue, 02 Feb 21 01:01:21 +0100');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.migrations: 1 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`version`) VALUES
	(2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.pedidos
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `total_produto` decimal(15,2) DEFAULT NULL,
  `total_frete` decimal(15,2) DEFAULT NULL,
  `total_pedido` decimal(15,2) DEFAULT NULL,
  `id_status` int(10) DEFAULT NULL,
  `data_cadastro` varchar(200) DEFAULT NULL,
  `ultima_atualizacao` varchar(200) DEFAULT NULL,
  `cod_rastreio` varchar(200) DEFAULT NULL,
  `forma_envio` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_clientes_id_fk` (`id_cliente`),
  KEY `FK_status_pedidos` (`id_status`),
  CONSTRAINT `FK_status_pedidos` FOREIGN KEY (`id_status`) REFERENCES `status_pedido` (`id`),
  CONSTRAINT `pedidos_clientes_id_fk` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.pedidos: ~2 rows (aproximadamente)
DELETE FROM `pedidos`;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`id`, `id_cliente`, `nome`, `cpf`, `email`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `total_produto`, `total_frete`, `total_pedido`, `id_status`, `data_cadastro`, `ultima_atualizacao`, `cod_rastreio`, `forma_envio`) VALUES
	(1, 4, 'abcv', '222.222.222-22', '1111@AA.COM', '00000-000', '111111', '111', '11111', '1111', '111', '1111', 11.00, 25.00, 36.00, NULL, '11-03-2021', '11-03-2021', NULL, 1),
	(2, 4, 'abcv', '222.222.222-22', '1111@AA.COM', '00000-000', '111111', '111', '11111', '1111', '111', '1111', 11.00, 25.00, 36.00, NULL, '11-03-2021', '11-03-2021', NULL, 2);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.pedidos_item
DROP TABLE IF EXISTS `pedidos_item`;
CREATE TABLE IF NOT EXISTS `pedidos_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) DEFAULT NULL,
  `nome_item` varchar(200) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor_unitario` decimal(15,2) DEFAULT NULL,
  `valor_total` decimal(15,2) DEFAULT NULL,
  `valor_total_item` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_item_pedidos_id_fk` (`id_pedido`),
  CONSTRAINT `pedidos_item_pedidos_id_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.pedidos_item: ~2 rows (aproximadamente)
DELETE FROM `pedidos_item`;
/*!40000 ALTER TABLE `pedidos_item` DISABLE KEYS */;
INSERT INTO `pedidos_item` (`id`, `id_pedido`, `nome_item`, `quantidade`, `valor_unitario`, `valor_total`, `valor_total_item`) VALUES
	(1, 1, 'Teste', 1, 25.00, 25.00, 25.00),
	(2, 1, 'Teste', 1, 25.00, 25.00, 25.00);
/*!40000 ALTER TABLE `pedidos_item` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cod_produto` varchar(10) DEFAULT NULL,
  `valor` decimal(15,2) DEFAULT NULL,
  `destaque` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  `controlar_estoque` tinyint(4) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `data_cadastro` varchar(50) DEFAULT NULL,
  `ultima_atualizacao` varchar(50) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `largura` int(11) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `info` longtext,
  `meta_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categorias_id_fk` (`id_categoria`),
  KEY `produtos_marcas_id_fk` (`id_marca`),
  CONSTRAINT `produtos_categorias_id_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `produtos_marcas_id_fk` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.produtos: ~3 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `id_marca`, `id_categoria`, `nome`, `cod_produto`, `valor`, `destaque`, `ativo`, `controlar_estoque`, `estoque`, `data_cadastro`, `ultima_atualizacao`, `peso`, `altura`, `largura`, `comprimento`, `info`, `meta_link`) VALUES
	(18, 1, 29, 'dois tres tres', '3', 22.00, 1, 1, 1, 2, 'Wed, 17 Feb 21 01:08:31 +0100', 'Wed, 17 Mar 21 16:42:30 +0000', 2, 2, 2, 2, '2', 'dois-tres-tres'),
	(19, 1, 29, '234', '4', 22.00, 1, 1, 1, 2, 'Wed, 17 Feb 21 01:08:31 +0100', 'Wed, 17 Mar 21 16:43:55 +0000', 2, 2, 2, 2, '2', '234'),
	(20, 1, 29, '235', '5', 22.00, 1, 1, 1, 2, 'Wed, 17 Feb 21 01:08:31 +0100', 'Wed, 17 Mar 21 16:43:59 +0000', 2, 2, 2, 2, '2', '235');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos_fotos
DROP TABLE IF EXISTS `produtos_fotos`;
CREATE TABLE IF NOT EXISTS `produtos_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `foto` longtext,
  PRIMARY KEY (`id`),
  KEY `fotos_produtos_id_fk` (`id_produto`),
  CONSTRAINT `fotos_produtos_id_fk` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela lojaweb.produtos_fotos: ~0 rows (aproximadamente)
DELETE FROM `produtos_fotos`;
/*!40000 ALTER TABLE `produtos_fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_fotos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos_mais_vendidos
DROP TABLE IF EXISTS `produtos_mais_vendidos`;
CREATE TABLE IF NOT EXISTS `produtos_mais_vendidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `quant_vendidos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_produtos_mais_vendidos` (`id_produto`),
  CONSTRAINT `FK_produtos_mais_vendidos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.produtos_mais_vendidos: ~3 rows (aproximadamente)
DELETE FROM `produtos_mais_vendidos`;
/*!40000 ALTER TABLE `produtos_mais_vendidos` DISABLE KEYS */;
INSERT INTO `produtos_mais_vendidos` (`id`, `id_produto`, `quant_vendidos`) VALUES
	(1, 19, 5),
	(2, 18, 7),
	(3, 20, 10);
/*!40000 ALTER TABLE `produtos_mais_vendidos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.status_pedido
DROP TABLE IF EXISTS `status_pedido`;
CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.status_pedido: 0 rows
DELETE FROM `status_pedido`;
/*!40000 ALTER TABLE `status_pedido` DISABLE KEYS */;
INSERT INTO `status_pedido` (`id`, `titulo_status`) VALUES
	(1, 'Aguardando pagamento'),
	(2, 'Pagamento confirmado'),
	(3, 'Enviado'),
	(4, 'Cancelado');
/*!40000 ALTER TABLE `status_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(1, '127.0.0.1', 'administrator', '$2y$12$7ydZ6dRfxweWSERELeKmquQugcylbhosNUn6rSh3QUJgfMyvBeRYK', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1615998095, 1, 'Rafael', 'Soncine', 'ADMIN', '0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.users_groups
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.users_groups: ~2 rows (aproximadamente)
DELETE FROM `users_groups`;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(2, 1, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
