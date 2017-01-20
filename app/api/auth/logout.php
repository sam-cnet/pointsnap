<?php 

session_start();

$_SESSION['isloggedin'] = false;

session_destroy();

header('Location:http://pointsnap.ca/');

?>
