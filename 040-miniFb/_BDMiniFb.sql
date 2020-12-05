-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2020 a las 13:20:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `MiniFb`
--
CREATE DATABASE IF NOT EXISTS `MiniFb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `MiniFb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
                           `id` int(11) NOT NULL,
                           `identificador` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
                           `contrasenna` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
                           `codigoCookie` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
                           `tipoUsuario` int(11) NOT NULL,
                           `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
                           `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `identificador`, `contrasenna`, `codigoCookie`, `tipoUsuario`, `nombre`, `apellidos`) VALUES
(1, 'jlopez', 'j', NULL, 0, 'José', 'López'),
(2, 'mgarcia', 'm', NULL, 0, 'María', 'García'),
(3, 'fpi', 'f', NULL, 0, 'Felipe', 'Pi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `identificador` (`identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;