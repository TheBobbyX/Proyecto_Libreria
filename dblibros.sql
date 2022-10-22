-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-10-2022 a las 22:26:10
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dblibros`
--
CREATE DATABASE IF NOT EXISTS `dblibros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `dblibros`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_delete_autor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_autor` (IN `param_id_autor` INT)   BEGIN
	set @s = CONCAT("DELETE FROM autor WHERE id_autor=", param_id_autor);
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_editorial`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_editorial` (IN `param_id_editorial` INT)   BEGIN
	set @s = CONCAT("DELETE FROM editorial WHERE id_editorial=", param_id_editorial);
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_libro` (IN `param_isbn` INT)   BEGIN
	set @s = CONCAT("DELETE FROM libro WHERE isbn=", param_isbn);
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_insert_autor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_autor` (IN `param_nombre` VARCHAR(30), IN `param_apellido` VARCHAR(30), IN `param_nacionalidad` VARCHAR(30))   BEGIN
	set @s = CONCAT("INSERT INTO autor (Nombre,Apellido,Nacionalidad) VALUES('", param_nombre ,"','", param_apellido ,"','", param_nacionalidad ,"')");
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_insert_editorial`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_editorial` (IN `param_nombre_editorial` VARCHAR(50), IN `param_telefono` CHAR(10), IN `param_direccion` VARCHAR(100), IN `param_ciudad` VARCHAR(15), IN `param_provincia` VARCHAR(15))   BEGIN
	set @s = CONCAT("INSERT INTO editorial (Nombre_Editorial,Telefono,Direccion,Ciudad,Provincia) VALUES('", param_nombre_editorial ,"','", param_telefono ,"','", param_direccion ,"','", param_ciudad,"','", param_provincia ,"')");
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_insert_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_libro` (IN `param_titulo` VARCHAR(100), IN `param_n_edicion` INT, IN `param_copyright` DATE, IN `param_n_pag` INT, IN `param_n_estanteria` INT, IN `param_n_ejemplares` INT, IN `param_precio` DECIMAL(10,2), IN `param_id_editorial` INT, IN `param_id_autor` INT)   BEGIN
	set @s = CONCAT("INSERT into  Libro (Titulo,N_Edicion,Copyright,N_Pag,N_Estanteria,N_Ejemplares,Precio,Id_Editorial,Id_Autor) VALUES\r\n\t('", param_titulo ,"',", param_n_edicion ,",'", param_copyright ,"',", param_n_pag ,",", param_n_estanteria ,",", param_n_ejemplares ,",", param_precio ,",", param_id_editorial ,",", param_id_autor ,")");
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_select_autor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_autor` ()   BEGIN
	Select * from autor order by nombre;
END$$

DROP PROCEDURE IF EXISTS `sp_select_autor_nacionalidad`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_autor_nacionalidad` ()   BEGIN
	Select nacionalidad 'NACIONALIDAD',count(*) 'CANTIDAD' from Autor group by nacionalidad;
END$$

DROP PROCEDURE IF EXISTS `sp_select_editorial`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_editorial` ()   BEGIN
	Select * from editorial order by nombre_editorial;
END$$

DROP PROCEDURE IF EXISTS `sp_select_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_libro` ()   BEGIN
	Select * from libro order by titulo;
END$$

DROP PROCEDURE IF EXISTS `sp_select_libros_nacionales`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_libros_nacionales` ()   BEGIN
	Select l.ISBN 'ISBN', l.Titulo 'Titulo', l.N_Edicion 'Edicion', l.Precio 'Precio' from libro l, Editorial e WHERE l.Id_Editorial = e.Id_Editorial and e.Ciudad = 'Panama' order by Titulo;
END$$

DROP PROCEDURE IF EXISTS `sp_select_libros_por_autor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_libros_por_autor` (IN `param_id_autor` INT)   BEGIN
	Select l.Titulo,l.ISBN, l.N_Edicion, l.N_Estanteria, e.Nombre_Editorial, l.Precio from Libro l,Editorial e WHERE Id_Autor=param_id_autor and e.Id_Editorial=l.Id_Editorial order by Titulo;
END$$

