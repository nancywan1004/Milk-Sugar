<?php
/* User Login Process*/

$logName = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM allUsers WHERE username='$logName'");

// Check if username exists in database
if ($result->num_rows == 0 ) {
  $_SESSION['message'] = "An account with this username does not exist.";
  header("location:orderstatus.php");
}
else {
  // Proceed to validate login credentials

  // store user data inside $userArr
  $userArr = $result->fetch_assoc();

  // Debugging code
  //print_r($userArr);die;

  if ( $_POST['password'] == $userArr['password']) {
  //if( password_verify($_POST['password'], $userArr['password']) ) {

    //print_r('Password good');die;
    // Session variables to be displayed
    $_SESSION['username'] = $userArr['username'];

    // indicator that user is logged in
    $_SESSION['logged_in'] = true;

    // Redirecting to new page depending on role
    if ( $userArr['type'] == 'c') {
      // user is a customer
      header("location: Customer.php");
    }
    else if ( $userArr['type'] == 'b') {
      header("location: baker.php");
    }

  }
  else {
    // print_r('Password bad');die;
    $_SESSION['message'] = "Password is incorrect.";
    header("location:orderstatus.php");
  }
}

?>
