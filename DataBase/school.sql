-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2019 a las 00:26:44
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `school`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudiente`
--

CREATE TABLE `acudiente` (
  `IdAcudiente` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `TipoDocumento` enum('CC','TI','CE','NCS','PS','DNI','NIT') NOT NULL,
  `Documento` varchar(15) NOT NULL,
  `Rh` enum('AB+','AB-','A+','A-','B+','B-','O+','O-') NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `FechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acudiente`
--

INSERT INTO `acudiente` (`IdAcudiente`, `Nombre`, `Apellido`, `TipoDocumento`, `Documento`, `Rh`, `Correo`, `Password`, `Telefono`, `Foto`, `FechaNacimiento`) VALUES
(1, 'Laura Catalina', 'Albarracin Perez', 'CC', '145789630', 'B+', 'laura@gmail.com', '$2y$10$j.yE8Le8JbZZ.ACTAM52f.Bomj2zlvgPxtyPpwgmJyc.v/G0oZahi', '1', 'View/profilePhoto/1573256553-dyuiñ.jpg', '2019-11-14'),
(2, 'Mario Andres', 'Gomez Perez', 'CC', '546546789', 'B+', 'Mario@gmail.com', '$2y$10$riBlpJyHCL2gJTVyQjfnhuw5MpJi4PfE/YqfmH50Gi9mfEV6pyfOy', '4567891230', 'View/profilePhoto/1573256662-gikjlk.jpg', '2019-08-15'),
(3, 'Carlos Alejandro', 'Carvajal Avellaneda', 'CE', '545656567896', 'B+', 'Carlos@gmail.com', '$2y$10$rbF9tlLZ3OKRN/BRWfW8ReYhVE8nRhko7sJ.CBM0ui783LS3W53EO', '1212345645', 'View/profilePhoto/1573256840-hoiiiiiiiiiiiiiiiiiiii.jpg', '1999-05-17'),
(4, 'Juan Camilo', 'Jaramillo Gonzales', 'CC', '78965412231', 'B+', 'Juan@gmail.com', '$2y$10$u33dHXrDEQJtG1zivEMbkOrxuklY12EaoT/kmq/Gc.mjnurFv8nd.', '85786454', 'View/profilePhoto/1573256940-holiiiiii.jpg', '1980-04-25'),
(5, 'Carla Marianaq', 'Castillo Guevara', 'CC', '7854123690', 'B+', 'Carla@gmail.com', '$2y$10$7M4u23nSSCnExZ.E57x4hOhZeqLH4XbFk5BE1WRWKA9gUYbdhUcLe', '5', 'View/profilePhoto/1573257109-images.jpg', '1970-12-27'),
(6, 'Hetnando Javier', 'Rendon Fernandez', 'CC', '8975645646', 'B-', 'Hernando@gmail.com', '$2y$10$KfpGYHu01x4WKbGleIRXuOD6aLAFZV2zACAzYivHoRiPUsC9juLTS', '789123123123', 'View/profilePhoto/1573257275-jgjhfjhkj.jpg', '1982-06-12'),
(7, 'Liana Marcela', 'Orduz Guido', 'CC', '56465485', 'B-', 'Liana@gmail.com', '$2y$10$hA1eBAlVLjxE5W4epY3l4OU4qJAYORxYnfy.tDLR1Agx9.mgD0h5a', '8764564564', 'View/profilePhoto/1573257482-khjkl.jpg', '0000-00-00'),
(8, 'MIa Sarai', 'Diaz Carreño', 'CC', '654567496', 'B+', 'Mia@gmail.com', '$2y$10$1oNAAr6Hxpm6J6BEFWgIuedzQjf/.8CkYjHwW29YBrtoGIATdbpOa', '784561230', 'View/profilePhoto/1573257652-khñk.jpg', '1980-11-27'),
(9, 'Grogorio ', 'Barrera Higuera', 'CC', '789456123', 'A+', 'Gregorio@gmail.com', '$2y$10$nkxhzIOBSYtGqRc782Y3w.OF8wTdhWHmWRc8GANAZS8tpiCBcc0oy', '55412544', 'View/profilePhoto/1573258109-holi.jpg', '1970-09-05'),
(10, 'David Alejandro', 'Gutierrez Guillo', 'CC', '856456153', 'AB+', 'David@gmail.com', '$2y$10$lDEN3C8k10db6uYyxqMRse91CvxH7ZUXqXpSlQZfhbFx3RJSeeIPm', '6574865486', 'View/profilePhoto/1573258199-uykop.jpg', '2019-07-12'),
(11, 'Alejandra', 'Saenz', 'CC', '1052416412', 'O+', 'alejandra@gmail.com', '$2y$10$mJxfCOODvNAsJGR/9j7eF.SzifdbaEpzE2Qs1spK/GALsmv8cBly6', '11', 'View/profilePhoto/1573679100-3.jpg', '1999-08-20'),
(12, 'Andrea', 'Moreno', 'CC', '1002778', 'O+', 'andreaing600@gmail.com', '$2y$10$DS2CgBmLN2Xf2QdRb8dOJOYKJqMqEMiaKAFkaTzxMVGkVBTiAaVoS', '3114569408', 'View/profilePhoto/1573698032-6.jpg', '2019-11-06'),
(13, 'Fredy', 'Alarcon', 'CC', '234567', 'O+', 'fredy.alarcon@misena.edu.co', '$2y$10$ELnHnoRvRBThX9Agdxl6W.aMZEFiV.LHtDW9p/Fier8Wg0h3IMy/C', '3103246251', 'View/profilePhoto/1573700595-fff.jpg', '2019-11-30'),
(14, 'tatiana', 'zuluaga', 'CC', '1007391195', 'O+', 'kimzu1112@gmail.com', '$2y$10$rnERppQ6xdU0Zzyw5wXS4uhEY4TJu6fK2hBZNa6CKryyo/mrxWEaq', '3222688948', 'View/profilePhoto/1573703123-images (2).jpg', '2000-07-12'),
(15, 'nicolle ', 'barinas', 'CC', '1002537625', 'O+', 'nicole.barinas.123@gmail.com', '$2y$10$hubCGMpEjb9IwVnfaE8Mr.AI/09aR2OKgOKTXVcgvRaWD4LW1uAzu', '15', 'View/profilePhoto/1573703963-descarga.jpg', '2000-08-20'),
(24, 'Yiber Eulices', 'Lopez Choconta', 'CC', '10027', 'A+', 'yelopez24@misena.edu.co', '$2y$10$.53.jja9SlBQSF5fR6cpd.Lvq0v24oqYP5NTZvbGyi1zUBgbJGvv2', '311', 'View/profilePhoto/1574042322-descarga.jpg', '2019-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudienteestudiante`
--

