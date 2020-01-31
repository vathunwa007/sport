<?php
session_start();
header('Content-Type: application/json');
require_once "connect.php";
$id = $_GET['id'];
$sql = "SELECT * FROM tb_katoo WHERE id = $id";
$query = mysqli_query($con,$sql)or die(mysqli_error($con));
$row_katoo = mysqli_fetch_array($query);
if($query){
    echo json_encode(array('status' => '1','id' => $row_katoo['id'],'namekatoo' => $row_katoo['namekatoo'],'detailkatoo'=> $row_katoo['detailkatoo']));
}else{
    echo json_encode(array('status' => '0','message'=> 'ไม่สามารถติดต่อฐานข้อมูลได้'));
}
mysqli_close($con);

?>