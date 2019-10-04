<?php
include 'connect.php';
$temp_id=$_GET['temp_id'];

$query = " select *
          from tbl_second_weigh_detail
          inner join tbl_bin on tbl_second_weigh_detail.second_weigh_d_bin = tbl_bin.bin_id
          inner join tbl_first_weigh on tbl_first_weigh.first_weigh_id = tbl_second_weigh_detail.second_weigh_d_first
          inner join tbl_material on tbl_first_weigh.first_weigh_material = tbl_material.material_id
          where second_weigh_d_act = 1 and bin_status = 2 ";
//echo $query;
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
