<?php
require_once("../../path.php");
require_once(ROOT . "/app/controllers/comments.php");
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
                <h2>Управление комментарием</h2>
            </div>
            <form action="<?= BASE_URL . '/admin/comments/moderate.php'?>" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="mb-3">
                    <a href="<?=BASE_URL . '/single.php?post=' . $id_post?>">
                    <p>Название статьи</p>
                    <input disabled type="email" class="form-control" id="email" value="<?=htmlspecialchars($title)?>">
                    </a>
                </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input disabled type="email" class="form-control" name="email" id="email" value="<?=$email?>">
                    </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Комментарий</label>
                    <textarea disabled name="comment" id="comment" rows=4 class="form-control"><?=$comment?></textarea>
                </div>
                <div class="mb-3 col-12 form-check">
                    <label class="form-check-label" for="publish">
                        Опубликовать?
                    </label>
                    <?php if($status): ?>
                    <input name="publish" class="form-check-input" type="checkbox" value="" id="publish" checked>
                    <?php else: ?>
                    <input name="publish" class="form-check-input" type="checkbox" value="" id="publish">
                    <?php endif;?>
                </div>
                <div class="row">
                <div class="md-3 col-6">
                    <button name="btn-moderate" type="submit" class="btn btn-primary">Подтвердить</button>
                </div>
                <div class="md-3 col-6">
                    <button name="btn-delete" type="submit" class="btn btn-danger">Удалить</button>
                </div>
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