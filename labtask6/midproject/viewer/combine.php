<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    
    <h1 style="text-align:left;">XCompany</h1>
    <h5>logged in as     <?php
        session_start();
        echo $_SESSION['login_user'];
    ?>
    </h5>
    <button onclick="location.href = 'home.php';" >Logout</button>
</header>
<nav>
    <h4>Account</h4>
    <a href="dashboard.php">dashboard</a>
    <a href="viewprofile.php">view profile</a>
    <a href="editprofile.php">edit profile</a>
    <a href="changepassword.php">change password</a>
    <a href="admin.php">admin work</a>
    <a href="logout.php">Logout</a>
</nav>



</body>
</html>