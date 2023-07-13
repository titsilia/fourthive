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

    <title>Работа с Жилыми комплексами</title>
    <?php
  include("../connect.php");
    $complexes = "select * from complex";
    $result = mysqli_query($connect, $complexes);
    $resultTwo = mysqli_query($connect, $complexes);

    $id_complex = !empty($_GET['id_complex']) ? $_GET['id_complex'] : mysqli_fetch_array(mysqli_query($connect, "select id_complex from complex"))['id_complex'];

    $complexChoice = "select * from complex where id_complex = $id_complex";
    $resultChoice = mysqli_query($connect, $complexChoice);
    $choice = mysqli_fetch_array($resultChoice);


    $complexDel = !empty($_GET['complexDel']) ? $_GET['complexDel'] : mysqli_fetch_array(mysqli_query($connect, "select id_complex from complex"))['id_complex'];
    $complexChoiceDel = "select * from complex where id_complex = $complexDel";
    $resultChoiceDel = mysqli_query($connect, $complexChoiceDel);
    ?>
</head>
<body>
<?php include("../header.php") ?>

<main class="edit center">

    <div class="admin__control">

        <p class="admin__control_title">Редактирование ЖК</p>

        <form class="edit__form" method="GET">

            <select name="id_complex" class="selects">
                <?php while($complex = mysqli_fetch_array($result)) { ?>
                    <option value="<?=$complex['id_complex'];?>"><?=$complex['title_complex'];?></option>
                <?php } ?>
            </select>

            <button class="sort__button">Выбрать</button>
        </form>
          
        <form action="complexEditDB.php?id_complex=<?=$id_complex?>" method="POST" class="lk__form">
            <div class="lk__item">
                <label for="" class="lk__item_label">Название</label>
                <input type="text" name="title" class="lki__item_input" value="<?=$choice['title_complex'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Количество доступных квартир</label>
                <input type="text" name="number" class="lki__item_input" value="<?=$choice['number_of_objects'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Район</label>
                <input type="text" name="district" class="lki__item_input" value="<?=$choice['district'];?>">
            </div>

            <div class="lk__item">
                <label for="photo" class="lk__item_label">Изменить фото</label>
                <input type="file" class="lki__item_input input_photo" enctype="multipart/form-data" name="photo" id="photo">
            </div>

            <button class="lk__form_button">Редактировать ЖК</button>
        </form>

    </div>

    <div class="admin__control">
        <p class="admin__control_title">Добавление ЖК</p>

        <form action="complexAddDB.php" method="POST" class="lk__form">

            <div class="lk__item">
                <label for="" class="lk__item_label">Название</label>
                <input type="text" name="title" placeholder="Название" class="lki__item_input" required>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Количество доступных квартир</label>
                <input type="text" name="number" placeholder="Количество квартир" class="lki__item_input" required> 
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Район</label>
                <input type="text" name="district" placeholder="Район" class="lki__item_input" required>
            </div>

            <div class="lk__item">
                <label for="photo" class="lk__item_label">Добавить фото</label>
                <input type="file" class="lki__item_input" name="photo" required>
            </div>

            <button class="lk__form_button">Добавить ЖК</button>
        </form>

    </div>

    <div class="admin__control">
        <p class="admin__control_title">Удаление Жилого комплекса</p>

        <form action="complexDelDB.php?complexDel=<?=$complexDel?>" method="GET"class="edit__form" >
            <select name="complexDel" id="del" class="selects">
                <?php while($complexDelete = mysqli_fetch_array($resultTwo)) { ?>
               <option value="<?=$complexDelete['id_complex'];?>"><?=$complexDelete['title_complex'];?></option>
                <?php } ?>
            </select>
            <button class="sort__button">Удалить</button>
        </form>
    </div>
</main>
    
<?php include("../footer.php") ?>
</body>
</html>