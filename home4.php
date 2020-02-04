<?php $navbar =array('','','',"","active"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "head.php"; ?>
    <script>
function showalert(message) {
  swal({
                        title: message,
                        text: "กรุณากดที่ปุ่มตกลงเพื่อดำเนินการต่อ",
                        icon: "success",
                    });
  }
</script>
    <style>

  body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-color: rgb(255, 126, 126);
 background-blend-mode: normal;
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: 25px;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}


    </style>


</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="bg-image"></div>

<div class="container bg-text">
    <div class="row text-center justify-content-center" style="margin-top:25px;">
      <div class="col-12 col-md-8 col-lg-7">
        <h1 style="color:white">ติดต่อผู้จัดทำระบบ</h1>
        <h2 style="color:white">กรอกฟอร์มเพื่อทำการติดต่อผู้จัดทำระบบหรือแจ้งปัญหาได้โดยตรง!</h2>
      </div>
    </div>

    <div class="card  pt-4" style=" background-color: rgba(0,0,0, 0);
  opacity: .90;">
      <div class="col-6 mx-auto">
        <form action="#" method="POST" id="formcontact">
          <div class="row">
            <div class="col-12 col-md-4" >
              <input type="text" class="form-control" placeholder="ชื่อของคุณ" name="name" id="name">
            </div>
            <div class="col-12 col-md-4 mt-4 mt-md-0">
              <input type="email" class="form-control" placeholder="อีเมลของคุณ" name="email" id="email">
            </div>
            <div class="col-12 col-md-4 mt-4 mt-md-0">
              <input type="telephone" class="form-control" placeholder="เบอร์โทรศัพท์ที่ติดต่อกลับได้" name="tellephone" id="telephone">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <textarea  class="form-control" name="message"id="message" rows="3" placeholder="เขียนปัญหาของคุณลงที่นี้?"></textarea>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col text-center">
              <button type="button" id="sentcontact"class="btn btn-primary btn-block">ส่งแบบฟอร์ม</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include "footer.php"; ?>

</body>
</html>
<script>


 $("#sentcontact").click(function() {
            $.ajax({
                type: "POST",
                url: "function/savecontact.php",
                data: $("#formcontact").serialize(),
                complete: function(data) {
                  swal({
                        title: "ทำการส่งข้อความติดต่อสำเร็จ",
                        text: "กรุณากดที่ปุ่มตกลงเพื่อดำเนินการต่อ",
                        icon: "success",
                    });

                },
                error: function(error){
                  swal({
                        title: "เกิดข้อผิดพลาดกรุณาลองใหม่!!",
                        text: "กรุณากดที่ปุ่มตกลงเพื่อดำเนินการต่อ",
                        icon: "danger",
                    });

                }
            });

        });

</script>
