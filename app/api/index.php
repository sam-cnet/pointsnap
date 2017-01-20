<?php 

//so we can get session info
session_start();

//check to see if user authenticated
if($_SESSION['isloggedin']){

//creates a new database connection
$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');


//for when a request header has GET set
if($_SERVER['REQUEST_METHOD'] == 'GET'){


  if($_GET['action'] == 'getEmail'){


	$sql = "SELECT username FROM members WHERE username = '" . $_SESSION['username'] . "'";

         
      //try to check if successful
      if($results = $mysqli->query($sql)){

	//something to store return values
        $return = [];

       //add some extra info
        //array_push($return, ["numrows" => $results->num_rows]);

        while($row = $results->fetch_assoc()){

          array_push($return, $row);

        }//end WHILE


        //send our response back to the application
        echo json_encode($return);

     }//end IF

 	

  }


  //start fetch customers action
  if($_GET['action'] == "fetchCustomers"){

   
    $sql = "SELECT * FROM customers WHERE parent = '" . $_SESSION['member_id'] . "'";

      //try to check if successful
      if($results = $mysqli->query($sql)){

	//something to store return values
        $return = [];

       //add some extra info
        //array_push($return, ["numrows" => $results->num_rows]);

        while($row = $results->fetch_assoc()){

          array_push($return, $row);

        }//end WHILE


        //send our response back to the application
        echo json_encode($return);

     }//end IF


}//end IF



       elseif($_GET['action'] == 'getBookingList'){


         //$mysqli->query("INSERT INTO company_directory (name,username) values ('admin','admin@pointsnap.ca')");


         $results = $mysqli->query("SELECT * FROM company_directory WHERE username = '" . $_SESSION['username'] . "'");



       $return = [];

       while($row = $results->fetch_assoc()){
        array_push($return, $row);
       }

       echo json_encode($return);


        }


  else {

    $sql = "SELECT * FROM appointments WHERE username = '" . $_SESSION['username'] . "'";

       $results = $mysqli->query($sql);

       $return = [];

       while($row = $results->fetch_assoc()){
	array_push($return, $row);
       }

       if($_GET['action'] == 'getEvents'){

          echo json_encode($return);
	}
   }

}//end of IF GET

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		
	  if($_POST['action'] == 'addCalEvent'){

	    foreach($_POST as $value){

		if($value == ""){die("");}

	    }
		if($stmt = $mysqli->prepare("INSERT INTO appointments (title,customer,customer_email,start,end,username,editable) VALUES (?,?,?,?,?,?,?)")){


		  $title = $_POST['title'];
		  $customer = $_POST['customer'];
		  $customer_email = $_POST['customer_email'];
		  $start = $_POST['start'];
		  $end   = $_POST['end'];
		  $username = $_SESSION['username'];
	          $editable = $_POST['editable'];

		  $stmt->bind_param('sssssss',$title,$customer,$customer_email,$start,$end,$username,$editable);
	
		  if($stmt->execute()){

			header('Location:http://pointsnap.ca/v1/app'); $stmt->close();

				

		  }


		}

	  }

          else if($_POST['action'] == 'addCustomer'){

	    $firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
	    $telephone = $_POST['telephone'];
	    $email = $_POST['email'];
            $parent = $_SESSION['member_id'];



		if($stmt = $mysqli->prepare("INSERT INTO customers (firstname,lastname,telephone,email,parent) VALUES (?,?,?,?,?)")){


		 if($stmt->bind_param('sssss',$firstname,$lastname,$telephone,$email,$parent)){

			if($stmt->execute()){

			
				header('Location:http://pointsnap.ca/v1/app/#customers');
			 

			}

		 }
	
	

		
		

		}

	  }
  
        

	 else {

		$post = json_decode(file_get_contents('php://input'), true);
	  
			
		if($post['action'] == "addCname"){
				

	
		$ch = curl_init();
		
		$httpheader = array();
		$httpheader[] = 'Content-Type: application/json';
		$httpheader[] = 'Authorization: Bearer f48a395d9ec6e2315980d4a192269e1514822269bba9f56972e1aa16d3bfb8e5';

		curl_setopt($ch, CURLOPT_URL, "https://api.digitalocean.com/v2/domains/pointsnap.ca/records");
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$httpheader);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$return = curl_exec($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$body = substr($return, $header_size);

		curl_close($ch);

		

		//header('Content-Type: application/json');
		$response = json_decode($body, true);
		
		
	

		foreach($response as $key=>$value){
	
			foreach($value as $record){

			  if($record['type'] == 'CNAME'){

			    if($record['name'] == $post['name']){

				http_response_code(400);
				header('Content-Type: application/json');
				$err = ['error' => 'name exists'];
				echo json_encode($err);
				return false; 
				die("");
			    }
			  }
			}

		}

		
		                $ch = curl_init();

                                $httpheader = array();
                                $httpheader[] = 'Content-Type: application/json';
                                $httpheader[] = 'Authorization: Bearer f48a395d9ec6e2315980d4a192269e1514822269bba9f56972e1aa16d3bfb8e5';

                                curl_setopt($ch, CURLOPT_URL, "https://api.digitalocean.com/v2/domains/pointsnap.ca/records");
                                curl_setopt($ch, CURLOPT_HEADER, true);
                                curl_setopt($ch, CURLOPT_HTTPHEADER,$httpheader);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          	curl_setopt($ch, CURLOPT_POST, true);
			        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
			        $return = curl_exec($ch);
                                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                                $body = substr($return, $header_size);

                                curl_close($ch);

                               //echo $body;
				
				//echo $body;

					
				//$results = $mysqli->query("SELECT * FROM company_directory WHERE name = '" . $post['name'] . "'");
				
				//echo $results->num_rows;
				
			        $mysqli->query("INSERT INTO company_directory (name,username) values ('" . $post['name'] . "','" . $_SESSION['username'] ."')");	  
				
			
				
	
	 }

        


	}

}
	if($_GET['action'] == 'deleteEvent'){

		
	   if($stmt = $mysqli->prepare("DELETE FROM appointments WHERE username = ?")){



	       echo "OK";
		
	
	   }
	

	}

	elseif($_GET['action'] == 'deleteBookingName' && $_GET['id']){

		$sql = "DELETE FROM company_directory WHERE username = '" . $_SESSION['username'] . "' AND id = '" . $_GET['id'] . "'"; 

		$mysqli->query($sql);
	
	}


	
}
?>
