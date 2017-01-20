<?php 

	class _mail {

		public function send($id){

			$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');			
		
			$sql = "SELECT * FROM customers WHERE id = " . $id; 
		
			$results = $mysqli->query($sql);
	
			if($results->num_rows > 0){

				
				while($row = $results->fetch_assoc()){

					$to = $row['email'];

					mail($to, "Appointment Created", "", "FROM:admin@pointsnap.ca");

					return true;

				}

			}
			else{
				//mail($to, "Appointment Created", "", "FROM:admin@pointsnap.ca");

				return false;
			}  
	
		}

	}

?>
