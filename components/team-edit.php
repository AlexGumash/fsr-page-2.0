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

<div class="">
  <form class="" action="../handlers/team-edit.php?teamid=<?php echo $teamid; ?>" method="post">
    <div class="info">
      <div class="info-text">
        <div class="account-field-info">
          <span class="label">Team name:</span>
          <div class="cont">
            <input type="text" name="name" value="<?php echo $team['name'] ?>">
          </div>
        </div>
        <div class="account-field-info">
          <span class="label">University:</span>
          <div class="cont">
            <input type="text" name="uni" value="<?php echo $team['uni'] ?>">
          </div>
        </div>
        <div class="account-field-info">
          <span class="label">Homepage:</span>
          <div class="cont">
            <span>
              <input type="text" name="homepage" value="<?php echo $team['homepage'] ?>">
            </span>
          </div>
        </div>
        <div class="account-field-info">
          <span class="label">Team description:</span>
          <div class="cont">
            <span>
              <textarea class="description-text" name="description"><?php echo $team['description'] ?></textarea>
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

<!-- <div class="account-field">
  <span>Select captain deputies:</span>
  <select class="" name="deputies">

  </select>
</div> -->

<div class="account-field">
  <span class="field-label">Address:</span>
  <textarea class="postal-text" name="address"><?php echo $team['address'] ?></textarea>
  <!-- <textarea name="postal" class="postal-text"></textarea> -->
</div>

<div class="account-field">
  <span class="field-label">Contact details:</span>
  <div class="contact-container">
    <div class="account-field-info">
      <span class="label">Email:</span>
      <div class="cont">
        <input type="email" name="email" value="<?php echo $team['email'] ?>">
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">Phone:</span>
      <div class="cont">
        <input type="phone" name="phone" value="<?php echo $team['phone'] ?>">
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">Facebook:</span>
      <div class="cont">
        <input type="text" name="facebook" value="">
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">Instagram:</span>
      <div class="cont">
        <input type="text" name="instagram" value="">
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">YouTube:</span>
      <div class="cont">
        <input type="text" name="youtube" value="">
      </div>
    </div>
    <div class="account-field-info" style="margin-bottom: 0">
      <span class="label">VK:</span>
      <div class="cont">
        <input type="text" name="vk" value="">
      </div>
    </div>
  </div>
</div>
  <input type="submit" name="team-edit-submit" value="Submit changes">
  </form>
</div>
