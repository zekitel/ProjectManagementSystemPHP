<?php

header('Content-Type: text/html; charset=utf-8');
require 'connection.php';

function Create(){
    global $connect;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $department = $_POST['department'];
    
    
    $query = "INSERT INTO employee (name, surname, department) VALUES ('$name', '$surname', '$department')";
    mysqli_query($connect, $query);

    mysqli_close($connect);
    header('Location: adminpage.php');

} 
if (!empty($_POST)) {
    Create();
}
?>