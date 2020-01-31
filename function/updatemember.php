<?php
header('Content-Type: application/json');
require_once "connect.php";
if($_POST['username'] != null && $_POST['password'] != null){
$idmember = $_POST['inputid'];
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$level = $_POST['level'];
$sucurity = 'pornhub.com';
$passsucurity = hash_hmac('sha256',$password,$sucurity);


$sql = "UPDATE `tb_member` SET `m_username` = '$username',`m_password` = '$password', `m_name` = '$name', `m_email` = '$email', `m_telephone` = '$telephone',`m_address` = '$address',`m_level` = '$level' WHERE `m_id` = $idmember";
	$query = mysqli_query($con,$sql);
    if($query) {
		echo json_encode(array('status' => '1','message'=> 'อัพเดทข้อมูลสำเร็จ'));
	}
	else
	{
		echo json_encode(array('status' => '0','message'=> 'ไม่สามารถทำรายการได้!'));
	}
	mysqli_close($con);
}else{
	echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
}
?>