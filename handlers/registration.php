<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['submit-create-account'])) {
    $pass = $_REQUEST['password'];
    $rep = $_REQUEST['rep-password'];
    $login = $_REQUEST['login'];
    $password = hash("md5", $pass);
    $salutation = $_REQUEST['salutation'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];

    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($date, $query);
    if (mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      die("This email is already used");
    }

    if ($pass == $rep) {
      $query = "INSERT INTO users VALUES (NULL, 0, '$login', '$password', '$salutation', '$firstname', '$lastname', '$email', '', '', '', '', '', 'Regular user', '', 0)";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }
    } else {
      die("Password mismatch");
    }

    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $userid = $user['id'];
    $token = md5($email.time());
    $query = "INSERT INTO `confirm-users` VALUES (NULL, '$userid', '$token', '$email')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $subject = "Formula Student Russia Website Registration";
    $message = 'Welcome to Formula Student Academy Russia website <a href="www.fs-russia.ru">www.fs-russia.ru</a> <br/> Your account has been created successfully. <br/> Login: '.$login.'<br/> To finish your registration please go to the link: <a href=http://fsr/handlers/account-activation.php?token='.$token.'&userid='.$userid.'>Activate account</a> <br/> After that you will be able to complete your personal information and choose user group. <br/>If it was not you who created an account at our website then it is possible that someone put your email. Please, leave this email without any further action.';
    $headers = "Content-type: text/html";
    mail($email, $subject, $message, $headers);

    $_SESSION['email-conf'] = "success";
    header('Location: ../pages/registration.php');
  } else {
    die("Error!");
  }

?>
