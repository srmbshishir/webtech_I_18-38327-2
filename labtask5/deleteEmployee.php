<?php 

require_once 'model.php';

if (deleteEmployee($_GET['id'])) {
    header('Location: showAllEmployee.php');
}

?>