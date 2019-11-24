<?php
require_once('../actions/db_connection.php');
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM restaurants 
  WHERE rest_name LIKE '%".$search."%'
 ";
}
else
{
  //$query = 'SELECT * from restaurants left join location ON FK_location = location_id';
  $query = 'SELECT * FROM restaurants';
          while ($row = $res->fetch_assoc()) {

  //$conc_query = 'SELECT * from concert left join location ON FK_con_location = location_id'&&   

 // $todo_query = 'SELECT * from things_todo left join location ON FK_todo_location = location_id';
}
$result =$conn->query($query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '<div id="default">
            <h2 class="text-center mb-5">All Restaurants Are Displayed</h2>
             <div class="container row d-flex justify-content-around" >';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '<div class="col-lg-4 ombra m-2 mb-5">
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
                                </div>';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>