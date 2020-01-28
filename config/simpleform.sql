-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jan-2020 às 06:12
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasklist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `simpleform`
--

CREATE TABLE `simpleform` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `anexo` text NOT NULL,
  `ip` varchar(30) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `simpleform`
--

INSERT INTO `simpleform` (`id`, `nome`, `email`, `telefone`, `mensagem`, `anexo`, `ip`, `data`) VALUES
(2, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaaaaaa', 'dXBsb2Fkcy8yNzAxMjAxMTQ5MTM3NzYxMDc5NjkudHh0', '::1', '2020-01-27 23:49:13'),
(3, 'Maria Madalena Soares', 'bWFyaWEyQG1hcmlhLmNvbQ==', 'KDQ3KSA5OTg2Ny04ODk5', 'Em anexo envio meu arquivo txt.', 'dXBsb2Fkcy8yODAxMjAwMTU1MjIyNTI1MzkxODAudHh0', '::1', '2020-01-28 01:55:22'),
(4, 'Maria Madalena Soares', 'bWFyaWEyQG1hcmlhLmNvbQ==', 'KDQ3KSA5OTg2Ny04ODk5', 'Em anexo envio meu arquivo txt.', 'dXBsb2Fkcy8yODAxMjAwMTU5NTQ4MjY3OTAwNTMudHh0', '::1', '2020-01-28 01:59:54'),
(5, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDQyKSA5OTk5OS05OTk5', 'aaaaaaaaaaa', 'dXBsb2Fkcy8yODAxMjAwMjAyNDQxNTA3NTA1ODEzLnR4dA==', '::1', '2020-01-28 02:02:44'),
(6, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDQyKSA5OTk5OS05OTk5', 'aaaaaaaaaaa', 'dXBsb2Fkcy8yODAxMjAwMjA1NTYxMzk4MzY2ODAwLnR4dA==', '::1', '2020-01-28 02:05:56'),
(7, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaaaa', 'dXBsb2Fkcy8yODAxMjAwMjEyMzg3MzEzOTk4MzgudHh0', '::1', '2020-01-28 02:12:38'),
(8, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaaaa', 'dXBsb2Fkcy8yODAxMjAwMjEzMzQxNDkwMzAxMDM4LnR4dA==', '::1', '2020-01-28 02:13:34'),
(9, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaaaa', 'dXBsb2Fkcy8yODAxMjAwMjE2NTExNTkwMDI4NDQwLnR4dA==', '::1', '2020-01-28 02:16:51'),
(10, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaa', 'dXBsb2Fkcy8yODAxMjAwMjE5MTM4MzMxOTkzMjgudHh0', '::1', '2020-01-28 02:19:13'),
(11, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaa', 'dXBsb2Fkcy8yODAxMjAwMjI4MjMxMDk3ODY1ODM2LnR4dA==', '::1', '2020-01-28 02:28:23'),
(12, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaa', 'dXBsb2Fkcy8yODAxMjAwMjUwMjgxODMxMTgxODMxLnR4dA==', '::1', '2020-01-28 02:50:28'),
(13, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaa', 'dXBsb2Fkcy8yODAxMjAwMzA1NDQ0NDIwNTg3NDMudHh0', '::1', '2020-01-28 03:05:44'),
(14, 'Rafael Orlando Mendes', 'cmFmYW9ybGFuZG8zQGdtYWlsLmNvbQ==', 'KDUzKSA5ODQ1Mi00MTg1', 'aaaa', 'dXBsb2Fkcy8yODAxMjAwMzA2NDkxMjE4Mzk3NTI4LnR4dA==', '::1', '2020-01-28 03:06:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simpleform`
--
ALTER TABLE `simpleform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `simpleform`
--
ALTER TABLE `simpleform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
