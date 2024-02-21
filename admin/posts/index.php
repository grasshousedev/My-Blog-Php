<?php
require_once("../../path.php");
require_once(ROOT . "/app/controllers/posts.php");
require_once(ROOT . "/app/include/head.php");
?>
<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>
        <div class="posts col-9">
            <?php require_once("../../app/include/buttons_admin.php") ?>

            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="col-1">ID</div>
                <div class="col-4">Название</div>
                <div class="col-3">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach($posts as $key=>$post): ?>
                <div class="row post">
                    <div class="id col-1"><?=$key+1?></div>
                    <div class="title col-4">
                        <?php
                        if(strlen($post['title']) > 30) {
                            echo mb_substr($post['title'], 0, 30, 'utf8') . '...';
                        } else {
                            echo $post['title'];
                        }
                        ?></div>
                    <div class="author col-3"><?=$post['username']?></div>
                    <div class="edit col-1"><a href="edit.php?id=<?=$post['id']?>">edit</a></div>
                    <div class="delete col-1"><a href="edit.php?delete_id=<?=$post['id']?>">delete</a></div>
                    <?php if($post['status']):?>
                    <div class="status col-2"><a href="edit.php?status=0&id=<?=$post['id']?>">unpublish</a></div>
                    <?php else:?>
                    <div class="status col-2"><a href="edit.php?status=1&id=<?=$post['id']?>">publish</a></div>
                    <?php endif;?>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php include("../../app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>