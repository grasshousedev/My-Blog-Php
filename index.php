<?php
require_once("path.php");
require_once(ROOT . '/app/database/db.php');
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_category'])) {
    $category_search = true;
    $posts = selectAllFromPostsWithUsers('posts', 'users', ['id_category' => $_GET['id_category'], 'status'=>1]);
    $category = selectAny('categories', ['id' => $_GET['id_category']], 1)['name'];

} else {
    $category_search = false;
    $posts = selectAllFromPostsWithUsers('posts', 'users', ['status' => 1]);
}
require_once("app/include/head.php");
?>



<body>

<?php
    include("app/include/header.php");
?>

<!--Блок карусели-->
<div class="container">
    <?php if(!$category_search)
    include(ROOT . '/app/include/carousel.php');
    ?>
</div>

<!--Блок карусели END-->
<!--Main-->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <?php if(!$category_search): ?>
            <h2>Последние публикации</h2>
            <?php else: ?>
            <h2><?=$category?></h2>
            <?php endif; ?>
            <?php foreach($posts as $key=>$post) : ?>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <a href="<?= BASE_URL . 'single.php?post=' . $post['id'] ?>">
                    <img src="<?=BASE_URL . '/assets/images/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="img-thumbnail">
                    </a>

                </div>

                <div class="post_text co-12 col-md-8">
                    <h3>
                        <a href="<?= BASE_URL . 'single.php?post=' . $post['id'] ?>">

                        <?php
                            if(iconv_strlen($post['title']) > 50) {
                                echo mb_substr($post['title'], 0, 50, 'utf8') . '...';
                            } else {
                                echo $post['title'];
                            }
                            ?>
                        </a>


                    </h3>
                    <i class="far fa-user">  <?=$post['username']?></i>
                    <i class="far fa-calendar">  <?=$post['created_date']?></i>
                    <p class="preview-text">
                        <?php
                        if(iconv_strlen($post['content']) > 120) {
                        echo mb_substr($post['content'], 0, 120, 'utf8') . '...';
                        } else {
                            echo $post['content'];
                        }
                        ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!--        Sidebar Content-->
        <?php include(ROOT . '/app/include/sidebar.php') ?>
    </div>
</div>
<!--Main end-->
<?php include("app/include/footer.php") ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>