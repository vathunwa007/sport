<?php
header('Content-Type: application/json');
require_once "connect.php";

$sql = "SELECT * FROM `tb_addcoach`";
    $query = mysqli_query($con,$sql);
    $total = mysqli_num_rows($query);
    if($query) {
		echo json_encode(array('status' => '1','message'=> $total));
	}
	else
	{
		echo json_encode(array('status' => '0','message'=> 'Error total!'));
	}
	mysqli_close($con);
?>