<?
  session_start();
  $old_login = $_SESSION['login'];
  $id = $_SESSION['id'];
  include '../database/connection.php';


  if (isset($_REQUEST['edit-submit'])) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
    $position = $_REQUEST['position'];

    $company = $_REQUEST['company'];
    $division = $_REQUEST['division'];
    $tasks = $_REQUEST['main-tasks'];
    $languages = $_REQUEST['languages'];
    $part_days = $_REQUEST['part-days'];
    $accomodation = $_REQUEST['accomodation'];
    $discipline = $_REQUEST['discipline'];
    $spec = $_REQUEST['spec'];
    $firstAid = $_REQUEST['first-aid'];
    $fireExtinguishing = $_REQUEST['fire-extinguishing'];
    $electricalSafetyAdmission = $_REQUEST['electrical-safety-admission'];
    $DL = $_REQUEST['DL'];
    $msOffice = $_REQUEST['ms-office'];
    $photoSkill = $_REQUEST['photo-skill'];
    $videoSkill = $_REQUEST['video-skill'];
    // $entryyear = $_REQUEST['entryyear'];

    $query = "UPDATE users SET login = '$login', firstname = '$firstname', lastname = '$lastname', email = '$email', postal = '$postal', phone = '$phone', clothingsize = '$clothingsize', photo = '$photo', salutation = '$salutation' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    if ($user['teamid'] != 0) {
      $query = "UPDATE `user-team-info` SET uni = '$uni', faculty = '$faculty', speciality = '$speciality', role = '$role', position = '$position' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    if ($user['group'] == 'Judge') {
      $query = "UPDATE `user-judge-info` SET company = '$company', division = '$division', tasks = '$tasks', languages = '$languages', `part-days` = '$part_days', accomodation = '$accomodation', discipline = '$discipline', position = '$position', spec = '$spec' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    if ($user['group'] == 'Marshal') {
      $query = "UPDATE `user-marshal-info` SET description = '$description', company = '$company', languages = '$languages', `part-days` = '$part_days', accomodation = '$accomodation', `first-aid` = '$firstAid', `fire-extinguishing` = '$fireExtinguishing', `electrical-safety-admission` = '$electricalSafetyAdmission' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    if ($user['group'] == 'Scruti') {
      $query = "UPDATE `user-scrutineer-info` SET description = '$description', company = '$company', languages = '$languages', `part-days` = '$part_days', accomodation = '$accomodation', `first-aid` = '$firstAid', `fire-extinguishing` = '$fireExtinguishing', `electrical-safety-admission` = '$electricalSafetyAdmission', spec = '$spec' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    if ($user['group'] == 'Volunteer') {
      $query = "UPDATE `user-volunteer-info` SET description = '$description', company = '$company', languages = '$languages', `part-days` = '$part_days', accomodation = '$accomodation', `first-aid` = '$firstAid', `fire-extinguishing` = '$fireExtinguishing', DL = '$DL', `ms-office` = '$msOffice', `photo-skill` = '$photoSkill', `video-skill` = '$videoSkill' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    if ($user['group'] == 'Partner') {
      $query = "UPDATE `user-partner-info` SET company = '$company' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    if ($user['group'] == 'Press') {
      $query = "UPDATE `user-press-info` SET company = '$company' WHERE userid = '$id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        echo mysqli_error($date);
      }
    }

    // if ($user['group'] == 'Organizer') {
    //   $query = "UPDATE `user-org-info` SET description = '$description', company = '$company', languages = '$languages', `part-days` = '$part_days', accomodation = '$accomodation', `first-aid` = '$firstAid', `fire-extinguishing` = '$fireExtinguishing', `electrical-safety-admission` = '$electricalSafetyAdmission' WHERE userid = '$id'";
    //   $result = mysqli_query($date, $query);
    //   if (!$result) {
    //     echo mysqli_error($date);
    //   }
    // }

    $_SESSION['login'] = $login;
    header('Location: ../pages/account.php');
  }

?>
