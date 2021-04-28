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
  `nome` varchar(100) NOT NULL,
  `id_categoriapai` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  `meta_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.categorias: 0 rows
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`, `id_categoriapai`, `ativo`, `ultima_atualizacao`, `meta_link`) VALUES
	(24, 'Eletrônico', NULL, 1, 'Wed, 28 Apr 21 00:50:48 +0000', 'eletronico'),
	(28, 'TVs', 21, 1, 'Wed, 28 Apr 21 00:52:19 +0000', 'tvs'),
	(22, 'Cafeteira', 21, 1, 'Wed, 28 Apr 21 00:50:11 +0000', 'cafeteira'),
	(25, 'Gravador de DVD', 24, 1, 'Wed, 28 Apr 21 00:51:06 +0000', 'gravador-de-dvd'),
	(27, 'Celulares', 24, 1, 'Wed, 28 Apr 21 00:51:24 +0000', 'celulares'),
	(15, 'Informática', NULL, 1, 'Wed, 28 Apr 21 00:49:18 +0000', 'informatica'),
	(21, 'Eletrodoméstico', NULL, 1, 'Wed, 28 Apr 21 00:49:55 +0000', 'eletrodomestico'),
	(19, 'Computador', 15, 1, 'Wed, 28 Apr 21 00:48:57 +0000', 'computador'),
	(29, 'Cooler', 29, 1, 'Wed, 17 Mar 21 16:45:37 +0000', 'cooler'),
	(23, 'Secador de Cabelo', 21, 1, 'Wed, 28 Apr 21 00:50:27 +0000', 'secador-de-cabelo'),
	(20, 'Notebook', 15, 1, 'Wed, 28 Apr 21 00:49:36 +0000', 'notebook');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `data_nascimento` varchar(50) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `data_cadastro` varchar(255) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.clientes: 0 rows
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.config
DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `p_destaque` tinyint(1) NOT NULL,
  `data_atualizacao` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.config: 0 rows
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `titulo`, `empresa`, `cep`, `complemento`, `cidade`, `estado`, `email`, `bairro`, `telefone`, `p_destaque`, `data_atualizacao`, `endereco`) VALUES
	(1, 'Eshop Ecommerce', 'Eshop Ecommerce', '01001-001', 'Nenhum', 'São Paulo', 'SP', 'contato@eshop.com', 'Sé', '(11)2052-000', 8, 'Wed, 28 Apr 21 00:15:20 +0000', 'Praça da Sé');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.config_correios
DROP TABLE IF EXISTS `config_correios`;
CREATE TABLE IF NOT EXISTS `config_correios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep_origem` varchar(255) NOT NULL,
  `somar_frete` decimal(10,2) NOT NULL,
  `data_atualizacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.config_correios: 0 rows
DELETE FROM `config_correios`;
/*!40000 ALTER TABLE `config_correios` DISABLE KEYS */;
INSERT INTO `config_correios` (`id`, `cep_origem`, `somar_frete`, `data_atualizacao`) VALUES
	(1, '01001-001', 0.00, 'Wed, 28 Apr 21 00:15:59 +0000');
/*!40000 ALTER TABLE `config_correios` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.config_pagseguro
DROP TABLE IF EXISTS `config_pagseguro`;
CREATE TABLE IF NOT EXISTS `config_pagseguro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `cartao` tinyint(1) NOT NULL,
  `boleto` tinyint(1) NOT NULL,
  `transferencia` tinyint(1) NOT NULL,
  `data_atualizacao` varchar(255) DEFAULT NULL,
  `sandbox` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.config_pagseguro: 0 rows
DELETE FROM `config_pagseguro`;
/*!40000 ALTER TABLE `config_pagseguro` DISABLE KEYS */;
INSERT INTO `config_pagseguro` (`id`, `email`, `token`, `cartao`, `boleto`, `transferencia`, `data_atualizacao`, `sandbox`) VALUES
	(1, 'aaa@pagseguro.com', '123456789', 1, 1, 1, 'Wed, 28 Apr 21 00:15:47 +0000', 0);
