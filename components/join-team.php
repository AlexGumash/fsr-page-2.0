<?php include '../database/connection.php' ?>
<?php
  session_start();
  $class = $_REQUEST['class'];
  // $login = $_SESSION['login'];
  // $query = "SELECT * FROM teams";
  // $result = mysqli_query($date, $query);
?>
<?php include '../useful/teams.php'; ?>

<div class="choose-team">
  <div class="choose-team-notification">
    <span>
      To join the team send the request. Wait for confirmation by a team member. After confirmation, you will become a member of the team.
    </span>
  </div>
  <form class="" action="index.html" method="post">
    <div class="choose-team-form">
      <span>Choose your team:</span>
      <input type="text" name="team" value="" list="teams" class="choose-team-input">
    </div>
    <input type="submit" name="choose-team-submit" value="Send request">
  </form>

</div>
