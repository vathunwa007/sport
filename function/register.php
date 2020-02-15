<?php
header('Content-Type: application/json');
require_once "connect.php";


$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];

$sucurity = 'pornhub.com';
$passsucurity = hash_hmac('sha256',$password,$sucurity);
if($username != null && $password != null){

$sql = "INSERT INTO `tb_member` (`m_id`, `m_username`, `m_password`, `m_name`, `m_email`, `m_telephone`, `m_address`, `m_level`) VALUES (NULL, '$username', '$passsucurity', '$name', '$email', '$telephone', '$address', '0')";
	$query = mysqli_query($con,$sql);
    if($query) {
		echo json_encode(array('status' => '1','message'=> 'Register add successfully'));
	}
	else
	{
		echo json_encode(array('status' => '0','message'=> 'Error insert Register!'));
	}
	mysqli_close($con);
}else{
	echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
}
?>