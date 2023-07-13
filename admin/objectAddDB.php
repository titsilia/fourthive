<?php

include("../connect.php");
$complex = "select * from object";

if (!empty($_POST)) {
    $address = $_POST['address'];
    $rooms = $_POST['rooms'];
    $floors = $_POST['floors'];
    $square = $_POST['square'];
    $coust = $_POST['coust'];
    $complex = $_POST['complex'];
    $type_building = $_POST['type_building'];
    $type_object = $_POST['type_object'];
    $object_photo = $_POST['object_photo'];

    $objectAdd = "INSERT INTO `object`(`id_object`, `address`, `rooms`, `floors`, `square`, `coust`, `complex`, `type_building`, `type_object`, `object_photo`) 
    VALUES (null,'$address','$rooms','$floors','$square','$coust','$complex','$type_building','$type_object','$object_photo')";

    $resultAdd = mysqli_query($connect, $objectAdd);

    if ($resultAdd) {
        echo 'Всё ок';
        echo "<script>alert('Объект добавлен');</script>";
        echo "<script>location.href = 'objectEdit.php';</script>";
    } else {
        echo "<script>alert('Объект не добавлен');</script>";
        echo 'Всё не ок';
    }

} else {
    echo 'Данные не были отправлены!';
}

?>