<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {

    require 'connection.php';
    Assign();
}

function Assign(){
    global $connect;

    $id = $_POST['id'];
	$projectId = $_POST['projectId'];
	$query = mysqli_query($connect,"SELECT * FROM users WHERE id='$id'");
    $rows = mysqli_num_rows($query);
	if ($rows==0){
		$message = "There is no such manager";
			echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	
	
	$query = mysqli_query($connect,"SELECT * FROM projects WHERE projectId='$projectId'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
    	$query2 = mysqli_query($connect,"SELECT * FROM managerproject WHERE managerId='$id' and projectId='$projectId'");
    	$rows2 = mysqli_num_rows($query2);
    	if($rows2 > 0){
    		$message = "Assigned already";
			echo "<script type='text/javascript'>alert('$message');</script>";
    	}
    	else{
    		$query = "INSERT INTO managerproject (managerId,projectId) values('$id','$projectId')";
	    	mysqli_query($connect, $query) or die(mysqli_error($connect));
	    	mysqli_close($connect);
			$message = "Assigned succesfully";
			echo "<script type='text/javascript'>alert('$message');</script>";

    	}

        
		
    }
    else {
            $message = "There is no such project";
			echo "<script type='text/javascript'>alert('$message');</script>";
    }

    //header('Location: adminpage.php');
	echo "<html><body><b id='adminpage'><a href='adminpage.php'>Return Back</a></b></body></html>";
}

?>