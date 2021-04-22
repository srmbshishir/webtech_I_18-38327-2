<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/UserValidation.js"></script>
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
<?php
   include("config.php");
   session_start();
   $emailErr=$passErr="";
   $error=$uname=$pass="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else if (empty($_POST["password"])) {
        $passErr = "password is required";
      }
      else{
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM employee WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die( mysqli_error($db));
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $row['name'];
         $_SESSION['id']=$row['id'];
         $_SESSION['email']=$myusername;
         $_SESSION['dob']=$row['dob'];
         $_SESSION['gender']=$row['gender'];
         $_SESSION['designation']=$row['designation'];
         $_SESSION['hiredate']=$row['hiredate'];
         $_SESSION['pic']=$row['image'];

         echo $_SESSION[login_user];
         
         header("location: dashboard.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  }
?>
<html>
   
   
   <body>
      <table>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <legend>Login</legend>
                    <tr>
                        <td><label for="email">Login Email : </label></td>
                        <td><input type="text" id="email" name="email" onkeyup="validateEmail()" >
                        <span>*</span><p id="emailError"></td>
                    </tr>
                    <td><label for="password">Password : </label></td>
                    <td><input type="password" id="password" name="password" onkeyup="validatePassword()" >
                    <span>*</span><p id="passError"></td>
                    </tr>
                    <tr>
                    <td><input type="checkbox" name="forget" value="forget">                
                    <label for="forget">Remember me</label><br></td>
                    <td><input type="submit" value="Submit" onclick="validate()">
                    <a href="https://www.w3schools.com">Forget password?</a></td>
                    </tr>
                    <tr>
                       <td><?php echo $error; echo $emailErr; echo $passErr; ?></td>
                    </tr>
             </form>
      </table>
   </body>
</html>

