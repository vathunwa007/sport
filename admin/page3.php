<?php
require_once "../function/connect.php";
$sql = "SELECT a.m_username,b.id,b.namekatoo,b.detailkatoo,b.datetime,b.status
FROM tb_member a
INNER JOIN tb_katoo b
ON a.m_id = b.idmember";
$row = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_katoo = mysqli_fetch_assoc($row);
$totalrow_katoo = mysqli_num_rows($row);
$num = 0;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqldelete ="DELETE FROM `tb_katoo` WHERE `tb_katoo`.`id`=$id";
    mysqli_query($con,$sqldelete);
    echo '<script>location.replace("index.php?page=3")</script>';
  }

?>
<h2 class="">จัดการกระดานถาม-ตอบ</h2>
<div class="card">

    <div class="card-body">
        <!-- Button trigger modal -->


        <div class="table-responsive " style="width: s;">
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
                        ชื่อผู้ใช้
                    </th>
                    <th>
                        วัน/เวลา
                    </th>
                    <th>
                        การตอบกลับล่าสุด
                    </th>

                    <th>
                        เผยแพร่
                    </th>




                </thead>
                <tbody>

                    <?php do { ?>

                        <tr>

                            <th> <a href="#" data-toggle="modal" data-target="#editkatoo"onclick="showkatoo(<?= $row_katoo['id']; ?>);">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                                <a href="#" id="btndel" onclick="deletee(<?= $row_katoo['id']; ?>);"><i class="fas fa-trash-alt text-danger"></i></a> </td>
                            </th>
                            <th scope="row"><?php echo $num += 1; ?></th>

                            <td><?php echo $row_katoo['namekatoo']; ?></td>
                            <td><?php echo  $row_katoo['m_username']; ?></td>
                            <td><?php echo  $row_katoo['datetime']; ?></td>
                            <td><?php echo  $row_katoo['m_username']; ?></td>
                            <td>
                                <?php  if($row_katoo['status'] == true){ ?>
                                    <input type="checkbox" name="pushtoggle" id="inputStatus" data-toggle="toggle" onchange="status(<?= $row_katoo['id']; ?>)" checked>
                                <?php }else{ ?>
                                    <input type="checkbox" name="pushtoggle" id="inputStatus" data-toggle="toggle" onchange="status(<?= $row_katoo['id']; ?>)" >
                               <?php  } ?>

                            </td>

                        </tr>
                    <?php } while ($row_katoo = mysqli_fetch_assoc($row)); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal -->
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
                <form action="" name="katoo" id="katoo" method="POST">
                    <input type="text" name="idkatoo" id="idkatoo" hidden>
                    <div class="form-group" id="headkatoo">
                        <label for="exampleInputEmail1">หัวข้อกระทู้</label>
                        <input type="text" class="form-control" name="titlekatoo" id="titlekatoo" aria-describedby="emailHelp" placeholder="กรุณาตั้งชื่อกระทู้">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">เนื้อหา</label>
                        <textarea class="form-control" id="detailkatoo" rows="3" name="detailkatoo"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" onclick="sentkatoo()" id="btnsentkatoo" class="btn btn-primary ">เพิ่มกระทู้</button>
                        <button type="submit" id="btneditkatoo" class="btn btn-info hide">แก้ไขกระทู้</button>

                    </div>
            </div>

            </form>
        </div>


    </div>
</div>
<script>
    function sentkatoo(){

            $.ajax({
                type: "POST",
                url: "../function/insertkatoo.php",
                data: $("#katoo").serialize(),
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


    }
     function showkatoo(id) {
        $('#exampleModalScrollableTitle').text("แก้ไขกระดานถาม-ตอบ");
        $('#btnsentkatoo').addClass('hide');
        $('#btneditkatoo').removeClass('hide');

        $.ajax({
            type: "GET",
            url: "../function/showkatoo.php?id=" + id,
            success: function(result) {
                if (result.status == 1) // Success
                {
                    $('#idkatoo').val(result.id);
                    $('#titlekatoo').val(result.namekatoo);
                    $('#detailkatoo').val(result.detailkatoo);

                } else // Err
                {
                    alert("notshow");

                }
            }
        });

    }
function deletee(id){
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
      location.replace("index.php?page=3&id="+id);

    } else {
      swal("ยกเลิกรายการ!");
    }
  });
}

function status(id){
    $.ajax({
            type: "GET",
            url: "../function/changstatus.php?id=" + id,
            success: function(result) {
                if (result.status == 1) // Success
                {
                   confirm(result.message);
                } else // Err
                {
                    alert("notshow");

                }
            }
        });
}
</script>