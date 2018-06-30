<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {

    require 'connection.php';
    Edit();
}

function Edit(){
    global $connect;

    $employeeId = $_POST['employeeId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $department = $_POST['department'];
    
    

    $query = "UPDATE employee SET name='$name', surname='$surname', department='$department' WHERE employeeId='$employeeId'";
    

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    mysqli_close($connect);
    header('Location: adminpage.php');
}

?>