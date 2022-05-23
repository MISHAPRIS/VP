<?php
    $host = 'localhost';
    $db   = 'bd';// Имя базы данных, которую создали
    $user = 'root';
    $pass = '';

    $con = mysqli_connect($host, $user, $pass) or die ("error con");
    mysqli_select_db($con, $db) or die ("error db");//подключение к бд , а die-вывод ошибки
?>