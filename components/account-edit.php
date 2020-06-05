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
              <input onchange="checkPhone(this);" placeholder="+7 919 7720543" pattern="[\+]\d{1,3}\s\d{1,5}\s\d*" minlength="8" maxlength="18" type="tel" name="phone" value="<?php echo $user['phone'] ?>">
            </div>
          </div>
        </div>
      </div>
      <fieldset class="account-field">
        <legend class="field-label">Personal details:</legend>
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
            </span>
          </div>

        </div>
      </fieldset>
    </div>
    <div class="right-column">
      <div class="photo" style="margin-bottom: 10px;">
        <div class="account-photo">
          <label for="preview">Account photo</label>
          <img id="preview" class="photo-img" src="../images/<?php echo $user['photo']; ?>" alt="" style="margin-bottom: 5px;">
          <input type="file" name="photo" accept="image/*" style="padding: 0" onchange="readURL(this);">
        </div>
      </div>
      <?php

        if ($user['teamid'] != 0) {
          $query = "SELECT * FROM `user-team-info` WHERE userid = '$id'";
          $result = mysqli_query($date, $query);
          $userinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
          ?>

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
              <div class="account-field-info">
                <label for="year" class="label">Year of entry:</label>
                <div class="cont">
                  <?php
                  $yearArray = range(2000, 2020);
                  ?>
                  <select name="year" id="year">
                  <?php
                    foreach ($yearArray as $year) {
                    ?>

                    <option value="<?php echo $year ?>" <?php if ($userinfo['entryyear'] == $year) {
                      echo "selected";
                    } ?> ><?php echo $year ?></option>;

                    <?php
                    }
                  ?>
                  </select>
                </div>
              </div>

              <?php
                if ($userinfo['pilot'] == 'Pilot') {
                  ?>
                  <div class="account-field-info">
                    <label for="license" class="label">Driver license №:</label>
                    <div class="cont">
                      <input type="text" name="license" value="<?php echo $userinfo['license'] ?>">
                    </div>
                  </div>
                  <div class="account-field-info">
                    <label for="license-country" class="label">Issuing country:</label>
                    <div class="cont">
                      <input type="text" name="license-country" value="<?php echo $userinfo['license-country'] ?>">
                    </div>
                  </div>
                  <div class="photo" style="margin-bottom: 10px;">
                    <label for="license-photo" class="label">Photo/Scan of DL:</label>
                    <div class="document-photo">
                      <img id="license" class="photo-img" src="../images/<?php echo $user['license']; ?>" alt="" style="margin-bottom: 5px;">
                      <input type="file" name="license-photo" accept="image/*" style="padding: 0" onchange="readURL(this);">
                    </div>
                  </div>
                  <?php
                }
              ?>
              <?php
                if ($userinfo['eso'] == 'ESO') {
                  ?>
                  <div class="photo" style="margin-bottom: 10px;">
                    <label for="qualification" class="label">Qualification:</label>
                    <div class="document-photo">
                      <img id="qualification" class="photo-img" src="../images/<?php echo $user['qualification']; ?>" alt="" style="margin-bottom: 5px;">
                      <input type="file" name="qualification" accept="image/*" style="padding: 0" onchange="readURL(this);">
                    </div>
                  </div>
                  <div class="photo" style="margin-bottom: 10px;">
                    <label for="ESO" class="label">ESO form:</label>
                    <div class="document-photo">
                      <img id="ESO" class="photo-img" src="../images/<?php echo $user['ESO']; ?>" alt="" style="margin-bottom: 5px;">
                      <input type="file" name="ESO" accept="image/*" style="padding: 0" onchange="readURL(this);">
                    </div>
                  </div>
                  <div class="photo" style="margin-bottom: 10px;">
                    <label for="certificate" class="label">Certificate photo:</label>
                    <div class="document-photo">
                      <img id="certificate" class="photo-img" src="../images/<?php echo $user['certificate']; ?>" alt="" style="margin-bottom: 5px;">
                      <input type="file" name="certificate" accept="image/*" style="padding: 0" onchange="readURL(this);">
                    </div>
                  </div>
                  <?php
                }
              ?>
            </div>
          </div>
          <?php
        }

      ?>

      <?php

      if ($user['group'] == 'Judge') {
        $query = "SELECT * FROM `user-judge-info` WHERE userid = '$id'";
        $result = mysqli_query($date, $query);
        $userjudgeinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Company:</span>
          </div>
          <span class="cont">
            <input type="text" name="company" value="<?php echo $userjudgeinfo['company'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Division:</span>
          </div>
          <span class="cont">
            <input type="text" name="division" value="<?php echo $userjudgeinfo['division'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Main tasks:</span>
          </div>
          <span class="cont">
            <input type="text" name="main-tasks" value="<?php echo $userjudgeinfo['tasks'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Languages:</span>
          </div>
          <span class="cont">
            <input type="text" name="languages" value="<?php echo $userjudgeinfo['languages'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Participation days:</span>
          </div>
          <span class="cont">
            <input type="text" name="part-days" value="<?php echo $userjudgeinfo['part-days'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Accomodation:</span>
          </div>
          <span class="cont">
            <input type="text" name="accomodation" value="<?php echo $userjudgeinfo['accomodation'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <label class="label" for="discipline">Discipline</label>
          <div class="cont">
            <select class="" name="discipline" id="discipline">
              <option value="design event" <?php if ($userjudgeinfo['discipline'] == 'design event') {
                echo "selected";
              } ?>>Design Event</option>
              <option value="cost&Manufacturing event" <?php if ($userjudgeinfo['discipline'] == 'cost&Manufacturing event') {
                echo "selected";
              } ?>>Cost&Manufacturing Event</option>
              <option value="presentation event" <?php if ($userjudgeinfo['discipline'] == 'presentation event') {
                echo "selected";
              } ?>>Presentation Event</option>
            </select>
          </div>
        </div>
        <div class="account-field-info">
          <label class="label" for="position">Position</label>
          <div class="cont">
            <select class="" name="position" id="position">
              <option value="judge" <?php if ($userjudgeinfo['judge-position'] == 'Judge') {
                echo "selected";
              } ?>>Judge</option>
              <option value="senior judge" <?php if ($userjudgeinfo['judge-position'] == 'Senior judge') {
                echo "selected";
              } ?>>Senior Judge</option>
            </select>
          </div>
        </div>
        <div class="account-field-info">
          <label class="label" for="spec">Special fields</label>
          <div class="cont">
            <select class="" name="spec" id="spec">
              <option value="Overall Vehicle Concept" <?php if ($userjudgeinfo['judge-special-fields'] == 'overall vehicle concept') {
                echo "selected";
              } ?>>Overall Vehicle Concept</option>
              <option value="Vehicle Dynamics & Tires" <?php if ($userjudgeinfo['judge-special-fields'] == 'vehicle dynamics & tires') {
                echo "selected";
              } ?>>Vehicle Dynamics & Tires</option>
              <option value="Aerodynamics" <?php if ($userjudgeinfo['judge-special-fields'] == 'aerodynamics') {
                echo "selected";
              } ?>>Aerodynamics</option>
              <option value="Mechanical & Structural Engineering" <?php if ($userjudgeinfo['judge-special-fields'] == 'mechanical & structural engineering') {
                echo "selected";
              } ?>>Mechanical & Structural Engineering</option>
                <option value="Composites Structural Engineering" <?php if ($userjudgeinfo['judge-special-fields'] == 'composites structural engineering') {
                echo "selected";
              } ?>>Composites Structural Engineering</option>
              <option value="Drivetrain" <?php if ($userjudgeinfo['judge-special-fields'] == 'drivetrain') {
                echo "selected";
              } ?>>Drivetrain</option>
              <option value="LV-electronics" <?php if ($userjudgeinfo['judge-special-fields'] == 'LV-electronics') {
                echo "selected";
              } ?>>LV-electronics</option>
              <option value="Engine (IC) & Peripherals" <?php if ($userjudgeinfo['judge-special-fields'] == 'engine (IC) & peripherals') {
                echo "selected";
              } ?>>Engine (IC) & Peripherals</option>
              <option value="Electrical Propulsion (EV), HV system" <?php if ($userjudgeinfo['judge-special-fields'] == 'electrical propulsion (EV), HV system') {
                echo "selected";
              } ?>>Electrical Propulsion (EV), HV system</option>
              <option value="Energy Storage" <?php if ($userjudgeinfo['judge-special-fields'] == 'energy storage') {
                echo "selected";
              } ?>>Energy Storage</option>
              <option value="Driver Interface & Ergonomics" <?php if ($userjudgeinfo['judge-special-fields'] == 'driver interface & ergonomics') {
                echo "selected";
              } ?>>Driver Interface & Ergonomics</option>
            </select>
          </div>
        </div>

        <?php
        }

      ?>
      <?php
      if ($user['group'] == 'Scruti') {
        $query = "SELECT * FROM `user-scrutineer-info` WHERE userid = '$id'";
        $result = mysqli_query($date, $query);
        $userscrutiinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Description:</span>
          </div>
          <span class="cont">
            <input type="text" name="description" value="<?php echo $userscrutiinfo['description'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Company:</span>
          </div>
          <span class="cont">
            <input type="text" name="company" value="<?php echo $userscrutiinfo['company'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Languages:</span>
          </div>
          <span class="cont">
            <input type="text" name="languages" value="<?php echo $userscrutiinfo['languages'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Participation days:</span>
          </div>
          <span class="cont">
            <input type="text" name="part-days" value="<?php echo $userscrutiinfo['part-days'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Accomodation:</span>
          </div>
          <span class="cont">
            <input type="text" name="accomodation" value="<?php echo $userscrutiinfo['accomodation'] ?>">
          </span>
        </div>

        <fieldset class="request-fields__field">
          <legend class="field-label">Skills:</legend>

          <div>
            <input type="checkbox" name="first-aid">
            <label class="label" for="first-aid">The ability to provide first aid</label>
          </div>
          <div>
            <input type="checkbox" name="fire-extinguishing">
            <label class="label" for="fire-extinguishing">Experience in the use of fire extinguishing agentss</label>
          </div>
          <div>
            <input type="checkbox" name="electrical-safety-admission">
            <label class="label" for="electrical-safety-admission">The admission of electrical safety</label>
          </div>
        </fieldset>
        <div class="request-fields__field">
          <label class="label" for="spec">Scruti's spec:</label>
          <div class="cont">
            <select class="" name="spec" id="spec">
              <option value="frame&body" >Frame&Body</option>
              <option value="suspension&tires">Suspension&Tires</option>
              <option value="Aerodynamics" >Aerodynamics</option>
              <option value="Mechanical & Structural Engineering">Mechanical & Structural Engineering</option>
              <option value="Composites Structural Engineering">Composites Structural Engineering</option>
              <option value="Drivetrain">Drivetrain</option>
              <option value="LV-electronics">LV-electronics</option>
              <option value="Engine (IC) & Peripherals">Engine (IC) & Peripherals</option>
              <option value="Electrical Propulsion (EV), HV system">Electrical Propulsion (EV), HV system</option>
              <option value="Energy Storage">Energy Storage</option>
            </select>
          </div>
        </div>

        <?php
        }

      ?>
      <?php
      if ($user['group'] == 'Volunteer') {
        $query = "SELECT * FROM `user-volunteer-info` WHERE userid = '$id'";
        $result = mysqli_query($date, $query);
        $uservolunteerinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Description:</span>
          </div>
          <span class="cont">
            <input type="text" name="description" value="<?php echo $uservolunteerinfo['description'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Company:</span>
          </div>
          <span class="cont">
            <input type="text" name="company" value="<?php echo $uservolunteerinfo['company'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Languages:</span>
          </div>
          <span class="cont">
            <input type="text" name="languages" value="<?php echo $uservolunteerinfo['languages'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Participation days:</span>
          </div>
          <span class="cont">
            <input type="text" name="part-days" value="<?php echo $uservolunteerinfo['part-days'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Accomodation:</span>
          </div>
          <span class="cont">
            <input type="text" name="accomodation" value="<?php echo $uservolunteerinfo['accomodation'] ?>">
          </span>
        </div>

        <fieldset class="request-fields__field">
          <legend class="field-label">Skills:</legend>

          <div>
            <input type="checkbox" name="DL">
            <label class="label" for="DL">Driver's license</label>
          </div>
          <div>
            <input type="checkbox" name="first-aid">
            <label class="label" for="first-aid">The ability to provide first aid</label>
          </div>
          <div>
            <input type="checkbox" name="ms-office">
            <label class="label" for="ms-office">Strong ms Ofice skills</label>
          </div>
          <div>
            <input type="checkbox" name="photo-skill">
            <label class="label" for="photo-skill">Photography and photo editing skills</label>
          </div>
          <div>
            <input type="checkbox" name="video-skill">
            <label class="label" for="video-skill">Video editing skills</label>
          </div>
          <div>
            <input type="checkbox" name="fire-extinguishing">
            <label class="label" for="fire-extinguishing">Experience in the use of fire extinguishing agentss</label>
          </div>
        </fieldset>

        <?php
        }

      ?>
      <?php
      if ($user['group'] == 'Marshal') {
        $query = "SELECT * FROM `user-marshal-info` WHERE userid = '$id'";
        $result = mysqli_query($date, $query);
        $usermarshalinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Description:</span>
          </div>
          <span class="cont">
            <input type="text" name="description" value="<?php echo $usermarshalinfo['description'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Company:</span>
          </div>
          <span class="cont">
            <input type="text" name="company" value="<?php echo $usermarshalinfo['company'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Languages:</span>
          </div>
          <span class="cont">
            <input type="text" name="languages" value="<?php echo $usermarshalinfo['languages'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Participation days:</span>
          </div>
          <span class="cont">
            <input type="text" name="part-days" value="<?php echo $usermarshalinfo['part-days'] ?>">
          </span>
        </div>
        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Accomodation:</span>
          </div>
          <span class="cont">
            <input type="text" name="accomodation" value="<?php echo $usermarshalinfo['accomodation'] ?>">
          </span>
        </div>

        <fieldset class="request-fields__field">
          <legend class="field-label">Skills:</legend>

          <div>
            <input type="checkbox" name="first-aid">
            <label class="label" for="first-aid">The ability to provide first aid</label>
          </div>
          <div>
            <input type="checkbox" name="fire-extinguishing">
            <label class="label" for="fire-extinguishing">Experience in the use of fire extinguishing agentss</label>
          </div>
          <div>
            <input type="checkbox" name="electrical-safety-admission">
            <label class="label" for="electrical-safety-admission">The admission of electrical safety</label>
          </div>
        </fieldset>

        <?php
        }

      ?>
      <?php
      if ($user['group'] == 'Partner') {
        $query = "SELECT * FROM `user-partner-info` WHERE userid = '$id'";
        $result = mysqli_query($date, $query);
        $userpartnerinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>

        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Company:</span>
          </div>
          <span class="cont">
            <input type="text" name="company" value="<?php echo $userpartnerinfo['company'] ?>">
          </span>
        </div>


        <?php
        }

      ?>
      <?php
      if ($user['group'] == 'Press') {
        $query = "SELECT * FROM `user-press-info` WHERE userid = '$id'";
        $result = mysqli_query($date, $query);
        $userpressinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>

        <div class="account-field-info">
          <div class="label-container">
            <span class="label">Company:</span>
          </div>
          <span class="cont">
            <input type="text" name="company" value="<?php echo $userpressinfo['company'] ?>">
          </span>
        </div>


        <?php
        }

      ?>
    </div>
  </div>
  <input type="submit" name="edit-submit" value="Confirm changes">
</form>
