<?php

if(isset($_POST['name'])) {
  $sql = "SELECT * FROM `polzovateli` WHERE `name` LIKE '%" . $_POST["name"] . "%'";
   $result = mysqli_query($connect, $sql);
    $col_polzovately = mysqli_num_rows($result);

} else {
  echo 'ошибка';
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
          $row = mysqli_fetch_assoc($result);
          // Если существует запрос с поисковым текстом ИИ поиск текст равен имени пользователя
          ?>
              <li>
               <h2> <?php echo $row["name"] ?></h2>
      </li>
      <?php
  // Увеличеваем счетчик
  $i = $i + 1;

}


?>

       </ul>
