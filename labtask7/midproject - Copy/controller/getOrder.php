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

$sql="SELECT * FROM orderdetails WHERE orderid like '$q%' or buyeremail like '$q%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Order Id</th>
<th>Buyer email</th>
<th>Order items</th>
<th>Discount</th>
<th>Price</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['orderid'] . "</td>";
  echo "<td>" . $row['buyeremail'] . "</td>";
  echo "<td>" . $row['orderitems'] . "</td>";
  echo "<td>" . $row['discount'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  ?>
    <td><a href="editOrder.php?orderid=<?php echo $row['orderid'] ?>">Edit</a>&nbsp<a href="../controller/deleteOrder.php?orderid=<?php echo $row['orderid'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
  <?php
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>