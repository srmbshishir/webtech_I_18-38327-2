<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
a{
  color:white;
  text-decoration: none;
}
a:hover{
  color:yellow;
}
img{
    height:80px;
    width:85px;
}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','ecommerce');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM product WHERE pname like '$q%' or pid like '$q%' or brand like '$q%' ";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Product Id</th>
<th>Product Name</th>
<th>Brand</th>
<th>Buying price</th>
<th>Selling price</th>
<th>Stock</th>
<th>Image</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['pid'] . "</td>";
  echo "<td>" . $row['pname'] . "</td>";
  echo "<td>" . $row['brand'] . "</td>";
  echo "<td>" . $row['buyingPrice'] . "</td>";
  echo "<td>" . $row['sellingPrice'] . "</td>";
  echo "<td>" . $row['Stock'] . "</td>";
  ?>
	<td><img src="../images/<?php echo $row['image'] ?>" alt="<?php echo $employee['name'] ?>"></td>
    <td><a href="editProduct.php?pid=<?php echo $row['pid'] ?>">Edit</a>&nbsp<a href="../controller/deleteProduct.php?pid=<?php echo $row['pid'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
  <?php
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>