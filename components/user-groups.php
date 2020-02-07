<?php include '../database/connection.php' ?>
<?php include '../useful/groups.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
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
              <a class="group-link" href="#"><?php echo $value; ?></a>
            </div>
            <?php
          } elseif (($value == 'FSC team member' || $value == 'FSE team member')) {
            ?>
            <div class="group">
              <a class="group-link" href="group-team.php"><?php echo $value; ?></a>
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


      <!-- <div class="group">
        <a class="group-link" href="#">FSE team member</a>
        <span class="group-conf">You can join an existing team or create new team</span>
      </div> -->


      <!-- <div class="group">
        <a class="group-link" href="#">Organizer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="#">Marshal</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="#">Scrutineer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="#">Volunteer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="#">Partner</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="#">Press</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="#">Guest</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div> -->
    </div>
  </div>
</div>
