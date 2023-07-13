<?php
session_start();
$telephoneLogin = empty($_SESSION["telephoneLogin"]) ? 'false' : $_SESSION["telephoneLogin"];
$roleLogin = empty($_SESSION["roleLogin"]) ? 'false' :  $_SESSION["roleLogin"];
$nameLogin = empty($_SESSION["nameLogin"]) ? 'false' :  $_SESSION["nameLogin"];


?>

<header class="header center">
    <?php if ($telephoneLogin && $roleLogin == 2) { ?>
        <a href="../index.php"><img src="../img/logo.png" alt="" class="header__logo"></a>
        <div class="header__links">
            <a class="header__links_text" href="../index.php">Главная</a>
            <a class="header__links_text" href="../complexs.php">Жилые комплексы</a>
            <a class="header__links_text" href="../objects.php">Все объекты</a>
        </div>
        <div class="header__links">
            <a class="header__links_text" href="../lk.php">Привет, <?=$nameLogin;?>!</a>
            <a class="header__links_text" href="../exit.php">Выход</a>
        </div>
    <?php } ?>
    <?php if ($telephoneLogin && $roleLogin == 1) { ?>
        <a href="../index.php"><img src="../img/logo.png" alt="" class="header__logo"></a>
        <div class="header__links">
            <a class="header__links_text" href="../index.php">Главная</a>
            <a class="header__links_text" href="../complexs.php">Жилые комплексы</a>
            <a class="header__links_text" href="../objects.php">Все объекты</a>
        </div>

        <div class="header__links">
            <a class="header__links_text" href="../lk.php">Привет, <?=$nameLogin;?>!</a>
            <a class="header__links_text" href="../admin/">Админ-панель</a>
            <a class="header__links_text" href="../exit.php">Выход</a>
        </div>
    <?php } ?>
    
    <?php if ($roleLogin != 1 && $roleLogin != 2) { ?>
        <a href="../index.php"><img src="../img/logo.png" alt="" class="header__logo"></a>
        <div class="header__links">
            <a class="header__links_text" href="../index.php">Главная</a>
            <a class="header__links_text" href="../complexs.php">Жилые комплексы</a>
            <a class="header__links_text" href="../objects.php">Все объекты</a>
        </div>

        <div class="header__links">
            <a class="header__links_text" href="../login.php">Вход</a>
            <a class="header__links_text" href="../reg.php">Регистрация</a>
        </div>
    <?php } ?>
    
</header>

