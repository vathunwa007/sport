<?php
session_start();
error_reporting(0);
require_once "connect.php";
$username = $_POST['username2'];
$password = $_POST['password2'];
$name = $_POST['name2'];
$email = $_POST['email2'];
$telephone = $_POST['telephone2'];
$address = $_POST['address2'];
$imgprofile = $_POST['imgInp'];
if(isset($_POST['imgInp']) && $_POST['imgInp'] != ""){
	$imgprofile = $_POST['imgInp'];
	$name_file =  $_FILES['imgInp']['name'];
	$tmp_name =  $_FILES['imgInp']['tmp_name'];
	$locate_img ="../img/";
	move_uploaded_file($tmp_name,$locate_img.$name_file);
	$sql = "UPDATE `tb_member` SET `m_username` = '$username', `m_name` = '$name', `m_email` = '$email', `m_telephone` = '$telephone', `m_address` = '$address', `imageprofile` = '$imgprofile' WHERE `m_id` = $_SESSION[id] ";

}else{
	$sql = "UPDATE `tb_member` SET `m_username` = '$username', `m_name` = '$name', `m_email` = '$email', `m_telephone` = '$telephone', `m_address` = '$address' WHERE `m_id` = $_SESSION[id] ";
}
	$query = mysqli_query($con,$sql);
    if($query) {
	echo "<script>window.location = document.referrer + '?&updateprofile';</script>";
	}
	else
	{
		echo "<script>window.location = document.referrer + '?&updateprofileerror';</script>";
	}
	mysqli_close($con);

?>