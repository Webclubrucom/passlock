<?php
include DIR . '/core/layouts/session.php';
include DIR . '/core/models/settingsModel.php';
include DIR . '/core/models/categoriesModel.php';
include DIR . '/core/models/usersModel.php';
include DIR . '/core/layouts/head.php';

?>
<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
<?php
include DIR . '/core/layouts/head-style.php';
include DIR . '/core/layouts/body.php';

foreach ($access as $acces) {
}

?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include DIR . '/core/layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

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



                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label for="cat" class="form-label">Название</label>
                                                <input type="text" class="form-control" id="cat" name="cat" placeholder="Введите название" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="icon" class="form-label">Иконка</label>
                                                <div class="input-group">

                                                    <input type="text" id="icon" class="form-control" placeholder="bx bx-sticker" name="icon" aria-label="Icon" aria-describedby="icon-addon">
                                                    <button class="btn btn-light ms-0" type="button" id="icon-addon" data-bs-toggle="modal" data-bs-target=".icon_md_new"><i class='bx bx-label'></i></button>

                                                </div>
                                                <div class="form-text">Выберите иконку из каталога <a href="https://boxicons.com/" target="_blank">Boxicons</a>.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="content" class="form-label">Описание</label>
                                                <textarea type="text" class="form-control" id="content" name="content" placeholder="Напишите описание категории"></textarea>

                                            </div>


                                            <button type="submit" class="btn btn-primary " style="float:right;"><i class="fas fa-check-circle"></i> &nbsp;Добавить</button>


                                        </form>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="tab-content text-muted mt-4 mt-md-0 table-responsive mb-0 fixed-solution" id="v-pills-tabContent" data-pattern="priority-columns">
                                        <div class="tab-pane fade show active sticky-table-header" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="card-body">
                                                <table id="datatable" class="table table-bordered  w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Название</th>
                                                            <th>Описание</th>
                                                            <th>Участники</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($categories as $category) { ?>
                                                            <tr id="cat-<?php echo $category['id']; ?>">
                                                                <td>
                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#Modal-<?php echo $category['id']; ?>">
                                                                        <i class='icon-table <?php echo $category['icon']; ?>'></i> <?php echo $category['cat']; ?>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $category['content']; ?>
                                                                </td>
                                                                <th>
                                                                    <div class="d-flex align-items-center"> 
                                                                        <?php foreach ($user_cat_user as $user_cat) { ?> 
                                                                            <?php if ($user_cat['catid'] == $category['id']) { ?>
                                                                                <?php $users_uncat = unserialize($user_cat['userid']); ?> 
                                                                                <?php foreach ($users_uncat as $users_un) { ?>
                                                                                    <?php foreach ($users as $user) { ?>
																						<?php if ($user['id'] == $users_un) { ?>
																							<img src="assets/images/users/<?php echo $user['photo_user']; ?>" alt="" class="rounded-circle avatar-sm av_user" data-bs-toggle="tooltip" title="<?php echo $user['username']; ?>">
																						<?php } ?>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            <?php include DIR . '/core/layouts/modalCategories.php'; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <div class="modal fade icon_md_new bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Выберите иконку</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <?php include DIR . '/core/layouts/icons.php'; ?>

                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div class="modal fade icon_md_edit bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Выберите иконку</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">

                            <?php include DIR . '/core/layouts/icons-edit.php'; ?>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>




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
<!-- choices js -->
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>

<script src="assets/js/app.js"></script>

<script>
    $(function() {
        $('.select_user').change(function(e) {
            var selected = $(e.target).val();
            var arr = JSON.stringify(selected);
            var inputPostParent = $(e.target).parent().parent();
            var inputPost = inputPostParent.next();
            inputPost.val(selected);
        });

        var inputcatAll = $('.select_user');
        //console.log(inputcatAll);

        for (var i = 0; i < inputcatAll.length; i++) {
            var valueSel = $(inputcatAll[i]).val();
            var inputPostParent = $(inputcatAll[i]).parent().parent();
            var inputPost = inputPostParent.next();
            inputPost.val(valueSel);
        }

        var values = $('.select_user').val();
        document.querySelector('.form_users').value = values;

    });
</script>


</body>

</html>