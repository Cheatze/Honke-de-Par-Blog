-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 nov 2022 om 13:12
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honkedepar`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `day` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `blogposts`
--

INSERT INTO `blogposts` (`id`, `title`, `content`, `day`, `year`, `month`) VALUES
(9, 'Wat leuk zeg', '<p>Waarom leeg?</p>', '01', 2022, 'Februari'),
(10, 'Opgemaakte text', '<p><strong>Blabla bla</strong></p><p>&nbsp;</p><ul><li><strong>Eeen</strong></li><li><strong>Twee&nbsp;</strong></li><li><strong>drie</strong></li></ul><p><em><strong>​​​​​​​Raare text</strong></em></p>', '02', 2022, 'Februari'),
(11, 'De nieuwste', '<p>De nieuwste post</p>', '02', 2022, 'Februari'),
(12, 'Wat leuk zeg', '<p>Lukt dit hier ook niet?</p><p>Blablbla</p><p><a href=\"http://google.com\">Een link</a></p>', '02', 2022, 'Februari'),
(13, 'Nieuwe blogpost', '<p><strong>Bold</strong></p><p><em>Italics</em></p><ul><li><em>een lijst</em></li><li>&nbsp;</li></ul>', '11', 2022, 'Februari');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'Honke', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wenken`
--

CREATE TABLE `wenken` (
  `id` int(255) NOT NULL,
  `wenk` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `wenken`
--

INSERT INTO `wenken` (`id`, `wenk`, `date`) VALUES
(7, 'Waar je niet aan begint hoef je ook niet af te maken', '0000-00-00'),
(9, 'Wie het kleine niet eert die eert het groote mischien wel', '0000-00-00'),
(14, 'Niet gecompiled is altijd error.', '0000-00-00'),
(15, 'Debuggen is soms muggenziften', '0000-00-00'),
(17, 'De vraag is niet wie het toelaat maar wie mij zou tegenhouden', '0000-00-00'),
(19, 'Blablabla', '0000-00-00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `wenken`
--
ALTER TABLE `wenken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `wenken`
--
ALTER TABLE `wenken`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
