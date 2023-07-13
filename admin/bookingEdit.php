<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,500&display=swap" rel="stylesheet">

    <title>Просмотр бронь</title>
    <?php
    include("../connect.php");

    $bookingsReview = "select * from booking inner join status_bo where status = 1 AND booking.status = status_bo.id_status";
    $resultReview = mysqli_query($connect, $bookingsReview);

    $bookingsAccept = "select * from booking inner join status_bo where status = 2 AND booking.status = status_bo.id_status";
    $resultAccept = mysqli_query($connect, $bookingsAccept);

    $bookingsReject = "select * from booking inner join status_bo where status = 3 AND booking.status = status_bo.id_status";
    $resultReject = mysqli_query($connect, $bookingsReject);
    
    ?>
</head>
<body>
<?php include("../header.php") ?>

<main class="edit__booking center">

    <p class="admin__control_title">Просмотр заявок</p>

    <div class="edit__booking_container">
        
        <div class="edit__booking_items">
            <p class="edit__booking_title decoration">На рассмотрении</p>
    
            <div class="edit__booking_item">
                <?php while($booking = mysqli_fetch_array($resultReview)) { ?>
                    <form action="bookingEditDB.php" method="POST" class="edit__booking_form">
                        <p class="edit__booking_form_text">Заявка № <?=$booking['id_booking'];?></p>
                        <p class="edit__booking_form_text">Статус заявки: <span class="edit__booking_form_text_ad review"><?=$booking['title_status'];?></span></p>
                        <p class="edit__booking_form_text">Номер телефона: <span class="edit__booking_form_text_ad"><?=$booking['telephone'];?></span></p>
                        <p class="edit__booking_form_text">Имя оформителя: <span class="edit__booking_form_text_ad"><?=$booking['name'];?></span></p>
                        <p class="edit__booking_form_text">Фамилия: <span class="edit__booking_form_text_ad"><?=$booking['surname'];?></span></p>
                        <p class="edit__booking_form_text">Номер объекта: <span class="edit__booking_form_text_ad"><?=$booking['object'];?></span></p>
                        <div class="edit__booking_buttons">
                            <a href="bookingEditDB.php?accept=<?=$booking['id_booking'];?>" class="edit__booking_buttons_button accept_button">Принять</a>
                            <a href="bookingEditDB.php?reject=<?=$booking['id_booking'];?>" class="edit__booking_buttons_button reject_button">Отклонить</a>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    
        <div class="edit__booking_items">
            <p class="edit__booking_title">Принятые</p>
    
            <div class="edit__booking_item hidden">
                <?php while($booking = mysqli_fetch_array($resultAccept)) { ?>
                    <form method="POST" class="edit__booking_form">
                        <p class="edit__booking_form_text">Заявка № <?=$booking['id_booking'];?></p>
                        <p class="edit__booking_form_text">Статус заявки: <span class="edit__booking_form_text_ad accept"><?=$booking['title_status'];?></span></p>
                        <p class="edit__booking_form_text">Номер телефона: <span class="edit__booking_form_text_ad"><?=$booking['telephone'];?></span></p>
                        <p class="edit__booking_form_text">Имя оформителя: <span class="edit__booking_form_text_ad"><?=$booking['name'];?></span></p>
                        <p class="edit__booking_form_text">Фамилия: <span class="edit__booking_form_text_ad"><?=$booking['surname'];?></span></p>
                        <p class="edit__booking_form_text">Номер объекта: <span class="edit__booking_form_text_ad"><?=$booking['object'];?></span></p>
                    </form>
                <?php } ?>
            </div>
        </div>
    
        <div class="edit__booking_items">
            <p class="edit__booking_title">Отклонённые</p>
    
            <div class="edit__booking_item hidden">
                <?php while($booking = mysqli_fetch_array($resultReject)) { ?>
                    <form method="POST" class="edit__booking_form">
                        <p class="edit__booking_form_text">Заявка № <?=$booking['id_booking'];?></p>
                        <p class="edit__booking_form_text">Статус заявки: <span class="edit__booking_form_text_ad reject"><?=$booking['title_status'];?></span></p>
                        <p class="edit__booking_form_text">Номер телефона: <span class="edit__booking_form_text_ad"><?=$booking['telephone'];?></span></p>
                        <p class="edit__booking_form_text">Имя оформителя: <span class="edit__booking_form_text_ad"><?=$booking['name'];?></span></p>
                        <p class="edit__booking_form_text">Фамилия: <span class="edit__booking_form_text_ad"><?=$booking['surname'];?></span></p>
                        <p class="edit__booking_form_text">Номер объекта: <span class="edit__booking_form_text_ad"><?=$booking['object'];?></span></p>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

    

</main>


<?php include("../footer.php") ?>
<script src="../js/bookingEdit.js"></script>
</body>
</html>