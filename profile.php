<?php
include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

?>

<html>
<head>
  <title>Чат</title>
  <link rel="stylesheet" type="text/css" href="mein1.css">
  <link rel="stylesheet" href="../css/font-awesome.css" type="text/css">
</head>
<body>

  <?php
   include $_SERVER["DOCUMENT_ROOT"] ."/chasti_site/shapka.php";
?>

<?php
    include $_SERVER["DOCUMENT_ROOT"] ."/left-menu.php";
   ?>

<div class='content-account'>

<div class="right-block-account">
	<?php

       $sql = "SELECT * FROM polzovateli WHERE id=" . $_GET["user"];
       $result = $connect->query($sql);
       while($row = mysqli_fetch_assoc($result)) {
     ?>
  <h1 class="name-account"><?php echo $row["name"]; ?></h1>

    <?php
       }

     ?>
  <?php $sql = "SELECT * FROM status WHERE id = 1";
        $resyltat = mysqli_query($connect, $sql);
        $status = mysqli_fetch_assoc($resyltat); ?>
 <p class="online-account"><?php echo $status['status'] ?></p>
 <div class="section"></div>
<div class="user-information">
    <?php

      $sql =  "SELECT * FROM polzovateli WHERE id=" . $_GET["user"];
      $result = $connect->query($sql);
      while($row = mysqli_fetch_assoc($result)) {
    ?>
      <div>Телефон:  <?php echo $row['phone']?></div>
      <div>Почта:  <?php echo $row['email']?></div>
      <a href="#">Подробная информация</a>
   <?php
      }

    ?>


  </div>
</div>



<div class="left-block-account">

 <?php
if($connect->query("SELECT * FROM polzovateli WHERE id=" . $_GET["user"]) != '') {
  $jquery = $connect->query("SELECT * FROM polzovateli WHERE id=" . $_GET["user"]);
while($row = $jquery->fetch_assoc()) {
  $img = base64_encode($row['photo']);
  ?>
   <img class="photo-account" src="data:image/jpeg;base64, <?php echo $img ?>">
  <?php } } else {
?>
   <img class="photo-plug" src="../imagas/plug.png">
  <?php

  }
 ?>
<div class="friends-block-account">
  <?php $a = $connect->query("SELECT COUNT(1) FROM friends WHERE user_1=" . $_GET["user"]);
$b = $a->fetch_array();
 ?>
 <p>Друзей</p>
 <h1><?php echo $b[0]; ?></h1>
</div>

  <a href="http://chat.local/pages/correspondence.php?user_id=<?php echo $polzovatel["id"];?>" class="write-message-profile"><p>Написать сообщение</p></a>

  <div class="myaccount-block-friend">


       <?php
       include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

       include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

       if(isset($_POST["name"])) {
         $sql = "SELECT * FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["name"] . "%' AND id!=" . $polzovatel_id;
          $result = mysqli_query($connect, $sql);
           $col_polzovately = mysqli_num_rows($result);
       } else {
         $sql = "SELECT * FROM `polzovateli` WHERE id!='" . $polzovatel_id . "' LIMIT 4";
             $result = mysqli_query($connect, $sql);
             // mysqli_num_rows - получить коичество результатов
             $col_polzovately = mysqli_num_rows($result);
           }

       ?>


              <ul>
               <?php
               // $i - счетчик для подчета поьзоватилей
               $i = 0;
                 // поко в переменной i хранится значение меньше чем количество пользоватилей
               while($i < $col_polzovately) {
                 // mysqli_fetch_assoc - преобразовать полученые данные поьзоватилей в масив
                 $polzovatel = mysqli_fetch_assoc($result);
                 // Если существует запрос с поисковым текстом ИИ поиск текст равен имени пользователя
                 ?>
                 <li>
                   <?php

         $jquery = $connect->query("SELECT * FROM polzovateli WHERE id!=" . $polzovatel["id"]);
         while($row = $jquery->fetch_assoc()) {
         $img = base64_encode($row['photo']); ?>
         <?php } ?>
                  <?php
                 $sql = "SELECT * FROM friends WHERE user_1=" . $_GET["user"] . " AND user_2=" . $polzovatel_id . " OR user_1=" . $_GET["user"] . " AND user_2=" . $polzovatel["id"];
                 $friendsResult = mysqli_query($connect, $sql);
                 $col_friends = mysqli_num_rows($friendsResult);
                 if($col_friends > 0) {
                   ?>
                   <img class="create-article-photo" src="data:image/jpeg;base64, <?php echo $img ?>">
                   <h2 class="friends-name-my-account"> <?php echo $polzovatel["name"] ?></h2>
                   <?php
                 }
                 ?>
         </li>
             <?php
         // Увеличеваем счетчик
         $i = $i + 1;

       }
      ?>
       <?php
       if($b[0] == 0) {
         ?>
				 <?php

							 $sql = "SELECT * FROM polzovateli WHERE id=" . $_GET["user"];
							 $result = $connect->query($sql);
							 while($row = mysqli_fetch_assoc($result)) {
						 ?>
					<h2 class="no-friends">у пользователя <?php echo $row["name"] ?> нет ни одного друга</h2>

						<?php
							 }

						 ?>
         <?php
       }
       ?>

              </ul>

