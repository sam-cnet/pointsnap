<?php

session_start();

if(!$_SESSION['isloggedin']){

        header('Location: http://pointsnap.ca/v3/app/login.html');

}
else{
        $fullname = $_SESSION['fullname'];
}
?>


<!doctype html>
<html>
<head>
<title>Online Appointments</title>

<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/custom.css" />
<link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.css" />


<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<script type="text/javascript" data-main="main" src="lib/require.js"></script>

</head>
<body>

<div class="preload"></div>

<div id="navbar" ></div>

<div id="breadcrumbs"></div>

<div id="main" class="container"></div>

</body>
</html>
