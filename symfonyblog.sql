-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 13 2016 г., 00:50
-- Версия сервера: 5.7.13-log
-- Версия PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `symfonyblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `title`, `body`, `summary`, `created`) VALUES
(1, 'First title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 11:51:09'),
(2, 'Second title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 11:57:16'),
(3, 'sixth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 12:02:38'),
(4, 'Second title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 12:04:14'),
(5, 'third title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 12:04:14'),
(6, 'fourth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 12:04:14'),
(7, 'fifth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 12:04:14'),
(8, 'sixth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-05 12:04:14');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `email`, `is_active`) VALUES
(1, 'admin', '$2y$12$zEcgd4uqzWZCMIMllM5HpO89ClAAgANSth0RIpBOI0pfOLJlqsXkW', 'lunatikspb@gmail.com', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D5428AEDF85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_D5428AEDE7927C74` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
