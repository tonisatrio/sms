<?php
include 'connect.php';

$first_weigh_id=$_GET['first_weigh_id'];
$first_weigh_bin=$_GET['first_weigh_bin'];

$query =" UPDATE tbl_first_weigh ";
$query .= " SET first_weigh_act = 0 ";
$query .= " WHERE first_weigh_id = $first_weigh_id ";
$exeQuery = mysqli_query($con, $query) ;

//echo $query."<br />";
	 if($exeQuery){
     //set bin_status = 3 for same $second_weigh_temp

       $query1="UPDATE tbl_bin SET bin_status=0 WHERE bin_id = $first_weigh_bin";
       $exeQuery1 = mysqli_query($con, $query1) ;

	     echo (json_encode(array('code' =>1, 'message' => 'Successfully saving')));
   } else {
     echo(json_encode(array('code' =>0, 'message' => 'Error saving')));
   }


 ?>
