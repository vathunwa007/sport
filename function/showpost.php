<?php
session_start();
header('Content-Type: application/json');
require_once "connect.php";
$id = $_GET['id'];
$sql = "SELECT * FROM tb_addcoach WHERE id = $id";
$query = mysqli_query($con,$sql)or die(mysqli_error($con));
$row_post = mysqli_fetch_array($query);
if($query){
    echo json_encode(array('status' => '1','id' => $row_post['id'],'namesport' => $row_post['namesport'],'detail' => $row_post['detail'],'works'=> $row_post['works'],'location'=> $row_post['location'],'amphur'=> $row_post['amphur'],'telephone'=> $row_post['telephone'],'email'=> $row_post['email'],'datetime'=> $row_post['datetime']));
}else{
    echo json_encode(array('status' => '0','message'=> 'ไม่สามารถติดต่อฐานข้อมูลได้'));
}
mysqli_close($con);

?>