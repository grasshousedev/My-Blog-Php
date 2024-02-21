<?php include("../../path.php");
include("../../app/controllers/categories.php");
require_once(ROOT . "/app/include/head.php");
?>

<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>

        <div class="posts col-9">
            <?php require_once("../../app/include/buttons_admin.php") ?>


            <div class="row add-post">
                <form action="edit.php" method="POST">
                    <div class="row title-table">
                        <h2>Обновить категорию</h2>
                    </div>
                    <div class="mb-3 col err">
                        <?php require_once(ROOT . "/app/errors/error_info.php"); ?>
                    </div>
                    <div class="col mb-3">
                        <input value="<?=$id?>" name="id" type="hidden">
                    </div>
                    <div class="col mb-3">
                        <label for="title" class="form-label">Имя категории</label>
                        <input value="<?=$name?>" type="text" name="name" class="form-control" id="title" placeholder="Имя категории..."
                               aria-label="Название статьи">
                    </div>
                    <div class="col mb-3">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea name="description" class="form-control" id="content" rows="6"><?=$description?> </textarea>
                    </div>
                    <div class="col">
                        <button name="category-edit" class="btn btn-primary" type="submit">Подтвердить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../../app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>