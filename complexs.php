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

    <title>Жилые комплексы</title>
    <?php 
    include("connect.php");
    $query = "select * from complex";
    $result = mysqli_query($connect, $query);
    ?>
</head>
<body>
<?php include("header.php") ?>

<main class="complexes center">
    <p class="complexes__title">Наши Жилые комплексы</p>

    <div class="complexes__container">

    <?php while($complex = mysqli_fetch_array($result)) { ?>
        <div class="complexes__item">
            <div class="complexes__item_container">
                <a href="objectsJK.php?complex=<?=$complex['id_complex'];?>">
                    <img src="./img/complexes/<?=$complex['photo'];?>" alt="" class="complexes__item_img"> 
                </a>   
            </div>
            <div class="complexes__item_elements">
                <div class="complexes__item_element"><?=$complex['number_of_objects'];?> кв.</div>
            </div>
            <p class="complexes__item_title"><?=$complex['title_complex'];?></p>
            <p class="complexes__item_desc"><?=$complex['district'];?> район</p>
        </div>
    <?php } ?>



    </div>
</main>

<?php include("footer.php") ?>
</body>
</html>