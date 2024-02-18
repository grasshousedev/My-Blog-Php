<?php include("../../path.php") ?>
<?php include("../../app/database/db.php") ?>
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
        <div class="sidebar col-3">
            <ul>
                <li>
                    <a href="">Записи</a>
                </li>
                <li>
                    <a href="">Пользователи</a>
                </li>
                <li>
                    <a href="">Категории</a>
                </li>
            </ul>
        </div>
        <div class="posts col-9">
            <div class="button row">
                <a class="btn btn-success col-3" href="create.php">Создать</a>
                <span class="col-1"></span>
                <a class="btn btn-warning col-3" href="index.php">Управление</a>
            </div>
            <div class="row title-table">
                <h2>Добавить статью</h2>
            </div>
            <div class="row add-post">
                <form action="create.php" method="POST">
                    <div class="col">
                        <label for="title" class="form-label">Заголовок статьи</label>
                        <input type="text" class="form-control" id="title" placeholder="Заголовок"
                               aria-label="Название статьи">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Текст статьи</label>
                        <textarea class="form-control" id="content" rows="6"></textarea>
                    </div>
                    <div class="input-group col">
                        <input type="file" class="form-control" id="picture">
                        <label class="input-group-text" for="picture">Загрузить</label>
                    </div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Сохранить запись</button>
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