CREATE TABLE `acudienteestudiante` (
  `IdAcudienteEstudiante` int(11) NOT NULL,
  `EstudianteIdEstudiante` int(50) NOT NULL,
  `AcudienteIdAcudiente` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acudienteestudiante`
--

INSERT INTO `acudienteestudiante` (`IdAcudienteEstudiante`, `EstudianteIdEstudiante`, `AcudienteIdAcudiente`) VALUES
(1, 1, 1),
(3, 3, 3),
(4, 4, 4),
(6, 5, 5),
(8, 6, 6),
(9, 7, 7),
(10, 8, 8),
(11, 9, 9),
(12, 10, 10),
(13, 11, 7),
(14, 12, 3),
(15, 3, 2),
(16, 5, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `IdAdministrador` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `TipoDocumento` enum('CC','TI','CE','RC') NOT NULL,
  `Documento` varchar(15) NOT NULL,
  `Rh` enum('AB+','AB-','A+','A-','B+','B-','O+','O-') NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `FechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`IdAdministrador`, `Nombre`, `Apellido`, `TipoDocumento`, `Documento`, `Rh`, `Correo`, `Password`, `Telefono`, `Foto`, `FechaNacimiento`) VALUES
(1, 'Yiber Eulices', 'Lopez Choconta', 'RC', '1002772342', 'AB+', 'yelopez24@misena.edu.co', '$2y$10$atmNT6eqMR4i.9MN3nmEAOnhZ8TMQwcju5BasfTdYeXucLd1qn8IK', '3114569408', 'View/profilePhoto/1573162092-profileImageCamera.jpg', '2000-01-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `IdAlerta` int(11) NOT NULL,
  `RolPersona` varchar(100) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Titulo` text NOT NULL,
  `Mensaje` text DEFAULT NULL,
  `Estado` enum('Visto','Sin Ver') DEFAULT 'Sin Ver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`IdAlerta`, `RolPersona`, `IdPersona`, `Fecha`, `Titulo`, `Mensaje`, `Estado`) VALUES
(2, 'Estudiante', 1, '2019-11-20', 'Llegada Tarde', 'muy tarde', 'Visto'),
(4, 'Profesor', 1, '2019-11-21', 'Llegada Tarde', 'Muy tarde', 'Visto'),
(5, 'Profesor', 1, '2019-11-06', 'Llegada Tarde', 'Mas temprano', 'Visto'),
(8, 'Administrador', 1, '2019-11-11', 'Llegada Tarde', '45678', 'Visto'),
(9, 'Estudiante', 5, '2019-11-12', 'Llegada Tarde', 'jyhtgrfed', 'Visto'),
(10, 'Acudiente', 5, '2019-11-12', 'Llegada Tarde', 'ghjklñ', 'Visto'),
(11, 'Estudiante', 4, '2019-10-17', 'Llegada Tarde', '223', 'Sin Ver'),
(14, 'Administrador', 1, '2019-11-17', 'Llegada Tarde', 'ghgjhkjlk', 'Visto'),
(15, 'Administrador', 1, '2019-11-17', 'Llegada Tarde', 'tyyy', 'Visto'),
(16, 'Administrador', 1, '2019-11-17', 'Jaja', 'dzsfdghh', 'Visto'),
(17, 'Administrador', 1, '2019-11-17', 'hgjklkñ', 'asdfg', 'Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `IdCalificacion` int(11) NOT NULL,
  `Periodo` enum('1','2','3','4') NOT NULL,
  `NotaAcumulativa` double NOT NULL,
  `NotaComportamental` double NOT NULL,
  `Evaluacion` double NOT NULL,
  `AutoEvaluacion` double NOT NULL,
  `MateriaIdMateria` int(11) NOT NULL,
  `EstudianteIdEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`IdCalificacion`, `Periodo`, `NotaAcumulativa`, `NotaComportamental`, `Evaluacion`, `AutoEvaluacion`, `MateriaIdMateria`, `EstudianteIdEstudiante`) VALUES
