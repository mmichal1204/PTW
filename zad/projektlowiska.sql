-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 10:06 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektlowiska`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `opis`) VALUES
(1, 'rzeka', 'Łowisko typu rzeka'),
(2, 'Jezioro', 'Łowisko typu jezioro');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lowiska`
--

CREATE TABLE `lowiska` (
  `id` int(10) UNSIGNED NOT NULL,
  `idKategorii` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `obrazek` varchar(50) NOT NULL,
  `ryby` text NOT NULL,
  `opis` text NOT NULL,
  `wojewodztwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `lowiska`
--

INSERT INTO `lowiska` (`id`, `idKategorii`, `nazwa`, `obrazek`, `ryby`, `opis`, `wojewodztwo`) VALUES
(9, 1, 'Łowisko ,, Kamienie\' Bug Mężenin', 'mez1.jpg', 'sum leszcz sandacz', 'Mężynin to niewielka miejscowość położona w Polsce, województwo mazowieckie, nad rzeką Bug. Leży w okolicach wschodniej części kraju, niedaleko granicy z Białorusią. To urokliwe miejsce, otoczone piękną przyrodą, które przyciąga zarówno miłośników spokoju, jak i wędkarzy z całego regionu.\r\n\r\nRzeka Bug w Mężyninie jest prawdziwym rajem dla wędkarzy. Ta malownicza rzeka jest znana z bogactwa różnorodnych gatunków ryb, które można tu złowić przez większość roku. Do popularnych gatunków ryb, które można spotkać w tych wodach, należą szczupaki, sandacze, leszcze, płocie, ukleje oraz liczne gatunki karpiowatych.\r\n\r\nWędkowanie w Mężyninie można uprawiać z brzegu rzeki lub z łodzi. W okolicy istnieje wiele udogodnień dla wędkarzy, takich jak stanowiska wędkarskie, wypożyczalnie łodzi i sprzętu wędkarskiego, co sprawia, że jest to idealne miejsce zarówno dla doświadczonych wędkarzy, jak i początkujących.', 'podlaskie'),
(10, 2, 'Zalew ,,Muchawka\' Siedlce', '63edfd757b3ba_o_original.jpg', 'szczupak karp klen sandacz', 'Zalew Muchawka to urokliwy zbiornik wodny położony w Siedlcach w województwie mazowieckim. Znajduje się na południowym zachodnim obrzeżu miasta, co czyni go łatwo dostępnym dla mieszkańców i turystów z okolicznych regionów.\r\nZalew Muchawka w Siedlcach to wspaniałe miejsce dla wędkarzy, oferujące różnorodność gatunków ryb. W tych  wodach można znaleźć takie popularne ryby jak karp, leszcz, szczupak i płocie. Karpie zachwycają swoimi imponującymi rozmiarami i walecznym charakterem, stanowiąc wyzwanie dla wędkarzy. Leszcze tworzą grupy w wodzie, co sprawia, że łowienie ich dostarcza satysfakcji z połowu ryb stadnych. Szczupaki, jako drapieżniki, osiągają imponujące rozmiary i są doskonałym celem dla miłośników wędkarstwa spinningowego. Płoć, z kolei, jest popularnym celem wędkarzy początkujących i można spotkać różne odmiany płoci w Zalewie Muchawka. Te różnorodne gatunki ryb sprawiają, że Zalew Muchawka to idealne miejsce dla wędkarzy o różnym doświadczeniu, gdzie mogą cieszyć się zarówno połowem ryb, jak i urokiem przyrody wokół tego pięknego zbiornika wodnego.', 'mazowieckie'),
(13, 1, 'Rzeka Bug Starczewice', 'star1.jpg', 'sum leszcz oko', 'Rzeka Bug w Starczewicach to wymarzone miejsce dla wędkarzy. To malowniczy zakątek Mazowsza, gdzie można złowić różnorodne gatunki ryb, takie jak szczupak, sandacz, leszcz, płocie i inne. Otoczenie rzeki Bug, otoczone lasami i przyrodą, zapewnia spokojną atmosferę, idealną do relaksu na łonie natury. Dostępne stanowiska wędkarskie i udogodnienia sprawiają, że wędkowanie jest wygodne i satysfakcjonujące. Sezon wędkarski trwa przez większą część roku, co daje okazję do wspaniałych przygód na łowisku. To miejsce, gdzie wędkarstwo staje się niezapomnianym doświadczeniem, łączącym przyrodę i pasję w jedno.', 'mazowieckie'),
(14, 1, 'Rzeka Bug Klimczyce', 'klim1.jpg', 'szczupak leszcz', 'Rzeka Bug w Klimczycach to wymarzone miejsce dla wędkarzy. Malowniczy krajobraz Mazowsza otacza to miejsce, które oferuje różnorodność ryb, takich jak szczupak, sandacz, leszcz, płocie i inne. Dostępność stanowisk wędkarskich i udogodnień sprawia, że wędkowanie jest wygodne i satysfakcjonujące. Sezon wędkarski trwa przez większą część roku, dając możliwość wyjątkowych przygód na łowisku w pięknym otoczeniu natury. To idealne miejsce, gdzie pasja wędkarstwa łączy się z urokiem przyrody.', 'mazowieckie'),
(26, 1, 'Rzeka Bug Tonkiele', 'tonkiele1.jpg', 'leszcz klen sandacz okon', '\r\nRzeka Bug, przepływająca przez miejscowość Tonkiele, to prawdziwy raj dla wędkarzy. Jej kręte wody są znane z bogactwa ryb, takich jak szczupaki, okonie czy płocie. Malownicze otoczenie i spokojna atmosfera sprawiają, że każda chwila spędzona nad Bugiem to niezapomniane doświadczenie dla miłośników wędkarstwa.', 'podlaskie'),
(27, 2, 'Stare Biernaty Łosice', 'biernaty1.jpg', 'szczupak leszcz karp sandacz', 'Zbiornik Stare Biernaty w Łosicach to malownicze miejsce zlokalizowane na terenie Mazowsza, stanowiące popularny cel wycieczek i rekreacji. Zbiornik ten powstał poprzez spiętrzenie rzeki Biernatki i stanowi doskonałe miejsce do uprawiania sportów wodnych, wędkarstwa oraz obserwacji ptaków. Jego otoczenie pełne jest lasów i łąk, co dodaje uroku i zachęca do aktywnego spędzania czasu na świeżym powietrzu.', 'mazowieckie'),
(28, 2, 'Zalew Węgrów', 'wegr1.jpg', 'szczupak leszcz okon', '\r\nZalew w Węgrowie to sztuczny zbiornik wodny położony w mieście Węgrów na Mazowszu. Powstał poprzez spiętrzenie rzeki Liwiec i pełni funkcje rekreacyjne, turystyczne oraz retencyjne. Zalew oferuje liczne atrakcje, takie jak kąpieliska, plaże, ścieżki spacerowe oraz tereny do grillowania i piknikowania. Jest również popularnym miejscem dla miłośników sportów wodnych, takich jak żeglarstwo, kajakarstwo czy wędkarstwo. Otoczenie zalewu często stanowi teren rekreacyjny i rekreacyjno-sportowy dla mieszkańców oraz turystów, którzy chcą cieszyć się przyrodą i aktywnym wypoczynkiem.', 'mazowieckie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `id` int(10) UNSIGNED NOT NULL,
  `idLowiska` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) NOT NULL,
  `ocena` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `recenzje`
--

INSERT INTO `recenzje` (`id`, `idLowiska`, `nick`, `ocena`, `tresc`, `data`) VALUES
(43, 9, 'nowy', 5, 'Testowa recenzja łowiska', '2024-04-18 12:25:38'),
(44, 13, 'admin1', 3, 'takie sobie', '2024-04-18 16:57:15'),
(45, 10, 'nowy', 2, 'Trudno coś złapać', '2024-04-18 05:03:23'),
(47, 13, 'testowy', 4, 'Ryby rzadko się łapią ale jak się łapią to konkretne.', '2024-04-18 05:19:38'),
(48, 10, 'admin1', 5, 'Łowisko tylko na metodę feeder.', '2024-04-18 05:20:28'),
(49, 9, 'nowy', 3, 'fgghb', '2024-04-18 08:20:05'),
(50, 26, 'admin1', 5, 'Bardzo fajna miejscówka', '2024-04-18 19:16:55'),
(51, 27, 'admin1', 1, 'Bardzo mało ryb', '2024-04-18 19:30:47');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id` int(10) UNSIGNED NOT NULL,
  `idLowiska` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `ulubione`
--

INSERT INTO `ulubione` (`id`, `idLowiska`, `idUzytkownika`) VALUES
(115, 13, 8),
(120, 9, 8),
(138, 10, 4),
(139, 27, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rola` varchar(50) NOT NULL DEFAULT 'user',
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `rola`, `data`) VALUES
(4, 'admin1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@gmail.com', 'admin', '2024-04-18 11:19:23'),
(6, 'talarcio', '2bcd6440d00647cacd69fc1f68d9efdf', 'talarcio@gmail.com', 'user', '2024-04-18 13:23:00'),
(7, 'testowy', 'f86bdb19deb2c5ab632734b8d884ce06', 'test@gmail.com', 'user', '2024-04-18 07:33:30'),
(8, 'nowy', 'ca3d8a2b54354264bcecb78742d52916', 'nowy@gmail.com', 'user', '2024-04-18 08:44:16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecie`
--

CREATE TABLE `zdjecie` (
  `id` int(10) UNSIGNED NOT NULL,
  `idLowiska` int(10) UNSIGNED NOT NULL,
  `zdjecie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `zdjecie`
--

INSERT INTO `zdjecie` (`id`, `idLowiska`, `zdjecie`) VALUES
(1, 9, 'obrazki/zdjecie1.jpg'),
(2, 9, 'obrazki/zdjecie2.jpg'),
(3, 9, 'obrazki/zdjecie3.jpg'),
(4, 10, 'obrazki/zdjecie4.jpg'),
(5, 10, 'obrazki/zdjecie5.jpg'),
(6, 10, 'obrazki/zdjecie6.jpg'),
(7, 13, 'obrazki/zdjecie7.jpg'),
(8, 13, 'obrazki/zdjecie8.jpg'),
(9, 13, 'obrazki/zdjecie9.jpg'),
(10, 14, 'obrazki/zdjecie10.jpg'),
(11, 14, 'obrazki/zdjecie11.jpg'),
(12, 14, 'obrazki/zdjecie12.jpg'),
(32, 26, 'obrazki/tonkiele2.jpg'),
(33, 26, 'obrazki/tonkiele3.jpg'),
(34, 26, 'obrazki/tonkiele4.jpg'),
(35, 27, 'obrazki/biernaty1.jpg'),
(36, 27, 'obrazki/biernaty2.jpg'),
(37, 27, 'obrazki/biernaty3.jpg'),
(38, 28, 'obrazki/wegr1.jpg'),
(39, 28, 'obrazki/wegr2.webp'),
(40, 28, 'obrazki/wegr3.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lowiska`
--
ALTER TABLE `lowiska`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKategorii` (`idKategorii`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDzbana` (`idLowiska`);

--
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDzbana` (`idLowiska`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zdjecie`
--
ALTER TABLE `zdjecie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLowiska` (`idLowiska`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lowiska`
--
ALTER TABLE `lowiska`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ulubione`
--
ALTER TABLE `ulubione`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zdjecie`
--
ALTER TABLE `zdjecie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lowiska`
--
ALTER TABLE `lowiska`
  ADD CONSTRAINT `lowiska_ibfk_1` FOREIGN KEY (`idKategorii`) REFERENCES `kategorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`idLowiska`) REFERENCES `lowiska` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `idDzbana` FOREIGN KEY (`idLowiska`) REFERENCES `lowiska` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUzytkownika` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zdjecie`
--
ALTER TABLE `zdjecie`
  ADD CONSTRAINT `fk_lowiska_zdjecie` FOREIGN KEY (`idLowiska`) REFERENCES `lowiska` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
