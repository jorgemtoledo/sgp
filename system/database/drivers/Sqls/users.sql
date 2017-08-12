-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2016 at 12:08 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_sgp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_employees1_idx` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `password`, `level`, `active`, `created`, `modified`) VALUES
(5, NULL, 'Jorge Toledo', 'jorge.toledo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2016-02-04 18:00:10', '2016-02-04 18:00:10'),
(6, NULL, 'Maria', 'maria@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 1, '2016-02-18 22:28:52', '2016-10-28 12:35:50'),
(7, NULL, 'Nicollas', 'nicollas@contatogestao.com', 'e10adc3949ba59abbe56e057f20f883e', '2', 1, '2016-08-23 20:42:11', '2016-09-06 02:00:17'),
(8, NULL, 'Juciley', 'ju@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '4', 1, '2016-08-23 21:48:08', '2016-08-23 21:48:08'),
(9, NULL, 'Danielle de Souza Cruz', 'd.cruz@contatogestao.com', '97fff50bc050b7ec608ade74b04623e1', '1', 1, '2016-09-02 16:43:47', '2016-09-02 16:43:47'),
(10, NULL, 'Kelson', 'kelson@contatogestao.com', '98d08ca1002cf0ef10f97b9a418f8be0', '3', 1, '2016-09-06 15:07:22', '2016-10-02 11:02:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_employees1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
