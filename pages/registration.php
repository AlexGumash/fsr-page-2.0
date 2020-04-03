<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        $('input[name=login]').blur(function(){
          var login = $("input[name='login']").val()
          $('input[type=submit]').attr('disabled', true);
          $.ajax({
            type: "post",
            url: "../handlers/check-login.php",
            data: {loginToCheck: login}
          }).done(function(result){
            if (result != '') {
              $('#valid_confirm_login').html(result)
            } else {
              $('#valid_confirm_login').html('')
              $('input[type=submit]').attr('disabled', false);
            }
          })
        })

        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');

        mail.blur(function(){
          if(mail.val().search(pattern) == 0){
              $('#valid_email_message').text('');
              $('input[type=submit]').attr('disabled', true);
              $.ajax({
                type: "post",
                url: "../handlers/check-email.php",
                data: {emailToCheck: mail.val()}
              }).done(function(result){
                if (result != '') {
                  $('#valid_email_message').html(result)
                } else {
                  $('#valid_email_message').html('')
                  $('input[type=submit]').attr('disabled', false);

                }
              })
          }else{
              $('#valid_email_message').text('Uncorrect email!');
              $('input[type=submit]').attr('disabled', true);
          }

        });

        var password = $('input[name=password]');
        var confirm_password = $('input[name=rep-password]');

        password.keyup(function(){
          if(password.val() != ''){
            if(password.val() !== confirm_password.val()){
                $('#valid_confirm_password_message').text('Password mismatch');
                $('input[type=submit]').attr('disabled', true);
            }else{
                $('#valid_confirm_password_message').text('');
                $('input[type=submit]').attr('disabled', false);
            }
          }
        });

        confirm_password.keyup(function(){
          if(password.val() !== confirm_password.val()){
              $('#valid_confirm_password_message').text('Password mismatch');
              $('input[type=submit]').attr('disabled', true);
          }else{
              $('input[type=submit]').attr('disabled', false);
              $('#valid_confirm_password_message').text('');
          }

        });

      })
    </script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <?php
          if ($_SESSION['email-conf'] == 'success') {
            ?>
              <div class="registration-container">
                <div class="">
                  <span>Your registration is successfull.</span>
                  <span>Please check your email to complete the registration.</span>
                </div>
              </div>
            <?php
          } else {
        ?>
        <div class="registration-container">
          <form class="" action="../handlers/registration.php" method="post">
            <div class="form-div">
              <span>Login:<span class="required-field">*</span></span>
              <input type="text" name="login" value="" required>
            </div>
            <div class="form-div-error">
              <span id="valid_confirm_login"></span>
            </div>
            <div class="form-div">
              <span>Password:<span class="required-field">*</span></span>
              <input type="password" name="password" value="" required>
            </div>
            <div class="form-div">
              <span>Repeat password:</span>
              <input type="password" name="rep-password" value="" required>
            </div>
            <div class="form-div-error">
              <span id="valid_confirm_password_message"></span>
            </div>
            <div class="form-div">
              <span>Salutation:<span class="required-field">*</span></span>
              <div class="">
                <span>Mr.</span>
                <input type="radio" name="salutation" value="Mr." required>
                <span>Ms.</span>
                <input type="radio" name="salutation" value="Ms.">
              </div>
            </div>
            <div class="form-div">
              <span>First name:<span class="required-field">*</span></span>
              <input type="text" name="firstname" value="" required>
            </div>
            <div class="form-div">
              <span>Last name:<span class="required-field">*</span></span>
              <input type="text" name="lastname" value="" required>
            </div>
            <div class="form-div">
              <span>E-mail:<span class="required-field">*</span></span>
              <input type="email" name="email" value="" required>
            </div>
            <div class="form-div-error">
              <span id="valid_email_message"></span>
            </div>
            <div class="submit-div">
              <input type="submit" name="submit-create-account" value="Create account">
            </div>
          </form>
        </div>
      <?php } ?>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
