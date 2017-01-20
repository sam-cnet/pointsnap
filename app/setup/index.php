<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

$username = $_SESSION['username'];

$post = json_decode(file_get_contents('php://input'), true);

$mysqli = new mysqli("localhost", "public", "fca9ea3b1f585b387c7709788b482881", "app");

if($stmt = "UPDATE members SET timezone='" . $post['timezone'] . "' WHERE username='" . $username . "'"){


  if($mysqli->query($stmt) > 0){

    $mysqli->query("UPDATE members SET is_first_time='0' WHERE username='" . $username . "'");
    
  }


}

	else{
	echo "failed to update timezone";
	}
}

if($_SERVER['REQUEST_METHOD'] == "GET"){

$username = $_SESSION['username'];

$mysqli = new mysqli("localhost", "public", "fca9ea3b1f585b387c7709788b482881", "app");

$stmt = "SELECT timezone FROM members WHERE username = '" . $username . "'";

$results = $mysqli->query($stmt);

if($results->num_rows > 0){
    
    while($row = $results->fetch_array()){
        
        $return = ['timezone' => $row[0]];
       
    }
    
	echo json_encode($return);
   
}


}
?>
