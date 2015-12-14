-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Gru 2015, 10:10
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `dblogin`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `albumy`
--

CREATE TABLE IF NOT EXISTS `albumy` (
`id` int(10) unsigned NOT NULL,
  `nazwa` varchar(20) NOT NULL,
  `id_usera` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `albumy`
--

INSERT INTO `albumy` (`id`, `nazwa`, `id_usera`) VALUES
(12, 'nowy1', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'm', 'm@m.pl', '$2y$10$O7obwb8DITqlZNz0B05rhOAqbtz4ZgA56Zbbif9qT5uWjenxKuE3q'),
(5, 'user2', 'user2@user2.pl', '$2y$10$IT9VaQiYVRoWQHsVp6axWujkk3j1vdsRIxu/W2fNJYuJUNsK6aV8m'),
(6, 'WIKARD', 'wikard@op.pl', '$2y$10$Qn/yBC0WFUyQIyoM1DPzTe8CszbhCJzyqof1R/Fu5RVIoFW1m7zda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE IF NOT EXISTS `zdjecia` (
`id` int(11) NOT NULL,
  `id_albumu` int(10) unsigned NOT NULL,
  `id_usera` int(10) unsigned NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`id`, `id_albumu`, `id_usera`, `nazwa`) VALUES
(16, 12, 1, 'test'),
(17, 12, 1, 'wiÅ›nie'),
(18, 12, 1, 'Lena'),
(19, 12, 1, NULL),
(20, 12, 1, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `albumy`
--
ALTER TABLE `albumy`
 ADD PRIMARY KEY (`id`,`id_usera`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `zdjecia`
--
ALTER TABLE `zdjecia`
 ADD PRIMARY KEY (`id`,`id_albumu`,`id_usera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `albumy`
--
ALTER TABLE `albumy`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
