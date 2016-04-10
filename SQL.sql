CREATE DATABASE 15094637_ddp;

USE 15094637_ddp;
-- phpMyAdmin SQL Dump
-- version home.pl
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 10 Kwi 2016, 11:27
-- Wersja serwera: 5.5.44-37.3-log
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `15094637_ddp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `title`, `description`) VALUES
  (3, 'hello', 'sdasdasda asdasd 123'),
  (5, 'asdasdasdas', 'sadasdasdasdas'),
  (6, 'aasdasdas', 'asdasdas'),
  (7, 'now', 'sadasdasd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subsites`
--
 DROP TABLE subsites;
CREATE TABLE IF NOT EXISTS `subsites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `subsites`
--

INSERT INTO `subsites` (`id`, `title`, `description`,`url`) VALUES
  (4, 'O jednostce', '<p><strong>Dzienny Dom Pomocy</strong> jest jednostkÄ budĹźetowÄ i dziaĹa jako jednostka organizacyjna miasta<br /><br />MikoĹ&oacute;w. Prowadzi gospodarkÄ finansowÄ i rozlicza siÄ z budĹźetem miasta na zasadach<br /><br />ustalonych dla jednostek budĹźetowych, a Ĺrodki finansowe uzyskuje z dotacji z budĹźetu<br /><br />miasta oraz innych dochod&oacute;w przewidzianych prawem. Mienie Dziennego Domu Pomocy<br /><br />stanowiÄ Ĺrodki trwaĹe, Ĺrodki obrotowe oraz wartoĹci niematerialne niezbÄdne do<br /><br />prowadzenia dziaĹalnoĹci statutowej.</p><p><br /><br />PracÄ oĹrodka kieruje kierownik, kt&oacute;ry nim zarzÄdza oraz ustala organizacjÄ wewnÄtrznÄ i<br /><br />reprezentuje jednostkÄ na zewnÄtrz, sprawuje nadz&oacute;r nad powierzonym majÄtkiem oraz<br /><br />tworzy warunki do realizacji zadaĹ statutowych poprzez wĹaĹciwe gospodarowanie Ĺrodkami<br /><br />okreĹlonymi w planie finansowym. Szczeg&oacute;Ĺowe zasady i tryb dziaĹania Dziennego Domu<br /><br />Pomocy okreĹla regulamin organizacyjny.</p>','o-jednostce'),
  (5, 'Przetargi', NULL,'przetargi'),
  (6, 'Jak pomagamy', '<p>OĹrodek realizuje zadania pomocy spoĹecznej jako zadania wĹasne gminy.</p><p>W szczeg&oacute;lnoĹci do zadaĹ tych naleĹźy:</p><p>&nbsp;</p><ul style="list-style-type: circle;"><li>zapewnienie pensjonariuszom dziennego pobytu bez nocleg&oacute;w wraz z wyĹźywieniem (Ĺniadanie, obiad),</li></ul><p>&nbsp;</p><ul style="list-style-type: circle;"><li>zapewnienie jednego gorÄcego posiĹku osobom, kt&oacute;re nie korzystajÄ z dziennego pobytu,</li></ul><p>&nbsp;</p><ul style="list-style-type: circle;"><li>zapewnienie dostÄpu do kultury i rekreacji,</li></ul><p>&nbsp;</p><ul style="list-style-type: circle;"><li>zapewnienie podstawowych ĹwiadczeĹ opiekuĹczych oraz w zakresie higieny osobistej,</li></ul><p>&nbsp;</p><ul style="list-style-type: circle;"><li>organizowanie zajÄÄ w ramach terapii sĹuĹźÄcej do utrzymania sprawnoĹci psychofizycznej zgodnie z wiekiem i moĹźliwoĹciami plac&oacute;wki,</li></ul><p>&nbsp;</p><ul style="list-style-type: circle;"><li>pomoc w rozwiÄzywaniu indywidualnych problem&oacute;w</li></ul><p>&nbsp;</p><ul style="list-style-type: circle;"><li>zapewnienie opieki medycznej.</li></ul>','jak-pomagamy'),
  (7, 'Kontakt', '<p>ul. Konstytucji 3 Maja 12, 43-190 MikoĹ&oacute;w tel.: (32) 226 00 90<br /> kierownik: GraĹźyna Polcar</p><p>e-mail: <a href="mailto:dompomocy@op.pl">dompomocy@op.pl</a><br /> <br /> czynny: <br /> od poniedziaĹku do piÄtku od 7<sup>30</sup> do 15<sup>30</sup></p>','kontakt');

-- --------------------------------------------------------
--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `twitter` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_twitter` (`twitter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `twitter`) VALUES
  (1, 'administrator', '10f5425887f555a329a9071d88c535f6', 'dollyaswin');
