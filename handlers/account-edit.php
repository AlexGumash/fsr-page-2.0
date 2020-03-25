<?
  session_start();
  $old_login = $_SESSION['login'];
  $id = $_SESSION['id'];
  include '../database/connection.php';
  if (isset($_REQUEST['edit-submit'])) {
    if(isset($_FILES['photo'])){
      $errors= array();
      $file_name = $_FILES['photo']['name'];
      $file_size =$_FILES['photo']['size'];
      $file_tmp =$_FILES['photo']['tmp_name'];
      $file_type=$_FILES['photo']['type'];
      if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../images/".$file_name);
      } else {
        print_r($errors);
      }
    }

    $login = $_REQUEST['login'];
    // $password = hash('md5', $_REQUEST['password']);
    $salutation = $_REQUEST['salutation'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $postal = $_REQUEST['postal'];
    $phone = $_REQUEST['phone'];
    $clothingsize = $_REQUEST['clothingsize'];
    $description = $_REQUEST['description'];
    $company = $_REQUEST['company'];
    $photo = $file_name;

    $uni = $_REQUEST['uni'];
    $faculty = $_REQUEST['faculty'];
    $speciality = $_REQUEST['speciality'];
    $role = $_REQUEST['role'];
    // $entryyear = $_REQUEST['entryyear'];

    $query = "UPDATE users SET login = '$login', firstname = '$firstname', lastname = '$lastname', email = '$email', postal = '$postal', phone = '$phone', clothingsize = '$clothingsize', description = '$description', company = '$company', photo = '$photo', salutation = '$salutation' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "UPDATE `user-team-info` SET uni = '$uni', faculty = '$faculty', speciality = '$speciality', role = '$role' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $_SESSION['login'] = $login;
    header('Location: ../pages/account.php');
  }

?>
