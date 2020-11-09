<?
$path = explode('/', $_SERVER['SCRIPT_FILENAME']);
$fileName = $path[count($path) - 1];
?>
<div class="header">
    <div class="container">
        <div class="logo">
            <img src="./imgs/logo.png" alt="" width="171" height="35">
        </div>

        <nav>
            <ul class="menu">
                <li><a <?= $fileName=='index.php' ? 'class="active"' : ''?> href="index.php">Головна</a></li>

                <li><a <?= $fileName=='goods.php' ? 'class="active"' : ''?> href="goods.php">Товари</a></li>

                <!-- <li><a href="">Функція 2</a></li>

                <li><a href="">Функція 3</a></li>

                <li><a href="">Функція 4</a></li> -->

                <li><a class="sign-button" href="./helpers/logout.php">Вихід</a></li>
            </ul>

        </nav>
    </div>
</div>
