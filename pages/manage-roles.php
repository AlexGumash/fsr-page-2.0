<?php
  session_start();
  include '../database/connection.php';
  $login = $_SESSION['login'];
  $userid = $_SESSION['id'];
  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.id = '$userid'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src='../scripts/ajax.js'></script>
    <script type="text/javascript">

    </script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="team-container">
          <div class="team-header">
            <a href="account.php">
              <div class="back-to-account">
                <span>&#8592;</span>
              </div>
            </a>
            <span>Team account</span>
          </div>

          <div id="team-content">
            <?php
              if ($user['position'] != 'Captain') {
                ?>
                <span>Only team captain can change team roles!</span>
                <?php
              } else {
            ?>
            <div class="positions-list">
              <div class="position-list-item">
                <div class="position-name">
                  <span>Team captain</span>
                </div>
                <div class="position-contenders">
                  <?php
                  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE teamid = '$teamid'";
                  $result = mysqli_query($date, $query);
                  while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if (($member['position'] != 'Team captain deputy') && ($member['position'] != 'Faculty advisor') && ($member['position'] != 'Captain')) {
                      ?>
                      <div class="position-contender">
                        <input type="radio" name="captain" value="<?php echo $member['id']; ?>">
                        <div class="firstname">
                          <span><?php echo $member['firstname']; ?></span>
                        </div>
                        <div class="surname">
                          <span><?php echo $member['lastname']; ?></span>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>

              <div class="position-list-item">
                <div class="position-name">
                  <span>Team captain deputy</span>
                </div>
                <div class="position-contenders">
                  <?php
                  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE teamid = '$teamid'";
                  $result = mysqli_query($date, $query);
                  while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if (($member['position'] != 'Team captain deputy') && ($member['position'] != 'Faculty advisor') && ($member['position'] != 'Captain')) {
                      ?>
                      <div class="position-contender">
                        <input type="checkbox" name="deputy" value="<?php echo $member['id']; ?>">
                        <div class="firstname">
                          <span><?php echo $member['firstname']; ?></span>
                        </div>
                        <div class="surname">
                          <span><?php echo $member['lastname']; ?></span>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>

              <div class="position-list-item">
                <div class="position-name">
                  <span>Pilots</span>
                </div>
                <div class="position-contenders">
                  <?php
                  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE teamid = '$teamid'";
                  $result = mysqli_query($date, $query);
                  while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if (($member['position'] == 'Team captain deputy') || ($member['position'] == 'Captain') || ($member['position'] == 'Team member')) {
                      ?>
                      <div class="position-contender">
                        <input type="checkbox" name="pilots" value="<?php echo $member['id']; ?>">
                        <div class="firstname">
                          <span><?php echo $member['firstname']; ?></span>
                        </div>
                        <div class="surname">
                          <span><?php echo $member['lastname']; ?></span>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>

              <div class="position-list-item">
                <div class="position-name">
                  <span>ESO</span>
                </div>
                <div class="position-contenders">
                  <?php
                  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE teamid = '$teamid'";
                  $result = mysqli_query($date, $query);
                  while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if (($member['position'] == 'Team captain deputy') || ($member['position'] == 'Captain') || ($member['position'] == 'Team member')) {
                      ?>
                      <div class="position-contender">
                        <input type="radio" name="ESO" value="<?php echo $member['id']; ?>">
                        <div class="firstname">
                          <span><?php echo $member['firstname']; ?></span>
                        </div>
                        <div class="surname">
                          <span><?php echo $member['lastname']; ?></span>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>





            </div>

          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
