<?php 
    include("../connect.php");

    $queryComplex = "select * from complex";
    $resultComplex = mysqli_query($connect, $queryComplex);


    $id_complex = $_GET['id_complex'];

    if (!empty($_POST)) {
        $title = $_POST['title'];
        $number = $_POST['number'];
        $district = $_POST['district'];
        $photo = $_POST['photo'];

        if (!empty($photo)) {
            $query = "UPDATE `complex` SET `title_complex`='$title',`number_of_objects`='$number',`district`='$district',`photo`='$photo' WHERE `id_complex` = '$id_complex'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                echo 'всё ок';
                echo "<script>alert('Комплекс отредактирован');</script>";
                echo "<script>location.href = 'complexEdit.php';</script>";
            } else {
                echo "<script>alert('Комплекс не отредактирован');</script>";
                echo "всё не ок";
            }

        } else {
            $query = "UPDATE `complex` SET `title_complex`='$title',`number_of_objects`='$number',`district`='$district' WHERE `id_complex` = '$id_complex'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                echo 'всё ок';
                echo "<script>alert('Комплекс отредактирован');</script>";
                echo "<script>location.href = 'complexEdit.php';</script>";
            } else {
                echo "<script>alert('Комплекс не отредактирован');</script>";
                echo "всё не ок";
            }
        }
        

    } else {
        echo 'Данные не были отправлены';
    }

    ?>