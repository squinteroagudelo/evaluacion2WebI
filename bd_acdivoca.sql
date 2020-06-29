-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2020 a las 21:53:57
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_acdivoca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL,
  `CORREO` varchar(40) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `CLAVE` varchar(30) NOT NULL,
  `FECHA_REGISTRO` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `APELLIDO`, `CORREO`, `USUARIO`, `CLAVE`, `FECHA_REGISTRO`) VALUES
(1, 'Samuel Ricardo', 'Quintero Agudelo', 'rikstib@gmail.com', 'squintero18', '130', '2020-06-29 11:28:41'),
(2, 'Evelin Marcela', 'Quintero Agudelo', 'evelin@gmail.com', 'evelinjj', '7894', '2020-06-29 11:30:17'),
(3, 'Cristian Andres', 'Moreno Taborda', 'cristian@gmail.com', 'cristian01', '852', '2020-06-29 11:41:09'),
(4, 'Laura Tatiana', 'Mira Fernandez', 'laura@gmail.com', 'laura45', 'laura.1', '2020-06-29 13:21:12'),
(5, 'Jose Gabriel', 'Montes Robles', 'jose@gmail.com', 'gabo14', '753', '2020-06-29 13:22:16'),
(6, 'Lina Marcela', 'Lopera Rueda', 'linalop@gmail.com', 'lina_58', '852', '2020-06-29 13:29:18'),
(7, 'Yoselin Andrea', 'Garcia Puerta', 'yoselin@gmail.com', 'yoselinycristian', 'teamomucho', '2020-06-29 13:36:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
