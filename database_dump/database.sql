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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.categorias: 7 rows
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`, `id_categoriapai`, `ativo`, `ultima_atualizacao`, `meta_link`) VALUES
	(29, 'Informática', NULL, 1, 'Wed, 17 Mar 21 16:45:35 +0000', 'informatica'),
	(30, 'HD', 29, 1, 'Wed, 17 Mar 21 16:45:37 +0000', 'hd'),
	(31, 'Memoria', 29, 1, 'Wed, 17 Mar 21 16:45:38 +0000', 'memoria'),
	(32, 'Mecanica', NULL, 1, 'Wed, 17 Mar 21 16:45:35 +0000', 'mecanica'),
	(33, 'Cooler', 29, 1, 'Wed, 17 Mar 21 16:45:37 +0000', 'cooler'),
	(34, 'Limpeza', NULL, 1, NULL, 'limpeza'),
	(35, 'Detergente', 34, 1, NULL, 'detergente');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.clientes: 1 rows
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nome`, `cpf`, `data_nascimento`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `email`, `senha`, `ativo`, `telefone`, `data_cadastro`, `ultima_atualizacao`) VALUES
	(4, 'abcv', '222.222.222-22', '11/11/1111', '00000-000', '111111', '111', '11111', '1111', '111', '1111', '1111@AA.COM', '111', 1, '222', '0000-00-00', NULL);
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

-- Copiando dados para a tabela lojaweb.config: 1 rows
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `titulo`, `empresa`, `cep`, `complemento`, `cidade`, `estado`, `email`, `bairro`, `telefone`, `p_destaque`, `data_atualizacao`, `endereco`) VALUES
	(1, 'Eshop - eCommerce', 'Eshop', '08000000', '', 'São Paulo', 'SP', 'contato@eshop.com', 'Sé', '(11)2020-5578', 9, 'Mon, 29 Mar 21 13:52:37 +0000', 'Rua noventa e nove');
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

-- Copiando dados para a tabela lojaweb.config_correios: 1 rows
DELETE FROM `config_correios`;
/*!40000 ALTER TABLE `config_correios` DISABLE KEYS */;
INSERT INTO `config_correios` (`id`, `cep_origem`, `somar_frete`, `data_atualizacao`) VALUES
	(1, '08051-000', 15.92, 'Tue, 02 Mar 21 22:46:06 +0100');
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.config_pagseguro: 1 rows
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
  `nome` varchar(255) NOT NULL,
  `ativo` varchar(255) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.marcas: 4 rows