<div id="button-friends">

	<?php
				$sql = "SELECT * FROM polzovateli WHERE id=" . $_GET["user"];
				$result = $connect->query($sql);
				while($row = mysqli_fetch_assoc($result)) {
			?>
	 <a href='my-all-friends.php'>Показать всех друзей пользователя <?php echo $row["name"] ?></a>

		 <?php
				}

			?>
</div>



  </div>

  <div class="myaccount-all-photos">
    <p>Мои фотографии</p>
  </div>

  <script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
  <script>
  $('#button-send-article').click(function(){
      $('.popup-smile').hide(); // Скрывает начальное содержимое.
  });
  </script>

  <div class="profile-articles">
    <div class="myaccount-tabs">
    <input type="radio" name="tab-btn" id="all-articles-tab" value="" checked>
      <label for="all-articles-tab">Все записи</label>
    <input type="radio" name="tab-btn" id="my-articles-tab" value="">
		<?php
					$sql = "SELECT * FROM polzovateli WHERE id=" . $_GET["user"];
					$result = $connect->query($sql);
					while($row = mysqli_fetch_assoc($result)) {
				?>
		 <label for="my-articles-tab">Записи <?php echo $row["name"] ?></label>

			 <?php
					}

				?>

        <div id="all-articles">
            <?php include 'pages/sections/all-articles.php'; ?>
        </div>
        <div id="my-articles">
          <?php include 'pages/sections/user-id-my-articles.php'; ?>
        </div>
  </div>
  </div>


<div class="popup-fade">
  <div class="popup">
    <a class="fa fa-times popup-close"></a>
    <form class="add-photo" method="post" enctype="multipart/form-data">
<p>Загрузить картику</p>
<input action="myaccount.php" type="file" name="img_upload"><input class="photo-download" type="submit" name="upload" value="Загрузить">
<?php

if(isset($_POST['upload'])){
  $img_type = substr($_FILES['img_upload']['type'], 0, 5);
  $img_size = 2*1024*1024;
  if(!empty($_FILES['img_upload']['tmp_name']) and $img_type === 'image' and $_FILES['img_upload']['size'] <= $img_size){
  $photo = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
  $connect->query("UPDATE `polzovateli` SET `photo` = '$photo' WHERE id=" . $_COOKIE["polzovatel_id"]);
  // "UPDATE `polzovateli` SET `photo` = '$photo' WHERE id=" . $_COOKIE["polzovatel_id"]"
  // "INSERT INTO polzovateli (photo) VALUES ('$photo') WHERE id=" . $_COOKIE["polzovatel_id"]"
  }
}
?>

</form>
  </div>
</div>

</div>

  </div>


<?php include 'pages/footer.php'; ?>
