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
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','ecommerce');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT sum(price) FROM `orderdetails` WHERE monthname(date) like '$q%'";
$result = mysqli_query($con,$sql);

$sql2="SELECT sum((sellingPrice-buyingPrice)*quantity) from product,sale where product.pid=sale.pid and monthname(date) like '$q%'";
$result2= mysqli_query($con,$sql2);

echo "<table>
<tr>
<th>Total sales</th>
<th>Total profit</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['sum(price)'] . "</td>";
}


while($row2 = mysqli_fetch_array($result2)) {
    echo "<td>" . $row2['sum((sellingPrice-buyingPrice)*quantity)'] . "</td>";
    echo "</tr>";
  }

mysqli_close($con);
?>
</body>
</html>