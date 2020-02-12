<?php
header('Content-Type: application/json');
require_once "connect.php";

$loginusername = mysqli_real_escape_string($con,$_POST['username']);
$loginpassword = mysqli_real_escape_string($con,$_POST['password']);

//checkpassword hash ---------------------------------
$sucurity = 'pornhub.com';
$passsucurity = hash_hmac('sha256',$loginpassword,$sucurity);


$sql = "SELECT * FROM tb_member WHERE m_username=? AND m_password=?";
$stmt = mysqli_prepare($con,$sql);

mysqli_stmt_bind_param($stmt,"ss",$loginusername,$passsucurity);
mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if($result ->num_rows == 1){
 session_start();
 $row_user = mysqli_fetch_array($result,MYSQLI_ASSOC);
 $_SESSION['id'] = $row_user['m_id'];
 $_SESSION['username'] = $row_user['m_username'];
 $_SESSION['fullname'] = $row_user['m_name'];
 $_SESSION['email'] = $row_user['m_email'];
 $_SESSION['telephone'] = $row_user['m_telephone'];
 $_SESSION['address'] = $row_user['m_address'];
 $_SESSION['level'] = $row_user['m_level'];

 mysqli_close($con);

 if($_SESSION['level'] == 0){
   header( "location: ../index.php?success" );
   exit(0);
    //echo json_encode(array('status' => 1,'message'=> 'login add successfully'));

 }else{
      header( "location: ../admin/index.php?page=1&success" );
      exit(0);
    //echo json_encode(array('status' => 2,'message'=> 'loginadmin add successfully'));


 }
}else{
   header( "location: ../index.php" );
   exit(0);
    //echo json_encode(array('status' => '0','message'=> 'Error login!'));
}

?>