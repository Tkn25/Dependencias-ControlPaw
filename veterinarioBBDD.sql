-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2024 a las 13:58:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `usuario` varchar(64) DEFAULT NULL,
  `contraseña` varchar(64) DEFAULT NULL,
  `DNI` varchar(9) DEFAULT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(96) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consejo`
--

CREATE TABLE `consejo` (
  `idConsejo` int(11) NOT NULL,
  `titulo` varchar(128) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `img` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `titulo` varchar(32) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `usuario` varchar(64) DEFAULT NULL,
  `contraseña` varchar(64) DEFAULT NULL,
  `numeroColegiado` varchar(9) DEFAULT NULL,
  `nombre` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idEspecie` int(11) NOT NULL,
  `nombre` varchar(32) DEFAULT NULL,
  `tipo` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idEspecie`, `nombre`, `tipo`) VALUES
(1, 'Perro', 'Mamífero'),
(2, 'Gato', 'Mamífero'),
(3, 'Hurón', 'Mamífero'),
(4, 'Hámster', 'Mamífero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
(1, 'Macho'),
(2, 'Hembra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `idMascota` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `idDueño` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `idEspecie` int(11) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `castrado` tinyint(1) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `microchip` varchar(15) DEFAULT NULL,
  `enfermedad` tinyint(1) DEFAULT NULL,
  `baja` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(11) NOT NULL,
  `idMascota` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `img` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `idTratamiento` int(11) NOT NULL,
  `idMascota` int(11) DEFAULT NULL,
  `descripcion` varchar(64) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `finalizado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertype`
--

CREATE TABLE `usertype` (
  `idUsertype` int(11) NOT NULL,
  `descripcion` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usertype`
--

INSERT INTO `usertype` (`idUsertype`, `descripcion`) VALUES
(1, 'Veterinario'),
(2, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `consejo`
--
ALTER TABLE `consejo`
  ADD PRIMARY KEY (`idConsejo`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `idMascota` (`idMascota`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `idEspecie` (`idEspecie`),
  ADD KEY `idDueño` (`idDueño`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`idSeguimiento`),
  ADD KEY `idMascota` (`idMascota`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`idTratamiento`),
  ADD KEY `idMascota` (`idMascota`);

--
-- Indices de la tabla `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`idUsertype`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `consejo`
--
ALTER TABLE `consejo`
  MODIFY `idConsejo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `idTratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `usertype` (`idUsertype`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascotas` (`idMascota`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `usertype` (`idUsertype`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`),
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`idDueño`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `mascotas_ibfk_3` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascotas` (`idMascota`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascotas` (`idMascota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
