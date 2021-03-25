<?php 

require_once 'employeeInfo.php';
$employee = fetchEmployee($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="updateStudent.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $employee['name'] ?>" type="text" id="name" name="name"><br>
  <label for="email">Email:</label><br>
  <input value="<?php echo $employee['email'] ?>" type="text" id="email" name="email"><br>
  
  <fieldset>
    <legend>Gender</legend>
    <input type="radio" name="gender" value="male" 
    <?php echo ($employee['gender']== 'male') ?  "checked" : "" ;  ?>>Male
    <input type="radio" name="gender" value="female"
    <?php echo ($employee['gender']== 'female') ?  "checked" : "" ;  ?>>Female
    <input type="radio" name="gender" value="other"
    <?php echo ($employee['gender']== 'other') ?  "checked" : "" ;  ?>>Other
  </fieldset>
  
  <fieldset>
    <legend>Date Of Birth</legend>
    <input type="text" name="dob" placeholder= "<?php echo $employee['dob']; ?>">        
    <legend>Hiredate</legend>
    <input type="text" name="hiredate" placeholder= "<?php echo $employee['hiredate']; ?>">
  </fieldset>

  <input type="file" name="image"><br><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateStudent" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

