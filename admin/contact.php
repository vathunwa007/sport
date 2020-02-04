<?php
require_once "../function/connect.php";
$sqlcontact = "SELECT * FROM `tb_contact`";
$querycontact = mysqli_query($con,$sqlcontact);
$row_contact = mysqli_fetch_array($querycontact);
$total_contact = mysqli_num_rows($querycontact);
?>
<h3>แสดงรายการ ข้อเสนอแนะ</h3>
<div class="row">
<?php do{ ?>
<div class="card col-sm-12 col-md-6 col-lg-4 mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $row_contact['name']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $row_contact['email']; ?></h6>
    <p class="card-text"><?= $row_contact['text']; ?>.</p>
    <p class="card-text">เบอร์ติดต่อ : <?= $row_contact['telephone']; ?></p>
    <p class="card-footer">วัน/เวลา : <?= $row_contact['datetime']; ?></p>


  </div>
</div>
<?php  }while($row_contact = mysqli_fetch_array($querycontact)); ?>

</div>