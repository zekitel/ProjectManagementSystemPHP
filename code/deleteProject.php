<?php


header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {
    require 'connection.php';
    Remove();
}

function Remove(){
    global $connect;

    $projectId = $_POST['projectId'];
    $query = "DELETE FROM projects WHERE projectId = '$projectId'";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    mysqli_close($connect);
    header('Location: adminpage.php');
}

?>