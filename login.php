<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,500&display=swap" rel="stylesheet">

    <title>Вход</title>
</head>
<body>
<?php include("header.php") ?>

    <section class="registration center">
        <p class="reg__title">Вход</p>

        <form action="loginDB.php" method="POST" class="reg__form" novalidate>

            <div class="form__item">
                <label for="" class="form__item_label">Введите телефон</label>
                <input type="login" class="form__item_inputs" name="telephone" placeholder="telephone" required>
                <div class="form__item_error hidden"></div>
            </div>

            <div class="form__item">
                <label for="" class="form__item_label">Введите пароль</label>
                <input type="password" class="form__item_inputs" name="password" placeholder="password" required>
                <div class="form__item_error hidden"></div>
            </div>
            
            <button class="form__button">Войти</button>
        </form>
    </section>
    
    <?php include("footer.php") ?>
    <script src="./js/validation-login.js"></script>
</body>
</html>