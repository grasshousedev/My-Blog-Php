<?php
require_once("../../path.php");
require_once(ROOT . "/app/controllers/comments.php");
require_once(ROOT . "/app/include/head.php");
?>
<body>

<?php include("../../app/include/header_admin.php"); ?>
<div class="container">
    <div class="row">
        <?php require_once("../../app/include/sidebar_admin.php"); ?>
        <div class="posts col-9">

            <div class="row title-table">
                <h2>Управление комментариями</h2>
                <form action="index.php" method="GET">
                <div class="form-check">
                    <label for="show_posted" class="form-check-label">Показывать опубликованные?</label>
                    <?php if($show_posted):?>
                    <input id="show_posted" type="checkbox" name="show_posted" class="form-check-input" checked>
                    <?php else: ?>
                    <input id="show_posted" type="checkbox" name="show_posted" class="form-check-input">
                    <?php endif; ?>
                    <button name="btn-show-posted" type="submit" class="btn btn-primary">Применить</button>
                </div>
                </form>
                <div class="col-1">ID</div>
                <div class="col-4">Название статьи</div>
                <div class="col-4">Комментарий</div>
                <div class="col-3">Управление</div>
            </div>
            <?php foreach($comments as $key=>$comment): ?>
                <div class="row post">
                    <div class="id col-1"><?=$key+1?></div>
                    <div class="title col-4">
                        <?php
                        if(strlen($comment['title']) > 50) {
                            echo mb_substr($comment['title'], 0, 50, 'utf8') . '...';
                        } else {
                            echo $comment['title'];
                        }
                        ?>
                    </div>
                    <div class="content col-3">
                        <?php
                        if(strlen($comment['comment']) > 50) {
                            echo mb_substr($comment['comment'], 0, 50, 'utf8') . '...';
                        } else {
                            echo $comment['comment'];
                        }
                        ?>
                    </div>
                    <div class="edit col-2"><a href="moderate.php?id=<?=$comment['id']?>">Управление</a></div>
                    <div class="publish col-2">
                        <?php if($comment['status']): ?>
                            Опубликован
                        <?php else:?>
                            Неактивен
                        <?php endif;?>
                    </div>
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