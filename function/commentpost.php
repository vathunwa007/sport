<?php
session_start();
header('Content-Type: application/json');
require_once "connect.php";
$idpost = $_POST['idpost'];
$comment = $_POST["comment"];
$sql ="INSERT INTO tb_commentaddcoach (`idaddcoach`, `idmember`, `comment`, `datetime`) VALUES ($idpost,'$_SESSION[id]','$comment',current_timestamp())";
$query = mysqli_query($con,$sql)or die(mysqli_error($con));
//$lastid =mysqli_insert_id($con);
if($query){
    echo json_encode(array('status' => '1','message'=> 'ทำการตอบกระทู้สำเร็จ'));
}else{
    echo json_encode(array('status' => '0','message'=> 'ไม่สามารถทำการตั้งกระทู้ได้หรือเกิดข้อผิดพลาดกุณาเช็คข้อมูลของท่านหรือติดต่อแอดมินระบบ'));
}
mysqli_close($con);

?>