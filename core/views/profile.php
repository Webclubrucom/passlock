<?php
include DIR . '/core/layouts/session.php';
include DIR . '/core/models/settingsModel.php';
?>
<?php include DIR . '/core/layouts/head.php'; ?>
<?php include DIR . '/core/layouts/head-style.php'; ?>
<?php include DIR . '/core/layouts/body.php'; ?>
<?php include DIR . '/core/models/profileModel.php';

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
                        <form method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm order-2 order-sm-1 mb-4">
                                            <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xl me-3">
                                                        <img src="assets/images/users/<?php echo $_SESSION['photo_user']; ?>" alt="" class="img-fluid rounded-circle d-block">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div>
                                                        <h5 class="font-size-16 mb-1"><?php echo $_SESSION['username']; ?></h5>
                                                        <p class="text-muted font-size-13"><?php if ($_SESSION['role'] == 'admin') { ?>Администратор<?php } else { ?>Пользователь<?php } ?></p>

                                                        <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                            <?php 
                                                            
                                                            if ($_SESSION['office_user'] != "") { ?>
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo $_SESSION['office_user']; ?></div>
                                                            <?php } ?>
                                                            <?php if (isset($_SESSION['useremail'])) { ?>
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo $_SESSION['useremail']; ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto order-1 order-sm-2">
                                            <div class="d-flex align-items-start justify-content-end gap-2">
                                                <div>
                                                    <button type="submit" class="btn btn-primary"><i class="me-1"></i> Сохранить</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Имя пользователя</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Введите имя пользователя" value="<?php echo $_SESSION['username']; ?>" required="" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Введите Email пользователя" value="<?php echo $_SESSION['useremail']; ?>" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="office_user" class="form-label">Должность</label>
                                                <input type="text" class="form-control" id="office_user" name="office_user" placeholder="Введите должность пользователя" value="<?php echo $_SESSION['office_user']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="photo_user" class="form-label">Фото пользователя</label>
                                                <input type="file" class="form-control" id="photo_user" name="photo_user">
                                                <div class="form-text">Загрузите свое фото или симпатичную аватарку.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Новый пароль</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" id="password" class="form-control" placeholder="<?php echo $language["Enter_password"]; ?>" name="password" aria-label="Password" aria-describedby="password-addon">

                                                </div>
                                                <div class="form-text">Для сохранения текущего пароля оставьте поле "Новый пароль" пустым.</div>
                                            </div>
                                            <?php if ($current_secretkey == '') { ?>
                                                <div class="mb-3">
                                                    <label for="secretkey" class="form-label text-danger">Секретный ключ</label>
                                                    <input type="text" style="border: 1px solid #fd625e!important;" class="form-control" id="secretkey" name="secretkey" placeholder="Введите секретный ключ">
                                                    <div class="form-text text-danger">Секретный ключ необходим для шифрования паролей, он вводится один раз, после чего данное поле исчезнет.<br><strong>Сохраните его для восстановления ваших паролей в случае их утере.</strong></div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <input type="hidden" name="secretkey" value="<?php echo $current_secretkey; ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>



                                </div>
                                <!-- end card body -->
                            </div>

                        </form>


                    </div>
                </div>
                <!-- end page title -->

            </div>

        </div>



        <?php include DIR . '/core/layouts/footer.php'; ?>
        <?php include DIR . '/core/layouts/modalAddUser.php'; ?>


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