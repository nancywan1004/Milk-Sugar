<?php
/* User Login Process*/

$confirmNum = $mysqli->escape_string($_POST['confirm#']);

//delete tuple from cakeorder
// same entry in Contains will be deleted (FK on delete cascade constraint)
$result = $mysqli->query("SELECT * FROM CakeOrder WHERE confirmNum='$confirmNum'");
$sql = "DELETE FROM CakeOrder WHERE confirmNum = '$confirmNum'";

// Check if username exists in database
if ($result->num_rows == 0 ) {
  print_r("No such confirm number");die;
  header("location:cancelFailure.php");

} else {

  // Debugging code
  // print_r("Able to find confirm number");die;
  $mysqli->query("DELETE FROM CakeOrder WHERE confirmNum = '$confirmNum'");
  $newR = $mysqli->query("SELECT * FROM CakeOrder WHERE confirmNum='$confirmNum'");

  if($mysqli->query($sql) === TRUE) {
    echo "order successfully cancelled.";
    header("location:orderstatus.php");


  } else {
    echo "Could not be cancelled.";
    // print_r("Found confirm num. Can't cancel");die;
    header("location:cancelFailure.php");

  }


}

?>
