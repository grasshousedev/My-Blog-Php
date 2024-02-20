<?php
require_once('../../path.php');
require_once(ROOT . "/app/controllers/posts.php");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Montserrat:wght@400;800&family=Roboto&display=swap"
          rel="stylesheet">

</head>
<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>

        <div class="posts col-9">
            <?php require_once("../../app/include/buttons_admin.php") ?>

            <div class="row title-table">
                <h2>Добавить запись</h2>
            </div>
            <div class="row add-post">
                <form action="create.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 col err">
                        <?php include(ROOT . "/app/errors/error_info.php") ?>
                    </div>
                    <div class="col mb-4">
                        <label for="title" class="form-label">Заголовок статьи</label>
                        <input value="<?=$title?>" name="title" type="text" class="form-control" id="title" placeholder="Заголовок"
                               aria-label="Название статьи">
                    </div>
                    <div class="col mb-4">
                        <label for="editor" class="form-label">Текст статьи</label>
                        <textarea name="content" class="form-control" id="editor" rows="6"><?=$content?></textarea>
                    </div>
                    <div class="input-group col mb-4">
                        <input name="img" type="file" class="form-control" id="picture">
                        <label class="input-group-text" for="picture">Загрузить</label>
                    </div>
                    <p>Выберите категорию:</p>
                    <select name="category" class="form-select mb-2" aria-label="Default select example">
                        <?php foreach($categories as $key=>$value): ?>
                        <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check">
                        <input class="form-check-input" id="status" name="status" type="checkbox" checked>
                        <label class="form-check-label" for="status">Опубликовать?</label>
                    </div>
                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Добавить запись</button>
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