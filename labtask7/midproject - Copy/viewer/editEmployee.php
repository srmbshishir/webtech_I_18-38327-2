<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/editemp.css">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
        require_once '../controller/employeeInfo.php';
        $employee = fetchEmployee($_GET['id']);

    ?>
    <article>
    <div class="edit">
        <div class="info">
    <form method="post">                       
    <fieldset>
        <legend>Editprofile</legend>        
            <label>Name :</label>  
            <input type="text" name="name" class="form-control" value= "<?php echo $employee['name']; ?>"><br/>  
            <label>E-mail :</label>  
            <input type="text" name="email" class="form-control" value= "<?php echo $employee['email']; ?>" /><br />  

            <fieldset>
            <legend>Gender :</legend>
            <input type="radio" name="gender" value="male" 
            <?php echo ($employee['gender']== 'male') ?  "checked" : "" ;  ?>>Male
            <input type="radio" name="gender" value="female"
            <?php echo ($employee['gender']== 'female') ?  "checked" : "" ;  ?>>Female
            <input type="radio" name="gender" value="other"
            <?php echo ($employee['gender']== 'other') ?  "checked" : "" ;  ?>>Other
            </fieldset>

            <fieldset>
            <label for="category">Choose a category:</label>
            <select name="category" id="category">
            <option value="admin">admin</option>
            <option value="seller">seller</option>
            <option value="manager">Manager</option>
            <span class="error">*<?php echo $categoryErr;?></span>
            </select>
            </fieldset>

            
            <legend>Date Of Birth :</legend>
            <input type="date" name="dob" value= "<?php echo $employee['dob']; ?>">
            <legend>Hiredate :</legend>
            <input type="date" name="hiredate" value= "<?php echo $employee['hiredate']; ?>">
            
                        <br>
                    
            <input type="submit" class="btn" name="update" value="UPDATE" class="btn btn-info" /><br /> 
            </fieldset>                     
        </form> 
        <button class="btn" onclick="location.href = 'showAllEmployee.php';">go back</button>
        
</div>
</div>  
        <?php 
        $hireErr=$idErr=$passErr=$nameErr=$emailErr=$dobErr=$genderErr=$categoryErr="";
        $alphas= array_merge(range('a','z'),range('A','Z'));
        include("../controller/config.php");
        if (isset($_POST['update'])) {

            //name validation
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } 
            else{
                $data['name']=$_POST['name'];
                if (!preg_match("/^[a-zA-Z\s\-]{2,}$/",$data['name'])) {
                    $nameErr = "Only letters and white space allowed";
                    $data['name']="";
                }
                else if(!in_array($data['name'][0],$alphas)){
                    $nameErr = "First letter should be a letter";
                    $data['name']="";
                }
            }

        //email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        }
        else{
            $data['email']=$_POST['email'];
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $data['email']="";
            }
        }

    
        //gender validation
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } 
        else {
            $data['gender']=$_POST['gender'];
        }
        
        //category validation
        if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
        } 
        else {
            $data['category']=$_POST['category'];
        }
        
        //dob validation
        if (empty($_POST["dob"])) {
            $dobErr = "Date of birth is required";
        }
        else{ 
            $data['dob']=$_POST['dob'];
        }
        
        //hiredate validation
        if (empty($_POST["hiredate"])) {
            $hireErr = "Hiredate is required";
        }
        else{ 
            $data['hiredate']=$_POST['hiredate'];
        }
            
        //data update
        if($data['name']!='' && $data['email']!='' && $data['gender']!='' && $data['dob']!='' && $data['hiredate']!=''){
            $sql = "UPDATE employee set name='".$data['name']."',email='".$data['email']."',gender='".$data['gender']."',dob='".$data['dob']."',hiredate='".$data['hiredate']."',designation='".$data['category']."' where id ={$_SESSION['id']}";
            $result = mysqli_query($db,$sql) or die( mysqli_error($db));
            echo 'data updated successfully';
        }
        else{
            echo nl2br("\n".$hireErr."\n".$idErr."\n".$passErr."\n".$nameErr."\n".$emailErr."\n".$dobErr."\n".$genderErr."\n".$categoryErr."\n");
        }    
    }
?>


    </article>
    <?php include 'footer.html';?>
</body>
</html>

