-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Fev-2021 às 01:39
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojaweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_categoriapai` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `metalink` varchar(100) DEFAULT NULL,
  `ultima_atualizacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `id_categoriapai`, `ativo`, `metalink`, `ultima_atualizacao`) VALUES
(29, 'Informática', NULL, 1, NULL, NULL),
(30, 'HD', 29, 1, NULL, NULL),
(31, 'Memoria', 29, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
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
  `ultima_atualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `data_nascimento`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `email`, `senha`, `ativo`, `telefone`, `data_cadastro`, `ultima_atualizacao`) VALUES
(4, 'abcv', '222.222.222-22', '11/11/1111', '00000-000', '111111', '111', '11111', '1111', '111', '1111', '1111@AA.COM', '', 1, NULL, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
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
  `data_atualizacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `titulo`, `empresa`, `cep`, `bairro`, `complemento`, `cidade`, `estado`, `email`, `telefone`, `p_destaque`, `data_atualizacao`) VALUES
(1, 'LojaWEB', 'ERRE Software', '08000000', 'Sé', 'comple', 'São Paulo', 'SP', 'admin@admin.com', '11-20205578', 30, 'Thu, 18 Feb 21 01:15:10 +0100');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_correios`
--

CREATE TABLE `config_correios` (
  `id` int(11) NOT NULL,
  `cep_origem` varchar(12) DEFAULT NULL,
  `somar_frete` decimal(10,2) DEFAULT NULL,
  `data_atualizacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config_correios`
--

INSERT INTO `config_correios` (`id`, `cep_origem`, `somar_frete`, `data_atualizacao`) VALUES
(1, '08050000', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_pagseguro`
--

CREATE TABLE `config_pagseguro` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `cartao` tinyint(1) DEFAULT NULL,
  `boleto` tinyint(1) DEFAULT NULL,
  `transferencia` tinyint(1) DEFAULT NULL,
  `data_atualizacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config_pagseguro`
--

INSERT INTO `config_pagseguro` (`id`, `email`, `token`, `cartao`, `boleto`, `transferencia`, `data_atualizacao`) VALUES
(1, 'aa@aa.com.br', 'ABCDEFGHI0123456789', 1, 0, 0, 'Thu, 18 Feb 21 01:39:08 +0100');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(14, '::1', 'admin@admin.com.br', 1613606352);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `ultima_atualizacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `nome`, `ativo`, `ultima_atualizacao`) VALUES
(1, 'Philco', 1, 'Tue, 02 Feb 21 01:01:11 +0100'),
(2, 'Positivo', 0, 'Tue, 02 Feb 21 01:01:15 +0100'),
(3, 'Intel', 1, 'Tue, 02 Feb 21 01:00:21 +0100'),
(4, 'AMD', 0, 'Tue, 02 Feb 21 01:01:21 +0100');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
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
  `info` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `id_marca`, `id_categoria`, `nome`, `cod_produto`, `valor`, `destaque`, `ativo`, `controlar_estoque`, `estoque`, `data_cadastro`, `ultima_atualizacao`, `peso`, `altura`, `largura`, `comprimento`, `info`) VALUES
(17, 1, 29, 'Teste', '1', '11.00', 1, 1, 1, 1, 'Tue, 16 Feb 21 01:11:30 +0100', 'Wed, 17 Feb 21 01:37:17 +0100', 1, 1, 1, 1, '1'),
(18, 1, 29, '233', '2', '22.00', 1, 1, 1, 2, 'Wed, 17 Feb 21 01:08:31 +0100', 'Wed, 17 Feb 21 01:38:01 +0100', 2, 2, 2, 2, '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_fotos`
--

CREATE TABLE `produtos_fotos` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `foto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$7ydZ6dRfxweWSERELeKmquQugcylbhosNUn6rSh3QUJgfMyvBeRYK', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1613606363, 1, 'Rafael', 'Soncine', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config_correios`
--
ALTER TABLE `config_correios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config_pagseguro`
--
ALTER TABLE `config_pagseguro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_categorias_id_fk` (`id_categoria`),
  ADD KEY `produtos_marcas_id_fk` (`id_marca`);

--
-- Índices para tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fotos_produtos_id_fk` (`id_produto`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `config_pagseguro`
--
ALTER TABLE `config_pagseguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_categorias_id_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `produtos_marcas_id_fk` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`);

--
-- Limitadores para a tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  ADD CONSTRAINT `fotos_produtos_id_fk` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
