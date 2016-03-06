-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2016 at 06:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whatsup`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `id_user`, `contenu`, `date`, `title`) VALUES
(68, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci deserunt error odio officia quasi sit. Assumenda at corporis doloribus eum, fugit id laudantium magni maiores nostrum tempora voluptate voluptates.', '2016-03-04', 'Article essai'),
(69, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci deserunt error odio officia quasi sit. Assumenda at corporis doloribus eum, fugit id laudantium magni maiores nostrum tempora voluptate voluptates.', '2016-03-04', 'Article essai2'),
(70, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci deserunt error odio officia quasi sit. Assumenda at corporis doloribus eum, fugit id laudantium magni maiores nostrum tempora voluptate voluptates.', '2016-03-04', 'Article essai3'),
(71, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci deserunt error odio officia quasi sit. Assumenda at corporis doloribus eum, fugit id laudantium magni maiores nostrum tempora voluptate voluptates.', '2016-03-04', 'Article essai3');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date` date NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `droits` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nickname`, `firstname`, `lastname`, `password`, `date_creation`, `droits`) VALUES
(1, 'tritonjoyeux', 'paul', 'jeandaux', '81805a4a93d7bea5b5c59c24d83c909efd563da1', '2016-03-02', 'user'),
(3, 'choukaythe', 'joanne', 'huot', 'e54ca0f451fa67adfdc259e3a21a86b1a9f5dc67', '2016-02-08', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
