-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 06:32:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `prod_name`, `expected_date`, `note`) VALUES
(12, 'Sandra Schechtel', 'Silva 890', '562242', '', '', '', 'Maestra'),
(13, 'Nicolas Baudis Tecnico y Desarrollador', 'Silva 890 entre tita merello', '156638431', '', '', '', 'Moises. Vive al frente de garcia'),
(15, 'Sandra Gonzales ', 'Chile', '2954-567324', '', '', '', 'Casa verde porton rojo llegand MOISES '),
(16, 'Dario Gonzales ', 'Mitre ', '1564254', '', '', '', 'Negro malandra'),
(17, 'Maria Perez Sanchez', 'Jose Luro 140 entre marioano moreno y avenida chancho del oeste pampeano', '2954-332213', '', '', '', 'Albañil Mises tiene una casa azull con critales de transparentes. De color azul '),
(18, 'Aldana Baudis ', 'silva 890', '2954543232', '', '', '', ''),
(19, 'Presupuesto', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`) VALUES
(1, 'Cemento Loma Negra 50Kg', '', '', '', '', '2000', '', '', 0, -35, 0, '', ''),
(2, 'Cal Cacique 30kig', '', '', '', '', '1100', '', '', 0, -52, 0, '', ''),
(3, 'Ceresita 5k', '', '', '', '', '500', '', '', 0, -30, 0, '', ''),
(4, 'Arena de Rio 1mts', '', '', '', '', '1300', '', '', 0, -23, 0, '', ''),
(5, 'Arena de Rio 0.5 Mts', '', '', '', '', '400', '', '', 0, -9, 0, '', ''),
(6, 'Arena de Medano1mts', '', '', '', '', '700', '', '', 0, -5, 0, '', ''),
(7, 'Arena de Medano 1/2 mts', '', '', '', '', '400', '', '', 0, -5, 0, '', ''),
(8, 'Alambre de Fardo 10kg', '', '', '', '', '200', '', '', 0, -11, 0, '', ''),
(9, 'Flete Javier', '', '', '', '', '800', '', '', 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` double(100,0) NOT NULL,
  `profit` double(100,0) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `cuenta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`, `material`, `cuenta`) VALUES
