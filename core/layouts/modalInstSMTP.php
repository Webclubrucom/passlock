<div class="modal fade bs-example-modal-xl bs-smtp" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Настройка SMTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>MailPHP или SMTP</h6>
                <p class="mt-4">MailPHP - письма отправляются с локального сервера, не нуждаются в наличии почтового сервера.</p>
                <p>SMTP - можно отправлять как с локального, так и с удаленного, необходим почтовый сервер.</p>
                <p>При выборе MailPHP в настройках нет необходимости.</p>
                <p>При выборе SMTP в качестве почтового сервера можно использовать почтовый сервер вашего реального почтового ящика.</p>
                <p>В последнее время письма отправляемые с хостингов через метод MailPHP часто попадают в спам или совсем не доходят до адресатов. Альтернатива – это отправка e-mail через SMTP с реального почтового ящика.</p>
                <h6>Яндекс Почта</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.yandex.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@yandex.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <p>В настройках почты нужно разрешить доступ к почтовому ящику с помощью почтовых клиентов:</p>
                <div class="col-6">
                    <img src="assets/images/inst-yandex.jpg">
                </div>
                <h6>Mail.ru</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.mail.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@mail.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>Gmail</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.gmail.com</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@gmail.com</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <p>Если возникает ошибка при отправки почты, то нужно отключить двухфакторную авторизацию и разблокировать «ненадежные приложения» в <a href="https://myaccount.google.com/security?pli=1" target="_blank"> настройках конфиденциальности аккаунта</a></p>
                <div class="row">
                    <div class="col-6">
                        <img src="assets/images/gmail_1.jpg">
                    </div>
                    <div class="col-6">
                        <img src="assets/images/gmail_2.jpg">
                    </div>
                </div>
                
                
                <h6>Рамблер</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.rambler.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@rambler.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>iCloud</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.mail.me.com</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@icloud.com</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>Мастерхост</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.masterhost.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>Timeweb</h6>
                <p>Лимит – 2000 писем в день, но не более 5 в секунду.</p>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.timeweb.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>REG.RU</h6>
                <p>Лимит – 3000 писем в день.</p>
                <ul class="mt-4">
                    <li>SMTP сервер - serverXXX.hosting.reg.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <p>Имя сервера можно узнать в разделе «Информация о включенных сервисах и паролях доступа»:</p>
                <div class="row">
                    <div class="col-6">
                        <img src="assets/images/regru_1.jpg">
                    </div>
                    <div class="col-6">
                        <img src="assets/images/regru_2.jpg">
                    </div>
                </div>
                
                <h6>ДЖИНО</h6>
                <p>В разделе «Услуги» нужно включить опцию «SMTP-сервер»:</p>
                <div class="col-6">
                        <img src="assets/images/dgino.jpg">
                    </div>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.jino.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>nic.ru</h6>
                <p>В настройках веб-сервера необходимо включить PHP расширение «openssl».</p>
                <ul class="mt-4">
                    <li>SMTP сервер - mail.nic.ru</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>Бегет — beget.com</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.beget.com</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>
                <h6>Спринтхост — sprinthost.ru</h6>
                <ul class="mt-4">
                    <li>SMTP сервер - smtp.ВАШ_ДОМЕН</li>
                    <li>SMTP порт - 465</li>
                    <li>Имя пользователя - логин@домен.ru</li>
                    <li>Пароль - пароль от почтового ящика</li>
                </ul>




            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>