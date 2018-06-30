<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {

    require 'connection.php';
    Assign();
}

function Assign(){
    global $connect;

    $employeeId = $_POST['employeeId'];
	$taskId = $_POST['taskId'];
	$query = mysqli_query($connect,"SELECT * FROM employee WHERE employeeId='$employeeId'");
    $rows = mysqli_num_rows($query);
	if ($rows==0){
		$message = "There is no such employee";
			echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	
	
	$query = mysqli_query($connect,"SELECT * FROM tasks WHERE taskId='$taskId'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
       $query2 = mysqli_query($connect,"SELECT * FROM taskemployee WHERE employeeId='$employeeId' and taskId='$taskId'");
    	$rows2 = mysqli_num_rows($query2);
    	if($rows2 > 0){
    		$message = "Assigned already";
			echo "<script type='text/javascript'>alert('$message');</script>";
    	}
    	else{
            $queryTemp="select date_add(startDate,interval estimatedDay day) as date1 from employee 
            inner join taskemployee on  employee.employeeId=taskemployee.employeeId
            inner join tasks on taskemployee.taskId=tasks.taskId
            where employee.employeeId='$employeeId'";
            


            
            $dates = array();

            if ($results = $connect->query($queryTemp)) {
                    if ($results->num_rows) {
                        while ($row = $results->fetch_object()) {
                            $dates[] = $row;
                        }
                        $results->free();
                    }
            }
            $theDate=array();
            $queryTemp2="select min(startdate) as date2 from tasks where tasks.taskId='$taskId'";
            if ($results = $connect->query($queryTemp2)) {
                    if ($results->num_rows) {
                        while ($row = $results->fetch_object()) {
                            $theDate[] = $row;
                        }
                        $results->free();
                    }
            }
           
            
            $temp50=0;
            $theDate2='';
            foreach ($theDate as $result1) {
                $theDate2=$result1->date2;
            }
            
            foreach ($dates as $result1) {
                    $datetime2 = date_create($result1->date1);
                    $datetime1 = date_create($theDate2);
                    
                    $interval = date_diff($datetime1, $datetime2);
                    $days = $interval->format("%R%a");
                    
                    if($days>0){
                        $message = "There is not available at that date";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        $temp50+=1;
                        break;

                    }
                
                } 
    

            if($temp50==0){
                $query = "INSERT INTO taskemployee (taskId,employeeId) values('$taskId','$employeeId')";
                mysqli_query($connect, $query) or die(mysqli_error($connect));
                mysqli_close($connect);
                $message = "Assigned succesfully";
                echo "<script type='text/javascript'>alert('$message');</script>";

            }
    		
            

    	}
		
    }
    else {
            $message = "There is no such task";
			echo "<script type='text/javascript'>alert('$message');</script>";
    }

    //header('Location: adminpage.php');
	echo "<html><body><b id='adminpage'><a href='manager.php'>Return Back</a></b></body></html>";
}

?>