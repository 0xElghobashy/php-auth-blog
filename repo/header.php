<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>PHP Project 01</title>
  <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav>
    <div class="wrapper">
      <a href="index.php" class="logo">Blogs</a>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Find Blogs</a></li>
        <?php
        session_start();
        if (isset($_SESSION['userUid'])) {
          echo '<li><a href="myprofile.php">My Profile</a></li>';
          echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
        } else {
          echo '<li><a href="signup.php">Signup</a></li>';
          echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
      </ul>
    </div>
  </nav>

  <main class="wrapper">