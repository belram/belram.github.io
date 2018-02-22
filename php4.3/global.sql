-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2018 г., 19:54
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `global`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_user_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `is_done` tinyint(4) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `user_id`, `assigned_user_id`, `description`, `is_done`, `date_added`) VALUES
(1, 1, 2, 'Завтрак1', 1, '2018-02-17 05:29:13'),
(2, 2, 2, 'Обед2', 1, '2018-02-17 14:21:43'),
(3, 3, 3, 'Обед3', 0, '2018-02-21 12:13:31'),
(5, 1, 2, 'Ужин1', 0, '2018-02-11 18:00:00'),
(6, 2, 2, 'Завтрак2', 0, '2018-02-14 14:19:48'),
(7, 2, 2, 'Ужин2', 0, '2018-02-21 07:19:44'),
(8, 3, 3, 'Завтрак3', 0, '2018-02-11 13:00:00'),
(9, 3, 1, 'Ужин3', 0, '2018-02-11 23:00:00'),
(10, 1, 3, 'Путешествие1', 0, '2018-02-05 00:00:00'),
(11, 2, 1, 'Путешествие2', 0, '2018-02-11 18:00:00'),
(12, 3, 3, 'Путешествие3', 0, '2018-02-11 23:00:00'),
(13, 1, 10, 'Отпуск1', 0, '2018-02-20 21:48:06'),
(14, 10, 10, 'Что-то kile', 0, '2018-02-21 20:20:27'),
(15, 10, 1, 'Другое kile', 0, '2018-02-21 20:20:52'),
(16, 10, 10, 'Третье kile', 0, '2018-02-21 20:21:06');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'fred', '$1$JsbdC4G8$Em8CM7FsjF5gQgG35Muz71'),
(2, 'admin', '$1$JsbdC4G8$Em8CM7FsjF5gQgG35Muz71'),
(3, 'mark', '$1$JsbdC4G8$Em8CM7FsjF5gQgG35Muz71'),
(10, 'kile', '$1$GXfUaq8w$zTYlwDmuJ4jVzwiIvbBPR0'),
(16, 'ted', '$1$JGR4DtPe$pVR2YSkDURWytQERmZW.p.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
