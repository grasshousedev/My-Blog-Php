<?php
require_once("path.php");
require_once(ROOT . '/app/database/db.php');
$posts = selectAllFromPostsWithUsers('posts', 'users', ['status' => 1]);
$topCategory = selectAny('categories', ['name'=>'Лучшие публикации'],1)['id'];
$topPosts = [];
foreach($posts as $key=>$post) {
    if ($post['id_category']  == $topCategory){
        $topPosts[] = $post;
    }
}
require_once("app/include/head.php");
?>



<body>

<?php include("app/include/header.php"); ?>

<!--Блок карусели-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Лучшие публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <?php foreach($topPosts as $key=>$post):?>
            <div class="carousel-item <?php if($key == 0) {
                echo 'active';
            }  ?>">
                <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="<?=BASE_URL . 'single.php?post=' . $post['id']?>"><?=$post['title']?></a></h5>
                </div>
            </div>
            <?php endforeach;?>
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
            <?php foreach($posts as $key=>$post) : ?>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="<?=BASE_URL . '/assets/images/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?= BASE_URL . 'single.php?post=' . $post['id'] ?>"><?php
                            if(iconv_strlen($post['title']) > 50) {
                                echo strlen($post['title']);
                                echo mb_substr($post['title'], 0, 50, 'utf8') . '...';
                            } else {
                                echo $post['title'];
                            }
                            ?>
                        </a>
                    </h3>
                    <i class="far fa-user"> <?=$post['username']?></i>
                    <i class="far fa-calendar"><?=$post['created_date']?></i>
                    <p class="preview-text">
                        <?php
                        if(iconv_strlen($post['content']) > 150) {
                        echo mb_substr($post['content'], 0, 150, 'utf8') . '...';
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