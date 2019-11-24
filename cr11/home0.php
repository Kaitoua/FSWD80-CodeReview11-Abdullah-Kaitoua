<?php
ob_start();
session_start();
require_once 'actions/db_connection.php';
if(!isset($_SESSION["admin"])){
	header("Location: login.php");
}
if(isset($_SESSION["user"])){
	header("Location: homepage.php");
}


require_once 'queries/query_login.php';
require_once 'head_component.php';




				
?>
 
 

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>




  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="restaurant.php">
               Restaurants
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="things.php">              
              Things to do
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Concerts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Map
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">
              <span data-feather="layers"></span>
              Create
            </a>
          </li>
        </ul>

        
      </div>
    </nav>
<main class="col-md-10">

	 <div class="container">
   <br />
   <h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>



</main>






<?php require_once 'footer_component.php';?>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

		


</body>
</html>

<script src="script/ajax.js" type="text/javascript"></script>
<?php ob_end_flush(); ?>
