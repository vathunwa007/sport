<?php
require_once "../function/connect.php";
$sql = "SELECT * FROM `tb_member`";
$row = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_member = mysqli_fetch_assoc($row);
$totalrow_member = mysqli_num_rows($row);
$num = 0;


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqldelete ="DELETE FROM `tb_member` WHERE `tb_member`.`m_id`=$id";
    mysqli_query($con,$sqldelete);
    echo '<script>location.replace("index.php?page=4")</script>';
  }

?>
<h2 class="">จัดการสมาชิก</h2>
<div class="card">

    <div class="card-body">
        <p><button class="btn btn-primary" id="insert" data-toggle="modal" data-target="#editinsert"><i class="metismenu-icon pe-7s-add-user" style="font-size:1rem"></i> เพิ่มสมาชิก</button>
        </p>
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
                        ไอดีสมาชิก
                    </th>
                    <th>
                        ชื่อผู้ใช้
                    </th>

                    <th>
                        รหัสผ่าน
                    </th>
                    <th>
                        ชื่อ-นามสกุล
                    </th>
                    <th>
                        อีเมลล์
                    </th>
                    <th>
                        เบอร์โทรศัพท์
                    </th>
                    <th>
                        ที่อยู่
                    </th>
                    <th>
                        ระดับ
                    </th>




                </thead>
                <tbody>

                    <?php do { ?>

                        <tr>

                            <th> <a href="#" data-toggle="modal" data-target="#editinsert" onclick="showmember(<?= $row_member['m_id']; ?>);">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                                <a href="#" id="btndel" onclick="deletee(<?= $row_member['m_id']; ?>);"><i class="fas fa-trash-alt text-danger"></i></a> </td>
                            </th>
                            <th scope="row"><?php echo $num += 1; ?></th>

                            <td><?php echo $row_member['m_id']; ?></td>
                            <td><?php echo  $row_member['m_username']; ?></td>
                            <td><?php echo  $row_member['m_password']; ?></td>
                            <td><?php echo  $row_member['m_name']; ?></td>
                            <td><?php echo  $row_member['m_email']; ?></td>
                            <td><?php echo  $row_member['m_telephone']; ?></td>
                            <td><?php echo  $row_member['m_address']; ?></td>
                            <td><?php echo  $row_member['m_level']; ?></td>

                        </tr>
                    <?php } while ($row_member = mysqli_fetch_assoc($row)); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade mt-5" id="editinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">เพิ่มสมาชิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" name="register" id="register" method="POST">
                    <input type="text" name="inputid" id="inputid" hidden>
                    <div class="form-group" id="username">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="username" id="inputusername" aria-describedby="emailHelp" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password" id="inputpassword" placeholder="รหัสผ่านของคุณ" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="name" id="inputname" aria-describedby="emailHelp" placeholder="กรุณากรอก ชื่อ-นามสกุล">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">อีเมล์</label>
                        <input type="email" class="form-control" name="email" id="inputemail" aria-describedby="emailHelp" placeholder="กรุณากรอก อีเมล">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="telephone" id="inputtelephone" aria-describedby="emailHelp" placeholder="กรุณากรอก เบอร์โทรศัพท์">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่</label>
                        <textarea class="form-control" id="inputaddress" rows="3" name="address"></textarea>
                    </div>
                    <div class="form-group hide" id="level">
                        <label for="exampleFormControlTextarea1">สิทธ์การเข้าถึง</label>
                        <input class="form-control" id="inputlevel" rows="3" name="level"></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSend" class="btn btn-primary ">เพิ่มสมาชิก</button>
                        <button type="submit" id="btnedit" class="btn btn-info hide">แก้ไขสมาชิก</button>

                    </div>
            </div>

            </form>
        </div>


    </div>
</div>
<script>
    function showmember(id) {
        $('#exampleModalScrollableTitle').text("แก้ไขสมาชิก");
        $('#level').removeClass('hide');
        $('#btnSend').addClass('hide');
        $('#btnedit').removeClass('hide');

        $.ajax({
            type: "GET",
            url: "../function/showmember.php?id=" + id,
            success: function(result) {
                if (result.status == 1) // Success
                {
                    $('#inputid').val(result.id);
                    $('#inputusername').val(result.username);
                    $('#inputpassword').val(result.password);
                    $('#inputname').val(result.name);
                    $('#inputemail').val(result.email);
                    $('#inputtelephone').val(result.telephone);
                    $('#inputaddress').val(result.address);
                    $('#inputlevel').val(result.level);
                } else // Err
                {
                    alert("notshow");

                }
            }
        });

    }
    function deletee(id){
  swal({
    title: "คุณต้องการที่จะลบสมาชิกผู้นี้??",
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
      location.replace("index.php?page=4&id="+id);

    } else {
      swal("ยกเลิกรายการ!");
    }
  });
}
</script>
