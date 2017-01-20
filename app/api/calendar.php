<?php 

ini_set('display_errors', 'On');

//so we can get session info
session_start();


//for emails 
include "php/mail.php";

//check to see if user authenticated
if($_SESSION['isloggedin']){

//creates a new database connection
$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');

   if($_SERVER['REQUEST_METHOD'] == "POST"){

     if($_POST['action'] == "addCalEvent"){

	if($sql = $mysqli->prepare("INSERT INTO appointments (title,status,customer,customer_id,start,username) VALUES (?,?,?,?,?,?)")){
	
	   //start datetime
	   $start = $_POST['start'] . " " . $_POST['startTime'];
	   

	   $sql->bind_param('ssssss',$_POST['service'],$_POST['status'],$_POST['customer'],$_POST['customer_id'],$start,$_SESSION['username']);

	   if($sql->execute()){
	    	     
	     $customer_id = $_POST['customer_id'];
	     $from = "FROM:admin@pointsnap.ca";
	     $sub = "Appointment Created";
	     $body = "Hello, your appointment has been scheduled.";	
	     //mail($to, $sub, $body, $from);

	     $mail = new _mail();
	     if($mail->send($customer_id)){

	       header('Location: http://pointsnap.ca/app/calendar');

	     }

	   }

	}	
	
     }

   }

  if($_SERVER['REQUEST_METHOD'] == "GET"){
	
    if($_GET['action'] == "delete"){

	$sql = "DELETE FROM appointments WHERE ID=" . $_GET['id'];

	$results = $mysqli->query($sql);

	header('Location: http://pointsnap.ca/app/calendar/');
    }

  } 

}

?>
