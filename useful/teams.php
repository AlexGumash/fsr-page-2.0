<?php include '../database/connection.php' ?>
<?php

  $query = 'SELECT * FROM teams';
  $result = mysqli_query($date, $query);

?>

<datalist id="teams">
  <?php

    while ($team = mysqli_fetch_array($result, MYSQL_ASSOC)) {
      ?>
      <option value="<?php echo $team['name']; ?>">
      <?php
    }

  ?>
</datalist>
