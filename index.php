<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/main.css">
    <title>FSR</title>
  </head>
  <body>
    <div class="container">
      <div class="header headerFooter">
        <?php include "components/header.php" ?>
      </div>
      <div class="middle">
        <div class="sideBar">
          <?php include "components/sidebar.php" ?>
        </div>
        <div class="content">
          <?php include "components/content.php"; ?>
        </div>
      </div>
      <!-- <div class="footer headerFooter">
        footer
      </div> -->
    </div>
  </body>
</html>
