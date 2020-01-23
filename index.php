<?php $navbar =array("active"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าแรก</title>
    <?php include "head.php"; ?>
</head>

<body>
<?php include "navbar.php"; ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2012/11/28/11/11/quarterback-67701_1280.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
        <h5>เข้าสู่หน้าเว็บหลัก</h5>
        <a href="home1.php" class="btn btn-primary">GOTOHOMEPAGE</a>
      </div>
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.pixabay.com/photo/2015/03/01/22/27/relay-race-655353_1280.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
        <h5>เข้าสู่หน้าเว็บหลัก</h5>
        <a href="home1.php" class="btn btn-primary">GOTOHOMEPAGE</a>
      </div>
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.pixabay.com/photo/2014/10/22/17/25/stretching-498256_1280.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
        <h5>เข้าสู่หน้าเว็บหลัก</h5>
        <a href="home1.php" class="btn btn-primary">GOTOHOMEPAGE</a>
      </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <div class="container" >
    <div style="  box-shadow: 0 20px 50px 0 rgba(0, 0, 0, 0.3), 0 20px 50px 0 rgba(0, 0, 0, 0.19);">


    </div>

    <?php include "footer.php"; ?>
    </div>
</body>

</html>