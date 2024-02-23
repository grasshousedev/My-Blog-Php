<?php
// Блок комментариев
include (ROOT . '/app/controllers/comments.php');
?>

<div class="col-md-12 col-12 comments">
    <h3>Оставить комментарий</h3>
    <?php require_once(ROOT . '/app/errors/error_info.php') ?>
    <form action="<?=BASE_URL . "single.php?post=" . $id_post?>" method="post">
        <input type="hidden" name="post_id" value="<?=$id_post?>">
        <?php if (!isset($_SESSION['id'])): ?>
            <div class="mb-3">
                <label for="email" class="form-label">Введите вашу электронную почту</label>
                <input type="email" class="form-control" name="email" id="email" value="<?=$email?>">
            </div>
        <?php else: ?>
            <input name="id_user" type="hidden" value="<?=$_SESSION['id']?>">
        <?php endif; ?>
        <div class="mb-3">
            <label for="comment" class="form-label">Напишите ваш отзыв</label>
            <textarea name="comment" id="comment" rows=4 class="form-control"><?=$comment?></textarea>
        </div>
        <div class="md-3 col-12">
            <button name="btn-comment" type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
    <div class="comments">
        <h3 class="comments_text">Комментарии</h3>
        <?php if ($comments): ?>
            <?php foreach ($comments as $key => $post): ?>
                <div class="d-flex flex-start mb-4">
                    <img class="rounded-circle shadow-1-strong me-3"
                         src="" alt="avatar" width="65"
                         height="65"/>
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="">
                                <h5><?php if(isset($post['username'])){
                                        echo $post['username'];
                                    } else {
                                    echo $post['email'];
                                    } ?></h5>
                                <p class="small"><?= $post['created_date'] ?></p>
                                <p>
                                    <?= $post['comment'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h5>Никто пока не оставил комментарий к этой статье.</h5>
        <?php endif; ?>
    </div>
</div>