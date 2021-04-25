<?php 
require_once 'model.php';

if (deleteProduct($_GET['pid'])) {
    header('Location: ../viewer/showAllProduct.php');
}



