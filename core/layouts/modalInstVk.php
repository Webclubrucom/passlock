<div class="modal fade bs-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Получение ID сообщества (или личной страницы) и токена ВКонтакте</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Получение ID сообщества или личной страницы</h6>
                <p>Чтобы узнать id группы или личной страницы ВКонтакте, нужно просто войти в группу или страницу и посмотреть в адресную строку браузера. Там Вы увидите ссылку типа vk.com/id1234567, vk.com/club1234567 или vk.com/group1234567, последние цифры и есть id группы или страницы.</p>
                <img src="assets/images/idgroupvk.png">
                <img src="assets/images/iduservk.png">
                <p class="mt-4">Однако некоторые ссылки вместо номера id, имеют в адресе навание группы или аккаунта.</p>
                <img src="assets/images/namegroupvk.png">
                <img src="assets/images/nameuservk.png">
                <p class="mt-4">В этом случае нужно нажать на любое фото или аватар, и в его ссылке Вы сможете найти id группы или личной страницы.</p>
                <img src="assets/images/photogroupvk.png" style="margin:0 65px 0 0;">
                <img src="assets/images/photouservk.png">
                <h6 class="mt-4">Создание приложения и получение токена</h6>
                <p>Для создания приложения можете в управление приложениями, в меню вы найдете пункт "Управление" - туда то вам и надо.</p>
                <div class="col-6">
                    <img src="assets/images/management.png" style="width:100%;">
                </div>
                <p class="mt-4">Если у вас нет такого пункта, не отчаивайтесь. Вы можете включить его показ в настройках аккаунта вк, либо можете перейти просто по ссылке: <a href="https://vk.com/apps?act=manage" target="_blank">Управление приложениями вк</a>.</p>
                <p>Нажимаем кнопочку "Создать приложение" и на следующей странице вводим название приложения и выбираем тип "Standalone-приложение", нажимаем кнопку "Подключить приложение".</p>
                <div class="col-6">
                    <img src="assets/images/Sozdanie-Standalone-prilozheniya-vkontakte.png" style="width:100%;">
                </div>
                <p class="mt-4">Идем дальше, перейдем в редактирование приложения и откроем вкладку "Настройки". На ней нам нужно взять "Сервисный ключ доступа" - это и есть наш токен.</p>
                <div class="col-6">
                    <img src="assets/images/Poluchaem-token-Standalone-prilozheniya-vk.png" style="width:100%;">
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>