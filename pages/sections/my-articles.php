<ul>
<li>
  <?php
  $sql = " SELECT `polzovateli`.`id`,`polzovateli`.`name`,`articles`.`article`,`articles`.`date`,`articles`.`user_id` FROM `polzovateli` JOIN `articles` ON `polzovateli`.`id` = `articles`.`user_id` WHERE `polzovateli`.`id`='" . $_COOKIE["polzovatel_id"] . "' ORDER BY `articles`.`id` DESC";
  $result = $connect->query($sql);
while($name = mysqli_fetch_assoc($result)) {
  ?>
  <h1 class="friends-name"><?php echo $name['name']; ?></h1>
  <p class="article-date"><?php echo $name['date']; ?></p>
  <p class="article-text">
  <?php echo $name['article']; ?></p>
  <?php } ?>
  </li>


 </ul>
