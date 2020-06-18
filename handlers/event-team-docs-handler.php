<?
  session_start();
  include '../database/connection.php';
  $teamid = $_REQUEST['teamid'];
  $discipline = $_REQUEST['discipline'];
  $status = $_REQUEST['status'];
  
  $query = "SELECT * FROM `event-docs-approval` WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  $approval = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $approvalid = $approval['id'];
  
  $logstatus = 0;
  if ($status == 'accepted') {
    $logstatus = 'Approved';
  } else {
    $logstatus = 'Failed';
  }

  if ($discipline == 'iad') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `iad-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'iad', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }

  if ($discipline == 'se3d') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `se3d-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'se3d', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }

  if ($discipline == 'ses') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `ses-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'ses', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }

  if ($discipline == 'sesa') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `sesa-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'sesa', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }

  if ($discipline == 'esf') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `esf-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'esf', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }

  if ($discipline == 'bppv') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `bppv-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'bppv', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }

  if ($discipline == 'bom') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `bom-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'bom', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }
  
  if ($discipline == 'ef') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `ef-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'ef', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }
  
  if ($discipline == 'smf') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `smf-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'smf', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }
  
  if ($discipline == 'dss') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `dss-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'dss', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }
  
  if ($discipline == 'edr') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `edr-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'edr', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }
  
  if ($discipline == 'mu') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `mu-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'mu', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }
  
  if ($discipline == 'esoq') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `esoq-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $logmessage = 'Status changed to ' . $logstatus;
    $query = "INSERT INTO `docs-change-log` VALUES (NULL, '$approvalid', 'esoq', '$logmessage', NULL)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die("Error. Try again later");
    }
  }


?>
