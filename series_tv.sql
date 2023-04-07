-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Abr-2023 às 13:51
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `series_tv`
--

DROP TABLE IF EXISTS `series_tv`;
CREATE TABLE IF NOT EXISTS `series_tv` (
  `id` int NOT NULL,
  `titulo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `canal` int NOT NULL,
  `genero` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `series_tv`
--

INSERT INTO `series_tv` (`id`, `titulo`, `canal`, `genero`) VALUES
(1, 'Mr. Robot', 23, 'Suspense tecnológico'),
(2, 'Stranger Things', 13, 'ficcao cientifica'),
(3, 'Narcos', 157, 'Crimes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
