<?php 

if($_SERVER['REQUEST_METHOD'] === "GET"){

    if($_SERVER['REQUEST_URI'] == "/app/users/new"){
        
        //Returns a unique ID for new member 
        
        $myslqi = new mysqli("localhost","public","password","home_dir");
        
        $results = [];
        
        if($stmt = $myslqi->query("SELECT id FROM members")){
            
      
            while($row = $stmt->fetch_array()){
                
                $results[] = $row['id'];
                
            }
        
        
        if(count($results) < 1){
            $id = 1;
        }
        else{
            $id = max($results) + 1;
        }
            
        $return = ["id" => $id];
        
        echo json_encode($return);
            
            
        }
        
        
    }

    if($_SERVER['REQUEST_URI'] == "/app/users/"){

        $results = array();

        $myslqi = new mysqli("localhost","public","password","home_dir");
     
        if($myslqi->connect_errno){
        
            echo $myslqi->connect_errno;
        
        }
        else{
           
           if($stmt = $myslqi->query("SELECT myid,firstname,lastname,phone,email,lastModified FROM members ORDER BY id DESC")){
               
              while($row = $stmt->fetch_array()){
                  
                  $results[] = $row;
                  
              }
            
              echo json_encode($results);
         
           }
           
        }
        
        
    }
     
    else{
  
  
        $url = explode("/", $_SERVER['REQUEST_URI']);
        $id = $url[4];
        
        $mysqli = new mysqli("localhost","public","password","home_dir");

    
        if($stmt = $mysqli->prepare("SELECT firstname,lastname FROM members WHERE myid = ? LIMIT 1")){
            
            $stmt->bind_param('i', $id);
            
            if($stmt->execute()){
                
                $stmt->store_result();
                
                $stmt->bind_result($firstname,$lastname);
                
                $stmt->fetch();
                
                $results = ["firstname" => $firstname, "lastname" => $lastname];
                
                if($url[3] == "edit"){echo json_encode($results);}
                
            }
            else{
                echo "fail";
            }
      
        }
        

    }
}

if($_SERVER['REQUEST_METHOD'] === "DELETE"){
    
    $uri = explode("/", $_SERVER['REQUEST_URI']);
    $id = $uri[4];
    

    $mysqli = new mysqli("localhost","public","password","home_dir");
    
    if($stmt = $mysqli->prepare("DELETE FROM members WHERE myid = ?")){
        
        $stmt->bind_param('i', $id);
        
        $stmt->execute();
        
    }
    
}

if($_SERVER['REQUEST_METHOD'] === "POST"){

  header("Content-Type:application/json");
  
  //Get the form input

  $jPost = file_get_contents("php://input");
  $jPost = json_decode($jPost, true);
  
  
  $myslqi = new mysqli("localhost","public","password","home_dir");
  
  if($stmt = $myslqi->prepare("INSERT INTO members (id,firstname,lastname,myid,phone,email) VALUES (?,?,?,?,?,?)")){
      
    $id = $jPost['id'];
    $firstname = $jPost['firstname'];
    $lastname = $jPost['lastname'];
    $myid = $jPost['myid'];
    $phone = $jPost['phone'];
    $email = $jPost['email'];
    
    
    echo $stmt->bind_param('ississ', $id, $firstname, $lastname, $myid, $phone, $email);

    echo $stmt->execute();        
     
  }
  else {
      
      echo "fail";
      
  }
    
}

if($_SERVER['REQUEST_METHOD'] === "PUT"){
    
    $jPost = file_get_contents("php://input");
    $jPost = json_decode($jPost, true);
    
    $uri = explode("/", $_SERVER['REQUEST_URI']);
    $id = $uri[4];
    
   
  $myslqi = new mysqli("localhost","public","password","home_dir");
  
  if($stmt = $myslqi->prepare("UPDATE members SET firstname=?,lastname=? WHERE myid=?")){
        
        $firstname = $jPost['firstname'];
        $lastname = $jPost['lastname'];
        
        $stmt->bind_param('ssi', $firstname, $lastname, $id);
        
        $stmt->execute();
        
        echo "update";
        
  }
    
    
    
}

?>