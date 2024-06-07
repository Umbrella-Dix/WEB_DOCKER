-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Июн 06 2024 г., 19:16
-- Версия сервера: 8.4.0
-- Версия PHP: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_one_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments2`
--

CREATE TABLE `comments2` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `comment_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `comment_activated` int NOT NULL DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `users_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments2`
--

INSERT INTO `comments2` (`id`, `username`, `comment_text`, `comment_activated`, `create_at`, `users_id`) VALUES
(1, 'oleg', 'sdda', 1, '2024-05-09 23:23:32', 2),
(2, 'oleg', 'dfdsfd', 1, '2024-05-09 23:49:08', 2),
(3, 'oleg', 'erwerwe', 1, '2024-05-09 23:49:20', 2),
(4, 'oleg', 'вавыавы', 1, '2024-05-09 23:52:23', 2),
(5, 'moder1', 'вавыавы', 0, '2024-05-09 23:52:34', 3),
(6, 'oleg', 'Рецензия, как и литературная критика в целом, появляется вместе с литературными журналами. Первым таким журналом в России стали «Ежемесячные сочинения, к пользе и увеселению служащие» (1755). Первым российским автором, обратившимся к рецензии, считается Н. М. Карамзин, предпочитавший жанр монографической рецензии. Первая печатная рецензия на русском языке на книгу по экономическим вопросам была помещена в первом российском журнале «Примечания» (1728—1742 гг.). В журнале «Пустомеля» (1770) (вышло всего два номера этого ежемесячного сатирического журнала Новикова), в разделе «Ведомости» увидели свет первые в истории русской журналистики профессиональные театральные рецензии — об игре выдающегося актёра И. Дмитриевского и о постановке трагедии Сумарокова «Синав и Трувор».[5]. Рецензия — жанр, довольно часто использующийся и в других странах. Довольно часты упоминания рецензий в мемуарах и воспоминаниях. Теперь, некоторые примеры, которые не несут смысловой нагрузки. Переводчик и мемуарист Ф. Ф. Фидлер, сам регулярно рецензировавший книги, в своих дневниковых записях конца XIX — начала XX веков, озаглавленных «Из мира литераторов» постоянно упоминает рецензии — свои и знакомых писателей: «Вейнберг, сам великолепный переводчик, прочитал несколько моих переводов из Кольцова, расхвалил и пообещал написать рецензию на книгу»; «Посетил Плещеева, желая вручить ему моего „Кольцова“. Он пожал обеими руками мою правую руку и подарил свой портрет со следующей надписью: „Фёдору Фёдоровичу Фидлеру на память от одного из тех авторов, которых он так прекрасно переводил…“ Обещал способствовать пропаганде „Кольцова“ и сказал, что, возможно, и сам напишет рецензию»; \"Бибиков сказал мне: «Вы разругали в „Herold“ Дедлова за его книгу „Мы“, — и совершенно напрасно! „Гости“, например, — восхитительный рассказ!»\".[6].\r\n\r\nВ. Г. Белинский: «Каждое произведение искусства непременно должно рассматриваться в отношении к эпохе, к исторической современности и в отношении художника к обществу; рассмотрение его жизни, характера также может служить часто уяснению его создания. С другой стороны, невозможно упускать из виду и собственно эстетических требований искусства. Скажем более: определение степени эстетического достоинства произведения должно быть первым делом критики».[3]', 1, '2024-05-09 23:55:34', 2),
(7, 'ollo', 'ваы', 1, '2024-05-10 00:04:43', 11),
(8, 'oleg', 'gfdg', 1, '2024-05-10 00:11:31', 2),
(9, 'oleg', 'dasdad', 1, '2024-05-10 13:23:14', 2),
(10, 'oleg', 'sdsadasd', 1, '2024-05-10 13:25:19', 2),
(11, 'oleg', 'dssadsa', 1, '2024-05-10 13:26:29', 2),
(12, 'moder1', 'gfdgdf', 0, '2024-05-10 13:30:45', 3),
(13, 'oleg', 'fgfd', 1, '2024-05-10 13:36:52', 2),
(14, 'oleg', 'fgfd', 1, '2024-05-10 13:37:34', 2),
(15, 'oleg', 'fgfd', 1, '2024-05-10 13:38:01', 2),
(16, 'moder1', 'fgfdgfgdfgd564564564', 0, '2024-05-10 13:38:17', 3),
(17, 'oleg', 'gfdgdfgdf', 1, '2024-05-10 13:44:38', 2),
(18, '3', 'gfgfgdf', 0, '2024-05-10 13:50:29', 3),
(19, 'moder1', 'gfgfgdf', 0, '2024-05-10 13:50:56', 3),
(20, 'moder1', 'gfgfgdf', 0, '2024-05-10 13:51:44', 3),
(21, 'moder1', 'fgdfgdfgdfg', 0, '2024-05-10 13:51:49', 3),
(22, 'admin', 'rgdfgdfg', 1, '2024-05-10 13:52:06', 1),
(23, 'peppa', 'FGFDGD', 0, '2024-05-10 13:54:15', 7),
(24, 'peppa', 'dffsdfsdf', 0, '2024-05-10 13:54:25', 7),
(25, 'adm', 'dggdfgdf', 0, '2024-05-10 14:01:35', NULL),
(26, 'oleg', 'папвап', 1, '2024-05-10 14:23:36', 2),
(27, 'moder1', 'Анализируя собственные ощущения, стоит отметить, что работа оставляет приятные впечатления после просмотра. Она помогает задуматься о межчеловеческих взаимоотношениях, о важности проявления чувств, о ценности собственной жизни. ', 0, '2024-05-10 14:24:13', 3),
(28, 'oleg', 'вааываыв', 1, '2024-05-10 14:24:48', 2),
(29, 'adm', 'Анализируя собственные ощущения, стоит отметить, что работа оставляет приятные впечатления после просмотра. Она помогает задуматься о межчеловеческих взаимоотношениях, о важности проявления чувств, о ценности собственной жизни. ', 0, '2024-05-10 14:25:42', NULL),
(30, 'adm', 'hello world', 0, '2024-05-10 14:26:02', NULL),
(31, 'admin', 'fgdfgdf', 1, '2024-05-10 14:26:41', 1),
(32, 'admin', 'привет мир', 1, '2024-05-10 15:06:32', 1),
(33, 'oleg', 'fdsfsdfsd', 1, '2024-05-10 15:11:58', 2),
(34, 'moder1', 'hello', 0, '2024-05-10 15:12:18', 3),
(35, 'oleg', 'аваываыва', 1, '2024-05-10 16:47:31', 2),
(36, 'andrysha', 'всем приветь', 0, '2024-05-10 16:54:38', 18),
(37, 'george', 'georgegeorgegeorgegeorgegeorgegeorge', 0, '2024-05-10 17:18:55', 19),
(38, 'george', 'Среди подростков австралийского городка набирает популярность необычное развлечение. Нужно зажечь свечу, пожать жутковатую керамическую руку, произнести «Поговори со мной» — и тогда можно увидеть призрака и даже ненадолго впустить его в себя. Несмотря на то что прежний владелец артефакта покончил с собой, ребята на вечеринках радостно балуются необычными способностями руки, пока одним из вызванных призраков не оказывается мама 17-летней Мии, умершая два года назад.', 0, '2024-05-10 17:23:40', 19),
(39, 'puppa', 'ПРИВЕТ МИР', 0, '2024-05-10 23:36:53', 4),
(40, 'topqwerty', 'fgdfgdfg', 1, '2024-05-11 13:08:47', 20),
(41, 'adm2top', 'heloolfhgfhfgh', 1, '2024-05-11 13:52:11', 22),
(42, 'moder1', 'dasdsa', 0, '2024-05-11 17:07:05', 3),
(43, 'oleg', 'safdsfsd', 1, '2024-05-11 17:21:23', 2),
(44, 'oleg', '18 01 HELLO', 1, '2024-05-11 18:02:04', 2),
(45, 'ollo', 'hello world', 0, '2024-05-11 18:13:57', 11),
(46, 'moder1', 'moder1', 1, '2024-05-11 18:42:47', 3),
(47, 'moder1', 'hello', 0, '2024-05-11 18:58:11', 3),
(48, 'mary', '10 лет назад, после того как распахнулись Врата, связавшие наш мир с миром монстров, некоторые люди приобрели способности, позволяющие им охотиться на монстров внутри Врат. Их стали именовать Охотниками. Однако не все Охотники были сильны. Моё имя — Сун Джин-У, я охотник ранга Е. Мне приходится рисковать своей жизнью в самых низкоуровневых подземельях. Не имея необходимых навыков, я едва мог зарабатывать деньги, сражаясь со слабейшими монстрами... По крайней мере это длилось до того,', 1, '2024-05-11 21:00:31', 24),
(52, 'oleg', 'hello', 0, '2024-06-06 16:59:17', 2),
(53, 'moder1', 'goodbuy', 0, '2024-06-06 17:09:42', 3),
(54, 'ruppa', 'ruppa', 0, '2024-06-06 17:35:38', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

CREATE TABLE `emails` (
  `id` int NOT NULL,
  `email_from` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `email_to` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `users_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `email_from`, `email_text`, `email_to`, `create_at`, `users_id`) VALUES
(1, 'oleg@mail.ru', 'Привет. Как дела?', 'admin@mail.ru', '2024-05-11 00:45:11', 2),
(2, 'oleg@mail.ru', 'dfsdfsdfsdfsdfsd', 'admin@mail.ru', '2024-05-11 11:55:52', 2),
(3, 'admin@mail.ru', 'hello. how are you?', 'oleg@mail.ru', '2024-05-11 11:57:56', 1),
(4, 'oleg@mail.ru', 'hello', 'admin@mail.ru', '2024-05-11 11:58:34', 2),
(5, 'top@mail.ru', 'hello bro', 'oleg@mail.ru', '2024-05-11 12:48:18', 7),
(6, 'ollo@mail.ru', 'very good', 'oleg@mail.ru', '2024-05-11 12:51:25', 11),
(7, 'oleg@mail.ru', 'hello', 'qwerty@mail.ru', '2024-05-11 13:10:43', 2),
(8, 'oleg@mail.ru', 'hello', 'admin@mail.ru', '2024-05-11 13:54:03', 2),
(9, 'adm2@mail.ru', 'hello world', 'oleg@mail.ru', '2024-05-11 13:56:36', 22),
(10, 'oleg@mail.ru', 'аываыва', 'admin@mail.ru', '2024-05-11 17:30:01', 2),
(11, 'oleg@mail.ru', 'sadadsadsa', 'oleg@mail.ru', '2024-05-11 17:36:31', 2),
(12, 'oleg@mail.ru', 'gdfgdfgdf', 'andry@mail.ru', '2024-05-11 17:55:38', 2),
(13, 'ollo@mail.ru', 'qwerty@mail.ru fgdfgdfgdfgdfgdfgdfgdf', 'qwerty@mail.ru', '2024-05-11 18:14:49', 11),
(14, 'moder1@mail.ru', 'hello', 'admin@mail.ru', '2024-05-11 18:58:24', 3),
(15, 'mary@mail.ru', 'История создания «Корсаров 2» ака «Пираты Карибского моря»', 'oleg@mail.ru', '2024-05-11 21:06:20', 24),
(16, 'oleg@mail.ru', 'hello admin@mail.ru', 'admin@mail.ru', '2024-06-06 16:59:38', 2),
(17, 'ruppa@mail.ru', 'ruppa@mail.ru', 'ruppa@mail.ru', '2024-06-06 17:37:22', 26),
(18, 'ruppa@mail.ru', 'ruppa@mail.ru', 'qwerty@mail.ru', '2024-06-06 17:37:36', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `users2`
--

CREATE TABLE `users2` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activated` int NOT NULL DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users2`
--

INSERT INTO `users2` (`id`, `username`, `pwd`, `email`, `user_type`, `activated`, `create_at`) VALUES
(1, 'admin', '$2y$10$zgrHbfQRYc9rjhOXQDDZAOMaOQ18scqLf8J9p40ocOLWY2RPxlpmK', 'admin@mail.ru', 'admin', 1, '2024-05-07 14:49:46'),
(2, 'oleg', '$2y$10$b58ghoZgiQDPgVW1rJFqIO.37geY5LF8EUo27Q75OmIUQT2SKaquG', 'oleg@mail.ru', 'user', 1, '2024-05-07 14:52:56'),
(3, 'moder1', '$2y$10$8ePQ/p6dbhXQv8eiymn3v.g/.AxvbymKtF9fMDuJq6nyt.5eDKdXC', 'moder1@mail.ru', 'moderator', 1, '2024-05-07 14:53:44'),
(4, 'puppa', '$2y$10$uWOxng7gSxw0kInRJ151o.247bb1DPKYFwgv5KVz4v2XOjOfHROzy', 'puppa@mail.ru', 'admin', 1, '2024-05-07 18:12:26'),
(7, 'peppa', '$2y$10$1v4CSQyY/J.aFUfi6xdM9e7ZFNF2KxBY4iyq4kjADVUCcxBaeuiXO', 'top@mail.ru', 'moderator', 1, '2024-05-07 19:58:45'),
(11, 'ollo', '$2y$10$a7SuCVmhT6UHJE/FvFnj4uswzwr.GtRcIh7xswjd9JEN7UlGJpHYa', 'ollo@mail.ru', 'user', 1, '2024-05-08 12:40:17'),
(14, 'luppa', '$2y$10$X6w8zqFDaTOFrTPc/BNHHeZ0Cl1hEr8wLenBPn4RntlSNUsGZrXaq', 'luppa@mail.ru', 'moderator', 1, '2024-05-10 15:25:57'),
(15, 'zapuppa', '$2y$10$NdkyNPVl4ObLBk/qqa.nv.oUxpnOD39PE7Ck7A/r6/a6Eo3L9kTQ6', 'zapuppa@mail.ru', 'moderator', 1, '2024-05-10 15:29:34'),
(18, 'andrysha', '$2y$10$AoQQzl9h6c8Y7cA2YfZPoOyPq8x1E1/o0Tmmef/ghyBTXgaXqt65a', 'andry@mail.ru', 'moderator', 0, '2024-05-10 16:48:31'),
(19, 'george', '$2y$10$Ei75MZtlviDy8f812gzw3eMBwW.7.n/qIExzZ4GQtLucscSONAKuK', 'sdadsada@mail.ru', 'user', 1, '2024-05-10 17:17:49'),
(20, 'topqwerty', '$2y$10$6EuVTl9z7JZSw4Qa1/frROn1w7QiKTFdSE3xgJdSnA.BXcUIaraTa', 'qwerty@mail.ru', 'user', 0, '2024-05-11 13:07:37'),
(21, 'ZZXCVVCX', '$2y$10$qcxCw.Q8T775F8JllBuKmecijTbeIC1tH3E8S5SVkbQR9PWSF4VxC', 'to23p@mail.ru', 'user', 1, '2024-05-11 13:29:44'),
(22, 'adm2top', '$2y$10$O7ohfb1HJv6BBLI82dgrF.p/mgvVBtceWz5hcfGtsrx1IOGcY5xyS', 'adm2@mail.ru', 'user', 1, '2024-05-11 13:50:44'),
(23, 'toma', '$2y$10$Q79s/Ra3V1agmhAMypJzZuoNG5DDDVT6JqtSMLhszP4h1RLrDwNzW', 'toma@mail.ru', 'moderator', 1, '2024-05-11 19:06:14'),
(24, 'mary', '$2y$10$c874ag79ZB4TSk.4ck2bGeVqLtHo7O9kzJSAdwY9gdtzsxjYOSSgO', 'mary@mail.ru', 'moderator', 1, '2024-05-11 20:52:08'),
(25, 'tuppa', '$2y$10$U31ASAe/lOYb6eHuZHe8BOY2w9OUQPgdgW0Amb13vm.UfV508eoGS', 'tuppa@mail.ru', 'user', 0, '2024-06-06 17:18:14'),
(26, 'ruppa', '$2y$10$QPkskVG7kLxChHiJ1DfgXO67shGnk2PoruOe7N2KcwFAi9DL8AaSy', 'ruppa@mail.ru', 'user', 1, '2024-06-06 17:21:16'),
(27, 'qwerty', '$2y$10$1a8mAA4pMM6eRj6dwH.Xmupr0BWmI.dKzrfBaLeePQ4v3fxP8YlWS', 'qwerty1@mail.ru', 'user', 0, '2024-06-06 17:25:36'),
(28, 'moda', '$2y$10$6WvC7kSaVDdcCr5lNpYvruYrFxdkZD7yBSGiAMS8DURw/nb139alu', 'moda@mail.ru', 'user', 1, '2024-06-06 19:08:45');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments2`
--
ALTER TABLE `comments2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments2`
--
ALTER TABLE `comments2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments2`
--
ALTER TABLE `comments2`
  ADD CONSTRAINT `comments2_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users2` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users2` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
