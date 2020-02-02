<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM teams WHERE id = '$teamid'";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result, MYSQL_ASSOC);
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
  <!-- <div class="photo">
    <div class="account-photo">
      <img class="photo-img" src="../images/<?php echo $user['photo']; ?>" alt="">
    </div>
  </div> -->
</div>

<div class="account-field">
  <span class="field-label">Address:</span>
  <div class="postal-text">
    <span><?php echo $team['address'] ?></span>
  </div>
  <!-- <textarea name="postal" class="postal-text"></textarea> -->
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
