<?php
$servername = "localhost";
$rootname = "root";
$serverPassword = "29011995";

session_start();
$error='';

if(isset($_POST['login'])){
	if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else{
    	$username=$_POST['username'];
        $password=$_POST['password'];
        
        // Create connection
		$connection = mysqli_connect($servername, $rootname, $serverPassword);
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);
        $dbName="test";
        $db = mysqli_select_db($connection,$dbName);
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($connection,"SELECT * FROM users WHERE password='$password' AND username='$username'");
        $rows = mysqli_num_rows($query);





        if ($rows == 1) {
            
            $row = mysqli_fetch_assoc($query);

            $managerId=$row['id'];


            $_SESSION['login_user']=$managerId; // Initializing Session
            $_SESSION['projectManager']=$managerId;
            //echo $projectId;
            
            //echo  $_SESSION['projectManager'];
            
            if ($username == 'admin' || $username == 'admin2' || $username == 'admin3') {
                
                header("location: adminpage.php");
            } else {
                
                header("location: manager.php"); // Redirecting To Other Page
            }
            
        } else {
            echo "Invalid username and password";
        }
		// Check connection
		

    }



}





?>