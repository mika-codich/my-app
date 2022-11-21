-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 21 2022 г., 21:34
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `all_mark`
--
CREATE DATABASE IF NOT EXISTS `all_mark` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `all_mark`;

-- --------------------------------------------------------

--
-- Структура таблицы `basket_of_products`
--

CREATE TABLE `basket_of_products` (
  `id` int UNSIGNED NOT NULL,
  `id_of_user` int NOT NULL,
  `id_of_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `basket_of_products`
--

INSERT INTO `basket_of_products` (`id`, `id_of_user`, `id_of_product`) VALUES
(1, 2, 4),
(2, 1, 1),
(3, 4, 2),
(4, 3, 3),
(5, 3, 1),
(6, 3, 2),
(7, 3, 4),
(8, 3, 1),
(9, 3, 2),
(10, 3, 4),
(11, 1, 3),
(13, 15, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `bought`
--

CREATE TABLE `bought` (
  `id_of_user` int UNSIGNED NOT NULL,
  `id_of_product` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `bought`
--

INSERT INTO `bought` (`id_of_user`, `id_of_product`) VALUES
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `comments_and_rating`
--

CREATE TABLE `comments_and_rating` (
  `id_of_user` int UNSIGNED NOT NULL,
  `id_of_smartphone` int UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `rating` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments_and_rating`
--

INSERT INTO `comments_and_rating` (`id_of_user`, `id_of_smartphone`, `comment`, `date`, `rating`) VALUES
(3, 2, 'Я очень богатый человек, могу себе позволить самый новенький Айфон. Купил его. \r\n                          Посмотрел, протестировал. Нормальный смарт. Ничего необычного', '2015-08-01', 4),
(3, 3, 'Хоть я и очень богатый, но у меня особенная любовь к игровым смартфонам', '2019-12-19', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `id_of_user` int UNSIGNED NOT NULL,
  `id_of_smartphone` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `number_of_smartphones`
--

CREATE TABLE `number_of_smartphones` (
  `id_of_smartphone` int UNSIGNED NOT NULL,
  `number_of_this_model` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `smartphones`
--

CREATE TABLE `smartphones` (
  `id` int UNSIGNED NOT NULL,
  `name_of_smartphone` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `storage_ram` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `storage_rom` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `camera_megapixels` int UNSIGNED NOT NULL,
  `color` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `smartphones`
--

INSERT INTO `smartphones` (`id`, `name_of_smartphone`, `storage_ram`, `storage_rom`, `camera_megapixels`, `color`) VALUES
(1, 'Xiaomi Redmi Note 7', '4 Gb', '64 Gb', 48, 'blue'),
(2, 'Apple Iphone 7 pro', '2 Gb', '128 Gb', 12, 'white'),
(3, 'Black Shark', '8 Gb', '256 Gb', 64, 'black'),
(4, 'Google Pixel 5', '6 Gb', '512 Gb', 48, 'milky');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `date`) VALUES
(1, 'Иван Стаценко', '365d38c60c4e98ca5ca6dbc02d396e53', 'statsenko-vanya@mail.ru', '2022-06-01'),
(2, 'Ктото Ктотович Ктотов', '25bc5901ff311e87cd331fed3667c245', 'somebody@gmail.com', '2022-06-06'),
(3, 'Король Артур', '149c0796cfe6150a477b4131a9d86f60', 'king_arthur@mail.ru', '2021-05-22'),
(4, 'Фея Динь-динь', '9013d08dc8ccb2c627ef5fa1f31b286c', 'dzin-dzin@mail.ru', '2022-11-15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket_of_products`
--
ALTER TABLE `basket_of_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `smartphones`
--
ALTER TABLE `smartphones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket_of_products`
--
ALTER TABLE `basket_of_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `smartphones`
--
ALTER TABLE `smartphones`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- База данных: `all_mark_new`
--
CREATE DATABASE IF NOT EXISTS `all_mark_new` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `all_mark_new`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `surname` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_of_registration` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `date_of_registration`) VALUES
(1, 'vanya@vanya.com', 'qwerty', 'Vanya', '', '2004-06-20'),
(2, 'statsenko-vanya@mail.ru', 'qwerty12345', 'Иван', 'Стаценко', '2002-02-16'),
(3, 'statsenko-vanya@mail.rurrr', 'qwerty12345', 'Иван', 'Стаценко', '2002-02-16'),
(6, 'hello-world@mail.ru', 'Иван', 'Стаценко', '123', '2002-02-16'),
(7, 'дратути', 'дратути', 'Дратутев', 'дратути', '2002-02-16'),
(8, 'asdfasfasffasf', 'asfdasf', 'aasfasdfas', '123', '2002-02-16'),
(9, '1@mail.ru', 'afdasf', 'asfasfasd', '123', '2002-02-16'),
(10, 'asdfasfasffasf@', 'afdasf', 'asfasfasd', 'aaa', '2002-02-16'),
(11, 'asdfasfasffasf@@@', 'afdasf', 'asfasfasd', '12345', '2002-02-16'),
(12, 'asdfasfasffasf@ajdfalsj', 'afdasf', 'asfasfasd', 'asdf', '2002-02-16'),
(13, 'asdfasfasffasf@aaaa', 'aaa', 'aaa', 'aaa', '2002-02-16'),
(14, 'asdfasfasffasf@fff', 'fff', 'fff', 'fff', '2002-02-16'),
(15, 'asdfasfasffasf@ddd', 'ddd', 'ddd', 'ddd', '2002-02-16'),
(16, 'asdfasfasffasf@mail.ru', 'afdasf', 'asfasfasd', '111', '2002-02-16'),
(17, 'vanya@vanya.com1', 'afdasf', 'asfasfasd', '111', '2002-02-16'),
(18, 'blablabla@bla.com', 'Bla', 'Blabla', '123', '2002-02-16'),
(19, 'zarina@mail.ru', 'Зарина', 'Зарипова', 'qwerty', '2002-02-16'),
(20, 'zarina_gmail@gmail.com', 'Зарина', 'Зарипова', 'qwerty', '2002-02-16'),
(21, 'hello@world.com', 'asfasdf', 'asfasdfasdf', 'adsfads', '2002-02-16'),
(22, 'фыавыавф@', 'фывафыа', 'фывфывафвы', 'фывавыафы', '2002-02-16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- База данных: `coffee`
--
CREATE DATABASE IF NOT EXISTS `coffee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coffee`;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coffee_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `sugar` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `coffee_name`, `quantity`, `sugar`) VALUES
(1, 'Rina', 'Corretto', 1, 2),
(2, 'Rina', 'Corretto', 1, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- База данных: `coffee1`
--
CREATE DATABASE IF NOT EXISTS `coffee1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coffee1`;

-- --------------------------------------------------------

--
-- Структура таблицы `coffee_orders`
--

CREATE TABLE `coffee_orders` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coffee_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `sugar` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `coffee_orders`
--

INSERT INTO `coffee_orders` (`id`, `name`, `coffee_name`, `quantity`, `sugar`) VALUES
(1, 'Rina', 'Capuccino', 4, 8),
(2, 'Ivan', 'Mocha', 2, 2),
(3, 'Rinata', 'Latte', 1, 3),
(4, 'Король Артур', 'Corretto', 10, 20),
(5, 'Шрек', 'Americano', 10, 0),
(6, 'Папа Карло', 'Espresso', 1, 0),
(7, 'Фея Динь-динь', 'Macchiato', 1, 10),
(8, 'Ivan', 'Americano', 1, 0),
(9, 'Ivan', 'Capuccino', 1, 2),
(10, 'Кто-то Ктотович Ктотов', 'Latte', 5, 10),
(11, 'Somebody Somebodiev', 'Au lait', 2, 2),
(12, 'Иди лесом точка ком', 'Macchiato', 2, 21),
(13, 'Принцесса Фиона', 'Ristretto', 4, 0),
(14, 'Эй там', 'Corretto', 2, 0),
(15, 'Лилипут', 'Capuccino', 3, 3),
(16, 'Пунк', 'Espresso', 8, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `coffee_orders`
--
ALTER TABLE `coffee_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coffee_orders`
--
ALTER TABLE `coffee_orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- База данных: `hotel_database`
--
CREATE DATABASE IF NOT EXISTS `hotel_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hotel_database`;

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `date_and_time_of_booking` datetime NOT NULL,
  `room_number` int NOT NULL,
  `number_of_guests` int NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`date_and_time_of_booking`, `room_number`, `number_of_guests`, `check_in_date`, `check_out_date`) VALUES
('2022-05-18 22:14:02', 1, 2, '2022-05-19', '2022-05-21'),
('2022-05-18 22:15:02', 2, 1, '2022-05-01', '2022-05-05'),
('2022-05-18 22:15:11', 3, 4, '2022-05-23', '2022-05-26'),
('2022-05-18 23:15:11', 4, 1, '2022-05-04', '2022-05-07'),
('2022-05-18 22:20:23', 1, 2, '2022-05-29', '2022-05-31'),
('2022-05-18 22:21:00', 1, 2, '2022-05-24', '2022-05-25'),
('2022-05-18 17:43:00', 5, 4, '2022-05-22', '2022-05-28');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `room_number` int UNSIGNED NOT NULL,
  `size` int UNSIGNED NOT NULL,
  `price_per_day` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`room_number`, `size`, `price_per_day`) VALUES
(1, 20, 2000),
(2, 30, 3000),
(3, 40, 4000),
(4, 50, 5000),
(5, 35, 3500);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`date_and_time_of_booking`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_number`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_number` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- База данных: `integra_valeriy`
--
CREATE DATABASE IF NOT EXISTS `integra_valeriy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `integra_valeriy`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES
(1, 'asfsafdas', 'asdfasd', '123'),
(2, 'Yuno_Valeos', 'valera@mail.ru', 'qwerty12345'),
(3, 'Valerka', 'valerka@mail.ru', '123'),
(4, 'Valerka_new', 'valerka_new@mail.ru', '123'),
(5, 'Integra', 'valeriy@valeriy.uz', 'integra'),
(6, 'somebody', 'sb@some.body', 'Some'),
(7, 'valerka1', 'bla@bla.com', '111'),
(8, 'BeInAction', 'statsenko-vanya@mail.rru', 'qwerty'),
(9, 'King_Arthur', 'king@arthur.com', 'qwerty'),
(10, 'King_Arthur123', 'king@arthur.com123', 'qwerty'),
(11, 'King_Arthur12345', 'king@arthur.com12345', 'qwerty');

-- --------------------------------------------------------

--
-- Структура таблицы `user_photos`
--

CREATE TABLE `user_photos` (
  `id_of_user` int UNSIGNED NOT NULL,
  `path_for_photo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `user_photos`
--
ALTER TABLE `user_photos`
  ADD UNIQUE KEY `id_of_user` (`id_of_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- База данных: `practice1`
--
CREATE DATABASE IF NOT EXISTS `practice1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `practice1`;

-- --------------------------------------------------------

--
-- Структура таблицы `example_users`
--

CREATE TABLE `example_users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `example_users`
--

INSERT INTO `example_users` (`id`, `name`, `password`, `email`, `date`) VALUES
(1, 'Ivan Statsenko', '85064efb60a9601805dcea56ec5402f7', 'statsenko-vanya@mail.ru', '2022-05-16'),
(2, 'ыафываф', 'афвыафыва', 'фывафывафывафыв', '2022-05-04'),
(3, 'asdfasdfas', '', '', '2022-05-05');

-- --------------------------------------------------------

--
-- Структура таблицы `new_table`
--

CREATE TABLE `new_table` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `new_table`
--

INSERT INTO `new_table` (`id`, `name`, `bio`) VALUES
(1, 'John Cena', 'New Text for bio EVERYWHERE'),
(3, 'User #2', 'New Text for bio EVERYWHERE'),
(4, 'User #3', 'New Text for bio USER 3'),
(6, 'User #5', 'New Text for bio EVERYWHERE'),
(7, 'John Cena', 'New Text for bio EVERYWHERE'),
(9, 'User #2', 'New Text for bio EVERYWHERE'),
(10, 'User #3', 'New Text for bio USER 3'),
(12, 'User #5', 'New Text for bio EVERYWHERE'),
(13, 'John Cena', 'New Text for bio EVERYWHERE'),
(15, 'User #2', 'New Text for bio EVERYWHERE'),
(16, 'User #3', 'New Text for bio USER 3'),
(18, 'User #5', 'New Text for bio EVERYWHERE'),
(19, 'John Cena', 'New Text for bio EVERYWHERE'),
(21, 'User #2', 'New Text for bio EVERYWHERE'),
(22, 'User #3', 'New Text for bio USER 3'),
(24, 'User #5', 'New Text for bio EVERYWHERE'),
(25, 'John Cena', 'New Text for bio EVERYWHERE'),
(27, 'User #2', 'New Text for bio EVERYWHERE'),
(28, 'User #3', 'New Text for bio USER 3'),
(30, 'User #5', 'New Text for bio EVERYWHERE'),
(31, 'John Cena', 'New Text for bio EVERYWHERE'),
(33, 'User #2', 'New Text for bio EVERYWHERE'),
(34, 'User #3', 'New Text for bio USER 3'),
(36, 'User #5', 'New Text for bio EVERYWHERE');

-- --------------------------------------------------------

--
-- Структура таблицы `table_for_delete`
--

CREATE TABLE `table_for_delete` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `example_users`
--
ALTER TABLE `example_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `new_table`
--
ALTER TABLE `new_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_for_delete`
--
ALTER TABLE `table_for_delete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `example_users`
--
ALTER TABLE `example_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `new_table`
--
ALTER TABLE `new_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `table_for_delete`
--
ALTER TABLE `table_for_delete`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- База данных: `spbu_project`
--
CREATE DATABASE IF NOT EXISTS `spbu_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spbu_project`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `surname` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'asfasfasd', 'asdf', 'sadfjasfja@sjal;sfjda', 'afdasf'),
(2, 'Стаценко', 'qwerty', 'statsenko-vanya@mail.ru', 'Иван'),
(3, 'Greetings', '123', 'hello@hello.ru', 'Hello'),
(4, 'Shrek', 'Bolotov', 'somebody@once_told.me', 'Fiona'),
(5, 'Саид', 'Муминов', 'said@islombek.uz', 'Женя');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
