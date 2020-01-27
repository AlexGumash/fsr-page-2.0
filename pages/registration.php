<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="registration-container">
          <form class="" action="../handlers/registration.php" method="post">
            <div class="form-div">
              <span>Login:</span>
              <input type="text" name="login" value="" required>
            </div>
            <div class="form-div">
              <span>Password:</span>
              <input type="password" name="password" value="" required>
            </div>
            <div class="form-div">
              <span>Repeat password:</span>
              <input type="password" name="rep-password" value="" required>
            </div>
            <div class="form-div">
              <span>Salutation:</span>
              <div class="">
                <span>Mr.</span>
                <input type="radio" name="salutation" value="Mr." checked>
                <span>Ms.</span>
                <input type="radio" name="salutation" value="Ms.">
              </div>
            </div>
            <div class="form-div">
              <span>First name:</span>
              <input type="text" name="firstname" value="" required>
            </div>
            <div class="form-div">
              <span>Last name:</span>
              <input type="text" name="lastname" value="" required>
            </div>
            <div class="form-div">
              <span>E-mail:</span>
              <input type="email" name="email" value="" required>
            </div>
            <div class="submit-div">
              <input type="submit" name="submit-create-account" value="Create account">
            </div>
          </form>
        </div>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
