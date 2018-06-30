<?php


header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {
    require 'connection.php';
    Remove();
}

function Remove(){
    global $connect;

    $taskId = $_POST['taskId'];
    $query = "DELETE FROM tasks WHERE taskId = '$taskId'";
    //$query2 = "UPDATE employee SET  taskId=0 WHERE taskId='$taskId'";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    //mysqli_query($connect, $query2) or die(mysqli_error($connect));
    mysqli_close($connect);
    header('Location: manager.php');
}

?>