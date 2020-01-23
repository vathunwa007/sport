<?php
header('Content-Type: application/json');
require_once "connect.php";
if($_POST['username'] != null && $_POST['password'] != null){
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$address =$_POST['address'];

$sucurity = 'pornhub.com';
$passsucurity = hash_hmac('sha256',$password,$sucurity);


$sql = "INSERT INTO tb_member (m_username, m_password, m_name, m_email, m_telephone, m_address)
		VALUES ('$username','$passsucurity','$name','$email','$telephone','$address')";
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