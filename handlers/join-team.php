<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['choose-team-submit'])) {

    $teamname = $_REQUEST['team'];
    // echo $teamname;

    $query = "SELECT * FROM teams WHERE name = '$teamname'";
    $result = mysqli_query($date, $query);
    $team = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $teamid = $team['id'];
    $userid = $_SESSION['id'];

    $query = "INSERT INTO `join-team-app` VALUES (NULL, '$teamid', '$userid')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
    // $message = "Вы зарегистрированы!";
  	// $message = wordwrap($message, 70);
  	// mail($email, 'FSR registration', $message);


    header('Location: ../pages/account.php');
  }

?>
