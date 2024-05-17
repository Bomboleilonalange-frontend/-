-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2024 г., 13:17
-- Версия сервера: 8.2.0
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `YongTalents`
--

-- --------------------------------------------------------

--
-- Структура таблицы `CallUs`
--

CREATE TABLE `CallUs` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `CallUs`
--

INSERT INTO `CallUs` (`id`, `name`, `phone`) VALUES
(3, 'Дмитрий Ковалев', '222221'),
(4, 'Дмитрий Ковалев', ''),
(5, 'Дмитрий Ковалев', ''),
(6, 'Дмитрий Ковалев', '7671651255'),
(7, 'Дмитрий Ковалев', '222221'),
(8, 'Алексей ', '38462387424'),
(9, 'Дмитрий Ковалев', '222221'),
(10, 'Дмитрий Ковалев', '222222'),
(11, 'Дмитрий Ковалев', ''),
(12, 'Дмитрий Ковалев', '222221'),
(13, 'Дмитрий Ковалев', '222222'),
(14, 'Дмитрий', ''),
(15, 'Дмитрий', '222222'),
(16, '', ''),
(17, '', ''),
(18, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `Cards`
--

CREATE TABLE `Cards` (
  `id` int NOT NULL,
  `imgSrc` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `CanvasSize` varchar(255) NOT NULL,
  `Technique` text NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `Persons` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Cards`
--

INSERT INTO `Cards` (`id`, `imgSrc`, `title`, `price`, `CanvasSize`, `Technique`, `Duration`, `Persons`) VALUES
(1, 'img\\пионы.jpg', 'Пионы', '2500.00', '25x35', 'Акрил, Холст', '2 час', '10'),
(2, 'img\\подсолнухи.jpg', 'Подсолнухи', '2500.00', '25x35', 'Акрил, Холст', '2,5 час', '10'),
(4, 'img\\чай с облепихой.jpg', 'Чай с облепихой', '1500.00', '20x30', 'Акварель', '1,5 час', '10'),
(5, 'img\\летние цветы.jpg', 'Летние цветы', '2000.00', '30x40', 'Акрил, Холст', '2,5 час', '12'),
(6, 'img\\мандарины.jpg', 'Мандарины', '2500.00', '30x30', 'Акрил, Холст', '2,5 час', '10'),
(16, 'img\\снегирь масло.jpg', 'Снегирь', '2500.00', '20x30', 'Масло, Холст', '1,5 час', '10');

-- --------------------------------------------------------

--
-- Структура таблицы `CM`
--

CREATE TABLE `CM` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `choice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment` text NOT NULL,
  `UserId` int DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Заявка требует обработки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `CM`
--

INSERT INTO `CM` (`id`, `name`, `phone`, `choice`, `comment`, `UserId`, `status`) VALUES
(15, 'Дмитрий Ковалев', '38462387424', 'Сова', 'работает\r\n\r\n', NULL, 'Заявка требует обработки'),
(21, 'Дмитрий Ковалев', '222222', 'Розы', 'Перезвоните как можно скорее ', 21, 'Заявка требует обработки'),
(28, 'Дмитрий Ковалев', '222221', 'Подсолнухи', 'Это мастер класс через обычного пользователя', 22, 'Заявка требует обработки'),
(29, 'Дмитрий Ковалев', '222221', 'Художественное Творчество', 'Это курс через user', 22, 'Заявка требует обработки'),
(30, 'Дмитрий Ковалев', '222221', 'Художественное Творчество', 'dthdth', 22, 'Заявка требует обработки'),
(31, 'Дмитрий Ковалев', '222221', 'Художественное Творчество', 'cgh', 22, 'Заявка требует обработки'),
(33, 'Дмитрий Ковалев', '222221', 'Художественное Творчество', 'ыфоацкоа', 22, 'Заявка требует обработки'),
(39, '', '', 'Художественное Творчество', '', NULL, 'Заявка требует обработки'),
(40, '', '', 'Маслянистая живопись', '', NULL, 'Заявка требует обработки'),
(41, '', '', 'Подсолнухи', '', NULL, 'Заявка требует обработки'),
(42, '', '', 'Художественное Творчество', '', NULL, 'Заявка требует обработки'),
(43, '', '', 'Художественное Творчество', '', NULL, 'Заявка требует обработки'),
(44, 'Дмитрий Ковалев', '222221', 'Подсолнухи', '', NULL, 'Заявка требует обработки'),
(45, 'Дмитрий', '222222', 'Групповые занятия для дошкольников', 'jsfhkwjrf', 28, 'Заявка требует обработки');

-- --------------------------------------------------------

--
-- Структура таблицы `Photos`
--

CREATE TABLE `Photos` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Photos`
--

INSERT INTO `Photos` (`id`, `category`, `url`) VALUES
(13, 'course_photos', 'img/2.jpg'),
(14, 'course_photos', 'img/3.jpg'),
(16, 'course_photos', 'img/5.jpg'),
(17, 'course_photos', 'img/6.jpg'),
(18, 'course_photos', 'img\\7.jpg'),
(19, 'course_photos', 'img\\8.jpg'),
(20, 'course_photos', 'img\\9.jpg'),
(22, 'course_photos', 'img\\11.jpg'),
(23, 'course_photos', 'img\\10.jpg'),
(24, 'course_photos', 'img\\12.jpg'),
(25, 'course_photos', 'img\\13.jpg'),
(26, 'course_photos', 'img\\14.jpg'),
(27, 'student_works', 'img\\Лес.jpg'),
(28, 'student_works', 'img\\Кот.jpg'),
(29, 'student_works', 'img\\Кот_на_окне.jpg'),
(30, 'student_works', 'img\\Зонтики.jpg'),
(31, 'student_works', 'img\\Женщина.jpg'),
(32, 'student_works', 'img\\Пингвин.jpg'),
(33, 'student_works', 'img\\Домик.jpg'),
(34, 'student_works', 'img\\Девочка.jpg'),
(35, 'Howtoget', 'img\\Howtoget1.jpg'),
(36, 'Howtoget', 'img\\Howtoget2.jpg'),
(37, 'Howtoget', 'img\\Howtoget3.jpg'),
(38, 'Howtoget', 'img\\Howtoget4.jpg'),
(39, 'Howtoget', 'img\\Howtoget5.jpg'),
(40, 'Howtoget', 'img\\Howtoget6.jpg'),
(41, 'Howtoget', 'img\\Howtoget7.jpg'),
(42, 'teacher_painting1', 'img\\Масленица.jpg'),
(43, 'teacher_painting1', 'img\\Венеция.jpg'),
(44, 'teacher_painting2', 'img\\Шишкин_Лес.jpg'),
(45, 'teacher_painting2', 'img\\Петербург.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `QuickRecording`
--

CREATE TABLE `QuickRecording` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` int NOT NULL,
  `choice` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserId` int DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Заявка требует обработки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `QuickRecording`
--

INSERT INTO `QuickRecording` (`id`, `name`, `phone`, `choice`, `comment`, `UserId`, `status`) VALUES
(13, 'Дмитрий Ковалев', 222222, 'вариант2', '                  Заполненная форма', NULL, 'Заявка требует обработки'),
(25, 'Дмитрий Ковалев', 222221, 'вариант1', 'Что то не так', 21, 'Заявка требует обработки'),
(29, 'Дмитрий Ковалев', 11111111, 'вариант1', 'Это быстрая запись у обычного user', 22, 'Заявка требует обработки'),
(30, 'Дмитрий Ковалев', 11111111, 'вариант2', 'Это запись через admin', 21, 'Заявка требует обработки'),
(32, 'Дмитрий Ковалев', 222221, 'вариант2', 'cfhdth', 22, 'Заявка требует обработки');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `Id` int NOT NULL,
  `UserId` int NOT NULL,
  `Text` text NOT NULL,
  `UserStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`Id`, `UserId`, `Text`, `UserStatus`) VALUES
(20, 21, 'rtbbvrb', NULL),
(21, 27, 'Привет', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Login`, `Password`, `FIO`, `Phone`, `Email`, `Avatar`, `status`) VALUES
(21, 'ejrn', '$2y$10$uQ1q5loOFu1eGIFCUYsTo.zKLRuxtg0EmYzawJbSFLg8zUK15XGM6', 'Hive Give Giev', '+7(967)-165-12-55', 'dimask13082004@gmail.com', 'img\\Defoult.png', 'admin'),
(22, 'ejrn2', '$2y$10$gw0zI/VaMfhTdIkO/PXes.8y1yV3P5gaIhAaRCpt744X.2TGCwK82', 'Ковалев Дмитрий Сергеевич', '+7(967)-165-12-44', 'dimask13082005@gmail.com', 'img\\Defoult.png', 'user'),
(23, 'ejrn3', '$2y$10$oLutdwNH5Ck3KnWgiL2vs.c5WIdXHAbr1Dz9reL7I1wcNskOdjhUy', 'Ковалев Дмитрий Дмитриевич', '+7(967)-165-12-33', 'dimask13082009@gmail.com', 'img\\Defoult.png', 'user'),
(27, 'ejrn4', '$2y$10$TKVmi9oyvNQj5/zD.vjQwuzDH0utK8yihYWRNndyDCo7uM5l/NHPa', 'Ковалев Дмитрий Дмитриевич', '+7(967)-165-12-33', 'dimask13082010@gmail.com', 'img/Defoult.png', 'user'),
(28, 'user', '$2y$10$Ptoztcx45rXeSb6d3BFfGu.BLkQ4kZ96Fq8esh5H74vLcTCHDUVXu', 'юзер', '+7(967)-165-12-55', 'user@mail.ru', 'img/Defoult.png', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `CallUs`
--
ALTER TABLE `CallUs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Cards`
--
ALTER TABLE `Cards`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `CM`
--
ALTER TABLE `CM`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserId` (`UserId`);

--
-- Индексы таблицы `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `QuickRecording`
--
ALTER TABLE `QuickRecording`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserId` (`UserId`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `CallUs`
--
ALTER TABLE `CallUs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `Cards`
--
ALTER TABLE `Cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `CM`
--
ALTER TABLE `CM`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `Photos`
--
ALTER TABLE `Photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `QuickRecording`
--
ALTER TABLE `QuickRecording`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `CM`
--
ALTER TABLE `CM`
  ADD CONSTRAINT `cm_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `QuickRecording`
--
ALTER TABLE `QuickRecording`
  ADD CONSTRAINT `quickrecording_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
