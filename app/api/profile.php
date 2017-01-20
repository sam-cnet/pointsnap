<?php 

header('Content-Type: application/json');

session_start();

$id = $_SESSION['member_id'];

$response = ['pid' => $id];

echo json_encode($response);


?>

