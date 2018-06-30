<?php

header('Content-Type: text/html; charset=utf-8');
require 'connection.php';

function Create(){
    global $connect;
    session_start();
    $taskName = $_POST['taskName'];
    $startDate = $_POST['startDate'];
    $estimatedDay = $_POST['estimatedDay'];
	$projectId = $_POST['projectId'];
    echo "<script>console.log( 'Debug Objects: " . $projectId . "' );</script>";
    
    $query = "INSERT INTO tasks (taskName,startDate,estimatedDay,projectId) VALUES ('$taskName','$startDate','$estimatedDay','$projectId')";
    mysqli_query($connect, $query);
	
	
    header('Location: manager.php');
    mysqli_close($connect);
    

} 
if (!empty($_POST)) {
    Create();
}
?>