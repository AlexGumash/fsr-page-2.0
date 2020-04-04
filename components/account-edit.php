<?php
  session_start();
  include '../database/connection.php';
  include '../useful/unis.php';
?>
<?php
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $query = "SELECT * FROM `user-team-info` WHERE userid = '$id'";
  $result = mysqli_query($date, $query);
  $userinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<form action="../handlers/account-edit.php" method="post" enctype="multipart/form-data">
  <div class="account-info">
    <div class="left-column">
      <div class="info">
        <div class="info-edit">
          <div class="account-field-info">
            <div class="label-container">
              <span class="label">Username:</span>
            </div>
            <div class="cont">
              <input type="text" name="login" value="<?php echo $user['login'] ?>" onchange="checkLogin();">
            </div>
          </div>
          <div class="form-div-error">
            <span id="valid_confirm_login"></span>
          </div>
          <div class="account-field-info">
            <div class="label-container">
              <span class="label">First name:</span>
            </div>
            <div class="cont">
              <input type="text" name="firstname" value="<?php echo $user['firstname'] ?>">
            </div>
          </div>
          <div class="account-field-info" style="margin-bottom: 0">
            <div class="label-container">
              <span class="label">Last name:</span>
            </div>
            <div class="cont">
              <input type="text" name="lastname" value="<?php echo $user['lastname'] ?>">
            </div>
          </div>
        </div>
      </div>

      <div class="account-field">
        <span class="field-label">Postal address:</span>
        <textarea name="postal" class="postal-textarea"><?php echo $user['postal'] ?></textarea>
        <!-- <textarea name="postal" class="postal-text"></textarea> -->
      </div>

      <div class="account-field">
        <span class="field-label">Contact details:</span>
        <div class="contact-container">
          <div class="account-field-info">
            <div class="label-container">
              <span class="label">Email:</span>
            </div>
            <div class="cont">
              <input type="email" name="email" value="<?php echo $user['email'] ?>" onchange="checkEmail();">
            </div>
          </div>
          <div class="form-div-error">
            <span id="valid_confirm_email"></span>
          </div>
          <div class="account-field-info">
            <div class="label-container">
              <span class="label">Phone:</span>
            </div>
            <div class="cont">
              <input type="tel" name="phone" value="<?php echo $user['phone'] ?>">
            </div>
          </div>
          <!-- <div class="form-div-error">
            <span id="valid_confirm_phone"></span>
          </div> -->
        </div>
      </div>
      <div class="account-field">
        <span class="field-label">Personal details:</span>
        <div class="contact-container">
          <div class="account-field-info">
            <span class="label">Salutation:</span>
            <span class="cont">
              <span>Mr.</span>
              <input type="radio" name="salutation" value="Mr." <?php if ($user['salutation'] == 'Mr.') {
                echo "checked";
              } ?>>
              <span>Ms.</span>
              <input type="radio" name="salutation" value="Ms." <?php if ($user['salutation'] == 'Ms.') {
                echo "checked";
              } ?>>
            </span>
          </div>
          <div class="account-field-info">
            <span class="label">Clothing size:</span>
            <span class="cont">
              <select class="" name="clothingsize">
                <option value="XS" <?php if ($user['clothingsize'] == 'XS') {
                  echo "selected";
                } ?>>XS</option>
                <option value="S" <?php if ($user['clothingsize'] == 'S') {
                  echo "selected";
                } ?>>S</option>
                <option value="M" <?php if ($user['clothingsize'] == 'M') {
                  echo "selected";
                } ?>>M</option>
                <option value="L" <?php if ($user['clothingsize'] == 'L') {
                  echo "selected";
                } ?>>L</option>
                <option value="XL" <?php if ($user['clothingsize'] == 'XL') {
                  echo "selected";
                } ?>>XL</option>
                <option value="XXL" <?php if ($user['clothingsize'] == 'XXL') {
                  echo "selected";
                } ?>>XXL</option>
                <option value="XXXL" <?php if ($user['clothingsize'] == 'XXXL') {
                  echo "selected";
                } ?>>XXXL</option>
              </select>
            </div>
            <div class="account-field-info">
              <span class="label">Description:</span>
              <span class="cont">
                <textarea name="description" class="desc-textarea"><?php echo $user['description'] ?></textarea>
              </div>
              <div class="account-field-info">
                <div class="label-container">
                  <span class="label">Company:</span>
                </div>
                <span class="cont">
                  <input type="text" name="company" value="<?php echo $user['company'] ?>">
                </span>
              </div>
            </div>
          </div>
        </div>

              <div class="right-column">
                <?php

                  if ($user['teamid'] != 0) {
                    ?>
                <div class="photo" style="margin-bottom: 10px;">
                  <div class="account-photo">
                    <img id="preview" class="photo-img" src="../images/<?php echo $user['photo']; ?>" alt="" style="margin-bottom: 5px;">
                    <input type="file" name="photo" accept="image/*" style="padding: 0" onchange="readURL(this);">
                  </div>
                </div>
                <div class="">
                  <div class="info-text">
                    <div class="account-field-info">
                      <span class="label">University:</span>
                      <div class="cont">
                        <input type="text" name="uni" value="<?php echo $userinfo['uni'] ?>" list="unis">
                      </div>
                    </div>
                    <div class="account-field-info">
                      <span class="label">Faculty:</span>
                      <div class="cont">
                        <input type="text" name="faculty" value="<?php echo $userinfo['faculty'] ?>">
                      </div>
                    </div>
                    <div class="account-field-info">
                      <span class="label">Speciality:</span>
                      <div class="cont">
                        <input type="text" name="speciality" value="<?php echo $userinfo['speciality'] ?>">
                      </div>
                    </div>
                    <div class="account-field-info">
                      <span class="label">Role:</span>
                      <div class="cont">
                        <input type="text" name="role" value="<?php echo $userinfo['role'] ?>">
                      </div>
                    </div>
                    <!-- <div class="account-field-info">
                      <span class="label">Position:</span>
                      <div class="cont">
                        <input type="text" name="position" value="<?php echo $userinfo['position'] ?>">
                      </div>
                    </div> -->
                    <!-- <div class="account-field-info">
                      <span class="label">Team entry year:</span>
                      <div class="cont">
                        <input type="text" name="entryyear" value="<?php echo $userinfo['entryyear'] ?>">
                      </div>
                    </div> -->
                  </div>
                </div>
                <?php
              }

            ?>
              </div>



      </div>
    <input type="submit" name="edit-submit" value="Confirm changes">
  </div>
</form>
