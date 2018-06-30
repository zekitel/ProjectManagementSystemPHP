<?php


header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {
    require 'connection.php';
    Remove();
}

function Remove(){
    global $connect;

    $employeeId = $_POST['employeeId'];

    $query = "DELETE FROM employee WHERE employeeId = '$employeeId'";



    $result = mysqli_query($connect,"SELECT taskId FROM employee WHERE employeeId='$employeeId'");
     $row = mysqli_fetch_assoc($result);

    $temp=$row['taskId'];
    
    
    $query3 = "DELETE FROM tasks WHERE taskId = '$temp'";
    mysqli_query($connect, $query3) or die(mysqli_error($connect));
	mysqli_query($connect, $query) or die(mysqli_error($connect));

    mysqli_close($connect);

    header('Location: adminpage.php');
    
    
}

?>