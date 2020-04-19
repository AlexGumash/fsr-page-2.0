<?php include '../database/connection.php' ?>
<?php
  session_start();
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
          if ($user['group'] == 'Regular user') {
            ?>
            <span>Your user group is already "Regular user"</span>
            <?php
          } else {
            ?>
              <div class="reset-group">
                <span class="reset-group-line">Your current user group is <?php echo $user['group']; ?></span>
                <!-- <span>Do you want to change your user group to "Regular user"?</span> -->
                <?php
                  if ($user['captain'] == 'Captain') {
                    $teamid = $user['teamid'];
                    $query = "SELECT * FROM teams WHERE id = '$teamid'";
                    $result = mysqli_query($date, $query);
                    $team = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    ?>
                    <span class="reset-group-line">You are the Captain of <?php echo $team['name']; ?> team.</span>
                    <?php
                    $query = "SELECT * FROM users WHERE teamid = '$teamid'";
                    $result = mysqli_query($date, $query);
                    $count = 0;
                    while ($teammember = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $count += 1;
                    }
                    if ($count <= 1) {
                      ?>
                      <span class="reset-group-line">You are the last team member of the team.</span>
                      <span class="reset-group-line">If you change the group, your team will be deleted.</span>
                      <div class="conf-change-group">
                        <span>Change group?</span>
                        <a href="../handlers/reset-group.php" class="reset-group-link"><span>Yes</span></a>
                        <a href="account.php" class="reset-group-link"><span>No</span></a>
                      </div>
                      <?php
                    }
                    ?>
                    <span class="reset-group-line">To change your user group to "Regular user" you should first make another team member captain.</span>
                    <?php
                  } else {
                ?>
                <div class="conf-change-group">
                  <span>Change group?</span>
                  <a href="../handlers/reset-group.php" class="reset-group-link"><span>Yes</span></a>
                  <a href="account.php" class="reset-group-link"><span>No</span></a>
                </div>
              <?php } ?>
              </div>
            <?php
          }
        ?>
      </div>
    </div>
  </body>
</html>
