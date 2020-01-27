<?php
require_once "../function/connect.php";
$sql = "SELECT a.m_username,b.id,b.namekatoo,b.detailkatoo,b.datetime
FROM tb_member a
INNER JOIN tb_katoo b
ON a.m_id = b.idmember";
$row = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_katoo = mysqli_fetch_assoc($row);
$totalrow_katoo = mysqli_num_rows($row);
$num = 0;
?>
<div class="card">
    <div class="card-header">
        <h2 class="">จัดการกระดานถาม-ตอบ</h2>
    </div>
    <div class="card-body">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  เพิ่มกระทู้
</button>

<!-- Modal -->
<div class="modal fade mt-5" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<hr>
        <div class="table-responsive " style="width: 100%;">
            <table class="table" id="datatable">
                <thead class="text-secondary">
                    <th> <input id="checkAll" class="check" name="checkAll" type="checkbox" value=""> </th>


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
                        การตอบกลับ
                    </th>

                    <th>
                        เผยแพร่
                    </th>




                </thead>
                <tbody>

                    <?php do { ?>

                        <tr onclick="gotokatoo(<?php echo $row_katoo['id']; ?>);">
                            <th><input class="check" name="record" type="checkbox" value="userId"></th>

                            <th> <a href="#" data-toggle="modal" data-target="#addAndEditCateModal" data-maincate="UUID-001" data-level="1" data-catelv1="UUID-001" data-catelv2="" data-catelv3="" data-catelv4="" data-catename="ประชากรศาสตร์ ประชากรและเคหะ" data-codeid="os_01">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                                <a href="#" id="btndel" onclick="numdel(this);"><i class="fas fa-trash-alt text-danger"></i></a> </td>
                            </th>
                            <th scope="row"><?php echo $num += 1; ?></th>

                            <td><?php echo $row_katoo['namekatoo']; ?></td>
                            <td><?php echo  $row_katoo['m_username']; ?></td>
                            <td><?php echo  $row_katoo['datetime']; ?></td>
                            <td><?php echo  $row_katoo['m_username']; ?></td>
                            <td> <input type="checkbox" id="inputStatus" checked data-toggle="toggle">

                            </td>

                        </tr>
                    <?php } while ($row_katoo = mysqli_fetch_assoc($row)); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>