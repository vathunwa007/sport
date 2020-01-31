<?php
require_once "../function/connect.php";
error_reporting(0);
$search = $_POST['search'];
$aria = array("คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");
$sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id ";
if (isset($_POST['search'])) {
    $sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE amphur = '$search' ";
}
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
$showpost = mysqli_fetch_array($query);
$total = mysqli_num_rows($query);

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sqldelete ="DELETE FROM `tb_addcoach` WHERE `tb_addcoach`.`id`=$id";
  mysqli_query($con,$sqldelete);
  echo '<script>location.replace("index.php?page=2")</script>';
}

?>

  <h2 class="">จัดการประกาศสอน</h2>
<div class="card">

    <div class="card-body">

    <div class="row">
            <?php if ($total > 0) {
                do { ?>
<div class="card" style="width: 18rem;">
<a href="#" onclick="deletee(<?= $showpost['id']; ?>);"><i class="fas fa-times-circle text-success"style="position:absolute; font-size:1.5rem;"></i></a>

<img class="card-img-top" src="../img/<?php echo $showpost['image']; ?>" alt="Card image cap"height="300">

  <div class="card-body">
    <h5 class="card-title">ชื่อผู้สอน :<?php echo $showpost['m_username']; ?></h5>
    <p class="card-text">ประเภทกีฬา :<?php echo $showpost['namesport']; ?></p>
    <p class="card-text">เขตพื้นที่ :<?php echo $showpost['amphur']; ?></p>
    <a href="detail.php?id=<?php echo $showpost['id']; ?>" class="btn btn-info btn-block"><i class="fas fa-comment text-warning"></i>ดูรายละเอียดผู้สอน</button></a>

  </div>
  <footer class="blockquote-footer" style="font-size: 14px;">อัพเดทล่าสุด <?php echo $showpost['datetime']; ?></footer>

</div>

            <?php } while ($showpost = mysqli_fetch_assoc($query));
            } else {
                echo "<h4 style='color:red;margin:auto;padding-top:25px;'>ไม่มีข้อมูลที่สามารถแสดงได้ณตอนนี้</h4>";
            } ?>
        </div>

    </div>
</div>

<!----------------------------------------------------------------------------------------------->
<script>
function deletee(id){
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
      location.replace("index.php?page=2&id="+id);

    } else {
      swal("ยกเลิกรายการ!");
    }
  });
}
</script>
