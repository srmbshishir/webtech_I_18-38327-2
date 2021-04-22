<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '../controller/createEmployee.php';?>
<form action="../controller/createEmployee.php" method="post" enctype="multipart/form-data">   
                    <fieldset>
                    <legend>Add employee</legend>
                    
                    <label for="userid">UserID :</label>  
                    <input type="text" id="userid" name="userid"><br/>
                    <label for="name">Name</label>  
                     <input type="text" id="name" name="name">
                     <span class="error">*<?php echo $nameErr;?></span>
                     <br/>  
                     <label for="email">E-mail</label>  
                     <input type="text" id="email" name="email">
                     <span class="error">*<?php echo $emailErr;?></span>
                     <br/>  
                    
                     <label for="pass">Password</label>  
                     <input type="text" id="pass" name="pass">
                     <span class="error">*<?php echo $passErr;?></span>
                     <br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="other">Other
                    <span class="error">*<?php echo $genderErr;?></span>
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

                    <fieldset>
                    <legend>Date Of Birth</legend>
                    <input type="date" name="dob">
                    <span class="error">*<?php echo $dobErr;?></span>
                    <br>
                    <legend>Hire Date</legend>
                    <input type="date" name="hiredate">
                    <span class="error">*<?php echo $hireErr;?></span>
                    </fieldset>
                    <fieldset>
                    <legend>Profile picture:</legend>
                    <input type="file" name="image" id="image"><br><br>
                    </fieldset>
                    <br>
                    
                     <input type="submit" name="submit" value="Append"><br /> 
                     
                </form> 
                </fieldset>
                <button onclick="location.href = 'admin.php';">go back</button>  
</body>
</html>