<?php
include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

?>

<html>
<head>
  <title>Чат</title>
  <link rel="stylesheet" type="text/css" href="../mein1.css">
  <link rel="stylesheet" href="../css/font-awesome.css" type="text/css">
</head>
<body>

    <?php
      include $_SERVER["DOCUMENT_ROOT"] ."/chasti_site/shapka.php";
    ?>

    <?php
      include $_SERVER["DOCUMENT_ROOT"] ."/left-menu.php";
    ?>
    <div class="heading-friends">
      <h1>Все пользователи</h1>
    </div>
    <div class="heading-friends">
    <form id="poisk" action="http://chat.local/pages/sections/list-friends.php" method="POST">
         <input type="text" name="name" placeholder="Найти.." maxlength="20">
         <button class="fa fa-search"></button>
       </form>
     </div>
    <div class="block-friends">
         <div id="polzovatel">
      <?php include './sections/list-friends.php'; ?>

    </div>
    </div>
    <div id="button-friends-toy">
      <a href='my-all-friends.php' >Показать всех друзей</a>
    </div>


<script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
<script src="../script.js"></script>
<script src="../jquery.js"></script>
</body>
</html>
