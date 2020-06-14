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
        if ($user['group'] != 'Regular user') {
          ?>
          <div class="group">
            <a class="group-link" href="../pages/reset-group.php">Regular user</a>
            <span class="group-conf">To change your user group you should reset your group to Regular user</span>
          </div>
          <?php
        } else {

        if ($user['group'] != 'FSC team member') {
          ?>
          <div class="group">
            <a class="group-link" href="../pages/group-team.php?class=fsc">FSC team member</a>
            <span class="group-conf">You can join an existing team or create new team</span>
          </div>
          <?php
        }
      ?>
      <?php
        if ($user['group'] != 'FSE team member') {
          ?>
          <div class="group">
            <a class="group-link" href="../pages/group-team.php?class=fse">FSE team member</a>
            <span class="group-conf">You can join an existing team or create new team</span>
          </div>
          <?php
        }
      ?>
      <div class="group">
        <a class="group-link" href="group-FA.php">Team faculty advisor</a>
        <span class="group-conf">Needs to be confirmed by team member</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-judge.php">Judge</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-org.php">Organizer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-marshal.php">Marshal</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-scrutineer.php">Scrutineer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-volunteer.php">Volunteer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-partner.php">Partner</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-press.php">Press</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-guest.php">Guest</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
    <?php } ?>
    </div>
  </div>
</div>
