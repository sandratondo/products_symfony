-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2024 a las 17:42:33
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `products_test_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241206112557', '2024-12-07 18:32:46', 161);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `stock`) VALUES
(1, 'Test Product', 'This is a test product.', 99.99, 10),
(2, 'Test Product', 'This is a test product.', 99.99, 10),
(3, 'Test Product', 'This is a test product.', 99.99, 10),
(4, 'Test Product', 'This is a test product.', 99.99, 10),
(5, 'Test Product', 'This is a test product.', 99.99, 10),
(6, 'Test Product', 'This is a test product.', 99.99, 10),
(7, 'Updated Product', 'Updated description.', 29.99, 25),
(9, 'Test Product', 'This is a test product.', 99.99, 10),
(10, 'Updated Product', 'Updated description.', 29.99, 25),
(12, 'Test Product', 'This is a test product.', 99.99, 10),
(13, 'Updated Product', 'Updated description.', 29.99, 25),
(15, 'Test Product', 'This is a test product.', 99.99, 10),
(16, 'Updated Product', 'Updated description.', 29.99, 25),
(18, 'Test Product', 'This is a test product.', 99.99, 10),
(19, 'Updated Product', 'Updated description.', 29.99, 25),
(21, 'Test Product', 'This is a test product.', 99.99, 10),
(22, 'Updated Product', 'Updated description.', 29.99, 25),
(24, 'Test Product', 'This is a test product.', 99.99, 10),
(25, 'Updated Product', 'Updated description.', 29.99, 25),
(27, 'Test Product', 'This is a test product.', 99.99, 10),
(28, 'Updated Product', 'Updated description.', 29.99, 25),
(30, 'Test Product', 'This is a test product.', 99.99, 10),
(31, 'Updated Product', 'Updated description.', 29.99, 25),
(33, 'Test Product', 'This is a test product.', 99.99, 10),
(34, 'Updated Product', 'Updated description.', 29.99, 25),
(36, 'Test Product', 'This is a test product.', 99.99, 10),
(37, 'Updated Product', 'Updated description.', 29.99, 25),
(39, 'Test Product', 'This is a test product.', 99.99, 10),
(40, 'Updated Product', 'Updated description.', 29.99, 25),
(42, 'Test Product', 'This is a test product.', 99.99, 10),
(43, 'Updated Product', 'Updated description.', 29.99, 25),
(45, 'Test Product', 'This is a test product.', 99.99, 10),
(46, 'Updated Product', 'Updated description.', 29.99, 25),
(48, 'Test Product', 'This is a test product.', 99.99, 10),
(49, 'Updated Product', 'Updated description.', 29.99, 25),
(51, 'Test Product', 'This is a test product.', 99.99, 10),
(52, 'Updated Product', 'Updated description.', 29.99, 25),
(54, 'Test Product', 'This is a test product.', 99.99, 10),
(55, 'Updated Product', 'Updated description.', 29.99, 25),
(57, 'Test Product', 'This is a test product.', 99.99, 10),
(58, 'Updated Product', 'Updated description.', 29.99, 25),
(60, 'Test Product', 'This is a test product.', 99.99, 10),
(61, 'Updated Product', 'Updated description.', 29.99, 25),
(63, 'Test Product', 'This is a test product.', 99.99, 10),
(64, 'Updated Product', 'Updated description.', 29.99, 25),
(66, 'Test Product', 'This is a test product.', 99.99, 10),
(67, 'Updated Product', 'Updated description.', 29.99, 25),
(69, 'Test Product', 'This is a test product.', 99.99, 10),
(70, 'Updated Product', 'Updated description.', 29.99, 25),
(72, 'Test Product', 'This is a test product.', 99.99, 10),
(73, 'Updated Product', 'Updated description.', 29.99, 25),
(75, 'Test Product', 'This is a test product.', 99.99, 10),
(76, 'Updated Product', 'Updated description.', 29.99, 25),
(78, 'Test Product', 'This is a test product.', 99.99, 10),
(79, 'Updated Product', 'Updated description.', 29.99, 25),
(81, 'Test Product', 'This is a test product.', 99.99, 10),
(82, 'Updated Product', 'Updated description.', 29.99, 25),
(84, 'Test Product', 'This is a test product.', 99.99, 10),
(85, 'Updated Product', 'Updated description.', 29.99, 25),
(87, 'Test Product', 'This is a test product.', 99.99, 10),
(88, 'Updated Product', 'Updated description.', 29.99, 25),
(90, 'Test Product', 'This is a test product.', 99.99, 10),
(91, 'Updated Product', 'Updated description.', 29.99, 25),
(93, 'Test Product', 'This is a test product.', 99.99, 10),
(94, 'Updated Product', 'Updated description.', 29.99, 25),
(96, 'Test Product', 'This is a test product.', 99.99, 10),
(97, 'Updated Product', 'Updated description.', 29.99, 25),
(99, 'Test Product', 'This is a test product.', 99.99, 10),
(100, 'Updated Product', 'Updated description.', 29.99, 25),
(102, 'Test Product', 'This is a test product.', 99.99, 10),
(103, 'Updated Product', 'Updated description.', 29.99, 25),
(105, 'Test Product', 'This is a test product.', 99.99, 10),
(106, 'Updated Product', 'Updated description.', 29.99, 25),
(108, 'Test Product', 'This is a test product.', 99.99, 10),
(109, 'Updated Product', 'Updated description.', 29.99, 25),
(111, 'Test Product', 'This is a test product.', 99.99, 10),
(112, 'Updated Product', 'Updated description.', 29.99, 25),
(114, 'Test Product', 'This is a test product.', 99.99, 10),
(115, 'Updated Product', 'Updated description.', 29.99, 25),
(117, 'Test Product', 'This is a test product.', 99.99, 10),
(118, 'Updated Product', 'Updated description.', 29.99, 25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
