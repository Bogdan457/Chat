<?php 
// Возврашяет HTML с пользователями
$sql = "SELECT * FROM `polzovateli` WHERE id!=" . $polzovatel_id;
      $result = mysqli_query($connect, $sql);
      // mysqli_num_rows - получить коичество результатов
      $col_polzovately = mysqli_num_rows($result);

        // $i - счетчик для подчета поьзоватилей
        $i = 0;
          // поко в переменной i хранится значение меньше чем количество пользоватилей
        while($i < $col_polzovately) {
          // mysqli_fetch_assoc - преобразовать полученые данные поьзоватилей в масив
          $polzovatel = mysqli_fetch_assoc($result);
          // Если существует запрос с поисковым текстом ИИ поиск текст равен имени пользователя
          ?>
              <li>
    <div class="user_male">
                <img src='<?php echo $polzovatel["photo"]; ?>'>
                </div>
               <h2> <?php echo $polzovatel["name"] ?></h2>
               <?php 
                  $sql = "SELECT * FROM friends WHERE user_1=" . $polzovatel["id"] . " AND user_2=" . $polzovatel_id . " OR user_1=" . $polzovatel_id . " AND user_2=" . $polzovatel["id"];
                  $friendsResult = mysqli_query($connect, $sql);
                  $col_friends = mysqli_num_rows($friendsResult);
                  if($col_friends > 0) {
                    ?>
                    <div data-hrefi="http://chat.local/delete_friend.php?user_id=<?php echo $polzovatel["id"];?>" onclick="delteFriend(this)">Удаить из друзей -</div>
                    <?php
                  } else {
                    ?>
                    <div data-href="http://chat.local/add_friend.php?user_id=<?php echo $polzovatel["id"];?>" onclick="addFriend(this)">Добавить в друзья +</div>  
                    <?php
                  }
               ?>
      </li>
      <?php
  // Увеличеваем счетчик 
  $i = $i + 1;

}
?>