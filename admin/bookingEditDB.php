<?php 
include("../connect.php");

        $accept = $_GET['accept'];
        $reject = $_GET['reject'];

            if ($accept) {
                $statusUpdate = "UPDATE `booking` SET `status`='2' WHERE `id_booking` = $accept";
                $statusResult = mysqli_query($connect, $statusUpdate);

                if ($statusResult) {
                    echo 'Всё ок';
                    echo "<script>alert('Заявка принята');</script>";
                    echo "<script>location.href = 'bookingEdit.php';</script>";
                        
                } else {
                    echo "<script>alert('Статус не изменён');</script>";
                    echo 'Всё не ок';
                }
            } else {
                echo 'нет ацепта';
            }

            if ($reject) {
                $statusUpdate = "UPDATE `booking` SET `status`='3' WHERE `id_booking` = $reject";
                $statusResult = mysqli_query($connect, $statusUpdate);

                if ($statusResult) {
                    echo 'Всё ок';
                    echo "<script>alert('Заявка отклонена');</script>";
                    echo "<script>location.href = 'bookingEdit.php';</script>";
                } else {
                    echo "<script>alert('Статус не изменён');</script>";
                    echo 'Всё не ок';
                }
            } else {
                echo 'нет реджекта';
            }

?>