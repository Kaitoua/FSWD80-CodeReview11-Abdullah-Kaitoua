<?php
ob_start();
session_start();
include_once('actions/db_connection.php');
require_once 'queries/query_login.php';
if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include_once('head_component.php');


echo '

	<a href="home.php" ><button class="btn bg-success text-white m-2">Back To Home</button></a>
';
	
if($_GET['type']){

		if($_GET['type'] == 'restaurant'){

			 $query = 'SELECT * from restaurants left join location ON FK_location = location_id where rest_id ='.$_GET['id'];

			 $result = $conn->query($query);

   			 $data = $result->fetch_assoc();

   			 $conn->close();


			echo '
			<div id="individual " class="container">
			 	<div class="text-center container p-5">
			 		<img id="img_ind" class="w-100 p-3" src="'.$data['rest_pic'].'">
			 	</div>
			 	<div class="text-center ">
			 		<h2>'.$data['rest_name'].'</h2>
			 	</div>
			 	<div class="text-center " id="text-text">
			 		<p>'.$data['rest_desc'].'</p>
			 	</div>
			 	<div id="add_info" class="d-flex justify-content-around mt-5">
			 		<div>
			 			<p>Cousine: </p><p class="mb-5"><strong>'.$data['rest_type'].'</strong></p>
			 		</div>
			 		<div>
			 			<p>Phone: </p><p class="mb-5"><strong> '.$data['rest_phone'].'</strong></p>
			 		</div>
			 		<div>
			 			<p class="">Web:<a href="#"> '.$data['rest_web'].'</a></p>
			 			<p class="mb-5">Address: <strong> '.$data['city'].', '.$data['zip'].' '.$data['address'].'</strong></p>
			 		</div>	
			 	</div>';
				if(isset($_SESSION["admin"])){

			 	

			 		echo '

			 		<div class="d-flex justify-content-around mt-5">
			 			<div>
					 		<form action="actions/delete.php" method="POST" >

					 			<input type="hidden" name="id_del" value="'.$data['rest_id'].' ">
					 			<input type="hidden" name="type" value="restaurants">
					 			<input type="submit" name="canc" value="Delete" class="btn btn-danger">

					 		</form>
					 	</div>
					 	<div>
					 		<form action="actions/edit.php" method="POST" >
								<input type="hidden" name="id" value="'.$data['rest_id'].'">
					 			<input type="hidden" name="type" value="restaurants">
					 			<input type="submit" name="edit"  value="Edit"   class="btn btn-success">

					 		</form>
					 	</div>
			 		</div></div>';

					}else{echo '</div>';}


			 


		}elseif($_GET['type'] == 'todo'){

			$query = 'SELECT * from things_todo left join location ON FK_todo_location = location_id  where todo_id='.$_GET['id'];

			 $result = $conn->query($query);

   			 $data = $result->fetch_assoc();

   			 $conn->close();			


			echo '
			<div id="individual " class="container">
			 	<div class="text-center container p-5">
			 		<img id="img_ind" class="w-100  p-3" src="'.$data['todo_pic'].'">
			 	</div>
			 	<div class="text-center ">
			 		<h2>'.$data['todo_name'].'</h2>
			 	</div>
			 	<div class="text-center " id="text-text">
			 		<p>'.$data['todo_desc'].'</p>
			 	</div>
			 	<div id="add_info" class="d-flex justify-content-around mt-5">
			 		<div>
			 			<p>Type: </p><p class="mb-5"><strong>'.$data['todo_type'].'</strong></p>
			 		</div>
			 		
			 		<div>
			 		
			 			<p class="mb-5">Address:<br> <strong> '.$data['city'].', '.$data['zip'].' '.$data['address'].'</strong></p>
			 		</div>	
			 	</div>';

			 	if(isset($_SESSION["admin"])){

			 		echo '
			 		<div class="d-flex justify-content-around mt-5">
			 			<div>
					 		<form action="actions/delete.php" method="POST" >
								<input type="hidden" name="type" value="things_todo">
					 			<input type="hidden" name="id_del" value="'.$data['todo_id'].' ">
					 			<input type="submit"  name="canc" value="Delete" class="btn btn-danger">

					 		</form>
					 	</div>
					 	<div>
					 		<form action="actions/edit.php" method="POST" >
								<input type="hidden" name="type" value="things_todo">
					 			<input type="hidden" name="id" value="'.$data['todo_id'].'">
					 			<input type="submit"  name="edit"  value="Edit" class="btn btn-success">

					 		</form>
					 	</div>
			 		</div></div>';}else{echo ' </div>';}
			

		}elseif($_GET['type'] == 'concert'){

			$query = 'SELECT * from concert left join location ON FK_con_location = location_id where con_id ='.$_GET['id'];	

			 $result = $conn->query($query);

   			 $data = $result->fetch_assoc();

   			 $conn->close();			


			echo '
			<div id="individual " class="container">
			 	<div class="text-center container p-5">
			 		<img id="img_ind" class="w-100  p-3" src="'.$data['con_pic'].'">
			 	</div>
			 	<div class="text-center ">
			 		<h2>'.$data['con_name'].'</h2>
			 	</div>
			 	<div class="text-center " id="text-text">
			 		<p>'.$data['con_date'].' / '.$data['con_time'].'</p>
			 	</div>
			 	<div id="add_info" class="d-flex justify-content-around mt-5">
			 		<div>
			 			<p>Price: </p><p class="mb-5"><strong>'.$data['con_price'].'€</strong></p>
			 		</div>
			 		
			 		<div>
			 		
			 			<p class="mb-5">Address:<br> <strong> '.$data['city'].', '.$data['zip'].' '.$data['address'].'</strong></p>
			 		</div>	
			 	</div>';

			 	if(isset($_SESSION["admin"])){

			 		echo '
			 		<div class="d-flex justify-content-around mt-5">
			 			<div>
					 		<form action="actions/delete.php" method="POST" >
								<input type="hidden" name="type" value="concert">
					 			<input type="hidden" name="id_del" value="'.$data['con_id'].' ">
					 			<input type="submit" name="canc" value="Delete " class="btn btn-danger">

					 		</form>
					 	</div>
					 	<div>
					 		<form action="actions/edit.php" method="POST" >

					 	
								<input type="hidden" name="type" value="concert">
					 			<input type="hidden" name="id" value="'.$data['con_id'].'">
					 			<input type="submit" name="edit"  value="Edit"  class="btn btn-success">

					 
					 		</form>
					 	</div>
			 		</div></div>';}else{echo ' </div>';}	

		}
}else{
	header('Location:index.php');
}




 ?>