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

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `tipo`, `usuario`, `contraseña`, `DNI`, `nombre`, `telefono`, `direccion`) VALUES
(1, 2, 'cliente1@gmail.com', 'caae655b2617405e721d27d433331d27adb871354ce6c9be45acc90866df24f4', '25481147C', 'Juan López Amunarriz', '696874123', 'C. de Lope de Vega, 4'),
(2, 2, 'cliente2@gmail.com', 'd2c1e5a11019ad30e5e19ea15ad1f0ec0ea5107159099e34c66f72d192286dda', '34875621J', 'Ana Rodríguez Limeres', '612681355', 'Pl. del Progreso, 3'),
(3, 2, 'cliente3@gmail.com', '937d7927a86d7619c9f3ac27584b726a57495e170c6c3374373a01c58169d32b', '89746531L', 'Roberto Diez Rallo', '688416221', 'C. del Amparo, 85'),
(4, 2, 'cliente4@gmail.com', 'b6a538131909740cab61b2b9c63b5a128092660d5c36f505158e174a83d45127', '74113478Z', 'Carolina Campandegui Blas', '678546277', 'C. de Sebastián Elcano, 9'),
(5, 2, 'cliente5@gmail.com', 'd737cd0a6ac7cb2807438fc74fb94c4f826b9e9112cc0eedcb130a47205c01b1', '34276013X', 'Daniel Álvarez Rodríguez', '669897147', 'Amute Auzoa 41 1º izda'),
(6, 2, 'cliente6@gmail.com', '3bd5661c09a3cf1623b252d7632cfcae7d1ad71c4ff43eafeee4578e920b15bc', '69874196O', 'Emma Legorburu Campos', '618628273', 'C. de la Batalla de Brunete, 22'),
(7, 2, 'cliente7@gmail.com', '9d7f3b710c2adf07baf829712bb1b6850eb774c6c2875b54b79f96b52d5dacb2', '74111214A', 'Francisco Silva Fernandez', '644121368', 'C. de Méndez Álvaro, 12'),
(8, 2, 'cliente8@gmail.com', '7b912061d773e3084e6e4b421060dc1df7a99568e0f34fa8760638b9ca38b32a', '87788778B', 'Gabriela Collera Gutierrez', '677174478', 'Tr.ª del Almendro, 3'),
(9, 2, 'cliente9@gmail.com', 'cd3295318a988f350c0e12cfc27ba59cf069a9c9d4c860bcf3d19a5c1fb61bb3', '12345678K', 'Hernán Cortés de Monroy', '699499299', 'C. de Mira el Río Alta, 12'),
(10, 2, 'cliente10@gmail.com', '8ae0cbf1b336987081cd7d86fd83ef02d872db9808bef06601fffd4bdb4edfc9', '87654321S', 'Elena Nito del Bosque', '666123123', 'C. Poca Sangre, 5'),
(13, 2, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '00000000L', 'test', '111111111', 'test');

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

--
-- Volcado de datos para la tabla `consejo`
--

