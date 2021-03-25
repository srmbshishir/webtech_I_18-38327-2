<?php
require_once 'model.php';

if(isset($_POST['submit'])){
    $data['userid']=$_POST['userid'];
    $data['name']=$_POST['name'];
    $data['email']=$_POST['email'];
    $data['pass']= password_hash($_POST['pass'],PASSWORD_BCRYPT, ["cost"=>12]);
    $data['gender']=$_POST['gender'];
    $data['category']=$_POST['category'];
    $data['dob']=$_POST['dob'];
    $data['hiredate']=$_POST['hiredate'];
    $data['image'] =basename($_FILES["image"]["name"]);
    
    $target_dir="uploads/";
    $target_file=$target_dir.basename($_FILES["image"]["name"]);

    if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
        echo "The file".basename($_FILES["image"]["name"])."has been uploaded.";
    }
    else{
        echo "Sorry,there was an error uploading the file";
    }
    if(addEmployee($data)){
        echo 'successfully added!!';
    }
    else{
        echo 'you are not allowed to access this page';
    }
}
?>