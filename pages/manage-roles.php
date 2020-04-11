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
            <a href="myteam.php">
              <div class="back-to-account">
                <span>&#8592;</span>
              </div>
            </a>
            <span>Team account</span>
          </div>

          <div id="team-content">
            <?php
              if ($user['captain'] != 'Captain') {
                ?>
                <span>Only team captain can change team roles!</span>
                <?php
              } else {
            ?>
            <div class="positions-list">
              <form class="" action="../handlers/set-roles/set-captain.php" method="post">
                <div class="position-list-item">
                  <div class="position-name">
                    <span>Team captain</span>
                  </div>
                  <div class="position-contenders">
                      <div class="position-contenders-list">
                        <?php
                        $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = '$teamid'";
                        $result = mysqli_query($date, $query);
                        while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          if (($member['deputy'] != 'Team captain deputy') && ($member['advisor'] != 'Faculty advisor')) {
                            ?>
                            <div class="position-contender">
                              <input type="radio" name="captain" value="<?php echo $member['id']; ?>" <?php if ($member['captain'] == 'Captain') {
                                echo "checked";
                              } ?>>
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
                      <div class="">
                        <input type="submit" name="captain-submit" value="Submit">
                      </div>
                  </div>
                </div>
              </form>

              <form class="" action="../handlers/set-roles/set-deputy.php" method="post">
                <div class="position-list-item">
                  <div class="position-name">
                    <span>Team captain deputy</span>
                  </div>
                  <div class="position-contenders">
                    <div class="position-contenders-list">
                      <?php
                      $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = '$teamid'";
                      $result = mysqli_query($date, $query);
                      while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if (($member['captain'] != 'Captain') && ($member['advisor'] != 'Faculty advisor')) {
                          ?>
                          <div class="position-contender">
                            <input type="checkbox" name="deputy[]" value="<?php echo $member['id']; ?>" <?php if ($member['deputy'] == 'Team captain deputy') {
                              echo "checked";
                            } ?>>
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
                    <div class="">
                      <input type="submit" name="deputy-submit" value="Submit">
                    </div>
                  </div>
                </div>
              </form>

              <form class="" action="../handlers/set-roles/set-pilots.php" method="post">
                <div class="position-list-item">
                  <div class="position-name">
                    <span>Pilots</span>
                  </div>
                  <div class="position-contenders">
                    <div class="position-contenders-list">
                      <?php
                      $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = '$teamid'";
                      $result = mysqli_query($date, $query);
                      while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if (($member['eso'] != 'ESO') && ($member['advisor'] != 'Faculty advisor')) {
                          ?>
                          <div class="position-contender">
                            <input type="checkbox" name="pilots[]" value="<?php echo $member['id']; ?>" <?php if ($member['pilot'] == 'Pilot') {
                              echo "checked";
                            } ?>>
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
                    <div class="">
                      <input type="submit" name="pilots-submit" value="Submit">
                    </div>
                  </div>
                </div>
              </form>

              <form class="" action="../handlers/set-roles/set-eso.php" method="post">
                <div class="position-list-item">
                  <div class="position-name">
                    <span>ESO</span>
                  </div>
                  <div class="position-contenders">
                    <div class="position-contenders-list">
                      <?php
                      $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = '$teamid'";
                      $result = mysqli_query($date, $query);
                      while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if (($member['pilot'] != 'Pilot') && ($member['advisor'] != 'Faculty advisor')) {
                          ?>
                          <div class="position-contender">
                            <input type="radio" name="ESO" value="<?php echo $member['id']; ?>" <?php if ($member['eso'] == 'ESO') {
                              echo "checked";
                            } ?>>
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
                    <div class="">
                      <input type="submit" name="eso-submit" value="Submit">
                    </div>
                  </div>
                </div>
              </form>




            </div>

          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
