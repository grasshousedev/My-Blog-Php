<?php include("../../path.php");
include("../../app/controllers/categories.php");
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
                <h2>Управление категориями</h2>
                <div class="col-1">ID</div>
                <div class="col-9">Название</div>
                <div class="col-2">Управление</div>
            </div>
            <?php foreach($categories as $key=>$value): ?>
            <div class="row post">
                <div class="id col-1"><?=$key+1?></div>
                <div class="title col-9"><?=$value['name']?></div>
                <div class="edit col-1"><a href="edit.php?id=<?=$value['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></div>
                <div class="delete col-1"><a href="edit.php?delete_id=<?=$value['id'];?>"><i class="fa-solid fa-trash"></i></a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include("../../app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>