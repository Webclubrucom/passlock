<div id="Modal-add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Добавить пароль</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="username" class="form-label">Имя пользователя</label>
                        <input type="text" class="form-control" id="username" name="username_add" placeholder="Введите имя пользователя" required="">
                    </div>
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Введите Email пользователя" required="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><?php echo $language["Password"]; ?></label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" id="password" class="form-control" placeholder="<?php echo $language["Enter_password"]; ?>" name="password" aria-label="Password" aria-describedby="password-addon">
                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="office_user" class="form-label">Должность</label>
                        <input type="text" class="form-control" id="office_user" name="office_user" placeholder="Введите должность пользователя">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Роль</label>
                        <select name="role" id="role" class="form-control" required="">
                            
                                <option value="user">Пользователь</option>
                                <option value="admin">Администратор</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_user" class="form-label">Статус</label>
                        <select name="status" id="status_user" class="form-control" required="">
                            
                                <option value="1">Неактивный</option>
                                <option value="2">Активный</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex" style="justify-content: space-between;">
                            <div>
                                <label for="photo_user" class="form-label">Фото пользователя</label>
                                <input type="file" class="form-control" id="photo_user" name="photo_user">
                            </div>
                            <div>
                                <img src="assets/images/users/default.png" alt="" class="rounded avatar-lg">
                            </div>
                        </div>
                        <div class="form-text">Загрузите свое фото или симпатичную аватарку.</div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> &nbsp;Сохранить</button>
                    </div>

                </div>
            </form>

        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->