<!-- <ul>

          <?php

            $i = 0;
            if(isset($_GET["user"])) {
            while($i < count($massages)) {
   
                if($massages[$i]["user_id"] == $_GET["user"]) {
                  ?>
                    <li>     
                        <div class="user2">
                            <img src="../imagas/user2.webp">
                        </div>
                        <?php 
                            $user = poluchitPolzovatel($massages[$i]["user_id"], $names);
                        ?>
                        <h2><?php echo $user["name"]; ?></h2>
                        <p><?php $massages[$i]["text"]; ?></p>
                        <div class="time"><?php $massages[$i]["time"]; ?></div>
                </li>
                  <?php
                }
              
               
            $i = $i +1;
            }
            } else {
                echo "<h2>Пользователь не выбран</h2>";
              }
        ?>     
      </ul> -->

