<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['marshal-request'])) {

    $company = $_REQUEST['company'];
    $description = $_REQUEST['description'];
    $languages = $_REQUEST['languages'];
    $days = $_REQUEST['days'];
    $firstAid = $_REQUEST['first-aid'];
    $fireExtinguishing = $_REQUEST['fire-extinguishing'];
    $electricalSafetyAdmission = $_REQUEST['electrical-safety-admission'];

    $userid = $_SESSION['id'];

    $query = "INSERT INTO `user-marshal-info` VALUES (NULL, '$userid', '$company', '$description', '$languages', '$days', '$firstAid', '$fireExtinguishing', '$electricalSafetyAdmission', 'not confirmed')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
    $query = "SELECT * FROM users WHERE id = '$userid'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $email = $user['email'];
    $subject = "Formula Student Russia Website Applications";
    $message = 'Your application has been received. Wait for an answer.';
    $headers = "Content-type: text/html";
    mail($email, $subject, $message, $headers);


    header('Location: ../pages/account.php');
  }

?>
