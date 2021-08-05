create database db_encuesta_muni;

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
`id_usuario` int(11) NOT NULL AUTO_INCREMENT ,
`nombre` varchar(50) NOT NULL UNIQUE,
`usuario` varchar(250) NOT NULL UNIQUE,
`rol` int(11) NOT NULL,
`password` varchar(250),
`estado` int(11) NOT NULL,
`fecha_commit` datetime DEFAULT CURRENT_TIMESTAMP,
`fecha_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id_usuario`)
);

CREATE TABLE IF NOT EXISTS `tbl_rol` (
`id_rol` int(11) NOT NULL AUTO_INCREMENT ,
`nombre` varchar(50) NOT NULL ,
`descripcion` varchar(250) ,
PRIMARY KEY (`id_rol`)
);


CREATE TABLE IF NOT EXISTS `tbl_boleta` (
`id_boleta` int(11) NOT NULL AUTO_INCREMENT ,
`evaluador` varchar(50) NOT NULL ,
`observaciones` varchar(250),
`estado` int(11) NOT NULL,
`usuario_commit` int(11) NOT NULL,
`usuario_update` int(11) NOT NULL,
`fecha_commit` datetime DEFAULT CURRENT_TIMESTAMP,
`fecha_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id_boleta`)
);

CREATE TABLE IF NOT EXISTS `tbl_familia` (
`id_familia` int(11) NOT NULL AUTO_INCREMENT ,
`id_alimentacion` int(11) NOT NULL ,
`id_boleta` int(11) NOT NULL,
`id_egresos` int(11) NOT NULL,
`asistencia_medica` varchar(50),
`observaciones` varchar(250),
PRIMARY KEY (`id_familia`)
);

CREATE TABLE IF NOT EXISTS `tbl_alimentacion` (
`id_alimentacion` int(11) NOT NULL ,
`carne_res` int(5) NOT NULL ,
`carne_pollo` int(5) NOT NULL,
`carne_cerdo` int(5) NOT NULL,
`carne_pescado` int(5) NOT NULL,
`cereales` int(5) NOT NULL,
`huevo` int(5) NOT NULL,
`frutas` int(5) NOT NULL,
`leguminosas` int(5) NOT NULL,
`leche` int(5) NOT NULL,
PRIMARY KEY (`id_alimentacion`)
);

CREATE TABLE IF NOT EXISTS `tbl_egreso` (
`id_egreso` int(11) NOT NULL ,
`alimentacion` int(5) NOT NULL ,
`combustible` int(5) NOT NULL,
`renta` int(5) NOT NULL,
`agua` int(5) NOT NULL,
`electricidad` int(5) NOT NULL,
`telefono_residencial` int(5) NOT NULL,
`celular` int(5) NOT NULL,
`transporte` int(5) NOT NULL,
`educacion` int(5) NOT NULL,
`medico` int(5) NOT NULL,
`recreacion` int(5) NOT NULL,
`cable` int(5) NOT NULL,
`ropa_calzado` int(5) NOT NULL,
`fondo_ahorro` int(5) NOT NULL,
`credito` int(5) NOT NULL,
PRIMARY KEY (`id_egreso`)
);

CREATE TABLE IF NOT EXISTS `tbl_persona` (
`id_persona` int(11) NOT NULL AUTO_INCREMENT ,
`id_familia` int(11) NOT NULL ,
`dpi` varchar(20),
`nombres` varchar(50) NOT NULL,
`primer_apellido` varchar(50) NOT NULL,
`segundo_apellido` varchar(50) NOT NULL,
`escolaridad` varchar(50) NOT NULL,
`ocupacion` varchar(50) NOT NULL,
`discapacidad` varchar(50) NOT NULL,
`gestacion` int(5),
`semanas_gestacion` int(11) NOT NULL,
`telefono` varchar(20),
`ingreso_mensual` float(5,2) NOT NULL,
PRIMARY KEY (`id_persona`)
);

