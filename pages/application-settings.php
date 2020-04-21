<?php include '../database/connection.php' ?>
<?php
  session_start();
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  $query = "SELECT * FROM teams WHERE id = '$teamid'";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <?php
          $query = "SELECT * FROM `event-participants` WHERE teamid = '$teamid'";
          $result = mysqli_query($date, $query);
          if (!mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            die('Your team is not a participant of this event');
          } else {
        ?>
        <div class="" style="width: 80%; margin: 0 auto; padding-top: 20px">
          <div class="application-settings-header">
            <span>Application settings for Formula Student Russia 2020 event</span>
          </div>
          <div class="application-settings-header-links">
            <a href="myteam.php" style="margin-right:10px">Back to my team</a>
            <a href="deadlines.php">Deadlines</a>
          </div>
          <form class="" action="../handlers/application-settings.php" method="post">
            <div class="settings-item">
              <?php
              $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = $teamid AND advisor = 'Faculty advisor'";
              $result = mysqli_query($date, $query);
              $advisor = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <span>Team faculty advisor: <?php echo $advisor['lastname']?> <?php echo $advisor['firstname'] ?></span>
            </div>
            <div class="settings-item">
              <?php
              $query = "SELECT * FROM `event-participants` WHERE teamid = $teamid";
              $result = mysqli_query($date, $query);
              $participant = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <?php
                if ($user['captain'] == 'Captain') {
                  ?>
                  <span>Contact phone: </span>
                  <input type="tel" name="phone" value="<?php echo $participant['contact-phone']; ?>">
                  <?php
                } else {
              ?>
              <span>Contact phone: <?php echo $participant['contact-phone']; ?></span>
            <?php } ?>
            </div>
            <?php
              if ($team['class'] == 'CV') {
                ?>
                <div class="settings-item">
                  <?php
                    if ($user['captain'] == 'Captain') {
                      ?>
                        <span>Selected fuel type for the event: </span>
                        <select class="" name="fuelselect">
                          <option value="95" <?php if ($participant['fuel'] == '95') {
                            echo "selected";
                          } ?>>RON95</option>
                          <option value="98" <?php if ($participant['fuel'] == '98') {
                            echo "selected";
                          } ?>>RON98</option>
                          <option value="85" <?php if ($participant['fuel'] == '85') {
                            echo "selected";
                          } ?>>E85</option>
                        </select>
                      <?php
                    } else {
                  ?>
                  <span>Selected fuel type for the event: <?php echo $participant['fuel']; ?></span>
                <?php } ?>
                </div>

                <?php
              } else {
                ?>
                <div class="settings-item">
                  <?php
                  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = $teamid AND eso = 'ESO'";
                  $result = mysqli_query($date, $query);
                  $captain = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  ?>
                  <?php
                    if ($user['captain'] == 'Captain') {
                      ?>
                      <span>ESO: <?php echo $eso['lastname']?> <?php echo $eso['firstname'] ?></span>
                      <?php
                    } else {
                  ?>
                  <span>ESO: <?php echo $eso['lastname']?> <?php echo $eso['firstname'] ?></span>
                <?php } ?>
                </div>
                <?php
              }
            ?>
            <div class="settings-item">
              <?php
              $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.teamid = $teamid";
              $result = mysqli_query($date, $query);

              ?>
              <span>Event participants</span>
              <div class="">
                <?php
                  while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $memberid = $member['userid'];
                    $query = "SELECT * FROM participants WHERE userid = $memberid";
                    $result2 = mysqli_query($date, $query);
                    $memberparticipant = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                    ?>
                    <div class="">
                      <span><?php echo $member['lastname']; ?> <?php echo $member['firstname']; ?></span>
                      <input type="checkbox" name="eventparticipants[]" value="<?php echo $member['userid'] ?>" <?php if (!$user['captain'] == 'Captain') {
                        echo "disabled";
                      } ?> <?php if ($memberparticipant) {
                        echo "checked";
                      } ?>>
                    </div>
                    <?php
                  }
                ?>
              </div>
            </div>
            <div class="">
              <input type="submit" name="application-settings-submit" value="Submit">
            </div>
          </form>
        </div>
      <?php } ?>
      </div>
    </div>
  </body>
</html>
