<?php
include 'connect.php';
$bin_status=$_GET['bin_status'];
$bin_available = 0;

if (($bin_status != null) && ($bin_status != null)) {
  
$query = " select COUNT(bin_id) as bin_available FROM tbl_bin where bin_status = $bin_status ";

//echo $query;
$result = mysqli_query($con,$query);


while ($row  = mysqli_fetch_assoc($result))
  {
    $bin_available = $row["bin_available"];
  }


echo ($result) ?
  json_encode(array("code" => 1, "result"=>$bin_available)) :
  //json_encode($array) :
  json_encode(array("code" => 0, "message"=>"Data not found !"));
  } else {
  echo json_encode(array("code" => 1, "result"=>""));
}

?>
