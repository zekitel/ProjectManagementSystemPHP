<?php

header('Content-Type: text/html; charset=utf-8');
require 'connection.php';

function Create(){
    global $connect;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $adminOrNot = 0;
	

    $query = "INSERT INTO users (username,password,name,surname,adminOrNot) VALUES ('$username', '$password','$name', '$surname','$adminOrNot' )";
    mysqli_query($connect, $query);

    header('Location: adminpage.php');
    mysqli_close($connect);
    

} 
if (!empty($_POST)) {
    Create();
}
?>