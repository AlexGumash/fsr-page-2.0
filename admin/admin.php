<?php include '../database/connection.php' ?>
<?php
  session_start();
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
        <div class="admin-container">
          <div class="admin-header">
            <span>Admin</span>
          </div>

          <div class="admin-menu">
            <div class="admin-menu-item" data_target='event-application.php'>
              <span>Event applications</span>
            </div>
            <a href="user-groups-applications.php">
              <div class="admin-menu-item">
                <span>User groups applications</span>
              </div>
            </a>
            <a href="participants-panel.php">
              <div class="admin-menu-item">
                <span>Participants panel</span>
              </div>
            </a>
          </div>

          <div id="admin-content">
            <?php include 'event-application.php' ?>

          </div>
          <!-- <div class="admin-field">
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
