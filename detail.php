<?php
require_once "function/connect.php";
$postid = $_REQUEST['id'];
$sql="SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE id = '$postid' ";
$query = mysqli_query($con,$sql) or die(mysqli_error($con));
$showpost = mysqli_fetch_array($query);
$total = mysqli_num_rows($query);

$imagequery = mysqli_query($con,"SELECT * FROM `tb-postimage` WHERE idaddcoach = '$postid'")or die(mysqli_error($con));
$showimage = mysqli_fetch_array($imagequery);
$totalimage = mysqli_num_rows($imagequery);
$imagequery2 = mysqli_query($con,"SELECT * FROM `tb-postimage` WHERE idaddcoach = '$postid'")or die(mysqli_error($con));
$showimage2 = mysqli_fetch_array($imagequery2);
$totalimage2 = mysqli_num_rows($imagequery2);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "head.php"; ?>

</head>

<body>
<?php include "navbar.php"; ?>

    <div class="container">
        <div style="  box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);">
            <div class="card" style="margin-top:20px;">
                <div class="card-header">
                    ข้อมูลรายละเอียด
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <?php $i=0; do{ ?>
                                    <img data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active d-block w-25" src="img/<?php  echo $showimage['image']; ?>" alt="First slide">

                                   <?php $i++;}while($showimage = mysqli_fetch_assoc($imagequery)); ?>

                                      </ol>
                                <div class="carousel-inner">


                                <?php $i=0; do{ ?>
                                    <div class="carousel-item" id="imgid<?php echo $i; ?>">
                                        <img class="d-block w-100" src="img/<?php  echo $showimage2['image']; ?>"  height="500" style="object-fit: cover;" >
                                    </div>

                                   <?php $i++;}while($showimage2 = mysqli_fetch_assoc($imagequery2)); ?>


                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p>ชื่อผู้สอน : <?php  echo $showpost['m_username']; ?></p>
                            <p>กีฬาที่สอน : <?php  echo $showpost['namesport']; ?></p>
                            <p>ผลงาน : <?php  echo $showpost['detail']; ?></p>
                            <p>สถาณที่เปิดสอน : <?php  echo $showpost['location']; ?></p>
                            <p>เบอร์โทรศัพท์ : <?php  echo $showpost['telephone']; ?></p>
                            <p>อีเมล์ : <?php  echo $showpost['email']; ?></p>


                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted clearfix">
                    <p class="float-right">ชื่อผู้ประกาศ :<?php  echo $showpost['m_username']; ?></p>
  </div>
            </div>





            <?php include "footer.php"; ?>
        </div>
    </div>
</body>

</html>
<script>
$('#imgid0').addClass('active');
</script>
