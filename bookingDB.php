<?php
include("connect.php");

session_start();
$telephoneLogin = empty($_SESSION["telephoneLogin"]) ? 'false' : $_SESSION["telephoneLogin"];
$roleLogin = empty($_SESSION["roleLogin"]) ? 'false' :  $_SESSION["roleLogin"];
$nameLogin = empty($_SESSION["nameLogin"]) ? 'false' :  $_SESSION["nameLogin"];
$surnameLogin = empty($_SESSION["surnameLogin"]) ? 'false' :  $_SESSION["surnameLogin"];

$id_object = $_GET['id_object'];

    if ($nameLogin && $surnameLogin && $telephoneLogin ) {

        $repeat_object = "select * from booking where telephone = $telephoneLogin AND object = $id_object";
        $result = mysqli_query($connect, $repeat_object);
         if (mysqli_num_rows($result) == 0) {
            echo 'Вы оформили заявку';

            $booking = "INSERT INTO `booking`(`id_booking`, `telephone`, `name`, `surname`, `status`, `object`) 
            VALUES (null,'$telephoneLogin','$nameLogin','$surnameLogin', 1, '$id_object')";

            $resultUsers = mysqli_query($connect, $booking);

            if ($resultUsers) {
                
                echo 'всё ок';
                echo "<script>alert('Вы оставили заявку');</script>";
                echo "<script>location.href = 'lk.php';</script>";
            } else {
                echo 'Всё не ок';
            }

        } else {
            echo 'У вас уже есть заявка по данному объекту';
            echo "<script>alert('У вас уже есть заявка по данному объекту');</script>";
            echo "<script>history.back();</script>";
        }

    } else {
        echo 'нет имени/фамилии!!!!!!!!';
    }

?>