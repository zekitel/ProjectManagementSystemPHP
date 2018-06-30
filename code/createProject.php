<?php

header('Content-Type: text/html; charset=utf-8');
require 'connection.php';

function Create(){
    global $connect;
    $name = $_POST['name'];
    $startdate = $_POST['startdate'];
    $estimatedDay = $_POST['estimatedDay'];
    
    
	
	
	

    $query = "INSERT INTO projects (name, startdate, estimatedDay) VALUES ('$name','$startdate','$estimatedDay')";
	mysqli_query($connect, $query);
	
	
	

	
	
	
	
	
    mysqli_close($connect);
    header('Location: adminpage.php');

} 
if (!empty($_POST)) {
    Create();
}
?>