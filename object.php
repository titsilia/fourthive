

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

    <title>Объекты Жилого комплекса</title>
    <?php 
    include("connect.php");
    $id_object = $_GET['id_object'];
    $query = "select * from object inner join type_building, type_object, complex where object.type_building = type_building.id_building AND object.type_object = type_object.id_type AND object.complex = complex.id_complex AND id_object = $id_object";
    $result = mysqli_query($connect, $query);
    $object = mysqli_fetch_array($result);

    session_start();
    $telephoneLogin = empty($_SESSION["telephoneLogin"]) ? 'false' : $_SESSION["telephoneLogin"];
    $roleLogin = empty($_SESSION["roleLogin"]) ? 'false' :  $_SESSION["roleLogin"];
    $nameLogin = empty($_SESSION["nameLogin"]) ? 'false' :  $_SESSION["nameLogin"];
    $surnameLogin = empty($_SESSION["surnameLogin"]) ? 'false' :  $_SESSION["surnameLogin"];
    ?>
</head>
<body>
<?php include("header.php") ?>

<main class="complexes center">
    <p class="complexes__title"><?=$object['address'];?></p>

    <div class="object__item">

        <img src="./img/objects/<?=$object['object_photo'];?>" alt="" class="object__item_img">   
        
        <div class="object__item_container">
            <p class="object__item_text_ad">Расположение: <span class="object__item_text"><?=$object['title_complex'];?></span></p>
            <p class="object__item_text_ad">Количество комнат: <span class="object__item_text"><?=$object['rooms'];?></span></p>
            <p class="object__item_text_ad">Количество этажей: <span class="object__item_text"><?=$object['floors'];?></span></p>
            <p class="object__item_text_ad">Жилая площадь: <span class="object__item_text"><?=$object['square'];?></span></p>
            <p class="object__item_text_ad">Материал строения: <span class="object__item_text"><?=$object['title_building'];?></span></p>
            <p class="object__item_text_ad">Тип объекта: <span class="object__item_text"><?=$object['title_type'];?></span></p>
            <p class="object__item_text_ad">Цена: <span class="object__item_text"><?=$object['coust'];?> руб.</span></p>

            <?php if ($telephoneLogin && $roleLogin == 2  || $roleLogin == 1) { ?>
            <form action="bookingDB.php?id_object=<?=$object['id_object'];?>" method="POST" class="reg__form" novalidate>
                <p class="reg-object__title">Забронировать просмотр</p>
                
                <button class="form-object__button">Забронировать</button>
            </form>
            <?php } ?>


            <?php if ($roleLogin != 1 && $roleLogin != 2) { ?>
                <div class="object__warning">

                    <p class="object__warning_text">Забронировать просмотр могут только авторизированные пользователи</p>
                    
                    <div class="object__warning_container">
                        <a class="object__warning_links" href="login.php">Вход</a>
                        <p class="object__item_text">/</p>
                        <a class="object__warning_links" href="reg.php">Регистрация</a>
                    </div>

                </div>
            <?php } ?>


        </div>

    </div>

    <a onclick="javascript:history.back(); return false;" class="objects__link" href="objectsJK.php">Назад</a>
</main>


<?php include("footer.php") ?>
</body>
</html>