<div id="shapka">
	
    <div id="logo">
    	<img src="/imagas/Apple.png"> <span>ВебЧат</span>
    </div>

    <div id="menu">
      <a href="/">Главная</a>
    	<a href="#" id="open_contact">Контакты</a>
    	<a href="#">Настройки</a>
      <?php 
      
      if(isset($_COOKIE["polzovatel_id"])) {
        $sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"];
        $resyltat = mysqli_query($connect, $sql);
        $polzovatel = mysqli_fetch_assoc($resyltat);
        ?>
           <a href="vihod.php"><?php echo $polzovatel["name"]; ?> &#187;</a>
        <?php
      } else {
      ?>
    	   <a href="login.php">Войти</a> <!--Войти или выйти-->
      <?php 
       }
      ?>

    </div>
</div>