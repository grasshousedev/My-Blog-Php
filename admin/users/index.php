<?php
require_once("../../path.php");
require_once(ROOT . '/app/controllers/users.php');
require_once(ROOT . "/app/include/head.php");
?>
<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>
        <div class="posts col-9">
            <?php require_once("../../app/include/buttons_admin.php") ?>

            <div class="row title-table">
                <h2>Управление пользователями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Логин</div>
                <div class="col-4">Роль</div>
                <div class="col-2">Управление</div>
            </div>
            <?php foreach($users as $key=>$user): ?>
            <div class="row post">
                <div class="col-1"><?=$key+1?></div>
                <div class="col-5"><?=$user['username']?></div>
                <?php if($user['admin']): ?>
                <div class="col-4">Администратор</div>
                <?php else: ?>
                <div class="col-4">Пользователь</div>
                <?php endif; ?>
                <div class="col-1 edit"><a href="edit.php?id=<?=$user['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></div>
                <div class="col-1 delete"><a href="edit.php?delete_id=<?=$user['id']?>"><i class="fa-solid fa-trash"></i></a></div>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
<?php include("../../app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>