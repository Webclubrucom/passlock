(function ($) {

    'use strict';

    var language = localStorage.getItem('language');
    // Default Language
    var default_lang = 'ru';

    function setLanguage(lang) {
        if (document.getElementById("header-lang-img")) {
            if (lang == 'en') {
                document.getElementById("header-lang-img").src = "assets/images/flags/us.jpg";
            } else if (lang == 'sp') {
                document.getElementById("header-lang-img").src = "assets/images/flags/spain.jpg";
            } else if (lang == 'gr') {
                document.getElementById("header-lang-img").src = "assets/images/flags/germany.jpg";
            } else if (lang == 'it') {
                document.getElementById("header-lang-img").src = "assets/images/flags/italy.jpg";
            } else if (lang == 'ru') {
                document.getElementById("header-lang-img").src = "assets/images/flags/russia.jpg";
            }
            localStorage.setItem('language', lang);
            language = localStorage.getItem('language');
            getLanguage();
        }
    }

    // Multi language setting
    function getLanguage() {
        (language == null) ? setLanguage(default_lang): false;
        $.getJSON('assets/lang/' + language + '.json', function (lang) {
            $('html').attr('lang', language);
            $.each(lang, function (index, val) {
                (index === 'head') ? $(document).attr("title", val['title']): false;
                $("[data-key='" + index + "']").text(val);
            });
        });
    }

    function initMetisMenu() {
        //metis menu
        $("#side-menu").metisMenu();
    }

    function initCounterNumber() {
        var counter = document.querySelectorAll('.counter-value');
        var speed = 250; // The lower the slower
        counter.forEach(function (counter_value) {
            function updateCount() {
                var target = +counter_value.getAttribute('data-target');
                var count = +counter_value.innerText;
                var inc = target / speed;
                if (inc < 1) {
                    inc = 1;
                }
                // Check if target is reached
                if (count < target) {
                    // Add inc to count and output in counter_value
                    counter_value.innerText = (count + inc).toFixed(0);
                    // Call function every ms
                    setTimeout(updateCount, 1);
                } else {
                    counter_value.innerText = target;
                }
            };
            updateCount();
        });
    }

    function initLeftMenuCollapse() {
        var currentSIdebarSize = document.body.getAttribute('data-sidebar-size');
        $(window).on('load', function () {

            $('.switch').on('switch-change', function () {
                toggleWeather();
            });

            if (window.innerWidth >= 1024 && window.innerWidth <= 1366) {
                document.body.setAttribute('data-sidebar-size', 'sm');
                
            }
        });

        $('#vertical-menu-btn').on('click', function (event) {
            event.preventDefault();
            $('body').toggleClass('sidebar-enable');
            if ($(window).width() >= 992) {
                if (currentSIdebarSize == null) {
                    (document.body.getAttribute('data-sidebar-size') == null || document.body.getAttribute('data-sidebar-size') == "lg") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'lg')
                } else if (currentSIdebarSize == "md") {
                    (document.body.getAttribute('data-sidebar-size') == "md") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'md')
                } else {
                    (document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'lg'): document.body.setAttribute('data-sidebar-size', 'sm')
                }
            } else {
                // $('body').removeClass('vertical-collpsed');
                // document.body.removeAttribute('data-sidebar-size')
            }
        });
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("mm-active"); // add active to li of the current link
                $(this).parent().parent().addClass("mm-show");
                $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("mm-active");
                $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("mm-active");
            }
        });
    }

    function initMenuItemScroll() {
        // focus active menu in left sidebar
        $(document).ready(function () {
            if ($("#sidebar-menu").length > 0 && $("#sidebar-menu .mm-active .active").length > 0) {
                var activeMenu = $("#sidebar-menu .mm-active .active").offset().top;
                if (activeMenu > 300) {
                    activeMenu = activeMenu - 300;
                    $(".vertical-menu .simplebar-content-wrapper").animate({
                        scrollTop: activeMenu
                    }, "slow");
                }
            }
        });
    }

    function initHoriMenuActive() {
        $(".navbar-nav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active");
                $(this).parent().parent().addClass("active");
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().parent().parent().addClass("active");
            }
        });
    }

    function initFullScreen() {
        $('[data-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault();
            $('body').toggleClass('fullscreen-enable');
            if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
        document.addEventListener('fullscreenchange', exitHandler);
        document.addEventListener("webkitfullscreenchange", exitHandler);
        document.addEventListener("mozfullscreenchange", exitHandler);

        function exitHandler() {
            if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
                $('body').removeClass('fullscreen-enable');
            }
        }
    }

    function initDropdownMenu() {
        if (document.getElementById("topnav-menu-content")) {
            var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
            for (var i = 0, len = elements.length; i < len; i++) {
                elements[i].onclick = function (elem) {
                    if (elem && elem.target && elem.target.getAttribute("href") === "#") {
                        elem.target.parentElement.classList.toggle("active");
                        if (elem.target.nextElementSibling)
                            elem.target.nextElementSibling.classList.toggle("show");
                    }
                }
            }
            window.addEventListener("resize", updateMenu);
        }
    }

    function updateMenu() {
        var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
        for (var i = 0, len = elements.length; i < len; i++) {
            if (elements[i] && elements[i].parentElement && elements[i].parentElement.getAttribute("class") === "nav-item dropdown active") {
                elements[i].parentElement.classList.remove("active");
                if (elements[i].nextElementSibling)
                    elements[i].nextElementSibling.classList.remove("show");
            }
        }
    }

    function initComponents() {
        // tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // popover
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });

        // toast
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        })
    }

    function initPreloader() {
        $(window).on('load', function () {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
        });
    }

    function initSettings() {
        if (window.sessionStorage) {
            var alreadyVisited = sessionStorage.getItem("is_visited");
            if (!alreadyVisited) {
                sessionStorage.setItem("is_visited", "layout-ltr");
            } else {
                $("#" + alreadyVisited).prop('checked', true);
                // changeDirection(alreadyVisited);
            }
        }
    }

    function initLanguage() {
        // Auto Loader
        if (language != null && language !== default_lang)
            setLanguage(language);
        $('.language').on('click', function (e) {
            setLanguage($(this).attr('data-lang'));
        });
    }

    function initCheckAll() {
        $('#checkAll').on('change', function () {
            $('.table-check .form-check-input').prop('checked', $(this).prop("checked"));
        });
        $('.table-check .form-check-input').change(function () {
            if ($('.table-check .form-check-input:checked').length == $('.table-check .form-check-input').length) {
                $('#checkAll').prop('checked', true);
            } else {
                $('#checkAll').prop('checked', false);
            }
        });
    }

    

    function layoutSetting() {
        var body = document.getElementsByTagName("body")[0];
        // right side-bar toggle
        $('.right-bar-toggle').on('click', function (e) {
            $('body').toggleClass('right-bar-enabled');
        });

        $('#mode-setting-btn').on('click', function (e) {
            if (body.hasAttribute("data-layout-mode") && body.getAttribute("data-layout-mode") == "dark") {

                var formData = new FormData();
                formData.append('mode', 'light');
                formData.append('id', id);
                $.ajax({
                    url: 'core/models/mode.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {},
                    success: function (result) {
                        document.body.setAttribute('data-layout-mode', 'light');
                        document.body.setAttribute('data-topbar', 'light');
                        document.body.setAttribute('data-sidebar', 'light');
                        (body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal") ? '' : document.body.setAttribute('data-sidebar', 'light');
                        updateRadio('topbar-color-light')
                        updateRadio('sidebar-color-light')
                    }
                })
            } else {
                var formData = new FormData();
                formData.append('mode', 'dark');
                formData.append('id', id);
                $.ajax({
                    url: 'core/models/mode.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {},
                    success: function (result) {
                        document.body.setAttribute('data-layout-mode', 'dark');
                        document.body.setAttribute('data-topbar', 'dark');
                        document.body.setAttribute('data-sidebar', 'dark');
                        (body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal") ? '' : document.body.setAttribute('data-sidebar', 'dark');
                        updateRadio('layout-mode-dark')
                        updateRadio('sidebar-color-dark')
                    }
                })
            }
        });

        $(document).on('click', 'body', function (e) {
            if ($(e.target).closest('.right-bar-toggle, .right-bar').length > 0) {
                return;
            }
            $('body').removeClass('right-bar-enabled');
            return;
        });

        
       

        // on layou change
        $("input[name='layout']").on('change', function () {
            window.location.href = ($(this).val() == "vertical") ? "index.php" : "layouts-horizontal.php";
        });

        // on layout mode change
        $("input[name='layout-mode']").on('change', function () {
            if ($(this).val() == "light") {
                document.body.setAttribute('data-layout-mode', 'light');
                document.body.setAttribute('data-topbar', 'light');
                document.body.setAttribute('data-sidebar', 'light');
                (body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal") ? '' : document.body.setAttribute('data-sidebar', 'light');
                updateRadio('topbar-color-light')
                updateRadio('sidebar-color-light')
            } else {
                document.body.setAttribute('data-layout-mode', 'dark');
                document.body.setAttribute('data-topbar', 'dark');
                document.body.setAttribute('data-sidebar', 'dark');
                (body.hasAttribute("data-layout") && body.getAttribute("data-layout") == "horizontal") ? '' : document.body.setAttribute('data-sidebar', 'dark');
                updateRadio('topbar-color-dark')
                updateRadio('sidebar-color-dark')
            }
        });

        // on RTL-LTR mode change
        $("input[name='layout-direction']").on('change', function () {
            if ($(this).val() == "ltr") {
                document.getElementsByTagName("html")[0].removeAttribute("dir");
                document.getElementById('bootstrap-style').setAttribute('href', 'assets/css/bootstrap.min.css');
                document.getElementById('app-style').setAttribute('href', 'assets/css/app.min.css');
            } else {
                document.getElementById('bootstrap-style').setAttribute('href', 'assets/css/bootstrap-rtl.min.css');
                document.getElementById('app-style').setAttribute('href', 'assets/css/app-rtl.min.css');
                document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
            }
        });
    }

    function init() {
        initMetisMenu();
        initCounterNumber();
        initLeftMenuCollapse();
        initActiveMenu();
        initMenuItemScroll();
        initHoriMenuActive();
        initFullScreen();
        initDropdownMenu();
        initComponents();
        initSettings();
        initLanguage();
        initPreloader();
        layoutSetting();
        Waves.init();
        initCheckAll();
    }

    init();

})(jQuery)


feather.replace()

function showPw(id) {
    const field = document.getElementById(id);
    const eye = document.getElementById(`${id}-eye`);
    if (field.type == "text") {
        field.type = "password";
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    } else {
        field.type = "text";
        eye.classList.add("fa-eye-slash");
        eye.classList.remove("fa-eye");
    }
}

function copytext(el) {

    var $tmp = $("<textarea>");
    $("body").append($tmp);
    $tmp.val($(el).text().trim()).select();
    document.execCommand("copy");
    $tmp.remove();
    $("#message_copy").append("<div class='alert alert-success alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Скопировано!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
	setTimeout(function(){
		document.getElementById('message_copy').innerHTML = '';
	}, 2000)
}

const copy = document.querySelector(".copy_shortcode");

function copy_shortcode(copy) {

    var $tmp = $("<textarea>");
    $("body").append($tmp);
    $tmp.val($(copy).text().trim()).select();
    document.execCommand("copy");
    $tmp.remove();
    $("#message_copy").append("<div class='alert alert-success alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Скопировано!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
	setTimeout(function(){
		document.getElementById('message_copy').innerHTML = '';
	}, 2000)
}

document.addEventListener('click', ({
    target: t
}) => {
    if (t.matches('.click_icon')) {
        document.querySelector('[id="icon"]').value = t.childNodes[0].nodeValue;
    }
});


    
document.addEventListener('click', function (e) {
	if(e.target.classList.contains('click_icon_modal')){
		var modalEditCat = document.querySelector('.modal-cat.show')
		var iconModal = modalEditCat.querySelector('.icon_modal')
		iconModal.value = e.target.innerHTML;
	}

});

function showPw1(id) {
    const field = document.getElementById(id);
    const eye = document.getElementById(`${id}-eye`);
    const div = document.getElementById(`${id}_div`);
    if (div.style.display == 'none') {
        field.style.display = 'none';
        div.style.display = 'block';
        eye.classList.add("fa-eye-slash");
        eye.classList.remove("fa-eye");
    } else {
        field.style.display = 'block';
        div.style.display = 'none';
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");

    }
}

$("#input-generate").click(function () {
    $("#input-password").val(generatePassword());
	$('#input-password').focus(function(){
		$(this).select();
	});
    return false;
});

$("#input-generate-mob").click(function () {
    $("#input-password-mob").val(generatePassword());
	
    return false;
});

function generatePassword() {
    var length = 30,
        charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@-#$";
    if (window.crypto && window.crypto.getRandomValues) {
        return Array(length)
            .fill(charset)
            .map(x => x[Math.floor(crypto.getRandomValues(new Uint32Array(1))[0] / (0xffffffff + 1) * (x.length + 1))])
            .join('');
    } else {
        res = '';
        for (var i = 0, n = charset.length; i < length; ++i) {
            res += charset.charAt(Math.floor(Math.random() * n));
        }
        return res;
    }
}



