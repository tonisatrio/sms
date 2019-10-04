<?php
include 'connect.php';


$query = " SELECT * FROM tbl_bin where bin_act = 1 and bin_status = 0 ";

$result = mysqli_query($con,$query);

$array = array();

while ($row  = mysqli_fetch_assoc($result))
{
	$array[] = $row;
}


echo ($result) ?
//json_encode(array("code" => 1, "result"=>$array)) :
json_encode($array) :
json_encode(array("code" => 0, "message"=>"Data not found !"));


?>
