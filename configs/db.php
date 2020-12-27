<?php 
// Данные для подкючения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

// Подключение к базе данных chat
$connect = mysqli_connect($server, $username, $password, $dbname);
// Кодировка базы данных
mysqli_set_charset($connect, "utf8");

?>