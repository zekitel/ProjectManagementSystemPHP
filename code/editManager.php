<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {

    require 'connection.php';
    Edit();
}

function Edit(){
    global $connect;

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	

    $query = "UPDATE users SET name='$name', surname='$surname', username='$username', password='$password' WHERE id='$id'";
    

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    mysqli_close($connect);
    header('Location: adminpage.php');
}

?>