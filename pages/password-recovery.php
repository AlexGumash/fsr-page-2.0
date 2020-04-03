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
        var mail = $('input[name=email]');
        var submit = $('#submit');
        submit.click(function(){
          if (mail.val() != '') {
            $('#recovery-message').html('Please wait...')
            $.ajax({
              type: "post",
              url: "../handlers/send-recovery.php",
              data: {email: mail.val()}
            }).done(function(result){
              if (result != '') {
                $('#recovery-message').html(result)
              } else {
                $('#recovery-message').html('Password recovery link was sent to the specified email. Please check your mail.')
              }
            })
          }
        })

        var password = $('input[name=new-password]');
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
    <?php

    if ($_REQUEST['token']) {
      $_SESSION['rec-user-id'] = $_REQUEST['userid'];
      $_SESSION['rec-token'] = $_REQUEST['token'];
      ?>

      <div class="recovery">
        <form class="" action="../handlers/password-recovery.php" method="post">
          <div class="recovery-container">
            <div class="rec-item">
              <span>New password:</span>
              <input type="text" name="new-password" value="" required>
            </div>
            <div class="rec-item">
              <span>Repeat password: </span>
              <input type="text" name="rep-password" value="" required>
            </div>
            <div class="rec-item form-div-error">
              <span id="valid_confirm_password_message"></span>
            </div>
            <input type="submit" name="recovery-submit" value="Submit" class="rec-item">
          </div>
        </form>
      </div>

      <?php
    } else {
    ?>
    <div class="recovery">
        <div class="recovery-container">
          <div class="rec-item">
            <span>Enter the email specified during registration.</span>
          </div>
          <div class="rec-item">
            <span>Your email: </span>
            <input type="text" name="email" value="" required>
          </div>
          <input id="submit" type="submit" name="recovery-submit" value="Submit" class="rec-item">
          <span id="recovery-message"></span>
        </div>
    </div>
  <?php } ?>
  </body>
</html>
