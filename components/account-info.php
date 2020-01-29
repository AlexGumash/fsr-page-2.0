<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
?>
<div class="info">
  <div class="info-text">
    <div class="account-field-info">
      <span class="label">Username:</span>
      <div class="cont">
        <span><?php echo $user['login'] ?></span>
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">User ID:</span>
      <div class="cont">
        <span><?php echo $user['id'] ?></span>
      </div>
    </div>
    <div class="account-field-info">
      <span class="label">User Group:</span>
      <div class="cont">
        <span><?php echo $user['group'] ?></span>
      </div>
    </div>
  </div>
  <div class="photo">
    <div class="account-photo">
      <img class="photo-img" src="../images/<?php echo $user['photo']; ?>" alt="">
    </div>
  </div>
</div>

<div class="account-field">
  <span class="field-label">Postal address:</span>
  <div class="postal-text">
    <span><?php echo $user['postal'] ?></span>
  </div>
  <!-- <textarea name="postal" class="postal-text"></textarea> -->
</div>

<div class="account-field">
  <span class="field-label">Contact details:</span>
  <div class="contact-container">
    <div class="account-field-info">
      <span class="label">Email:</span>
      <div class="cont">
        <span><?php echo $user['email'] ?></span>
      </div>
    </div>
    <div class="account-field-info" style="margin-bottom: 0">
      <span class="label">Phone:</span>
      <div class="cont">
        <span><?php echo $user['phone'] ?></span>
      </div>
    </div>
  </div>
</div>
<div class="account-field">
  <span class="field-label">Personal details:</span>
  <div class="contact-container">
    <div class="account-field-info">
      <span class="label">Gender:</span>
      <span class="cont">
        <?php
        if ($user['salutation'] == 'Mr.') {
          echo "Male";
        } else {
          echo "Female";
        }
        ?>
      </span>
    </div>
    <div class="account-field-info">
      <span class="label">Clothing size:</span>
      <span class="cont"><?php echo $user['clothingsize'] ?></span>
    </div>
    <div class="account-field-info">
      <span class="label">Description:</span>
      <span class="cont"><?php echo $user['description'] ?></span>
    </div>
    <div class="account-field-info">
      <span class="label">Company:</span>
      <span class="cont"><?php echo $user['company'] ?></span>
    </div>
  </div>
</div>
