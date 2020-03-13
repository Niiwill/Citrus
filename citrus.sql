-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2020 at 02:39 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `text`, `published`) VALUES
(1, 'Marko', 'marko@hotmail.com', 'The best company!', 1),
(2, 'Jovana', 'jovana@hotmail.com', 'Best place to buy fruits.', 1),
(3, 'Marija', 'marija@gmail.com', 'I have the best experience with this company! I recommend them to everyone!', 0),
(12, 'John', 'john@gmail.com', 'Recommended!\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`) VALUES
(1, 'Oranges', 'The orange is the fruit of the citrus species Citrus sinensis in the family Rutaceae, native to China. It is also called sweet orange, to distinguish it from the ...', 'orange.jpeg'),
(2, 'Lemons', 'The lemon, Citrus limon (L.) Osbeck, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily North eastern ...', 'lemons.jpg'),
(3, 'Grapefruit', 'Grapefruit is a citrus fruit with a flavor that can range from bittersweet to sour. It contains a range of essential vitamins and minerals. People can consume the fruit ...', 'grapefruit.jpg'),
(4, 'Lime', 'Eating lime fruit or drinking lime juice provides a variety of health benefits. ... Citrus fruits like limes are high in citric acid, which may prevent ...', 'lime.jpg'),
(5, 'Blood orange', 'The blood orange is a variety of orange (Citrus - sinensis) with crimson, almost blood-colored flesh. The distinctive dark flesh color is due to the presence of ...', 'blood-orange.jpg'),
(6, 'Citron', 'The citron (Citrus medica) is a large fragrant citrus fruit with a thick rind. It is one of the original citrus fruits from which all other citrus ...', 'citron.jpg'),
(7, 'Mandarin orange', 'The mandarin orange (Citrus reticulata), also known as the mandarin or mandarine, is a small citrus tree with fruit resembling other oranges, usually eaten plain ...', 'mandarin.jpg'),
(8, 'Papeda', 'Papeda or papaeda is the common name for a group of citrus native to tropical Asia that are hardy and slow growing, and produce unpalatable fruit.', 'popeda.jpg'),
(9, 'Pomelo', 'The pomelo, pummelo, or in scientific terms Citrus maxima or Citrus grandis, is the largest citrus fruit from the family Rutaceae and the principal ...', 'pomelo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
