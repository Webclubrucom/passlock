<?php
include DIR . '/core/layouts/session.php';
include DIR . '/core/models/settingsModel.php';
?>
<?php include DIR . '/core/layouts/head.php'; ?>

<?php include DIR . '/core/layouts/head-style.php'; ?>
<?php include DIR . '/core/layouts/body.php'; ?>


<!-- Begin page -->
<div id="layout-wrapper">

    <?php include DIR . '/core/layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid container-add-passwords">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">

                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?= $title; ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Менеджер паролей</a></li>
                                    <li class="breadcrumb-item active"><?= $title; ?></li>
                                </ol>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Основные</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#landing" role="tab">
                                            <span class="d-block d-sm-none"><i class="fa fa-globe" aria-hidden="true"></i></span>
                                            <span class="d-none d-sm-block">Лендинг</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_email" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Шаблоны Email</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#smtp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fa fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">SMTP</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ads" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Реклама</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <form method="post" class="row" enctype="multipart/form-data">



                                            <div class="col-6">

                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Название сайта</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Введите название сайта" value="<?php echo TITLE; ?>" required="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Описание</label>
                                                    <textarea class="form-control" id="description" name="description" placeholder="Введите описание сайта"><?php echo DESCRIPTION; ?></textarea>
                                                </div>


                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                            <input type="checkbox" class="form-check-input" id="check_landing" value="2" name="check_landing" <?php if (CHECK_LANDING == '2') { ?>checked<?php } ?>>
                                                            <label class="form-check-label" for="check_landing">Лендинг</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                            <input type="checkbox" class="form-check-input" id="check_register" value="2" name="check_register" <?php if (CHECK_REGISTER == '2') { ?>checked<?php } ?>>
                                                            <label class="form-check-label" for="check_register">Регистрация</label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-6">

                                                <div class="mb-3">
                                                    <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                        <div>
                                                            <label for="logo_lite" class="form-label">Логотип LITE</label>
                                                            <input type="file" class="form-control" id="logo_lite" name="logo_lite">
                                                        </div>
                                                        <div>
                                                            <img height="50" src="assets/images/<?php echo LOGO_LITE; ?>" alt="" class="rounded">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                        <div>
                                                            <label for="logo_dark" class="form-label">Логотип DARK</label>
                                                            <input type="file" class="form-control" id="logo_dark" name="logo_dark">
                                                        </div>
                                                        <div>
                                                            <img height="50" src="assets/images/<?php echo LOGO_DARK; ?>" alt="" class="rounded">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="d-flex" style="justify-content: space-between;">
                                                        <div>
                                                            <label for="favicon" class="form-label">Фавикон и логотип панели управления</label>
                                                            <input type="file" class="form-control" id="favicon" name="favicon">
                                                        </div>
                                                        <div>
                                                            <img src="assets/images/<?php echo FAVICON; ?>" alt="" class="rounded avatar-lg">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                </div>

                                            </div>
                                        </form>

                                    </div>







                                    <div class="tab-pane" id="landing" role="tabpanel">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link mb-2 active" id="v-pills-header-tab" data-bs-toggle="pill" href="#v-pills-header" role="tab" aria-controls="v-pills-header" aria-selected="true">Хедер</a>
                                                    <a class="nav-link mb-2" id="v-pills-customers-tab" data-bs-toggle="pill" href="#v-pills-customers" role="tab" aria-controls="v-pills-customers" aria-selected="false">Клиенты</a>
                                                    <a class="nav-link mb-2" id="v-pills-scope-tab" data-bs-toggle="pill" href="#v-pills-scope" role="tab" aria-controls="v-pills-scope" aria-selected="false">Возможности</a>
                                                    <a class="nav-link mb-2" id="v-pills-advantage-tab" data-bs-toggle="pill" href="#v-pills-advantage" role="tab" aria-controls="v-pills-advantage" aria-selected="false">Преимущества</a>
                                                    <a class="nav-link mb-2" id="v-pills-faq-tab" data-bs-toggle="pill" href="#v-pills-faq" role="tab" aria-controls="v-pills-faq" aria-selected="false">Вопрос-Ответ</a>
                                                    <a class="nav-link mb-2" id="v-pills-feedback-tab" data-bs-toggle="pill" href="#v-pills-feedback" role="tab" aria-controls="v-pills-feedback" aria-selected="false">Обратная связь</a>
                                                    <a class="nav-link mb-2" id="v-pills-footer-tab" data-bs-toggle="pill" href="#v-pills-footer" role="tab" aria-controls="v-pills-footer" aria-selected="false">Футер</a>
                                                    <a class="nav-link mb-2" id="v-pills-reviews-tab" data-bs-toggle="pill" href="#v-pills-reviews" role="tab" aria-controls="v-pills-reviews" aria-selected="false">Отзывы</a>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-9">
                                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-header" role="tabpanel" aria-labelledby="v-pills-header-tab">
                                                        <form method="post" class="row" enctype="multipart/form-data">

                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label for="menu_1" class="form-label">Пункт меню 1</label>
                                                                    <input type="text" class="form-control" id="menu_1" name="menu_1" placeholder="Введите название сайта" value="<?php echo MENU_1; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="menu_2" class="form-label">Пункт меню 2</label>
                                                                    <input type="text" class="form-control" id="menu_2" name="menu_2" placeholder="Введите название сайта" value="<?php echo MENU_2; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="menu_3" class="form-label">Пункт меню 3</label>
                                                                    <input type="text" class="form-control" id="menu_3" name="menu_3" placeholder="Введите название сайта" value="<?php echo MENU_3; ?>">
                                                                </div>


                                                            </div>
                                                            <div class="col-6">

                                                                <div class="mb-3">
                                                                    <label for="menu_4" class="form-label">Пункт меню 4</label>
                                                                    <input type="text" class="form-control" id="menu_4" name="menu_4" placeholder="Введите название сайта" value="<?php echo MENU_4; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="btn_login" class="form-label">Кнопка "Вход"</label>
                                                                    <input type="text" class="form-control" id="btn_login" name="btn_login" placeholder="Введите название сайта" value="<?php echo BTN_LOGIN; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="btn_start" class="form-label">Кнопка "Начать"</label>
                                                                    <input type="text" class="form-control" id="btn_start" name="btn_start" placeholder="Введите название сайта" value="<?php echo BTN_START; ?>">
                                                                </div>


                                                            </div>
                                                            <div class="col-12">
                                                                <hr>
                                                                <div class="mb-3">
                                                                    <label for="title_main_1" class="form-label">Заголовок</label>
                                                                    <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                        <input type="text" class="form-control inp_start" id="title_main_1" name="title_main_1" placeholder="Пришло время хранить пароли" value="<?php echo TITLE_MAIN_1; ?>">
                                                                        <input type="text" class="form-control inp_fin" name="title_main_2" placeholder="НАДЕЖНО" value="<?php echo TITLE_MAIN_2; ?>">
                                                                    </div>

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="sub_title" class="form-label">Подзаголовок</label>
                                                                    <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Введите подзаголовок" value="<?php echo SUB_TITLE; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="title_form_1" class="form-label">Заголовок формы</label>
                                                                    <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                        <input type="text" class="form-control inp_start" id="title_form_1" name="title_form_1" placeholder="Регистрируйтесь сегодня и храните" value="<?php echo TITLE_FORM_1; ?>">
                                                                        <input type="text" class="form-control inp_fin" name="title_form_2" placeholder="БЕСПЛАТНО" value="<?php echo TITLE_FORM_2; ?>">
                                                                        <input type="text" class="form-control inp_fin" name="title_form_3" placeholder="пароли" value="<?php echo TITLE_FORM_3; ?>">
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab">
                                                        <form method="post" class="row" enctype="multipart/form-data">
                                                            <div class="col-12">

                                                                <div class="mb-3">
                                                                    <label for="title_cust_1" class="form-label">Заголовок</label>
                                                                    <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                        <input type="text" class="form-control inp_start" id="title_cust_1" name="title_cust_1" placeholder="Нам доверяют" value="<?php echo TITLE_CUST_1; ?>">
                                                                        <input type="text" class="form-control inp_fin" name="title_cust_2" placeholder="2500+" value="<?php echo TITLE_CUST_2; ?>">
                                                                        <input type="text" class="form-control inp_fin" name="title_cust_3" placeholder="пользователей" value="<?php echo TITLE_CUST_3; ?>">
                                                                    </div>

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="sub_title_cust" class="form-label">Подзаголовок</label>
                                                                    <textarea type="text" class="form-control" id="sub_title_cust" name="sub_title_cust" placeholder="Введите подзаголовок"><?php echo SUB_TITLE_CUST; ?></textarea>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <div class="d-flex" style="justify-content: space-between;">
                                                                                <div>
                                                                                    <label for="cust_url_1" class="form-label">Логотип клиента 1</label>
                                                                                    <input type="file" class="form-control" id="cust_url_1" name="cust_url_1">
                                                                                </div>
                                                                                <div>
                                                                                    <img src="assets/images/<?= CUST_URL_1; ?>" alt="" class="rounded avatar-lg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-text">Загрузите изображение видео.</div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <div class="d-flex" style="justify-content: space-between;">
                                                                                <div>
                                                                                    <label for="cust_url_2" class="form-label">Логотип клиента 2</label>
                                                                                    <input type="file" class="form-control" id="cust_url_2" name="cust_url_2">
                                                                                </div>
                                                                                <div>
                                                                                    <img src="assets/images/<?= CUST_URL_2; ?>" alt="" class="rounded avatar-lg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-text">Загрузите изображение видео.</div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <div class="d-flex" style="justify-content: space-between;">
                                                                                <div>
                                                                                    <label for="cust_url_3" class="form-label">Логотип клиента 3</label>
                                                                                    <input type="file" class="form-control" id="cust_url_3" name="cust_url_3">
                                                                                </div>
                                                                                <div>
                                                                                    <img src="assets/images/<?= CUST_URL_3; ?>" alt="" class="rounded avatar-lg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-text">Загрузите изображение видео.</div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <div class="d-flex" style="justify-content: space-between;">
                                                                                <div>
                                                                                    <label for="cust_url_4" class="form-label">Логотип клиента 4</label>
                                                                                    <input type="file" class="form-control" id="cust_url_4" name="cust_url_4">
                                                                                </div>
                                                                                <div>
                                                                                    <img src="assets/images/<?= CUST_URL_4; ?>" alt="" class="rounded avatar-lg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-text">Загрузите изображение видео.</div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-scope" role="tabpanel" aria-labelledby="v-pills-scope-tab">
                                                        <form method="post" class="row" enctype="multipart/form-data">

                                                            <div class="mb-3">
                                                                <label for="scope_title_1" class="form-label">Заголовок</label>
                                                                <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                    <input type="text" class="form-control inp_start" id="scope_title_1" name="scope_title_1" placeholder="ПОТРЯСАЮЩИЕ" value="<?php echo SCOPE_TITLE_1; ?>">
                                                                    <input type="text" class="form-control inp_fin" name="scope_title_2" placeholder="ВОЗМОЖНОСТИ" value="<?php echo SCOPE_TITLE_2; ?>">

                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sub_title_scope" class="form-label">Подзаголовок</label>
                                                                <input type="text" class="form-control" id="sub_title_scope" name="sub_title_scope" placeholder="Ознакомьтесь с самыми удобными функциями" value="<?php echo SUB_TITLE_SCOPE; ?>">
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="title_scope_1" class="form-label">Возможность 1</label>
                                                                        <input type="text" class="form-control" id="title_scope_1" name="title_scope_1" placeholder="Введите название" value="<?php echo TITLE_SCOPE_1; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_scope_1" class="form-label">Описание возможности 1</label>
                                                                        <textarea class="form-control" id="desc_scope_1" name="desc_scope_1" placeholder="Введите описание"><?php echo DESC_SCOPE_1; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="title_scope_2" class="form-label">Возможность 2</label>
                                                                        <input type="text" class="form-control" id="title_scope_2" name="title_scope_2" placeholder="Введите название" value="<?php echo TITLE_SCOPE_2; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_scope_2" class="form-label">Описание возможности 2</label>
                                                                        <textarea class="form-control" id="desc_scope_2" name="desc_scope_2" placeholder="Введите описание"><?php echo DESC_SCOPE_2; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="title_scope_3" class="form-label">Возможность 3</label>
                                                                        <input type="text" class="form-control" id="title_scope_3" name="title_scope_3" placeholder="Введите название" value="<?php echo TITLE_SCOPE_3; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_scope_3" class="form-label">Описание возможности 3</label>
                                                                        <textarea class="form-control" id="desc_scope_3" name="desc_scope_3" placeholder="Введите описание"><?php echo DESC_SCOPE_3; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="title_scope_4" class="form-label">Возможность 4</label>
                                                                        <input type="text" class="form-control" id="title_scope_4" name="title_scope_4" placeholder="Введите название" value="<?php echo TITLE_SCOPE_4; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_scope_4" class="form-label">Описание возможности 4</label>
                                                                        <textarea class="form-control" id="desc_scope_4" name="desc_scope_4" placeholder="Введите описание"><?php echo DESC_SCOPE_4; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-advantage" role="tabpanel" aria-labelledby="v-pills-advantage-tab">
                                                        <form method="post" class="row" enctype="multipart/form-data">

                                                            <div class="mb-3">
                                                                <label for="advan_title" class="form-label">Заголовок</label>
                                                                <input type="text" class="form-control" id="advan_title" name="advan_title" placeholder="Введите заголовок" value="<?php echo ADVAN_TITLE; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sub_title_advan" class="form-label">Подзаголовок</label>
                                                                <input type="text" class="form-control" id="sub_title_advan" name="sub_title_advan" placeholder="Введите подзаголовок" value="<?php echo SUB_TITLE_ADVAN; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="desc_advan" class="form-label">Описание</label>
                                                                <textarea class="form-control" id="desc_advan" name="desc_advan" placeholder="Введите описание"><?php echo DESC_ADVAN; ?></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="title_advan_1" class="form-label">Преимущество 1</label>
                                                                        <input type="text" class="form-control" id="title_advan_1" name="title_advan_1" placeholder="Введите название" value="<?php echo TITLE_ADVAN_1; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_advan_1" class="form-label">Описание преимущества 1</label>
                                                                        <textarea class="form-control" id="desc_advan_1" name="desc_advan_1" placeholder="Введите описание"><?php echo DESC_ADVAN_1; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="title_advan_2" class="form-label">Преимущество 2</label>
                                                                        <input type="text" class="form-control" id="title_advan_2" name="title_advan_2" placeholder="Введите название" value="<?php echo TITLE_ADVAN_2; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_advan_2" class="form-label">Описание преимущества 2</label>
                                                                        <textarea class="form-control" id="desc_advan_2" name="desc_advan_2" placeholder="Введите описание"><?php echo DESC_ADVAN_2; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="title_advan_3" class="form-label">Преимущество 3</label>
                                                                        <input type="text" class="form-control" id="title_advan_3" name="title_advan_3" placeholder="Введите название" value="<?php echo TITLE_ADVAN_3; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_advan_3" class="form-label">Описание преимущества 3</label>
                                                                        <textarea class="form-control" id="desc_advan_3" name="desc_advan_3" placeholder="Введите описание"><?php echo DESC_ADVAN_3; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <div class="d-flex" style="justify-content: space-between;">
                                                                            <div>
                                                                                <label for="img_advan" class="form-label">Изображение блока</label>
                                                                                <input type="file" class="form-control" id="img_advan" name="img_advan">
                                                                            </div>
                                                                            <div>
                                                                                <img src="assets/images/<?= IMG_ADVAN; ?>" alt="" class="rounded avatar-lg">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-text">Загрузите изображение блока преимуществ.</div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-faq" role="tabpanel" aria-labelledby="v-pills-faq-tab">
                                                        <form method="post" class="row" enctype="multipart/form-data">




                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="question_1" class="form-label">Вопрос 1</label>
                                                                        <input type="text" class="form-control" id="question_1" name="question_1" placeholder="Введите вопрос" value="<?php echo QUESTION_1; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="answer_1" class="form-label">Ответ 1</label>
                                                                        <textarea class="form-control" id="answer_1" name="answer_1" placeholder="Введите ответ"><?php echo ANSWER_1; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="question_2" class="form-label">Вопрос 2</label>
                                                                        <input type="text" class="form-control" id="question_2" name="question_2" placeholder="Введите вопрос" value="<?php echo QUESTION_2; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="answer_2" class="form-label">Ответ 2</label>
                                                                        <textarea class="form-control" id="answer_2" name="answer_2" placeholder="Введите ответ"><?php echo ANSWER_2; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="question_3" class="form-label">Вопрос 3</label>
                                                                        <input type="text" class="form-control" id="question_3" name="question_3" placeholder="Введите вопрос" value="<?php echo QUESTION_3; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="answer_3" class="form-label">Ответ 3</label>
                                                                        <textarea class="form-control" id="answer_3" name="answer_3" placeholder="Введите ответ"><?php echo ANSWER_3; ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="question_4" class="form-label">Вопрос 4</label>
                                                                        <input type="text" class="form-control" id="question_4" name="question_4" placeholder="Введите вопрос" value="<?php echo QUESTION_4; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="answer_4" class="form-label">Ответ 4</label>
                                                                        <textarea class="form-control" id="answer_4" name="answer_4" placeholder="Введите ответ"><?php echo ANSWER_4; ?></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="title_video" class="form-label">Заголовок видео</label>
                                                                        <input type="text" class="form-control" id="title_video" name="title_video" placeholder="Введите заголовок" value="<?php echo TITLE_VIDEO; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="url_video" class="form-label">Ссылка на видео Youtube</label>
                                                                        <input type="text" class="form-control" id="url_video" name="url_video" placeholder="Введите подзаголовок" value="<?php echo URL_VIDEO; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <div class="d-flex" style="justify-content: space-between;">
                                                                            <div>
                                                                                <label for="img_video" class="form-label">Изображение видео</label>
                                                                                <input type="file" class="form-control" id="img_video" name="img_video">
                                                                            </div>
                                                                            <div>
                                                                                <img src="assets/images/<?= IMG_VIDEO; ?>" alt="" class="rounded avatar-lg">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-text">Загрузите изображение видео.</div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-feedback" role="tabpanel" aria-labelledby="v-pills-faq-feedback">
                                                        <form method="post" class="row" enctype="multipart/form-data">

                                                            <div class="mb-3">
                                                                <label for="feedback_title_1" class="form-label">Заголовок</label>
                                                                <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                    <input type="text" class="form-control inp_start" id="feedback_title_1" name="feedback_title_1" placeholder="ОБРАТНАЯ" value="<?php echo FEEDBACK_TITLE_1; ?>">
                                                                    <input type="text" class="form-control inp_fin" name="feedback_title_2" placeholder="СВЯЗЬ" value="<?php echo FEEDBACK_TITLE_2; ?>">

                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sub_title_feedback" class="form-label">Подзаголовок</label>
                                                                <input type="text" class="form-control" id="sub_title_feedback" name="sub_title_feedback" placeholder="У вас есть какие-нибудь вопросы?" value="<?php echo SUB_TITLE_FEEDBACK; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name_form" class="form-label">Название формы</label>
                                                                <input type="text" class="form-control" id="name_form" name="name_form" placeholder="Давайте обсудим вашу идею" value="<?php echo NAME_FORM; ?>">
                                                            </div>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label for="phone" class="form-label">Телефон</label>
                                                                <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                    <input type="text" class="form-control inp_start" id="phone" name="phone" placeholder="ТЕЛЕФОН" value="<?php echo PHONE; ?>">
                                                                    <input type="text" class="form-control inp_fin" name="phone_number" placeholder="+7-920-732-4499" value="<?php echo PHONE_NUMBER; ?>">

                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <div class="d-flex" style="justify-content: space-between;align-items: end;">
                                                                    <input type="text" class="form-control inp_start" id="email" name="email" placeholder="EMAIL" value="<?php echo EMAIL; ?>">
                                                                    <input type="text" class="form-control inp_fin" name="email_value" placeholder="info@yourdomain.com" value="<?php echo EMAIL_VALUE; ?>">

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="social_network" class="form-label">Социальные сети</label>
                                                                        <input type="text" class="form-control" id="social_network" name="social_network" placeholder="МЫ В СОЦ СЕТЯХ" value="<?php echo SOCIAL_NETWORK; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="vkontakte" class="form-label">ВКонтакте</label>
                                                                        <input type="text" class="form-control" id="vkontakte" name="vkontakte" placeholder="Введите URL ВКонтакте" value="<?php echo VKONTAKTE; ?>">
                                                                    </div>


                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="odnoklassniki" class="form-label">Одноклассники</label>
                                                                        <input type="text" class="form-control" id="odnoklassniki" name="odnoklassniki" placeholder="Введите URL Одноклассников" value="<?php echo ODNOKLASSNIKI; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="youtube" class="form-label">Youtube</label>
                                                                        <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Введите URL Youtube" value="<?php echo YOUTUBE; ?>">
                                                                    </div>

                                                                </div>
                                                            </div>




                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-footer" role="tabpanel" aria-labelledby="v-pills-faq-footer">
                                                        <form method="post" class="row" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="sub_title_footer" class="form-label">Описание</label>
                                                                <textarea class="form-control" id="sub_title_footer" name="sub_title_footer" placeholder="Введите описание"><?php echo SUB_TITLE_FOOTER; ?></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">

                                                                        <label for="title_widget_1" class="form-label">Название виджета контактов</label>
                                                                        <input type="text" class="form-control" id="title_widget_1" name="title_widget_1" placeholder="КОНТАКТНАЯ ИНФОРМАЦИЯ" value="<?php echo TITLE_WIDGET_1; ?>">
                                                                    </div>


                                                                    <div class="mb-3">
                                                                        <label for="title_sub_widget" class="form-label">Наш сайт</label>
                                                                        <input type="text" class="form-control" id="title_sub_widget" name="title_sub_widget" placeholder="НАШ САЙТ:" value="<?php echo TITLE_SUB_WIDGET; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="desc_sub_widget" class="form-label">Ссылка на сайт</label>
                                                                        <input type="text" class="form-control" id="desc_sub_widget" name="desc_sub_widget" placeholder="www.webcreature.site" value="<?php echo DESC_SUB_WIDGET; ?>">
                                                                    </div>


                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="title_widget_2" class="form-label">Название виджета соц сетей</label>
                                                                        <input type="text" class="form-control" id="title_widget_2" name="title_widget_2" placeholder="ПРИСОЕДИНЯЙТЕСЬ К НАМ" value="<?php echo TITLE_WIDGET_2; ?>">
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="mb-3 row">


                                                                            <div class="col-4">
                                                                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                                                    <input type="checkbox" class="form-check-input" id="rules" value="2" name="rules" <?php if (RULES == '2') { ?>checked<?php } ?>>
                                                                                    <label class="form-check-label" for="rules">Правила</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-4">
                                                                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                                                    <input type="checkbox" class="form-check-input" id="politics" value="2" name="politics" <?php if (POLITICS == '2') { ?>checked<?php } ?>>
                                                                                    <label class="form-check-label" for="politics">Политика</label>
                                                                                </div>
                                                                            </div>

                                                                            <!-- <div class="col-4">
                                                                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                                                    <input type="checkbox" class="form-check-input" id="support" value="2" name="support" <?php if (SUPPORT == '2') { ?>checked<?php } ?>>
                                                                                    <label class="form-check-label" for="support">Поддержка</label>
                                                                                </div>
                                                                            </div>-->
                                                                            <div class="col-4">
                                                                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                                                    <input type="checkbox" class="form-check-input" id="coocky" value="2" name="coocky" <?php if (COOCKY == '2') { ?>checked<?php } ?>>
                                                                                    <label class="form-check-label" for="coocky">Куки</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>




                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-faq-reviews">
                                                        <form method="post" class="row" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="reviews_1" class="form-label">Отзыв 1</label>
                                                                        <textarea class="form-control" id="reviews_1" name="reviews_1" placeholder="Напишите отзыв"><?php echo REVIEWS_1; ?></textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="name_reviews_1" class="form-label">Имя 1</label>
                                                                        <input type="text" class="form-control" id="name_reviews_1" name="name_reviews_1" placeholder="Введите имя клиента" value="<?php echo NAME_REVIEWS_1; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="specialty_1" class="form-label">Специальность</label>
                                                                        <input type="text" class="form-control" id="specialty_1" name="specialty_1" placeholder="Введите специальность клиента" value="<?php echo SPECIALITY_1; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <div class="d-flex" style="justify-content: space-between;">
                                                                            <div>
                                                                                <label for="image_reviews_1" class="form-label">Фото 1</label>
                                                                                <input type="file" class="form-control" id="image_reviews_1" name="image_reviews_1">
                                                                            </div>
                                                                            <div>
                                                                                <img src="assets/images/users/<?php echo IMAGES_REVIEWS_1; ?>" alt="" class="rounded avatar-lg">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="reviews_2" class="form-label">Отзыв 2</label>
                                                                        <textarea class="form-control" id="reviews_2" name="reviews_2" placeholder="Напишите отзыв"><?php echo REVIEWS_2; ?></textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="name_reviews_2" class="form-label">Имя 2</label>
                                                                        <input type="text" class="form-control" id="name_reviews_2" name="name_reviews_2" placeholder="Введите имя клиента" value="<?php echo NAME_REVIEWS_2; ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="specialty_2" class="form-label">Специальность</label>
                                                                        <input type="text" class="form-control" id="specialty_2" name="specialty_2" placeholder="Введите специальность клиента" value="<?php echo SPECIALITY_2; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <div class="d-flex" style="justify-content: space-between;">
                                                                            <div>
                                                                                <label for="image_reviews_2" class="form-label">Фото 2</label>
                                                                                <input type="file" class="form-control" id="image_reviews_2" name="image_reviews_2">
                                                                            </div>
                                                                            <div>
                                                                                <img src="assets/images/users/<?php echo IMAGES_REVIEWS_2; ?>" alt="" class="rounded avatar-lg">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!--  end col -->
                                            </div><!-- end row -->

                                        </div>
                                    </div>









                                    <div class="tab-pane" id="tab_email" role="tabpanel">
                                        <form method="post" class="row" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <label for="reg_user_email" class="form-label">Регистрация пользователя (пользователь)</label>
                                                                <input type="text" class="form-control mb-2" id="theme_reg_user_email" name="theme_reg_user_email" placeholder="Введите тему письма" value="<?php echo THEME_REG_USER_EMAIL; ?>">
                                                                <textarea rows="8" class="form-control" id="reg_user_email" name="reg_user_email" placeholder="Введите текст письма"><?php echo REG_USER_EMAIL; ?></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label for="reg_user_email_admin" class="form-label">Регистрация пользователя администратором (пользователь)</label>
                                                                <input type="text" class="form-control mb-2" id="theme_reg_user_email_admin" name="theme_reg_user_email_admin" placeholder="Введите тему письма" value="<?php echo THEME_REG_USER_EMAIL_ADMIN; ?>">
                                                                <textarea rows="8" class="form-control" id="reg_user_email_admin" name="reg_user_email_admin" placeholder="Введите текст письма"><?php echo REG_USER_EMAIL_ADMIN; ?></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label for="edit_user_email_admin" class="form-label">Изменение пользователя администратором (пользователь)</label>
                                                                <input type="text" class="form-control mb-2" id="theme_edit_user_email_admin" name="theme_edit_user_email_admin" placeholder="Введите тему письма" value="<?php echo THEME_EDIT_USER_EMAIL_ADMIN; ?>">
                                                                <textarea rows="8" class="form-control" id="edit_user_email_admin" name="edit_user_email_admin" placeholder="Введите текст письма"><?php echo EDIT_USER_EMAIL_ADMIN; ?></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label for="reset_email" class="form-label">Сброс пароля (пользователь)</label>
                                                                <input type="text" class="form-control mb-2" id="theme_reset_email" name="theme_reset_email" placeholder="Введите тему письма" value="<?php echo THEME_RESET_EMAIL; ?>">
                                                                <textarea rows="8" class="form-control" id="reset_email" name="reset_email" placeholder="Введите текст письма"><?php echo RESET_EMAIL; ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="landing_email" class="form-label">Заявка с лендинга (администратор)</label>
                                                                <input type="text" class="form-control mb-2" id="theme_landing_email" name="theme_landing_email" placeholder="Введите тему письма" value="<?php echo THEME_LANDING_EMAIL; ?>">
                                                                <textarea rows="8" class="form-control" id="landing_email" name="landing_email" placeholder="Введите текст письма"><?php echo LANDING_EMAIL; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <label for="edit_user_email_admin" class="form-label">Шорткоды:</label>
                                                                <p><strong class="copy_username copy_shortcode" onclick="copy_shortcode('.copy_username')">[USERNAME]</strong> - имя пользователя;</p>
                                                                <p><strong class="copy_userpassword copy_shortcode" onclick="copy_shortcode('.copy_userpassword')">[USERPASSWORD]</strong> - пароль пользователя;</p>
                                                                <p><strong class="copy_useremail copy_shortcode" onclick="copy_shortcode('.copy_useremail')">[USEREMAIL]</strong> - email пользователя</p>
                                                                <p><strong class="copy_phone copy_shortcode" onclick="copy_shortcode('.copy_phone')">[PHONE]</strong> - телефон пользователя</p>
                                                                <p><strong class="copy_message copy_shortcode" onclick="copy_shortcode('.copy_message')">[MESSAGE]</strong> - сообщение пользователя</p>
                                                                <p><strong class="copy_website copy_shortcode" onclick="copy_shortcode('.copy_website')">[WEBSITE]</strong> - название сайта</p>
                                                                <p><strong class="copy_email_admin copy_shortcode" onclick="copy_shortcode('.copy_email_admin')">[EMAIL_ADMIN]</strong> - email сайта</p>
                                                                <p><strong class="copy_email_confirm copy_shortcode" onclick="copy_shortcode('.copy_email_confirm')">[EMAIL_CONFIRMATION]</strong> - кнопка подтверждения регистрации</p>
                                                                <p><strong class="copy_pass_reset copy_shortcode" onclick="copy_shortcode('.copy_pass_reset')">[PASSWORD_RESET]</strong> - кнопка сброса пароля</p>

                                                                <p><strong class="copy_br copy_shortcode" onclick="copy_shortcode('.copy_br')">[BR]</strong> - перенос на следующую строку</p>
                                                                <p><strong class="copy_dbr copy_shortcode" onclick="copy_shortcode('.copy_dbr')">[DBR]</strong> - перенос через строку</p>
                                                            </div>
                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane" id="ads" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="mb-3 row">
                                                                <div class="col-4">
                                                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                                        <input type="checkbox" class="form-check-input" id="block_banners" value="2" name="block_banners" <?php if (BLOCK_BANNERS == '2') { ?>checked<?php } ?>>
                                                                        <label class="form-check-label" for="block_banners">Банеры</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title_banner_1" class="form-label">Заголовок банера 1</label>
                                                                <input type="text" class="form-control mb-2" id="title_banner_1" name="title_banner_1" placeholder="Введите заголовок" value="<?php echo TITLE_BANNER_1; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="desc_banner_1" class="form-label">Описание банера 1</label>
                                                                <input type="text" class="form-control mb-2" id="desc_banner_1" name="desc_banner_1" placeholder="Введите заголовок" value="<?php echo DESC_BANNER_1; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="text_button_banner_1" class="form-label">Текст кнопки 1</label>
                                                                <input type="text" class="form-control mb-2" id="text_button_banner_1" name="text_button_banner_1" placeholder="Введите заголовок" value="<?php echo TEXT_BUTTON_BANNER_1; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="url_button_banner_1" class="form-label">Ссылка кнопки 1</label>
                                                                <input type="url" class="form-control mb-2" id="url_button_banner_1" name="url_button_banner_1" placeholder="Введите заголовок" value="<?php echo URL_BUTTON_BANNER_1; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="d-flex" style="justify-content: space-between;">
                                                                    <div>
                                                                        <label for="image_banner_1" class="form-label">Изображение банера 1</label>
                                                                        <input type="file" class="form-control" id="image_banner_1" name="image_banner_1">
                                                                    </div>
                                                                    <div>
                                                                        <img src="assets/images/ads/<?php echo IMAGE_BANNER_1; ?>" alt="" class="rounded avatar-lg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label for="title_banner_2" class="form-label">Заголовок банера 2</label>
                                                                <input type="text" class="form-control mb-2" id="title_banner_2" name="title_banner_2" placeholder="Введите заголовок" value="<?php echo TITLE_BANNER_2; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="desc_banner_2" class="form-label">Описание банера 2</label>
                                                                <input type="text" class="form-control mb-2" id="desc_banner_2" name="desc_banner_2" placeholder="Введите заголовок" value="<?php echo DESC_BANNER_2; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="text_button_banner_2" class="form-label">Текст кнопки 2</label>
                                                                <input type="text" class="form-control mb-2" id="text_button_banner_2" name="text_button_banner_2" placeholder="Введите заголовок" value="<?php echo TEXT_BUTTON_BANNER_2; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="url_button_banner_2" class="form-label">Ссылка кнопки 2</label>
                                                                <input type="url" class="form-control mb-2" id="url_button_banner_2" name="url_button_banner_2" placeholder="Введите заголовок" value="<?php echo URL_BUTTON_BANNER_2; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="d-flex" style="justify-content: space-between;">
                                                                    <div>
                                                                        <label for="image_banner_2" class="form-label">Изображение банера 2</label>
                                                                        <input type="file" class="form-control" id="image_banner_2" name="image_banner_2">
                                                                    </div>
                                                                    <div>
                                                                        <img src="assets/images/ads/<?php echo IMAGE_BANNER_2; ?>" alt="" class="rounded avatar-lg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label for="title_banner_3" class="form-label">Заголовок банера 3</label>
                                                                <input type="text" class="form-control mb-2" id="title_banner_3" name="title_banner_3" placeholder="Введите заголовок" value="<?php echo TITLE_BANNER_3; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="desc_banner_3" class="form-label">Описание банера 3</label>
                                                                <input type="text" class="form-control mb-2" id="desc_banner_3" name="desc_banner_3" placeholder="Введите заголовок" value="<?php echo DESC_BANNER_3; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="text_button_banner_3" class="form-label">Текст кнопки 3</label>
                                                                <input type="text" class="form-control mb-2" id="text_button_banner_3" name="text_button_banner_3" placeholder="Введите заголовок" value="<?php echo TEXT_BUTTON_BANNER_3; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="url_button_banner_3" class="form-label">Ссылка кнопки 3</label>
                                                                <input type="url" class="form-control mb-2" id="url_button_banner_3" name="url_button_banner_3" placeholder="Введите заголовок" value="<?php echo URL_BUTTON_BANNER_3; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="d-flex" style="justify-content: space-between;">
                                                                    <div>
                                                                        <label for="image_banner_3" class="form-label">Изображение банера 3</label>
                                                                        <input type="file" class="form-control" id="image_banner_3" name="image_banner_3">
                                                                    </div>
                                                                    <div>
                                                                        <img src="assets/images/ads/<?php echo IMAGE_BANNER_3; ?>" alt="" class="rounded avatar-lg">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-6">
                                                <form method="post">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form method="post">
                                                                <div class="mb-3 row">
                                                                    <div class="col-12">
                                                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                                            <input type="checkbox" class="form-check-input" id="post_vk" value="2" name="post_vk" <?php if (POST_VK == '2') { ?>checked<?php } ?>>
                                                                            <label class="form-check-label" for="post_vk">Последняя публикация ВКонтакте (Beta)</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="id_page_vk" class="form-label">ID страницы</label>
                                                                    <input type="text" class="form-control mb-2" id="id_page_vk" name="id_page_vk" placeholder="Введите ID страницы" value="<?php echo ID_PAGE_VK; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="token_vk" class="form-label">Токен</label>
                                                                    <input type="text" class="form-control mb-2" id="token_vk" name="token_vk" placeholder="Введите токен" value="<?php echo TOKEN_VK; ?>">
                                                                </div>
                                                                <p class="text-mute" style="cursor:pointer;" id="" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Инструкция по подключению последней публикации ВК</p>
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="smtp" role="tabpanel">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <label for="type_email" class="form-label">Тип отправки</label>
                                                                <select name="type_email" id="type_email" class="form-select">
                                                                    <option value="false" <?php if (TYPE_EMAIL == 'false') { ?>selected<?php } ?>>MailPHP</option>
                                                                    <option value="true" <?php if (TYPE_EMAIL == 'true') { ?>selected<?php } ?>>SMTP</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="mailhost" class="form-label">SMTP сервер</label>
                                                                <input type="text" class="form-control mb-2" id="mailhost" name="mailhost" placeholder="Введите SMTP сервер" value="<?php echo MAILHOST; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="mailport" class="form-label">SMTP порт</label>
                                                                <input type="text" class="form-control mb-2" id="mailport" name="mailport" placeholder="Введите SMTP порт" value="<?php echo MAILPORT; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <div class="mb-3">
                                                                <label for="mailusername" class="form-label">Имя пользователя (Email)</label>
                                                                <input type="text" class="form-control mb-2" id="mailusername" name="mailusername" placeholder="Введите Email" value="<?php echo MAILUSERNAME; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="mailpassword" class="form-label">Пароль</label>
                                                                <input type="text" class="form-control mb-2" id="mailpassword" name="mailpassword" placeholder="Введите Email" value="<?php echo MAILPASSWORD; ?>">
                                                            </div>
                                                            <p class="text-mute" style="cursor:pointer;" id="" data-bs-toggle="modal" data-bs-target=".bs-smtp">Инструкция по настройке SMTP</p>
                                                            <div>
                                                                <button type="submit" class="btn btn-primary fr mt-4"><i class="me-1"></i> Сохранить</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end page title -->

            </div>

        </div>
        <div id="message_copy"></div>



        <?php include DIR . '/core/layouts/footer.php'; ?>
        <?php include DIR . '/core/layouts/modalAddUser.php'; ?>
        <?php include DIR . '/core/layouts/modalInstVk.php'; ?>
        <?php include DIR . '/core/layouts/modalInstSMTP.php'; ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<?php include DIR . '/core/layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include DIR . '/core/layouts/vendor-scripts.php'; ?>

<script src="assets/js/app.js"></script>

</body>

</html>