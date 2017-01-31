-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 31 2017 г., 18:42
-- Версия сервера: 5.5.52-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bdfb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `id` int(11) NOT NULL,
  `book` text NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`id`, `book`, `author`) VALUES
(4, 'Интервью с вампиром', 'Стивен Кинг'),
(5, 'Новый вид', 'Неизвестен'),
(6, 'Вовочка', 'Анектдоты'),
(8, 'Новая', 'Книга'),
(16, 'Один', 'Бог'),
(17, 'Рекорды Гинеса', 'Гинес'),
(20, 'Harry Potter and the Deathly Hallows – Part 1', 'J.K. Rowling'),
(35, 'Harry Potter and the Deathly Hallows – Part 2', 'J.K. Rowling'),
(36, 'Norwegian Wood', 'Haruki Murakami');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
