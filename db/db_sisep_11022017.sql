-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2017 a las 16:26:39
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisep`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `departamento` varchar(250) NOT NULL,
  `municipio` varchar(250) NOT NULL,
  `cargo` varchar(250) NOT NULL,
  `fkID_tipo` int(11) NOT NULL,
  `fkID_tipo_vinculacion` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL,
  `url_archivo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apropiacion_actor`
--

CREATE TABLE `apropiacion_actor` (
  `pkID` int(11) NOT NULL,
  `fkID_apropiacion` int(11) NOT NULL,
  `fkID_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apropiacion_social`
--

CREATE TABLE `apropiacion_social` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fkID_lugar` int(11) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `numero_horas` int(11) NOT NULL,
  `num_total_participantes` int(11) NOT NULL,
  `num_total_estudiantes` int(11) NOT NULL,
  `num_docentes` int(11) NOT NULL,
  `fkID_tipo` int(11) NOT NULL,
  `puntaje` tinyint(1) NOT NULL,
  `fkID_coordinador` int(11) NOT NULL,
  `fkID_tematica` int(11) NOT NULL,
  `url_archivo` varchar(250) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `pkID` int(11) NOT NULL,
  `pkID_hojaVida` int(11) DEFAULT NULL,
  `url_archivo` varchar(250) DEFAULT NULL,
  `des_archivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria`
--

