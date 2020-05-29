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

  $query = "SELECT * FROM `event-docs-approval` WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  $approval = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $approvalid = $approval['id'];

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
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src='../scripts/toggle.js'></script>
    <script type="text/javascript">
      function uploadFile(number, doc) {
        $('#valid-file'+number).html("Please wait...")
        var filename = 'file' + number;
        var file_data = $("input[name="+filename).prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('doc', doc)
        $.ajax({
            url: '../handlers/upload-files.php',
            data: form_data,
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            type: 'post'
         }).done(function(result){
           if (result != '') {
             $('#valid-file'+number).html(result)
           } else {
             $('#valid-file'+number).html('')
             location.reload()
           }
         })
      }
    </script>
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
              <div class="deadline-main">
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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="1" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['iad'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['iad']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="1" class="changeLog-link">Changelog</span>
                  </div>
                </div>

              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog1">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'iad' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0] . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1]?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file1">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file1" accept=".pdf" required>
                  </div>

                  <input type="submit" name="submit-button-file1" value="Upload" onclick="uploadFile(1, 'IAD')">
                  <div class="" id="valid-file1">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">
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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="2" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['se3d'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['se3d']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="2" class="changeLog-link">Changelog</span>
                  </div>
                </div>
              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog2">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'se3d' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0] . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1]?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file2">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file2" accept=".zip, .gzip, .gz" required>
                  </div>

                  <input type="submit" name="submit-button-file2" value="Upload" onclick="uploadFile(2, 'SE3D')">
                  <div class="" id="valid-file2">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">
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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="3" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['ses'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['ses']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="3" class="changeLog-link">Changelog</span>
                  </div>
                </div>

              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog3">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'ses' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file3">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file3" accept=".xls, .xlm, .xlc, .xlxs" required>
                  </div>

                  <input type="submit" name="submit-button-file3" value="Upload" onclick="uploadFile(3, 'SES')">
                  <div class="" id="valid-file3">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">
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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="4" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['sesa'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['sesa']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="4" class="changeLog-link">Changelog</span>
                  </div>
                </div>
              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog4">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'sesa' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file4">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file4" accept=".pdf, .jpeg, .jpg" required>
                  </div>

                  <input type="submit" name="submit-button-file4" value="Upload" onclick="uploadFile(4, 'SESA')">
                  <div class="" id="valid-file4">

                  </div>
                </div>
              </div>
            </div>
            <?php
              if ($team['class'] == 'EV') {
                ?>
                <div class="deadline">
                  <div class="deadline-main">
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

                          </div>
                        </div>
                      </div>
                      <div class="deadline-column-row descr">
                        description
                      </div>
                      <div class="deadline-column-row deadline-file-links">
                        <span style="margin-right:5px" file="5" class="upload-link">Upload</span>
                        <?php
                        if ($eventdocs['esf'] != '') {
                          ?>
                          <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['esf']; ?>">Download</a>
                          <?php
                        }?>
                        <span file="5" class="changeLog-link">Changelog</span>
                      </div>
                    </div>
                  </div>
                  <div class="deadline-sub">
                    <div class="changelog-list" id="changelog5">
                      <?php
                      $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'esf' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                      $result = mysqli_query($date, $query);
                      while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $datetime = $log['time'];
                        $datetime_arr = explode(" ", $datetime);
                        $news_date = $datetime_arr[0];
                        $time = $datetime_arr[1];
                        $date_arr = explode("-", $news_date);
                        $time_arr = explode(":", $time);
                        ?>
                        <div class="changelog">
                          <div class="changelog-message">
                            <span><?php echo $log['message']; ?></span>
                          </div>
                          <div class="changelog-time">
                            <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                            <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                          </div>
                        </div>
                        <?php
                      }
                      ?>

                    </div>
                    <div class="deadline-upload-file" id="upload-file5">
                      <div class="form-input-div-textarea" style="margin-bottom: 20px">
                        <span style="margin-bottom: 10px">Select file:</span>
                        <input type="file" name="file5" accept=".pdf, .jpeg, jpg" required>
                      </div>

                      <input type="submit" name="submit-button-file5" value="Upload" onclick="uploadFile(5, 'ESF')">
                      <div class="" id="valid-file5">

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
            ?>
            <div class="deadline">
              <div class="deadline-main">
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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="6" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['bppv'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['bppv']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="6" class="changeLog-link">Changelog</span>
                  </div>
                </div>
              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog6">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'bppv' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file6">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file6" accept=".mp4" required>
                  </div>

                  <input type="submit" name="submit-button-file6" value="Upload" onclick="uploadFile(6, 'BPPV')">
                  <div class="" id="valid-file6">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">
                <div class="first-column deadline-column deadline-date">
                  <span>10 August 2020</span>
                  <span>24:00 MSK</span>
                </div>
                <div class="second-column deadline-column">
                  <div class="deadline-column-row deadline-column-title-status">
                    <div class="deadline-title">
                      <span>Cost - Bill of Material</span>
                    </div>
                    <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['bom-status']) ?>">
                      <span>
                        <?php echo (getStatus($eventdocs['bom-status'])); ?>
                      </span>
                      <div class="">

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="7" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['bom'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['bom']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="7" class="changeLog-link">Changelog</span>
                  </div>
                </div>

              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog7">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'bom' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file7">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file7" accept=".xls, .xlm, .xlc, .xlxs" required>
                  </div>

                  <input type="submit" name="submit-button-file7" value="Upload" onclick="uploadFile(7, 'BOM')">
                  <div class="" id="valid-file7">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">
                <div class="first-column deadline-column deadline-date">
                  <span>10 August 2020</span>
                  <span>24:00 MSK</span>
                </div>
                <div class="second-column deadline-column">
                  <div class="deadline-column-row deadline-column-title-status">
                    <div class="deadline-title">
                      <span>Cost - Explanation File</span>
                    </div>
                    <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['ef-status']) ?>">
                      <span>
                        <?php echo (getStatus($eventdocs['ef-status'])); ?>
                      </span>
                      <div class="">

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="8" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['ef'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['ef']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="8" class="changeLog-link">Changelog</span>
                  </div>
                </div>

              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog8">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'ef' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file8">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file8" accept=".pdf" required>
                  </div>

                  <input type="submit" name="submit-button-file8" value="Upload" onclick="uploadFile(8, 'EF')">
                  <div class="" id="valid-file8">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">
                <div class="first-column deadline-column deadline-date">
                  <span>10 August 2020</span>
                  <span>24:00 MSK</span>
                </div>
                <div class="second-column deadline-column">
                  <div class="deadline-column-row deadline-column-title-status">
                    <div class="deadline-title">
                      <span>Cost - Supporting Material File</span>
                    </div>
                    <div class="deadline-status" style="background-color: <?php echo getColor($eventdocs['smf-status']) ?>">
                      <span>
                        <?php echo (getStatus($eventdocs['smf-status'])); ?>
                      </span>
                      <div class="">

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="9" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['smf'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['smf']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="9" class="changeLog-link">Changelog</span>
                  </div>
                </div>

              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog9">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'smf' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file9">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file9" accept=".pdf" required>
                  </div>

                  <input type="submit" name="submit-button-file9" value="Upload" onclick="uploadFile(9, 'SMF')">
                  <div class="" id="valid-file9">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">

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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="10" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['dss'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['dss']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="10" class="changeLog-link">Changelog</span>
                  </div>
                </div>
              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog10">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'dss' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file10">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file10" accept=".xls, .xlm, .xlc, .xlxs" required>
                  </div>

                  <input type="submit" name="submit-button-file10" value="Upload" onclick="uploadFile(10, 'DSS')">
                  <div class="" id="valid-file10">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">

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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="11" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['edr'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['edr']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="11" class="changeLog-link">Changelog</span>
                  </div>
                </div>
              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog11">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'edr' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file11">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file11" accept=".pdf" required>
                  </div>

                  <input type="submit" name="submit-button-file11" value="Upload" onclick="uploadFile(11, 'EDR')">
                  <div class="" id="valid-file11">

                  </div>
                </div>
              </div>
            </div>
            <div class="deadline">
              <div class="deadline-main">

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

                      </div>
                    </div>
                  </div>
                  <div class="deadline-column-row descr">
                    description
                  </div>
                  <div class="deadline-column-row deadline-file-links">
                    <span style="margin-right:5px" file="12" class="upload-link">Upload</span>
                    <?php
                    if ($eventdocs['mu'] != '') {
                      ?>
                      <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['mu']; ?>">Download</a>
                      <?php
                    }?>
                    <span file="12" class="changeLog-link">Changelog</span>
                  </div>
                </div>
              </div>
              <div class="deadline-sub">
                <div class="changelog-list" id="changelog2">
                  <?php
                  $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'mu' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                  $result = mysqli_query($date, $query);
                  while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datetime = $log['time'];
                    $datetime_arr = explode(" ", $datetime);
                    $news_date = $datetime_arr[0];
                    $time = $datetime_arr[1];
                    $date_arr = explode("-", $news_date);
                    $time_arr = explode(":", $time);
                    ?>
                    <div class="changelog">
                      <div class="changelog-message">
                        <span><?php echo $log['message']; ?></span>
                      </div>
                      <div class="changelog-time">
                        <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                        <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
                <div class="deadline-upload-file" id="upload-file12">
                  <div class="form-input-div-textarea" style="margin-bottom: 20px">
                    <span style="margin-bottom: 10px">Select file:</span>
                    <input type="file" name="file12" accept=".pdf" required>
                  </div>

                  <input type="submit" name="submit-button-file12" value="Upload" onclick="uploadFile(12, 'MU')">
                  <div class="" id="valid-file12">

                  </div>
                </div>
              </div>
            </div>
            <?php
              if ($team['class'] == 'EV') {
                ?>
                <div class="deadline">
                  <div class="deadline-main">

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

                          </div>
                        </div>
                      </div>
                      <div class="deadline-column-row descr">
                        description
                      </div>
                      <div class="deadline-column-row deadline-file-links">
                        <span style="margin-right:5px" file="13" class="upload-link">Upload</span>
                        <?php
                        if ($eventdocs['esoq']) {
                          ?>
                          <a style="margin-right:5px" href="../deadline-files/<?php echo $eventdocs['esoq']; ?>">Download</a>
                          <?php
                        }?>
                        <span file="13" class="changeLog-link">Changelog</span>
                      </div>
                    </div>
                  </div>
                  <div class="deadline-sub">
                    <div class="changelog-list" id="changelog13">
                      <?php
                      $query = "SELECT * FROM `docs-change-log` WHERE doctype = 'esoq' AND `approval-id` = '$approvalid' ORDER BY `time` DESC";
                      $result = mysqli_query($date, $query);
                      while ($log = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $datetime = $log['time'];
                        $datetime_arr = explode(" ", $datetime);
                        $news_date = $datetime_arr[0];
                        $time = $datetime_arr[1];
                        $date_arr = explode("-", $news_date);
                        $time_arr = explode(":", $time);
                        ?>
                        <div class="changelog">
                          <div class="changelog-message">
                            <span><?php echo $log['message']; ?></span>
                          </div>
                          <div class="changelog-time">
                            <span style="margin-right:5px"><?php echo $date_arr[2] . "." . $date_arr[1] . "." . $date_arr[0]  . " "?></span>
                            <span><?php echo $time_arr[0] . ":" . $time_arr[1] ?></span>
                          </div>
                        </div>
                        <?php
                      }
                      ?>

                    </div>
                    <div class="deadline-upload-file" id="upload-file13">
                      <div class="form-input-div-textarea" style="margin-bottom: 20px">
                        <span style="margin-bottom: 10px">Select file:</span>
                        <input type="file" name="file13" accept=".pdf, .jpeg, .jpg" required>
                      </div>

                      <input type="submit" name="submit-button-file13" value="Upload" onclick="uploadFile(13, 'ESOQ')">
                      <div class="" id="valid-file13">

                      </div>
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
