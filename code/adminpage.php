<?php


require 'connection.php';

global $connect;

$managers = array();

if ($results = $connect->query("SELECT * FROM users WHERE adminOrNot='0'")) {
	if ($results->num_rows) {
		while ($row = $results->fetch_object()) {
			$managers[] = $row;
		}
		$results->free();
	}
}

$projects = array();

if ($results = $connect->query("SELECT * FROM projects")) {
	if ($results->num_rows) {
		while ($row = $results->fetch_object()) {
			$projects[] = $row;
		}
		$results->free();
	}
}
$employee = array();

if ($results = $connect->query("SELECT * FROM employee")) {
		if ($results->num_rows) {
			while ($row = $results->fetch_object()) {
				$employee[] = $row;
			}
			$results->free();
		}
}





?>



<!DOCTYPE html>
<html>
<head>
	<title>Administration Page</title>
	<link href="a.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="managerTable">	
	<h3>Managers</h3>
	<?php
	if (!count($managers)) {
		echo "No Record";	
	} else {
	?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Username</th>
				<th>Password</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($managers as $r) {
			?>
			<tr>
				<td><?php echo $r->id; ?></td>
				<td><?php echo $r->name; ?></td>
				<td><?php echo $r->surname; ?></td>
				<td><?php echo $r->username; ?></td>
				<td><?php echo $r->password; ?></td>
				
				
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
				<th>StartDate</th>
				<th>Estimated-Day</th>
				
				
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
				<th>Instructor</th>
				
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

	<?php
	}
	?>
</div>

<div id="assignProject">
	<h3>Assign  Project</h3>
        <form action="assignProject.php" method="post">
            Manager ID:<br />
            <input type="text" name="id" placeholder="ManagerID" />
            <br />Project ID:<br />
            <input type="text" name="projectId" placeholder="projectId" />
            <input type="submit" name="assignment" value="Assign" />
        </form>
	<hr>
</div>




<div id="addManager">
	<h3>Add Manager</h3>
        <form action="addManager.php" method="post">
            Name:<br />
            <input type="text" name="name" placeholder="name" />
            <br /><br />
            Surname:<br />
            <input type="text" name="surname" placeholder="surname" />
            <br /><br />
            Username:<br />
            <input type="text" name="username" placeholder="username" />
            <br /><br />
            Password:<br />
            <input type="text" name="password" placeholder="password" />
            <br /><br />
            
            <input type="submit" value="Add Manager" />
        </form>
</div>
<div id="editManager">
    <h3>Edit Manager Info</h3>
        <form action="editManager.php" method="post">
        	ID:<br />
            <input type="text" name="id" placeholder="id" />
            <br /><br />
            Name:<br />
            <input type="text" name="name" placeholder="name" />
            <br /><br />
            Surname:<br />
            <input type="text" name="surname" placeholder="surname" />
            <br /><br />
            Username:<br />
            <input type="text" name="username" placeholder="username" />
            <br /><br />
            Password:<br />
            <input type="text" name="password" placeholder="password" />
            <br /><br />
             
            <input type="submit" value="Edit Manager" />
        </form>
</div>
<div id="delete">
        <h3>Delete Manager</h3>
        <form action="deleteManager.php" method="post">
            ID:<br />
            <input type="text" name="id" placeholder="course id" />
            <input type="submit" value="Delete" />
        </form>


    <h3>Delete Project</h3>
        <form action="deleteProject.php" method="post">
            ID:<br />
            <input type="text" name="projectId" placeholder="projectId" />
            <input type="submit" value="Remove" />
        </form>


	<h3>Delete Employee</h3>
        <form action="deleteEmployee.php" method="post">
            ID:<br />
            <input type="text" name="employeeId" placeholder="employeeId" />
            <input type="submit" value="Delete" />
        </form>
</div>


<div id="createProject">
	<h3>Create Project</h3>
        <form action="createProject.php" method="post">
            Name:<br />
            <input type="text" name="name" placeholder="name" />
            <br /><br />
            Start Date:<br />
            <input type="date" name="startdate" placeholder="startdate" />
            <br /><br />
            Estimated-Day:<br />
            <input type="text" name="estimatedDay" placeholder="estimatedDay" />
            <br /><br />
            <input type="submit" value="Create Project" />
        </form>
</div>


<div id="editProject">        
    <h3>Edit Project</h3>
        <form action="editProject.php" method="post">
        	ID:<br />
            <input type="text" name="projectId" placeholder="projectId" />
            <br /><br />
            Name:<br />
            <input type="text" name="name" placeholder="name" />
            <br /><br />
            Start-Date:<br />
            <input type="date" name="startdate" placeholder="startdate" />
            <br /><br />
            Estimated-Day:<br />
            <input type="text" name="estimatedDay" placeholder="estimatedDay" />
            <br /><br />
            <input type="submit" value="Edit Project" />
        </form>
</div>
	
<div id="createEmployee">
	<h3>Create Employee</h3>
        <form action="createEmployee.php" method="post">
            Name:<br />
            <input type="text" name="name" placeholder="name" />
            <br /><br />
            Surname:<br />
            <input type="text" name="surname" placeholder="surname" />
            <br /><br />
            Department:<br />
            <input type="text" name="department" placeholder="department" />
            <br /><br />
            <input type="submit" value="Create Employee" />
        </form>
</div>


<div id="editEmployee">
    <h3>Edit Employee</h3>
        <form action="editEmployee.php" method="post">
        	ID:<br />
            <input type="text" name="employeeId" placeholder="employeeId" />
            <br /><br />
            Name:<br />
            <input type="text" name="name" placeholder="name" />
            <br /><br />
            Surname:<br />
            <input type="text" name="surname" placeholder="surname" />
            <br /><br />
            Department:<br />
            <input type="text" name="department" placeholder="department" />
            <br /><br />
            <input type="submit" value="Edit Employee" />
        </form>
</div>        
	
	<b id="logout"><a href="logout.php">Log Out</a></b>

</body>
</html>