-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 00:15:18
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
(2, 'Karen Alejandra', 'Saenz Becerra', 'CC', '1097635473', 'O+', 'alejandra@gmail.com', '$2y$10$QkDLjlecFe1NXdm3XTNyCexaxXfQor7QUbDD0oIoRo7dy6k2FaHWG', '2', '../View/profilePhoto/1569422343-a.jpg', '1999-03-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudienteestudiante`
--

CREATE TABLE `acudienteestudiante` (
  `IdAcudienteEstudiante` int(11) NOT NULL,
  `EstudianteIdEstudiante` varchar(50) NOT NULL,
  `AcudienteIdAcudiente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acudienteestudiante`
--

INSERT INTO `acudienteestudiante` (`IdAcudienteEstudiante`, `EstudianteIdEstudiante`, `AcudienteIdAcudiente`) VALUES
(1, 'lorena', 'sara'),
(4, 'karen', 'alejandra'),
(5, '4', '4');

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
(4, 'Yiber Eulices', 'Lopez Choconta', 'RC', '1002772342', 'AB+', 'yelopez24@misena.edu.co', '$2y$10$1Mt6vhhCARZFYvRaovHEVuwL1lDLDqrL5EyYxu7hUU7pTvP/fSGQe', '4', '../View/profilePhoto/1573162092-profileImageCamera.jpg', '2019-09-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `IdAlerta` int(11) NOT NULL,
  `RolPersona` varchar(100) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Titulo` text NOT NULL,
  `Mensaje` varchar(45) DEFAULT NULL,
  `Estado` enum('Visto','Sin Ver') DEFAULT 'Sin Ver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `IdCalificacion` int(11) NOT NULL,
  `Periodo` enum('1','2','3','4') NOT NULL,
  `NotaAcumulativa` decimal(10,0) NOT NULL,
  `NotaComportamental` decimal(10,0) NOT NULL,
  `Evaluacion` decimal(10,0) NOT NULL,
  `AutoEvaluacion` decimal(10,0) NOT NULL,
  `MateriaIdMateria` int(11) NOT NULL,
  `EstudianteIdEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`IdCalificacion`, `Periodo`, `NotaAcumulativa`, `NotaComportamental`, `Evaluacion`, `AutoEvaluacion`, `MateriaIdMateria`, `EstudianteIdEstudiante`) VALUES
(2, '3', '345678', '4567', '456', '4567', 4, 4);

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
(2, 'A', 2019, 2, 1),
(3, 'B', 2019, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directivo`
--

CREATE TABLE `directivo` (
  `IdDirectivo` int(11) NOT NULL,
  `Nombre` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(70) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `directivo`
--

INSERT INTO `directivo` (`IdDirectivo`, `Nombre`, `Correo`, `Telefono`) VALUES
(2, 'Karen Alejandra Saenz Becerra', 'alejandra@gmail.com', '345678'),
(3, 'Yiber Eulices Lopez Choconta', 'yelopez24@misena.edu.co', '3114569408');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int(11) NOT NULL,
  `Mision` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `Vision` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `QuienesSomos` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `Mision`, `Vision`, `QuienesSomos`) VALUES
(1, 'Somos una Institución Educativa de índole cooperativo que forma en la excelencia a estudiantes de pre escolar,  primaria y bachillerato del municipio y la provincia del Sugamuxi en sus dimensiones, Ética, Intelectual, Ambiental, Comunicativa, Física, Socio‐afectiva, y Artística; basados en una metodología innovadora acorde con los avances científicos, tecnológicos y humanistas, apoyados en un seleccionado equipó humano y en los principios de Amor, Libertad, Disciplina, Responsabilidad, la Urbanidad, y Cooperativismo, que le permitan al estudiante afrontar los retos que se le presenten en su desempeño futuro.', 'En el año 2020, el Colegio Cooperativo Reyes Patria, se consolidará como una de las mejores Instituciones Educativas del Departamento de Boyacá, a través de la educación dinámica por competencias, articulado con una metodología Constructivista y Conceptual, que permitirá lograr la excelencia educativa obteniendo posicionamiento y reconocimiento en el nivel A+ (Muy Superior) en las Prueba Saber 3°, 5°, 9 ° y 11° ante el ICFES, los primeros lugares en Sogamoso en el Índice Sintético de Calidad Educativa mediante formación integral, bajo criterios de calidad certiﬁcada y con procesos de investigación cientiﬁca y tecnológica.', 'Somos un Colegio que desde hace 40 años imparte una educación integral con miras al mejoramiento de la sociedad. Somos una empresa familiar que ha innovado en sus prácticas pedagógicas buscando siempre el bienestar y el desarrollo de nuestros estudiantes. ');

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
(1, 'karen', 'saenz', 'CC', '10552416412', 'O+', 'alejandra@gmailcom', '$2y$10$fUYIpdn6gMcZT3dsTcMJZumv5Yj5OmHQ7wcT3BtxBf0qBT2bLDhRO', '3125446569', '../View/profilePhoto/1572555162-2.jpg', '1999-08-20', 2345),
(2, 'lizeth', 'wertyui', 'CC', '2345678', 'O-', 'rt@gmail.com', '$2y$10$o6GlWQqfELyMPxd0.GXeduYqpDeuvUGnkh3e3VjF8SoDnGt6CKheq', '345678', '../View/profilePhoto/1572555112-6.jpg', '2019-10-11', 456),
(3, 'Carlos ', 'Daza', 'CC', '10027723466', 'O+', 'dazacastrocarlosdavid@gmail.com', '$2y$10$z4RFFkttj0U928vIWjX.bOo20bQmNnQSstAYYedh/g3/jR3hSHwAm', '3185290241', '../View/profilePhoto/1573162341-descarga.jpg', '2019-11-22', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `IdEvento` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Titulo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `Lugar` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`IdEvento`, `Fecha`, `Titulo`, `Descripcion`, `Foto`, `Lugar`) VALUES
(1, '2019-10-10', 'Reunion Padres de Familia', 'La reunión sera en el Aula Multifuncional', '../View/eventoPhoto/1573164728-374168.jpg', 'Tota - Boyaca');

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
(2, 'Once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `IdInformacion` int(11) NOT NULL,
  `Descripcion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `Ubicacion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`IdInformacion`, `Descripcion`, `Ubicacion`, `Correo`, `Telefono`) VALUES
(1, 'holanda que hizo', 'Tota - Boyaca', 'lizeth@gmaail.com', '567890');

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
(1, 'Matematicas', 'Algebra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `IdMatricula` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Costo` decimal(10,0) NOT NULL,
  `GradoIdGrado` int(11) NOT NULL,
  `EstudianteIdEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`IdMatricula`, `Fecha`, `Costo`, `GradoIdGrado`, `EstudianteIdEstudiante`) VALUES
(1, '2019-11-15 00:00:00', '123', 2, 3);

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
(1, 'Lizeth Andrea', 'Nuñwz Guevara', 'CC', '1000142785', 'A+', 'lababis14@gmail.com', '$2y$10$n931tsUAQ639Cqs5F9hlEOjrvHRZxq4dlAbbP7OXzSKaE3xhURgfK', '1', '../View/profilePhoto/1573164474-descarga (1).jpg', '2000-07-23');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesormateria`
--

CREATE TABLE `profesormateria` (
  `IdProfesorMateria` int(11) NOT NULL,
  `MateriaIdMateria` int(11) NOT NULL,
  `ProfesorIdProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `profesormateria`
--
ALTER TABLE `profesormateria`
  ADD PRIMARY KEY (`IdProfesorMateria`),
  ADD KEY `fk_PersonaMateria_Materia1_idx` (`MateriaIdMateria`),
  ADD KEY `fk_ProfesorMateria_Profesor1_idx` (`ProfesorIdProfesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  MODIFY `IdAcudiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `acudienteestudiante`
--
ALTER TABLE `acudienteestudiante`
  MODIFY `IdAcudienteEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IdAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `IdAlerta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `IdCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `directivo`
--
ALTER TABLE `directivo`
  MODIFY `IdDirectivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `IdEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `IdGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `IdInformacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `IdMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `IdMatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `IdProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesorcurso`
--
ALTER TABLE `profesorcurso`
  MODIFY `IdProfesorCurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesormateria`
--
ALTER TABLE `profesormateria`
  MODIFY `IdProfesorMateria` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_Curso_Grado1` FOREIGN KEY (`GradoIdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Curso_Profesor1` FOREIGN KEY (`ProfesorIdProfesor`) REFERENCES `profesor` (`IdProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_Matricula_Estudiante1` FOREIGN KEY (`EstudianteIdEstudiante`) REFERENCES `estudiante` (`IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matricula_Grado1` FOREIGN KEY (`GradoIdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesorcurso`
--
ALTER TABLE `profesorcurso`
  ADD CONSTRAINT `fk_ProfesorCurso_Curso1` FOREIGN KEY (`CursoIdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ProfesorCurso_Profesor1` FOREIGN KEY (`ProfesorIdProfesor`) REFERENCES `profesor` (`IdProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profesorcurso_ibfk_1` FOREIGN KEY (`MateriaIdMateria`) REFERENCES `materia` (`IdMateria`);

--
-- Filtros para la tabla `profesormateria`
--
ALTER TABLE `profesormateria`
  ADD CONSTRAINT `fk_PersonaMateria_Materia1` FOREIGN KEY (`MateriaIdMateria`) REFERENCES `materia` (`IdMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ProfesorMateria_Profesor1` FOREIGN KEY (`ProfesorIdProfesor`) REFERENCES `profesor` (`IdProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
