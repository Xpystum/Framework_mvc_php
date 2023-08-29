-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 29 2023 г., 14:11
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `framework`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adress_type`
--

CREATE TABLE `adress_type` (
  `id` int(2) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `adress_type`
--

INSERT INTO `adress_type` (`id`, `type`) VALUES
(1, 'payment'),
(2, 'shipping');

-- --------------------------------------------------------

--
-- Структура таблицы `adress_union`
--

CREATE TABLE `adress_union` (
  `id` int(2) NOT NULL,
  `adress_type_id` int(100) NOT NULL,
  `adress_user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `adress_union`
--

INSERT INTO `adress_union` (`id`, `adress_type_id`, `adress_user_id`) VALUES
(15, 1, 14),
(20, 2, 24),
(21, 1, 25),
(22, 2, 26);

-- --------------------------------------------------------

--
-- Структура таблицы `adress_user`
--

CREATE TABLE `adress_user` (
  `id` int(100) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` int(99) NOT NULL,
  `region_id` int(100) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `adress_user`
--

INSERT INTO `adress_user` (`id`, `company`, `address`, `city`, `country_id`, `region_id`, `post_code`) VALUES
(14, 'КомпанияНадоедамИльеВопросами', 'Адресклассютуб', 'ГородНадоедливый ', 1, 3513, '14213'),
(24, 'КомпанияНадоедамИльеВопросами', 'Адресклассютуб', 'ГородНадоедливый ', 1, 3513, '14213'),
(25, 'Надоедаемилье22', 'Надоедливыйадресс2', 'ГородНадоедка2 ', 1, 3513, '2352'),
(26, 'sdg', 'dgf', 'erg', 2, 3514, 'erf');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_content` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parrent_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_content`, `img`, `parrent_id`) VALUES
(1, 'Компьютеры', 'Краткое описание', 'resources/image/catalog/menu/icons/icon-1.png', NULL),
(2, 'Смартфоны', NULL, 'resources/image/catalog/menu/icons/icon-2.png', NULL),
(3, 'iphone', NULL, NULL, 2),
(4, 'Android', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(255) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Aaland Islands'),
(2, 'Afghanistan'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba');

-- --------------------------------------------------------

--
-- Структура таблицы `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `discount_precent` decimal(3,1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `discount`
--

INSERT INTO `discount` (`id`, `name`, `disc`, `discount_precent`, `active`) VALUES
(1, 'cupon', 'Надоедливый купон1', 5.5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name_menu` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name_menu`, `alias`) VALUES
(1, 'главное меню в шапке', 'main_menu'),
(2, 'меню категорий товаров', 'departament_menu'),
(3, 'footer', 'footer_menu');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `href` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parrent_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `href`, `name`, `menu_id`, `parrent_id`, `img`, `icon`) VALUES
(1, '/?route=index/page&id=2', 'Контакты', 3, NULL, NULL, NULL),
(2, '/?route=index/page&id=1', 'О нас', 3, NULL, NULL, NULL),
(3, '/?route=index/page&id=1', 'О нас', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Закрытый Ордер (Оплачен - получена доставка)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `status`) VALUES
(8, 11, '2023-08-03 10:35:22', 0),
(92, 10, '2023-08-29 13:36:07', 0);

--
-- Триггеры `orders`
--
DELIMITER $$
CREATE TRIGGER `Payment_INSERT` AFTER INSERT ON `orders` FOR EACH ROW INSERT INTO `payment_details` (status_id, amount, `date`, order_id) VALUES(DEFAULT , DEFAULT, NOW(), (SELECT id FROM orders ORDER BY id DESC LIMIT 1) )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(4) NOT NULL,
  `order_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL COMMENT 'цена биз скидок и изменнений',
  `total` int(11) NOT NULL COMMENT 'Цена со скидкой или изменениеями',
  `discount_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`, `discount_id`) VALUES
(60, 92, 4, 2, 60000, 60000, NULL),
(61, 92, 5, 6, 210000, 210000, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `name`, `content`) VALUES
(1, 'about', 'О нас', NULL, 'текст страницы о нас'),
(2, 'contacts', 'Контакты', 'Как с нами связаться', '\r\n				\r\n				<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.8442639328655!2d-71.10008329902021!3d42.34584359264178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e379f63dc43ccb%3A0xa15d5aa87d0f0c12!2s4+Yawkey+Way%2C+Boston%2C+MA+02215!5e0!3m2!1sen!2s!4v1475081210943\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen=\"\"></iframe>\r\n				<div class=\"info-contact clearfix\">\r\n					<div class=\"col-lg-4 col-sm-4 col-xs-12 info-store\">\r\n						<div class=\"row\">\r\n							<div class=\"name-store\">\r\n								<h3>Your Store</h3>\r\n							</div>\r\n							<address>\r\n								<div class=\"address clearfix form-group\">\r\n									<div class=\"icon\">\r\n										<i class=\"fa fa-home\"></i>\r\n									</div>\r\n									<div class=\"text\">My Company, 42 avenue des Champs Elysées 75000 Paris France</div>\r\n								</div>\r\n								<div class=\"phone form-group\">\r\n									<div class=\"icon\">\r\n										<i class=\"fa fa-phone\"></i>\r\n									</div>\r\n									<div class=\"text\">Phone : 0123456789</div>\r\n								</div>\r\n								<div class=\"comment\">             \r\n								Maecenas euismod felis et purus consectetur, quis fermentum velition. Aenean egestas quis turpis vehicula.Maecenas euismod felis et purus consectetur, quis fermentum velition. \r\n								Aenean egestas quis turpis vehicula.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \r\n								The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.\r\n								</div>\r\n							</address>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-lg-8 col-sm-8 col-xs-12 contact-form\">\r\n						<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">\r\n							<fieldset>\r\n								<legend>Contact Form</legend>\r\n								<div class=\"form-group required\">\r\n							<label class=\"col-sm-2 control-label\" for=\"input-name\">Your Name</label>\r\n							<div class=\"col-sm-10\">\r\n								<input type=\"text\" name=\"name\" value=\"\" id=\"input-name\" class=\"form-control\">\r\n								</div>\r\n							</div>\r\n							<div class=\"form-group required\">\r\n								<label class=\"col-sm-2 control-label\" for=\"input-email\">E-Mail Address</label>\r\n								<div class=\"col-sm-10\">\r\n									<input type=\"text\" name=\"email\" value=\"\" id=\"input-email\" class=\"form-control\">\r\n									</div>\r\n								</div>\r\n								<div class=\"form-group required\">\r\n									<label class=\"col-sm-2 control-label\" for=\"input-enquiry\">Enquiry</label>\r\n									<div class=\"col-sm-10\">\r\n										<textarea name=\"enquiry\" rows=\"10\" id=\"input-enquiry\" class=\"form-control\"></textarea>\r\n									</div>\r\n								</div>\r\n							</fieldset>\r\n							<div class=\"buttons\">\r\n								<div class=\"pull-right\">\r\n									<button class=\"btn btn-default buttonGray\" type=\"submit\">\r\n										<span>Submit</span>\r\n									</button>\r\n								</div>\r\n							</div>\r\n						</form>\r\n					</div>\r\n				</div>\r\n			'),
(3, '404', '404', NULL, 'страница не найдена'),
(4, 'index', 'Главная', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(4) NOT NULL,
  `status_id` int(4) NOT NULL DEFAULT 5,
  `amount` int(8) NOT NULL DEFAULT 0 COMMENT 'Сколько оплачено',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `payment_details`
--

INSERT INTO `payment_details` (`id`, `status_id`, `amount`, `date`, `order_id`) VALUES
(52, 5, 0, '2023-08-29 13:36:07', 92);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_id` int(4) NOT NULL,
  `price` int(8) NOT NULL,
  `old_price` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `category_id`, `price`, `old_price`) VALUES
