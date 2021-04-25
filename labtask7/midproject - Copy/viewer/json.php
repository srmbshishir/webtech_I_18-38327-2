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
      else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
         $error = "*Invalid email format";
      }
      else if(empty($_POST["phonenumber"]))  
      {  
           $error = "<label class='text-danger'>Enter phone number</label>";  
      } 
      else if(strlen($_POST["phonenumber"])<11)  
      {  
           $error = "<label class='text-danger'>invalid phone number</label>";  
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
                     'phonenumber'     =>     $_POST["phonenumber"],
                     'review'     =>     $_POST["review"], 
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
           <link rel="stylesheet" type="text/css" href="../style/json.css">
      </head>  
      <body> 
      <?php include 'header.html';?>
          <div class="title"> 
           <br />  
           <div class="container">  
                <h3>Please Fill up and tell us your query</h3><br />   
                
                <div class="login">
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                    
                    <label>Name:</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail:</label>  
                     <input type="text" name="email" class="form-control" /><br />  
                     <label>Phone number:</label>  
                     <input type="text" name="phonenumber" class="form-control" /><br />
                     <label>Put your reply:</label>
                     <textarea id="review" name="review" rows="8" cols="80">
                    </textarea>
                    <br>
                    
                     <input type="submit" name="submit" value="Append" class="btn" /><br /> 
                                         
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
                    </div>
           </div>
                    </div>  
           <br />  
      </body>  
 </html>