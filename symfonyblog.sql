-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 16 2016 г., 08:38
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
(1, 'Second title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-30 02:06:51'),
(2, 'third title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-30 02:06:51'),
(3, 'fourth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-30 02:06:51'),
(4, 'fifth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-30 02:06:51'),
(5, 'sixth title', '<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>', 'Lorem ipsum dolor sit amet,', '2016-07-30 02:06:51'),
(6, 'newtitle1', 'eqwewq', 'wqewq', '2016-08-22 01:56:48'),
(7, '1', '3', '2', '2016-08-22 02:00:41'),
(8, 'title1:29', 'body:1^29', 'summary1:29', '2016-08-31 01:30:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
