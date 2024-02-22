<?php
require_once('../../path.php');
require_once(ROOT . "/app/controllers/posts.php");
require_once(ROOT . "/app/include/head.php");
?>
<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>

        <div class="posts col-9">

            <div class="row title-table">
                <h2>Редактирование записи</h2>
            </div>
            <div class="row add-post">
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <div class="mb-3 col err">
                        <?php include(ROOT . "/app/errors/error_info.php") ?>
                    </div>
                    <div class="col mb-4">
                        <label for="title" class="form-label">Заголовок статьи</label>
                        <input value="<?=htmlspecialchars($title)?>" name="title" type="text" class="form-control" id="title"
                               placeholder="Заголовок"
                               aria-label="Название статьи">
                    </div>
                    <div class="col mb-4">
                        <label for="editor" class="form-label">Текст статьи</label>
                        <textarea name="content" class="form-control" id="editor" rows="6"><?=htmlspecialchars($content)?></textarea>
                    </div>
                    <div class="input-group col mb-4">
                        <input name="img" type="file" class="form-control" id="picture">
                        <label class="input-group-text" for="picture">Загрузить</label>
                    </div>
                    <p>Выберите категорию:</p>
                    <select name="category" class="form-select mb-2" aria-label="Default select example">
                        <?php foreach ($categories as $key => $value): ?>
                            <?php if ($value['id'] == $id_category):?>
                                <option value="<?= $value['id']; ?>" selected><?= $value['name'];?></option>
                            <?php else: ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check">
                        <?php if ($status): ?>
                            <input class="form-check-input" id="status" name="status" type="checkbox" checked>
                        <?php else: ?>
                            <input class="form-check-input" id="status" name="status" type="checkbox">
                        <?php endif; ?>
                        <label class="form-check-label" for="status">Опубликовать?</label>
                    </div>
                    <div class="col col-6">
                        <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script src="../../assets/js/scripts.js"></script>
</body>
</html>