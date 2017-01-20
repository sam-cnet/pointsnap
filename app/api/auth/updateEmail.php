<?php

session_start();

//check to see if user authenticated
if($_SESSION['isloggedin']){

//creates a new database connection
$mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');

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




    if($_SERVER['REQUEST_METHOD'] == "POST"){
          $post = json_decode(file_get_contents('php://input'), true);

                  if($post['action'] == "updateEmail" && isset($post['username'])){

                        //get a list of all member usernames
                        $sql = "SELECT username FROM members";
                        $result = $mysqli->query($sql);
                        $return = [];

                        //let our code determine if true
                        $usernameExists = false;

                        while($row = $result->fetch_assoc()){

                          //check if username in DB matches POST
                          if($row['username'] == $post['username']){

                            $usernameExists = true;

                          }
                        }

                       if(!$usernameExists){

                          //update members table with users new username
                         $sql = "UPDATE members SET username = '" . $post['username'] . "' WHERE username = '" . $_SESSION['username'] . "'";

			 $sql = "UPDATE company_directory SET username = '" . $post['username'] . "' WHERE username = '" . $_SESSION['username'] . "'";

                         $mysqli->query($sql);

                         $_SESSION['username'] = $post['username'];
                       }

                  }

     }
}

?>
