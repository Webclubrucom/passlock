<?php
include DIR . '/core/layouts/session.php';
include DIR . '/core/models/settingsModel.php';
include DIR . '/core/layouts/head.php';
include DIR . '/core/layouts/head-style.php';
include DIR . '/core/layouts/body.php';
?>
<div id="layout-wrapper">
    <?php include DIR . '/core/layouts/menu.php'; ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid container-add-passwords">
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
            </div>
        </div>
        <?php include DIR . '/core/layouts/footer.php'; ?>
    </div>
</div>
<?php
include DIR . '/core/layouts/right-sidebar.php';
include DIR . '/core/layouts/vendor-scripts.php';
?>
<script src="assets/js/app.js"></script>
</body>

</html>