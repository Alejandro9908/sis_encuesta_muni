-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-09-2021 a las 07:04:49
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_encuesta_muni`
--

--
-- Volcado de datos para la tabla `tbl_alimentacion`
--

INSERT INTO `tbl_alimentacion` (`id_alimentacion`, `id_familia`, `carne_res`, `carne_pollo`, `carne_cerdo`, `carne_pescado`, `leche`, `cereales`, `huevo`, `frutas`, `verduras`, `leguminosas`) VALUES
(50, 74, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(51, 75, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(52, 76, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(53, 77, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(54, 78, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(55, 79, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3);

--
-- Volcado de datos para la tabla `tbl_boleta`
--

INSERT INTO `tbl_boleta` (`id_boleta`, `evaluador`, `observaciones`, `fecha_aplicacion`, `estado`, `id_usuario`, `fecha_commit`, `fecha_update`) VALUES
(81, 'Juan Perez', 'esta es una observacion', '2021-09-09 00:00:00', 1, 9, '2021-09-15 22:24:30', '2021-09-15 22:24:30'),
(82, 'Juan Perez', 'esta es una observacion', '2021-09-09 00:00:00', 1, 9, '2021-09-15 22:25:13', '2021-09-15 22:25:13'),
(83, 'Juan Perez', 'esta es una observacion', '2021-09-09 00:00:00', 1, 9, '2021-09-15 22:25:23', '2021-09-15 22:25:23'),
(84, 'Juan Perez', 'esta es una observacion', '2021-09-09 00:00:00', 1, 9, '2021-09-15 22:27:06', '2021-09-15 22:27:06'),
(85, 'Juan Perez', 'esta es una observacion', '2021-09-09 00:00:00', 1, 9, '2021-09-15 22:36:36', '2021-09-15 22:36:36'),
(86, 'Juan Perez', 'esta es una observacion', '0000-00-00 00:00:00', 1, 9, '2021-09-15 22:41:03', '2021-09-15 22:41:03');

--
-- Volcado de datos para la tabla `tbl_comunidad`
--

INSERT INTO `tbl_comunidad` (`id_comunidad`, `nombre`, `descripcion`, `tipo`, `id_sector`, `estado`) VALUES
(4, 'Juan Ponce', '', 'aldea', 1, 1),
(5, 'Achiotes Abajo', 'pruebaaaaaa', 'colonia', 1, 1),
(6, 'El Arenal', '', 'aldea', 1, 1),
(7, 'Barrio San José', '', 'barrio', 7, 1),
(8, 'Barrio La Estacion', '', 'barrio', 7, 1),
(9, 'Achiotes Arriba', '', 'aldea', 1, 1),
(10, 'Nueva Esperanza', '', 'aldea', 1, 1),
(11, 'Las Verapaces', '', 'aldea', 1, 1),
(12, 'Santiago', '', 'aldea', 1, 1),
(13, 'Mazanotal', '', 'aldea', 1, 1),
(14, 'La Cuchilla', '', 'aldea', 1, 1),
(15, 'El Tempisque', '', 'aldea', 1, 1),
(16, 'Mayuelas', '', 'aldea', 2, 1),
(17, 'Samaria', '', 'aldea', 2, 1),
(18, 'Valle del Motagua', '', 'aldea', 2, 1),
(19, 'El Zarzal', '', 'aldea', 2, 1),
(20, 'Encinitos', '', 'aldea', 2, 1),
(21, 'Garcìa', '', 'aldea', 2, 1),
(22, 'El Mestizo', '', 'aldea', 2, 1),
(23, 'Doña Marìa ', '', 'aldea', 2, 1),
(24, 'Llano Largo', '', 'aldea', 2, 1),
(25, 'El Lobo', '', 'aldea', 2, 1),
(26, 'La Bolsa', '', 'aldea', 2, 1),
(27, 'El Conacaste', '', 'aldea', 2, 1),
(28, 'Santa Cecilia', '', 'aldea', 2, 1),
(29, 'Mal Paso', '', 'aldea', 2, 1),
(30, 'La Lima', '', 'aldea', 2, 1),
(31, 'Volcan Llano Largo', '', 'aldea', 2, 1),
(32, 'Las Nubes', '', 'aldea', 2, 1),
(33, 'Piedras Azules', '', 'aldea', 3, 1),
(34, 'El Astillero', '', 'aldea', 3, 1),
(35, 'Shin-Shin', '', 'aldea', 3, 1),
(36, 'El Cacao', '', 'aldea', 3, 1),
(37, 'Los Encuentros', '', 'aldea', 3, 1),
(38, 'El Cimarròn', '', 'aldea', 3, 1),
(39, 'Guasintepeque Arriba', '', 'aldea', 3, 1),
(40, 'Guasintepeque Abajo', '', 'aldea', 3, 1),
(41, 'Cuchilla Tendida', '', 'aldea', 3, 1),
(42, 'Piedra De Cal', '', 'aldea', 3, 1),
(43, 'Tazù', '', 'aldea', 3, 1),
(44, 'Bejucal', '', 'aldea', 3, 1),
(45, 'Las Carretas', '', 'aldea', 3, 1),
(46, 'Azacualpa', '', 'aldea', 3, 1),
(47, 'Algodonal', '', 'aldea', 3, 1),
(48, 'Bethel', '', 'aldea', 4, 1),
(49, 'El Chile', '', 'aldea', 4, 1),
(50, 'El Filo', '', 'aldea', 4, 1),
(51, 'Guaranjà', '', 'aldea', 4, 1),
(52, 'La Laguna', '', 'aldea', 4, 1),
(53, 'Chagüiton', '', 'aldea', 4, 1),
(54, 'Lajillal', '', 'aldea', 4, 1),
(55, 'Las Balas', '', 'aldea', 4, 1),
(56, 'Los Alonzo', '', 'aldea', 4, 1),
(57, 'Piedras Negras', '', 'aldea', 4, 1),
(58, 'Quebrada Larga', '', 'aldea', 4, 1),
(59, 'San Josè Tabancas', '', 'aldea', 4, 1),
(60, 'Bella Vista', '', 'aldea', 4, 1),
(61, 'Plan Grande', '', 'caserio', 4, 1),
(62, 'Santa Teresa Iguana', '', 'aldea', 5, 1),
(63, 'Biafra', '', 'aldea', 5, 1),
(64, 'Llano Redondo', '', 'aldea', 5, 1),
(65, 'El Almendro', '', 'aldea', 5, 1),
(66, 'El Cubilete', '', 'aldea', 5, 1),
(67, 'Germania', '', 'aldea', 5, 1),
(68, 'La Puerta', '', 'aldea', 5, 1),
(69, 'Managua', '', 'aldea', 5, 1),
(70, 'Las Lajas', '', 'aldea', 5, 1),
(71, 'El Mirador', '', 'aldea', 5, 1),
(72, 'Los Hornos', '', 'aldea', 5, 1),
(73, 'El Barbasco', '', 'aldea', 5, 1),
(74, 'Vado Las Cañas', '', 'aldea', 5, 1),
(75, 'El Guapinol', '', 'aldea', 5, 1),
(76, 'Mestizo Las Vegas', '', 'aldea', 5, 1),
(77, 'La Vainilla', '', 'aldea', 5, 1),
(78, 'Romelia', '', 'aldea', 5, 1),
(79, 'Los Limones', '', 'aldea', 6, 1),
(80, 'Los Limones II', '', 'aldea', 6, 1),
(81, 'El Zapote', '', 'aldea', 6, 1),
(82, 'Los Jutes', '', 'aldea', 6, 1),
(83, 'Rivera', '', 'aldea', 6, 1),
(84, 'Santa Marìa', '', 'aldea', 6, 1),
(85, 'Tajapà', '', 'aldea', 6, 1),
(86, 'El Triunfo', '', 'aldea', 6, 1),
(87, 'El Cerezal', '', 'aldea', 6, 1),
(88, 'El Silencio', '', 'aldea', 6, 1),
(89, 'El Hawai', '', 'barrio', 7, 1),
(90, 'San Josè', '', 'barrio', 7, 1),
(91, 'La Ciènaga', '', 'barrio', 7, 1),
(92, 'El Centro', '', 'barrio', 7, 1),
(93, 'Mofang', '', 'colonia', 7, 1),
(94, 'La Padrera', '', 'barrio', 7, 1),
(95, 'La Barca', '', 'barrio', 7, 1),
(96, 'Rìo Hondo', '', 'barrio', 7, 1),
(97, 'Las Flores', '', 'barrio', 7, 1),
(98, 'La Estaciòn', '', 'barrio', 7, 1),
(99, 'San Miguel', '', 'barrio', 7, 1);

--
-- Volcado de datos para la tabla `tbl_discapacidad`
--

INSERT INTO `tbl_discapacidad` (`id_discapacidad`, `nombre`, `descripcion`) VALUES
(1, 'Fisica', ''),
(2, 'Sensorial', ''),
(3, 'Intelectual', ''),
(4, 'psíquica', 'prueba'),
(5, 'multiple', ''),
(6, 'Prueba', 'Prueba');

--
-- Volcado de datos para la tabla `tbl_discapacidad_persona`
--

INSERT INTO `tbl_discapacidad_persona` (`id_discapacidad_persona`, `id_persona`, `id_discapacidad`) VALUES
(60, 58, 1),
(61, 58, 3),
(62, 58, 5),
(63, 59, 1),
(64, 59, 3),
(65, 59, 5),
(66, 60, 1),
(67, 60, 3),
(68, 60, 5),
(69, 61, 1),
(70, 61, 3),
(71, 61, 5),
(72, 62, 1),
(73, 62, 3),
(74, 62, 5),
(75, 63, 1),
(76, 63, 3),
(77, 63, 5);

--
-- Volcado de datos para la tabla `tbl_egreso`
--

INSERT INTO `tbl_egreso` (`id_egreso`, `id_familia`, `alimentacion`, `combustible`, `renta`, `agua`, `electricidad`, `telefono_residencial`, `celular`, `transporte`, `educacion`, `medico`, `recreacion`, `cable`, `ropa_calzado`, `fondo_ahorro`, `credito`) VALUES
(55, 74, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 76, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 77, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 78, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 79, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Volcado de datos para la tabla `tbl_enfermedad`
--

INSERT INTO `tbl_enfermedad` (`id_enfermedad`, `nombre`, `descripcion`) VALUES
(1, 'Respiratorias', ''),
(2, 'Gastrointestinales', ''),
(3, 'Dermatologicas', ''),
(4, 'Neurológicas', ''),
(5, 'Cancer', ''),
(6, 'Hipertensión', ''),
(7, 'Obesidad', ''),
(8, 'Diabetes', ''),
(9, 'Enfermedades del corazón', ''),
(10, 'Prueba', '');

--
-- Volcado de datos para la tabla `tbl_enfermedad_persona`
--

INSERT INTO `tbl_enfermedad_persona` (`id_enfermedad_persona`, `id_persona`, `id_enfermedad`) VALUES
(85, 58, 5),
(86, 58, 3),
(87, 58, 8),
(88, 59, 5),
(89, 59, 3),
(90, 59, 8),
(91, 60, 5),
(92, 60, 3),
(93, 60, 8),
(94, 61, 5),
(95, 61, 3),
(96, 61, 8),
(97, 62, 5),
(98, 62, 3),
(99, 62, 8),
(100, 63, 5),
(101, 63, 3),
(102, 63, 8);

--
-- Volcado de datos para la tabla `tbl_familia`
--

INSERT INTO `tbl_familia` (`id_familia`, `id_boleta`) VALUES
(74, 81),
(75, 82),
(76, 83),
(77, 84),
(78, 85),
(79, 86);

--
-- Volcado de datos para la tabla `tbl_mobiliario`
--

INSERT INTO `tbl_mobiliario` (`id_mobiliario`, `nombre`, `descripcion`) VALUES
(1, 'Closet', ''),
(2, 'Sofá', ''),
(3, 'Mesa', ''),
(4, 'Silla', ''),
(5, 'Cama', ''),
(6, 'Gabinete', ''),
(7, 'Televisiòn', ''),
(8, 'Estereo', ''),
(9, 'Video', ''),
(10, 'DVD', ''),
(11, 'Estufa', ''),
(12, 'Refrigerador', ''),
(13, 'Horno Microondas', ''),
(14, 'Lavadora', ''),
(15, 'Computadora', ''),
(16, 'Otro', '');

--
-- Volcado de datos para la tabla `tbl_mp_pared`
--

INSERT INTO `tbl_mp_pared` (`id_mp_pared`, `nombre`, `descripcion`) VALUES
(1, 'Prueba', 'es una prueba'),
(2, 'Block', ''),
(3, 'Madera', ''),
(4, 'Cartòn', ''),
(5, 'Otro Material', '');

--
-- Volcado de datos para la tabla `tbl_mp_piso`
--

INSERT INTO `tbl_mp_piso` (`id_mp_piso`, `nombre`, `descripcion`) VALUES
(1, 'Cemento', ''),
(2, 'Madera', ''),
(3, 'Sofá', ''),
(4, 'Ceràmico', ''),
(5, 'Ladrillo de Barro', ''),
(6, 'Tierra', ''),
(7, 'Madera', ''),
(8, 'Otro Material', '');

--
-- Volcado de datos para la tabla `tbl_mp_techo`
--

INSERT INTO `tbl_mp_techo` (`id_mp_techo`, `nombre`, `descripcion`) VALUES
(1, 'Prueba', 'progra'),
(2, 'Lamina', ''),
(3, 'Teja', ''),
(4, 'Lamina de Zinc', ''),
(5, 'Palma', ''),
(6, 'Concreto', ''),
(7, 'Otro Material', '');

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`id_persona`, `id_familia`, `entrevistado`, `nombres`, `primer_apellido`, `segundo_apellido`, `sexo`, `fecha_nacimiento`, `edad`, `dpi`, `estado_civil`, `escolaridad`, `ocupacion`, `telefono`, `gestacion`, `semanas_gestacion`, `ingreso_mensual`) VALUES
(58, 74, 1, 'Ale', 'Cast', 'Pad', 'F', '2021-09-08', 15, '1234123451235', 'soltero', 'sin estudios', 'Estudiante', '52525252', 0, 0, 999.99),
(59, 75, 1, 'Alec', 'Cas', 'Pad', 'F', '2021-09-08', 15, '1234123451234', 'soltero', 'sin estudios', 'Estudiante', '52525252', 0, 0, 999.99),
(60, 76, 1, 'Ale', 'Cas', 'Padi', 'M', '2021-09-08', 22, '1234123451234', 'soltero', 'sin estudios', 'Estudiante', '52525252', 0, 0, 999.99),
(61, 77, 1, 'Ale', 'Cas', 'Pad', 'M', '2021-09-08', 15, '1234123451234', 'soltero', 'sin estudios', 'Estudiante', '52525252', 0, 0, 999.99),
(62, 78, 1, 'Ale', 'Cas', 'Pad', 'M', '2021-09-08', 22, '1234123451234', 'casado', 'sin estudios', 'Estudiante', '52525252', 0, 0, 999.99),
(63, 79, 1, 'Ale', 'Cas', 'Pad', 'M', '0000-00-00', 31, '1234123451234', 'divorciado', 'primaria', 'Estudiante', '52525252', 0, 0, 999.99);

--
-- Volcado de datos para la tabla `tbl_recreacion`
--

INSERT INTO `tbl_recreacion` (`id_recreacion`, `nombre`, `descripcion`) VALUES
(1, 'Practicar deporte', ''),
(2, 'Visitar familiares o amigos', ''),
(3, 'Prueba', ''),
(4, 'Video juegos', ''),
(5, 'Realizar Actividades de Hogar', ''),
(6, 'Ver Televisiòn', ''),
(7, 'Ir Al Cine', ''),
(8, 'Acudir A Actividades Religiosas', '');

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'normal', 'usuario normal'),
(2, 'administrador', 'usuario administrador'),
(3, 'super administrador', 'usuario super administrador');

--
-- Volcado de datos para la tabla `tbl_sanitario`
--

INSERT INTO `tbl_sanitario` (`id_sanitario`, `nombre`, `descripcion`) VALUES
(1, 'Letrina', ''),
(2, 'Prueba', '');

--
-- Volcado de datos para la tabla `tbl_sector`
--

INSERT INTO `tbl_sector` (`id_sector`, `nombre`, `descripcion`) VALUES
(1, 'Sector 1', 'sector 1'),
(2, 'Sector 2', 'sector 2'),
(3, 'Sector 3', ''),
(4, 'Sector 4', ''),
(5, 'Sector 5', ''),
(6, 'Sector 6', ''),
(7, 'Sector 7', '');

--
-- Volcado de datos para la tabla `tbl_servicio`
--

INSERT INTO `tbl_servicio` (`id_servicio`, `nombre`, `descripcion`) VALUES
(1, 'Agua', ''),
(2, 'Recolección de basura', ''),
(3, 'Electricidad', 'servicio electrico'),
(4, 'Drenaje', ''),
(5, 'Telefonia', ''),
(6, 'Otro', '');

--
-- Volcado de datos para la tabla `tbl_serviciomedico_familia`
--

INSERT INTO `tbl_serviciomedico_familia` (`id_medico_familia`, `id_servicio_medico`, `id_familia`, `frecuencia_medico`) VALUES
(48, 2, 74, 'una vez por semana'),
(49, 2, 75, 'una vez por semana'),
(50, 2, 76, 'una vez por semana'),
(51, 2, 77, 'una vez por semana'),
(52, 2, 78, 'una vez por semana'),
(53, 2, 79, 'anualmente');

--
-- Volcado de datos para la tabla `tbl_servicio_medico`
--

INSERT INTO `tbl_servicio_medico` (`id_servicio_medico`, `nombre`, `descripcion`) VALUES
(1, 'IGSS', ''),
(2, 'Centro de salud', 'salud'),
(3, 'Médico privado', ''),
(4, 'Prueba', ''),
(5, 'Otro', '');

--
-- Volcado de datos para la tabla `tbl_tenencia`
--

INSERT INTO `tbl_tenencia` (`id_tenencia`, `nombre`, `descripcion`) VALUES
(1, 'Propia', ''),
(2, 'Prestada', ''),
(3, 'Rentada', ''),
(4, 'Compartida', ''),
(5, 'Amortizando', ''),
(6, 'Invadida', '');

--
-- Volcado de datos para la tabla `tbl_transporte`
--

INSERT INTO `tbl_transporte` (`id_transporte`, `nombre`, `descripcion`) VALUES
(1, 'Bus', ''),
(2, 'Carro', ''),
(3, 'Moto', '');

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre`, `usuario`, `rol`, `password`, `estado`, `fecha_commit`, `fecha_update`) VALUES
(9, 'Alejandro Castaneda', 'Alejandro', 2, '$2y$12$bKeEs5BRN/IQl1We8fIvHOm4lvMCXVRwv9Q05O54sbfFINxpCDMdm', 1, '2021-07-11 23:11:12', '2021-07-29 19:50:58'),
(73, 'admin', 'admin', 3, '$2y$12$V0Vgc8puCBW4wGdGQag7X.Ebja0uETqYnpHZ3tVfKLVktf/FXw9cW', 1, '2021-07-28 19:27:34', '2021-09-19 22:45:48'),
(92, 'Mauricio Aguirre', 'monchito', 2, '$2y$12$jl65WUta0rLYTYd5ZBhYJeexjLyi86NXMVq7qZvTMFSFXqHsghDaa', 1, '2021-09-19 23:19:04', '2021-09-19 23:19:04');

