-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 11 2023 г., 04:35
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
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `href` varchar(255) NOT NULL DEFAULT '#',
  `name` varchar(50) NOT NULL,
  `is_title` tinyint(1) NOT NULL DEFAULT 0,
  `menu_id` int(11) NOT NULL,
  `parrent_id` int(11) DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `href`, `name`, `is_title`, `menu_id`, `parrent_id`, `img`, `icon`) VALUES
(1, '/?route=index/page&id=2', 'Контакты', 0, 3, NULL, NULL, NULL),
(2, '/?route=index/page&id=1', 'О нас', 0, 3, NULL, NULL, NULL),
(3, '/?route=index/page&id=1', 'О нас', 0, 1, NULL, NULL, NULL),
(4, '#', 'Fashion', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-6.png'),
(6, '#', 'outwear & jackets', 1, 2, 4, NULL, NULL),
(7, '#', 'Suits & Sets', 0, 2, 6, NULL, NULL),
(8, '#', 'Jumpsuits', 0, 2, 6, NULL, NULL),
(9, '', 'Sleep & Lounge', 0, 2, 6, NULL, NULL),
(10, '#', 'Wool & Blends', 0, 2, 6, NULL, NULL),
(11, '#', 'under gewear ', 1, 2, 4, NULL, NULL),
(12, '#', 'Long Johns', 0, 2, 11, NULL, NULL),
(13, '#', 'Men\'s & Lounge', 0, 2, 11, NULL, NULL),
(14, '#', 'Pajama Sets', 0, 2, 11, NULL, NULL),
(15, '#', 'Pajama Sets', 0, 2, 11, NULL, NULL),
(16, '#', 'Accessories Sets', 0, 2, 11, NULL, NULL),
(17, '#', 'bottoms supplies ', 1, 2, 4, NULL, NULL),
(18, '#', 'Casual Pants', 0, 2, 17, NULL, NULL),
(19, '#', 'Cargo Pants', 0, 2, 17, NULL, NULL),
(20, '#', 'Jeanses', 0, 2, 17, NULL, NULL),
(21, '#', 'Sweatpants', 0, 2, 17, NULL, NULL),
(22, '#', 'Harem Pants', 0, 2, 17, NULL, NULL),
(23, '#', 'Computer', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-1.png'),
(24, '#', 'Flower & Gift', 1, 2, 0, 'app/resources/image/catalog/menu/megabanner/vbanner1.jpg', 'app/resources/image/catalog/menu/icons/icon-2.png'),
(25, '#', 'anniversary flowers  ', 1, 2, 24, NULL, NULL),
(26, '#', 'Apology Flowers', 0, 2, 25, NULL, NULL),
(27, '#', 'Baby Flowers', 0, 2, 25, NULL, NULL),
(28, '#', 'Birthday Flowers', 0, 2, 25, NULL, NULL),
(29, '#', 'Birthday Flowers', 0, 2, 25, NULL, NULL),
(30, '#', 'Get Well Flowers', 0, 2, 25, NULL, NULL),
(31, '#', 'good luck flowers', 1, 2, 24, NULL, NULL),
(32, '#', 'New Home Flowers', 0, 2, 31, NULL, NULL),
(33, '#', 'Romance Flowers', 0, 2, 31, NULL, NULL),
(34, '#', 'Surprise Flowers', 0, 2, 31, NULL, NULL),
(35, '#', 'Sympathy Flowers', 0, 2, 24, NULL, NULL),
(36, '#', 'Thank You Flowers', 0, 2, 31, NULL, NULL),
(47, '#', 'Health & Beauty', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-3.png'),
(48, '#', 'Human Hair Weaves', 1, 2, 47, NULL, NULL),
(49, '#', 'Beauty Tools ', 1, 2, 47, NULL, NULL),
(50, '#', 'Wigs & Salon Supply', 1, 2, 47, NULL, NULL),
(51, '#', 'Nail Art & Tools', 1, 2, 47, NULL, NULL),
(52, '#', 'Makeup Brushes', 1, 2, 47, NULL, NULL),
(53, '#', 'Makeup Set', 0, 2, 49, NULL, NULL),
(54, '#', 'False Eyelashes', 0, 2, 49, NULL, NULL),
(55, '#', 'Eyeshadow', 0, 2, 49, NULL, NULL),
(56, '#', 'Beauty Essentials', 0, 2, 49, NULL, NULL),
(57, '#', 'Smartphone', 1, 2, 0, 'app/resources/image/catalog/menu/megabanner/menu_bg2.jpg', 'app/resources/image/catalog/menu/icons/icon-3.png'),
(58, '#', 'Sport Clothing', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-4.png'),
(59, '#', 'Watch & Jewelry', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-7.png'),
(60, '#', 'Kitchen', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-6.png'),
(61, '#', 'Accessories', 1, 2, 0, NULL, 'app/resources/image/catalog/menu/icons/icon-7.png'),
(62, '#', 'Blouses & Shirts', 0, 2, 6, NULL, NULL),
(63, '#', 'Tops & Sets', 1, 2, 4, NULL, NULL),
(64, '#', 'Blouses & Shirts', 0, 2, 63, NULL, NULL),
(65, '#', 'Suits & Sets', 0, 2, 63, NULL, NULL),
(66, '#', 'Genuine Leather', 0, 2, 63, NULL, NULL),
(67, '#', 'Down Jackets', 0, 2, 63, NULL, NULL),
(68, '#', 'Suits & Blazer', 0, 2, 63, NULL, NULL),
(70, '#', 'Accessories', 1, 2, 4, NULL, NULL),
(71, '#', 'Scarves Pren', 0, 2, 70, NULL, NULL),
(72, '#', 'Skullies & Beanies', 0, 2, 70, NULL, NULL),
(73, '#', 'cription Glasses', 0, 2, 70, NULL, NULL),
(74, '#', 'Bomber Hats', 0, 2, 70, NULL, NULL),
(75, '#', 'Baseball Caps', 0, 2, 70, NULL, NULL),
(76, '#', 'Outer Jackets', 1, 2, 4, NULL, NULL),
(77, '#', 'Parkas Pants', 0, 2, 76, NULL, NULL),
(78, '#', 'Down Jackets', 0, 2, 76, NULL, NULL),
(79, '#', 'Suits & Blazer', 0, 2, 76, NULL, NULL),
(80, '#', 'Wool & Blends', 0, 2, 76, NULL, NULL),
(81, '#', 'Loungewear', 0, 2, 76, NULL, NULL),
(82, '#', 'Mobile Phones', 1, 2, 57, NULL, NULL),
(83, '#', 'Octa Core', 0, 2, 82, NULL, NULL),
(84, '#', 'Deca Core', 0, 2, 82, NULL, NULL),
(85, '#', 'Dual SIM Card', 0, 2, 82, NULL, NULL),
(86, '#', 'Dual SIM Card', 0, 2, 82, NULL, NULL),
(87, '#', 'Memory 32,64G', 0, 2, 82, NULL, NULL),
(88, '#', 'Dual SIM Card', 0, 2, 82, NULL, NULL),
(89, '#', 'Home Audio', 0, 2, 82, NULL, NULL),
(90, '#', '4GB RAM', 0, 2, 82, NULL, NULL),
(91, '#', 'Cases & Covers', 1, 2, 57, NULL, NULL),
(92, '#', 'Patterned Cases', 0, 2, 91, NULL, NULL),
(93, '#', 'Wallet Cases', 0, 2, 91, NULL, NULL),
(94, '#', 'Waterptoof Cases', 0, 2, 91, NULL, NULL),
(95, '#', 'Leather Cases', 0, 2, 91, NULL, NULL),
(96, '#', 'Silicone Cases', 0, 2, 91, NULL, NULL),
(97, '#', 'Flip Cases', 0, 2, 91, NULL, NULL),
(98, '#', 'Galaxy S8 Cases', 0, 2, 91, NULL, NULL),
(99, '#', 'Xiaomi Cases', 0, 2, 91, NULL, NULL),
(100, '#', 'Phone Accessories', 1, 2, 57, NULL, NULL),
(101, '#', 'Power Bank', 0, 2, 100, NULL, NULL),
(102, '#', 'Screen Protectors', 0, 2, 100, NULL, NULL),
(103, '#', 'Mobile Phone Cables', 0, 2, 100, NULL, NULL),
(104, '#', 'Holders & Stands', 0, 2, 100, NULL, NULL),
(105, '#', 'Phone Lenses', 0, 2, 100, NULL, NULL),
(106, '#', 'Phone Cables', 0, 2, 100, NULL, NULL),
(107, '#', 'Phone Display', 0, 2, 100, NULL, NULL),
(108, '#', 'Phone Memory', 0, 2, 100, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
