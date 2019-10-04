<?php
include 'connect.php';
//$plant_id=$_GET['plant_id'];

$query = " select first_weigh_id,first_weigh_bin,first_weigh_bin_tare,first_weigh_plant,
          first_weigh_material,first_weigh_serial_no,first_weigh_capture,
          first_weigh_net,first_weigh_status,bin_id,bin_no,material_SAP_code,bin_status
          from tbl_first_weigh
          inner join tbl_bin on tbl_first_weigh.first_weigh_bin = tbl_bin.bin_id
          inner join tbl_material on tbl_first_weigh.first_weigh_material = tbl_material.material_id
          where first_weigh_status = 1 and first_weigh_act = 1 and bin_status = 1 ";

$result = mysqli_query($con,$query);

$array = array();

while ($row  = mysqli_fetch_assoc($result))
{
	$array[] = $row;
}


echo ($result) ?
json_encode(array("code" => 1, "result"=>$array)) :
//json_encode($array) :
json_encode(array("code" => 0, "message"=>"Data not found !"));


?>
