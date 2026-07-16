<?php

$serverName = 'localhost';
$dBUsername = 'root';
$dBPassword = ''; // default password for XAMPP is Empty
$dBName = 'phpproject01';

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


if (!$conn) {
  die('Connection Failed !' . mysqli_connect_error());
}

