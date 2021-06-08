<div id="shapka">

    <div id="logo">
    	<img src="/imagas/Apple.png"> <span>ВебЧат</span>
    </div>

    <?php if(isset($_COOKIE["polzovatel_id"])) {
      ?>
      <div id="menu">
      <?php

        $sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"];
        $resyltat = mysqli_query($connect, $sql);
        $polzovatel = mysqli_fetch_assoc($resyltat);
        ?>
      <a><?php echo $polzovatel["name"]; ?></a>
      <a class="user_male">

        <?php

  $jquery = $connect->query("SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"]);
while($row = $jquery->fetch_assoc()) {
  $img = base64_encode($row['photo']);
  ?>
   <img class="user-photo" src="data:image/jpeg;base64, <?php echo $img ?>">
  <?php }
     ?>

      </a>
      <a class="fa fa-angle-down" id="menu-nav"></a>
      <div class="menu">
            <a href="/pages/myaccount.php">Главная</a>
            <a href="/pages/friends.php">Друзья</a>
            <a href="/vihod.php">Выйти</a>
        </div>
      <!-- <?php

      if(isset($_COOKIE["polzovatel_id"])) {
        $sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"];
        $resyltat = mysqli_query($connect, $sql);
        $polzovatel = mysqli_fetch_assoc($resyltat);
        ?>
           <a href="vihod.php"><?php echo $polzovatel["name"]; ?> &#187;</a>
        <?php
      } else {
      ?>
         <a href="login.php">Войти</a>
      <?php
       }
      ?> -->

    </div>
      <?php
    } ?>


</div>

<!--  <button class="menu-nav"><?php echo $polzovatel["name"]; ?> &#9660;</button>
          <nav class="nav">
            <ul>
              <li class="fa fa-cogs"><a href="">Профиль</a></li>
              <li class="fa fa-user-circle"><a href="">Ностройки</a></li>
              <li class="fa fa-sign-in"><a href="">Выход</a></li>
            </ul>
          </nav> -->
