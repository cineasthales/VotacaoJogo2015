-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2015 às 16:22
-- Versão do servidor: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `estudio` varchar(50) NOT NULL,
  `produtora` varchar(50) NOT NULL,
  `plataformas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `titulo`, `estudio`, `produtora`, `plataformas`) VALUES
(1, 'Super Mario Maker', 'Nintendo R&D', 'Nintendo', 'Wii U'),
(2, 'Bloodborne', 'From Software', 'Sony Computer Entertainment', 'Playstation 4'),
(3, 'The Witcher 3: Wild Hunt', 'CD Projekt RED', 'WB Games', 'PC, Playstation 4, Xbox One'),
(4, 'Splatoon', 'Nintendo R&D', 'Nintendo', 'Wii U'),
(5, 'Until Dawn', 'Supermassive Games', 'Sony Computer Entertainment', 'Playstation 4'),
(6, 'Rise of the Tomb Raider', 'Crystal Dynamics', 'Square Enix', 'Xbox One'),
(7, 'Halo 5: Guardians', '343 Industries', 'Microsoft Studios', 'Xbox One'),
(8, 'Fallout 4', 'Bethesda Game Studios', 'Bethesda Softworks', 'PC, Playstation 4, Xbox One'),
(9, 'Xenoblade Chronicles X', 'Monolith Soft', 'Nintendo', 'Wii U'),
(10, 'Star Wars Battefront', 'Dice', 'EA', 'PC, Playstation 4, Xbox One'),
(11, 'Chroma Squad', 'Behold Studios', 'Behold Studios', 'PC'),
(12, 'Hotline Miami 2: Wrong Number', 'Dennaton Games ', 'Devolver Digital', 'PC, Playstation 4, Playstation 3, Playstation Vita, Android ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'João', 'joao@joao.com', '3dfcab79ed21fd89c9eb25e9864a6155');

-- --------------------------------------------------------

--
-- Estrutura da tabela `votantes`
--

CREATE TABLE `votantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jogo_id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `votantes`
--

INSERT INTO `votantes` (`id`, `nome`, `email`, `jogo_id`, `data`) VALUES
(1, 'Pedro', 'pedro@gmail.com', 3, '0000-00-00 00:00:00'),
(2, 'Luis', 'luis@gmail.com', 2, '0000-00-00 00:00:00'),
(3, 'Carlos', 'carlos@gmail.com', 2, '0000-00-00 00:00:00'),
(4, 'Ana', 'ana@gmail.com', 1, '2015-11-21 00:00:00'),
(5, 'Maria', 'maria@gmail.com', 4, '2015-11-21 08:46:16'),
(8, 'Fernanda', 'fernanda@gmail.com', 11, '2015-11-21 09:41:04'),
(9, 'Fernando', 'fernando@gmail.com', 1, '2015-11-21 09:41:42'),
(10, 'Amanda', 'amanda@gmail.com', 1, '2015-11-21 09:42:14'),
(11, 'Carolina', 'carolina@gmail.com', 8, '2015-11-21 09:43:13'),
(12, 'Barbara', 'barbara@gmail.com', 1, '2015-11-21 10:14:30'),
(13, 'Felipe', 'felipe@gmail.com', 8, '2015-11-21 13:20:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `votantes`
--
ALTER TABLE `votantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
