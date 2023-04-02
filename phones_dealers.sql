-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 14, 2022 alle 03:01
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phones_dealers`
--
CREATE DATABASE IF NOT EXISTS `phones_dealers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phones_dealers`;

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `id_cliente` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `Data_nascita` date NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id_cliente`, `Nome`, `Cognome`, `Data_nascita`, `Username`, `Email`, `Password`) VALUES
(1, 'Mario', 'Rossi', '1999-01-01', 'MarioRossi', 'mario.rossi@gmail.com', 'marioRed'),
(2, 'Giovanni', 'Verdi', '2002-12-25', 'GioVerdi', 'giovanni.verdi@gmail.com', 'gioGreen'),
(3, 'Filippo', 'Rossi', '1998-08-16', 'FiloRossi', 'filippo.rossi@gmail.com', 'filRossi'),
(4, 'Andrea', 'Verdi', '1992-04-12', 'AndriVerdi', 'andrea.borgiani@gmail.com', 'andVerdi');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche_clienti`
--

CREATE TABLE `notifiche_clienti` (
  `id_notifica_cliente` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `Testo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `notifiche_clienti`
--

INSERT INTO `notifiche_clienti` (`id_notifica_cliente`, `id_cliente`, `Testo`) VALUES
(1, 1, 'Conferma ordine n° 1, effettuato in data 2022-02-09, con un costo totale di 2343 €'),
(2, 2, 'Conferma ordine n° 2, effettuato in data 2022-02-09, con un costo totale di 3432 €'),
(3, 1, 'Conferma ordine n° 3, effettuato in data 2022-02-14, con un costo totale di 2218 €');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche_venditori`
--

CREATE TABLE `notifiche_venditori` (
  `id_notifica_venditore` int(11) NOT NULL,
  `id_venditore` int(11) NOT NULL,
  `Testo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `notifiche_venditori`
--

INSERT INTO `notifiche_venditori` (`id_notifica_venditore`, `id_venditore`, `Testo`) VALUES
(1, 1, 'Ordine n° 1, effettuato in data 2022-02-09 da Red, con un costo totale di 1234 €'),
(2, 2, 'Ordine n° 1, effettuato in data 2022-02-09 da Red, con un costo totale di 1109 €'),
(3, 1, 'Ordine n° 2, effettuato in data 2022-02-09 da Green, con un costo totale di 1234 €'),
(4, 2, 'Ordine n° 2, effettuato in data 2022-02-09 da Green, con un costo totale di 2198 €'),
(5, 1, 'Il prodotto Samsung S10 è SOLD OUT!'),
(6, 2, 'Ordine n° 3, effettuato in data 2022-02-14 da MarioRossi, con un costo totale di 2218 €'),
(7, 2, 'Il prodotto Apple Iphone X è SOLD OUT!');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id_ordine` int(11) NOT NULL,
  `n_ordine` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id_ordine`, `n_ordine`, `id_cliente`, `id_prodotto`, `quantità`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 3, 1),
(3, 2, 2, 1, 1),
(4, 2, 2, 4, 2),
(5, 3, 1, 3, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id_prodotto` int(11) NOT NULL,
  `id_venditore` int(11) NOT NULL,
  `Modello` varchar(100) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Colore` varchar(100) NOT NULL,
  `Memoria` varchar(100) NOT NULL,
  `Prezzo` int(4) NOT NULL,
  `quantità` int(11) NOT NULL,
  `attivo` tinyint(1) NOT NULL DEFAULT 1,
  `percorsoImmagine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id_prodotto`, `id_venditore`, `Modello`, `Marca`, `Colore`, `Memoria`, `Prezzo`, `quantità`, `attivo`, `percorsoImmagine`) VALUES
(1, 1, 'S10', 'Samsung', 'Bianco', '128', 1234, 10, 1, './IMG/Product/SamsungS10.jpeg'),
(2, 1, 'Reno 6', 'Oppo', 'Blu', '256', 859, 6, 1, './IMG/Product/OppoReno6.jpeg'),
(3, 2, 'Iphone X', 'Apple', 'Grigio', '256', 1109, 0, 0, './IMG/Product/AppleIphoneX.jpeg'),
(4, 2, 'Iphone 13', 'Apple', 'Blu', '128', 1099, 8, 1, './IMG/Product/AppleIphone13.jpeg'),
(5, 2, 'P50 Pro', 'Huawei', 'Nero', '256', 700, 20, 1, './IMG/Product/P50.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `richieste_aiuto`
--

CREATE TABLE `richieste_aiuto` (
  `id_richiesta` int(11) NOT NULL,
  `eMail` varchar(100) NOT NULL,
  `testo` longtext NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `richieste_aiuto`
--

INSERT INTO `richieste_aiuto` (`id_richiesta`, `eMail`, `testo`, `data`) VALUES
(1, 'giovanni.verdi@gmail.com', 'Ciao, ho avuto un problema con il prodotto che è arrivato rotto, come posso fare?', '2022-02-09'),
(2, 'filippo.rossi@gmail.com', 'Salve, non ho ricevuto il prodotto!', '2022-02-14');

-- --------------------------------------------------------

--
-- Struttura della tabella `venditori`
--

CREATE TABLE `venditori` (
  `id_venditore` int(11) NOT NULL,
  `Partita_IVA` bigint(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `venditori`
--

INSERT INTO `venditori` (`id_venditore`, `Partita_IVA`, `Username`, `Email`, `Password`) VALUES
(1, 54678294361, 'Apple', 'apple@apple.com', 'apple.apple'),
(2, 97284365237, 'Samsung', 'samsung@samsung.com', 'samsung.samsung');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `notifiche_clienti`
--
ALTER TABLE `notifiche_clienti`
  ADD PRIMARY KEY (`id_notifica_cliente`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `notifiche_venditori`
--
ALTER TABLE `notifiche_venditori`
  ADD PRIMARY KEY (`id_notifica_venditore`),
  ADD KEY `id_venditore` (`id_venditore`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_ordine`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_prodotto` (`id_prodotto`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD KEY `id_veditore` (`id_venditore`);

--
-- Indici per le tabelle `richieste_aiuto`
--
ALTER TABLE `richieste_aiuto`
  ADD PRIMARY KEY (`id_richiesta`);

--
-- Indici per le tabelle `venditori`
--
ALTER TABLE `venditori`
  ADD PRIMARY KEY (`id_venditore`),
  ADD UNIQUE KEY `Partita_IVA` (`Partita_IVA`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `notifiche_clienti`
--
ALTER TABLE `notifiche_clienti`
  MODIFY `id_notifica_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `notifiche_venditori`
--
ALTER TABLE `notifiche_venditori`
  MODIFY `id_notifica_venditore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `richieste_aiuto`
--
ALTER TABLE `richieste_aiuto`
  MODIFY `id_richiesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `venditori`
--
ALTER TABLE `venditori`
  MODIFY `id_venditore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `notifiche_clienti`
--
ALTER TABLE `notifiche_clienti`
  ADD CONSTRAINT `notifiche_clienti` FOREIGN KEY (`id_cliente`) REFERENCES `clienti` (`id_cliente`);

--
-- Limiti per la tabella `notifiche_venditori`
--
ALTER TABLE `notifiche_venditori`
  ADD CONSTRAINT `notifiche_venditori` FOREIGN KEY (`id_venditore`) REFERENCES `venditori` (`id_venditore`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini` FOREIGN KEY (`id_cliente`) REFERENCES `clienti` (`id_cliente`),
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id_prodotto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `prodotti` FOREIGN KEY (`id_venditore`) REFERENCES `venditori` (`id_venditore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
