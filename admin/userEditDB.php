<?php 
  include("../connect.php");

    $queryUser = "select * from users'";
    $resultUser = mysqli_query($connect, $queryUser);

    $telephone = $_GET['telephone'];

    if (!empty($_POST)) {
        $name = $_POST["name"];
        $telephone = $_POST["telephone"];
        $surname = $_POST["surname"];
        $password = $_POST["password"];
        $role = $_POST['role'];

        $query = "UPDATE `users` SET `telephone`='$telephone',`id_role`='$role',`name`='$name',`surname`='$surname',`password`='$password' WHERE `telephone` = '$telephone'";
        $result = mysqli_query($connect, $query);

            if ($result) {
                echo 'всё ок';
                echo "<script>alert('Пользователь отредактирован');</script>";
                echo "<script>location.href = 'userAdd.php';</script>";
            } else {
                echo "<script>alert('Пользователь отредактирован');</script>";
                echo "всё не ок";
            }
        

    } else {
        echo 'Данные не были отправлены';
    }
?>
