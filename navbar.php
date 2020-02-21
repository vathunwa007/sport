
<?php
$sportshow = array("การยิงธนู", "กรีฑา", "แบดมินตัน", "กีฬาเบสบอล", "บาสเกตบอล", "หาดวอลเลย์บอล", "มวย", "เรือแคนู / พื้นน้ำเรียบเรือคายัค", "เรือแคนู / เรือคายัคสลาลม", "BMX ขี่จักรยาน", "ขี่จักรยานเสือภูเขา", "จักรยานถนน", "ติดตามการปั่นจักรยาน", "การดำน้ำ", "นักขี่ม้า", "การเล่นฟันดาบ", "ฟุตบอล", "ยิมนาสติกสากล", "ยิมนาสติกเข้าจังหวะ", "แทรมโพลี", "แฮนด์บอล", "ฮอกกี้", "ยูโด", "ปัญจกรีฑาสมัยใหม่", "การโยกย้าย", "การแล่นเรือ", "การยิง", "ซอฟท์บอล", "ว่ายน้ำ", "Synchronized ว่ายน้ำ", "เทเบิลเทนนิส", "เทควันโดทำ", "เทนนิส", "ไตรกีฬา", "วอลเลย์บอล", "น้ำโปโล", "ยกน้ำหนัก", "มวยปล้ำ");
$ariashow = array("คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");

if (isset($_REQUEST['updateprofile'])) {
    echo "<script> swal({
        title: 'บันทึกการแก้ไขเรียบร้อย!',
        text: 'ทำการบันทึกสำเร็จ',
        icon: 'success',
    });</script>";
} else if (isset($_REQUEST['updateprofileeror'])) {
    echo "<script> swal({
        title: 'ไม่สามารถบันทึกการแก้ไขได้!',
        text: 'เกิดข้อผิดพลาด',
        icon: 'success',
    });</script>";
}

//-----------delete-------
if (isset($_GET['deletekatoo'])) {
    include "function/connect.php";
    $deletekatoo = $_GET['deletekatoo'];
    $sqldelete = "DELETE FROM `tb_katoo` WHERE `tb_katoo`.`id`=$deletekatoo";
    mysqli_query($con, $sqldelete);
    echo '<script>alert("ลบกระทู้สำเร็จ");</script>';
    mysqli_close($con);
}
if (isset($_GET['deletepost'])) {
    include "function/connect.php";

    $deletepost = $_GET['deletepost'];
    $sqldelete = "DELETE FROM `tb_addcoach` WHERE `tb_addcoach`.`id`=$deletepost";
    mysqli_query($con, $sqldelete);
    echo '<script>alert("ลบประกาศสำเร็จ");</script>';
    mysqli_close($con);
}