(492, 'RS-9932222', 'Admin', '01/12/22', 'cash', 1200, 0, '1200', 'Sandra Schechtel', '', 'Cemento Loma Negra 50Kg', 'pagado'),
(493, 'RS-220300', 'Admin', '01/12/22', 'cash', 2800, 0, '2800', 'Sandra Gonzales ', '', 'Ceresita 5k', 'Pagado'),
(494, 'RS-3700024', 'Admin', '01/12/22', 'cash', 2900, 100, '3000', 'Sandra Gonzales ', '', 'Arena de Rio 1mts', 'Pagado'),
(495, 'RS-023922', 'Admin', '01/12/22', 'cash', 2000, 0, '2000', 'Sandra Schechtel', '', 'Arena de Medano 1/2 mts', 'Pagado'),
(496, 'RS-2432292', 'Admin', '01/12/22', 'cash', 1100, 0, '1100', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cal Cacique 30kig', 'Pagado'),
(497, 'RS-3000023', 'Admin', '01/13/22', 'cash', 1100, 0, '1100', 'Sandra Schechtel', '', 'Cal Cacique 30kig', 'Pagado'),
(498, 'RS-4222802', 'Admin', '01/14/22', 'cash', 500, 100, '600', 'Sandra Schechtel', '', 'Ceresita 5k', 'Pagado'),
(499, 'RS-23228', 'Admin', '01/17/22', 'cash', 1600, 1000, '0', 'Maria Perez Sanchez', '', 'Ceresita 5k', 'pagado'),
(501, 'RS-2200325', 'Admin', '01/17/22', 'cash', 5000, 1000, '6000', 'Maria Perez Sanchez', '', 'Flete Javier', 'Pagado'),
(502, 'RS-063752', 'Admin', '01/17/22', 'cash', 1200, -200, '1000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Pagado'),
(503, 'RS-23058', 'Admin', '01/17/22', 'cash', 500, 0, '500', 'Dario Gonzales ', '', 'Flete Javier', 'pagado'),
(504, 'RS-4303686', 'Admin', '01/17/22', 'cash', 400, 0, '400', 'Maria Perez Sanchez', '', 'Arena de Medano 1/2 mts', 'pagado'),
(505, 'RS-233223', 'Admin', '01/17/22', 'cash', 2000, -400, '1600', 'Dario Gonzales ', '', 'Flete Javier', 'Cuenta Corriente'),
(506, 'RS-8003232', 'Admin', '01/17/22', 'cash', 1700, 700, '1000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Flete Javier', 'pagado'),
(507, 'RS-000339', 'Admin', '01/17/22', 'cash', 38400, -13400, '25000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Flete Javier', 'Cuenta Corriente'),
(508, 'RS-30033000', 'Admin', '01/17/22', 'cash', 2400, -2400, '0', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Cuenta Corriente'),
(509, 'RS-430277', 'Admin', '01/17/22', 'cash', 2000, -700, '1300', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Cuenta Corriente'),
(510, 'RS-802373', 'Admin', '01/17/22', 'cash', 500, -500, '0', 'Sandra Schechtel', '', 'Ceresita 5k', 'Cuenta Corriente'),
(511, 'RS-226222', 'Admin', '01/17/22', 'cash', 1100, 0, '1100', 'Sandra Schechtel', '', 'Cal Cacique 30kig', 'pagado'),
(512, 'RS-8093333', 'Admin', '01/17/22', 'cash', 2000, 0, '2000', 'Aldana Baudis ', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(513, 'RS-303602', 'Admin', '01/24/22', 'cash', 3600, 400, '4000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Flete Javier', 'Pagado'),
(514, 'RS-62837040', 'Admin', '01/24/22', 'cash', 500, -500, '0', 'Sandra Schechtel', '', 'Ceresita 5k', 'Cuenta Corriente'),
(515, 'RS-27740380', 'Admin', '05/03/23', 'cash', 7000, -7000, '0', 'Maria Perez Sanchez', '', 'Arena de Rio 1mts', 'Cuenta Corriente'),
(516, 'RS-0632024', 'Admin', '05/03/23', 'cash', 1300, -1300, '0', 'Sandra Gonzales ', '', 'Cal Cacique 30kig', 'Cuenta Corriente'),
(517, 'RS-324388', 'Admin', '05/03/23', 'cash', 2000, 500, '2500', 'Aldana Baudis ', '', 'Cemento Loma Negra 50Kg', 'pagado'),
(518, 'RS-3633422', 'Admin', '05/03/23', 'cash', 1500, -1500, '0', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Flete Javier', 'Cuenta Corriente'),
(519, 'RS-32302332', 'Admin', '05/03/23', 'cash', 2500, -2500, '0', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Flete Javier', 'Cuenta Corriente'),
(520, 'RS-4330233', 'Admin', '05/03/23', 'cash', 1100, 0, '1100', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cal Cacique 30kig', 'Presupuesto'),
(521, 'RS-33623202', 'Admin', '05/03/23', 'cash', 2000, 0, '2000', 'Sandra Schechtel', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(522, 'RS-3630300', 'Admin', '05/03/23', 'cash', 2100, -2100, '0', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Flete Javier', 'Cuenta Corriente'),
(523, 'RS-2203237', 'Admin', '05/03/23', 'cash', 2000, 0, '2000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(524, 'RS-532003', 'Admin', '05/03/23', 'cash', 3000, 0, '3000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Ceresita 5k', 'Presupuesto'),
(525, 'RS-03260327', 'Admin', '05/03/23', 'cash', 4000, -4000, '0', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Alambre de Fardo 10kg', 'Cuenta Corriente'),
(526, 'RS-332223', 'Admin', '05/03/23', 'cash', 2000, 0, '2000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(527, 'RS-333303', 'Admin', '05/03/23', 'cash', 2500, 0, '2500', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Ceresita 5k', 'Presupuesto'),
(528, 'RS-02223', 'Admin', '05/03/23', 'cash', 2000, -1000, '1000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Cuenta Corriente'),
(529, 'RS-7297322', 'Admin', '05/03/23', 'cash', 2000, 0, '2000', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(530, 'RS-32838300', 'Admin', '05/03/23', 'cash', 4000, -4000, '0', 'Sandra Schechtel', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(531, 'RS-32200', 'Admin', '03/05/23', 'cash', 3300, 0, '', 'Sandra Schechtel', '', 'Arena de Rio 1mts', 'Presupuesto'),
(532, 'RS-0244833', 'Admin', '03/05/23', 'cash', 2200, 0, '', 'Dario Gonzales ', '', 'Cal Cacique 30kig', 'Presupuesto'),
(533, 'RS-660288', 'Admin', '03/05/23', 'cash', 4400, -4400, '0', 'Nicolas Baudis Tecnico y Desarrollador', '', 'Arena de Rio 1mts', 'Cuenta Corriente'),
(535, 'RS-020233', 'Admin', '03/05/23', 'cash', 2000, 0, '', 'Presupuesto', '', 'Cemento Loma Negra 50Kg', 'Presupuesto'),
(536, 'RS-23900824', 'Admin', '03/05/23', 'cash', 2000, 0, '', 'Presupuesto', '', 'Cemento Loma Negra 50Kg', 'Pagado'),
(538, 'RS-605232', 'Admin', '10/05/23', 'cash', 2000, 0, '', 'Presupuesto', '', 'Cemento Loma Negra 50Kg', 'Presupuesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(11, 'RS-323370', '10', '0.25', '75', '0', 'Arena Rubia Mts', '', '', '300', '', '08/11/19'),
(12, 'RS-202222', '10', '0.50', '150', '0', 'Arena Rubia Mts', '', '', '300', '', '07/14/19'),
(14, 'RS-3003', '23', '3', '1170', '0', 'Cemento Loma Negra 50Kg', '', '', '390', '', '07/14/19'),
(15, 'RS-730330', '23', '2', '780', '0', 'Cemento Loma Negra 50Kg', '', '', '390', '', '07/14/19'),
(16, 'RS-32023336', '1', '1.2', '1440', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/05/22'),
(17, 'RS-392200', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/05/22'),
(20, 'RS-232332', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/05/22'),
(21, 'RS-232332', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/05/22'),
(22, 'RS-232332', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/05/22'),
(23, 'RS-072282', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/05/22'),
(24, 'RS-0023238', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/05/22'),
(25, 'RS-0093504', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/05/22'),
(26, 'RS-04080902', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/05/22'),
(27, 'RS-33292', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/05/22'),
(28, 'RS-33292', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/05/22'),
(29, 'RS-8322320', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/05/22'),
(30, 'RS-8322320', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/05/22'),
(31, 'RS-022293', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(32, 'RS-022293', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/06/22'),
(33, 'RS-23202662', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/06/22'),
(34, 'RS-09372294', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(35, 'RS-09372294', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/06/22'),
(37, 'RS-09372294', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/06/22'),
(38, 'RS-3432229', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(39, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(40, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(41, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(42, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(43, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(44, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(45, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(46, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(47, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(48, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(49, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(50, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(51, 'RS-02650022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(52, 'RS-02650022', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/06/22'),
(53, 'RS-0327334', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(54, 'RS-0327334', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(55, 'RS-0327334', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(56, 'RS-0327334', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(57, 'RS-3634420', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(58, 'RS-94332233', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/06/22'),
(59, 'RS-3662254', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(60, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(61, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(62, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(63, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(64, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(65, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(66, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(67, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(68, 'RS-0322323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(69, 'RS-2622', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(70, 'RS-3023238', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(71, 'RS-33337200', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(72, 'RS-0493703', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(73, 'RS-0493703', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/06/22'),
(75, 'RS-2333223', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/06/22'),
(76, 'RS-2333223', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/06/22'),
(77, 'RS-2333223', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(78, 'RS-2333223', '6', '1', '700', '0', 'Arena de Medano1mts', '', '', '700', '', '01/06/22'),
(79, 'RS-33393072', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(80, 'RS-0238820', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(81, 'RS-2723222', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(82, 'RS-2723222', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/06/22'),
(83, 'RS-400279', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/06/22'),
(84, 'RS-083334', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/06/22'),
(85, 'RS-320279', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(86, 'RS-03022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(87, 'RS-020205', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(88, 'RS-020205', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/06/22'),
(89, 'RS-80332', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(90, 'RS-433233', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(91, 'RS-3873298', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(92, 'RS-235020', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/06/22'),
(93, 'RS-02625335', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(94, 'RS-3332530', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/06/22'),
(95, 'RS-8332233', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/06/22'),
(96, 'RS-2272433', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/07/22'),
(97, 'RS-2272433', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/07/22'),
(98, 'RS-2243222', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/07/22'),
(99, 'RS-333333', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/07/22'),
(100, 'RS-232333', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/07/22'),
(101, 'RS-2023322', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/07/22'),
(102, 'RS-2023322', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/07/22'),
(103, 'RS-4970222', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(104, 'RS-802233', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/09/22'),
(105, 'RS-2632224', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/09/22'),
(106, 'RS-2632224', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/09/22'),
(107, 'RS-3298380', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/09/22'),
(108, 'RS-3298380', '2', '0.5', '550', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/09/22'),
(109, 'RS-900722', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/09/22'),
(110, 'RS-93222', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(111, 'RS-2230023', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(112, 'RS-86332099', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(113, 'RS-924222', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(114, 'RS-303322', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(115, 'RS-303033', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/09/22'),
(116, 'RS-9322003', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(117, 'RS-9322003', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/10/22'),
(118, 'RS-073292', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(119, 'RS-073292', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/10/22'),
(120, 'RS-3990390', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(121, 'RS-3990390', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(122, 'RS-3990390', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/10/22'),
(123, 'RS-7230623', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(124, 'RS-7323302', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(125, 'RS-7323302', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/10/22'),
(126, 'RS-332300', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(127, 'RS-6322003', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(128, 'RS-7423', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(129, 'RS-2333372', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(130, 'RS-33430328', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(131, 'RS-6063062', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(132, 'RS-9307030', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(133, 'RS-2233239', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(134, 'RS-26903090', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(135, 'RS-26903090', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/10/22'),
(136, 'RS-26903090', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/10/22'),
(137, 'RS-39500342', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(138, 'RS-7339930', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(139, 'RS-7339930', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(140, 'RS-7339930', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/10/22'),
(141, 'RS-7339930', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/10/22'),
(142, 'RS-7339930', '6', '1', '700', '0', 'Arena de Medano1mts', '', '', '700', '', '01/10/22'),
(143, 'RS-7339930', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/10/22'),
(144, 'RS-7339930', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(145, 'RS-7339930', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(146, 'RS-2206', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(147, 'RS-2206', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(148, 'RS-2206', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(149, 'RS-2206', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/10/22'),
(150, 'RS-2206', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/10/22'),
(151, 'RS-2206', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/10/22'),
(152, 'RS-2206', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/10/22'),
(153, 'RS-2206', '6', '1', '700', '0', 'Arena de Medano1mts', '', '', '700', '', '01/10/22'),
(154, 'RS-2206', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/10/22'),
(155, 'RS-2206', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/10/22'),
(156, 'RS-230230', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/10/22'),
(157, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(158, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(159, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(160, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(161, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(162, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(163, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(164, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(165, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(166, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(167, 'RS-230230', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(168, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(169, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(170, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(171, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(172, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(173, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(174, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(175, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(176, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(177, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(178, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(179, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(180, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(181, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(182, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(183, 'RS-2333002', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(184, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(185, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(186, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(187, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(188, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(189, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(190, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(191, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(192, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(193, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(194, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(195, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(196, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(197, 'RS-33608998', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/10/22'),
(198, 'RS-2543700', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(199, 'RS-032395', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/12/22'),
(200, 'RS-3332322', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(201, 'RS-0522302', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(202, 'RS-384283', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/12/22'),
(203, 'RS-72200', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/12/22'),
(204, 'RS-72200', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/12/22'),
(205, 'RS-30337', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(206, 'RS-2723022', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(207, 'RS-2723022', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/12/22'),
(208, 'RS-73234', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(209, 'RS-62832773', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/12/22'),
(210, 'RS-20260', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(211, 'RS-53822302', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(212, 'RS-20320330', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(213, 'RS-33223', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(214, 'RS-50303', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(215, 'RS-7000323', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/12/22'),
(216, 'RS-232339', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(217, 'RS-333032', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(218, 'RS-09950', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(219, 'RS-330332', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(220, 'RS-2222223', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(221, 'RS-2323', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(222, 'RS-80203030', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(223, 'RS-23233362', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/12/22'),
(224, 'RS-3529226', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(225, 'RS-9932222', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(226, 'RS-220300', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(227, 'RS-220300', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/12/22'),
(228, 'RS-220300', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/12/22'),
(229, 'RS-3700024', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/12/22'),
(230, 'RS-3700024', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/12/22'),
(231, 'RS-3700024', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/12/22'),
(232, 'RS-023922', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/12/22'),
(233, 'RS-023922', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/12/22'),
(234, 'RS-023922', '7', '1', '400', '0', 'Arena de Medano 1/2 mts', '', '', '400', '', '01/12/22'),
(235, 'RS-2432292', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/12/22'),
(236, 'RS-3000023', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/13/22'),
(237, 'RS-253322', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/14/22'),
(238, 'RS-4222802', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/14/22'),
(239, 'RS-802033', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/16/22'),
(240, 'RS-33033202', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(241, 'RS-23228', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/17/22'),
(242, 'RS-23228', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/17/22'),
(243, 'RS-3333236', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(244, 'RS-3333236', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/17/22'),
(245, 'RS-3333236', '7', '1', '400', '0', 'Arena de Medano 1/2 mts', '', '', '400', '', '01/17/22'),
(246, 'RS-2200325', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/17/22'),
(247, 'RS-2200325', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/17/22'),
(248, 'RS-2200325', '7', '1', '400', '0', 'Arena de Medano 1/2 mts', '', '', '400', '', '01/17/22'),
(249, 'RS-2200325', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '01/17/22'),
(250, 'RS-2200325', '8', '1', '300', '0', 'Alambre de Fardo 10kg', '', '', '300', '', '01/17/22'),
(251, 'RS-2200325', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(252, 'RS-2200325', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '01/17/22'),
(253, 'RS-2200325', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/17/22'),
(254, 'RS-063752', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(255, 'RS-23058', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/17/22'),
(256, 'RS-9000020', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/17/22'),
(257, 'RS-4303686', '7', '1', '400', '0', 'Arena de Medano 1/2 mts', '', '', '400', '', '01/17/22'),
(258, 'RS-299723', '7', '1', '400', '0', 'Arena de Medano 1/2 mts', '', '', '400', '', '01/17/22'),
(259, 'RS-233223', '2', '1', '0', '0', 'Cal Cacique 30kig', '', '', '0', '', '01/17/22'),
(260, 'RS-233223', '8', '1', '100', '0', 'Alambre de Fardo 10kg', '', '', '300', '', '01/17/22'),
(261, 'RS-233223', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/17/22'),
(262, 'RS-8003232', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(263, 'RS-8003232', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/17/22'),
(264, 'RS-33332220', '1', '1', '1200', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(265, 'RS-20832', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/17/22'),
(266, 'RS-000339', '1', '30', '36000', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(267, 'RS-000339', '3', '2', '800', '0', 'Ceresita 5k', '', '', '800', '', '01/17/22'),
(268, 'RS-000339', '6', '2', '1400', '0', 'Arena de Medano1mts', '', '', '700', '', '01/17/22'),
(270, 'RS-000339', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/17/22'),
(271, 'RS-30033000', '1', '2', '2400', '0', 'Cemento Loma Negra 50Kg', '', '', '1200', '', '01/17/22'),
(272, 'RS-430277', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '01/17/22'),
(273, 'RS-802373', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/17/22'),
(274, 'RS-226222', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/17/22'),
(275, 'RS-322302', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '01/17/22'),
(276, 'RS-8093333', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '01/17/22'),
(277, 'RS-303602', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '01/24/22'),
(278, 'RS-303602', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '01/24/22'),
(279, 'RS-303602', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '01/24/22'),
(280, 'RS-62837040', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '01/24/22'),
(281, 'RS-33333465', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '02/22/22'),
(282, 'RS-07238', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '04/08/22'),
(283, 'RS-07238', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '04/08/22'),
(284, 'RS-3236000', '1', '2', '4000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '09/26/22'),
(288, 'RS-27740380', '9', '1', '500', '0', 'Flete Javier', '', '', '500', '', '05/03/23'),
(289, 'RS-27740380', '4', '5', '6500', '0', 'Arena de Rio 1mts', '', '', '1300', '', '05/03/23'),
(290, 'RS-0632024', '8', '1', '200', '0', 'Alambre de Fardo 10kg', '', '', '200', '', '05/03/23'),
(291, 'RS-0632024', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(292, 'RS-324388', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(293, 'RS-3292230', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(294, 'RS-32330207', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(295, 'RS-3633422', '9', '3', '1500', '0', 'Flete Javier', '', '', '500', '', '05/03/23'),
(296, 'RS-32302332', '9', '5', '2500', '0', 'Flete Javier', '', '', '500', '', '05/03/23'),
(297, 'RS-2320622', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(298, 'RS-4330233', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(299, 'RS-852872', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '05/03/23'),
(300, 'RS-80335222', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(301, 'RS-33623202', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(302, 'RS-3630300', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(303, 'RS-3630300', '9', '2', '1000', '0', 'Flete Javier', '', '', '500', '', '05/03/23'),
(304, 'RS-2203237', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(305, 'RS-532003', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(306, 'RS-532003', '3', '2', '1000', '0', 'Ceresita 5k', '', '', '500', '', '05/03/23'),
(307, 'RS-03260327', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(308, 'RS-03260327', '8', '10', '2000', '0', 'Alambre de Fardo 10kg', '', '', '200', '', '05/03/23'),
(309, 'RS-332223', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(310, 'RS-333303', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(311, 'RS-333303', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '05/03/23'),
(312, 'RS-02223', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(313, 'RS-7297322', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(314, 'RS-32838300', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(315, 'RS-32838300', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(316, 'RS-32200', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(317, 'RS-32200', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '05/03/23'),
(318, 'RS-0244833', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(319, 'RS-0244833', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(320, 'RS-3093433', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(321, 'RS-3093433', '9', '4', '2000', '0', 'Flete Javier', '', '', '500', '', '05/03/23'),
(322, 'RS-3322332', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(323, 'RS-3322332', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '05/03/23'),
(324, 'RS-3322332', '5', '1', '400', '0', 'Arena de Rio 0.5 Mts', '', '', '400', '', '05/03/23'),
(325, 'RS-660288', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(326, 'RS-660288', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(327, 'RS-660288', '4', '1', '1300', '0', 'Arena de Rio 1mts', '', '', '1300', '', '05/03/23'),
(328, 'RS-39223627', '3', '1', '500', '0', 'Ceresita 5k', '', '', '500', '', '05/03/23'),
(329, 'RS-3000003', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(330, 'RS-020233', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(331, 'RS-23900824', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(332, 'RS-233090', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(333, 'RS-033523', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(334, 'RS-050032', '2', '1', '1100', '0', 'Cal Cacique 30kig', '', '', '1100', '', '05/03/23'),
(335, 'RS-0032220', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(336, 'RS-5322333', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/03/23'),
(337, 'RS-2233532', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/10/23'),
(338, 'RS-605232', '1', '1', '2000', '0', 'Cemento Loma Negra 50Kg', '', '', '2000', '', '05/10/23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(1, 'Nicolas Baudis Tecnico y Desarrollador', 'Silva 890', '2954-401296', 'nose', 'Se encarga de programar y hacer mantenimientos a las maquinas '),
(2, 'Carlos Martinez ', 'Pasaje Mitre', 'nada', '2954-321234', 'Nos trae los tornillos y barras de hierro '),
(3, 'Facundo Ponce', 'Cachito sur 188', 'Credicop', '2954-403213', 'Pegamentos \r\n'),
(4, 'Facundo Menendez ', 'Toscano Sur ', '2983-432132', '', 'Nose nose nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'cashier', 'cashier', 'Cashier Pharmacy', 'Cashier'),
(3, 'admin', 'admin123', 'Administrator', 'admin'),
(4, 'baudis', 'marioandrea', 'Admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT de la tabla `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de la tabla `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
