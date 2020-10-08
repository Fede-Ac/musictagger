-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2020 a las 17:20:20
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `musictagger`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `IDalbum` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `anio` int(4) DEFAULT NULL,
  `discografica` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `album`
--

TRUNCATE TABLE `album`;
--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`IDalbum`, `nombre`, `anio`, `discografica`) VALUES
(1, 'YHLQMDLG', 2020, ''),
(3, 'SADASDSADGFDBCV', 2018, ''),
(11, 'dfds', 21321, 'sdadsa'),
(12, 'Faded', 2015, NULL),
(13, 'Faded', 2015, NULL),
(14, 'Alone', 2016, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna`
--

CREATE TABLE `asigna` (
  `idUsuario` int(10) NOT NULL,
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `asigna`
--

TRUNCATE TABLE `asigna`;
--
-- Volcado de datos para la tabla `asigna`
--

INSERT INTO `asigna` (`idUsuario`, `IDetiqueta`) VALUES
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `IDautor` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `autor`
--

TRUNCATE TABLE `autor`;
--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`IDautor`, `nombre`) VALUES
(1, 'Pedro'),
(2, 'arjona'),
(3, 'Elvis Presley'),
(4, 'John Lennon'),
(5, 'Shakira'),
(6, 'Beyoncé'),
(7, 'Michael Jackson'),
(20, 'Marshmello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `linkLetra` varchar(150) DEFAULT NULL,
  `linkVideo` varchar(150) DEFAULT NULL,
  `linkSpotify` varchar(150) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cancion`
--

TRUNCATE TABLE `cancion`;
--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`IDcancion`, `IDautor`, `titulo`, `linkLetra`, `linkVideo`, `linkSpotify`, `updated_at`, `created_at`) VALUES
(77, 20, 'Alone', 'https://www.musica.com/letras.asp?letra=2281351', 'https://www.youtube.com/watch?v=ALZHF5UqnU4', 'https://open.spotify.com/album/7ePC9qS9mSOTY9E0YPP6yg?highlight=spotify:track:3MEYFivt6bilQ9q9mFWZ4g', '2020-10-03 16:05:09', '2020-10-03 16:05:09'),
(78, 5, 'cancion test', NULL, NULL, NULL, '2020-10-03 16:06:17', '2020-10-03 16:06:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `IDlista` int(6) NOT NULL,
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `IDalbum` int(6) NOT NULL,
  `IDgenero` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `contiene`
--

TRUNCATE TABLE `contiene`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea`
--

CREATE TABLE `crea` (
  `IDlista` int(6) NOT NULL,
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `crea`
--

TRUNCATE TABLE `crea`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `IDetiqueta` int(6) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `etiqueta`
--

TRUNCATE TABLE `etiqueta`;
--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`IDetiqueta`, `descripcion`) VALUES
(1, 'Infantil'),
(4, 'Ofensiva'),
(5, 'Contenido explicito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_lugar`
--

CREATE TABLE `etiqueta_lugar` (
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `etiqueta_lugar`
--

TRUNCATE TABLE `etiqueta_lugar`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_otro`
--

CREATE TABLE `etiqueta_otro` (
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `etiqueta_otro`
--

TRUNCATE TABLE `etiqueta_otro`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_publico`
--

CREATE TABLE `etiqueta_publico` (
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `etiqueta_publico`
--

TRUNCATE TABLE `etiqueta_publico`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IDgenero` int(6) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `genero`
--

TRUNCATE TABLE `genero`;
--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IDgenero`, `descripcion`) VALUES
(1, 'Rock'),
(2, 'POP'),
(3, 'Reggeton'),
(4, 'Electrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integra`
--

CREATE TABLE `integra` (
  `idUsuario` int(10) NOT NULL,
  `IDetiqueta` int(6) NOT NULL,
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `IDalbum` int(6) NOT NULL,
  `IDgenero` int(6) NOT NULL,
  `cantidad` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `integra`
--

TRUNCATE TABLE `integra`;
--
-- Volcado de datos para la tabla `integra`
--

INSERT INTO `integra` (`idUsuario`, `IDetiqueta`, `IDcancion`, `IDautor`, `IDalbum`, `IDgenero`, `cantidad`) VALUES
(5, 5, 77, 20, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interpreta`
--

CREATE TABLE `interpreta` (
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `interpreta`
--

TRUNCATE TABLE `interpreta`;
--
-- Volcado de datos para la tabla `interpreta`
--

INSERT INTO `interpreta` (`IDcancion`, `IDautor`) VALUES
(77, 20),
(78, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `IDlista` int(6) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `publica` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `lista`
--

TRUNCATE TABLE `lista`;
--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`IDlista`, `idUsuario`, `descripcion`, `publica`) VALUES
(3, 4, 'Lista de prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modifica`
--

CREATE TABLE `modifica` (
  `idUsuario` int(10) NOT NULL,
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `IDalbum` int(6) NOT NULL,
  `IDgenero` int(6) NOT NULL,
  `fechaSugerencia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tabla` varchar(30) NOT NULL,
  `campo` varchar(30) NOT NULL,
  `valor` varchar(150) NOT NULL,
  `autorizado` tinyint(1) DEFAULT 0,
  `fechaRevision` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuarioRevisor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `modifica`
--

TRUNCATE TABLE `modifica`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

CREATE TABLE `pertenece` (
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `IDalbum` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `pertenece`
--

TRUNCATE TABLE `pertenece`;
--
-- Volcado de datos para la tabla `pertenece`
--

INSERT INTO `pertenece` (`IDcancion`, `IDautor`, `IDalbum`) VALUES
(77, 20, 1),
(78, 5, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue`
--

CREATE TABLE `sigue` (
  `IDsigue` int(10) NOT NULL,
  `IDseguido` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `sigue`
--

TRUNCATE TABLE `sigue`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `IDalbum` int(6) NOT NULL,
  `IDgenero` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `tiene`
--

TRUNCATE TABLE `tiene`;
--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`IDcancion`, `IDautor`, `IDalbum`, `IDgenero`) VALUES
(77, 20, 1, 4),
(78, 5, 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `users`
--

TRUNCATE TABLE `users`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaNac` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `usuario`
--

TRUNCATE TABLE `usuario`;
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `nombre`, `fechaNac`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES
(3, 'jose@gmail.com', 'jose', '2020-07-31', '$2y$10$sYKYRXHOZf3VFs0uhZ2HnuQ99.xB5dRk66yGw9mGhVKc7SvAkK482', 'XAl0jj67zlSlL7hBV9Rf1xkbmzX2RbSzqjFv1pI5DPPe7RsnYwZaLi8oT2l1', '2020-08-14 20:42:20', '2020-08-14 20:42:20'),
(4, 'soledad@gmail.com', 'soledad', '2020-08-02', '$2y$10$PXi306pMBJddyABSC9e/LerxKszc3FsHxAtVCQYa6RXTAh7sr9Iiq', 'UBA4CJvIOCPkZKpIVqOCUW4hxUCxNBMr7XWtfOB8M4ELJDoTPvOVWnStAdhW', '2020-08-14 21:02:51', '2020-08-14 21:02:51'),
(5, 'pedro@gmail.com', 'Pedro', '2020-04-03', '$2y$10$dvASeZzllPa9Fm99PumCwOYWOZBh0GTz/.6LIno7emFJQNQ4p192S', 'OQaXSLRpBtT8u7gAx3bpN2y9wqCvbD8WfxP7bYC9uqSAjuIdgmdDVxUPMBta', '2020-08-20 07:23:50', '2020-08-20 06:52:01'),
(6, 'alejandra2@gmail.com', 'alejandra dominguez', '2020-06-05', '$2y$10$FhA2NYNzTjehg45SuzF6wO0EUARIWmn81qn7EMhOe3WtHV9Q4xp5a', 'GmQrSQZpg8IN5mmboSOZsBCvsZasAIGU5cWw8ye5TkvDRTj1nfKVcJTt7koH', '2020-08-26 21:08:37', '2020-08-26 21:05:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_administrador`
--

CREATE TABLE `usuario_administrador` (
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `usuario_administrador`
--

TRUNCATE TABLE `usuario_administrador`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_colaborador`
--

CREATE TABLE `usuario_colaborador` (
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `usuario_colaborador`
--

TRUNCATE TABLE `usuario_colaborador`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_revisor`
--

CREATE TABLE `usuario_revisor` (
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `usuario_revisor`
--

TRUNCATE TABLE `usuario_revisor`;
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`IDalbum`);

--
-- Indices de la tabla `asigna`
--
ALTER TABLE `asigna`
  ADD PRIMARY KEY (`idUsuario`,`IDetiqueta`),
  ADD KEY `fk_asigna__etiqueta` (`IDetiqueta`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`IDautor`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`IDcancion`,`IDautor`),
  ADD KEY `fk_cancion__autor` (`IDautor`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`IDlista`,`IDcancion`,`IDautor`,`IDalbum`,`IDgenero`),
  ADD KEY `fk_contiene__cancion` (`IDcancion`),
  ADD KEY `fk_contiene__autor` (`IDautor`),
  ADD KEY `fk_contiene__album` (`IDalbum`),
  ADD KEY `fk_contiene__genero` (`IDgenero`);

--
-- Indices de la tabla `crea`
--
ALTER TABLE `crea`
  ADD PRIMARY KEY (`IDlista`,`idUsuario`),
  ADD KEY `fk_crea__usuario` (`idUsuario`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`IDetiqueta`);

--
-- Indices de la tabla `etiqueta_lugar`
--
ALTER TABLE `etiqueta_lugar`
  ADD PRIMARY KEY (`IDetiqueta`);

--
-- Indices de la tabla `etiqueta_otro`
--
ALTER TABLE `etiqueta_otro`
  ADD PRIMARY KEY (`IDetiqueta`);

--
-- Indices de la tabla `etiqueta_publico`
--
ALTER TABLE `etiqueta_publico`
  ADD PRIMARY KEY (`IDetiqueta`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IDgenero`);

--
-- Indices de la tabla `integra`
--
ALTER TABLE `integra`
  ADD PRIMARY KEY (`idUsuario`,`IDetiqueta`,`IDcancion`,`IDautor`,`IDalbum`,`IDgenero`),
  ADD KEY `fk_integra_etiqueta__asigna` (`IDetiqueta`),
  ADD KEY `fk_integra__cancion` (`IDcancion`),
  ADD KEY `fk_integra__autor` (`IDautor`),
  ADD KEY `fk_integra__album` (`IDalbum`),
  ADD KEY `fk_integra__genero` (`IDgenero`);

--
-- Indices de la tabla `interpreta`
--
ALTER TABLE `interpreta`
  ADD PRIMARY KEY (`IDcancion`,`IDautor`),
  ADD KEY `fk_interpreta__autor` (`IDautor`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`IDlista`,`idUsuario`),
  ADD KEY `fk_lista__usuario` (`idUsuario`);

--
-- Indices de la tabla `modifica`
--
ALTER TABLE `modifica`
  ADD PRIMARY KEY (`idUsuario`,`IDcancion`,`IDautor`,`IDalbum`,`IDgenero`),
  ADD KEY `fk_modifica__cancion` (`IDcancion`),
  ADD KEY `fk_modifica__autor` (`IDautor`),
  ADD KEY `fk_modifica__album` (`IDalbum`),
  ADD KEY `fk_genero__genero` (`IDgenero`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pertenece`
--
ALTER TABLE `pertenece`
  ADD PRIMARY KEY (`IDcancion`,`IDautor`,`IDalbum`),
  ADD KEY `fk_pertenece__autor` (`IDautor`),
  ADD KEY `fk_pertenece__album` (`IDalbum`);

--
-- Indices de la tabla `sigue`
--
ALTER TABLE `sigue`
  ADD PRIMARY KEY (`IDsigue`,`IDseguido`),
  ADD KEY `fk_sigue_seguido__usuario` (`IDseguido`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`IDcancion`,`IDautor`,`IDalbum`,`IDgenero`),
  ADD KEY `fk_tiene__autor` (`IDautor`),
  ADD KEY `fk_tiene__album` (`IDalbum`),
  ADD KEY `fk_tiene__genero` (`IDgenero`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_administrador`
--
ALTER TABLE `usuario_administrador`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_colaborador`
--
ALTER TABLE `usuario_colaborador`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_revisor`
--
ALTER TABLE `usuario_revisor`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `IDalbum` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `IDautor` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `IDcancion` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `IDetiqueta` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `IDgenero` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `IDlista` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario_administrador`
--
ALTER TABLE `usuario_administrador`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_colaborador`
--
ALTER TABLE `usuario_colaborador`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_revisor`
--
ALTER TABLE `usuario_revisor`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asigna`
--
ALTER TABLE `asigna`
  ADD CONSTRAINT `fk_asigna__etiqueta` FOREIGN KEY (`IDetiqueta`) REFERENCES `etiqueta` (`IDetiqueta`),
  ADD CONSTRAINT `fk_asigna__usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `fk_cancion__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `fk_contiene__album` FOREIGN KEY (`IDalbum`) REFERENCES `album` (`IDalbum`),
  ADD CONSTRAINT `fk_contiene__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`),
  ADD CONSTRAINT `fk_contiene__cancion` FOREIGN KEY (`IDcancion`) REFERENCES `cancion` (`IDcancion`),
  ADD CONSTRAINT `fk_contiene__genero` FOREIGN KEY (`IDgenero`) REFERENCES `genero` (`IDgenero`),
  ADD CONSTRAINT `fk_contiene__lista` FOREIGN KEY (`IDlista`) REFERENCES `lista` (`IDlista`);

--
-- Filtros para la tabla `crea`
--
ALTER TABLE `crea`
  ADD CONSTRAINT `fk_crea__lista` FOREIGN KEY (`IDlista`) REFERENCES `lista` (`IDlista`),
  ADD CONSTRAINT `fk_crea__usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `etiqueta_lugar`
--
ALTER TABLE `etiqueta_lugar`
  ADD CONSTRAINT `fk_etiqueta_lugar__etiqueta` FOREIGN KEY (`IDetiqueta`) REFERENCES `etiqueta` (`IDetiqueta`);

--
-- Filtros para la tabla `etiqueta_otro`
--
ALTER TABLE `etiqueta_otro`
  ADD CONSTRAINT `fk_etiqueta_otro__etiqueta` FOREIGN KEY (`IDetiqueta`) REFERENCES `etiqueta` (`IDetiqueta`);

--
-- Filtros para la tabla `etiqueta_publico`
--
ALTER TABLE `etiqueta_publico`
  ADD CONSTRAINT `fk_etiqueta_publico__etiqueta` FOREIGN KEY (`IDetiqueta`) REFERENCES `etiqueta` (`IDetiqueta`);

--
-- Filtros para la tabla `integra`
--
ALTER TABLE `integra`
  ADD CONSTRAINT `fk_integra__album` FOREIGN KEY (`IDalbum`) REFERENCES `album` (`IDalbum`),
  ADD CONSTRAINT `fk_integra__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`),
  ADD CONSTRAINT `fk_integra__cancion` FOREIGN KEY (`IDcancion`) REFERENCES `cancion` (`IDcancion`),
  ADD CONSTRAINT `fk_integra__genero` FOREIGN KEY (`IDgenero`) REFERENCES `genero` (`IDgenero`),
  ADD CONSTRAINT `fk_integra_etiqueta__asigna` FOREIGN KEY (`IDetiqueta`) REFERENCES `asigna` (`IDetiqueta`),
  ADD CONSTRAINT `fk_integra_idUsuario__asigna` FOREIGN KEY (`idUsuario`) REFERENCES `asigna` (`idUsuario`);

--
-- Filtros para la tabla `interpreta`
--
ALTER TABLE `interpreta`
  ADD CONSTRAINT `fk_interpreta__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`),
  ADD CONSTRAINT `fk_interpreta__cancion` FOREIGN KEY (`IDcancion`) REFERENCES `cancion` (`IDcancion`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `fk_lista__usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `modifica`
--
ALTER TABLE `modifica`
  ADD CONSTRAINT `fk_genero__genero` FOREIGN KEY (`IDgenero`) REFERENCES `genero` (`IDgenero`),
  ADD CONSTRAINT `fk_modifica__album` FOREIGN KEY (`IDalbum`) REFERENCES `album` (`IDalbum`),
  ADD CONSTRAINT `fk_modifica__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`),
  ADD CONSTRAINT `fk_modifica__cancion` FOREIGN KEY (`IDcancion`) REFERENCES `cancion` (`IDcancion`),
  ADD CONSTRAINT `fk_modifica__usuario_colaborador` FOREIGN KEY (`idUsuario`) REFERENCES `usuario_colaborador` (`idUsuario`);

--
-- Filtros para la tabla `pertenece`
--
ALTER TABLE `pertenece`
  ADD CONSTRAINT `fk_pertenece__album` FOREIGN KEY (`IDalbum`) REFERENCES `album` (`IDalbum`),
  ADD CONSTRAINT `fk_pertenece__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`),
  ADD CONSTRAINT `fk_pertenece__cancion` FOREIGN KEY (`IDcancion`) REFERENCES `cancion` (`IDcancion`);

--
-- Filtros para la tabla `sigue`
--
ALTER TABLE `sigue`
  ADD CONSTRAINT `fk_sigue_seguido__usuario` FOREIGN KEY (`IDseguido`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_sigue_sigue__usuario` FOREIGN KEY (`IDsigue`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `fk_tiene__album` FOREIGN KEY (`IDalbum`) REFERENCES `album` (`IDalbum`),
  ADD CONSTRAINT `fk_tiene__autor` FOREIGN KEY (`IDautor`) REFERENCES `autor` (`IDautor`),
  ADD CONSTRAINT `fk_tiene__cancion` FOREIGN KEY (`IDcancion`) REFERENCES `cancion` (`IDcancion`),
  ADD CONSTRAINT `fk_tiene__genero` FOREIGN KEY (`IDgenero`) REFERENCES `genero` (`IDgenero`);

--
-- Filtros para la tabla `usuario_administrador`
--
ALTER TABLE `usuario_administrador`
  ADD CONSTRAINT `fk_usuario__administrador_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario_colaborador`
--
ALTER TABLE `usuario_colaborador`
  ADD CONSTRAINT `fk_usuario_colaborador__usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario_revisor`
--
ALTER TABLE `usuario_revisor`
  ADD CONSTRAINT `fk_usuario_revisor__usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
