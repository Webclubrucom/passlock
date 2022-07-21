/*  Менеджер паролей PassLock
	Автор: Михаил Абрамов
	Группа ВК: https://vk.com/webcreature
	Сайт: https://webcreature.site/
*/

const install = document.getElementById('install');

install.addEventListener('click', function (e) {
	var server_bd = document.getElementById('server_bd').value;
	var name_bd = document.getElementById('name_bd').value;
	var username_bd = document.getElementById('username_bd').value;
	var password_bd = document.getElementById('password_bd').value;
	
	var name_site = document.getElementById('name_site').value;
	var email_admin = document.getElementById('email_admin').value;
	var username_admin = document.getElementById('username_admin').value;
	var password_admin = document.getElementById('password_admin').value;
	
	if(server_bd == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите сервер базы данных!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(name_bd == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите имя базы данных!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(username_bd == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите имя пользователя базы данных!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(password_bd == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите пароль базы данных!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(name_site == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите название сайта!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(email_admin == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите Email администратора!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(username_admin == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите имя пользователя администратора!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	if(password_admin == ''){
		$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>Введите пароль администратора!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
		setTimeout(function(){
			document.getElementById('message').innerHTML = '';
		}, 10000)
	}
	
	if(server_bd != '' && name_bd!= '' && username_bd != '' && password_bd != '' && name_site != '' && email_admin != '' && username_admin != '' && password_admin != ''){
		
		var formData = new FormData();
		formData.append('installer', 'installer');
		formData.append('server_bd', server_bd);
		formData.append('name_bd', name_bd);
		formData.append('username_bd', username_bd);
		formData.append('password_bd', password_bd);
		formData.append('name_site', name_site);
		formData.append('email_admin', email_admin);
		formData.append('username_admin', username_admin);
		formData.append('password_admin', password_admin);

		$.ajax({
			url: 'core/models/installer.php',
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function () {},
			success: function (result) {
				if(result == 1){
					var confirmModal = document.querySelector('.confirmModal');
					confirmModal.classList.add('fade');
					confirmModal.classList.add('show');
					confirmModal.style.display = 'block';
					confirmModal.style.backgroundColor = 'rgba(52,58,64,.55)';
					confirmModal.setAttribute('aria-modal', 'true');
					confirmModal.setAttribute('role', 'dialog');
				} else {
					$("#message").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='mdi mdi-check-all me-2'></i>" + result +"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Закрыть'></button></div>");
					setTimeout(function(){
						document.getElementById('message').innerHTML = '';
					}, 10000)
				}
			}
		})
	}
	
	
})