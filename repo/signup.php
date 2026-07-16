<?php include_once 'header.php'; ?>

<section class="signup-form">
  <h2>Sing Up</h2>
  <form action="includes/signup.inc.php" method="post">
    <input type="text" name="name" placeholder="Full Name">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
    <button type="submit" name="submit">Sign Up</button>
  </form>
  <?php
  if (isset($_GET['error'])) {

    if ($_GET['error'] == 'emptyinput') {
      echo '<div class="alert error">Please fill all input fields</div>';
    } elseif ($_GET['error'] == 'invaliduid') {
      echo '<div class="alert error">Please enter a valid username (a-zA-Z0-9)</div>';
    } elseif ($_GET['error'] == 'invalidemail') {
      echo '<div class="alert error">Please enter a valid email!</div>';
    } elseif ($_GET['error'] == 'pwdnotmatch') {
      echo '<div class="alert error">Passwords do not match!</div>';
    } elseif ($_GET['error'] == 'usernametaken') {
      echo '<div class="alert error">Username is already taken!</div>';
    } elseif ($_GET['error'] == 'none') {
      echo '<div class="alert success">Account created successfully</div>';
    }
  }
  ?>
</section>

<?php include_once 'footer.php'; ?>