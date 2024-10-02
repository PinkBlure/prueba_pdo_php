-- PostgreSQL SQL Dump
-- version 5.2.1
-- Generado el: 02-10-2024 a las 19:28:50
-- Versión de PostgreSQL: [Tu versión de PostgreSQL]

-- Crear la base de datos (esto se hace una vez desde la consola)
CREATE DATABASE campus WITH ENCODING 'UTF8' LC_COLLATE='C.UTF-8' LC_CTYPE='C.UTF-8' TEMPLATE=template0;

-- Conectarse a la base de datos
\c campus

-- --------------------------------------------------------

-- Estructura de tabla para la tabla "alumnado"
DROP TABLE IF EXISTS alumnado CASCADE;
CREATE TABLE IF NOT EXISTS alumnado (
  dni VARCHAR(9) NOT NULL,
  nombre TEXT NOT NULL,
  apellidos TEXT NOT NULL,
  email TEXT NOT NULL,
  PRIMARY KEY (dni),
  UNIQUE (email) -- La restricción de único se define sin el "USING HASH" en PostgreSQL
);

-- Volcado de datos para la tabla "alumnado"
INSERT INTO alumnado (dni, nombre, apellidos, email) VALUES
('32148888H', 'Hernando', 'Hernández', 'hernandohernandez@gmail.com'),
('34666576R', 'Roberto', 'Martínez', 'robertomartinez@gmail.com'),
('42354354H', 'Armando', 'Guerra', 'armandoguerra@gmail.com'),
('54129865P', 'Patricia', 'López', 'patricialopez@gmail.com'),
('54354343I', 'Inés', 'Romero', 'inesromero@gmail.com'),
('75657554F', 'Francisca', 'Moreno', 'franciscamoreno@gmail.com'),
('76345342T', 'Jose', 'Fernandez', 'josefernandez@gmail.com'),
('76543576Y', 'Yeray', 'Gutiérrez', 'yeraygutierrez@gmail.com');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla "aulasvirtuales"
DROP TABLE IF EXISTS aulasvirtuales CASCADE;
CREATE TABLE IF NOT EXISTS aulasvirtuales (
  id SERIAL PRIMARY KEY, -- Usar SERIAL para auto incremento
  nombrecorto VARCHAR NOT NULL,
  nombrelargo TEXT NOT NULL
);

-- Volcado de datos para la tabla "aulasvirtuales"
INSERT INTO aulasvirtuales (id, nombrecorto, nombrelargo) VALUES
(1, 'DWS', 'Desarrollo web en entorno servidor'),
(2, 'DEW', 'Desarrollo web en entorno cliente');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla "matriculas"
DROP TABLE IF EXISTS matriculas CASCADE;
CREATE TABLE IF NOT EXISTS matriculas (
  id_aula INT NOT NULL,
  dni VARCHAR(9) NOT NULL,
  PRIMARY KEY (id_aula, dni)
);

-- Volcado de datos para la tabla "matriculas"
INSERT INTO matriculas (id_aula, dni) VALUES
(1, '32148888H'),
(1, '34666576R'),
(1, '42354354H'),
(1, '54129865P'),
(1, '54354343I'),
(2, '32148888H'),
(2, '34666576R'),
(2, '75657554F'),
(2, '76345342T'),
(2, '76543576Y');

-- --------------------------------------------------------

-- Filtros para la tabla "matriculas"
ALTER TABLE matriculas
  ADD CONSTRAINT fk_matricula_alumnado FOREIGN KEY (dni) REFERENCES alumnado (dni) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk_matricula_aulas_virtuales FOREIGN KEY (id_aula) REFERENCES aulasvirtuales (id) ON DELETE CASCADE ON UPDATE CASCADE;
