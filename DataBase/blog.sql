-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2018 г., 14:52
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_05_12_174035_create_table_questions', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `author_question` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `author_answer` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_created_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `topic`, `alias`, `question`, `author_question`, `author_email`, `question_created_at`, `answer`, `author_answer`, `answer_created_at`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Basics', 'basics', 'How do I change my password?', 'guest1', 'guest1@mail.ru', '2018-05-13 17:44:19', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh', 'admin', '2018-05-13 00:08:11', 2, NULL, '2018-05-20 15:50:26'),
(3, 'Basics', 'basics', 'How do I sign up?', 'guest1', 'guest1@mail.ru', '2018-05-13 17:45:41', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commode.', 'admin', '2018-05-13 03:00:00', 2, NULL, NULL),
(4, 'Mobile', 'mobile', 'How does syncing work?', 'guest2', 'guest2@mail.ru', '2018-05-13 17:46:37', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.', 'admin', '2018-05-13 05:00:16', 3, NULL, NULL),
(5, 'Mobile', 'mobile', 'How do I upload files from my phone or tablet?', 'guest2', 'guest2@mail.ru', '2018-05-13 17:47:15', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!', 'admin', '2018-05-13 17:00:24', 2, NULL, NULL),
(6, 'Account', 'account', 'How do I change my password?', 'guest3', 'guest3@mail.ru', '2018-05-13 17:48:35', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!', 'admin', '2018-05-13 03:00:00', 2, NULL, NULL),
(7, 'Account', 'account', 'How do I delete my account?', 'guest3', 'guest3@mail.ru', '2018-05-13 17:48:35', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo tempore soluta, minus magnam non blanditiis dolore, in nam voluptas nobis minima deserunt deleniti id animi amet, suscipit consequuntur corporis nihil laborum facere temporibus. Qui inventore, doloribus facilis, provident soluta voluptas excepturi perspiciatis fugiat odit vero! Optio assumenda animi at! Assumenda doloremque nemo est sequi eaque, ipsum id, labore rem nisi, amet similique vel autem dolore totam facilis deserunt. Mollitia non ut libero unde accusamus praesentium sint maiores, illo, nemo aliquid?', 'admin', '2018-05-13 03:23:20', 3, NULL, NULL),
(8, 'Payments', 'payments', 'Can I have an invoice for my subscription?', 'guest4', 'guest4@mail.ru', '2018-05-13 17:49:50', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.', 'admin', '2018-05-13 23:10:00', 2, NULL, NULL),
(9, 'Payments', 'payments', 'Why did my credit card or PayPal payment fail?', 'guest4', 'guest4@mail.ru', '2018-05-13 17:49:50', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur accusantium dolorem vel, ad, nostrum natus eos, nemo placeat quos nisi architecto rem dolorum amet consectetur molestiae reprehenderit cum harum commodi beatae necessitatibus. Mollitia a nostrum enim earum minima doloribus illum autem, provident vero et, aspernatur quae sunt illo dolorem. Corporis blanditiis, unde, neque, adipisci debitis quas ullam accusantium repudiandae eum nostrum quis! Velit esse harum qui, modi ratione debitis alias laboriosam minus eaque, quod, itaque labore illo totam aut quia fuga nemo. Perferendis ipsa laborum atque assumenda tempore aspernatur a eos harum non id commodi excepturi quaerat ullam, explicabo, incidunt ipsam, accusantium quo magni ut! Ratione, magnam. Delectus nesciunt impedit praesentium sed, aliquam architecto dolores quae, distinctio consectetur obcaecati esse, consequuntur vel sit quis blanditiis possimus dolorum. Eaque architecto doloremque aliquid quae cumque, vitae perferendis enim, iure fugiat, soluta aut!', 'admin', '2018-05-13 04:18:29', 2, NULL, NULL),
(10, 'Privacy', 'privacy', 'Can I specify my own private key?', 'guest5', 'guest5@mail.ru', '2018-05-13 17:50:52', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.', 'admin', '2018-05-13 09:00:00', 2, NULL, NULL),
(11, 'Privacy', 'privacy', 'My files are missing! How do I get them backsss?', 'guest5', 'guest5@mail.ru', '2018-05-13 17:50:52', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-13 11:00:00', 2, NULL, '2018-05-21 08:10:25'),
(12, 'Delivery', 'delivery', 'What should I do if my order hasn\'t been delivered yet?', 'guest6', 'guest6@mail.ru', '2018-05-13 17:51:58', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.', 'admin', '2018-05-13 13:00:00', 2, NULL, '2018-05-20 06:14:12'),
(13, 'Delivery', 'delivery', 'How can I find your international delivery information?', 'guest6', 'guest6@mail.ru', '2018-05-13 17:51:58', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-13 07:00:00', 2, NULL, '2018-05-19 17:10:37'),
(14, 'Delivery', 'delivery', 'Who takes care of shipping?', 'guest6', 'guest6@mail.ru', '2018-05-14 19:23:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.', 'admin', '2018-05-14 04:00:00', 2, NULL, '2018-05-20 15:53:35'),
(15, 'Delivery', 'delivery', 'How do returns or refunds work?', 'guest6', 'guest6@mail.ru', '2018-05-14 19:23:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-14 06:12:00', 2, NULL, '2018-05-16 10:50:12'),
(16, 'Delivery', 'delivery', 'How do I use shipping profiles?', 'guest6', 'guest6@mail.ru', '2018-05-14 19:26:51', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-14 06:09:00', 2, NULL, '2018-05-16 10:50:12'),
(17, 'Delivery', 'delivery', 'How does your UK Next Day Delivery service work?', 'guest6', 'guest6@mail.ru', '2018-05-14 19:26:51', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-14 12:13:00', 2, NULL, '2018-05-16 10:50:12'),
(18, 'Account', 'account', 'I forgot my password. How do I reset it?', 'guest3', 'guest3@mail.ru', '2018-05-14 19:29:14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at aspernatur iure facere ab a corporis mollitia molestiae quod omnis minima, est labore quidem nobis accusantium ad totam sunt doloremque laudantium impedit similique iste quasi cum! Libero fugit at praesentium vero. Maiores non consequuntur rerum, nemo a qui repellat quibusdam architecto voluptatem? Sequi, possimus, cupiditate autem soluta ipsa rerum officiis cum libero delectus explicabo facilis, odit ullam aperiam reprehenderit! Vero ad non harum veritatis tempore beatae possimus, ex odio quo.', 'admin', '2018-05-14 09:00:00', 2, NULL, NULL),
(19, 'Payments', 'payments', 'Why does my bank statement show multiple charges for one upgrade?', 'guest4', 'guest4@mail.ru', '2018-05-14 19:31:11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-14 07:00:00', 2, NULL, NULL),
(20, 'Delivery', 'delivery', 'When will my order ship?', 'guest6', 'guest6@mail.ru', '2018-05-14 19:33:12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.', 'admin', '2018-05-14 16:00:00', 2, NULL, '2018-05-16 10:50:12'),
(21, 'Payments', 'payments', 'How much does it cost for me?', 'guest7', 'guest7@mail.ru', '2018-05-15 13:07:48', 'wefwefwefwef', 'admin', '2018-05-20 16:47:59', 2, '2018-05-15 10:07:48', '2018-05-20 13:47:59'),
(23, 'Basics', 'basics', 'What is it?', 'guest8', 'guest8@mail.ru', '2018-05-15 13:20:59', NULL, NULL, NULL, 1, '2018-05-15 10:20:59', '2018-05-15 10:20:59'),
(24, 'New topic', 'new topic', 'aaaaa?', 'guest8', 'guest8@mail.ru', '2018-05-16 12:08:32', NULL, NULL, '2018-05-21 07:50:27', 1, '2018-05-16 09:08:32', '2018-05-21 04:50:27'),
(26, 'Account', 'account', 'Can I pay by Visa?', 'guest8', 'guest8@mail.ru', '2018-05-16 12:36:36', NULL, NULL, NULL, 1, '2018-05-16 09:36:36', '2018-05-16 09:36:36'),
(30, 'SomeTopic', 'sometopic', NULL, NULL, NULL, '2018-05-17 09:07:06', NULL, NULL, NULL, 0, '2018-05-17 06:07:06', '2018-05-17 06:07:06'),
(34, 'SomeTopic', 'sometopic', 'AAAAAAAAAAAAAвывыввыы?', 'guest8', 'guest8@mail.ru', '2018-05-20 11:04:34', 'I have no idea AND FDVUDDU', 'admin', '2018-05-20 11:05:16', 2, '2018-05-20 08:04:34', '2018-05-20 15:49:03'),
(35, 'New topic', 'new topic', 'BBBBBBBBBBBBBBBB?', 'guest8', 'guest8@mail.ru', '2018-05-20 11:04:51', 'I have no idea?', 'admin', '2018-05-20 11:05:30', 2, '2018-05-20 08:04:51', '2018-05-20 14:29:11'),
(36, 'SomeTopic', 'sometopic', 'sdsdfwef?', 'guest8', 'guest8@mail.ru', '2018-05-20 18:17:45', NULL, NULL, NULL, 1, '2018-05-20 15:17:45', '2018-05-20 15:17:45'),
(37, 'Delivery', 'delivery', 'qwdqwqwdqwd?', 'guest8', 'guest8@mail.ru', '2018-05-21 07:49:45', NULL, NULL, NULL, 1, '2018-05-21 04:49:45', '2018-05-21 04:49:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@mail.ru', '$2y$10$NDfueipfgihjlwBl3AwPC.FQSHQW4sjZeaVbU3qSCqMJlCUxsq50O', 'iTv7BmMhwS2773AdVTNEvEs1oeJnP2cCT9U1jARZx74W8BGdIQu2v9INBGt1', '2018-05-14 08:46:16', '2018-05-14 08:46:16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