INSERT INTO `consejo` (`idConsejo`, `titulo`, `descripcion`, `img`) VALUES
(1, 'TITULO DEL CONSEJO', 'ESTO ES UNA DESCRIPCIÓN DE PRUEBA PARA EL APARTADO DE CONSEJOS DE CONTROLPAW', 'https://i.imgur.com/Hh6Mayx.jpeg'),
(2, 'TITULO TEST2', 'ESTO ES UNA DESCRIPCIÓN DE PRUEBA PARA EL APARTADO DE CONSEJOS DE CONTROLPAW 2', ''),
(7, 'a', 'a', ''),
(8, 'prueba', 'prueba', 'https://i.imgur.com/dbqTF54.png');

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

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `titulo`, `idMascota`, `fecha`) VALUES
(3, 'Chequeo anual', 5, '2024-03-10'),
(4, 'Desparasitación', 2, '2024-03-12'),
(5, 'Revisión de salud', 9, '2024-03-15'),
(6, 'Vacunación', 7, '2024-03-18'),
(7, 'Control de peso', 1, '2024-06-01'),
(8, 'Chequeo anual', 6, '2024-03-22'),
(9, 'Desparasitación', 10, '2024-03-25'),
(10, 'Revisión de salud', 4, '2024-03-28'),
(11, 'Vacunación', 8, '2024-04-05'),
(12, 'Control de peso', 3, '2024-04-08'),
(13, 'Chequeo anual', 6, '2024-04-10'),
(14, 'Desparasitación', 2, '2024-04-12'),
(15, 'Revisión de salud', 9, '2024-04-15'),
(16, 'Vacunación', 5, '2024-04-18'),
(17, 'Control de peso', 4, '2024-04-20'),
(18, 'Chequeo anual', 7, '2024-04-22'),
(19, 'Desparasitación', 1, '2024-04-25'),
(20, 'Revisión de salud', 10, '2024-04-28'),
(24, 'prueba', 10, '2024-12-12'),
(25, 'test', 4, '2024-12-12');

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

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `tipo`, `usuario`, `contraseña`, `numeroColegiado`, `nombre`) VALUES
(1, 1, 'veterinario1@controlpaw.com', '9be4ab6ebee3e8c1b6abf69f683ef94ee8aad80417bb2d37fa0da890cdf3dbc5', '331547', 'Aitor'),
(2, 1, 'veterinario2@controlpaw.com', '419b46491a6ea8c857790bb94f5ec89d354ffec7a496df3247f95997db8dad36', '225897', 'Elena'),
(3, 1, 'veterinario3@controlpaw.com', 'd95d4ad25a67a5b199d9ec4cc66c78b8987a7d6612546639880cb2bf51a1972b', '877221', 'Alfredo'),
(4, 1, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', 'test');

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

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`idMascota`, `nombre`, `raza`, `idDueño`, `idGenero`, `idEspecie`, `peso`, `castrado`, `fechaNacimiento`, `microchip`, `enfermedad`, `baja`) VALUES
(1, 'Spi', 'Golden Retriever', 1, 1, 1, 10, 0, '2019-05-15', '978000000000001', 0, 0),
(2, 'Pichon', 'Siamese', 2, 1, 2, 8, 0, '2020-02-20', '978000000000002', 0, 0),
(3, 'Nala', 'Labrador', 3, 2, 1, 15, 0, '2018-10-10', '978000000000003', 0, 0),
(4, 'Nicolas', 'Persian', 4, 1, 2, 7, 0, '2017-07-01', '978000000000004', 1, 0),
(5, 'Linda', 'Beagle', 5, 2, 1, 12, 0, '2023-04-07', '978000000000005', 0, 0),
(6, 'Kea', 'Maine Coon', 6, 2, 2, 9, 0, '2019-08-25', '978000000000006', 0, 0),
(7, 'Pancho', 'Siberian', 7, 1, 2, 6, 0, '2020-11-11', '978000000000007', 1, 0),
(8, 'Tribi', 'Pug', 8, 1, 1, 14, 0, '2016-04-30', '978000000000008', 0, 0),
(9, 'Patt', 'Chihuahua', 9, 2, 3, 3, 0, '2022-02-28', '978000000000009', 0, 0),
(10, 'Kennen', 'Syrian', 10, 1, 4, 1, 0, '2023-03-15', '978000000000010', 1, 0),
(11, 'prueba', 'prueba', 13, 1, 1, 20, 1, '2024-04-04', '', 0, 0);

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

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `idMascota`, `descripcion`, `fecha`, `img`) VALUES
(1, 1, 'test', '2024-06-06', 'imgur.com'),
(4, 6, 'test', '2024-05-05', 'null'),
(9, 1, 'test', '2024-12-12', NULL),
(10, 8, 'test', '2024-12-12', '');

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

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`idTratamiento`, `idMascota`, `descripcion`, `fecha`, `finalizado`) VALUES
(1, 4, 'Vacunación contra la rabia', '2024-04-03', 1),
(2, 1, 'Desparasitación interna', '2024-03-30', 0),
(3, 3, 'Control de peso', '2024-03-28', 1),
(4, 5, 'Extracción de sarro dental', '2024-03-25', 0),
(5, 7, 'Cirugía de esterilización', '2024-03-20', 1),
(6, 9, 'Tratamiento para la otitis', '2024-03-18', 1),
(7, 1, 'Revisión anual', '2024-03-15', 1),
(8, 2, 'Tratamiento para dermatitis', '2024-03-10', 1),
(9, 3, 'Radiografía de control', '2024-03-08', 1),
(10, 1, 'Cirugía de fractura', '2024-03-05', 1),
(11, 6, 'Control de diabetes', '2024-03-01', 1),
(12, 7, 'Tratamiento para la artritis', '2024-02-28', 1),
(13, 8, 'Vacunación múltiple', '2024-02-25', 1),
(14, 9, 'Desparasitación externa', '2024-02-20', 1),
(15, 10, 'Control de presión arterial', '2024-02-18', 1),
(27, 6, 'test', '2024-12-12', 0);

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
