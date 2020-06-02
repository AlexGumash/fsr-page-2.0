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

      if ($userjudgeinfo['status'] != 'not confirmed') {
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
              <span class="label">Position:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['position']) {
                  echo $userjudgeinfo['position'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Judging group:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['judging-group']) {
                  echo $userjudgeinfo['judging-group'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Judging queue:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['judging-queue']) {
                  echo $userjudgeinfo['judging-queue'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Special fields:</span>
              <span class="cont">
                <?php
                if ($userjudgeinfo['spec']) {
                  echo $userjudgeinfo['spec'];
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
  
  <?php
    if ($user['group'] == 'Marshal') {
      $query = "SELECT * FROM `user-marshal-info` WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      $usermarshalinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if ($usermarshalinfo['status'] != 'confirmed') {
      ?>
      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">Description:</span>
              <span class="cont">
                <?php
                if ($usermarshalinfo['description']) {
                  echo $usermarshalinfo['description'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Company:</span>
              <span class="cont">
                <?php
                if ($usermarshalinfo['company']) {
                  echo $usermarshalinfo['company'];
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
                if ($usermarshalinfo['languages']) {
                  echo $usermarshalinfo['languages'];
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
                if ($usermarshalinfo['part-days']) {
                  echo $usermarshalinfo['part-days'];
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
                if ($usermarshalinfo['accomodation']) {
                  echo $usermarshalinfo['accomodation'];
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
                if ($usermarshalinfo['first-aid'] == 'on') {
                  echo "<div>First aid</div>";
                }
                if ($usermarshalinfo['fire-extinguishing'] == 'on') {
                  echo "<div>Fire extinguishing</div>";
                }
                if ($usermarshalinfo['electrical-safety-admission'] == 'on') {
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
  
  <?php
    if ($user['group'] == 'Scruti') {
      $query = "SELECT * FROM `user-scrutineer-info` WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      $userscrutiinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if ($userscrutiinfo['status'] != 'confirmed') {
      ?>
      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">Description:</span>
              <span class="cont">
                <?php
                if ($userscrutiinfo['description']) {
                  echo $userscrutiinfo['description'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Company:</span>
              <span class="cont">
                <?php
                if ($userscrutiinfo['company']) {
                  echo $userscrutiinfo['company'];
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
                if ($userscrutiinfo['languages']) {
                  echo $userscrutiinfo['languages'];
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
                if ($userscrutiinfo['part-days']) {
                  echo $userscrutiinfo['part-days'];
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
                if ($userscrutiinfo['accomodation']) {
                  echo $userscrutiinfo['accomodation'];
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
                if ($userscrutiinfo['first-aid'] == 'on') {
                  echo "<div>First aid</div>";
                }
                if ($userscrutiinfo['fire-extinguishing'] == 'on') {
                  echo "<div>Fire extinguishing</div>";
                }
                if ($userscrutiinfo['electrical-safety-admission'] == 'on') {
                  echo "<div>Electrical safety admission</div>";
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Scruti's spec:</span>
              <span class="cont">
                <?php
                if ($userscrutiinfo['spec']) {
                  echo $userscrutiinfo['spec'];
                } else {
                  echo '<span class="nodata">No data</span>';
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
  <?php
    if ($user['group'] == 'Volunteer') {
      $query = "SELECT * FROM `user-volunteer-info` WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      $uservolunteerinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if ($uservolunteerinfo['status'] != 'confirmed') {
      ?>
      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">Description:</span>
              <span class="cont">
                <?php
                if ($uservolunteerinfo['description']) {
                  echo $uservolunteerinfo['description'];
                } else {
                  echo '<span class="nodata">No data</span>';
                }
                ?>
              </span>
            </div>
            <div class="account-field-info">
              <span class="label">Company:</span>
              <span class="cont">
                <?php
                if ($uservolunteerinfo['company']) {
                  echo $uservolunteerinfo['company'];
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
                if ($uservolunteerinfo['languages']) {
                  echo $uservolunteerinfo['languages'];
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
                if ($uservolunteerinfo['part-days']) {
                  echo $uservolunteerinfo['part-days'];
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
                if ($uservolunteerinfo['accomodation']) {
                  echo $uservolunteerinfo['accomodation'];
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
                if ($uservolunteerinfo['first-aid'] == 'on') {
                  echo "<div>First aid</div>";
                }
                if ($uservolunteerinfo['fire-extinguishing'] == 'on') {
                  echo "<div>Fire extinguishing</div>";
                }
                if ($uservolunteerinfo['DL'] == 'on') {
                  echo "<div>Driver's license</div>";
                }
                if ($uservolunteerinfo['ms-office'] == 'on') {
                  echo "<div>MS office</div>";
                }
                if ($uservolunteerinfo['photo-skill'] == 'on') {
                  echo "<div>Photo</div>";
                }
                if ($uservolunteerinfo['video-skill'] == 'on') {
                  echo "<div>Video</div>";
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
  <?php
    if ($user['group'] == 'Partner') {
      $query = "SELECT * FROM `user-partner-info` WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      $userpartnerinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if ($userpartnerinfo['status'] != 'confirmed') {
      ?>
      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">Company:</span>
              <span class="cont">
                <?php
                if ($userpartnerinfo['company']) {
                  echo $userpartnerinfo['company'];
                } else {
                  echo '<span class="nodata">No data</span>';
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
  <?php
    if ($user['group'] == 'Press') {
      $query = "SELECT * FROM `user-press-info` WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      $userpressinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if ($userpressinfo['status'] != 'confirmed') {
      ?>
      <div class="right-column">
        <div class="">
          <div class="info-text">
            <div class="account-field-info">
              <span class="label">Company:</span>
              <span class="cont">
                <?php
                if ($userpressinfo['company']) {
                  echo $userpressinfo['company'];
                } else {
                  echo '<span class="nodata">No data</span>';
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
