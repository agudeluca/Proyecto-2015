-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-12-2015 a las 13:21:17
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `grupo_10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlumnoResponsable`
--

CREATE TABLE `AlumnoResponsable` (
`alumno_responsable` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idResponsable` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `AlumnoResponsable`
--

INSERT INTO `AlumnoResponsable` (`alumno_responsable`, `idAlumno`, `idResponsable`) VALUES
(54, 41, 13),
(71, 42, 16),
(69, 43, 14),
(73, 44, 13),
(74, 45, 16),
(75, 46, 17),
(76, 47, 13),
(77, 47, 14),
(78, 48, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE `Alumnos` (
`id` int(11) NOT NULL,
  `numeroDoc` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` text NOT NULL,
  `mail` text NOT NULL,
  `direccion` text NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaEgreso` date NOT NULL,
  `fechaAlta` date NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `Alumnos`
--

INSERT INTO `Alumnos` (`id`, `numeroDoc`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `mail`, `direccion`, `latitud`, `longitud`, `fechaIngreso`, `fechaEgreso`, `fechaAlta`, `eliminado`) VALUES
(37, 33333333, 'nenemalo', 'fiiekvp', '2015-10-02', 'masculino', 'nene@algo.com', 'jfjfjfjfjfj', 0, 0, '2015-10-02', '2015-10-08', '2015-10-13', 1),
(39, 565644, 'carlosa', 'mirdirec', '2015-10-02', 'masculino', 'carlos@algo.com', 'gooemri', 0, 0, '2015-10-01', '2015-10-01', '2015-10-13', 1),
(40, 343423, 'primero', 'vfigap', '2015-10-08', 'masculino', 'primer@ffdgf.com', 'dsfsgjvi ', 0, 0, '2015-10-02', '2015-10-01', '2015-10-13', 1),
(41, 2147483647, 'dante', 'barbaba', '2015-10-08', 'masculino', 'baraba@galo.com', 'hghsafhbjk', 0, 0, '2015-10-13', '2015-10-01', '2015-10-16', 1),
(42, 4254524, 'juanes', 'capo', '2015-10-01', 'masculino', 'capo@capo.com', 'ladirecdelcapo', 0, 0, '2015-10-08', '2015-10-29', '2015-10-17', 1),
(43, 54245224, 'ruta', 'gfdhddgsh', '2015-10-02', 'Masculino', 'elmasinte@hoy.com', 'celes', 0, 0, '2015-10-15', '2015-10-16', '2015-10-17', 1),
(44, 2524, 'sgsfgsfg', 'fsgfsgfs', '2015-10-14', 'Masculino', 'sfsf@fsgfg.co', 'wtwrt', 0, 0, '2015-10-07', '2015-10-07', '2015-10-26', 1),
(45, 2132341, 'sania', 'isidro', '2015-12-10', 'Masculino', 'sani@sani.com', 'sain', 0, 0, '2015-12-16', '2015-12-17', '2015-12-03', 1),
(46, 311413373, 'juan', 'juanca', '2015-12-10', 'masculino', 'juanca@cjau.com', 'Av. 51, La Plata, Partido de La Plata, Buenos Aires, 1900, Argentina', -34.9242, -57.9589, '2015-12-07', '2015-12-23', '2015-12-03', 0),
(47, 3321234, 'carlos', 'moya', '2015-12-09', 'Masculino', 'carlos@yahoo.com', 'Av. 19, La Plata, Partido de La Plata, Buenos Aires, 1900, Argentina', -34.9132, -57.9797, '2015-12-11', '2015-12-22', '2015-12-05', 0),
(48, 54455445, 'tute', 'Moroni', '2015-12-05', 'Masculino', 'tutu@rrpp.com', 'Villa Elisa, Partido de La Plata, Buenos Aires, 1894, Argentina', -34.8702, -58.0599, '2015-12-05', '2015-12-05', '2015-12-05', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Configuracion`
--

CREATE TABLE `Configuracion` (
`clave` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `titulo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mailContacto` text NOT NULL,
  `cantElem` int(11) NOT NULL,
  `habilitada` tinyint(1) NOT NULL DEFAULT '1',
  `textoDeshab` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Configuracion`
--

INSERT INTO `Configuracion` (`clave`, `descripcion`, `titulo`, `mailContacto`, `cantElem`, `habilitada`, `textoDeshab`) VALUES
(1, 'ahdshdshdhhbhshbhqhq sdnRW SAJC ASJFS vamos que va quedando biiien sj jgkfslgfklg slgs\r\nsg\r\nsg\r\nsfgsf\r\ngsf\r\nfg\r\nsfgsfgsfgsfgsfgsfgsfgsfgsfgfgafadffafafsfsdffffffffffffsfg', 'Escuela Graduada JoaquÃ­n V. GonzÃ¡lez', 'coop_escuela_algo@live.com', 10, 1, 'Sitio en mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuotas`
--

CREATE TABLE `Cuotas` (
`id` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `tipo` text NOT NULL,
  `comisionCob` int(11) NOT NULL,
  `fechaAlta` date NOT NULL,
  `eliminada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `Cuotas`
--

INSERT INTO `Cuotas` (`id`, `anio`, `mes`, `numero`, `monto`, `tipo`, `comisionCob`, `fechaAlta`, `eliminada`) VALUES
(1, 2013, 5, 12, 12000, 'matricula', 2, '2015-09-29', 0),
(2, 2015, 1, 1, 1200, 'couta', 2, '2015-10-08', 1),
(3, 2015, 10, 2, 100, 'couta', 3, '2015-10-08', 0),
(4, 2015, 2, -1, 123122, 'couta', 5, '0000-00-00', 0),
(5, 2015, 5, -1, 9999999999, 'couta', 150, '0000-00-00', 0),
(6, 2015, 1, 3, 45, 'sarasa', 3, '0000-00-00', 0),
(7, 2015, 9, 4, -44, 'couta', 4, '0000-00-00', 0),
(8, 2015, 50, 123123, 4, 'couta', 4, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Meses`
--

CREATE TABLE `Meses` (
`id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `Meses`
--

INSERT INTO `Meses` (`id`, `nombre`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pagos`
--

CREATE TABLE `Pagos` (
`id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idCuota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `becado` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `fechaActualizado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Responsables`
--

CREATE TABLE `Responsables` (
`id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` text NOT NULL,
  `mail` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `Responsables`
--

INSERT INTO `Responsables` (`id`, `tipo`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `mail`, `telefono`, `direccion`, `eliminado`) VALUES
(13, 'Madre', 'responsa', 'dfkdsfds', '2015-10-08', 'Masculino', 'responsable@algo.com', 3434243, 'drdfjrjd', 0),
(14, 'Madre', 'colo', 'acadcrv', '2015-10-01', 'Masculino', 'colo@colo.com', 2342343, 'dkfdskf', 0),
(15, 'Madre', 'mari', 'sfsfsdfd', '2015-10-08', 'Masculino', 'mari@algo.com', 2344224, 'sfgf', 0),
(16, 'Madre', 'quico', 'quicoap', '2015-10-15', 'Masculino', 'quico@algo.com', 4232424, 'fgjfjg', 0),
(17, 'Madre', 'indu', 'indu', '2015-12-23', 'Masculino', 'indu@indu.com', 2425342, 'acanoma', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT '1',
  `rol` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `username`, `password`, `habilitado`, `rol`) VALUES
(1, 'agus', '123', 1, 'administracion'),
(14, 'responsable', 'responsable', 1, 'consulta'),
(15, 'colo', 'colo', 1, 'consulta'),
(16, 'mari', 'mari', 1, 'consulta'),
(17, 'quico', 'quico', 1, 'consulta'),
(18, 'prueba', '1234', 1, 'administracion'),
(19, 'indu', 'indu', 1, 'consulta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AlumnoResponsable`
--
ALTER TABLE `AlumnoResponsable`
 ADD PRIMARY KEY (`alumno_responsable`), ADD KEY `idAlumno` (`idAlumno`,`idResponsable`);

--
-- Indices de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
 ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `Cuotas`
--
ALTER TABLE `Cuotas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Meses`
--
ALTER TABLE `Meses`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pagos`
--
ALTER TABLE `Pagos`
 ADD PRIMARY KEY (`id`), ADD KEY `idAlumno` (`idAlumno`,`idCuota`), ADD KEY `idCuota` (`idCuota`);

--
-- Indices de la tabla `Responsables`
--
ALTER TABLE `Responsables`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `AlumnoResponsable`
--
ALTER TABLE `AlumnoResponsable`
MODIFY `alumno_responsable` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Cuotas`
--
ALTER TABLE `Cuotas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Meses`
--
ALTER TABLE `Meses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `Pagos`
--
ALTER TABLE `Pagos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Responsables`
--
ALTER TABLE `Responsables`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Pagos`
--
ALTER TABLE `Pagos`
ADD CONSTRAINT `Pagos_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `Alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Pagos_ibfk_2` FOREIGN KEY (`idCuota`) REFERENCES `Cuotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
