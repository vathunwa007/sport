<?php
header('Content-Type: application/json');
require_once "connect.php";
$idpost = $_POST['idpost'];
$sport = $_POST['sport'];
$detail = $_POST['detail'];
$works = $_POST['works'];
$address = $_POST['address'];
$location = $_POST['location'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];



$sql = "UPDATE `tb_addcoach` SET `namesport` = '$sport', `detail` = '$detail', `works` = '$works', `location` = '$address', `amphur` = '$location', `telephone` = '$telephone', `email` = '$email' WHERE `id` = $idpost";
	$query = mysqli_query($con,$sql);
    if($query) {
		echo json_encode(array('status' => '1','message'=> 'อัพเดทประกาศสำเร็จ'));

    }else
	{
		echo json_encode(array('status' => '0','message'=> 'ไม่สามารถทำรายการได้!'));
	}
	mysqli_close($con);

?>