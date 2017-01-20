<?php 

session_start();

$mysqli = new mysqli("localhost", "public", "", "app");

$username = strtolower(htmlspecialchars(filter_var($_POST['username'], FILTER_SANITIZE_EMAIL)));

$password = htmlspecialchars($_POST['password']);



$stmt = "SELECT * FROM members WHERE username = '" . $username . "'";

$results = $mysqli->query($stmt);

if($results->num_rows > 0){
    
    while($row = $results->fetch_array()){
        

	$db_id = $row['ID'];

        $db_username = $row['username'];
        
        $db_password = $row['password'];

	$db_fullname = $row['fullname'];
        
    }
    
    
    if($username === $db_username && $password === $db_password){
	
	$_SESSION['isloggedin'] = true;

	$_SESSION['username'] = $username;

	$_SESSION['fullname'] = $db_fullname;

	$_SESSION['member_id'] = $db_id;

	$requestedURL = $_SERVER['REQUEST_URI'];

        $stmt = "SELECT is_first_time FROM members WHERE username='" . $username . "'";
        
        $results = $mysqli->query($stmt);

        if($results->num_rows > 0){

          while($row = $results->fetch_array()){

             if($row['is_first_time'] == 0){
		header('Location: http://pointsnap.ca/app/dashboard/');
             }
  	     else{
                header('Location: http://pointsnap.ca/app/dashboard/');

             }
          }

        }

        //header('Location: http://pointsnap.ca/app/#/setup');
    }else{

        die("Incorrect username or password");
    }
    
}
else{
    die("Incorrect username or password");
}
?>
