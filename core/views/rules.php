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
                                    Настоящее Пользовательское Соглашение (Далее Соглашение) регулирует отношения между владельцем (далее или Администрация) с одной стороны и пользователем сайта с другой. <br> <br>
                                    Сайт не является средством массовой информации. <br> <br>

                                    Используя сайт, Вы соглашаетесь с условиями данного соглашения.
                                    Если Вы не согласны с условиями данного соглашения, не используйте сайт ! <br> <br>

                                <h3>Права и обязанности сторон</h3> <br>
                                <strong>Пользователь имеет право:</strong> <br>
                                - осуществлять поиск информации на сайте <br>
                                - получать информацию на сайте <br>
                                - создавать информацию для сайта <br>
                                - распространять информацию на сайте <br>
                                - требовать от администрации скрытия любой информации о пользователе <br>
                                - требовать от администрации скрытия любой информации переданной пользователем сайту <br>
                                - использовать информацию сайта в личных некоммерческих целях <br>
                                - использовать информацию сайта в коммерческих целях без специального разрешения <br> <br>

                                <strong>Администрация имеет право:</strong> <br>
                                - по своему усмотрению и необходимости создавать, изменять, отменять правила <br>
                                - ограничивать доступ к любой информации на сайте <br>
                                - создавать, изменять, удалять информацию <br>
                                - удалять учетные записи <br>
                                - отказывать в регистрации без объяснения причин <br> <br>

                                <strong>Пользователь обязуется:</strong> <br>
                                - обеспечить достоверность предоставляемой информации <br>
                                - обеспечивать сохранность личных данных от доступа третьих лиц <br>
                                - обновлять Персональные данные, предоставленные при регистрации, в случае их изменения <br>
                                - не распространять информацию, которая направлена на пропаганду войны, разжигание национальной, расовой или религиозной ненависти и вражды, а также иной информации, за распространение которой предусмотрена уголовная или административная ответственность <br>
                                - не нарушать работоспособность сайта <br>
                                - не создавать несколько учётных записей на Сайте, если фактически они принадлежат одному и тому же лицу <br>
                                - не совершать действия, направленные на введение других Пользователей в заблуждение <br>
                                - не передавать в пользование свою учетную запись и/или логин и пароль своей учетной записи третьим лицам <br>
                                - не регистрировать учетную запись от имени или вместо другого лица за исключением случаев, предусмотренных законодательством РФ <br>
                                - не использовать скрипты (программы) для автоматизированного сбора информации и/или взаимодействия с Сайтом и его Сервисами <br> <br>

                                <strong>Администрация обязуется:</strong> <br>
                                - поддерживать работоспособность сайта за исключением случаев, когда это невозможно по независящим от Администрации причинам. <br>
                                - осуществлять разностороннюю защиту учетной записи Пользователя <br>
                                - защищать информацию, распространение которой ограничено или запрещено законами путем вынесения предупреждения либо удалением учетной записи пользователя, нарушившего правила <br>
                                - предоставить всю доступную информацию о Пользователе уполномоченным на то органам государственной власти в случаях, установленных законом <br> <br>

                                <h3>Ответственность сторон</h3> <br>
                                - пользователь лично несет полную ответственность за распространяемую им информацию <br>
                                - администрация не несёт ответственность за несовпадение ожидаемых Пользователем и реально полученных услуг <br>
                                - администрация не несет никакой ответственности за услуги, предоставляемые третьими лицами <br>
                                - в случае возникновения форс-мажорной ситуации (боевые действия, чрезвычайное положение, стихийное бедствие и т. д.) Администрация не гарантирует сохранность информации, размещённой Пользователем, а также бесперебойную работу информационного ресурса <br> <br>

                                <h3>Условия действия Соглашения</h3> <br>
                                Данное Соглашение вступает в силу при регистрации на сайте.
                                Соглашение перестает действовать при появлении его новой версии.
                                Администрация оставляет за собой право в одностороннем порядке изменять данное соглашение по своему усмотрению.
                                Администрация не оповещает пользователей об изменении в Соглашении.
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