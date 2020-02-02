<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM teams WHERE id = '$teamid'";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result, MYSQL_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src='../scripts/ajax.js'></script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="team-container">
          <div class="team-header">
            <span>Team account</span>
          </div>

          <div class="team-menu">
            <div class="team-menu-item" data_target='../components/team-info.php'>
              <span>Overview</span>
            </div>
            <div class="team-menu-item" data_target='../components/team-members.php'>
              <span>Members</span>
            </div>
            <div class="team-menu-item" data_target='../components/team-events.php'>
              <span>Events</span>
            </div>
            <!-- <div class="account-menu-item" data_target='../components/change-password.php'>
              <span>Change Password</span>
            </div>
            <div class="account-menu-item" data_target='../components/user-groups.php'>
              <span>User Groups</span>
            </div> -->

          </div>

          <div id="team-content">
            <?php include '../components/team-info.php' ?>

          </div>
          <!-- <div class="account-field">
            <span>Your certificates:</span>
            <span>certificates</span>
          </div> -->
        </div>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
