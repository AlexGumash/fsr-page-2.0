<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/main.css">
    <title>FSR</title>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src='../scripts/ajax.js'></script>
    <script type="text/javascript">
      // $(document).ready(function() {
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
          }
        }

        // function checkPhone() {
        //   var phone = $("input[name='phone']");
        //   if (phone.val() != 0) {
        //     $('input[type=submit]').attr('disabled', true);
        //     var pattern = /\+\[a-zA-Z]+/;
        //     if (phone.val().search(pattern) != 0) {
        //       $('#valid_confirm_phone').html('')
        //       $('input[type=submit]').attr('disabled', false);
        //     } else {
        //       $('#valid_confirm_phone').html("Phone must start with + and code country.")
        //       $('input[type=submit]').attr('disabled', true);
        //     }
        //   }
        // }

        function checkLogin() {
          var login = $("input[name='login']")
          $('input[type=submit]').attr('disabled', true);
          $('#valid_confirm_login').html("Please wait...")
          $.ajax({
            type: "post",
            url: "../handlers/check-login.php",
            data: {loginToCheck: login.val()}
          }).done(function(result){
            if (result != '') {
              $('#valid_confirm_login').html(result)
              $('input[type=submit]').attr('disabled', true);
            } else {
              $('#valid_confirm_login').html('')
              $('input[type=submit]').attr('disabled', false);
            }
          })
        }

        function checkEmail() {
          var mail = $("input[name='email']")
          var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;

          $('input[type=submit]').attr('disabled', true);
          $('#valid_confirm_email').html("Please wait...")
          if(mail.val().search(pattern) == 0){
            $.ajax({
              type: "post",
              url: "../handlers/check-email.php",
              data: {emailToCheck: mail.val()}
            }).done(function(result){
              if (result != '') {
                $('#valid_confirm_email').html(result)
                $('input[type=submit]').attr('disabled', true);
              } else {
                $('#valid_confirm_email').html('')
                $('input[type=submit]').attr('disabled', false);
              }
            })
          } else {
            $('#valid_confirm_email').text('Uncorrect email!');
            $('input[type=submit]').attr('disabled', true);
          }

        }


        // $('input[name=login]').blur(function(){
        //   var login = $("input[name='login']").val()
        //   $('input[type=submit]').attr('disabled', true);
        //   $.ajax({
        //     type: "post",
        //     url: "../handlers/check-login.php",
        //     data: {loginToCheck: login}
        //   }).done(function(result){
        //     if (result != '') {
        //       $('#valid_confirm_login').html(result)
        //     } else {
        //       $('#valid_confirm_login').html('')
        //       $('input[type=submit]').attr('disabled', false);
        //     }
        //   })
        // })
      // })
    </script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="account-container">
          <div class="account-header">
            <span>Your profile</span>
          </div>

          <div class="account-menu">
            <div class="account-menu-item" data_target='../components/account-info.php'>
              <span>Overview</span>
            </div>
            <div class="account-menu-item" data_target='../components/account-edit.php'>
              <span>Edit Data</span>
            </div>
            <div class="account-menu-item" data_target='../components/user-groups.php'>
              <span>User Groups</span>
            </div>
            <div class="account-menu-item" data_target='../components/change-password.php'>
              <span>Change Password</span>
            </div>
            <?php
              if ($user['teamid'] != 0) {
                ?>
                <a href="../pages/myteam.php">
                  <div class="account-menu-item-team">
                    <span>My team</span>
                  </div>
                </a>
                <?php
              }
            ?>
          </div>

          <div id="account-content">
            <?php include '../components/account-info.php' ?>

          </div>
          <!-- <div class="account-field">
            <span>Your certificates:</span>
            <span>certificates</span>
          </div> -->
        </div>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
