
<?php
require_once 'db_connection.php';

if($_POST['canc']){

	echo 'ok canc';

	if($_POST['type'] == 'restaurants') {
			
		$id = $_POST['id_del'];

		echo $id;

		$sql = "DELETE FROM restaurants WHERE rest_id = {$id}";

	   if($conn->query($sql) == TRUE) {

			header('Location: ../home.php');
		}else{
			echo 'error' . mysqli_error($conn);}
	   
	}elseif($_POST['type'] == 'things_todo'){

		$id = $_POST['id_del'];

		echo $id;

		$sql = "DELETE FROM things_todo WHERE todo_id = {$id}";

	   if($conn->query($sql) == TRUE) {

			header('Location: ../home.php');
		}else{
			echo 'error' . mysqli_error($conn);}
	   
	}elseif($_POST['type'] == 'concert'){

		
		$id = $_POST['id_del'];

		echo $id;

		$sql = "DELETE FROM concert WHERE con_id = {$id}";

	
	   if($conn->query($sql) == TRUE) {

			header('Location: ../home.php');
		}else{
			echo 'error' . mysqli_error($conn);}
	   
	}else{
	echo "no post";}


}else{

	header('Location: ../home.php');
}

	$conn->close();
	
?> 










	