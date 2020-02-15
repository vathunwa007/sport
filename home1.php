<?php $navbar = array("", "active","","","");
error_reporting(0);
$searchamphur = $_POST['searchamphur'];
$searchsport = $_POST['searchsport'];
$sport = array("เลือกกีฬาทั้งหมด","การยิงธนู", "กรีฑา", "แบดมินตัน", "กีฬาเบสบอล", "บาสเกตบอล", "หาดวอลเลย์บอล", "มวย", "เรือแคนู / พื้นน้ำเรียบเรือคายัค", "เรือแคนู / เรือคายัคสลาลม", "BMX ขี่จักรยาน", "ขี่จักรยานเสือภูเขา", "จักรยานถนน", "ติดตามการปั่นจักรยาน", "การดำน้ำ", "นักขี่ม้า", "การเล่นฟันดาบ", "ฟุตบอล", "ยิมนาสติกสากล", "ยิมนาสติกเข้าจังหวะ", "แทรมโพลี", "แฮนด์บอล", "ฮอกกี้", "ยูโด", "ปัญจกรีฑาสมัยใหม่", "การโยกย้าย", "การแล่นเรือ", "การยิง", "ซอฟท์บอล", "ว่ายน้ำ", "Synchronized ว่ายน้ำ", "เทเบิลเทนนิส", "เทควันโดทำ", "เทนนิส", "ไตรกีฬา", "วอลเลย์บอล", "น้ำโปโล", "ยกน้ำหนัก", "มวยปล้ำ");
$aria = array("เลือกทั้งหมด","คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");
require_once "function/connect.php";
$sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id ";
if (isset($_POST['searchamphur']) or isset($_POST['searchsport']) ) {
    $sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE amphur = '$searchamphur' AND namesport = '$searchsport'";
} if(isset($_POST['searchamphur']) && $_POST['searchsport']== "เลือกกีฬาทั้งหมด"){
    $sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
    ON a.idmember = b.m_id WHERE amphur = '$searchamphur' ";
} if(isset($_POST['searchsport']) && $_POST['searchamphur']== "เลือกทั้งหมด"){
    $sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
    ON a.idmember = b.m_id WHERE namesport = '$searchsport' ";
} if($_POST['searchsport'] == "เลือกกีฬาทั้งหมด" && $_POST['searchamphur']== "เลือกทั้งหมด"){
    $sql = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
    ON a.idmember = b.m_id ";
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

    <style>
    .card-img-top{

        background-size: 100%;
        transition: 0.5s;
        background-position: center;
    }
    .card-img-top:hover{
        opacity: 78%;
        background-size: 110%;
        transition: 0.5s;
    }
    #postid{
        position: absolute;
        top:25%;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        text-align: center;
        display: none;
        color:white;
        border: 2px solid white;

    }

    .card-img-top:hover + #postid{

        display: block;

    }

    </style>
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
                    <p class="form-group">เลือกรูปแบบกีฬา</p>
                        <div class="form-group mx-sm-3 mb-2">
                            <select class="form-control" name="searchsport">
                                <?php if(isset($searchsport)){
                                echo "<option>$searchsport</option>";
                                } ?>
                                <?php foreach ($sport as $value) {
                                    echo "<option>$value</option>";
                                } ?>
                            </select>
                        <p class="form-group">เลือกเขตพื้นที่</p>
                        <div class="form-group mx-sm-3 mb-2">
                            <select class="form-control" name="searchamphur">
                            <?php if(isset($searchamphur)){
                                echo "<option>$searchamphur</option>";
                            }?>
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
<div id="postid"><h5><strong><?php echo $showpost['m_name']; ?></strong></h5></div>
  <div class="card-body">
    <p class="card-title"><strong> ชื่อผู้สอน :</strong><?php echo $showpost['m_name']; ?></p>
    <p class="card-text"><strong>ประเภทกีฬา :</strong><?php echo $showpost['namesport']; ?></p>
    <p class="card-text"><strong>เขตพื้นที่ :</strong><?php echo $showpost['amphur']; ?></p>
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