CREATE TABLE IF NOT EXISTS `tbl_enfermedad_persona` (
`id_enfermedad_persona` int(11) NOT NULL AUTO_INCREMENT,
`id_persona` int(11) NOT NULL,
`id_enfermedad` int(11) NOT NULL,
PRIMARY KEY (`id_enfermedad_persona`)
);

CREATE TABLE IF NOT EXISTS `tbl_enfermedad` (
`id_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_enfermedad_persona`)
);

CREATE TABLE IF NOT EXISTS `tbl_serviciomedico_familia` (
`id_medico_familia` int(11) NOT NULL AUTO_INCREMENT,
`id_servicio_medico` int(11) NOT NULL,
`id_familia` int(11) NOT NULL,
PRIMARY KEY (`id_medico_familia`)
);

CREATE TABLE IF NOT EXISTS `tbl_servicio_medico` (
`id_servicio_medico` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_servicio_medico`)
);

CREATE TABLE IF NOT EXISTS `tbl_recreacion_familia` (
`id_recreacion_familia` int(11) NOT NULL AUTO_INCREMENT,
`id_recreacion` int(11) NOT NULL,
`id_familia` int(11) NOT NULL,
PRIMARY KEY (`id_recreacion_familia`)
);

CREATE TABLE IF NOT EXISTS `tbl_recreacion` (
`id_recreacion` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_recreacion`)
);

CREATE TABLE IF NOT EXISTS `tbl_vivienda` (
`id_vivienda` int(11) NOT NULL AUTO_INCREMENT,
`id_familia` int(11) NOT NULL,
`numero_casa` varchar(15) NOT NULL,
`calle` varchar(250),
`id_comunidad` int(11) NOT NULL,
`medio_transporte` int(11) NOT NULL, #check//////////////////////////////
`id_tenencia` int(11) NOT NULL, 
`cantidad_cuartos` int(11) NOT NULL,
`sala` int(5) NOT NULL,
`comedor` int(5) NOT NULL,
`cocina` int(5) NOT NULL,
`baño_privado` int(5) NOT NULL,
`baño_colectivo` int(5) NOT NULL,
`observaciones` varchar(250),
`id_mp_pared` int(11) NOT NULL,
`id_mp_techo` int(11) NOT NULL,
`id_mp_piso` int(11) NOT NULL,
PRIMARY KEY (`id_vivienda`)
);

CREATE TABLE IF NOT EXISTS `tbl_mp_pared` (
`id_mp_pared` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_mp_pared`)
);

CREATE TABLE IF NOT EXISTS `tbl_mp_techo` (
`id_mp_techo` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_mp_techo`)
);

CREATE TABLE IF NOT EXISTS `tbl_mp_piso` (
`id_mp_piso` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_mp_piso`)
);

CREATE TABLE IF NOT EXISTS `tbl_tenencia` (
`id_tenencia` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_tenencia`)
);

#/////////////////
CREATE TABLE IF NOT EXISTS `tbl_medio_transporte` (
`id_medio_transporte` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_medio_transporte`)
);

CREATE TABLE IF NOT EXISTS `tbl_mobiliario_vivienda` (
`id_mobiliario_vivienda` int(11) NOT NULL AUTO_INCREMENT,
`id_mobiliario` int(11) NOT NULL,
`id_vivienda` int(11) NOT NULL,
PRIMARY KEY (`id_mobiliario_vivienda`)
);

CREATE TABLE IF NOT EXISTS `tbl_mobiliario` (
`id_mobiliario` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_mobiliario`)
);

CREATE TABLE IF NOT EXISTS `tbl_servicio_vivienda` (
`id_servicio_vivienda` int(11) NOT NULL AUTO_INCREMENT,
`id_servicio` int(11) NOT NULL,
`id_vivienda` int(11) NOT NULL,
PRIMARY KEY (`id_servicio_vivienda`)
);

CREATE TABLE IF NOT EXISTS `tbl_servicio` (
`id_servicio` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_servicio`)
);

#llaves foraneas----------------------------------------------------------------------------------------

ALTER TABLE tbl_usuario ADD CONSTRAINT `fk_usuario_rol` 
FOREIGN KEY (rol)
REFERENCES tbl_rol(id_rol);






















