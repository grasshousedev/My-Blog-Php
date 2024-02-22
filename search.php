<?php
require_once("path.php");
require_once(ROOT . '/app/database/db.php');
require_once("app/include/head.php");
$page = $_GET['page'] ?? 1;
$limit = 5;
$offset = $limit * ($page-1);
if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['search-row'])) {
    $totalPosts = searchInTitleAndContent($_GET['search-row'], 'posts', 'users');
    $posts = array_slice($totalPosts, $offset, $limit);
    $total_pages = ceil(count($totalPosts) / $limit);
}

?>



<body>

<?php include("app/include/header.php"); ?>

<!--Main-->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2>Результаты поиска</h2>
            <?php if(isset($posts) && count($posts)):?>
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
            <?php else: ?>
            <h3>По вашему запросу ничего не найдено</h3>
            <?php endif; ?>
            <?php require_once(ROOT . '/app/include/pagination.php') ?>
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