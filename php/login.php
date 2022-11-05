<?php
function clean($var = ""){ return trim(stripslashes(strip_tags(htmlspecialchars($var)))); }

$email = clean($_POST['email']);
$password = clean($_POST['password']);

if(filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/[^a-zA-Z\d@#$%]/", $password)){
  require_once 'connection.php';

  $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
  $result = mysqli_query($connection, $query);

  if(mysqli_num_rows($result) == 1){
    session_start();
    while($row = mysqli_fetch_array($result))
    {
      $_SESSION['id'] = $row['id'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['last_name'] = $row['last_name'];
      $_SESSION['email'] = $row['email'];
    }
    echo 2;
  } else echo 1;

  mysqli_close($connection);
} else echo 0;
?>
