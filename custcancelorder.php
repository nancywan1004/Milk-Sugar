<?php
/* User Login Process*/
$query2 = "UPDATE CakeOrder set status = 'cancelled', cancelDate = CURRENT_DATE where confirmNum = '{$user_confirm}' ";
$conn->query($query2);
date_default_timezone_set('America/Los_Angeles');
$date = date("Y-m-d H:i:s");
if ($conn->affected_rows == 1) {
    echo "Cancelled successfully on $date.";
}else{
    echo "Could not be cancelled.";
}
?>