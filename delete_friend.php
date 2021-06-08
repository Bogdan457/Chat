<?php

include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";


if(isset($_GET["user_id"])) {
	$sql = "DELETE FROM `friends` WHERE `friends`.`user_1` =" . $polzovatel_id . " AND `friends`.`user_2` =" . $_GET["user_id"] .  "";
	mysqli_query($connect, $sql);
}
include 'pages/sections/list-friends.php';
?>
