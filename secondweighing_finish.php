<?php
include 'connect.php';

    $second_weigh_temp=$_POST['second_weigh_temp'];
    $second_weigh_plant=$_POST['second_weigh_plant'];
    $second_weigh_material=$_POST['second_weigh_material'];
    $second_weigh_vehicle=$_POST['second_weigh_vehicle'];
    

$query =" UPDATE tbl_second_weigh ";
$query .= " SET second_weigh_status = 2 ";
$query.=" WHERE second_weigh_temp = '$second_weigh_temp' ";
$exeQuery = mysqli_query($con, $query) ;

//echo $query."<br />";
	 if($exeQuery){
     //set bin_status = 3 for same $second_weigh_temp
     $query = "SELECT second_weigh_d_bin FROM tbl_second_weigh_detail
              where second_weigh_d_temp='$second_weigh_temp'";
     $result = mysqli_query($con,$query);
     //echo $query."<br />";
         while ($row  = mysqli_fetch_assoc($result))
           {
             $second_weigh_d_bin = $row["second_weigh_d_bin"];
             $query1="UPDATE tbl_bin SET bin_status=3 WHERE bin_id=$second_weigh_d_bin";
             $exeQuery1 = mysqli_query($con, $query1) ;
           }

	     echo (json_encode(array('code' =>1, 'message' => 'Successfully saving')));
   } else {
     echo(json_encode(array('code' =>0, 'message' => 'Error saving')));
   }


 ?>
