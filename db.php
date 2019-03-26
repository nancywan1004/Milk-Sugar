<?php
/* DB Connection Settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'newProject';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
