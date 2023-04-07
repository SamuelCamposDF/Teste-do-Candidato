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
-- Estrutura da tabela `series_tv_intervalos`
--

DROP TABLE IF EXISTS `series_tv_intervalos`;
CREATE TABLE IF NOT EXISTS `series_tv_intervalos` (
  `id` int NOT NULL,
  `id_serie_tv` int NOT NULL,
  `dia_da_semana` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `horario` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `series_tv_intervalos`
--

INSERT INTO `series_tv_intervalos` (`id`, `id_serie_tv`, `dia_da_semana`, `horario`) VALUES
(1, 1, 'Sabado', '2023-06-01 22:00:00'),
(2, 2, 'Quarta feira', '2023-04-07 09:00:00'),
(3, 3, 'Domingo', '2023-04-08 22:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
