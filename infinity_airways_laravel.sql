-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 12, 2021 alle 10:55
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinity_airways_laravel`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `abbonamentoclub`
--

CREATE TABLE `abbonamentoclub` (
  `cardID` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `tipoAbbonamento` varchar(7) NOT NULL,
  `dataAbbonamento` varchar(10) NOT NULL,
  `scadenzaAbbonamento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `abbonamentoclub`
--

INSERT INTO `abbonamentoclub` (`cardID`, `username`, `tipoAbbonamento`, `dataAbbonamento`, `scadenzaAbbonamento`) VALUES
(1, 'gabrielevitali', 'Oro', '09-05-2021', '09-05-2022'),
(2, 'alice', 'Platino', '10-07-2021', '10-07-2022'),
(3, 'valentino', 'Oro', '10-07-2021', '10-07-2022');

-- --------------------------------------------------------

--
-- Struttura della tabella `acquistovolo`
--

CREATE TABLE `acquistovolo` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `flightID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `acquistovolo`
--

INSERT INTO `acquistovolo` (`id`, `username`, `flightID`) VALUES
(2, 'alice', 2000),
(3, 'alice', 3004),
(4, 'alice', 3005),
(5, 'alice', 8001),
(6, 'gabrielevitali', 2002),
(1, 'gabrielevitali', 3004),
(7, 'gabrielevitali', 5000);

-- --------------------------------------------------------

--
-- Struttura della tabella `aeroporto`
--

CREATE TABLE `aeroporto` (
  `airportID` varchar(3) NOT NULL,
  `denominazione` varchar(20) NOT NULL,
  `nazione` varchar(15) NOT NULL,
  `città` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `aeroporto`
--

INSERT INTO `aeroporto` (`airportID`, `denominazione`, `nazione`, `città`) VALUES
('CDG', 'Charles de Gaulle', 'Francia', 'Parigi'),
('CPH', 'Kastrup', 'Danimarca', 'Copenaghen'),
('LHR', 'Heathrow', 'Regno Unito', 'Londra'),
('MAD', 'Barajas', 'Spagna', 'Madrid'),
('MXP', 'Malpensa', 'Italia', 'Milano');

-- --------------------------------------------------------

--
-- Struttura della tabella `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `ticketID` varchar(8) DEFAULT NULL,
  `codiceFiscale` varchar(16) NOT NULL,
  `flightID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `checkin`
--

INSERT INTO `checkin` (`id`, `ticketID`, `codiceFiscale`, `flightID`) VALUES
(1, '87698823', 'VTLGRL97P12C351F', 3004),
(2, '44580289', 'VTLGRL97P12C351F', 4015),
(3, '19516685', 'VTLGRL97P12C351F', 3005),
(5, '70818649', 'CHRGLG03A26D612E', 3004),
(6, NULL, 'CHRGLG03A26D612E', 2000),
(7, '42736460', 'CHRGLG03A26D612E', 5000),
(8, NULL, 'VTLGRL97P12C351F', 2000),
(9, NULL, 'ALIFRT21L22M200T', 8001);

-- --------------------------------------------------------

--
-- Struttura della tabella `passeggero`
--

CREATE TABLE `passeggero` (
  `codiceFiscale` varchar(16) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `nazione` varchar(20) NOT NULL,
  `dataNascita` char(10) NOT NULL,
  `via` varchar(20) NOT NULL,
  `numero` char(3) NOT NULL,
  `cap` char(5) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `numeroTelefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `passeggero`
--

