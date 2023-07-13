<?php

include("../connect.php");

$telephoneDel = $_GET['telephoneDel'];


if (isset($_GET['telephoneDel'])) {


    $queryDelete = "DELETE FROM `users` WHERE `telephone` = $telephoneDel";
    $resultDel = mysqli_query($connect, $queryDelete);

    if ($resultDel) {
        echo 'Всё ок';
        echo "<script>alert('Пользователь удалён');</script>";
        echo "<script>location.href = 'userAdd.php';</script>";
            
    } else {
        echo "<script>alert('Пользователь не удалён');</script>";
        echo 'Всё не ок';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>