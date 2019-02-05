-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-12-2018 a las 22:25:22
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tolhuin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano`
--

CREATE TABLE `ano` (
  `anos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ano`
--

INSERT INTO `ano` (`anos`) VALUES
(1993),
(1994),
(1995),
(1996),
(1997),
(1998),
(1999),
(2000),
(2001),
(2002),
(2003),
(2004),
(2005),
(2006),
(2007),
(2008),
(2009),
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016),
(2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `añofiscal`
--

CREATE TABLE `añofiscal` (
  `dominio` text NOT NULL,
  `ncuota` int(11) NOT NULL,
  `fvencimiento` date NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajavehiculo`
--

CREATE TABLE `bajavehiculo` (
  `dominio` text NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `tipo` text NOT NULL,
  `año` int(11) NOT NULL,
  `falta` date NOT NULL,
  `fbaja` date NOT NULL,
  `propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baseimponible`
--

CREATE TABLE `baseimponible` (
  `valor` double NOT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotaanual`
--

CREATE TABLE `cuotaanual` (
  `dominio` text NOT NULL,
  `fcobro` date NOT NULL,
  `importe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotaimpaga`
--

CREATE TABLE `cuotaimpaga` (
  `dominio` text NOT NULL,
  `ncuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotamensual`
--

CREATE TABLE `cuotamensual` (
  `dominio` text NOT NULL,
  `ncuota` int(11) NOT NULL,
  `fcobro` date NOT NULL,
  `importe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripción`
--

CREATE TABLE `descripción` (
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `cod_marca` int(11) NOT NULL,
  `marca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`cod_marca`, `marca`) VALUES
(4, 'ALFA ROMEO'),
(79, 'AGRALE'),
(174, 'ACURA'),
(390, '3-START');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `cod_mod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`cod_mod`) VALUES
('SXZ10141');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `num` bigint(11) NOT NULL,
  `tipo` text NOT NULL,
  `nom` text NOT NULL,
  `ape` text NOT NULL,
  `domicilio` text NOT NULL,
  `localidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`num`, `tipo`, `nom`, `ape`, `domicilio`, `localidad`) VALUES
(38424348, 'Humana', 'sebastian', 'martinez', 'intevu 9 casa 5', 'rio grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `cod_tipo` int(11) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`cod_tipo`, `tipo`) VALUES
(10, 'TODO TERRENO'),
(14, 'CAMION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `nom` text NOT NULL,
  `ape` text NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `user`, `pass`, `nom`, `ape`, `tipo`) VALUES
(2, 'seba44', '60cc2a64e411c60a4a099a208c5a84afe5b2bc0e', 'sebastian', 'Martinez', 1),
(5, 'SEBAMARTINEZ', '60cc2a64e411c60a4a099a208c5a84afe5b2bc0e', 'seba', 'Martinez', 3),
(6, 'SOLECASCO', '081ec8bca9307c0ec14f9e7bd7ad2d7fda7f2a48', 'sole', 'casco', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `dominio` text NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `tipo` text NOT NULL,
  `ano` int(11) NOT NULL,
  `falta` text NOT NULL,
  `propietario` bigint(11) NOT NULL,
  `baseimponible` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`dominio`, `marca`, `modelo`, `tipo`, `ano`, `falta`, `propietario`, `baseimponible`) VALUES
('hnl202', 'AGRALE', 'SXZ10141', 'Humana', 2017, '11/12/2018', 38424348, 4000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`cod_marca`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
