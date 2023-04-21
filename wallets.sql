-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2023 г., 01:08
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wallets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `wallets`
--

CREATE TABLE `wallets` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` float NOT NULL DEFAULT 0,
  `balance_usd` float NOT NULL DEFAULT 0,
  `balance_gbp` float NOT NULL DEFAULT 0,
  `balance_eur` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wallets`
--

INSERT INTO `wallets` (`id`, `password`, `balance`, `balance_usd`, `balance_gbp`, `balance_eur`) VALUES
('644133c1a0b8c', '$2y$10$OOOtHkZBtheaSM4gx.RGKOeJivyHTUDtdcBpLw0mgpmyMblpnJLWe', 0.0706122, 0, 0, 0),
('644133cc65c08', '$2y$10$zepyE0g3v/1wOmPV4WzABehVJdVNZ1a8pi57mJ87Cz.h4d2LqJ40W', 0, 0, 0, 0),
('64413ad57492f', '$2y$10$m4P1XEqsg4pIDWut4Qim2ef7tS7TkPi0d.6PvyXDZosXmHMHj5D1S', 0.0362529, 0, 0, 0),
('64413ae08cf18', '$2y$10$zJvYnqoQ5bkKrLjPTOo6iuHpKv26DXGOh9RN64DFopMuZAQmTEQm2', 0, 0, 0, 0),
('64413b105516f', '$2y$10$gwKjnByrNwcmq5JyZS6lXu7DkhSBUtYDCb0D7LGs4I01bvkmEiFEG', 0, 0, 0, 0),
('64413b12d7d9e', '$2y$10$o1yqTjxm1Aqr9VQputpMS.doKobCuKS.7jGDsNHHyhje5mY/Uf3ue', 0, 0, 0, 0),
('64413b15eb186', '$2y$10$DzFzwc1teoa5y7oslYRJZeDZnSP6Vyw8ab4OaxiL9qIVKJWNIK7Tm', 0.0000707, 0, 0, 0),
('64413b19490f9', '$2y$10$C2wn6qv6XniOMeLI3z698Oiq.xE0GvLYNuPqkydu5pXda0598jVcG', 0, 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
