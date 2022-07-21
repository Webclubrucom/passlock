<div id="Modal-<?php echo $category['id']; ?>" class="modal modal-cat fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Изменить категорию</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">

                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                    <div class="mb-3">
                        <label for="cat_edit" class="form-label">Название</label>
                        <input type="text" class="form-control" id="cat_edit" name="cat_edit" value="<?php echo $category['cat']; ?>" placeholder="Введите название" required="">
                    </div>
                    <div class="mb-3">
                        <label for="icon_modal" class="form-label">Иконка</label>
                        <div class="input-group">

                            <input type="text" id="icon_modal" class="form-control icon_modal" value="<?php echo $category['icon']; ?>" placeholder="bx bx-sticker" name="icon" aria-label="Icon" aria-describedby="icon-addon">
                            <button class="btn btn-light ms-0" type="button" id="icon-addon" data-bs-toggle="modal" data-bs-target=".icon_md_edit"><?php if ($category['icon'] != '') { ?><i class='<?php echo $category['icon']; ?>'></i><?php } else { ?><i class="bx bx-label"></i><?php } ?></button>

                        </div>
                        <div class="form-text">Выберите иконку из каталога <a href="https://boxicons.com/" target="_blank">Boxicons</a>.</div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Описание</label>
                        <textarea type="text" class="form-control" id="content" name="content" placeholder="Напишите описание категории"><?php echo $category['content']; ?></textarea>

                    </div>

                    <div class="mb-3">
                        <div class=" mb-3 d-grid">

                            <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample-<?php echo $category['id']; ?>" aria-expanded="false" aria-controls="collapseExample-<?php echo $category['id']; ?>">
                                Предоставить доступ к категории
                            </button>

                        </div>

                        <div class="collapse inputcat" id="collapseExample-<?php echo $category['id']; ?>">
                            <p class="form-text">Начните вводить имя пользователя, которому хотите разрешить просматривать пароли из этой категории. Если необходимо, то выберите несколько. Будьте внимательны при выборе имени пользователя, уточните у пользователя его имя в системе.</p>
                            <?php
                            foreach ($user_cat_users as $user_cat_user) {
                                if ($user_cat_user['catid'] == $category['id']) {
                                    if ($user_cat_user['add_pass_access'] == '2') {
                                        $add_checked = 'checked';
                                    } else {
                                        $add_checked = '';
                                    }
                                    if ($user_cat_user['edit_pass_access'] == '2') {
                                        $edit_checked = 'checked';
                                    } else {
                                        $edit_checked = '';
                                    }
                                }
                            }
                            ?>
                            <select class="form-control select_user" data-trigger name="user_access[]" placeholder="Введите имя пользователя" multiple>

                                <?php
                                foreach ($users as $user) {
                                    foreach ($user_cat_users as $user_cat_user) {
                                        if ($user_cat_user['catid'] == $category['id']) {
                                            $array = unserialize($user_cat_user['userid']);
                                            foreach ($array as $row) {
                                                if ($row == $user['id']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                            }
                                        }
                                    }
                                ?>
                                    <?php if ($user['id'] != $_SESSION['id']) { ?>
                                        <option value="<?php echo $user['id']; ?>" <?php echo $selected; ?>><?php echo $user['username']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <input class="form_users" type="hidden" name="access_user" value="">
                            <div class="row">
                                <p class="form-text">Выберите действия над паролями в данной категории, которые разрешаете выполнять пользователям с открытым доступом к данной категории. При изменении вашего пароля, как и при добавлении нового, используется секретный ключ, того пользователя, который изменяет или добавляет пароль.</p>
                                <div class="col-6">
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="edit_pass_access" value="2" name="edit_pass_access" <?php echo $edit_checked; ?>>
                                        <label for="edit_pass_access" class="form-check-label">Изменять и удалять</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="add_pass_access" value="2" name="add_pass_access" <?php echo $add_checked; ?>>
                                        <label for="add_pass_access" class="form-check-label">Добавлять</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>





                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Сохранить</button>
            </form>
            <form method="post">
                <input type="hidden" name="cat_delete" value="<?php echo $category['id']; ?>">
                <button type="submit" data-id="<?php echo $category['id']; ?>" class="btn btn-secondary waves-effect">Удалить</button>
            </form>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->