<?php  
require_once 'employeeInfo.php';

$employees = fetchAllEmployee();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Gender</th>
			<th>Designation</th>
			<th>Date of birth</th>
			<th>Hire date</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($employees as $i => $employee): ?>
			<tr>
				<td><a href="showEmployee.php?id=<?php echo $employee['id'] ?>"><?php echo $employee['name'] ?></a></td>
				<td><?php echo $employee['email'] ?></td>
				<td><?php echo $employee['password'] ?></td>
				<td><?php echo $employee['gender'] ?></td>
				<td><?php echo $employee['designation'] ?></td>
				<td><?php echo $employee['dob'] ?></td>
				<td><?php echo $employee['hiredate'] ?></td>

				<td><img width="100px" src="uploads/<?php echo $employee['image'] ?>" alt="<?php echo $employee['name'] ?>"></td>
				<td><a href="editEmployee.php?id=<?php echo $employee['id'] ?>">Edit</a>&nbsp<a href="deleteEmployee.php?id=<?php echo $employee['id'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>