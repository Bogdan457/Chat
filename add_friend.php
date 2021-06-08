<?php
include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

/*
1. Создать таблицу дя друзей - готово
2. Сделать ссылку на добавления в дрезья - готово
3. Сделать страницу обработчик где добавляем в базу данных выбранного пользователя
4. Перенаправляем пользователя на главную страницу
*/

if(isset($_GET["user_id"])) {
	$sql = "INSERT INTO friends (user_1, user_2) VALUES ('" . $polzovatel_id . "','" . $_GET["user_id"] . "')";
	mysqli_query($connect, $sql);
}

include 'pages/sections/list-friends.php';
?>
