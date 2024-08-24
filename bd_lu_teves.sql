-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2024 a las 03:02:26
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
-- Base de datos: `bd_lu_teves`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria_descripcion` text NOT NULL,
  `categoria_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria_descripcion`, `categoria_estado`) VALUES
(2, 'Auriculares', 1),
(3, 'Parlantes', 1),
(4, 'Gaming', 1),
(5, 'Fundas', 1),
(7, 'Electrodomesticos', 1),
(8, 'Luces', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(50) NOT NULL,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `asunto` text NOT NULL,
  `consulta` text NOT NULL,
  `leido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `nombre`, `correo`, `asunto`, `consulta`, `leido`) VALUES
(1, 'Manito', 'cliente@gmail.com', 'Este es un asunto 1', 'Esta una consulta 1', 0),
(2, 'Luz', 'cliente', 'asunto', 'consulta\r\n', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(20) NOT NULL,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `asunto` text NOT NULL,
  `consulta` text NOT NULL,
  `leido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `correo`, `asunto`, `consulta`, `leido`) VALUES
(10, 'lucas', 'tito@gmail.com', 'Consulta 2', 'Salio bien?', 0),
(15, 'lucas', 'tito@gmail.com', 'prueba numero 10000', 'aca va la consulta', 0),
(22, 'marcos', 'marcos@gmail.com', 'asunto', 'consulta', 0),
(27, 'Ana Luz', 'annateves112@gmail.com', 'asunto', 'consulta', 1),
(29, 'Ana Luz', 'luz@gmail.com', 'Prueba 1233', 'consulta????\r\n', 1),
(33, 'nahu', 'luz@gmail.com', 'un asunto', 'consulta', 1),
(35, 'Ana Luz', 'luz@gmail.com', 'prueba numero 10000', 'consultaaaaaaaaaaaa', 0),
(37, 'Ana Luz', 'annateves112@gmail.com', 'prueba numero 10000', 'esta es una consulta', 0),
(40, 'lucas', 'nahu@gmail.com', 'prueba numero 10000', 'consulta', 0),
(42, 'lucas', 'nahu@gmail.com', 'fatal errror', ' A VER', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(20) NOT NULL,
  `detalle_precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precio`) VALUES
(3, 12, 1, 25000.00),
(3, 8, 2, 30000.00),
(4, 8, 1, 30000.00),
(5, 8, 1, 30000.00),
(7, 8, 1, 30000.00),
(8, 8, 1, 30000.00),
(9, 12, 2, 25000.00),
(10, 8, 1, 30000.00),
(10, 33, 1, 15000.00),
(11, 8, 1, 30000.00),
(11, 12, 1, 25000.00),
(12, 12, 1, 25000.00),
(12, 34, 1, 10000.00),
(13, 8, 2, 30000.00),
(14, 12, 2, 50000.00),
(15, 8, 1, 30000.00),
(16, 12, 1, 25000.00),
(17, 13, 1, 10000.00),
(18, 12, 1, 25000.00),
(19, 13, 1, 10000.00),
(20, 26, 1, 4000.00),
(21, 13, 1, 10000.00),
(22, 13, 1, 10000.00),
(22, 12, 1, 25000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `total_venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_venta`, `id_usuario`, `fecha_venta`, `total_venta`) VALUES
(16, 3, '2024-06-09', 25000.00),
(17, 3, '2024-06-09', 10000.00),
(18, 3, '2024-06-10', 25000.00),
(19, 3, '2024-06-10', 10000.00),
(20, 3, '2024-06-17', 4000.00),
(21, 3, '2024-06-17', 10000.00),
(22, 3, '2024-06-18', 35000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(20) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(50) NOT NULL,
  `producto_nombre` text NOT NULL,
  `producto_descripcion` text NOT NULL,
  `producto_precio` decimal(20,2) NOT NULL,
  `producto_stock` int(5) NOT NULL,
  `producto_imagen` varchar(100) NOT NULL,
  `producto_estado` int(1) NOT NULL,
  `producto_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto_nombre`, `producto_descripcion`, `producto_precio`, `producto_stock`, `producto_imagen`, `producto_estado`, `producto_categoria`) VALUES
(8, 'Auriculares', 'Auriculares gaming', 30000.00, 4, '1716389778_22bf2e6f3885f0c79939.png', 1, 2),
(12, 'Airdpods', 'Auriculares Apple', 25000.00, 4, '1716397626_5cd1d7388f392df677e5.jpg', 1, 2),
(13, 'Auriculares Haylou', 'Auriculares innalambricos', 10000.00, 1, '1716397832_1e7fd542e320f3df9ea4.jpg', 1, 2),
(14, 'Parlante JBL', 'Parlante bluetooth', 15000.00, 10, '1716399583_a18d4c127880079e35d6.jpg', 1, 3),
(16, 'Teclado', 'Teclado con luces estilo gamer', 12000.00, 5, '1716960733_2e86ffbf028dbcebdc42.jpg', 1, 4),
(18, 'Funda', 'Funda transparente', 4000.00, 10, '1716402726_494d414898642c171d2c.jpeg', 1, 5),
(19, 'Joystick', 'Joystick innalambrico', 10000.00, 20, '1716412983_0c480c9e090698ce13ba.png', 1, 4),
(24, 'Mouse gamer LED', 'Mouse con usb', 9000.00, 10, '1716478161_19d04ae4d84bdbf26338.jpg', 1, 4),
(25, 'Mouse y pad gamer', 'Combo mouse y pad', 15000.00, 5, '1716478269_6980f578e2a491da769a.jpg', 1, 4),
(26, 'Silicone case', 'Funda apple de silicona', 4000.00, 19, '1716478447_2d60ee43e82318f66504.jpg', 1, 5),
(27, 'Funda samsung', 'Funda silicona SamA14', 3500.00, 20, '1716764029_2aa5bcdcaadc14c960c3.jpg', 1, 5),
(29, 'Parlante portatil', 'Con bluetooth', 20000.00, 5, '1716764780_61b320a487ea8fbf304b.jpg', 1, 3),
(30, 'Parlante combo', 'Parlante con microfono', 50000.00, 10, '1716764925_83d27ecd393c67423916.jpg', 1, 3),
(31, 'Set gamer', 'Teclado + mouse', 50000.00, 5, '1716839130_04b17d692551ee1e4370.jpg', 1, 4),
(32, 'Kit combo', 'Mouse + pad gamer', 25000.00, 3, '1716839206_b1c8ed040cbfa977a856.jpg', 1, 4),
(33, 'Mouse', 'Gamer', 15000.00, 10, '1716839275_970f8cb003ea66644abc.jpg', 1, 4),
(34, 'Mouse pad', 'Tamaño chico', 10000.00, 9, '1716839321_6b7ecdf6472a551fc825.jpg', 1, 4),
(35, 'Funda iphone', 'Diseño', 4000.00, 5, '1716839385_4e8cdfb32674d4ccd31d.png', 1, 5),
(36, 'Funda iphone', 'Transparente con color', 4500.00, 10, '1716839423_4028ac962fbe90a440f4.png', 1, 5),
(37, 'Auriculares gamer', 'Con microfono', 20000.00, 15, '1716839469_9282161fbcccf09ef63e.jpg', 1, 2),
(38, 'Auricular', 'Con cable', 9000.00, 10, '1716839538_34d3b998867415c250e8.png', 1, 2),
(39, 'Parlante genius', 'Para pc', 40000.00, 10, '1716839606_3d4d6e03b93ede3b5207.jpg', 1, 3),
(40, 'Parlante midiplus', 'De estudio', 50000.00, 8, '1716839677_0ef4735060eaf9688b81.jpg', 1, 3),
(43, 'Luces led', 'Tira 5 metros', 15000.00, 4, '1717555059_24127a651345cfd39626.jpg', 1, 8),
(44, 'Tiras led', '8 colores', 10000.00, 5, '1717555199_1fb3d3278b4fb72ed626.jpg', 1, 8),
(45, 'Caloventor', 'Marca liliana', 50000.00, 10, '1717555236_8ecd0facc69380106a20.jpg', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(30) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `id_perfil` int(11) NOT NULL DEFAULT 2,
  `email` varchar(50) NOT NULL,
  `baja` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `id_perfil`, `email`, `baja`) VALUES
(1, 'Admin', 'Admin', '$2y$10$9/puwZP2uYeW9.gHsepo2u9PyJBUs8LAu8p2VA.AZ0Oulyee3ExIe', 1, 'admin', 1),
(3, 'Luz', 'Teves\r\n', '$2y$10$eT4o0uF4wW8hezN9nZUopO7UaaTdcMd1Esgvm1w2yqQoy9iGpJ2Yi', 2, 'cliente', 1),
(4, 'Enzo', 'Barrios', '$2y$10$ixVfhWAi9VrFt1vo9VQs.uj.k1qcUNSGji8u3RJzA50Fil0x0N62y', 2, 'EnzoBarrios@gmail.com', 0),
(5, 'Lucas', 'Titonel', '$2y$10$zKkR0cCBIJe5myQYty65qeSsCn6vp1w3804Y2jnu6O28kAx8/z8VO', 2, 'titonellucas@gmail.com', 1),
(6, 'Nahuel', 'Peralta', '$2y$10$C2LWXT7L.SNL0jmM/EcNB.R7VasQrgAt4QTuRJemnV8MC0Aqxgq7S', 2, 'nahu@gmail.com', 0),
(7, 'Axel', 'Altamirano', '$2y$10$fKoj86LnghXR2vNOyu9M1O8D4f49x6azCEp3VZ6Vl6fZ3t0XvLDv.', 2, 'axel@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `id_venta` (`id_venta`,`id_producto`),
  ADD KEY `id_venta_2` (`id_venta`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_categoria` (`producto_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`producto_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
