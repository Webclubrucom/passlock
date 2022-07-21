<?php

include DIR . '/core/models/settingsModel.php';
include DIR . '/core/models/constSettings.php';
include DIR . '/core/models/registerModel.php';

?>
<?php if (CHECK_LANDING != '2') {
    header("location: /admin");
} ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo DESCRIPTION; ?>">

    <!-- ========== Page Title ========== -->
    <title><?php echo $title; ?> | <?php echo TITLE; ?></title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/images/<?php echo FAVICON; ?>" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="assets/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav button theme">
                    <ul>
                        <li>
                            <?php if (BTN_LOGIN != '') { ?>
                                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                                    <a href="/admin">Панель управления</a>
                                <?php } else { ?>
                                    <a href="/login"><?php echo BTN_LOGIN; ?></a>
                                <?php } ?>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="assets/images/<?php echo LOGO_LITE; ?>" class="logo logo-display" alt="<?php echo TITLE; ?>">
                        <img src="assets/images/<?php echo LOGO_DARK; ?>" class="logo logo-scrolled" alt="<?php echo TITLE; ?>">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <?php if (MENU_1 != '') { ?>
                            <li>
                                <a class="smooth-menu" href="#features"><?php echo MENU_1; ?></a>
                            </li>
                        <?php } ?>
                        <?php if (MENU_2 != '') { ?>
                            <li>
                                <a class="smooth-menu" href="#about"><?php echo MENU_2; ?></a>
                            </li>
                        <?php } ?>
                        <?php if (MENU_3 != '') { ?>
                            <li>
                                <a class="smooth-menu" href="#faq"><?php echo MENU_3; ?></a>
                            </li>
                        <?php } ?>
                        <?php if (MENU_4 != '') { ?>
                            <li>
                                <a class="smooth-menu" href="#contact"><?php echo MENU_4; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light" style="background-image: url(assets/images/shape/2.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $title; ?></h1>
                    <ul class="breadcrumb">
                        <li><a href="/"><?php echo TITLE; ?></a></li>

                        <li class="active"><?php echo $title; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog 
    ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-md-12">
                        <div class="item">

                            <div class="info">


                                <p>
                                    Настоящая Политика конфиденциальности персональных данных (далее – Политика конфиденциальности) действует в отношении всей информации, которую сайт <?= TITLE; ?>, (далее – Менеджер паролей) расположенный на доменном имени <?= $_SERVER['SERVER_NAME']; ?>, может получить о Пользователе во время использования сайта <?= $_SERVER['SERVER_NAME']; ?>, его программ и его продуктов. <br> <br>

                                <h3>1. Определение терминов </h3> <br>
                                1.1 В настоящей Политике конфиденциальности используются следующие термины: <br> <br>

                                1.1.1. «Администрация сайта» (далее – Администрация) – уполномоченные сотрудники на управление сайтом <?= TITLE; ?>, которые организуют и (или) осуществляют обработку персональных данных, а также определяет цели обработки персональных данных, состав персональных данных, подлежащих обработке, действия (операции), совершаемые с персональными данными. <br> <br>

                                1.1.2. «Персональные данные» - любая информация, относящаяся к прямо или косвенно определенному, или определяемому физическому лицу (субъекту персональных данных). <br> <br>

                                1.1.3. «Обработка персональных данных» - любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных. <br> <br>

                                1.1.4. «Конфиденциальность персональных данных» - обязательное для соблюдения Оператором или иным получившим доступ к персональным данным лицом требование не допускать их распространения без согласия субъекта персональных данных или наличия иного законного основания. <br> <br>

                                1.1.5. «Сайт <?= TITLE; ?>» - это совокупность связанных между собой веб-страниц, размещенных в сети Интернет по уникальному адресу (URL): <?= $_SERVER['SERVER_NAME']; ?>. <br> <br>

                                1.1.6. «Субдомены» - это страницы или совокупность страниц, расположенные на доменах третьего уровня, принадлежащие сайту <?= TITLE; ?>, а также другие временные страницы, внизу который указана контактная информация Администрации <br> <br>

                                1.1.5. «Пользователь сайта <?= TITLE; ?> » (далее Пользователь) – лицо, имеющее доступ к сайту <?= TITLE; ?>, посредством сети Интернет и использующее информацию, материалы и продукты сайта <?= TITLE; ?>. <br> <br>

                                1.1.7. «Cookies» — небольшой фрагмент данных, отправленный веб-сервером и хранимый на компьютере пользователя, который веб-клиент или веб-браузер каждый раз пересылает веб-серверу в HTTP-запросе при попытке открыть страницу соответствующего сайта. <br> <br>

                                1.1.8. «IP-адрес» — уникальный сетевой адрес узла в компьютерной сети, через который Пользователь получает доступ на Менеджер паролей. <br> <br>

                                <h3>2. Общие положения </h3> <br>
                                2.1. Использование сайта <?= TITLE; ?> Пользователем означает согласие с настоящей Политикой конфиденциальности и условиями обработки персональных данных Пользователя. <br> <br>

                                2.2. В случае несогласия с условиями Политики конфиденциальности Пользователь должен прекратить использование сайта <?= TITLE; ?>. <br> <br>

                                2.3. Настоящая Политика конфиденциальности применяется к сайту <?= TITLE; ?>. Менеджер паролей не контролирует и не несет ответственность за сайты третьих лиц, на которые Пользователь может перейти по ссылкам, доступным на сайте <?= TITLE; ?>. <br> <br>

                                2.4. Администрация не проверяет достоверность персональных данных, предоставляемых Пользователем. <br> <br>

                                <h3>3. Предмет политики конфиденциальности </h3> <br>
                                3.1. Настоящая Политика конфиденциальности устанавливает обязательства Администрации по неразглашению и обеспечению режима защиты конфиденциальности персональных данных, которые Пользователь предоставляет по запросу Администрации при регистрации на сайте <?= TITLE; ?> или при подписке на информационную e-mail рассылку. <br> <br>

                                3.2. Персональные данные, разрешённые к обработке в рамках настоящей Политики конфиденциальности, предоставляются Пользователем путём заполнения форм на сайте <?= TITLE; ?> и включают в себя следующую информацию:<br><br>
                                3.2.1. фамилию, имя, отчество Пользователя;<br>
                                3.2.2. контактный телефон Пользователя;<br>
                                3.2.3. адрес электронной почты (e-mail)<br>
                                3.2.4. место жительство Пользователя (при необходимости)<br>
                                3.2.5. фотографию (при необходимости) <br> <br>

                                3.3. Менеджер паролей защищает Данные, которые автоматически передаются при посещении страниц:<br><br>
                                - IP адрес;<br>
                                - информация из cookies;<br>
                                - информация о браузере;<br>
                                - время доступа;<br>
                                - реферер (адрес предыдущей страницы). <br> <br>

                                3.3.1. Отключение cookies может повлечь невозможность доступа к частям сайта , требующим авторизации. <br> <br>

                                3.3.2. Менеджер паролей осуществляет сбор статистики об IP-адресах своих посетителей. Данная информация используется с целью предотвращения, выявления и решения технических проблем. <br> <br>

                                3.4. Любая иная персональная информация неоговоренная выше (история посещения, используемые браузеры, операционные системы и т.д.) подлежит надежному хранению и нераспространению, за исключением случаев, предусмотренных в п.п. 5.2. настоящей Политики конфиденциальности. <br> <br>

                                <h3>4. Цели сбора персональной информации пользователя </h3> <br>
                                4.1. Персональные данные Пользователя Администрация может использовать в целях: <br> <br>
                                4.1.1. Идентификации Пользователя, зарегистрированного на сайте <?= TITLE; ?> для его дальнейшей авторизации. <br> <br>
                                4.1.2. Предоставления Пользователю доступа к персонализированным данным сайта <?= TITLE; ?>. <br> <br>
                                4.1.3. Установления с Пользователем обратной связи, включая направление уведомлений, запросов, касающихся использования сайта <?= TITLE; ?>, обработки запросов и заявок от Пользователя. <br> <br>
                                4.1.4. Определения места нахождения Пользователя для обеспечения безопасности, предотвращения мошенничества. <br> <br>
                                4.1.5. Подтверждения достоверности и полноты персональных данных, предоставленных Пользователем. <br> <br>
                                4.1.6. Создания учетной записи для использования частей сайта <?= TITLE; ?>, если Пользователь дал согласие на создание учетной записи. <br> <br>
                                4.1.7. Уведомления Пользователя по электронной почте. <br> <br>
                                4.1.8. Предоставления Пользователю эффективной технической поддержки при возникновении проблем, связанных с использованием сайта <?= TITLE; ?>. <br> <br>
                                4.1.9. Предоставления Пользователю с его согласия специальных предложений, новостной рассылки и иных сведений от имени сайта <?= TITLE; ?>. <br> <br>

                                <h3>5. Способы и сроки обработки персональной информации </h3> <br>
                                5.1. Обработка персональных данных Пользователя осуществляется без ограничения срока, любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств. <br> <br>

                                5.2. Персональные данные Пользователя могут быть переданы уполномоченным органам государственной власти Российской Федерации только по основаниям и в порядке, установленным законодательством Российской Федерации. <br> <br>

                                5.3. При утрате или разглашении персональных данных Администрация вправе не информировать Пользователя об утрате или разглашении персональных данных. <br> <br>

                                5.4. Администрация принимает необходимые организационные и технические меры для защиты персональной информации Пользователя от неправомерного или случайного доступа, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий третьих лиц. <br> <br>

                                5.5. Администрация совместно с Пользователем принимает все необходимые меры по предотвращению убытков или иных отрицательных последствий, вызванных утратой или разглашением персональных данных Пользователя. <br> <br>

                                <h3>6. Права и обязанности сторон </h3> <br>
                                6.1. Пользователь вправе: <br> <br>

                                6.1.1. Принимать свободное решение о предоставлении своих персональных данных, необходимых для использования сайта <?= TITLE; ?>, и давать согласие на их обработку. <br> <br>

                                6.1.2. Обновить, дополнить предоставленную информацию о персональных данных в случае изменения данной информации. <br> <br>

                                6.1.3. Пользователь имеет право на получение у Администрации информации, касающейся обработки его персональных данных, если такое право не ограничено в соответствии с федеральными законами. Пользователь вправе требовать от Администрации уточнения его персональных данных, их блокирования или уничтожения в случае, если персональные данные являются неполными, устаревшими, неточными, незаконно полученными или не являются необходимыми для заявленной цели обработки, а также принимать предусмотренные законом меры по защите своих прав. Для этого достаточно уведомить Администрацию по указаному E-mail адресу. <br> <br>

                                6.2. Администрация обязана: <br> <br>

                                6.2.1. Использовать полученную информацию исключительно для целей, указанных в п. 4 настоящей Политики конфиденциальности. <br> <br>

                                6.2.2. Обеспечить хранение конфиденциальной информации в тайне, не разглашать без предварительного письменного разрешения Пользователя, а также не осуществлять продажу, обмен, опубликование, либо разглашение иными возможными способами переданных персональных данных Пользователя, за исключением п.п. 5.2. настоящей Политики Конфиденциальности. <br> <br>

                                6.2.3. Принимать меры предосторожности для защиты конфиденциальности персональных данных Пользователя согласно порядку, обычно используемого для защиты такого рода информации в существующем деловом обороте. <br> <br>

                                6.2.4. Осуществить блокирование персональных данных, относящихся к соответствующему Пользователю, с момента обращения или запроса Пользователя, или его законного представителя либо уполномоченного органа по защите прав субъектов персональных данных на период проверки, в случае выявления недостоверных персональных данных или неправомерных действий. <br> <br>

                                <h3>Ответственность сторон</h3> <br>
                                7.1. Администрация, не исполнившая свои обязательства, несёт ответственность за убытки, понесённые Пользователем в связи с неправомерным использованием персональных данных, в соответствии с законодательством Российской Федерации, за исключением случаев, предусмотренных п.п. 5.2. и 7.2. настоящей Политики Конфиденциальности. <br> <br>

                                7.2. В случае утраты или разглашения Конфиденциальной информации Администрация не несёт ответственность, если данная конфиденциальная информация: <br> <br>
                                7.2.1. Стала публичным достоянием до её утраты или разглашения.
                                7.2.2. Была получена от третьей стороны до момента её получения Администрацией Ресурса. <br> <br>
                                7.2.3. Была разглашена с согласия Пользователя. <br> <br>

                                7.3. Пользователь несет полную ответственность за соблюдение требований законодательства РФ, в том числе законов о рекламе, о защите авторских и смежных прав, об охране товарных знаков и знаков обслуживания, но не ограничиваясь перечисленным, включая полную ответственность за содержание и форму материалов. <br> <br>

                                7.4. Пользователь признает, что ответственность за любую информацию (в том числе, но не ограничиваясь: файлы с данными, тексты и т. д.), к которой он может иметь доступ как к части сайта <?= TITLE; ?>, несет лицо, предоставившее такую информацию. <br> <br>

                                7.5. Пользователь соглашается, что информация, предоставленная ему как часть сайта <?= TITLE; ?>, может являться объектом интеллектуальной собственности, права на который защищены и принадлежат другим Пользователям, партнерам или рекламодателям, которые размещают такую информацию на сайте <?= TITLE; ?>.
                                Пользователь не вправе вносить изменения, передавать в аренду, передавать на условиях займа, продавать, распространять или создавать производные работы на основе такого Содержания (полностью или в части), за исключением случаев, когда такие действия были письменно прямо разрешены собственниками такого Содержания в соответствии с условиями отдельного соглашения. <br> <br>

                                7.6. В отношение текстовых материалов (статей, публикаций, находящихся в свободном публичном доступе на сайте <?= TITLE; ?>) допускается их распространение при условии, что будет дана ссылка на Менеджер паролей. <br> <br>

                                7.7. Администрация не несет ответственности перед Пользователем за любой убыток или ущерб, понесенный Пользователем в результате удаления, сбоя или невозможности сохранения какого-либо Содержания и иных коммуникационных данных, содержащихся на сайте <?= TITLE; ?> или передаваемых через него. <br> <br>

                                7.8. Администрация не несет ответственности за любые прямые или косвенные убытки, произошедшие из-за: использования либо невозможности использования сайта, либо отдельных сервисов; несанкционированного доступа к коммуникациям Пользователя; заявления или поведение любого третьего лица на сайте. <br> <br>

                                7.9. Администрация не несет ответственность за какую-либо информацию, размещенную пользователем на сайте <?= TITLE; ?>, включая, но не ограничиваясь: информацию, защищенную авторским правом, без прямого согласия владельца авторского права. <br> <br>

                                <h3>8. Разрешение споров</h3> <br>
                                8.1. До обращения в суд с иском по спорам, возникающим из отношений между Пользователем и Администрацией, обязательным является предъявление претензии (письменного предложения или предложения в электронном виде о добровольном урегулировании спора). <br> <br>

                                8.2. Получатель претензии в течение 30 календарных дней со дня получения претензии, письменно или в электронном виде уведомляет заявителя претензии о результатах рассмотрения претензии. <br> <br>

                                8.3. При не достижении соглашения спор будет передан на рассмотрение Арбитражного суда. <br> <br>

                                8.4. К настоящей Политике конфиденциальности и отношениям между Пользователем и Администрацией применяется действующее законодательство Российской Федерации. <br> <br>

                                <h3>9. Дополнительные условия</h3> <br>
                                9.1. Администрация вправе вносить изменения в настоящую Политику конфиденциальности без согласия Пользователя. <br> <br>

                                9.2. Новая Политика конфиденциальности вступает в силу с момента ее размещения на сайте <?= TITLE; ?>, если иное не предусмотрено новой редакцией Политики конфиденциальности. <br> <br>

                                9.3. Все предложения или вопросы касательно настоящей Политики конфиденциальности следует сообщать по адресу: <?= EMAIL_VALUE; ?>

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
    <!-- Start Footer 
    ============================================= -->
    <footer class="default-padding-top bg-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item about">
                            <img src="assets/images/<?php echo LOGO_DARK; ?>" alt="<?php echo TITLE; ?>">
                            <p>
                                <?php echo SUB_TITLE_FOOTER; ?>
                            </p>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item about">
                            <h4><?php echo TITLE_WIDGET_2; ?></h4>
                            <ul>
                                <?php if (VKONTAKTE != '') { ?>
                                    <li>
                                        <a href="<?php echo VKONTAKTE; ?>"><i class="fab fa-vk"></i></a>
                                    </li>
                                <?php } ?>
                                <?php if (ODNOKLASSNIKI != '') { ?>
                                    <li>
                                        <a href="<?php echo ODNOKLASSNIKI; ?>"><i class="fab fa-odnoklassniki"></i></a>
                                    </li>
                                <?php } ?>
                                <?php if (YOUTUBE != '') { ?>
                                    <li>
                                        <a href="<?php echo YOUTUBE; ?>"><i class="fab fa-youtube"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item twitter-widget">
                            <h4><?php echo TITLE_WIDGET_1; ?></h4>

                            <div class="address">
                                <ul>
                                    <?php if (DESC_SUB_WIDGET != '') { ?>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <div class="info">
                                                <h5><?php echo TITLE_SUB_WIDGET; ?>:</h5>
                                                <span><?php echo DESC_SUB_WIDGET; ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if (EMAIL_VALUE != '') { ?>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="info">
                                                <h5><?php echo EMAIL; ?>:</h5>
                                                <span><?php echo EMAIL_VALUE; ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if (PHONE != '') { ?>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="info">
                                                <h5><?php echo PHONE; ?>:</h5>
                                                <span><?php echo PHONE_NUMBER; ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p><?php echo TITLE; ?> &copy; Copyright <?php echo date('Y'); ?>. Все права защищены.</p>
                        </div>
                        <div class="col-md-6 text-right link">
                            <ul>
                                <?php if (RULES == '2') { ?>
                                    <li>
                                        <a href="/rules">Правила сайта</a>
                                    </li>
                                <?php } ?>
                                <?php if (POLITICS == '2') { ?>
                                    <li>
                                        <a href="/privacy_policy">Политика конфиденциальности</a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>