DELETE FROM `marcas`;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `nome`, `ativo`, `ultima_atualizacao`) VALUES
	(1, 'Philco', '1', 'Tue, 02 Feb 21 01:01:11 +0100'),
	(2, 'Positivo', '0', 'Tue, 02 Feb 21 01:01:15 +0100'),
	(3, 'Intel', '1', 'Tue, 02 Feb 21 01:00:21 +0100'),
	(4, 'AMD', '0', 'Tue, 02 Feb 21 01:01:21 +0100');
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
  `total_produto` decimal(15,0) NOT NULL,
  `total_frete` decimal(15,0) NOT NULL,
  `total_pedido` decimal(15,0) NOT NULL,
  `id_status` int(10) DEFAULT NULL,
  `data_cadastro` varchar(255) NOT NULL,
  `ultima_atualizacao` varchar(255) DEFAULT NULL,
  `cod_rastreio` varchar(255) NOT NULL,
  `forma_envio` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_clientes_id_fk` (`id_cliente`),
  KEY `FK_pedidos_status_pedido` (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `destaque` tinyint(1) NOT NULL,
  `ativo` int(11) NOT NULL,
  `controlar_estoque` tinyint(1) NOT NULL,
  `estoque` int(11) NOT NULL,
  `data_cadastro` varchar(255) NOT NULL,
  `ultima_atualizacao` decimal(10,2) DEFAULT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `comprimento` int(11) NOT NULL,
  `info` longtext NOT NULL,
  `meta_link` varchar(255) NOT NULL DEFAULT '',
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categorias_id_fk` (`id_categoria`),
  KEY `produtos_marcas_id_fk` (`id_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.produtos: 16 rows
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `id_marca`, `id_categoria`, `nome`, `cod_produto`, `destaque`, `ativo`, `controlar_estoque`, `estoque`, `data_cadastro`, `ultima_atualizacao`, `peso`, `altura`, `largura`, `comprimento`, `info`, `meta_link`, `valor`) VALUES
	(22, 1, 29, 'Samsung Galaxy Note 8 256G Preto', '231545487', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 25, 25, 25, 'Informação do produto', 'samsung-galaxy-note-8-256g-preto', 40),
	(23, 1, 29, 'Hard Disk 2tb Sata3', '47154931', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 25, 25, 25, '25', 'hard-disk-2tb-sata3', 5),
	(20, 1, 29, 'Notebook Samsung Essentials E30', '56489789', 1, 1, 0, 0, '2018-10-01', 0.00, 2, 35, 35, 35, 'Informações do produto', 'notebook-samsung-essentials-e30', 17),
	(21, 1, 29, 'iphone X 256G Branco', '8975641321', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 17, 18, 18, 'Informações do produto', 'iphone-x-256g-branco', 50),
	(18, 1, 29, 'Cafeteira Expresso 3 Em 1', '4dsa564a', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 25, 25, 25, '25', 'cafeteira-expresso-3-em-1', 6),
	(19, 1, 29, 'Notebook Samsung Expert X22', '54564897', 1, 1, 0, 0, '2018-10-01', 0.00, 2, 25, 25, 25, 'Informações do produto', 'notebook-samsung-expert-x22', 19),
	(17, 1, 29, 'Cafeteira Elétrica Cadence Single', '564654564', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 20, 20, 20, '20', 'cafeteira-eletrica-cadence-single', 2),
	(16, 1, 29, 'Secador de Cabelos', '564564', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 15, 15, 15, '15', 'secador-de-cabelos', 1),
	(15, 1, 29, 'SSD 240Gb SanDisk® PLUS', '564654', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 15, 15, 15, '15', 'ssd-240gb-sandisk-plus', 4),
	(14, 1, 29, 'Smartphone Samsung Galaxy S9', '564654', 1, 1, 0, 0, '2018-10-01', 0.00, 1, 10, 25, 25, '25', 'smartphone-samsung-galaxy-s9', 30),
	(13, 1, 29, 'Notebook Acer Es1-572-51nj', '564564', 1, 1, 0, 0, '2018-10-01', 0.00, 2, 40, 13, 40, '40', 'notebook-acer-es1-572-51nj', 16),
	(12, 1, 29, 'Monitor Samsung 27', '00021564', 1, 1, 0, 0, '2018-10-01', 0.00, 2, 50, 15, 50, '50', 'monitor-samsung-27', 15),
	(1, 1, 29, 'Computador Intel Core i5, 16G, SSD 500GB', '1', 1, 1, 1, 2, '2018-05-15', 0.00, 1, 45, 30, 50, '50', 'computador-intel-core-i5-16g-ssd-500gb', 599),
	(11, 1, 29, 'Iphone 6 64G Cinza Espacial', '564564', 1, 1, 0, 0, '2018-05-15', 0.00, 1, 10, 11, 16, '15', 'iphone-6-64g-cinza-espacial', 18),
	(2, 1, 29, 'Smart TV LED 32” HD LG', '00002', 1, 1, 0, 0, '2018-05-15', 0.00, 4, 60, 30, 90, '90', 'smart-tv-led-32-hd-lg', 10),
	(10, 1, 29, 'Gravador DVD', '564564', 1, 1, 0, 0, '2018-05-15', 0.00, 1, 0, 0, 0, '0', 'gravador-dvd', 16);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos_fotos
DROP TABLE IF EXISTS `produtos_fotos`;
CREATE TABLE IF NOT EXISTS `produtos_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fotos_produtos_id_fk` (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.produtos_fotos: 16 rows
DELETE FROM `produtos_fotos`;
/*!40000 ALTER TABLE `produtos_fotos` DISABLE KEYS */;
INSERT INTO `produtos_fotos` (`id`, `id_produto`, `foto`) VALUES
	(102, 12, '05.jpg'),
	(114, 1, '02.jpg'),
	(104, 10, '01.jpg'),
	(98, 16, '09.jpg'),
	(101, 13, '06.jpg'),
	(99, 15, '08.jpg'),
	(103, 11, '03.jpg'),
	(112, 18, '10.jpg'),
	(105, 2, '04.jpg'),
	(100, 14, '07.jpg'),
	(97, 17, '11.jpg'),
	(107, 23, '16.jpg'),
	(108, 22, '15.jpg'),
	(109, 21, '14.jpg'),
	(110, 20, '12.jpg'),
	(111, 19, '13.jpg');
/*!40000 ALTER TABLE `produtos_fotos` ENABLE KEYS */;

-- Copiando estrutura para tabela lojaweb.produtos_mais_vendidos
DROP TABLE IF EXISTS `produtos_mais_vendidos`;
CREATE TABLE IF NOT EXISTS `produtos_mais_vendidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `quant_vendidos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produtos_mais_vendidos` (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela lojaweb.status_pedido: 4 rows
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
	(1, '127.0.0.1', 'administrator', '$2y$12$7ydZ6dRfxweWSERELeKmquQugcylbhosNUn6rSh3QUJgfMyvBeRYK', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1617025927, 1, 'Rafael', 'Soncine', 'ADMIN', '0');
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
