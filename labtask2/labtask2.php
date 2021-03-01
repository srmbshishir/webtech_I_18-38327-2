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
$nameErr=$emailErr=$dobErr=$genderErr=$blood="";
$name=$email=$dob=$gender=$carErr=$bloodErr="";
$alphas= array_merge(range('a','z'),range('A','Z'));
$number=array_merge(range(1,31),range(1,12),range(1953,1998));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //name validation
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } 
    else{
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z\s\-]{2,}$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $name="";
        }
        else if(!in_array($name[0],$alphas)){
            $nameErr = "First letter should be a letter";
            $name="";
        }
    }
    //email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    } 
    //dob validation
    if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
    }
    else{ 
        $dob = test_input($_POST["dob"]);
        $test_arr  = explode('/', $dob);
        if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
            if(!in_array($test_arr[0],$number)){
                $dobErr = "fix the date";
                $dob="";
            }
            else if(!in_array($test_arr[1],$number)){
                $dobErr = "fix the month";
                $dob="";
            }
            else if(!in_array($test_arr[2],$number)){
                $dobErr = "fix the year";
                $dob="";
            }

            
        }
        else{

            $dobErr = "invalid dob";
        }
    }
    //gender validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } 
    else {
        $gender = test_input($_POST["gender"]);
    }

    //degree validation
    if (count($_POST["vehicle"]) < 2){
        $carErr="select at least two";
    }
    //blood group validation
    if (empty($_POST["blood"])) {
        $bloodErr = "blood group is required";
    } 

}

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>

<h2>Php form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 Name: <input type="text" name="name">
 <span class="error">*<?php echo $nameErr;?></span>
 <br><br>
 Email: <input type="text" name="email">
 <span class="error">*<?php echo $emailErr;?></span>
 <br><br>
 Date of birth: <input type="text" name="dob">
 <span class="error">*<?php echo $dobErr;?></span>
 <br><br>
 Gender:
 <input type="radio" name="gender" value="male">male
 <input type="radio" name="gender" value="female">female
 <input type="radio" name="gender" value="other">other
 <span class="error">*<?php echo $genderErr;?></span>
 <br><br>
 Degree:
<input type="checkbox" name="vehicle[]" value="Bike">
<label for="vehicle1"> SSC</label><br>
<input type="checkbox" name="vehicle[]" value="Car">
<label for="vehicle2"> HSC</label><br>
<input type="checkbox" name="vehicle[]" value="Boat">
<label for="vehicle3"> UNDERGRAD</label><br>
<span class="error">*<?php echo $carErr;?></span>
 <br><br>
 Blood Group:
 <label for="blood">Choose a blood group:</label>
<select id="bloodgroup" name="blood">
<option value="">Select any one</option>
<option value="A+">A+</option>
<option value="B+">B+</option>
<option value="A-">A-</option>
<option value="B-">B-</option>
</select><span class="error">* <?php echo $bloodErr;?></span>
<br><br>


 <input type="submit" name="submit" value="submit"><br>


</form>


</body>
</html>
