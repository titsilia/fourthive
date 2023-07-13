<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,500&display=swap" rel="stylesheet">
    <title>Админ-панель</title>
</head>
<body>
<?php include("../header.php") ?>

<main class="admin center">
    <p class="admin__control_title">Управление сайтом</p>
    <a href="complexEdit.php" class="admin__control_link">Работа с Жилыми комплексами</a>
    <a href="objectEdit.php" class="admin__control_link">Работа с объектами</a>
    <a href="bookingEdit.php" class="admin__control_link">Просмотр бронь</a>
    <a href="userAdd.php" class="admin__control_link">Редактирование пользователя</a>
</main>
    
<?php include("../footer.php") ?>
</body>
</html>