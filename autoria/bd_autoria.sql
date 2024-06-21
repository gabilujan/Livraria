-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2023 às 13:04
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
Create database `bd_autoria`;
use `bd_autoria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_autor` int(10) NOT NULL,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(111, 'Camila', 'Santos', 'camillasantos@gmail.com', '1989-03-02'),
(222, 'Leandro', 'Assis ', 'MachadoAssis@gmail.com', '1966-07-20'),
(333, 'Paola', 'Oliveira', 'Oliveira002@gmail.com', '1999-11-11'),
(444, 'Tais', 'Amaral', 'Taissantos2@etec.sp.gov.br', '1955-04-04'),
(555, 'Daniel', 'Campos', 'daniell@hotmail.com', '2000-01-01'),
(666, 'Maria', 'Gomes', 'Mariagomes2@etec.sp.gov.br', '1955-02-06'),
(777, 'Tais ', 'Carla', 'TaisCarla@outlook.com', '1988-11-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_autor` int(10) NOT NULL,
  `Cod_livro` int(5) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `DataLancamento`, `Editora`) VALUES
(11, 1, '2017-06-21', 'Leitura'),
(22, 2, '2014-08-20', 'Suma'),
(33, 3, '2020-01-02', 'Glob'),
(44, 4, '2022-04-09', 'Leitura'),
(55, 4, '2023-07-02', 'Dark'),
(66, 5, '2021-07-11', 'Aleph'),
(77, 8, '2022-01-02', 'Letras'),
(88, 8, '2015-11-02', 'Suma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_livro` int(5) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Categoria` varchar(25) NOT NULL,
  `ISBN` varchar(18) NOT NULL,
  `Idioma` varchar(25) NOT NULL,
  `QtdePag` int(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'É assim que acaba', 'Romance', '111-3-16-148410-0', 'Português', 200),
(2, 'A culpa é das estrelas', 'Romance', '222-4-17-158511-0', 'Portugues', 100),
(3, 'Oito horas perfeitas', 'Contos', '444-4-20-225410-0', 'Português', 99),
(4, 'Emilia', 'Folclore', '333-5-18-169611-0', 'Portugues', 50),
(5, 'Vermelho branco sangue azul', 'Terror', '555-8-22-112310-0', 'Português', 111);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Login` varchar(5) NOT NULL,
  `Senha` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Login`, `Senha`) VALUES
('a', 123),
('b', 456);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_autor`);

--
-- Índices para tabela `autoria`
--
ALTER TABLE `autoria`
  ADD PRIMARY KEY (`Cod_autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_livro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
