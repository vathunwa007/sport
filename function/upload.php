<?php
error_reporting(0);

include('function/connect.php');

define ("MAX_SIZE","2000"); // 2MB MAX file size
function getExtension($str)
{
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
// ตรวจสอบนามสกุลของภาพที่อัพโหลด
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$uploaddir = "../img/"; //โฟลเดอร์ที่เก็บภาพ อย่าลืมสร้างนะครับ!!
foreach ($_FILES['photos']['name'] as $name => $value)
{
$filename = stripslashes($_FILES['photos']['name'][$name]);
$size=filesize($_FILES['photos']['tmp_name'][$name]);
//Convert extension into a lower case format
$ext = getExtension($filename);
$ext = strtolower($ext);
//File extension check
if(in_array($ext,$valid_formats))
{
//ขนาดของภาพหน้ามเกิน 1mb
if ($size < (MAX_SIZE*1024))
{
$image_name=time().$filename;
echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
$newname=$uploaddir.$image_name;
//อัพโหลดไฟล์ไปในโฟลเดอร์ที่กำหนด
if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname))
{

//เพิ่มเข้าฐานข้อมูล
mysqli_query($con,"INSERT INTO `tb-postimage` (`id`, `idaddcoach`, `image`, `datetime`) VALUES ('1', '10', '$image_name', current_timestamp())");

}
else
{
echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>'; }
}

else
{
echo '<span class="imgList">You have exceeded the size limit!</span>';
}

}

else
{
echo '<span class="imgList">Unknown extension!</span>';
}

} //foreach end

}
?>