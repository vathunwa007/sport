<?php
session_start();
header('Content-Type: application/json');
require_once "connect.php";
$titlekatoo = $_POST["titlekatoo"];
$detailkatoo = $_POST["detailkatoo"];
$sql ="INSERT INTO tb_katoo (`idmember`, `namekatoo`, `detailkatoo`, `datetime`) VALUES ('$_SESSION[id]','$titlekatoo','$detailkatoo',current_timestamp())";
$query = mysqli_query($con,$sql)or die(mysqli_error($con));
$lastid =mysqli_insert_id($con);
if($query){
    echo json_encode(array('id' => $lastid,'status' => '1','message'=> 'ทำการสร้างกระทู้สำเร็จกรุณากดตกลงเพื่อไปยังกระทู้ของท่าน'));
}else{
    echo json_encode(array('status' => '0','message'=> 'ไม่สามารถทำการตั้งกระทู้ได้หรือเกิดข้อผิดพลาดกุณาเช็คข้อมูลของท่านหรือติดต่อแอดมินระบบ'));
}
mysqli_close($con);

?>