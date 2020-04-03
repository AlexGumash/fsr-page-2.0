<div class="sideBar-container">
  <?php
    if ($_SESSION['login']) {
      ?>
      <div class="my-account">
        <div class="">
          <a href="pages/account.php" style="color: black">
            <div class="my-account-link">
              <span>My account</span>
            </div>
          </a>
        </div>
        <div class="">
          <a href="http://formulastudentrussia.ru/" target="_blank">
            <div class="my-account-link">
              <span>TIS</span>
            </div>
          </a>
        </div>
        <form class="" action="handlers/loginout.php" method="post">
          <input type="submit" name="logout" value="Log out">
        </form>
        <!-- <a href="#">
          <div class="logout-link">
            <span>Log out</span>
          </div>
        </a> -->
      </div>
      <?php
    } else {
      ?>
      <div class="login">
        <form class="login-form" action="handlers/loginout.php" method="post">
          <div class="form-container">
            <div class="login-login form-div">
              <span>Login: </span>
              <input type="text" name="login" value="" class="form-input">
            </div>
            <div class="login-password form-div">
              <span>Password: </span>
              <input type="password" name="password" value="" class="form-input">
            </div>
            <div class="forgot-password">
              <a href="../pages/password-recovery.php" style="color: rgb(125, 125, 125)">Forgot password?</a>
            </div>
            <input type="submit" name="login-submit" value="Submit" class="login-submit">
          </div>
        </form>
        <div class="registration">
          <span style="margin-bottom:3px">Not registered?</span>
          <a href="../pages/registration.php"><span class="registration-link">Registration</span></a>
        </div>
      </div>
      <?php
    }
  ?>

  <div class="sponsors">
    sponsors
  </div>
</div>
