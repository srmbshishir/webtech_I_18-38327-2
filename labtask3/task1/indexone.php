<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$nameErr=$passErr="";
$uname=$pass="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //name validation
    if (empty($_POST["uname"])) {
      $nameErr = "Name is required";
    } 
    else{
        $uname = test_input($_POST["uname"]);
        if (!preg_match("/^[a-zA-Z\s\-|_]{2,}$/",$uname)) {
            $nameErr = "Only letters and white space allowed";
            $uname="";
        }
        else if(!in_array($uname[0],$alphas)){
            $nameErr = "First letter should be a letter";
            $uname="";
        }
    }
    //password validation
    if (empty($_POST["pass"])) {
      $passErr = "password is required";
    } 
    else{
        $pass = test_input($_POST["pass"]);
        if (strlen($pass)<8) {
            $passErr = "less than 8 characters";
            $pass="";
        }
        else if (!preg_match('/[$%@#]/', $pass))
          {
            $passErr = "at least one special character needed";
            $pass="";
          }
    }


  }
  function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend>Login</legend>
    <label for="uname">Username : </label>
    <input type="text" id="uname" name="uname">
    <span class="error">*<?php echo $nameErr;?></span><br>
    <label for="pass">Password : </label>
    <input type="text" id="pass" name="pass">
    <span class="error">*<?php echo $passErr;?></span><br>
    <input type="checkbox" name="forget" value="forget">
    <label for="forget">Remember me</label><br>
    <input type="submit" value="Submit">
    <a href="https://www.w3schools.com">Forget password?</a>
  </fieldset>
</form>
</body>
</html>
