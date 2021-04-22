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

    <?php 

    if (isset($_SESSION['login_user'])) {
    echo "<h4> Logged in with ".$_SESSION['login_user'].", Welcome to ABC.COM"."</h4>";

    }
    else{
    $msg="error";
    header("location:login.php");
    // echo "<script>location.href='login.php'</script>";
    }

    ?>
    <article>
    <?php
        echo 'welcome '.$_SESSION['login_user'];
    ?>
    </article>
    <?php include 'footer.html';?>
</body>
</html>