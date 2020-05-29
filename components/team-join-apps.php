<?php
  session_start();
  include '../database/connection.php';
  $teamid = $_REQUEST['teamid'];
  
  $query = "SELECT * FROM `join-team-app` WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  
  $query2 = "SELECT * FROM `join-team-fa-app` WHERE teamid = '$teamid'";
  $result2 = mysqli_query($date, $query2);
?>
<script>
    function handleApp(id, status, flag){
      $.ajax({
        type: "post",
        url: "../handlers/join-team-handler.php",
        data: {appid: id, appstatus: status, faFlag: flag},
        success: function(result){
          console.log(result);
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

        $query3 = "SELECT * FROM users WHERE id = '$userid'";
        $result3 = mysqli_query($date, $query3);
        $user = mysqli_fetch_array($result3, MYSQLI_ASSOC);

        // $query = "SELECT * FROM events WHERE id = '$eventid'";
        // $result3 = mysqli_query($date, $query);
        // $event = mysqli_fetch_array($result3, MYSQL_ASSOC);
        ?>

        <div class="application" id="<?php echo $application['id'] ?>">
          <div class="application-header">
            <span>User <?php echo $user['login']; ?> wants to join your team.</span>
          </div>
          <div class="application-buttons">
            <div class="application-button" onclick="handleApp(<?php echo $application['id']; ?>, 'accepted', 'reg')">
              <span>Accept</span>
            </div>
            <div class="application-button" onclick="handleApp(<?php echo $application['id']; ?>, 'rejected', 'reg')">
              <span>Reject</span>
            </div>
          </div>
        </div>
        <!-- <span></span> -->

        <?php
      }
    ?>
    
    <?php
      while ($faApplication = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        // $teamid = $application['teamid'];
        $userid = $faApplication['userid'];

        $query4 = "SELECT * FROM users WHERE id = '$userid'";
        $result4 = mysqli_query($date, $query4);
        $user2 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
    ?>
        <div class="application" id="<?php echo $faApplication['id'] ?>">
          <div class="application-header">
            <span>User <?php echo $user2['login']; ?> wants to join your team as Faculty Advisor</span>
          </div>
          <div class="application-buttons">
            <div class="application-button" onclick="handleApp(<?php echo $faApplication['id']; ?>, 'accepted', 'fa')">
              <span>Accept</span>
            </div>
            <div class="application-button" onclick="handleApp(<?php echo $faApplication['id']; ?>, 'rejected', 'fa')">
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
