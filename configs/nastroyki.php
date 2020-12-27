<?php 
$polzovatel_id = null;

if(isset($_COOKIE["polzovatel_id"])) {
  $polzovatel_id = $_COOKIE["polzovatel_id"];
}

if($polzovatel_id == null) {
  header("Location: /login.php");
}


?>