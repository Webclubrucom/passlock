-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 22 2022 г., 02:34
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1732129_passlok`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `passwords`
--

CREATE TABLE `passwords` (
  `id` int(255) NOT NULL,
  `name_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `userid` int(255) DEFAULT '1',
  `last_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `routings`
--

CREATE TABLE `routings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `routings`
--

INSERT INTO `routings` (`id`, `title`, `url`, `file`) VALUES
(1, 'Вход', '/login', 'auth-login'),
(2, 'Панель управления', '/admin', 'index'),
(3, 'Восстановление пароля', '/recoverpw', 'auth-recoverpw'),
(4, 'Регистрация', '/register', 'auth-register'),
(5, 'Пароли', '/list-passwords', 'list-passwords'),
(6, 'Добавить пароль', '/add-passwords', 'add-passwords'),
(7, 'Категории', '/categories-passwords', 'categories-passwords'),
(8, '', '/logout', ''),
(10, 'Пользователи', '/users', 'users'),
(11, 'Подтверждение Email', '/auth-email-verification', 'auth-email-verification'),
(12, 'Ваш Email подтвержден', '/auth-confirm-mail', 'auth-confirm-mail'),
(13, 'Профиль', '/profile', 'profile'),
(14, 'Настройки', '/settings', 'settings'),
(15, 'Менеджер паролей', '/', 'front'),
(16, 'Новый пароль', '/auth-reset-password', 'auth-reset-password'),
(17, 'Пользовательское соглашение', '/rules', 'rules'),
(18, 'Политика конфиденциальности', '/privacy_policy', 'privacy_policy'),
(19, 'Поддержка', '/support', 'support');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(765) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `key_field`, `value`) VALUES
(1, 'title', 'Mikhail Abr'),
(2, 'description', 'Надежное хранение паролей и управление ими. Корпоративный доступ к паролям. Простой и удобный кросс-платформенный доступ к вашим паролям из любого браузера.'),
(3, 'check_landing', '2'),
(4, 'check_register', '2'),
(5, 'logo_lite', 'logo-light.png'),
(6, 'logo_dark', 'logofront.png'),
(7, 'favicon', 'favicon.png'),
(8, 'btn_login', 'ВХОД'),
(9, 'menu_1', 'ВОЗМОЖНОСТИ'),
(10, 'menu_2', 'ПОЧЕМУ МЫ?'),
(11, 'menu_3', 'ВОПРОС-ОТВЕТ'),
(12, 'menu_4', 'КОНТАКТЫ'),
(13, 'btn_start', 'НАЧАТЬ'),
(14, 'title_main_1', 'Пришло время хранить пароли'),
(15, 'title_main_2', 'НАДЕЖНО'),
(16, 'sub_title', 'Мы никогда не передадим ваши пароли третьим лицам. Все пароли шифруются методом AES-128-ECB.'),
(17, 'title_form_1', 'Регистрируйтесь сегодня и храните'),
(18, 'title_form_2', 'БЕСПЛАТНО'),
(19, 'title_form_3', 'пароли'),
(20, 'title_cust_1', 'Нам доверяют'),
(21, 'title_cust_2', '2500+'),
(22, 'title_cust_3', 'пользователей'),
(23, 'sub_title_cust', 'PASSLOCK - надежный помощник в управлении паролями от ваших аккаунтов, сайтов, сервисов и т.д. Все пароли надежно шифруются.'),
(24, 'cust_url_1', 'google.png'),
(25, 'cust_url_2', 'yandex.png'),
(26, 'cust_url_3', 'regru.png'),
(27, 'cust_url_4', 'vkontakte.png'),
(28, 'scope_title_1', 'ПОТРЯСАЮЩИЕ'),
(29, 'scope_title_2', 'ВОЗМОЖНОСТИ'),
(30, 'sub_title_scope', 'Ознакомьтесь с самыми удобными функциями'),
(31, 'title_scope_1', 'Категории'),
(32, 'title_scope_2', 'Доступ в любом месте'),
(33, 'title_scope_3', 'Просмотр пароля'),
(34, 'title_scope_4', 'Быстрый поиск'),
(35, 'desc_scope_1', 'Для удобства храните пароли в разных категориях. Создавайте разные категории для аккаунтов соц сетей, почты, сервисов и т.д.'),
(36, 'desc_scope_2', 'Менеджер паролей полностью адаптивен, вы можете им пользоваться в любом месте с любого устройства.'),
(37, 'desc_scope_3', 'Функция просмотра пароля позволяет просматривать их. Просто кликните по иконке и пароль будет доступен для просмотра.'),
(38, 'desc_scope_4', 'Поиск пароля происходит в реальном времени без перезагрузки страницы, что позволяет быстро искать нужный пароль.'),
(39, 'advan_title', 'ПОЧЕМУ ВЫБРАЛИ ИМЕННО НАС'),
(40, 'sub_title_advan', 'PASSLOCK – простой способ сохранить ваш сложный пароль'),
(41, 'desc_advan', 'Если вы ищете простой, бесплатный и конфиденциальный способ сохранить надежный, но сложно запоминающийся пароль, вы попали по адресу. Менеджер паролей был создан для того, чтобы упростить задачу сохранения сложных паролей и последующего доступа к ним через интернет.'),
(42, 'title_advan_1', 'ВСЕ ПАРОЛИ В ОДНОМ МЕСТЕ'),
(43, 'desc_advan_1', 'Храните все ваши пароли в одном месте и управляйте ими с любого устройства.'),
(44, 'title_advan_2', 'БЕЗОПАСНОЕ ХРАНЕНИЕ ПАРОЛЕЙ'),
(45, 'desc_advan_2', 'Все пароли хранятся на сервере в зашифрованном виде методом AES-128-ECB.'),
(46, 'title_advan_3', 'БЫСТРОЕ ДОБАВЛЕНИЕ ПАРОЛЕЙ'),
(47, 'desc_advan_3', 'Добавьте пароль быстрее, чем за 1 минуту с помощью удобной формы добавления паролей. URL, логин и пароль можно скопировать в буфер обмена одним кликом мыши.'),
(48, 'img_advan', '700x800.png'),
(49, 'question_1', 'Придется ли мне что-то платить?'),
(50, 'question_2', 'Сколько я могу хранить паролей?'),
(51, 'question_3', 'Как мне начать пользоваться?'),
(52, 'question_4', ''),
(53, 'answer_1', 'Платить ничего не придется, сервис абсолютно бесплатный. Наша цель зарабатывать на рекламе.\r\nЕсли вы увидите в личном кабинете рекламу, то не смущайтесь, это и есть оплата за пользование сервисом.'),
(54, 'answer_2', 'В количестве хранимых паролей не ограничения. Вы можете создавать их в любом количестве. Столько, сколько вам нужно!'),
(55, 'answer_3', 'Регистрируетесь, подтверждаете почту в письме, создаете категории паролей и сами пароли... Все очень просто!'),
(56, 'answer_4', ''),
(57, 'title_video', 'PASSLOCK INTRO'),
(58, 'url_video', 'https://www.youtube.com/watch?v=Y2PA4Oucu9c'),
(59, 'img_video', '800x600.png'),
(60, 'feedback_title_1', 'ОБРАТНАЯ'),
(61, 'feedback_title_2', 'СВЯЗЬ'),
(62, 'sub_title_feedback', 'У вас есть какие-нибудь вопросы?'),
(63, 'phone', 'ТЕЛЕФОН'),
(64, 'phone_number', '+7-920-732-4499'),
(65, 'email', 'EMAIL'),
(66, 'email_value', 'info@passlock.com'),
(67, 'social_network', 'МЫ В СОЦ СЕТЯХ'),
(68, 'vkontakte', '#'),
(69, 'odnoklassniki', '#'),
(70, 'youtube', '#'),
(73, 'sub_title_footer', 'Менеджер паролей был создан для того, чтобы упростить задачу сохранения сложных паролей и последующего доступа к ним через интернет.'),
(74, 'title_widget_1', 'КОНТАКТНАЯ ИНФОРМАЦИЯ'),
(75, 'title_sub_widget', 'НАШ САЙТ:'),
(76, 'desc_sub_widget', 'www.webcreature.site'),
(77, 'title_widget_2', 'ПРИСОЕДИНЯЙТЕСЬ К НАМ'),
(78, 'rules', '2'),
(79, 'politics', '2'),
(80, 'support', '2'),
(81, 'coocky', '2'),
(82, 'name_form', 'Давайте обсудим вашу идею'),
(83, 'reg_user_email', 'Здравствуйте, [USERNAME].[BR]\r\nВы зарегистрировались  на сайте \"[WEBSITE]\".[DBR]\r\nВаш логин - [USERNAME][BR]\r\nВаш пароль - [USERPASSWORD][DBR]\r\nДля продолжения регистрации на сайте \"[WEBSITE]\" необходимо подтвердить Email.[BR]\r\nДля этого перейдите на страницу подтверждения, нажав на кнопку[DBR]\r\n[EMAIL_CONFIRMATION][DBR]\r\nС уважением, администрация сайта.'),
(84, 'reg_user_email_admin', 'Здравствуйте, [USERNAME].[BR]\r\nАдминистратор сайта \"[WEBSITE]\" зарегистрировал вас.[DBR]\r\nДля продолжения регистрации необходимо подтвердить Email.[DBR]\r\nДля этого перейдите на страницу подтверждения, нажав на кнопку[DBR]\r\n[EMAIL_CONFIRMATION][DBR]\r\nС уважением, администрация сайта.'),
(85, 'edit_user_email_admin', 'Здравствуйте, [USERNAME].[BR]\r\nАдминистратор сайта \"[WEBSITE]\" изменил ваш профиль.[DBR]\r\nЕсли у вас возникли вопросы по его изменению, то можете его задать администратору сайта по электронной почте [EMAIL_ADMIN][DBR]\r\nС уважением, администрация сайта.'),
(86, 'mode', 'light'),
(87, 'reset_email', 'Здравствуйте, [USERNAME].[BR]\r\nНа сайте \"[WEBSITE]\" был запрошен сброс  пароля от вашего аккаунта.[DBR]\r\nДля продолжения сброса пароля необходимо сбросить текущий пароль, нажав на кнопку ниже, и на открывшейся странице ввести новый пароль.[DBR]\r\n[PASSWORD_RESET][DBR]\r\nЕсли это были не вы, просто проигнорируйте данное письмо.[DBR]\r\nС уважением, администрация сайта.'),
(88, 'reviews_1', '\"Хранит пароли в одном аккаунте и привязан к физ лицу, а не к аппарату”'),
(89, 'reviews_2', '“Единый пароль для доступа к базе, доступ к хранилищу паролей с любых устройств”'),
(90, 'name_reviews_1', 'Андрей Болконский'),
(91, 'name_reviews_2', 'Лариса Маркова'),
(92, 'specialty_1', 'Web разработчик'),
(93, 'specialty_2', 'Web дизайнер'),
(94, 'image_reviews_1', '62d0e51eb1340.jpg'),
(95, 'image_reviews_2', '62d0e51eb260f.jpg'),
(96, 'theme_reg_user_email', 'Регистрация на сайте'),
(97, 'theme_reg_user_email_admin', 'Регистрация на сайте'),
(98, 'theme_edit_user_email_admin', 'Изменение вашего профиля'),
(99, 'theme_reset_email', 'Сброс пароля'),
(100, 'theme_landing_email', 'Сообщение с сайта'),
(101, 'landing_email', 'Здравствуйте, с вами желает связаться пользователь  [USERNAME], он оставил вам сообщение: [DBR]\r\n\"[MESSAGE]\"[DBR]\r\nВы можете с ним связаться по электронной почте [USEREMAIL] или по телефону [PHONE].'),
(102, 'title_banner_1', 'Разработка'),
(103, 'title_banner_2', 'WORDPRESS'),
(104, 'title_banner_3', 'ПОДДЕРЖКА'),
(105, 'desc_banner_1', 'Сайты, сервисы, поддержка. HTML, CSS, JS, PHP.'),
(106, 'desc_banner_2', 'Разработка сайтов, плагинов, тем на Wordpress'),
(107, 'desc_banner_3', 'Поддержим ваш сайт в рабочем состоянии, доработаем его, оптимизируем.'),
(108, 'text_button_banner_1', 'Перейти'),
(109, 'text_button_banner_2', 'Перейти'),
(110, 'text_button_banner_3', 'Перейти'),
(111, 'url_button_banner_1', 'https://vk.com/webcreature'),
(112, 'url_button_banner_2', 'https://vk.com/webcreature'),
(113, 'url_button_banner_3', 'https://vk.com/webcreature'),
(114, 'image_banner_1', '62d455638e5eb.jpg'),
(115, 'image_banner_2', '62d46b3f43cb2.jpg'),
(116, 'image_banner_3', '62d46b3f457ce.jpg'),
(117, 'block_banners', ''),
(118, 'post_vk', ''),
(119, 'id_page_vk', '-213632390'),
(120, 'token_vk', 'e225bc5ee225bc5ee225bc5e33e258ce5aee225e225bc5e80f1e55670a61c926b5ebd14'),
(121, 'text_note', 'Главной задачей заметки, точно также, как и других текстов, является предоставление информации о каком-то значимом событии. Кроме этого, заметка может содержать предположения, гипотезы, прогнозы, рекомендации, нормативную и оценочную информацию. \r\n\r\nЕсли заметку необходимо осветить более подробно, тогда автор может указать источник информации, добавить цитаты и привести статистические данные. '),
(122, 'type_email', 'false'),
(123, 'mailhost', ''),
(124, 'mailport', ''),
(125, 'mailusername', ''),
(126, 'mailpassword', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `status`, `color`, `userid`) VALUES
(55, 'Ввести секретный ключ', 1, 'light', 1),
(63, 'Создать категории паролей', 1, 'light', 1),
(67, 'Создать пароли', 1, 'light', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `useremail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` int(11) NOT NULL DEFAULT '1',
  `office_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `secretkey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_note` varchar(645) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Главной задачей заметки, точно также, как и других текстов, является предоставление информации о каком-то значимом событии. Кроме этого, заметка может содержать предположения, гипотезы, прогнозы, рекомендации, нормативную и оценочную информацию.   Если заметку необходимо осветить более подробно, тогда автор может указать источник информации, добавить цитаты и привести статистические данные. ',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `useremail`, `username`, `password`, `token`, `role`, `status`, `office_user`, `photo_user`, `mode`, `secretkey`, `text_note`, `created_at`) VALUES
(1, 'webclub.ru.com@yandex.ru', 'WebClub', '$2y$10$StsoZrOjgZr34WNCmcTww.sbeAgmBcdAzn3dclm4jnSFddI7q3/LS', 'f022757b9f4265ff7f57e02235e4ad4e', 'admin', 2, 'Руководитель', 'default.png', 'light', '', 'Главной задачей заметки, точно также, как и других текстов, является предоставление информации о каком-то значимом событии. Кроме этого, заметка может содержать предположения, гипотезы, прогнозы, рекомендации, нормативную и оценочную информацию. \n\nЕсли заметку необходимо осветить более подробно, тогда автор может указать источник информации, добавить цитаты и привести статистические данные.', '2022-07-15 17:15:30');

-- --------------------------------------------------------

--
-- Структура таблицы `user_cat_user`
--

CREATE TABLE `user_cat_user` (
  `id` int(11) NOT NULL,
  `userid` varchar(645) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `access_userid` int(11) NOT NULL,
  `edit_pass_access` int(11) NOT NULL DEFAULT '1',
  `add_pass_access` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `routings`
--
ALTER TABLE `routings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_cat_user`
--
ALTER TABLE `user_cat_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `routings`
--
ALTER TABLE `routings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `user_cat_user`
--
ALTER TABLE `user_cat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
