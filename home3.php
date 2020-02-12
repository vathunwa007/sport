<?php $navbar = array("", "", "", "active", " "); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <?php include "head.php"; ?>
  <style>
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
      z-index: 100;
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
    .body-mp4{
      margin-top:25%;

    }
    #img:hover{
      opacity: 78%;
    }
    #card-show{

      box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);
    }
    #card-show section:hover{
      box-shadow: 0 20px 30px 0 rgba(0, 9, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);
    }
    .nameshow{
      position: absolute;
      top: 50%;
      left:5rem;
      display: block;
      color:white;
      border: 2px solid white;


      z-index: 9999;
    }

  </style>
</head>

<body>
  <?php include "navbar.php"; ?>
  <div class="homepage-banner">
    <div class="animation-container">
      <div class="mask">
      <div class="body-mp4">
      <h1 class="text-center text-light ">เกี่ยวกับเรา</h1>
      <h3 class="text-center text-light"> เว็บประกาศสอนกีฬา นี้จัดทำขึ้นเพื่อให้ผู้ที่สนใจทางด้านกีฬามาแลกเปลี่ยนความคิดเห็นและหาครูฝึกกีฬา</h3>
      </div>


      </div>
      <video autoplay loop class="fillScreen" poster="URL_PATH_TO_JPEG">
        <source src="img/basketball.mp4" type="video/mp4" />
        <source src="img/basketball.webm" type="video/webm" />Please upgrade your browser, it does not support the video tag.
      </video>
    </div>
  </div>

  <div class="container">
    <div id="card-show">
      <section class="fdb-block" style="background-color: white; margin-top:50px;">
        <div class="container mb-5">
          <div class="row">
            <div class="col-12 col-md-4" id="img">
              <h2 class="nameshow">THANATHIP</h2>
              <img alt="image" class="img-fluid" src="https://scontent.fbkk22-2.fna.fbcdn.net/v/t1.0-9/45641907_1880315065371463_5594112482617589760_n.jpg?_nc_cat=105&_nc_ohc=0Q-Smhmpd7sAX-U8q8P&_nc_ht=scontent.fbkk22-2.fna&oh=664c9d7743b931bf644868505be87f81&oe=5EBF19D2">
            </div>
            <div class="col-12 col-md-6 col-lg-5 ml-auto  mt-5">
            <h3> รหัส นักศึกษา 5911535456 </h3>
            <h2>นาย Thanathip Ketsamrong</h2>
              <p class="lead">มหาวิทยาลัยราชภัฏพระนคร คณะวิทยาศาสตร์ </p>
              <p class="lead">สาขา เทคโนโลยีสารสนเทศ ปีการศึกษา 2563</p>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>

  <?php include "footer.php"; ?>

</body>

</html>
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