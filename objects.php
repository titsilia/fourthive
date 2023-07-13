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
    $query = "select * from object inner join type_building, type_object where object.type_building = type_building.id_building AND object.type_object = type_object.id_type";


    
    $rooms = !empty($_GET['rooms']) ? $_GET['rooms'] : mysqli_fetch_array(mysqli_query($connect, "select id_rooms from rooms"))['rooms'];
    $roomsChoice = "select * from rooms";
    $resultChoice = mysqli_query($connect, $roomsChoice);

    $floors = !empty($_GET['floors']) ? $_GET['floors'] : mysqli_fetch_array(mysqli_query($connect, "select id_floors from floors"))['floors'];
    $floorsChoice = "select * from floors";
    $resultFloorsChoice = mysqli_query($connect, $floorsChoice);

    $complex = !empty($_GET['complex']) ? $_GET['complex'] : mysqli_fetch_array(mysqli_query($connect, "select id_complex from complex"))['complex'];
    $complexChoice = "select * from complex";
    $resultComplexChoice = mysqli_query($connect, $complexChoice);

    $getRooms = $_GET['rooms'];
    $getFloors = $_GET['floors'];
    $getComplex = $_GET['complex'];

    if ($getRooms && $getFloors) {
        
        $query = $query . " AND `rooms` = $getRooms AND `floors` = $getFloors AND `complex` = $getComplex";
    }

    $result = mysqli_query($connect, $query);


    ?>
</head>
<body>
<?php include("header.php") ?>

<main class="complexes center">
    <p class="complexes__title">Все объекты</p>

    <div class="sort">
        <form action="?filter" method="GET" class="sort__form">
            <div class="form__container">
                <p class="form__title">Комнаты</p>
                <p class="form__title">Этажи</p>
            </div>

            <div class="form__container">
                <select name="rooms" class="form__select">
                        <?php while($roomsArr = mysqli_fetch_array($resultChoice)) { ?>
                            <option value="<?=$roomsArr['id_rooms'];?>"><?=$roomsArr['title_rooms'];?></option>
                        <?php } ?>
                </select>
                <select name="floors"  class="form__select">
                        <?php while($floorsArr = mysqli_fetch_array($resultFloorsChoice)) { ?>
                            <option value="<?=$floorsArr['id_floors'];?>"><?=$floorsArr['title_floors'];?></option>
                        <?php } ?>
                </select>
                <select name="complex"  class="selects">
                        <?php while($complexArr = mysqli_fetch_array($resultComplexChoice)) { ?>
                            <option value="<?=$complexArr['id_complex'];?>"><?=$complexArr['title_complex'];?></option>
                        <?php } ?>
                </select>
                <input type="submit" value="Выбрать" class="sort__button">
    
                <a href="?rooms=0&floors=0&complex=0" class="sort__link">Показать все</a>
            </div>
        </form>

    </div>

    <div class="complexes__container">

    <?php while($object = mysqli_fetch_array($result)) { ?>
        <div class="objects_item">
            <div class="objects__item_container">
                <a href="object.php?id_object=<?=$object['id_object'];?>">
                    <img src="./img/objects/<?=$object['object_photo'];?>" alt="" class="complexes__item_img"> 
                </a>   
            </div>
            <div class="complexes__item_elements">
                <div class="complexes__item_element"><?=$object['rooms'];?> ком.</div>
                <div class="complexes__item_element"><?=$object['floors'];?> эт.</div>
            </div>
            <p class="complexes__item_title"><?=$object['address'];?></p>
            <p class="complexes__item_desc">Цена: <?=$object['coust'];?> руб.</p>
            <p class="complexes__item_desc">Жилая площадь: <?=$object['square'];?></p>
            <p class="complexes__item_desc">Материал строения: <?=$object['title_building'];?></p>
            <p class="complexes__item_desc">Тип объекта: <?=$object['title_type'];?></p>
        </div>
    <?php } ?>

    </div>

    <a class="objects__link" href="complexs.php">К Жилым комплексам</a>
</main>

<?php 

?>

<?php include("footer.php") ?>
</body>
</html>