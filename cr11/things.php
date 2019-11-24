
<?php 
ob_start();
session_start();
require_once 'actions/db_connection.php';
require_once 'queries/query_login.php';
if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require_once 'head_component.php';

					
	$conc_query = 'SELECT * from concert left join location ON FK_con_location = location_id';		

	$todo_query = 'SELECT * from things_todo left join location ON FK_todo_location = location_id';
				
?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="script/ajax.js" type="text/javascript"></script>

<hr>

	

<div class="container w-100">

  


				<hr>

		    	<?php  echo '<h2 class="text-center  mb-5">Concerts</h2>';?>

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

		    	<?php  echo '<h2 class="text-center  mb-5">Activities </h2>';?>

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


<!-- search-box container--search-box container -->

<?php require_once 'footer_component.php';?>

<?php ob_end_flush(); ?>