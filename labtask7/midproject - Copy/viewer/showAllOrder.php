<?php  
require_once '../controller/employeeInfo.php';

$employees = fetchAllOrder();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/showall.css">
</head>
<body>
<?php include 'admin.php';?>
<div class="add">

<table>
	<thead>
		<tr>
			<th>Order Id</th>
			<th>Buyer email</th>
			<th>Order items</th>
			<th>Discount</th>
			<th>Price</th>
			<th>Status</th>
			<th>Date</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($employees as $i => $employee): ?>
			<tr>
				<td><?php echo $employee['orderid'] ?></td>
				<td><?php echo $employee['buyeremail'] ?></td>
				<td><?php echo $employee['orderitems'] ?></td>
				<td><?php echo $employee['discount'] ?></td>
				<td><?php echo $employee['price'] ?></td>
                <td><?php echo $employee['status'] ?></td>
                <td><?php echo $employee['date'] ?></td>	
                
				<td><a href="editOrder.php?orderid=<?php echo $employee['orderid'] ?>">Edit</a>&nbsp<a href="../controller/deleteOrder.php?orderid=<?php echo $employee['orderid'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>			
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</div>         
 

</body>
</html>