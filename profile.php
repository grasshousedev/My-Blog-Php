<?php
include('path.php');
include(ROOT . '/app/controllers/profile.php');
if ($_SESSION) {
    $user = selectAny('users', ['id' => $_SESSION['id']], 1);
    tt($user);
}
require_once(ROOT . "/app/include/head.php");
?>
<body>
<?php include("app/include/header.php"); ?>

<!-- main -->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2>Ваш профиль</h2>
            <div class="row">
                <div class="img col-6">
                    <img src="<?= BASE_URL . 'assets/images/posts/' . $user['id_avatar'] ?>" alt="User avatar"
                         class="img-thumbnail">
                </div>
                <div class="col">

                <form action="profile.php" method="post">
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <div class="row">
                        <label for="login" class="form-label">Имя пользователя</label>
                        <div class="info col-8">
                            <input class="form-control" type="text" id="login" name="login" value="<?=$user['username']?>">
                        </div>
                        <div class="col-4">
                            <button name="btn-change-login" type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label" for="email">Электронная почта</label>
                        <div class="info col-8">
                            <input class="form-control" type="email" id="email" name="email" value="<?= $user['email'] ?>">
                        </div>
                        <div class="col-4">
                            <button name="btn-change-email" type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </div>
                </form>
                </div>

            </div>
        </div>

        <?php include(ROOT . '/app/include/sidebar.php'); ?>

    </div>

</div>

<!--Main end-->
<?php include("app/include/footer.php") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>