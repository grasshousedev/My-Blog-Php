<?php include("path.php") ?>

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

<!-- main -->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2>Заголовок</h2>
            <div class="single_post row">
                <div class="img col-12">
                    <img src="assets/images/2.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-user"> Имя автора</i>
                    <i class="far fa-calendar"> Mar 11, 2020</i>
                </div>
                <div class="single_post_text col-12">
                    <h3>Заголовок третьего уровня</h3>
                    <p>Lorem <a href="#">ipsum</a> dolor sit amet, consectetur adipisicing elit. Alias aperiam at consectetur esse modi nam obcaecati porro quam, qui sequi totam vero! Alias at consequuntur doloribus ducimus eligendi enim eum fugit incidunt nostrum obcaecati, pariatur perspiciatis quasi quis repudiandae saepe sequi similique voluptates voluptatum? Ab accusantium adipisci corporis ducimus eaque esse eum eveniet excepturi iste, iure laboriosam laudantium minima necessitatibus nesciunt nobis non quae reprehenderit sed soluta voluptate! Alias architecto corporis culpa deleniti dicta distinctio doloremque dolorum eaque est explicabo facere inventore ipsa nam natus nisi non nulla obcaecati officia omnis porro quae quaerat ratione rerum sit totam unde, voluptatum?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aut beatae doloremque dolorum eius excepturi in labore magni nesciunt officia, perspiciatis quibusdam quis quo sapiente unde velit voluptatem. Accusantium, aperiam cum dolorum eos esse illo laborum maxime odit optio voluptate! Consequatur explicabo facilis harum maiores maxime modi quibusdam, vel vitae.</p>
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
                    <li><a href="#">Poems</a></li>
                    <li><a href="#">Quotes</a></li>
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="#">Motivation</a></li>
                    <li><a href="#">Inspiration</a></li>
                    <li><a href="#">Life Lessons</a></li>
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