(1, '1', 3, 3.2, 3.4, 4, 11, 1),
(20, '1', 4.1, 4.2, 2.9, 3.5, 17, 5),
(23, '1', 3.5, 2.8, 4.9, 2.6, 18, 5),
(28, '2', 4.5, 3.8, 2.9, 3.2, 1, 5),
(29, '2', 3.5, 3.5, 3.5, 3.5, 1, 3),
(30, '3', 3.5, 3.5, 3.5, 3.5, 1, 20),
(31, '1', 4, 4.1, 4.2, 4.3, 1, 5),
(32, '3', 2, 2.1, 2.2, 2.3, 1, 5),
(35, '2', 4, 3, 2, 5, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `IdCurso` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Anio` int(11) NOT NULL,
  `GradoIdGrado` int(11) NOT NULL,
  `ProfesorIdProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`IdCurso`, `Nombre`, `Anio`, `GradoIdGrado`, `ProfesorIdProfesor`) VALUES
(3, 'C', 2019, 1, 3),
(4, 'A', 2019, 20, 4),
(5, 'B', 2019, 20, 6),
(6, 'C', 2019, 20, 3),
(7, 'A', 2019, 3, 3),
(8, 'B', 2019, 3, 4),
(9, 'A', 2019, 4, 27),
(10, 'C', 2019, 3, 6),
(11, 'A', 2019, 5, 6),
(12, 'B', 2019, 4, 4),
(13, 'B', 2019, 5, 6),
(14, 'A', 2019, 6, 27),
(15, 'B', 2019, 6, 4),
(16, 'A', 2019, 7, 4),
(17, 'B', 2109, 7, 6),
(18, 'A', 2019, 8, 4),
(19, 'A', 2019, 9, 27),
(20, 'B', 2019, 9, 4),
(21, 'A', 2019, 10, 10),
(22, 'B', 2019, 10, 8),
(23, 'A', 2019, 11, 2),
(24, 'B', 2019, 11, 11),
(25, 'A', 2019, 3, 1),
(26, 'C', 2019, 20, 2),
(32, 'B', 2019, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directivo`
--

CREATE TABLE `directivo` (
  `IdDirectivo` int(11) NOT NULL,
  `Nombre` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(70) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `Cargo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `directivo`
--

INSERT INTO `directivo` (`IdDirectivo`, `Nombre`, `Correo`, `Telefono`, `Cargo`) VALUES
(1, 'Danna', 'danna@gmail.com', '5678985', 'Coordinador'),
(2, 'Santiago', 'santiago@gmail.com', '65434', 'Coordinador'),
(3, 'Esteban ', 'estaban@gmail.com', '7654', ''),
(4, 'Angie', 'angie@gmail.com', '345678', ''),
(5, 'Esmeralda', 'esmeralda@gmail.com', '545678', ''),
(6, 'Yiber Eulices Lopez Choconta', 'yelopez24@misena.edu.co', '3114569408', 'Rector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int(11) NOT NULL,
  `Mision` text COLLATE utf8_spanish2_ci NOT NULL,
  `Vision` text COLLATE utf8_spanish2_ci NOT NULL,
  `QuienesSomos` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `Mision`, `Vision`, `QuienesSomos`) VALUES
(1, 'La Misión de la Biblioteca como la de la mayoría de las bibliotecas públicas esta ligada a los siguientes aspectos fundamentales:  · Fomentar y promover la lectura a toda la ciudadanía.  · Posibilitar el libre acceso a la información local, regional, nacional e internacional.  · Asegurar a toda la población el libre acceso a la información en sus diferentes formas de presentación de una manera amplia, actualizada y representativa.  · Estimular la participación activa y efectiva de la población en la vida nacional, incrementando así el papel de la biblioteca como instrumento facilitador del cambio social.  · Promover la formación de un lector crítico, selectivo y creativo desarrollando simultáneamente su motivación por la lectura y su habilidad de obtener experiencias gratificantes de tal actividad.', 'Que  en el 2015 la Biblioteca Pública de Sogamoso, sea  líder en servicios de información, extensión cultural y programas que promuevan la lectura y la escritura, en toda la región y sea reconocida a nivel Municipal, Departamental y Nacional por su eficiencia y calidad en los servicios que ofrece,  con capacidad de investigación, innovación, creatividad, qué este a la vanguardia de las nuevas tecnologías, con información actualizada, con recursos humanos, dinámicos, comprometidos, innovadores y con  espacios confortables, organizados, accesibles y flexibles para el servicio de la comunidad.', 'LA I.E. TÉCNICA INDUSTRIAL GUSTAVO JIMENEZ, cimenta la formación de sus educandos en 7 especialidades técnicas que ofrece a la comunidad sogamoseña y de la región. para Formar bachilleres técnicos industriales capacitados en, procedimientos de manufactura, procesos de producción, mantenimiento, seguridad industrial, capaces de innovar y afrontar los desafíos del mundo actual.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `IdEstudiante` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `TipoDocumento` enum('CC','TI','CE','NCS','PS','DNI','NIT') NOT NULL,
  `Documento` varchar(15) NOT NULL,
  `Rh` enum('AB+','AB-','A+','A-','B+','B-','O+','O-') NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `FechaNacimiento` date NOT NULL,
  `CursoIdCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`IdEstudiante`, `Nombre`, `Apellido`, `TipoDocumento`, `Documento`, `Rh`, `Correo`, `Password`, `Telefono`, `Foto`, `FechaNacimiento`, `CursoIdCurso`) VALUES
(1, 'Monica', 'Cabello', 'TI', '6745676', 'B-', 'monica@gmail.com', '$2y$10$zTUqkjFzL98CqDPH1GefO.24PEZhkhxp93cuPkwTKJ0f9Wo7m.oVW', '3125446569', 'View/profilePhoto/1573491398-descarga (4).jpg', '2005-03-17', 13),
(3, 'Doris Yasmin', 'Lopez Choconta', 'TI', '1002772', 'O-', 'DorisYasmin@school.com.co', '$2y$10$fnl0ZafXeOCaInJpR2YsOOlbU/m78is0nqD4q35tMtaikqeDIZRvq', '3105730264', 'View/profilePhoto/1573258584-rorck.jpg', '2019-11-13', 23),
(4, 'Laura', 'Puerto', 'TI', '3456786', 'B-', 'laura@gmail.com', '$2y$10$4679XD7b/NatlPKHRaYsm.8cnDWF5oNGRMpCbkX/ymKQJLWiAEwsq', '7654', 'View/profilePhoto/1573258595-0.jpg', '2002-06-12', 24),
(5, 'Richard', 'Perez Florez', 'CC', '7952745514', 'B+', 'rica@gmail.com', '$2y$10$u18.Ow42TYj3Hg5Y4anBmelatkgkQDpsTM0h/e3.LXGRPbcpkpFAa', '789452512', 'View/profilePhoto/1573258635-descarga (7).jpg', '1999-07-15', 23),
(6, 'Lorena', 'Linarez', 'TI', '345676', 'B+', 'lorena@gmail.com', '$2y$10$YYG4lVqSvOJwJ1B3iiGRYugYbJivdh9ZsGIyu9S/RL4g71G/SJuUS', '45678', 'View/profilePhoto/1573258693-7.jpg', '2010-06-15', 15),
(7, 'Jose', 'Sanchez', 'TI', '1254416583', 'B-', 'jose@gmail.com', '$2y$10$7BLLZl0zvKujmamCP53zWOmxOS9d8l7g61wsdAk/cYDbKk9pNNCcC', '124478845', 'View/profilePhoto/1573258694-450_1000.jpg', '2005-06-15', 6),
(8, 'Lizeth Andrea ', 'Nuñez Guevara', 'CC', '1000142785', 'A+', 'lizeth@gmail.com', '$2y$10$dwyAo7L9/lo6.ORvOgy9UuDqSo.TDKv0Jt6C6j5LpNKQzrpt0JDRe', '3203289787', 'View/profilePhoto/1573258698-Est.jpg', '2000-07-23', 24),
(9, 'Eulices', 'Tarazona Cuvides', 'TI', '45879212', 'O+', 'jcmp.marcos@hotmail.com', '$2y$10$BADG5hxAqvLKNIDS0QjMwuLDCd0KCRWqrRxGezYqBaqVx9GrhdldW', '3107645964', 'View/profilePhoto/1573258796-whatsapp.jpg', '2007-08-24', 32),
(10, 'Isabel', 'Guevara', 'CC', '654564564', 'AB-', 'isabel@gmail.com', '$2y$10$qdW.ho2aOKe7MI4eP6BA9OiAU3bMFnrmD5UzySraEnKc4y3O7tdBe', '3203289787', 'View/profilePhoto/1573258810-estud.jpg', '1999-10-25', 24),
(11, 'Viviana', 'Soto', 'CC', '564564', 'B-', 'Viviana@gmail.com', '$2y$10$GWi5bUL/e01H65GrtZghuuheN2.dBcdvcnM0JsB3Oeh1w3lhdqhHW', '87454545', 'View/profilePhoto/1573258876-estu.jpg', '2019-11-15', 24),
(12, 'Josefina', 'Beltran ', 'TI', '125485568', 'B+', 'josefina@gmail.com', '$2y$10$RKW0FJqa0dL1boc9wFZrAeOW4.pCwoxadAYN2Xs6ZF/ozgEyd1Vcy', '124457888', 'View/profilePhoto/1573259213-descarga (8).jpg', '2010-11-25', 3),
(19, 'Angelica', 'Santana', 'CC', '12345432', 'A+', 'angelica@gmail.com', '$2y$10$jaqOyAZJWfyoM82f1vY0JuUJvIRHspq66CrZN3oF8oSlARgici3xa', '7654321', 'View/profilePhoto/1573680261-aaeaaqaaaaaaaawuaaaajdu5zwm5ytrllwq0nwmtngyzoc1imgyxltk4odcxnzhlzjlh', '1993-06-27', 24),
(20, 'Juan', 'Garcia', 'CC', '1007388670', 'O+', 'jdgarcia076@misena.edu.co', '$2y$10$lcLsLHmpZrOWzp15T7nLfOSmxfvCIZ4d2SQkaiT4wHxsw/Rnj8VD2', '3045556784', 'View/profilePhoto/1573704165-fff.jpg', '2000-08-10', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `IdEvento` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Titulo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `Foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `Lugar` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`IdEvento`, `Fecha`, `Titulo`, `Descripcion`, `Foto`, `Lugar`) VALUES
(1, '2019-03-17', 'CELEBRACION DE LOS 45 AÑOS DE NUESTRO COLEGIO', 'El pasado sábado 17 de marzo se celebró en las instalaciones de nuestra I.E el cuadragésimo quinto a', 'View/eventoPhoto/1573256930-img_5af00db27467df6b098218b29088056b.jpg', 'Sede Principal'),
(2, '2019-06-12', 'DEPORTE Y CULTURA', 'La Escuela de Cultura y Deporte tiene como responsabilidad académica impartir cursos correspondiente', 'View/eventoPhoto/1573257063-descarga.jpg', 'Coliseo'),
(3, '2019-10-12', 'DIA DE LA RAZA', 'Día de la Raza es el nombre con el que se denomina la fiesta del 12 de octubre en conmemoración del ', 'View/eventoPhoto/1573257170-descarga (1).jpg', 'Audio Visuales'),
(4, '2019-07-20', 'DIA DE LA INDEPENDENCIA', 'El Día de la Independencia se celebra en Colombia el 20 de julio de cada año. La fecha recuerda la f', 'View/eventoPhoto/1573257245-descarga (2).jpg', 'Parque de la Villa'),
(5, '2019-04-23', 'DIA DEL IDIOMA', 'El Día del Idioma es una celebración que se realiza en homenaje a Miguel de Cervantes Saavedra, quie', 'View/eventoPhoto/1573257368-descarga (3).jpg', 'Colegio'),
(6, '2019-04-25', 'DIA DEL NIÑO', 'El Día del Niño es una celebración anual dedicada a la fraternidad y a la comprensión de la infancia', 'View/eventoPhoto/1573257467-descarga.png', 'Sede'),
(7, '2019-09-21', 'DIA DEL AMOR Y AMISTAD', 'El “Día del Amor y la Amistad” se celebra en Colombia el 21 de septiembre de 2019. Tiene lugar todos', 'View/eventoPhoto/1573257540-descarga (4).jpg', 'Coliseo'),
(8, '2019-05-10', 'DIA DE LA MADRE', 'El Día de la Madre es una festividad que se celebra en honor de las madres en gran parte del mundo, ', 'View/eventoPhoto/1573257636-asi-celebro-hollywood-el-dia-de-la-madre-parte-2-main-1526330125.jpg', 'Sede Principal'),
(9, '2019-06-21', 'DIA DEL PADRE', 'El Día del Padre es una celebración u homenaje dedicada a los padres. En general, la tradición catól', 'View/eventoPhoto/1573257690-descarga (5).jpg', 'Audio Visuales'),
(10, '2019-11-07', 'DIA DE LA FAMILIA', 'Desde la más tierna infancia, las familias son fundamentales en la educación de los hijos, así como ', 'View/eventoPhoto/1573257758-descarga (6).jpg', 'Salon Especial 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `IdGrado` int(11) NOT NULL,
  `Nivel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`IdGrado`, `Nivel`) VALUES
(1, 'Primero'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, 'Undecimo'),
(20, 'Segundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `IdInformacion` int(11) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `Ubicacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`IdInformacion`, `Descripcion`, `Ubicacion`, `Correo`, `Telefono`) VALUES
(1, 'La INSTITUCIÓN EDUCATIVA TÉCNICA INDUSTRIAL GUSTAVO JIMÉNEZ les da la bienvenida a su nueva plataforma académica de gestión académica, en la cual se podrá consultar información detallada de todo el proceso académico que involucra a personal administrativo, docente, acudientes y estudiantes para mejorar nuestro desempeño y nivel educativo.', 'Transversal 74 # 81 C – 05', 'gustavojimenez@gmail.com', '5933040');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `IdMateria` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`IdMateria`, `Nombre`, `Descripcion`) VALUES
(1, 'Sociales', 'Mapas'),
(2, 'Matemáticas', 'Cálculos'),
(3, 'Ciencias Naturales', 'Naturaleza'),
(4, 'Religión', 'Biblia'),
(6, 'Castellano', 'Idiomas'),
(7, 'Inglés', 'Bilingue'),
(8, 'Educación Física', 'Deporte'),
(9, 'Informática', 'Sistemas'),
(10, 'Química', 'Atomos'),
(11, 'Fisica', 'Formulas'),
(12, 'Artistica', 'Arte'),
(15, 'Etica', 'Valores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `IdMatricula` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Costo` decimal(10,0) NOT NULL,
  `GradoIdGrado` int(11) NOT NULL,
  `EstudianteIdEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`IdMatricula`, `Fecha`, `Costo`, `GradoIdGrado`, `EstudianteIdEstudiante`) VALUES
(1, '2019-11-13', '35000', 20, 12),
(2, '2019-11-23', '50000', 8, 4),
(3, '2019-11-07', '85000', 9, 9),
(4, '2019-11-11', '110000', 11, 11),
(5, '2019-11-20', '100000', 10, 12),
(6, '2019-11-15', '65000', 4, 3),
(7, '2019-11-19', '72000', 3, 6),
(8, '2019-11-08', '63000', 1, 1),
(10, '2019-11-03', '38000', 20, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `IdProfesor` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `TipoDocumento` enum('CC','TI','CE','NCS','PS','DNI','NIT') NOT NULL,
  `Documento` varchar(15) NOT NULL,
  `Rh` enum('AB+','AB-','A+','A-','B+','B-','O+','O-') NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `FechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`IdProfesor`, `Nombre`, `Apellido`, `TipoDocumento`, `Documento`, `Rh`, `Correo`, `Password`, `Telefono`, `Foto`, `FechaNacimiento`) VALUES
