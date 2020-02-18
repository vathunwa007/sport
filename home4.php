<?php $navbar =array('','','',"","active"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดต่อระบบ</title>
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
  background-color: rgb(80, 89, 255);
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

    .homepage-banner {
      border-right: none;
      border-left: none;
      position: relative;
    }

    .no-video .animation-container video,
    .touch .animation-container video {
      display: none;
    }

    .no-video .animation-container .animation,
    .touch .animation-container .animation {
      display: block !important;
    }

    .animation-container {
      position: relative;
      bottom: 0%;
      left: 0%;
      height: 100%;
      width: 100%;
      overflow: hidden;
      background: #000;
    }

    .animation-container .animation img {
      width: 100%;
      bottom: 0;
      position: absolute;
    }

    .animation-container .mask {
      z-index: 0;
      position: absolute;
      background: rgba(0, 0, 0, 0.3);
      width: 100%;
      height: 100%;
    }

    .animation-container video {
      position: absolute;
      z-index: 0;
      bottom: 0;
    }

    .animation-container video.fillScreen {
      width: 100%;
    }
    </style>


</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="homepage-banner">
    <div class="animation-container">
      <div class="mask">

    </div>
      <video autoplay loop class="fillScreen" poster="URL_PATH_TO_JPEG">
        <source src="img/134.mp4" type="video/mp4" />
        <source src="img/134.webm" type="video/webm" />Please upgrade your browser, it does not support the video tag.
      </video>
    </div>
  </div>
<div class="container bg-text" style="margin-top:20%;">
    <div class="row text-center justify-content-center">
      <div class="col-12 col-md-8 col-lg-7">
        <h1 style="color:white">ติดต่อผู้จัดทำระบบ</h1>
        <h2 style="color:white">กรอกฟอร์มเพื่อทำการติดต่อผู้จัดทำระบบหรือแจ้งปัญหาได้โดยตรง!</h2>
      </div>
    </div>

    <div class="card  pt-4" style=" background-color: rgba(0,0,0, 0);
  opacity: .90; border:none;">
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
<script>
  //jQuery is required to run this code
  $(document).ready(function() {

    scaleAnimationContainer();

    initBannerAnimationSize('.animation-container .animation img');
    initBannerAnimationSize('.animation-container .mask');
    initBannerAnimationSize('.animation-container video');

    $(window).on('resize', function() {
      scaleAnimationContainer();
      scaleBannerAnimationSize('.animation-container .animation img');
      scaleBannerAnimationSize('.animation-container .mask');
      scaleBannerAnimationSize('.animation-container video');
    });

  });

  function scaleAnimationContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-banner').css('height', unitHeight);

  }

  function initBannerAnimationSize(element) {

    $(element).each(function() {
      $(this).data('height', $(this).height());
      $(this).data('width', $(this).width());
    });

    scaleBannerAnimationSize(element);

  }

  function scaleBannerAnimationSize(element) {

    var windowWidth = $(window).width(),
      windowHeight = $(window).height() + 5,
      animationWidth,
      animationHeight;

    console.log(windowHeight);

    $(element).each(function() {
      var animationAspectRatio = $(this).data('height') / $(this).data('width');

      $(this).width(windowWidth);

      if (windowWidth < 1000) {
        animationHeight = windowHeight;
        animationWidth = animationHeight / animationAspectRatio;
        $(this).css({
          'margin-top': 0,
          'margin-left': -(animationWidth - windowWidth) / 2 + 'px'
        });

        $(this).width(animationWidth).height(animationHeight);
      }

      $('.homepage-banner .animation-container video').addClass('fadeIn animated');

    });
  }
</script>
