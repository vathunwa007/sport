<?php
session_start();
header('Content-Type: application/json');
require_once "connect.php";
$id = $_GET['id'];
$sql = "SELECT * FROM tb_member WHERE m_id = $id";
$query = mysqli_query($con,$sql)or die(mysqli_error($con));
$row_member = mysqli_fetch_array($query);
if($query){
    echo json_encode(array('status' => '1','id' =>$row_member['m_id'],'username' => $row_member['m_username'],'password'=> $row_member['m_password'],'name' => $row_member['m_name'],'email' => $row_member['m_email'],'telephone' => $row_member['m_telephone'],'address' => $row_member['m_address'],'level' => $row_member['m_level']));
}else{
    echo json_encode(array('status' => '0','message'=> 'ไม่สามารถติดต่อฐานข้อมูลได้'));
}
mysqli_close($con);

?>