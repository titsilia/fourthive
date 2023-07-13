<?php

include("connect.php");
session_start();

if (!empty($_POST)) {
    $telephone = $_POST["telephone"];
    $password = $_POST["password"];

    if ($telephone && $password ) {

        $login = "select * from `users` 
        WHERE `telephone` = '$telephone' AND `password` = '$password'";

        $resultLogin = mysqli_query($connect, $login);


        if($userInfo = mysqli_fetch_array($resultLogin)) {
            $_SESSION["telephoneLogin"] = $userInfo["telephone"];
            $_SESSION["roleLogin"] = $userInfo["id_role"];
            $_SESSION['nameLogin'] = $userInfo['name'];
            $_SESSION['surnameLogin'] = $userInfo['surname'];

            echo "<script>alert('Вы успешно вошли');</script>";
            echo "<script>location.href = 'complexs.php';</script>";
            echo 'Всё ок';
        } else {
            echo 'Всё не ок';
            echo "<script>alert('Вы не вошли. Неверные логин или пароль');</script>";
            echo "<script>location.href = 'login.php';</script>";
        }

    } else {
        echo "<script>alert('Вы не ввели данные');</script>";
        echo 'Нет телефона или пароля';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>
