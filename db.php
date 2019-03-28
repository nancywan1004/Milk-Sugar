<?php
/* DB Connection Settings */
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'milksugarnew';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
