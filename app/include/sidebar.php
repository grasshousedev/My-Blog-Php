<?php
require('app/controllers/categories.php');
$categories = selectAny('categories');
?>

<div class="sidebar col-md-3 col-12">
    <div class="section search">
        <h3>Поиск</h3>
        <form action="<?=BASE_URL . 'search.php'?>" method="post">
            <input type="text" name="search-row" class="text-input" placeholder="Введите запрос">
        </form>
    </div>

    <div class="section topics">
        <h3>Категории</h3>
        <ul>
            <?php foreach($categories as $key => $value): ?>
                <li><a href="#"><?=$value['name']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>