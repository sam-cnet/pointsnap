<?php 

session_start();

$_SESSION['isloggedin'] = false;

header('Location:http://pointsnap.ca/');

?>
