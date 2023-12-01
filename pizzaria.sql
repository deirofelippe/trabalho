-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2023 at 03:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `acao` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `acao`, `nome`, `email`, `data`) VALUES
(13, 'Login', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:24'),
(14, 'Logout', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:36'),
(15, 'Login', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:39'),
(16, 'Logout', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:50'),
(17, 'Login', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:52'),
(18, 'Logout', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:54'),
(19, 'Login', 'brenda', 'otaria@teste.com', '28/11/2023 20:56:57'),
(20, 'Logout', 'brenda', 'otaria@teste.com', '28/11/2023 23:40:49'),
(21, 'Logout', '', '', '28/11/2023 23:45:58'),
(22, 'Login', 'brenda', 'otaria@teste.com', '28/11/2023 23:46:00'),
(23, 'Logout', 'brenda', 'otaria@teste.com', '28/11/2023 23:48:16'),
(24, 'Login', 'brenda', 'otaria@teste.com', '28/11/2023 23:51:56'),
(25, 'Logout', 'brenda', 'otaria@teste.com', '30/11/2023 22:01:57'),
(26, 'Logout', '', '', '30/11/2023 22:02:10'),
(27, 'Login', 'brenda', 'otaria@teste.com', '30/11/2023 22:02:14'),
(28, 'Logout', 'brenda', 'otaria@teste.com', '30/11/2023 22:05:41'),
(29, 'Login', 'brenda', 'otaria@teste.com', '30/11/2023 22:46:01'),
(30, 'Logout', 'brenda', 'otaria@teste.com', '30/11/2023 22:49:26'),
(31, 'Login', 'Teste Teste Teste ', 'teste@teste.teste', '30/11/2023 23:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`) VALUES
(1, 'Qual o nome da sua mãe?'),
(2, 'Qual a sua data de nascimento?'),
(3, 'Qual o cep do seu endereço?');

-- --------------------------------------------------------

--
-- Table structure for table `perguntas_usuarios`
--

CREATE TABLE `perguntas_usuarios` (
  `id_pergunta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perguntas_usuarios`
--

INSERT INTO `perguntas_usuarios` (`id_pergunta`, `id_usuario`, `resposta`) VALUES
(1, 3, 'não sei'),
(2, 3, 'não sei'),
(3, 3, 'não sei'),
(1, 6, 'hummmm'),
(2, 6, 'sei'),
(3, 6, 'lá');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID_CLI` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `permissao` varchar(20) NOT NULL DEFAULT 'cliente',
  `dt_nascimento` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `nome_materno` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `tel_celular` varchar(100) NOT NULL,
  `tel_fixo` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID_CLI`, `nome`, `email`, `senha`, `permissao`, `dt_nascimento`, `sexo`, `nome_materno`, `cpf`, `tel_celular`, `tel_fixo`, `endereco`, `complemento`, `cep`) VALUES
(3, 'brenda', 'otaria@teste.com', '123', 'admin', '', '', '', '', '', '', '', '', ''),
(4, 'b', 'b', '', 'cliente', '', '', '', '', '', '', '', '', ''),
(5, 'c', 'a@g.c', '123', 'cliente', '', '', '', '', '', '', '', '', ''),
(6, 'will smith', 'will@email.com', '123', 'cliente', '', '', '', '', '', '', '', '', ''),
(8, 'a', 'a', '', 'cliente', '', '', '', '', '', '', '', '', ''),
(10, 'Teste Teste Teste ', 'teste@teste.teste', '12345678', 'cliente', '2023-11-30', 'masculino', 'Teste Teste Teste', '14563225282', '21991028946', '21991028946', 'Teste', 'teste', '21555020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_CLI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_CLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
