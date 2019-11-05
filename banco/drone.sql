-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Set-2016 às 12:46
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `drone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `idCarga` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCarga` varchar(20) NOT NULL,
  `pesoCarga` varchar(8) NOT NULL,
  `alturaCarga` varchar(8) NOT NULL,
  `larguraCarga` varchar(8) NOT NULL,
  `profundidadeCarga` varchar(8) NOT NULL,
  `riscoCarga` tinyint(1) NOT NULL,
  `cnpjEmpresa` varchar(20) NOT NULL,
  PRIMARY KEY (`idCarga`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `carga`
--

INSERT INTO `carga` (`idCarga`, `nomeCarga`, `pesoCarga`, `alturaCarga`, `larguraCarga`, `profundidadeCarga`, `riscoCarga`, `cnpjEmpresa`) VALUES
(17, 'Teste2', '2 g', '1 cm', '1 cm', '1 cm', 1, '00000000000000'),
(21, 'Celular', '6 Kg', '6 cm', '6 cm', '6 cm', 1, '66666666666666'),
(22, '88888', '8 kg', '1 cm', '1 cm', '1 cm', 1, '66666666666666'),
(23, '77p', '1', '1', '1', '1', 0, '12312312312312'),
(24, 'Celular', '5 Kg', '5 cm', '5 cm', '5 cm', 1, '12312312312312');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destino`
--

CREATE TABLE IF NOT EXISTS `destino` (
  `idDestino` int(11) NOT NULL AUTO_INCREMENT,
  `enderecoDestino` varchar(50) CHARACTER SET latin1 NOT NULL,
  `statusDestino` tinyint(1) NOT NULL,
  `idCarga` int(11) NOT NULL,
  `idDrone` int(11) NOT NULL,
  PRIMARY KEY (`idDestino`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `destino`
--

INSERT INTO `destino` (`idDestino`, `enderecoDestino`, `statusDestino`, `idCarga`, `idDrone`) VALUES
(5, 'R. Santa Teresa, 64 - Centro, São Paulo - SP, 010', 0, 22, 20),
(6, 'São Paulo, Brasil', 0, 22, 20),
(7, 'SÃ£o LuÃ­s, MA, Brasil', 0, 22, 20),
(8, 'campinas unicamp', 0, 21, 21),
(9, 'Brasil', 0, 24, 0),
(10, 'Haraze-Mangueigne, Chade', 0, 22, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `drone`
--

CREATE TABLE IF NOT EXISTS `drone` (
  `idDrone` int(11) NOT NULL AUTO_INCREMENT,
  `modeloDrone` varchar(50) NOT NULL,
  `pesoDrone` varchar(10) NOT NULL,
  `alturaDrone` varchar(10) NOT NULL,
  `larguraDrone` varchar(10) NOT NULL,
  `precoDrone` varchar(10) NOT NULL,
  `disponibilidadeDrone` tinyint(1) NOT NULL,
  `fotoDrone` varchar(200) NOT NULL,
  PRIMARY KEY (`idDrone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `drone`
--

INSERT INTO `drone` (`idDrone`, `modeloDrone`, `pesoDrone`, `alturaDrone`, `larguraDrone`, `precoDrone`, `disponibilidadeDrone`, `fotoDrone`) VALUES
(7, '99', '9 kg', '9 cm', '9 cm', 'R$ 99', 1, '9'),
(9, '9', '9', '9', '9', '9', 1, '0'),
(10, '9', '9', '99', '9', '9', 0, '456'),
(11, '', '', '', '', '', 0, '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `cnpj` varchar(20) NOT NULL,
  `nomeFantasia` varchar(50) NOT NULL,
  `enderecoEmpresa` varchar(60) NOT NULL,
  `cidadeEmpresa` varchar(45) NOT NULL,
  `telefoneEmpresa` varchar(15) NOT NULL,
  `representanteEmpresa` varchar(45) NOT NULL,
  `categoriaEmpresa` varchar(45) NOT NULL,
  `razaoSocial` varchar(45) NOT NULL,
  `senhaEmpresa` varchar(50) NOT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`cnpj`, `nomeFantasia`, `enderecoEmpresa`, `cidadeEmpresa`, `telefoneEmpresa`, `representanteEmpresa`, `categoriaEmpresa`, `razaoSocial`, `senhaEmpresa`) VALUES
('12312312312312', 'Hello', 'Rua OI, Num: Tchau', 'Pouso Triste', '(35)99999999999', 'Dani', 'Venda', 'HelloWorld', '25d55ad283aa400af464c76d713c07ad'),
('33333333333333', 'CeleCia9', 'Rua uuhduh9', 'pouso alegre99', '344444449', 'Fulano9', 'Venda e Troca', 'CompanhiadeCelular9', '1829b546ae77fd75f7f1c39936fadb25'),
('44444444444444', '5', '5', '5', '6', '6', '6', '6', '25f9e794323b453885f5181f1b624d0b'),
('55555555555555', '561', '123', '123', '123', '123', '123', '523', 'd41d8cd98f00b204e9800998ecf8427e'),
('66666666666666', '2', '2', '2', '2', '2', '2', '2', '25f9e794323b453885f5181f1b624d0b'),
('88888888888888', '1', '1', '1', '1', '1', '1', '1', '123456789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
