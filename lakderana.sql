-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 04:05 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lakderana`
--

-- --------------------------------------------------------

--
-- Table structure for table `bar_orders`
--

CREATE TABLE `bar_orders` (
  `order_id` varchar(255) NOT NULL,
  `cutomer_id` int(11) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `order_quantity` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `discounts` varchar(255) NOT NULL,
  `net_price` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_orders`
--

INSERT INTO `bar_orders` (`order_id`, `cutomer_id`, `item_id`, `order_quantity`, `total_price`, `discounts`, `net_price`, `date`) VALUES
('', 2, '', '2', '2000', '100', '1900', '0000-00-00'),
('61d772a72f02f', 2, '', '2', '2000', '100', '1900', '2022-01-06'),
('61d772bb72d97', 1, '', '6', '6000', '1', '5400', '2022-01-06'),
('61d7730343cf6', 2, '61', '2', '2', '2', '2', '2022-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `bar_stocks`
--

CREATE TABLE `bar_stocks` (
  `stock_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_quntity` varchar(255) NOT NULL,
  `buying_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_stocks`
--

INSERT INTO `bar_stocks` (`stock_id`, `item_name`, `item_description`, `item_quntity`, `buying_price`, `selling_price`, `date`) VALUES
(61, 'Testitem', 'zddddddddddddd', '10', '1000', '1100', '2022-01-06'),
(23, 'testt', 'sZxc', '10', '1000', '1100', '2022-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cuss_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `nic`, `phone`, `email`, `address`, `cuss_id`) VALUES
(1, 'banura jayawardhane', '200122600054', '0771161599', 'banura@gmail.comj', '23', '2234'),
(2, 'Anushka Diwolka', '000000000v', '0711971313', 'anushkaduwolka123@gmail.com', '1st Lane', '2');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `cuss_id` varchar(255) NOT NULL,
  `child` int(255) NOT NULL,
  `adult` int(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `total` varchar(100) NOT NULL,
  `payed` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `cuss_id`, `child`, `adult`, `check_in`, `check_out`, `rooms`, `total`, `payed`, `due`, `status`) VALUES
(6, '2234', 9, 7, '2021-12-30', '2021-12-31', 'test_rooms', '1000', 'payed', '0', 'checked out'),
(7, '2234', 2, 2, '2022-01-10', '2022-01-11', 'test_rooms', '12500', 'payed', '0', 'checked in');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `name` varchar(255) NOT NULL,
  `room_number` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `max` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`name`, `room_number`, `status`, `max`) VALUES
('Dulux double', '1001', 'Available', 2),
('dulux double', '1002', 'Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `pass`, `email`, `rfid`, `post`, `user_id`) VALUES
('banura', 'FO01', '1', '1', '1', 'FO', 1),
('nepu', 'RM01', '1', '1', '1', 'RM', 2),
('bharana', 'ACC01', '1', '1', '1', 'ACC', 3),
('radhini', 'RS01', '1', '1', '1', 'RS', 4),
('barAdmin', 'BM001', '1', '1', '1', 'BM', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
