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
            <input type="text" name="name" class="form-control" placeholder= "<?php echo $_SESSION['name']; ?>"><br/>  
            <label>E-mail</label>  
            <input type="text" name="email" class="form-control" placeholder= "<?php echo $_SESSION['email']; ?>" /><br />  

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
            <input type="text" name="dob" placeholder= "<?php echo $_SESSION['dob']; ?>">
            
            </fieldset>
            <br>
                    
            <input type="submit" name="submit" value="Append" class="btn btn-info" /><br /> 
            </fieldset>                     
        </form>      


    </article>
    <?php include 'footer.html';?>
</body>
</html>