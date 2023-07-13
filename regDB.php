<?php

include("connect.php");

if (!empty($_POST)) {
    $name = $_POST["name"];
    $telephone = $_POST["telephone"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];

    if ($password == $password_repeat) {
        $role = "2";
        $users = "INSERT INTO `users`(`telephone`, `id_role`, `name`, `surname`, `password`) 
        VALUES ('$telephone','$role','$name','$surname','$password')";
        echo 'Попытка отправить данные';

        $resultUsers = mysqli_query($connect, $users);

        if ($resultUsers) {
            echo 'Всё ок';
            echo "<script>alert('Вы зарегистрировались');</script>";
            echo "<script>location.href = 'reg.php';</script>";
            
        } else {
            echo "<script>alert('Вы не зарегистрировались');</script>";
            echo 'Всё не ок';
            echo "<script>location.href = 'reg.php';</script>";
        }

    } else {
        echo "<script>alert('Пароли не совпали');</script>";
        echo 'пароли не совпадают!!!!!!!!';
    }
} else {
    echo 'Данные не были отправлены!';
}

?>
