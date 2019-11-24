-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Nov 2019 um 11:06
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_abdullah_kaitoua_travelmatic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `concert`
--

CREATE TABLE `concert` (
  `con_id` int(10) NOT NULL,
  `con_name` varchar(35) DEFAULT NULL,
  `con_date` date DEFAULT NULL,
  `con_time` varchar(20) DEFAULT NULL,
  `con_price` double(10,2) DEFAULT NULL,
  `con_pic` varchar(35) DEFAULT NULL,
  `FK_con_location` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `concert`
--

INSERT INTO `concert` (`con_id`, `con_name`, `con_date`, `con_time`, `con_price`, `con_pic`, `FK_con_location`) VALUES
(1, 'Swan Lake', '2018-06-05', '20:30', 23.00, 'img/ev1.JPG', 2),
(2, 'Life Ball', '2019-12-20', '20:30', 23.00, 'img/ev5.JPG', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `location_id` int(10) NOT NULL,
  `city` varchar(35) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`location_id`, `city`, `zip`, `address`) VALUES
(1, 'Vienna', 1010, 'Wallnerstraße 4'),
(2, 'Vienna', 1030, 'Stephansplatz 1'),
(3, 'Vienna', 1010, 'Karlsplatz 1'),
(4, 'Wien', 1030, 'Arsenal 1'),
(5, 'Wien', 1040, 'kettenbrückengasse 6');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurants`
--

CREATE TABLE `restaurants` (
  `rest_id` int(10) NOT NULL,
  `rest_name` varchar(35) DEFAULT NULL,
  `rest_phone` varchar(35) DEFAULT NULL,
  `rest_type` varchar(30) DEFAULT NULL,
  `rest_desc` varchar(500) DEFAULT NULL,
  `rest_web` varchar(30) DEFAULT NULL,
  `FK_location` int(10) DEFAULT NULL,
  `rest_pic` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `restaurants`
--

INSERT INTO `restaurants` (`rest_id`, `rest_name`, `rest_phone`, `rest_type`, `rest_desc`, `rest_web`, `FK_location`, `rest_pic`) VALUES
(1, 'Regina Margherita', '0965754545645', 'Italian', 'Her companions instrument set estimating sex remarkably solicitude motionless. Property men the why smallest graceful day insisted required. Inquiry justice country old placing sitting any ten age. Looking', 'https://www.barbaro.at/reginam', 1, 'img/res1.jpg'),
(4, 'Klein Steiermark', '0965754545645', 'Austrian', 'Her companions instrument set estimating sex remarkably solicitude motionless. Property men the why smallest graceful day insisted required. Inquiry justice country old placing sitting any ten age. Looking', 'htps://www.kleinsteiermark.wie', 4, 'img/res4.JPG');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `things_todo`
--

CREATE TABLE `things_todo` (
  `todo_id` int(10) NOT NULL,
  `todo_name` varchar(35) DEFAULT NULL,
  `todo_type` varchar(30) DEFAULT NULL,
  `todo_desc` varchar(500) DEFAULT NULL,
  `todo_web` varchar(30) DEFAULT NULL,
  `todo_pic` varchar(30) DEFAULT NULL,
  `FK_todo_location` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `things_todo`
--

INSERT INTO `things_todo` (`todo_id`, `todo_name`, `todo_type`, `todo_desc`, `todo_web`, `todo_pic`, `FK_todo_location`) VALUES
(1, 'St. Charles Church', 'must see', 'Her companions instrument set estimating sex remarkably solicitude motionless. Property men the why smallest graceful day insisted required. Inquiry justice country old placing sitting any ten age. Looking', 'www.santcharles.at', 'img/img5.jpg', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `role`) VALUES
(1, 'abd', 'abd@gmx.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user'),
(2, 'Abdullah', 'abdullah@gmx.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `FK_con_location` (`FK_con_location`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indizes für die Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rest_id`),
  ADD KEY `FK_location` (`FK_location`);

--
-- Indizes für die Tabelle `things_todo`
--
ALTER TABLE `things_todo`
  ADD PRIMARY KEY (`todo_id`),
  ADD KEY `FK_todo_location` (`FK_todo_location`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `concert`
--
ALTER TABLE `concert`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rest_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `things_todo`
--
ALTER TABLE `things_todo`
  MODIFY `todo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`FK_con_location`) REFERENCES `location` (`location_id`);

--
-- Constraints der Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`FK_location`) REFERENCES `location` (`location_id`);

--
-- Constraints der Tabelle `things_todo`
--
ALTER TABLE `things_todo`
  ADD CONSTRAINT `things_todo_ibfk_1` FOREIGN KEY (`FK_todo_location`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
