<?php
require_once "../function/connect.php";
error_reporting(0);
$search = $_POST['search'];
$aria = array("คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");
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

<h2 class="">จัดการประกาศสอน</h2>
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
                                    <img data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active d-block w-25" src="../img/<?php  echo $showimage['image']; ?>" alt="First slide">

                                   <?php $i++;}while($showimage = mysqli_fetch_assoc($imagequery)); ?>

                                      </ol>
                                <div class="carousel-inner">


                                <?php $i=0; do{ ?>
                                    <div class="carousel-item" id="imgid<?php echo $i; ?>">
                                        <img class="d-block w-100" src="../img/<?php  echo $showimage2['image']; ?>"  height="400" style="object-fit: cover;" >
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
                <div class="card-footer text-muted clearfix" style="display: inline;">
                    <p class="float-left">ชื่อผู้ประกาศ :<?php  echo $showpost['m_username']; ?></p>
                    <div style="display: inline;" class="float-right">
                        <button class="btn btn-danger" onclick="deletee(<?= $postid ;?>);">ลบประกาศนี้</button>
                        <button class="btn btn-success" onclick="window.history.back();">ย้อนกลับ</button>
                    </div>
  </div>
            </div>


<!--------------------------------------------------------------------------------------------------->
<div class="modal fade mt-5" id="loadpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="showpost">

                </div>
            </div>
        </div>


    </div>
</div>
<!----------------------------------------------------------------------------------------------->
<script>

    function deletee(id) {
        swal({
                title: "คุณกำลังทำการลบผู้ประกาศสอนรายนี้?",
                text: "กรุณาตรวจสอบความถูกต้องก่อนกดปุ่มตกลง!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("ทำการลบเสร็จสมบูรณ์!", {
                        icon: "success",

                    });
                    location.replace("index.php?page=2&id=" + id);

                } else {
                    swal("ยกเลิกรายการ!");
                }
            });
    }

</script>