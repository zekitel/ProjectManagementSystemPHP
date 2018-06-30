<?php


header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST)) {
    require 'connection.php';
    Remove();
}

function Remove(){
    global $connect;

    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id = '$id'";
    $query2 = "DELETE FROM managerproject WHERE managerId = '$id'";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    mysqli_query($connect, $query2) or die(mysqli_error($connect));

    mysqli_close($connect);
    header('Location: adminpage.php');
}

?>