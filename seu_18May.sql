-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2024 a las 18:50:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seu`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_asistencia` (IN `nc` VARCHAR(10), IN `id` INT)   begin
if exists(select*from alumnos where noCtrl=nc) then
update alumnos_actividad set ASISTENCIA=1 WHERE noCtrl=nc and id_EVENTO=id;
SELECT 'REGISTRO HECHO CON EXITO' AS MSJ;
end if;
if not exists(select*from alumnos where noCtrl=nc) then
SELECT 'NÚMERO DE CONTROL INVALIDO' AS MSJ;
end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inicio` (IN `nc` VARCHAR(10), IN `contra` VARCHAR(20))   BEGIN
 	DECLARE RE INT DEFAULT 0;
DECLARE regreso INT DEFAULT 0;
   
    SELECT COUNT(*) INTO RE FROM alumnos a
    WHERE a.noCtrl = nc and a.NIP = MD5(contra);
    
    if(re = 1)THEN
    	set regreso = 1;
    else
    	set regreso = 0;
    end if;
    
    if(regreso = 0)then
    	SELECT COUNT(*) INTO RE FROM personal p
    	WHERE p.id_Personal = nc and p.CONTRASEÑA = MD5(contra);
    		IF(RE = 1)THEN
            	IF(EXISTS(SELECT * FROM personal  P WHERE nc LIKE 'admin')) THEN
                	SET regreso = 2;
                ELSE
                	SET regreso = 3;
				END IF;
             END IF;
     END IF;
     SELECT regreso;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inscribir` (IN `nc` VARCHAR(10), IN `id` INT)   begin
declare asis int;
set asis=(select count(*) from actividad a inner join alumnos_actividad aa on(aa.id_EVENTO=a.id_ACTIVIDAD) inner join alumnos alu on(alu.noCtrl=aa.noCtrl) where aa.ASISTENCIA=1 and a.id_ACTIVIDAD=2);
if asis<(select capacidad from actividad where id_ACTIVIDAD=id) then
INSERT INTO alumnos_actividad VALUES(id,nc,0,0);
SELECT 'REGISTRO HECHO CON EXITO' AS MSJ;
else
SELECT 'CUPO LLENO' AS MSJ;
end if;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_ACTIVIDAD` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `HORARIO` time DEFAULT NULL,
  `LUGAR` varchar(50) DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL,
  `ASISTENCIA` bit(1) DEFAULT NULL,
  `ASISTENCIA_OB` bit(1) DEFAULT NULL,
  `VISIBILIDAD` bit(1) DEFAULT NULL,
  `Expositor_idExpositor` int(11) NOT NULL,
  `TIPO` char(1) DEFAULT NULL,
  `CARRERA` char(4) DEFAULT NULL,
  `INSCRITOS` int(11) DEFAULT NULL,
  `HORA_FIN` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_ACTIVIDAD`, `NOMBRE`, `DESCRIPCION`, `FECHA`, `HORARIO`, `LUGAR`, `CAPACIDAD`, `ASISTENCIA`, `ASISTENCIA_OB`, `VISIBILIDAD`, `Expositor_idExpositor`, `TIPO`, `CARRERA`, `INSCRITOS`, `HORA_FIN`) VALUES
