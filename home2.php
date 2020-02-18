<?php $navbar =array("","","active","",""); ?>
<?php
require_once "function/connect.php";
$sql = "SELECT a.m_username,b.id,b.namekatoo,b.detailkatoo,b.datetime,b.status
FROM tb_member a
INNER JOIN tb_katoo b
ON a.m_id = b.idmember WHERE b.status = 1";
$row = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_katoo = mysqli_fetch_assoc($row);
$totalrow_katoo = mysqli_num_rows($row);
$num = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>กระดานถาม-ตอบ</title>
    <?php include "head.php"; ?>

<script>

function gotokatoo(id){
  window.location.href = "katoo.php?id="+id+"";
}

</script>

</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
        <div style="  box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);">
        <div style="margin-top:25px;">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://media-exp1.licdn.com/dms/image/C561BAQGC1UWGVRjVcw/company-background_10000/0?e=2159024400&v=beta&t=Ig3VjUHzsN5NVPkl0ujvVmIGjfkL_SLP7WuS14e0Bl0" alt="First slide" height="350">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://coverfiles.alphacoders.com/650/65076.jpg" alt="Second slide" height="350">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://coverfiles.alphacoders.com/699/69908.jpg" alt="Third slide" height="350">
    </div>
  </div>
</div>
<div class="card" style="margin-top:25px;">
  <div class="card-header">

  <?php if(isset($_SESSION['id']) != null){ ?>
  <button onclick="window.location.href ='createkatoo.php';"class="btn btn-info float-right" style="display: inline;">ตั้งกระทู้<img src="https://img.icons8.com/dusk/30/000000/communication.png"></button>
  <?php }else{ ?>
      <p style="display: inline;color:red;">กรุณาลงชื่อเข้าใช้งานก่อนตั้งกระทู้</p>
  <?php } ?>
  <h3 class="text-center">กระดานถาม-ตอบ</h3>
  </div>
  <div class="card-body">
  <table class="table table-hover table-bordered" id="Datatable">
  <thead>
    <tr >
      <th scope="col">ลำดับ</th></th>
      <th scope="col">หัวข้อ</th>
      <th scope="col">ชื่อผู้ใช้</th>
      <th scope="col">วัน/เวลา</th>
      <!--<th scope="col">การตอบกลับ</th>-->

    </tr>
  </thead>
  <tbody>
  <?php do { ?>

    <tr onclick="gotokatoo(<?php echo $row_katoo['id']; ?>);">
      <th scope="row"><?php echo $num+=1 ; ?></th>
      <td><?php echo $row_katoo['namekatoo']; ?></td>
      <td><?php echo  $row_katoo['m_username']; ?></td>
      <td><?php echo  $row_katoo['datetime']; ?></td>
     <!-- <td><?php echo  $row_katoo['m_username']; ?></td> -->


    </tr>
    <?php } while ($row_katoo= mysqli_fetch_assoc($row)); ?>
  </tbody>
</table>
  </div>
</div>

        </div>
        </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
<script>
    $(document).ready(function() {


        $('#Datatable').DataTable({
            "scrollX": false,
            "columnDefs": [{}],

            "bFilter": true,

            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/Thai.json"
            }
        });


    });
</script>