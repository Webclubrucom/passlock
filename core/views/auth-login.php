<?php
// Инизиализация сессии
if (!isset($_SESSION)) session_start();

// Проверка, вошел ли пользователь уже в систему, если да, то перенаправляем его на панель управления.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /admin");
    exit;
}

include DIR . '/core/models/loginModel.php';

include DIR . '/core/layouts/head.php';
include DIR . '/core/layouts/head-style.php';
include DIR . '/core/layouts/body.php';

?>
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="/" class="d-block auth-logo">
                                    <img src="assets/images/logo.png" alt="" height="28"> <span class="logo-txt">Менеджер паролей</span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0"><?php echo $language["Welcome"]; ?></h5>
                                </div>
                                <div class="text-center">
                                    <span class="text-danger"><?php echo $verification_err; ?></span>
                                </div>

                                <form class="custom-form mt-4 pt-2" method="post">
                                    <div class="mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label class="form-label" for="username"><?php echo $language["Username"]; ?></label>
                                        <input type="text" class="form-control" id="username" placeholder="<?php echo $language["Enter_username"]; ?>" name="username">
                                        <span class="text-danger"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label" for="password"><?php echo $language["Password"]; ?></label>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="">
                                                    <a href="/recoverpw" class="text-muted"><?php echo $language["Forgot_password"]; ?></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="<?php echo $language["Enter_password"]; ?>" name="password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>

                                        </div>
                                        <span class="text-danger"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <label class="form-check-label" for="remember-check">
                                                    <?php echo $language["Remember_me"]; ?>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"><?php echo $language["Login"]; ?></button>
                                    </div>
                                </form>

                                <?php
                                foreach ($settings as $setting) {
                                    if ($setting['key_field'] == 'check_register') {
                                        if ($setting['value'] == '2') {
                                ?>
                                            <div class="mt-5 text-center">
                                                <p class="text-muted mb-0"><?php echo $language["Dont_have_an_account"]; ?> <a href="/register" class="text-primary fw-semibold"> <?php echo $language["Signup_now"]; ?> </a> </p>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="<?php echo SPECIALITY_1; ?>"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="<?php echo SPECIALITY_1; ?>"></button>

                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">
                                                    <?php echo REVIEWS_1; ?>
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/<?php echo IMAGES_REVIEWS_1; ?>" class="avatar-md img-fluid rounded-circle" alt="<?php echo SPECIALITY_1; ?>">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">
                                                                <?php echo NAME_REVIEWS_1; ?>
                                                            </h5>
                                                            <p class="mb-0 text-white-50">
                                                                <?php echo SPECIALITY_1; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">
                                                    <?php echo REVIEWS_2; ?>
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/<?php echo IMAGES_REVIEWS_2; ?>" class="avatar-md img-fluid rounded-circle" alt="<?php echo SPECIALITY_2; ?>">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">
                                                                <?php echo NAME_REVIEWS_2; ?>
                                                            </h5>
                                                            <p class="mb-0 text-white-50">
                                                                <?php echo SPECIALITY_2; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->

<?php include DIR . '/core/layouts/vendor-scripts.php'; ?>
<!-- password addon init -->
<script src="/assets/js/pages/pass-addon.init.js"></script>

</body>

</html>