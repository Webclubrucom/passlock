<div id="Modal-add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Добавить пароль</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="catid" class="form-label">Категория</label>

                        <select name="catid" id="catid" class="form-control" required="">
                            <?php foreach ($categories as $category) { 
                                if($category['userid'] == $_SESSION['id']){
                            ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['cat']; ?></option>
                            <?php 
                                }
                            } ?>
                            <?php foreach ($categories as $category) { 
                                foreach ($access as $acces) {
                                    if($acces['catid'] == $category['id']){
                                        if($acces['add_pass_access'] == 2){
                                            $array = unserialize($acces['userid']);
                                            foreach($array as $row){
                                                if($row == $_SESSION['id']){
                                                    
                                                        ?>
                                                            <option value="<?php echo $category['id']; ?>"><?php echo $category['cat']; ?></option>
                                                        <?php 
                                                    
                                                }
                                            }
                                        }
                                    }
                                }
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name_pass" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name_pass" name="name_pass" placeholder="Введите название" required="">
                    </div>
                    <div class="mb-3">
                        <label for="site_pass" class="form-label">Ссылка</label>
                        <input type="url" class="form-control" id="site_pass" name="site_pass" placeholder="https://www.example.com" required="">
                    </div>
                    <div class="mb-3">
                        <label for="username_pass" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="username_pass" name="username_pass" placeholder="Введите логин" required="">
                    </div>
                    <div class="mb-3">
                        <label for="password_pass" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password_pass" name="password_pass" placeholder="Введите пароль" required="">
                        <div class="form-text">Мы никогда не передадим ваши пароли третьим лицам. Все пароли шифруются методом AES-128-ECB, которому требуется SECRETKEY.</div>
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