<?php
header('Content-Type: application/json');
require_once "connect.php";
$idkatoo = $_POST['idkatoo'];
$namekatoo = $_POST['namekatoo'];
$detailkatoo = $_POST['detailkatoo'];


$sql = "UPDATE `tb_katoo` SET `namekatoo` = '$namekatoo',`detailkatoo` = '$detailkatoo' WHERE `id` = $idkatoo";
	$query = mysqli_query($con,$sql);
    if($query) {
		echo json_encode(array('status' => '1','message'=> 'อัพเดทกระทู้สำเร็จ'));

    }else
	{
		echo json_encode(array('status' => '0','message'=> 'ไม่สามารถทำรายการได้!'));
	}
	mysqli_close($con);

?>