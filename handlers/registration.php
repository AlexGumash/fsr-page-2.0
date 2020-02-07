<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['submit-create-account'])) {
    $pass = $_REQUEST['password'];
    $login = $_REQUEST['login'];
    $password = hash('md5', $pass);
    $salutation = $_REQUEST['salutation'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];

    $query = "INSERT INTO users VALUES (NULL, 0, '$login', '$password', '$salutation', '$firstname', '$lastname', '$email', '', '', '', '', '', 'Regular user', '')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    header('Location: ../index.php');
  }

?>
