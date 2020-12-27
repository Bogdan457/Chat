<?php
include "configs/db.php";

/*
==================
Отправка сообщения выбраному полозователю
*/

if(isset($_POST['otpravka_sms'])) {
  $sql = "INSERT INTO `soobhenya` (`text`, `komu_polzovatel_id`, `ot_polzovatel_id`) VALUES ('" . $_POST["text"] . "','" . $_POST["komu_polzovatel_id"] . "', '" . $_POST["ot_polzovatel_id"] . "')";
  mysqli_query($connect, $sql);
}

$otpravleno_polzovatel_id = $_POST["komu_polzovatel_id"];

include "modules/spisok-s.php";

?>