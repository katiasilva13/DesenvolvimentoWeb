-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2020 às 04:15
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
  `dataHoraVenda` datetime NOT NULL,
  `formaPagamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `idUsuario`, `dataHoraVenda`, `formaPagamento`) VALUES
(1, 4, '2020-05-04 22:25:54', 'Parcelado em 10 x');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenscompra`
--

CREATE TABLE `itenscompra` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `precoProduto` decimal(10,2) NOT NULL,
  `desconto` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itenscompra`
--

INSERT INTO `itenscompra` (`id`, `idProduto`, `idCompra`, `qtd`, `precoProduto`, `desconto`) VALUES
(1, 5, 1, 30, '10.00', '0.00');

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
(1, 'Batata', 30, '2.50', '6.00', '0000-00-00 00:00:00', '2020-04-04 00:18:57', 0),
(2, 'Cenoura', 30, '3.50', '5.00', '0000-00-00 00:00:00', '2020-04-11 16:16:18', 1),
(3, 'Mandioca', 20, '5.75', '4.75', '0000-00-00 00:00:00', '2020-04-11 16:18:56', 1),
(4, 'Maça', 30, '10.00', '5.50', '0000-00-00 00:00:00', '2020-04-11 16:34:34', 1),
(5, 'Abacaxi', 20, '3.75', '4.00', '0000-00-00 00:00:00', '2020-04-11 16:40:12', 1);

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
(1, 'Arthur Florindo', 'arthurflorindo@hotmail.com', 'arthur.florindo', '789', '0000-00-00 00:00:00', '2020-04-04 00:18:57', 0),
(4, 'Carlos Danilo Luz', 'carlos.danilo@unifamma.edu.br', 'carlos.danilo', '123456', '0000-00-00 00:00:00', '2020-04-11 02:21:13', 0),
(9, 'Diego Escobar', 'diego.uni@unifamma.edu.br', 'diego.unifamma', '123', '0000-00-00 00:00:00', '2020-04-11 02:09:27', 0),
(11, 'Marcelo Lessa', 'marcelo.lessa@unifamma.edu.br', 'marcelo.unifamma', '123', '0000-00-00 00:00:00', '2020-04-11 04:17:19', 0),
(18, 'Kátia Marina Silva', 'k@s.com', 'katiasilva', '1234', '2020-04-11 06:17:32', '2020-05-12 00:22:59', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata para tabela compra
--

--
-- Metadata para tabela itenscompra
--

--
-- Metadata para tabela produto
--

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'unifamma', 'produto', '[]', '2020-05-11 23:56:02');

--
-- Metadata para tabela usuario
--

--
-- Metadata para o banco de dados unifamma
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
