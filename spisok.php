<?php
include "configs/db.php";

include "configs/nastroyki.php";

if(isset($_POST["name"])) {
  $sql = "SELECT name FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["name"] . "%'";
   $result = mysqli_query($connect, $sql);
    $col_polzovately = mysqli_num_rows($result);

} else {
  $sql = "SELECT * FROM `polzovateli` WHERE id!=" . $polzovatel_id;
      $result = mysqli_query($connect, $sql);
      // mysqli_num_rows - получить коичество результатов
      $col_polzovately = mysqli_num_rows($result);
}



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
               <h2> <?php echo $polzovatel["name"] ?></h2>
                  <p>HI</p>
                  <div class="time">09:10</div>
                  </a>
      </li>
      <?php
  // Увеличеваем счетчик
  $i = $i + 1;

}


?>

       </ul>


	</div>
