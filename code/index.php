<?php

include('login.php'); // Includes Login Script
//include('register.php'); // Includes Login Script
/*
if(isset($_SESSION['login_user'])){
	$_SESSION['login_user']=$username; 
	if ($username == 'admin') {
		header("location: adminpage.php");
    } else {
        header("location: student.php"); // Redirecting To Other Page
    }
}
*/
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Project Management System</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div id="main">
         <h1>Project Management System</h1>
         <div id="login">
            <h2>Login Form</h2>
            <form action="login.php" method="post">
               <label>UserName :</label>
               <input id="username" name="username" placeholder="username" type="text">
               <label>Password :</label>
               <input id="password" name="password" placeholder="**********" type="password">
               <input name="login" type="submit" value=" Login ">
               <span><?php echo $error; ?></span>
            </form>
         </div>
         
      </div>
   </body>
</html>