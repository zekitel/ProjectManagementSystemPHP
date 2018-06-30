<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {

    require 'connection.php';
    Edit();
}

function Edit(){
    global $connect;

    $projectId = $_POST['projectId'];
    $name = $_POST['name'];
    $startdate = $_POST['startdate'];
    $estimatedDay = $_POST['estimatedDay'];
   

    $query = "UPDATE projects SET name='$name', startdate='$startdate', estimatedDay='$estimatedDay' WHERE projectId='$projectId'";
    

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    mysqli_close($connect);
    header('Location: adminpage.php');
}

?>