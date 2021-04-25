<?php 
require_once 'model.php';

if (deleteOrder($_GET['orderid'])) {
    header('Location: ../viewer/showAllOrder.php');
}