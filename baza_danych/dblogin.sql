-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Paź 2015, 15:41
-- Wersja serwera: 10.0.17-MariaDB
-- Wersja PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dblogin`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `albumy`
--

CREATE TABLE IF NOT EXISTS `albumy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(20) NOT NULL,
  `id_usera` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`id_usera`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `albumy`
--

INSERT INTO `albumy` (`id`, `nazwa`, `id_usera`) VALUES
(8, 'test1', 4),
(9, 'test2', 4),
(10, 'Nowy_albumer_user2', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(4, 'm', 'm@m.pl', '$2y$10$O7obwb8DITqlZNz0B05rhOAqbtz4ZgA56Zbbif9qT5uWjenxKuE3q'),
(5, 'user2', 'user2@user2.pl', '$2y$10$IT9VaQiYVRoWQHsVp6axWujkk3j1vdsRIxu/W2fNJYuJUNsK6aV8m'),
(6, 'WIKARD', 'wikard@op.pl', '$2y$10$Qn/yBC0WFUyQIyoM1DPzTe8CszbhCJzyqof1R/Fu5RVIoFW1m7zda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE IF NOT EXISTS `zdjecia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_albumu` int(10) unsigned NOT NULL,
  `id_usera` int(10) unsigned NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_albumu`,`id_usera`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`id`, `id_albumu`, `id_usera`, `nazwa`) VALUES
(11, 8, 4, 'mmm'),
(12, 8, 4, 'kwiatek'),
(13, 9, 4, 'Pustynia'),
(14, 10, 5, 'pingwiny');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;