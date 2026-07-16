<?php include_once 'header.php'; ?>

<section class="signup-form">
  <h2>Log in</h2>
  <form action="includes/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username or Email">
    <input type="password" name="pwd" placeholder="Password">
    <button type="submit" name="submit">Login</button>
  </form>
  <?php
  if (isset($_GET['error'])) {

    if ($_GET['error'] == 'emptyinput') {
      echo '<div class="alert error">Please fill all input fields</div>';
    } elseif ($_GET['error'] == 'wronglogin') {
      echo '<div class="alert error">Username or Password isn\'t correct</div>';
    }
  }
  ?>
</section>

<?php include_once 'footer.php'; ?>