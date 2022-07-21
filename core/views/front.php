<?php
session_start();
include DIR . '/core/models/settingsModel.php';
include DIR . '/core/models/constSettings.php';
include DIR . '/core/models/registerModel.php';
include DIR . '/core/models/feedbackModel.php';
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

    <!-- Preloader Start
    <div class="se-pre-con"></div> -->
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

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area top-pad-80 text-xl bg-theme-responsive text-light content-double">
        <!-- Fixed Shape -->
        <div class="fixed-shape" style="background-image: url(<?php DIR; ?>/assets/images/shape/2.png);"></div>
        <!-- End Fixed Shape -->
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="double-items with-thumb">
                            <!-- Banner Left Content -->
                            <div class="info col-md-6">
                                <div class="content inc-video">
                                    <?php echo $message_success; ?>
                                    <?php echo $message_danger; ?>
                                    <h1><?php echo TITLE_MAIN_1; ?> <strong><?php echo TITLE_MAIN_2; ?></strong></h1>
                                    <p>
                                        <?php echo SUB_TITLE; ?>
                                    </p>
                                    <?php if (BTN_START != '') { ?>
                                        <a href="/login" class="btn circle btn-light border btn-md"><?php echo BTN_START; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End Banner Left Content -->

                            <!-- Start Banner Form -->
                            <div class="form col-md-5 col-md-offset-1">

                                <?php if (CHECK_REGISTER != '2' || isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true) { ?>

                                    <div class="mt-4">
                                        <img src="assets/images/illustration/software.png" alt="">
                                    </div>
                                <?php } else { ?>

                                    <div class="form-box">
                                        <h2><?php echo TITLE_FORM_1; ?> <span><?php echo TITLE_FORM_2; ?></span> <?php echo TITLE_FORM_3; ?></h2>
                                        <?php if ($msg) { ?>
                                            <div class="text-success text-center" role="alert">
                                                <?php echo $msg; ?>
                                            </div>
                                        <?php } ?>
                                        <form method="post">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Введите имя пользователя" required name="username" value="<?php echo $username; ?>" type="text">
                                                        <span class="text-danger"><?php echo $username_err; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Введите Email" required name="useremail" value="<?php echo $useremail; ?>" type="email">
                                                        <span class="text-danger"><?php echo $useremail_err; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Введите пароль" required name="password" value="<?php echo $password; ?>" type="password">
                                                        <span class="text-danger"><?php echo $password_err; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Повторите пароль" name="confirm_password" value="<?php echo $confirm_password; ?>" type="password">
                                                        <span class="text-danger"><?php echo $confirm_password_err; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 text-black">
                                                <p class="mb-0">Регистрируясь, вы соглашаетесь <a href="#" class="text-primary">правилами</a></p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <button type="submit">
                                                        РЕГИСТРАЦИЯ
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>
                            </div>
                            <!-- End Banner Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Companies Area 
    ============================================= -->
    <div class="companies-area">

        <div class="container">
            <div class="company-items default-padding">
                <div class="row">
                    <div class="col-md-6 info">
                        <h3><?php echo TITLE_CUST_1; ?> <span><?php echo TITLE_CUST_2; ?></span> <?php echo TITLE_CUST_3; ?></h3>
                        <p>
                            <?php echo SUB_TITLE_CUST; ?>
                        </p>
                    </div>
                    <div class="col-md-6 clients">
                        <div class="clients-items owl-carousel owl-theme text-center">
                            <?php if (CUST_URL_1 != '') { ?>
                                <div class="single-item">
                                    <a href="#"><img src="assets/images/<?php echo CUST_URL_1; ?>" alt="<?php echo TITLE; ?>"></a>
                                </div>
                            <?php } ?>
                            <?php if (CUST_URL_2 != '') { ?>
                                <div class="single-item">
                                    <a href="#"><img src="assets/images/<?php echo CUST_URL_2; ?>" alt="<?php echo TITLE; ?>"></a>
                                </div>
                            <?php } ?>
                            <?php if (CUST_URL_3 != '') { ?>
                                <div class="single-item">
                                    <a href="#"><img src="assets/images/<?php echo CUST_URL_3; ?>" alt="<?php echo TITLE; ?>"></a>
                                </div>
                            <?php } ?>
                            <?php if (CUST_URL_4 != '') { ?>
                                <div class="single-item">
                                    <a href="#"><img src="assets/images/<?php echo CUST_URL_4; ?>" alt="<?php echo TITLE; ?>"></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Companies Area -->

    <!-- Start Features 
    ============================================= -->
    <div id="features" class="feature-content-area text-center default-padding bottom-less">
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="assets/images/shape/3.png" alt="Shape">
        </div>
        <!-- Fixed Shape -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2><?php echo SCOPE_TITLE_1; ?> <span><?php echo SCOPE_TITLE_2; ?></span></h2>
                        <h4><?php echo SUB_TITLE_SCOPE; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="feature-content-items">
                <div class="row">
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 single-item">
                        <div class="item">
                            <i class="flaticon-analysis"></i>
                            <h4><?php echo TITLE_SCOPE_1; ?></h4>
                            <p>
                                <?php echo DESC_SCOPE_1; ?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 single-item">
                        <div class="item">
                            <i class="flaticon-customer-service"></i>
                            <h4><?php echo TITLE_SCOPE_2; ?></h4>
                            <p>
                                <?php echo DESC_SCOPE_2; ?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 single-item">
                        <div class="item">
                            <i class="flaticon-television"></i>
                            <h4><?php echo TITLE_SCOPE_3; ?></h4>
                            <p>
                                <?php echo DESC_SCOPE_3; ?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 single-item">
                        <div class="item">
                            <i class="flaticon-speedometer"></i>
                            <h4><?php echo TITLE_SCOPE_4; ?></h4>
                            <p>
                                <?php echo DESC_SCOPE_4; ?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->

    <!-- Start About 
    ============================================= -->
    <div id="about" class="about-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="assets/images/<?php echo IMG_ADVAN; ?>" alt="<?php echo TITLE; ?>">
                </div>
                <div class="col-md-7 default info">
                    <h4><?php echo ADVAN_TITLE; ?></h4>
                    <h2><?php echo SUB_TITLE_ADVAN; ?></h2>
                    <p>
                        <?php echo DESC_ADVAN; ?>
                    </p>
                    <ul>
                        <li>
                            <h5><?php echo TITLE_ADVAN_1; ?></h5>
                            <span><?php echo DESC_ADVAN_1; ?></span>
                        </li>
                        <li>
                            <h5><?php echo TITLE_ADVAN_2; ?></h5>
                            <span><?php echo DESC_ADVAN_2; ?></span>
                        </li>
                        <li>
                            <h5><?php echo TITLE_ADVAN_3; ?></h5>
                            <span><?php echo DESC_ADVAN_3; ?></span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Faq  
    ============================================= -->
    <div class="faq-area default-padding" id="faq">
        <div class="container">
            <div class="row">

                <!-- Star Accordion Items -->
                <div class="<?php if (URL_VIDEO != '') { ?>col-md-6<?php } else { ?>col-md-12<?php } ?> faq-items">
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">

                            <?php if (QUESTION_1 != '') { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                                <span>1</span> <?php echo QUESTION_1; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ac1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p>
                                                <?php echo ANSWER_1; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (QUESTION_2 != '') { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                                <span>2</span> <?php echo QUESTION_2; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ac2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                <?php echo ANSWER_2; ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (QUESTION_3 != '') { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                                <span>3</span> <?php echo QUESTION_3; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ac4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                <?php echo ANSWER_3; ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (QUESTION_4 != '') { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                                <span>4</span> <?php echo QUESTION_4; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ac3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                <?php echo ANSWER_4; ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>

                <?php if (URL_VIDEO != '') { ?>
                    <div class="col-md-6 video-faq">
                        <div class="video">
                            <img src="assets/images/<?php echo IMG_VIDEO; ?>" alt="Thumb">
                            <a class="popup-youtube light video-play-button" href="<?php echo URL_VIDEO; ?>">
                                <i class="fa fa-play"></i>
                            </a>
                            <h4><?php echo TITLE_VIDEO; ?></h4>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- End Faq  -->

    <!-- Start Contact Area  
    ============================================= -->
    <div id="contact" class="contact-us-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2><?php echo FEEDBACK_TITLE_1; ?> <span><?php echo FEEDBACK_TITLE_2; ?></span></h2>
                        <h4><?php echo SUB_TITLE_FEEDBACK; ?></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 contact-form" action="core/models/feedbackModel.php">
                    <h2><?php echo NAME_FORM; ?></h2>
                    <form method="POST" class="contact-form">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control" id="name_form" name="name_form" placeholder="Имя" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="email_form" name="email_form" placeholder="Email*" type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="phone_form" name="phone_form" placeholder="Телефон" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comments_form" name="comments_form" placeholder="Расскажите нам о вашей идее *"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <button type="submit" name="submit" id="submit">
                                    Отправить <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->



                    </form>
                </div>
                <div class="col-md-4 address">
                    <div class="address-items">
                        <ul class="info">
                            <?php if (PHONE_NUMBER != '') { ?>
                                <li>
                                    <h4><?php echo PHONE; ?></h4>
                                    <div class="icon"><i class="fas fa-phone"></i></div>
                                    <span><?php echo PHONE_NUMBER; ?></span>
                                </li>
                            <?php } ?>
                            <?php if (EMAIL_VALUE != '') { ?>
                                <li>
                                    <h4><?php echo EMAIL; ?></h4>
                                    <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                    <span><?php echo EMAIL_VALUE; ?></span>
                                </li>
                            <?php } ?>
                        </ul>
                        <h4><?php echo SOCIAL_NETWORK; ?></h4>
                        <ul class="social">
                            <?php if (VKONTAKTE != '') { ?>
                                <li class="facebook">
                                    <a href="<?php echo VKONTAKTE; ?>"><i class="fab fa-vk"></i></a>
                                </li>
                            <?php } ?>
                            <?php if (ODNOKLASSNIKI != '') { ?>
                                <li class="twitter">
                                    <a href="<?php echo ODNOKLASSNIKI; ?>"><i class="fab fa-odnoklassniki"></i></a>
                                </li>
                            <?php } ?>
                            <?php if (YOUTUBE != '') { ?>
                                <li class="pinterest">
                                    <a href="<?php echo YOUTUBE; ?>"><i class="fab fa-youtube"></i></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

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
    <?php if (COOCKY == '2') { ?>
        <div id="cookie_notification">
            <p>Для улучшения работы сайта и его взаимодействия с пользователями мы используем файлы cookie. Продолжая работу с сайтом, Вы разрешаете использование cookie-файлов.</p>
            <button class="button btn-primary cookie_accept">Принять</button>
        </div>
    <?php } ?>
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