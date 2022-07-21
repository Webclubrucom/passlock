<?php



?>
<div id="Modal-<?php echo $password['id']; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Изменить пароль</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $password['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="catid_pass_edit" class="form-label">Категория</label>
                            <p class="float-left">Последнее изменение: <?= $autor; ?></p>
                        </div>
                        <select name="catid_pass_edit" id="catid_pass_edit" class="form-control" required="">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $password['catid']) { ?>selected<?php } ?>><?php echo $category['cat']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name_pass_edit" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name_pass_edit" name="name_pass_edit" placeholder="Введите название" value="<?php echo $password['name_pass']; ?>" required="">
                    </div>
                    <div class="mb-3">
                        <label for="site" class="form-label">Ссылка</label>
                        <input type="url" class="form-control" id="site" name="site_pass_edit" placeholder="https://www.example.com" value="<?php echo $password['site']; ?>" required="">
                    </div>
                    <div class="mb-3">
                        <label for="username_pass_edit" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="username_pass_edit" name="username_pass_edit" placeholder="Введите логин" value="<?php echo $password['username']; ?>" required="">
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" id='password_edit_<?= $counter; ?>' class="form-control" placeholder="<?php echo $language["Enter_password"]; ?>" name="password_pass_edit" value="<?php echo $decryptedPwModal; ?>">
                            <button class="btn btn-light ms-0" type="button" id="password-edit-addon"><i class="fas fa-eye" id="password_edit_<?= $counter; ?>-eye" onclick="showPw('password_edit_<?= $counter; ?>')"> </i></button>
                        </div>
                        <div class="form-text">Мы никогда не передадим ваши пароли третьим лицам. Все пароли шифруются методом AES-128-ECB, которому требуется SECRETKEY.</div>
                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> &nbsp;Сохранить</button>
            </form>
            <form method="post">
                <input type="hidden" name="pass_delete" value="<?php echo $password['id']; ?>">
                <button type="submit" data-id="<?php echo $password['id']; ?>" class="btn btn-secondary waves-effect">Удалить</button>
            </form>
        </div>

    </div>
    </form>

</div>

</div>
</div>