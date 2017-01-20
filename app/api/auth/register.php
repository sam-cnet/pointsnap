<?php 

session_start();


//store POST data
$fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);

$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);

$password = $_POST['password'];

$password_confirm = $_POST['password_confirm'];

//check if passwords match 
if($password === $password_confirm){

  //Check if email already registered
  $mysqli = new mysqli('localhost','public','fca9ea3b1f585b387c7709788b482881','app');

  $sql = "SELECT * FROM members WHERE username='" . $username . "'";

  if($results = $mysqli->query($sql)){

   if($results->num_rows > 0){

     //username already exists, redirect user 
     die("<html><body>username already exists. Click <a href='/v1/app/register.php'>here</a> to return</body></html>");
   }
   else{

    //Create account 
    if($stmt = $mysqli->prepare("INSERT INTO members (fullname,username,password) VALUES (?,?,?)")){

	
      $stmt->bind_param('sss',$fullname,$username,$password);

      if($stmt->execute()){

	echo "account created";


$to      = 'sambazargan@hotmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: sam@pointsnap.ca' . "\r\n" .
    'Reply-To: sam@pointsnap.ca' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

      }

    }

   }

  }
}
else{

	echo "passwords do not match";
	echo $password; 
	echo $password_confirm;
}

?>
