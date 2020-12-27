<?php 
include "configs/db.php";

include "configs/nastroyki.php";


?>


<!DOCTYPE html>
<html>
<head>
	<title>Чат</title>
	<link rel="stylesheet" type="text/css" href="mein1.css">
</head>
<body>

<?php 
   include "chasti_site/shapka.php";
?>

<div id="content">
	<div id="users">
		
      <form action="http://chat.local/spisok.php" method="POST" id="poisk">
     <input type="text" name="poisk-text">
     <button><img src="imagas/icon-111.webp">
     </button>
   </form>
       <div id="polzovateli">
      		<?php 
             
            // include - подключить файл
            include "spisok.php";
          ?>
        </div>
  </div>

  <div id="soobsheniya">
    <div id="spisok-soobsheniy">
  <?php
     include "modules/spisok-s.php";
  ?>
  <?php 
     if(isset($_GET["user"])) {
      ?>
      <form id="form" action="http://chat.local/add_shoobshenie.php" method="POST">
     <input type="hidden" name="komu_polzovatel_id" value="<?php echo $_GET["user"]?>">
     <input type="hidden" name="ot_polzovatel_id" value="<?php echo $_COOKIE["polzovatel_id"]?>">
     <textarea name="text"></textarea>
     <button type="submit" name="otpravka_sms"><img src="imagas/send.jpg"></button>
   </form>
      <?php
     }
  ?>


   </div> 


</div>
  <div class="modal" id="contacts-modal">
    <div class="close">X</div>
    <div class="content"> 
      <ul>
<?php 

 include "contact.php";

    ?>


  </ul>
    </div>
</div>
<div>

<script src="script.js"></script>

</body>
</html>