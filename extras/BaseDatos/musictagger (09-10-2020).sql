-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2020 a las 22:52:32
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna`
--

CREATE TABLE `asigna` (
  `idUsuario` int(10) NOT NULL,
  `IDetiqueta` int(6) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `IDautor` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `meGusta` int(5) NOT NULL DEFAULT 0,
  `noMeGusta` int(5) NOT NULL DEFAULT 0,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea`
--

CREATE TABLE `crea` (
  `IDlista` int(6) NOT NULL,
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `IDetiqueta` int(6) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_lugar`
--

CREATE TABLE `etiqueta_lugar` (
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_otro`
--

CREATE TABLE `etiqueta_otro` (
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_publico`
--

CREATE TABLE `etiqueta_publico` (
  `IDetiqueta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IDgenero` int(6) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interpreta`
--

CREATE TABLE `interpreta` (
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `IDlista` int(6) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `visitas` int(5) NOT NULL DEFAULT 0,
  `publica` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

CREATE TABLE `pertenece` (
  `IDcancion` int(6) NOT NULL,
  `IDautor` int(6) NOT NULL,
  `IDalbum` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue`
--

CREATE TABLE `sigue` (
  `IDsigue` int(10) NOT NULL,
  `IDseguido` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `califico` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_administrador`
--

CREATE TABLE `usuario_administrador` (
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_colaborador`
--

CREATE TABLE `usuario_colaborador` (
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_revisor`
--

CREATE TABLE `usuario_revisor` (
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`idUsuario`,`IDetiqueta`,`fecha`),
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
  MODIFY `IDalbum` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `IDautor` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `IDcancion` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `IDetiqueta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `IDgenero` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `IDlista` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT;

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