(4, 'КОМП1', 'app/resources/image/catalog/1.jpg', 'Крутой компьютер под номером 1', 1, 30000, NULL),
(5, 'КОМП2', 'app/resources/image/catalog/2.jpg', 'Крутой компьютер под номером 2', 1, 35000, 40000),
(6, 'КАКОЙ ТО СМАРТФОН', 'app/resources/image/catalog/3.jpg', 'Супер смартфон от Apple', 2, 10000, 12000);

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(4) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `region`) VALUES
(3513, 'Aberdeen'),
(3514, 'Aberdeenshire'),
(3515, 'Anglesey'),
(3516, 'Angus'),
(3517, 'Argyll and Bute'),
(3518, 'Bedfordshire'),
(3519, 'Berkshire');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Отменён'),
(2, 'Доставлен'),
(3, 'Оплачен'),
(4, 'Готов к Отправке'),
(5, 'В Обработке');

-- --------------------------------------------------------

--
-- Структура таблицы `test_user`
--

CREATE TABLE `test_user` (
  `id` int(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `adress_1` varchar(255) DEFAULT NULL,
  `adress_2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `post_code` varchar(40) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `region_state` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `test_user`
--

INSERT INTO `test_user` (`id`, `email`, `name`, `surname`, `password`, `telephone`, `fax`, `company`, `adress_1`, `adress_2`, `city`, `post_code`, `country`, `region_state`) VALUES
(6, '234234@mail.ru', 'Ivan', 'Solikov', '$2y$10$LaPUcWmrt4rXourEmsSPHOnii6PA3kT68rfDXkAUhA3qsol/MOusK', '234', '23523', 'erfgerhg', 'gerg', 'dfge', '54234223', '234', '3', '3515'),
(7, '1@mail.ru', 'IvanIvanIvanIvanIv', 'IvanIvanIv', '$2y$10$6WDbV9tohD7zdfnxh1Fj/.J2Qf.Qqek4AeoBO.9nJhHngajH9gK/i', 'PrivetPrivet', 'konezkonez', '', '', 'sdfgssdf', 'dfgdfhdfgdfhdfgdfhdf', '235235', '', ''),
(10, 'j@mail.ru', 'Женя', 'Красивао', '$2y$10$Z0kNSW203S7qzcDjTx2tFO1rr70Zaqi5tZE1k7xkSgHX5XPpsP5Re', '8920036453', '2345235', 'Сеньёр верстальщик', 'Коробка под москвой', 'Коробка под Питером', 'Нижний Тагил', '32452352', '', ''),
(11, 'j@mail.ru', 'Женя', 'Красивао', '$2y$10$a/D7OInk.Nwz9cP0dHNA0ulvrhq07OjjVvKt6wwtAU5iyKJIdF7vi', '8920036453', '2345235', 'Сеньёр верстальщик', 'Коробка под москвой', 'Коробка под Питером', 'Нижний Тагил', '32452352', '', ''),
(12, 'jen@mail.ru', 'Ivan', 'Ivanys', '$2y$10$21tRuqgy97MCG0ouurWC2eENluWbEZz64RsTnV/O/cGU0uw1.wcrm', '234532456', '234235', 'ПХП', ' Питер', 'Нижний', 'Москва', '2345235', '244', '3513'),
(13, 'jen@mail.ru', 'Ivan', 'Ivanys', '$2y$10$KR4sFWV2t12nSrsGBb4h4.hHR/plxAijccXppqdSb09oQYinVBCY6', '234532456', '234235', 'ПХП', ' Питер', 'Нижний', 'Москва', '2345235', '244', '3513'),
(14, 'jen@mail.ru', 'Ivan', 'Ivanys', '$2y$10$jiL4KAxJnXRxWr8D2tgj8O2b6Ot1WUQ5.cDyLIdzuqvc5oTRyDgWm', '234532456', '234235', 'ПХП', ' Питер', 'Нижний', 'Москва', '2345235', '244', '3513'),
(15, 'jen@mail.ru', 'Ivan', 'Ivanys', '$2y$10$/TsSZXXA8AZ7CkJmeHBHwOmGrzzYFHXWihPiikZw7OWgCz0EApQ6a', '234532456', '234235', 'ПХП', ' Питер', 'Нижний', 'Москва', '2345235', '244', '3513');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `users_input_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `users_input_id`, `name`, `surname`, `telephone`, `fax`) VALUES
(10, 25, 'Евгения ', 'КрасоваRed', '7920034244', '111111'),
(11, 28, 'Ivan ', 'Solikov', '8920034235', '345346');

-- --------------------------------------------------------

--
-- Структура таблицы `users_input`
--

CREATE TABLE `users_input` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_input`
--

INSERT INTO `users_input` (`id`, `email`, `password`, `user_type_id`) VALUES
(25, 'j@mail.ru', '$2y$10$aya/s2an7/i6uVlffgBq4e7HNq3Ylgjyw1e.5qAVpxpPiZSKP9yLm', 1),
(28, 'x@mail.ru', '$2y$10$7Lc0dp1dpVulYoKZ9IvLD.2i1vxeB3Qiks9qLiED2pFDIpL1RrHC6', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_table`
--

CREATE TABLE `users_table` (
  `users_id` int(11) NOT NULL,
  `adress_union_id` int(11) NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_table`
--

INSERT INTO `users_table` (`users_id`, `adress_union_id`, `id`) VALUES
(10, 15, 1),
(10, 20, 7),
(11, 21, 8),
(11, 22, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'Тип прав пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'moderator');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adress_type`
--
ALTER TABLE `adress_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adress_union`
--
ALTER TABLE `adress_union`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adress_user`
--
ALTER TABLE `adress_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test_user`
--
ALTER TABLE `test_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_input`
--
ALTER TABLE `users_input`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adress_type`
--
ALTER TABLE `adress_type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `adress_union`
--
ALTER TABLE `adress_union`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `adress_user`
--
ALTER TABLE `adress_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3520;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `test_user`
--
ALTER TABLE `test_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users_input`
--
ALTER TABLE `users_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