--
-- Volcado de datos para la tabla `tbl_vivienda`
--

INSERT INTO `tbl_vivienda` (`id_vivienda`, `id_familia`, `id_comunidad`, `direccion`, `numero_casa`, `colindantes`, `latitud`, `longitud`, `telefono`, `id_tenencia`, `cantidad_cuartos`, `sala`, `comedor`, `cocina`, `banio_privado`, `banio_colectivo`, `observaciones`, `id_mp_pared`, `id_mp_techo`, `id_mp_piso`, `id_sanitario`, `eliminacion_basura`) VALUES
(38, 74, 5, 'calle 1', '151515', 'Juan y pedro', '89151151', '89151151', '12345678', 1, 2, 1, 1, 1, 1, 1, 'esto es una observacion', 2, 2, 1, 1, 'fuego'),
(39, 75, 5, 'calle 1', '151515', 'Juan y pedro', '89151151', '89151151', '12345678', 1, 2, 1, 1, 1, 1, 1, 'esto es una observacion', 2, 2, 1, 1, 'fuego'),
(40, 76, 8, 'calle 1', '151515', 'Juan y pedro', '89151151', '89151151', '12345678', 1, 2, 1, 1, 1, 1, 1, 'esto es una observacion', 2, 2, 1, 1, 'fuego'),
(41, 77, 5, 'calle 1', '151515', 'Juan y pedro', '89151151', '89151151', '12345678', 1, 2, 1, 1, 1, 1, 1, 'esto es una observacion', 2, 2, 1, 1, 'fuego'),
(42, 78, 4, 'calle 1', '151515', 'Juan y pedro', '89151151', '89151151', '12345678', 1, 2, 1, 1, 1, 1, 1, 'esto es una observacion', 2, 2, 1, 1, 'fuego'),
(43, 79, 15, 'calle 1', '151515', 'Juan y pedro', '89151151', '89151151', '12345678', 1, 2, 1, 1, 1, 1, 1, 'esto es una observacion', 2, 2, 1, 1, 'fuego');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
