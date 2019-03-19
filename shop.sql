-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 19 2019 г., 04:00
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `products` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `products`, `user_id`, `date`) VALUES
(1, 'test', 0, '2019-03-18 15:12:05'),
(3, 'test', 0, '2019-03-18 15:16:35');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `descr` text NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `descr`, `price`, `image`, `size`) VALUES
(1, 'product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iste tempore, adipisci, tenetur sapiente quibusdam vitae dolorem possimus delectus doloribus!', '0.00', 'a:4:{i:0;s:50:\"/uploads/bb747ce7-f02a-4af9-b9a1-b6d9475c9b99.jfif\";i:1;s:27:\"/uploads/15465493558490.jpg\";i:2;s:24:\"/uploads/kWL9y0vsjfY.jpg\";i:3;s:24:\"/uploads/RZWljC9tgvM.jpg\";}', '0'),
(2, 'product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iste tempore, adipisci, tenetur sapiente quibusdam vitae dolorem possimus delectus doloribus!', '0.00', 'a:2:{i:0;s:24:\"/uploads/kWL9y0vsjfY.jpg\";i:1;s:24:\"/uploads/RZWljC9tgvM.jpg\";}', '2'),
(3, 'test', 'test descr', '0.00', 'a:2:{i:0;s:24:\"/uploads/kWL9y0vsjfY.jpg\";i:1;s:24:\"/uploads/RZWljC9tgvM.jpg\";}', '1'),
(5, 'Гриша', 'еуыеLorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iste tempore, adipisci, tenetur sapiente quibusdam vitae dolorem possimus delectus doloribus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iste tempore, adipisci, tenetur sapiente quibusdam vitae dolorem possimus delectus doloribus!', '0.00', 'a:2:{i:0;s:24:\"/uploads/kWL9y0vsjfY.jpg\";i:1;s:24:\"/uploads/RZWljC9tgvM.jpg\";}', '2'),
(6, '123', '123', '0.00', 'a:4:{i:0;s:50:\"/uploads/bb747ce7-f02a-4af9-b9a1-b6d9475c9b99.jfif\";i:1;s:27:\"/uploads/15465493558490.jpg\";i:2;s:24:\"/uploads/kWL9y0vsjfY.jpg\";i:3;s:24:\"/uploads/RZWljC9tgvM.jpg\";}', '1,2,3');

-- --------------------------------------------------------

--
-- Структура таблицы `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `width`, `height`) VALUES
(1, 50, 100),
(2, 100, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(80) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `type`, `regdate`) VALUES
(1, 'test@test.ru', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, 3, '2019-03-17 11:11:25'),
(7, 'test2@test', 'e10adc3949ba59abbe56e057f20f883e', 'test2', 0, 1, '2019-03-17 11:13:08'),
(8, 'test3@test', 'e10adc3949ba59abbe56e057f20f883e', 'test3', 0, 1, '2019-03-17 11:13:06'),
(10, 'test@test', 'e10adc3949ba59abbe56e057f20f883e', 'test', 1, 1, '2019-03-17 11:26:33');

-- --------------------------------------------------------

--
-- Структура таблицы `user_attributes`
--

CREATE TABLE `user_attributes` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_attributes`
--

INSERT INTO `user_attributes` (`id`, `firstname`, `lastname`, `patronymic`, `phone`, `city`, `adress`) VALUES
(1, 'Евгений', 'Иванов', 'Отчество', 787878, 'Барнаул', 'ул Пушкина'),
(7, 'Евгений', 'Иванов', 'Отчество', 787878, 'Барнаул', 'ул Пушкина'),
(8, 'Евгений', 'Иванов', 'Отчество', 787878, 'Барнаул', 'ул Пушкина'),
(10, 'Евгений', 'Иванов', 'Отчество', 787878, 'Барнаул', 'ул Пушкина');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_attributes`
--
ALTER TABLE `user_attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
