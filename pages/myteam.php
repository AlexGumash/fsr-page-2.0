<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $userid = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id = '$userid'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM teams WHERE id = '$teamid'";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result, MYSQLI_ASSOC);
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

        function checkEmail() {
          var mail = $("input[name='email']")
          var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;

          $('input[type=submit]').attr('disabled', true);
          $('#valid_confirm_email').html("Please wait...")
          if(mail.val().search(pattern) == 0){
            $.ajax({
              type: "post",
              url: "../handlers/check-team-email.php",
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

    </script>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "../components/header.php" ?>
      </div>
      <div class="middle">
        <div class="team-container">
          <div class="team-header">
            <a href="account.php">
              <div class="back-to-account">
                <span>&#8592;</span>
              </div>
            </a>
            <span>Team account</span>
          </div>

          <div class="team-menu">
            <div class="team-menu-item" data_target='../components/team-info.php'>
              <span>Overview</span>
            </div>
            <div class="team-menu-item" data_target='../components/team-edit.php'>
              <span>Edit Data</span>
            </div>
            <div class="team-menu-item" data_target='../components/team-members.php'>
              <span>Members</span>
            </div>
            <div class="team-menu-item" data_target='../components/team-events.php'>
              <span>Events</span>
            </div>
            <?php
              if ($_SESSION['id'] == $team['Captain']) {
                ?>
                  <div class="team-menu-item" data_target='../components/team-join-apps.php?teamid=<?php echo $team['id']; ?>'>
                    <span>Applications</span>
                  </div>
                <?php
              }
            ?>

          </div>

          <div id="team-content">
            <?php include '../components/team-info.php' ?>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
