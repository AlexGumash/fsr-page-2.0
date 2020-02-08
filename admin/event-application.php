<?php
  session_start();
  include '../database/connection.php';
  $query = "SELECT * FROM `event-application`";
  $result = mysqli_query($date, $query);
?>

<div class="applications">
  <div class="applications-list">
    <?php
      while ($application = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $teamid = $application['teamid'];
        $eventid = $application['eventid'];
        $number = $application['number'];

        $query = "SELECT * FROM teams WHERE id = '$teamid'";
        $result2 = mysqli_query($date, $query);
        $team = mysqli_fetch_array($result2, MYSQL_ASSOC);

        $query = "SELECT * FROM events WHERE id = '$eventid'";
        $result3 = mysqli_query($date, $query);
        $event = mysqli_fetch_array($result3, MYSQL_ASSOC);
        ?>

        <div class="application">
          <div class="application-header">
            <span>Team <?php echo $team['name']; ?> wants to take part in the <?php echo $event['name']; ?> by number <?php echo $number; ?></span>
          </div>
          <div class="application-buttons">
            <a href="../handlers/application-handler.php?status=accepted&appid=<?php echo $application['id']; ?>">
              <span>Accept</span>
            </a>
            <a href="../handlers/application-handler.php?status=rejected&appid=<?php echo $application['id']; ?>">
              <span>Reject</span>
            </a>
          </div>
        </div>
        <!-- <span></span> -->

        <?php
      }
    ?>
  </div>
</div>
