<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'combine.php';?>
    <article>
    <form method="post">                       
    <fieldset>
        <legend>editprofile</legend>        
            <label>Name</label>  
            <input type="text" name="name" class="form-control" value= "<?php echo $_SESSION['login_user']; ?>"><br/>  
            <label>E-mail</label>  
            <input type="text" name="email" class="form-control" value= "<?php echo $_SESSION['email']; ?>" /><br />  

            <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="gender" value="male" 
            <?php echo ($_SESSION['gender']== 'male') ?  "checked" : "" ;  ?>>Male
            <input type="radio" name="gender" value="female"
            <?php echo ($_SESSION['gender']== 'female') ?  "checked" : "" ;  ?>>Female
            <input type="radio" name="gender" value="other"
            <?php echo ($_SESSION['gender']== 'other') ?  "checked" : "" ;  ?>>Other
            </fieldset>

            <fieldset>
            <legend>Date Of Birth</legend>
            <input type="date" name="dob" value= "<?php echo $_SESSION['dob']; ?>">
            
            </fieldset>
            <br>
                    
            <input type="submit" name="update" value="Append" class="btn btn-info" /><br /> 
            </fieldset>                     
        </form>   
        <?php 
        include("../controller/config.php");
        if (isset($_POST['update'])) {
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['gender'] = $_POST['gender'];
            $data['dob'] = $_POST['dob'];
            
            if($data['name']!='' && $data['email']!='' && $data['gender']!='' && $data['dob']!=''){
                $sql = "UPDATE employee set name='".$data['name']."',email='".$data['email']."',gender='".$data['gender']."',dob='".$data['dob']."' where id ={$_SESSION['id']}";
                $result = mysqli_query($db,$sql) or die( mysqli_error($db));
                echo 'data updated successfully';
            }
            else{
                echo 'please fill up all fields';
            }
            
        }
        ?>


    </article>
    <?php include 'footer.html';?>
</body>
</html>