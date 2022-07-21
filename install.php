<?php
/*  Менеджер паролей PassLock
	Автор: Михаил Абрамов
	Группа ВК: https://vk.com/webcreature
	Сайт: https://webcreature.site/
*/

define('DIR', $_SERVER['DOCUMENT_ROOT']); // Абсолютный путь к корневой директории
$title = 'Установка PassLock';
include DIR . '/core/layouts/head.php';
include DIR . '/core/layouts/head.php';
?>
<link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">
<?php
include DIR . '/core/layouts/head-style.php';
?>
<style>
	.nav-link i.bx {
		padding: 0;
	}

	#message {
		position: absolute;
		top: 20px;
		right: 30px;
	}
</style>

<body>
	<div style="padding: 20px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title mb-0">Установка PassLock Lite</h4>
						</div>
						<div class="card-body">
							<div id="basic-pills-wizard" class="twitter-bs-wizard">
								<ul class="twitter-bs-wizard-nav">
									<li class="nav-item">
										<a href="#information" class="nav-link" data-toggle="tab">
											<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Информация">
												<i class='bx bx-info-circle'></i>
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a href="#database" class="nav-link" data-toggle="tab">
											<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="База данных">
												<i class='bx bx-data'></i>
											</div>
										</a>
									</li>

									<li class="nav-item">
										<a href="#administration" class="nav-link" data-toggle="tab">
											<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Настройка">
												<i class='bx bxs-brightness'></i>
											</div>
										</a>
									</li>
								</ul>
								<!-- wizard-nav -->

								<div class="tab-content twitter-bs-wizard-tab-content">
									<div class="tab-pane" id="information">
										<div class="text-center mb-4">
											<h5>Информация</h5>
											<p class="card-title-desc"></p>
										</div>
										<div class="row">
											<p class="mt-4">
												PassLock - надежный менеджер паролей для вашей компании. PassLock упрощает
												совместную работу с корпоративными паролями. Используйте защищенные
												хранилища, настраивайте права пользователей, отслеживайте все
												действия и изменения, копируйте логины и пароли в один клик.
											</p>
											<p class="mt-4">
												PassLock подходит, как совместного хранения паролей, так и для индивидуального.
												Отключите регистрацию и лендинг в пару кликов и храните собственные пароли надежно.
												В PassLock PRO встроена система SAAS - создайте тарифные планы и привлекайте посетителей,
												зарабатывайте на предоставлении услуг по хранению паролей.
											</p>
											<p class="mt-4">
												PassLock — это менеджер паролей нового поколения, созданный для профессионалов,
												ИТ-специалистов и компаний. PassLock надежно хранит пароли в структурированном
												виде (категории паролей) с настройкой доступов пользователей и подходит как для совместной
												работы внутри компаний, так и для личного использования.
											</p>
										</div>
										<ul class="pager wizard twitter-bs-wizard-pager-link">
											<li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Далее <i class="bx bx-chevron-right ms-1"></i></a></li>
										</ul>
									</div>
									<!-- tab pane -->

									<div class="tab-pane" id="database">
										<div>
											<div class="text-center mb-4">
												<h5>База данных</h5>
												<p class="card-title-desc">Заполните поля для подключения к базе данных</p>
											</div>

											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="server_bd" class="form-label">Сервер базы данных</label>
														<input type="text" class="form-control" id="server_bd" name="server_bd" value="localhost" placeholder="localhost">
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label for="name_bd" class="form-label">Имя базы данных</label>
														<input type="text" class="form-control" id="name_bd" name="name_bd" value="" placeholder="Введите имя базы данных">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="username_bd" class="form-label">Имя пользователя</label>
														<input type="text" class="form-control" id="username_bd" name="username_bd" value="" placeholder="Введите имя пользователя">
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label for="password_bd" class="form-label">Пароль</label>
														<input type="text" class="form-control" id="password_bd" name="password_bd" value="" placeholder="Введите пароль">
													</div>
												</div>
											</div>
											</form>
											<ul class="pager wizard twitter-bs-wizard-pager-link">
												<li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Назад</a></li>
												<li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Далее <i class="bx bx-chevron-right ms-1"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- tab pane -->

									<div class="tab-pane" id="administration">
										<div>
											<div class="text-center mb-4">
												<h5>Настройка</h5>
												<p class="card-title-desc">Заполните поля для начальной настройки сайта.</p>
											</div>

											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="name_site" class="form-label">Название сайта</label>
														<input type="text" class="form-control" id="name_site" name="name_site" value="" placeholder="Введите название сайта">
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label for="email_admin" class="form-label">Email</label>
														<input type="email" class="form-control" id="email_admin" name="email_admin" value="" placeholder="Введите Email администратора">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="username_admin" class="form-label">Логин</label>
														<input type="text" class="form-control" id="username_admin" name="username_admin" value="" placeholder="Введите логин администратора">
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label for="password_admin" class="form-label">Пароль</label>
														<input type="text" class="form-control" id="password_admin" name="password_admin" value="" placeholder="Введите пароль администратора">
													</div>
												</div>
											</div>


											<ul class="pager wizard twitter-bs-wizard-pager-link">
												<li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Назад</a></li>
												<li class="float-end" id="install"><button type="button" class="btn btn-primary">Установить</button></li>
											</ul>
										</div>
									</div>

								</div>

							</div>
						</div>

					</div>

				</div>

			</div>

			<div id="message"></div>



			<!-- Modal -->
			<div class="modal fade confirmModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header border-bottom-0"></div>
						<div class="modal-body">
							<div class="text-center">
								<div class="mb-3">
									<i class="bx bx-check-circle display-4 text-success"></i>
								</div>
								<h5>PassLock успешно установлен!</h5>
								<p class="mt-4">Не забудьте удалить файлы <strong>install.php</strong> и <strong>passlock.sql</strong> из корневого каталога вашего сайта.</p>
							</div>
						</div>
						<div class="modal-footer justify-content-center mb-4">
							<a href="/admin" class="btn btn-light w-md">Панель управления</a>
							<a href="/" class="btn btn-primary w-md">Сайт</a>
						</div>
					</div>
				</div>
			</div>
			<script src="assets/js/installer.js"></script>
			<?php include DIR . '/core/layouts/vendor-scripts.php'; ?>

			<script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
			<script src="assets/libs/twitter-bootstrap-wizard/prettify.js"></script>

			<script src="assets/js/pages/form-wizard.init.js"></script>

			<script src="assets/js/app.js"></script>

		</div>
	</div>
</body>

</html>