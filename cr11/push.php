
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<?php 

require_once 'actions/db_connection.php';
if(!isset($_SESSION["admin"])){
	header("Location: login.php");
}
if(isset($_SESSION["user"])){
	header("Location: homepage.php");
}

function antiHaker($arr_post){
	
	foreach($arr_post as $key => $value) { 

	    $arr_post[$key] = htmlspecialchars(strip_tags(trim($value)));        
	} 
	return $arr_post;
}



if(isset($_POST['location'])){

	$arr = Array($_POST['city'],$_POST['zip'],$_POST['address']);

	$data = antiHaker($arr);

	$query = "INSERT INTO `location`( `city`, `zip`, `address`) VALUES('$data[0]',$data[1],'$data[2]')";

	if($conn->query($query) === true){	

		echo '<div class="text-center text-success mt-5"><h4>A new location has been inserted, now you can select it in the creation of new Restaurants, Concerts and Activities!!!</h4></div>';
		echo '<div class="text-center  mt-5 w-100"><a href="home.php"><button class="w-50 btn bg-primary text-white">..Back to Home</button></a></div>';

	}else{

		echo '<a href="home.php">..Sorry try again</a>'.mysqli_error($conn);
	}

}elseif(isset($_POST['restaurant'])){


	$arr = Array($_POST['rest_name'],$_POST['rest_type'],$_POST['rest_desc'],$_POST['rest_phone'],$_POST['rest_web'],$_POST['rest_pic'],$_POST['FK_location']);

	$data = antiHaker($arr);

	$query = "INSERT INTO `restaurants`(rest_name, rest_type, rest_desc, rest_phone, rest_web, rest_pic, FK_location) 
	VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]',$data[6])";

	if($conn->query($query) === true){	

		header('Location:home.php');

	}else{

		echo '<a href="home.php">..Sorry try again</a>'.mysqli_error($conn);
	}	
	
}elseif(isset($_POST['todo'])){


	$arr = Array($_POST['todo_name'],$_POST['todo_type'],$_POST['todo_desc'],$_POST['todo_web'],$_POST['todo_pic'],$_POST['FK_todo_location']);

	$data = antiHaker($arr);

	$query = "INSERT INTO `things_todo`(todo_name, todo_type, todo_desc, todo_web, todo_pic, FK_todo_location) 
	VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]',$data[5])";

	if($conn->query($query) === true){	

		header('Location:home.php');

	}else{

		echo '<a href="home.php">..Sorry try again</a>'.mysqli_error($conn);
	}
	
}elseif(isset($_POST['concert'])){


	$arr = Array($_POST['con_name'],$_POST['con_date'],$_POST['con_time'],$_POST['con_price'],$_POST['con_pic'],$_POST['FK_con_location']);

	$data = antiHaker($arr);

	$query = "INSERT INTO `concert`(con_name, con_date, con_time, con_price, con_pic, FK_con_location) 
	VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";

	if($conn->query($query) === true){	

		header('Location:home.php');

	}else{

		echo '<a href="home.php">..Sorry try again</a>'.mysqli_error($conn);
	}
}else{
	header('Location:home.php');
}

?>

