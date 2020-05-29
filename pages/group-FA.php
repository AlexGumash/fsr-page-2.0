<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $class = $_REQUEST['class'];
  // $query = "SELECT * FROM users WHERE login = '$login'";
  // $result = mysqli_query($date, $query);
  // $user = mysqli_fetch_array($result, MYSQL_ASSOC);
?>
<?php $teamclass = "all"; ?>
<?php include '../useful/teams.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src='../scripts/ajax.js'></script>
    <script type="text/javascript">

      function checkEmail(){
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');
        $('input[type=submit]').attr('disabled', true);
        if(mail.val().search(pattern) == 0){
            $('#valid_email_message').text('');
            $('input[type=submit]').attr('disabled', true);
            $.ajax({
              type: "post",
              url: "../handlers/check-team-email.php",
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

      };
    </script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
      <?php include '../useful/teams.php'; ?>
        <div id="team-container" class="team-container">
          <div class="choose-team">
            <div class="choose-team-notification">
              <span>
                To join the team as team faculty advisor please send the request. Wait for confirmation by a team captain. After confirmation, you will become a team faculty advisor.
              </span>
            </div>
            <!-- тут нужен другой хэндлер -->
            <form class="" action="../handlers/join-team-fa.php" method="post">
            <!-- тут нужен другой хэндлер -->
              <fieldset class="choose-team-form">
                <label for="team">Choose your team:</label>
                <input type="text" name="team" value="" list="teams" class="choose-team-input">
              </fieldset>
              <input type="submit" name="choose-team-submit" value="Send request">
            </form>
            <span class="back-link"><a href="account.php">Back</a></span>
          </div>
        </div>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
