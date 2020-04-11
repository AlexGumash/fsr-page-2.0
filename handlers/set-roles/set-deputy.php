<?
  session_start();
  include '../../database/connection.php';
  if (isset($_REQUEST['deputy-submit'])) {
    $id = $_SESSION['id'];

    $query = "SELECT * FROM users JOIN teams ON `users`.teamid = `teams`.id WHERE `users`.id = '$id'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $teamid = $user['teamid'];

    $query = "UPDATE `user-team-info` SET deputy = '' WHERE deputy = 'Team captain deputy' AND teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $newdeputiesids = $_REQUEST['deputy'];
    foreach ($newdeputiesids as $newdeputy) {
      echo $newdeputy;
      $query = "UPDATE `user-team-info` SET deputy = 'Team captain deputy' WHERE id = '$newdeputy'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }
    }

    header('Location: ../../pages/manage-roles.php');
  }

?>
