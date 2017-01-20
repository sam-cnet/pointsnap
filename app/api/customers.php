<?php 

//so we can get session info
session_start();

header("Content-Type: application/json");

//check to see if user authenticated
if($_SESSION['isloggedin']){

//creates a new database connection
$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');

   if($_SERVER['REQUEST_METHOD'] == "POST"){

     if($_POST['action'] == "addCustomer"){

	if($sql = $mysqli->prepare("INSERT INTO customers (firstname,lastname,email,telephone,parent) VALUES (?,?,?,?,?)")){
	
	   
	   $sql->bind_param('ssssi',$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['telephone'],$_SESSION['member_id']);

	   if($sql->execute()){
	
	   header('Location: http://pointsnap.ca/app/customers/');
           }
	}	
	
     }

   }


  if($_SERVER['REQUEST_METHOD'] == "GET"){

   if($_GET['action'] !== "delete"){

    $sql = "SELECT * FROM customers WHERE parent = " . $_SESSION['member_id'];
    $results = $mysqli->query($sql);
    $return = [];
     while($row = $results->fetch_assoc()){
	
	array_push($return, $row);

     } 

    echo json_encode($return);
   }
  }



  if($_SERVER['REQUEST_METHOD'] == "GET"){

    if($_GET['action'] == "delete"){

      if($sql = $mysqli->prepare("DELETE FROM customers WHERE ID = ?")){

	$sql->bind_param('i', $_GET['id']);

	echo $sql->execute();

      }
    }
	

  } 

}

?>
