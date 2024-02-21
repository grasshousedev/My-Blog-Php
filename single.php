<?php
include("path.php");
include(ROOT . '/app/database/db.php');
$post = selectAny('posts', ['id' => $_GET['post']], 1);
$author = selectAny('users', ['id' => $post['id_user']], 1);
require_once(ROOT . "/app/include/head.php");
?>
<body>
<?php include("app/include/header.php"); ?>

<!-- main -->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2><?=$post['title']?></h2>
            <div class="single_post row">
                <div class="img col-12">
                    <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" alt="" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-user"><?=$author['username']?> </i>
                    <i class="far fa-calendar"><?=$post['created_date']?></i>
                </div>
                <div class="single_post_text col-12">
                    <?=$post['content']?>
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