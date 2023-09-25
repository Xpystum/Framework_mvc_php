-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 25 2023 г., 16:33
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
(20, 2, 24);

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
(14, 'КомпанияНадоедамИльеВопросамиНаПАРЕ', 'АдресклассютубГдеИлья', 'ГородНадоедливый ', 1, 3513, '14213'),
(24, 'КомпанияНадоедамИльеВопросами', 'АдресклассютубГдеИльяAress2', 'ГородНадоедливый ', 1, 3513, '14213');

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

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`) VALUES
(92, 10, '2023-08-29 13:36:07'),
(94, 10, '2023-09-02 15:13:29');

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
(60, 92, 4, 3, 90000, 90000, NULL),
(61, 92, 5, 6, 210000, 210000, NULL),
(62, 94, 4, 3, 90000, 85050, 1),
(63, 94, 5, 1, 35000, 33075, 1);

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
(52, 4, 0, '2023-08-29 13:36:07', 92),
(54, 5, 0, '2023-09-02 15:13:29', 94),
(55, 5, 0, '2023-09-03 23:08:24', 95),
(56, 5, 0, '2023-09-03 23:08:24', 96);

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
-- Структура таблицы `test_cat`
--

CREATE TABLE `test_cat` (
  `id` int(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `test_cat`
--

INSERT INTO `test_cat` (`id`, `title`, `parent_id`) VALUES
(1, 'FORD', 0),
(2, 'MAZDA', 0),
(3, 'VOLVO', 0),
(4, 'OPEL', 0),
(5, 'SEDAN', 1),
(6, 'hetchback', 5),
(7, 'coupe', 1),
(8, 'fastback', 1),
(9, 'sedan', 2),
(10, 'cabriolet', 6),
(11, 'universal', 3);

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
(10, 25, 'ЕвгенияЖеня ', 'КрасоваRedRed', '7920034244', '111111');

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
(25, 'j@mail.ru', '$2y$10$9gPZ7dce0GImqJnei3GoMeKQNGWiSSVQvX4YUVf7jAlda7DLi7sq6', 1);

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
(10, 20, 7);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD KEY `name` (`name`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`product_id`);

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
-- Индексы таблицы `test_cat`
--
ALTER TABLE `test_cat`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- AUTO_INCREMENT для таблицы `test_cat`
--
ALTER TABLE `test_cat`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
