<?php
// Блок комментариев
include ROOT . '/app/controllers/comments.php';
?>

<div class="col-md-12 col-12 comments">
    <h3>Оставить комментарий</h3>
    <?php require_once(ROOT . '/app/errors/error_info.php')?>
    <form action="<?= BASE_URL . "single.php?post=" . $id_post?>" method="post">
        <input type="hidden" name="post_id" value="<?=$id_post?>">
        <?php if(!isset($_SESSION['id'])): ?>
        <div class="mb-3">
            <label for="email" class="form-label">Введите вашу электронную почту</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=$email?>">
        </div>
        <?php else: ?>
        <input name="id_user" type="hidden" value="<?=$_SESSION['id']?>">
        <?php endif;?>
        <div class="mb-3">
            <label for="comment" class="form-label">Напишите ваш отзыв</label>
            <textarea name="comment" id="comment" rows=4 class="form-control"><?=$comment?></textarea>
        </div>
        <div class="md-3 col-12">
            <button name="btn-comment" type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
</div>