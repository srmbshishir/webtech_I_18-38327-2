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
    $employee = fetchOrder($_GET['orderid']);

    ?>
    <article>
    <div class="edit">
        <div class="info">
    <form method="post">                       
        <legend>Edit Order</legend>        
            <label>Order id :</label>  
            <input type="text" name="id" class="form-control" value= "<?php echo  $employee['orderid']; ?>"><br/>  
            <label>Order details :</label>  
            <input type="text" name="orderitem" class="form-control" value= "<?php echo $employee['orderitems']; ?>" /><br />  
            <label>Order Date :</label>  
            <input type="date" name="date" class="form-control" value= "<?php echo $employee['date']; ?>" /><br />  
            <label>Price :</label>  
            <input type="text" name="price" class="form-control" value= "<?php echo $employee['price']; ?>" /><br />  
            <label>Discount :</label>  
            <input type="text" name="discount" class="form-control" value= "<?php echo $employee['discount']; ?>" /><br />
            <label>Status :</label>  
            <input type="text" name="status" class="form-control" value= "<?php echo $employee['status']; ?>" /><br />  
            <input type="submit" class="btn" name="update" value="UPDATE"/><br /> 
        </form> 
        <button class="btn" onclick="location.href = 'showAllOrder.php';">go back</button>
        
</div>
</div>  
        <?php 
        $spErr=$bpErr=$brandErr=$nameErr=$stockErr="";
        $alphas= array_merge(range('a','z'),range('A','Z'));
        include("../controller/config.php");
        if (isset($_POST['update'])) {

            //name validation
            if (empty($_POST["id"])) {
                $nameErr = "orderid is required";
                $data['id']="";
            } 
            else{
                $data['id']=$_POST['id'];
            }

        //brand validation
        if (empty($_POST["orderitem"])) {
            $brandErr = "orderitem is required";
            $data['orderitem']="";
        }
        else{
            $data['orderitem']=$_POST['orderitem'];
            }


        //buy price validation
        if (empty($_POST["date"])) {
            $bpErr = "date is required";
            $data['date']="";
        }
        else{
            $data['date']=$_POST['date'];
            }
        

        //sell price
        if (empty($_POST["price"])) {
            $spErr = "price is required";
            $data['price']="";
        }
        else{
            $data['price']=$_POST['price'];
            }
        
        //stock
        if (empty($_POST["status"])) {
            $stockErr = "status is required";
            $data['status']="";
        }
        else{
            $data['status']=$_POST['status'];
            }
        
                    //stock
        if (empty($_POST["discount"])) {
            $stockErr = "discount is required";
            $data['discount']="";
        }
        else{
            $data['discount']=$_POST['discount'];
            }
    
        
            
        //data update
        if($data['id']!='' && $data['orderitem']!='' && $data['date']!='' && $data['price']!='' && $data['discount']!='' && $data['status']!=''){
            $sql = "UPDATE orderdetails set orderid='".$data['id']."',orderitems='".$data['orderitem']."',date='".$data['date']."',price='".$data['price']."',status='".$data['status']."',discount='".$data['discount']."' where orderid ={$_GET['orderid']}";
            $result = mysqli_query($db,$sql) or die( mysqli_error($db));
            if($result!=""){
                echo 'data updated successfully';
            }
            else{
                echo 'error';
            }
            }
        else{
            echo nl2br("\n".$brandErr."\n".$bpErr."\n".$spErr."\n".$nameErr."\n".$stockErr."\n");
        }    
        }

?>


    </article>
    <?php include 'footer.html';?>
</body>
</html>