(1, 'Alejandra', 'Saenz', 'CC', '1052416409', 'O+', 'alejandra@gmail.com', '$2y$10$HilJ2kTurpSna1wO4O.rzOwsfY8P8794EOm7IUoJo/M3/mYQ0snkm', '1', 'View/profilePhoto/1573256392-images.jpg', '1999-08-20'),
(2, 'Karen ', 'Becerra', 'CC', '13568453', 'B-', 'karen@gmail.com', '$2y$10$hq9.KgnhpdHV558mhxYy3.O//WrvqeGER32RZP9XOfgMAX0Jgbed.', '2', 'View/profilePhoto/1573256352-images (2).jpg', '1998-07-16'),
(3, 'Diego', 'Pedraza', 'CC', '743564', 'B-', 'diego@gmail.com', '$2y$10$fjkX/I61BfFknTjrfWGblOQ8ZGfOIElwIiRfs3OGmd9p7BmbFwCX6', '76543654', 'View/profilePhoto/1573256474-images (1).jpg', '1992-06-17'),
(4, 'Sara', 'Valderrama', 'CC', '876543', 'B+', 'sara@gmail.com', '$2y$10$7rkOQj6DN2RuXpWqPHY6.OcDD3TBXjWHJbQmqgLfLZzyzLs95kTHK', '76543', 'View/profilePhoto/1573256543-27d63fc58dbcbaa2a954d56db628b346.jpg', '1997-05-12'),
(6, 'Valentina', 'Lopez', 'CC', '76544567', 'A-', 'valentina@gmail.com', '$2y$10$guccKa4ZU1dVwURdpIF3LuTLFH9S23YdjhJJgI/1ZWrEqtBn1SrYW', '6', 'View/profilePhoto/1573256778-6.jpg', '1996-02-06'),
(8, 'Samuel', 'Camargo', 'CC', '6787655', 'B-', 'samuel@gmail.com', '$2y$10$h3PbWRr.7EjODS6PuXu8F.wAtuzvXAgMxYDILSISle4VDsIu9Sc.S', '34567', 'View/profilePhoto/1573256986-fff.jpg', '1994-06-22'),
(9, 'Sebastian', 'Gonzales', 'CC', '87654', 'O+', 'sebastian@gmail.com', '$2y$10$Oa1Wq9U6l7CM3VQoqjInF.fIRiuwl1RnYllFZCox50MKXuTWidOAq', '76543', 'View/profilePhoto/1573257094-rtyu.png', '1996-06-11'),
(10, 'Sofia', 'Solano', 'CC', '67898765', 'B-', 'sofia@gmail.com', '$2y$10$8Pn4jbYOYwVYZptSpOY.ueUFbopbg.A3YUdaXE5gqW1LDe59lGcpS', '876543', 'View/profilePhoto/1573257183-images (3).jpg', '1995-07-12'),
(11, 'Eliana', 'Urrea', 'CC', '87654563', 'B+', 'eliana@gmail.com', '$2y$10$Rbm/VrUcRcqGRPblwqfKfukcqI.3NIpEYPdEo7asnFSi/3UWRsJ6S', '456789', 'View/profilePhoto/1573257259-4.jpg', '1998-02-11'),
(12, 'Lizeth Andrea', 'Nuñez Guevara', 'CC', '1000142785', 'A+', 'lababis14@gmail.com', '$2y$10$NFa0nwxQHOLEaVGW2ELKGef5k/U7Abd9q4MOXsURveQZOPOz3ZxhK', '3203289787', 'View/profilePhoto/1573678663-Screenshot_2019-08-31-22-44-56.png', '2000-07-23'),
(27, 'Pablo', 'Catañeda', 'CC', '8754323', 'A-', 'pablo@gmail.com', '$2y$10$QCZeCPkgxwCEIEMMhVg5SecCrkpmfv8nZzsNX.haCGHNtemL8JieW', '876543', 'View/profilePhoto/1573256890-rty.jpg', '1996-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesorcurso`
--

CREATE TABLE `profesorcurso` (
  `IdProfesorCurso` int(11) NOT NULL,
  `CursoIdCurso` int(11) NOT NULL,
  `ProfesorIdProfesor` int(11) NOT NULL,
  `MateriaIdMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesorcurso`
--

INSERT INTO `profesorcurso` (`IdProfesorCurso`, `CursoIdCurso`, `ProfesorIdProfesor`, `MateriaIdMateria`) VALUES
(1, 23, 1, 1),
(3, 32, 3, 3),
(4, 3, 4, 4),
(5, 6, 6, 15),
(6, 7, 27, 6),
(7, 4, 8, 7),
(8, 18, 9, 9),
(9, 14, 10, 12),
(10, 21, 11, 10),
(11, 13, 1, 2),
(13, 13, 3, 15),
(17, 23, 3, 3),
(18, 23, 8, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  ADD PRIMARY KEY (`IdAcudiente`),
  ADD UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  ADD UNIQUE KEY `Documento_UNIQUE` (`Documento`);

--
-- Indices de la tabla `acudienteestudiante`
--
ALTER TABLE `acudienteestudiante`
  ADD PRIMARY KEY (`IdAcudienteEstudiante`),
  ADD KEY `fk_Acudiente_Estudiante1_idx` (`EstudianteIdEstudiante`),
  ADD KEY `fk_Acudiente_Acudiente1_idx` (`AcudienteIdAcudiente`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`IdAdministrador`),
  ADD UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  ADD UNIQUE KEY `Documento_UNIQUE` (`Documento`);

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`IdAlerta`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`IdCalificacion`),
  ADD KEY `fk_PersonaMateria_Materia1_idx` (`MateriaIdMateria`),
  ADD KEY `fk_Calificacion_Estudiante1_idx` (`EstudianteIdEstudiante`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`IdCurso`),
  ADD KEY `fk_Curso_Grado1_idx` (`GradoIdGrado`),
  ADD KEY `fk_Curso_Profesor1_idx` (`ProfesorIdProfesor`);

--
-- Indices de la tabla `directivo`
--
ALTER TABLE `directivo`
  ADD PRIMARY KEY (`IdDirectivo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IdEmpresa`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`IdEstudiante`),
  ADD UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  ADD UNIQUE KEY `Documento_UNIQUE` (`Documento`),
  ADD KEY `fk_Persona_Curso1_idx` (`CursoIdCurso`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`IdEvento`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`IdGrado`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`IdInformacion`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`IdMateria`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`IdMatricula`),
  ADD KEY `fk_Matricula_Grado1_idx` (`GradoIdGrado`),
  ADD KEY `fk_Matricula_Estudiante1_idx` (`EstudianteIdEstudiante`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`IdProfesor`),
  ADD UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  ADD UNIQUE KEY `Documento_UNIQUE` (`Documento`);

--
-- Indices de la tabla `profesorcurso`
--
ALTER TABLE `profesorcurso`
  ADD PRIMARY KEY (`IdProfesorCurso`),
  ADD KEY `fk_ProfesorCurso_Curso1_idx` (`CursoIdCurso`),
  ADD KEY `fk_ProfesorCurso_Profesor1_idx` (`ProfesorIdProfesor`),
  ADD KEY `MateriaIdMateria` (`MateriaIdMateria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  MODIFY `IdAcudiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `acudienteestudiante`
--
ALTER TABLE `acudienteestudiante`
  MODIFY `IdAcudienteEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IdAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `IdAlerta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `IdCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `directivo`
--
ALTER TABLE `directivo`
  MODIFY `IdDirectivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `IdEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `IdGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `IdInformacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `IdMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `IdMatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `IdProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `profesorcurso`
--
ALTER TABLE `profesorcurso`
  MODIFY `IdProfesorCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acudienteestudiante`
--
ALTER TABLE `acudienteestudiante`
  ADD CONSTRAINT `acudienteestudiante_ibfk_1` FOREIGN KEY (`AcudienteIdAcudiente`) REFERENCES `acudiente` (`IdAcudiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acudienteestudiante_ibfk_2` FOREIGN KEY (`EstudianteIdEstudiante`) REFERENCES `estudiante` (`IdEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`EstudianteIdEstudiante`) REFERENCES `estudiante` (`IdEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`MateriaIdMateria`) REFERENCES `profesorcurso` (`IdProfesorCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_Curso_Grado1` FOREIGN KEY (`GradoIdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Curso_Profesor1` FOREIGN KEY (`ProfesorIdProfesor`) REFERENCES `profesor` (`IdProfesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`CursoIdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_Matricula_Estudiante1` FOREIGN KEY (`EstudianteIdEstudiante`) REFERENCES `estudiante` (`IdEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Matricula_Grado1` FOREIGN KEY (`GradoIdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesorcurso`
--
ALTER TABLE `profesorcurso`
  ADD CONSTRAINT `fk_ProfesorCurso_Curso1` FOREIGN KEY (`CursoIdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ProfesorCurso_Profesor1` FOREIGN KEY (`ProfesorIdProfesor`) REFERENCES `profesor` (`IdProfesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesorcurso_ibfk_1` FOREIGN KEY (`MateriaIdMateria`) REFERENCES `materia` (`IdMateria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
