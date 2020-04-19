<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM teams WHERE id = '$teamid'";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $query = "SELECT * FROM events WHERE status = 'coming'";
  $result = mysqli_query($date, $query);
  $event = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $query = "SELECT * FROM `event-application` WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  $application = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<?php
  if ($application) {
    ?>
    <div class="event-registration-notification">
      <span>Your application is being processed. Please wait for confirmation.</span>
    </div>
    <?php
  } else {
?>

<?php
  $query = "SELECT * FROM `event-participants` JOIN `events` ON `event-participants`.id = `events`.id WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  $participation = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if (!$participation && !$application) {
    ?>
    <div class="event-registration">
      <div class="event-registration-notification">
        <span>
          Your team is <span style="font-weight: bold"><?php echo $team['name']; ?></span>. Would you like to apply for participation in <span style="font-weight: bold"><?php echo $event['name'] ?></span>?
        </span>
      </div>
      <div class="event-registration-notification">
        <span>Date:</span>
        <span><?php echo $event['datestart']; ?></span>
        <span>-</span>
        <span><?php echo $event['dateend']; ?></span>
      </div>
      <form class="" action="../handlers/event-application.php?teamid=<?php echo $team['id']; ?>&eventid=<?php echo $event['id']; ?>" method="post">
        <div class="event-registration-form">
          <div class="event-registration-number">
            <span>
              If so, please select your car number:<span class="required-field">*</span>
            </span>
            <input type="text" name="car-number" value="" placeholder="from xx to xxx" required>
          </div>
          <div class="rules-check">
            <span>As representative of the team I confirm that my team read the rules of the event<span class="required-field">*</span></span>
            <input type="checkbox" name="rules" value="checked" required>
          </div>
          <div class="submit-button">
            <input type="submit" name="event-registration-submit" value="Send request">
            <span style="font-size: 80%; margin-top: 5px;">Wait for confirmation by admin.</span>
          </div>
        </div>
      </form>
    </div>
    <?php
  } else {
    if ($participation) {
      ?>
      <span>Your team is participant of the <?php echo $participation['name']; ?> event.</span>
      <a href="../pages/upload-files.php">Upload files</a>
      <?php
    }
  }
?>


<?php } ?>
