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

    <title>Личный кабинет</title>
    <?php 
    session_start();
    $telephoneLogin = empty($_SESSION["telephoneLogin"]) ? 'false' : $_SESSION["telephoneLogin"];

    include("connect.php");
    $id_object = $_GET['id_object'];

    $queryObject = "select * from booking inner join status_bo, object where booking.status = status_bo.id_status AND booking.object = object.id_object AND telephone = $telephoneLogin";
    $resultObject = mysqli_query($connect, $queryObject);

    $queryUser = "select * from users where telephone = $telephoneLogin";
    $resultUser = mysqli_query($connect, $queryUser);
    $userInfo = mysqli_fetch_array($resultUser);
    ?>
</head>
<body>
<?php include("header.php") ?>

<main class="lk center">

    <div class="lk__user">

        <p class="lk__user_title">Ваш профиль</p>

        <form action="userDB.php" class="lk__form" method="POST">

            <div class="lk__item">
                <label for="" class="lk__item_label">Номер телефона</label>
                <input type="text" name="telephone" class="lki__item_input" placeholder="<?=$userInfo['telephone'];?>" value="<?=$userInfo['telephone'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Имя</label>
                <input type="text" name="name" class="lki__item_input" placeholder="<?=$userInfo['name'];?>" value="<?=$userInfo['name'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Фамилия</label>
                <input type="text" name="surname" class="lki__item_input" placeholder="<?=$userInfo['surname'];?>" value="<?=$userInfo['surname'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Пароль</label>
                <input type="password" name="password" class="lki__item_input" placeholder="<?=$userInfo['password'];?>" value="<?=$userInfo['password'];?>">
            </div>

            <button class="lk__form_button">Редактировать</button>
        </form>

    </div>

    <div class="lk__booking">
        <p class="lk__user_title">Ваши брони</p>

        <?php while($booking = mysqli_fetch_array($resultObject)) { ?>
            <div class="lk__booking_container">
                <p class="lk__item_label_ad">Номер брони: <span class="lk__item_label"><?=$booking['id_booking'];?></span></p>
                <p class="lk__item_label_ad">Объект брони: <span class="lk__item_label"><?=$booking['address'];?></span></p>
                <p class="lk__item_label_ad">Статус: 
                <?php if($booking['status'] == 3) { ?>
                    <span class="lk__item_label reject">
                        <?=$booking['title_status'];?>
                    </span>
                <?php } ?>
                <?php if($booking['status'] == 2) { ?>
                    <span class="lk__item_label accept">
                        <?=$booking['title_status'];?>
                    </span>
                <?php } ?>
                <?php if($booking['status'] == 1) { ?>
                    <span class="lk__item_label review">
                        <?=$booking['title_status'];?>
                    </span>
                <?php } ?>
                </p>
                <p class="lk__item_label_ad">Имя: <span class="lk__item_label"><?=$booking['name'];?></span></p>
                <p class="lk__item_label_ad">Фамилия: <span class="lk__item_label"><?=$booking['surname'];?></span></p>
            </div>
        <?php } ?>
    </div>

</main>

<?php include("footer.php") ?>
</body>
</html>