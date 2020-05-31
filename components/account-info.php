<?php include '../database/connection.php' ?>
<?php
  session_start();
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $query = "SELECT * FROM `user-team-info` WHERE userid = '$id'";
  $result = mysqli_query($date, $query);
  $userinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="account-info">
  <div class="left-column">
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
    </div>

    <div class="account-field">
      <span class="field-label">Postal address:</span>
      <div class="postal-text">
        <span>
          <?php
          if ($user['postal']) {
            echo $user['postal'];
          } else {
            echo '<span class="nodata">No data</span>';
          }
          ?>
        </span>
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
            <span>
              <?php
              if ($user['phone']) {
                echo $user['phone'];
              } else {
                echo '<span class="nodata">No data</span>';
              }
              ?>
            </span>
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
          <span class="cont">
            <?php
            if ($user['clothingsize']) {
              echo $user['clothingsize'];
            } else {
              echo '<span class="nodata">No data</span>';
            }
            ?>
          </span>
        </div>

      </div>
    </div>

  </div>
  <?php

    if ($user['teamid'] != 0) {
      ?>

      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">University:</span>
              <div class="cont">
                <span><?php echo $userinfo['uni'] ?></span>
              </div>
            </div>
            <div class="account-field-info">
              <span class="label">Faculty:</span>
              <div class="cont">
                <span><?php echo $userinfo['faculty'] ?></span>
              </div>
            </div>
            <div class="account-field-info">
              <span class="label">Speciality:</span>
              <div class="cont">
                <span><?php echo $userinfo['speciality'] ?></span>
              </div>
            </div>
            <div class="account-field-info">
              <span class="label">Role:</span>
              <div class="cont">
                <span><?php echo $userinfo['role'] ?></span>
              </div>
            </div>
            <div class="account-field-info">
              <span class="label">Position:</span>
              <div class="cont">
                <?php
                  $position = '';
                  if ($userinfo['captain'] == 'Captain') {
                    if ($position != '') {
                      $position .= ', ';
                    }
                    $position .= $userinfo['captain'];
                  }
                  if ($userinfo['deputy'] == 'Team captain deputy') {
                    if ($position != '') {
                      $position .= ', ';
                    }
                    $position .= $userinfo['deputy'];
                  }
                  if ($userinfo['pilot'] == 'Pilot') {
                    if ($position != '') {
                      $position .= ', ';
                    }
                    $position .= $userinfo['pilot'];
                  }
                  if ($userinfo['eso'] == 'ESO') {
                    if ($position != '') {
                      $position .= ', ';
                    }
                    $position .= $userinfo['eso'];
                  }
                  if ($userinfo['advisor'] == 'Faculty advisor') {
                    if ($position != '') {
                      $position .= ', ';
                    }
                    $position .= $userinfo['advisor'];
                  }
                  // $position = $userinfo['deputy'].', '.$userinfo['pilot'].', '.$userinfo['eso'].', '.$userinfo['advisor'];
                ?>
                <span><?php echo $position ?></span>
              </div>
            </div>
            <div class="account-field-info">
              <span class="label">Team entry year:</span>
              <div class="cont">
                <span><?php echo $userinfo['entryyear'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="photo">
        <div class="account-photo">
          <img class="photo-img" src="../images/<?php echo $user['photo']; ?>" alt="">
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

      if ($userjudgeinfo['status'] != 'confirmed') {
      ?>
      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">Company:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['company']) {
                  echo $userjudgeinfo['company'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Division:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['division']) {
                  echo $userjudgeinfo['division'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Tasks:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['tasks']) {
                  echo $userjudgeinfo['tasks'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Languages:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['languages']) {
                  echo $userjudgeinfo['languages'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Participation days:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['part-days']) {
                  echo $userjudgeinfo['part-days'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Accomodation:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['accomodation']) {
                  echo $userjudgeinfo['accomodation'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Discipline:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['discipline']) {
                  echo $userjudgeinfo['discipline'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Skills:</span>
              <span class="cont skills">
                <?php
                if ($userjudgeinfo['first-aid'] == 'on') {
                  echo "<div>First aid</div>";
                }
                if ($userjudgeinfo['fire-extinguishing'] == 'on') {
                  echo "<div>Fire extinguishing</div>";
                }
                if ($userjudgeinfo['electrical-safety-admission'] == 'on') {
                  echo "<div>Electrical safety admission</div>";
                }
                ?>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="photo">
        <div class="account-photo">
          <img class="photo-img" src="../images/<?php echo $user['photo']; ?>" alt="">
        </div>
      </div>
      <?php
      }
    }
  ?>

</div>
