-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 13, 2022 alle 18:27
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgestionale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `ID_carrello` int(11) NOT NULL,
  `fk_id_serv_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`ID_carrello`, `fk_id_serv_prod`) VALUES
(1, 1),
(3, 3),
(2, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `ID_Ordini` int(11) NOT NULL,
  `fk_id_utente` int(11) NOT NULL,
  `fk_id_serv_prod` int(11) NOT NULL,
  `fk_id_stato_ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`ID_Ordini`, `fk_id_utente`, `fk_id_serv_prod`, `fk_id_stato_ordine`) VALUES
(1, 1, 1, 3),
(2, 2, 3, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `servizi_prodotti`
--

CREATE TABLE `servizi_prodotti` (
  `ID_serv_prod` int(11) NOT NULL,
  `nome_prod_serv` varchar(50) DEFAULT NULL,
  `descrizione` varchar(50) DEFAULT NULL,
  `fk_id_serv_prod` int(11) NOT NULL,
  `disponibilita` varchar(5) DEFAULT '0',
  `costo` varchar(50) DEFAULT NULL,
  `sconto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `servizi_prodotti`
--

INSERT INTO `servizi_prodotti` (`ID_serv_prod`, `nome_prod_serv`, `descrizione`, `fk_id_serv_prod`, `disponibilita`, `costo`, `sconto`) VALUES
(1, 'Disco rigido', 'Disco rigido da 500 GB', 1, '12', '25 euro', '10%'),
(3, 'Riparazione computer', 'Riparazione dei problemi di un computer', 2, '0', '250 euro', '12%'),
(6, 'Servizio assistenza', 'Servizio di assistenza software', 2, '0', '100 euro', '8%'),
(7, 'Banco RAM', 'Banco RAM da 16 GB', 1, '17', '50 euro', '15%');

-- --------------------------------------------------------

--
-- Struttura della tabella `stato_ordine`
--

CREATE TABLE `stato_ordine` (
  `ID_stato` int(11) NOT NULL,
  `nome_stato` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stato_ordine`
--

INSERT INTO `stato_ordine` (`ID_stato`, `nome_stato`) VALUES
(1, 'In elaborazione'),
(2, 'Spedito'),
(3, 'Completato');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_serv_prod`
--

CREATE TABLE `tipo_serv_prod` (
  `ID_serv_prod` int(11) NOT NULL,
  `nome_serv_prod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tipo_serv_prod`
--

INSERT INTO `tipo_serv_prod` (`ID_serv_prod`, `nome_serv_prod`) VALUES
(1, 'prodotto'),
(2, 'servizio');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_utente`
--

CREATE TABLE `tipo_utente` (
  `ID_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tipo_utente`
--

INSERT INTO `tipo_utente` (`ID_tipo`, `nome_tipo`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID_Utente` int(11) NOT NULL,
  `nome_azienda` varchar(100) DEFAULT NULL,
  `nome_rappresentante` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `numero_telefono` varchar(12) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  `passwordU` varchar(255) DEFAULT NULL,
  `fk_id_tipo_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID_Utente`, `nome_azienda`, `nome_rappresentante`, `email`, `numero_telefono`, `indirizzo`, `passwordU`, `fk_id_tipo_utente`) VALUES
(1, 'Prysma srl', 'Nicola', 'nicola03.lunardelli@gmail.com', '3343245543', 'Via roma', '$2y$10$LkVOtoZ9v/xBFFReu02bWeMjbaY6wqHX6FvgnNAsThy.6FWPe8j2u', 1),
(2, 'Pippo srl', 'Pippo', 'pippo@pippo.com', '2211445533', 'Via pippo', '$2y$10$RVFKerCbHkfzpJozFuQ2oua/oF8uBCipOzf/2XJ2VOiXH56HsieU6', 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`ID_carrello`),
  ADD KEY `fk_id_serv_prod` (`fk_id_serv_prod`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`ID_Ordini`),
  ADD KEY `fk_id_utente` (`fk_id_utente`),
  ADD KEY `fk_id_serv_prod` (`fk_id_serv_prod`),
  ADD KEY `fk_id_stato_ordine` (`fk_id_stato_ordine`);

--
-- Indici per le tabelle `servizi_prodotti`
--
ALTER TABLE `servizi_prodotti`
  ADD PRIMARY KEY (`ID_serv_prod`),
  ADD KEY `fk_id_serv_prod` (`fk_id_serv_prod`);

--
-- Indici per le tabelle `stato_ordine`
--
ALTER TABLE `stato_ordine`
  ADD PRIMARY KEY (`ID_stato`);

--
-- Indici per le tabelle `tipo_serv_prod`
--
ALTER TABLE `tipo_serv_prod`
  ADD PRIMARY KEY (`ID_serv_prod`);

--
-- Indici per le tabelle `tipo_utente`
--
ALTER TABLE `tipo_utente`
  ADD PRIMARY KEY (`ID_tipo`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID_Utente`),
  ADD KEY `fk_id_tipo_utente` (`fk_id_tipo_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `ID_carrello` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `ID_Ordini` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `servizi_prodotti`
--
ALTER TABLE `servizi_prodotti`
  MODIFY `ID_serv_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `stato_ordine`
--
ALTER TABLE `stato_ordine`
  MODIFY `ID_stato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `tipo_serv_prod`
--
ALTER TABLE `tipo_serv_prod`
  MODIFY `ID_serv_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `tipo_utente`
--
ALTER TABLE `tipo_utente`
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`fk_id_serv_prod`) REFERENCES `servizi_prodotti` (`ID_serv_prod`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`fk_id_utente`) REFERENCES `utenti` (`ID_Utente`),
  ADD CONSTRAINT `ordini_ibfk_2` FOREIGN KEY (`fk_id_serv_prod`) REFERENCES `servizi_prodotti` (`ID_serv_prod`),
  ADD CONSTRAINT `ordini_ibfk_3` FOREIGN KEY (`fk_id_stato_ordine`) REFERENCES `stato_ordine` (`ID_stato`);

--
-- Limiti per la tabella `servizi_prodotti`
--
ALTER TABLE `servizi_prodotti`
  ADD CONSTRAINT `servizi_prodotti_ibfk_1` FOREIGN KEY (`fk_id_serv_prod`) REFERENCES `tipo_serv_prod` (`ID_serv_prod`);

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`fk_id_tipo_utente`) REFERENCES `tipo_utente` (`ID_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
