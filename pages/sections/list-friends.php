

   <?php
   include $_SERVER["DOCUMENT_ROOT"] ."/configs/db.php";

   include $_SERVER["DOCUMENT_ROOT"] ."/configs/nastroyki.php";

   if(isset($_POST["name"])) {
     $sql = "SELECT * FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["name"] . "%' AND id!=" . $polzovatel_id;
      $result = mysqli_query($connect, $sql);
       $col_polzovately = mysqli_num_rows($result);
   } else {
     $sql = "SELECT * FROM `polzovateli` WHERE id!=" . $polzovatel_id;
         $result = mysqli_query($connect, $sql);
         // mysqli_num_rows - получить коичество результатов
         $col_polzovately = mysqli_num_rows($result);
       }

   ?>

   <div id="spisok">

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
                 <a href='/profile.php?user=<?php echo $polzovatel["id"]; ?>'>
               <?php

     $jquery = $connect->query("SELECT * FROM polzovateli WHERE id!=" . $polzovatel['id']);
     while($row = $jquery->fetch_assoc()) {
     $img = base64_encode($row['photo']); ?>
     <?php } ?>
     <img class="users-photo" src="data:image/jpeg;base64, <?php echo $img ?>">


              <h2 class="friends-name"> <?php echo $polzovatel["name"] ?></h2>
                  <?php
                 $sql = "SELECT * FROM friends WHERE user_1=" . $polzovatel["id"] . " AND user_2=" . $polzovatel_id . " OR user_1=" . $polzovatel_id . " AND user_2=" . $polzovatel["id"];
                 $friendsResult = mysqli_query($connect, $sql);
                 $col_friends = mysqli_num_rows($friendsResult);
                 if($col_friends > 0) {
                   ?>
                   <a data-hrefi="http://chat.local/delete_friend.php?user_id=<?php echo $polzovatel["id"];?>" onclick="delteFriend(this)" class="add-friend" >Удаить из друзей<p class="fa fa-times-circle" id="times-friend"></p></a>
                   <a class="write-message" href="http://chat.local/pages/correspondence.php?user_id=<?php echo $polzovatel["id"];?>">Написать сообщение<p class="fa fa-comment-o" id="write-message"></p></a>
                   <?php
                 } else {
                   ?>
                   <a data-href="http://chat.local/add_friend.php?user_id=<?php echo $polzovatel["id"];?>" onclick="addFriend(this)" class="add-friend" >Добавить в друзья<p class="fa fa-plus-circle" id="plus-friend"></p></a>
                   <?php
                 }
                 ?>
          </a>
     </li>
         <?php
     // Увеличеваем счетчик
     $i = $i + 1;

   }


   ?>

          </ul>


   	</div>

    <script>
    var form = document.querySelector("#poisk");

    form.onsubmit = function(sobitye) {
        sobitye.preventDefault();
        console.dir(sobitye);
    	var name = form.querySelector("input");


        var dannie = "name=" + name.value;


        var ajax = new XMLHttpRequest();
            ajax.open("POST", form.action, false);
            ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            ajax.send(dannie);

        console.dir(ajax);
        var spisokSoobsheniy = document.querySelector("#spisok");
        spisokSoobsheniy.innerHTML = ajax.response;

    }
    </script>
