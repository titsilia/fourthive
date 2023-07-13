<?php

include("../connect.php");
$complex = "select * from complex";

if (!empty($_POST)) {
    $title = $_POST["title"];
    $number = $_POST["number"];
    $district = $_POST["district"];
    $photo = $_POST["photo"];

    if ($title && $number && $district && $photo) {

        $complexAdd = "INSERT INTO `complex`(`id_complex`, `title_complex`, `number_of_objects`, `district`, `photo`) 
        VALUES (null,'$title','$number','$district','$photo')";

        $resultAdd = mysqli_query($connect, $complexAdd);


        if ($resultAdd) {
            echo 'Всё ок';
            echo "<script>alert('Комплекс добавлен');</script>";
            echo "<script>location.href = 'complexEdit.php';</script>";
        } else {
            echo "<script>alert('Комплекс не добавлен');</script>";
            echo 'Всё не ок';
        }

    } else {
        echo 'Недостаточно данных';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>
