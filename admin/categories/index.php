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
                <div class="col-7">Название</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach($categories as $key=>$value): ?>
            <div class="row post">
                <div class="id col-1"><?=$key+1?></div>
                <div class="title col-7"><?=$value['name']?></div>
                <div class="edit col-2"><a href="edit.php?id=<?=$value['id'];?>">Edit</a></div>
                <div class="delete col-2"><a href="edit.php?delete_id=<?=$value['id'];?>">Delete</a></div>
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