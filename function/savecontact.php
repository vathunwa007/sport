<?php
header('Content-Type: application/json');
require_once "connect.php";
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$text = $_POST['message'];

$sql = "INSERT INTO `tb_contact` (`id`, `name`, `email`, `telephone`, `text`, `datetime`) VALUES (NULL, '$name', '$email', '$telephone', '$text', current_timestamp());";
$savequery = mysqli_query($con,$sql);
if($savequery == true){
    echo json_encode(array('status' => 1,'message'=> 'ทำการส่งข้อความติดต่อไปเรียบร้อยแล้ว'));

}else{
    echo json_encode(array('status' => 0,'message'=> 'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง'));

}
mysqli_close($con);

?>