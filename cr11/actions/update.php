<?php
require_once 'db_connection.php';

	function antiHaker($arr_post){
		
		foreach($arr_post as $key => $value) { 

		    $arr_post[$key] = htmlspecialchars(strip_tags(trim($value)));        
		} 
		return $arr_post;
	}


if($_POST['restaurants']) {
		
	$id = $_POST['rest_id'];

	$arr = Array($_POST['rest_name'],$_POST['rest_type'],$_POST['rest_desc'],
				$_POST['rest_phone'],$_POST['rest_web'],$_POST['rest_pic'],$_POST['FK_location']);

	$data = antiHaker($arr);

    $sql = "UPDATE restaurants SET
   			rest_name = '$data[0]', 
   			rest_type = '$data[1]',
   			rest_desc = '$data[2]',
   			rest_phone = '$data[3]', 
   			rest_web = '$data[4]',
   			rest_pic = '$data[5]',
   			FK_location = $data[6]
    		WHERE rest_id =".$_POST['rest_id'] ;

   if($conn->query($sql) == TRUE) {

		header('Location: ../home.php');
	}else{
		echo 'error' . mysqli_error($conn);}
   
}elseif($_POST['todo']){

	$id = $_POST['todo_id'];

	$arr = Array($_POST['todo_name'],$_POST['todo_type'],$_POST['todo_desc'],
				$_POST['todo_web'],$_POST['todo_pic'],$_POST['FK_todo_location']);

	$data = antiHaker($arr);

    $sql = "UPDATE things_todo SET
   			todo_name = '$data[0]', 
   			todo_type = '$data[1]',
   			todo_desc = '$data[2]',
   			todo_web = '$data[3]', 
   			todo_pic = '$data[4]',
   			FK_todo_location = $data[5]
    		WHERE todo_id ={$id}" ;

   if($conn->query($sql) == TRUE) {

		header('Location: ../home.php');
	}else{
		echo 'error' . mysqli_error($conn);}
   
}elseif($_POST['concert']){

	$date_ev = $_POST['con_date'];
	$id = $_POST['con_id'];

	$arr = Array($_POST['con_name'],$_POST['con_time'],
				$_POST['con_price'],$_POST['con_pic'],$_POST['FK_con_location']);

	$data = antiHaker($arr);

    $sql = "UPDATE concert SET
   			con_name = '$data[0]', 
   			con_time = '$data[1]',
   			con_date = '$date_ev',
   			con_price = $data[2], 
   			con_pic = '$data[3]',
   			FK_con_location = $data[4]
    		WHERE con_id ={$id}" ;
echo $sql;
   if($conn->query($sql) == TRUE) {

		header('Location: ../home.php');
	}else{
		echo 'error' . mysqli_error($conn);}
   
}else{
header('Location: ../home.php');}
$conn->close();
?> 


	