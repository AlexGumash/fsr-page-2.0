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
      <div class="group">
        <a class="group-link" href="#">Regular user</a>
      </div>
      <div class="group">
        <a class="group-link" href="group-team.php?class=<?php echo $class; ?>">team member</a>
        <span class="group-conf">You can join an existing team or create new team</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-FA.php?class=<?php echo $class; ?>">Team faculty advisor</a>
        <span class="group-conf">Needs to be confirmed by team member</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-judge.php?class=<?php echo $class; ?>"><?php echo $value; ?>Judge</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-org.php?class=<?php echo $class; ?>"">Organizer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-marshal.php?class=<?php echo $class; ?>">Marshal</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-scrutineer.php?class=<?php echo $class; ?>">Scrutineer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-volunteer.php?class=<?php echo $class; ?>">Volunteer</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-partner.php?class=<?php echo $class; ?>">Partner</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-press.php?class=<?php echo $class; ?>">Press</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
      <div class="group">
        <a class="group-link" href="group-guest.php?class=<?php echo $class; ?>">Guest</a>
        <span class="group-conf">Needs to be confirmed by admin</span>
      </div>
    </div>
  </div>
</div>
