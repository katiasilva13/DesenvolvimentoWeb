-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2020 às 02:34
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataHoraCompra` datetime NOT NULL,
  `formaPagamento` varchar(50) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `idUsuario`, `dataHoraCompra`, `formaPagamento`, `valorTotal`) VALUES
(1, 1, '2020-05-23 00:44:16', '1', '10901.18'),
(2, 2, '2020-05-23 00:46:32', '4', '10961.18'),
(3, 3, '2020-05-23 02:57:45', '2', '1357.67'),
(4, 13, '2020-06-20 08:22:37', '1', '0.00'),
(5, 13, '2020-06-20 09:40:40', '2', '0.00'),
(6, 13, '2020-06-20 09:42:35', '1', '0.00'),
(7, 13, '2020-06-20 10:10:54', '3', '0.00'),
(8, 3, '2020-06-20 10:11:34', '1', '0.00'),
(9, 13, '2020-06-20 10:16:09', '2', '0.00'),
(10, 13, '2020-06-20 10:23:29', '3', '0.00'),
(11, 13, '2020-06-20 10:24:06', '1', '0.00'),
(12, 14, '2020-06-20 10:26:36', '1', '0.00'),
(13, 14, '2020-06-20 10:26:55', '1', '0.00'),
(14, 14, '2020-06-20 10:28:25', '2', '0.00'),
(15, 13, '2020-06-20 10:28:35', '3', '0.00'),
(16, 14, '2020-06-20 10:31:35', '2', '0.00'),
(17, 2, '2020-06-20 10:36:44', '1', '0.00'),
(18, 14, '2020-06-20 10:43:16', '1', '0.00'),
(19, 14, '2020-06-20 10:44:43', '1', '0.00'),
(20, 13, '2020-06-20 10:46:00', '1', '0.00'),
(21, 17, '2020-06-20 19:58:08', '2', '0.00'),
(22, 17, '2020-06-20 20:04:34', '1', '0.00'),
(42, 1, '2020-06-21 00:36:36', '1', '0.00'),
(44, 17, '2020-06-21 00:48:32', '1', '0.00'),
(45, 17, '2020-06-21 00:58:00', '1', '0.00'),
(46, 17, '2020-06-21 01:03:47', '1', '0.00'),
(47, 17, '2020-06-21 01:04:22', '1', '0.00'),
(48, 17, '2020-06-21 01:43:22', '1', '14.25'),
(49, 17, '2020-06-21 01:49:48', '1', '9.50'),
(50, 17, '2020-06-21 01:51:49', '1', '9.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenscompra`
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
(15, 50, 5, 2, '0.00', '4.75', '4.75');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nomeProduto` varchar(150) NOT NULL,
  `qtd` int(11) NOT NULL,
  `precoCompra` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nomeProduto`, `qtd`, `precoCompra`, `precoVenda`, `dataCadastro`, `dataAlteracao`, `ativo`) VALUES
(1, 'Batata', 30, '2.50', '6.00', '2020-04-03 21:18:57', '2020-04-03 21:18:57', 0),
(2, 'Cenoura', 30, '3.00', '5.00', '2020-04-04 00:46:51', '2020-04-04 00:46:51', 1),
(3, 'Mandioca', 20, '3.75', '4.75', '2020-04-03 21:18:57', '2020-04-03 21:18:57', 1),
(4, 'Maçã', 30, '3.00', '5.00', '2020-04-04 00:46:51', '2020-04-04 00:46:51', 1),
(5, 'Abacaxi', 10, '3.75', '4.75', '2020-04-04 00:46:51', '2020-06-20 23:51:55', 1),
(6, 'Cenoura', 8, '5.75', '7.00', '2020-06-20 09:39:13', '2020-06-20 19:03:34', 1),
(7, 'Cenoura Marca C', 38, '3.50', '5.50', '2020-06-20 19:57:58', '2020-06-20 22:49:51', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `dataAlteracao`, `ativo`) VALUES
(1, 'Rafael Alves Florindo', 'rafael.florindo@unifamma.edu.br', 'rafael.florindo', '202cb962ac59075b964b07152d234b70', '2020-05-08 00:00:00', '2020-05-15 22:15:38', 1),
(2, 'Carlos Danilo Luz', 'carlos.luz@unifamma.edu.br', 'carlos.luz', '202cb962ac59075b964b07152d234b70', '2020-05-08 00:00:00', '2020-05-15 22:15:38', 1),
(3, 'Paulo', 'paulo.paulo@paulo.com', 'paulo', 'e10adc3949ba59abbe56e057f20f883e', '2020-05-16 01:37:34', '2020-05-15 23:37:34', 0),
(13, 'Katia Silva', 'ks@hotmail.com', 'ktia', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', '2020-06-20 18:38:30', 1),
(14, 'Diego Escobar', 'teste@teste.com', 'escobar', '202cb962ac59075b964b07152d234b70', '2020-06-20 09:29:13', '2020-06-20 18:39:08', 0),
(15, 'Davi Alves', 'davi@davi.com', 'teste', '202cb962ac59075b964b07152d234b70', '2020-06-20 07:06:04', '2020-06-20 17:57:04', 1),
(16, 'Jessika', 'jessika@jessika.com', 'jeska', '193708f6422469e2c27aa859b817c4ec', '2020-06-20 07:06:05', '2020-06-20 18:43:39', 0),
(17, 'Aparato Futurista', 'a.f@gmail.com', 'apafu', '202cb962ac59075b964b07152d234b70', '2020-06-20 19:57:39', '2020-06-20 18:39:15', 0),
(18, 'William Felipe', 'teste@teste.com', 'will17', '202cb962ac59075b964b07152d234b70', '2020-06-21 01:34:49', '2020-06-20 23:34:49', 0),
(19, 'William Felipe', 'teste@teste.com', 'will17', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-21 01:41:53', '2020-06-20 23:41:53', 0),
(24, 'k s', 'ktiax13@gmail.com', 'Mara_Croft', '827ccb0eea8a706c4c34a16891f84e7b', '2020-06-21 02:01:04', '2020-06-21 00:01:04', 0),
(25, 'k s', 'marcelo.lessa@unifamma.edu.br', 'Mara_Croft', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-21 02:01:33', '2020-06-21 00:01:33', 0),
(26, 'k s', 'marcelo.lessa@unifamma.edu.br', 'Mara_Croft', '2467d3744600858cc9026d5ac6005305', '2020-06-21 02:02:57', '2020-06-21 00:02:57', 0),
(27, 'k s', 'marcelo.lessa@unifamma.edu.br', 'Mara_Croft', '9549b95e752323151e147348f1739051', '2020-06-21 02:03:11', '2020-06-21 00:03:11', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `itenscompra`
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
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
