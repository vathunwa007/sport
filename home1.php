<?php $navbar = array("", "active","","","");
error_reporting(0);
$search = $_POST['search'];
$aria = array("คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");
require_once "function/connect.php";
$sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id ";
if (isset($_POST['search'])) {
    $sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE amphur = '$search' ";
}
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
$showpost = mysqli_fetch_array($query);
$total = mysqli_num_rows($query);

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
        <div style="  box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);margin-bottom:25px;">
            <div class="card rounded" style="margin-top:20px;">
                <div class="card-header">
                    <h5 style="text-align:center;">ค้นหาประกาศสอนกีฬา</h5>
                </div>
                <div class="clearfix">
                    <?php if (isset($_SESSION['id']) != null) { ?> <button onclick="window.location.href ='createpost.php';" class="btn btn-danger">ลงประกาศสอน<img src="https://img.icons8.com/bubbles/30/000000/commercial.png"></button> <?php } ?>
                    <form class="form-inline float-right" action="home1.php" method="POST">
                        <p class="form-group">เลือกเขตพื้นที่</p>
                        <div class="form-group mx-sm-3 mb-2">
                            <select class="form-control" name="search">
                                <option>เลือกทั้งหมด</option>
                                <?php foreach ($aria as $value) {
                                    echo "<option>$value</option>";
                                } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">ค้นหา<img src="https://img.icons8.com/plasticine/30/000000/search-more.png"></button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 style="text-align:center;">ประกาศสอนกีฬา</h5>
                </div>
                <div class="card-body">
                <div class="row">
            <?php if ($total > 0) {
                do { ?>

<div class="card" style="width: 18rem;">
<img class="card-img-top" src="./img/<?php echo $showpost['image']; ?>" alt="Card image cap"height="300">

  <div class="card-body">
    <h5 class="card-title">ชื่อผู้สอน :<?php echo $showpost['m_username']; ?></h5>
    <p class="card-text">ประเภทกีฬา :<?php echo $showpost['namesport']; ?></p>
    <p class="card-text">เขตพื้นที่ :<?php echo $showpost['amphur']; ?></p>
    <a href="detail.php?id=<?php echo $showpost['id']; ?>" class="btn btn-info btn-block"><i class="fas fa-comment text-light"></i>ดูรายละเอียดผู้สอน</button></a>

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
        </div>




    </div>
    </div>


    <?php include "footer.php"; ?>
</body>

</html>
<?php
if (isset($_REQUEST['success'])) {
    echo '<script>swal({
       title: "ทำการสร้างประกาศรับสอนสำเร็จ!",
       text: "ทำรายการสำเร็จกรุณากดปุ่มตกลง!",
       icon: "success",
     }); </script>';
}
?>
<script>

</script>