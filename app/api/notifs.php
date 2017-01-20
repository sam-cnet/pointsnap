<?php

//so we can get session info
session_start();

header("Content-Type: application/json");

//check to see if user authenticated
if($_SESSION['isloggedin']){

//creates a new database connection
$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');

   if($_SERVER['REQUEST_METHOD'] == "GET"){

        $sql = "SELECT * FROM members_notifications WHERE member_id = " . $_SESSION['member_id'];

	$results = $mysqli->query($sql);
       
	if($results->num_rows > 0){

		$return = [];

		while($row = $results->fetch_assoc()){

		
		  array_push($return, $row);		   

		}

		echo json_encode($return);

	}
      
   }

   if($_SERVER['REQUEST_METHOD'] == "POST"){



	if($sql = $mysqli->prepare("UPDATE members_notifications SET seen = ? WHERE ID = ?")){


	  $sql->bind_param('ii', $_POST['seen'], $_POST['ID']);


	  if($sql->execute()){


		echo "OK";	

	  }

	}


   }


}

?>

