<?php
  include '../useful/counties.php';
  include '../useful/unis.php';
  $class = $_REQUEST['class'];
?>

<div class="create-team">
  <form class="" action="../handlers/create-team.php" method="post">
    <div class="create-team-form">
      <div class="form-div">
        <span>Uni:<span class="required-field">*</span></span>
        <input type="text" name="uni" value="" list="unis" required>
      </div>
      <div class="form-div">
        <span>Team name:<span class="required-field">*</span></span>
        <input type="text" name="name" value="" required>
      </div>
      <div class="form-div">
        <span>Class:<span class="required-field">*</span></span>
        <div class="">
          <span>CV</span>
          <input type="radio" name="class" value="CV" disabled <?php if ($class == 'fsc') {
            echo 'checked';
          } ?>>
          <span>EV</span>
          <input type="radio" name="class" value="EV" disabled <?php if ($class == 'fse') {
            echo 'checked';
          } ?>>
        </div>
      </div>
      <div class="form-div">
        <span>Homepage:</span>
        <input type="text" name="homepage" value="">
      </div>
      <!-- <div class="form-div">
        <span>Social media:</span>
        <input type="text" name="media" value="">
      </div> -->
      <div class="form-div">
        <span>Email:<span class="required-field">*</span></span>
        <input type="email" name="email" value="" required>
      </div>
      <div class="form-div">
        <span>Phone:<span class="required-field">*</span></span>
        <input type="tel" name="phone" value="" placeholder="+XX XXX XXX XX XX" required>
      </div>
      <div class="form-div">
        <span>Country:<span class="required-field">*</span></span>
        <input type="text" name="country" value="" list="countries" required>
      </div>
      <div class="form-div">
        <span>Address:<span class="required-field">*</span></span>
        <textarea name="address" class="team-textarea" required></textarea>
      </div>
      <div class="submit-div">
        <input type="submit" name="create-team-submit" value="Submit" style="width: 100px">
      </div>
    </div>
  </form>
</div>
