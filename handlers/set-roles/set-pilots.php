<?
  session_start();
  include '../../database/connection.php';
  if (isset($_REQUEST['pilots-submit'])) {
    $id = $_SESSION['id'];

    $query = "SELECT * FROM users JOIN teams ON `users`.teamid = `teams`.id WHERE `users`.id = '$id'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $teamid = $user['teamid'];

    $query = "UPDATE `user-team-info` SET pilot = '' WHERE pilot = 'Pilot' AND teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $newpilotsids = $_REQUEST['pilots'];
    foreach ($newpilotsids as $newpilot) {
      $query = "UPDATE `user-team-info` SET pilot = 'Pilot' WHERE id = '$newpilot'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }
    }

    header('Location: ../../pages/manage-roles.php');
  }

?>
