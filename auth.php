<?php
include("path.php");
include("app/controllers/users.php");
include("app/include/head.php");
?>
<body>
<?php include("app/include/header.php"); ?>


<!--FORM-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="auth.php">
        <h2>Авторизация</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?php include(ROOT . '/app/errors/error_info.php');?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="login" class="form-label">Имя пользователя</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="login" placeholder="Введите ваш логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="w-100"></div>
        <div class="col-12 col-md-4 mb-5">
            <button type="submit" class="btn btn-secondary" name="button-auth">Войти</button>
            <a href="reg.php">Регистрация</a>
        </div>
    </form>
</div>
<!--END FORM-->
<?php include("app/include/footer.php") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>