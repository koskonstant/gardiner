-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 22 Απρ 2017 στις 19:32:47
-- Έκδοση διακομιστή: 5.6.11
-- Έκδοση PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `game`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `USR-Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`USR-Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `members`
--

INSERT INTO `members` (`USR-Id`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'kostas', '$2y$10$Cii.c8Vjmr.Lh5mL3qZW8Oz5yS8RvoqaKIWmk5jClfsLlGDxL.OTi', 'koskonstant@gmail.com', 'Yes', NULL, 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
