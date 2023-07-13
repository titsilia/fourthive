<?php

include("../connect.php");

$objectDel = $_GET['objectDel'];


if (isset($_GET['objectDel'])) {


    $queryDelete = "DELETE FROM `object` WHERE `id_object` = $objectDel";
    $resultDel = mysqli_query($connect, $queryDelete);

    if ($resultDel) {
        echo 'Всё ок';
        echo "<script>alert('Объект удалён');</script>";
        echo "<script>location.href = 'objectEdit.php';</script>";
            
    } else {
        echo "<script>alert('Объект не удалён');</script>";
        echo 'Всё не ок';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>