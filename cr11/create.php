<?php
ob_start();
session_start();
require_once 'actions/db_connection.php';
require_once 'queries/query_login.php';
require_once 'head_component.php';

if(!isset($_SESSION["admin"])){
	header("Location: login.php");
}
if(isset($_SESSION["user"])){
	header("Location: homepage.php");
}


$myquery = 'SELECT `location_id`, `city`, `zip`, `address` FROM location';



 ?>



			 		
	<div class="container text-center text-info p-4" id="createtitle">
		<h2>Hi Admin,</h2>
		<h3>What do you want to create?</h3>
	</div>
 	<div class="container row d-flex justify-content-around">
		<div class=" col-lg-2 m-1">
			<button  class="btn btn-info w-100  mbt">Location</button>
		</div>
		<div class=" col-lg-2 m-1">
			<button  class="btn btn-danger w-100 mbt">Restaurant</button>
		</div>
		<div class=" col-lg-2 m-1">
			<button  class="btn btn-warning w-100 text-white mbt">Thing to do</button>
		</div>
		<div class=" col-lg-2 m-1">
			<button  class="btn btn-success w-100 mbt">Concert</button>
		</div>
	 </div>

 <!-- LOCATION FORM -->
	<form id="location_form" action="push.php" method="POST" class="container w-50 mt-5 text-center  allforms">
				<h3 class="text-center text-danger"> Insert New Location</h3>

		<div>
			<label for="city">City</label>
			<input type="text" class="w-100 m-1" name="city" value="" placeholder="City">
		</div>


		<div>
			<label for="">Zip</label>
			<input type="text" name="zip" value="" class="w-100 m-1"  placeholder="Zip">
		</div>

		<div>
			<label for="">Address</label>
			<input type="text" name="address" value=""  class="w-100 m-1" placeholder="Addresse">
		</div>

		<div id="button">
			<button type="submit" name="location" class="w-100 bg bg-danger text-white m-1"  >Save</button>
		</div>
	</form>


 <!-- Restaurant FORM -->
	<form id="restaurant" action="push.php" method="POST" class="container w-50 mt-5 text-center allforms">
				<h3 class="text-center text-danger"> Insert New Restaurant</h3>

		<div>
			<label for="rest_name">Name</label>
			<input type="text" class="w-100 m-1" name="rest_name"  placeholder="Name">
		</div>


		<div>
			<label for="rest_type">Type</label>
			<input type="text" name="rest_type"  class="w-100 m-1"  placeholder="Type">
		</div>

		<div>
			<label for="rest_desc">Short description</label>
			<textarea name="rest_desc"  class="w-100 m-1" placeholder="description"></textarea>
		</div>

		<div>
			<label for="rest_phone">Phone</label>
			<input type="text" name="rest_phone"  class="w-100 m-1" placeholder="Phone">
		</div>

		<div>
			<label for="rest_web">Web Site</label>
			<input type="text" name="rest_web"  class="w-100 m-1" placeholder="Web">
		</div>

		<div>
			<label for="rest_pic">Picture Url</label>
			<input type="text" name="rest_pic" value="img/default.JPG" class="w-100 m-1" placeholder="Picture Url">
		</div>


		<div>
			<label for="FK_location">Location</label>
			<select name="FK_location" class="w-100 m-1" required>	
						<?php
						$location_rest = $conn->query($myquery);
						if($location_rest->num_rows > 0){
							while ($riga = $location_rest->fetch_assoc()) {
			 				echo '<option value="'.$riga['location_id'].'">'.$riga['city'].' '.$riga['zip'].', '.$riga['address'].'</option>';} 
			 				}
			 			?>
			</select>
		</div>

		<div id="button">
			<button type="submit" name="restaurant" class=" w-100 bg bg-danger text-white m-1"  >Save</button>
		</div>
	</form>


 <!-- Things to do FORM -->

 		
 
 		<form id="todo" action="push.php" method="POST" class="container w-50 mt-5 text-center allforms">
 		<h3 class="text-center text-danger"> Insert New Thing to do</h3>
 		

 		<div>
 			<label for="todo_name">Name</label>
 			<input type="text" name="todo_name" value="" class="w-100 m-1"  placeholder="Name">
 		</div>
 
 		<div>
 			<label for="todo_type">Type</label>
 			<input type="text" class="w-100 m-1" name="todo_type" value="" placeholder="Type">
 		</div>

 		<div>
			<label for="todo_desc">Short description</label>
			<textarea name="todo_desc"  class="w-100 m-1" placeholder="description"></textarea>
		</div>
 
 
 		<div>
 			<label for="todo_web">Web Site</label>
 			<input type="text" name="todo_web" value="" class="w-100 m-1"  placeholder="Web Site">
 		</div>
 
 		<div>
 			<label for="todo_pic">Picture Url</label>
 			<input type="text" name="todo_pic"  value="img/default.JPG"   class="w-100 m-1" placeholder="Picture Url">
 		</div>

 		<div>
			<label for="FK_todo_location">Location</label>
			<select name="FK_todo_location" class="w-100 m-1" required>	
						<?php
						$location_todo = $conn->query($myquery);	
						if($location_todo->num_rows > 0){
							while ($row = $location_todo->fetch_assoc()) {
			 				echo '<option value="'.$row['location_id'].'">'.$row['city'].' '.$row['zip'].', '.$row['address'].'</option>';} 
			 				}
			 			?>
			</select>
		</div>
 
 		<div id="button">
 			<button type="submit" name="todo" class=" w-100 bg bg-danger text-white m-1"  >Save</button>
 		</div>
 	</form> 


 <!-- Concerts FORM -->				


	<form id="concert" action="push.php" method="POST" class="container w-50 mt-5 text-center allforms">
				<h3 class="text-center text-danger"> Insert New Concert</h3>

		<div>
			<label for="con_name">Name</label>
			<input type="text" class="w-100 m-1" name="con_name" value="" placeholder="Name">
		</div>


		<div>
			<label for="con_date">Date</label>
			<input type="date" name="con_date" value="" class="w-100 m-1">
		</div>

		<div>
			<label for="con_time">Time</label>
			<input type="text" name="con_time" value=""  class="w-100 m-1" placeholder="20:30">
		</div>

		<div>
			<label for="con_price">Price</label>
			<input type="text" name="con_price" value=""  class="w-100 m-1" placeholder="39.90">
		</div>

		<div>
			<label for="con_pic">Picture Url</label>
			<input type="text" name="con_pic"  value="img/default.JPG"   class="w-100 m-1" placeholder="Picture Url">
		</div>

		<div>
			<label for="FK_con_location">Location</label>
			<select name="FK_con_location" class="w-100 m-1" required>	
						<?php
						$location_conc = $conn->query($myquery);
						if($location_conc->num_rows > 0){
							while ($line = $location_conc->fetch_assoc()) {
			 				echo '<option value="'.$line['location_id'].'">'.$line['city'].' '.$line['zip'].', '.$line['address'].'</option>';} 
			 				}
			 			?>
			</select>
		</div>

		<div id="button">
			<button type="submit" name="concert" class=" w-100 bg bg-danger text-white m-1"  >Save</button>
		</div>
	</form>	 
<br><br><br>
	 <script>
	 	
	
		var allForms = document.getElementsByClassName('allforms');
		var mbt = document.getElementsByClassName('mbt');

		for (let i = 0; i < mbt.length ; i++) {
			
			mbt[i].addEventListener('click', function(){

				for (let i = 0; i < mbt.length ; i++) {
					allForms[i].style.display='none';
				}
			
			allForms[i].style.display='block';

			});
		}
	
	
	</script>
	<div class="mt-5 pt-5">
	<div class="mt-5 pt-5">
		
	</div>
	</div>
	<?php include_once 'footer_component.php'; ?>