<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter E-mail address</label>";  
      }  
      else if(empty($_POST["username"]))  
      {  
           $error = "<label class='text-danger'>Enter username</label>";  
      } 
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      } 
      else if(empty($_POST["confirmpass"]))  
      {  
           $error = "<label class='text-danger'>Enter confirm password</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Enter gender</label>";  
      }
      else if(empty($_POST["dob"]))  
      {  
           $error = "<label class='text-danger'>Enter date of birth</label>";  
      }
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'email'          =>     $_POST["email"],  
                     'username'     =>     $_POST["username"],
                     'password'     =>     $_POST["pass"],
                     'confirm pass'     =>     $_POST["confirmpass"],
                     'gender'     =>     $_POST["gender"],
                     'date of birth'     =>     $_POST["dob"]   
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Append Data to JSON File using PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Append Data to JSON File</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                    <fieldset>
                    <legend>REGISTRATION</legend>
                    
                    <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail</label>  
                     <input type="text" name="email" class="form-control" /><br />  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" /><br />
                     <label>Password</label>  
                     <input type="text" name="pass" class="form-control" /><br />
                     <label>Confirm Password</label>  
                     <input type="text" name="confirmpass" class="form-control" /><br />

                    <fieldset>
                     <legend>Gender</legend>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="other">Other
                    </fieldset>

                    <fieldset>
                    <legend>Date Of Birth</legend>
                    <input type="date" name="dob">
                    </fieldset>
                    <br>
                    
                     <input type="submit" name="submit" value="Append" class="btn btn-info" /><br /> 
                    </fieldset>                     
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  