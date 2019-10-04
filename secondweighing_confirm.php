<?php
include 'connect.php';

    $second_weigh_d_bin=$_POST['second_weigh_d_bin'];
    $second_weigh_d_temp=$_POST['second_weigh_d_temp'];
    $second_weigh_d_bin_tare=$_POST['second_weigh_d_bin_tare'];
    $second_weigh_d_first=$_POST['second_weigh_d_first'];
    $second_weigh_d_time=$_POST['second_weigh_d_time'];
    $second_weigh_d_date=$_POST['second_weigh_d_date'];
    $second_weigh_d_capture=$_POST['second_weigh_d_capture'];
    $second_weigh_d_net=$_POST['second_weigh_d_net'];
    $second_weigh_d_cdate=$_POST['second_weigh_d_cdate'];

    $second_weigh_vehicle=$_POST['second_weigh_vehicle'];
    $second_weigh_serial_no=$_POST['second_weigh_serial_no'];
    $second_weigh_plant=$_POST['second_weigh_plant'];
    $second_weigh_material=$_POST['second_weigh_material'];

    //cek apakah second_weigh_temp sudah ada atau belum
    //apabila belum insert, apabila tidak, di skip

    $second_weigh_id = 0;
    $query = "SELECT second_weigh_id FROM tbl_second_weigh where second_weigh_temp='$second_weigh_d_temp'";
      $result = mysqli_query($con,$query);

        while ($row  = mysqli_fetch_assoc($result))
          {
    	         $second_weigh_id = $row["second_weigh_id"];
          }
	//echo "query select = ".$query."<br>";
	//echo "second_weigh_id = ".$second_weigh_id."<br>";

    if ($second_weigh_id == 0) {
      //save to tbl_second_weigh first
      $query ="INSERT INTO tbl_second_weigh";
      $query .= "(second_weigh_temp, second_weigh_vehicle, second_weigh_plant, second_weigh_material,
                  second_weigh_serial_no,
                  second_weigh_cdate,second_weigh_status)";
      $query.=" VALUES ";
      $query .= "('$second_weigh_d_temp',$second_weigh_vehicle,$second_weigh_plant,$second_weigh_material,
                '$second_weigh_serial_no',
                '$second_weigh_d_cdate',1)";
      $exeQuery = mysqli_query($con, $query) ;

    }

	//echo "query insert 1 = ".$query."<br>";
	//echo "second_weigh_id = ".$second_weigh_id."<br>";




$query ="INSERT INTO tbl_second_weigh_detail";
$query .= "(second_weigh_d_bin, second_weigh_d_bin_tare, second_weigh_d_temp,
            second_weigh_d_first,second_weigh_d_time,second_weigh_d_date,
            second_weigh_d_capture,second_weigh_d_net,second_weigh_d_cdate,second_weigh_d_status)";
$query.=" VALUES ";
$query .= "($second_weigh_d_bin,$second_weigh_d_bin_tare,'$second_weigh_d_temp',
          $second_weigh_d_first,'$second_weigh_d_time','$second_weigh_d_date',
          $second_weigh_d_capture,$second_weigh_d_net,'$second_weigh_d_cdate',1)";
$exeQuery = mysqli_query($con, $query) ;

//echo $query."<br />";
	 if($exeQuery){
     $query1="UPDATE tbl_bin SET bin_status=2 WHERE bin_id=$second_weigh_d_bin";

     $exeQuery1 = mysqli_query($con, $query1) ;

	     echo (json_encode(array('code' =>1, 'message' => 'Successfully saving')));

   } else {
     echo(json_encode(array('code' =>0, 'message' => 'Error saving')));
   }




 ?>
