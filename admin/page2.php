<?php
require_once "../function/connect.php";
$sportshow = array("การยิงธนู", "กรีฑา", "แบดมินตัน", "กีฬาเบสบอล", "บาสเกตบอล", "หาดวอลเลย์บอล", "มวย", "เรือแคนู / พื้นน้ำเรียบเรือคายัค", "เรือแคนู / เรือคายัคสลาลม", "BMX ขี่จักรยาน", "ขี่จักรยานเสือภูเขา", "จักรยานถนน", "ติดตามการปั่นจักรยาน", "การดำน้ำ", "นักขี่ม้า", "การเล่นฟันดาบ", "ฟุตบอล", "ยิมนาสติกสากล", "ยิมนาสติกเข้าจังหวะ", "แทรมโพลี", "แฮนด์บอล", "ฮอกกี้", "ยูโด", "ปัญจกรีฑาสมัยใหม่", "การโยกย้าย", "การแล่นเรือ", "การยิง", "ซอฟท์บอล", "ว่ายน้ำ", "Synchronized ว่ายน้ำ", "เทเบิลเทนนิส", "เทควันโดทำ", "เทนนิส", "ไตรกีฬา", "วอลเลย์บอล", "น้ำโปโล", "ยกน้ำหนัก", "มวยปล้ำ");
$ariashow = array("คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");

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
<a href="#" onclick="deletee(<?= $showpost['id']; ?>);"><i class="fas fa-times-circle text-danger"style="position:absolute; font-size:1.5rem;"></i></a>

<img class="card-img-top" src="../img/<?php echo $showpost['image']; ?>" alt="Card image cap"height="300">

  <div class="card-body">
    <h5 class="card-title">ชื่อผู้สอน :<?php echo $showpost['m_name']; ?></h5>
    <p class="card-text">ประเภทกีฬา :<?php echo $showpost['namesport']; ?></p>
    <p class="card-text">เขตพื้นที่ :<?php echo $showpost['amphur']; ?></p>
    <a href="index.php?page=showpost&id=<?php echo $showpost['id']; ?>" class="btn btn-info btn-block"><i class="fas fa-comment text-warning"></i>ดูรายละเอียดผู้สอน</a>
    <a data-toggle="modal" data-target="#editpost" onclick="showpost(<?= $showpost['id']; ?>,'<?php echo $showpost['m_name']; ?>');" class="btn btn-warning btn-block"><i class="fas fa-edit text-light"></i>แก้ไขรายละเอียดผู้สอน</a>

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

<!--------------------------------------------------------------------------------------------------->
<!-- Modaleditpost -->
<div class="modal fade mt-5" id="editpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">แก้ไขรายละเอียดการประกาศสอนของคุณ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" name="updatepost" id="updatepost" method="POST">
                    <input type="text" name="idpost" id="idpost" hidden>
                    <div class="form-group">
                                <label for="exampleFormControlInput1">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="กรุณาใส่ชื่อ-นามสกุล" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">กีฬาที่สอน</label>
                                <select class="form-control" name="sport" id="sport">
                                    <option></option>
                                    <?php foreach ($sportshow as $value) {
                                        echo "<option>$value</option>"; ?>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">รายละเอียดการสอน</label>
                                <textarea class="form-control" name="detail" id="detail" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ผลงานที่ได้รับ</label>
                                <textarea class="form-control" name="works" id="works" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">สถาณที่เปิดสอน</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="กรุณาระบุที่อยู่สถาณที่" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">เขตพื้นที่</label>
                                <select class="form-control" name="location" id="location">
                                    <option></option>
                                    <?php foreach ($ariashow as $value) {
                                        echo "<option>$value</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">เบอร์โทรศัพท์ติดต่อ</label>
                                <input type="telephone" class="form-control" name="telephone" id="telephone" placeholder="กรุณาใส่หมายเลขเบอร์โทรศัพท์" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">อีเมล์</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="กรุณาใส่อีเมลของท่าน" required>
                            </div>
                            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btneditpost" class="btn btn-info">แก้ไขประกาศ</button>

                    </div>
            </div>

            </form>
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
function showpost(id,name) {
        $.ajax({
            type: "GET",
            url: "../function/showpost.php?id=" + id,
            success: function(data) {
                if (data.status == 1) // Success
                {
                    $('#idpost').val(data.id);
                    $('#name').val(name);
                    $('#sport').val(data.namesport);
                    $('#detail').val(data.detail);
                    $('#works').val(data.works);
                    $('#address').val(data.location);
                    $('#location').val(data.amphur);
                    $('#telephone').val(data.telephone);
                    $('#email').val(data.email);

                } else // Err
                {
                    alert("notshow");

                }
            }
        });

    }
     //---------------------------------------------------------------------------------
     $("#btneditpost").click(function() {
        $.ajax({
            type: "POST",
            url: "../function/updatepost.php",
            data: $("#updatepost").serialize(),
            success: function(result) {
                if (result.status == 1) // Success
                {
                    alert(result.message);
                    $(".close").click();
                } else // Err
                {
                    confirm(result.message);

                }
            }
        });

    });
    //--------------------------------------------------------------------------------------
</script>
