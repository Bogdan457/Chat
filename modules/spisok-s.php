
      <ul>
          <?php
          if(isset($_GET["user"]) || isset($otpravleno_polzovatel_id)) {
           $user_id = null;

          if(isset($_GET["user"])) {
            $user_id = $_GET["user"];
          } else {
            $user_id = $otpravleno_polzovatel_id;
          }
// Получить все сообщения которые были отправлены пользователю
$sql = "SELECT * FROM soobhenya " . // Выбераем все сообщения
 " WHERE (komu_polzovatel_id=" . $user_id . // Где id отправляемому пользователю = $_GET["user"]
   " AND ot_polzovatel_id =" . $_COOKIE["polzovatel_id"] . ") " . // И отправлено от пользователя с id = 14
   " OR (komu_polzovatel_id=" . $_COOKIE["polzovatel_id"] . " AND ot_polzovatel_id=" . $user_id . ")"; // Или отправлено пользователю с id 14 И от пользователя с id $_GET["user"]
// Выпонить sql запрос в базе данных
$resultat = mysqli_query($connect, $sql);
// mysqli_num_rows - получить коичество результатов
$col_soobsheniy = mysqli_num_rows($resultat);


// "SELECT * FROM `soobhenya` ORDER BY `ot_polzovatel_id` ASC";



            $i = 0;
            while($i < $col_soobsheniy) {
            // mysqli_fetch_assoc - преобразовать полученые данные поьзоватилей в масив
            $soobshenie = mysqli_fetch_assoc($resultat);
              
                
                  ?>
                    <li>     
                        <div class="user2">
                            <img src="../imagas/user2.webp">
                        </div>
                        <?php 
                            // Вывести имя конкретного пользователя
                            $sql = "SELECT name FROM polzovateli WHERE id=" . $soobshenie["ot_polzovatel_id"];
                            // Выполняем запрос
                            $polzovatel = mysqli_query($connect, $sql);
                            // Записываем в переменную масив с данными пользователя
                            $polzovatel = mysqli_fetch_assoc($polzovatel);
                        ?>
                        <h2><?php echo $polzovatel["name"] ?></h2>
                        <p><?php echo $soobshenie["text"]; ?></p>
                        <div class="time"><?php echo $soobshenie["time"]; ?></div>
                </li>
                  <?php
                  $i = $i +1;
                }
            } else {
                 echo "<h2>Поьзователь не выбран</h2>";
             } 

        ?>     
            
      </ul>

    </div>

    
 