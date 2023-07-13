<?php

include("../connect.php");

$complexDel = $_GET['complexDel'];


if (isset($_GET['complexDel'])) {


    $queryDelete = "DELETE FROM `complex` WHERE `id_complex` = $complexDel";
    $resultDel = mysqli_query($connect, $queryDelete);

    if ($resultDel) {
        echo 'Всё ок';
        echo "<script>alert('Комплекс удалён');</script>";
        echo "<script>location.href = 'complexEdit.php';</script>";
            
    } else {
        echo "<script>alert('Комплекс не удалён');</script>";
        echo 'Всё не ок';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>