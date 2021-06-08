
      <ul>
          <?php
          if(isset($_GET["user_id"]) || isset($otpravleno_polzovatel_id)) {
           $user_id = null;

          if(isset($_GET["user_id"])) {
            $user_id = $_GET["user_id"];
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
                  <?php if($soobshenie['ot_polzovatel_id'] == $_COOKIE["polzovatel_id"]) {
                    ?>
                    <li id="my-soobsheniy">
                      <?php
                       $jquery = $connect->query("SELECT * FROM soobhenya WHERE id='" . $soobshenie['id'] . "' LIMIT 1");
                  while($row = $jquery->fetch_assoc()) {
                    $img = base64_encode($row['img']);
                    ?>
                    <?php if($row['img'] != null) {
                      ?>
                      <img id='text-my-photo' style="display: none;" src="data:image/jpeg;base64, <?php echo $img ?>">
                      <img id='text-my-photo1' style="display: inline;" src="data:image/jpeg;base64, <?php echo $img ?>">
                      <p id="text-my-polzovatela"><?php echo $soobshenie["text"]; ?></p>
                      <?php
                    } else {
                      ?><p id="text-my-polzovatela"><?php echo $soobshenie["text"]; ?></p><?php
                    }
                    ?>

                    <?php }
                       ?>
                    </li>
                    <?php
                  } else {
                    ?>
                    <li id="you-soobsheniy">
                        <?php
                            // Вывести имя конкретного пользователя
                            $sql = "SELECT name FROM polzovateli WHERE id=" . $soobshenie["ot_polzovatel_id"];
                            // Выполняем запрос
                            $polzovatel = mysqli_query($connect, $sql);
                            // Записываем в переменную масив с данными пользователя
                            $polzovatel = mysqli_fetch_assoc($polzovatel);
                        ?>

                          <p id="text-my-polzovatel"><?php echo $soobshenie["text"]; ?></p>

                </li>
                    <?php
                  } ?>

                  <?php
                  $i = $i +1;
                }
            } else {
                 echo "<h2>Поьзователь не выбран</h2>";
             }

        ?>

      </ul>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        $('#text-my-photo1').click(function(){
          $('#text-my-photo').show();
            $('#text-my-photo1').hide();
        });
        $('#text-my-photo').click(function(){
          $('#text-my-photo1').show();
            $('#text-my-photo').hide();
        });
        </script>
