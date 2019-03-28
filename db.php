<?php
/* DB Connection Settings */
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'milkandsugar';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
