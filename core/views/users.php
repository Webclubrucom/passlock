<?php 
include DIR . '/core/layouts/session.php';
include DIR . '/core/models/settingsModel.php'; 
?>
<?php include DIR . '/core/layouts/head.php'; ?>
<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include DIR . '/core/layouts/head-style.php'; ?>
<?php include DIR . '/core/layouts/body.php'; ?>
<?php include DIR . '/core/models/usersModel.php';

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

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <span class="text-danger"><?php echo $useremail_err; ?> </span>
                                    <span class="text-danger"><?php echo $username_err; ?> </span>
                                    <span class="text-danger"><?php echo $password_err; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                    <div>
                                        <button data-bs-toggle="modal" data-bs-target="#Modal-add" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mb-4">
                            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                    <tr>

                                        <th scope="col">Имя пользователя</th>
                                        <th scope="col">Должность</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Роль</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Дата регистрации</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($users as $user) { 
                                            
                                            if($user['id'] != $_SESSION['id']){

                                        ?>
                                        <tr>
                                            <td>
                                                <img src="assets/images/users/<?= $user['photo_user']; ?>" alt="" class="avatar-sm rounded-circle me-2">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#Modal-<?php echo $user['id']; ?>"><?= $user['username']; ?></a>
                                            </td>
                                            <td><?= $user['office_user']; ?></td>
                                            <td><?= $user['useremail']; ?></td>
                                            <td><?php if($user['role'] == 'user'){?>Пользователь<?php } else { ?>Администратор<?php } ?></td>
                                            <td><?php if($user['status'] == 1){?>Неактивный<?php } else { ?>Активный<?php } ?></td>
                                            <td><?= date('d.m.Y [H:i]', strtotime($user['created_at'])); ?></td>
                                        </tr>
                                        <?php include DIR . '/core/layouts/modalEditUser.php'; ?>
                                    <?php 
                                            }
                                        } 
                                    ?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- end table responsive -->



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
<script src="assets/js/pages/datatable-pages.init.js"></script>
<script src="/assets/js/pages/pass-addon.init.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>