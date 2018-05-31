-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Хост: 10.0.0.198:3306
-- Время создания: Май 17 2018 г., 18:26
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `daniill-89_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1526397252),
('m130524_201442_init', 1526468031),
('m180515_153046_news', 1526469469);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(512) NOT NULL,
  `image` varchar(512) NOT NULL,
  `annotation` longtext NOT NULL,
  `content` longtext NOT NULL,
  `like_social` int(11) unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `removed` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `moderation` tinyint(1) NOT NULL,
  `id_category` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_to_news_category` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `url`, `image`, `annotation`, `content`, `like_social`, `created_at`, `updated_at`, `deleted_at`, `removed`, `deleted`, `moderation`, `id_category`) VALUES
(1, 'Новость 1', 'novost-1', '/450x450.png', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>\r\n', 111, '2018-05-16 14:24:21', '2018-05-17 10:26:30', NULL, 0, 1, 1, 1),
(2, 'Новость2', 'novost2', '/450x450.png', '<p>Аннотация новости</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>\n		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>', NULL, '2018-05-16 20:10:23', '2018-05-17 04:02:55', NULL, 0, 0, 0, 1),
(3, 'Новость 3', 'novost-3', '/450x450.png', '<p>Аннотация новости</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>\n		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>', NULL, '2018-05-16 20:49:09', '2018-05-16 17:49:09', NULL, 0, 0, 0, 2),
(4, 'Новость 4', 'novost-4', '/450x450.png', '<p>Аннотация новости</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>\n		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>', NULL, '2018-05-17 09:21:01', '2018-05-17 06:21:01', NULL, 0, 0, 0, 1),
(5, 'Новость 5', 'novost-5', '/450x450.png', '<p>Аннотация новости</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>\n		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste consequuntur consequatur possimus dolores tempora quidem, eius nobis, fugiat quia quo quae, cumque officia deleniti? Obcaecati eum iure iste unde tenetur.</p>', NULL, '2018-05-17 09:21:25', '2018-05-17 06:21:25', NULL, 0, 0, 0, 2),
(6, 'Машина 1', 'mashina-1', '/car/car1.jpeg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:09:46', '2018-05-17 09:18:41', NULL, 0, 0, 0, 4),
(7, 'Машина 2', 'mashina-2', '/car/car2.jpg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:10:23', '2018-05-17 09:18:49', NULL, 0, 0, 0, 4),
(8, 'Машина 3', 'mashina-3', '/car/car3.jpeg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:10:52', '2018-05-17 09:18:57', NULL, 0, 0, 0, 4),
(9, 'Машина 4', 'mashina-4', '/car/car4.jpg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:11:18', '2018-05-17 09:19:06', NULL, 0, 0, 0, 4),
(10, 'Машина 5', 'mashina-5', '/car/car5.jpg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:11:39', '2018-05-17 09:19:14', NULL, 0, 0, 0, 4),
(11, 'Машина 6', 'mashina-6', '/car/car6.jpg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:12:00', '2018-05-17 09:19:21', NULL, 0, 0, 0, 4),
(12, 'Машина 7', 'mashina-7', '/car/car7.jpg', '<p>Аннотация новости</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iure minima, ex corporis, in consectetur necessitatibus recusandae amet voluptatum est, rem laudantium. Animi dolorum, atque numquam fuga maiores modi tenetur.</p>\r\n', NULL, '2018-05-17 12:13:18', '2018-05-17 09:19:28', NULL, 0, 0, 0, 4),
(13, 'Книга 1', 'kniga-1', '/literal/literal1.jpeg', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Lorem Ipsum</strong><span style="color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px">&nbsp;- это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</span></p>\r\n', NULL, '2018-05-17 12:23:07', '2018-05-17 09:23:07', NULL, 0, 0, 0, 3),
(14, 'Книга 2', 'kniga-2', '/literal/literal2.jpeg', '<p>Аннотация</p>\r\n', '<p><strong>Lorem Ipsum</strong><span style="color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px">&nbsp;- это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</span></p>\r\n', NULL, '2018-05-17 12:23:26', '2018-05-17 09:23:26', NULL, 0, 0, 0, 3),
(15, 'Книга 3', 'kniga-3', '/literal/literal3.jpg', '<p>Аннотация книги 3&nbsp;</p>\r\n', '<p><strong>Lorem Ipsum</strong><span style="color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px">&nbsp;- это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</span></p>\r\n', NULL, '2018-05-17 12:23:55', '2018-05-17 09:23:55', NULL, 0, 0, 0, 3),
(16, 'Бизнес 1', 'bisnes', '/450x450.png', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 12:35:51', '2018-05-17 09:35:51', NULL, 0, 0, 1, 2),
(17, 'Бизнес 2', 'bisnes 2', '/450x450.png', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 12:51:07', '2018-05-17 09:51:07', NULL, 0, 0, 1, 2),
(18, 'Бизнес 2', 'bisnes 2', '/450x450.png', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 12:54:27', '2018-05-17 09:54:27', NULL, 0, 0, 1, 2),
(19, 'Бизнес 2', 'bisnes 2', '/450x450.png', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 12:56:11', '2018-05-17 09:56:11', NULL, 0, 0, 1, 2),
(20, 'Литература от пользователя', 'literal-frontend', '/literal/literal1.jpeg', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 13:06:17', '2018-05-17 10:06:17', NULL, 0, 0, 1, 3),
(21, 'Литература от пользователя', 'literal-frontend', '/literal/literal1.jpeg', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 13:08:03', '2018-05-17 10:08:03', NULL, 0, 0, 1, 3),
(22, 'Литература от пользователя', 'literal-frontend', '/literal/literal1.jpeg', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 13:08:37', '2018-05-17 10:08:37', NULL, 0, 0, 0, 3),
(23, 'Литература от пользователя', 'literal-frontend', '/literal/literal1.jpeg', '<p><strong>Аннотация</strong></p>\r\n', '<p><strong>Содержание</strong></p>\r\n', NULL, '2018-05-17 13:09:06', '2018-05-17 10:09:06', NULL, 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(512) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `removed` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `url`, `created_at`, `updated_at`, `deleted_at`, `removed`, `deleted`) VALUES
(1, 'Спорт', 'sport', '2018-05-16 14:23:06', '2018-05-16 11:36:10', NULL, 0, 0),
(2, 'Бизнес', 'biznes', '2018-05-16 20:18:09', '2018-05-16 17:18:09', NULL, 0, 0),
(3, 'Литература', 'literatura', '2018-05-17 12:08:11', '2018-05-17 09:08:11', NULL, 0, 0),
(4, 'Автомобили', 'avtomobili', '2018-05-17 12:08:22', '2018-05-17 09:08:22', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hxp0TnWFimhhFH0njaZfel7X7ynf4Gib', '$2y$13$Y3lGroio/Ndut5emHCvk6eG/mvv34Gt3XhzBe5pN36LppPb.Shs46', NULL, 'vanekglushakov55@gmail.com', 10, 1526468131, 1526468131);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_to_news_category` FOREIGN KEY (`id_category`) REFERENCES `news_category` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
