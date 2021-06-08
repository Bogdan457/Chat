<?php
include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

?>

<!DOCTYPE html>
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
   <div id="soobsheniya">
     <div id="shapka-correspondence">
 <?php
 if(isset($_GET["user_id"]) || isset($otpravleno_polzovatel_id)) {
  $user_id = null;

 if(isset($_GET["user_id"])) {
   $user_id = $_GET["user_id"];
 } else {
   $user_id = $otpravleno_polzovatel_id;
 }
     $sql = "SELECT * FROM soobhenya WHERE komu_polzovatel_id=" . $user_id;
     $resultat = mysqli_query($connect, $sql);
     $soobshenie = mysqli_fetch_assoc($resultat);
       ?><li><?php
          $sql = "SELECT name FROM polzovateli WHERE id=" . $_GET["user_id"];
          $polzovatel = mysqli_query($connect, $sql);
          $polzovatel = mysqli_fetch_assoc($polzovatel);
           $jquery = $connect->query("SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"]);
      while($row = $jquery->fetch_assoc()) {
        $img = base64_encode($row['photo']);
        ?>
         <img class="create-article-photo" src="data:image/jpeg;base64, <?php echo $img ?>">
        <?php }
      ?><p class="name-correspondence"><?php echo $polzovatel["name"]; ?></p></li>
<?php } else { echo "<h2>Поьзователь не выбран</h2>"; } ?>
     </div>
<div id="spisok-soobsheniy">
<?php
  include "sections/list-messages.php";
?>
<form id="form" action="http://chat.local/add_shoobshenie.php" method="POST">
<input type="hidden" name="komu_polzovatel_id" value="<?php echo $_GET["user_id"]?>">
<input type="hidden" name="ot_polzovatel_id" value="<?php echo $_COOKIE["polzovatel_id"]?>">
<textarea placeholder="Написать сообщения..." id="txtInput" name="text"></textarea>
<button class="fa fa-paper-plane" type="submit" name="otpravka_sms" id="otpravka_sms"></button>
</form>
<div class="button-soobsheniy">
  <button id="add-article" class="popup-open-smile fa fa-smile-o"></button>
</div>
<?php
if(isset($_GET["user_id"])) {
?>

<div class="popup-smile" id="popup-smile">
<?php

$jquery = $connect->query("SELECT * FROM `emoticons`");
while($row = $jquery->fetch_assoc()) {
?>
<li class="emoticons" title="<?php echo $row['smile']; ?>"><?php echo $row['smile']; ?></li>

<?php } ?>

</div>
<?php
}
?>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  var block = document.getElementById("spisok-soobsheniy");
    block.scrollTop = 9999;
$('.popup-open-photo').click(function() {
  $('.popup-fade').fadeIn();
  return false;
});
$('body')
    .one('focus.textarea', '#txtInput', function(e) {
        baseH = this.scrollHeight;
    })
    .on('input.textarea', '#txtInput', function(e) {
        if(baseH < this.scrollHeight) {
            $(this).height(0).height(this.scrollHeight);
        }
    });

var form = document.querySelector("#form");

form.onsubmit = function(sobitye) {
    sobitye.preventDefault();
    console.dir(sobitye);
 var komu = form.querySelector("input[name='komu_polzovatel_id']");
 var ot = form.querySelector("input[name='ot_polzovatel_id']");
 var text = form.querySelector("textarea");

    var dannie = "otpravka_sms=1" +
                  "&komu_polzovatel_id=" + komu.value +
                  "&ot_polzovatel_id=" + ot.value +
                  "&text=" + text.value;

    var ajax = new XMLHttpRequest();
        ajax.open("POST", form.action, false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(dannie);

    console.dir(ajax);
    var spisokSoobsheniy = document.querySelector("#spisok-soobsheniy");
    spisokSoobsheniy.innerHTML = ajax.response;
    text.value = "";

    var block = document.getElementById("spisok-soobsheniy");
      block.scrollTop = 9999;

}
$('.popup-smile li').click(function() {
  var smiley = $(this).attr('title');
  ins2pos(smiley, 'txtInput');
});
$('#otpravka_sms').click(function(){
    $('#popup-smile').hide(); // Скрывает начальное содержимое.
});
</script>

<?php include 'footer.php'; ?>
