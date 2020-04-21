<?php include '../database/connection.php' ?>
<?php
  session_start();
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE `users`.id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  $query = "SELECT * FROM `event-docs` JOIN `event-docs-approval` ON `event-docs`.id = `event-docs-approval`.id WHERE `event-docs`.teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  $eventdocs = mysqli_fetch_array($result, MYSQLI_ASSOC);

  function getColor($status) {
    if ($status == 0) {
      return 'rgb(255, 36, 0)';
    }
    if ($status == 1) {
      return 'rgb(86, 255, 1)';
    }
    if ($status == 2) {
      return 'rgb(245, 249, 6)';
    }
    if ($status == 3) {
      return 'rgb(255, 36, 0)';
    }
  }

  function getStatus($status) {
    if ($status == 0) {
      return 'Not uploaded';
    }
    if ($status == 1) {
      return 'Approved';
    }
    if ($status == 2) {
      return 'On review';
    }
    if ($status == 3) {
      return 'Failed';
    }
  }

  // $query = "SELECT * FROM teams WHERE id = '$teamid'";
  // $result = mysqli_query($date, $query);
  // $team = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
        <div class="" style="width: 80%; margin: 0 auto; padding-top: 20px">
          <div class="application-settings-header">
            <span>Deadlinens for Formula Student Russia 2020 event</span>
          </div>
          <div class="application-settings-header-links">
            <a href="myteam.php" style="margin-right:10px">Back to my team</a>
            <a href="application-settings.php">Applications settigns</a>
          </div>

          <div class="deadlines-table">
            <div class="deadlines-table-header">
              <div class="first-column ">
                <span class="deadlines-table-header-date">Date</span>
              </div>
              <div class="deadlines-table-header-title">
                <span>Title/Description/Status</span>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>20 July 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Impact attenuator data</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['iad-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['iad-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>20 July 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Structural Equivalency 3D Model</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['se3d-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['se3d-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>20 July 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Structural Equivalency Spreadsheet</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['ses-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['ses-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>20 July 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Structural Equivalency Spreadsheet Approval</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['sesa-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['sesa-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <?php
              if ($team['class'] == 'EV') {
                ?>
                <div class="deadline">
                  <div class="first-column deadline-column deadline-date">
                    <span>20 July 2020</span>
                    <span>24:00 MSK</span>
                  </div>
                  <div class="second-column deadline-column">
                    <div class="deadline-column-row deadline-column-title-status">
                      <div class="deadline-title">
                        <span>Electrical System Form</span>
                      </div>
                      <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['esf-status']) ?>">
                        <span>
                          <?php echo (getStatus($eventdocs['esf-status'])); ?>
                        </span>
                        <div class="">
                          icon
                        </div>
                      </div>
                    </div>
                    <div class="deadline-column-row descr">
                      description
                    </div>
                    <div class="deadline-column-row deadline-file-links">
                      <a href="#" style="margin-right:5px">Upload</a>
                      <a href="#">Download</a>
                    </div>
                  </div>
                </div>
                <?php
              }
            ?>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>10 August 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Business Plan Pitch Video</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['bppv-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['bppv-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>10 August 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>CRD</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['crd-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['crd-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>10 August 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Design Spec Sheet</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['dss-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['dss-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>10 August 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Engineering Design Report</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['edr-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['edr-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="first-column deadline-column deadline-date">
                <span>24 August 2020</span>
                <span>24:00 MSK</span>
              </div>
              <div class="second-column deadline-column">
                <div class="deadline-column-row deadline-column-title-status">
                  <div class="deadline-title">
                    <span>Magazine Uploads</span>
                  </div>
                  <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['mu-status']) ?>">
                    <span>
                      <?php echo (getStatus($eventdocs['mu-status'])); ?>
                    </span>
                    <div class="">
                      icon
                    </div>
                  </div>
                </div>
                <div class="deadline-column-row descr">
                  description
                </div>
                <div class="deadline-column-row deadline-file-links">
                  <a href="#" style="margin-right:5px">Upload</a>
                  <a href="#">Download</a>
                </div>
              </div>
            </div>
            <?php
              if ($team['class'] == 'EV') {
                ?>
                <div class="deadline">
                  <div class="first-column deadline-column deadline-date">
                    <span>24 August 2020</span>
                    <span>24:00 MSK</span>
                  </div>
                  <div class="second-column deadline-column">
                    <div class="deadline-column-row deadline-column-title-status">
                      <div class="deadline-title">
                        <span>Electrical System Officer Qualification</span>
                      </div>
                      <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['esoq-status']) ?>">
                        <span>
                          <?php echo (getStatus($eventdocs['esoq-status'])); ?>
                        </span>
                        <div class="">
                          icon
                        </div>
                      </div>
                    </div>
                    <div class="deadline-column-row descr">
                      description
                    </div>
                    <div class="deadline-column-row deadline-file-links">
                      <a href="#" style="margin-right:5px">Upload</a>
                      <a href="#">Download</a>
                    </div>
                  </div>
                </div>
                <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
