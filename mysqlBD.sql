-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2015 a las 03:40:50
-- Versión del servidor: 10.0.20-MariaDB-1~jessie-log
-- Versión de PHP: 5.6.7-1

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

CREATE TABLE IF NOT EXISTS `AlumnoResponsable` (
`alumno_responsable` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idResponsable` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AlumnoResponsable`
--

INSERT INTO `AlumnoResponsable` (`alumno_responsable`, `idAlumno`, `idResponsable`) VALUES
(1, 3, 1),
(2, 4, 1),
(6, 2, 1),
(8, 5, 2),
(19, 9, 1),
(20, 8, 1),
(21, 1, 2),
(22, 10, 1),
(27, 11, 2),
(29, 12, 1),
(30, 2, 4),
(31, 13, 1),
(32, 14, 2),
(33, 15, 1),
(34, 15, 2),
(35, 13, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE IF NOT EXISTS `Alumnos` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Alumnos`
--

INSERT INTO `Alumnos` (`id`, `numeroDoc`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `mail`, `direccion`, `latitud`, `longitud`, `fechaIngreso`, `fechaEgreso`, `fechaAlta`, `eliminado`) VALUES
(1, 3243, 'oscaad ', 'osacars', '2015-09-10', 'femenino', 'pruebaar@yao.com', '32 13 14', 0, 0, '2015-09-01', '2015-09-03', '2015-09-10', 1),
(2, 54546521, 'nimbre', 'kdfmknbjle', '2015-10-10', 'Masculino', 'nmbre@irfeld.com', 'fjdsafkvl', 0, 0, '2015-10-01', '2015-10-29', '2015-10-13', 1),
(3, 12131415, 'mauro', 'maruapeli', '2015-10-09', 'Masculino', 'mauro@algo.com', 'marudirec', 0, 0, '2015-10-02', '2015-10-02', '2015-10-14', 1),
(4, 54235432, 'santi', 'fkgjfgkfmh', '2015-10-09', 'Masculino', 'santi@algi.com', 'fgfjhjgugidk', 0, 0, '2015-10-23', '2015-10-20', '2015-10-14', 1),
(5, 123124, 'asdasd', 'asdasd', '2015-10-21', 'Masculino', 'asdasd@sdasd', 'qwe qwe ', 0, 0, '2015-10-07', '2015-10-14', '2015-10-14', 1),
(6, 38549356, 'dante', 'prueba', '2015-10-08', 'Masculino', 'dante@pruba.com', 'madakfa', 0, 0, '2015-10-02', '2015-10-30', '2015-10-17', 1),
(7, 1412145321, 'asdsadasd asdf asd adsf', 'sdfasd sda fasd', '2015-10-17', 'Masculino', 'agus@askdah', 'asdfsf ad sfdasf sdfasd', 0, 0, '2015-10-01', '2015-10-09', '2015-10-17', 1),
(8, 6656, 'Gabriel', 'saluditos', '2015-10-09', 'Masculino', 'marina_96@gmail.com', 'calle 55  entre 12 y 13  1128', 0, 0, '2015-10-10', '2015-10-02', '2015-10-17', 1),
(9, 123123413, 'casittaaa adsf ads', 'dsf sdads f', '2015-10-17', 'Masculino', 'agustin_deluca@hotmail.com', 'calle 8 1335', 0, 0, '2015-10-09', '2015-10-17', '2015-10-18', 1),
(10, 21351231, 'agusttin', 'de llucaa', '2015-10-19', 'Masculino', 'agustin@hotmai.com', 'ewr q r qwe', 0, 0, '2015-10-19', '2015-10-19', '2015-10-19', 1),
(11, 888, 'algo', 'a', '2015-10-07', 'masculino', 'a@A.com', '4', 0, 0, '2015-10-07', '2015-10-01', '2015-10-20', 1),
(12, 123123123, 'mati', 'jr', '2015-10-06', 'Masculino', 'alumno@mail.com', '123123123', 0, 0, '2015-10-21', '2015-10-22', '2015-10-24', 1),
(13, 11221122, 'antonio', 'gasalla', '2015-12-06', 'Masculino', 'antoga@salla.com', '1034, 47, La Plata, Partido de La Plata, Buenos Aires, 1900, Argentina', -34.9211, -57.9609, '2015-12-03', '2015-12-30', '2015-12-08', 0),
(14, 4354524, 'recorrido', 'super', '2015-12-30', 'Masculino', 'super@reco.com', '1101, 14, La Plata, Partido de La Plata, Buenos Aires, 1900, Argentina', -34.9239, -57.9537, '2015-12-23', '2015-12-29', '2015-12-08', 0),
(15, 34573465, 'agustt', 'de lucaa', '2015-12-19', 'Masculino', 'agus@agus', 'Av. 1, La Plata, Partido de La Plata, Bs. As., B1900BHB, Argentina', -34.9157, -57.9346, '2015-12-25', '2015-12-04', '2015-12-08', 0),
(16, 123421412, 'agustin ', 'de luca', '2015-12-01', 'Masculino', 'agustin_deluca@hotmail.com', '1159, Av. 13, La Plata, Partido de La Plata, Bs. As., B1900BHB, Argentina', -34.9236, -57.9515, '2015-12-02', '2015-12-16', '2015-12-14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Configuracion`
--

CREATE TABLE IF NOT EXISTS `Configuracion` (
`clave` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `titulo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mailContacto` text NOT NULL,
  `cantElem` int(11) NOT NULL,
  `habilitada` tinyint(1) NOT NULL DEFAULT '1',
  `textoDeshab` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Configuracion`
--

INSERT INTO `Configuracion` (`clave`, `descripcion`, `titulo`, `mailContacto`, `cantElem`, `habilitada`, `textoDeshab`) VALUES
(1, 'La Escuela es una Dependencia de la Presidencia de la Universidad. Los actos resolutivos que exceden la competencia de la Direccion de la Escuela, son refrendados por el Presidente de la Universidad. Dentro de la Secretaria de Asuntos Academicos de la Universidad, la Prosecretaria asesora a la Presidencia en los temas relacionados a la enseranza preuniversitaria.\r\nEl CEMYP (Consejo de Enseranza Media y Primaria), dependiente del Consejo Superior y supervisado por su Comision de Enseranza, fue creado con la finalidad de asegurar el cumplimiento de los objetivos establecidos, estudiando, estableciendo y perfeccionando la coordinacin de los ciclos primario, medio y superior en procura de la unidad del proceso educativo.Lo preside el Presidente de la Comisin de Enseanza del Consejo Superior y est conformado por: un profesor de la Facultad de Humanidades y Ciencias de la Educacin, los Directores de los Colegios y docentes elegidos por sus pares en cada centro educativo. Las sesiones son coordinadas por la Prosecretara de Asuntos Acadmicos de la U.N.L.P. La Escuela participa del gobierno de la UNLP a travs de un representante docente en la Asamblea Universitaria y del Director/a, quien integra el Consejo Superior con voz y voto con un sistema rotativo de pares entre los Directores/as del Sistema de Pregrado Universitario.\r\nLa Directora de la Escuela es elegida directamente por el voto secreto de los docentes. La escuela cuenta con cuatro Departamentos: Biblioteca, de Orientacion Educativa, de Informatica y de Multimedios. Tambien cuenta con Coordinadores de Area, personal docente especializado en las disciplinas y su didctica, que coordina la tarea de los docentes, a la vez que los capacita, en las diferentes reas disciplinares, y en los distintos niveles (Coordinadores de Lengua, Matemtica, Msica, Plstica, Educacin Fsica, Ciencias Sociales, Ciencias Naturales, Ingls, Francs, Tecnologa Educativa y Talleres).\r\nLa designacin de los docentes se realiza a travs de un sistema de concurso de antecedentes y oposicin por el trmino de cuatro aos, la cual puede ser prorrogada habiendo aprobado la instancia de evaluacin correspondiente al finalizar cada perodo.\r\nLa escuela cuenta con cargos de Maestro de Grado, Maestro de Seccin, Auxiliar Docente, Preceptor y Ayudante de Clases Prcticas. El resto de las funciones se rentan con horas ctedra.\r\nLa escuela tiene una Asociacin Cooperadora de padres. Cobra una matrcula de 100 pesos por nica vez cuando los nios ingresan a la escuela y luego cuotas mensuales.', 'Escuela Graduada Joaquin V. gonzales', 'coop_escuela@live.com', 7, 1, 'mensaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuotas`
--

CREATE TABLE IF NOT EXISTS `Cuotas` (
`id` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `tipo` text NOT NULL,
  `comisionCob` int(11) NOT NULL,
  `fechaAlta` date NOT NULL,
  `eliminada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cuotas`
--

INSERT INTO `Cuotas` (`id`, `anio`, `mes`, `numero`, `monto`, `tipo`, `comisionCob`, `fechaAlta`, `eliminada`) VALUES
(1, 2013, 5, 12, 600, 'cuota', 2, '2015-09-29', 0),
(2, 2015, 1, 1, 1200, 'cuota', 2, '2015-10-08', 0),
(3, 2015, 10, 3, 100, 'cuota', 3, '2015-10-08', 0),
(4, 2015, 9, 234, 234, 'cuota', 1, '2016-02-17', 0),
(5, 2015, 8, 324234, 23423, 'cuota', 4, '2015-10-18', 0),
(6, 2015, 2, 213124, 455, 'cuota', 3, '2015-10-19', 0),
(7, 2015, 11, 3123, 32, 'cuota', 3, '2015-10-19', 0),
(8, 2015, 7, 213, 12, 'cuota', 213, '2015-10-20', 0),
(9, 2018, 12, 3213, 121, 'cuota', 12, '2015-10-20', 1),
(10, 2015, 3, 12, 5456, 'cuota', 45, '2015-10-20', 0),
(11, 2030, 1, 1, 1400, 'cuota', 12, '2015-10-24', 1),
(12, 2015, 12, 1323, 12, 'cuota', 32, '2015-10-24', 0),
(13, 2014, 12, 32, 12, 'cuota', 32, '2015-10-24', 0),
(14, 2015, 8, 654654, 150, 'matricula', 14, '2015-11-30', 0),
(15, 2015, 3, 10, 23, 'matricula', 42, '2015-11-30', 0),
(16, 2012, 6, 99999, 96, 'cuota', 1, '2015-12-14', 0),
(17, 2016, 2, 8888, 44, 'cuota', 23, '2015-12-14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Meses`
--

CREATE TABLE IF NOT EXISTS `Meses` (
`idMes` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Meses`
--

INSERT INTO `Meses` (`idMes`, `nombre`) VALUES
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

CREATE TABLE IF NOT EXISTS `Pagos` (
`id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idCuota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `becado` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `fechaActualizado` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pagos`
--

INSERT INTO `Pagos` (`id`, `idAlumno`, `idCuota`, `fecha`, `becado`, `fechaAlta`, `fechaActualizado`, `id_user`) VALUES
(210, 1, 1, '2015-10-26', 0, '2015-10-26', '2015-10-26', 10),
(211, 1, 5, '2015-10-26', 0, '2015-09-14', '2015-10-26', 10),
(212, 1, 3, '2015-09-16', 0, '2014-10-26', '2015-10-26', 10),
(213, 1, 4, '2014-10-26', 0, '2015-10-26', '2015-10-26', 10),
(214, 1, 12, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(215, 1, 7, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(216, 1, 14, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(217, 1, 8, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(218, 1, 10, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(219, 1, 15, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(220, 1, 6, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(221, 1, 2, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(222, 1, 13, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(223, 9, 12, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(224, 9, 7, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(225, 9, 3, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(226, 9, 4, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(227, 9, 5, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(228, 9, 14, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(229, 9, 8, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(230, 9, 10, '2015-12-14', 1, '2015-12-14', '2015-12-14', 10),
(231, 9, 15, '2015-12-14', 1, '2015-12-14', '2015-12-14', 10),
(232, 9, 6, '2015-12-14', 1, '2015-12-14', '2015-12-14', 10),
(233, 9, 2, '2015-12-14', 1, '2015-12-14', '2015-12-14', 10),
(234, 9, 13, '2015-12-14', 1, '2015-12-14', '2015-12-14', 10),
(235, 9, 1, '2015-12-14', 1, '2015-12-14', '2015-12-14', 10),
(236, 13, 14, '2015-12-14', 0, '2015-12-14', '2015-12-14', 10),
(237, 13, 12, '2015-11-15', 0, '2015-11-15', '2015-11-15', 10),
(238, 14, 12, '2015-09-09', 1, '2015-09-09', '2015-09-09', 10),
(239, 14, 3, '2014-10-08', 1, '2014-10-08', '2014-10-08', 10),
(240, 14, 4, '2015-12-15', 1, '2015-12-15', '2015-12-15', 10),
(241, 15, 7, '2015-12-15', 0, '2015-12-15', '2015-12-15', 10),
(242, 15, 4, '2015-07-21', 0, '2015-07-21', '2015-07-21', 10),
(243, 15, 15, '2014-10-13', 1, '2014-10-13', '2014-10-13', 10),
(244, 15, 6, '2014-09-23', 1, '2014-09-23', '2014-09-23', 10),
(245, 15, 13, '2015-01-20', 1, '2015-01-20', '2015-01-20', 10),
(246, 16, 10, '2015-12-15', 0, '2015-12-15', '2015-12-15', 10),
(247, 16, 6, '2015-05-06', 0, '2015-05-06', '2015-05-06', 10),
(248, 16, 13, '2015-01-15', 0, '2015-01-15', '2015-01-15', 10),
(249, 16, 2, '2015-12-15', 1, '2015-12-15', '2015-12-15', 10),
(250, 16, 1, '2015-12-15', 1, '2015-12-15', '2015-12-15', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Responsables`
--

CREATE TABLE IF NOT EXISTS `Responsables` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Responsables`
--

INSERT INTO `Responsables` (`id`, `tipo`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `mail`, `telefono`, `direccion`, `eliminado`) VALUES
(1, 'padre', 'jose maria', 'de luca', '2015-09-16', 'masculino', 'jose@jose', 123241231, 'asdaasd', 0),
(2, 'Padre', 'respon', 'fkdjtrkl', '2015-10-15', 'Masculino', 'respo@algo.com', 5632345, 'mirdiecion', 0),
(3, 'Madre', 'a', 'f', '2015-10-01', 'Masculino', 'a@a', 4, 'a', 0),
(4, 'Padre', 'fede', 'sarasa', '2004-06-09', 'Masculino', 'padre@mail.com', 123123123, '123 123', 0),
(5, 'Padre', 'mateo', ' de luca', '2015-12-05', 'Masculino', 'agustin_deluca@hotmail.com', 123124125, 'calle 8 1335', 0),
(6, 'Madre', 'jaime ', 'matarazo', '2015-12-10', 'Masculino', 'asda@sfsdaf', 123112341, 'sadasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UsuarioResponsable`
--

CREATE TABLE IF NOT EXISTS `UsuarioResponsable` (
  `idusuario` int(11) NOT NULL,
  `idresponsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `UsuarioResponsable`
--

INSERT INTO `UsuarioResponsable` (`idusuario`, `idresponsable`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT '1',
  `rol` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `username`, `password`, `habilitado`, `rol`) VALUES
(1, 'agus', '123', 1, 'administracion'),
(3, 'pepe', '123', 1, 'consulta'),
(10, 'mauri', '123', 1, 'gestion'),
(11, 'tute', '123', 1, 'administracion'),
(12, 'jaime', '123', 1, 'consulta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AlumnoResponsable`
--
ALTER TABLE `AlumnoResponsable`
 ADD PRIMARY KEY (`alumno_responsable`), ADD KEY `idAlumno` (`idAlumno`), ADD KEY `idResponsable` (`idResponsable`);

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
 ADD PRIMARY KEY (`idMes`);

--
-- Indices de la tabla `Pagos`
--
ALTER TABLE `Pagos`
 ADD PRIMARY KEY (`id`), ADD KEY `idAlumno` (`idAlumno`,`idCuota`), ADD KEY `idCuota` (`idCuota`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `Responsables`
--
ALTER TABLE `Responsables`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `UsuarioResponsable`
--
ALTER TABLE `UsuarioResponsable`
 ADD PRIMARY KEY (`idusuario`), ADD KEY `idresponsable` (`idresponsable`);

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
MODIFY `alumno_responsable` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Cuotas`
--
ALTER TABLE `Cuotas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `Meses`
--
ALTER TABLE `Meses`
MODIFY `idMes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `Pagos`
--
ALTER TABLE `Pagos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT de la tabla `Responsables`
--
ALTER TABLE `Responsables`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AlumnoResponsable`
--
ALTER TABLE `AlumnoResponsable`
ADD CONSTRAINT `..-.-` FOREIGN KEY (`idAlumno`) REFERENCES `Alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `....` FOREIGN KEY (`idResponsable`) REFERENCES `Responsables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Pagos`
--
ALTER TABLE `Pagos`
ADD CONSTRAINT `Pagos_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `Alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Pagos_ibfk_2` FOREIGN KEY (`idCuota`) REFERENCES `Cuotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Pagos_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `UsuarioResponsable`
--
ALTER TABLE `UsuarioResponsable`
ADD CONSTRAINT `--` FOREIGN KEY (`idusuario`) REFERENCES `Usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `---` FOREIGN KEY (`idresponsable`) REFERENCES `Responsables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
