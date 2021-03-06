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
`fecha_aplicacion` datetime,
`estado` int(11) NOT NULL,
`id_usuario` int(11) NOT NULL,
`fecha_commit` datetime DEFAULT CURRENT_TIMESTAMP,
`fecha_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id_boleta`)
);

CREATE TABLE IF NOT EXISTS `tbl_familia` (
`id_familia` int(11) NOT NULL AUTO_INCREMENT ,
`id_boleta` int(11) NOT NULL,
`observaciones` varchar(250),
PRIMARY KEY (`id_familia`)
);

CREATE TABLE IF NOT EXISTS `tbl_alimentacion` (
`id_alimentacion` int(11) NOT NULL AUTO_INCREMENT,
`id_familia` int(11) NOT NULL,
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
`id_egreso` int(11) NOT NULL AUTO_INCREMENT,
`id_familia` int(11) NOT NULL,
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
`entrevistado` int(5),
`nombres` varchar(50) NOT NULL,
`primer_apellido` varchar(50) NOT NULL,
`segundo_apellido` varchar(50),
`sexo` varchar(10),
`fecha_nacimiento` date,
`edad` int(10),
`dpi` varchar(20),
`estado_civil` varchar(20),
`escolaridad` varchar(50) NOT NULL,
`ocupacion` varchar(50) NOT NULL,
`telefono` varchar(20),
`gestacion` int(5),
`semanas_gestacion` int(11) NOT NULL,
`ingreso_mensual` float(5,2) NOT NULL,
PRIMARY KEY (`id_persona`)
);

CREATE TABLE IF NOT EXISTS `tbl_enfermedad` (
`id_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_enfermedad`)
);

CREATE TABLE IF NOT EXISTS `tbl_enfermedad_persona` (
`id_enfermedad_persona` int(11) NOT NULL AUTO_INCREMENT,
`id_persona` int(11) NOT NULL,
`id_enfermedad` int(11) NOT NULL,
PRIMARY KEY (`id_enfermedad_persona`)
);

CREATE TABLE IF NOT EXISTS `tbl_discapacidad` (
`id_discapacidad` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_discapacidad`)
);

CREATE TABLE IF NOT EXISTS `tbl_discapacidad_persona` (
`id_discapacidad_persona` int(11) NOT NULL AUTO_INCREMENT,
`id_persona` int(11) NOT NULL,
`id_discapacidad` int(11) NOT NULL,
PRIMARY KEY (`id_discapacidad_persona`)
);

CREATE TABLE IF NOT EXISTS `tbl_serviciomedico_familia` (
`id_medico_familia` int(11) NOT NULL AUTO_INCREMENT,
`id_servicio_medico` int(11) NOT NULL,
`id_familia` int(11) NOT NULL,
`frecuencia_medico` varchar(45) NOT NULL,
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
`numero_casa` varchar(15),
`calle` varchar(250),
`id_comunidad` int(11) NOT NULL,
`id_tenencia` int(11) NOT NULL, 
`cantidad_cuartos` int(11) NOT NULL,
`sala` int(5) NOT NULL,
`comedor` int(5) NOT NULL,
`cocina` int(5) NOT NULL,
`ba??o_privado` int(5) NOT NULL,
`ba??o_colectivo` int(5) NOT NULL,
`id_sanitario` int(5) NOT NULL,
`observaciones` varchar(250),
`id_mp_pared` int(11) NOT NULL,
`id_mp_techo` int(11) NOT NULL,
`id_mp_piso` int(11) NOT NULL,
`colindantes` varchar(250),
`latitud` varchar(45),
`longitud` varchar(45),
`telefono` varchar(15),
PRIMARY KEY (`id_vivienda`)
);

CREATE TABLE IF NOT EXISTS `tbl_transporte_vivienda` (
`id_transporte_vivienda` int(11) NOT NULL AUTO_INCREMENT,
`id_transporte` int(11) NOT NULL,
`id_vivienda` int(11) NOT NULL,
PRIMARY KEY (`id_transporte_vivienda`)
);

CREATE TABLE IF NOT EXISTS `tbl_transporte` (
`id_transporte` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_transporte`)
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

