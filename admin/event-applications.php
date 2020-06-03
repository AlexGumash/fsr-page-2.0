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
    <?php
      if ($_SESSION['rights'] != 'admin') {
        die("Log in as admin!");
      }
    ?>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="admin-container">
          <div class="admin-header">
            <span>Admin. Applications approval panel</span>
          </div>

          <div class="admin-menu">
            <div class="admin-menu-item" data_target='event-application.php'>
              <span>Team applications</span>
            </div>
            <div class="admin-menu-item" data_target='user-groups-applications.php'>
              <span>Other applications</span>
            </div>
          </div>

          <div id="admin-content"></div>
        </div>
      </div>
    </div>
  </body>
</html>
