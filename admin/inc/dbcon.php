<?php

$hostname = 'localhost';
$dbuserid = 'ewon';
$dbpasswd = 'dldnjs8892!';
$dbname = 'ewon';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
} 

?>
