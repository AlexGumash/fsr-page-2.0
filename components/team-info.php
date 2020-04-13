<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM teams JOIN `team-media` ON `teams`.id = `team-media`.teamid WHERE `teams`.id = '$teamid'";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="info">
  <div class="info-text">
    <div class="account-field-info">
      <span class="label">Team name:</span>
      <div class="cont">
        <span><?php echo $team['name'] ?></span>
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">University:</span>
      <div class="cont">
        <span><?php echo $team['uni'] ?></span>
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">Homepage:</span>
      <div class="cont">
        <span>
          <a href="<?php echo $team['homepage'] ?>" style="text-decoration: underline"><?php echo $team['homepage'] ?></a>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="account-field">
  <span class="field-label">Address:</span>
  <div class="postal-text">
    <span><?php echo $team['address'] ?></span>
  </div>
</div>

<div class="account-field">
  <span class="field-label">Contact details:</span>
  <div class="contact-container">
    <div class="account-field-info">
      <span class="label">Email:</span>
      <div class="cont">
        <span><?php echo $team['email'] ?></span>
      </div>
    </div>
    <div class="account-field-info" style="margin-bottom: 0">
      <span class="label">Phone:</span>
      <div class="cont">
        <span><?php echo $team['phone'] ?></span>
      </div>
    </div>
  </div>
</div>

<div class="account-field">
  <span class="field-label" style="margin-bottom: 10px">Team media:</span>
  <div class="media-container">
    <?php
      if ($team['facebook'] != '') {
        ?>
        <div class="media">
          <a href="<?php echo $team['facebook'] ?>">
            <img src="../images/facebook.png" alt="facebook logo" class="media-img">
          </a>
        </div>
        <?php
      }
    ?>
    <?php
      if ($team['instagram'] != '') {
        ?>
        <div class="media">
          <a href="<?php echo $team['instagram'] ?>">
            <img src="../images/instagram.png" alt="instagram logo" class="media-img">
          </a>
        </div>
        <?php
      }
    ?>
    <?php
      if ($team['youtube'] != '') {
        ?>
        <div class="media">
          <a href="<?php echo $team['youtube'] ?>">
            <img src="../images/youtube.png" alt="youtube logo" class="media-img">
          </a>
        </div>
        <?php
      }
    ?>
    <?php
      if ($team['vk'] != '') {
        ?>
        <div class="media">
          <a href="<?php echo $team['vk'] ?>">
            <img src="../images/vk.png" alt="vk logo" class="media-img">
          </a>
        </div>
        <?php
      }
    ?>
  </div>
</div>
