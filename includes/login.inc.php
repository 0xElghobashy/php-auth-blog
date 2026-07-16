<?php

require_once 'functions.inc.php';
require_once 'dbh.inc.php';

if (isset($_POST['submit'])) { // Don't forget isset()
  $username = $_POST['uid'];
  $pwd = $_POST['pwd'];

  if (emptyinputLogin($username, $pwd) !== false) {
    header('Location: ../login.php?error=emptyinput');
    exit();
  }

  loginUser($conn, $username, $pwd);
} else {
  header('Location: ../login.php');
}
