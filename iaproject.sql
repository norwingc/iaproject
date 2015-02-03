-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2015 a las 04:54:35
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `iaproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `sintomas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `tratamiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receta` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `doctor_id`, `paciente_id`, `sintomas`, `descripcion`, `tratamiento`, `receta`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'alergia a alimentos ', 'alergia a consumir alimentos como : leche', 'En la alergia alimentaria se debe de hacer una dieta de exclusión del alimento implicado.\r\nSi en un momento dado el alimento no se ha podido evitar por error:\r\n\r\nEn un cuadro leve se puede tomar un antihistamínico por boca como Xaxal, Aerrius, Ebastel , c', 'acetaminofen', '2015-02-03 08:39:23', '2015-02-03 08:39:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE IF NOT EXISTS `doctores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `apellido`, `direccion`, `cargo`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Norwin', 'Guerrero', 'Managua', 'Cirujano', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Norwin ', 'Guerrero', 'Managua', 'Director', 2, '2015-01-28 01:02:31', '2015-01-28 01:02:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE IF NOT EXISTS `enfermedades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sintomas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`, `sintomas`, `created_at`, `updated_at`) VALUES
(1, 'Alergias', 'Alergia a Alimentos, Alergia a Frutas, Alergia a Frutos Secos, Sinusitis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cáncer', 'Alfafetoproteína, Calcitonina, Cáncer de Mama, Melanoma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Diabetes', 'Insulinas, Pie Diabético, Retinopatía Diabética', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Drogadicción', 'Cocaína, Actitud inicial de los padres, Sospecha de problemas con drogas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Enfermedades Comunes', 'Laringitis, Deshidratación, Estreñimiento, Hemorroides, Varices, Mareo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Enfermedades de la Piel', 'Acné, Ampollas, Pecas, Quemaduras', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Enfermedades de Transmisión Sexual', 'Candidiasis, Ladillas, Sífilis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Enfermedades Del Aparato Digestivo', 'Diarrea, Dolor abdominal, Estreñimiento, Gastritis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Enfermedades pulmonares', 'Neumonía, Asma Bronquial, Bronquitis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Lesiones Deportivas', 'Lesiones en el Deporte, Dolor de Rodilla, Pubalgia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Problemas Psicólogicos', 'Afasia, Angustia, Bulimia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Salud dental', 'Endodoncia, Odontología estética, Periodoncia, Cirugía dental preprotésica', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_14_182918_create_usuarios_table', 1),
('2015_01_14_183148_create_doctores_table', 1),
('2015_01_25_205056_create_consultas_table', 3),
('2015_01_25_192135_create_pacientes_table', 4),
('2015_02_01_235847_create_enfermedades_table', 5),
('2015_02_02_000012_create_tratamientos_table', 5),
('2015_02_02_000051_create_sintomas_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ingreso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `antecedentes_drop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `antecedentes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `infancia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intervencion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `traumatismo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transfuciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medicamentos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personales_patologicos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `habitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tabaquismo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toxicomanias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deportes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `edad`, `sexo`, `ocupacion`, `nacionalidad`, `estado_civil`, `direccion`, `cedula`, `responsable`, `ingreso`, `antecedentes_drop`, `antecedentes`, `infancia`, `intervencion`, `traumatismo`, `transfuciones`, `medicamentos`, `personales_patologicos`, `habitos`, `tabaquismo`, `toxicomanias`, `deportes`, `created_at`, `updated_at`) VALUES
(1, 'Norwin Guerrero Cruz', 22, 'Masculino', 'estudiante', 'nicaraguense', 'Soltero', 'managua', '001-190592-0010c', 'mama', '2015-02-01', 'Ectrodactilia,    Distrofia muscular,    Acrodisostosis', ' tuberculosis, enf mentales, sindrome allgrove   ', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'baño', 'no', 'no', 'futball', '2015-02-02 04:09:39', '2015-02-02 05:44:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE IF NOT EXISTS `sintomas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sintoma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enfermedad_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id`, `sintoma`, `enfermedad_id`, `created_at`, `updated_at`) VALUES
(1, 'Alergia a Alimentos', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Alergia a Frutas', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Alergia a Frutos Secos', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Sinusitis', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Alfafetoproteína', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Calcitonina', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Cáncer de Mama', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Melanoma', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Insulinas', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Pie Diabético', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Retinopatía Diabética', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Cocaína', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Actitud inicial de los padres', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Sospecha de problemas con drogas', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Laringitis', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Deshidratación', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Estreñimiento', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Hemorroides', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Varices', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Mareo', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Acné', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Ampollas', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Pecas', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Quemaduras', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Candidiasis', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Ladillas', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Sífilis', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Diarrea', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Dolor abdominal', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Estreñimiento', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Gastritis', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Neumonía', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Asma Bronquial', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Bronquitis', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Lesiones en el Deporte', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Dolor de Rodilla', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Pubalgia', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Afasia', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Angustia', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Bulimia', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Endodoncia', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Odontología estética', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Periodoncia', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Cirugía dental preprotésica', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE IF NOT EXISTS `tratamientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `sintoma_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `descripcion`, `sintoma_id`, `created_at`, `updated_at`) VALUES
(1, 'En la alergia alimentaria se debe de hacer una dieta de exclusión del alimento implicado.\n\n								Si en un momento dado el alimento no se ha podido evitar por error:\n\n								En un cuadro leve se puede tomar un antihistamínico por boca como Xaxal, Aerrius, Ebastel , cetiricina , Loratadina, etc..\n								Si el cuadro es más intenso se debe asociar la toma de un esteroide por boca como Dacortin 30 mg o en niños Estilsona gotas, además del antihistamínico.\n								En caso de una alergia de tipo anafiláctico a proteínas de alimentos, debería llevar Altellus® 0,30 (Adultos) o Altellus® 0,10.(niños de < 35 Kg).\n\n								En caso de reacción alérgica por la ingesta accidental de proteínas de alimentos se debe administrar Altellus® a dosis de 0,30 cc/0,10 cc.'',', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Los antibióticos de elección en la sinusitis, tanto aguda como crónica, son la ampicilina y la amoxicilina; sin embargo, las bacterias productoras de B-lactamasa son un problema constante.\n\n								Son alternativas válidas la amoxicilina-clavulámico, el cefaclor, el trimetoprim-sulfametoxazol, la cefuroxima, la eritromicina-sulfizoxazol y clindamicina.\n\n								La duración del tratamiento de la sinusitis aguda debe ser de al menos diez-catorce días y la de la sinusitis crónica de tres-cuatro semanas.\n\n								Los tratamientos de apoyo para reducir el edema tisular y aliviar la obstrucción de los orificios sinusales comprenden la administración de descongestivos orales y corticosteroides tópicos.\n\n								En los pacientes con rinitis alérgica, la combinación de descongestivos y antihistamínicos puede contribuir a reducir las secreciones. En algunos casos, se usan descongestivos nasales tópicos durante dos-tres días, seguidos de esteroides nasales tópicos, ya que los descongestivos tópicos a largo plazo pueden originar rinitis medicamentosa. En algunos pacientes con obstrucción nasal significativa y pólipos nasales, se requiere un breve ciclo de prednisona de siete-diez días.\n\n								Se necesita consulta quirúrgica en los casos de sinusitis aguda complicada, sinusitis insensible a la terapéutica médica enérgica y sinusitis crónica recidivante (más de cuatro episodios al año). Las intervenciones quirúrgicas deben ir seguidas de tratamiento médico, que comprende el uso de corticosteroides tópicos para minimizar la reaparición de pólipos nasales. Las intervenciones quirúrgicas comprenden el lavado sinusal, la creación de un orificio ensanchado para proporcionar drenaje efectivo y aireación, y la resección del tejido enfermo.', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'En el tratamiento del cáncer de mama se utilizan cuatro tipos de tratamiento:\n								cirugía\n								radioterapia\n								quimioterapia\n								terapia hormonal\n								Se están realizando estudios clínicos con terapia biológica y con el trasplante de medula ósea.\n								En primer lugar se utiliza la cirugía para extraer el nódulo canceroso de la mama, también se extraen los ganglios linfáticos axilares para su análisis en el microscopio y detectar la extensión de células cancerosas.'',', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'La deshidratación leve se trata con reposición oral de líquidos y sales (iones), utilizando cuando es posible soluciones de rehidratación comerciales (tipo Sueroral, Bebesales, etc) o caseras, como la llamada "Limonada alcalina". Ésta se prepara disolviendo en 1 litro de agua el zumo de 2 limones, una cucharada de bicarbonato sódico y azúcar al gusto.\n								La deshidratación grave precisa líquidos intravenosos, y generalmente, hospitalización.'',', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'En mareos por hipotensión se debe de tener en cuenta que al levantarse debe de hacerlo poco a poco, evitando los cambios de postura rápidos.\n								Si ya se ha producido debe de tumbarse (con cuidado para no tener traumatismos al caerse) o mantenerse tumbado un rato con loas piernas elevadas, hasta que el riego sanguíneo llegue bien al cerebro y se recupere el color rosado de piel y mucosas.\n								Luego, levantarse poco a poco.\n								El tomar bebidas estimulantes como el café o el thé suele tener efectos beneficiosos.\n								Si se nota con sed se debe de tomar agua o líquidos, si es por un cuadro de vómitos o diarreas con más necesidad y si no se toleran por boca será necesario ponerlos mediante la aplicación de sueros.\n								Si el mareo es de posible origen cardiaco habrá que hacer un estudio en profundidad.\n								Si es un accidente cerebro vascular esto es una urgencia médica y hay que acudir a un servicio de urgencias.'',', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'No rompa las ampollas, pues esto aumenta la posibilidad de infección.\n								Atraviese la ampolla con aguja e hilo para evacuar el líquido. A continuación lave la zona con agua y jabón antiséptico. Secar bien la zona, aplicar antiséptico tipo Betadine, secar y colocar un apósito.\n								Si la ampolla se rompe accidentalmente, recorte la piel suelta, lave con agua y jabón antiséptico, aplique antiséptico tipo Betadine y coloque un apósito.\n								Las ampollas se secarán y la piel se desprenderá en un tiempo de una a dos semanas.'',', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Las quemaduras de primer grado pueden tratarse sin trasladar a un centro sanitario, mediante una crema hidratante. No es necesario taparla.\n								Si es una quemadura generalizada, primero, se debe estar en agua templada durante largo tiempo, para bajar la temperatura de la piel, pero sin quedarnos helados (hipotermia).\n								Se deben trasladar a un centro sanitario a las quemaduras de segundo y tercer grado, las de cara, manos, cuello o zonas de pliegues. También si son ancianos o niños, ya que son más sensibles a sus efectos.\n								En todo caso, el centro de coordinación de emergencias de tu población (teléfonos 061 ó 112) están disponibles las 24 h. del día para asesorarte y sacarte de dudas.'',', 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'norwingc', '$2y$10$xg650ljBlnnzqHSjeSIjuudxdE.oKdTvw2UGh8m8fhT.0zMEJRcEq', 'norwingc_war@outlook.com', 'ou6XoZ2PeYvzGd2pKg7d2TTCPgsw4KAlCszu0zN4uMEOjlLCvs3200KyFrmn', '2015-01-14 06:00:00', '2015-01-28 01:02:46'),
(2, 'admin', '$2y$10$MXLXsACHK7bcDxpQTpJdIuX83O0T1LDJTLsCCmN3BrHt31iVM17Ma', 'norwingcruz@gmail.com', 'P95kqisBLtpTyr2oLjMn3ZdYv9epyTPs4NvQQxeM64zudiLOSCiICFUWeYdU', '2015-01-28 01:02:31', '2015-01-28 01:29:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
