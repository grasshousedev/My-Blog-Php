<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL ?>">My blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?= $_SESSION['login']; ?>
                        </a>
                        <ul>
                            <li><a href="#">Профиль</a></li>
                            <li><a href="<?= BASE_URL . 'logout.php' ?>">Выйти</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>