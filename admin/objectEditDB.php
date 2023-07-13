<?php 
    include("../connect.php");

    $queryComplex = "select * from complex";
    $resultComplex = mysqli_query($connect, $queryComplex);

    $complex = mysqli_fetch_array($resultComplex);

    $id_object = $_GET['id_object'];

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

        if (!empty($object_photo)) {
            $query = "UPDATE `object` SET `address`='$address',`rooms`='$rooms',`floors`='$floors',`square`='$square',`coust`='$coust',`complex`='$complex',`type_building`='$type_building',`type_object`='$type_building',`object_photo`='$object_photo' WHERE `id_object` = '$id_object'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                echo 'всё ок';
                echo "<script>alert('Объект отредактирован');</script>";
                echo "<script>location.href = 'objectEdit.php';</script>";
            } else {
                echo "<script>alert('Объект не отредактирован');</script>";
                echo "всё не ок";
            }

        } else {
            $query = "UPDATE `object` SET `address`='$address',`rooms`='$rooms',`floors`='$floors',`square`='$square',`coust`='$coust',`complex`='$complex',`type_building`='$type_building',`type_object`='$type_building' WHERE `id_object` = '$id_object'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                echo 'всё ок';
                echo "<script>alert('Объект отредактирован');</script>";
                echo "<script>location.href = 'objectEdit.php';</script>";
            } else {
                echo "<script>alert('Объект не отредактирован');</script>";
                echo "всё не ок";
            }
        }
        

    } else {
        echo 'Данные не были отправлены';
    }

    ?>