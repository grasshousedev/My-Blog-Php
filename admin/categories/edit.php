<?php include("../../path.php");
include("../../app/controllers/categories.php") ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <script src="https://kit.fontawesome.com/40087f1b88.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.  com">
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


            <div class="row add-post">
                <form action="edit.php" method="POST">
                    <div class="row title-table">
                        <h2>Обновить категорию</h2>
                    </div>
                    <div class="mb-3 col err">
                        <p><?=$statusMessage?></p>
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