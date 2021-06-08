<?php
include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

?>

<?php

if(isset($_POST['send']) AND $_POST["article"] != null) {
$sql = "INSERT INTO `articles` (`user_id`, `article`, `date`) VALUES ('" . $_COOKIE["polzovatel_id"] . "','" . $_POST["article"] . "', NOW())";
mysqli_query($connect, $sql);
}

include './sections/all-articles.php';
?>
