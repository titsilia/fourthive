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

    <title>Добавление пользователя</title>
    <?php
    include("../connect.php");
    $admins = "select * from users";
    $result = mysqli_query($connect, $admins);
    $resultTwo = mysqli_query($connect, $admins);

    $telephone = !empty($_GET['telephone']) ? $_GET['telephone'] : mysqli_fetch_array(mysqli_query($connect, "select telephone from users"))['telephone'];
        $adminChoice = "select * from users where telephone = $telephone";
        $resultChoice = mysqli_query($connect, $adminChoice);
        $choice = mysqli_fetch_array($resultChoice);

        $telephoneDel = !empty($_GET['telephoneDel']) ? $_GET['telephoneDel'] : mysqli_fetch_array(mysqli_query($connect, "select telephone from users"))['telephone'];
        $adminChoiceDel = "select * from users where telephone = $telephoneDel";
        $resultChoiceDel = mysqli_query($connect, $adminChoiceDel);


    $role = "select * from role";
    $resultRole = mysqli_query($connect, $role);
   ?>
</head>
<body>
<?php include("../header.php") ?>

<main class="edit center">
    <div class="edit__item">
        <p class="admin__control_title">Добавление пользователя</p>
    
       <form action="userAddDB.php" method="POST" class="lk__form">
            <div class="lk__item">
                <label for="" class="lk__item_label">Телефон пользователя</label>
                <input type="text" class="lki__item_input" name="telephone"
                  pattern="[0-9-]+"
                  placeholder="telephone"
                  required>
            </div>
    
            <div class="lk__item">
                <label for="" class="lk__item_label">Имя пользователя</label>
                <input type="text"class="lki__item_input" name="name"
                pattern="[а-яА-ЯЁё-]+"
                placeholder="Иван"
                required>
            </div>
    
            <div class="lk__item">
                <label for="" class="lk__item_label">Фамилия пользователя</label>
                <input type="text"class="lki__item_input" name="surname"
                pattern="[а-яА-яЁё-]+"
                placeholder="Иванов"
                required>
            </div>
    
            <div class="lk__item">
                <label for="" class="lk__item_label">Пароль пользователя</label>
                <input type="text"class="lki__item_input" name="password"
                placeholder="password"
                required>
            </div>
    
            <div class="lk__item">

                <label for="" class="lk__item_label">Роль пользователя</label>

                <select name="role" id="" class="lki__item_input">
                    <?php while($roleArr = mysqli_fetch_array($resultRole)) { ?>
                        <option value="<?=$roleArr['id_role'];?>"><?=$roleArr['title_role'];?></option>
                    <?php } ?>
                </select>
            </div>

            <button class="lk__form_button">Добавить</button>
       </form>
    </div>

    <div class="edit__item">
        <p class="admin__control_title">Редактирование пользователя/администратора</p>

        <form action="" method="GET" class="edit__form">
            <select name="telephone" id="" class="selects">
                <?php while($admin = mysqli_fetch_array($result)) { ?>
               <option value="<?=$admin['telephone'];?>"><?=$admin['name'];?> <?=$admin['surname'];?></option>
                <?php } ?>
            </select>
            <button class="sort__button">Хаха</button>
        </form>

        <form action="userEditDB.php?telephone=<?=$telephone?>" class="lk__form" method="POST">

            <div class="lk__item">
                <label for="" class="lk__item_label"></label>
                <input type="text" name="telephone" class="lki__item_input" placeholder="<?=$choice['telephone'];?>" value="<?=$choice['telephone'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label"></label>
                <input type="text" name="name" class="lki__item_input" placeholder="<?=$choice['name'];?>" value="<?=$choice['name'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label"></label>
                <input type="text" name="surname" class="lki__item_input" placeholder="<?=$choice['surname'];?>" value="<?=$choice['surname'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label"></label>
                <input type="password" name="password" class="lki__item_input" placeholder="<?=$choice['password'];?>" value="<?=$choice['password'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label"></label>
                <input type="text" name="role" class="lki__item_input" placeholder="<?=$choice['id_role'];?>" value="<?=$choice['id_role'];?>">
            </div>

            <button class="lk__form_button">Редактировать</button>
        </form>
    </div>

    <div class="edit__item">
        <p class="admin__control_title">Удаление пользователя/администратора</p>

        <form action="userDelDB.php?telephone=<?=$telephoneDel?>" method="GET"class="edit__form" >
            <select name="telephoneDel" id="two" class="selects">
                <?php while($adminDel = mysqli_fetch_array($resultTwo)) { ?>
               <option value="<?=$adminDel['telephone'];?>"><?=$adminDel['name'];?> <?=$adminDel['surname'];?></option>
                <?php } ?>
            </select>
            <button class="sort__button">Удалить</button>
        </form>
    </div>
</main>
    
<?php include("../footer.php") ?>

</body>
</html>