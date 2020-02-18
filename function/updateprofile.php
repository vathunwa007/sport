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

    $currentDir = getcwd();
    $uploadDirectory = "../img/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['imgInp']['name'];
    $fileSize = $_FILES['imgInp']['size'];
    $fileTmpName  = $_FILES['imgInp']['tmp_name'];
    $fileType = $_FILES['imgInp']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
if(isset($_POST['imgInp']) && $_POST['imgInp'] != ""){
	$imgprofile = $_POST['imgInp'];

	/*
	$name_file =  $_FILES['imgInp']['name'];
	$tmp_name =  $_FILES['imgInp']['tmp_name'];
	$locate_img ="../img";
	move_uploaded_file($tmp_name,$locate_img.$name_file);*/
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