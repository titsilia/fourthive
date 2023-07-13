<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Работа с Объектами</title>
    <?php
    include("../connect.php");
    $objects = "select * from object";
    $result = mysqli_query($connect, $objects);
    $resultTwo = mysqli_query($connect, $objects);

    $id_object = !empty($_GET['id_object']) ? $_GET['id_object'] : mysqli_fetch_array(mysqli_query($connect, "select id_object from object"))['id_object'];
        $objectChoice = "select * from object where id_object = $id_object";
        $resultChoice = mysqli_query($connect, $objectChoice);
        $choice = mysqli_fetch_array($resultChoice);

        // для полей селект
    $rooms = "select * from rooms";
    $resultRooms = mysqli_query($connect, $rooms);
    $resultRoomsTwo = mysqli_query($connect, $rooms);

    $floors = "select * from floors";
    $resultFloors = mysqli_query($connect, $floors);
    $resultFloorsTwo = mysqli_query($connect, $floors);

    $complexes = "select * from complex";
    $resultComplex = mysqli_query($connect, $complexes);
    $resultComplexTwo = mysqli_query($connect, $complexes);

    $typeObject = "select * from type_object";
    $resultTypeObject = mysqli_query($connect, $typeObject);
    $resultTypeObjectTwo = mysqli_query($connect, $typeObject);

    $typeBuilding = "select * from type_building";
    $resultTypeBuilding = mysqli_query($connect, $typeBuilding);
    $resultTypeBuildingTwo = mysqli_query($connect, $typeBuilding);

    $objectDel = !empty($_GET['objectDel']) ? $_GET['objectDel'] : mysqli_fetch_array(mysqli_query($connect, "select id_object from object"))['id_object'];
    $objectChoiceDel = "select * from object where id_object = $objectDel";
    $resultChoiceDel = mysqli_query($connect, $objectChoiceDel);
    ?>
</head>
<body>
<?php include("../header.php") ?>

<main class="edit center">
    <div class="admin__control">
        <p class="admin__control_title">Редактирование Объектов</p>

        <form action="" class="edit__form" method="GET">

            <select name="id_object" class="selects">
                <?php while($object = mysqli_fetch_array($result)) { ?>
                    <option value="<?=$object['id_object'];?>"><?=$object['address'];?></option>
                <?php } ?>
            </select>

            <button class="sort__button">Хаха</button>
        </form>
        
        <form action="objectEditDB.php?id_object=<?=$id_object?>" method="POST" class="lk__form">

            <div class="lk__item">
                <label for="" class="lk__item_label">Адрес</label>
                <input type="text" name="address" class="lki__item_input" value="<?=$choice['address'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Количество комнат</label>
                <select name="rooms" id="rooms" class="lki__item_input">
                    <?php while($roomsArr = mysqli_fetch_array($resultRooms)) { ?>
                        <option value="<?=$roomsArr['id_rooms'];?>"><?=$roomsArr['title_rooms'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Количество этажей</label>
                <select name="floors" id="floors" class="lki__item_input">
                    <?php while($floorsArr = mysqli_fetch_array($resultFloors)) { ?>
                        <option value="<?=$floorsArr['id_floors'];?>"><?=$floorsArr['title_floors'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Жилая площадь</label>
                <input type="text" name="square" class="lki__item_input" value="<?=$choice['square'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Цена, руб</label>
                <input type="text" name="coust" class="lki__item_input" value="<?=$choice['coust'];?>">
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Жилой комплекс</label>
                <select name="complex" id="complex" class="lki__item_input">
                    <?php while($complexArr = mysqli_fetch_array($resultComplex)) { ?>
                        <option value="<?=$complexArr['id_complex'];?>"><?=$complexArr['title_complex'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Тип строения</label>
                <select name="type_building" id="type_building" class="lki__item_input">
                    <?php while($typeBuilding = mysqli_fetch_array($resultTypeBuilding)) { ?>
                        <option value="<?=$typeBuilding['id_building'];?>"><?=$typeBuilding['title_building'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Тип объекта</label>
                <select name="type_object" id="type_object" class="lki__item_input">
                    <?php while($typeObject = mysqli_fetch_array($resultTypeObject)) { ?>
                        <option value="<?=$typeObject['id_type'];?>"><?=$typeObject['title_type'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="photo" class="lk__item_label">Изменить фото</label>
                <input type="file" class="lki__item_input" name="object_photo">
            </div>

            <button class="lk__form_button">Редактировать</button>
        </form>

    </div>

    <div class="admin__control">
        <p class="admin__control_title">Добавление объекта</p>

        <form action="objectAddDB.php" method="POST" class="lk__form">
            <div class="lk__item">
                <label for="" class="lk__item_label">Адрес</label>
                <input type="text" name="address" class="lki__item_input" placeholder="Адрес" required>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Количество комнат</label>
                <select name="rooms" id="rooms" class="lki__item_input">
                    <?php while($roomsArr = mysqli_fetch_array($resultRoomsTwo)) { ?>
                        <option value="<?=$roomsArr['id_rooms'];?>"><?=$roomsArr['title_rooms'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Количество этажей</label>
                <select name="floors" id="floors" class="lki__item_input">
                    <?php while($floorsArr = mysqli_fetch_array($resultFloorsTwo)) { ?>
                        <option value="<?=$floorsArr['id_floors'];?>"><?=$floorsArr['title_floors'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Жилая площадь</label>
                <input type="text" name="square" class="lki__item_input" placeholder="Жилая площадь" required>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Цена, руб</label>
                <input type="text" name="coust" class="lki__item_input" placeholder="Цена, руб" required>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Жилой комплекс</label>
                <select name="complex" id="complex" class="lki__item_input">
                    <?php while($complexArr = mysqli_fetch_array($resultComplexTwo)) { ?>
                        <option value="<?=$complexArr['id_complex'];?>"><?=$complexArr['title_complex'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Тип строения</label>
                <select name="type_building" id="type_building" class="lki__item_input">
                    <?php while($typeBuilding = mysqli_fetch_array($resultTypeBuildingTwo)) { ?>
                        <option value="<?=$typeBuilding['id_building'];?>"><?=$typeBuilding['title_building'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="" class="lk__item_label">Тип объекта</label>
                <select name="type_object" id="type_object" class="lki__item_input">
                    <?php while($typeObject = mysqli_fetch_array($resultTypeObjectTwo)) { ?>
                        <option value="<?=$typeObject['id_type'];?>"><?=$typeObject['title_type'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="lk__item">
                <label for="photo" class="lk__item_label">Добавить фото</label>
                <input type="file" class="lki__item_input" name="object_photo" required>
            </div>

            <button class="lk__form_button">Добавить Объект</button>
        </form>

    </div>

    <div class="admin__control">
        <p class="admin__control_title">Удаление Объекта</p>

        <form action="objectDelDB.php?objectDel=<?=$objectDel?>" method="GET"class="edit__form" >
            <select name="objectDel" id="del" class="selects">
                <?php while($objectDelete = mysqli_fetch_array($resultTwo)) { ?>
               <option value="<?=$objectDelete['id_object'];?>"><?=$objectDelete['address'];?></option>
                <?php } ?>
            </select>
            <button class="sort__button">Удалить</button>
        </form>
    </div>
</main>
    
<?php include("../footer.php") ?>
<script src="./js/validation-login.js"></script>
</body>
</html>