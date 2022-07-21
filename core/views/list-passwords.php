<?php include DIR . '/core/layouts/session.php'; ?>
<?php include DIR . '/core/layouts/head.php'; ?>
<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include DIR . '/core/layouts/head-style.php'; ?>
<?php include DIR . '/core/layouts/body.php'; ?>
<?php include DIR . '/core/models/passwordModel.php';

?>
<?php foreach ($categories as $category) {
    if ($category['userid'] == $_SESSION['id']) {
        $cat_empty = $category['userid'];
    }
} ?>
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
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                    <div>
                                        <?php if (isset($cat_empty)) { ?>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-add"><i class="bx bx-plus me-1"></i> Добавить</button>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php if (isset($cat_empty)) { ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card" style="padding:15px;">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                            <?php
                                            $i = 0;
                                            foreach ($categories as $category) {
                                                if ($category['userid'] == $_SESSION['id']) {

                                                    $i++;
                                                    foreach ($access as $acces) {
                                                        if ($acces['catid'] == $category['id']) {
                                                            $array = unserialize($acces['userid']);
                                                            foreach ($array as $row) {
                                                                if ($row != '') {
                                                                    $cat_access = "<i class='bx bx-key'data-bs-toggle='tooltip' title='Вы открыли доступ'></i>";
                                                                }
                                                            }
                                                        }
                                                    }
                                            ?>

                                                    <a class="nav-link mb-2  <?php if ($i == 1) { ?>active<?php } ?> d-flex justify-content-between align-items-center" id="v-pills-<?php echo $category['id']; ?>-tab" data-bs-toggle="pill" href="#v-pills-<?php echo $category['id']; ?>" role="tab" aria-controls="v-pills-<?php echo $category['id']; ?>" aria-selected="true">
                                                        <div class="d-flex align-items-center">
                                                            <i class="<?php echo $category['icon']; ?>"></i>
                                                            <?php echo $category['cat']; ?>
                                                        </div>
                                                        <?= $cat_access; ?>
                                                    </a>

                                            <?php
                                                }
                                            } ?>
                                            <?php
                                            foreach ($categories as $category) {
                                                foreach ($access as $acces) {
                                                    if ($acces['catid'] == $category['id']) {

                                                        $array = unserialize($acces['userid']);
                                                        foreach ($array as $row) {
                                                            if ($row == $_SESSION['id']) {

                                            ?>
                                                                <a class="nav-link mb-2 d-flex justify-content-between align-items-center" id="v-pills-<?php echo $category['id']; ?>-tab" data-bs-toggle="pill" href="#v-pills-<?php echo $category['id']; ?>" role="tab" aria-controls="v-pills-<?php echo $category['id']; ?>" aria-selected="true">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="<?php echo $category['icon']; ?>"></i>
                                                                        <?php echo $category['cat']; ?>
                                                                    </div>

                                                                    <i class='bx bxs-key' style="font-size:14px;" data-bs-toggle="tooltip" title="Вам открыли доступ"></i>
                                                                </a>

                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>

                                </div><!-- end col -->
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="tab-content text-muted mt-4 mt-md-0 table-responsive mb-0 fixed-solution">

                                            <?php
                                            $i = 0;

                                            foreach ($categories as $category) {
                                                if ($category['userid'] == $_SESSION['id']) {
                                                    $i++;

                                            ?>
                                                    <div class="tab-pane fade <?php if ($i == 1) { ?>show active<?php } ?> sticky-table-header" id="v-pills-<?php echo $category['id']; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $category['id']; ?>-tab">
                                                        <div class="card-body">
                                                            <table class="table_passwords table table-bordered nowrap w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Название</th>
                                                                        <th>Ссылка</th>
                                                                        <th>Логин</th>
                                                                        <th>Пароль</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>



                                                                    <?php
                                                                    $counter = 1;

                                                                    foreach ($passwords as $password) {

                                                                        if ($category['id'] == $password['catid']) {
                                                                            $decryptedPw = openssl_decrypt($password["password"], "AES-128-ECB", $current_secretkey);

                                                                            $sql = "SELECT secretkey FROM users WHERE id = ?";

                                                                            if ($stmt = mysqli_prepare($link, $sql)) {
                                                                                // Bind variables to the prepared statement as parameters
                                                                                mysqli_stmt_bind_param($stmt, "s", $id);

                                                                                // Set parameters
                                                                                $id = $password['userid'];


                                                                                // Attempt to execute the prepared statement
                                                                                if (mysqli_stmt_execute($stmt)) {
                                                                                    // Store result
                                                                                    mysqli_stmt_store_result($stmt);

                                                                                    // Check if username exists, if yes then verify secretkey
                                                                                    if (mysqli_stmt_num_rows($stmt) == 1) {
                                                                                        // Bind result variables
                                                                                        mysqli_stmt_bind_result($stmt, $user_secretkey);
                                                                                        mysqli_stmt_fetch($stmt);
                                                                                    } else {
                                                                                    }
                                                                                } else {
                                                                                    echo $language["Oops"];
                                                                                }
                                                                            }
                                                                            $decryptedPwUserUser = openssl_decrypt($password["password"], "AES-128-ECB", $user_secretkey);




                                                                    ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Modal-<?php echo $password['id']; ?>">
                                                                                        <?php echo $password['name_pass']; ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="icons-actions">
                                                                                        <div class="text-eye" id="site_<?= $counter; ?>">
                                                                                            <?php echo $password['site']; ?>
                                                                                        </div>
                                                                                        <i class='bx bxs-copy-alt' onclick="copytext('#site_<?= $counter; ?>')"></i>
                                                                                    </div>
                                                                                </td>
                                                                                <td>


                                                                                    <div class="icons-actions">
                                                                                        <div class="text-eye" id="username_<?= $counter; ?>">
                                                                                            <?php echo $password['username']; ?>
                                                                                        </div>
                                                                                        <i class='bx bxs-copy-alt' onclick="copytext('#username_<?= $counter; ?>')"></i>
                                                                                    </div>

                                                                                </td>
                                                                                <td style="min-width: 225px;">

                                                                                    <div class="text-eye icons-actions" id="password_copy_<?= $counter; ?>">
                                                                                        <input readonly="readonly" class="password-eye form-control" disabled id='password_<?= $counter; ?>' type="password" value="<?php if ($decryptedPwUserUser != '') { ?><?php echo $decryptedPwUserUser; ?><?php } else { ?><?php echo $decryptedPw; ?><?php } ?>">
                                                                                        <div id='password_<?= $counter; ?>_div' style="display:none;"><?php if ($decryptedPwUserUser != '') { ?><?php echo $decryptedPwUserUser; ?><?php } else { ?><?php echo $decryptedPw; ?><?php } ?></div>
                                                                                        <div>
                                                                                            <i class="fas fa-eye" id="password_<?= $counter; ?>-eye" onclick="showPw1('password_<?= $counter; ?>')"></i>
                                                                                            <i class='bx bxs-copy-alt' onclick="copytext('#password_<?= $counter; ?>_div')"></i>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>

                                                                            </tr>


                                                                    <?php
                                                                        }

                                                                        $counter++;
                                                                    }

                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                            <?php
                                            foreach ($categories as $category) {
                                                foreach ($access as $acces) {

                                                    if ($acces['catid'] == $category['id']) {
                                                        $array = unserialize($acces['userid']);
                                                        foreach ($array as $row) {
                                                            if ($row == $_SESSION['id']) {


                                                                $sql = "SELECT secretkey FROM users WHERE id = ?";

                                                                if ($stmt = mysqli_prepare($link, $sql)) {
                                                                    // Bind variables to the prepared statement as parameters
                                                                    mysqli_stmt_bind_param($stmt, "s", $id);

                                                                    // Set parameters
                                                                    $id = $acces['access_userid'];


                                                                    // Attempt to execute the prepared statement
                                                                    if (mysqli_stmt_execute($stmt)) {
                                                                        // Store result
                                                                        mysqli_stmt_store_result($stmt);

                                                                        // Check if username exists, if yes then verify secretkey
                                                                        if (mysqli_stmt_num_rows($stmt) == 1) {
                                                                            // Bind result variables
                                                                            mysqli_stmt_bind_result($stmt, $user_secretkey);
                                                                            mysqli_stmt_fetch($stmt);
                                                                        } else {
                                                                        }
                                                                    } else {
                                                                        echo $language["Oops"];
                                                                    }
                                                                }



                                            ?>
                                                                <div class="tab-pane fade show  <?php if ($i == 1) { ?>active<?php } ?> sticky-table-header" id="v-pills-<?php echo $category['id']; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $category['id']; ?>-tab">
                                                                    <div class="card-body">
                                                                        <table class="table_passwords table table-bordered nowrap w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Название</th>
                                                                                    <th>Ссылка</th>
                                                                                    <th>Логин</th>
                                                                                    <th>Пароль</th>
                                                                                </tr>
                                                                            </thead>


                                                                            <tbody>



                                                                                <?php
                                                                                $counter = 1;

                                                                                foreach ($passwords as $password) {

                                                                                    if ($category['id'] == $password['catid']) {
                                                                                        $decryptedPwUser = openssl_decrypt($password["password"], "AES-128-ECB", $user_secretkey);
                                                                                        $decryptedPw = openssl_decrypt($password["password"], "AES-128-ECB", $current_secretkey);

                                                                                ?>

                                                                                        <tr>
                                                                                            <td><a href="javascript:void(0)" <?php if ($acces['edit_pass_access'] == 2) { ?>data-bs-toggle="modal" data-bs-target="#Modal-<?php echo $password['id']; ?>" <?php } ?>><?php echo $password['name_pass']; ?></a></td>
                                                                                            <td>
                                                                                                <div class="icons-actions">
                                                                                                    <div class="text-eye" id="site_<?= $counter; ?>">
                                                                                                        <?php echo $password['site']; ?>
                                                                                                    </div>
                                                                                                    <i class='bx bxs-copy-alt' onclick="copytext('#site_<?= $counter; ?>')"></i>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>


                                                                                                <div class="icons-actions">
                                                                                                    <div class="text-eye" id="username_<?= $counter; ?>">
                                                                                                        <?php echo $password['username']; ?>
                                                                                                    </div>
                                                                                                    <i class='bx bxs-copy-alt' onclick="copytext('#username_<?= $counter; ?>')"></i>
                                                                                                </div>

                                                                                            </td>
                                                                                            <td style="min-width: 225px;">
                                                                                                <div>
                                                                                                    <div class="text-eye icons-actions" id="password_copy_<?= $counter; ?>">
                                                                                                        <input readonly="readonly" class="password-eye form-control" disabled id='password_<?= $counter; ?>' type="password" value="<?php if ($decryptedPwUser != '') { ?><?php echo $decryptedPwUser; ?><?php } else { ?><?php echo $decryptedPw; ?><?php } ?>">
                                                                                                        <div id='password_<?= $counter; ?>_div' style="display:none;"><?php if ($decryptedPwUser != '') { ?><?php echo $decryptedPwUser; ?><?php } else { ?><?php echo $decryptedPw; ?><?php } ?></div>
                                                                                                        <div>
                                                                                                            <i class="fas fa-eye" id="password_<?= $counter; ?>-eye" onclick="showPw1('password_<?= $counter; ?>')"></i>
                                                                                                            <i class='bx bxs-copy-alt' onclick="copytext('#password_<?= $counter; ?>_div')"></i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>

                                                                                        </tr>


                                                                                <?php
                                                                                    }

                                                                                    $counter++;
                                                                                }

                                                                                ?>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h4><a href="/categories-passwords">Создайте категорию</a></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        <?php
                        $i = 0;
                        foreach ($categories as $category) {
                            $i++;

                            $counter = 1;
                            foreach ($passwords as $password) {

                                if ($password['userid'] == $_SESSION['id']) {
                                    $decryptedPwModal = openssl_decrypt($password["password"], "AES-128-ECB", $current_secretkey);

                                    $autor = $_SESSION['username'];
                                } else {
                                    $sql = "SELECT secretkey, username FROM users WHERE id = ?";

                                    if ($stmt = mysqli_prepare($link, $sql)) {
                                        // Bind variables to the prepared statement as parameters
                                        mysqli_stmt_bind_param($stmt, "s", $id);

                                        // Set parameters
                                        $id = $password['userid'];


                                        // Attempt to execute the prepared statement
                                        if (mysqli_stmt_execute($stmt)) {
                                            // Store result
                                            mysqli_stmt_store_result($stmt);

                                            // Check if username exists, if yes then verify secretkey
                                            if (mysqli_stmt_num_rows($stmt) == 1) {
                                                // Bind result variables
                                                mysqli_stmt_bind_result($stmt, $user_secretkey, $autor);
                                                mysqli_stmt_fetch($stmt);
                                            } else {
                                            }
                                        } else {
                                            echo $language["Oops"];
                                        }
                                    }
                                    $decryptedPwModal = openssl_decrypt($password["password"], "AES-128-ECB", $user_secretkey);
                                }


                                include DIR . '/core/layouts/modalEditPassword.php';

                                $counter++;
                            }
                        }

                        ?>


                    </div>
                </div>
                <!-- end page title -->

            </div>

        </div>



        <?php




        include DIR . '/core/layouts/footer.php'; ?>
        <?php include DIR . '/core/layouts/modalAddPassword.php'; ?>

        <div id="message_copy"></div>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<?php include DIR . '/core/layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include DIR . '/core/layouts/vendor-scripts.php'; ?>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>