<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<a href="../home.php" ><button class="btn btn-success" >Go Back</button></a>
<?php   

require_once 'db_connection.php';


if ($_POST['edit']) {
 
		if ($_POST['type'] == 'restaurants') {

		    $sql = "SELECT * from restaurants left join location ON FK_location = location_id 
		    		where rest_id =".$_POST['id'] ;
			$place_holder = $conn->query($sql);
			$ph = $place_holder->fetch_assoc();	
		  	?>

	<form id="restaurant" action="update.php" method="POST" class="container w-50 mt-5 text-center allforms">
				<h3 class="text-center text-danger"> Edit Restaurant</h3>
				<input type="hidden" value="<?php echo $ph['rest_id'];?>" name="rest_id" >

		<div>
			<label for="rest_name">Name</label>
			<input type="text" class="w-100 m-1" name="rest_name"  placeholder="<?php echo $ph['rest_name'];?>">
		</div>


		<div>
			<label for="rest_type">Type</label>
			<input type="text" name="rest_type"  class="w-100 m-1"  placeholder="<?php echo $ph['rest_type'];?>">
		</div>

		<div>
			<label for="rest_desc">Short description</label>
			<textarea name="rest_desc"  class="w-100 m-1" placeholder="<?php echo $ph['rest_desc'];?>"></textarea>
		</div>

		<div>
			<label for="rest_phone">Phone</label>
			<input type="text" name="rest_phone"  class="w-100 m-1" placeholder="<?php echo $ph['rest_phone'];?>">
		</div>

		<div>
			<label for="rest_web">Web Site</label>
			<input type="text" name="rest_web"  class="w-100 m-1" placeholder="<?php echo $ph['rest_web'];?>">
		</div>

		<div>
			<label for="rest_pic">Picture</label>
			<input type="text" name="rest_pic"  class="w-100 m-1" placeholder="<?php echo $ph['rest_pic'];?>">
		</div>


		<div>
			<label for="FK_location">Location</label>
			<select name="FK_location" class="w-100 m-1" required>	
						<?php
						require_once 'db_connection.php';
						$location_rest = $conn->query('SELECT `location_id`, `city`, `zip`, `address` 
							FROM location');
						if($location_rest->num_rows > 0){
							while ($riga = $location_rest->fetch_assoc()) {
			 				echo '<option value="'.$riga['location_id'].'">'.$riga['city'].' '.$riga['zip'].', '.$riga['address'].'</option>';} 
			 				}
			 			?>
			</select>
		</div>

		<div id="button">
			<input type="submit" name="restaurants" class=" w-100 bg bg-danger text-white m-1"  >
		</div>
	</form>


	<?php

		}elseif($_POST['type'] == 'things_todo'){

			$sql = "SELECT * from things_todo left join location ON FK_todo_location = location_id  
					where todo_id=".$_POST['id'] ;
			$place_holder = $conn->query($sql);
			$ph = $place_holder->fetch_assoc();	
		  	?>


		<form id="todo" action="update.php" method="POST" class="container w-50 mt-5 text-center allforms">
 		<h3 class="text-center text-danger"> Edit Thing to do</h3>
 		
			<input type="hidden" value="<?php echo $ph['todo_id'];?>" name="todo_id" >
 		<div>
 			<label for="todo_name">Name</label>
 			<input type="text" name="todo_name" value="" class="w-100 m-1"  placeholder="<?php echo $ph['todo_name'];?>">
 		</div>
 
 		<div>
 			<label for="todo_type">Type</label>
 			<input type="text" class="w-100 m-1" name="todo_type" value="" placeholder="<?php echo $ph['todo_type'];?>">
 		</div>

 		<div>
			<label for="todo_desc">Short description</label>
			<textarea name="todo_desc"  class="w-100 m-1" placeholder="<?php echo $ph['todo_desc'];?>"></textarea>
		</div>
 
 
 		<div>
 			<label for="todo_web">Web Site</label>
 			<input type="text" name="todo_web" value="" class="w-100 m-1"  placeholder="<?php echo $ph['todo_web'];?>">
 		</div>
 
 		<div>
 			<label for="todo_pic">Picture</label>
 			<input type="text" name="todo_pic" value=""  class="w-100 m-1" placeholder="<?php echo $ph['todo_pic'];?>">
 		</div>

 		<div>
			<label for="FK_todo_location">Location</label>
			<select name="FK_todo_location" class="w-100 m-1" required>	
						<?php
						$location_todo = $conn->query('SELECT `location_id`, `city`, `zip`, `address` FROM location');	
						if($location_todo->num_rows > 0){
							while ($row = $location_todo->fetch_assoc()) {
			 				echo '<option value="'.$row['location_id'].'">'.$row['city'].' '.$row['zip'].', '.$row['address'].'</option>';} 
			 				}
			 			?>
			</select>
		</div>
 
 		<div id="button">
 			<input type="submit" name="todo" class=" w-100 bg bg-danger text-white m-1"  >
 		</div>
 	</form> 
	<?php
	

		}elseif($_POST['type'] == 'concert'){

			$sql = "SELECT * from concert left join location ON FK_con_location = location_id
					where con_id =".$_POST['id'] ;
			$place_holder = $conn->query($sql);
			$ph = $place_holder->fetch_assoc();	
		  	/**/	?>


		  	<form id="concert" action="update.php" method="POST" class="container w-50 mt-5 text-center allforms">
				<h3 class="text-center text-danger"> Edit Concert</h3>
					<input type="hidden" value="<?php echo $ph['con_id'];?>" name="con_id" >
			<div>
				<label for="con_name">Name</label>
				<input type="text" class="w-100 m-1" name="con_name" value="" placeholder="<?php echo $ph['con_name'];?>">
			</div>


			<div>
				<label for="con_date">Date</label>
				<input type="date" name="con_date" value="" class="w-100 m-1">
			</div>

			<div>
				<label for="con_time">Time</label>
				<input type="text" name="con_time" value=""  class="w-100 m-1" placeholder="<?php echo $ph['con_time'];?>">
			</div>

			<div>
				<label for="con_price">Price</label>
				<input type="text" name="con_price" value=""  class="w-100 m-1" placeholder="<?php echo $ph['con_price'];?>">
			</div>

			<div>
				<label for="con_pic">Picture</label>
				<input type="text" name="con_pic" placeholder="<?php echo $ph['con_pic'];?>"  class="w-100 m-1" >
			</div>

			<div>
				<label for="FK_con_location">Location</label>
				<select name="FK_con_location" class="w-100 m-1" required>	
							<?php
							$location_conc = $conn->query('SELECT `location_id`, `city`, `zip`, `address` FROM location');
							if($location_conc->num_rows > 0){
								while ($line = $location_conc->fetch_assoc()) {
				 				echo '<option value="'.$line['location_id'].'">'.$line['city'].' '.$line['zip'].', '.$line['address'].'</option>';} 
				 				}
				 			?>
				</select>
			</div>

		<div id="button">
			<input type="submit" name="concert" class=" w-100 bg bg-danger text-white m-1"  >
		</div>
	</form>
	<?php
		}
   
}else{
header('Location: ../home.php');}
?>

<?php $conn->close(); ?>



