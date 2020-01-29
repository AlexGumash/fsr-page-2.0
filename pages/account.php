<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
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
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="account-container">
          <div class="account-header">
            <span>Your profile</span>
          </div>

          <div class="account-menu">
            <div class="account-menu-item" data_target='../components/account-info.php'>
              <span>Overview</span>
            </div>
            <div class="account-menu-item" data_target='../components/account-edit.php'>
              <span>Edit Data</span>
            </div>
            <div class="account-menu-item">
              <span>Change Password</span>
            </div>
            <div class="account-menu-item">
              <span>User Groups</span>
            </div>
          </div>

          <div id="account-content">
            <?php include '../components/account-info.php' ?>

          </div>
          <!-- <div class="account-field">
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
