<?php include '../database/connection.php' ?>
<?php include '../useful/groups.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="groups-container">
  <div class="current-group">
    <span class="group-label">Your current user group:</span>
    <span><?php echo $user['group']; ?></span>
  </div>
  <div class="choose-group">
    <span class="group-label" style="margin-bottom: 5px;">Choose your new user group:</span>
    <div class="groups-list">
      <?php
      foreach ($groups as $key => $value) {
        if ($value != $user['group']) {
          if ($value == 'Regular user') {
            ?>
            <div class="group">
              <a class="group-link" href="../pages/reset-group.php"><?php echo $value; ?></a>
            </div>
            <?php
          } elseif (($value == 'FSC team member' || $value == 'FSE team member')) {
            $class = explode(" ", $value);
            $class = strtolower($class[0]);
            ?>
            <div class="group">
              <a class="group-link" href="group-team.php?class=<?php echo $class; ?>"><?php echo $value; ?></a>
              <span class="group-conf">You can join an existing team or create new team</span>
            </div>
            <?php
          } elseif ($value == 'Team faculty advisor') {
            ?>
            <div class="group">
              <a class="group-link" href="#"><?php echo $value; ?></a>
              <span class="group-conf">Needs to be confirmed by team member</span>
            </div>
            <?php
          } else {
            ?>
            <div class="group">
              <a class="group-link" href="#"><?php echo $value; ?></a>
              <span class="group-conf">Needs to be confirmed by admin</span>
            </div>
            <?php
          }
        }
      }
      ?>

    </div>
  </div>
</div>