CREATE TABLE IF NOT EXISTS `tbl_comunidad` (
`id_comunidad` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
`tipo` varchar(50),
`id_sector` int(11) NOT NULL,
`estado` int(11) NOT NULL,
PRIMARY KEY (`id_comunidad`)
);

CREATE TABLE IF NOT EXISTS `tbl_sector` (
`id_sector` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_sector`)
);

CREATE TABLE IF NOT EXISTS `tbl_sanitario` (
`id_sanitario` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
`descripcion` varchar(250),
PRIMARY KEY (`id_sanitario`)
);

#llaves foraneas----------------------------------------------------------------------------------------

#Tabla usario
ALTER TABLE tbl_usuario ADD CONSTRAINT `fk_usuario_rol` 
FOREIGN KEY (rol)
REFERENCES tbl_rol(id_rol);

#Tabla boleta
ALTER TABLE tbl_boleta ADD CONSTRAINT `fk_boleta_usuario` 
FOREIGN KEY (id_usuario)
REFERENCES tbl_usuario(id_usuario);

#Tabla familia
ALTER TABLE tbl_familia ADD CONSTRAINT `fk_familia_boleta` 
FOREIGN KEY (id_boleta)
REFERENCES tbl_boleta(id_boleta);

#Tabla alimentacion
ALTER TABLE tbl_alimentacion ADD CONSTRAINT `fk_alimentacion_familia` 
FOREIGN KEY (id_familia)
REFERENCES tbl_familia(id_familia);

#Tabla egreso
ALTER TABLE tbl_egreso ADD CONSTRAINT `fk_egreso_familia` 
FOREIGN KEY (id_familia)
REFERENCES tbl_familia(id_familia);

#Tabla persona
ALTER TABLE tbl_persona ADD CONSTRAINT `fk_persona_familia` 
FOREIGN KEY (id_familia)
REFERENCES tbl_familia(id_familia);

#Tabla enfermedad_persona
ALTER TABLE tbl_enfermedad_persona ADD CONSTRAINT `fk_enfermedadpersona_persona` 
FOREIGN KEY (id_persona)
REFERENCES tbl_persona(id_persona);

ALTER TABLE tbl_enfermedad_persona ADD CONSTRAINT `fk_enfermedadpersona_enfermedad` 
FOREIGN KEY (id_enfermedad)
REFERENCES tbl_enfermedad(id_enfermedad);

#Tabla discapacidad_persona
ALTER TABLE tbl_discapacidad_persona ADD CONSTRAINT `fk_discapacidadpersona_persona` 
FOREIGN KEY (id_persona)
REFERENCES tbl_persona(id_persona);

ALTER TABLE tbl_discapacidad_persona ADD CONSTRAINT `fk_enfermedadpersona_discapacidad` 
FOREIGN KEY (id_discapacidad)
REFERENCES tbl_discapacidad(id_discapacidad);

#Tabla serviciomedico_familia
ALTER TABLE tbl_serviciomedico_familia ADD CONSTRAINT `fk_medicofamilia_familia` 
FOREIGN KEY (id_familia)
REFERENCES tbl_familia(id_familia);

ALTER TABLE tbl_serviciomedico_familia ADD CONSTRAINT `fk_medicofamilia_medico` 
FOREIGN KEY (id_servicio_medico)
REFERENCES tbl_servicio_medico(id_servicio_medico);

#Tabla recreacion_familia
ALTER TABLE tbl_recreacion_familia ADD CONSTRAINT `fk_recreacionfamilia_familia` 
FOREIGN KEY (id_familia)
REFERENCES tbl_familia(id_familia);

ALTER TABLE tbl_recreacion_familia ADD CONSTRAINT `fk_recreacionfamilia_recreacion` 
FOREIGN KEY (id_recreacion)
REFERENCES tbl_recreacion(id_recreacion);

#Tabla vivienda
ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_familia` 
FOREIGN KEY (id_familia)
REFERENCES tbl_familia(id_familia);

ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_comunidad` 
FOREIGN KEY (id_comunidad)
REFERENCES tbl_comunidad(id_comunidad);

ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_tenencia` 
FOREIGN KEY (id_tenencia)
REFERENCES tbl_tenencia(id_tenencia);

ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_pared` 
FOREIGN KEY (id_mp_pared)
REFERENCES tbl_mp_pared(id_mp_pared);

ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_techo` 
FOREIGN KEY (id_mp_techo)
REFERENCES tbl_mp_techo(id_mp_techo);

ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_piso` 
FOREIGN KEY (id_mp_piso)
REFERENCES tbl_mp_piso(id_mp_piso);

#Tabla mobiliario_vivienda
ALTER TABLE tbl_mobiliario_vivienda ADD CONSTRAINT `fk_mobiliariovivienda_vivienda` 
FOREIGN KEY (id_vivienda)
REFERENCES tbl_vivienda(id_vivienda);

ALTER TABLE tbl_mobiliario_vivienda ADD CONSTRAINT `fk_mobiliariovivienda_mobiliario` 
FOREIGN KEY (id_mobiliario)
REFERENCES tbl_mobiliario(id_mobiliario);

#Tabla servicio_vivienda
ALTER TABLE tbl_servicio_vivienda ADD CONSTRAINT `fk_serviciovivienda_vivienda` 
FOREIGN KEY (id_vivienda)
REFERENCES tbl_vivienda(id_vivienda);

ALTER TABLE tbl_servicio_vivienda ADD CONSTRAINT `fk_mobiliariovivienda_servicio` 
FOREIGN KEY (id_servicio)
REFERENCES tbl_servicio(id_servicio);

#Tabla transporte_vivienda
ALTER TABLE tbl_transporte_vivienda ADD CONSTRAINT `fk_transportevivienda_vivienda` 
FOREIGN KEY (id_vivienda)
REFERENCES tbl_vivienda(id_vivienda);

ALTER TABLE tbl_transporte_vivienda ADD CONSTRAINT `fk_transportevivienda_transporte` 
FOREIGN KEY (id_transporte)
REFERENCES tbl_transporte(id_transporte);

#tabla comunidad
ALTER TABLE tbl_comunidad ADD CONSTRAINT `fk_comunidad_sector` 
FOREIGN KEY (id_sector)
REFERENCES tbl_sector(id_sector);

#tabla comunidad
ALTER TABLE tbl_vivienda ADD CONSTRAINT `fk_vivienda_sanitario` 
FOREIGN KEY (id_sanitario)
REFERENCES tbl_sanitario(id_sanitario);

select * from tbl_usuario;


-- insertar usuario defecto
INSERT INTO `tbl_rol` (`nombre`, `descripcion`) VALUES ('Normal', 'Usuario normal');
INSERT INTO `tbl_rol` (`nombre`, `descripcion`) VALUES ('Administrador', 'Admin');
INSERT INTO `tbl_usuario` (`id_usuario`, `nombre`, `usuario`, `rol`, `password`, `estado`, `fecha_commit`, `fecha_update`) VALUES (NULL, 'Admin', 'Admin', '1', '$2y$12$cF2qA1NW0qHWGPYABPTwMOHkSVSDmxHYaGn1EGaNSYq0cvjpciGtq', '1', current_timestamp(), current_timestamp());

select curdate();

Select TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad from tbl_persona;

select fecha_nacimiento from tbl_persona;
select datediff(curdate(),'2020-02-02');


CURRENT_DATE, ((YEAR(CURRENT_DATE) -
YEAR(datos.nacimiento)) - (RIGHT(CURRENT_DATE,5) <
RIGHT(datos.nacimiento, 5))) AS 'edad'


SELECT YEAR(CURRENT_TIMESTAMP) - YEAR(fecha_nacimiento) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(fecha_nacimiento, 5)) as age 
  FROM tbl_persona;

SELECT b.id_boleta,f.id_familia,p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
c.nombre as comunidad
from tbl_persona as p inner join
tbl_familia as f on p.id_familia = f.id_familia inner join 
tbl_boleta as b on f.id_boleta = b.id_boleta inner join
tbl_vivienda as v on f.id_familia = v.id_familia inner join
tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
where (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%%' 
OR p.dpi LIKE '%%') AND 
c.id_sector like '%%' AND v.id_comunidad LIKE '%%' AND (YEAR(CURRENT_TIMESTAMP) - YEAR(p.fecha_nacimiento) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(p.fecha_nacimiento, 5)) between 19 AND 30)
ORDER BY p.id_persona ASC LIMIT 0, 200















