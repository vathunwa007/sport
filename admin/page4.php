<?php
require_once "../function/connect.php";
$sql = "SELECT * FROM `tb_member`";
$row = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_member = mysqli_fetch_assoc($row);
$totalrow_member = mysqli_num_rows($row);
$num = 0;
?>
<div class="card">
    <div class="card-header">
        <h2 class="">จัดการสมาชิก</h2>
    </div>
    <div class="card-body">
       <p><button class="btn btn-primary">เพิ่มสมาชิก</button>
    </p>
        <div class="table-responsive " style="width: 100%;">
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

                            <th> <a href="#" data-toggle="modal" data-target="#addAndEditCateModal" data-maincate="UUID-001" data-level="1" data-catelv1="UUID-001" data-catelv2="" data-catelv3="" data-catelv4="" data-catename="ประชากรศาสตร์ ประชากรและเคหะ" data-codeid="os_01">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                                <a href="#" id="btndel" onclick="numdel(this);"><i class="fas fa-trash-alt text-danger"></i></a> </td>
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