<?php
include("path.php");
include("app/controllers/users.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/client.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Montserrat:wght@400;800&family=Roboto&display=swap"
          rel="stylesheet">

</head>
<body>
<?php include("app/include/header.php"); ?>


<!--FORM-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="reg.php">
        <h2>Форма регистрации</h2>
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
            <label for="email" class="form-label">Адрес электронной почты</label>
            <input name="email" value="<?=$email?>" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Мы не присылаем спам на ваш email</div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="password-verify" class="form-label">Повторите пароль</label>
            <input name="password_check" type="password" class="form-control" id="password-verify">
        </div>
        <div class="w-100"></div>
        <div class="col-12 col-md-4 mb-5">
            <button type="submit" class="btn btn-secondary" name="button-reg">Регистрация</button>
            <a href="auth.php">Войти</a>
        </div>
    </form>
</div>
<!--END FORM-->
<?php include("app/include/footer.php") ?>

<!--end footer-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>