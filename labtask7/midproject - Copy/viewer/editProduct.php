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
    $employee = fetchProduct($_GET['pid']);

    ?>
    <article>
    <div class="edit">
        <div class="info">
    <form method="post">                       
        <legend>EditProduct</legend>        
            <label>Product Name :</label>  
            <input type="text" name="name" class="form-control" value= "<?php echo  $employee['pname']; ?>"><br/>  
            <label>Brand :</label>  
            <input type="text" name="brand" class="form-control" value= "<?php echo $employee['brand']; ?>" /><br />  
            <label>Buying Price :</label>  
            <input type="text" name="buyprice" class="form-control" value= "<?php echo $employee['buyingPrice']; ?>" /><br />  
            <label>selling Price :</label>  
            <input type="text" name="sellprice" class="form-control" value= "<?php echo $employee['sellingPrice']; ?>" /><br />  
            <label>Stock :</label>  
            <input type="text" name="stock" class="form-control" value= "<?php echo $employee['Stock']; ?>" /><br />  
            <input type="submit" class="btn" name="update" value="UPDATE"/><br /> 
        </form> 
        <button class="btn" onclick="location.href = 'showAllProduct.php';">go back</button>
        
</div>
</div>  
        <?php 
        $spErr=$bpErr=$brandErr=$nameErr=$stockErr="";
        $alphas= array_merge(range('a','z'),range('A','Z'));
        include("../controller/config.php");
        if (isset($_POST['update'])) {

            //name validation
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                $data['pname']="";
            } 
            else{
                $data['pname']=$_POST['name'];
            }

        //brand validation
        if (empty($_POST["brand"])) {
            $brandErr = "brand is required";
            $data['brand']="";
        }
        else{
            $data['brand']=$_POST['brand'];
            }


        //buy price validation
        if (empty($_POST["buyprice"])) {
            $bpErr = "buy price is required";
            $data['buyprice']="";
        }
        else{
            $data['buyprice']=$_POST['buyprice'];
            }
        

        //sell price
        if (empty($_POST["sellprice"])) {
            $spErr = "sell price is required";
            $data['sellprice']="";
        }
        else{
            $data['sellprice']=$_POST['sellprice'];
            }
        
        //stock
        if (empty($_POST["stock"])) {
            $stockErr = "stock is required";
            $data['stock']="";
        }
        else{
            $data['stock']=$_POST['stock'];
            }
        
    
        
            
        //data update
        if($data['pname']!='' && $data['brand']!='' && $data['buyprice']!='' && $data['sellprice']!='' && $data['stock']!=''){
            $sql = "UPDATE product set pname='".$data['pname']."',brand='".$data['brand']."',buyingPrice='".$data['buyprice']."',sellingPrice='".$data['sellprice']."',Stock='".$data['stock']."' where pid ={$_GET['pid']}";
            $result = mysqli_query($db,$sql) or die( mysqli_error($db));
            echo 'data updated successfully';
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