INSERT INTO `passeggero` (`codiceFiscale`, `nome`, `cognome`, `nazione`, `dataNascita`, `via`, `numero`, `cap`, `documento`, `numeroTelefono`) VALUES
('ALIFRT21L22M200T', 'Alice', 'Fiorito', 'Italia', '1989-05-04', 'Via Roma', '100', '10143', 'WU60973929', '0123456789'),
('VTLGRL97P12C351F', 'Gabriele', 'Vitali', 'Italia', '1997-09-12', 'via Roma', '100', '95100', '', '3425702003');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(15) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `pwd`, `email`) VALUES
('alice', '$2y$10$H2htzrdozmlf3o/FrYIey.W2oBAHC4aJPZKi1s2I6xInThYhZjsk6', 'alice21@gmail.com'),
('diego', '$2y$10$BlTEJ6IYfEms9zar0ixCau8N/2dJVUH7KrLPXGWEKkZuXTWi8Mlym', 'diego@gmail.com'),
('gabrielevitali', '$2y$10$/eqe3ebDyIODR.UgxNF.1OHmGOOssPqJTXjOTUFdRpcaJdNbDtAbG', 'gabriele_vitali@hotmail.com'),
('mario', '$2y$10$HxsbLyhddQBOiStnkFppFuVZAucZ6F8J0/Vqjm.a7YD0kX3XP6tby', 'mario@gmail.com'),
('mariorossi', '$2y$10$jP0V3VnjH1b6G5SbCBd0feTGnbRYFb/14oUhor5qEP84yP6zpUCUa', 'mario_rossi@hotmail.com'),
('munoz', '$2y$10$n4aVIqovZS3lkQMm3/NlxO64wwGTzJVcTAIzfigjm1Mou.T7/tm.S', 'munoz@gmail.com'),
('valentino', '$2y$10$5aGWeliTs6tTZ7SZqg9R..gw9DC0Ypaa37OUL4ZxXA6c9/GzUMCOm', 'valentino@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `voli`
--

CREATE TABLE `voli` (
  `flightID` int(4) NOT NULL,
  `aeroportoPartenza` varchar(3) NOT NULL,
  `aeroportoArrivo` varchar(3) NOT NULL,
  `dataPartenza` date NOT NULL,
  `oraPartenza` varchar(5) NOT NULL,
  `dataArrivo` date NOT NULL,
  `oraArrivo` varchar(5) NOT NULL,
  `stato` varchar(10) NOT NULL,
  `numPostiDisponibili` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `voli`
--

INSERT INTO `voli` (`flightID`, `aeroportoPartenza`, `aeroportoArrivo`, `dataPartenza`, `oraPartenza`, `dataArrivo`, `oraArrivo`, `stato`, `numPostiDisponibili`) VALUES
(1000, 'MAD', 'LHR', '2021-05-10', '09:00', '2021-05-10', '10:30', 'attivo', 20),
(1001, 'MAD', 'CDG', '2021-05-11', '13:00', '2021-05-11', '15:00', 'attivo', 20),
(1002, 'MAD', 'MXP', '2021-05-12', '09:00', '2021-05-12', '11:20', 'attivo', 20),
(1003, 'MAD', 'CPH', '2021-05-12', '15:30', '2021-05-12', '18:40', 'attivo', 20),
(1004, 'MAD', 'LHR', '2021-05-14', '09:00', '2021-05-14', '10:30', 'attivo', 20),
(1005, 'MAD', 'CDG', '2021-05-14', '13:00', '2021-05-14', '15:00', 'attivo', 20),
(1006, 'MAD', 'MXP', '2021-05-15', '09:00', '2021-05-15', '11:20', 'attivo', 20),
(1007, 'MAD', 'CPH', '2021-05-16', '13:00', '2021-05-16', '16:10', 'attivo', 20),
(1008, 'MAD', 'LHR', '2021-05-17', '09:00', '2021-05-17', '10:30', 'attivo', 20),
(1009, 'MAD', 'CDG', '2021-05-18', '13:00', '2021-05-18', '15:00', 'attivo', 20),
(1010, 'MAD', 'MXP', '2021-05-19', '09:00', '2021-05-19', '11:20', 'attivo', 20),
(1011, 'MAD', 'CPH', '2021-05-19', '15:30', '2021-05-19', '18:40', 'attivo', 20),
(1012, 'MAD', 'LHR', '2021-05-21', '09:00', '2021-05-21', '10:30', 'attivo', 20),
(1013, 'MAD', 'CDG', '2021-05-21', '13:00', '2021-05-21', '15:00', 'attivo', 20),
(1014, 'MAD', 'MXP', '2021-05-22', '09:00', '2021-05-22', '11:20', 'attivo', 20),
(1015, 'MAD', 'CPH', '2021-05-23', '13:00', '2021-05-23', '16:10', 'attivo', 20),
(1016, 'MAD', 'LHR', '2021-05-24', '09:00', '2021-05-24', '10:30', 'attivo', 20),
(1017, 'MAD', 'CDG', '2021-05-25', '13:00', '2021-05-25', '15:00', 'attivo', 20),
(1018, 'MAD', 'MXP', '2021-05-26', '09:00', '2021-05-26', '11:20', 'attivo', 20),
(1019, 'MAD', 'CPH', '2021-05-26', '15:30', '2021-05-26', '18:40', 'attivo', 20),
(1020, 'MAD', 'LHR', '2021-05-28', '09:00', '2021-05-28', '10:30', 'attivo', 20),
(1021, 'MAD', 'CDG', '2021-05-28', '13:00', '2021-05-28', '15:00', 'attivo', 20),
(1022, 'MAD', 'MXP', '2021-05-29', '09:00', '2021-05-29', '11:20', 'attivo', 20),
(1023, 'MAD', 'CPH', '2021-05-30', '13:00', '2021-05-30', '16:10', 'attivo', 20),
(1024, 'MAD', 'LHR', '2021-05-31', '09:00', '2021-05-31', '10:30', 'active', 20),
(1025, 'MAD', 'CDG', '2021-06-01', '13:00', '2021-06-01', '15:00', 'active', 20),
(1026, 'MAD', 'MXP', '2021-06-02', '09:00', '2021-06-02', '11:20', 'active', 20),
(1027, 'MAD', 'CPH', '2021-06-02', '15:30', '2021-06-02', '18:40', 'active', 20),
(1028, 'MAD', 'LHR', '2021-06-04', '09:00', '2021-06-04', '10:30', 'active', 20),
(1029, 'MAD', 'CDG', '2021-06-04', '13:00', '2021-06-04', '15:00', 'active', 20),
(1030, 'MAD', 'MXP', '2021-06-05', '09:00', '2021-06-05', '11:20', 'active', 20),
(1031, 'MAD', 'CPH', '2021-06-06', '13:00', '2021-06-06', '16:10', 'active', 20),
(1032, 'MAD', 'LHR', '2021-06-07', '09:00', '2021-06-07', '10:30', 'active', 20),
(1033, 'MAD', 'CDG', '2021-06-08', '13:00', '2021-06-08', '15:00', 'active', 20),
(1034, 'MAD', 'MXP', '2021-06-09', '09:00', '2021-06-09', '11:20', 'active', 20),
(1035, 'MAD', 'CPH', '2021-06-09', '15:30', '2021-06-09', '18:40', 'active', 20),
(1036, 'MAD', 'LHR', '2021-06-11', '09:00', '2021-06-11', '10:30', 'active', 20),
(1037, 'MAD', 'CDG', '2021-06-11', '13:00', '2021-06-11', '15:00', 'active', 20),
(1038, 'MAD', 'MXP', '2021-06-12', '09:00', '2021-06-12', '11:20', 'active', 20),
(1039, 'MAD', 'CPH', '2021-06-13', '13:00', '2021-06-13', '16:10', 'active', 20),
(1040, 'MAD', 'LHR', '2021-06-14', '09:00', '2021-06-14', '10:30', 'active', 20),
(1041, 'MAD', 'CDG', '2021-06-15', '13:00', '2021-06-15', '15:00', 'active', 20),
(1042, 'MAD', 'MXP', '2021-06-16', '09:00', '2021-06-16', '11:20', 'active', 20),
(1043, 'MAD', 'CPH', '2021-06-16', '15:30', '2021-06-16', '18:40', 'active', 20),
(1044, 'MAD', 'LHR', '2021-06-18', '09:00', '2021-06-18', '10:30', 'active', 20),
(1045, 'MAD', 'CDG', '2021-06-18', '13:00', '2021-06-18', '15:00', 'active', 20),
(1046, 'MAD', 'MXP', '2021-06-19', '09:00', '2021-06-19', '11:20', 'active', 20),
(1047, 'MAD', 'CPH', '2021-06-20', '13:00', '2021-06-20', '16:10', 'active', 20),
(1048, 'MAD', 'LHR', '2021-06-21', '09:00', '2021-06-21', '10:30', 'active', 20),
(1049, 'MAD', 'CDG', '2021-06-22', '13:00', '2021-06-22', '15:00', 'active', 20),
(1050, 'MAD', 'MXP', '2021-06-23', '09:00', '2021-06-23', '11:20', 'active', 20),
(1051, 'MAD', 'CPH', '2021-06-23', '15:30', '2021-06-23', '18:40', 'active', 20),
(1052, 'MAD', 'LHR', '2021-06-25', '09:00', '2021-06-25', '10:30', 'active', 20),
(1053, 'MAD', 'CDG', '2021-06-25', '13:00', '2021-06-25', '15:00', 'active', 20),
(1054, 'MAD', 'MXP', '2021-06-26', '09:00', '2021-06-26', '11:20', 'active', 20),
(1055, 'MAD', 'CPH', '2021-06-27', '13:00', '2021-06-27', '16:10', 'active', 20),
(1056, 'MAD', 'LHR', '2021-06-28', '09:00', '2021-06-28', '10:30', 'active', 20),
(1057, 'MAD', 'CDG', '2021-06-29', '13:00', '2021-06-29', '15:00', 'active', 20),
(1058, 'MAD', 'MXP', '2021-06-30', '09:00', '2021-06-30', '11:20', 'active', 20),
(1059, 'MAD', 'CPH', '2021-06-30', '15:30', '2021-06-30', '18:40', 'active', 20),
(1060, 'MAD', 'LHR', '2021-07-02', '09:00', '2021-07-02', '10:30', 'active', 20),
(1061, 'MAD', 'CDG', '2021-07-02', '13:00', '2021-07-02', '15:00', 'active', 20),
(1062, 'MAD', 'MXP', '2021-07-03', '09:00', '2021-07-03', '11:20', 'active', 20),
(1063, 'MAD', 'CPH', '2021-07-04', '13:00', '2021-07-04', '16:10', 'active', 20),
(2000, 'MXP', 'LHR', '2021-05-10', '13:00', '2021-05-10', '15:00', 'attivo', 20),
(2001, 'MXP', 'CPH', '2021-05-11', '20:00', '2021-05-11', '22:00', 'attivo', 20),
(2002, 'MXP', 'MAD', '2021-05-13', '09:00', '2021-05-13', '11:20', 'attivo', 20),
(2003, 'MXP', 'CDG', '2021-05-13', '20:00', '2021-05-13', '21:35', 'attivo', 20),
(2004, 'MXP', 'LHR', '2021-05-14', '11:00', '2021-05-14', '13:00', 'attivo', 20),
(2005, 'MXP', 'CDG', '2021-05-15', '13:00', '2021-05-15', '14:35', 'attivo', 20),
(2006, 'MXP', 'MAD', '2021-05-16', '09:00', '2021-05-16', '11:20', 'attivo', 20),
(2007, 'MXP', 'CPH', '2021-05-16', '15:30', '2021-05-16', '17:30', 'attivo', 20),
(2008, 'MXP', 'LHR', '2021-05-17', '13:00', '2021-05-17', '15:00', 'attivo', 20),
(2009, 'MXP', 'CPH', '2021-05-18', '20:00', '2021-05-18', '22:00', 'attivo', 20),
(2010, 'MXP', 'MAD', '2021-05-20', '09:00', '2021-05-20', '11:20', 'attivo', 20),
(2011, 'MXP', 'CDG', '2021-05-20', '20:00', '2021-05-20', '21:35', 'attivo', 20),
(2012, 'MXP', 'LHR', '2021-05-21', '11:00', '2021-05-21', '13:00', 'attivo', 20),
(2013, 'MXP', 'CDG', '2021-05-22', '13:00', '2021-05-22', '14:35', 'attivo', 20),
(2014, 'MXP', 'MAD', '2021-05-23', '09:00', '2021-05-23', '11:20', 'attivo', 20),
(2015, 'MXP', 'CPH', '2021-05-23', '15:30', '2021-05-23', '17:30', 'attivo', 20),
(2016, 'MXP', 'LHR', '2021-05-24', '13:00', '2021-05-24', '15:00', 'attivo', 20),
(2017, 'MXP', 'CPH', '2021-05-25', '20:00', '2021-05-25', '22:00', 'attivo', 20),
(2018, 'MXP', 'MAD', '2021-05-27', '09:00', '2021-05-27', '11:20', 'attivo', 20),
(2019, 'MXP', 'CDG', '2021-05-27', '20:00', '2021-05-27', '21:35', 'attivo', 20),
(2020, 'MXP', 'LHR', '2021-05-28', '11:00', '2021-05-28', '13:00', 'attivo', 20),
(2021, 'MXP', 'CDG', '2021-05-29', '13:00', '2021-05-29', '14:35', 'attivo', 20),
(2022, 'MXP', 'MAD', '2021-05-30', '09:00', '2021-05-30', '11:20', 'attivo', 20),
(2023, 'MXP', 'CPH', '2021-05-30', '15:30', '2021-05-30', '17:30', 'attivo', 20),
(2024, 'MXP', 'LHR', '2021-05-31', '13:00', '2021-05-31', '15:00', 'active', 20),
(2025, 'MXP', 'CPH', '2021-06-01', '20:00', '2021-06-01', '22:00', 'active', 20),
(2026, 'MXP', 'MAD', '2021-06-03', '09:00', '2021-06-03', '11:20', 'active', 20),
(2027, 'MXP', 'CDG', '2021-06-03', '20:00', '2021-06-03', '21:35', 'active', 20),
(2028, 'MXP', 'LHR', '2021-06-04', '11:00', '2021-06-04', '13:00', 'active', 20),
(2029, 'MXP', 'CDG', '2021-06-05', '13:00', '2021-06-05', '14:35', 'active', 20),
(2030, 'MXP', 'MAD', '2021-06-06', '09:00', '2021-06-06', '11:20', 'active', 20),
(2031, 'MXP', 'CPH', '2021-06-06', '15:30', '2021-06-06', '17:30', 'active', 20),
(2032, 'MXP', 'LHR', '2021-06-07', '13:00', '2021-06-07', '15:00', 'active', 20),
(2033, 'MXP', 'CPH', '2021-06-08', '20:00', '2021-06-08', '22:00', 'active', 20),
(2034, 'MXP', 'MAD', '2021-06-10', '09:00', '2021-06-10', '11:20', 'active', 20),
(2035, 'MXP', 'CDG', '2021-06-10', '20:00', '2021-06-10', '21:35', 'active', 20),
(2036, 'MXP', 'LHR', '2021-06-11', '11:00', '2021-06-11', '13:00', 'active', 20),
(2037, 'MXP', 'CDG', '2021-06-12', '13:00', '2021-06-12', '14:35', 'active', 20),
(2038, 'MXP', 'MAD', '2021-06-13', '09:00', '2021-06-13', '11:20', 'active', 20),
(2039, 'MXP', 'CPH', '2021-06-13', '15:30', '2021-06-13', '17:30', 'active', 20),
(2040, 'MXP', 'LHR', '2021-06-14', '13:00', '2021-06-14', '15:00', 'active', 20),
(2041, 'MXP', 'CPH', '2021-06-15', '20:00', '2021-06-15', '22:00', 'active', 20),
(2042, 'MXP', 'MAD', '2021-06-17', '09:00', '2021-06-17', '11:20', 'active', 20),
(2043, 'MXP', 'CDG', '2021-06-17', '20:00', '2021-06-17', '21:35', 'active', 20),
(2044, 'MXP', 'LHR', '2021-06-18', '11:00', '2021-06-18', '13:00', 'active', 20),
(2045, 'MXP', 'CDG', '2021-06-19', '13:00', '2021-06-19', '14:35', 'active', 20),
(2046, 'MXP', 'MAD', '2021-06-20', '09:00', '2021-06-20', '11:20', 'active', 20),
(2047, 'MXP', 'CPH', '2021-06-20', '15:30', '2021-06-20', '17:30', 'active', 20),
(2048, 'MXP', 'LHR', '2021-06-21', '13:00', '2021-06-21', '15:00', 'active', 20),
(2049, 'MXP', 'CPH', '2021-06-22', '20:00', '2021-06-22', '22:00', 'active', 20),
(2050, 'MXP', 'MAD', '2021-06-24', '09:00', '2021-06-24', '11:20', 'active', 20),
(2051, 'MXP', 'CDG', '2021-06-24', '20:00', '2021-06-24', '21:35', 'active', 20),
(2052, 'MXP', 'LHR', '2021-06-25', '11:00', '2021-06-25', '13:00', 'active', 20),
(2053, 'MXP', 'CDG', '2021-06-26', '13:00', '2021-06-26', '14:35', 'active', 20),
(2054, 'MXP', 'MAD', '2021-06-27', '09:00', '2021-06-27', '11:20', 'active', 20),
(2055, 'MXP', 'CPH', '2021-06-27', '15:30', '2021-06-27', '17:30', 'active', 20),
(2056, 'MXP', 'LHR', '2021-06-28', '13:00', '2021-06-28', '15:00', 'active', 20),
(2057, 'MXP', 'CPH', '2021-06-29', '20:00', '2021-06-29', '22:00', 'active', 20),
(2058, 'MXP', 'MAD', '2021-07-01', '09:00', '2021-07-01', '11:20', 'active', 20),
(2059, 'MXP', 'CDG', '2021-07-01', '20:00', '2021-07-01', '21:35', 'active', 20),
(2060, 'MXP', 'LHR', '2021-07-02', '11:00', '2021-07-02', '13:00', 'active', 20),
(2061, 'MXP', 'CDG', '2021-07-03', '13:00', '2021-07-03', '14:35', 'active', 20),
(2062, 'MXP', 'MAD', '2021-07-04', '09:00', '2021-07-04', '11:20', 'active', 20),
(2063, 'MXP', 'CPH', '2021-07-04', '15:30', '2021-07-04', '17:30', 'active', 20),
(3000, 'LHR', 'MXP', '2021-05-11', '09:00', '2021-05-11', '11:00', 'attivo', 20),
(3001, 'LHR', 'CDG', '2021-05-11', '17:15', '2021-05-11', '18:30', 'attivo', 20),
(3002, 'LHR', 'CPH', '2021-05-12', '17:15', '2021-05-12', '18:55', 'attivo', 20),
(3003, 'LHR', 'MAD', '2021-05-12', '20:00', '2021-05-12', '21:30', 'attivo', 20),
(3004, 'LHR', 'MXP', '2021-05-13', '15:30', '2021-05-13', '17:30', 'attivo', 20),
(3005, 'LHR', 'CPH', '2021-05-15', '17:15', '2021-05-15', '18:55', 'attivo', 20),
(3006, 'LHR', 'CDG', '2021-05-16', '11:00', '2021-05-16', '12:15', 'attivo', 20),
(3007, 'LHR', 'MAD', '2021-05-16', '20:00', '2021-05-16', '21:30', 'attivo', 20),
(3008, 'LHR', 'MXP', '2021-05-18', '09:00', '2021-05-18', '11:00', 'attivo', 20),
(3009, 'LHR', 'CDG', '2021-05-18', '17:15', '2021-05-18', '18:30', 'attivo', 20),
(3010, 'LHR', 'CPH', '2021-05-19', '17:15', '2021-05-19', '18:55', 'attivo', 20),
(3011, 'LHR', 'MAD', '2021-05-19', '20:00', '2021-05-19', '21:30', 'attivo', 20),
(3012, 'LHR', 'MXP', '2021-05-20', '15:30', '2021-05-20', '17:30', 'attivo', 20),
(3013, 'LHR', 'CPH', '2021-05-22', '17:15', '2021-05-22', '18:55', 'attivo', 20),
(3014, 'LHR', 'CDG', '2021-05-23', '11:00', '2021-05-23', '12:15', 'attivo', 20),
(3015, 'LHR', 'MAD', '2021-05-23', '20:00', '2021-05-23', '21:30', 'attivo', 20),
(3016, 'LHR', 'MXP', '2021-05-25', '09:00', '2021-05-25', '11:00', 'attivo', 20),
(3017, 'LHR', 'CDG', '2021-05-25', '17:15', '2021-05-25', '18:30', 'attivo', 20),
(3018, 'LHR', 'CPH', '2021-05-26', '17:15', '2021-05-26', '18:55', 'attivo', 20),
(3019, 'LHR', 'MAD', '2021-05-26', '20:00', '2021-05-26', '21:30', 'attivo', 20),
(3020, 'LHR', 'MXP', '2021-05-27', '15:30', '2021-05-27', '17:30', 'attivo', 20),
(3021, 'LHR', 'CPH', '2021-05-29', '17:15', '2021-05-29', '18:55', 'attivo', 20),
(3022, 'LHR', 'CDG', '2021-05-30', '11:00', '2021-05-30', '12:15', 'attivo', 20),
(3023, 'LHR', 'MAD', '2021-05-30', '20:00', '2021-05-30', '21:30', 'attivo', 20),
(3024, 'LHR', 'MXP', '2021-06-01', '09:00', '2021-06-01', '11:00', 'active', 20),
(3025, 'LHR', 'CDG', '2021-06-01', '17:15', '2021-06-01', '18:30', 'active', 20),
(3026, 'LHR', 'CPH', '2021-06-02', '17:15', '2021-06-02', '18:55', 'active', 20),
(3027, 'LHR', 'MAD', '2021-06-02', '20:00', '2021-06-02', '21:30', 'active', 20),
(3028, 'LHR', 'MXP', '2021-06-03', '15:30', '2021-06-03', '17:30', 'active', 20),
(3029, 'LHR', 'CPH', '2021-06-05', '17:15', '2021-06-05', '18:55', 'active', 20),
(3030, 'LHR', 'CDG', '2021-06-06', '11:00', '2021-06-06', '12:15', 'active', 20),
(3031, 'LHR', 'MAD', '2021-06-06', '20:00', '2021-06-06', '21:30', 'active', 20),
(3032, 'LHR', 'MXP', '2021-06-08', '09:00', '2021-06-08', '11:00', 'active', 20),
(3033, 'LHR', 'CDG', '2021-06-08', '17:15', '2021-06-08', '18:30', 'active', 20),
(3034, 'LHR', 'CPH', '2021-06-09', '17:15', '2021-06-09', '18:55', 'active', 20),
(3035, 'LHR', 'MAD', '2021-06-09', '20:00', '2021-06-09', '21:30', 'active', 20),
(3036, 'LHR', 'MXP', '2021-06-10', '15:30', '2021-06-10', '17:30', 'active', 20),
(3037, 'LHR', 'CPH', '2021-06-12', '17:15', '2021-06-12', '18:55', 'active', 20),
(3038, 'LHR', 'CDG', '2021-06-13', '11:00', '2021-06-13', '12:15', 'active', 20),
(3039, 'LHR', 'MAD', '2021-06-13', '20:00', '2021-06-13', '21:30', 'active', 20),
(3040, 'LHR', 'MXP', '2021-06-15', '09:00', '2021-06-15', '11:00', 'active', 20),
(3041, 'LHR', 'CDG', '2021-06-15', '17:15', '2021-06-15', '18:30', 'active', 20),
(3042, 'LHR', 'CPH', '2021-06-16', '17:15', '2021-06-16', '18:55', 'active', 20),
(3043, 'LHR', 'MAD', '2021-06-16', '20:00', '2021-06-16', '21:30', 'active', 20),
(3044, 'LHR', 'MXP', '2021-06-17', '15:30', '2021-06-17', '17:30', 'active', 20),
(3045, 'LHR', 'CPH', '2021-06-19', '17:15', '2021-06-19', '18:55', 'active', 20),
(3046, 'LHR', 'CDG', '2021-06-20', '11:00', '2021-06-20', '12:15', 'active', 20),
(3047, 'LHR', 'MAD', '2021-06-20', '20:00', '2021-06-20', '21:30', 'active', 20),
(3048, 'LHR', 'MXP', '2021-06-22', '09:00', '2021-06-22', '11:00', 'active', 20),
(3049, 'LHR', 'CDG', '2021-06-22', '17:15', '2021-06-22', '18:30', 'active', 20),
(3050, 'LHR', 'CPH', '2021-06-23', '17:15', '2021-06-23', '18:55', 'active', 20),
(3051, 'LHR', 'MAD', '2021-06-23', '20:00', '2021-06-23', '21:30', 'active', 20),
(3052, 'LHR', 'MXP', '2021-06-24', '15:30', '2021-06-24', '17:30', 'active', 20),
(3053, 'LHR', 'CPH', '2021-06-26', '17:15', '2021-06-26', '18:55', 'active', 20),
(3054, 'LHR', 'CDG', '2021-06-27', '11:00', '2021-06-27', '12:15', 'active', 20),
(3055, 'LHR', 'MAD', '2021-06-27', '20:00', '2021-06-27', '21:30', 'active', 20),
(3056, 'LHR', 'MXP', '2021-06-29', '09:00', '2021-06-29', '11:00', 'active', 20),
(3057, 'LHR', 'CDG', '2021-06-29', '17:15', '2021-06-29', '18:30', 'active', 20),
(3058, 'LHR', 'CPH', '2021-06-30', '17:15', '2021-06-30', '18:55', 'active', 20),
(3059, 'LHR', 'MAD', '2021-06-30', '20:00', '2021-06-30', '21:30', 'active', 20),
(3060, 'LHR', 'MXP', '2021-07-01', '15:30', '2021-07-01', '17:30', 'active', 20),
(3061, 'LHR', 'CPH', '2021-07-03', '17:15', '2021-07-03', '18:55', 'active', 20),
(3062, 'LHR', 'CDG', '2021-07-04', '11:00', '2021-07-04', '12:15', 'active', 20),
(3063, 'LHR', 'MAD', '2021-07-04', '20:00', '2021-07-04', '21:30', 'active', 20),
(4000, 'CPH', 'CDG', '2021-05-10', '11:00', '2021-05-10', '13:00', 'attivo', 20),
(4001, 'CPH', 'LHR', '2021-05-10', '20:00', '2021-05-10', '21:40', 'attivo', 20),
(4002, 'CPH', 'MAD', '2021-05-11', '11:00', '2021-05-11', '14:10', 'attivo', 20),
(4003, 'CPH', 'MXP', '2021-05-12', '11:00', '2021-05-12', '13:00', 'attivo', 20),
(4004, 'CPH', 'LHR', '2021-05-13', '11:00', '2021-05-13', '12:40', 'attivo', 20),
(4005, 'CPH', 'CDG', '2021-05-13', '13:00', '2021-05-13', '15:00', 'attivo', 20),
(4006, 'CPH', 'MAD', '2021-05-15', '11:00', '2021-05-15', '14:10', 'attivo', 20),
(4007, 'CPH', 'MXP', '2021-05-15', '15:30', '2021-05-15', '17:30', 'attivo', 20),
(4008, 'CPH', 'CDG', '2021-05-17', '11:00', '2021-05-17', '13:00', 'attivo', 20),
(4009, 'CPH', 'LHR', '2021-05-17', '20:00', '2021-05-17', '21:40', 'attivo', 20),
(4010, 'CPH', 'MAD', '2021-05-18', '11:00', '2021-05-18', '14:10', 'attivo', 20),
(4011, 'CPH', 'MXP', '2021-05-19', '11:00', '2021-05-19', '13:00', 'attivo', 20),
(4012, 'CPH', 'LHR', '2021-05-20', '11:00', '2021-05-20', '12:40', 'attivo', 20),
(4013, 'CPH', 'CDG', '2021-05-20', '13:00', '2021-05-20', '15:00', 'attivo', 20),
(4014, 'CPH', 'MAD', '2021-05-22', '11:00', '2021-05-22', '14:10', 'attivo', 20),
(4015, 'CPH', 'MXP', '2021-05-22', '15:30', '2021-05-22', '17:30', 'attivo', 20),
(4016, 'CPH', 'CDG', '2021-05-24', '11:00', '2021-05-24', '13:00', 'attivo', 20),
(4017, 'CPH', 'LHR', '2021-05-24', '20:00', '2021-05-24', '21:40', 'attivo', 20),
(4018, 'CPH', 'MAD', '2021-05-25', '11:00', '2021-05-25', '14:10', 'attivo', 20),
(4019, 'CPH', 'MXP', '2021-05-26', '11:00', '2021-05-26', '13:00', 'attivo', 20),
(4020, 'CPH', 'LHR', '2021-05-27', '11:00', '2021-05-27', '12:40', 'attivo', 20),
(4021, 'CPH', 'CDG', '2021-05-27', '13:00', '2021-05-27', '15:00', 'attivo', 20),
(4022, 'CPH', 'MAD', '2021-05-29', '11:00', '2021-05-29', '14:10', 'attivo', 20),
(4023, 'CPH', 'MXP', '2021-05-29', '15:30', '2021-05-29', '17:30', 'attivo', 20),
(4024, 'CPH', 'CDG', '2021-05-31', '11:00', '2021-05-31', '13:00', 'active', 20),
(4025, 'CPH', 'LHR', '2021-05-31', '20:00', '2021-05-31', '21:40', 'active', 20),
(4026, 'CPH', 'MAD', '2021-06-01', '11:00', '2021-06-01', '14:10', 'active', 20),
(4027, 'CPH', 'MXP', '2021-06-02', '11:00', '2021-06-02', '13:00', 'active', 20),
(4028, 'CPH', 'LHR', '2021-06-03', '11:00', '2021-06-03', '12:40', 'active', 20),
(4029, 'CPH', 'CDG', '2021-06-03', '13:00', '2021-06-03', '15:00', 'active', 20),
(4030, 'CPH', 'MAD', '2021-06-05', '11:00', '2021-06-05', '14:10', 'active', 20),
(4031, 'CPH', 'MXP', '2021-06-05', '15:30', '2021-06-05', '17:30', 'active', 20),
(4032, 'CPH', 'CDG', '2021-06-07', '11:00', '2021-06-07', '13:00', 'active', 20),
(4033, 'CPH', 'LHR', '2021-06-07', '20:00', '2021-06-07', '21:40', 'active', 20),
(4034, 'CPH', 'MAD', '2021-06-08', '11:00', '2021-06-08', '14:10', 'active', 20),
(4035, 'CPH', 'MXP', '2021-06-09', '11:00', '2021-06-09', '13:00', 'active', 20),
(4036, 'CPH', 'LHR', '2021-06-10', '11:00', '2021-06-10', '12:40', 'active', 20),
(4037, 'CPH', 'CDG', '2021-06-10', '13:00', '2021-06-10', '15:00', 'active', 20),
(4038, 'CPH', 'MAD', '2021-06-12', '11:00', '2021-06-12', '14:10', 'active', 20),
(4039, 'CPH', 'MXP', '2021-06-12', '15:30', '2021-06-12', '17:30', 'active', 20),
(4040, 'CPH', 'CDG', '2021-06-14', '11:00', '2021-06-14', '13:00', 'active', 20),
(4041, 'CPH', 'LHR', '2021-06-14', '20:00', '2021-06-14', '21:40', 'active', 20),
(4042, 'CPH', 'MAD', '2021-06-15', '11:00', '2021-06-15', '14:10', 'active', 20),
(4043, 'CPH', 'MXP', '2021-06-16', '11:00', '2021-06-16', '13:00', 'active', 20),
(4044, 'CPH', 'LHR', '2021-06-17', '11:00', '2021-06-17', '12:40', 'active', 20),
(4045, 'CPH', 'CDG', '2021-06-17', '13:00', '2021-06-17', '15:00', 'active', 20),
(4046, 'CPH', 'MAD', '2021-06-19', '11:00', '2021-06-19', '14:10', 'active', 20),
(4047, 'CPH', 'MXP', '2021-06-19', '15:30', '2021-06-19', '17:30', 'active', 20),
(4048, 'CPH', 'CDG', '2021-06-21', '11:00', '2021-06-21', '13:00', 'active', 20),
(4049, 'CPH', 'LHR', '2021-06-21', '20:00', '2021-06-21', '21:40', 'active', 20),
(4050, 'CPH', 'MAD', '2021-06-22', '11:00', '2021-06-22', '14:10', 'active', 20),
(4051, 'CPH', 'MXP', '2021-06-23', '11:00', '2021-06-23', '13:00', 'active', 20),
(4052, 'CPH', 'LHR', '2021-06-24', '11:00', '2021-06-24', '12:40', 'active', 20),
(4053, 'CPH', 'CDG', '2021-06-24', '13:00', '2021-06-24', '15:00', 'active', 20),
(4054, 'CPH', 'MAD', '2021-06-26', '11:00', '2021-06-26', '14:10', 'active', 20),
(4055, 'CPH', 'MXP', '2021-06-26', '15:30', '2021-06-26', '17:30', 'active', 20),
(4056, 'CPH', 'CDG', '2021-06-28', '11:00', '2021-06-28', '13:00', 'active', 20),
(4057, 'CPH', 'LHR', '2021-06-28', '20:00', '2021-06-28', '21:40', 'active', 20),
(4058, 'CPH', 'MAD', '2021-06-29', '11:00', '2021-06-29', '14:10', 'active', 20),
(4059, 'CPH', 'MXP', '2021-06-30', '11:00', '2021-06-30', '13:00', 'active', 20),
(4060, 'CPH', 'LHR', '2021-07-01', '11:00', '2021-07-01', '12:40', 'active', 20),
(4061, 'CPH', 'CDG', '2021-07-01', '13:00', '2021-07-01', '15:00', 'active', 20),
(4062, 'CPH', 'MAD', '2021-07-03', '11:00', '2021-07-03', '14:10', 'active', 20),
(4063, 'CPH', 'MXP', '2021-07-03', '15:30', '2021-07-03', '17:30', 'active', 20),
(4100, 'CPH', 'MAD', '2021-05-22', '20:00', '2021-05-22', '23:10', 'attivo', 20),
(5000, 'CDG', 'MXP', '2021-05-10', '15:30', '2021-05-10', '17:05', 'attivo', 20),
(5001, 'CDG', 'MAD', '2021-05-10', '17:15', '2021-05-10', '19:15', 'attivo', 20),
(5002, 'CDG', 'LHR', '2021-05-12', '13:00', '2021-05-12', '14:15', 'attivo', 20),
(5003, 'CDG', 'MAD', '2021-05-13', '17:15', '2021-05-13', '19:15', 'attivo', 20),
(5004, 'CDG', 'CPH', '2021-05-14', '17:15', '2021-05-14', '19:15', 'attivo', 20),
(5005, 'CDG', 'MXP', '2021-05-14', '20:00', '2021-05-14', '21:35', 'attivo', 20),
(5006, 'CDG', 'LHR', '2021-05-15', '20:00', '2021-05-15', '21:15', 'attivo', 20),
(5007, 'CDG', 'CPH', '2021-05-16', '17:15', '2021-05-16', '19:15', 'attivo', 20),
(5008, 'CDG', 'MXP', '2021-05-17', '15:30', '2021-05-17', '17:05', 'attivo', 20),
(5009, 'CDG', 'MAD', '2021-05-17', '17:15', '2021-05-17', '19:15', 'attivo', 20),
(5010, 'CDG', 'LHR', '2021-05-19', '13:00', '2021-05-19', '14:15', 'attivo', 20),
(5011, 'CDG', 'MAD', '2021-05-20', '17:15', '2021-05-20', '19:15', 'attivo', 20),
(5012, 'CDG', 'CPH', '2021-05-21', '17:15', '2021-05-21', '19:15', 'attivo', 20),
(5013, 'CDG', 'MXP', '2021-05-21', '20:00', '2021-05-21', '21:35', 'attivo', 20),
(5014, 'CDG', 'LHR', '2021-05-22', '20:00', '2021-05-22', '21:15', 'attivo', 20),
(5015, 'CDG', 'CPH', '2021-05-23', '17:15', '2021-05-23', '19:15', 'attivo', 20),
(5016, 'CDG', 'MXP', '2021-05-24', '15:30', '2021-05-24', '17:05', 'attivo', 20),
(5017, 'CDG', 'MAD', '2021-05-24', '17:15', '2021-05-24', '19:15', 'attivo', 20),
(5018, 'CDG', 'LHR', '2021-05-26', '13:00', '2021-05-26', '14:15', 'attivo', 20),
(5019, 'CDG', 'MAD', '2021-05-27', '17:15', '2021-05-27', '19:15', 'attivo', 20),
(5020, 'CDG', 'CPH', '2021-05-28', '17:15', '2021-05-28', '19:15', 'attivo', 20),
(5021, 'CDG', 'MXP', '2021-05-28', '20:00', '2021-05-28', '21:35', 'attivo', 20),
(5022, 'CDG', 'LHR', '2021-05-29', '20:00', '2021-05-29', '21:15', 'attivo', 20),
(5023, 'CDG', 'CPH', '2021-05-30', '17:15', '2021-05-30', '19:15', 'attivo', 20),
(5024, 'CDG', 'MXP', '2021-05-31', '15:30', '2021-05-31', '17:05', 'active', 20),
(5025, 'CDG', 'MAD', '2021-05-31', '17:15', '2021-05-31', '19:15', 'active', 20),
(5026, 'CDG', 'LHR', '2021-06-02', '13:00', '2021-06-02', '14:15', 'active', 20),
(5027, 'CDG', 'MAD', '2021-06-03', '17:15', '2021-06-03', '19:15', 'active', 20),
(5028, 'CDG', 'CPH', '2021-06-04', '17:15', '2021-06-04', '19:15', 'active', 20),
(5029, 'CDG', 'MXP', '2021-06-04', '20:00', '2021-06-04', '21:35', 'active', 20),
(5030, 'CDG', 'LHR', '2021-06-05', '20:00', '2021-06-05', '21:15', 'active', 20),
(5031, 'CDG', 'CPH', '2021-06-06', '17:15', '2021-06-06', '19:15', 'active', 20),
(5032, 'CDG', 'MXP', '2021-06-07', '15:30', '2021-06-07', '17:05', 'active', 20),
(5033, 'CDG', 'MAD', '2021-06-07', '17:15', '2021-06-07', '19:15', 'active', 20),
(5034, 'CDG', 'LHR', '2021-06-09', '13:00', '2021-06-09', '14:15', 'active', 20),
(5035, 'CDG', 'MAD', '2021-06-10', '17:15', '2021-06-10', '19:15', 'active', 20),
(5036, 'CDG', 'CPH', '2021-06-11', '17:15', '2021-06-11', '19:15', 'active', 20),
(5037, 'CDG', 'MXP', '2021-06-11', '20:00', '2021-06-11', '21:35', 'active', 20),
(5038, 'CDG', 'LHR', '2021-06-12', '20:00', '2021-06-12', '21:15', 'active', 20),
(5039, 'CDG', 'CPH', '2021-06-13', '17:15', '2021-06-13', '19:15', 'active', 20),
(5040, 'CDG', 'MXP', '2021-06-14', '15:30', '2021-06-14', '17:05', 'active', 20),
(5041, 'CDG', 'MAD', '2021-06-14', '17:15', '2021-06-14', '19:15', 'active', 20),
(5042, 'CDG', 'LHR', '2021-06-16', '13:00', '2021-06-16', '14:15', 'active', 20),
(5043, 'CDG', 'MAD', '2021-06-17', '17:15', '2021-06-17', '19:15', 'active', 20),
(5044, 'CDG', 'CPH', '2021-06-18', '17:15', '2021-06-18', '19:15', 'active', 20),
(5045, 'CDG', 'MXP', '2021-06-18', '20:00', '2021-06-18', '21:35', 'active', 20),
(5046, 'CDG', 'LHR', '2021-06-19', '20:00', '2021-06-19', '21:15', 'active', 20),
(5047, 'CDG', 'CPH', '2021-06-20', '17:15', '2021-06-20', '19:15', 'active', 20),
(5048, 'CDG', 'MXP', '2021-06-21', '15:30', '2021-06-21', '17:05', 'active', 20),
(5049, 'CDG', 'MAD', '2021-06-21', '17:15', '2021-06-21', '19:15', 'active', 20),
(5050, 'CDG', 'LHR', '2021-06-23', '13:00', '2021-06-23', '14:15', 'active', 20),
(5051, 'CDG', 'MAD', '2021-06-24', '17:15', '2021-06-24', '19:15', 'active', 20),
(5052, 'CDG', 'CPH', '2021-06-25', '17:15', '2021-06-25', '19:15', 'active', 20),
(5053, 'CDG', 'MXP', '2021-06-25', '20:00', '2021-06-25', '21:35', 'active', 20),
(5054, 'CDG', 'LHR', '2021-06-26', '20:00', '2021-06-26', '21:15', 'active', 20),
(5055, 'CDG', 'CPH', '2021-06-27', '17:15', '2021-06-27', '19:15', 'active', 20),
(5056, 'CDG', 'MXP', '2021-06-28', '15:30', '2021-06-28', '17:05', 'active', 20),
(5057, 'CDG', 'MAD', '2021-06-28', '17:15', '2021-06-28', '19:15', 'active', 20),
(5058, 'CDG', 'LHR', '2021-06-30', '13:00', '2021-06-30', '14:15', 'active', 20),
(5059, 'CDG', 'MAD', '0000-00-00', '17:15', '0000-00-00', '19:15', 'active', 20),
(5060, 'CDG', 'CPH', '2021-07-02', '17:15', '2021-07-02', '19:15', 'active', 20),
(5061, 'CDG', 'MXP', '2021-07-02', '20:00', '2021-07-02', '21:35', 'active', 20),
(5062, 'CDG', 'LHR', '2021-07-03', '20:00', '2021-07-03', '21:15', 'active', 20),
(5063, 'CDG', 'CPH', '2021-07-04', '17:15', '2021-07-04', '19:15', 'active', 20),
(8000, 'MXP', 'LHR', '2021-07-18', '10.00', '2021-07-18', '12.00', 'attivo', 20),
(8001, 'MXP', 'LHR', '2021-07-15', '20.00', '2021-07-09', '22.00', 'active', 20);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `abbonamentoclub`
--
ALTER TABLE `abbonamentoclub`
  ADD PRIMARY KEY (`cardID`);

--
-- Indici per le tabelle `acquistovolo`
--
ALTER TABLE `acquistovolo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`flightID`);

--
-- Indici per le tabelle `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticketID` (`ticketID`);

--
-- Indici per le tabelle `passeggero`
--
ALTER TABLE `passeggero`
  ADD PRIMARY KEY (`codiceFiscale`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `voli`
--
ALTER TABLE `voli`
  ADD PRIMARY KEY (`flightID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquistovolo`
--
ALTER TABLE `acquistovolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