/*!40000 ALTER TABLE `config_pagseguro` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.groups: 2 rows
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.login_attempts
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.login_attempts: 0 rows
DELETE FROM `login_attempts`;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.marcas
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ativo` varchar(255) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  `meta_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.marcas: 0 rows
DELETE FROM `marcas`;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `nome`, `ativo`, `ultima_atualizacao`, `meta_link`) VALUES
	(1, 'Intel', '1', 'Wed, 28 Apr 21 00:53:25 +0000', 'intel'),
	(2, 'LG', '1', 'Wed, 28 Apr 21 00:53:42 +0000', 'lg'),
	(3, 'Apple', '1', 'Wed, 28 Apr 21 00:53:47 +0000', 'apple'),
	(4, 'Samsung', '1', 'Wed, 28 Apr 21 00:54:18 +0000', 'samsung'),
	(9, 'Sandisk', '1', 'Wed, 28 Apr 21 01:04:18 +0000', 'sandisk'),
	(10, 'Cadence', '1', 'Wed, 28 Apr 21 00:54:29 +0000', 'cadence'),
	(11, 'Acer', '1', 'Wed, 28 Apr 21 01:03:39 +0000', 'acer'),
	(12, 'AMD', '0', 'Tue, 02 Feb 21 01:01:21 +0100', 'AMD'),
	(13, 'AMD', '0', 'Tue, 02 Feb 21 01:01:21 +0100', 'AMD');
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
	(6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.pedidos
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `total_produto` decimal(15,2) NOT NULL,
  `total_frete` decimal(15,2) NOT NULL,
  `total_pedido` decimal(15,2) NOT NULL,
  `id_status` int(10) DEFAULT NULL,
  `data_cadastro` varchar(255) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  `cod_rastreio` varchar(255) NOT NULL,
  `forma_envio` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_clientes_id_fk` (`id_cliente`),
  KEY `FK_status_pedidos` (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.pedidos: 0 rows
DELETE FROM `pedidos`;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.pedidos_item
DROP TABLE IF EXISTS `pedidos_item`;
CREATE TABLE IF NOT EXISTS `pedidos_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `nome_item` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `valor_total_item` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_item_pedidos_id_fk` (`id_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.pedidos_item: 0 rows
DELETE FROM `pedidos_item`;
/*!40000 ALTER TABLE `pedidos_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_item` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cod_produto` varchar(255) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `destaque` tinyint(1) NOT NULL,
  `ativo` int(11) NOT NULL,
  `controlar_estoque` tinyint(1) NOT NULL,
  `estoque` int(11) NOT NULL,
  `data_cadastro` varchar(255) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `comprimento` int(11) NOT NULL,
  `info` longtext NOT NULL,
  `meta_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categorias_id_fk` (`id_categoria`),
  KEY `produtos_marcas_id_fk` (`id_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.produtos: 0 rows
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `id_marca`, `id_categoria`, `nome`, `cod_produto`, `valor`, `destaque`, `ativo`, `controlar_estoque`, `estoque`, `data_cadastro`, `ultima_atualizacao`, `peso`, `altura`, `largura`, `comprimento`, `info`, `meta_link`) VALUES
	(1, 1, 19, 'Computador Intel Core i5, 16G, SSD 500GB', '1', 1500.00, 1, 1, 0, 0, '2018-05-15', 'Wed, 28 Apr 21 01:02:48 +0000', 1, 45, 30, 50, '50', 'computador-intel-core-i5-16g-ssd-500gb'),
	(2, 2, 28, 'Smart TV LED 32” HD LG', '00002', 999.00, 1, 1, 0, 0, '2018-10-06 20:16:45', 'Wed, 28 Apr 21 00:55:17 +0000', 4, 60, 30, 90, '90', 'smart-tv-led-32-hd-lg'),
	(10, 2, 25, 'Gravador DVD', '564564', 1587.59, 1, 1, 0, 0, '2018-10-06 20:16:45', 'Wed, 28 Apr 21 00:55:29 +0000', 1, 0, 0, 0, '0', 'gravador-dvd'),
	(11, 3, 27, 'Iphone 6 64G Cinza Espacial', '564564', 1799.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 00:56:02 +0000', 1, 10, 11, 16, '15', 'iphone-6-64g-cinza-espacial'),
	(12, 4, 15, 'Monitor Samsung 27', '00021564', 1499.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:03:17 +0000', 2, 50, 15, 50, '50', 'monitor-samsung-27'),
	(13, 11, 20, 'Notebook Acer Es1-572-51nj', '564564', 1599.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:03:49 +0000', 2, 40, 13, 40, '40', 'notebook-acer-es1-572-51nj'),
	(14, 4, 27, 'Smartphone Samsung Galaxy S9', '564654', 2999.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:03:57 +0000', 1, 10, 25, 25, '25', 'smartphone-samsung-galaxy-s9'),
	(15, 9, 15, 'SSD 240Gb SanDisk® PLUS', '564654', 359.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:04:33 +0000', 1, 15, 15, 15, '15', 'ssd-240gb-sandisk-plus'),
	(16, 10, 23, 'Secador de Cabelos', '564564', 99.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:04:45 +0000', 1, 15, 15, 15, '15', 'secador-de-cabelos'),
	(17, 10, 21, 'Cafeteira Elétrica Cadence Single', '564654564', 159.00, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:05:05 +0000', 1, 20, 20, 20, '20', 'cafeteira-eletrica-cadence-single'),
	(18, 10, 21, 'Cafeteira Expresso 3 Em 1', '4dsa564a', 599.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:07:15 +0000', 1, 25, 25, 25, '25', 'cafeteira-expresso-3-em-1'),
	(19, 4, 20, 'Notebook Samsung Expert X22', '54564897', 1899.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:07:42 +0000', 2, 25, 25, 25, 'Informações do produto', 'notebook-samsung-expert-x22'),
	(20, 4, 20, 'Notebook Samsung Essentials E30', '56489789', 1699.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:07:55 +0000', 2, 35, 35, 35, 'Informações do produto', 'notebook-samsung-essentials-e30'),
	(21, 3, 27, 'iphone X 256G Branco', '8975641321', 4999.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:08:15 +0000', 1, 17, 18, 18, 'Informações do produto', 'iphone-x-256g-branco'),
	(22, 4, 27, 'Samsung Galaxy Note 8 256G Preto', '231545487', 3999.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:08:24 +0000', 1, 25, 25, 25, 'Informação do produto', 'samsung-galaxy-note-8-256g-preto'),
	(23, 1, 15, 'Hard Disk 2tb Sata3', '47154931', 499.99, 1, 1, 0, 0, '2018-10-01', 'Wed, 28 Apr 21 01:09:06 +0000', 1, 25, 25, 25, '25', 'hard-disk-2tb-sata3');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos_fotos
DROP TABLE IF EXISTS `produtos_fotos`;
CREATE TABLE IF NOT EXISTS `produtos_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fotos_produtos_id_fk` (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.produtos_fotos: 0 rows
DELETE FROM `produtos_fotos`;
/*!40000 ALTER TABLE `produtos_fotos` DISABLE KEYS */;
INSERT INTO `produtos_fotos` (`id`, `id_produto`, `foto`) VALUES
	(91, 12, '05.jpg'),
	(92, 13, '06.jpg'),
	(90, 1, '02.jpg'),
	(84, 10, '01.jpg'),
	(95, 16, '09.jpg'),
	(94, 15, '08.jpg'),
	(99, 19, '13.jpg'),
	(100, 20, '12.jpg'),
	(101, 21, '14.jpg'),
	(102, 22, '15.jpg'),
	(103, 23, '16.jpg'),
	(97, 17, '10.jpg'),
	(96, 17, '11.jpg'),
	(93, 14, '07.jpg'),
	(83, 2, '04.jpg'),
	(98, 18, '10.jpg'),
	(86, 11, '03.jpg');
/*!40000 ALTER TABLE `produtos_fotos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos_mais_vendidos
DROP TABLE IF EXISTS `produtos_mais_vendidos`;
CREATE TABLE IF NOT EXISTS `produtos_mais_vendidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `quant_vendidos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produtos_mais_vendidos` (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.produtos_mais_vendidos: 0 rows
DELETE FROM `produtos_mais_vendidos`;
/*!40000 ALTER TABLE `produtos_mais_vendidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_mais_vendidos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.status_pedido
DROP TABLE IF EXISTS `status_pedido`;
CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.status_pedido: 0 rows
DELETE FROM `status_pedido`;
/*!40000 ALTER TABLE `status_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT 'NULL',
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  KEY `fk_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `id_cliente`) VALUES
	(1, '127.0.0.1', 'Administrator', '$2y$12$7ydZ6dRfxweWSERELeKmquQugcylbhosNUn6rSh3QUJgfMyvBeRYK', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1619568814, 1, 'Rafael', 'Soncine', 'ADMIN', '0', NULL);
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
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.users_groups: 2 rows
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
