
<?php
session_start();
//header('Content-Type: application/json');
require_once "connect.php";
$name = $_POST["name"];
$sport = $_POST["sport"];
$work = $_POST["work"];
$address = $_POST["address"];
$location = $_POST["location"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$filename = $_FILES["fileToUpload"]["name"][0];
if($check !== false) {
    $sql ="INSERT INTO `tb_addcoach` (`idmember`, `namesport`, `detail`, `location`, `amphur`,`telephone`,`email`, `image`,`datetime`) VALUES ('$_SESSION[id]', '$sport', '$work', '$address', '$location','$telephone','$email', '$filename',current_timestamp())";
    $result = mysqli_query($con,$sql)or die(mysqli_error($con));
    $lastid =mysqli_insert_id($con);

if ($result){
    echo "<script>
    window.location.replace('../home1.php?success=ok');
    </script>";
   // header("Location: ");


}else {
  echo ("เกิดข้อผิดพลาด". mysqli_error($con));
}
}
?>
<?php
for($i=0;$i<count($_FILES["fileToUpload"]["name"]);$i++)
{

	if($_FILES["fileToUpload"]["name"][$i] != "")
	{
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i],"../img/".$_FILES["fileToUpload"]["name"][$i]))
		{
            $image_name = $_FILES["fileToUpload"]["name"][$i];

            mysqli_query($con,"INSERT INTO `tb-postimage` (`idaddcoach`, `image`, `datetime`) VALUES ('$lastid','$image_name', current_timestamp())")or die(mysqli_error($con));

		}
	}
}

?>