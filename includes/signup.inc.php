<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwdrepeat'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyinputsignup($name, $email, $username, $pwd) !== false) {
    header('Location: ../signup.php?error=emptyinput');
    exit();
  }
  if (invaliduid($username) !== false) {
    header('Location: ../signup.php?error=invaliduid');
    exit();
  }
  if (invalidEmail($email) !== false) {
    header('Location: ../signup.php?error=invalidemail');
    exit();
  }
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header('Location: ../signup.php?error=pwdnotmatch');
    exit();
  }
  if (uidExists($conn, $username, $email) !== false) {
    header('Location: ../signup.php?error=usernametaken');
    exit();
  }

  createUser($conn, $name, $username, $email, $pwd);
} else {
  header('Location: ../signup.php');
}

echo 'hello world';
