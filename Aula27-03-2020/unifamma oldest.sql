-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/03/2020 às 00:44
-- Versão do servidor: 10.1.37-MariaDB
-- Versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataHoraCompra` datetime NOT NULL,
  `formaPagamento` varchar(50) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `compra`
--

INSERT INTO `compra` (`id`, `idUsuario`, `dataHoraCompra`, `formaPagamento`, `valorTotal`) VALUES
(1, 1, '2020-05-23 00:44:16', '1', '10901.18'),
(2, 2, '2020-05-23 00:46:32', '4', '10961.18'),
(3, 3, '2020-05-23 02:57:45', '2', '1357.67');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itenscompra`
--

CREATE TABLE `itenscompra` (
  `id` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  `precoOriginalProduto` decimal(10,2) NOT NULL,
  `precoProduto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `itenscompra`
--

INSERT INTO `itenscompra` (`id`, `idCompra`, `idProduto`, `quantidade`, `desconto`, `precoOriginalProduto`, `precoProduto`) VALUES
(1, 1, 1, 2, '0.00', '945.58', '945.58'),
(2, 1, 2, 1, '1.25', '1504.35', '1485.55'),
(3, 2, 3, 10, '1.56', '25.35', '24.95'),
(4, 2, 4, 10, '1.29', '32.25', '31.83'),
(5, 2, 1, 11, '0.00', '945.58', '945.58'),
(6, 3, 2, 1, '5.00', '1504.35', '1429.13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS  `produto` (
  `id` int(11) NOT NULL,
  `nomeProduto` varchar(150) NOT NULL,
  `qtd` int(11) NOT NULL,
  `precoCompra` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Despejando dados para a tabela `produto`
--

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nomeProduto`, `qtd`, `precoCompra`, `precoVenda`, `dataCadastro`, `dataAlteracao`, `ativo`) VALUES
(1, 'Batata', 30, 2.5, 6, '2020-04-03 21:18:57', '2020-04-03 21:18:57', 0),
(2, 'Cenoura', 30, 3, 5, '2020-04-04 00:46:51', '2020-04-04 00:46:51', 1),
(3, 'Mandioca', 20, 3.75, 4.75, '2020-04-03 21:18:57', '2020-04-03 21:18:57', 1),
(4, 'Maçã', 30, 3, 5, '2020-04-04 00:46:51', '2020-04-04 00:46:51', 1),
(5, 'Abacaxi', 20, 3.75, 4.75, '2020-04-04 00:46:51', '2020-04-23 21:18:57', 1);
-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS  `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `dataAlteracao`, `ativo`) VALUES
(1, 'Rafael Alves Florindo', 'rafael.florindo@unifamma.edu.br', 'rafael.florindo', '202cb962ac59075b964b07152d234b70', '2020-05-08 00:00:00', '2020-05-15 22:15:38', 1),
(2, 'Carlos Danilo Luz', 'carlos.luz@unifamma.edu.br', 'carlos.luz', '202cb962ac59075b964b07152d234b70', '2020-05-08 00:00:00', '2020-05-15 22:15:38', 1),
(3, 'Paulo', 'paulo.paulo@paulo.com', 'paulo', 'e10adc3949ba59abbe56e057f20f883e', '2020-05-16 01:37:34', '2020-05-15 23:37:34', 0),
(13, 'Katia Silva', 'ks@hotmail.com', 'ktia', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', '2020-06-19 18:17:30', 1);

--
-- Índices de tabelas apagadas
--


--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);



--
-- Índices de tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCompra` (`idCompra`),
  ADD KEY `idProduto` (`idProduto`);


--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--


--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `itenscompra`
--
ALTER TABLE `itenscompra`
  ADD CONSTRAINT `itenscompra_ibfk_1` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `itenscompra_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
