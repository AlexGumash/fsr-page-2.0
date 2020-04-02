<?php
  session_start();
  include '../database/connection.php';
  $teamid = $_REQUEST['teamid'];
  $query = "SELECT * FROM `join-team-app` WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
?>
<script>
    function handleApp(id, status){
      $.ajax({
        type: "post",
        url: "../handlers/join-team-handler.php",
        data: {appid: id, appstatus: status},
        success: function(){
          $("#"+id).hide()
        }
      })
    }
</script>
<div class="applications">
  <div class="applications-list">
    <?php
      while ($application = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        // $teamid = $application['teamid'];
        $userid = $application['userid'];

        $query = "SELECT * FROM users WHERE id = '$userid'";
        $result2 = mysqli_query($date, $query);
        $user = mysqli_fetch_array($result2, MYSQLI_ASSOC);

        // $query = "SELECT * FROM events WHERE id = '$eventid'";
        // $result3 = mysqli_query($date, $query);
        // $event = mysqli_fetch_array($result3, MYSQL_ASSOC);
        ?>

        <div class="application" id="<?php echo $application['id'] ?>">
          <div class="application-header">
            <span>User <?php echo $user['login']; ?> wants to join your team.</span>
          </div>
          <div class="application-buttons">
            <div class="application-button" onclick="handleApp(<?php echo $application['id']; ?>, 'accepted')">
              <span>Accept</span>
            </div>
            <div class="application-button" onclick="handleApp(<?php echo $application['id']; ?>, 'rejected')">
              <span>Reject</span>
            </div>
          </div>
        </div>
        <!-- <span></span> -->

        <?php
      }
    ?>
  </div>
</div>
