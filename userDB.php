<?php 
    session_start();
    $telephoneLogin = empty($_SESSION["telephoneLogin"]) ? 'false' : $_SESSION["telephoneLogin"];

    include("connect.php");

    $queryUser = "select * from users";
    $resultUser = mysqli_query($connect, $queryUser);
    $userInfo = mysqli_fetch_array($resultUser);

    if (!empty($_POST)) {
        $telephone = $_POST['telephone'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];

        $query = "UPDATE `users` SET `telephone`='$telephone', `id_role`= '2', `name`='$name',`surname`='$surname',`password`='$password' WHERE `telephone` = $telephoneLogin";
        $result = mysqli_query($connect, $query);

        if ($result) {
            echo 'всё ок';
            echo "<script>alert('Вы изменили свои данные');</script>";
            echo "<script>location.href = 'lk.php';</script>";
        } else {
            echo "всё не ок";
            echo "<script>alert('Вы не изменили свои данные');</script>";
            echo "<script>location.href = 'lk.php';</script>";
        }

    } else {
        echo 'Данные не были отправлены';
    }

    ?>