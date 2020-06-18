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
    <script type="text/javascript">
        function acceptDicline(elemid, discipline, status, teamid) {
            $.ajax({
              type: "post",
              url: "../handlers/event-team-docs-handler.php",
              data: {discipline: discipline, status: status, teamid: teamid}
            }).done(function(result){
              if (result == '') {
                $("#docstatus"+elemid).html("Approved")
              }
            })
        }
    </script>
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
            <span>Admin. Deadline documents approval panel</span>
            <!-- <a href="admin.php">
              <div class="back-to-account">
                <span>&#8592;</span>
              </div>
            </a>
            <span>Back to admin panel</span> -->
          </div>

          <div class="admin-menu">
            <div class="admin-menu-item" data_target='ti-documents.php'>
              <span>TI Documents</span>
            </div>
            <div class="admin-menu-item" data_target='statics-documents.php'>
              <span>Statics documents</span>
            </div>
          </div>

          <div id="admin-content">


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
