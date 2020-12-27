<?php 

$sql = "SELECT * FROM `polzovateli` WHERE id!=" . $polzovatel_id;
      $result = mysqli_query($connect, $sql);
      // mysqli_num_rows - получить коичество результатов
      $col_polzovately = mysqli_num_rows($result);

// $sqli = "SELECT * FROM `polzovateli` WHERE `id` = 14";

// $scrit = mysql_insert_id($sqli);

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
                    <a href="delete_friend.php?user_id=<?php echo $polzovatel["id"];?>">Удаить из друзей -</a>
                    <?php
                  } else {
                    ?>
                    <a href="add_friend.php?user_id=<?php echo $polzovatel["id"];?>">Добавить в друзья +</a>  
                    <?php
                  }
               ?>
      </li>
      <?php
  // Увеличеваем счетчик 
  $i = $i + 1;

}

        
?>
        
       </ul>


  </div>