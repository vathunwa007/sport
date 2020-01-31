<?php
session_start();
header('Content-Type: application/json');
require_once "connect.php";
$id = $_GET['id'];
$sqlkatoo = "SELECT * FROM `tb_katoo` WHERE id = $id";
$sqlstatus = "UPDATE tb_katoo SET status =! status WHERE id = $id";
$querystatus = mysqli_query($con,$sqlstatus)or die(mysqli_error($con));
$querykatoo = mysqli_query($con,$sqlkatoo)or die(mysqli_error($con));

$checkstatus = mysqli_fetch_array($querykatoo);



if($querystatus){
    if($checkstatus['status'] != false){
        echo json_encode(array('status' => '1','message' => "คุณได้ปรับกระทู้เป็นสาธารณะ"));

    }else{
        echo json_encode(array('status' => '1','message' => "คุณได้ปิดการเผยแพร่กระทู้นี้แล้ว"));

    }
}else{
    echo json_encode(array('status' => '0','message'=> 'ไม่สามารถติดต่อฐานข้อมูลได้'));
}
mysqli_close($con);

?>