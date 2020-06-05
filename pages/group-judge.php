<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $class = $_REQUEST['class'];
  // $query = "SELECT * FROM users WHERE login = '$login'";
  // $result = mysqli_query($date, $query);
  // $user = mysqli_fetch_array($result, MYSQL_ASSOC);
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
                To register as a judge please send the request. Wait for confirmation by an organizer. After confirmation, you will be registered as judge.
              </span>
            </div>
            <!-- тут нужен другой хэндлер -->
            <form class="" action="../handlers/judge-group-app.php" method="post">
            <!-- тут нужен другой хэндлер -->
              <fieldset class="choose-team-form">
                <div class="request-fields">
                  <div class="request-fields__field">
                    <label for="company" class="label">Company:</label>
                    <input type="text" name="company" value="">
                  </div>
                  <div class="request-fields__field">
                    <label for="division" class="label">Division:</label>
                    <input type="text" name="division" value="">
                  </div>
                  <div class="request-fields__field">
                    <label class="label" for="main-tasks">Main tasks:</label>
                    <input type="text" name="main-tasks" value="">
                  </div>
                  <div class="request-fields__field">
                    <label class="label" for="languages">Languages:</label>
                    <input type="text" name="languages" value="">
                  </div>
                  <div class="request-fields__field">
                    <label class="label" for="days">Participation days:</label>
                    <input type="text" name="days" value="">
                  </div>
                  <div class="request-fields__field">
                    <label class="label" for="accomodation">Accomodation:</label>
                    <input type="text" name="accomodation" value="">
                  </div>
                  <div class="request-fields__field">
                    <label class="label" for="discipline">Discipline</label>
                    <div class="cont">
                      <select class="request-fields__select" name="discipline" id="discipline">
                        <option value="design event">Design Event</option>
                        <option value="cost&Manufacturing event">Cost&Manufacturing Event</option>
                        <option value="presentation event">Presentation Event</option>
                      </select>
                    </div>
                  </div>
                  <div class="account-field-info">
                    <label class="label" for="position">Position</label>
                    <div class="cont">
                      <select class="" name="position" id="position">
                        <option value="judge">Judge</option>
                        <option value="senior judge">Senior Judge</option>
                      </select>
                    </div>
                  </div>
                  <div class="account-field-info">
                    <label class="label" for="spec">Special fields</label>
                    <div class="cont">
                      <select class="" name="spec" id="spec">
                        <option value="Overall Vehicle Concept" >Overall Vehicle Concept</option>
                        <option value="Vehicle Dynamics & Tires" >Vehicle Dynamics & Tires</option>
                        <option value="Aerodynamics" >Aerodynamics</option>
                        <option value="Mechanical & Structural Engineering" >Mechanical & Structural Engineering</option>
                        <option value="Composites Structural Engineering" >Composites Structural Engineering</option>
                        <option value="Drivetrain" >Drivetrain</option>
                        <option value="LV-electronics" >LV-electronics</option>
                        <option value="Engine (IC) & Peripherals" >Engine (IC) & Peripherals</option>
                        <option value="Electrical Propulsion (EV), HV system" >Electrical Propulsion (EV), HV system</option>
                        <option value="Energy Storage" >Energy Storage</option>
                        <option value="Driver Interface & Ergonomics" >Driver Interface & Ergonomics</option>
                      </select>
                    </div>
                  </div>
                </div>
              </fieldset>
              <input type="submit" name="judge-request" value="Send request">
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
