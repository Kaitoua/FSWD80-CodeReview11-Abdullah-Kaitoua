<?php if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
	
	<link rel="stylesheet" type="text/css" href="style/style.css">
		<!-- Bootstrap -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		
</head>
<body>


	<nav class="mynav nav navbar-expand-lg text-dark">
  <a class="navbar-brand text-dark"  href="home.php">Hi <?php echo $userRow['userName' ]; ?></a>
  <ul class="justify-content-center navbar-nav collapse navbar-collapse" id="nav-bar">
    <li class="nav-item active">
      <a class="nav-link text-dark"  href="home.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <?php
    if(isset($_SESSION["admin"])){

            echo '<li class="nav-item">
      <a class="nav-link text-dark" href="create.php">Create</a>
    </li>';}

          ?>

      <li class="nav-item">
      <a class="nav-link text-dark" href="restaurant.php">Restaurant</a>
    </li>
      <li class="nav-item">
      <a class="nav-link text-dark" href="things.php">Events</a>
    </li>
      <li class="nav-item">
      <a class="nav-link text-dark" href="map.php">Map</a>
    </li>

    	           <li class="nav-item"></li>
			<li class="nav-item">         
           <a  class="nav-link text-dark" href="logout.php?logout">Sign Out</a></li>
 


 

  </ul>
</nav>


	
	
	
	
	<div id="hero">
		
	</div>
	<div id="container" class="container ml-6">
	<!-- 	<H1 class="text-center text-dark mb-2"> There you go!</H1> -->

