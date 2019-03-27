<?php
session_start();

// remove all session variables
session_unset();

// destroy session
session_destroy();

// redirect to new page
header("location: index.php");

?>
