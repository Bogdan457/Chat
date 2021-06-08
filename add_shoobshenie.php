<?php
include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";
?>
<?php

if(isset($_POST['otpravka_sms']) AND $_POST["text"] != null) {
  $sql = "INSERT INTO `soobhenya` (`text`, `komu_polzovatel_id`, `ot_polzovatel_id`) VALUES ('" . $_POST["text"] . "','" . $_POST["komu_polzovatel_id"] . "', '" . $_POST["ot_polzovatel_id"] . "')";
  mysqli_query($connect, $sql);
}

$otpravleno_polzovatel_id = $_POST["komu_polzovatel_id"];

include 'pages/sections/list-messages.php';

?>
