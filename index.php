<?php
require_once("path.php");
require_once(ROOT . '/app/controllers/categories.php');
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

<!--Блок карусели-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Лучшие публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="">First slide label</a></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!--Блок карусели END-->
<!--Main-->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2>Последние публикации</h2>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="">Прикольная статья на тему FNAF</a>
                    </h3>
                    <i class="far fa-user"> Имя автора</i>
                    <i class="far fa-calendar"> Mar 11, 2020</i>
                    <p class="preview-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid animi cupiditate ducimus
                        eligendi esse facere facilis reprehenderit. Accusamus, ipsum?
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="">Прикольная статья на тему FNAF</a>
                    </h3>
                    <i class="far fa-user">Имя автора</i>
                    <i class="far fa-calendar">Mar 11, 2020</i>
                    <p class="preview-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid animi cupiditate ducimus
                        eligendi esse facere facilis reprehenderit. Accusamus, ipsum?
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="">Прикольная статья на тему FNAF</a>
                    </h3>
                    <i class="far fa-user"> Имя автора</i>
                    <i class="far fa-calendar"> Mar 11, 2020</i>
                    <p class="preview-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid animi cupiditate ducimus
                        eligendi esse facere facilis reprehenderit. Accusamus, ipsum?
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="">Прикольная статья на тему FNAF</a>
                    </h3>
                    <i class="far fa-user"> Имя автора</i>
                    <i class="far fa-calendar"> Mar 11, 2020</i>
                    <p class="preview-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid animi cupiditate ducimus
                        eligendi esse facere facilis reprehenderit. Accusamus, ipsum?
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/1.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="">Прикольная статья на тему FNAF</a>
                    </h3>
                    <i class="far fa-user"> Имя автора</i>
                    <i class="far fa-calendar"> Mar 11, 2020</i>
                    <p class="preview-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid animi cupiditate ducimus
                        eligendi esse facere facilis reprehenderit. Accusamus, ipsum?
                    </p>
                </div>
            </div>
        </div>

        <!--        Sidebar Content-->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите запрос">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach($categories as $key => $value): ?>
                    <li><a href="#"><?=$value['name']?></a></li>
                    <?endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Main end-->
<?php include("app/include/footer.php") ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>