
<div id="Modal-<?php echo $user['id']; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Изменить пароль</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="hidden" name="edit_user" value="edit_user">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Имя пользователя</label>
                        <input type="text" class="form-control" id="username" name="username_edit" placeholder="Введите имя пользователя" value="<?php echo $user['username']; ?>" required="" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Введите Email пользователя" value="<?php echo $user['useremail']; ?>" required="" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><?php echo $language["Password"]; ?></label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" id="password" class="form-control" placeholder="<?php echo $language["Enter_password"]; ?>" name="password" aria-label="Password" aria-describedby="password-addon">
                            
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="office_user" class="form-label">Должность</label>
                        <input type="text" class="form-control" id="office_user" name="office_user" placeholder="Введите должность пользователя" value="<?php echo $user['office_user']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Роль</label>
                        <select name="role" id="role" class="form-control" required="">
                            
                                <option value="user" <?php if($user['role'] == 'user'){ ?>selected<?php } ?>>Пользователь</option>
                                <option value="admin" <?php if($user['role'] == 'admin'){ ?>selected<?php } ?>>Администратор</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_user" class="form-label">Статус</label>
                        <select name="status" id="status_user" class="form-control" required="">
                            
                                <option value="1" <?php if($user['status'] == '1'){ ?>selected<?php } ?>>Неактивный</option>
                                <option value="2" <?php if($user['status'] == '2'){ ?>selected<?php } ?>>Активный</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex" style="justify-content: space-between;">
                            <div>
                                <label for="photo_user" class="form-label">Фото пользователя</label>
                                <input type="file" class="form-control" id="photo_user" name="photo_user">
                            </div>
                            <div>
                                <img src="assets/images/users/<?= $user['photo_user']; ?>" alt="" class="rounded avatar-lg">
                            </div>
                        </div>
                        <div class="form-text">Загрузите свое фото или симпатичную аватарку.</div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> &nbsp;Сохранить</button>
            </form>
            <form method="post">
                <input type="hidden" name="user_delete" value="<?php echo $user['id']; ?>">
                <button type="submit" data-id="<?php echo $user['id']; ?>" class="btn btn-secondary waves-effect">Удалить</button>
            </form>
        </div>

    </div>
    </form>

</div>

</div>
</div>