(1, 'Taller de Programación', 'Aprende los fundamentos de la programación en Python.', '2024-05-10', '10:00:00', 'Aula 101', 30, b'0', b'1', b'1', 1, 'A', 'ISC', 50, '11:00:00'),
(2, 'Conferencia sobre Energía Renovable', 'Descubre las últimas innovaciones en energía solar y eólica.', '2024-05-18', '14:00:00', 'Auditorio Principal', 50, b'0', b'0', b'0', 2, 'A', 'IE', 150, '15:00:00'),
(3, 'Charla de Emprendimiento', 'Conoce experiencias de emprendedores exitosos.', '2024-05-20', '16:00:00', 'Sala de Conferencias', 40, b'0', b'0', b'1', 3, 'T', 'IGE', 300, '17:00:00'),
(8, 'Conferencia sobre la salud mental', 'Conferencia dedidacada a la salud mental de los alumnos del Tecnologico de tepic de Tepic.', '2024-05-18', '12:00:00', 'SALA DE CONFERENCIAS', 100, b'1', b'1', b'1', 2, 'T', 'IGE', 30, '13:00:00'),
(9, 'Taller de Desarrollo de Videojuegos', 'Aprende los fundamentos basicos para el desarrollo de videojuegos en Godot.', '2024-05-29', '12:00:00', 'LCSO', 32, b'1', b'0', b'1', 1, 'A', 'ISC', 10, '16:00:00'),
(10, 'Taller de Conexiones Eléctricas', 'Taller dedicado al desarrollo de conexiones electricas domesticas.', '2024-05-21', '10:00:00', 'J2', 35, b'1', b'0', b'1', 3, 'A', 'IGE', 15, '14:00:00'),
(11, 'Mercado Actual', 'Conferencia sobre el Estado Actual del Mercado.', '2024-05-26', '10:00:00', 'SALA DE CONFERENCIAS', 100, b'1', b'1', b'1', 2, 'A', 'IGE', 60, '11:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `noCtrl` varchar(10) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDOPAT` varchar(50) DEFAULT NULL,
  `APELLIDOMAT` varchar(30) DEFAULT NULL,
  `CARRERA` char(4) NOT NULL,
  `SEMESTRE` tinyint(4) DEFAULT NULL,
  `NIP` varchar(50) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`noCtrl`, `NOMBRE`, `APELLIDOPAT`, `APELLIDOMAT`, `CARRERA`, `SEMESTRE`, `NIP`, `CORREO`) VALUES
('1801001001', 'Luis', 'García', 'Martínez', 'ISC', 2, '81dc9bdb52d04dc20036dbd8313ed055', 'luis.garcia@example.com'),
('1801002002', 'Ana', 'Hernández', 'López', 'IGE', 4, '674f3c2c1a8a6f90461e8a66fb5550ba', 'ana.hernandez@example.com'),
('1801003003', 'Pedro', 'Pérez', 'González', 'IE', 6, 'c5c53759e4dd1bfe8b3dcfec37d0ea72', 'pedro.perez@example.com');

--
-- Disparadores `alumnos`
--
DELIMITER $$
CREATE TRIGGER `before_alumnos_insert` BEFORE INSERT ON `alumnos` FOR EACH ROW BEGIN
    SET NEW.NIP = MD5(NEW.NIP);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_alumnos_update` BEFORE UPDATE ON `alumnos` FOR EACH ROW BEGIN
    IF OLD.NIP != NEW.NIP THEN
        SET NEW.NIP = MD5(NEW.NIP);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_actividad`
--

