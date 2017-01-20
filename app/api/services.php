<?php 

session_start();

$parent_id = $_SESSION['member_id'];

//check to see if user authenticated
if($_SESSION['isloggedin']){

//creates a new database connection
$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');

	if($_SERVER['REQUEST_METHOD'] == "GET"){

	
		$sql = "SELECT * FROM services WHERE parent_id = " . $parent_id;

		$results = $mysqli->query($sql);
	
		$return = [];		

		while($row = $results->fetch_assoc()){


			array_push($return,$row);
		

		}
		echo json_encode($return);

	}

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if($sql = $mysqli->prepare("INSERT INTO services (name,location,parent_id) VALUES (?,?,?)")) {

			
	             $sql->bind_param('ssi', $_POST['name'], $_POST['location'], $_SESSION['member_id']);	

		     if($sql->execute()){

			header("Location: http://pointsnap.ca/app/services/");	

		     }
		}
        }


}

?>
