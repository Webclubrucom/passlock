<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/admin" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/<?php echo FAVICON; ?>" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/<?php echo FAVICON; ?>" alt="" height="24"> <span class="logo-txt"><?php echo TITLE; ?></span>
                    </span>
                </a>

                <a href="/admin" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/<?php echo FAVICON; ?>" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/<?php echo FAVICON; ?>" alt="" height="24"> <span class="logo-txt"><?php echo TITLE; ?></span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Генератор паролей" id="input-password">
                    <button class="btn btn-primary" type="button" id="input-generate"><i class="bx bx-transfer-alt align-middle"></i></button>
                </div>
            </div>
            <?php if ($current_secretkey == '') { ?>
                <div class="app-search d-lg-block">
                    <div class="alert alert-danger" role="alert">
                        Введите <a href="/profile" class="alert-link">секретный ключ</a>.
                    </div>
                </div>
            <?php } ?>




        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-transfer-alt align-middle"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">


                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Генератор паролей" id="input-password-mob">

                            <button class="btn btn-primary" type="button" id="input-generate-mob"><i class="bx bx-transfer-alt align-middle"></i></button>
                        </div>
                    </div>

                </div>
            </div>



            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/<?php echo $_SESSION["photo_user"]; ?>" alt="<?php echo $_SESSION["username"]; ?>">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION["username"]; ?> </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="/profile"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> <?php echo $language["Profile"]; ?></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> <?php echo $language["Logout"]; ?></a>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="/admin">
                        <i class="bx bx-layer"></i>
                        <span data-key="t-dashboard"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                </li>

                <li>
                    <a href="/list-passwords">
                        <i class='bx bx-lock-alt'></i>
                        <span data-key="t-lock">Пароли</span>
                    </a>
                </li>


                <li>
                    <a href="/categories-passwords">
                        <i class='bx bx-target-lock'></i>
                        <span data-key="t-target">Категории</span>
                    </a>
                </li>
                <li>
                    <a href="/profile">
                        <i class='bx bx-user'></i>
                        <span data-key="t-profile">Профиль</span>
                    </a>
                </li>
                <?php if ($_SESSION["role"] == 'admin') { ?>
                    <li>
                        <a href="/users">
                            <i class='bx bx-user-plus'></i>
                            <span data-key="t-user">Пользователи</span>
                        </a>
                    </li>


                    <li>
                        <a href="/settings">
                            <i class='bx bxs-brightness'></i>
                            <span data-key="t-settings">Настройки</span>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="/logout">
                        <i class='bx bx-exit'></i>
                        <span data-key="t-settings">Выход</span>
                    </a>
                </li>
            </ul>

            <!-- <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16"><?php echo $language["Unlimited_Access"]; ?></h5>
                        <p class="font-size-13"><?php echo $language["Upgrade_your_plan_from_a_Free_trial,_to_select_‘Business_Plan’"]; ?>.</p>
                        <a href="#!" class="btn btn-primary mt-2"><?php echo $language["Upgrade_Now"]; ?></a>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
