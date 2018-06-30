<?php

//error_reporting(0);
require 'connection.php';
session_start();
global $connect;

$projectManager=$_SESSION["projectManager"];

$_POST['projectId']=$projectManager;

$employee = array();

if ($results = $connect->query("SELECT * FROM employee")) {
		if ($results->num_rows) {
			while ($row = $results->fetch_object()) {
				$employee[] = $row;
			}
			$results->free();
		}
}



$projects = array();


if ($results = $connect->query("SELECT * FROM users 
inner join managerproject
 on users.id=managerproject.managerId 
inner join projects
 on projects.projectId=managerproject.projectId where managerId='$projectManager'")) {
		if ($results->num_rows) {
			while ($row = $results->fetch_object()) {
				$projects[] = $row;
			}
			$results->free();
		}
}



 

$tasks = array();

if ($results = $connect->query("SELECT taskId,taskName,tasks.startDate,tasks.estimatedDay,tasks.projectId FROM projects 
inner join managerproject
 on projects.projectId=managerproject.projectId 
inner join users
 on users.id=managerproject.managerId 
 inner join tasks
 on projects.projectId=tasks.projectId")) {
		if ($results->num_rows) {
			while ($row = $results->fetch_object()) {
				$tasks[] = $row;
			}
			$results->free();
		}
}
else{
	echo "<script>console.log( 'Debug Objects: " . $string2 . "' );</script>";
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Manager Page</title>
	<link href="b.css" rel="stylesheet" type="text/css">
</head>
<body>
	
<div id="projectTable">
	<h3>Projects</h3>
	<?php
	if (!count($projects)) {
		echo "No Record";	
	} else {
	?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>startDay</th>
				<th>estimatedDay</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($projects as $r) {
			?>
			<tr>
				<td><?php echo $r->projectId; ?></td>
				<td><?php echo $r->name; ?></td>
				<td><?php echo $r->startdate; ?></td>
				<td><?php echo $r->estimatedDay; ?></td>
				
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<?php
	}
	?>
</div>	
	
	
<div id="taskTable">
	<h3>Tasks</h3>
	<?php
	if (!count($tasks)) {
		echo "No Record";	
	} else {
	?>

	<table>
		<thead>
			<tr>
				<th>taskId</th>
				<th>taskName</th>
				<th>startDay</th>
				<th>estimatedDay</th>
				<th>projectId</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($tasks as $r) {
			?>
			<tr>
				<td><?php echo $r->taskId; ?></td>
				<td><?php echo $r->taskName; ?></td>
				<td><?php echo $r->startDate; ?></td>
				<td><?php echo $r->estimatedDay; ?></td>
				<td><?php echo $r->projectId; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<?php
	}
	?>
</div>
<div id="employeeTable">
        <h3>Employee</h3>
	<?php
	if (!count($employee)) {
		echo "No Record";	
	} else {
	?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Department</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($employee as $r) {
			?>
			<tr>
				<td><?php echo $r->employeeId; ?></td>
				<td><?php echo $r->name; ?></td>
				<td><?php echo $r->surname; ?></td>
				<td><?php echo $r->department; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>	

</div>     

<div id="assignTask">	
	<h3>Assign  Task</h3>
        <form action="assignTask.php" method="post">
            Employee ID:<br />
            <input type="text" name="employeeId" placeholder="employeeId" />
            <br />Task ID:<br />
            <input type="text" name="taskId" placeholder="taskId" />

            <input type="submit" name="assignment" value="Assign" />
        </form>
        <?php
			}
		?>

</div>
<div id="createTask">
	<h3>Create Task</h3>
        <form action="createTask.php" method="post">
            Name:<br />
            <input type="text" name="taskName" placeholder="taskName" />
            <br /><br />
            Start Date:<br />
            <input type="date" name="startDate" placeholder="startDate" />
            <br /><br />
            Estimated-Day:<br />
            <input type="text" name="estimatedDay" placeholder="estimatedDay" />
            ProjectId:<br />
            <input type="text" name="projectId" placeholder="projectId" />  
            <br /><br />    
            <input type="submit" value="Create Task" />
        </form>
</div>  
<div id="deleteTask">	
    <h3>Delete Task</h3>
        <form action="deleteTask.php" method="post">
            ID:<br />
            <input type="text" name="taskId" placeholder="taskId" />
            <input type="submit" value="Remove" />
        </form>
</div>
<div id="editTask">        
    <h3>Edit Task</h3>
        <form action="editTask.php" method="post">
        	ID:<br />
            <input type="text" name="taskId" placeholder="taskId" />
            <br /><br />
            Name:<br />
            <input type="text" name="taskName" placeholder="taskName" />
            <br /><br />
            Start-Date:<br />
            <input type="text" name="startDay" placeholder="startDay" />
            <br /><br />
            Estimated-Time:<br />
            <input type="text" name="estimatedDay" placeholder="estimatedDay" />
            <br /><br />
            NumberOfEmployee:<br />
            <input type="text" name="numberOfEmployee" placeholder="numberOfEmployee" />
            <br /><br />
            
            <input type="submit" value="Edit Task" />
        </form>
</div>   




	<b id="logout"><a href="logout.php">Log Out</a></b>

</body>
</html>