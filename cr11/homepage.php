<?php
ob_start();
session_start();
require_once 'actions/db_connection.php';
if(!isset($_SESSION["user"])){
	header("Location: login.php");
}
if(isset($_SESSION["admin"])){
	header("Location: home.php");
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

require_once 'head_component.php';



				
?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="script/ajax.js" type="text/javascript"></script>



	

<div class="search-box container w-100">

		<label for="search" class="text-danger">
			<h2 class="">Search</h2>
		</label>

        <input type="text" name="search" autocomplete="off" placeholder="Search" class="w-100 " />
	
  

		<div id="default">
			<hr>
			<?php  echo '<h2 class="text-center  mb-5">All Restaurants Are Displayed</h2>';?>
			
		        <div class="container row d-flex justify-content-around" >
						<?php  

					 		$res =$conn->query("SELECT * FROM restaurants");

					        while ($row = $res->fetch_assoc()) {

					        
					    
					        echo '
				
								<div class="col-lg-4 ombra m-2 mb-5">
                                <div class="text-center">
                                    <h3 class=" text-danger m-0">'.$row['rest_name'].'</h3>

                                    <div>
                                    	<img src="'.$row['rest_pic'].'" class=" w-100 imgs">
                                    </div>
                                        <div class="testo_media text-dark">
                                            <p class="p-2 mt-3">'.$row['rest_desc'].'</p>
                                        </div>
		                            <div class="text-danger">
		                                <p> '.$row['rest_type'].' Cuisine</p>
		                                <p> Tel. '.$row['rest_phone'].'</p>
		                                <p>Web: <a href="#">'.$row['rest_web'].'</a></p>
		                            </div>  
                                </div>	                           
                                     <a href="individual.php?type=restaurant&id='.$row['rest_id'].'">
 	                                    <button type="submit" class=" w-100 bg-success text-white "  name="restaurant" >Open</button>
 	                                 </a>
                                </div>';}
        					       
				        ?>
		    	</div>

				<hr>

		    	<?php  echo '<h2 class="text-center  mb-5">All Concerts Are Displayed</h2>';?>

		        <div class="container row d-flex justify-content-around" >
						<?php  

					 		$res =$conn->query("SELECT * FROM concert");

					        while ($conc_row = $res->fetch_assoc()) {
					    
					        echo '
				
								<div class="col-lg-4 ombra m-2 mb-5">
 	                                <div class="text-center">
 	                                    <h3 class=" text-danger m-0">'.$conc_row['con_name'].'</h3>
 	
 	                                    <div>
 	                                    	<img src="'.$conc_row['con_pic'].'" class="w-100 imgs">
 	                                    </div>
 	                                        <div class="testo_media">
 	                                            <p class="p-2 mt-3">'.$conc_row['con_name'].'</p>
 	                                        </div>
 	                            <div class=" text-danger">
 	                                <p> When: '.$conc_row['con_date'].'</p>
 	                                <p> What Time: '.$conc_row['con_time'].'</p>
 	                                <p> How Much: '.$conc_row['con_price'].' €</p>
 	                            </div>  
 	                                </div>	                           
 	                                     <a href="individual.php?type=concert&id='.$conc_row['con_id'].'">
 	                                    <button type="submit" class=" w-100 bg-success text-white "  name="restaurant" >Open</button>
 	                                 	</a>
 	                                </div>';}
   
				        ?>
		    	</div>

		    	<hr>

		    	<?php  echo '<h2 class="text-center  mb-5">All the Activities Are Displayed</h2>';?>

		        <div class="container row d-flex justify-content-around" >
						<?php  

					 		$res =$conn->query("SELECT * FROM things_todo");

					        while ($row = $res->fetch_assoc()) {
					    
					        echo '
								<div class="col-lg-4 ombra m-2 mb-5">
 	                                <div class="text-center">
 	                                    <h3 class=" text-danger m-0">'.$row['todo_name'].'</h3>
 	
 	                                    <div>
 	                                    	<img src="'.$row['todo_pic'].'" class="w-100 imgs">
 	                                    </div>
 	                                        <div class="testo_media">
 	                                            <p class="p-2 mt-3">'.$row['todo_desc'].'</p>
 	                                        </div>
 	                            <div class="text-danger">
 	                                <p>Type: '.$row['todo_type'].'</p>
 	                                <p>Web: <a href="#">'.$row['todo_web'].'</a></p>
 	                              
 	                            </div>  
 	                                </div>	                           
 	                                     <a href="individual.php?type=todo&id='.$row['todo_id'].'">
 	                                    <button type="submit" class=" w-100 bg-success text-white "  name="restaurant" >Open</button>
 	                                 	</a>
 	                                </div>';}
   
				        ?>
		    	</div>

		</div>

</div>
</div>

<!-- search-box container--search-box container -->

<!-- api map -->
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
	    async defer></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
    async defer></script>
	<h2 class="text-dark text-center"></h2>
	<div id="map" class="container w-lg-50 " ></div>
  	<script src="script/maps_api.js"></script>






<?php require_once 'footer_component.php';?>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

		



</body>
</html>

<?php ob_end_flush(); ?>