?>
<style>
    .line {
        width: 120px;
        height: 5px;
        background-color: #FFF
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {

        background-image: url("https://cdn2.iconfinder.com/data/icons/activity-5/50/1F3C0-basketball-512.png");
        background-position: center;
        /* Center the image */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-size: cover;
        transition: all .5s;
    }

    .navbar-light .navbar-nav .active>.nav-link,
    .navbar-light .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .show>.nav-link {
        color: white;
        text-shadow: 2px 2px 4px #000000;
        background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDlbVzhSuj_rqeneW8NCxkc-h-mbBsbriTCDqKNkfUlXfw9LiJtw&s");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .navbar-light .navbar-nav .nav-link {
        color: rgb(0, 0, 0);
    }

    .adminback {
        position: fixed;
        top: 50%;
        left: 0;
        z-index: 99;
    }
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #ebebeb;">
    <a class="navbar-brand" href="#"> <img src="http://pub-static.haozhaopian.net/assets/projects/pages/dca71680-c318-11e9-ae0a-0d283ef8239c_118a85ea-30d6-4f5d-8da4-896794ecf8b2_thumb.jpg" width="150" height="60" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto text-md-center text-left">

            <li class="nav-item <?php echo $navbar[0]; ?>">
                <a class="nav-link" href="index.php"><i class="fas fa-home text-info"></i>หน้าหลัก <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo $navbar[1]; ?>">
                <a class="nav-link" href="home1.php"><i class="fas fa-running text-info"></i>ประกาศสอนกีฬา</a>
            </li>
            <li class="nav-item <?php echo $navbar[2]; ?>">
                <a class="nav-link" href="home2.php"><i class="fas fa-bullhorn text-info"></i>กระดานถาม-ตอบ</a>
            </li>
            <li class="nav-item <?php echo $navbar[3]; ?>">
                <a class="nav-link" href="home3.php"><i class="fas fa-comment-dots text-info"></i>เกี่ยวกับเรา</a>
            </li>
            <li class="nav-item <?php echo $navbar[4]; ?>">
                <a class="nav-link" href="home4.php"><i class="fas fa-address-card text-info"></i>ติดต่อ</a>
            </li>


        </ul>
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <?php if (isset($_SESSION['id']) != null) { ?>
                <li class="nav-item">


                    <div class="btn-group">
                        <a class="nav-link" href="function/logout.php">ออกจากระบบ<img src="https://img.icons8.com/flat_round/40/000000/shutdown--v1.png"></a>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">setting</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profile">ตั้งค่าโปรไฟล์</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalsettingpost">ดูประกาศสอนของคุณ</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalsettingkatoo">ดูกระทู้ของคุณ</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">ออกจากระบบ</a>
                        </div>
                    </div>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">เข้าสู่ระบบ<img src="https://img.icons8.com/bubbles/50/000000/lock.png"></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/login.php" name="login" id="login" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
                        <small id="emailHelp" class="form-text text-muted">กรุณาใส่ชื่อผู้ใช้งานหากยังไม่มีกดที่ปุ่มสมัครสมาชิก.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="รหัสผ่านของคุณ">
                    </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-user-plus"></i>สมัครสมาชิก</button>
                <button type="submit" class="btn btn-primary" id="buttonlogin"><i class="fas fa-sign-in-alt"></i>ล็อกอินเข้าสู่ระบบ</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Modal Admin-->
<div class="modal fade " id="modaladmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" name="login" id="login" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
                        <small id="emailHelp" class="form-text text-muted">กรุณาใส่ชื่อผู้ใช้งานหากยังไม่มีกดที่ปุ่มสมัครสมาชิก.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="รหัสผ่านของคุณ">
                    </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-arrow-alt-circle-left"></i>ย้อนกลับ</button>
                <button type="submit" class="btn btn-success " id="buttonlogin"><i class="fas fa-sign-in-alt"></i>ล็อกอินเข้าสู่ระบบแอดมิน</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-------------------------------register---------------------------------->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">สมัครสมาชิก</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" name="register" id="register" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="รหัสผ่านของคุณ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอก ชื่อ-นามสกุล">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">อีเมล์</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอก อีเมล">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="telephone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="กรุณากรอก เบอร์โทรศัพท์">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-warning" name="btnSend" id="btnSend" value="สมัครสมาชิก">



            </div>
            </form>
        </div>
    </div>
</div>
<?php
error_reporting(0);
include 'function/connect.php';
$sqlprofile = "SELECT * FROM `tb_member` WHERE m_id = $_SESSION[id]";
$queryprofile = mysqli_query($con, $sqlprofile);
$row_profile = mysqli_fetch_array($queryprofile);
?>
<!-- Modalprofile-->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile">แก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/updateprofile.php" name="profile" id="profile" method="POST">
                    <div class="form-group">
                        <div class="card" style="width: 100%;">
                            <img src="img/<?php echo $row_profile['imageprofile']; ?>" id="imgprofile" name="imgprofile" class="card-img-top" alt="..." style="border-radius: 50%; width:250px; height:250px; margin: 0 auto;">
                            <div class="card-body">
                                <p class="card-text text-warning">เปลี่ยนรูปภาพ.</p>
                                <input type='file' id="imgInp" name="imgInp" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="username2" id="username2" placeholder="กรุณากรอกชื่อผู้ใช้งาน" value="<?php echo $row_profile['m_username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="รหัสผ่านของคุณ" value="<?php echo $row_profile['m_password']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="name2" id="name2" placeholder="กรุณากรอก ชื่อ-นามสกุล" value="<?php echo $row_profile['m_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">อีเมล์</label>
                        <input type="email" class="form-control" name="email2" id="email2" placeholder="กรุณากรอก อีเมล" value="<?php echo $row_profile['m_email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="telephone2" id="telephone2" placeholder="กรุณากรอก เบอร์โทรศัพท์" value="<?php echo $row_profile['m_telephone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่</label>
                        <textarea class="form-control" id="address2" rows="3" name="address2"><?php echo $row_profile['m_address']; ?></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary  btn-block" name="btn-updateprofile" id="btn-updateprofile" value="บันทึก">

            </div>
            </form>
        </div>
    </div>
</div>
<?php
error_reporting(0);
include 'function/connect.php';
$sqlsettingpost = "SELECT * FROM tb_addcoach a INNER JOIN tb_member b
ON a.idmember = b.m_id WHERE a.idmember = $_SESSION[id]";
$querysettingpost = mysqli_query($con, $sqlsettingpost);
$row_settingpost = mysqli_fetch_array($querysettingpost);
?>
<!-- Modalsettingpost-->
<div class="modal fade" id="modalsettingpost" tabindex="-1" role="dialog" aria-labelledby="modalsettingpost" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalsettingpost">จัดการประกาศสอนของคุณ</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($row_settingpost == null){ echo "<h5 class='text-danger text-center'>ยังไม่มีประกาศสอนของคุณณตอนนี้</h5>";}else{?>
                <div class="table-responsive " style="width:100%;">
                    <table class="table" id="datatable">
                        <thead class="text-secondary">


                            <th>
                                จัดการ
                            </th>
                            <th>
                                ลำดับ
                            </th>
                            <th>
                                ประเภทกีฬา
                            </th>
                            <th>
                                สถาณที่
                            </th>
                            <th>
                                วัน/เวลา
                            </th>


                        </thead>
                        <tbody>

                            <?php do { ?>

                                <tr>

                                    <th> <a href="#" data-toggle="modal" data-target="#editpost" onclick="showpost(<?= $row_settingpost['id']; ?>);">
                                            <i class="fas fa-edit text-success"></i>
                                        </a>
                                        <a href="#" id="btndel" onclick="deleteepost(<?= $row_settingpost['id']; ?>);"><i class="fas fa-trash-alt text-danger"></i></a> </td>
                                    </th>
                                    <th scope="row"><?php echo $num += 1; ?></th>

                                    <td><?php echo $row_settingpost['namesport']; ?></td>
                                    <td><?php echo  $row_settingpost['location']; ?></td>
                                    <td><?php echo  $row_settingpost['datetime']; ?></td>



                                </tr>
                            <?php } while ($row_settingpost = mysqli_fetch_assoc($querysettingpost)); ?>
                        </tbody>
                    </table>
                            </div><?php } ?>

            </div>

        </div>
    </div>
</div>
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
                                <input type="text" class="form-control" name="name" id="name" placeholder="กรุณาใส่ชื่อ-นามสกุล"value="<?php echo $_SESSION['fullname']; ?>" readonly required>
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
                        <button type="submit" id="btneditpost" class="btn btn-info hide">แก้ไขประกาศ</button>

                    </div>
            </div>

            </form>
        </div>


    </div>
</div>

<?php
error_reporting(0);
include 'function/connect.php';
$sqlsettingkatoo = "SELECT * FROM tb_katoo WHERE idmember = $_SESSION[id]";
$querysettingkatoo = mysqli_query($con, $sqlsettingkatoo);
$row_settingkatoo = mysqli_fetch_array($querysettingkatoo);
?>
<!-- Modalsettingkatoo-->
<div class="modal fade" id="Modalsettingkatoo" tabindex="-1" role="dialog" aria-labelledby="Modalsettingkatoo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modalsettingkatoo">จัดการกระทู้ของคุณ</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($row_settingkatoo == null) {
                    echo " <h5 class='text-danger text-center'>ยังไม่มีกระทู้ที่คุณสร้าง</h5>";
                } else { ?>
                    <div class="table-responsive " style="width:100%;">
                        <table class="table" id="datatable">
                            <thead class="text-secondary">


                                <th>
                                    จัดการ
                                </th>
                                <th>
                                    ลำดับ
                                </th>
                                <th>
                                    หัวข้อ
                                </th>
                                <th>
                                    สถาณะของกระทู้
                                </th>
                                <th>
                                    วัน/เวลา
                                </th>






                            </thead>
                            <tbody>

                                <?php do { ?>

                                    <tr>

                                        <th> <a href="#" data-toggle="modal" data-target="#editkatoo" onclick="showkatoo(<?= $row_settingkatoo['id']; ?>);">
                                                <i class="fas fa-edit text-success"></i>
                                            </a>
                                            <a href="#" id="btndel" onclick="deleteekatoo(<?= $row_settingkatoo['id']; ?>);"><i class="fas fa-trash-alt text-danger"></i></a> </td>
                                        </th>
                                        <th scope="row"><?php echo $numkatoo += 1; ?></th>

                                        <td><?php echo $row_settingkatoo['namekatoo']; ?></td>
                                        <td><?php if ($row_settingkatoo['status'] == 1) {
                                                echo "<p class='text-success text-center'>ออนไลน์</p>";
                                            } else {
                                                echo "<p class='text-danger text-center'>ถูกปิดกั้นจากแอดมิน</p>";
                                            } ?></td>
                                        <td><?php echo  $row_settingkatoo['datetime']; ?></td>


                                    </tr>
                                <?php } while ($row_settingkatoo = mysqli_fetch_assoc($querysettingkatoo)); ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>
</div>

<!-- Modaleditkatoo -->
<div class="modal fade mt-5" id="editkatoo" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">จัดการกระดานถาม-ตอบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" name="updatekatoo" id="updatekatoo" method="POST">
                    <input type="text" name="idkatoo" id="idkatoo" hidden>
                    <div class="form-group" id="headkatoo">
                        <label for="exampleInputEmail1">หัวข้อกระทู้</label>
                        <input type="text" class="form-control" name="titlekatoo" id="titlekatoo" aria-describedby="emailHelp" placeholder="กรุณาตั้งชื่อกระทู้">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">เนื้อหา</label>
                        <textarea class="form-control" id="showdetailkatoo" rows="3" name="showdetailkatoo"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btneditkatoo" class="btn btn-info hide">แก้ไขกระทู้</button>

                    </div>
            </div>

            </form>
        </div>


    </div>
</div>
<?php if ($_SESSION['level'] == 1) { ?>
    <div class="adminback">
        <a href="admin/index.php" title="กลับสู่ระบบแอดมิน"><i class="fa fa-3x fa-chevron-circle-left text-info" aria-hidden="true"></i>
        </a>
    </div>
<?php } ?>

<!----------------------------
--------------------------------------------------->
<style>
    li {
        font-size: 20px;
    }
</style>

<script type="text/javascript">
    $(function($) {
        $("#btnSend").click(function() {
            $.ajax({
                type: "POST",
                url: "function/register.php",
                data: $("#register").serialize(),
                success: function(result) {
                    if (result.status == 1) // Success
                    {
                        swal({
                            title: "สมัครสมาชิกสำเร็จ!",
                            text: result.message,
                            icon: "success",
                        });
                        $("#close").click();
                    } else // Err
                    {
                        swal({
                            title: "สมัครสมาชิกไม่สำเร็จ!",
                            text: result.message,
                            icon: "error",
                        });
                    }
                }
            });

        });

    });

    function showkatoo(id) {
        $('#exampleModalScrollableTitle').text("แก้ไขกระดานถาม-ตอบ");


        $.ajax({
            type: "GET",
            url: "function/showkatoo.php?id=" + id,
            success: function(result) {
                if (result.status == 1) // Success
                {
                    $('#idkatoo').val(result.id);
                    $('#titlekatoo').val(result.namekatoo);
                    $('#showdetailkatoo').val(result.detailkatoo);

                } else // Err
                {
                    alert("notshow");

                }
            }
        });

    }
    function showpost(id) {
        $.ajax({
            type: "GET",
            url: "function/showpost.php?id=" + id,
            success: function(data) {
                if (data.status == 1) // Success
                {
                    $('#idpost').val(data.id);
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

    function deleteekatoo(id) {
        swal({
                title: "คุณต้องการที่จะลบกระทู้นี้??",
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
                    //location.replace("?deletekatoo=" + id);
                    window.location = document.referrer + "?&deletekatoo="+id;

                } else {
                    swal("ยกเลิกรายการ!");
                }
            });
    }

    function deleteepost(id) {
        swal({
                title: "คุณกำลังทำการลบประกาศนี้?",
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
                    //location.replace("?&deletepost=" + id);
                    window.location = document.referrer + "?&deletepost="+id;

                } else {
                    swal("ยกเลิกรายการ!");
                }
            });
    }
    //---------------------------------------------------------------------------------
    $("#btneditkatoo").click(function() {
        $.ajax({
            type: "POST",
            url: "function/updatekatoo.php",
            data: $("#updatekatoo").serialize(),
            success: function(result) {
                if (result.status == 1) // Success
                {
                    confirm(result.message);
                    $(".close").click();
                } else // Err
                {
                    confirm(result.message);

                }
            }
        });

    });
    //------------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------
        $("#btneditpost").click(function() {
        $.ajax({
            type: "POST",
            url: "function/updatepost.php",
            data: $("#updatepost").serialize(),
            success: function(result) {
                if (result.status == 1) // Success
                {
                    confirm(result.message);
                    $(".close").click();
                } else // Err
                {
                    confirm(result.message);

                }
            }
        });

    });
    //------------------------------------------------------------------------------------------------
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imgprofile').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>