DROP PROCEDURE IF EXISTS `sp_select_libro_año`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_libro_año` (IN `param_año` INT)   BEGIN
    Select titulo 'Titulo', N_Ejemplares 'Numeros de Ejemplares' from libro where YEAR(Copyright)=param_año;
END$$

DROP PROCEDURE IF EXISTS `sp_select_libro_estanteria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_libro_estanteria` ()   BEGIN
    Select distinct N_Estanteria 'Estanteria', sum(N_Ejemplares) 'Total de Libros' from Libro group by N_Estanteria;
END$$

DROP PROCEDURE IF EXISTS `sp_update_autor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_autor` (IN `param_selection` VARCHAR(30), IN `param_id_autor` INT, IN `param_valor` VARCHAR(30))   BEGIN
	IF param_selection='Nombre' THEN 
        	set @s = CONCAT("UPDATE autor SET nombre='", param_valor ,"' WHERE id_autor='", param_id_autor ,"'");
    ELSEIF param_selection='Apellido' THEN
        	set @s = CONCAT("UPDATE autor SET apellido='", param_valor ,"' WHERE id_autor='", param_id_autor ,"'");
    ELSEIF param_selection='Nacionalidad' THEN
        	set @s = CONCAT("UPDATE autor SET nacionalidad='", param_valor ,"' WHERE id_autor='", param_id_autor ,"'");
	END IF;
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_update_editorial`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_editorial` (IN `param_selection` VARCHAR(30), IN `param_id_editorial` INT, IN `param_valor` VARCHAR(30))   BEGIN
	IF param_selection='Nombre_Editorial' THEN 
        	set @s = CONCAT("UPDATE editorial SET Nombre_Editorial='", param_valor ,"' WHERE id_editorial=", param_id_editorial);
    ELSEIF param_selection='Telefono' THEN
        	set @s = CONCAT("UPDATE editorial SET Telefono='", param_valor ,"' WHERE id_editorial=", param_id_editorial);
    ELSEIF param_selection='Direccion' THEN
        	set @s = CONCAT("UPDATE editorial SET Direccion='", param_valor ,"' WHERE id_editorial=", param_id_editorial);
    ELSEIF param_selection='Ciudad' THEN
        	set @s = CONCAT("UPDATE editorial SET Ciudad='", param_valor ,"' WHERE id_editorial=", param_id_editorial);
    ELSEIF param_selection='Provincia' THEN
        	set @s = CONCAT("UPDATE editorial SET Provincia='", param_valor ,"' WHERE id_editorial=", param_id_editorial);
	END IF;
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_update_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_libro` (IN `param_selection` VARCHAR(30), IN `param_isbn` INT, IN `param_valor` VARCHAR(30))   BEGIN
	IF param_selection='Titulo' THEN 
        	set @s = CONCAT("UPDATE libro SET Titulo='", param_valor ,"' WHERE isbn=", param_isbn);
    ELSEIF param_selection='N_Edicion' THEN
        	set @s = CONCAT("UPDATE libro SET N_Edicion=", param_valor ," WHERE isbn=", param_isbn);
    ELSEIF param_selection='Copyright' THEN
        	set @s = CONCAT("UPDATE libro SET Copyright='", param_valor ,"' WHERE isbn=", param_isbn);
    ELSEIF param_selection='N_Pag' THEN
        	set @s = CONCAT("UPDATE libro SET N_Pag=", param_valor ," WHERE isbn=", param_isbn);
    ELSEIF param_selection='N_Estanteria' THEN
        	set @s = CONCAT("UPDATE libro SET N_Estanteria=", param_valor ," WHERE isbn=", param_isbn);
    ELSEIF param_selection='N_Ejemplares' THEN
        	set @s = CONCAT("UPDATE libro SET N_Ejemplares=", param_valor ," WHERE isbn=", param_isbn);
    ELSEIF param_selection='Precio' THEN
        	set @s = CONCAT("UPDATE libro SET Precio=", param_valor ," WHERE isbn=", param_isbn);
    ELSEIF param_selection='Id_Editorial' THEN
        	set @s = CONCAT("UPDATE libro SET Id_Editorial=", param_valor ," WHERE isbn=", param_isbn);
    ELSEIF param_selection='Id_Autor' THEN
        	set @s = CONCAT("UPDATE libro SET Id_Autor=", param_valor ," WHERE isbn=", param_isbn);
	END IF;
    PREPARE stmt from @s;
    EXECUTE stmt;
    SELECT ROW_COUNT();
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_verificar_autor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verificar_autor` (IN `param_id_autor` INT)   BEGIN
	select count(*) from autor where id_autor=param_id_autor;
END$$

DROP PROCEDURE IF EXISTS `sp_verificar_libro_año`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verificar_libro_año` (IN `param_año` INT)   BEGIN
    Select count(*) from Libro where year(Copyright)=param_año;
END$$

DROP PROCEDURE IF EXISTS `sp_verificar_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verificar_usuario` (IN `param_cedula` CHAR(16), IN `param_pass` VARCHAR(20))   BEGIN
	select count(*) from usuarios WHERE cedula=param_cedula and pass=param_pass;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `Id_Autor` int NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Nacionalidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`Id_Autor`, `Nombre`, `Apellido`, `Nacionalidad`) VALUES
