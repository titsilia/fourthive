<?php 
session_start();

$exit = session_destroy();

if ($exit) {
    echo "<script>location.href = 'index.php';</script>";
}
?>