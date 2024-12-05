-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 19:06:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `nom_empresa` varchar(255) DEFAULT NULL,
  `NIT` varchar(50) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `Encargado1` varchar(100) DEFAULT NULL,
  `Correo_Encargado1` varchar(100) DEFAULT NULL,
  `Telefono_Encargado1` varchar(20) DEFAULT NULL,
  `Encargado2` varchar(100) DEFAULT NULL,
  `Correo_Encargado2` varchar(100) DEFAULT NULL,
  `Telefono_Encargado2` varchar(20) DEFAULT NULL,
  `Cod_empresa` int(11) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`nom_empresa`, `NIT`, `Direccion`, `correo`, `Encargado1`, `Correo_Encargado1`, `Telefono_Encargado1`, `Encargado2`, `Correo_Encargado2`, `Telefono_Encargado2`, `Cod_empresa`, `telefono`) VALUES
('EMPRESA1', '1026307678-3', 'CLL 80', 'EMPRESA2@emp.co', 'juan', 'juan@gmai.com', '15426', 'juan', 'DAVID@GMAI.COM', '23423523', 3, '3172883519'),
('EMPRESA2', '1026307678-2', 'CLL 80', 'EMPRESA2@emp.co', NULL, NULL, NULL, NULL, NULL, NULL, 4, '3172883519'),
('EMPRESA3', '1026307678-4', 'CLL 80', 'EMPRESA3@emp.co', NULL, NULL, NULL, NULL, NULL, NULL, 5, '3172883519'),
('Empresa4', '1026307678-14', 'CLL 80', 'EMPRESA4@emp.co', NULL, NULL, NULL, NULL, NULL, NULL, 6, '3172883519');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `cod_jefe` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
  `num_caso` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `resuelto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `Nit` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cod_empresa` int(11) DEFAULT NULL,
  `Encargado1` varchar(100) DEFAULT NULL,
  `correo_encargado1` varchar(100) DEFAULT NULL,
  `telefono_encargado1` varchar(20) DEFAULT NULL,
  `cargo_encargado1` varchar(100) DEFAULT NULL,
  `Encargado2` varchar(100) DEFAULT NULL,
  `correo_encargado2` varchar(100) DEFAULT NULL,
  `telefono_encargado2` varchar(20) DEFAULT NULL,
  `cargo_encargado2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`nombre`, `direccion`, `Nit`, `correo`, `telefono`, `cod_empresa`, `Encargado1`, `correo_encargado1`, `telefono_encargado1`, `cargo_encargado1`, `Encargado2`, `correo_encargado2`, `telefono_encargado2`, `cargo_encargado2`) VALUES
('dsadas', 'cll 81', NULL, 'Sede12@emo.co', '2122124121', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('sede1', 'cll 81', NULL, 'Sede1@emo.co', '2122124', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('sede3', 'cll 81', NULL, 'Sede21@emo.co', '2122124232', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('VIRREY', 'cll 81', NULL, 'Sede21@emo.co', '2122124232', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `documento` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` text NOT NULL,
  `confirmar_contraseña` text NOT NULL,
  `nombre` text NOT NULL,
  `rol` enum('Administrador','Instructor','Aprendiz') DEFAULT NULL,
  `tip_documento` enum('CC','TI','NIT','Pasaporte') DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`documento`, `correo`, `contraseña`, `confirmar_contraseña`, `nombre`, `rol`, `tip_documento`, `activo`) VALUES
('1026307678', 'william_saavedra@yahoo.com', '$2y$10$jYR3ANCh0BUnL1.9f/F96Ogdnbl.o/tjEqVWcp92gpRnDj19DCkbO', '', 'William Saavedra', 'Administrador', 'CC', 1),
('1026307681', 'gege@gmail.com', '$2y$10$dnNQQNLdXWTTl5zJS2vwoORqgtpI.mYeVlw7upJxYqGTlPoAf7Ble', '', 'Gerson Pineda', 'Instructor', 'CC', 1),
('10263076900', 'egelvesa@sena.edu.co', '$2y$10$FumjNWcx7JG0i1F.hdb.2eosLYA2pJH68l.ZLjm9OQ4mhkG9wXlaG', '', 'DAVID MARIN', 'Instructor', 'CC', 0),
('200000001', 'pedro.moreno@sena.co', '$2y$10$24fppwxPNxz90OcNLdbmwOcY1dXMSH4IqbTpP2Qq6Ob4.i9vxWlBu', 'contraseña456', 'Pedro Moreno', 'Instructor', 'CC', 1),
('200000002', 'carla.rivera@sena.co', '$2y$10$DNYEtqJYlD5/F6OEBNkJcu6Do4pC7QDYh7KYzECxYsj/7FZQ8dEPi', 'contraseña456', 'Carla Rivera', 'Instructor', 'CC', 1),
('200000003', 'javier.munoz@sena.co', '$2y$10$onAWTqixsLb9opm.FO88SOWupNXEJMY.lTsZ/pakeLJRtJGkYU4jO', 'contraseña456', 'Javier Muñoz', 'Instructor', 'CC', 1),
('200000004', 'mariana.soto@sena.co', '$2y$10$9ziwub/75lvuzbPivDze4.pFi0WHRWNBkGMpoxKpb8uWN.Vmppl0u', 'contraseña456', 'Mariana Soto', 'Instructor', 'CC', 1),
('200000005', 'gustavo.melendez@sena.co', '$2y$10$h08M7jqqfTUZ2g2QAeHPv.A3Z8f5SzYM8NOclKIggE4b03IcVte7e', 'contraseña456', 'Gustavo Meléndez', 'Instructor', 'CC', 1),
('200000006', 'daniela.ortiz@sena.co', '$2y$10$ILHIMeOYQqnI5ji26iukY.4vhfm2WLfMZB0JsTb5kE7Rw.EpH/kCC', 'contraseña456', 'Daniela Ortiz', 'Instructor', 'CC', 1),
('200000007', 'francisco.alejandro@sena.co', '$2y$10$FNwdISnQd5N0Qhg2t0Q3JuQi35xO0mSHWSQy5fFUHOh84ojDWc4EK', 'contraseña456', 'Francisco Alejandro', 'Instructor', 'CC', 1),
('200000008', 'patricia.carrillo@sena.co', '$2y$10$1jgMWnkqCS7RDkAkdmboJ.2GZU6N8jBxOQ4FocyMc90CwrwZx78yK', 'contraseña456', 'Patricia Carrillo', 'Instructor', 'CC', 1),
('200000009', 'oscar.salazar@sena.co', '$2y$10$zbD22Cui8IoZmadyunuS1.NAoeK2pd4Od6GAGggtFwbikXceKUA26', 'contraseña456', 'Óscar Salazar', 'Instructor', 'CC', 1),
('200000010', 'isabel.mendoza@sena.co', '$2y$10$XABkCNJgWMx6jiYGUQ.NpuVzZvGnqjiGPhMzY6C.ID7gTSp2U1otS', 'contraseña456', 'Isabel Mendoza', 'Instructor', 'CC', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`Cod_empresa`);

--
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`cod_jefe`);

--
-- Indices de la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD PRIMARY KEY (`num_caso`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `cod_empresa` (`cod_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `Cod_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pqr`
--
ALTER TABLE `pqr`
  MODIFY `num_caso` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`cod_empresa`) REFERENCES `empresas` (`Cod_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
