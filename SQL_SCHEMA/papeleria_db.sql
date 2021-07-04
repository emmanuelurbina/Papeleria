-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-07-2021 a las 20:49:16
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria_db`
--
CREATE DATABASE IF NOT EXISTS `papeleria_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `papeleria_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `sku` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Almacena los productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sell_product`
--

CREATE TABLE IF NOT EXISTS `sell_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PRODUCTSELL` (`id_product`),
  KEY `FK_TICKETSELL` (`id_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Producto vendido con relaciona ticket de venta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sell_ticket`
--

CREATE TABLE IF NOT EXISTS `sell_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_open` date NOT NULL,
  `time_open` time NOT NULL,
  `date_closed` date NOT NULL,
  `time_closed` time NOT NULL,
  `pay_method` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'efectivo',
  `total_selled` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Ticket de venta ';

--
-- Restricciones para tablas volcadas
--

ALTER TABLE `products` CHANGE `supplier` `supplier` INT NOT NULL DEFAULT '1';
--
-- Filtros para la tabla `sell_product`
--
ALTER TABLE `sell_product`
  ADD CONSTRAINT `FK_PRODUCTSELL` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TICKETSELL` FOREIGN KEY (`id_ticket`) REFERENCES `sell_ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