CREATE TABLE `alumnos_actividad` (
  `id_EVENTO` int(11) NOT NULL,
  `noCtrl` varchar(10) NOT NULL,
  `ASISTENCIA` bit(1) DEFAULT NULL,
  `cantidad_Estrellas` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos_actividad`
--

INSERT INTO `alumnos_actividad` (`id_EVENTO`, `noCtrl`, `ASISTENCIA`, `cantidad_Estrellas`) VALUES
(1, '1801001001', b'1', 5),
(1, '1801002002', b'1', 4),
(2, '1801001001', b'1', 3),
(2, '1801003003', b'1', 4),
(3, '1801002002', b'1', 5),
(3, '1801003003', b'1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_CARRERA` char(4) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_CARRERA`, `NOMBRE`) VALUES
('ARQ', 'Arquitectura'),
('IBQ', 'Ingeniería Bioquímica'),
('IE', 'Ingeniería Electrónica'),
('IGE', 'Ingeniería en Gestión Empresarial'),
('IM', 'Ingeniería Mecánica'),
('IQ', 'Ingeniería Química'),
('ISC', 'Ingeniería en Sistemas Computacionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes_alumnos`
--

CREATE TABLE `docentes_alumnos` (
  `ALUMNOS_noCtrl` varchar(10) NOT NULL,
  `PERSONAL_id_PERSONAL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes_alumnos`
--

INSERT INTO `docentes_alumnos` (`ALUMNOS_noCtrl`, `PERSONAL_id_PERSONAL`) VALUES
('1801001001', 'profesor1'),
('1801002002', 'profesor1'),
('1801001001', 'profesor2'),
('1801002002', 'profesor2'),
('1801003003', 'profesor2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_EVENTO` int(11) NOT NULL,
  `INICIO` date DEFAULT NULL,
  `FIN` date DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `VISIBILIDAD` bit(1) DEFAULT NULL,
  `CARRERA` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_EVENTO`, `INICIO`, `FIN`, `NOMBRE`, `VISIBILIDAD`, `CARRERA`) VALUES
(1, '2024-04-10', '2024-04-12', 'Semana de la Computación', b'1', 'ISC'),
(2, '2024-04-15', '2024-04-17', 'Congreso de Ingeniería Eléctrica', b'1', 'IGE'),
(3, '2024-04-20', '2024-04-22', 'Foro de Emprendimiento', b'1', 'IGE'),
(4, '2024-05-26', '2024-05-30', 'Salud Mental y Fisica', b'1', 'IGE');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `eventoact`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `eventoact` (
`id_EVENTO` int(11)
,`ID` int(11)
,`nomact` varchar(50)
,`HORARIO` time
,`LUGAR` varchar(50)
,`CAPACIDAD` int(11)
,`nomex` varchar(50)
,`TIPO` char(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_actividad`
--

CREATE TABLE `evento_actividad` (
  `Evento_id_EVENTO` int(11) NOT NULL,
  `ACTIVIDAD_id_ACTIVIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento_actividad`
--

INSERT INTO `evento_actividad` (`Evento_id_EVENTO`, `ACTIVIDAD_id_ACTIVIDAD`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 8),
(1, 9),
(2, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expositor`
--

CREATE TABLE `expositor` (
  `idExpositor` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Telefono` char(13) DEFAULT NULL,
  `Facebook` varchar(30) DEFAULT NULL,
  `Instagram` varchar(30) DEFAULT NULL,
  `LinkedIn` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `expositor`
--

INSERT INTO `expositor` (`idExpositor`, `Nombre`, `Telefono`, `Facebook`, `Instagram`, `LinkedIn`) VALUES
(1, 'Juan Pérez', '1234567890', 'juan.perez', 'juan.perez', 'juan.perez'),
(2, 'María González', '9876543210', 'maria.gonzalez', 'maria.gonzalez', 'maria.gonzalez'),
(3, 'Carlos López', '5555555555', 'carlos.lopez', 'carlos.lopez', 'carlos.lopez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_PERSONAL` varchar(30) NOT NULL,
  `NOMBRES` varchar(50) DEFAULT NULL,
  `APELLIDOS` varchar(50) DEFAULT NULL,
  `CONTRASEÑA` varchar(50) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `ROLES_ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_PERSONAL`, `NOMBRES`, `APELLIDOS`, `CONTRASEÑA`, `CORREO`, `ROLES_ID_ROL`) VALUES
('admin', 'Admin', 'Admin', '0192023a7bbd73250516f069df18b500', 'admin@example.com', 1),
('profesor1', 'José', 'Martínez', 'ac8c0826d26ace7d67486fa3ef3c0290', 'jose.martinez@example.com', 2),
('profesor2', 'María', 'López', 'f8461b554d59b3014e8ff5165dc62fac', 'maria.lopez@example.com', 2);

--
-- Disparadores `personal`
--
DELIMITER $$
CREATE TRIGGER `before_personal_insert` BEFORE INSERT ON `personal` FOR EACH ROW BEGIN
    SET NEW.CONTRASEÑA = MD5(NEW.CONTRASEÑA);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_personal_update` BEFORE UPDATE ON `personal` FOR EACH ROW BEGIN
    IF OLD.CONTRASEÑA != NEW.CONTRASEÑA THEN
        SET NEW.CONTRASEÑA = MD5(NEW.CONTRASEÑA);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_actividad`
--

CREATE TABLE `personal_actividad` (
  `id_PERSONAL_R` varchar(30) NOT NULL,
  `id_ACTIVIDAD_R` int(11) NOT NULL,
  `ASISTENCIA` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal_actividad`
--

INSERT INTO `personal_actividad` (`id_PERSONAL_R`, `id_ACTIVIDAD_R`, `ASISTENCIA`) VALUES
('admin', 1, b'1'),
('profesor1', 2, b'1'),
('profesor2', 3, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_ROL`, `NOMBRE`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Estudiante'),
(4, 'Invitado');

--
-- Estructura para TIPO_ACTIVIDADES 
--

CREATE TABLE `TIPO_ACTIVIDADES` (
	`TIPO_AC` CHAR(1) ,
	`NOMBRE_ACTIVIDAD` CHAR(19)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Insersion de Tipo_actividades
--

insert into `TIPO_ACTIVIDADES` (`TIPO_AC`, `NOMBRE_ACTIVIDAD`) VALUES 
('T', 'Tutoria'),
('A', 'Academica'),
('D', 'Deportiva'),
('O', 'Otros');


--
-- Creacion tabla notificaciones
--

CREATE TABLE NOTIFICACIONES_ALUMNOS(
	`ID` INT(11) NOT NULL,
	`noCtrl` varchar(10) NOT NULL,
	`LEIDA` bit(1) NOT NULL,
	`FECHA` date NOT NULL 
	)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `NOTIFICACIONES_PERSONAL` (
  `id_PERSONAL_R` varchar(30) NOT NULL,
  `id_ACTIVIDAD_R` int(11) NOT NULL,
  `LEIDA` bit(1) NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura para la vista `eventoact`
--
DROP TABLE IF EXISTS `eventoact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eventoact`  AS SELECT `e`.`id_EVENTO` AS `id_EVENTO`, `a`.`id_ACTIVIDAD` AS `ID`, `a`.`NOMBRE` AS `nomact`, `a`.`HORARIO` AS `HORARIO`, `a`.`LUGAR` AS `LUGAR`, `a`.`CAPACIDAD` AS `CAPACIDAD`, `ex`.`Nombre` AS `nomex`, `a`.`TIPO` AS `TIPO` FROM (((`actividad` `a` join `evento_actividad` `ea` on(`a`.`id_ACTIVIDAD` = `ea`.`ACTIVIDAD_id_ACTIVIDAD`)) join `evento` `e` on(`ea`.`Evento_id_EVENTO` = `e`.`id_EVENTO`)) join `expositor` `ex` on(`a`.`Expositor_idExpositor` = `ex`.`idExpositor`)) ;

--
-- Índices para tablas volcadas
--

--
-- Índices para tabla 'NOTIFICACIONES_ALUMNOS'
--
ALTER TABLE NOTIFICACIONES_ALUMNOS ADD PRIMARY KEY (`ID`);
ALTER TABLE `NOTIFICACIONES_ALUMNOS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Indices de la tabla 'TipoActividades'
--
alter table `TIPO_ACTIVIDADES` add primary key (`TIPO_AC`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_ACTIVIDAD`),
  ADD KEY `ACTIVIDAD_CARRERA` (`CARRERA`),
  ADD KEY `Expositor_ACTIVIDAD` (`Expositor_idExpositor`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`noCtrl`),
  ADD KEY `Alumnos_CARRERA` (`CARRERA`);

--
-- Indices de la tabla `alumnos_actividad`
--
ALTER TABLE `alumnos_actividad`
  ADD PRIMARY KEY (`id_EVENTO`,`noCtrl`),
  ADD KEY `Alumnos_Actividad_Alumnos` (`noCtrl`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_CARRERA`);

--
-- Indices de la tabla `docentes_alumnos`
--
ALTER TABLE `docentes_alumnos`
  ADD KEY `ALUMNOS_DOCENTES_ALUMNOS` (`ALUMNOS_noCtrl`),
  ADD KEY `PERSONAL_DOCENTES_ALUMNOS` (`PERSONAL_id_PERSONAL`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_EVENTO`),
  ADD KEY `EVENTO_CARRERA` (`CARRERA`);

--
-- Indices de la tabla `evento_actividad`
--
ALTER TABLE `evento_actividad`
  ADD PRIMARY KEY (`ACTIVIDAD_id_ACTIVIDAD`,`Evento_id_EVENTO`),
  ADD KEY `Eventoi_Actividadi` (`Evento_id_EVENTO`);

--
-- Indices de la tabla `expositor`
--
ALTER TABLE `expositor`
  ADD PRIMARY KEY (`idExpositor`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_PERSONAL`),
  ADD KEY `ID_ROL_ROLES_ID_ROL` (`ROLES_ID_ROL`);

--
-- Indices de la tabla `personal_actividad`
--
ALTER TABLE `personal_actividad`
  ADD PRIMARY KEY (`id_ACTIVIDAD_R`,`id_PERSONAL_R`),
  ADD KEY `Personal_actividad_Personal` (`id_PERSONAL_R`);


--
-- Indices de la tabla `NOTIFICACIONES_PERSONAL`
--
ALTER TABLE `NOTIFICACIONES_PERSONAL`
  ADD PRIMARY KEY (`id_ACTIVIDAD_R`,`id_PERSONAL_R`),
  ADD KEY `Personal_actividad_NOTIFICA` (`id_PERSONAL_R`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_ACTIVIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_EVENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `expositor`
--
ALTER TABLE `expositor`
  MODIFY `idExpositor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `ACTIVIDAD_CARRERA` FOREIGN KEY (`CARRERA`) REFERENCES `carrera` (`ID_CARRERA`),
  ADD CONSTRAINT `Expositor_ACTIVIDAD` FOREIGN KEY (`Expositor_idExpositor`) REFERENCES `expositor` (`idExpositor`),
  ADD CONSTRAINT `TIPOS_ACTIVIDADES` FOREIGN KEY (`TIPO`) REFERENCES `TIPO_ACTIVIDADES` (`TIPO_AC`);

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `Alumnos_CARRERA` FOREIGN KEY (`CARRERA`) REFERENCES `carrera` (`ID_CARRERA`);

--
-- Filtros para la tabla `alumnos_actividad`
--
ALTER TABLE `alumnos_actividad`
  ADD CONSTRAINT `ACTIVIDAD_EVENTO` FOREIGN KEY (`id_EVENTO`) REFERENCES `actividad` (`id_ACTIVIDAD`),
  ADD CONSTRAINT `Alumnos_Actividad_Alumnos` FOREIGN KEY (`noCtrl`) REFERENCES `alumnos` (`noCtrl`);

--
-- Filtros para la tabla `docentes_alumnos`
--
ALTER TABLE `docentes_alumnos`
  ADD CONSTRAINT `ALUMNOS_DOCENTES_ALUMNOS` FOREIGN KEY (`ALUMNOS_noCtrl`) REFERENCES `alumnos` (`noCtrl`),
  ADD CONSTRAINT `PERSONAL_DOCENTES_ALUMNOS` FOREIGN KEY (`PERSONAL_id_PERSONAL`) REFERENCES `personal` (`id_PERSONAL`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `EVENTO_CARRERA` FOREIGN KEY (`CARRERA`) REFERENCES `carrera` (`ID_CARRERA`);

--
-- Filtros para la tabla `evento_actividad`
--
ALTER TABLE `evento_actividad`
  ADD CONSTRAINT `EVENTO_ACTIVIDAD_ACTIVIDAD` FOREIGN KEY (`ACTIVIDAD_id_ACTIVIDAD`) REFERENCES `actividad` (`id_ACTIVIDAD`),
  ADD CONSTRAINT `Eventoi_Actividadi` FOREIGN KEY (`Evento_id_EVENTO`) REFERENCES `evento` (`id_EVENTO`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `ID_ROL_ROLES_ID_ROL` FOREIGN KEY (`ROLES_ID_ROL`) REFERENCES `roles` (`ID_ROL`);

--
-- Filtros para la tabla `personal_actividad`
--
ALTER TABLE `personal_actividad`
  ADD CONSTRAINT `Personal_actividad_Personal` FOREIGN KEY (`id_PERSONAL_R`) REFERENCES `personal` (`id_PERSONAL`),
  ADD CONSTRAINT `personal_actividad_actividad` FOREIGN KEY (`id_ACTIVIDAD_R`) REFERENCES `actividad` (`id_ACTIVIDAD`);


ALTER TABLE `NOTIFICACIONES_PERSONAL`
  ADD CONSTRAINT `Personal_NOTIFICACIONES_Personal` FOREIGN KEY (`id_PERSONAL_R`) REFERENCES `personal` (`id_PERSONAL`),
  ADD CONSTRAINT `personal_NOTIFICACIONES_actividad` FOREIGN KEY (`id_ACTIVIDAD_R`) REFERENCES `actividad` (`id_ACTIVIDAD`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
