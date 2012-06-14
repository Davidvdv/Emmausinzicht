-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 24 Apr 2012 om 09:23
-- Serverversie: 5.1.44
-- PHP-Versie: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emedia`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `elders`
--

CREATE TABLE `elders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `elders`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `elders_kids`
--

CREATE TABLE `elders_kids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elder_id` int(11) NOT NULL,
  `kid_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `elders_kids`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `groups`
--


-- --------------------------------------------------------

--
-- Gegevens worden uitgevoerd voor tabel `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(2, 'Groep 1a'),
(3, 'Groep 2a'),
(4, 'Groep 3a'),
(5, 'Groep 4b'),
(6, 'Groep 5b'),
(7, 'Groep 6b'),
(8, 'Groep 7b'),
(9, 'Groep 8b'),
(10, 'Groep 1b'),
(11, 'Groep 2b'),
(12, 'Groep 3b'),
(13, 'Groep 4a'),
(14, 'Groep 5a'),
(15, 'Groep 6a'),
(16, 'Groep 7a'),
(17, 'Groep 8a');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Gegevens worden uitgevoerd voor tabel `icons`
--

INSERT INTO `icons` (`id`, `name`, `url`) VALUES
(1, 'Cultuur', 'Cultuur.png'),
(2, 'EmailAdres', 'EmailAdres.png'),
(3, 'FormulierInvullen', 'FormulierInvullen.png'),
(4, 'Gym', 'Gym.png'),
(5, 'Handenarbeid', 'Handenarbeid.png'),
(6, 'Kamp', 'Kamp.png'),
(7, 'Muziek', 'Muziek.png'),
(8, 'Ouderavond', 'Ouderavond.png'),
(9, 'Overig-Camera', 'Overig-Camera.png'),
(10, 'Overig-Feest', 'Overig-Feest.png'),
(11, 'Overig-Huisje', 'Overig-Huisje.png'),
(12, 'Overig-Koffie', 'Overig-Koffie.png'),
(13, 'Overig-Ster', 'Overig-Ster.png'),
(14, 'Schoolreis', 'Schoolreis.png'),
(15, 'Softbal', 'Softbal.png'),
(16, 'Sport', 'Sport.png'),
(17, 'Theater', 'Theater.png'),
(18, 'Toernooi', 'Toernooi.png'),
(19, 'Voetbal', 'Voetbal.png'),
(20, 'Zwemmen', 'Zwemmen.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events_icons`
--

CREATE TABLE IF NOT EXISTS `events_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `kids`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` VALUES(2, 'David', 'e2e7abb0f919767845883aa9666560534294432c', 'David', 'van de Vondervoort', '0841292@hr.nl');
INSERT INTO `users` VALUES(3, 'Michel', 'f209c6dc00a24fc3f84eaa1c886f465ae3315a43', 'Michel', 'van der Linden', 'mvanderlinden@emmaus.nl');

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `publish_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Tabelstructuur voor tabel `events_groups`
--

CREATE TABLE `events_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;