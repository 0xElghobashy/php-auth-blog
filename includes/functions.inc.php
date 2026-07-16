<?php

function emptyinputsignup($name, $email, $username, $pwd)
{
  $result;
  if (empty($name) || empty($email) || empty($username) || empty($pwd)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function invaliduid($username)
{
  $result;
  if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function invalidEmail($email)
{
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function pwdMatch($pwd, $pwdRepeat)
{
  $result;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function uidExists($conn, $username, $email)
{
  $result;
  // create a template
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";

  // create a prepared statement
  $stmt = mysqli_stmt_init($conn);

  // Prepare the statement for execution
  if (!mysqli_stmt_prepare($stmt, $sql)) {

    // If there is an error for example in the sql code like users table doesn't exist
    header("Location: ../signup.php?error=stmterror");
    exit();
  }

  // Bind parameters to the palceholders
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);

  //Run parameters inside database
  mysqli_stmt_execute($stmt);

  // Gets a result set from a prepared statement
  $resultData = mysqli_stmt_get_result($stmt); // Object

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }
  // uidExists will return false or the row
  mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $username, $email, $pwd)
{
  $sql = "INSERT INTO users (usersName,usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=stmterror");
    exit();
  }
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: ../signup.php?error=none");
  exit();
}

function emptyinputLogin($username, $pwd)
{
  $result;
  if (empty($username) || empty($pwd)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd)
{
  $userExist = uidExists($conn, $username, $username);

  // NOTE: uisExists will return flase or the row
  if ($userExist === false) {
    header("Location: ../login.php?error=wronglogin");
    exit();
  }
  // Check on the password if correct
  $pwdHashed = $userExist['usersPwd'];
  if (password_verify($pwd, $pwdHashed)) {
    session_start();
    $_SESSION['userId'] = $userExist['usersID'];
    $_SESSION['userUid'] = $userExist['usersUid'];
    $_SESSION['userName'] = $userExist['usersName'];
    header("Location: ../index.php");
    exit();
  } else {
    header("Location: ../login.php?error=wronglogin");
    exit();
  }
}