CREATE TABLE `asesoria` (
  `pkID` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `logros` text NOT NULL,
  `dificultades` text NOT NULL,
  `fkID_proyecto` int(11) NOT NULL,
  `url_archivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_proyectoM`
--

CREATE TABLE `asesor_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_respuestas_p`
--

CREATE TABLE `banco_respuestas_p` (
  `pkID` int(11) NOT NULL,
  `respuestab` text CHARACTER SET utf8mb4 NOT NULL,
  `fkID_pregunta_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fkID_fase` int(11) NOT NULL,
  `evento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`pkID`, `nombre`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Coordinador'),
(4, 'Operativo'),
(5, 'Administrativo'),
(6, 'No Aplica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursosF_proyectoM`
--

CREATE TABLE `cursosF_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_cursosF` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_formacion`
--

CREATE TABLE `curso_formacion` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `objetivo` text NOT NULL,
  `intensidad` varchar(250) NOT NULL,
  `resultados` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`pkID`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlántico'),
(5, 'Bogotá'),
(6, 'Bolívar'),
(7, 'Boyacá'),
(8, 'Caldas'),
(9, 'Caquetá'),
(10, 'Casanare'),
(11, 'Cauca'),
(12, 'Cesar'),
(13, 'Chocó'),
(14, 'Córdoba'),
(15, 'Cundinamarca'),
(16, 'Guainía'),
(17, 'Guaviare'),
(18, 'Huila'),
(19, 'La Guajira'),
(20, 'Magdalena'),
(21, 'Meta'),
(22, 'Nariño'),
(23, 'Norte de Santander'),
(24, 'Putumayo'),
(25, 'Quindío'),
(26, 'Risaralda'),
(27, 'San Andrés y Providencia'),
(28, 'Santander'),
(29, 'Sucre'),
(30, 'Tolima'),
(31, 'Valle del Cauca'),
(32, 'Vaupés'),
(33, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_proyectoM`
--

CREATE TABLE `docente_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_docente`
--

CREATE TABLE `documentos_docente` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `fkID_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_infraestructura`
--

CREATE TABLE `documentos_infraestructura` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `fkID_infraestructura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proyecto`
--

CREATE TABLE `estado_proyecto` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_proyecto`
--

INSERT INTO `estado_proyecto` (`pkID`, `nombre`, `descripcion`) VALUES
(1, 'Creado', 'Creación del proyecto.'),
(2, 'Aprobado', 'Estado en el cual el proyecto cumplio con los requisitos necesarios'),
(3, 'Rechazado', 'Estado en el cual el proyecto no cumplio con los requisitos necesarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_proyectoM`
--

CREATE TABLE `estudiante_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fase`
--

INSERT INTO `fase` (`pkID`, `nombre`) VALUES
(1, 'Estar en la Onda de Ondas'),
(2, 'Las perturbaciones de las Ondas'),
(3, 'La superposición de las Ondas'),
(4, 'El diseño de las trayectorias de indagación'),
(5, 'El recorrido de las trayectorias de indagación'),
(6, 'La reflexión de las Ondas'),
(7, 'La propagación de las Ondas'),
(8, 'La conformación de comunidades de conocimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`pkID`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text,
  `fkID_grado` int(11) DEFAULT NULL,
  `fkID_institucion` int(11) NOT NULL,
  `novedades` text NOT NULL,
  `url_logo` varchar(250) NOT NULL,
  `lema` varchar(100) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_proyectoM`
--

CREATE TABLE `grupos_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_grupo` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_etnico`
--

CREATE TABLE `grupo_etnico` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_etnico`
--

INSERT INTO `grupo_etnico` (`pkID`, `nombre`) VALUES
(1, 'Puinave'),
(2, 'Sikuani'),
(3, 'Curripaco'),
(4, 'Piaroa'),
(5, 'Piapoco'),
(6, 'No Aplica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_evento`
--

CREATE TABLE `grupo_evento` (
  `pkID` int(11) NOT NULL,
  `fkID_grupo` int(11) NOT NULL,
  `fkID_evento` int(11) NOT NULL,
  `puntaje` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_formacion`
--

CREATE TABLE `grupo_formacion` (
  `pkID` int(11) NOT NULL,
  `fkID_curso` int(11) NOT NULL,
  `fkID_capacitador` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `url_archivo` varchar(250) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE `indicador` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  `fkID_tipoI` int(11) NOT NULL,
  `script` text NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraestructura`
--

CREATE TABLE `infraestructura` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fkID_sede` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `codigo_dane` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_infraestructura`
--

CREATE TABLE `institucion_infraestructura` (
  `pkID` int(11) NOT NULL,
  `fkID_institucion` int(11) NOT NULL,
  `fkID_infraestructura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_proyectoM`
--

CREATE TABLE `institucion_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_institucion` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

CREATE TABLE `linea_investigacion` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `linea_investigacion`
--

INSERT INTO `linea_investigacion` (`pkID`, `nombre`, `descripcion`) VALUES
(1, 'linea1', 'desc1'),
(2, 'linea2', 'desc2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_apropiacion`
--

CREATE TABLE `lugar_apropiacion` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lugar_apropiacion`
--

INSERT INTO `lugar_apropiacion` (`pkID`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Casa de Eventos', 'Calle 34', '23415673'),
(2, 'Hotel NN', 'Calle 45', '7839241'),
(3, 'PRUEBA LUGAR', 'kra 32 #45-2', '2334555'),
(4, 'nuevo lugar', 'eee', '333'),
(5, 'LUGARHHHH', 'JHFJVHDFJKF', '73737738838'),
(6, 'LUGAR556363673737', 'HJFHDSJDJK', '888266353'),
(7, 'lugar1111', 'dhjjdfb', '2773636'),
(8, 'erick', 'jsdjdjd', '227773'),
(9, 'opopopo', 'popo', '30294028394234'),
(10, 'weqrqwerqwe', 'qwerqwe', '5656565'),
(11, 'eeeeeeee', 'dfdffdf', '11111111111'),
(12, 'prueba_select_lugar', 'jccnsnew', '73788882'),
(13, 'prueba_finl_select', 'dggttr', '323232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `pkID` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `fkID_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`pkID`, `Nombre`, `fkID_padre`) VALUES
(13, 'usuarios', NULL),
(14, 'roles', NULL),
(15, 'proyecto_marco', NULL),
(16, 'institucion', NULL),
(17, 'infraestructura', NULL),
(18, 'actor', NULL),
(19, 'apropiacion_social', NULL),
(20, 'lugar_apropiacion', NULL),
(21, 'tematica', NULL),
(22, 'prueba', NULL),
(23, 'detalles_prueba', NULL),
(24, 'pregunta_p', NULL),
(25, 'grupo', NULL),
(26, 'docentes', NULL),
(27, 'detalles_docentes', NULL),
(28, 'detalles_docentes_materias', NULL),
(29, 'detalles_docentes_grados', NULL),
(30, 'estudiantes', NULL),
(31, 'detalles_grupo', NULL),
(32, 'proyecto', NULL),
(33, 'detalles_proyecto', NULL),
(34, 'detalles_apropiacion_social', NULL),
(35, 'detalles_proyecto_marco', NULL),
(36, 'detalles_institucion', NULL),
(37, 'detalles_infraestructura', NULL),
(38, 'detalles_grupo_estudiantes', NULL),
(39, 'detalles_grupo_docentes', NULL),
(40, 'asesoria', NULL),
(41, 'bitacora', NULL),
(42, 'detalles_bitacora', NULL),
(43, 'preguntas_b', NULL),
(44, 'respuestas_b', NULL),
(45, 'curso_formacion', NULL),
(46, 'grupo_formacion', NULL),
(47, 'detalles_grupo_formacion', NULL),
(48, 'detalles_grupo_formacion_docentes', NULL),
(49, 'detalles_grupo_formacion_capacitadores', NULL),
(50, 'sede', NULL),
(51, 'pregunta_p', NULL),
(52, 'respuesta_p', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fkID_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`pkID`, `nombre`, `fkID_departamento`) VALUES
(1, 'Leticia', 1),
(2, 'Puerto Nariño', 1),
(3, 'Abejorral', 2),
(4, 'Abriaquí', 2),
(5, 'Alejandría', 2),
(6, 'Amagá', 2),
(7, 'Amalfi', 2),
(8, 'Andes', 2),
(9, 'Angelópolis', 2),
(10, 'Angostura', 2),
(11, 'Anorí', 2),
(12, 'Anzá', 2),
(13, 'Apartadó', 2),
(14, 'Arboletes', 2),
(15, 'Argelia', 2),
(16, 'Armenia', 2),
(17, 'Barbosa', 2),
(18, 'Bello', 2),
(19, 'Belmira', 2),
(20, 'Betania', 2),
(21, 'Betulia', 2),
(22, 'Ciudad Bolívar', 2),
(23, 'Briceño', 2),
(24, 'Buriticá', 2),
(25, 'Cáceres', 2),
(26, 'Caicedo', 2),
(27, 'Caldas', 2),
(28, 'Campamento', 2),
(29, 'Cañasgordas', 2),
(30, 'Caracolí', 2),
(31, 'Caramanta', 2),
(32, 'Carepa', 2),
(33, 'Carolina del Príncipe', 2),
(34, 'Caucasia', 2),
(35, 'Cocorná', 2),
(36, 'Chigorodó', 2),
(37, 'Cisneros', 2),
(38, 'Concepción', 2),
(39, 'Concordia', 2),
(40, 'Copacabana', 2),
(41, 'Dabeiba', 2),
(42, 'Donmatías', 2),
(43, 'Ebéjico', 2),
(44, 'El Bagre', 2),
(45, 'El Carmen de Viboral', 2),
(46, 'El Peñol', 2),
(47, 'El Retiro', 2),
(48, 'El Santuario', 2),
(49, 'Entrerríos', 2),
(50, 'Envigado', 2),
(51, 'Fredonia', 2),
(52, 'Frontino', 2),
(53, 'Giraldo', 2),
(54, 'Girardota', 2),
(55, 'Gómez Plata', 2),
(56, 'Granada', 2),
(57, 'Guadalupe', 2),
(58, 'Guarne', 2),
(59, 'Guatapé', 2),
(60, 'Heliconia', 2),
(61, 'Hispania', 2),
(62, 'Itagüí', 2),
(63, 'Ituango', 2),
(64, 'Jardín', 2),
(65, 'Jericó', 2),
(66, 'La Ceja', 2),
(67, 'La Estrella', 2),
(68, 'La Pintada', 2),
(69, 'La Unión', 2),
(70, 'Liborina', 2),
(71, 'Maceo', 2),
(72, 'Marinilla', 2),
(73, 'Medellin', 2),
(74, 'Montebello', 2),
(75, 'Murindó', 2),
(76, 'Mutatá', 2),
(77, 'Nariño', 2),
(78, 'Nechí', 2),
(79, 'Necoclí', 2),
(80, 'Olaya', 2),
(81, 'Peque', 2),
(82, 'Pueblorrico', 2),
(83, 'Puerto Berrío', 2),
(84, 'Puerto Nare', 2),
(85, 'Puerto Triunfo', 2),
(86, 'Remedios', 2),
(87, 'Rionegro', 2),
(88, 'Sabanalarga', 2),
(89, 'Sabaneta', 2),
(90, 'Salgar', 2),
(91, 'San Andrés de Cuerquia', 2),
(92, 'San Carlos', 2),
(93, 'San Francisco', 2),
(94, 'San Jerónimo', 2),
(95, 'San José de la Montaña', 2),
(96, 'San Juan de Urabá', 2),
(97, 'San Luis', 2),
(98, 'San Rafael', 2),
(99, 'San Roque', 2),
(100, 'San Pedro de los Milagros', 2),
(101, 'San Pedro de Urabá', 2),
(102, 'San Vicente', 2),
(103, 'Santa Bárbara', 2),
(104, 'Santa Fe de Antioquia', 2),
(105, 'Santa Rosa de Osos', 2),
(106, 'Santo Domingo', 2),
(107, 'Segovia', 2),
(108, 'Sonsón', 2),
(109, 'Sopetrán', 2),
(110, 'Támesis', 2),
(111, 'Tarazá', 2),
(112, 'Tarso', 2),
(113, 'Titiribí', 2),
(114, 'Toledo', 2),
(115, 'Turbo', 2),
(116, 'Uramita', 2),
(117, 'Urrao', 2),
(118, 'Valdivia', 2),
(119, 'Valparaíso', 2),
(120, 'Vegachí', 2),
(121, 'Venecia', 2),
(122, 'Vigía del Fuerte', 2),
(123, 'Yalí', 2),
(124, 'Yarumal', 2),
(125, 'Yolombó', 2),
(126, 'Yondó', 2),
(127, 'Zaragoza', 2),
(128, 'Arauca', 3),
(129, 'Arauquita', 3),
(130, 'Cravo Norte', 3),
(131, 'Fortul', 3),
(132, 'Puerto Rondón', 3),
(133, 'Saravena', 3),
(134, 'Tame', 3),
(135, 'Barranquilla', 4),
(136, 'Baranoa', 4),
(137, 'Campo de la Cruz', 4),
(138, 'Candelaria', 4),
(139, 'Galapa', 4),
(140, 'Juan de Acosta', 4),
(141, 'Luruaco', 4),
(142, 'Malambo', 4),
(143, 'Manatí', 4),
(144, 'Palmar de Varela', 4),
(145, 'Piojó', 4),
(146, 'Polonuevo', 4),
(147, 'Ponedera', 4),
(148, 'Puerto Colombia', 4),
(149, 'Repelón', 4),
(150, 'Sabanagrande', 4),
(151, 'Sabanalarga', 4),
(152, 'Santa Lucía', 4),
(153, 'Santo Tomás', 4),
(154, 'Soledad', 4),
(155, 'Suán', 4),
(156, 'Tubará', 4),
(157, 'Usiacurí', 4),
(158, 'Bogotá', 5),
(159, 'Achí', 6),
(160, 'Altos del Rosario', 6),
(161, 'Arenal', 6),
(162, 'Arjona', 6),
(163, 'Arroyohondo', 6),
(164, 'Barranco de Loba', 6),
(165, 'Calamar', 6),
(166, 'Cantagallo', 6),
(167, 'El Carmen de Bolívar', 6),
(168, 'Cartagena de Indias', 6),
(169, 'Cicuco', 6),
(170, 'Clemencia', 6),
(171, 'Córdoba', 6),
(172, 'El Guamo', 6),
(173, 'El Peñón', 6),
(174, 'Hatillo de Loba', 6),
(175, 'Magangué', 6),
(176, 'Mahates', 6),
(177, 'Margarita', 6),
(178, 'María La Baja', 6),
(179, 'Montecristo', 6),
(180, 'Morales', 6),
(181, 'Norosí', 6),
(182, 'Pinillos', 6),
(183, 'Regidor', 6),
(184, 'Río Viejo', 6),
(185, 'San Cristóbal', 6),
(186, 'San Estanislao', 6),
(187, 'San Fernando', 6),
(188, 'San Jacinto', 6),
(189, 'San Jacinto del Cauca', 6),
(190, 'San Juan Nepomuceno', 6),
(191, 'San Martín de Loba', 6),
(192, 'San Pablo', 6),
(193, 'Santa Catalina', 6),
(194, 'Santa Cruz de Mompox', 6),
(195, 'Santa Rosa', 6),
(196, 'Santa Rosa del Sur', 6),
(197, 'Simití', 6),
(198, 'Soplaviento', 6),
(199, 'Talaigua Nuevo', 6),
(200, 'Tiquisio', 6),
(201, 'Turbaco', 6),
(202, 'Turbaná', 6),
(203, 'Villanueva', 6),
(204, 'Zambrano', 6),
(205, 'Almeida', 7),
(206, 'Aquitania', 7),
(207, 'Arcabuco', 7),
(208, 'Belén', 7),
(209, 'Berbeo', 7),
(210, 'Betéitiva', 7),
(211, 'Boavita', 7),
(212, 'Boyacá', 7),
(213, 'Briceño', 7),
(214, 'Buenavista', 7),
(215, 'Busbanzá', 7),
(216, 'Caldas', 7),
(217, 'Campohermoso', 7),
(218, 'Cerinza', 7),
(219, 'Chinavita', 7),
(220, 'Chiquinquirá', 7),
(221, 'Chíquiza', 7),
(222, 'Chiscas', 7),
(223, 'Chita', 7),
(224, 'Chitaraque', 7),
(225, 'Chivatá', 7),
(226, 'Chivor', 7),
(227, 'Ciénega', 7),
(228, 'Cómbita', 7),
(229, 'Coper', 7),
(230, 'Corrales', 7),
(231, 'Covarachía', 7),
(232, 'Cubará', 7),
(233, 'Cucaita', 7),
(234, 'Cuitiva', 7),
(235, 'Duitama', 7),
(236, 'El Cocuy', 7),
(237, 'El Espino', 7),
(238, 'Firavitoba', 7),
(239, 'Floresta', 7),
(240, 'Gachantivá', 7),
(241, 'Gámeza', 7),
(242, 'Garagoa', 7),
(243, 'Guacamayas', 7),
(244, 'Guateque', 7),
(245, 'Guayatá', 7),
(246, 'Guicán de la Sierra', 7),
(247, 'Iza', 7),
(248, 'Jenesano', 7),
(249, 'Jericó', 7),
(250, 'La Capilla', 7),
(251, 'La Uvita', 7),
(252, 'La Victoria', 7),
(253, 'Labranzagrande', 7),
(254, 'Macanal', 7),
(255, 'Maripi', 7),
(256, 'Miraflores', 7),
(257, 'Mongua', 7),
(258, 'Monguí', 7),
(259, 'Moniquirá', 7),
(260, 'Motavita', 7),
(261, 'Muzo', 7),
(262, 'Nobsa', 7),
(263, 'Nuevo Colón', 7),
(264, 'Oicatá', 7),
(265, 'Otanche', 7),
(266, 'Pachavita', 7),
(267, 'Páez', 7),
(268, 'Paipa', 7),
(269, 'Pajarito', 7),
(270, 'Panqueba', 7),
(271, 'Pauna', 7),
(272, 'Paya', 7),
(273, 'Paz de Río', 7),
(274, 'Pesca', 7),
(275, 'Pisba', 7),
(276, 'Puerto Boyacá', 7),
(277, 'Quípama', 7),
(278, 'Ramiriquí', 7),
(279, 'Ráquira', 7),
(280, 'Rondón', 7),
(281, 'Saboyá', 7),
(282, 'Sáchica', 7),
(283, 'Samacá', 7),
(284, 'San Eduardo', 7),
(285, 'San José de Pare', 7),
(286, 'San Mateo', 7),
(287, 'San Miguel de Sema', 7),
(288, 'San Pablo de Borbur', 7),
(289, 'Santa Maria', 7),
(290, 'Santa Rosa de Viterbo', 7),
(291, 'Santa Sofía', 7),
(292, 'Santana', 7),
(293, 'Sativanorte', 7),
(294, 'Sativasur', 7),
(295, 'Siachoque', 7),
(296, 'Soatá', 7),
(297, 'Socha', 7),
(298, 'Socotá', 7),
(299, 'Sogamoso', 7),
(300, 'Somondoco', 7),
(301, 'Sora', 7),
(302, 'Soracá', 7),
(303, 'Sotaquirá', 7),
(304, 'Susacón', 7),
(305, 'Sutamarchán', 7),
(306, 'Sutatenza', 7),
(307, 'Tasco', 7),
(308, 'Tenza', 7),
(309, 'Tibaná', 7),
(310, 'Tibasosa', 7),
(311, 'Tinjacá', 7),
(312, 'Tipacoque', 7),
(313, 'Toca', 7),
(314, 'Toguí', 7),
(315, 'Tópaga', 7),
(316, 'Tota', 7),
(317, 'Tunja', 7),
(318, 'Tununguá', 7),
(319, 'Turmequé', 7),
(320, 'Tuta', 7),
(321, 'Tutazá', 7),
(322, 'Umbitá', 7),
(323, 'Ventaquemada', 7),
(324, 'Villa de Leyva', 7),
(325, 'Viracachá', 7),
(326, 'Zetaquira', 7),
(327, 'Aguadas', 8),
(328, 'Anserma', 8),
(329, 'Aranzazu', 8),
(330, 'Belalcazar', 8),
(331, 'Chinchiná', 8),
(332, 'Filadelfia', 8),
(333, 'La Dorada', 8),
(334, 'La Merced', 8),
(335, 'Manizales', 8),
(336, 'Manzanares', 8),
(337, 'Marmato', 8),
(338, 'Marquetalia', 8),
(339, 'Marulanda', 8),
(340, 'Neira', 8),
(341, 'Norcasia', 8),
(342, 'Pacora', 8),
(343, 'Palestina', 8),
(344, 'Pensilvania', 8),
(345, 'Riosucio', 8),
(346, 'Risaralda', 8),
(347, 'Salamina', 8),
(348, 'Samana', 8),
(349, 'San Jose', 8),
(350, 'Supía', 8),
(351, 'Victoria', 8),
(352, 'Villamaría', 8),
(353, 'Viterbo', 8),
(354, 'Albania', 9),
(355, 'Belén Andaquies', 9),
(356, 'Cartagena del Chaira', 9),
(357, 'Curillo', 9),
(358, 'El Doncello', 9),
(359, 'El Paujil', 9),
(360, 'Florencia', 9),
(361, 'La Montañita', 9),
(362, 'Milán', 9),
(363, 'Morelia', 9),
(364, 'Puerto Rico', 9),
(365, 'San José de Fragua', 9),
(366, 'San  Vicente del Caguan', 9),
(367, 'Solano', 9),
(368, 'Solita', 9),
(369, 'Valparaíso', 9),
(370, 'Aguazul', 10),
(371, 'Chámeza', 10),
(372, 'Hato Corozal', 10),
(373, 'La Salina', 10),
(374, 'Maní', 10),
(375, 'Monterrey', 10),
(376, 'Nunchía', 10),
(377, 'Orocué', 10),
(378, 'Paz de Ariporo', 10),
(379, 'Pore', 10),
(380, 'Recetor', 10),
(381, 'Sabanalarga', 10),
(382, 'Sácama', 10),
(383, 'San Luis de Palenque', 10),
(384, 'Támara', 10),
(385, 'Tauramena', 10),
(386, 'Trinidad', 10),
(387, 'Villanueva', 10),
(388, 'Yopal', 10),
(389, 'Almaguer', 11),
(390, 'Argelia', 11),
(391, 'Balboa', 11),
(392, 'Bolívar', 11),
(393, 'Buenos Aires', 11),
(394, 'Cajibio', 11),
(395, 'Caldono', 11),
(396, 'Caloto', 11),
(397, 'Corinto', 11),
(398, 'El Tambo', 11),
(399, 'Florencia', 11),
(400, 'Guapi', 11),
(401, 'Inza', 11),
(402, 'Jambaló', 11),
(403, 'La Sierra', 11),
(404, 'La Vega', 11),
(405, 'López', 11),
(406, 'Mercaderes', 11),
(407, 'Miranda', 11),
(408, 'Morales', 11),
(409, 'Padilla', 11),
(410, 'Páez', 11),
(411, 'Patia (El Bordo)', 11),
(412, 'Piamonte', 11),
(413, 'Piendamo', 11),
(414, 'Popayán', 11),
(415, 'Puerto Tejada', 11),
(416, 'Purace', 11),
(417, 'Rosas', 11),
(418, 'San Sebastián', 11),
(419, 'Santander de Quilichao', 11),
(420, 'Santa Rosa', 11),
(421, 'Silvia', 11),
(422, 'Sotara', 11),
(423, 'Suárez', 11),
(424, 'Sucre', 11),
(425, 'Timbío', 11),
(426, 'Timbiquí', 11),
(427, 'Toribio', 11),
(428, 'Totoro', 11),
(429, 'Villa Rica', 11),
(430, 'Aguachica', 12),
(431, 'Agustín Codazzi', 12),
(432, 'Astrea', 12),
(433, 'Becerril', 12),
(434, 'Bosconia', 12),
(435, 'Chimichagua', 12),
(436, 'Chiriguaná', 12),
(437, 'Curumaní', 12),
(438, 'El Copey', 12),
(439, 'El Paso	Gamarra', 12),
(440, 'González', 12),
(441, 'La Gloria', 12),
(442, 'La Jagua Ibirico', 12),
(443, 'Manaure', 12),
(444, 'Balcón Del Cesar', 12),
(445, 'Pailitas', 12),
(446, 'Pelaya', 12),
(447, 'Pueblo Bello', 12),
(448, 'Río De Oro', 12),
(449, 'Robles (La Paz)', 12),
(450, 'San Alberto', 12),
(451, 'San Diego', 12),
(452, 'San Martín', 12),
(453, 'Tamalameque', 12),
(454, 'Valledupar', 12),
(455, 'Acandí', 13),
(456, 'Alto Baudó (Pie de Pepe)', 13),
(457, 'Atrato', 13),
(458, 'Bagadó', 13),
(459, 'Bahía Solano', 13),
(460, 'Bajo Baudó (Pizarro)', 13),
(461, 'Belén de Bajirá', 13),
(462, 'Bojayá (Bellavista)', 13),
(463, 'Cantón de San Pablo', 13),
(464, 'El Carmen de Atrato', 13),
(465, 'Cértegui', 13),
(466, 'Condoto', 13),
(467, 'El Carmen del Darién', 13),
(468, 'Istmina', 13),
(469, 'Juradó', 13),
(470, 'Litoral del San Juan', 13),
(471, 'Lloró', 13),
(472, 'Medio Atrato', 13),
(473, 'Medio Baudó (Pto. Meluk)', 13),
(474, 'Medio San Juan', 13),
(475, 'Nóvita', 13),
(476, 'Nuquí', 13),
(477, 'Quibdó', 13),
(478, 'Riosucio', 13),
(479, 'Río Iró', 13),
(480, 'Río Quito', 13),
(481, 'San José del Palmar', 13),
(482, 'Sipí', 13),
(483, 'Tadó', 13),
(484, 'Unguía', 13),
(485, 'Unión Panamericana', 13),
(486, 'Ayapel', 14),
(487, 'Buenavista', 14),
(488, 'Canalete', 14),
(489, 'Cereté', 14),
(490, 'Chimá', 14),
(491, 'Chinú', 14),
(492, 'Ciénaga de Oro', 14),
(493, 'Cotorra', 14),
(494, 'La Apartada', 14),
(495, 'Los Córdobas', 14),
(496, 'Momil', 14),
(497, 'Montelíbano', 14),
(498, 'Montería', 14),
(499, 'Moñitos', 14),
(500, 'Planeta Rica', 14),
(501, 'Pueblo Nuevo', 14),
(502, 'Puerto Escondido', 14),
(503, 'Puerto Libertador', 14),
(504, 'Purísima', 14),
(505, 'Sahagún', 14),
(506, 'San Andrés de Sotavento', 14),
(507, 'San Antero', 14),
(508, 'San Bernardo del Viento', 14),
(509, 'San Carlos', 14),
(510, 'San José de Uré', 14),
(511, 'San Pelayo', 14),
(512, 'Santa Cruz de Lorica', 14),
(513, 'Tierralta', 14),
(514, 'Tuchín', 14),
(515, 'Valencia', 14),
(516, 'Agua de Dios', 15),
(517, 'Alban', 15),
(518, 'Anapoima', 15),
(519, 'Anolaima', 15),
(520, 'Arbelaez', 15),
(521, 'Beltrán', 15),
(522, 'Bituima', 15),
(523, 'Bojacá', 15),
(524, 'Cabrera', 15),
(525, 'Cachipay', 15),
(526, 'Cajicá', 15),
(527, 'Caparrapí', 15),
(528, 'Caqueza', 15),
(529, 'Carmen de Carupa', 15),
(530, 'Chaguaní', 15),
(531, 'Chia', 15),
(532, 'Chipaque', 15),
(533, 'Choachí', 15),
(534, 'Chocontá', 15),
(535, 'Cogua', 15),
(536, 'Cota', 15),
(537, 'Cucunubá', 15),
(538, 'El Colegio', 15),
(539, 'El Peñón', 15),
(540, 'El Rosal1', 15),
(541, 'Facatativa', 15),
(542, 'Fómeque', 15),
(543, 'Fosca', 15),
(544, 'Funza', 15),
(545, 'Fúquene', 15),
(546, 'Fusagasuga', 15),
(547, 'Gachalá', 15),
(548, 'Gachancipá', 15),
(549, 'Gacheta', 15),
(550, 'Gama', 15),
(551, 'Girardot', 15),
(552, 'Granada2', 15),
(553, 'Guachetá', 15),
(554, 'Guaduas', 15),
(555, 'Guasca', 15),
(556, 'Guataquí', 15),
(557, 'Guatavita', 15),
(558, 'Guayabal de Siquima', 15),
(559, 'Guayabetal', 15),
(560, 'Gutiérrez', 15),
(561, 'Jerusalén', 15),
(562, 'Junín', 15),
(563, 'La Calera', 15),
(564, 'La Mesa', 15),
(565, 'La Palma', 15),
(566, 'La Peña', 15),
(567, 'La Vega', 15),
(568, 'Lenguazaque', 15),
(569, 'Machetá', 15),
(570, 'Madrid', 15),
(571, 'Manta', 15),
(572, 'Medina', 15),
(573, 'Mosquera', 15),
(574, 'Nariño', 15),
(575, 'Nemocón', 15),
(576, 'Nilo', 15),
(577, 'Nimaima', 15),
(578, 'Nocaima', 15),
(579, 'Ospina Pérez', 15),
(580, 'Pacho', 15),
(581, 'Paime', 15),
(582, 'Pandi', 15),
(583, 'Paratebueno', 15),
(584, 'Pasca', 15),
(585, 'Puerto Salgar', 15),
(586, 'Pulí', 15),
(587, 'Quebradanegra', 15),
(588, 'Quetame', 15),
(589, 'Quipile', 15),
(590, 'Rafael Reyes', 15),
(591, 'Ricaurte', 15),
(592, 'San  Antonio del Tequendama', 15),
(593, 'San Bernardo', 15),
(594, 'San Cayetano', 15),
(595, 'San Juan de Rioseco', 15),
(596, 'San Francisco', 15),
(597, 'Sasaima', 15),
(598, 'Sesquilé', 15),
(599, 'Sibaté', 15),
(600, 'Silvania', 15),
(601, 'Simijaca', 15),
(602, 'Soacha', 15),
(603, 'Sopo', 15),
(604, 'Subachoque', 15),
(605, 'Suesca', 15),
(606, 'Supatá', 15),
(607, 'Susa', 15),
(608, 'Sutatausa', 15),
(609, 'Tabio', 15),
(610, 'Tausa', 15),
(611, 'Tena', 15),
(612, 'Tenjo', 15),
(613, 'Tibacuy', 15),
(614, 'Tibirita', 15),
(615, 'Tocaima', 15),
(616, 'Tocancipá', 15),
(617, 'Topaipí', 15),
(618, 'Ubalá', 15),
(619, 'Ubaque', 15),
(620, 'Ubaté', 15),
(621, 'Une', 15),
(622, 'Utica', 15),
(623, 'Vergara', 15),
(624, 'Viani', 15),
(625, 'Villagomez', 15),
(626, 'Villapinzón', 15),
(627, 'Villeta', 15),
(628, 'Viota', 15),
(629, 'Yacopí', 15),
(630, 'Zipacón', 15),
(631, 'Zipaquirá', 15),
(632, 'Inírida', 16),
(633, 'Calamar', 17),
(634, 'El Retorno', 17),
(635, 'Miraflores', 17),
(636, 'San José del Guaviare', 17),
(637, 'Acevedo', 18),
(638, 'Agrado', 18),
(639, 'Aipe', 18),
(640, 'Algeciras', 18),
(641, 'Altamira', 18),
(642, 'Baraya', 18),
(643, 'Campoalegre', 18),
(644, 'Colombia', 18),
(645, 'Elias', 18),
(646, 'Garzón', 18),
(647, 'Gigante', 18),
(648, 'Guadalupe', 18),
(649, 'Hobo', 18),
(650, 'Iquira', 18),
(651, 'Isnos', 18),
(652, 'La Argentina', 18),
(653, 'La Plata', 18),
(654, 'Nataga', 18),
(655, 'Neiva', 18),
(656, 'Oporapa', 18),
(657, 'Paicol', 18),
(658, 'Palermo', 18),
(659, 'Palestina', 18),
(660, 'Pital', 18),
(661, 'Pitalito', 18),
(662, 'Rivera', 18),
(663, 'Saladoblanco', 18),
(664, 'San Agustín', 18),
(665, 'Santa Maria', 18),
(666, 'Suaza', 18),
(667, 'Tarqui', 18),
(668, 'Tesalia', 18),
(669, 'Tello', 18),
(670, 'Teruel', 18),
(671, 'Timana', 18),
(672, 'Villavieja', 18),
(673, 'Yaguara', 18),
(674, 'Albania', 19),
(675, 'Barrancas', 19),
(676, 'Dibulla', 19),
(677, 'Distraccion', 19),
(678, 'El Molino', 19),
(679, 'Fonseca', 19),
(680, 'Hatonuevo', 19),
(681, 'La Jagua del Pilar', 19),
(682, 'Maicao', 19),
(683, 'Manaure', 19),
(684, 'Riohacha', 19),
(685, 'San Juan del Cesar', 19),
(686, 'Uribia', 19),
(687, 'Urumita', 19),
(688, 'Villanueva', 19),
(689, 'Algarrobo', 20),
(690, 'Aracataca', 20),
(691, 'Ariguani', 20),
(692, 'Cerro San Antonio', 20),
(693, 'Chivolo', 20),
(694, 'Cienaga', 20),
(695, 'Concordia', 20),
(696, 'El Banco', 20),
(697, 'El Piñon', 20),
(698, 'El Reten', 20),
(699, 'Fundacion', 20),
(700, 'Guamal', 20),
(701, 'Nueva Granada', 20),
(702, 'Pedraza', 20),
(703, 'Pijiño Del Carmen', 20),
(704, 'Pivijay', 20),
(705, 'Plato', 20),
(706, 'Puebloviejo', 20),
(707, 'Remolino', 20),
(708, 'Sabanas De San Angel', 20),
(709, 'Santa Ana', 20),
(710, 'Santa Barbara De Pinto', 20),
(711, 'Santa Marta', 20),
(712, 'San Sebastian De Buenavista', 20),
(713, 'San Zenon', 20),
(714, 'Salamina', 20),
(715, 'Sitionuevo', 20),
(716, 'Tenerife', 20),
(717, 'Zapayan', 20),
(718, 'Zona Bananera', 20),
(719, 'Acacias', 21),
(720, 'Barranca de Upia', 21),
(721, 'Cabuyaro', 21),
(722, 'Castilla La Nueva', 21),
(723, 'Cubarral', 21),
(724, 'Cumaral', 21),
(725, 'El Calvario', 21),
(726, 'El Castillo', 21),
(727, 'El Dorado', 21),
(728, 'Fuente de Oro', 21),
(729, 'Granada', 21),
(730, 'Guamal', 21),
(731, 'Mapiripán', 21),
(732, 'Mesetas', 21),
(733, 'La Macarena', 21),
(734, 'La Uribe', 21),
(735, 'Lejanías', 21),
(736, 'Puerto Concordia', 21),
(737, 'Puerto Gaitán', 21),
(738, 'Puerto López', 21),
(739, 'Puerto Lleras', 21),
(740, 'Puerto Rico', 21),
(741, 'Restrepo', 21),
(742, 'San Carlos Guaroa', 21),
(743, 'San Juan de Arama', 21),
(744, 'San Juanito', 21),
(745, 'San Martín', 21),
(746, 'Villavicencio', 21),
(747, 'Vista Hermosa', 21),
(748, 'Alban', 22),
(749, 'Aldaña', 22),
(750, 'Ancuya', 22),
(751, 'Arboleda', 22),
(752, 'Barbacoas', 22),
(753, 'Belen', 22),
(754, 'Buesaco', 22),
(755, 'Colon(genova)', 22),
(756, 'Consaca', 22),
(757, 'Contadero', 22),
(758, 'Cordoba', 22),
(759, 'Cuaspud', 22),
(760, 'Cumbal', 22),
(761, 'Cumbitara', 22),
(762, 'Chachagui', 22),
(763, 'El charco', 22),
(764, 'El peñol', 22),
(765, 'El rosario', 22),
(766, 'El tablon', 22),
(767, 'El tambo', 22),
(768, 'Funes', 22),
(769, 'Guachucal', 22),
(770, 'Guaitarilla', 22),
(771, 'Gualmatan', 22),
(772, 'Iles', 22),
(773, 'Imues', 22),
(774, 'Ipiales', 22),
(775, 'La cruz', 22),
(776, 'La florida', 22),
(777, 'La llanada', 22),
(778, 'La tola', 22),
(779, 'La union', 22),
(780, 'Leiva', 22),
(781, 'Linares', 22),
(782, 'Los andes', 22),
(783, 'Magui', 22),
(784, 'Mallama', 22),
(785, 'Mosquera', 22),
(786, 'Nariño', 22),
(787, 'Olaya herrera', 22),
(788, 'Ospina', 22),
(789, 'Pasto', 22),
(790, 'Pizarro', 22),
(791, 'Policarpa', 22),
(792, 'Potosi', 22),
(793, 'Providencia', 22),
(794, 'Puerres', 22),
(795, 'Pupiales', 22),
(796, 'Ricaurte', 22),
(797, 'Roberto payan', 22),
(798, 'Samaniego', 22),
(799, 'Sandona', 22),
(800, 'San bernardo', 22),
(801, 'San lorenzo', 22),
(802, 'San pablo', 22),
(803, 'San pedro de cartago', 22),
(804, 'Santa barbara', 22),
(805, 'Santacruz', 22),
(806, 'Sapuyes', 22),
(807, 'Taminango', 22),
(808, 'Tangua', 22),
(809, 'Tumaco', 22),
(810, 'Tuquerres', 22),
(811, 'Yacuanquer', 22),
(812, 'Abrego', 23),
(813, 'Arboledas', 23),
(814, 'Bochalema', 23),
(815, 'Bucarasica', 23),
(816, 'Cácota', 23),
(817, 'Cáchira', 23),
(818, 'Chinácota', 23),
(819, 'Chitagá', 23),
(820, 'Convención', 23),
(821, 'Cúcuta', 23),
(822, 'Cucutilla', 23),
(823, 'Durania', 23),
(824, 'El Carmen', 23),
(825, 'El Tarra', 23),
(826, 'El Zulia', 23),
(827, 'Gramalote', 23),
(828, 'Hacari', 23),
(829, 'Herrán', 23),
(830, 'Labateca', 23),
(831, 'La Esperanza', 23),
(832, 'La Playa', 23),
(833, 'Los Patios', 23),
(834, 'Lourdes', 23),
(835, 'Mutiscua', 23),
(836, 'Ocaña', 23),
(837, 'Pamplona', 23),
(838, 'Pamplonita', 23),
(839, 'Puerto Santander', 23),
(840, 'Ragonvalia', 23),
(841, 'Salazar', 23),
(842, 'San Calixto', 23),
(843, 'San Cayetano', 23),
(844, 'Santiago', 23),
(845, 'Sardinata', 23),
(846, 'Silos', 23),
(847, 'Teorama', 23),
(848, 'Tibú', 23),
(849, 'Toledo', 23),
(850, 'Villacaro', 23),
(851, 'Villa del Rosario', 23),
(852, 'Colón', 24),
(853, 'Mocoa', 24),
(854, 'Orito', 24),
(855, 'Puerto Asís', 24),
(856, 'Puerto Caycedo', 24),
(857, 'Puerto Guzmán', 24),
(858, 'Puerto Leguízamo', 24),
(859, 'Sibundoy', 24),
(860, 'San Francisco', 24),
(861, 'San Miguel', 24),
(862, 'Santiago', 24),
(863, 'Valle del Guamuez', 24),
(864, 'Villagarzón', 24),
(865, 'Armenia', 25),
(866, 'Buenavista', 25),
(867, 'Calarcá', 25),
(868, 'Circasia', 25),
(869, 'Córdoba', 25),
(870, 'Filandia', 25),
(871, 'Génova', 25),
(872, 'La Tebaida', 25),
(873, 'Montenegro', 25),
(874, 'Pijao', 25),
(875, 'Quimbaya', 25),
(876, 'Salento', 25),
(877, 'Apia', 26),
(878, 'Balboa', 26),
(879, 'Belén de Umbría', 26),
(880, 'Dos Quebradas', 26),
(881, 'Guatica', 26),
(882, 'La Celia', 26),
(883, 'La Virginia', 26),
(884, 'Marsella', 26),
(885, 'Mistrato', 26),
(886, 'Pereira', 26),
(887, 'Pueblo Rico', 26),
(888, 'Quinchía', 26),
(889, 'Santa Rosa de Cabal', 26),
(890, 'Santuario', 26),
(891, 'San Andres', 27),
(892, 'Aguada', 28),
(893, 'Albania', 28),
(894, 'Aratoca', 28),
(895, 'Barbosa', 28),
(896, 'Barichara', 28),
(897, 'Barrancabermeja', 28),
(898, 'Betulia', 28),
(899, 'Bolívar', 28),
(900, 'Bucaramanga', 28),
(901, 'Cabrera', 28),
(902, 'California', 28),
(903, 'Capitanejo', 28),
(904, 'Carcasi', 28),
(905, 'Cepita', 28),
(906, 'Cerrito', 28),
(907, 'Charalá', 28),
(908, 'Charta', 28),
(909, 'Chima', 28),
(910, 'Chipatá', 28),
(911, 'Cimitarra', 28),
(912, 'Concepción', 28),
(913, 'Confines', 28),
(914, 'Contratación', 28),
(915, 'Coromoro', 28),
(916, 'Curití', 28),
(917, 'El Carmen', 28),
(918, 'El Guacamayo', 28),
(919, 'El Peñón', 28),
(920, 'El Playón', 28),
(921, 'Encino', 28),
(922, 'Enciso', 28),
(923, 'Florián', 28),
(924, 'Floridablanca', 28),
(925, 'Galán', 28),
(926, 'Gambita', 28),
(927, 'Girón', 28),
(928, 'Guaca', 28),
(929, 'Guadalupe', 28),
(930, 'Guapota', 28),
(931, 'Guavatá', 28),
(932, 'Guepsa', 28),
(933, 'Hato', 28),
(934, 'Jesús Maria', 28),
(935, 'Jordán', 28),
(936, 'La Belleza', 28),
(937, 'Landazuri', 28),
(938, 'La Paz', 28),
(939, 'Lebrija', 28),
(940, 'Los Santos', 28),
(941, 'Macaravita', 28),
(942, 'Málaga', 28),
(943, 'Matanza', 28),
(944, 'Mogotes', 28),
(945, 'Molagavita', 28),
(946, 'Ocamonte', 28),
(947, 'Oiba', 28),
(948, 'Onzaga', 28),
(949, 'Palmar', 28),
(950, 'Palmas del Socorro', 28),
(951, 'Páramo', 28),
(952, 'Piedecuesta', 28),
(953, 'Pinchote', 28),
(954, 'Puente Nacional', 28),
(955, 'Puerto Parra', 28),
(956, 'Puerto Wilches', 28),
(957, 'Rionegro', 28),
(958, 'Sabana de Torres', 28),
(959, 'San Andrés', 28),
(960, 'San Benito', 28),
(961, 'San Gil', 28),
(962, 'San Joaquín', 28),
(963, 'San José de Miranda', 28),
(964, 'San Miguel', 28),
(965, 'San Vicente de Chucurí', 28),
(966, 'Santa Bárbara', 28),
(967, 'Santa Helena', 28),
(968, 'Simacota', 28),
(969, 'Socorro', 28),
(970, 'Suaita', 28),
(971, 'Sucre', 28),
(972, 'Surata', 28),
(973, 'Tona', 28),
(974, 'Valle San José', 28),
(975, 'Vélez', 28),
(976, 'Vetas', 28),
(977, 'Villanueva', 28),
(978, 'Zapatoca', 28),
(979, 'Buenavista', 29),
(980, 'Caimito', 29),
(981, 'Coloso', 29),
(982, 'Corozal', 29),
(983, 'Chalán', 29),
(984, 'Coveñas', 29),
(985, 'El Roble', 29),
(986, 'Galeras', 29),
(987, 'Guaranda', 29),
(988, 'La Unión', 29),
(989, 'Los Palmitos', 29),
(990, 'Majagual', 29),
(991, 'Morroa', 29),
(992, 'Ovejas', 29),
(993, 'Palmito', 29),
(994, 'Sampues', 29),
(995, 'San Benito Abad', 29),
(996, 'San Juan De Betulia', 29),
(997, 'San Marcos', 29),
(998, 'San Onofre', 29),
(999, 'San Pedro', 29),
(1000, 'Sincé', 29),
(1001, 'Sincelejo', 29),
(1002, 'Sucre', 29),
(1003, 'Tolú', 29),
(1004, 'Toluviejo', 29),
(1005, 'Alpujarra', 30),
(1006, 'Alvarado', 30),
(1007, 'Ambalema', 30),
(1008, 'Anzoategui', 30),
(1009, 'Armero (Guayabal)', 30),
(1010, 'Ataco', 30),
(1011, 'Cajamarca', 30),
(1012, 'Carmen de Apicalá', 30),
(1013, 'Casabianca', 30),
(1014, 'Chaparral', 30),
(1015, 'Coello', 30),
(1016, 'Coyaima', 30),
(1017, 'Cunday', 30),
(1018, 'Dolores', 30),
(1019, 'Espinal', 30),
(1020, 'Falán', 30),
(1021, 'Flandes', 30),
(1022, 'Fresno', 30),
(1023, 'Guamo', 30),
(1024, 'Herveo', 30),
(1025, 'Honda', 30),
(1026, 'Ibagué', 30),
(1027, 'Icononzo', 30),
(1028, 'Lérida', 30),
(1029, 'Líbano', 30),
(1030, 'Mariquita', 30),
(1031, 'Melgar', 30),
(1032, 'Murillo', 30),
(1033, 'Natagaima', 30),
(1034, 'Ortega', 30),
(1035, 'Palocabildo', 30),
(1036, 'Piedras', 30),
(1037, 'Planadas', 30),
(1038, 'Prado', 30),
(1039, 'Purificación', 30),
(1040, 'Rioblanco', 30),
(1041, 'Roncesvalles', 30),
(1042, 'Rovira', 30),
(1043, 'Saldaña', 30),
(1044, 'San Antonio', 30),
(1045, 'San Luis', 30),
(1046, 'Santa Isabel', 30),
(1047, 'Suárez', 30),
(1048, 'Valle de San Juan', 30),
(1049, 'Venadillo', 30),
(1050, 'Villahermosa', 30),
(1051, 'Villarrica', 30),
(1052, 'Alcalá', 31),
(1053, 'Andalucía', 31),
(1054, 'Ansermanuevo', 31),
(1055, 'Argelia', 31),
(1056, 'Bolívar', 31),
(1057, 'Buenaventura', 31),
(1058, 'Buga', 31),
(1059, 'Bugalagrande', 31),
(1060, 'Caicedonia', 31),
(1061, 'Cali', 31),
(1062, 'Candelaria', 31),
(1063, 'Cartago', 31),
(1064, 'Dagua', 31),
(1065, 'Darién', 31),
(1066, 'El Aguila', 31),
(1067, 'El Cairo', 31),
(1068, 'El Cerrito', 31),
(1069, 'El Dovio', 31),
(1070, 'Florida', 31),
(1071, 'Ginebra', 31),
(1072, 'Guacarí', 31),
(1073, 'Jamundí', 31),
(1074, 'La Cumbre', 31),
(1075, 'La Unión', 31),
(1076, 'La Victoria', 31),
(1077, 'Obando', 31),
(1078, 'Palmira', 31),
(1079, 'Pradera', 31),
(1080, 'Restrepo', 31),
(1081, 'Riofrío', 31),
(1082, 'Roldanillo', 31),
(1083, 'San Pedro', 31),
(1084, 'Sevilla', 31),
(1085, ' Toro', 31),
(1086, 'Trujillo', 31),
(1087, 'Tuluá', 31),
(1088, 'Ulloa', 31),
(1089, 'Versalles', 31),
(1090, 'Vijes', 31),
(1091, 'Yotoco', 31),
(1092, 'Yumbo', 31),
(1093, 'Zarzal', 31),
(1094, 'Carurú', 32),
(1095, 'Mitú', 32),
(1096, 'Taraira', 32),
(1097, 'Cumaribo', 33),
(1098, 'La Primavera', 33),
(1099, 'Puerto Carreño', 33),
(1100, 'Santa Rosalía', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_formacion`
--

CREATE TABLE `nivel_formacion` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_formacion`
--

INSERT INTO `nivel_formacion` (`pkID`, `nombre`) VALUES
(1, 'Técnico'),
(2, 'Normalista'),
(3, 'Estudiante de Pregrado'),
(4, 'Profesional Universitario'),
(5, 'Especialización'),
(6, 'Maestría'),
(7, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `pkID` int(11) NOT NULL,
  `fkID_tipo_usuario` int(11) NOT NULL,
  `fkID_modulo` int(11) NOT NULL,
  `crear` tinyint(1) NOT NULL DEFAULT '0',
  `editar` tinyint(1) NOT NULL DEFAULT '0',
  `eliminar` tinyint(1) NOT NULL DEFAULT '0',
  `consultar` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`pkID`, `fkID_tipo_usuario`, `fkID_modulo`, `crear`, `editar`, `eliminar`, `consultar`) VALUES
(19, 1, 15, 1, 1, 1, 1),
(20, 1, 16, 1, 1, 1, 1),
(21, 1, 17, 1, 1, 1, 1),
(22, 1, 18, 1, 1, 1, 1),
(23, 1, 19, 1, 1, 1, 1),
(24, 1, 20, 1, 1, 1, 1),
(25, 1, 22, 1, 1, 1, 1),
(26, 1, 23, 1, 1, 1, 1),
(27, 1, 24, 1, 1, 1, 1),
(28, 1, 25, 1, 1, 1, 1),
(29, 1, 26, 1, 1, 1, 1),
(30, 1, 27, 1, 1, 1, 1),
(31, 1, 28, 1, 1, 1, 1),
(32, 1, 29, 1, 1, 1, 1),
(33, 1, 30, 1, 1, 1, 1),
(34, 1, 31, 1, 1, 1, 1),
(35, 1, 32, 1, 1, 1, 1),
(36, 1, 33, 1, 1, 1, 1),
(37, 1, 34, 1, 1, 1, 1),
(38, 1, 35, 1, 1, 1, 1),
(39, 1, 36, 1, 1, 1, 1),
(40, 1, 37, 1, 1, 1, 1),
(41, 1, 38, 1, 1, 1, 1),
(42, 1, 39, 1, 1, 1, 1),
(43, 1, 13, 1, 1, 1, 1),
(44, 1, 14, 1, 1, 1, 1),
(45, 1, 13, 1, 1, 1, 1),
(46, 1, 14, 1, 1, 1, 1),
(47, 1, 40, 1, 1, 1, 1),
(48, 1, 41, 1, 1, 1, 1),
(49, 1, 42, 1, 1, 1, 1),
(50, 1, 43, 1, 1, 1, 1),
(51, 1, 44, 1, 1, 1, 1),
(52, 1, 45, 1, 1, 1, 1),
(53, 1, 46, 1, 1, 1, 1),
(54, 1, 47, 1, 1, 1, 1),
(55, 1, 48, 1, 1, 1, 1),
(56, 1, 49, 1, 1, 1, 1),
(57, 1, 50, 1, 1, 1, 1),
(58, 1, 50, 1, 1, 1, 1),
(59, 1, 52, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_b`
--

CREATE TABLE `preguntas_b` (
  `pkID` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `fkID_bitacora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_p`
--

CREATE TABLE `pregunta_p` (
  `pkID` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `fkID_prueba` int(11) NOT NULL,
  `fkID_tipo_pregunta_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `anio_creacion` year(4) NOT NULL,
  `fkID_linea_investigacion` int(11) NOT NULL,
  `pregunta_investigacion` text NOT NULL,
  `fkID_asesor` int(11) DEFAULT NULL,
  `fkID_tipo_proyecto` int(11) NOT NULL,
  `fkID_estado_proyecto` int(11) NOT NULL,
  `fkID_grupo` int(11) NOT NULL,
  `fkID_fase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_marco`
--

CREATE TABLE `proyecto_marco` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `operador` text NOT NULL,
  `valor` bigint(11) NOT NULL,
  `fuente_recursos` varchar(250) NOT NULL,
  `financiadores` varchar(250) NOT NULL,
  `gerente` varchar(250) NOT NULL,
  `lugar_ejecucion` varchar(250) NOT NULL,
  `interventoria` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `url_archivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `url_archivo` varchar(250) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_b`
--

CREATE TABLE `respuestas_b` (
  `pkID` int(11) NOT NULL,
  `respuesta` text NOT NULL,
  `fkID_pregunta` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_p`
--

CREATE TABLE `respuesta_p` (
  `pkID` int(11) NOT NULL,
  `respuesta` text,
  `fkID_pregunta_p` int(11) NOT NULL,
  `fkID_banco_rta_p` int(11) DEFAULT NULL,
  `fkID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fkID_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`pkID`, `nombre`, `fkID_tipo_usuario`) VALUES
(1, 'Representante', 9),
(2, 'Tesorero', 9),
(3, 'Asistente', 9),
(4, 'Investigador', 9),
(5, 'Participante', 9),
(6, 'Principal', 8),
(7, 'Acompañante', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fkID_departamento` int(11) NOT NULL,
  `fkID_municipio` int(11) NOT NULL,
  `fkID_zona` int(11) NOT NULL,
  `fkID_tipo` int(11) NOT NULL,
  `fkID_institucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tematica`
--

CREATE TABLE `tematica` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tematica`
--

INSERT INTO `tematica` (`pkID`, `nombre`) VALUES
(1, 'Interacción entre niños'),
(2, 'Charla Informativa'),
(3, 'tematica1'),
(4, 'Derechos y Deberes de los Estudiantes'),
(5, 'eerrrrttyy'),
(6, 'oooooooooooooooooo'),
(7, 'prueba_final_tematica'),
(8, 'prueba_final_tematica'),
(9, 'pppppppppppppppppp'),
(10, 'qqqqqqqqqqqq'),
(11, 'Integracion ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`pkID`, `nombre`) VALUES
(1, 'Principal'),
(2, 'Sede');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actor`
--

CREATE TABLE `tipo_actor` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_actor`
--

INSERT INTO `tipo_actor` (`pkID`, `nombre`) VALUES
(1, 'Tipo1'),
(2, 'Tipo2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_apropiacion_social`
--

CREATE TABLE `tipo_apropiacion_social` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_apropiacion_social`
--

INSERT INTO `tipo_apropiacion_social` (`pkID`, `nombre`) VALUES
(1, 'Reunión'),
(2, 'Evento Cultural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_id`
--

CREATE TABLE `tipo_documento_id` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento_id`
--

INSERT INTO `tipo_documento_id` (`pkID`, `nombre`) VALUES
(1, 'Cédula'),
(2, 'Tarjeta de identidad'),
(3, 'Pasaporte'),
(4, 'Cédula de Extrangería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_indicador`
--

CREATE TABLE `tipo_indicador` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_indicador`
--

INSERT INTO `tipo_indicador` (`pkID`, `nombre`) VALUES
(1, 'Producto'),
(2, 'Resultado'),
(3, 'Impacto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta_p`
--

CREATE TABLE `tipo_pregunta_p` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_pregunta_p`
--

INSERT INTO `tipo_pregunta_p` (`pkID`, `nombre`) VALUES
(1, 'Abierta'),
(2, 'Unica'),
(3, 'Múltiple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE `tipo_proyecto` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_proyecto`
--

INSERT INTO `tipo_proyecto` (`pkID`, `nombre`, `descripcion`) VALUES
(1, 'Investigación', 'Buscar información y formular hipótesis, sobre un tema en especifico'),
(2, 'Social', 'Lograr alguna obra que beneficie a la comunidad'),
(3, 'Desarrollo Sostenible', 'Busca la participación equitativa de la sociedad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`pkID`, `nombre`) VALUES
(1, 'Administrador'),
(8, 'Docente'),
(9, 'Estudiante'),
(10, 'Coordinador'),
(11, 'Asesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vinculacion`
--

CREATE TABLE `tipo_vinculacion` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_vinculacion`
--

INSERT INTO `tipo_vinculacion` (`pkID`, `nombre`) VALUES
(1, 'Tipov1'),
(2, 'Tipov2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `pkID` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `pass_conf` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `fkID_tipo` int(11) NOT NULL,
  `fkID_tipo_documento` int(11) NOT NULL,
  `numero_documento` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fkID_departamento` varchar(250) DEFAULT NULL,
  `fkID_municipio` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) NOT NULL,
  `numero_telefono` varchar(250) NOT NULL,
  `fkID_cargo` int(11) DEFAULT NULL,
  `fecha_vinculacion` date DEFAULT NULL,
  `fkID_nivel_formacion` int(11) DEFAULT NULL,
  `nombre_titulo` varchar(250) DEFAULT NULL,
  `ultimo_titulo` varchar(250) DEFAULT NULL,
  `fkID_grupo_etnico` int(11) DEFAULT NULL,
  `fkID_institucion` int(11) DEFAULT NULL,
  `fkID_rol` int(11) DEFAULT NULL,
  `fkID_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pkID`, `alias`, `pass`, `pass_conf`, `nombre`, `apellido`, `email`, `fkID_tipo`, `fkID_tipo_documento`, `numero_documento`, `fecha_nacimiento`, `fkID_departamento`, `fkID_municipio`, `direccion`, `numero_telefono`, `fkID_cargo`, `fecha_vinculacion`, `fkID_nivel_formacion`, `nombre_titulo`, `ultimo_titulo`, `fkID_grupo_etnico`, `fkID_institucion`, `fkID_rol`, `fkID_genero`) VALUES
(1, 'root', '8cb2237d0679ca88db6464eac60da96345513964', '', 'root', 'root', 'example@example.com', 1, 0, '', '0000-00-00', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'jsmorales', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Johan', 'Morales', '', 1, 0, '', '0000-00-00', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'prueba1', '8cb2237d0679ca88db6464eac60da96345513964', '', 'prueba1', 'prueba1', '', 1, 0, '', '0000-00-00', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Apolo1138', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Finn', 'Carnage', 'fcarnage@gmail.com', 8, 1, '1024534172', '1981-09-17', '4', '145', 'cll 23 - 67 90', '3458912', 4, '2009-10-21', 3, 'Pedagogía', '', 0, 1, NULL, 1),
(18, 'hypnos', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Hypnos-edit', 'Morpheo.edit', 'hmorpheo@gmail.com', 8, 1, '234512434', '1985-12-18', NULL, NULL, 'Cra 67 00', '3124563423', 2, '2011-12-16', 3, 'Pedagogía', 'Maestría en pedagogía', 3, 2, NULL, 1),
(19, 'lskywalker', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Luke', 'Skywalker', 'ldeathstarsucks@gmail.com', 8, 1, '2874623', '1962-12-18', NULL, NULL, 'cra 47', '3115207629', 5, '2002-08-14', 6, 'Jedi', 'Maestro Jedi', 0, 1, NULL, 1),
(20, 'hsolo', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Han', 'Solo', 'hsolomillenarium@gmail.com', 8, 4, '34528190', '1967-07-19', NULL, NULL, 'Cll 78', '8903478', 5, '1977-12-13', 5, 'Maestro', '', 0, 1, NULL, 1),
(21, 'askywalker', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Anakin', 'Skywalker', 'askygrey@gmail.com', 8, 1, '10253472829', '1950-07-19', NULL, NULL, 'cra 30 - 00', '123182736', 5, '2002-12-25', 6, 'Jedi Master', '', 0, 2, NULL, 1),
(35, 'okenobi', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Obi Wan', 'Kenobi', 'obiforce@gmail.com', 8, 1, '1078365478', '1997-12-18', NULL, NULL, 'cra 45 ', '4567890', 5, '2010-12-01', 7, 'Spirit Force', '', 0, 1, NULL, 1),
(36, 'yoda', '348162101fc6f7e624681b7400b085eeac6df7bd', '', 'Yoda ', 'Master', 'yoda@gmail.com', 8, 1, '1026783473648', '1931-01-01', '14', '488', '--', '--', 5, '1945-12-27', 7, 'Master of Masters', '', 0, 1, NULL, 1),
(37, 'qewrqwerq', '131e70c468647c238d59128bc0fe9aafbf135c94', '', 'Array', 'ouiyoiuy', 'sifupsodifasd@gmail.com', 8, 1, '343434343', '1970-01-28', NULL, NULL, 'cra 45', '43454353', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(38, 'kjhlkjh', '0b5e645278db89d990ae8b7185befbd4a0d844b6', '', 'Array', 'lkjhlkjh', 'lkdjfhdlfa@gmail.com', 8, 1, '1283128317', '2017-01-20', NULL, NULL, 'cra 45 ', '2343242342', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(39, 'pruebadocs1', '9b221508fb74b31b8fdf632e05ec3df3138fe0f7', '', 'Array', 'ytreytre', 'trytrey@gmail.com', 8, 1, '1212121212', '1968-01-25', NULL, NULL, 'cra 3333', '8909232356', 0, '0000-00-00', 0, '', '', 0, 2, NULL, 0),
(40, 'pruebadocs2', '97bb2507486140374c393c05de65a061b13aedd7', '', 'Array', 'qerqer', 'erqerqer@gmail.com', 8, 1, '2987329483274', '1969-01-22', NULL, NULL, 'asdfasdf', '13452435246', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(41, 'pruebadocs3', 'cde365d2500f59bd47028c8f24ac37df2ff09e5e', '', 'Array', 'rewqrewqrewq', 'qerqeq@gmail.com', 8, 1, '121212345', '1961-01-18', NULL, NULL, 'qwerty', '38247623942', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(42, 'qwerqerq', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Array', 'qwerty', 'qwerty@gmail.com', 8, 1, '1341234134', '1960-01-12', NULL, NULL, 'cra 34 - 90', '869898768', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(43, 'pruebadocs5', 'f4824215a0bf39ce1cf64bdc938fd58ec5f810f0', '', 'weroitu7', 'lkjdhfaldkf', 'adjkfhadsf@gmail.com', 8, 1, '129838463', '1996-01-13', NULL, NULL, 'ra 34', '242343243', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(44, 'pruebadocs68--editado', '55cd2f408f60f4716d1a4213e0d4c74a3d2c1dfc', '', 'qwewqewqe--editado', 'dyftdfusj--editado', 'akdjfadfs@gmail.com', 8, 1, '65865865', '1982-01-20', NULL, NULL, '2343242', '34234324324234', 0, '0000-00-00', 4, '', '', 0, 2, NULL, 1),
(45, 'bbanner', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Bruce', 'Banner', 'thehulk@gmail.com', 8, 1, '121212121', '1960-01-30', NULL, NULL, 'cra 34', '123213213123', 2, '2006-01-19', 7, 'Ingeniero Boiquímico', 'Doctorado en Modificación Molecular', 0, 1, NULL, 1),
(46, 'uytuy', '91890d132c9f69ab2a2c5290f21ade2391661836', '', 'uiytiuy', 'tiuytiuy', 'khldfjashdl@gmail.com', 8, 1, '87643284', '1981-01-08', NULL, NULL, 'car 45 ', '342334234', 0, '0000-00-00', 0, '', '', 0, 1, NULL, 0),
(47, 'estudiante1', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Erick', 'Monsalve', 'emons@gmail.com', 9, 1, '2347893260', '2017-01-10', '1', '2', 'crea 34 ', '3429078', 5, '2017-01-01', 0, NULL, NULL, 4, 1, 1, 1),
(48, 'rensolo', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Ren', 'Solo', 'rensolo@gmail.com', 9, 1, '102378467367', '1966-01-20', '1', '1', 'cre 56', '3458912', NULL, NULL, NULL, NULL, NULL, 3, 2, 1, 1),
(49, 'kdanvers', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Kara', 'Danvers', 'supergirl@gmail.com', 9, 1, '1292344093843', '1975-01-16', NULL, NULL, '45 st', '3562390', NULL, NULL, NULL, NULL, NULL, 0, 2, 0, 2),
(50, 'ballen', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Barry', 'Allen', 'theflash@gmail.com', 9, 1, '12378794948', '1938-01-20', NULL, NULL, 'cra 67', '3452389', NULL, NULL, NULL, NULL, NULL, 2, 2, 4, 1),
(51, 'dgrayson', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Dick', 'Grayson', 'nigthwing@gmail.com', 9, 1, '3874632842', '1985-01-25', NULL, NULL, 'cra 56', '2345623', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1),
(52, 'llance', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Laurel', 'lance', 'blackcannary@gmail.com', 9, 1, '127657171', '1986-01-22', '4', '137', 'cra 34', '3456712', NULL, NULL, NULL, NULL, NULL, 0, 2, 0, 2),
(53, 'ecartman', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Erick', 'Cartman', 'ecartmansalad@gmail.com', 9, 1, '8905634', '1995-04-20', '5', '158', '10456 est', '3115672308', NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, 1),
(54, 'jperez', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Juan', 'Perez', '', 11, 0, '', '0000-00-00', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'tstark', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Tony', 'Stark', 'ironman@gmail.com', 8, 1, '2345189', '1953-06-18', NULL, NULL, 'torre avengers', '2358912', 5, '2014-01-16', 7, 'Ingeniería Mecánica', 'Doctorado en ingeniería', 0, 3, NULL, 1),
(56, 'estudiante4', '8cb2237d0679ca88db6464eac60da96345513964', '', 'estudiante4', 'estudiante4', 'estudiante4@gmail.com', 9, 1, '435435345', '1980-01-10', '21', '719', 'estudiante4', '342343242', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, 1),
(57, 'fmonsalve', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Felipe', 'Monsalve', '', 10, 0, '', '0000-00-00', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'ethawne', '8cb2237d0679ca88db6464eac60da96345513964', '', 'Eobard', 'Thawne', 'ethawne@gmail.com', 9, 3, 'c549499kdfp', '1959-02-26', '5', '158', 'cra 45', '4562290', NULL, NULL, NULL, NULL, NULL, 0, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_grado`
--

CREATE TABLE `usuario_grado` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_grupo`
--

CREATE TABLE `usuario_grupo` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_grupo` int(11) NOT NULL,
  `fkID_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_grupo_formacion`
--

CREATE TABLE `usuario_grupo_formacion` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_grupo_formacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_materia`
--

CREATE TABLE `usuario_materia` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_proyectoM`
--

CREATE TABLE `usuario_proyectoM` (
  `pkID` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_proyectoM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`pkID`, `nombre`) VALUES
(1, 'Rural'),
(2, 'Urbana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `apropiacion_actor`
--
ALTER TABLE `apropiacion_actor`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `apropiacion_social`
--
ALTER TABLE `apropiacion_social`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `asesor_proyectoM`
--
ALTER TABLE `asesor_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `banco_respuestas_p`
--
ALTER TABLE `banco_respuestas_p`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `cursosF_proyectoM`
--
ALTER TABLE `cursosF_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `curso_formacion`
--
ALTER TABLE `curso_formacion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `docente_proyectoM`
--
ALTER TABLE `docente_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `documentos_docente`
--
ALTER TABLE `documentos_docente`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `documentos_infraestructura`
--
ALTER TABLE `documentos_infraestructura`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `estudiante_proyectoM`
--
ALTER TABLE `estudiante_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `grupos_proyectoM`
--
ALTER TABLE `grupos_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `grupo_etnico`
--
ALTER TABLE `grupo_etnico`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `grupo_evento`
--
ALTER TABLE `grupo_evento`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `grupo_formacion`
--
ALTER TABLE `grupo_formacion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `institucion_infraestructura`
--
ALTER TABLE `institucion_infraestructura`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `institucion_proyectoM`
--
ALTER TABLE `institucion_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `lugar_apropiacion`
--
ALTER TABLE `lugar_apropiacion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `preguntas_b`
--
ALTER TABLE `preguntas_b`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `pregunta_p`
--
ALTER TABLE `pregunta_p`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `proyecto_marco`
--
ALTER TABLE `proyecto_marco`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `respuestas_b`
--
ALTER TABLE `respuestas_b`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `respuesta_p`
--
ALTER TABLE `respuesta_p`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tematica`
--
ALTER TABLE `tematica`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_actor`
--
ALTER TABLE `tipo_actor`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_apropiacion_social`
--
ALTER TABLE `tipo_apropiacion_social`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_documento_id`
--
ALTER TABLE `tipo_documento_id`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_indicador`
--
ALTER TABLE `tipo_indicador`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_pregunta_p`
--
ALTER TABLE `tipo_pregunta_p`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_vinculacion`
--
ALTER TABLE `tipo_vinculacion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuario_grado`
--
ALTER TABLE `usuario_grado`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuario_grupo_formacion`
--
ALTER TABLE `usuario_grupo_formacion`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuario_materia`
--
ALTER TABLE `usuario_materia`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuario_proyectoM`
--
ALTER TABLE `usuario_proyectoM`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`pkID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asesor_proyectoM`
--
ALTER TABLE `asesor_proyectoM`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `banco_respuestas_p`
--
ALTER TABLE `banco_respuestas_p`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cursosF_proyectoM`
--
ALTER TABLE `cursosF_proyectoM`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `curso_formacion`
--
ALTER TABLE `curso_formacion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docente_proyectoM`
--
ALTER TABLE `docente_proyectoM`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `documentos_docente`
--
ALTER TABLE `documentos_docente`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `documentos_infraestructura`
--
ALTER TABLE `documentos_infraestructura`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estudiante_proyectoM`
--
ALTER TABLE `estudiante_proyectoM`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `grupos_proyectoM`
--
ALTER TABLE `grupos_proyectoM`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grupo_etnico`
--
ALTER TABLE `grupo_etnico`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grupo_evento`
--
ALTER TABLE `grupo_evento`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grupo_formacion`
--
ALTER TABLE `grupo_formacion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `institucion_proyectoM`
--
ALTER TABLE `institucion_proyectoM`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `preguntas_b`
--
ALTER TABLE `preguntas_b`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `respuestas_b`
--
ALTER TABLE `respuestas_b`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `respuesta_p`
--
ALTER TABLE `respuesta_p`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_documento_id`
--
ALTER TABLE `tipo_documento_id`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_indicador`
--
ALTER TABLE `tipo_indicador`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tipo_vinculacion`
--
ALTER TABLE `tipo_vinculacion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `usuario_grado`
--
ALTER TABLE `usuario_grado`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `usuario_grupo_formacion`
--
ALTER TABLE `usuario_grupo_formacion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario_materia`
--
ALTER TABLE `usuario_materia`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*sentencia para poner auto incremento a las tablas*/
/*ALTER TABLE `actor` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT;*/
#ALTER TABLE `apropiacion_actor` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `estado_proyecto` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `institucion_infraestructura` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `linea_investigacion` ADD PRIMARY KEY(`pkID`)
#ALTER TABLE `linea_investigacion` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `lugar_apropiacion` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `proyecto_marco` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `tipo_actor` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `tipo_apropiacion_social` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `tipo_pregunta_p` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `tipo_proyecto` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT
#ALTER TABLE `usuario_proyectoM` CHANGE `pkID` `pkID` INT(11) NOT NULL AUTO_INCREMENT