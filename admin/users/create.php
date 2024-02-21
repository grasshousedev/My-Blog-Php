<?php
include("../../path.php");
include(ROOT . "/app/controllers/users.php");
require_once(ROOT . "/app/include/head.php");
?>
<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>

        <div class="posts col-9">
            <?php require_once("../../app/include/buttons_admin.php") ?>
            <form action="create.php" method="POST">

                <div class="row title-table">
                    <h2>Добавить пользователя</h2>
                </div>
                <div class="mb-3 col err">
                    <?php require_once(ROOT . "/app/errors/error_info.php"); ?>
                </div>
                <div class="col mb-3">
                    <label for="login" class="form-label">Имя пользователя</label>
                    <input name="login" value="<?= $login ?>" type="text" class="form-control" id="login"
                           placeholder="Введите ваш логин">
                </div>
                <div class="col mb-3">
                    <label for="email" class="form-label">Адрес электронной почты</label>
                    <input name="email" value="<?= $email ?>" type="email" class="form-control" id="email">
                </div>
                <div class="col mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <div class="col mb-3">
                    <label for="password-verify" class="form-label">Повторите пароль</label>
                    <input name="password_check" type="password" class="form-control" id="password-verify">
                </div>
                <label for="select-role">Роль пользователя</label>
                <select name="admin" class="form-select mb-3" aria-label="Default select example" id="select-role">
                    <?php if ($admin == 0): ?>
                        <option value="0" selected>Пользователь</option>
                        <option value="1">Администратор</option>
                    <?php else: ?>
                        <option value="0">Пользователь</option>
                        <option value="1" selected>Администратор</option>
                    <?php endif; ?>
                </select>
                <div class="col">
                    <button name="create-user" class="btn btn-primary" type="submit">Создать пользователя</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php include("../../app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>