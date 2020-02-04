<style>
.line{
    width: 120px;
    height: 5px;
    background-color: #FFF
}
.navbar a:hover, .dropdown:hover .dropbtn {

  background-image: url("https://cdn2.iconfinder.com/data/icons/activity-5/50/1F3C0-basketball-512.png");
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
  transition: all .5s;
}
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
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
            <?php if(isset($_SESSION['id'])!= null){ ?>
                <li class="nav-item">
                <a class="nav-link" href="function/logout.php">ออกจากระบบ<img src="https://img.icons8.com/flat_round/40/000000/shutdown--v1.png"></a>
                </li>
            <?php }else{ ?>
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
<!----------------------------------------------------------------->
<!-- Modal2 -->
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
<!------------------------------------------------------------------------------->
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
</script>
<script type="text/javascript">
 /*   $(function($) {
        $("#buttonlogin").click(function() {
            $.ajax({
                type: "POST",
                url: "function/login.php",
                data: $("#login").serialize(),
                success: function(result) {
                    if (result.status == 1) // Success
                    {
                        swal({
                            title: "เข้าสู่ระบบสำเร็จ!",
                            text: result.message,
                            icon: "success",

                        }).then((value) => {
                            location.reload();
                        });
                    }if (result.status == 2) // Success
                    {
                        swal({
                            title: "เข้าสู่ระบบแอดมินสำเร็จ!",
                            text: result.message,
                            icon: "success",

                        }).then((value) => {
                            location.href("admin/index.php");
                        });



                    } else // Err
                    {
                        swal({
                            title: "รหัสหรือชื่อผู้ใช้ไม่ถูกต้อง!",
                            text: result.message,
                            icon: "error",
                        });


                    }
                }
            });

        });

    });*/
</script>
