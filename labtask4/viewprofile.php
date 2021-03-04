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
        <fieldset>
            <legend>Profile</legend>
            <?php
                $current_data = file_get_contents('data.json');  
                $data = json_decode($current_data, true);  
                foreach($data as $row)  
                {  
                    if($row["name"]==$_SESSION['uname']){
                        echo nl2br('Name :'.$row["name"]."\n");
                        $_SESSION['name']=$row["name"];
                        echo nl2br('Email :'.$row["email"]."\n");
                        $_SESSION['email']=$row["email"];
                        echo nl2br('Gender :'.$row["gender"]."\n");
                        $_SESSION['gender']=$row["gender"];
                        echo nl2br('Dob :'.$row["date of birth"]."\n");
                        $_SESSION['dob']=$row["date of birth"];
                    }  
                } 
            ?>
        </fieldset>
    </article>
    
    <?php include 'footer.html';?>
</body>
</html>