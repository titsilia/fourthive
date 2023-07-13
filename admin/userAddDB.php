<?php

include("../connect.php");

if (!empty($_POST)) {
    $name = $_POST["name"];
    $telephone = $_POST["telephone"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $role = $_POST['role'];

    $users = "INSERT INTO `users`(`telephone`, `id_role`, `name`, `surname`, `password`) 
    VALUES ('$telephone','$role','$name','$surname','$password')";
    echo 'Попытка отправить данные';

    $resultUsers = mysqli_query($connect, $users);

    if ($resultUsers) {
        echo 'Всё ок';
        echo "<script>alert('Пользователь добавлен');</script>";
        echo "<script>location.href = 'userAdd.php';</script>";
            
    } else {
        echo "<script>alert('Пользователь не добавлен');</script>";
        echo 'Всё не ок';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>
