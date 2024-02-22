<?php
$topCategory = selectAny('categories', ['name'=>'Лучшие публикации'],1)['id'];
$topPosts = selectAllFromPostsWithUsers('posts', 'users', ['status' => 1, 'id_category' =>$topCategory]);
?>
<?php if(isset($topPosts) && count($topPosts)): ?>
<div class="row">
    <h2 class="slider-title">Лучшие публикации</h2>
</div>
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-inner">
        <?php foreach ($topPosts as $key => $post): ?>
            <div class="carousel-item <?php if ($key == 0) {
                echo 'active';
            } ?>">
                <a href="<?= BASE_URL . 'single.php?post=' . $post['id'] ?>">
                <img src="<?= BASE_URL . 'assets/images/posts/' . $post['img'] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><?= $post['title'] ?></h5>
                </div>
                </a>
            </div>
        <?php endforeach; ?>

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
<?php endif;?>