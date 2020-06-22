-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jun-2020 às 04:40
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `unifamma`
--
CREATE DATABASE IF NOT EXISTS `unifamma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `unifamma`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `dataHoraCompra` datetime NOT NULL,
  `formaPagamento` varchar(50) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `idUsuario`, `dataHoraCompra`, `formaPagamento`, `valorTotal`) VALUES
(1, 1, '2020-05-23 00:44:16', '1', '10901.18'),
(2, 2, '2020-05-23 00:46:32', '4', '10961.18'),
(3, 3, '2020-05-23 02:57:45', '2', '1357.67'),
(42, 1, '2020-06-21 00:36:36', '1', '1.00'),
(44, 17, '2020-06-21 00:48:32', '1', '1.00'),
(45, 17, '2020-06-21 00:58:00', '1', '1.00'),
(47, 17, '2020-06-21 01:04:22', '1', '1.00'),
(48, 17, '2020-06-21 01:43:22', '1', '14.25'),
(49, 17, '2020-06-21 01:49:48', '1', '9.50'),
(50, 17, '2020-06-21 01:51:49', '1', '9.50'),
(51, 17, '2020-06-21 03:13:28', '1', '6.00'),
(52, 17, '2020-06-21 03:22:32', '1', '23.75'),
(53, 17, '2020-06-21 03:23:29', '1', '39.25'),
(54, 17, '2020-06-21 03:46:00', '1', '1.00'),
(61, 17, '2020-06-21 20:54:34', '1', '1.00'),
(63, 17, '2020-06-22 02:40:17', '1', '23.75'),
(64, 26, '2020-06-22 02:42:19', '2', '14.87'),
(66, 2, '2020-06-22 03:42:13', '1', '9.50'),
(67, 17, '2020-06-22 03:44:06', '1', '23.75');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenscompra`
--

CREATE TABLE IF NOT EXISTS `itenscompra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCompra` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  `precoOriginalProduto` decimal(10,2) NOT NULL,
  `precoProduto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCompra` (`idCompra`),
  KEY `idProduto` (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itenscompra`
--

INSERT INTO `itenscompra` (`id`, `idCompra`, `idProduto`, `quantidade`, `desconto`, `precoOriginalProduto`, `precoProduto`) VALUES
(1, 1, 1, 2, '0.00', '945.58', '945.58'),
(2, 1, 2, 1, '1.25', '1504.35', '1485.55'),
(3, 2, 3, 10, '1.56', '25.35', '24.95'),
(4, 2, 4, 10, '1.29', '32.25', '31.83'),
(5, 2, 1, 11, '0.00', '945.58', '945.58'),
(6, 3, 2, 1, '5.00', '1504.35', '1429.13'),
(7, 42, 7, 1, '0.00', '5.50', '5.50'),
(8, 44, 5, 1, '0.00', '4.75', '4.75'),
(9, 44, 7, 4, '0.00', '5.50', '5.50'),
(10, 45, 5, 1, '0.00', '4.75', '4.75'),
(11, 47, 5, 1, '0.00', '4.75', '4.75'),
(12, 48, 5, 1, '0.00', '4.75', '4.75'),
(13, 48, 5, 2, '0.00', '4.75', '4.75'),
(14, 49, 5, 2, '0.00', '4.75', '4.75'),
(15, 50, 5, 2, '0.00', '4.75', '4.75'),
(16, 51, 1, 1, '0.00', '6.00', '6.00'),
(17, 52, 5, 5, '0.00', '4.75', '4.75'),
(18, 53, 5, 1, '0.00', '4.75', '4.75'),
(19, 53, 4, 5, '0.00', '5.00', '5.00'),
(20, 53, 3, 2, '0.00', '4.75', '4.75'),
(34, 54, 2, 5, '0.00', '5.00', '5.00'),
(36, 54, 6, 4, '0.00', '7.00', '7.00'),
(38, 61, 5, 1, '0.00', '4.75', '4.75'),
(44, 63, 5, 5, '0.00', '4.75', '4.75'),
(45, 64, 4, 3, '0.50', '5.00', '4.98'),
(46, 66, 5, 2, '0.00', '4.75', '4.75'),
(47, 67, 5, 5, '0.00', '4.75', '4.75');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(150) NOT NULL,
  `qtd` int(11) NOT NULL,
  `precoCompra` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nomeProduto`, `qtd`, `precoCompra`, `precoVenda`, `dataCadastro`, `dataAlteracao`, `ativo`) VALUES
(1, 'Batata', 5, '2.50', '6.00', '2020-04-03 21:18:57', '2020-06-22 02:31:41', 1),
(2, 'Cenoura Marca A', 15, '3.00', '5.00', '2020-04-04 00:46:51', '2020-06-21 02:40:11', 1),
(3, 'Mandioca', 13, '3.75', '4.75', '2020-04-03 21:18:57', '2020-06-21 01:59:26', 1),
(4, 'Maçã', 21, '3.00', '5.00', '2020-04-04 00:46:51', '2020-06-22 00:43:08', 1),
(5, 'Abacaxi', 18, '3.75', '4.75', '2020-04-04 00:46:51', '2020-06-22 01:44:11', 1),
(6, 'Cenoura', 53, '5.75', '7.00', '2020-06-20 09:39:13', '2020-06-21 18:45:17', 1),
(7, 'Cenoura Marca C', 34, '3.50', '5.50', '2020-06-20 19:57:58', '2020-06-21 02:03:50', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `dataAlteracao`, `ativo`) VALUES
(1, 'Rafael', 'teste@teste.com', 'rafael', '202cb962ac59075b964b07152d234b70', '2020-05-08 00:00:00', '2020-06-22 02:38:37', 1),
(2, 'Carlos', 'teste@teste.com', 'carlos', '202cb962ac59075b964b07152d234b70', '2020-05-08 00:00:00', '2020-06-22 02:38:34', 1),
(3, 'Paulo', 'paulo.paulo@paulo.com', 'paulo', 'e10adc3949ba59abbe56e057f20f883e', '2020-05-16 01:37:34', '2020-06-22 02:35:59', 1),
(13, 'Katia Silva', 'ks@hotmail.com', 'ktia', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', '2020-06-21 01:00:16', 1),
(14, 'Diego', 'teste@teste.com', 'diego', '202cb962ac59075b964b07152d234b70', '2020-06-20 09:29:13', '2020-06-22 02:38:46', 1),
(15, 'Davi Alves', 'davi@davi.com', 'davi', '202cb962ac59075b964b07152d234b70', '2020-06-20 07:06:04', '2020-06-22 02:38:20', 1),
(16, 'Jessika', 'jessika@jessika.com', 'jeska', '193708f6422469e2c27aa859b817c4ec', '2020-06-20 07:06:05', '2020-06-22 02:36:11', 1),
(17, 'Aparato Futurista', 'a.f@gmail.com', 'apafu', '202cb962ac59075b964b07152d234b70', '2020-06-20 19:57:39', '2020-06-22 02:36:08', 1),
(26, 'Teste', 'teste@teste.com', 'teste', '2467d3744600858cc9026d5ac6005305', '2020-06-21 02:02:57', '2020-06-22 02:38:26', 1);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  ADD CONSTRAINT `itenscompra_ibfk_1` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `itenscompra_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