(1000, 'Roberto', 'Brown', 'Panameña'),
(1001, 'Gina', 'Gordon', 'Panameña'),
(1002, 'Roberto', 'Lasso', 'Panameña'),
(1003, 'Daniela', 'Gonzalez', 'Panameña'),
(1004, 'Nelson', 'Sandoval', 'Panameña'),
(1005, 'Emanuel', 'Brown', 'Colombiana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

DROP TABLE IF EXISTS `editorial`;
CREATE TABLE `editorial` (
  `Id_Editorial` int NOT NULL,
  `Nombre_Editorial` varchar(50) NOT NULL,
  `Telefono` char(10) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Ciudad` varchar(15) NOT NULL,
  `Provincia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`Id_Editorial`, `Nombre_Editorial`, `Telefono`, `Direccion`, `Ciudad`, `Provincia`) VALUES
(1000, 'Editora Novo Art', '260-9771', 'Vía Rdo J Alfaro Edif Aventura P2 Of 212', 'Panama', 'Panama'),
(1001, 'Lexus Editores De Panama S.A.', '390-2445', 'San Cristóbal Altos del Hipódromo Bodega N°1 Planta Rio de Oro', 'Panama', 'Panama'),
(1002, 'Editora Escolar S.A. (Ediesco)', '220-0833', 'Av 1 Oeste', 'Panama', 'Panama'),
(1003, 'Susaeta Ediciones Panama S.A.', '220-0833', 'Vía Domingo Díaz, 200m antes de entrada a Cerro Viento', 'Panama', 'Panama'),
(1004, 'Santillana S.A.', '261-3450', 'Pblo Nuevo, Urb Industrial Orillac Calle 2da', 'Panama', 'Panama'),
(1005, 'Ediciones Balboa S.A.', '314-1611', 'Calle Bona, Casa 929-B, La Boca, Panama', 'Panama', 'Panama'),
(1007, 'Grupo Editorial Norma', '225-5241', 'Av. Cultura Griega 55, Delegación Azcapotzalco, Col.', 'Panama', 'Panama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `ISBN` int NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `N_Edicion` int NOT NULL,
  `Copyright` date NOT NULL,
  `N_Pag` int DEFAULT NULL,
  `N_Estanteria` int NOT NULL,
  `N_Ejemplares` int NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Id_Editorial` int NOT NULL,
  `Id_Autor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ISBN`, `Titulo`, `N_Edicion`, `Copyright`, `N_Pag`, `N_Estanteria`, `N_Ejemplares`, `Precio`, `Id_Editorial`, `Id_Autor`) VALUES
(1243, 'Todos los marcianos son iguales', 2, '2017-05-10', 90, 3, 300, '7.50', 1000, 1000),
(1244, 'Estructuras en tiempos de cambio', 3, '2018-05-22', 130, 2, 150, '10.50', 1000, 1000),
(1245, 'Contacto Matematico 1', 1, '2017-03-15', 210, 1, 250, '14.99', 1001, 1001),
(1246, 'Contacto Matematico 2', 2, '2018-04-20', 250, 2, 250, '14.99', 1001, 1001),
(1247, '101 Grandes Mujeres De La Historia', 1, '2019-04-20', 150, 1, 250, '19.99', 1002, 1002),
(1248, 'Astronomía Para Todos', 1, '2019-02-05', 200, 2, 250, '15.99', 1002, 1002),
(1249, 'Español 11', 1, '2017-01-05', 200, 1, 250, '10.99', 1003, 1003),
(1250, 'Español 12', 1, '2017-04-05', 200, 2, 250, '10.99', 1003, 1003),
(1251, 'Física 11', 2, '2017-11-05', 200, 1, 250, '20.00', 1004, 1004),
(1252, 'Física 12', 3, '2019-06-11', 250, 2, 500, '21.00', 1007, 1005),
(1258, 'Naruto', 2, '2020-12-15', 900, 3, 600, '99.50', 1007, 1005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `Cedula` char(16) NOT NULL,
  `Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula`, `Pass`) VALUES
('3-744-243', '.IYhcp5gbHqk2'),
('8-855-1697', '.WbJin0/1msCU'),
('2-736-857', '0I5a3h1r3EGOg'),
('8-893-2450', '/0eu/Ao0wBGcs');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Id_Autor`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`Id_Editorial`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `Id_Editorial` (`Id_Editorial`),
  ADD KEY `Id_Autor` (`Id_Autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `Id_Autor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `Id_Editorial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `ISBN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1259;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`Id_Editorial`) REFERENCES `editorial` (`Id_Editorial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`Id_Autor`) REFERENCES `autor` (`Id_Autor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
