<?php
include DIR . '/core/layouts/session.php';
include DIR . '/core/models/settingsModel.php';

?>
<?php include DIR . '/core/layouts/head.php'; ?>

<?php include DIR . '/core/layouts/head-style.php'; ?>
<?php include DIR . '/core/layouts/body.php';
include DIR . '/core/models/dashboardModel.php';

?>


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
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 ">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Задачи</h4>

                            </div><!-- end card header -->

                            <div class="card-body">

                                <div class="tasks" id="tasks">
                                    <?php foreach ($tasks as $task) { ?>

                                        <div class="alert alert-<?= $task['color']; ?> d-flex justify-content-between task-item" role="alert">
                                            <div class="form-check">
                                                <input class="form-check-input" data-id="<?= $task['id']; ?>" type="checkbox" id="task-<?= $task['id']; ?>" <?php if ($task['status'] == '2') { ?>checked="" <?php } ?>>
                                                <label <?php if ($task['status'] == '2') { ?>style="text-decoration: line-through;" <?php } ?> class="form-check-label" for="task-<?= $task['id']; ?>">
                                                    <?= $task['name']; ?>
                                                </label>
                                            </div>
                                            <div class="delete" data-del="<?= $task['id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i></div>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="task-add d-grid">
                                    <hr class="mt-4">
                                    <div id="task_error" class="text-danger"></div>
                                    <input id="input-taks" type="text" class="form-control mb-2" placeholder="Название задачи" name="name_task">
                                    <button class="btn btn-primary" id="task-add">Добавить</button>
                                </div>


                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="col-xl-8 row panel_dashboard" style="padding-right:0!important;">
                        <div class="col-xl-3 col-md-3">
                            <div class="card bg-primary border-primary text-white-50 dash_block">
                                <div class="card-body">
                                    <?php if ($_SESSION["role"] == 'admin') { ?>
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-3 text-white">Пользователи</h5>
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text">Активные</p>
                                            <h5 class="mb-3 text-white"><?= $rows_active_user; ?></h5>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="card-text">Неактивные</p>
                                            <h5 class="mb-3 text-white"><?= $rows_noactive_user; ?></h5>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex justify-content-between">
                                            <i class="fa fa-clock" aria-hidden="true"></i>
                                        </div>
                                        <div class="clock">
                                            <div class="hr"></div>
                                            <div class="min"></div>
                                            <div class="sec"></div>
                                            <div class="pin"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-3">
                            <div class="card bg-primary border-primary text-white-50 dash_block">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3 text-white">Пароли</h5>
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Ваши пароли</p>
                                        <h5 class="mb-3 text-white"><?= $rows_you_psswords; ?></h5>
                                    </div>
                                    <?php if ($_SESSION["role"] == 'admin') { ?>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text">Все пароли</p>
                                            <h5 class="mb-3 text-white"><?= $rows_all_passwords; ?></h5>
                                        </div>
                                    <?php } else { ?>
                                        <p class="card-text">Пользуйтесь генератором паролей</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!-- end col-->

                        <div class="col-xl-3 col-md-3">
                            <div class="card bg-primary border-primary text-white-50 dash_block">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3 text-white">Категории</h5>
                                        <i class="fa fa-bullseye" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Ваши категории</p>
                                        <h5 class="mb-3 text-white"><?= $rows_you_categories; ?></h5>
                                    </div>
                                    <?php if ($_SESSION["role"] == 'admin') { ?>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text">Все категории</p>
                                            <h5 class="mb-3 text-white"><?= $rows_all_categories; ?></h5>
                                        </div>
                                    <?php } else { ?>
                                        <p class="card-text">Категории удобны в управлении</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-3">
                            <div class="card bg-primary border-primary text-white-50 dash_block">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3 text-white">Задачи</h5>
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Невыполненные</p>
                                        <h5 class="mb-3 text-white"><?= $rows_noactive_tasks; ?></h5>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Выполненные</p>
                                        <h5 class="mb-3 text-white"><?= $rows_active_tasks; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <!-- end col -->
                        <div class="col-xl-8">
                            <!-- card -->
                            <?php if (POST_VK == 2) { ?>
                                <div class="card bg-primary text-white shadow-primary card-h-100">
                                    <!-- card body -->
                                    <div class="card-body p-0">


                                        <div class="carousel slide text-center widget-carousel" style="height: 100%;">
                                            <div class="carousel-inner" style="height: 100%;">
                                                <?php
                                                // Обрабатываем данные массива с помощью for и выводим нужные значения
                                                for ($i = 0; $i < 1; $i++) {



                                                    if ($wall[$i]->attachments[0]->link->description == 'Article') {
                                                        $url = parse_url($wall[$i]->attachments[0]->link->url);
                                                ?>
                                                        <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: linear-gradient(to top, rgba(0 0 0 / 40%), rgba(0 0 0 / 60%)), url(<?php echo $wall[$i]->attachments[0]->link->photo->sizes[2]->url; ?>);background-repeat: no-repeat;background-size: cover;height: 100%;border-radius:6px;"">
                                                        <div class=" text-center p-4">

                                                            <h4 class="mt-3 lh-base fw-normal text-white"><b><?php echo $wall[$i]->text; ?></b></h4>
                                                            <p class="text-white-50 font-size-13">

                                                            </p>
                                                            <a href="https://vk.com<?php echo $url['path']; ?>" target="_blank" type="button" class="btn btn-light btn-sm"><i class="fa fa-bolt" aria-hidden="true"></i> Читать</a>
                                                        </div>
                                            </div>
                                            <!-- end carousel-item -->
                                        <?php
                                                    } else {
                                                        $string = substr($wall[$i]->text, 0, 100);
                                                        $string = rtrim($string, "!,.-");
                                                        $string = substr($string, 0, strrpos($string, ' '));


                                        ?>
                                            <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: linear-gradient(to top, rgba(0 0 0 / 40%), rgba(0 0 0 / 60%)), url(<?php echo $wall[$i]->attachments[0]->photo->sizes[2]->url; ?>);background-repeat: no-repeat;background-size: cover;height: 100%;border-radius:6px;"">
                                                        <div class=" text-center p-4">

                                                <h4 class="mt-3 lh-base fw-normal text-white"><b><?php echo $string . "… "; ?></b></h4>
                                                <p class="text-white-50 font-size-13">

                                                </p>
                                                <a href="https://vk.com<?php echo $url['path']; ?>" target="_blank" class="btn btn-light btn-sm"><i class="fa fa-bolt" aria-hidden="true"></i> Подробнее</a>
                                            </div>
                                        </div>
                                <?php
                                                    }
                                                } ?>
                                    </div>
                                </div>

                        </div>
                        <!-- end carousel -->
                    </div>
                <?php } else { ?>
                    <form method="post" action="/core/models/text-note.php" class="">
                        <textarea rows="12" class="form-control" name="text_note" placeholder="Напишите заметку"><?= $_SESSION['text_note']; ?></textarea>
                        <input type="hidden" name="note" value="true">
                        <div>
                            <button type="submit" class="btn btn-primary fr mt-4 mb-4"><i class="me-1"></i> Сохранить заметку</button>
                        </div>
                    </form>

                <?php } ?>
                </div>
                <!-- end card -->













                <div class="col-xl-4">
                    <!-- card -->
                    <div class="card text-white shadow-primary card-h-100">
                        <!-- card body -->
                        <div class="card-body p-0">
                            <?php if (BLOCK_BANNERS == 2) { ?>
                                <div id="carouselExampleCaptions" class="carousel slide text-center widget-carousel" data-bs-ride="carousel" style="height: 100%;">
                                    <div class="carousel-inner" style="height: 100%;">
                                        <?php if (TITLE_BANNER_1 != NULL) { ?>
                                            <div class="carousel-item active banner" style="background-image: linear-gradient(to top, rgba(0 0 0 / 40%), rgba(0 0 0 / 60%)), url(/assets/images/ads/<?php echo IMAGE_BANNER_1; ?>);background-repeat: no-repeat;background-size: cover;height: 100%;border-radius:6px;">

                                                <div class="text-center p-4">

                                                    <div class="avatar-md m-auto">
                                                        <span class="top_ads"></span>
                                                    </div>
                                                    <h4 class="mt-3 lh-base fw-normal text-white"><b><?= TITLE_BANNER_1; ?></b></h4>
                                                    <p class="text-white-50 font-size-13">
                                                        <?= DESC_BANNER_1; ?>
                                                    </p>
                                                    <a href="<?= URL_BUTTON_BANNER_1; ?>" target="_blank" type="button" class="btn btn-light btn-sm"><?= TEXT_BUTTON_BANNER_1; ?> <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                </div>

                                            </div>
                                            <!-- end carousel-item -->
                                        <?php } ?>
                                        <?php if (TITLE_BANNER_2 != NULL) { ?>
                                            <div class="carousel-item banner" style="background-image: linear-gradient(to top, rgba(0 0 0 / 40%), rgba(0 0 0 / 60%)), url(/assets/images/ads/<?php echo IMAGE_BANNER_2; ?>);background-repeat: no-repeat;background-size: cover;height: 100%;border-radius:6px;">
                                                <div class="text-center p-4">

                                                    <div class="avatar-md m-auto">
                                                        <span class="top_ads"></span>
                                                    </div>
                                                    <h4 class="mt-3 lh-base fw-normal text-white"><b><?= TITLE_BANNER_2; ?></b></h4>
                                                    <p class="text-white-50 font-size-13">
                                                        <?= DESC_BANNER_2; ?>
                                                    </p>
                                                    <a href="<?= URL_BUTTON_BANNER_2; ?>" target="_blank" type="button" class="btn btn-light btn-sm"><?= TEXT_BUTTON_BANNER_1; ?> <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                </div>
                                            </div>
                                            <!-- end carousel-item -->
                                        <?php } ?>
                                        <?php if (TITLE_BANNER_3 != NULL) { ?>
                                            <div class="carousel-item banner" style="background-image: linear-gradient(to top, rgba(0 0 0 / 40%), rgba(0 0 0 / 60%)), url(/assets/images/ads/<?php echo IMAGE_BANNER_3; ?>);background-repeat: no-repeat;background-size: cover;height: 100%;border-radius:6px;">
                                                <div class="text-center p-4">

                                                    <div class="avatar-md m-auto">
                                                        <span class="top_ads"></span>
                                                    </div>
                                                    <h4 class="mt-3 lh-base fw-normal text-white"><b><?= TITLE_BANNER_3; ?></b></h4>
                                                    <p class="text-white-50 font-size-13">
                                                        <?= DESC_BANNER_3; ?>
                                                    </p>
                                                    <a href="<?= URL_BUTTON_BANNER_3; ?>" target="_blank" type="button" class="btn btn-light btn-sm"><?= TEXT_BUTTON_BANNER_1; ?> <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                </div>
                                            </div>
                                            <!-- end carousel-item -->
                                        <?php } ?>
                                    </div>
                                    <!-- end carousel-inner -->

                                    <div class="carousel-indicators carousel-indicators-rounded">
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <!-- end carousel-indicators -->
                                </div>
                            <?php } else { ?>
                                <div class="no_banner">
                                    <div>
                                        <h5>Здесь может быть ваша реклама</h5>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>

        </div>


    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php include DIR . '/core/layouts/footer.php'; ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include DIR . '/core/layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include DIR . '/core/layouts/vendor-scripts.php'; ?>
<?php if ($_SESSION["role"] != 'admin') { ?>
<script>
    // Selecting all of the css classes  

    // on which we want to apply functionalities 

    const hr = document.querySelector('.hr')

    const min = document.querySelector('.min')

    const sec = document.querySelector('.sec')



    // Setting up the period of working 

    setInterval(() => {



        // Extracting the current time  

        // from DATE() function 

        let day = new Date()

        let hour = day.getHours()

        let minutes = day.getMinutes()

        let seconds = day.getSeconds()



        // Formula that is explained above for  

        // the rotation of different hands 

        let hrrotation = (30 * hour) + (0.5 * minutes);

        let minrotation = 6 * minutes;

        let secrotation = 6 * seconds;



        hr.style.transform =

            `translate(-50%,-100%) rotate(${hrrotation}deg)`

        min.style.transform =

            `translate(-50%,-100%) rotate(${minrotation}deg)`

        sec.style.transform =

            `translate(-50%,-85%) rotate(${secrotation}deg)`

    });
</script>
<?php } ?>
<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="assets/js/task.js"></script>
</body>

</html>