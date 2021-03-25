<?php
require_once 'db_connect.php';

function showAllEmployee(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `employee` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showEmployee($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `employee` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `employee` WHERE name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function addEmployee($data){
    $conn=db_conn();
    $selectQuery="INSERT into employee (id,name,email,password,gender,designation,dob,hiredate,image) values (:userid,:name,:email,:pass,:gender,:category,:dob,:hiredate,:image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':userid'=> $data['userid'],
            ':name'=> $data['name'],
            ':email'=> $data['email'],
            ':pass'=> $data['pass'],
            ':gender'=> $data['gender'],
            ':category'=> $data['category'],
            ':dob'=> $data['dob'],
            ':hiredate'=> $data['hiredate'],
            ':image'=> $data['image']]);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

        $conn = null;
        return true;
    }

    function updateStudent($id, $data){
        $conn = db_conn();
        $selectQuery = "UPDATE employee set name = ?, email = ?, gender = ?, designation = ?, dob= ?, hiredate= ?, image= ?  where id = ?";
        try{
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([
                $data['name'], $data['email'], $data['gender'],$data['designation'],$data['dob'], $data['hiredate'],$data['image'], $id
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        return true;
    }

    function deleteEmployee($id){
        $conn = db_conn();
        $selectQuery = "DELETE FROM `employee` WHERE `id` = ?";
        try{
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
    
        return true;
    }

?>