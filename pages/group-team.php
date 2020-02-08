<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $class = $_REQUEST['class'];
  // $query = "SELECT * FROM users WHERE login = '$login'";
  // $result = mysqli_query($date, $query);
  // $user = mysqli_fetch_array($result, MYSQL_ASSOC);
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
        <div id="team-container" class="team-container">
          <div class="join-create">
            <span>
              Would you like to
              <span class="join-create-option" data_target="../components/join-team.php?class=<?php echo $class; ?>">join an existing team</span>
              or to
              <span class="join-create-option" data_target="../components/create-team.php?class=<?php echo $class; ?>">create a new team</span>
              ?
            </span>
          </div>
        </div>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
