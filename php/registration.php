<?php
function clean($var = ""){ return trim(stripslashes(strip_tags(htmlspecialchars($var)))); }

$first_name = clean($_POST['first_name']);
$last_name = clean($_POST['last_name']);
$email = clean($_POST['email']);
$password = clean($_POST['password']);
$confirm_password = clean($_POST['confirm_password']);

if(!preg_match("/[^a-zA-Zа-яА-ЯіїІЇ]/", $first_name) && !preg_match("/[^a-zA-Zа-яА-ЯіїІЇ]/", $last_name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/[^a-zA-Z\d@#$%]/", $password)){
  require_once 'connection.php';

  $check_email = "SELECT * FROM users WHERE email='$email'";
  $check_email_result = mysqli_query($connection, $check_email);

  if(mysqli_num_rows($check_email_result) == 0) if($password == $confirm_password){
    $insert = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
    $insert_result = mysqli_query($connection, $insert);
    echo 3;
  } else echo 2;
  else echo 1;

  mysqli_close($connection);
} else echo 0;
?>
