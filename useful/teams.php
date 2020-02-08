<?php include '../database/connection.php' ?>
<?php
  if ($class == 'fsc') {
    $class2 = 'CV';
  } else {
    $class2 = 'EV';
  }
  $query = "SELECT * FROM teams WHERE class = '$class2'";
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
