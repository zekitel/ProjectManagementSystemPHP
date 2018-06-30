<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {

    require 'connection.php';
    Edit();
}

function Edit(){
    global $connect;

	$taskId = $_POST['taskId'];
    $taskName = $_POST['taskName'];
    $startDay = $_POST['startDay'];
    $estimatedDay = $_POST['estimatedDay'];
	$numberOfEmployee = $_POST['numberOfEmployee'];
	
	
    $query = "UPDATE tasks SET  taskName='$taskName', startDay='$startDay', estimatedDay='$estimatedDay',numberOfEmployee='$numberOfEmployee' WHERE taskId='$taskId'";
    echo "zeki tel";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    mysqli_close($connect);
    header('Location: manager.php');
}

?>