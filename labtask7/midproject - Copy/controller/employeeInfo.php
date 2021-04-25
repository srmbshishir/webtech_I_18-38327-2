<?php 

require_once 'model.php';

function fetchAllEmployee(){
	return showAllEmployee();
}
function fetchAllProduct(){
	return showAllProduct();
}
function fetchEmployee($id){
	return showEmployee($id);

}
function fetchProduct($pid){
	return showProduct($pid);
}
function fetchAllOrder(){
	return showAllOrder();
}
function fetchOrder($pid){
	return showOrder($pid);
}