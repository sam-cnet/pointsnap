<?php 

session_start();

$mysqli = new mysqli("localhost", "public", "fca9ea3b1f585b387c7709788b482881", "app");

$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);

$password = $_POST['password'];

$stmt = "SELECT * FROM members WHERE username = '" . $username . "'";

$results = $mysqli->query($stmt);

if($results->num_rows > 0){
    
    while($row = $results->fetch_array()){
        
        $db_username = $row['username'];
        
        $db_password = $row['password'];
        
    }
    
    
    if($username === $db_username && $password === $db_password){
	
	$_SESSION['isloggedin'] = true;

	$_SESSION['username'] = $username;

        $stmt = "SELECT is_first_time FROM members WHERE username='" . $username . "'";
        
        $results = $mysqli->query($stmt);

        if($results->num_rows > 0){

          while($row = $results->fetch_array()){

             if($row['is_first_time'] == 0){
		header('Location: http://pointsnap.ca/app/index.php');
             }
  	     else{
                header('Location: http://pointsnap.ca/app/#/setup');

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
