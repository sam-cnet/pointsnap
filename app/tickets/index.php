<?php 

if($_SERVER['REQUEST_METHOD'] === "GET"){
    
    if($_SERVER['REQUEST_URI'] == "/app/tickets/new"){
                
            
        //Returns a unique ID for new member 
        
        $mysqli = new mysqli("localhost","public","password","home_dir");
        
        $results = [];
        
        if($stmt = $mysqli->query("SELECT id FROM tickets")){
            
      
            while($row = $stmt->fetch_array()){
                
                $results[] = $row['id'];
                
            }
        
        
        if(count($results) < 1){
            $id = 800001;
        }
        else{
            $id = max($results) + 1;
        }
            
        $return = ["id" => $id];
        
            
        }
        
        if($stmt = $mysqli->query("SELECT fullname FROM members")){
            
            while($row = $stmt->fetch_array()){
                $username = $row;
            }
        }
        
        $return["fullname"] = $username[0];
        echo json_encode($return);
        
        
    }
       
    if($_SERVER['REQUEST_URI'] == "/app/tickets/"){
        
        $mysqli = new mysqli("localhost","public","password","home_dir");
        
        if($stmt = $mysqli->query("SELECT id,title,requester,classification,priority,notes,created FROM tickets ORDER BY id DESC")){
            
            $results = [];
            
            while($row = $stmt->fetch_array()){
                $results[] = $row;
            }
            
            echo json_encode($results);
            
            
        }
    }

    
    elseif($_SERVER['REQUEST_URI'] !== "/app/tickets/" && $_SERVER['REQUEST_URI'] !== "/app/tickets/new") {
        
        $url = explode("/", $_SERVER['REQUEST_URI']);
        
        $id = $url[4];
        
        $mysqli = new mysqli('localhost','public','password','home_dir');
        
        if($stmt = $mysqli->prepare("SELECT * FROM tickets WHERE id = ? LIMIT 1")){
            
            $stmt->bind_param('i', $id);
            $stmt->bind_result($id, $title, $requester, $classification, $priority, $notes, $created);
            $stmt->execute();
            $stmt->fetch();
            
            $return = ["id" => $id, "title" => $title, "requester" => $requester ,"classification" => $classification, "priority" => $priority, "notes" => $notes, "created" => $created];
            
            echo json_encode($return);
        
        }
        
    }
    

}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
  header("Content-Type:application/json");
  
  //Get the form input

  $jPost = file_get_contents("php://input");
  $jPost = json_decode($jPost, true);
  
  
  $myslqi = new mysqli("localhost","public","password","home_dir");
  
  if($stmt = $myslqi->prepare("INSERT INTO tickets (title,requester,classification,priority,notes) VALUES (?,?,?,?,?)")){
      
    $title = $jPost['title'];
    $requester = $jPost['requester'];
    $classification = $jPost['classification'];
    $priority = $jPost['priority'];
    $notes = $jPost['notes'];
    
    
    echo $stmt->bind_param('sssss', $title, $requester,$classification, $priority, $notes);

    echo $stmt->execute();        
     
  }
  else {
      
      echo "fail";
      
  }
    
    
}

if($_SERVER['REQUEST_METHOD'] === "DELETE") {
    
    $url = explode('/', $_SERVER['REQUEST_URI']);
    
    $id = $url[4];
    
    $mysqli = new mysqli('localhost','public','password','home_dir');
    
    if($stmt = $mysqli->prepare("DELETE FROM tickets WHERE id = ?")){
        
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        echo "deleted";
        
    }
    
}

if($_SERVER['REQUEST_METHOD'] === "PUT"){
    
    $jPost = file_get_contents("php://input");
    $jPost = json_decode($jPost, true);
    
    $uri = explode("/", $_SERVER['REQUEST_URI']);
    $id = $uri[4];
    
    $title = $jPost['title'];
    $requester = $jPost['requester'];
    $classification = $jPost['classification'];
    $priority = $jPost['priority'];
    $notes = $jPost['notes'];
    
    $mysqli = new mysqli('localhost','public','password','home_dir');
    
    if($stmt = $mysqli->prepare("UPDATE tickets SET title=?,requester=?,classification=?,priority=?,notes=? WHERE id=?")){
        
        
        $stmt->bind_param('sssssi', $title,$requester,$classification,$priority,$notes,$id);
        
        $stmt->execute();
        
    }
    
}

?>