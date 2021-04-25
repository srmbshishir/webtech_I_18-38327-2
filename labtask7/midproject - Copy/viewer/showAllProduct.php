<?php  
require_once '../controller/employeeInfo.php';

$employees = fetchAllProduct();

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
			<th>Product id</th>
			<th>ProductName</th>
			<th>Brand</th>
			<th>Buying price</th>
			<th>Selling price</th>
			<th>Stock</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($employees as $i => $employee): ?>
			<tr>
				<td><?php echo $employee['pid'] ?></td>
				<td><?php echo $employee['pname'] ?></td>
				<td><?php echo $employee['brand'] ?></td>
				<td><?php echo $employee['buyingPrice'] ?></td>
				<td><?php echo $employee['sellingPrice'] ?></td>
				<td><?php echo $employee['Stock'] ?></td>

				<td><img src="../images/<?php echo $employee['image'] ?>" alt="<?php echo $employee['name'] ?>"></td>
				<td><a href="editProduct.php?pid=<?php echo $employee['pid'] ?>">Edit</a>&nbsp<a href="../controller/deleteProduct.php?pid=<?php echo $employee['pid'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</div>         
 

</body>
</html>